<!DOCTYPE html> 
<html>
	<head>
		<?php include($_SERVER['DOCUMENT_ROOT'].'/_layout/head_standard.txt'); ?>
	</head>
	<body>
		<header id="masthead">
			<a href="/" id="rss_seal"></a>
			<hgroup>
				<h1>Alumni News and Features</h1>
				<h2>Information on alumni events and resorces</h2>			
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
					<p class="rightlink"><a href="/alumni/profiles/index.php">View full profiles list</a></p>
				</div>
				<div class="cent cont">
					<p>The subhead (line of text below the name when you open a profile) indicates what set of profiles you're viewing, whether it's the class of 2005, just the people with experience in engineering, or all alumni profiles. You can then use the links in the upper-right corner of the profile to cycle through other profiles in that same set.</p>
					<p>Since this page includes alumni profiles sorted by graduating class, <b>opening one here will let you cycle through the profiles of everyone who graduated in a particular year.</b></p>
					<hr>
					<p class="rightlink"><a href="javascript:opensl('/alumni/profiles/new_profile.php')">Submit new profile</a> | <a href="javascript:opensl('/alumni/profiles/update_profile.php')">Update existing profile</a></p>
				</div>
					
					
				
				
					
<?php
$dbh=mysql_connect ("localhost", "rssla_scholar", "hilltop23") or die ('I cannot connect to the database because: ' . mysql_error());
mysql_select_db ("rssla_rss");

// Get the information for each profile in our arrays.
$title = '';
$first_linebreak = '<br>';
$bin_counter = 1;
$request1 = "SELECT graduated, id, photo_url, first_name, last_name FROM alumni GROUP BY last_name, first_name ORDER BY graduated, last_name, first_name, id ASC";
$query1 = mysql_query($request1, $dbh);
while ($results1 = mysql_fetch_array($query1)) {
	$bin_photourl[] = $results1['photo_url'];
	$bin_lastname[] = $results1['last_name'];
	$bin_firstname[] = $results1['first_name'];
	$bin_id[] = $results1['id'];
	if ($results1['graduated'] != $year_holder) {
		$bin_counter = 1;
	}
	$bin_row[] = $bin_counter;
	if ($results1['graduated'] == 'Before 2000') {
		$bin_year2[] = 'before_2000';
		$bin_year[] = 'Graduated before 2000';
	}
	elseif ($results1['graduated'] == '') {
		$bin_year2[] = 'unknown_year';
		$bin_year[] = 'Year unknown';
	}
	else {
		$bin_year2[] = $results1['graduated'];
		$bin_year[] = 'Graduated '.$results1['graduated'];
	}
	$year_holder = $results1['graduated'];
	$bin_counter = $bin_counter + 1;
}
mysql_close($dbh);


//Filter these arrays so the only columns remaining are profiles that had the desired characteristic (i.e. a photo)
$bin_photourl2 = array_filter($bin_photourl);
$random_keys = array_rand($bin_photourl2, 1);
$photo_url = $bin_photourl[$random_keys];
$photo_year = $bin_year[$random_keys];
$photo_year2 = $bin_year2[$random_keys];
$photo_row = $bin_row[$random_keys];
$photo_id = $bin_id[$random_keys];

	$imageinfo2 = getimagesize('photos/'.$photo_url);

	$ix2=$imageinfo2[0];
	$iy2=$imageinfo2[1];
	
	$heightscale2 = $iy2/90;  //<TD> HEIGHT
	$widthscale2 = $ix2/110; //<TD> WIDTH
	
	$photo_dim = '';
	if($widthscale2 > 1) {
		if ($heightscale2 > $widthscale2) {
			$photo_dim = ' height=90';
		}
		else {
			$photo_dim = ' width=110';	
		}
	}
	else {
		if ($heightscale2 > 1) {
			$photo_dim = ' height=90';
		}
	}


//print(stripslashes('<table cellpadding=0 cellspacing=0 border=0><tr><td><center><a href="view_profile2.php?member_id='.$photo_id.'&profile_row='.$photo_row.'&limiter='.$photo_year2.'"><img src="http://www.rssla.org/alumni/profiles/photos/'.$photo_url.'"'.$photo_dim.' alt="This is a Random Image" style="border: solid 2px;"></a></center></td></tr><tr><td style="padding-top: 5px;"><center><b><span class="text">'.$photo_year.'</span></b></center></td></tr></table>'));



