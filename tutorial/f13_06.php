<!DOCTYPE html>
<html>
<head>
   <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/head.php"); ?>
</head>
<body>
   <div id="wrapper">
      <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/header.php"); ?>
      <div class="main clearfix">
         <div class="topbar">
            <span class="pagetitle">Title</span>
            <!-- <div class="topnav v-align">
               <span class="topnavitem selected"><a href="">Current Page</a></span>
               <span class="topnavitem"><a href="">Other Page</a></span>
               <span class="topnavitem">Add Additional Here</span>
            </div> -->
         </div>
         <div class="fullpage-contwrap">
            <div class="contentblock">
               <pre>
                  <?php

                     error_reporting(E_ALL);
                     include($DB_MODULE);

                     db_connect();

                     $results = db_select_all("tutorial");

                     for ($i = 0; $i < sizeof($results); $i++)
                     {
                        $person = $results[$i];
                        $id = $person["id"];
                        $name = $person["name"];
                        $year = $person["year"];
                        $fav_pizza = $person["favorite_pizza"];
                        $shoes = $person["shoes_owned"];

                        echo $name . "," . $year . "," . $fav_pizza . "," . $shoes . "\n";
                     }
                  ?>
               </pre>
            </div>
         </div>
         <!-- Optional bottom bar
         <div class="bottombar">
            <span>Extra info here...</span>
         </div>
         -->
      </div>
      <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/footer.php"); ?>
   </div>
</body>
</html>