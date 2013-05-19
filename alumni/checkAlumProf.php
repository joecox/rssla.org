<?php

   $sid = $_POST['sid'];

   $db = mysql_connect("localhost", "rssla_scholar", "hilltop23")
      or die("Could not connect to database.");
   mysql_select_db("rssla_rss");

   $query = "SELECT * FROM alumni WHERE password=".$sid;
   $result = mysql_query($query);
   if (!$result)
   {
      $response = false;
      $html = '<span id="failure">No matching alumni profile was found</span';
   }
   else
   {
      $response = true;
      $html = '<option value="With Alumni Profile">With Alumni Profile $7.00 USD</option>';
   }
   $arr = array ('response' => $response, 'html' => $html);
   echo json_encode($arr);

?>