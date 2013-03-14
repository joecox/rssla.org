<!DOCTYPE html>
<html>
<head>
   <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/head.php"); ?>
</head>
<body>
   <?php
      $cm_pieces = explode("98fdgdDB7dfkt", $_GET['cm']);
      $addr = $cm_pieces[0];
      $session = $cm_pieces[1];
   ?>
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
               <p>Your information has been submitted and your payment has been processed.  An email confirmation has been sent to <b><?php echo $addr ?></b>.  You will also receive an email in a few days from the coordinators of the session you signed up for with more information regarding OSP.</p>
               <p><b>If you do not receive a confirmation email, or if you believe there has been an error, please contact <?php echo $outrFL; ?> at <a class="norm" href="mailto:outreach@rssla.org">outreach@rssla.org</a></b></p>
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

   <?php
      if ($_GET['st'] == "Completed")
      {
         $subj = "OSP Signup Confirmation";
         $from_addr = "From: website@rssla.org";
         if ($session == 6)
         {
            $msg = "Thank you for signing up for Transfer OSP!  We have recorded your information and your payment has been processed.  You're all set to go.  Within a few days you will receive an email from one of the student coordinators of your session with more information regarding OSP.";
         }
         else
         {
            $msg = "Thank you for signing up for OSP Session ".$session."!  We have recorded your information and your payment has been processed.  You're all set to go.  Within a few days you will receive an email from one of the student coordinators of your session with more information regarding OSP.";
         }
         mail($addr, $subj, $msg, $from_addr);

         $msg = 'Prospie with email "'.$addr."' has paid.";
         $subj = "OSP Payment";
         switch($session)
         {
            case 1:
               mail("emparker58@gmail.com", $subj, $msg, $from_addr);
               break;
            case 2:
               mail("sedinaalicic@yahoo.com", $subj, $msg, $from_addr);
               break;
            case 3:
               mail("vishal_s_yadav@yahoo.com", $subj, $msg, $from_addr);
               break;
            case 4:
               mail("joeyalancox@gmail.com", $subj, $msg, $from_addr);
               break;
            case 5:
               mail("brennanchang@outlook.com", $subj, $msg, $from_addr);
               break;
            case 6:
               mail("outreach@rssla.org", $subj, $msg, $from_addr);
         }
      }
   ?>

</body>
</html>