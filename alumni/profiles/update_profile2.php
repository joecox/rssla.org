<html>
	<head>
		<title>
			Update Your Profile
		</title>
		<link href="http://www.rssla.org/_layout/styles.css" rel="stylesheet" type="text/css">
	</head>

<body background="http://www.rssla.org/_layout/body/dark_stripes.jpg">

<?php

if (isset($_POST['profile_id'])) { $profile_id = $_POST['profile_id']; }
if (isset($_POST['entered_id'])) { $entered_id = $_POST['entered_id']; }

$dbh=mysql_connect ("localhost", "rssla_scholar", "hilltop23") or die ('I cannot connect to the database because: ' . mysql_error());
mysql_select_db ("rssla_rss");

$request = "SELECT * FROM alumni WHERE id=".$profile_id;
$query = mysql_query($request, $dbh);
while ($results = mysql_fetch_array($query)) {
		$last_name = $results['last_name'];
	$first_name = $results['first_name'];
	$email = $results['email'];
	$password = $results['password'];
	$gender = $results['gender'];
	$bday_month = $results['month'];
	$bday_date = $results['date'];
	$Home = $results['hometown'];
	$AIM = $results['aim'];
	$WWW = $results['homepage'];
	$WWWname = $results['homepage_name'];
	$Graduated = $results['graduated'];
	$Major = $results['major'];
	$Minor = $results['minor'];
	$Plans = $results['after_graduation'];
	$class = $results['class'];
	$place = $results['place'];
	$Movie = $results['movie'];
	$TV = $results['tv_show'];
	$Book = $results['book'];
	$Music = $results['song'];
	$Day = $results['day_of_year'];
	$Free = $results['free_time'];
	$website = $results['website'];
	$quote = $results['quote'];
	$Hobbies = $results['hobbies'];
	$Sports = $results['sports'];
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
	$Message = $results['message']; 

}

mysql_close($dbh);

