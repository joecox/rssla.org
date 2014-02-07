<?php
/*
Submitted events will go into bulletin_events table, 
and their id will be added to the current bulletin
the blob events will contain a comma-delimited list of values which
correspon to ids of bulletin_events. Quarter, year, and week will be
generated and added as well.
*/

include ($_SERVER['DOCUMENT_ROOT'].'/_modules/db_module.php');
db_connect();

/*
Information from submit.php:
Title
Date
Time
endDate
Description
Location
?committee

Database format:
id
title
description
date
enddate
time
place
committee
*/


//// Functions and Classes ////


// keeps all known data about post together
class Event {
    var $title;
    var $description;
    var $date;
    var $enddate;
    var $time;
    var $place;
    var $committee;

    // initialize a value when it's given
    function set($str, $v) {
        switch ($str) {
            case "Title":
                $this->title = $v;
                break;
            case "Date":
                $this->date = $v;
                break;
            case "Description":
                $this->description = $v;
                break;
            case "Time":
                $this->time = $v;
                break;
            case "endDate":
                $this->enddate = $v;
                break;
            case "Location":
                $this->place = $v;
                break;
            case "Committee":
                $this->committee = $v;
                break;
            default:
                break;
        }
    }

    // prepare for use in SQL query
    // if a field is empty, set it to NULL
    // if it should be a string, set it to be enclosed with " " 
    function prepareFields() {
        $this->title = ($this->title == "") ? "NULL" : "\"" . $this->title . "\""; 
        $this->description = ($this->description == "") ? "NULL" : "\"" . $this->description . "\""; 
        $this->date = ($this->date == "") ? "NULL" : "\"" . $this->date . "\""; 
        $this->enddate = ($this->enddate == "") ? "NULL" : "\"" . $this->enddate . "\""; 
        $this->time = ($this->time == "") ? "NULL" : "\"" . $this->time . "\""; 
        $this->place = ($this->place == "") ? "NULL" : "\"" . $this->place . "\""; 
        $this->committee = ($this->committee == "") ? "NULL" : "\"" . $this->committee . "\""; 
    }

    // only need to initialize as empty string
    function Event() {
        $this->title = "";
        $this->description = "";
        $this->date = "";
        $this->enddate = "";
        $this->time = "";
        $this->place = "";
        $this->committee = "";
    }

    //debug print all we know
    function printAll() {
        echo $this->title . $this->description . $this->date . $this->enddate .
        $this->time . $this->place . $this->committee; 
    }
}

// returns id of last inserted
function getLast() {
    global $dbh;
    return $dbh->lastInsertId();
}

// verigies a key is one we recognize
function validKey($k) {
    return ($k == "Title" || $k == "Date" || $k == "Time" || $k == "endDate" 
            || $k == "Description" || $k == "Location" || $k == "Committee");
}
// sorts bulletins table to find latest bulletin
// returns by reference
function findCurrentWeek(&$y, &$q, &$w ) {
    $query = "SELECT * FROM bulletins 
    ORDER BY year DESC, quarter DESC, week DESC
    LIMIT 3";
    $res = db_select($query);
    $y = $res[0]["year"];
    $q = $res[0]["quarter"];
    $w = $res[0]["week"];
    return true;
}

// increment quarter value to next quarter
// also increment year if the quarter rolls over
function incQuarter(&$q, &$y) {
    switch ($q) {
    	case "3Fall":
    	    $q= "1Winter";
    	    break;
    	case "1Winter":
    	    $q= "2Spring";
    	    break;
    	case "2Spring":
    	    $q= "3Fall";
    	    $y++;
    	    break;
    	default: // just in case
    	    echo "<strong>Invalid bulletin date!</strong>";
    	    $q = Fall;
    	    $y = 2014;
    	    break;
    }
}


//// Main routine ////


 /* setup Event instance to hold data */
$e = new Event(); // current event being added
// each bit of info we get from the form
foreach ($_POST as $k => $v) {
    $e->set($k, $v); 
}


/* add event to bulletin_events */
$e->prepareFields();
$query = "INSERT INTO bulletin_events (title, description, date, enddate, time, place, committee)
VALUES ($e->title, $e->description, $e->date, $e->enddate, $e->time, $e->place, $e->committee)";
db_insert_update_delete($query);
$id = getLast(); // gets id of last inserted item (the bulletin_event just added)


/* find current bulletin */
$query = "SELECT id FROM bulletins WHERE sent!=1";
$found = db_select($query);
if ($found[0]["id"] == NULL) { // no current bulletin exists yet
    $y = ""; $q = ""; $w = "";
    if ( ! findCurrentWeek($y, $q, $w)) {
        echo "<strong>Failed!</strong>";
        exit();
    }
    if ($w >= 10) { // next quarter
    	$w = 0;
        incQuarter($q, $y);
    } else {
    	$w++;
    }
    // make new bulletin entry for this date, set as unsent
    $query = "INSERT INTO bulletins (events, quarter, year, week, sent)
            VALUES (NULL, '$q', '$y', $w, 0)";
    db_insert_update_delete($query);
}


/* find unsent bulletin */
$query = "SELECT id FROM bulletins WHERE sent!=1";
$found = db_select($query);
$thisbulletin = $found[0]["id"];
if ($thisbulletin == NULL) {
    echo "<strong>Cannot find an unsent bulletin!</strong>";
    exit();
}


/* add index of new event to bulletins (current) */
$id = (int) $id;
// updates the events part of the current bulletin by appending , and the id of the added event
// unless events is null, then don't bother with the comma
$query = "UPDATE bulletins 
SET events=IFNULL(CONCAT(events, ',$id'), '$id')
WHERE id=$thisbulletin";
db_insert_update_delete($query);


/* display thank you message */

echo "
<!DOCTYPE html>
<html>
<head> ";
include($_SERVER['DOCUMENT_ROOT']."/_layout/head.php"); 
echo " </head> <body> <div id=\"wrapper\"> ";
include($_SERVER['DOCUMENT_ROOT']."/_layout/header.php");
echo "<div class=\"main clearfix\">";
echo "<center><strong>Event " . $e->title . " successfully added.</strong></center>";
echo "<br>";
echo "<center><a href=\"submit.php\">Submit another post...</a></center>";
echo " </div> ";
include($_SERVER['DOCUMENT_ROOT']."/_layout/footer.php"); 
echo " </div> ";

echo "</body></html>";

?>