$year_counts = array_count_values($bin_year2);
extract($year_counts, EXTR_PREFIX_ALL, "p");

//must be updated by hand each year to include new year of graduates


if (isset($p_2012)) {
	$first_point = ceil($p_2012/3);
	$second_point = ceil($p_2012/3*2);
	$profile_row=1;
	print('<div class="cont cent">
			<header>
				<h1>Class of 2012</h1>
			</header>
			<div class="threecolumntableleft">');
	$keys_to_use = array_keys($bin_year2, "2012");
	foreach ($keys_to_use as $current_key) {
		$last_name = $bin_lastname[$current_key];
		$first_name = $bin_firstname[$current_key];
		$id = $bin_id[$current_key];
		$profile_row = $bin_row[$current_key];
		$profile_limiter = $bin_year2[$current_key];
		print(stripslashes('<a href="view_profile2.php?member_id='.$id.'&profile_row='.$profile_row.'&limiter='.$profile_limiter.'">'.$last_name.', '.$first_name.'</a><br>'));
		if ($profile_row == $first_point) {
			print('</div><div class="threecolumntablecenter">');
		}
		if ($profile_row == $second_point) {
			print('</div><div class="threecolumntableright">');
		}
	}
	print('</div></div>');
}
if (isset($p_2011)) {
	$first_point = ceil($p_2011/3);
	$second_point = ceil($p_2011/3*2);
	$profile_row=1;
	print('<div class="cont cent">
			<header>
				<h1>Class of 2011</h1>
			</header>
			<div class="threecolumntableleft">');
	$keys_to_use = array_keys($bin_year2, "2011");
	foreach ($keys_to_use as $current_key) {
		$last_name = $bin_lastname[$current_key];
		$first_name = $bin_firstname[$current_key];
		$id = $bin_id[$current_key];
		$profile_row = $bin_row[$current_key];
		$profile_limiter = $bin_year2[$current_key];
		print(stripslashes('<a href="view_profile2.php?member_id='.$id.'&profile_row='.$profile_row.'&limiter='.$profile_limiter.'">'.$last_name.', '.$first_name.'</a><br>'));
		if ($profile_row == $first_point) {
			print('</div><div class="threecolumntablecenter">');
		}
		if ($profile_row == $second_point) {
			print('</div><div class="threecolumntableright">');
		}
	}
	print('</div></div>');
}
if (isset($p_2010)) {
	$first_point = ceil($p_2010/3);
	$second_point = ceil($p_2010/3*2);
	$profile_row=1;
	print('<div class="cont cent">
			<header>
				<h1>Class of 2010</h1>
			</header>
			<div class="threecolumntableleft">');
	$keys_to_use = array_keys($bin_year2, "2010");
	foreach ($keys_to_use as $current_key) {
		$last_name = $bin_lastname[$current_key];
		$first_name = $bin_firstname[$current_key];
		$id = $bin_id[$current_key];
		$profile_row = $bin_row[$current_key];
		$profile_limiter = $bin_year2[$current_key];
		print(stripslashes('<a href="view_profile2.php?member_id='.$id.'&profile_row='.$profile_row.'&limiter='.$profile_limiter.'">'.$last_name.', '.$first_name.'</a><br>'));
		if ($profile_row == $first_point) {
			print('</div><div class="threecolumntablecenter">');
		}
		if ($profile_row == $second_point) {
			print('</div><div class="threecolumntableright">');
		}
	}
	print('</div></div>');
}
if (isset($p_2009)) {
	$first_point = ceil($p_2009/3);
	$second_point = ceil($p_2009/3*2);
	$profile_row=1;
	print('<div class="cont cent">
			<header>
				<h1>Class of 2009</h1>
			</header>
			<div class="threecolumntableleft">');
	$keys_to_use = array_keys($bin_year2, "2009");
	foreach ($keys_to_use as $current_key) {
		$last_name = $bin_lastname[$current_key];
		$first_name = $bin_firstname[$current_key];
		$id = $bin_id[$current_key];
		$profile_row = $bin_row[$current_key];
		$profile_limiter = $bin_year2[$current_key];
		print(stripslashes('<a href="view_profile2.php?member_id='.$id.'&profile_row='.$profile_row.'&limiter='.$profile_limiter.'">'.$last_name.', '.$first_name.'</a><br>'));
		if ($profile_row == $first_point) {
			print('</div><div class="threecolumntablecenter">');
		}
		if ($profile_row == $second_point) {
			print('</div><div class="threecolumntableright">');
		}
	}
	print('</div></div>');
}
if (isset($p_2008)) {
	$first_point = ceil($p_2008/3);
	$second_point = ceil($p_2008/3*2);
	$profile_row=1;
	print('<div class="cont cent">
			<header>
				<h1>Class of 2008</h1>
			</header>
			<div class="threecolumntableleft">');
	$keys_to_use = array_keys($bin_year2, "2008");
	foreach ($keys_to_use as $current_key) {
		$last_name = $bin_lastname[$current_key];
		$first_name = $bin_firstname[$current_key];
		$id = $bin_id[$current_key];
		$profile_row = $bin_row[$current_key];
		$profile_limiter = $bin_year2[$current_key];
		print(stripslashes('<a href="view_profile2.php?member_id='.$id.'&profile_row='.$profile_row.'&limiter='.$profile_limiter.'">'.$last_name.', '.$first_name.'</a><br>'));
		if ($profile_row == $first_point) {
			print('</div><div class="threecolumntablecenter">');
		}
		if ($profile_row == $second_point) {
			print('</div><div class="threecolumntableright">');
		}
	}
	print('</div></div>');
}
if (isset($p_2007)) {
	$first_point = ceil($p_2007/3);
	$second_point = ceil($p_2007/3*2);
	$profile_row=1;
	print('<div class="cont cent">
			<header>
				<h1>Class of 2007</h1>
			</header>
			<div class="threecolumntableleft">');
	$keys_to_use = array_keys($bin_year2, "2007");
	foreach ($keys_to_use as $current_key) {
		$last_name = $bin_lastname[$current_key];
		$first_name = $bin_firstname[$current_key];
		$id = $bin_id[$current_key];
		$profile_row = $bin_row[$current_key];
		$profile_limiter = $bin_year2[$current_key];
		print(stripslashes('<a href="view_profile2.php?member_id='.$id.'&profile_row='.$profile_row.'&limiter='.$profile_limiter.'">'.$last_name.', '.$first_name.'</a><br>'));
		if ($profile_row == $first_point) {
			print('</div><div class="threecolumntablecenter">');
		}
		if ($profile_row == $second_point) {
			print('</div><div class="threecolumntableright">');
		}
	}
	print('</div></div>');
}
if (isset($p_2006)) {
	$first_point = ceil($p_2006/3);
	$second_point = ceil($p_2006/3*2);
	$profile_row=1;
	print('<div class="cont cent">
			<header>
				<h1>Class of 2006</h1>
			</header>
			<div class="threecolumntableleft">');
	$keys_to_use = array_keys($bin_year2, "2006");
	foreach ($keys_to_use as $current_key) {
		$last_name = $bin_lastname[$current_key];
		$first_name = $bin_firstname[$current_key];
		$id = $bin_id[$current_key];
		$profile_row = $bin_row[$current_key];
		$profile_limiter = $bin_year2[$current_key];
		print(stripslashes('<a href="view_profile2.php?member_id='.$id.'&profile_row='.$profile_row.'&limiter='.$profile_limiter.'">'.$last_name.', '.$first_name.'</a><br>'));
		if ($profile_row == $first_point) {
			print('</div><div class="threecolumntablecenter">');
		}
		if ($profile_row == $second_point) {
			print('</div><div class="threecolumntableright">');
		}
	}
	print('</div></div>');
}
if (isset($p_2005)) {
	$first_point = ceil($p_2005/3);
	$second_point = ceil($p_2005/3*2);
	$profile_row=1;
	print('<div class="cont cent">
			<header>
				<h1>Class of 2005</h1>
			</header>
			<div class="threecolumntableleft">');
	$keys_to_use = array_keys($bin_year2, "2005");
	foreach ($keys_to_use as $current_key) {
		$last_name = $bin_lastname[$current_key];
		$first_name = $bin_firstname[$current_key];
		$id = $bin_id[$current_key];
		$profile_row = $bin_row[$current_key];
		$profile_limiter = $bin_year2[$current_key];
		print(stripslashes('<a href="view_profile2.php?member_id='.$id.'&profile_row='.$profile_row.'&limiter='.$profile_limiter.'">'.$last_name.', '.$first_name.'</a><br>'));
		if ($profile_row == $first_point) {
			print('</div><div class="threecolumntablecenter">');
		}
		if ($profile_row == $second_point) {
			print('</div><div class="threecolumntableright">');
		}
	}
	print('</div></div>');
}
if (isset($p_2004)) {
	$first_point = ceil($p_2004/3);
	$second_point = ceil($p_2004/3*2);
	$profile_row=1;
	print('<div class="cont cent">
			<header>
				<h1>Class of 2004</h1>
			</header>
			<div class="threecolumntableleft">');
	$keys_to_use = array_keys($bin_year2, "2004");
	foreach ($keys_to_use as $current_key) {
		$last_name = $bin_lastname[$current_key];
		$first_name = $bin_firstname[$current_key];
		$id = $bin_id[$current_key];
		$profile_row = $bin_row[$current_key];
		$profile_limiter = $bin_year2[$current_key];
		print(stripslashes('<a href="view_profile2.php?member_id='.$id.'&profile_row='.$profile_row.'&limiter='.$profile_limiter.'">'.$last_name.', '.$first_name.'</a><br>'));
		if ($profile_row == $first_point) {
			print('</div><div class="threecolumntablecenter">');
		}
		if ($profile_row == $second_point) {
			print('</div><div class="threecolumntableright">');
		}
	}
	print('</div></div>');
}
if (isset($p_2003)) {
	$first_point = ceil($p_2003/3);
	$second_point = ceil($p_2003/3*2);
	$profile_row=1;
	print('<div class="cont cent">
			<header>
				<h1>Class of 2003</h1>
			</header>
			<div class="threecolumntableleft">');
	$keys_to_use = array_keys($bin_year2, "2003");
	foreach ($keys_to_use as $current_key) {
		$last_name = $bin_lastname[$current_key];
		$first_name = $bin_firstname[$current_key];
		$id = $bin_id[$current_key];
		$profile_row = $bin_row[$current_key];
		$profile_limiter = $bin_year2[$current_key];
		print(stripslashes('<a href="view_profile2.php?member_id='.$id.'&profile_row='.$profile_row.'&limiter='.$profile_limiter.'">'.$last_name.', '.$first_name.'</a><br>'));
		if ($profile_row == $first_point) {
			print('</div><div class="threecolumntablecenter">');
		}
		if ($profile_row == $second_point) {
			print('</div><div class="threecolumntableright">');
		}
	}
	print('</div></div>');
}
if (isset($p_2002)) {
	$first_point = ceil($p_2002/3);
	$second_point = ceil($p_2002/3*2);
	$profile_row=1;
	print('<div class="cont cent">
			<header>
				<h1>Class of 2002</h1>
			</header>
			<div class="threecolumntableleft">');
	$keys_to_use = array_keys($bin_year2, "2002");
	foreach ($keys_to_use as $current_key) {
		$last_name = $bin_lastname[$current_key];
		$first_name = $bin_firstname[$current_key];
		$id = $bin_id[$current_key];
		$profile_row = $bin_row[$current_key];
		$profile_limiter = $bin_year2[$current_key];
		print(stripslashes('<a href="view_profile2.php?member_id='.$id.'&profile_row='.$profile_row.'&limiter='.$profile_limiter.'">'.$last_name.', '.$first_name.'</a><br>'));
		if ($profile_row == $first_point) {
			print('</div><div class="threecolumntablecenter">');
		}
		if ($profile_row == $second_point) {
			print('</div><div class="threecolumntableright">');
		}
	}
	print('</div></div>');
}
if (isset($p_2001)) {
	$first_point = ceil($p_2001/3);
	$second_point = ceil($p_2001/3*2);
	$profile_row=1;
	print('<div class="cont cent">
			<header>
				<h1>Class of 2001</h1>
			</header>
			<div class="threecolumntableleft">');
	$keys_to_use = array_keys($bin_year2, "2001");
	foreach ($keys_to_use as $current_key) {
		$last_name = $bin_lastname[$current_key];
		$first_name = $bin_firstname[$current_key];
		$id = $bin_id[$current_key];
		$profile_row = $bin_row[$current_key];
		$profile_limiter = $bin_year2[$current_key];
		print(stripslashes('<a href="view_profile2.php?member_id='.$id.'&profile_row='.$profile_row.'&limiter='.$profile_limiter.'">'.$last_name.', '.$first_name.'</a><br>'));
		if ($profile_row == $first_point) {
			print('</div><div class="threecolumntablecenter">');
		}
		if ($profile_row == $second_point) {
			print('</div><div class="threecolumntableright">');
		}
	}
	print('</div></div>');
}
if (isset($p_2000)) {
	$first_point = ceil($p_2000/3);
	$second_point = ceil($p_2000/3*2);
	$profile_row=1;
	print('<div class="cont cent">
			<header>
				<h1>Class of 2000</h1>
			</header>
			<div class="threecolumntableleft">');
	$keys_to_use = array_keys($bin_year2, "2000");
	foreach ($keys_to_use as $current_key) {
		$last_name = $bin_lastname[$current_key];
		$first_name = $bin_firstname[$current_key];
		$id = $bin_id[$current_key];
		$profile_row = $bin_row[$current_key];
		$profile_limiter = $bin_year2[$current_key];
		print(stripslashes('<a href="view_profile2.php?member_id='.$id.'&profile_row='.$profile_row.'&limiter='.$profile_limiter.'">'.$last_name.', '.$first_name.'</a><br>'));
		if ($profile_row == $first_point) {
			print('</div><div class="threecolumntablecenter">');
		}
		if ($profile_row == $second_point) {
			print('</div><div class="threecolumntableright">');
		}
	}
	print('</div></div>');
}
if (isset($p_before_2000)) {
	$first_point = ceil($p_before_2000/3);
	$second_point = ceil($p_before_2000/3*2);
	$profile_row=1;
	print('<div class="cont cent">
			<header>
				<h1>Before 2000</h1>
			</header>
			<div class="threecolumntableleft">');
	$keys_to_use = array_keys($bin_year2, "before_2000");
	foreach ($keys_to_use as $current_key) {
		$last_name = $bin_lastname[$current_key];
		$first_name = $bin_firstname[$current_key];
		$id = $bin_id[$current_key];
		$profile_row = $bin_row[$current_key];
		$profile_limiter = $bin_year2[$current_key];
		print(stripslashes('<a href="view_profile2.php?member_id='.$id.'&profile_row='.$profile_row.'&limiter='.$profile_limiter.'">'.$last_name.', '.$first_name.'</a><br>'));
		if ($profile_row == $first_point) {
			print('</div><div class="threecolumntablecenter">');
		}
		if ($profile_row == $second_point) {
			print('</div><div class="threecolumntableright">');
		}
	}
	print('</div></div>');
}
if (isset($p_unknown_year)) {
	$first_point = ceil($p_unknown_year/3);
	$second_point = ceil($p_unknown_year/3*2);
	$profile_row=1;
	print('<div class="cont cent">
			<header>
				<h1>Unknown Year</h1>
			</header>
			<div class="threecolumntableleft">');
	$keys_to_use = array_keys($bin_year2, "unknown_year");
	foreach ($keys_to_use as $current_key) {
		$last_name = $bin_lastname[$current_key];
		$first_name = $bin_firstname[$current_key];
		$id = $bin_id[$current_key];
		$profile_row = $bin_row[$current_key];
		$profile_limiter = $bin_year2[$current_key];
		print(stripslashes('<a href="view_profile2.php?member_id='.$id.'&profile_row='.$profile_row.'&limiter='.$profile_limiter.'">'.$last_name.', '.$first_name.'</a><br>'));
		if ($profile_row == $first_point) {
			print('</div><div class="threecolumntablecenter">');
		}
		if ($profile_row == $second_point) {
			print('</div><div class="threecolumntableright">');
		}
	}
	print('</div></div>');
}
?>
				</section>
			</div>
			<div class="box_gradient_2 bottom_gradient"></div>
		</div>
		<footer>
			<?php include($_SERVER['DOCUMENT_ROOT'].'/_layout/footer_standard.php'); ?>
		</footer>		
	</body>
</html>
