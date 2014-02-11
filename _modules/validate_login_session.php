<?php

   $valid_session;

   include_once($DB_MODULE);

   // Returns $userId or -1 on failure
   function valid_login_session()
   {
      global $valid_session;

      if (isset($_COOKIE["userId"]) && isset($_COOKIE["sessionId"]))
      {
         db_connect();

         $results = db_select("SELECT * FROM session WHERE userId='".$_COOKIE["userId"]."' AND sessionId='".$_COOKIE["sessionId"]."';");

         if (count($results) > 0)
         {
            $valid_session = true;
            echo "<script>";
            echo "var userId = " . $_COOKIE["userId"];
            echo "</script>";
            return $_COOKIE["userId"];
         }
         else
         {
            $valid_session = false;
            return -1;
         }
      }
      else
      {
         $valid_session = false;
         return -1;
      }
   }
   
?>