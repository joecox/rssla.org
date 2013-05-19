<html>
	<head>
		<title>
			Update Your Profile
		</title>
		<link href="http://www.rssla.org/_layout/styles.css" rel="stylesheet" type="text/css">
	</head>

<body background="http://www.rssla.org/_layout/body/dark_stripes.jpg">

<?php

import_request_variables("P");

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
	if ($experience_vars[($exp_counter)] == '1') {
		$confirm_body4 = $confirm_body4.$experience_list[($exp_counter)].'. '.$details_vars[($exp_counter)].'
';
	}
	$exp_counter = $exp_counter + 1;
}
$exp_business = $experience_vars[0];
$exp_cars = $experience_vars[1];
$exp_computers = $experience_vars[2];
$exp_engineering = $experience_vars[3];
$exp_film = $experience_vars[4];
$exp_government = $experience_vars[5];
$exp_graphics = $experience_vars[6];
$exp_history = $experience_vars[7];
$exp_cultures = $experience_vars[8];
$exp_math = $experience_vars[9];
$exp_medicine = $experience_vars[10];
$exp_military = $experience_vars[11];
$exp_psychology = $experience_vars[12];
$exp_religion = $experience_vars[13];
$exp_science = $experience_vars[14];
$exp_teaching = $experience_vars[15];
$exp_travel = $experience_vars[16];
$exp_web = $experience_vars[17];
$exp_other = $experience_vars[18];


$proceed = 1;
if ($email == '') {
	print('<p class=bigtext><b>ERROR: Please enter your e-mail address.</b> For questions, please contact <a href="mailto:communications@rssla.org">communications@rssla.org</a>.</p>');
	$proceed = 0;
}
elseif ($first_name == '' or $last_name == '') {
	print('<p class=bigtext><b>ERROR: Please enter your full name.</b> For questions, please contact <a href="mailto:communications@rssla.org">communications@rssla.org</a>.</p>');
	$proceed = 0;
}
else {
function get_extension($imagetype)
   {
       if(empty($imagetype)) return false;
       switch($imagetype)
       {
           case 'image/bmp': return '.bmp';
           case 'image/cis-cod': return '.cod';
           case 'image/gif': return '.gif';
           case 'image/ief': return '.ief';
           case 'image/jpeg': return '.jpg';
           case 'image/pipeg': return '.jfif';
           case 'image/tiff': return '.tif';
           case 'image/x-cmu-raster': return '.ras';
           case 'image/x-cmx': return '.cmx';
           case 'image/x-icon': return '.ico';
           case 'image/x-portable-anymap': return '.pnm';
           case 'image/x-portable-bitmap': return '.pbm';
           case 'image/x-portable-graymap': return '.pgm';
           case 'image/x-portable-pixmap': return '.ppm';
           case 'image/x-rgb': return '.rgb';
           case 'image/x-xbitmap': return '.xbm';
           case 'image/x-xpixmap': return '.xpm';
           case 'image/x-xwindowdump': return '.xwd';
           case 'image/png': return '.png';
           case 'image/x-jps': return '.jps';
           case 'image/x-freehand': return '.fh';
           default: return false;
       }
   }

$confirm_body2 = 'Thank you for your profile update. Here is a copy of the information you provided for your reference:

Name: '.$first_name.' '.$last_name.'
Email: '.$email.'
Gender: '.$gender.'
Hometown: '.$Home.'
AIM screenname: '.$AIM.'
Homepage: '.$WWW.'
Homepage Name: '.$WWWname.'

Graduated UCLA: '.$Graduated.'
Major: '.$Major.'
Minor: '.$Minor.'
Graduate School: '.$Plans.'

Favorite Class: '.$class.'
Favorite place to go: '.$place.'
Favorite Movie: '.$Movie.'
Favorite TV show: '.$TV.'
Favorite Book: '.$Book.'
Favorite Song: '.$Music.'
Favorite Day of the year: '.$Day.'
Favorite Ways to spend free time: '.$Free.'
Favorite Web site: '.$website.'
Favorite Quote: '.$quote.'
Favorite Hobbies: '.$Hobbies.'
Favorite Sports: '.$Sports.'

RSS Positions held: '.$rss_position.'
RSS Favorite Activity: '.$rss_activity.'
RSS Favorite Memory:  '.$rss_memory.'

Professional Organizations: '.$organizations.'
Occupation: '.$job.'
Former Employers: '.$former_employers.'

Message: '.$Message.'
Comments: '.$Comments.'

Checked areas of expertise:
'.$confirm_body4;


$body = 'This is a profile UPDATE
	-Member Status is: Alumni member
	-Member Name is: '.$first_name.' '.$last_name.'
	-Comments/Instructions: '.$Comments;

$dbh=mysql_connect ("localhost", "rssla_scholar", "hilltop23") or die ('I cannot connect to the database because: ' . mysql_error());
mysql_select_db ("rssla_rss");

if (get_extension($_FILES['uploaded_file']['type'])) {

$upload_tmp_dir = $_SERVER['DOCUMENT_ROOT'].'/committees/accessible/tmp/';
$uploaded_file_final = $_SERVER['DOCUMENT_ROOT'].'/alumni/profiles/photos/'.$last_name.'_'.$first_name.get_extension($_FILES['uploaded_file']['type']);

if (move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $uploaded_file_final)) {
	$photo_URL = $last_name."_".$first_name.get_extension($_FILES['uploaded_file']['type']);
	mysql_query("UPDATE alumni SET photo_url='".$photo_URL."' WHERE id='".$profile_id."';", $dbh);
}
}
$insert = "UPDATE alumni SET first_name ='".$first_name."', last_name ='".$last_name."', email ='".$email."', gender ='".$gender."', month ='".$bday_month."', date='".$bday_date."', hometown='".$Home."', aim='".$AIM."', homepage='".$WWW."', homepage_name='".$WWWname."', graduated='".$Graduated."', major='".$Major."', minor='".$Minor."', after_graduation='".$Plans."', class='".$class."', place='".$place."', movie='".$Movie."', tv_show='".$TV."', book='".$Book."', food='".$Food."', song='".$Music."', day_of_year='".$Day."', free_time='".$Free."', website='".$website."', quote='".$quote."', hobbies='".$Hobbies."', sports='".$Sports."', rss_positions='".$rss_position."', rss_activity='".$rss_activity."', rss_memory='".$rss_memory."', other_organizations='".$organizations."', occupation='".$job."', former_employers ='".$former_employers."', talk_about ='".$talk_about."', e_business='".$exp_business."', e_cars='".$exp_cars."', e_computers='".$exp_computers."', e_engineering='".$exp_engineering."', e_film='".$exp_film."', e_government='".$exp_government."', e_graphics='".$exp_graphics."', e_history='".$exp_history."', e_cultures='".$exp_cultures."', e_math='".$exp_math."', e_medicine='".$exp_medicine."', e_military='".$exp_military."', e_psychology='".$exp_psychology."', e_religion='".$exp_religion."', e_science='".$exp_science."', e_teaching='".$exp_teaching."', e_travel='".$exp_travel."', e_web='".$exp_web."', e_other='".$exp_other."', d_business='".$det_business."', d_cars='".$det_cars."', d_computers='".$det_computers."', d_engineering='".$det_engineering."', d_film='".$det_film."', d_government='".$det_government."', d_graphics='".$det_graphics."', d_history='".$det_history."', d_cultures='".$det_cultures."', d_math='".$det_math."', d_medicine='".$det_medicine."', d_military='".$det_military."', d_psychology='".$det_psychology."', d_religion='".$det_religion."', d_science='".$det_science."', d_teaching='".$det_teaching."', d_travel='".$det_travel."', d_web='".$det_web."', d_other='".$det_other."', message='".$Message."' WHERE id='".$profile_id."';";


