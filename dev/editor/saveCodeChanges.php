<?php

   $ip = $_SERVER["REMOTE_ADDR"];
   $sessionId = $_COOKIE["sessionId"];
   $code = $_POST["code"];

   include($_SERVER["DOCUMENT_ROOT"]."/_modules/globals.php");
   include($DB_MODULE);

   db_connect();

   $affected_rows = db_insert("UPDATE editor_users SET code='".$code."' WHERE ip='".$ip."' AND sessionId='".$sessionId."';");

   db_close();

   $response["success"] = (count($affected_rows) > 0);

   exit(json_encode($response));

?>