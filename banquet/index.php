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
                  <p>This year's Eboard skit will be SNL featuring multiple shorts. Submit your fun, crazy ideas below and the top five will be featured in the video. What have you always wanted an Eboarder to act out? You can also do a cameo if you'd like! Winners will get the $32 discount and 50 class points per idea. Deadline for submissions will be Week 4 Friday, Apr. 26, at midnight.</p>
                  <textarea name="idea" cols="60" rows="10"></textarea><br>
                  <input type="submit">
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
                  </div>
               </div>
            </div>
         </div>
      </div>
      <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/footer.php"); ?>
   </div>
</body>
</html>