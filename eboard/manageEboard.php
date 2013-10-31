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
         <?php $selected="eboarders"; include($root."/eboard/eboard_sidenav.php"); ?>
         <div class="cont three-quarters">
            <div class="rowtitle"><span>Edit Eboard Information</span></div>
            <div class="contentblock">
               <?php

                  $dbh = mysql_connect("localhost", $DB_USER, $DB_PW);
                  mysql_select_db($DB_NAME);

                  $query = "SELECT * FROM eboard";
                  $result = mysql_query($query);

                  $eboarders = array();

                  for ($ii = 0; $ii < mysql_num_rows($result); $ii++)
                  {
                     $row = mysql_fetch_assoc($result);
                     $eboarders[$row['position']] = $row;
                  }

                  echo "<select class=\"eboarder-select\">";
                  echo "<option value=\"nil\">Select an Eboarder</option>";
                  foreach ($eboarders as $position)
                  {
                     echo "<option value=\"".$position['position']."\">".$position['position']."</option>";
                  }
                  echo "</select>";

               ?>

               <div class="eboarder">
                  <form enctype="multipart/form-data" method="post" name="eboarder">
                  <div>
                     <img src="">
                     <div class="text-container">
                        <input type="text" class="name" name="name"/>
                        <textarea class="blurb" name="blurb"></textarea>
                     </div>
                  </div>
                  <input type="hidden" name="MAX_FILE_SIZE" value="30000000"/>
                  <input type="file" name="image" class="file"/>
                  <div class="savebuttonwrap">
                     <span class="button" id="submit">Save</span>
                     <span style="margin-left: 20px" id="response"></span>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/footer.php"); ?>
   </div>

   <script type="text/javascript">
      var eboarders = <?php echo json_encode($eboarders); ?>;
      var selected;

      $(".eboarder-select").change(function ()
      {
         if ($(this).val() == "nil")
         {
            $(".eboarder").css("visibility", "hidden");
            return;
         }

         var eboarder = eboarders[$(this).val()];
         selected = eboarder;
         $(".eboarder").css("visibility", "visible");
         $(".eboarder img").attr("src", "/resources/images/eboarders/" + eboarder['image_name']);
         $(".eboarder .name").val(eboarder['name']);
         $(".eboarder .blurb").val(eboarder['blurb']);
      });

      $("input.file").on("change", function (e)
      {
         var file = e.target.files[0];

         var reader = new FileReader();
         reader.onload = (function (f)
         {
            return function (evt)
            {
               $(".eboarder img").attr("src", evt.target.result);
            }
         })(file);
         reader.readAsDataURL(file);
      });

      $("#submit").click(function ()
      {
         var form = new FormData(document.forms.namedItem("eboarder"));
         form.append("position", selected['position']);

         var request = new XMLHttpRequest();
         request.open("POST", "update.php");
         request.onload = function (e)
         {
            var response = JSON.parse(request.response);
            if (response.success)
            {
               $("#response").text("The information was successfully saved.");
            }
            else
            {
               $("#response").text("Something went wrong. Please refresh and try again.");
            }
         }
         request.send(form);
      });
   </script>
   
</body>
</html>