if ($entered_id == $password) {
print(stripslashes('<p class=bigtext><b>Only the name and e-mail are required.</b> Your student ID is on record and is not editable.</p>'));

$experience_list = array('Business/Economics', 'Cars/Transportation', 'Computers/Technology', 'Engineering', 'Film/Theater', 'Government/Politics', 'Graphics/Design', 'History', 'Languages/Cultures', 'Mathematics', 'Medicine', 'Military', 'Psychology', 'Religion', 'Science', 'Teaching/Education', 'Travel', 'Web Development', 'Other');

$experience_vars = array($exp_business, $exp_cars, $exp_computers, $exp_engineering, $exp_film, $exp_government, $exp_graphics, $exp_history, $exp_cultures, $exp_math, $exp_medicine, $exp_military, $exp_psychology, $exp_religion, $exp_science, $exp_teaching, $exp_travel, $exp_web, $exp_other);

$details_vars = array($det_business, $det_cars, $det_computers, $det_engineering, $det_film, $det_government, $det_graphics, $det_history, $det_cultures, $det_math, $det_medicine, $det_military, $det_psychology, $det_religion, $det_science, $det_teaching, $det_travel, $det_web, $det_other);

$experience_vars_names = array('exp_business', 'exp_cars', 'exp_computers', 'exp_engineering', 'exp_film', 'exp_government', 'exp_graphics', 'exp_history', 'exp_cultures', 'exp_math', 'exp_medicine', 'exp_military', 'exp_psychology', 'exp_religion', 'exp_science', 'exp_teaching', 'exp_travel', 'exp_web', 'exp_other');

$details_vars_names = array('det_business', 'det_cars', 'det_computers', 'det_engineering', 'det_film', 'det_government', 'det_graphics', 'det_history', 'det_cultures', 'det_math', 'det_medicine', 'det_military', 'det_psychology', 'det_religion', 'det_science', 'det_teaching', 'det_travel', 'det_web', 'det_other');

$confirm_body4 = '';
$exp_counter = 0;
while ($exp_counter < 19) {
	if ($details_vars[($exp_counter)] == 'Give details here') {
		$details_vars[($exp_counter)] = '';
	}
	elseif ($details_vars[($exp_counter)] != '') {
		$experience_vars[($exp_counter)] = '1';
	}
	$exp_counter = $exp_counter + 1;
}

	$male_check = '';
	$female_check = '';
	if ($gender == 'male') {
		$male_check = ' checked';
	}
	elseif ($gender == 'female') {
		$female_check = ' checked';
	}

	print(stripslashes('

<form method=POST action="update_profile3.php" enctype="multipart/form-data">

<table align=center border=0 cellpadding=5 width=100% class="content">

	<tr>
		<td colspan="2" align=center><hr><span class=bigtext><b>Personal Information</b></span></td>
	</tr>
  <tr>
    <td width=150 align="right">First Name</td>
    <td><input type=text name="first_name" value="'.$first_name.'" size=35></td>
  </tr>
  <tr>
    <td width=150 align="right">Last Name</td>
    <td><input type=text name="last_name" value="'.$last_name.'" size=35></td>
  </tr>
  <tr>
    <td width=150 align="right">E-mail</td>
    <td><input type=text name="email" value="'.$email.'" size=35></td>
  </tr>
  <tr>
    <td width=170 align="right">Gender</td>
    <td><input type=radio name="gender" value="female"'.$female_check.'>Female&nbsp;&nbsp;&nbsp;&nbsp;<input type=radio name="gender" value="male"'.$male_check.'>Male</td>
  </tr>
  <tr>
    <td width=170 align="right">Birthday</td>
    <td>		<select name="bday_month">'));

$month_list = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');

if ($bday_month != 0) {
	print('<option value="'.$bday_month.'">'.$month_list[($bday_month - 1)].'<option value="">-------');
}
else {
	print('<option value="">Month');
}
print(stripslashes('				<option value="1">January
				<option value="2">February
				<option value="3">March
				<option value="4">April
				<option value="5">May
				<option value="6">June
				<option value="7">July
				<option value="8">August
				<option value="9">September
				<option value="10">October
				<option value="11">November
				<option value="12">December
			</select><select name="bday_date">'));
if ($bday_date != 0) {
	print('<option value="'.$bday_date.'">'.intval($bday_date).'<option value="">---');
}
else {
	print('<option value="">Date');
}
print(stripslashes('				<option value="01">1
				<option value="02">2
				<option value="03">3
				<option value="04">4
				<option value="05">5
				<option value="06">6
				<option value="07">7
				<option value="08">8
				<option value="09">9
				<option value="10">10
				<option value="11">11
				<option value="12">12
				<option value="13">13
				<option value="14">14
				<option value="15">15
				<option value="16">16
				<option value="17">17
				<option value="18">18
				<option value="19">19
				<option value="20">20
				<option value="21">21
				<option value="22">22
				<option value="23">23
				<option value="24">24
				<option value="25">25
				<option value="26">26
				<option value="27">27
				<option value="28">28
				<option value="29">29
				<option value="30">30
				<option value="31">31
			</select>
</td>
  </tr>
  <tr>
    <td width=150 align="right">Hometown</td>
    <td><input type=text name="Home" value="'.$Home.'" size=35></td>
  </tr>
  <tr>
    <td width=150 align="right">AIM screenname</td>
    <td><input type=text name="AIM" value="'.$AIM.'" size=35></td>
  </tr>
  <tr>
    <td width=150 align="right">Homepage</td>
    <td><i>http://</i><input type=text name="WWW" value="'.$WWW.'" size=29></td>
  </tr>
  <tr>
    <td width=150 align="right">Homepage Name</td>
    <td><input type=text name="WWWname" size=35 value="'.$WWWname.'"></td>
  </tr>
	<tr>
		<td colspan="2" align=center><br><hr><span class=bigtext><b>Academic Information</b></span></td>
	</tr>
  <tr>
    <td width=150 align="right">Graduated UCLA</td>
    <td><select name="Graduated">
'));
if ($Graduated != '') {
	print('<option value="'.$Graduated.'">'.$Graduated.'<option value="">------');
}
else {
	print('<option value="">Year');
}


//outputs option values for possible graduation years back to 2000
			
			$recentYear = date("Y"); //grabs current year
			//this is the alumni year except if the month is before $gradMonth
			$gradMonth = 3; //which we'll allow to be March, for earlier grads
			
			if (date("n") < $gradMonth)
			{
				$recentYear -=1;
			}
			for ($i = $recentYear; $i >= 2000; $i--)
			{
				echo "\t\t\t\t";
				echo "<option value=\"$i\">$i";
				echo "\n";
			}
			
print(stripslashes('
				<option value="Before 2000">Before 2000
			</select></td>
  </tr>
  <tr>
    <td width=150 align="right">Major</td>
    <td><input type=text name="Major" size=35 value="'.$Major.'"></td>
  </tr>
  <tr>
    <td width=150 align="right">Minor</td>
    <td><input type=text name="Minor" size=35 value="'.$Minor.'"></td>
  </tr>
  <tr>
    <td width=150 align="right">Graduate School<br><i>(if applicable)</i></td>
    <td><input type=text name="Plans" size=35 value="'.$Plans.'"></td>
  </tr>
	<tr>
		<td colspan="2" align=center><br><hr><span class=bigtext><b>Favorites<br></span><span class="text"></b><i>Please do not use any quotation marks.</i></span></td>
	</tr>
  <tr>
    <td width=150 align="right">Class at UCLA</td>
    <td><input type=text name="class" size=35 value="'.$class.'"></td>
  </tr>
  <tr>
    <td width=150 align="right">Place to go</td>
    <td><input type=text name="place" size=35 value="'.$place.'"></td>
  </tr>
  <tr>
    <td width=150 align="right">Movie</td>
    <td><input type=text name="Movie" size=35 value="'.$Movie.'"></td>
  </tr>
  <tr>
    <td width=150 align="right">TV show</td>
    <td><input type=text name="TV" size=35 value="'.$TV.'"></td>
  </tr>
  <tr>
    <td width=150 align="right">Book</td>
    <td><input type=text name="Book" size=35 value="'.$Book.'"></td>
  </tr>
  <tr>
    <td width=150 align="right">Song</td>
    <td><input type=text name="Music" size=35 value="'.$Music.'"></td>
  </tr>
  <tr>
    <td width=150 align="right">Day of the year</td>
    <td><input type=text name="Day" size=35 value="'.$Day.'"></td>
  </tr>
  <tr>
    <td width=150 align="right">Ways to spend free time</td>
    <td><input type=text name="Free" size=35 value="'.$Free.'"></td>
  </tr>
  <tr>
    <td width=150 align="right">Web site</td>
    <td><i>http://</i><input type=text name="website" size=29 value="'.$website.'"></td>
  </tr>
  <tr>
    <td width=150 align="right">Quote<br><i>(do not type quotation marks)</i></td>
    <td><input type=text name="quote" size=35 value="'.$quote.'"></td>
  </tr>
  <tr>
    <td width=150 align="right">Hobbies</td>
    <td><input type=text name="Hobbies" size=35 value="'.$Hobbies.'"></td>
  </tr>
  <tr>
    <td width=150 align="right">Sports</td>
    <td><input type=text name="Sports" size=35 value="'.$Sports.'"></td>
  </tr>
	<tr>
		<td colspan="2" align=center><br><hr><span class=bigtext><b>Society Involvement</b></span></td>
	</tr>
  <tr>
    <td width=150 align="right">Positions Held</td>
    <td><input type=text name="rss_position" size=35 value="'.$rss_position.'"></td>
  </tr>
  <tr>
    <td width=150 align="right">Favorite Activity</td>
    <td><input type=text name="rss_activity" size=35 value="'.$rss_activity.'"></td>
  </tr>
  <tr>
    <td width=150 align="right">Favorite Memory</td>
    <td><input type=text name="rss_memory" size=35 value="'.$rss_memory.'"></td>
  </tr>
	<tr>
		<td colspan="2" align=center><br><hr><span class=bigtext><b>Career Information</b></span></td>
	</tr>
  <tr>
    <td width=150 align="right">Professional Organizations</td>
    <td><input type=text name="organizations" size=35 value="'.$organizations.'"></td>
  </tr>
  <tr>
    <td width=150 align="right">Occupation</td>
    <td><input type=text name="job" size=35 value="'.$job.'"></td>
  </tr>
  <tr>
    <td width=150 align="right">Former Employers</td>
    <td><input type=text name="former_employers" size=35 value="'.$former_employers.'"></td>
  </tr>

<tr>
		<td colspan="2" align=center><br><hr><span class=bigtext><b>Areas of Experience</b><br></span><span class="text"><i>Check as many as you feel apply to you. Providing details is optional.</span></td>
	</tr>'));

$exp_counter = 0;
while ($exp_counter < 19) {
	print(stripslashes('<tr><td width=170 align="right">'.$experience_list[($exp_counter)].'&nbsp;<input type="checkbox" name="'.$experience_vars_names[($exp_counter)].'" value="1"'));
	if ($experience_vars[($exp_counter)] == '1') {
		print(' checked="true"');
	}
	print('></td><td><input type=text name="'.$details_vars_names[($exp_counter)].'" size=35 value="');
	if ($details_vars[($exp_counter)] == '') {
		print('Give details here');
	}
	else {
		print(stripslashes($details_vars[($exp_counter)]));
	}
	print('"></td></tr>
');
	$exp_counter = $exp_counter + 1;
}

print(stripslashes('	<tr>
		<td colspan="2" align=center><span class=bigtext><br><hr><b>Personal Message<br></span><span class="text"></b><i>Note: to indicate a &#147;return,&#148; please type </i>&lt;br&gt;</i></span></td>
	</tr>
  <tr>
    <td colspan=2 align=center><textarea cols=40 rows=4 wrap=virtual name="Message">'.$Message.'</textarea></td>
  </tr>
	<tr>
		<td colspan="2" align=center><br><hr><span class=bigtext><b>Add/Update Profile Picture<br></span><span class="text"></b><i>If your profile already has a photo, it will be used unless you upload a new one.<br>Photos must be less than 200 KB</td>
	</tr>
<tr>
		<td colspan="2" align=center>
		<input type=hidden value="200000" name="max_file_size">
		<input name="uploaded_file" type="file" value="Replace Photo">

</td></tr>
	<tr>
		<td colspan="2" align=center><br><hr><span class=bigtext><b>Comments for the Communications Director</b></span></td>
	</tr>
  <tr>
    <td colspan=2 align=center><input type=text name="Comments" size=47 value="'.$Comments.'"></td>
  </tr>
<tr>
    <td align=center colspan=2><br><hr>
	<i>Click "Submit" only once. The page may take a while to load if you\'re uploading a photo.<br><br>
	<input type=hidden name="profile_id" value="'.$profile_id.'">
      <input type=submit value="Submit my Update">
    </td>
  </tr>
</table>

</form>

</body>

</html>'));
}
else {
	print('<p class=bigtext><b>Sorry, the Student ID you entered does not match the one we have on file for you.</b> Contact <a href="mailto:communications@rssla.org">communications@rssla.org</a> for assistance.</p></body></html>');
}
?>