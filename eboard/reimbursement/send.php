<?php

   $name = $_POST['name'];
   $contact = $_POST['phone_email'];
   $committee = $_POST['committee'];
   $event_name = $_POST['event_name'];
   $event_date = $_POST['event_date'];

   // Event budget

   $budget_charges = array();
   $budget_prices = array();
   $budget_reasons = array();

   $num_budget_rows = $_POST['event_budget_row_count'];

   for ($ii = 1; $ii <= $num_budget_rows; $ii++)
   {
      array_push($budget_charges, $_POST['budget_charge_'.$ii]);
      array_push($budget_prices, $_POST['budget_price_'.$ii]);
      array_push($budget_reasons, $_POST['budget_reason_'.$ii]);
   }

   // Payees

   $payees_items = array();
   $payees_prices = array();
   $payees_lists = array();
   $payees_reasons = array();

   $num_payees_rows = $_POST['payees_row_count'];

   for ($ii = 1; $ii <= $num_payees_rows; $ii++)
   {
      array_push($payees_items, $_POST['payees_item_'.$ii]);
      array_push($payees_prices, $_POST['payees_price_'.$ii]);
      array_push($payees_lists, $_POST['payees_list_'.$ii]);
      array_push($payees_reasons, $_POST['payees_reason_'.$ii]);
   }

   // Scans

   $num_scans = $_POST['scans_row_count'];

   $scans = array();

   for ($ii = 1; $ii <= $num_scans; $ii++)
   {
      if (file_exists($_FILES['scan_'.$ii]['tmp_name']) && is_uploaded_file($_FILES['scan_'.$ii]['tmp_name']))
      {
         array_push($scans, $_FILES['scan_'.$ii]['tmp_name']);
      }
   }

   $subject = "[RSS Eboard Services] New Reimbursement Request";

   $message = "A reimbursement request has been submitted on RSSLA.org.  Below are the details.";
   $message .= "<br/><br/>";
   $message .= "<pre style=\"font-size: 1.2rem;\">";
   $message .= "Name: " . $name . "<br/>";
   $message .= "Contact: " . $contact . "<br/>";
   $message .= "Committee: " . $committee . "<br/>";
   $message .= "Event Name: " . $event_name . "<br/>";
   $message .= "Event Date: " . $event_date . "<br/><br/>";

   $message .= "<b>Event Budget</b><br/><br/>";

   for ($ii = 0; $ii < $num_budget_rows; $ii++)
   {
      $message .= "Charge: " . $budget_charges[$ii] . "<br/>";
      $message .= "Price: " . $budget_prices[$ii] . "<br/>";
      $message .= "Reason: " . $budget_reasons[$ii] . "<br/><br/>";
   }

   $message .= "<b>Reimbursement Details</b><br/><br/>";

   for ($ii = 0; $ii < $num_payees_rows; $ii++)
   {
      $message .= "Item: " . $payees_items[$ii] . "<br/>";
      $message .= "Price: " . $payees_prices[$ii] . "<br/>";
      $message .= "Payees: " . $payees_lists[$ii] . "<br/>";
      $message .= "Reason: " . $payees_reasons[$ii] . "<br/><br/>";
   }

   include($_SERVER["DOCUMENT_ROOT"]."/resources/scripts/phpMailer/class.phpmailer.php");

   $mailer = new PHPMailer();
   $mailer->SetFrom("website@rssla.org", "rssla.org");
   $mailer->Sender = "website@rssla.org";
   $mailer->AddAddress("communications@rssla.org");
   $mailer->Subject = $subject;

   // Handle scan embed
   for ($ii = 0; $ii < count($scans); $ii++)
   {
      $mailer->AddEmbeddedImage($scans[$ii], "scan_".$ii, "scan_".$ii.".png");
      $message .= '<img alt="PHPMailer" src="cid:scan_'.$ii.'"/><br/><br/>';
   }
   
   $mailer->MsgHTML($message);

   if ($mailer->Send())
   {
      $sendMsg = 'Reimbursement request sent successfully.  Click <a class="norm" href=".">here</a> to create another.';
   }
   else
   {
      $sendMsg = 'There was a problem sending your mail.  Click <a class="norm" href=".">here</a> to try again.';
   }
   
?>
<!DOCTYPE html>
<html>
<head>
   <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/head.php"); ?>
   <link rel="stylesheet" type="text/css" href="reimbursement.css">
</head>
<body>
   <div id="wrapper">
      <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/header.php"); ?>
      <div class="main clearfix">
         <?php $selected="reimbursement"; include($root."/eboard/eboard_sidenav.php"); ?>
         <div class="cont three-quarters">
            <div class="rowtitle"><span>Submit Reimbursement Request</span></div>
            <div class="contentblock">
               <p style="text-align:center"><?php echo $sendMsg; ?></p>
            </div>
         </div>
      </div>
      <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/footer.php"); ?>
   </div>

   <script src="reimbursement.js"></script>
</body>
</html>