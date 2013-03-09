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
               <div class="pagetitle">PROSPECTIVE SCHOLARS</div>
            </a>
         </div>
         <div class="cont three-quarters">
            <div class="rowtitle"><span>OSP Signup Form</span></div>
            <form action="signup_process.php" method="post" id="form">
               <div class="contentblock">
                  <p>Thank you for your interest in the Regents Scholar Society at UCLA's Overnight Stay Program! Fill out this form if you have been offered the Regents Scholarship at UCLA and are interested in spending a few nights in our dorms with current Regents Scholars to get a true feel for what life at UCLA is like.</p>
                  <p>If you have any questions, please email <?php echo $outrFL; ?>, the Outreach Director, at <a class="norm" href="mailto:outreach@rssla.org">outreach@rssla.org</a>.</p>
                  <div class="highlight">We look forward to seeing you!</div>
                  <p style="margin:30px 0">1. Select an OSP Session:</p>
                  <input class="hidden" type="radio" name="session" value="1">
                  <input class="hidden" type="radio" name="session" value="2">
                  <input class="hidden" type="radio" name="session" value="3">
                  <input class="hidden" type="radio" name="session" value="4">
                  <input class="hidden" type="radio" name="session" value="5">
                  <input class="hidden" type="radio" name="session" value="6">
                  <div class="selectbar">
                     <span class="button radio" value="1">Session 1: April 4 - 6</span>
                     <span class="button radio" value="2">Session 2: April 6 - 8</span>
                     <span class="button radio" value="3">Session 3: April 11 - 13</span>
                     <span class="button radio" value="4">Session 4: April 13 - 15</span>
                  </div>
                  <div class="selectbar">
                     <span class="button radio" value="5">Session 5: April 20 - 22</span>
                     <span class="button radio" value="6">Transfer: May 11 - 12</span>
                  </div>
                  <p style="margin:30px 0">2. Please fill out the following information.  Fields marked <span style="color:red">*</span> are required.</p>
               </div>
               <div class="inputwrap">
                  <label class="required" for="first">First name</label>
                  <input class="required" type="text" name="first">
               </div>
               <div class="inputwrap">
                  <label class="required" for="last">Last name</label>
                  <input class="required" type="text" name="last">
               </div>
               <div class="inputwrap">
                  <label class="required" for="email">Your Email</label>
                  <div class="sublabel">If you have multiple addresses, please make sure this is the email address you actually check! This will be our primary form of correspondence with you leading up to your OSP session.</div>
                  <input class="required" type="text" name="email">
               </div>
               <div class="inputwrap">
                  <label class="required" for="cell">Cell phone number</label>
                  <input class="required" type="text" name="cell">
               </div>
               <div class="inputwrap">
                  <label class="required" for="major">Prospective major</label>
                  <input class="required" type="text" name="major">
               </div>
               <div class="inputwrap">
                  <label class="required" for="gender">Your gender</label>
                  <input class="required" type="radio" name="gender" value="Male"><span class="radio-check-label">Male</span><br>
                  <input class="required" type="radio" name="gender" value="Female"><span class="radio-check-label">Female</span><br>
                  <input class="required" type="radio" name="gender" value="Other"><span class="radio-check-label">Other:</span>
                  <input type="text" name="optgender">
               </div>
               <div class="inputwrap">
                  <label class="required" for="tshirt">T-shirt size?</label>
                  <div class="sublabel">Oh, you know, just in case we happen to be giving away free OSP T-shirts... :)</div>
                  <input class="required" type="radio" name="tshirt" value="S"><span class="radio-check-label">S</span><br>
                  <input class="required" type="radio" name="tshirt" value="M"><span class="radio-check-label">M</span><br>
                  <input class="required" type="radio" name="tshirt" value="L"><span class="radio-check-label">L</span><br>
                  <input class="required" type="radio" name="tshirt" value="XL"><span class="radio-check-label">XL</span><br>
               </div>
               <div class="inputwrap">
                  <label for="dietary">Any dietary restrictions?</label>
                  <div class="sublabel">Vegetarian, allergies, etc.</div>
                  <input type="text" name="dietary">
               </div>
               <div class="inputwrap">
                  <label class="required" for="facts">Tell us three interesting/fun/random facts about yourself!</label>
                  <div class="sublabel">Try to avoid things like "My favorite color is..." and "I went to ____ high school." We'd love to get to know you a little better!</div>
                  <textarea class="required" name="facts" rows="8" cols="48"></textarea>
               </div>
               <div class="inputwrap">
                  <label for="learn">Is there anything specific that you would like to learn about UCLA during your OSP session?</label>
                  <div class="sublabel">If you can't think of anything specific, that's fine -- we have plenty of information for you!</div>
                  <textarea name="learn" rows="8" cols="48"></textarea>
               </div>
               <div class="inputwrap">
                  <label for="otherinfo">Is there any other information we should be aware of at this time?</label>
                  <div class="sublabel">Special requests, "I'm super excited!" exclamations, lame puns, and pickup lines are all welcome here.</div>
                  <textarea name="otherinfo" rows="8" cols="48"></textarea>
               </div>
               <div class="inputwrap">
                  <label class="required" for="isscholar">I confirm that I have been offered the Regents Scholarship at UCLA.</label>
                  <div class="sublabel" style="margin-bottom:20px">At this time, our Overnight Stay Programs are for prospective Regents Scholars only. If you are not a prospective Regents Scholar, there are many other overnight stay programs available. Email <?php echo $outrFL; ?> at <a class="norm" href="mailto:outreach@rssla.org">outreach@rssla.org</a> if you have any questions.</div>
                  <input class="required" type="checkbox" name="isscholar" value="Yes, I verify that I am a prospective Regents Scholar!" style="margin-left:10px"><span class="radio-check-label">Yes, I verify that I am a prospective Regents Scholar!</span>
               </div>
               <div class="buttonwrap" style="margin:40px 20px 10px">
                  <span class="button" id="submit">Submit & Pay</span>
               </div>
            </form>
         </div>
      </div>
      <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/footer.php"); ?>
   </div>
</body>
</html>