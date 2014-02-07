<?php
//TODO:
// retrieve all recurring events from db 
// have this file show the completed html, but have a button at bottom to send for real


/* setup */
// can be comma separated for multiple
$emailTo = "evangrayk@gmail.com"; // TODO correct email list

date_default_timezone_set('UTC');

$html_file = "emailtemplate.html";
$file_handle = fopen($html_file, 'r');
$html_text = fread($file_handle, filesize($html_file)); // read template
$subject = "";

include ($_SERVER['DOCUMENT_ROOT'].'/_modules/db_module.php');
db_connect();


/* get current bulletin from db */
$query = "SELECT id, events FROM bulletins WHERE sent!=1";
$found = db_select($query);
$thisbulletin = $found[0]["id"]; 
$events = $found[0]["events"];
if ($thisbulletin == NULL) exit();


/* get relevant events in bulletin_events */
$matches = array();
preg_match_all("/\b\d+\b/", $events, $matches); //grab each number (any separator)
$general = "";
$recurring = "";
$committees = "";
// for correct numbering
$gcount = 0;
$rcount = 0;
$ccount = 0;
for ($i = 0; $i < sizeof($matches[0]); $i++) {
	// get referenced event
    $query = "SELECT * FROM bulletin_events WHERE id = " . $matches[0][$i];
    $found = db_select($query);
    if ($found[0] == NULL) {
        continue;
    }
    	
    $title = "";
    $date = "";
    $time = "";
    $enddate = "";
    $place = "";
    $desc = "";
    $p = $found[0];

    /* add each applicable part */
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
        // strip out seconds
        $time = " | <i>" . substr($p["time"], 0, 5) . "</i>";
    }
    if ($p["place"] != NULL) {
        $place = " | <i>" . $p["place"] . "</i>";
    }
    if ($p["description"] != NULL) {
        $desc = "<br>&emsp;&emsp;" . $p["description"];
    }

    if ($found[0]["committee"] == 1) {
    	// this is a committee post
    	$ccount++;
    	$committees .= "&mdash;" . $title . $date . $time . $place . $desc . "<br>";
    } else if ($found[0]["enddate"] != NULL) {
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
    "Ten", "Eleven", "Twelve", "Thirteen");
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

/* do mime email stuff */
$plain_text = "Trouble Viewing this email? That's too bad. ";
$notice_text = "This is a multipart email in MIME format.";

$from = "Regents Scholar Society <rssla@ucla.edu>";

#multipart/alternative boundary
$semi_rand = md5(time());
$mime_boundary = "==MULTIPART_BOUNDARY_$semi_rand";
$mime_boundary_header = chr(34) . $mime_boundary . chr(34);

$body = "$notice_text

--$mime_boundary
Content-Type: text/plain; charset=us-ascii
Content-Transfer-Encoding: quoted-printable

$plain_text

--$mime_boundary
Content-Type: text/html; charset=us-ascii
Content-Transfer-Encoding: quoted-printable

$html_text

--$mime_boundary--";


/* mail final product */
echo $html_text;
// uncomment to mail 
//mail($emailTo, $subject, $body,
    //"From: " . $from . "\n" .
    //"MIME-Version: 1.0\n" .
    //"Content-Type: multipart/alternative;\n" .
    //"boundary=" . $mime_boundary_header);

?>
