<!DOCTYPE html>
<html>
<head>
   <title>Regents Scholar Society at UCLA</title>
   <link rel="icon" type="image/png" href="/resources/images/seal_favicon.png">
   <script src="/_layout/scripts/jquery.js"></script>
   <script src="global.js"></script>
   <?php 
      include($_SERVER['DOCUMENT_ROOT']."/_layout/scripts/officernames.php"); 
      include($_SERVER['DOCUMENT_ROOT']."/_layout/globals.php");
   ?>
   <link rel="stylesheet" type="text/css" href="global.css"/>
</head>
<body>
   <div id="wrapper">
      <?php include("header.php"); ?>
      <div class="main clearfix">
         <div class="bannerwrap">
            <img class="photobanner" src="">
            <div class="bannertext"></div>
         </div>
         <div class="wrap border-bottom shadow-bottom">
            <span class="pagetitle"><!-- TITLE GOES HERE --></span>
         </div>
         <div class="fullpage-contwrap">

         <!-- PLACE CONTENT HERE -->

         </div>
         <div class="wrap border-top shadow-top" style="text-align:center">
            <span><!-- EXTRA INFO GOES HERE --></span>
         </div>
      </div>
      <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/footer.php"); ?>
   </div>
</body>
</html>