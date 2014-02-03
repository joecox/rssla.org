<?php

   include($_SERVER['DOCUMENT_ROOT']."/_modules/globals.php");
   include($DB_MODULE);

   db_connect();

   $response = array();

   if(isset($_POST["name"]))
   {
      $query = "INSERT INTO donors(donor_name) VALUES('" . $_POST["name"] . "')";
      $response["success"] = !(db_insert($query) == 0);
   }
   else
   {
      $response["success"] = false;
   }

   echo json_encode($response);

?>