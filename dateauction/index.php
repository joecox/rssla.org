<!DOCTYPE html>
<html>
<head>
   <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/head.php"); ?>
   <link rel="stylesheet" type="text/css" href="/_layout/stylesheets/dateauction_styles.css">
</head>
<body>
   <div id="wrapper">
      <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/header.php"); ?>
      <div class="main clearfix">
         <a href="#prev">
            <img class="prevframe" src="/resources/images/UI/prevbutton.png">
         </a>
         <div class="cont solo">
            <div class="profileframe" id="currentframe">
               <img class="side" src="/resources/images/dateauction/dylan_black.jpg">
            </div>
            <div class="profileframe" id="frame1">
            Frame 2
            </div>
            <div class="profileframe" id="frame2">
            Frame 3
            </div>
            <div class="profileframe" id="frame3">
            Frame 4
            </div>
            <div class="profileframe" id="frame4">
            Frame 5
            </div>
         </div>
         <a href="#next">
            <div class="nextframe">
            </div>
         </a>
      </div>
      <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/footer.php"); ?>
   </div>
</body>
</html>