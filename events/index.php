<!DOCTYPE html>
<html>
<head>
   <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/head.php"); ?>
</head>
<link href="/_layout/stylesheets/events_styles.css" rel="stylesheet" type="text/css"/>
<body>
   <div id="wrapper">
      <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/header.php"); ?>
      <div class="main clearfix">

        <div id="cal_nav_wrapper">
          <div class="cal_nav_button">
            <img src="/resources/images/UI/prevbutton.png"
                 onclick="slide_cal_right()">
          </div>
          <div id="calendar_canvas">
          </div>
          <div class="cal_nav_button">
            <img src="/resources/images/UI/nextbutton.png"
                 onclick="slide_cal_left()">
          </div>
        </div>


      </div>
      <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/footer.php"); ?>
   </div>
   
<script type="text/javascript" charset="utf-8" 
        src="/_layout/scripts/events_objects.js"></script>
<script type="text/javascript" charset="utf-8" src="/_layout/scripts/events.js"></script>
<script type="text/javascript" charset="utf-8"
        src="https://www.google.com/calendar/feeds/932agq27os62bh2qo2gg0k3cak%40group.calendar.google.com/public/full?alt=json-in-script&callback=gotEvents">
</script>


</body>
</html>
