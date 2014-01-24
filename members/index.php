<!DOCTYPE html>
<html>
<head>
   <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/head.php"); ?>
</head>
<body>
   <div id="wrapper">
      <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/header.php"); ?>
      <div class="main clearfix">
         <div class="topbar">
            <span class="pagetitle">Members Area</span>
            <!-- <div class="topnav v-align">
               <span class="topnavitem selected"><a href="">Current Page</a></span>
               <span class="topnavitem"><a href="">Other Page</a></span>
               <span class="topnavitem">Add Additional Here</span>
            </div> -->
         </div>
         <div class="fullpage-contwrap">
            <div class="nav-card-container">
               <div class="nav-card" id="profile-card" onclick="goTo('profiles')">
                  <div class="title">Profiles</div>
                  <div class="description">View profiles of current RSS members or create your own.</div>
               </div>
               <div class="nav-card" id="studylist-card">
                  <div class="title">Class Reviews</div>
                  <div class="description">View what other RSSers say about classes or submit your own review.</div>
                  <div class="comingsoon">Under development...</div>
               </div>
               <div class="nav-card" id="classpoints-card" onclick="goTo('classpoints')">
                  <div class="title">Class Points</div>
                  <div class="description">View the current Class Points standings.</div>
               </div>
               <div class="nav-card" id="bulletin-card">
                  <div class="title">Weekly Bulletin</div>
                  <div class="description">View the most recent bulletin as well as past bulletins.</div>
                  <div class="comingsoon">Under development...</div>
               </div>
            </div>
         </div>
         <!-- Optional bottom bar
         <div class="bottombar">
            <span>Extra info here...</span>
         </div>
         -->
      </div>
      <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/footer.php"); ?>
   </div>
</body>
</html>