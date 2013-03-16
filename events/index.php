<!DOCTYPE html>
<html>
<head>
   <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/head.php"); ?>
</head>
<link href="calendar_style.css" rel="stylesheet" type="text/css"/>
<body>
   <div id="wrapper">
      <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/header.php"); ?>
      <div class="main clearfix">

<div id="left" onclick="slide_cal_left()">left</div>
<div id="right" onclick="slide_cal_right()">right</div>

<div id="calendar_canvas">
</div>
        This is a calendar.


      </div>
      <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/footer.php"); ?>
   </div>
   
<script type="text/javascript" charset="utf-8" src="calendar.js"></script>
</body>
</html>
