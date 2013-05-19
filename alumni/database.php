<!DOCTYPE html>
<html>
<head>
   <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/head.php"); ?>
</head>
<body>
   <div id="wrapper">
      <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/header.php"); ?>
      <div class="main clearfix">
         <div class="bannerwrap">
            <img class="photobanner" src="">
            <div class="bannertext"></div>
         </div>
         <div class="wrap border-bottom shadow-bottom">
            <span class="pagetitle">ALUMNI</span>
         </div>
         <div class="fullpage-contwrap">
					<div class="cent cont">
						<p class="rightlink"><a href="/alumni/">Return to Alumni home</a></p>
					</div>
					<div class="cont cent">
						<?php
							if(isset($_GET['limiter'])) {
							}
							else {
								print(stripslashes('<p>We know how hard it can be to find that internship or get answers to your career questions as you prepare for life after college. As a past or present member of RSS, you have access to an invaluable resource: other alumni members who have the experience and connections you need to help you find your footing.</p><p>Want to know which courses will be most useful in your field after you graduate? Looking for advice on what path to follow after you graduate? Hoping to find out if there are any employment opportunities where other alumni work? Just choose your area of interest and start networking. Even if you\'re just looking for help with a free-time project you\'re working on, the alumni will enjoy sharing their knowledge and expertise with you.</p><p>Alumni, please contribute to our database by submitting your profile on the <a href="profiles/">profiles page</a>.</p>'));
							}
						?>
						<p>Since this page includes alumni profiles sorted by areas of experience, <b>opening one here will let you cycle through the profiles of everyone who has experience in a particular area.</b></p>
						
						<div class="threecolumntableleft">
							<a href="database.php?limiter=e_business">Business/Economics</a><br>
							<a href="database.php?limiter=e_cars">Cars/Transportation</a><br>
							<a href="database.php?limiter=e_computers">Computers/Technology</a><br>
							<a href="database.php?limiter=e_engineering">Engineering</a><br>
							<a href="database.php?limiter=e_film">Film/Theater</a><br>
							<a href="database.php?limiter=e_government">Government/Politics</a><br>
							<a href="database.php?limiter=e_graphics">Graphics/Design</a><br>
						</div>
						<div class="threecolumntablecenter">
							<a href="database.php?limiter=e_history">History</a><br>
							<a href="database.php?limiter=e_cultures">Languages/Cultures</a><br>
							<a href="database.php?limiter=e_math">Mathematics</a><br>
							<a href="database.php?limiter=e_medicine">Medicine</a><br>
							<a href="database.php?limiter=e_military">Military</a><br>
							<a href="database.php?limiter=e_psychology">Psychology</a><br>
						</div>
						<div class="threecolumntableright">
							<a href="database.php?limiter=e_religion">Religion</a><br>
							<a href="database.php?limiter=e_science">Science</a><br>
							<a href="database.php?limiter=e_teaching">Teaching/Education</a><br>
							<a href="database.php?limiter=e_travel">Travel</a><br>
							<a href="database.php?limiter=e_web">Web Development</a><br>
							<a href="database.php?limiter=e_other">Miscellaneous</a><br>
						</div>
					</div>
					<div class="clear"></div>
					<div class="cent cont">
						<?php
							if(isset($_GET['limiter'])) {
								$limiter = $_GET['limiter'];
								$body_table = '';
								$limiter1 = ' WHERE '.$limiter.'=1';
								$limiter2 = '&limiter='.$limiter;
								$limiter3 = ', d_'.substr($limiter, 2, 20);
								$limiter4 = substr($limiter, 2, 20);
								if ($limiter == 'e_cars') {
									$limiter4 = 'cars and transportation';
								}
								if ($limiter == 'e_business') {
									$limiter4 = 'business and economics';
								}
								if ($limiter == 'e_computers') {
									$limiter4 = 'computers and technology';
								}
								if ($limiter == 'e_film') {
									$limiter4 = 'film and theater';
								}
								if ($limiter == 'e_government') {
									$limiter4 = 'government and politics';
								}
								if ($limiter == 'e_graphics') {
									$limiter4 = 'graphics and design';
								}
								if ($limiter == 'e_cultures') {
									$limiter4 = 'languages and cultures';
								}
								if ($limiter == 'e_teaching') {
									$limiter4 = 'teaching and education';
								}
								if ($limiter == 'e_web') {
									$limiter4 = 'web development';
								}
								if ($limiter == 'e_other') {
									$limiter4 = 'other areas';
								}
								if ($limiter == 'e_math') {
									$limiter4 = 'mathematics';
								}
								if ($limiter == 'e_military') {
									$limiter4 = 'the military';
								}
							
								$table_caption='Alumni with experience in '.$limiter4;
							
								$dbh=mysql_connect ("localhost", "rssla_scholar", "hilltop23") or die ('I cannot connect to the database because: ' . mysql_error());
								mysql_select_db ("rssla_rss");
								
								$row_counter = 1;
								$request = "SELECT first_name, last_name, id ".$limiter3.", occupation, major FROM alumni".$limiter1." GROUP BY last_name, first_name ORDER BY last_name, first_name, id ASC";
								$query = mysql_query($request, $dbh);
								while ($results = mysql_fetch_array($query)) {	
									if ($results[3] == '' or $results[3] == 'Give details here') {
												$details = '';
									}
									else {
										$details = $results[3];
									}
									$last_name = $results['last_name'];
									$occupation = $results['occupation'];
									$major = $results['major'];
									$hobbies = $results['hobbies'];
									$more_details = '';
									if ($occupation != '') {
										$more_details = '<p><b>Occupation: </b>'.$occupation.'</p>';
									}
									if ($major != '') {
										$more_details = $more_details.'<p><b>Graduating Major: </b>'.$major.'</p>';
									}
									$first_name = $results['first_name'];
									$id = $results['id'];
									$body_table = $body_table.'
							<tr><th scope="row"><a href="profiles/view_profile2.php?member_id='.$id.'&profile_row='.$row_counter.$limiter2.'">'.$last_name.', '.$first_name.'</a></th><td>'.$details.$more_details.'</td></tr>';
									$row_counter = $row_counter + 1;
								}
								mysql_close($dbh);
								
								if ($body_table != '') {
										print(stripslashes('<table class="alumnitable"><caption>'.$table_caption.'<tbody>
								<tr><th scope="col">Person</th><th scope="col">Details</th></tr>
								'.$body_table.'</tbody></table>'));
								}
								else {
										print('<p>Sorry, no one has experience in that area yet.</p>');
								}
							}
							?>
					</div>
			</div>
		</div>
      <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/footer.php"); ?>
   </div>
</body>
</html>