if (mysql_query($insert, $dbh)) {
	print('<p class=bigtext><b>Thank you! Your updated profile should be viewable on the alumni page immediately.</b></p>');
}
else {
	print('<p class=bigtext><b>An error occurred while trying to update your profile.</b></p>');
}
mysql_close($dbh);

if ($Comments != '') {
	mail("communications@rssla.org", "[RSS] Alumni Profile Submit", stripslashes($body), "From: website@rssla.org");
	mail("arl@rssla.org", "[RSS] Alumni Profile Submit", stripslashes($body), "From: website@rssla.org");
}

if (mail("$email", "[RSS] Profile Confirmation", stripslashes($confirm_body2), "From: website@rssla.org")) {
	print("<p class='text'>A confirmation email has been sent to you.</p>");
}
}

if ($proceed == 0) {
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
    <td width=150 align="right">Student ID (hidden)</td>
    <td><input type=text name="student_id" size=35 value="'.$student_id.'"></td>
  </tr>
  <tr>
    <td width=170 align="right">Birthday</td>
    <td>		<select name="bday_month">'));

$month_list = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');

if ($bday_month != '') {
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
if ($bday_date != '') {
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
    <td width=150 align="right">Talk to me about</td>
    <td><input type=text name="talk_about" size=35 value="'.$talk_about.'"></td>
  </tr>
<tr>
		<td colspan="2" align=center><br><hr><span class=bigtext><b>Areas of Experience</b><br></span><span class="text"><i>Check as many as you feel apply to you. Providing details is optional.</span></td>
	</tr>'));

$exp_counter = 0;
while ($exp_counter < 19) {
	print(stripslashes('<tr><td width=170 align="right">'.$experience_list[($exp_counter)].'&nbsp;<input type="checkbox" name="'.$experience_vars_names[($exp_counter)].' value="1"'));
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
?>

</body>

</html>