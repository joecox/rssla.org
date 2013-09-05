<?php

    include $_SERVER['DOCUMENT_ROOT']."/_layout/globals.php";
    $dbh = mysql_connect("localhost", $DB_USER, $DB_PW);
    mysql_select_db($DB_NAME);

    $query = "DELETE FROM merchandise WHERE id=" . $_GET['id'];
    mysql_query($query);

    $response = array('success' => true, 'message' => "Succeeded");

    echo json_encode($response);

?>