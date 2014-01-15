<div class="cont quarter left" id="sidebar">
   <div class="pagetitle">EBOARD SERVICES</div>
   <div class="sidenav">
      <a href="/eboard">
         <div class="sidenavitem">
            <span>Eboard Home</span>
         </div>
      </a>
      <a href="/eboard/bulletin">
      <?php
         if ($selected == "bulletin")
         {
            echo "<div class=\"sidenavitem selected\">";
         }
         else
         {
            echo "<div class=\"sidenavitem\">";
         }
      ?>
            <span>Submit Bulletin Post</span>
         </div>
      </a>
      <a href="/eboard/classpoints">
      <?php
         if ($selected == "classpoints")
         {
            echo "<div class=\"sidenavitem selected\">";
         }
         else
         {
            echo "<div class=\"sidenavitem\">";
         }
      ?>
            <span>Update Class Points</span>
         </div>
      </a>
      <a href="/eboard/merch">
      <?php
         if ($selected == "merch")
         {
            echo "<div class=\"sidenavitem selected\">";
         }
         else
         {
            echo "<div class=\"sidenavitem\">";
         }
      ?>
            <span>Manage Merchandise</span>
         </div>
      </a>
      <a href="/eboard/mailmerge">
      <?php
         if ($selected == "mailmerge")
         {
            echo "<div class=\"sidenavitem selected\">";
         }
         else
         {
            echo "<div class=\"sidenavitem\">";
         }
      ?>
            <span>Mail Merge</span>
         </div>
      </a>
      <a href="/eboard/header/manage.php">
      <?php
         if ($selected == "header")
         {
            echo "<div class=\"sidenavitem selected\">";
         }
         else
         {
            echo "<div class=\"sidenavitem\">";
         }
      ?>
            <span>Manage Header Photos</span>
         </div>
      </a>
      <a href="/eboard/manageEboard.php">
      <?php
         if ($selected == "eboarders")
         {
            echo "<div class=\"sidenavitem selected\">";
         }
         else
         {
            echo "<div class=\"sidenavitem\">";
         }
      ?>
            <span>Manage Eboard Info</span>
         </div>
      </a>
      <a href="/eboard/reimbursement">
      <?php
         if ($selected == "reimbursement")
         {
            echo "<div class=\"sidenavitem selected\">";
         }
         else
         {
            echo "<div class=\"sidenavitem\">";
         }
      ?>
            <span>Submit Reimbursement</span>
         </div>
      </a>
   </div>
</div>