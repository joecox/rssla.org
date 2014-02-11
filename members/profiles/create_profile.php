<?php

   $sid = $_POST["sid"];
   $fname = $_POST["fname"];
   $lname = $_POST["lname"];
   $year = $_POST["year"];
   $transfer = empty($_POST["transfer"]) ? 0 : 1;
   $email = $_POST["email"];
   $pw = $_POST["pw"];

   $response = array();
   
   $hashed_pw = generateHash($pw);

   if (!$hashed_pw)
   {
      $response["success"] = false;
      echo json_encode($response);
   }
   else
   {
      include($_SERVER['DOCUMENT_ROOT']."/_modules/globals.php");
      include($DB_MODULE);

      db_connect();

      $results = db_select("SELECT id from members WHERE sid=".$sid);
      if (count($results) > 0)
      {
         $results["success"] = false;
         $results["user_exists"] = true;
         exit(json_encode($results));
      }

      $query = "INSERT INTO members(sid, hash, first_name, last_name, is_active, year, is_transfer, email) ";
      $query.= "VALUES('".$sid."','".$hashed_pw."','".$fname."','".$lname."',"."1".",".$year.",".$transfer.",'".$email."');";

      if (db_insert($query))
      {
         /* Send Mail */
         $to = $fname . " " . $lname . "<" . $email . ">";
         $subject = "Welcome to rssla.org!";
         $from = "From: rssla.org <website@rssla.org>";
         $msg = "Test";
         mail($to, $subject, $msg, $from, '-fwebsite@rssla.org');

         /*************/


         $response["success"] = true;

         $results = db_select("SELECT id from members WHERE sid=".$sid);

         $response["userId"] = $results[0]["id"];
         $response["sessionId"] = generateSessionId($response["userId"]);
         echo json_encode($response);
      }
      else
      {
         $response["success"] = false;
         echo json_encode($response);
      }
   }

   function generateHash($password)
   {
      if (defined("CRYPT_BLOWFISH") && CRYPT_BLOWFISH)
      {
         $salt = '$2y$11$' . substr(md5(uniqid(rand(), true)), 0, 22);
         return crypt($password, $salt);
      }
      else
      {
         return false;
      }
   }

   function generateSessionId($userId)
   {

      $sessionId = createRandomVal(20);
      db_insert("INSERT INTO session VALUES('".$userId."','".$sessionId."');");
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