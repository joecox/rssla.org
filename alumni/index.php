<!DOCTYPE html>
<html>
<head>
   <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/head.php"); ?>
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
            <span class="pagetitle">ALUMNI</span>
            <div class="topnav v-align">
               <span class="topnavitem"><a href="/alumni/">Home</a></span>
               <!--
               <span class="topnavitem"><a href="database.php">Database</a></span>
               <span class="topnavitem"><a href="mailing.php">Mailing List</a></span>
               <span class="topnavitem"><a href="profiles/">Profiles</a></span>
               -->
               <span class="topnavitem"><a href="profiles/new_profile.php">Create a profile</a></span>
            </div>
         </div>
         <div class="fullpage-contwrap">
            <div class="cont half left">
               <div class="rowtitle top">
                  <span>Create an Alumni profile</span>
               </div>
               <div class="contentblock">
                  <span class="highlight">Add yourself to our Alumni network</span>
                  <p>List your expertise and share your experiences for the benefit of current members.</p>
                  <a class="button" href="profiles/new_profile.php">Create a profile</a>
               </div>
            </div>
   			<div class="cont half">
               <div class="rowtitle top">
                  <span>Donate to RSS!</span>
               </div>
               <div class="contentblock">
                  <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top" style="text-align:center" id="donate">
                     <div id="name_wrapper">
                       Your name: <input type="text" name="donate_name" id="donate_name" size="30"/><br/><br/>
                     </div>
                     <input type="checkbox" name="donate_anon" id="donate_anon"/>Donate Anonymously<br/><br/>
                     <input type="hidden" name="cmd" value="_s-xclick"/>
                     <input type="hidden" name="hosted_button_id" value="6S6QFU4RWBAHW"/>
                     <img id="donate_button" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" alt="PayPal - The safer, easier way to pay online!" style="cursor:pointer"/>
                     <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1"/>
                  </form>
                  <script>
                     $("#donate_anon").on("change", function(){
                         if ($(this).is(":checked")) $("#name_wrapper").hide();
                         else $("#name_wrapper").show();
                     });

                     $("#donate_button").on("click", function(){
                         if (!$("#donate_anon").is(":checked") && $("#donate_name").val())
                         {
                             $.ajax({
                                 url: "saveDonorName.php",
                                 type: "POST",
                                 dataType: "JSON",
                                 data: {name: $("#donate_name").val()}
                             })
                             .done(function(response){
                                $("form#donate").submit();
                             })
                             .fail(function(response){
                                $("form#donate").submit();
                             })
                         }
                         else
                         {
                           $("form#donate").submit();
                         }
                     });
                  </script>

      				<!-- <p>Senior Medals are $10, or $7 with an Alumni profile.</p>
                  <p><b>Already have a profile?</b>  Enter your Student ID in the field below and click Submit to access the discounted price.</p>
                  <p><b>Don't have a profile?</b>  Create one by clicking the link on the left.</p>
                  <input type="text" name="sid" size="10">
                  <input type="submit" id="append" onclick="checkAlumProf()">
                  <div class="wrap center" style="margin:25px">
                     <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top" style="padding: 20px 0;">
                        <input type="hidden" name="cmd" value="_s-xclick">
                        <input type="hidden" name="hosted_button_id" value="V6X47W7HUUF6N">
                        <table style="margin: 0 auto">
                           <tr>
                              <td>
                                 <input type="hidden" name="on0" value="Options">Select an option:
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 <select name="os0">
                                    <option value="Without Alumni Profile">Without Alumni Profile $10.00 USD</option>
                                 </select>
                              </td>
                           </tr>
                        </table>
                        <input type="hidden" name="currency_code" value="USD">
                        <input type="submit" class="button">
                     </form>
                  </div> -->
               </div>
   			</div>
         </div>
		</div>
      <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/footer.php"); ?>
   </div>
   <script>
      function checkAlumProf() 
      {
         var sid = $("input[name='sid']").val();
         if (sid != '')
         {
            var data = "sid=" + sid;
            $.ajax ({
               url: "checkAlumProf.php",
               type: "POST",
               data: data,
               dataType: "json"
            })
            .done(function (response)
            {
               if (response.response)
               {
                  $("option").remove();
                  $("select").append(response.html);
                  $("#failure").remove();
               }
               else
                  $("#append").after(response.html);
            });
         }
      }
   </script>
</body>
</html>