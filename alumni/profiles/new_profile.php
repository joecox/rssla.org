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
            <div class="topnav v-align">
               <span class="topnavitem"><a href="/alumni/">Home</a></span>
               <!--
               <span class="topnavitem"><a href="database.php">Database</a></span>
               <span class="topnavitem"><a href="mailing.php">Mailing List</a></span>
               <span class="topnavitem"><a href="profiles/">Profiles</a></span>
               -->
               <span class="topnavitem selected"><a href="profiles/new_profile.php">Create a profile</a></span>
            </div>
         </div>
         <div class="fullpage-contwrap">

<p style="text-align:center"><b>Only the name, e-mail, and Student ID (for editing your profile later) are required.</b> This form is for new alumni member profiles.</p>

<form method="POST" action="new_profile2.php" enctype="multipart/form-data">

<table align=center border=0 cellpadding=5 width=100% class="content">

	<tr>
		<td colspan="2" align=center><hr><span class=bigtext><b>Personal Information</b></span></td>
	</tr>
  <tr>
    <td width=170 align="right">First Name</td>
    <td><input type=text name="first_name" size=35></td>
  </tr>
  <tr>
    <td width=170 align="right">Last Name</td>
    <td><input type=text name="last_name" size=35></td>
  </tr>
  <tr>
    <td width=170 align="right">E-mail</td>
    <td><input type=text name="email" size=35></td>
  </tr>
  <tr>
    <td width=170 align="right">Gender</td>
    <td><input type=radio name="gender" value="female">Female&nbsp;&nbsp;&nbsp;&nbsp;<input type=radio name="gender" value="male">Male</td>
  </tr>
  <tr>
    <td width=170 align="right">Student ID (hidden)</td>
    <td><input type=text name="student_id" size=35></td>
  </tr>
  <tr>
    <td width=170 align="right">Birthday</td>
    <td>		<select name="bday_month">
				<option value="">Month
				<option value="1">January
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
			</select><select name="bday_date">
				<option value="">Date
				<option value="01">1
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
    <td width=170 align="right">Hometown</td>
    <td><input type=text name="Home" size=35></td>
  </tr>
  <tr>
    <td width=170 align="right">AIM screenname</td>
    <td><input type=text name="AIM" size=35></td>
  </tr>
  <tr>
    <td width=170 align="right">Homepage</td>
    <td>http://<input type=text name="WWW" size=28></td>
  </tr>
  <tr>
    <td width=170 align="right">Homepage Name</td>
    <td><input type=text name="WWWname" size=35></td>
  </tr>
	<tr>
		<td colspan="2" align=center><br><hr><span class=bigtext><b>Academic Information</b></span></td>
	</tr>
  <tr>
    <td width=170 align="right">Graduated UCLA</td>
    <td><select name="Graduated">
	
				<option value="">Year
