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
            <div class="topnav v-align">
               <span class="topnavitem selected"><a href="">Current Page</a></span>
               <span class="topnavitem"><a href="">Other Page</a></span>
               <!-- <span class="topnavitem">Add Additional Here</span> -->
            </div>
         </div>
         <div class="fullpage-contwrap">

         <!-- PLACE CONTENT HERE -->

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