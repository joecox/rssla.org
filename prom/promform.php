<?php
 
// Zend library include path
set_include_path(get_include_path() . PATH_SEPARATOR . $_SERVER['DOCUMENT_ROOT']."/resources/scripts/ZendGdata-1.12.1/library");
     
include_once($_SERVER['DOCUMENT_ROOT']."/resources/scripts/Google_Spreadsheet.php");
 
$u = "dblack12705@gmail.com";
$p = "PLACEHOLDERFORPASSWORD";
 
$ss = new Google_Spreadsheet($u,$p);
$ss->useSpreadsheet("RSS Prom");
 
// if not setting worksheet, "Sheet1" is assumed
// $ss->useWorksheet("worksheetName");

$row = array
(
    "Name" => $_POST['name'], 
  //  "Guest?" => $_POST['guestboolean'], 
    "Guestname" => $_POST['guestname']
);
 
if ($ss->addRow($row)) echo "Form data successfully stored using Google Spreadsheet";
else echo "Error, unable to store spreadsheet data";
 
?>
