<!DOCTYPE html> 
<html>
	<head>
		<?php 
			if (isset($_GET['member_id'])) { $member_id = $_GET['member_id']; }
			if (isset($_GET['profile_row'])) { $profile_row = $_GET['profile_row']; }
			
			// $limiter defines whether the group you are looking for is all alumni, alumni of a specific year, etc
			
			if (isset($_GET['limiter'])) { 
				$limiter = $_GET['limiter']; 
				if (is_numeric($limiter)) {
					$limiter0 = " WHERE graduated='".$limiter."'";
					$limiter2 = '&limiter='.$limiter;
					$limiter3 = 'from the class of '.$limiter;
				}
				elseif ($limiter=='before_2000') {
					$limiter0 = " WHERE graduated='Before 2000'";
					$limiter2 = '&limiter='.$limiter;
					$limiter3 = 'who graduated before 2000';
				}
				elseif ($limiter=='unknown_year') {
					$limiter0 = " WHERE graduated=''";
					$limiter2 = '&limiter='.$limiter;
					$limiter3 = 'whose graduating class is unknown';
				}
				else{
					$limiter0 = ' WHERE '.$limiter.'=1';
					$limiter2 = '&limiter='.$limiter;
					$limiter3 = 'with experience in '.substr($limiter, 2, 20);
					if ($limiter == 'e_cars') {
						$limiter3 = 'with experience in cars and transportation';
					}
					if ($limiter == 'e_business') {
						$limiter3 = 'with experience in business and economics';
					}
					if ($limiter == 'e_computers') {
						$limiter3 = 'with experience in computers and technology';
					}
					if ($limiter == 'e_film') {
						$limiter3 = 'with experience in film and theater';
					}
					if ($limiter == 'e_government') {
						$limiter3 = 'with experience in government and politics';
					}
					if ($limiter == 'e_graphics') {
						$limiter3 = 'with experience in graphics and design';
					}
					if ($limiter == 'e_cultures') {
						$limiter3 = 'with experience in languages and cultures';
					}
					if ($limiter == 'e_teaching') {
						$limiter3 = 'with experience in teaching and education';
					}
					if ($limiter == 'e_web') {
						$limiter3 = 'with experience in web development';
					}
					if ($limiter == 'e_other') {
						$limiter3 = 'with experience in other areas';
					}
					if ($limiter == 'e_math') {
						$limiter3 = 'with experience in mathematics';
					}
					if ($limiter == 'e_military') {
						$limiter3 = 'with experience in the military';
					}
				}
			}
			else { $limiter2=""; }
			$dbh=mysql_connect ("localhost", "rssla_scholar", "hilltop23") or die ('I cannot connect to the database because: ' . mysql_error());
			mysql_select_db ("rssla_rss");
			
			$request = "SELECT * FROM alumni WHERE id=".$member_id;
			$query = mysql_query($request, $dbh);
			while ($results = mysql_fetch_array($query)) {
					$last_name = $results['last_name'];
				$first_name = $results['first_name'];
				$email = $results['email'];
				$password = $results['password'];
				$gender = $results['gender'];
				$month = $results['month'];
				$date = $results['date'];
				$hometown = $results['hometown'];
				$aim = $results['aim'];
				$homepage = $results['homepage'];
				$homepage_name = $results['homepage_name'];
				$graduated = $results['graduated'];
				$major = $results['major'];
				$minor = $results['minor'];
				$after_graduation = $results['after_graduation'];
				$class = $results['class'];
				$place = $results['place'];
				$movie = $results['movie'];
				$tv_show = $results['tv_show'];
				$book = $results['book'];
				$song = $results['song'];
				$day_of_year = $results['day_of_year'];
				$free_time = $results['free_time'];
				$website = $results['website'];
				$quote = $results['quote'];
				$hobbies = $results['hobbies'];
				$sports = $results['sports'];
				$rss_position = $results['rss_positions'];
				$rss_activity = $results['rss_activity'];
				$rss_memory = $results['rss_memory'];
				$organizations = $results['other_organizations'];
				$job = $results['occupation'];
				$former_employers = $results['former_employers'];
				$talk_about = $results['talk_about'];
				$exp_business = $results['e_business']; 
				$exp_cars = $results['e_cars']; 
				$exp_computers = $results['e_computers']; 
				$exp_engineering = $results['e_engineering']; 
				$exp_film = $results['e_film']; 
				$exp_government = $results['e_government']; 
				$exp_graphics = $results['e_graphics']; 
				$exp_history = $results['e_history']; 
				$exp_cultures = $results['e_cultures']; 
				$exp_math = $results['e_math']; 
				$exp_medicine = $results['e_medicine']; 
				$exp_military = $results['e_military']; 
				$exp_psychology = $results['e_psychology']; 
				$exp_religion = $results['e_religion']; 
				$exp_science = $results['e_science']; 
				$exp_teaching = $results['e_teaching']; 
				$exp_travel = $results['e_travel']; 
				$exp_web = $results['e_web']; 
				$exp_other = $results['e_other'];  
				$det_business = $results['d_business']; 
				$det_cars = $results['d_cars']; 	
				$det_computers = $results['d_computers']; 
				$det_engineering = $results['d_engineering']; 
				$det_film = $results['d_film']; 
				$det_government = $results['d_government']; 
				$det_graphics = $results['d_graphics']; 
				$det_history = $results['d_history']; 
				$det_cultures = $results['d_cultures']; 
				$det_math = $results['d_math']; 
				$det_medicine = $results['d_medicine']; 
				$det_military = $results['d_military']; 
				$det_psychology = $results['d_psychology']; 
				$det_religion = $results['d_religion']; 
				$det_science = $results['d_science']; 
				$det_teaching = $results['d_teaching']; 
				$det_travel = $results['d_travel']; 
				$det_web = $results['d_web']; 
				$det_other = $results['d_other']; 
				$message = $results['message']; 
				$photo_url = $results['photo_url']; 
			}
			
			if ($homepage != '' and $homepage_name == '') {
				$homepage_name = 'My homepage';
			}
						
			//get previous and next alumni (for specified limiter)
			
			$row_counter = 1;
			$request = "SELECT id, last_name, first_name FROM alumni".$limiter0." GROUP BY last_name, first_name ORDER BY last_name, first_name, id ASC";
			$query = mysql_query($request, $dbh);
			while ($results = mysql_fetch_array($query)) {
				if ($row_counter == ($profile_row - 1)) {
					$prev_id = $results['id'];
					$prev_profile_row = $row_counter;
					$prev_last_name = $results['last_name'];
					$prev_first_name = $results['first_name'];
				}
				if ($row_counter == ($profile_row + 1)) {
					$next_id = $results['id'];
					$next_profile_row = $row_counter;
					$next_last_name = $results['last_name'];
					$next_first_name = $results['first_name'];
				}
				$row_counter = $row_counter + 1;
			}
			
			mysql_close($dbh);
			
			if ($homepage != '' and $homepage_name == '') {
				$homepage_name = 'My homepage';
			}		
		
			$subtitle_line = $profile_row." of ".($row_counter - 1)." alumni profiles.";
			if (isset($limiter)) {
				$subtitle_line = $profile_row." of ".($row_counter - 1)." alumni ".$limiter3;
			}
			
			?>
			<?php print('<title>Profile for '.$first_name.' '.$last_name."</title>\n") ?>
