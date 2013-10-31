<?php

   include($_SERVER['DOCUMENT_ROOT'].'/_layout/globals.php');

   $response = array();
   $anyFailed = false;

   $position = mysql_real_escape_string($_POST['position']);
   $name = mysql_real_escape_string($_POST['name']);
   $blurb = mysql_real_escape_string($_POST['blurb']);

   if (!empty($_FILES['image']['name']))
   {
      $response['file_isset'] = true;
      $uploaddir = $_SERVER['DOCUMENT_ROOT'].'/resources/images/eboarders/';
      $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
      $image_name = strtolower(str_replace(' ', '', $name)).'.'.$ext;
      $uploadfile = $uploaddir.$image_name;

      if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile))
      {
         $response['file_move_success'] = true;
      }
      else
      {
         $response['file_move_success'] = false;
         $anyFailed = true;
      }
   }
   else
   {
      $response['file_isset'] = false;
   }

   $dbh = mysql_connect("localhost", $DB_USER, $DB_PW);
   if (!$dbh)
   {
      $response['DB_connect_success'] = false;
      $anyFailed = true;
   }
   else
   {
      $response['DB_connect_success'] = true;
   }

   if (mysql_select_db($DB_NAME, $dbh))
   {
      $response['DB_select_success'] = true;
   }
   else
   {
      $response['DB_select_success'] = false;
      $anyFailed = true;
   }

   if (!empty($_FILES['image']['name']))
   {
      $query = "UPDATE eboard SET name=\"".$name."\", image_name=\"".$image_name."\", blurb=\"".$blurb."\" WHERE position=\"".$position."\"";
   }
   else
   {
      $query = "UPDATE eboard SET name=\"".$name."\", blurb=\"".$blurb."\" WHERE position=\"".$position."\"";
   }

   $response['query'] = $query;
   if (mysql_query($query))
   {
      $response['query_success'] = true;
   }
   else
   {
      $response['query_success'] = false;
      $anyFailed = true;
      $response['query_failure_msg'] = mysql_error();
   }

   $response['position'] = $position;
   $response['name'] = $name;
   $response['blurb'] = $blurb;
   if (!$anyFailed)
   {
      $response['success'] = true;
   }
   else
   {
      $reponse['success'] = false;
   }

   mysql_close($dbh);

   echo json_encode($response);

?>