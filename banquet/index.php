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

            <img src="/resources/images/banquet_banner.png">
         </div>
      </div>
      <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/footer.php"); ?>
   </div>
</body>
</html>