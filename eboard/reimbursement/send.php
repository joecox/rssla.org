<?php

   $name = $_POST['name'];
   $contact = $_POST['phone_email'];
   $committee = $_POST['committee'];
   $event_name = $_POST['event_name'];
   $event_date = $_POST['event_date'];

   $charges = array();
   $prices = array();
   $reasons = array();
   for ($ii = 0; $ii < 6; $ii++)
   {
      array_push($charges, $_POST['charge_'.$ii]);
      array_push($prices, $_POST['price'.$ii]);
      array_push($reasons, $_POST['reason_'.$ii]);
   }

   $subject = "[RSS Eboard Service] New Reimbursement Request";

   $message = "A reimbursement request has been submitted on RSSLA.org.  Below are the details.";
   $message .= "<br/><br/>";
   $message .= "<pre style=\"font-size: 1.2rem;\">";
   $message .= "Name: " . $name . "<br/>";
   $message .= "Contact: " . $contact . "<br/>";
   $message .= "Committee: " . $committee . "<br/>";
   $message .= "Event Name: " . $event_name . "<br/>";
   $message .= "Event Date: " . $event_date . "<br/><br/>";

   for ($ii = 0; $ii < 6; $ii++)
   {
      $message .= "Charge: " . $charges[$ii] . "<br/>";
      $message .= "Price: " . $prices[$ii] . "<br/>";
      $message .= "Reason: " . $reasons[$ii] . "<br/><br/>";
   }

   $headers = "MIME-Version: 1.0" . "\r\n";
   $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";

   $headers .= "From: <website@rssla.org>" . "\r\n";

   mail("communications@rssla.org", $subject, $message, $headers, "-fwebsite@rssla.org");

   echo "Mail sent.";
?>