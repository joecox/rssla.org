<!DOCTYPE html>
<html>
<head>
   <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/head.php"); ?>
   <link rel="stylesheet" type="text/css" href="../eboard_styles.css">
</head>
<body>
   <div id="wrapper">
      <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/header.php"); ?>
      <div class="main clearfix">
         <div class="bannerwrap">
            <img class="photobanner" src="">
            <div class="bannertext"></div>
         </div>
         <?php $selected="merch"; include($root."/eboard/eboard_sidenav.php"); ?>
         <div class="cont three-quarters">
            <div class="rowtitle"><span>Add/Edit/Remove Merchandise</span></div>
            <div class="contentblock">
               <span class="button" id="addMerch">Add Item</span><br/><br/>
               <p>Current Items:</p>
               <table class="data">
                  <colgroup>
                     <col style="width: 300px"/>
                     <col style="width: 100px"/>
                     <col style="width: 150px"/>
                     <col style="width: 50px"/>
                     <col style="width: 50px"/>
                  </colgroup>
                  <thead>
                     <tr>
                        <th>Item Name</th>
                        <th>Price</th>
                        <th>Sizes Available</th>
                        <th>Edit</th>
                        <th>Delete</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php

                        $dbh = mysql_connect("localhost", $DB_USER, $DB_PW);
                        mysql_select_db($DB_NAME);

                        $query = "SELECT * FROM merchandise";
                        $result = mysql_query($query);

                        for ($ii = 0; $ii < mysql_num_rows($result); $ii++)
                        {
                           $row = mysql_fetch_row($result);
                           echo "<tr id=\"item" . $row[0] . "\">";
                           echo "<td>" . $row[1] . "</td>";
                           echo "<td>$" . $row[2] . "</td>";
                           echo "<td>" . $row[4] . "</td>";

                           echo "<td style=\"position: relative;\"><a class=\"merchEdit\" href=\"edit.php?id=" . $row[0] . "\"></a></td>";
                           echo "<td style=\"position: relative;\"><span class=\"merchDelete\" meta=\"" . $row[0] . "\"></span></td>";
                           echo "</tr>";
                        }

                     ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
      <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/footer.php"); ?>
   </div>

   <script type="text/javascript" src="../eboard.js"></script>
   
</body>
</html>