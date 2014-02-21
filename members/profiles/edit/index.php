<?php

   include_once($_SERVER["DOCUMENT_ROOT"]."/_modules/globals.php");
   include_once($SESSION_MODULE);

   if (($userId = valid_login_session()) == -1)
   {
      header("Location: /");
      die();
   }
   else if (isset($_POST['edit_request']))
   {
      include_once("edit.php");
      include_once($DB_MODULE);
      storeEditData();
      // header("Location: ../?id=".$userId);
      // die();
   }
   else
   {
      include_once("edit.php");
   }


?>

<!DOCTYPE html>
<html>
<head>
   <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/head.php"); ?>
   <link rel="stylesheet" type="text/css" href="../profiles.css"/>
   <!-- <link rel="stylesheet" type="text/css" href="../newformstyles.css"/> -->
</head>
<body>
   <div id="wrapper">
      <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/header.php"); ?>
      <div class="main clearfix">
         <div class="topbar">
            <span class="pagetitle">MEMBER PROFILES</span>
            <div class="topnav v-align">
               <a href="/members/profiles" class="topnavitem">Profile List</a>
               <a class="topnavitem" onclick="showCreateProfileDialogue()">Create Profile</a>
            </div>
         </div>
         <div class="fullpage-contwrap">
            <div class="contentblock">
               <form method="post" id="edit" enctype="multipart/form-data">
                  <?php buildEditView($userId); ?>
               </form>
            </div>
         </div>
      </div>
      <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/footer.php"); ?>
   </div>
   <script src="../profiles.js"></script>
</body>
</html>