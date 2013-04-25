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
            <span class="pagetitle">SPRING BANQUET</span>
         </div>
         <div style="margin-top:10px">
            <div class="cont half left">
               <div class="rowtitle w-o-line">Submit an Eboard skit</div>
               <div class="contentblock">
                  <p>This year's Eboard skit will be SNL featuring multiple shorts.
                     <br><br>
                     Submit your fun, crazy ideas below and the top five will be featured in the video. What have you always wanted an Eboarder to act out? You can also do a cameo if you'd like! 
                     <br><br>
                     Winners will get the $32 discount and 50 class points per idea. 
                     <br><br>
                     Deadline for submissions will be Week 4 Friday, Apr. 26, at midnight.</p>
                  <p>
                     <span>Name:</span>
                     <input type="text" id="name" size="20">
                  </p>
                  <textarea id="skit" cols="40" rows="10"></textarea><br>
                  <div id="append">
                     <input type="submit" id="submit" onclick="submitSkit()">
                  </div>
               </div>
            </div>
            <div class="cont half">
               <div class="rowtitle w-o-line">Pay for Banquet</div>
               <div class="contentblock">
                  <div class="wrap center" style="margin:25px">
                     <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top" style="padding: 20px 0;">
                        <input type="hidden" name="cmd" value="_s-xclick">
                        <input type="hidden" name="hosted_button_id" value="HKTT3SZFM2XDL">
                        <table style="margin: 0 auto">
                           <tr>
                              <td>
                                 <input type="hidden" name="on0" value="Options">Select an option:
                              </td>
                           </tr>
                           <tr>
                              <td>
                                 <select name="os0">
                                    <option value="Non-driver">Non-driver $35.00 USD</option>
                                    <option value="Driver">Driver $32.00 USD</option>
                                 </select>
                              </td>
                           </tr>
                        </table>
                        <input type="hidden" name="currency_code" value="USD">
                        <input type="submit" class="button">
                     </form>
                     <img src="/resources/images/banquet_banner.png" style="width: 100%">
                  </div>
               </div>
            </div>
         </div>
      </div>
      <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/footer.php"); ?>
   </div>
   <script>
      function submitSkit() {
         var skit = $("textarea#skit").val();
         var name = $("input#name").val();
         var data = "name=" + name + "&skit=" + skit;
         if (skit == "" || name == "")
            ;
         else
         {
            $.ajax({
               url: "submitSkit.php",
               type: "POST",
               data: data,
               dataType: "text"
            })
            .done(function (response) {
               $("<span style=\'margin-left:10px\'>" + response + "</span>").appendTo("#append").hide().fadeIn(200);
            });
         }
      }
   </script>
</body>
</html>