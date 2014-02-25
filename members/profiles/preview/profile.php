<!DOCTYPE html>
<html>
<head>
   <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/head.php"); ?>
   <link rel="stylesheet" type="text/css" href="profiles.css"/>
   <link rel="stylesheet" type="text/css" href="newformstyles.css"/>
   <link rel="stylesheet" type="text/css" href="profileGraph/profileGraph.css"/>
</head>

<?php
   include_once($DB_MODULE);
   $userId = $_GET['id'];

   db_connect();

   // TODO: restrict select items
   $results = db_select("SELECT * FROM members WHERE id=".$userId);

   if (count($results) > 0)
   {
      $memberData = $results[0];
   }

?>

<body id="profile">
   <div id="wrapper">
      <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/header.php"); ?>
      <div class="main clearfix">
         <div class="wrap border-bottom shadow-bottom">
            <span class="pagetitle">MEMBER PROFILES</span>
            <div class="topnav v-align">
               <a href="/members/profiles" class="topnavitem">Profile List</a>
               <a class="topnavitem" onclick="showCreateProfileDialogue()">Create Profile</a>
            </div>
         </div>
         <div class="fullpage-contwrap">
            <div id="profileGraph" style="height:600px; position: relative"></div>
            <div id="edges"></div>
         </div>
      </div>
      <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/footer.php"); ?>
   </div>

   <script src="/resources/scripts/svg/svg.min.js"></script>
   <script src="profileGraph/ProfileNode.js"></script>
   <script>
      var memberData = <?php echo json_encode($memberData); ?>;

      var draw = SVG("edges").size(1000, 600);

      var rootNode = new ProfileNode(150, "root");
      rootNode.setFill(undefined, "/resources/images/members/" + memberData.pf_photo_path);
      rootNode.center();
      rootNode.setTitle(memberData.first_name + " " + memberData.last_name, true);

      basicNode = new ProfileNode(70, "inner");
      basicNode.setTitle("Basic Info", true);
      rootNode.addChild(basicNode);

      schoolNode = new ProfileNode(70, "inner");
      schoolNode.setTitle("School & Career", true);
      rootNode.addChild(schoolNode);

      favNode = new ProfileNode(70, "inner");
      favNode.setTitle("Favorites", true);
      rootNode.addChild(favNode);

      rssNode = new ProfileNode(70, "inner");
      rssNode.setTitle("RSS", true);
      rootNode.addChild(rssNode);

      rootNode.show();
   </script>
</body>
</html>