<?php
//TODO:
// have this file show the completed html, but have a button at bottom to send for real
// have sending an email set current bulletin's sent flag to true


/* setup */
// can be comma separated for multiple
$emailTo = "evangrayk@gmail.com"; // TODO correct email list

date_default_timezone_set('UTC'); // for correct time handling

$html_file = "emailtemplate.html";
$file_handle = fopen($html_file, 'r');
$html_text = fread($file_handle, filesize($html_file)); // read template
$subject = ""; // so that it can be modified later

include ($_SERVER['DOCUMENT_ROOT'].'/_modules/db_module.php');
db_connect();

$general = "";
$recurring = "";
$committees = "";
// for correct numbering
$rcount = 0;
$gcount = 0;
$ccount = 0;
function addEvent($p) {
    /* add each applicable part */
    global $general; 
    global $recurring; 
    global $committees; 
    global $gcount; 
    global $ccount; 
    $title = "";
    $date = "";
    $time = "";
    $enddate = "";
    $place = "";
    $desc = "";
    $title = "<strong>". $p["title"] . "</strong>";
    if ($p["date"] != NULL) {
    	//YYYY:MM:DD
    	$str = $p["date"];  
    	$yr = substr($str, 0, 4); 
    	$mo = substr($str, 5, 2); 
    	$day = substr($str, 8, 2); 
    	// format as Dayname, Month d
    	$d = date("l, F j", mktime(0, 0, 0, $mo, $day, $yr));
        $date = " | <i>" . $d . "</i>";
    }
    if ($p["enddate"] != NULL) {
    	//YYYY:MM:DD
    	$str = $p["enddate"];  
    	$yr = substr($str, 0, 4); 
    	$mo = substr($str, 5, 2); 
    	$day = substr($str, 8, 2); 
        $dt = mktime(0, 0, 0, $mo, $day, $yr);
    	$faraway = mktime();
    	// TODO
    	// should it even say all year? maybe that's implied by recurring
        // event?
    	// end date is almost a year away
    	if (abs($faraway - $dt) > 7000000)  { //30000000 is a year
            $enddate = "<i>All year!</i>";
        //} else if ($faraway - $dt > 7000000) {
            //$enddate = "<i>All quarter!</i>";
        } else {
            // format as Dayname, Month d
            $ed = date("l, F j", $dt);
            $enddate = "<i>" . $ed . "</i>";
        }
    }
    if ($p["time"] != NULL) {
    	// convert to H:MM AM or HH:MM PM as necessary
        $adjtime = $p["time"];
        $hr = intval(substr($adjtime, 0, 2));
        $pm = false;
        if ($hr >= 12) $pm = true;
        $hr = $hr % 12;
        $adjtime = strval($hr) . substr($adjtime, 2, 3);
        $time = " | <i>" . substr($adjtime, 0, 5);
        if ($pm) $time .= " PM ";
        else $time .= " AM ";
        $time .= "</i>";
    }
    if ($p["place"] != NULL) {
        $place = " | <i>" . $p["place"] . "</i>";
    }
    if ($p["description"] != NULL) {
        $desc = "<br>&emsp;&emsp;" . $p["description"];
    }

    if ($p["committee"] == 1) {
    	// this is a committee post
    	$ccount++;
    	$committees .= "&mdash;" . $title . $date . $time . $place . $desc . "<br>";
    } else if ($p["enddate"] != NULL) {
    	// this is a recurring post
    	$finaldate = "";
        if ($enddate == "<i>All year!</i>") {
                $finaldate .= " " . $enddate; 
            } else if ($date != "") {
                $finaldate .= $date;
            if ($enddate != NULL) {
                $finaldate .= " Until " . $enddate;
            }
        }
    	$recurring .= $title . $finaldate . $time . $place . $desc . "<br>";
    } else {
    	// this is a general post
    	$gcount++;
    	$general .= $gcount . ". " . $title . $date . $time . $place . $desc . "<br>";
    }
}

/* get current bulletin from db */
$query = "SELECT id, events FROM bulletins WHERE sent!=1";
$found = db_select($query);
$thisbulletin = $found[0]["id"]; 
$events = $found[0]["events"];
if ($thisbulletin == NULL) {
    echo "Error! Can't find current bulletin!";	
	exit();
}


/* get relevant events in bulletin_events */
$matches = array();
preg_match_all("/\b\d+\b/", $events, $matches); //grab each number (any separator)
for ($i = 0; $i < sizeof($matches[0]); $i++) {
	// get referenced event
    $query = "SELECT * FROM bulletin_events WHERE id = " . $matches[0][$i];
    $found = db_select($query);
    if ($found[0] == NULL) {
        continue;
    }
    $p = $found[0];
    addEvent($p);
}


/* get relevant recurring events */
$query = "SELECT * FROM bulletin_events WHERE enddate IS NOT NULL";
$found = db_select($query);
if ($found[0] != NULL) {
    $now = mktime();
    for ($i = 0; $i < sizeof($found); $i++) {
        $str = $found[$i]["enddate"];  
        if ($str == "") continue;
        $yr = substr($str,  0, 4); 
        $mo = substr($str,  5, 2); 
        $day = substr($str, 8, 2); 
        $dt = mktime(0, 0, 0, $mo, $day, $yr);
    	// if recurring event has passed, don't include it
        if (($dt - $now) < 0) {
            continue;
        }
        addEvent($found[$i]);
    }
}

$general .= "<br>"; // add some spacing
if ($committees == "") {
    $committess = "<b>There are no committee meetings this week!</b>";
}


/* get date of current bulletin */
$query = "SELECT * FROM bulletins WHERE sent != 1";
$found = db_select($query);

$weeks = array( # for prettily printing the week #
    "Zero", "One", "Two", "Three", "Four", "Five",
    "Six", "Seven", "Eight", "Nine",
    "Ten", "Eleven", "Twelve", "Thirteen"); // how many weeks are there?
if ($found[0]["week"] != NULL) {
    $week = $weeks[$found[0]["week"]];
} else $week = "Error";

$bulldate = substr($found[0]["quarter"], 1) . " Week  " . $week . " Bulletin";
$subject = $bulldate;


/* insert generated html into the template */
$html_text = str_replace('RECURRING', $recurring, $html_text);
$html_text = str_replace('EVENTS', $general, $html_text);
$html_text = str_replace('DATE', $bulldate, $html_text);
$html_text = str_replace('MEETINGS', $committees, $html_text);


// php mail requires CRLF, and line width of <70
$body = wordwrap($html_text, 70, "\r\n");

$from = "Regents Scholar Society <rssla@ucla.edu>";

// define header to send email as html
$header = "From: " . $from . "\r\n" .
    "MIME-Version: 1.0\r\n" .
    "Content-Type: text/html; charset=iso-8859-1\r\n";


/* mail final product */
echo $html_text;
// uncomment to mail 
//mail($emailTo, $subject, $body, $header);

?>
