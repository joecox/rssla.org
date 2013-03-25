<!DOCTYPE html>
<html>
<head>
   <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/head.php"); ?>
   <link rel="stylesheet" href="/_layout/stylesheets/formelements.css">
   <script src="/_layout/scripts/forms.js"></script>
</head>
<body>
   <div id="wrapper">
      <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/header.php"); ?>
      <div class="main clearfix">
         <div class="bannerwrap">
            <img class="photobanner" src="">
            <div class="bannertext"></div>
         </div>
         <div class="cont quarter left" id="sidebar">
            <div class="pagetitle">OUTREACH</div>
            <div class="sidenav">
               <a href="#parking">
                  <div class="sidenavitem">
                     <span>Parking Instructions</span>
                  </div>
               </a>
            </div>
         </div>
         <div class="cont three-quarters">
            <div class="rowtitle"><span>Bruin Day Reception</span></div>
            <div class="contentblock">
               <span class="highlight">Coming to Bruin Day?</span>
               <img style="float: right; width: 250px;" src="/resources/images/outreach/bruinday/bruinday1.jpg">
               <p>Please come join us at Pauley Pavilion Concourse (south-east corner) on April 13th, 2013 at 4:00pm.  Parents and prospective students are welcome!  It will be a great opportunity to talk to current UCLA students part of the Regents Scholar Society - to ask them questions about what being a Bruin and what being a Regents Scholar is all about.  The program will feature speeches from faculty as well as a panel of current students followed by a networking session with light refreshments.</p>
               <span class="highlight">Please RSVP below!</span>
               <form action="bruinday_submit.php" method="post">
                  <p>All fields are required.</p>
                     <label for="name">Name: </label>
                     <input class="required" type="text" name="name" size=30 style="margin-bottom: 10px;">
                  <label for="email">Email: </label>
                  <input class="required" type="text" name="email" size=30 style="margin-bottom: 10px;">
                  <div class="buttonwrap">
                     <span class="button" id="submit">Submit</span>
                  </div>
               </form>
            </div>
            <div class="rowtitle" id="parking"><span>Parking Instructions</span></div>
            <div class="contentblock">
               <p>The closest parking structure is Parking Lot 6.  See the map below.</p>
               <img style="width: 700px" src="/resources/images/outreach/bruinday/bruinday_map.png">
            </div>
         </div>
      </div>
      <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/footer.php"); ?>
   </div>
</body>
</html>