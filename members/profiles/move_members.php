<?php

   error_reporting(E_ALL);

   include($_SERVER['DOCUMENT_ROOT']."/_modules/globals.php");
   include($DB_MODULE);

   echo "<pre>";

   db_connect();

   $up_bound = (int) date('Y');
   $low_bound = $up_bound - 3;
   $results = db_select("SELECT * FROM `members-old` WHERE entered_ucla >= ".$low_bound." AND entered_ucla <= ".$up_bound." ORDER BY last_name ASC");

   for ($ii = 0; $ii < sizeof($results); $ii++)
   {
      $row = $results[$ii];
      $query = "INSERT INTO members (password,first_name,last_name,email,image_name,class_year,entered_year,is_transfer,has_graduated,graduated_year,major,minor,birthday,birthplace,hometown,nickname,future_plans,jobs,favorite_movies,favorite_tv,favorite_books,favorite_music,favorite_food,favorite_sports,favorite_quote,message,hobbies,other_organizations,rss_past_positions) ";

      $query .= "VALUES(";
      $query .= "'".$row['password']."',";            // password
      $query .= "'".$row['first_name']."',";          // first_name
      $query .= "'".$row['last_name']."',";           // last_name
      $query .= "'".$row['email']."',";               // email
      $query .= "'".$row['photo_url']."',";           // image_name
      $query .= "-1,";                                // class_year
      if ($row['entered_ucla'] == '')
         $query .= "-1,";
      else
         $query .= ((int) $row['entered_ucla']).",";  // entered_year
      $query .= $row['is_transfer'].",";              // is_transfer
      $query .= ",";                                  // has_graduated
      $query .= ",";                                  // graduated_year
      $query .= "'".$row['major']."',";               // major
      $query .= "'".$row['minor']."',";               // minor
      $query .= ",";                                  // birthday
      $query .= ",";                                  // birthplace
      $query .= "'".$row['hometown']."',";            // hometown
      $query .= ",";                                  // nickname
      $query .= "'".$row['after_graduation']."',";    // future_plans
      $query .= "'".$row['job']."',";                 // jobs
      $query .= "'".$row['movie']."',";               // favorite_movies
      $query .= "'".$row['tv_show']."',";             // favorite_tv
      $query .= "'".$row['book']."',";                // favorite_books
      $query .= "'".$row['music']."',";               // favorite_music
      $query .= "'".$row['food']."',";                // favorite_food
      $query .= "'".$row['sports']."',";              // favorite_sports
      $query .= ",";                                  // favorite_quote
      $query .= "'".$row['message']."',";             // message
      $query .= "'".$row['hobbies']."',";             // hobbies
      $query .= "'".$row['other_organizations']."',"; // other_organizations
      $query .= "'".$row['rss_previous']."')";        // rss_past_positions

      echo $query;

      db_insert_update_delete($query);
   }

   echo "</pre>";

?>