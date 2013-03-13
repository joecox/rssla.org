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
         <div class="cont quarter left" id="sidebar">
            <div class="pagetitle">PROSPECTIVE SCHOLARS</div>
         </div>
         <div class="cont three-quarters" style="height: 400px">
            <div class="rowtitle"><span>Overnight Stay Program</span></div>
            <div class="contentblock" style="text-align: center">
               <div class="highlight">Thank you for signing up for OSP!</div>
               <p>Your information has been submitted and your payment has been processed.  An email confirmation has been sent to the address you specified on the signup form.  You will also receive an email in a few days from the coordinators of the session you signed up for with more information regarding OSP.</p>
<!--
               <form method="post" action="https://www.sandbox.paypal.com/cgi-bin/webscr">
                  <input type="hidden" name="cmd" value="_notify-synch">
                  <input type="hidden" name="tx" value="<?php echo $_GET['tx']; ?>">
                  <input type="hidden" name="at" value="46NzI4Lq8v_jGhvRPvnEHcQ_F-CFebCU6OO_djratGMWeWOWYHs5ASFoW1W">
                  <input type="submit" value="PDT">
               </form>
-->
            </div>
         </div>
      </div>
      <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/footer.php"); ?>
   </div>
</body>
</html>