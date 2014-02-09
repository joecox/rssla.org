<?php

	include($_SERVER['DOCUMENT_ROOT'].'/_modules/globals.php');
	include($DB_MODULE);

	echo "<pre>";

	db_connect();
	$results = db_query('SELECT Position, Name FROM eboard');

	var_dump($results);

	echo "</pre>";

?>