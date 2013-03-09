<?php

// Zend library include path
set_include_path(get_include_path() . PATH_SEPARATOR . $_SERVER['DOCUMENT_ROOT']."/resources/scripts/ZendGdata-1.12.1/library");
     
include_once($_SERVER['DOCUMENT_ROOT']."/resources/scripts/Google_Spreadsheet.php");
 
$u = "rssatucla@gmail.com";
$p = "spaghettisquash";
 
$ss = new Google_Spreadsheet($u,$p);
if ($_POST['session'] == 6)
   $spreadsheet = "Copy of OSP13_Transfer";
else
   $spreadsheet = "Copy of OSP13_Session".$_POST['session'];
 
$ss->useSpreadsheet($spreadsheet);

// if not setting worksheet, "Sheet1" is assumed
// $ss->useWorksheet("worksheetName");

if ($_POST['gender'] == "Other")
   $gender = "Other: " + $_POST['optgender'];
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

?>