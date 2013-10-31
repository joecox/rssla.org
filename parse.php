<?php
    echo "<pre>";
    $csv = 'incoming13-14.csv';
    $output = 'incomingscholars.txt';

    $csv = fopen($csv, 'r');
    $output = fopen($output, 'w');

    while ($data = fgetcsv($csv, 1000))
    {
        $line = trim($data[0], " ")." ".trim($data[1], " ")." <".trim($data[2], " ").">\r\n";
        fwrite($output, $line);
        echo $line;
    }

    echo "</pre>";

?>