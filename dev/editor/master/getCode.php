<?php

   include($_SERVER["DOCUMENT_ROOT"]."/_modules/globals.php");
   include($DB_MODULE);

   db_connect();

   $results = db_select("SELECT id, code FROM editor_users");

   if (count($results > 0))
   {
      $response["success"] = true;
      $response["code"] = $results;
   }
   else
   {
      $response["success"] = false;
   }
   exit(json_encode($response));

?>