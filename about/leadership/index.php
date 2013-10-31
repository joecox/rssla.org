<!DOCTYPE html>
<html>
<head>
   <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/head.php"); ?>
   <link rel="stylesheet" type="text/css" href="../about.css">
</head>
<body>
   <div id="wrapper">
      <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/header.php"); ?>
      <div class="main clearfix">
         <div class="wrap border-bottom shadow-bottom">
            <span class="pagetitle">ABOUT</span>
            <?php $selected = "leadership"; include($root."/about/about_topnav_template.php"); ?>
         </div>
         <div class="fullpage-contwrap">
            <div class="contentblock" style="margin: 0 40px 20px">
               <?php

                  $dbh = mysql_connect("localhost", $DB_USER, $DB_PW);
                  mysql_select_db($DB_NAME);

                  $query = "SELECT * FROM eboard";
                  $result = mysql_query($query);

                  for ($ii = 0; $ii < mysql_num_rows($result); $ii++)
                  {
                     $row = mysql_fetch_assoc($result);
                     echo "<div class=\"eboard-row\">";
                     echo "<img src=\"/resources/images/eboarders/".$row['image_name']."\"/>";
                     echo "<div class=\"text-container\">";
                     if (!($ii % 2))
                     {
                        echo "<div class=\"eboard-position\">".$row['name']." / <span>".$row['position_full']."</span></div>";
                     }
                     else
                     {
                        echo "<div class=\"eboard-position\"><span>".$row['position_full']."</span> / ".$row['name']."</div>";
                     }
                     echo "<p class=\"eboard-description\">".$row['blurb']."</p>";
                     echo "</div>";
                     echo "</div>";
                  }

               ?>
            </div>
         </div>
      </div>
      <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/footer.php"); ?>
   </div>
</body>
</html>