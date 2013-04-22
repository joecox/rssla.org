<?php
   $db_connection = mysql_connect("localhost", "rssla_scholar", "hilltop23") or die("Could not connect to database");
   mysql_select_db("rssla_rss");
   $query = "UPDATE classpoints SET firstyears = " . $_POST['first'] . ", " .
                                   "secondyears = " . $_POST['second'] . ", " .
                                   "thirdyears = " . $_POST['third'] . ", " .
                                   "fourthyears = " . $_POST['fourth'];

   $result = mysql_query($query);
   if ($result)
      echo "Class Points updated successfully.";
   else
      echo "There was an error.";
?>