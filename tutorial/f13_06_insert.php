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
               <?php

                  $name = $_POST["name"];
                  $year = $_POST["year"];
                  $fav_pizza = $_POST["fav_pizza"];
                  $shoes = $_POST["shoes"];

                  include($DB_MODULE);
                  db_connect();

                  $query = "INSERT INTO `tutorial_copy` VALUES ('" . $name . "'," . $year . ",'" .
                                                                     $fav_pizza . "'," . $shoes . ");";
                  var_dump($_POST);

                  db_insert($query);

               ?>
               <form method="POST">
                  Name<input type="text" name="name" /><br/>
                  Year<input type="text" name="year" /><br/>
                  Favorite Pizza<input type="text" name="fav_pizza" /><br/>
                  Shoes<input type="text" name="shoes" /><br/>
                  <input type="submit" />
               </form>
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