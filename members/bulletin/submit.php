<!DOCTYPE html>

<html>
<head>
   <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/head.php"); ?>

<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/start/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.9.1.js"></script>
<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<link rel="stylesheet" href="/_layout/stylesheets/members_bulletin_datepicker.css">
<script>
   $(function() {
   $("#commDatepicker").datepicker();
   $("#oneDatepicker").datepicker();
   $("#startDatepicker").datepicker();
   $("#endDatepicker").datepicker();
   });
</script>
<style>
   /*.left {
       width: 30%;
       float: left;
       text-align: right;
   }
   .right {
       width: 65%;
       margin-left: 10px;
       float:left;
   }*/
</style>
</head>
<body>
   <div id="wrapper">
      <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/header.php"); ?>
      <div class="main clearfix">
         <div class="fullpage-contwrap">
            <div class="cont solo">
               <h2>Weekly Bulletin Submission Form</h2>
               <p>What type of post are you writing? 
                  <select id="postType" style="margin-left:10px">
                     <option value="cancel" selected>Please Select</option>
                     <option value="committee">Committee</option>
                     <option value="oneTime">One-Time</option>
                     <option value="recurring">Recurring</option>
                  </select>
               </p>
               <div class="formWrapper" id="cancel" style="display: block;">
                  <h5><i>None selected...</i></h5>
               </div>
               <div class="formWrapper" id="committee" style="display: none;">
                  <h3>Committee</h3>
                  <form id="commForm" action="addEvent.php" method="post">
                     <div class="left"><span>Committee: </div><div class="right"><input type="text" name="Title" placeholder="Name"></span></div><br>
                     <div class="left"><span>Date: </div><div class="right"><input type="text" name="Date" id="commDatepicker" placeholder="mm/dd/yyyy"></span></div><br>
                     <!--<input type="text" name="Time" placeholder="HH:MM">
                     	 -->
                     <div class="left"><span>Time: </div>
                        <div class="right">
                            <select name="timeHour" form="commForm">
                               <option value="none" selected>--</option>
                               <option value="1">1</option>
                               <option value="2">2</option>
                               <option value="3">3</option>
                               <option value="4">4</option>
                               <option value="5">5</option>
                               <option value="6">6</option>
                               <option value="7">7</option>
                               <option value="8">8</option>
                               <option value="9">9</option>
                               <option value="10">10</option>
                               <option value="11">11</option>
                               <option value="12">12</option></select>:
                           <select name="timeMinute" form="commForm">
                              <option value="none" selected>--</option>
                              <option value="00">00</option>
                              <option value="15">15</option>
                              <option value="30">30</option>
                              <option value="45">45</option></select></span>
                     <input type ="radio" name="AMPM" value="AM">AM<input type ="radio" name="AMPM" value="PM">PM</div><br>
                     <div class="left"><span>Site: </div><div class="right"><input type="text" name="Location" placeholder="Location, Bldg/Rm"></span></div><br>
                     <div class="left"><span>Contact: </div><div class="right"><input type="text" name="Contact" placeholder="name@domain.com"></span></div><br><br>
                     <input type="submit" value="Submit">
                     <input type="hidden" name="Committee" value="1">
                  </form><br><br>

               </div>
               <div class="formWrapper" id="oneTime" style="display: none;">
                  <h3>One-Time</h3>
                  <form id="onceForm" action="addEvent.php" method="post">
                     <div class="left"><span>Title: </div><div class="right"><input type="text" name="Title" placeholder="Event Name"></span></div><br>
                     <div class="left"><span>Date: </div><div class="right"><input type="text" name="Date" id="oneDatepicker" placeholder="mm/dd/yyyy"></span></div><br>
                     <div class="left"><span>Time: </div>
                        <div class="right">
                            <select name="timeHour" form="onceForm">
                               <option value="none" selected>--</option>
                               <option value="1">1</option>
                               <option value="2">2</option>
                               <option value="3">3</option>
                               <option value="4">4</option>
                               <option value="5">5</option>
                               <option value="6">6</option>
                               <option value="7">7</option>
                               <option value="8">8</option>
                               <option value="9">9</option>
                               <option value="10">10</option>
                               <option value="11">11</option>
                               <option value="12">12</option></select>:
                           <select name="timeMinute" form="onceForm">
                              <option value="none" selected>--</option>
                              <option value="00">00</option>
                              <option value="15">15</option>
                              <option value="30">30</option>
                              <option value="45">45</option></select></span>
                     <input type ="radio" name="AMPM" value="AM">AM<input type ="radio" name="AMPM" value="PM">PM</div><br>
                     <div class="left"><span>Site: </div><div class="right"><input type="text" name="Location" placeholder="City, Location, Bldg, Rm"></span></div><br>
                     <div class="left"><span>Contact: </div><div class="right"><input type="text" name="Contact" placeholder="name@domain.com"></span></div><br><br>
                     Description: <textarea rows="10" cols="100" name="Description" placeholder="Describe your event here..."></textarea><br><br>
                     <input type="submit" value="Submit">
                  </form><br><br>
               </div>
               <div class="formWrapper" id="recurring" style="display: none;">
                  <h3>Recurring</h3>
                  <form action="addEvent.php" method="post">
                     <div class="left"><span>Title: </div><div class="right"><input type="text" name="Title" placeholder="Event Name"></span></div><br>
                     <div class="left"><span>Start Date: </div><div class="right"><input type="text" name="startDate" id="startDatepicker" placeholder="mm/dd/yyyy"></span></div><br>
                     <div class="left"><span>End Date: </div><div class="right"><input type="text" name="endDate" id="endDatepicker" placeholder="mm/dd/yyyy"></span></div><br>
                     <div class="left"><span>Contact: </div><div class="right"><input type="text" name="Contact" placeholder="name@domain.com"></span></div><br>
                     Description: <textarea rows="10" cols="100" name="Description" placeholder="Describe your event here..."></textarea><br><br>
                     <input type="submit" value="Submit">
                  </form><br><br>
               </div>
            </div>
            </div>
         </div>
         <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/footer.php"); ?>
      </div>
   </body>
   <script>
      function showPostBlock ()
      {
      $(".formWrapper").hide();
      $(".formWrapper#" + $("#postType").val()).show();
      }

      $(document).ready(function ()
      {
      showPostBlock ();
      });

      $("#postType").change(function ()
      {
      showPostBlock ();
      });
   </script>
</html>
