<!DOCTYPE html>
<html>
<head>
   <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/head.php"); ?>
</head>
<body>
   <div id="wrapper">
      <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/header.php"); ?>
      <div class="main clearfix">
         <div class="wrap border-bottom shadow-bottom">
            <span class="pagetitle">ABOUT</span>
            <?php $selected = "scholarship"; include($root."/about/about_topnav_template.php"); ?>
         </div>
         <div class="fullpage-contwrap">
            <div class="cont solo">
               <div class="contentblock">
                  <p>The top 1.5% of freshman applicants to UCLA, along with approxmately 600 third year transfer students are invited to apply for the Regents Scholarship. Of these students, 100 students receive the offer of scholarship.</p>
                  <p>The application itself is separate from the UC application, and consists of two short personal essays and a letter of recommendation. The application review and selection process is conducted by the faculty advisors to the Regents Scholar Society.</p>
                  <p>The Scholarship itself consists of:
                     <ul>
                        <li>A $2000 honorarium, provided <i>ex gratia</i> as well as an 
                        amount of financial aid sufficient to meet the needs of the scholar 
                        <li>Preferential pre-enrollment in UCLA courses
                        <li>Guaranteed on-campus housing for four years
                        <li>Guaranteed on-campus parking
                        <li>Eligibility to join the Regents Scholar Society
                     </ul>
                  </p>
                  <p>However, the recipient of the scholarship must maintain a cumulative GPA at or above 3.0 in order to continue to receive the benefits of the scholarship.</p>
               </div>
            </div>
         </div>
      </div>
      <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/footer.php"); ?>
   </div>
</body>
</html>