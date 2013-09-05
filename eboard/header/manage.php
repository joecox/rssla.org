<!DOCTYPE html>
<html>
<head>
   <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/head.php"); ?>
   <link rel="stylesheet" type="text/css" href="manageHeader.css">
</head>
<body>
   <div id="wrapper">
      <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/header.php"); ?>
      <div class="main clearfix">
         <div class="bannerwrap">
            <img class="photobanner" src="">
            <div class="bannertext"></div>
         </div>
         <?php $selected="header"; include($root."/eboard/eboard_sidenav.php"); ?>
         <div class="cont three-quarters">
            <div class="rowtitle"><span>Manage Header Photos</span></div>
            <div class="contentblock" style="text-align: center;">

               <?php

                  $holding_file = @fopen('holding.txt', 'r');

                  for ($ii = 0; !feof($holding_file); $ii++)
                  {
                     $url = fgets($holding_file);
                     if ($url != '')
                     {
                        echo '<div class="heldImg-container">' .
                                 '<img class="heldImg" src="' . $url . '" id="heldImg_' . $ii . '">' .
                                 '<span class="decideOverlay">' .
                                    '<div class="approveHeldImg" onclick="approve(this)" for="heldImg_' . $ii . '">' .
                                       '<img class="approveIcon" src="/resources/images/eboard/approve_icon.png"/>' .
                                       '<div class="approveText">Approve</div>' .
                                    '</div>' .
                                    '<div class="separator"></div>' .
                                    '<div class="rejectHeldImg" onclick="reject(this)" for="heldImg_' . $ii . '">' .
                                       '<img class="rejectIcon" src="/resources/images/eboard/reject_icon.png"/>' .
                                       '<div class="rejectText">Reject</div>' .
                                    '</div>' .
                                 '</span>' .
                                 '<span class="heldImgVeil"></span>' .
                                 '<span class="approveOverlay">' .
                                    '<img class="approveIcon" src="/resources/images/eboard/approve_icon.png"/>' .
                                    '<div class="approveText">Approved</div>' .
                                 '</span>' .
                                 '<span class="rejectOverlay">' .
                                    '<img class="rejectIcon" src="/resources/images/eboard/reject_icon.png"/>' .
                                    '<div class="rejectText">Rejected</div>' .
                                 '</span>' .
                              '</div>';
                     }
                  }

                  fclose($holding_file);

               ?>

            </div>
         </div>
      </div>
      <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/footer.php"); ?>
   </div>

   <script type="text/javascript" src="manageHeader.js"></script>

</body>
</html>