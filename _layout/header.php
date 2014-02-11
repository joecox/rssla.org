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
         $approved_file = fopen($_SERVER['DOCUMENT_ROOT'] . '/eboard/header/approved.txt', 'r');

         $photo_urls = array();
         while (!feof($approved_file))
         {
            $url = fgets($approved_file);
            if ($url != '')
               array_push($photo_urls, $url);
         }

         shuffle($photo_urls);
         shuffle($photo_urls);
         shuffle($photo_urls);
         for ($ii = 0; $ii < 5; $ii++)
         {
            $pos = ($ii * 200) + 1000;
            echo '<img class="headerphoto" num="'.$ii.'" src=' . $photo_urls[$ii] . ' style="opacity:0; left:'.$pos.'px;">';
         }
      ?>
   </div>
   <div id="photobarCoverPanelRight"></div>

   <?php include($SESSION_MODULE); ?>
   <?php include($ACCOUNT_CONTROL_MODULE); ?>

   <?php
      if (($userId = valid_login_session()) != -1)
      {
         show_account_control($userId);
      }
      else
      {
         show_login();
      }
   ?>

   <?php include($_SERVER['DOCUMENT_ROOT'].'/_layout/nav.php'); ?>
</div>