<?php include($_SERVER['DOCUMENT_ROOT'].'/_layout/head_no_title.txt'); ?>
	</head>
	<body>
		<header id="masthead">
			<a href="/" id="rss_seal"></a>
			<hgroup>
				<?php
										
				print('<h1>'.$first_name.' '.$last_name.'</h1>
				<h2>'.$subtitle_line.'</h2>');
				?>	
			</hgroup>
			<nav>	
				<?php include($_SERVER['DOCUMENT_ROOT'].'/_layout/nav.php'); ?>
			</nav>
		</header>
		<div id="main">
			<div class="box_gradient_1 top_gradient"></div>
			<div id="main_centered">
				<section>
				<div class="cont cent">
					<?php if($prev_id != ''){print('<p class="leftlink">Previous Profile:</br /><a href="/alumni/profiles/view_profile2.php?member_id='.$prev_id.'&profile_row='.$prev_profile_row.$limiter2.'">'.$prev_first_name.' '.$prev_last_name."</a></p>\n");}	?>
					<?php if($next_id != ''){print('<p class="rightlink">Next Profile:</br /><a href="/alumni/profiles/view_profile2.php?member_id='.$next_id.'&profile_row='.$next_profile_row.$limiter2.'">'.$next_first_name.' '.$next_last_name."</a></p>\n");}	?>
				</div>
				<div class="clear"></div>
				<?php
					
					if ($message != '' && $message != 'I am too lazy to write a message or delete this.'){
						print('<div class="cent cont"><p class="largeCenterP">'.$message."</p></div>\n");
					}
					$basics_array=array(
						"E-mail" => $email,
						"AIM" => $aim,
						"Occupation" => $job,
						"Hometown" => $hometown,
						"Homepage" => $homepage_name
					);
					
					$basics_array=array_filter($basics_array);
					if ( !empty($basics_array)){
						print('<div class="cont lsec twothirds">
						<header>
							<h1>The Basics</h1>
						</header>');
						
						if ($photo_url != '') {
							$imageinfo3 = getimagesize($_SERVER['DOCUMENT_ROOT'].'/alumni/profiles/photos/'.$photo_url);
							$ix3=$imageinfo3[0];
							$iy3=$imageinfo3[1];
							
							$heightscale3 = $iy3/150;
							$widthscale3 = $ix3/120;
							
							$photo_dim = '';
							if($widthscale3 > 1) {
								if ($heightscale3 > $widthscale3) {
									$photo_dim = ' height=150';
								}
								else {
									$photo_dim = ' width=120';	
								}
							}
							else {
								if ($heightscale3 > 1) {
									$photo_dim = ' height=150';
								}
							}
						print('<img class="profileimg" src="/alumni/profiles/photos/'.$photo_url.'"'.$photo_dim.'">');
						}
						print('<dl class="inlinedl">');
						foreach($basics_array as $k => $v){
							print("\n<dt>".$k.":</dt>\n<dd>".$v.'</dd>');
						}
						print('</dl></div>');
					}
					$favs_array=array(
						"Class at UCLA" => $class,
						"Place to go" => $place,
						"Movie" => $movie,
						"TV Show" => $tv_show,
						"Book" => $book,
						"Song" => $song,
						"Day of the Year" => $day_of_year,
						"Free-time activity" => $free_time,
						"Web site" => $website,
						"Quote" => $quote,
						"Hobbies" => $hobbies,
						"Sports" => $sports,
						"RSS Memory" => $rss_memory,
						"RSS Activity" => $rss_activity
					);
					$favs_array=array_filter($favs_array);
					if ( !empty($favs_array)){
						print('<div class="cont rsec third">
						<header>
							<h1>Favorites</h1>
						</header>
						<dl>');
						foreach($favs_array as $k => $v){
							if($k=='Book'){print("\n<dt>Book</dt>\n<dd><i>".$v."</i></dd>");}
							elseif($k=='Web site'){print("\n".'<dt>Web site</dt><dd><a href="http://'.$v.'" target=_blank>'.$v.'</a></dd>');}
							else{print("\n<dt>".$k."</dt>\n<dd>".$v.'</dd>');}
						}
						print('</dl></div>');
					}
					$bio_array=array(
						"Graduated UCLA" => $graduated,
						"Major" => $major,
						"Minor" => $minor,
						"Graduate School" => $after_graduation,
						"RSS Titles Held" => $rss_position,
						"RSS Plans" => $rss_plans,
						"Involvement" => $organizations,
						"Job History" => $former_employers
					);
					$bio_array=array_filter($bio_array);
					if ( !empty($bio_array)){
						print('<div class="cont lsec twothirds">
						<header>
							<h1>UCLA and Beyond</h1>
						</header>
						<dl class="inlinedl">');
						foreach($bio_array as $k => $v){
							print("\n<dt>".$k.":</dt>\n<dd>".$v.'</dd>');
						}
						print('</dl></div>');
					}
					
					
					$exp_list = array('Business/Economics', 'Cars/Transportation', 'Computers/Technology', 'Engineering', 'Film/Theater', 'Government/Politics', 'Graphics/Design', 'History', 'Languages/Cultures', 'Mathematics', 'Medicine', 'Military', 'Psychology', 'Religion', 'Science', 'Teaching/Education', 'Travel', 'Web Development', 'Other');
					
					$exp_vars = array($exp_business, $exp_cars, $exp_computers, $exp_engineering, $exp_film, $exp_government, $exp_graphics, $exp_history, $exp_cultures, $exp_math, $exp_medicine, $exp_military, $exp_psychology, $exp_religion, $exp_science, $exp_teaching, $exp_travel, $exp_web, $exp_other);
					
					$det_vars = array($det_business, $det_cars, $det_computers, $det_engineering, $det_film, $det_government, $det_graphics, $det_history, $det_cultures, $det_math, $det_medicine, $det_military, $det_psychology, $det_religion, $det_science, $det_teaching, $det_travel, $det_web, $det_other);
					
					$exp_vars_withBlanksRemoved = array_filter($exp_vars);
					if( !empty($exp_vars_withBlanksRemoved)){
						print('<div class="lsec cont twothirds">
								<header>
									<h1>Areas of Experience</h1>
								</header>
								<dl>');
								for ($i = 0; $i < count($exp_list); $i++) {
								    if($exp_vars[$i]){
								    	print('<dt>'.$exp_list[$i].'</dt>'."\n");
								    	if ($det_vars[$i] != 'Give details here' && $det_vars[$i] != '') {
								    		print('<dd>'.$det_vars[$i].'</dd>'."\n");
								    	}
								    	else{
								    		print('<dd></dd>');
								    	}
								    }
								}
						print("</div>\n");		
					}
					?>
				<div class="cent cont">
					<p class="rightlink"><a href="/alumni/profiles">Return to list of alumni</a></p>
				</div>
				</section>
			</div>
			<div class="box_gradient_2 bottom_gradient"></div>
		</div>
		<footer>
			<?php include($_SERVER['DOCUMENT_ROOT'].'/_layout/footer_standard.php'); ?>
		</footer>	
	</body>
</html>
			

