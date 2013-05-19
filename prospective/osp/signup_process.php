<html>
<head>
   <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/head.php"); ?>
</head>
<?php

// Zend library include path
set_include_path(get_include_path() . PATH_SEPARATOR . $_SERVER['DOCUMENT_ROOT']."/resources/scripts/ZendGdata-1.12.1/library");
     
include_once($_SERVER['DOCUMENT_ROOT']."/resources/scripts/Google_Spreadsheet.php");
 
$u = "rssatucla@gmail.com";
$p = "spaghettisquash";
 
$ss = new Google_Spreadsheet($u,$p);
if ($_POST['session'] == 6)
   $spreadsheet = "OSP13_Transfer";
else
   $spreadsheet = "OSP13_Session".$_POST['session'];
 
$ss->useSpreadsheet($spreadsheet);

// if not setting worksheet, "Sheet1" is assumed
// $ss->useWorksheet("worksheetName");

if ($_POST['gender'] == "Other")
   $gender = "Other: " . $_POST['optgender'];
else
   $gender = $_POST['gender'];

date_default_timezone_set('America/Los_Angeles');

$row = array
(
   "Timestamp" => date("D M j Y G:i:s T"), 
   "First name" => $_POST['first'], 
   "Last name" => $_POST['last'], 
   "Prospective major" => $_POST['major'], 
   "Cell phone number" => $_POST['cell'], 
   "Your Email" => $_POST['email'], 
   "Your gender" => $gender, 
   "T-shirt size?" => $_POST['tshirt'], 
   "Any dietary restrictions?" => $_POST['dietary'], 
   "Tell us three interesting/fun/random facts about yourself!" => $_POST['facts'], 
   "Is there any other information we should be aware of at this time?" => $_POST['otherinfo'], 
   "I confirm that I have been offered the Regents Scholarship at UCLA." => $_POST['isscholar'], 
   "Is there anything specific that you would like to learn about UCLA during your OSP session?" => $_POST['learn']
);
 
$ss->addRow($row);

$subj = "OSP Signup Confirmation";
$from_addr = "From: website@rssla.org";
if ($session == 6)
{
   $msg = "Thank you for signing up for Transfer OSP!  We have recorded your information.  Once you've paid, you're all set to go.  Within a few days you will receive an email from one of the student coordinators of your session with more information regarding OSP.";
}
else
{
   $msg = "Thank you for signing up for OSP Session ".$session."!  We have recorded your information.  Once you've paid, you're all set to go.  Within a few days you will receive an email from one of the student coordinators of your session with more information regarding OSP.";
}
mail($_POST['email'], $subj, $msg, $from_addr);

$msg = 'Prospie '.$_POST['first'].' '.$_POST['last'].' has signed up for your session.  Payment status will be updated shortly.';
$subj = "OSP Signup";
switch($session)
{
   case 1:
      mail("emparker58@gmail.com", $subj, $msg, $from_addr);
      mail("christinawchung@yahoo.com", $subj, $msg, $from_addr);
      mail("sgrant24@sbcglobal.net", $subj, $msg, $from_addr);
      mail("dale.y.everett@gmail.com", $subj, $msg, $from_addr);
      break;
   case 2:
      mail("sedinaalicic@yahoo.com", $subj, $msg, $from_addr);
      mail("mfsu1993@gmail.com", $subj, $msg, $from_addr);
      mail("Crystal.lin1@verizon.net", $subj, $msg, $from_addr);
      mail("cbliu@ucla.edu", $subj, $msg, $from_addr);
      break;
   case 3:
      mail("vishal_s_yadav@yahoo.com", $subj, $msg, $from_addr);
      mail("killianjackson@yahoo.com", $subj, $msg, $from_addr);
      mail("dylcharredor@yahoo.com", $subj, $msg, $from_addr);
      mail("krishanpatel@ucla.edu", $subj, $msg, $from_addr);
      break;
   case 4:
      mail("joeyalancox@gmail.com", $subj, $msg, $from_addr);
      mail("anna.dornisch@gmail.com", $subj, $msg, $from_addr);
      mail("z.jonathanhan@gmail.com", $subj, $msg, $from_addr);
      mail("zhuofanwen@ucla.edu", $subj, $msg, $from_addr);
      mail("sharonabada1@gmail.com", $subj, $msg, $from_addr);
      mail("kdern@ucla.edu", $subj, $msg, $from_addr);
      break;
   case 5:
      mail("brennanchang@outlook.com", $subj, $msg, $from_addr);
      mail("isabelmartin@ucla.edu", $subj, $msg, $from_addr);
      mail("alzhou421@gmail.com", $subj, $msg, $from_addr);
      break;
   case 6:
      mail("outreach@rssla.org", $subj, $msg, $from_addr);
      mail("nanayogibear@yahoo.com", $subj, $msg, $from_addr);
      mail("elizabethjm@live.com", $subj, $msg, $from_addr);
      mail("lmi12@cox.net", $subj, $msg, $from_addr);
      mail("melcab@gmail.com", $subj, $msg, $from_addr);
}

mail("joeyalancox@gmail.com", "OSP Check for Payment", $_POST['first'].' '.$_POST['last'].' has signed up for session '.$session.', please check for payment.', $from_addr);


?>
<div class="overlay processing" style="display: block">
   <div class="overlaytext" style="width: 270px; margin-left:-135px">
      Redirecting you to PayPal
      <img style="margin-left:-10px" src="/resources/images/UI/loading.gif">
   </div>
</div>
<form id="form" action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="EJZZXRCSJMPAQ">
<!--
<input type="hidden" name="hosted_button_id" value="G5WX4E864NP5U">

<input type="hidden" name="cancel_return" value="http://www.rssla.org/osp/">
<input type="hidden" name="return" value="http://www.rssla.org/osp/success.php">
<input type="hidden" name="rm" value="2">
<input type="hidden" name="custom" value=<?php echo $_POST['email']."98fdgdDB7dfkt".$_POST['session']; ?>>
-->
</form>

<script>
   setTimeout(function ()
   {
      $('#form').submit();
   }, 1000);
</script>
</html>