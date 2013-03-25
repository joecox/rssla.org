<!DOCTYPE html>
<html>
<head>
   <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/head.php"); ?>
   <link rel="stylesheet" href="/_layout/stylesheets/formelements.css">
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
            <div class="pagetitle">CONFERENCE</div>
            <div class="sidenav">
               <a href="#letter">
                  <div class="sidenavitem">
                     <div>A message from the</br>UC Liaison</div>
                  </div>
               </a>
               <a href="#signup">
                  <div class="sidenavitem">
                     <span>Sign up</span>
                  </div>
               </a>
            </div>
         </div>
         <div class="cont three-quarters">
            <div class="rowtitle" id="letter"><span>A message from the UC Liaison</span></div>
            <div class="contentblock">
               <img style="width: 700px" src="/resources/images/conference/2012_conference.jpg">
               <p class="caption">2012 Regents Conference at UC Berkeley...Just your normal scholars in their natural habitat.<br>Photo Credit: Tony Zhou / UC Berkeley RCSA</p>
               <p><b>Scholars Assemble!!</b> The time has come in the year for California's strongest, brightest and coolest from all across the UC system to band together and scholar out. The <b>Regents Scholar Society at UCLA</b> has the privilege to <b>invite YOU</b> to partake in this annual gathering of a lifetime. It has taken most of the school year to plan this weekend of awesome nerdy interaction. It was a <span style="color: rgb(76, 156, 255);">great responsibility</span>, but that was expected with the <span style="color: rgb(76, 156, 255);">great power</span> of hosting.</p>

               <p>It'll be a weekend of leadership development, scholar networking and adventure - LA Style!! It is your chance to meet up with old friends. It is your chance to make new ones that you'll meet up with at next year's conference. Now at this point when reading this you might think to yourself, "why should I go all the way to LA to hang out and meet with Regents Scholars? I have an <span style="color: rgb(41, 196, 78);">army of friends</span> at my school"...well to that I simply answer, "We have a <b><span style="color: rgb(41, 196, 78);">Hulk</span></b>..." Well not really, but we have someone that could dress up as one if that'll get you to come; proving that the possibilities are endless at the <b>2013 REGENTS SCHOLARS CONFERENCE!!!</b></p>

               <p>So will you step up to join your fellow scholars from <b>MAY 3rd-5th</b>? Will you step up to represent your school? Can you break through walls, rescue people in distress and fly around the world all before dinner time? If you can answer 2 out of these three questions then you are just AWESOME and should sign up on the <span style="color: rgb(240, 23, 23);">GOOGLE DOC RSVP FORM BELOW!</span> If you can't well then you might just make the <b><span style="color: rgb(41, 196, 78);">Hulk angry</span></b>...you wouldn't like him when he's angry.</p>
               
               <p style="text-align: right; margin-right: 50px">
                  Sincerely,<br>
                  Angel B.<br>
                  UC Liaison '13
               </p>
               <p style="text-align:center">Have questions? Feel free to email Angel at <a class="norm" href="mailto:arl@rssla.org">arl@rssla.org</a></p>
            </div>
            <div class="rowtitle" id="signup"><span>Sign up for Conference</span></div>
            <div class="contentblock">
               <p style="text-align:center"><b>Please note, the cost for this year's conference is $20.</b></p>
               <p style="text-align:center">How to RSVP:</p>
               <p>Step 1:</p>
               <p>Fill out the form linked below:</p>
               <p style="text-align:center; font-size:2rem;"><a class="norm" href="https://docs.google.com/spreadsheet/viewform?
formkey=dGNmU0tRcDBIelByb1dSRE5oUGRFc2c6MQ#gid=0">I WILL JOIN MY FELLOW SCHOLARS AT<br>THE 2013 REGENTS SCHOLAR CONFERENCE</a></p>
               <p>Step 2:</p>
               <p>Submit your payment to either:</p>
               <ul>
                  <li>Paypal, by clicking 
                     <form style="display:inline" action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                        <input type="hidden" name="cmd" value="_s-xclick">
                        <input type="hidden" name="hosted_button_id" value="CV29U7XEQFTRG">
                        <a class="norm" id="submit">here</a>
                     </form>
                  </li>
                  <li>Your society's UC Liaison</li>
               </ul>
            </div>
         </div>
      </div>
      <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/footer.php"); ?>
   </div>
   <script>
      $('#submit').click(function () 
      {
         $('form').submit();
      });
   </script>
</body>
</html>