<?php

	include $_SERVER['DOCUMENT_ROOT']."/_layout/globals.php";
	// Connect to database

	$dbh = mysql_connect("localhost", $DB_USER, $DB_PW) or die("Unable to connect to database.  ERROR: " . mysql_error());

	if (mysql_select_db($DB_NAME))

	mysql_query("UPDATE classpoints SET firstyears=" . $_POST['firstyears'] . ";", $dbh);
	mysql_query("UPDATE classpoints SET secondyears=" . $_POST['secondyears'] . ";", $dbh);
	mysql_query("UPDATE classpoints SET thirdyears=" . $_POST['thirdyears'] . ";", $dbh);
	mysql_query("UPDATE classpoints SET fourthyears=" . $_POST['fourthyears'] . ";", $dbh);

	header("Location: index.php#headline");

?>