<?php
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
?>
				<option value="Before 2000">Before 2000
			</select></td>
  </tr>
  <tr>
    <td width=170 align="right">Major</td>
    <td><input type=text name="Major" size=35></td>
  </tr>
  <tr>
    <td width=170 align="right">Minor</td>
    <td><input type=text name="Minor" size=35></td>
  </tr>
  <tr>
    <td width=170 align="right">Graduate School<br><i>(if applicable)</i></td>
    <td><input type=text name="Plans" size=35></td>
  </tr>
	<tr>
		<td colspan="2" align=center><br><hr><span class=bigtext><b>Favorites<br></span><span class="text"></b><i>Please do not use any quotation marks.</i></span></td>
	</tr>
  <tr>
    <td width=170 align="right">Class at UCLA</td>
    <td><input type=text name="class" size=35></td>
  </tr>
  <tr>
    <td width=170 align="right">Place to go</td>
    <td><input type=text name="place" size=35></td>
  </tr>
  <tr>
    <td width=170 align="right">Movie</td>
    <td><input type=text name="Movie" size=35></td>
  </tr>
  <tr>
    <td width=170 align="right">TV show</td>
    <td><input type=text name="TV" size=35></td>
  </tr>
  <tr>
    <td width=170 align="right">Book</td>
    <td><input type=text name="Book" size=35></td>
  </tr>
  <tr>
    <td width=170 align="right">Song</td>
    <td><input type=text name="Music" size=35></td>
  </tr>
  <tr>
    <td width=170 align="right">Day of the year</td>
    <td><input type=text name="Day" size=35></td>
  </tr>
  <tr>
    <td width=170 align="right">Ways to spend free time</td>
    <td><input type=text name="Free" size=35></td>
  </tr>
  <tr>
    <td width=170 align="right">Web site</td>
    <td>http://<input type=text name="website" size=28></td>
  </tr>
  <tr>
    <td width=170 align="right">Quote<br><i>(do not type quotation marks)</i></td><td>
    <input type=text name="quote" size=35></td>
  </tr>
  <tr>
    <td width=170 align="right">Hobbies</td>
    <td><input type=text name="Hobbies" size=35></td>
  </tr>
  <tr>
    <td width=170 align="right">Sports</td>
    <td><input type=text name="Sports" size=35></td>
  </tr>
	<tr>
		<td colspan="2" align=center><br><hr><span class=bigtext><b>Society Involvement</b></span></td>
	</tr>
  <tr>
    <td width=170 align="right">Positions Held</td>
    <td><input type=text name="rss_position" size=35></td>
  </tr>
  <tr>
    <td width=170 align="right">Favorite Activity</td>
    <td><input type=text name="rss_activity" size=35></td>
  </tr>
  <tr>
    <td width=170 align="right">Favorite Memory</td>
    <td><input type=text name="rss_memory" size=35></td>
  </tr>
	<tr>
		<td colspan="2" align=center><br><hr><span class=bigtext><b>Career Information</b></span></td>
	</tr>
  <tr>
    <td width=170 align="right">Professional Organizations</td>
    <td><input type=text name="organizations" size=35></td>
  </tr>
  <tr>
    <td width=170 align="right">Occupation</td>
    <td><input type=text name="job" size=35></td>
  </tr>
  <tr>
    <td width=170 align="right">Former Employers</td>
    <td><input type=text name="former_employers" size=35></td>
  </tr>
