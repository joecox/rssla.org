<!DOCTYPE html>
<html>
<head>
   <link type="text/css" rel="stylesheet" href="confirmation.css"/>
   <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/head.php"); ?>
</head>
<body>
   <div id="wrapper">
      <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/header.php"); ?>
      <div class="main clearfix">
         <div class="topbar">
            <span class="pagetitle">Class Points</span>
            <div class="topnav v-align">
               <span class="topnavitem"><a href="index.php">Home</a></span>
               <span class="topnavitem"><a href="photosubmit.php">Submit a Photo</a></span>
               <!-- <span class="topnavitem">Add Additional Here</span> -->
            </div>
         </div>
         <div class="fullpage-contwrap">
            <div class="pagetitle" id="success">Success! Thank you for your submission.</div>

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