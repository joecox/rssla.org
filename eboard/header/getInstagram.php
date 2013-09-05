<?php
   include($_SERVER['DOCUMENT_ROOT'] . '/_layout/globals.php');

   /* Get the existing image URLs from the 'all' file  */

   $all_file = @fopen('all.txt', 'r');

   $existing_images = array();
   if ($all_file != false)
   {
      // Read line by line, put into array
      while (!feof($all_file))
      {
         $line = fgets($all_file);
         $line = str_replace("\n", '', $line);
         array_push($existing_images, $line);
      }
      fclose($all_file);
   }


   /* Parse tag JSON, check for existing, put into holding file */

   $more = false;
   $next_url = '';

   $all_file = @fopen('all.txt', 'a');
   $holding_file = @fopen('holding.txt', 'a');

   do 
   {
      if ($next_url != '')
      {
         $url = $next_url;
      }
      else
      {
         $url = 'https://api.instagram.com/v1/tags/uclarss/media/recent?client_id='
               . $GLOBALS['INSTAGRAM_CLIENT_ID'];
      }
      
      $json = file_get_contents($url);
      $tag_data = json_decode($json, TRUE);

      $image_data = $tag_data['data'];

      for ($ii = 0; $ii < sizeof($image_data); $ii++)
      {
         $img_url = $image_data[$ii]['images']['low_resolution']['url'];
         if (!in_array($img_url, $existing_images))
         {
            fwrite($holding_file, $img_url . "\n");
            fwrite($all_file, $img_url . "\n");
         }
      }

      $next_url = $tag_data['pagination']['next_url'];
   } while ($next_url != '');

   fclose($holding_file);
   fclose($all_file);
?>