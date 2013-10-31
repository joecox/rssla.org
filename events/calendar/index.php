<!DOCTYPE html>
<html>
<head>
   <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/head.php"); ?>
</head>
<link href="cal_styles.css" rel="stylesheet" type="text/css"/>
<body>
   <div id="wrapper">
      <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/header.php"); ?>

      <div class="veil" onclick="closeOverlay();"></div>
      <div class="cal_overlay">
        <div class="cal_overlay_title">hello</div>
        <div class="cal_overlay_exit" onclick="closeOverlay();">[x]</div>
        <div class="cal_overlay_content"></div>
        
      </div>
      <div class="main clearfix">

        <div id="cal_nav_wrapper">
          <div class="cal_nav_button">
            <img src="/resources/images/UI/prevbutton.png"
                 onclick="slide_cal_right()" style="cursor:pointer">
          </div>
          <div id="calendar_canvas">
            <div id="cal_goto_today">Today</div>
          </div>
          <div class="cal_nav_button">
            <img src="/resources/images/UI/nextbutton.png"
                 onclick="slide_cal_left()" style="cursor:pointer">
          </div>
        </div>


      </div>
      <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/footer.php"); ?>
   </div>
   
<script type="text/javascript" charset="utf-8" src="cal_Utils.js"></script>
<script type="text/javascript" charset="utf-8" src="cal_CalObject.js"></script>
<script type="text/javascript" charset="utf-8" src="cal_EvObject.js"></script>
<script type="text/javascript" charset="utf-8" src="cal.js"></script>

</body>
</html>
