 <?php
function profile_compiler($count, $title, $list, $vars) {
$temp_counter = $count - 1;
$temp_code = '';
//$temp_br = '';
while ($temp_counter >= 0) {
	if ($vars[$temp_counter] != '') {
		$temp_code = '<font color=#777777><b>'.$list[$temp_counter].':</b></font> &nbsp;'.$vars[$temp_counter].'<br>'.$temp_code;
//		$temp_br = '<br>
//';
	}
	$temp_counter = $temp_counter - 1;
}
if ($temp_code != '') {
	$temp_code = '<br><span class="title2"><br>'.$title.'</span><br><hr size=2 color=#999999>'.$temp_code;
}
return $temp_code;
}

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

mysql_close($dbh);

$experience_list = array('Business/Economics', 'Cars/Transportation', 'Computers/Technology', 'Engineering', 'Film/Theater', 'Government/Politics', 'Graphics/Design', 'History', 'Languages/Cultures', 'Mathematics', 'Medicine', 'Military', 'Psychology', 'Religion', 'Science', 'Teaching/Education', 'Travel', 'Web Development', 'Other');

$experience_vars = array($exp_business, $exp_cars, $exp_computers, $exp_engineering, $exp_film, $exp_government, $exp_graphics, $exp_history, $exp_cultures, $exp_math, $exp_medicine, $exp_military, $exp_psychology, $exp_religion, $exp_science, $exp_teaching, $exp_travel, $exp_web, $exp_other);

$details_vars = array($det_business, $det_cars, $det_computers, $det_engineering, $det_film, $det_government, $det_graphics, $det_history, $det_cultures, $det_math, $det_medicine, $det_military, $det_psychology, $det_religion, $det_science, $det_teaching, $det_travel, $det_web, $det_other);

$academic_vars = array($graduated, $major, $minor, $after_graduation);
$academic_list = array("Graduated UCLA", "Major", "Minor", "Graduate School");

$favorites_vars = array($class, $place, $movie, $tv_show, $book, $song, $day_of_year, $free_time, $website, $quote, $hobbies, $sports);
$favorites_list = array("Class at UCLA", "Place to go", "Movie", "TV Show", "Book", "Song", "Day of the Year", "Free-time activity", "Web site", "Quote", "Hobbies", "Sports");

$society_vars = array($rss_position, $rss_activity, $rss_memory);
$society_list = array("Positions Held", "Favorite Activity", "Favorite Memory");

$career_vars = array($organizations, $job, $former_employers, $talk_about);
$career_list = array("Professional Organizations", "Occupation", "Former Employers", "Talk to me about");

print('<html>
<head>
<title>Profile for '.$first_name.' '.$last_name.'</title>
<link href="http://www.rssla.org/_layout/styles.css" rel="stylesheet" type="text/css">
</head>

<body background="http://www.rssla.org/_layout/body/stripes.jpg" leftmargin=10 topmargin=10 marginwidth=10 marginheight=10>

<center>

<table cellpadding=0 cellspacing=0 border=0 class="test2">
<tr>
<td width="8" height=22 background="http://www.rssla.org/_layout/body/bubble_left.gif"></td>
<td width="400" height=22 valign="center" background="http://www.rssla.org/_layout/body/bubble_center.gif" class="title">

'.$first_name.' '.$last_name.'

</td>
<td width="8" height=22 background="http://www.rssla.org/_layout/body/bubble_right.gif"></td>
</tr><tr><td width=8 height=4></td><td width="400"></td><td width=8></td></tr>

<tr><td width=8></td><td width="400"><span class="subtitle">
');

if ($photo_url != '') {
	print('<img align=right src="photos/'.$photo_url.'" height="150" style="border: #777777 solid 2px;">');
}

if ($gender == 'female') {
	print('<center>Alumna</center>');
}
else {
	print('<center>Alumnus</center>');
}

print(stripslashes('</span>

			<font color=777777><b>E-mail</b>:</font> <a href="mailto:'.$email.'">'.$email.'</a>'.$email2.'<br><br><br>
			'.profile_compiler(4, "Academic Information", $academic_list, $academic_vars).profile_compiler(12, "Favorites", $favorites_list, $favorites_vars).profile_compiler(4, "Career Information", $career_list, $career_vars).profile_compiler(4, "Society Involvement", $society_list, $society_vars)));


if($message != '') {
	print(stripslashes('<br><br><span class="title2">Personal Message</span><br><hr size=2 color=#999999>'.$message));
}

print('</td><td width=8></td></tr><tr><td colspan=3 height=30></td></tr></table></center></body></html>');

?>


