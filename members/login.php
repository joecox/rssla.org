<?php

   $email = $_POST["email"];
   $pw = $_POST["pw"];

   include($_SERVER['DOCUMENT_ROOT']."/_modules/globals.php");
   include($DB_MODULE);

   db_connect();

   $response = array();

   $results = db_select("SELECT id, hash FROM members WHERE email='".$email."';");

   if (count($results) > 0)
   {
      $hash = $results[0]["hash"];

      if (crypt($pw, $hash) == $hash)
      {
         $response["success"] = true;
         $response["userId"] = $results[0]["id"];
         $response["sessionId"] = generateSessionId($response["userId"]);
         echo json_encode($response);
      }
      else
      {
         $response["success"] = false;
         $response["fail_msg"] = "Incorrect Password.";
         echo json_encode($response);
      }
   }
   else
   {
      $response["success"] = false;
      $response["fail_msg"] = "Incorrect Email and/or Password.";
      echo json_encode($response);
   }

   function generateSessionId($userId)
   {

      $sessionId = createRandomVal(20);
      db_insert("INSERT INTO session(userId, sessionId) VALUES('".$userId."','".$sessionId."');");
      return $sessionId;
   }

   function createRandomVal($val)
   {
      $chars="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789,-";
      srand((double)microtime()*1000000);
      $i = 0;
      $pass = '' ;
      while ($i<=$val) 
      {
         $num  = rand() % 33;
         $tmp  = substr($chars, $num, 1);
         $pass = $pass . $tmp;
         $i++;
      }
      return $pass;
   }

?>