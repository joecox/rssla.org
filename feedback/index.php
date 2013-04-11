<!DOCTYPE html>
<html>
<head>
   <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/head.php"); ?>
   <script>
      $(document).ready(function () {
         $(".button").click(function () {
            $("#form").submit();
         });
      });
   </script>
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
            <a href="/prospective/osp/">
               <div class="pagetitle">FEEDBACK</div>
            </a>
         </div>
         <div class="cont three-quarters">
            <div class="rowtitle"><span>Feedback Form</span></div>
            <form action="feedback_process.php" method="post" id="form" style="font-weight: 400">
               <div class="contentblock">
                  <p>We would appreciate it if you could spend a few moments providing some feedback for our website.  Please fill out the form below.</p>
                  <p>If you have any questions, please email <?php echo $commFL; ?>, the Communications Director, at <a class="norm" href="mailto:communications@rssla.org">communications@rssla.org</a>.</p>
               </div>
               <div class="inputwrap">
                  <label for="experience">Have you had a positive experience with the new website?</label>
                  <textarea rows="8" cols="48" name="experience"></textarea>
               </div>
               <div class="inputwrap">
                  <label for="likes">What do you like about the website?</label>
                  <textarea rows="8" cols="48" name="likes"></textarea>
               </div>
               <div class="inputwrap">
                  <label for="notlikes">What do you not like about the website?</label>
                  <textarea rows="8" cols="48" name="notlikes"></textarea>
               </div>
               <div class="inputwrap">
                  <label for="improve">What about the website do you feel could be improved?</label>
                  <textarea rows="8" cols="48" name="improve"></textarea>
               </div>
               <div class="inputwrap">
                  <label for="features">List any potential features you feel would cause you to spend more time on the website.</label>
                  <textarea rows="8" cols="48" name="features"></textarea>
               </div>
               <div class="buttonwrap" style="margin:40px 20px 10px">
                  <span class="button" id="submit">Submit</span>
               </div>
            </form>
         </div>
      </div>
      <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/footer.php"); ?>
   </div>
   <div class="veil">
   </div>
   <div class="overlay processing">
      <div class="overlaytext processing">
         Processing
         <img style="margin-left:-5px" src="/resources/images/UI/loading.gif">
      </div>
   </div>
</body>
</html>