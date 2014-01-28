<?php

   include($_SERVER['DOCUMENT_ROOT']."/_modules/globals.php");
   include($DB_MODULE);

   $sid = $_POST['sid'];

   db_connect();

   $query = "SELECT * FROM current_sid WHERE sid=" . $sid;

   $results = db_select($query);

   $response = array();
   $response["success"] = true;
   
   if (count($results) > 0)
   {   
      $response["valid_sid"] = true;
   }
   else
   {
      $response["valid_sid"] = false;
   }
   echo json_encode($response);

?>