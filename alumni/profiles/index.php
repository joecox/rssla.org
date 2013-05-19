<!DOCTYPE html> 
<html>
	<head>
		<?php include($_SERVER['DOCUMENT_ROOT'].'/_layout/head_standard.txt'); ?>
	</head>
	<body>
		<header id="masthead">
			<a href="/" id="rss_seal"></a>
			<hgroup>
				<h1>Meet the Alumni</h1>
				<h3>This is a list of all alumni profiles.<br />
				Undergraduate profiles are on the <a href="/members/">Members Page.</a></h3>			
			</hgroup>
			<nav>	
				<?php include($_SERVER['DOCUMENT_ROOT'].'/_layout/nav.php'); ?>
			</nav>
		</header>
		<div id="main">
			<div class="box_gradient_1 top_gradient"></div>
			<div id="main_centered">
				<section>
					<div class="cent cont">
						<p class="rightlink"><a href="/alumni/">Return to Alumni home</a></p>
					</div>
					<div class="cont cent">
						<p class="rightlink"><a href="/alumni/profiles/index_year.php">Sort profiles by graduating year</a></p>
					</div>
					<div class="cent cont">					
						<p>The subhead (line of text below the name when you open a profile) indicates what set of profiles you're viewing, whether it's the class of 2005, just the people with experience in engineering, or all alumni profiles. You can then use the links in the upper-right corner of the profile to cycle through other profiles in that same set.</p>
						<p>For instance, if you searched the <a href="/alumni/database.php">database</a> for alumni with experience in medicine and opened a profile from there, the subhead of that profile would indicate that you're browsing alumni with experience in medicine. Using the links in the upper right corner of the profile would let you cycle through other alumni profiles that also list medicine as an area of experience. Confused? Try opening a profile from this page and try opening a profile from the database page, and it'll start to make sense.</p>
						<p>Since this page includes all alumni profiles, <b>opening one here will let you cycle through the entire group without filtering by experience or class.</b></p>
						<hr>
						<p class="rightlink"><a href="javascript:opensl('/alumni/profiles/new_profile.php')">Submit new profile</a> | <a href="javascript:opensl('/alumni/profiles/update_profile.php')">Update existing profile</a></p>
					</div>
					<div class="clear"></div>
					<div class="cent cont">
						<div class="threecolumntableleft">
							<?php
							$dbh=mysql_connect ("localhost", "rssla_scholar", "hilltop23") or die ('I cannot connect to the database because: ' . mysql_error());
							mysql_select_db ("rssla_rss");
							
							$title = '';
							$first_linebreak = '<br>';
							
							$request1 = "SELECT COUNT(DISTINCT first_name, last_name) FROM alumni";
							$query1 = mysql_query($request1, $dbh);
							while ($results1 = mysql_fetch_array($query1)) {
							$table_length = $results1['COUNT(DISTINCT first_name, last_name)'];
							}
							
							$first_point = ceil($table_length/3);
							$second_point = ceil(2*$table_length/3);
							$row_counter = 1;
							$request = "SELECT first_name, last_name, id FROM alumni GROUP BY last_name, first_name  ORDER BY last_name, first_name, id ASC";
							$query = mysql_query($request, $dbh);
							while ($results = mysql_fetch_array($query)) {
								$last_name = $results['last_name'];
								$first_name = $results['first_name'];
								$id = $results['id'];
								print(stripslashes('<br><a href="view_profile2.php?member_id='.$id.'&profile_row='.$row_counter.'">'.$last_name.', '.$first_name.'</a>'));
							
								if ($row_counter == $first_point) {
									print('</div><div class="threecolumntablecenter">');
								}
								if ($row_counter == $second_point) {
									print('</div><div class="threecolumntableright">');
								}
								$row_counter = $row_counter + 1;
							}
							
							mysql_close($dbh);
							?>	
						</div>
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