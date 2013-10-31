<!DOCTYPE html>
<html>
<head>
   <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/head.php"); ?>
   <link rel="stylesheet" type="text/css" href="events_styles.css">
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
            <span class="pagetitle">EVENTS</span>
            <span class="helptext v-align">Hover to see more information.</span>
            <a href="calendar" class="titlebar link flatbutton">See full calendar</a>
         </div>
         <div class="fullpage-contwrap">
            <div class="featured-container">
               <img src="featured_images/speaker2013.jpg">
               <div class="featured-overlay">
                  <div class="featured-overlay-bkgd"></div>
                  <div class="details">
                     <div class="top" id="title">Michael Habib, Ph.D. Lecture</div>
                     <div id="date">Tuesday, May 14th, 2013</div>
                     <div id="time">6:30 PM - 7:30 PM</div>
                     <div id="loc">Kinsey Pavilion 1240B</div>
                  </div>
                  <div class="links">
                     <div id="facebook">
                        <a href="http://facebook.com">View on Facebook</a>
                     </div>
                     <div id="add-to-cal">
                        <a href="http://www.google.com/calendar/event?action=TEMPLATE&text=Michael%20Habib%2C%20Ph.D.%20Lecture&dates=20130514T223000Z/20130514T233000Z&details=Test&location=Kinsey%20Pavilion%201240B&trp=true&sprop=Regents%20Scholar%20Society&sprop=name:www.rssla.org" target="_blank">Add to my calendar</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="wrap border-top shadow-top" style="text-align:center; margin-top: 20px;">
            <span><!-- EXTRA INFO GOES HERE --></span>
         </div>
      </div>
      <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/footer.php"); ?>
   </div>

<script src="events.js" type="text/javascript"></script>

</body>
</html>