<tr>
		<td colspan="2" align=center><br><hr><span class=bigtext><b>Areas of Experience</b><br></span><span class="text"><i>Check as many as you feel apply to you. Providing details is optional.</span></td>
	</tr>
   <tr>
    <td width=200 align="right">Business/Economics&nbsp;<input type="checkbox" name="exp_business" value="1"></td>
    <td><input type=text name="det_business" size=35 placeholder="Give details here"></td>
  </tr>
 <tr>
    <td width=200 align="right">Cars/Transportation&nbsp;<input type="checkbox" name="exp_cars" value="1"></td>
    <td><input type=text name="det_cars" size=35 placeholder="Give details here"></td>
  </tr>
  <tr>
    <td width=200 align="right">Computers/Technology&nbsp;<input type="checkbox" name="exp_computers" value="1"></td>
    <td><input type=text name="det_computers" size=35 placeholder="Give details here"></td>
  </tr>
  <tr>
    <td width=200 align="right">Engineering&nbsp;<input type="checkbox" name="exp_engineering" value="1"></td>
    <td><input type=text name="det_engineering" size=35 placeholder="Give details here"></td>
  </tr>
  <tr>
    <td width=200 align="right">Film/Theater&nbsp;<input type="checkbox" name="exp_film" value="1"></td>
    <td><input type=text name="det_film" size=35 placeholder="Give details here"></td>
  </tr>
  <tr>
    <td width=200 align="right">Government/Politics&nbsp;<input type="checkbox" name="exp_government" value="1"></td>
    <td><input type=text name="det_government" size=35 placeholder="Give details here"></td>
  </tr>
  <tr>
    <td width=200 align="right">Graphics/Design&nbsp;<input type="checkbox" name="exp_graphics" value="1"></td>
    <td><input type=text name="det_graphics" size=35 placeholder="Give details here"></td>
  </tr>
  <tr>
    <td width=200 align="right">History&nbsp;<input type="checkbox" name="exp_history" value="1"></td>
    <td><input type=text name="det_history" size=35 placeholder="Give details here"></td>
  </tr>
  <tr>
    <td width=200 align="right">Languages/Cultures&nbsp;<input type="checkbox" name="exp_cultures" value="1"></td>
    <td><input type=text name="det_cultures" size=35 placeholder="Give details here"></td>
  </tr>
  <tr>
    <td width=200 align="right">Mathematics&nbsp;<input type="checkbox" name="exp_math" value="1"></td>
    <td><input type=text name="det_math" size=35 placeholder="Give details here"></td>
  </tr>
  <tr>
    <td width=200 align="right">Medicine&nbsp;<input type="checkbox" name="exp_medicine" value="1"></td>
    <td><input type=text name="det_medicine" size=35 placeholder="Give details here"></td>
  </tr>
  <tr>
    <td width=200 align="right">Military&nbsp;<input type="checkbox" name="exp_military" value="1"></td>
    <td><input type=text name="det_military" size=35 placeholder="Give details here"></td>
  </tr>
  <tr>
    <td width=200 align="right">Psychology&nbsp;<input type="checkbox" name="exp_psychology" value="1"></td>
    <td><input type=text name="det_psychology" size=35 placeholder="Give details here"></td>
  </tr>
  <tr>
    <td width=200 align="right">Religion&nbsp;<input type="checkbox" name="exp_religion" value="1"></td>
    <td><input type=text name="det_religion" size=35 placeholder="Give details here"></td>
  </tr>
  <tr>
    <td width=200 align="right">Science&nbsp;<input type="checkbox" name="exp_science" value="1"></td>
    <td><input type=text name="det_science" size=35 placeholder="Give details here"></td>
  </tr>
  <tr>
    <td width=200 align="right">Teaching/Education&nbsp;<input type="checkbox" name="exp_teaching" value="1"></td>
    <td><input type=text name="det_teaching" size=35 placeholder="Give details here"></td>
  </tr>
  <tr>
    <td width=200 align="right">Travel&nbsp;<input type="checkbox" name="exp_travel" value="1"></td>
    <td><input type=text name="det_travel" size=35 placeholder="Give details here"></td>
  </tr>
  <tr>
    <td width=200 align="right">Web Development&nbsp;<input type="checkbox" name="exp_web" value="1"></td>
    <td><input type=text name="det_web" size=35 placeholder="Give details here"></td>
  </tr>
  <tr>
    <td width=200 align="right">Other&nbsp;<input type="checkbox" name="exp_other" value="1"></td>
    <td><input type=text name="det_other" size=35 placeholder="Give details here"></td>
  </tr>
	<tr>
		<td colspan="2" align=center><span class=bigtext><br><hr><b>Personal Message<br></span><span class="text"></b><i>Note: to indicate a &#147;return,&#148; please type </i>&lt;br&gt;</i></span></td>
	</tr>
  <tr>
    <td colspan=2 align=center><textarea cols=40 rows=4 wrap=virtual name="Message"></textarea></td>
  </tr>
	<tr>
		<td colspan="2" align=center><br><hr><span class=bigtext><b>Upload Profile Picture<br></span><span class="text"></b><i>...because profiles look better with them. Must be less than 200 KB</td>
	</tr>
<tr>
		<td colspan="2" align=center>
		<input type=hidden value="200000" name="max_file_size">
		<input name="uploaded_file" type="file">

</td></tr>
<tr>
    <td align=center colspan=2><br><hr>
	<i>Click "Submit" only once. The page may take a while to load if you're uploading a photo.<br><br>

      <input type=submit value="Submit New Profile">
    </td>
  </tr>
</table>

</form>
<br><br>
</div>
      </div>
      <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/footer.php"); ?>
   </div>
</body>
</html>