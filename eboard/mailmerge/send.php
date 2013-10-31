<?php
    echo "<pre>";
    $name = $_POST['name'];
    $from = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $csv = $_FILES['csv']['tmp_name'];

    $csv = fopen($csv, 'r');

    $values = array();
    $headers = array();
    $vars = array();
    $msg_pieces = explode('{', $message);

    foreach ($msg_pieces as $var)
    {
        if (strpos($var, '}') !== false)
        {
            $further_pieces = explode('}', $var);
            if (strpos($further_pieces[0], "Gender") !== false &&
                $further_pieces[0] != "Gender")
            {
                $further_pieces[0] = substr($further_pieces[0], 0, strpos($further_pieces[0], "Gender"));
                $further_pieces[0] .= "Gender";
            }
            array_push($vars, $further_pieces[0]);
        }
    }

    $data = fgetcsv($csv, 1000);

    $cols = 0;
    $rows = 0;

    for ($ii = 0; $ii < sizeof($data); $ii++)
    {
        array_push($headers, $data[$ii]);
        $values[$data[$ii]] = array();
        $cols++;
    }

    if (!in_array("Email", $headers))
    {
        die("ERROR: CSV must contain a column with the header \"Email\".\r\n");
    }

    $msg_ok = true;
    for ($ii = 0; $ii < sizeof($vars); $ii++)
    {
        if (!in_array($vars[$ii], $headers))
        {
            echo "ERROR: Message body contains variable \"".$vars[$ii]."\" which does not appear in CSV.\r\n";
            $msg_ok = false;
        }
    }
    if (!$msg_ok) { die(); }

    while ($data = fgetcsv($csv, 1000))
    {
        for ($ii = 0; $ii < $cols; $ii++)
        {
            array_push($values[$headers[$ii]], $data[$ii]);
        }
        $rows++;
    }

    // For each email (row)
    for ($ii = 0; $ii < $rows; $ii++)
    {
        $temp_msg = $message;

        // Find and apply gender-specific pronouns
        for ($jj = 0; $jj < $cols; $jj++)
        {
            if ((strpos($headers[$jj], 'Gender') !== false) &&
                $headers[$jj] != 'Gender')
            {
                if ($values[$headers[$jj]][$ii] == 'M')
                {
                    $cap_he_she = 'He';
                    $low_he_she = 'he';
                    $cap_him_her = 'Him';
                    $low_him_her = 'him';
                    $cap_his_her = 'His';
                    $low_his_her = 'his';
                }
                if ($values[$headers[$jj]][$ii] == 'F')
                {
                    $cap_he_she = 'She';
                    $low_he_she = 'she';
                    $cap_him_her = 'Her';
                    $low_him_her = 'her';
                    $cap_his_her = 'Her';
                    $low_his_her = 'her';
                }
                $temp_msg = preg_replace('/{' . $headers[$jj] . ' He\/She}/', $cap_he_she, $temp_msg);
                $temp_msg = preg_replace('/{' . $headers[$jj] . ' She\/He}/', $cap_he_she, $temp_msg);
                $temp_msg = preg_replace('/{' . $headers[$jj] . ' he\/she}/', $low_he_she, $temp_msg);
                $temp_msg = preg_replace('/{' . $headers[$jj] . ' she\/he}/', $low_he_she, $temp_msg);
                $temp_msg = preg_replace('/{' . $headers[$jj] . ' Him\/Her}/', $cap_him_her, $temp_msg);
                $temp_msg = preg_replace('/{' . $headers[$jj] . ' Her\/Him}/', $cap_him_her, $temp_msg);
                $temp_msg = preg_replace('/{' . $headers[$jj] . ' him\/her}/', $low_him_her, $temp_msg);
                $temp_msg = preg_replace('/{' . $headers[$jj] . ' her\/him}/', $low_him_her, $temp_msg);
                $temp_msg = preg_replace('/{' . $headers[$jj] . ' His\/Her}/', $cap_his_her, $temp_msg);
                $temp_msg = preg_replace('/{' . $headers[$jj] . ' Her\/His}/', $cap_his_her, $temp_msg);
                $temp_msg = preg_replace('/{' . $headers[$jj] . ' his\/her}/', $low_his_her, $temp_msg);
                $temp_msg = preg_replace('/{' . $headers[$jj] . ' her\/his}/', $low_his_her, $temp_msg);
            }
        }
        
        // For each variable (column)
        for ($jj = 0; $jj < $cols; $jj++)
        {
            if ((strpos($headers[$jj], 'Gender') !== false) &&
                $headers[$jj] != 'Gender')
            {
                continue;
            }

            // Find and apply gender-specific pronouns for email recipient
            // else if ($headers[$jj] == 'Gender')
            // {
            //     if ($values['Gender'][$ii] == 'M')
            //     {
            //         $cap_he_she = 'He';
            //         $low_he_she = 'he';
            //         $cap_him_her = 'Him';
            //         $low_him_her = 'him';
            //         $cap_his_her = 'His';
            //         $low_his_her = 'his';
            //     }
            //     if ($values['Gender'][$ii] == 'F')
            //     {
            //         $cap_he_she = 'She';
            //         $low_he_she = 'she';
            //         $cap_him_her = 'Her';
            //         $low_him_her = 'her';
            //         $cap_his_her = 'Her';
            //         $low_his_her = 'her';
            //     }

            //     $temp_msg = preg_replace('/He\/She/', $cap_he_she, $temp_msg);
            //     $temp_msg = preg_replace('/he\/she/', $low_he_she, $temp_msg);
            //     $temp_msg = preg_replace('/Him\/Her/', $cap_him_her, $temp_msg);
            //     $temp_msg = preg_replace('/him\/her/', $low_him_her, $temp_msg);
            //     $temp_msg = preg_replace('/His\/Her/', $cap_his_her, $temp_msg);
            //     $temp_msg = preg_replace('/his\/her/', $low_his_her, $temp_msg);
            // }

            //$tmp_before = $temp_msg;
            $temp_msg = preg_replace('/{' . $headers[$jj] . '}/', $values[$headers[$jj]][$ii], $temp_msg);
            // if ($tmp_before == $temp_msg)
            // {
            //     die("No matching variable was found in the message body for the header \"" . $headers[$jj] . "\"");
            // }
        }

        $mail_headers = 'From: '.$name.' <'.$from.'>' . "\r\n";
        $mail_headers .= "Content-Type: text/plain; charset=\"iso-8859-1\"" . "\r\n";

        if (mail($values['Email'][$ii], $subject, $temp_msg, $mail_headers, "-f".$from))
            echo "Mail sent successfully to " . $values['Email'][$ii] . "\r\n";
        else
            echo "Mail delivery FAILED to " . $values['Email'][$ii] . "\r\n";
    }

    echo "</pre>";

?>