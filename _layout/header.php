<div id="header">
   <a href="/">
      <div id="sealbehind">
      </div>
      <div id="seal">
      </div>
   </a>
   <div id="banner">
      <a href="/">
         <div>
            REGENTS SCHOLAR SOCIETY AT
            <span style="color: #ebc62f;">UCLA</span>
         </div>
      </a>
   </div>
   <div id="photobar-overlay"></div>
   <div id="photobar">
      <?php
         $db_connection = mysql_connect("localhost", "rssla_scholar", "hilltop23") or die("Could not connect to database");
         mysql_select_db("rssla_rss");
         $getSL = "SELECT * FROM instagram";
         $result = mysql_query($getSL);
         $i = 0;
         while ($row = mysql_fetch_row($result))
         {
            $shortlinks[$i] = $row[0];
            $i++;
         }
         shuffle($shortlinks);
         shuffle($shortlinks);
         shuffle($shortlinks);
         for ($i = 0; $i < 5; $i++)
         {
            $pos = $i * 200;
            echo '<img class="headerphoto-'.$i.'" onload=\'fadeIn(".headerphoto-'.$i.'")\' src="http://instagram.com/p/'.$shortlinks[$i].'/media/?size=m" style="display:none; left:'.$pos.'px">';
         }
      ?>
   </div>
   <?php include($_SERVER['DOCUMENT_ROOT'].'/_layout/nav.php'); ?>
</div>