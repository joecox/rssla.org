<!DOCTYPE html>

<html>
<head>
   <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/head.php"); ?>
   <style>
   span {
      padding-right: 15px;
   }
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
                  <h6><i>None selected...</i></h6>
               </div>
               <div class="formWrapper" id="committee" style="display: none;">
                  <h3>Committee</h3>
                  <form action="databaseFile"> /*insert name of Evan's php*/
                     <span>Committee: <input type="text" name="Title" placeholder="Name"></span><br>
                     <span>Date: <input type="text" name="Date" placeholder="mm/dd/yyyy"></span><br> <!-- jQuery UI datepickers: add library to script + call it here or... -->
                     <span>Time: <input type="text" name="Time" placeholder="HH:MM"></span><br> <!-- add HH + MM (15 increment) dropdowns, radio AM/default PM -->
                     <span>Site: <input type="text" name="Location" placeholder="Location, Bldg/Rm"></span><br><br>
                     <input type="submit" value="Submit">
                  </form><br><br>

               </div>
               <div class="formWrapper" id="oneTime" style="display: none;">
                  <h3>One-Time</h3>
                  <form action="//insert URL of backend section//">
                     <span>Title: <input type="text" name="Title" placeholder="Event Name"></span><br>
                     <span>Date: <input type="text" name="Date" placeholder="mm/dd/yyyy"></span><br>
                     <span>Time: <input type="text" name="Time" placeholder="HH:MM"></span><br>
                     <span>Site: <input type="text" name="Location" placeholder="City, Location, Bldg, Rm"></span><br><br>
                     Description: <textarea rows="10" cols="100" name="Description" placeholder="Describe your event here..."></textarea><br><br>
                     <input type="submit" value="Submit">
                  </form><br><br>
               </div>
               <div class="formWrapper" id="recurring" style="display: none;">
                  <h3>Recurring</h3>
                  <form action="//insert URL of backend section//">
                     <span>Title: <input type="text" name="Title" placeholder="Event Name"></span>
                     <span>Start Date: <input type="text" name="startDate" placeholder="mm/dd/yyyy"></span>
                     <span>End Date: <input type="text" name="startDate" placeholder="mm/dd/yyyy"></span><br><br>
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