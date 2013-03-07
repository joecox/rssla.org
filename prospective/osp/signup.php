<!DOCTYPE html>
<html>
<head>
   <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/head.php"); ?>
   <link rel="stylesheet" type="text/css" href="/_layout/stylesheets/formelements.css">
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
            <a href="/prospective/">
               <div class="pagetitle">PROSPECTIVE<br>SCHOLARS</div>
            </a>
            <div class="sidenav">
               <a href="/prospective/osp">
                  <div class="sidenavitem selected">
                     <span>OSP</span>
                  </div>
               </a>
               <a href="/prospective/mentors">
                  <div class="sidenavitem">
                     <span>Mentors</span>
                  </div>
               </a>
            </div>
         </div>
         <div class="cont three-quarters">
            <div class="rowtitle"><span>OSP Signup Form</span></div>
            <div class="contentblock">
               <form action="signup_process.php" method="post">
                  <p>Select an OSP Session:</p>
                  <div class="selectbar">
                     <input type="radio" name="session" value="1">Session 1
                     <input type="radio" name="session" value="2">Session 2
                     <input type="radio" name="session" value="3">Session 3
                     <input type="radio" name="session" value="4">Session 4
                     <input type="radio" name="session" value="5">Session 5
                     <input type="radio" name="session" value="6">Transfer
                  </div>
                  <div class="buttonwrap">
                     <span class="button" id="submit">Submit & Pay</span>
                  </div>
               </form>
            </div>
         </div>
      </div>
      <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/footer.php"); ?>
   </div>
</body>
</html>