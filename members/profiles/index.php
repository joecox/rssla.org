<!DOCTYPE html>
<html>
<head>
   <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/head.php"); ?>
</head>
<body>
   <div id="wrapper">
      <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/header.php"); ?>
      <div class="main clearfix">
         <div class="bannerwrap">
            <img class="photobanner" src="">
            <div class="bannertext"></div>
         </div>
         <div class="wrap border-bottom shadow-bottom">
            <span class="pagetitle">MEMBER PROFILES</span>
            <div class="topnav v-align">
               <span class="topnavitem selected">Profiles</span>
               <span class="topnavitem">Create Profile</span>
               <!-- <span class="topnavitem">Search Profiles</span> -->
            </div>
         </div>
         <div class="fullpage-contwrap">
            <div class="contentblock">
               <?php

                  include($_SERVER['DOCUMENT_ROOT']."/_modules/globals.php");
                  include($DB_MODULE);

                  db_connect();

                  $up_bound = (int) date('Y');
                  $low_bound = $up_bound - 3;
                  $results = db_select("SELECT * FROM `members-old` WHERE entered_ucla >= ".$low_bound." AND entered_ucla <= ".$up_bound." ORDER BY last_name ASC");

                  for ($ii = 0; $ii < sizeof($results); $ii++)
                  {
                     $row = $results[$ii];
                     echo $row['first_name']." ".$row['last_name'] . "<br>";
                  }

               ?>
            </div>
         </div>
      </div>
      <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/footer.php"); ?>
   </div>
</body>
</html>