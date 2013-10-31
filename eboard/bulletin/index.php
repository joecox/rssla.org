<!DOCTYPE html>
<html>
<head>
   <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/head.php"); ?>
   <link rel="stylesheet" href="bulletin.css"/>
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
            <div class="rowtitle"><span>Submit Bulletin Post</span></div>
            <div class="contentblock">
               Select a post type:
               <select name="post_type" id="post_type">
                  <option value="event">Event</option>
                  <option value="committee">Committee Meeting</option>
                  <option value="ongoing">Ongoing Event</option>
                  <option value="opportunity">Opportunity</option>
               </select>
               <div class="post_form" id="event_post">
                  
               </div>
               <div class="post_form" id="committee_post">Committee
               </div>
               <div class="post_form" id="ongoing_post">Ongoing
               </div>
               <div class="post_form" id="opportunity_post">Opportunity
               </div>
            </div>
         </div>
      </div>
      <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/footer.php"); ?>
   </div>

   <script type="text/javascript" src="bulletin.js"></script>

</body>
</html>