<?php
 
// Zend library include path
set_include_path(get_include_path() . PATH_SEPARATOR . $_SERVER['DOCUMENT_ROOT']."/resources/scripts/ZendGdata-1.12.1/library");
     
include_once($_SERVER['DOCUMENT_ROOT']."/resources/scripts/Google_Spreadsheet.php");
 
$u = "rssatucla@gmail.com";
$p = "spaghettisquash";
 
$ss = new Google_Spreadsheet($u,$p);
$ss->useSpreadsheet("Test");
 
// if not setting worksheet, "Sheet1" is assumed
// $ss->useWorksheet("worksheetName");
 
$row = array
(
    "name" => "John Doe", 
    "email" => "john@example.com", 
    "comments" => "Hello world"
);
 
if ($ss->addRow($row)) echo "Form data successfully stored using Google Spreadsheet";
else echo "Error, unable to store spreadsheet data";
 
?>