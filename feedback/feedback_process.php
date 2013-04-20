<!DOCTYPE html>
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
$spreadsheet = "Site Feedback";
 
$ss->useSpreadsheet($spreadsheet);

// if not setting worksheet, "Sheet1" is assumed
// $ss->useWorksheet("worksheetName");

date_default_timezone_set('America/Los_Angeles');

$row = array
(
   "Timestamp" => date("D M j Y G:i:s T"), 
   "Experience" => $_POST['experience'], 
   "Likes" => $_POST['likes'], 
   "Not Likes" => $_POST['notlikes'], 
   "Improvements" => $_POST['improve'], 
   "Features" => $_POST['features']
);
 
$ss->addRow($row);

?>
<body>
   <div id="wrapper">
      <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/header.php"); ?>
      <div class="main clearfix">
         <div class="bannerwrap">
            <img class="photobanner" src="">
            <div class="bannertext"></div>
         </div>
         <div class="cont quarter left" id="sidebar">
            <a href="/prospective/osp/">
               <div class="pagetitle">FEEDBACK</div>
            </a>
         </div>
         <div class="cont three-quarters">
            <div class="rowtitle"><span>Feedback Form</span></div>
            <div class="contentblock">
               <p>Your entry has been recorded. Thank you.</p>
            </div>
         </div>
      </div>
      <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/footer.php"); ?>
   </div>
   <div class="veil">
   </div>
   <div class="overlay processing">
      <div class="overlaytext processing">
         Processing
         <img style="margin-left:-5px" src="/resources/images/UI/loading.gif">
      </div>
   </div>
</body>
</html>