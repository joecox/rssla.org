<?php
   $db_connection = mysql_connect("localhost", "rssla_scholar", "hilltop23") or die("Could not connect to database");
   mysql_select_db("rssla_rss");
   $query = "SELECT pw FROM validation WHERE name = 'eboard'";
   $result = mysql_query($query);
   $row = mysql_fetch_row($result);
   $pw = $row[0];

   if ($pw == $_POST['pw'])
   {
      $newcont = '<div class="cont quarter left">
                     <div class="sidenav">
                        <div class="sidenavitem" onclick="selectSideItem(this)">
                           <span>Update class points</span>
                        </div>
                        <div class="sidenavitem" onclick="selectSideItem(this)">
                           <span>Mail Merge</span>
                        </div>
                        <div class="sidenavitem" onclick="selectSideItem(this)">
                           <span>Add merchandise</span>
                        </div>
                        <div class="sidenavitem" onclick="selectSideItem(this)">
                           <span>Update merchandise</span>
                        </div>
                     </div>
                  </div>
                  <div class="cont three-quarters">
                     <div class="contentblock">
                     </div>
                  </div>';
      $arr = array('success' => true, 'newcont' => $newcont);
   }
   else
   {
      $arr = array('success' => false);
   }

   echo json_encode($arr);
?>