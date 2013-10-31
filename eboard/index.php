<!DOCTYPE html>
<html>
<head>
   <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/head.php"); ?>
   <link rel="stylesheet" type="text/css" href="eboard_styles.css">
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
            <span class="pagetitle">EBOARD SERVICES</span>
         </div>
         <div class="fullpage-contwrap">
            <div class="services-container">
               <div class="service">
                  <a href="bulletin">
                     <img src="/resources/images/eboard/bulletin.png"/>
                     <div>Submit Bulletin Post</div>
                  </a>
               </div>
               <div class="service">
                  <a href="classpoints">
                     <img src="/resources/images/eboard/classpoints_trophy.png"/>
                     <div>Update Class Points</div>
                  </a>
               </div>
               <div class="service">
                  <a href="merch">
                     <img src="/resources/images/eboard/merch.png"/>
                     <div>Manage Merchandise</div>
                  </a>
               </div>
               <div class="service">
                  <a href="mailmerge">
                     <img src="/resources/images/eboard/mail_merge.png"/>
                     <div>Mail Merge</div>
                  </a>
               </div>
               <div class="service">
                  <a href="header/manage.php">
                     <img src="/resources/images/eboard/manage_header.png"/>
                     <div>Manage Header Photos</div>
                  </a>
               </div>
               <div class="service">
                  <a href="manageEboard.php">
                     <img src="/resources/images/eboard/eboarders.png"/>
                     <div>Manage Eboard Information</div>
                  </a>
               </div>
               <!-- Add service nodes here -->
            </div>
         </div>
      </div>
      <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/footer.php"); ?>
   </div>
</body>
</html>