<html>
	<head>
		<title>
			Update Alumni Profile
		</title>
		<link href="http://www.rssla.org/_layout/styles.css" rel="stylesheet" type="text/css">
	</head>

<body background="http://www.rssla.org/_layout/body/dark_stripes.jpg">

<p class="bigtext"><b>Use this form to update your existing profile.</b> There is another form you should use if you don't have a profile already.</p>
<p><form method=POST action=update_profile2.php>

<table border=0 cellpadding=5 class="text" width=100% align=center>
	<tr width=100><td align=right>
		Select your name:
		</td><td align=left><select name="profile_id">
<?php
$dbh=mysql_connect ("localhost", "rssla_scholar", "hilltop23") or die ('I cannot connect to the database because: ' . mysql_error());
mysql_select_db ("rssla_rss");

$request = "SELECT first_name, last_name, id FROM alumni ORDER BY last_name, first_name, id ASC";
$query = mysql_query($request, $dbh);
while ($results = mysql_fetch_array($query)) {

	if ($last_name != $results['last_name'] or $first_name != $results['first_name']) {

	$last_name = $results['last_name'];
	$first_name = $results['first_name'];
	$id = $results['id'];
	print('<option value="'.$id.'">'.$last_name.', '.$first_name);

	}
}

mysql_close($dbh);


?>
			</select></td>

  </tr>
<tr><td align=right>Your Student ID:</td><td><input type=text name="entered_id" size=35></td></tr>
<tr>
    <td align=center colspan=2>

	<input type=submit name="button" value="Update my Profile"></td></tr></table>
</form>

</body>

</html>