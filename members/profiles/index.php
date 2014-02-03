<!DOCTYPE html>
<html>
<head>
   <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/head.php"); ?>
   <link rel="stylesheet" type="text/css" href="profiles.css"/>
   <link rel="stylesheet" type="text/css" href="newformstyles.css"/>
</head>

<?php
   include_once($DB_MODULE);
   $id = $_GET['id'];
   $memberView = ($id != null && $id != "" && memberExists($id))
?>

<body class="members">
   <div id="wrapper">
      <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/header.php"); ?>
      <div class="main clearfix">
         <div class="wrap border-bottom shadow-bottom">
            <span class="pagetitle">MEMBER PROFILES</span>
            <div class="topnav v-align">
               <?php if (!$memberView) : ?>
                  <a href="/members/profiles" class="topnavitem selected">Profile List</a>
               <?php else : ?>
                  <a href="/members/profiles" class="topnavitem">Profile List</a>
               <?php endif; ?>
               <a class="topnavitem" onclick="showCreateProfileDialogue()">Create Profile</a>
            </div>
         </div>
         <div class="fullpage-contwrap">
            <div class="contentblock">
               
               <?php

                  include("build_member_view.php");

                  if ($memberView)
                  {
                     buildMemberView($id);
                  }
                  else
                  {
                     buildMemberListView();
                  }

                  function memberExists($id)
                  {
                     db_connect();
                     
                     $results = db_select("SELECT id FROM `members` where id=".$id);
                     return ($results != null);
                  }

                  function buildMemberListView()
                  {
                     echo "<div class=\"members-list\">";
                     if (!$GLOBALS['valid_session'])
                     {
                        echo "<div class=\"create-msg-container\">";
                        echo "<span class=\"create-msg\">Don't have a member profile?  Create one ";
                        echo "<a class=\"norm\" id=\"create-profile-link\">here</a>.</span>";
                        echo "</div>";
                     }

                     $members = array(
                        '1' => array(),
                        '2' => array(),
                        '3' => array(),
                        '4' => array() 
                     );

                     $headers = array(
                        '1' => "First Years",
                        '2' => "Second Years",
                        '3' => "Third Years",
                        '4' => "Fourth Years"
                     );

                     $results = db_select("SELECT id, first_name, last_name, year FROM `members` WHERE is_active=1 ORDER BY last_name ASC");

                     foreach ($results as $row)
                     {
                        array_push($members[$row['year']], $row);
                     }
                     foreach ($members as $year => $class)
                     {
                        printYearHeader($headers[$year]);
                        $size = count($class);
                        $rows = ceil($size/4);
                        $dangling = count($size) % 4;

                        if ($rows == 0)
                        {
                           echo "<p class=\"no_results_msg\">There are no profiles for members of this year.</p>";
                        }
                        else
                        {
                           echo "<table class=\"memberList\">";

                           for ($ii = 0; $ii < $rows; $ii++)
                           {
                              echo "<tr>";
                              if ($ii == ($rows - 1) && $dangling > 0)
                              {
                                 $col1 = $class[$ii];
                                 printMemberName($col1);

                                 if ($dangling > 1)
                                 {
                                    $col2 = $class[$ii + $rows];
                                    printMemberName($col2);
                                 }
                                 else
                                 {
                                    echo "<td></td>";
                                 }

                                 if ($dangling > 2)
                                 {
                                    $col3 = $class[$ii + (2 * $rows)];
                                    printMemberName($col3);
                                 }
                                 else
                                 {
                                    echo "<td></td>";
                                 }

                                 echo "<td></td>";
                              }
                              else
                              {
                                 $col1 = $class[$ii];
                                 printMemberName($col1);

                                 $col2 = $class[$ii + $rows];
                                 printMemberName($col2);

                                 if ($dangling == 1)
                                 {
                                    $col3 = $class[$ii + (2 * $rows) - 1];
                                 }
                                 else
                                 {
                                    $col3 = $class[$ii + (2 * $rows)];
                                 }
                                 printMemberName($col3);

                                 if ($dangling == 2)
                                 {
                                    $col4 = $class[$ii + (3 * $rows) - 1];
                                 }
                                 else if ($dangling == 1)
                                 {
                                    $col4 = $class[$ii + (3 * $rows) - 2];
                                 }
                                 else
                                 {
                                    $col4 = $class[$ii + (3 * $rows)];
                                 }
                                 printMemberName($col4);
                              }
                              echo "</tr>";
                           }
                           echo "</table>";
                        }
                     }
                     echo "</div>";
                  }

                  function printYearHeader($header)
                  {
                     echo "<div class=\"rowtitle\"><span class=\"member-list-header\">";
                     echo $header;
                     echo "</span></div>";
                  }

                  function printMemberName($data)
                  {
                     echo "<td>";
                     echo "<a style=\"float:left\" class=\"member-link\" href=\"?id=".$data['id']."\">".
                        $data['first_name']." ".$data['last_name']."</a>";
                     echo "</td>";
                  }

               ?>
               
            </div>
         </div>
      </div>
      <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/footer.php"); ?>
   </div>

   <script src="profiles.js"></script>
   <script>
      <?php 
         if (!isset($_GET['signup']))
            $showSignup = "false";
         else
            $showSignup = $_GET['signup'];
      ?>

      if (<?php echo $showSignup; ?>)
      {
         showCreateProfileDialogue();
      }
   </script>

</body>
</html>