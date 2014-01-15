<!DOCTYPE html>
<html>
<head>
   <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/head.php"); ?>
</head>
<body>
   <div id="wrapper">
      <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/header.php"); ?>
      <div class="main clearfix">
         <div class="topbar">
            <span class="pagetitle">Winter Retreat</span>
            <!-- <div class="topnav v-align">
               <span class="topnavitem selected"><a href="">Current Page</a></span>
               <span class="topnavitem"><a href="">Other Page</a></span>
               <span class="topnavitem">Add Additional Here</span>
            </div> -->
         </div>
         <div class="fullpage-contwrap fixed-box">

            <div class="cont solo" style="font-weight: 400;">
               <p>Please select the payment option matching the info you have submitted in the Winter Retreat Signup Form.  If you will be providing snow chains for a driver (or yourself), select one of the snow chains options.</p>
               <br/><br/>
               <form action="https://www.paypal.com/cgi-bin/webscr" method="post" style="text-align: center;">
                  <input type="hidden" name="cmd" value="_s-xclick"/>
                  <input type="hidden" name="hosted_button_id" value="4MUBJGGD2SYCC"/>
                  <input type="hidden" name="on0" value="Retreat Attendee Type"/>Retreat Attendee Type<br/>
                  <select name="os0" style="width: 300px;">
                     <option value="Non-Driver">Non-Driver $50.00 USD</option>
                     <option value="Non-Driver with Snow Chains Discount">Non-Driver with Snow Chains Discount $45.00 USD</option>
                     <option value="Driver">Driver $20.00 USD</option>
                     <option value="Driver with Snow Chains Discount">Driver with Snow Chains Discount $15.00 USD</option>
                  </select><br/><br/>
                  <input type="hidden" name="on1" value="Your First and Last Name"/>Your First and Last Name<br/>
                  <input type="text" name="os1" maxlength="200" style="width: 300px;"/>
                  <input type="hidden" name="currency_code" value="USD"/>
                  <div style="margin-top: 30px">
                     <span class="button" id="submit">Submit</span>
                  </div>
               </form>
            </div>

         </div>
         <!-- Optional bottom bar
         <div class="bottombar">
            <span>Extra info here...</span>
         </div>
         -->
      </div>
      <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/footer.php"); ?>
   </div>

   <script>
      $("#submit").click(function () { $("form").submit(); });
   </script>
</body>
</html>