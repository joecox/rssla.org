<?php

	include $_SERVER['DOCUMENT_ROOT']."/_layout/globals.php";
	// Connect to database

	$dbh = mysql_connect("localhost", $DB_USER, $DB_PW) or die("Unable to connect to database.  ERROR: " . mysql_error());


            mysql_select_db ($DB_NAME);
       
            $request = "SELECT * FROM classpoints";
            $query = mysql_query($request, $dbh);
            while ($results = mysql_fetch_assoc($query)) {
               $firstyears = $results['firstyears'];
               $secondyears = $results['secondyears'];
               $thirdyears = $results['thirdyears'];
               $fourthyears = $results['fourthyears'];
            }
            $firstyears 	+= $_POST['firstyears'];
            $secondyears 	+= $_POST['secondyears'];
            $thirdyears 	+= $_POST['thirdyears'];
            $fourthyears 	+= $_POST['fourthyears'];

	mysql_query("UPDATE classpoints SET firstyears=" . $firstyears . ";", $dbh);
	mysql_query("UPDATE classpoints SET secondyears=" . $secondyears . ";", $dbh);
	mysql_query("UPDATE classpoints SET thirdyears=" . $thirdyears . ";", $dbh);
	mysql_query("UPDATE classpoints SET fourthyears=" . $fourthyears . ";", $dbh);

	header("Location: index.php#headline");

?>