<!DOCTYPE html>
<html>
<head>
   <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/head.php"); ?>
   <link rel="stylesheet" type="text/css" href="profiles.css"/>
</head>
<body class="members">
   <div id="wrapper">
      <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/header.php"); ?>
      <div class="main clearfix">
         <div class="bannerwrap">
            <img class="photobanner" src="">
            <div class="bannertext"></div>
         </div>
         <div class="wrap border-bottom shadow-bottom">
            <span class="pagetitle">MEMBER PROFILES</span>
            <div class="topnav v-align">
               <span class="topnavitem selected"><a href="/members/profiles">Profiles</a></span>
               <span class="topnavitem"><a href="create">Create Profile</a></span>
            </div>
         </div>
         <div class="fullpage-contwrap">
            <div class="contentblock">
               <div class="members-list">
                  <?php

                     include($_SERVER['DOCUMENT_ROOT']."/_modules/globals.php");
                     include($DB_MODULE);

                     db_connect();

                     $id = $_GET['id'];
                     if ($id != null && $id != "" && memberExists($id))
                     {
                        buildMemberView($id);
                     }
                     else
                     {
                        buildMemberListView();
                     }

                     function memberExists($id)
                     {
                        $results = db_select("SELECT id FROM `members` where id=".$id);
                        return ($results != null);
                     }

                     function buildMemberListView()
                     {
                        echo "<div class=\"create-msg-container\">";
                        echo "<span class=\"create-msg\">Don't have a member profile?  Create one ";
                        echo "<a class=\"norm\" id=\"create-profile-link\">here</a>.</span>";
                        echo "</div>";

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

                              for ($ii = 1; $ii <= $rows; $ii++)
                              {
                                 echo "<tr>";
                                 if ($ii == $rows && $dangling > 0)
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

                     function buildMemberView($id)
                     {
                        $results = db_select("SELECT * FROM `members` where id=".$id);
                        $row = $results[0];
                        echo $row['first_name']." ".$row['last_name'];
                     }

                  ?>
               </div>
            </div>
         </div>
      </div>
      <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/footer.php"); ?>
   </div>

   <script src="profiles.js"></script>
</body>
</html>