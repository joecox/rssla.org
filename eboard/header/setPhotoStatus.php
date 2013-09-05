<?php

   /* 

      setPhotoStatus.php is a script that manages the status of held Instagram
      photos tagged with 'uclarss'.  

      This script is called by functions in photoheader.js that are run as
      onclick events from the photo management page.

      Currently, the script assumes that input is valid and does not check to
      see whether the image url already exists in the file into which it is
      being inserted.

   */


   $url = $_POST['url'];
   $action = $_POST['action'];

   // Approve the photo
   if ($action == 'approve')
   {
      $approve_file = @fopen('approved.txt', 'a');
      fwrite($approve_file, $url);
      fclose($approve_file);

      echo 'Success';
   }

   // Reject the photo
   if ($action == 'reject')
   {
      $reject_file = @fopen('rejected.txt', 'a');
      fwrite($reject_file, $url);
      fclose($reject_file);

      echo 'Success';
   }

   // Remove the url from the holding file
   $holding_file = @file_get_contents('holding.txt');

   $holding_file = str_replace($url, '', $holding_file);

   file_put_contents('holding.txt', $holding_file);

?>