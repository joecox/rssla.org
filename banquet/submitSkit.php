<?php
   $name = $_POST['name'];
   $skit = $_POST['skit'];

   $subj = "RSS Banquet Skit Submission";
   $msg = $name . " has submitted the following skit idea:\r\n\r\n"
                . $skit;
   $to = "christinawchung@yahoo.com";
   $addl = "From: website@rssla.org";

   if (mail($to, $subj, $msg, $addl))
      echo "Skit submitted successfully.";
   else
      echo "There was an error.";
?>