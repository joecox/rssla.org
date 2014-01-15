<!DOCTYPE html>
<html>
<head>
   <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/head.php"); ?>
   <link rel="stylesheet" href="bulletin_review.css"/>
</head>
<body>
   <div id="wrapper">
      <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/header.php"); ?>
      <div class="main clearfix">
         <div class="bannerwrap">
            <img class="photobanner" src="">
            <div class="bannertext"></div>
         </div>
         <?php $selected="bulletin"; include($root."/eboard/eboard_sidenav.php"); ?>
         <div class="cont three-quarters">
            <div class="rowtitle"><span>Review Bulletin</span></div>
            <div class="contentblock">
               <div id="bulletin-preview-container">
               </div>
               <div class="button-wrap right">
                  <span class="button" id="save">Save &amp; Regenerate</span>
                  <span class="button" id="send">Send</span>
               </div>
            </div>
         </div>
      </div>
      <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/footer.php"); ?>
   </div>

   <?php
      $bulletin_file = @file_get_contents($_SERVER['DOCUMENT_ROOT'].'/members/bulletin/generated_bulletins/f13_06.html', r);
      $bulletin_html = "\"" . preg_replace('/>[ \n\t]+</', "><", addslashes($bulletin_file)) . "\"";
   ?>
   <script type="text/javascript">
      $bulletin_container = $("#bulletin-preview-container");
      $bulletin_container.html(<?php echo $bulletin_html; ?>);
   </script>
   <script src="bulletin_review.js"></script>

</body>
</html>