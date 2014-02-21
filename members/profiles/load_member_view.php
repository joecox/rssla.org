<?php

   function loadMemberData($id, $json_mode)
   {
      $years = array(
         '1' => "First Year",
         '2' => "Second Year",
         '3' => "Third Year",
         '4' => "Fourth Year"
      );

      $results = db_select("SELECT * FROM `members` where id=".$id);
      $row = $results[0];

      $image_src = $row["pf_photo_path"] ? $row["pf_photo_path"] : "general_profile_image.png";

      $email = $row['show_email'] ? $row['email'] : NULL;
      $contact_info = array(
         'email' => $email,
         'linkedin' => $row['linkedin_url'],
         'twitter' => $row['twitter_url'],
         'facebook' => $row['facebook_url'],
         'website' => $row['website_url']
      );

      $basic_info = array(
         'year' => $years[$row['year']],
         'transfer' => $row['is_transfer'],
         'contact' => $contact_info,
         'birthday' => $row['birthday'],
         'birthplace' => $row['birthplace'],
         'hometown' => $row['hometown']
      );

      $school_career = array(
         'majors' => $row['major'],
         'minors' => $row['minor']
      );

      $favorites = array(
      );

      $rss = array(
      );

      $data = array(
         'first_name' => $row['first_name'],
         'last_name' => $row['last_name'],
         'pf_image_name' => $image_src,
         'basic_info' => $basic_info,
         'school_career' => $school_career,
         'favorites' => $favorites,
         'rss' => $rss
      );

      return $json_mode ? json_encode($data) : $data;

      if ($row['show_email'] || $row['linkedin_url'] ||
          $row['twitter_url'] || $row['facebook_url'] || $row['website_url'])
      {
         echo "<div class=\"profile\" id=\"contact\">";
         echo "<div><b>Contact</b></div>";

         if ($row['show_email'])
         {
            echo "<div><a href=\"mailto:" . $row['email'] . "\">" . $row['email'] . "</a></div>";
         }
         if ($row['linkedin_url'])
         {
            echo "<div><a href=\"" . $row['linkedin_url'] . "\">LinkedIn</a></div>";
         }
         if ($row['twitter_url'])
         {
            echo "<div><a href=\"" . $row['twitter_url'] . "\">Twitter</a></div>";
         }
         if ($row['facebook_url'])
         {
            echo "<div><a href=\"" . $row['facebook_url'] . "\">Facebook</a></div>";
         }
         if ($row['website_url'])
         {
            if (!strpos($row['website_url'], "http"))
            {
               $row['website_url'] = "http://" . $row['website_url'];
            }
            echo "<div><a href=\"" . $row['website_url'] . "\">Website</a></div>";
         }
         echo "</div>";
      }

      if ($row['message'])
      {
         echo "<p class=\"profile\" id=\"quote\">" . $row['message'] ."</p>";
      }


      echo "<p class=\"profile\" id=\"school-info\">";
      $schoolInfo = array(
         "Major" => "major",
         "Minor" => "minor",
         "Other Organizations" => "other_organizations",
         "Favorite Classes" => "classes",
         "Favorite Professors" => "profs",
         "Jobs/Internships" => "jobs",
         "Research Topics" => "research",
         "Plans after graduation" => "after_graduation",
      );
      foreach ($schoolInfo as $key => $value)
      {
         if ($row[$value])
            echo "<b>" . $key . ": </b>" . $row[$value] . "<br>";
      }
      echo "</p>";

      echo "<p class=\"profile\" id=\"personal-interests\">";
      $personalInterests = array(
         "Favorite Food" => "food",
         "Favorite Music" => "music",
         "Favorite Movies" => "movies",
         "Favorite TV Shows" => "tv_shows",
         "Favorite Books" => "books",
         "Favorite Sports" => "sports",
         "Favorite Games" => "games",
         "Hobbies" => "hobbies",
      );
      foreach ($personalInterests as $key => $value)
      {
         if ($row[$value])
            echo "<b>" . $key . ": </b>" . $row[$value] . "<br>";
      }
      echo "</p>";

      echo "<p class=\"profile\" id=\"rss-info\">";
      $results = db_select("SELECT position_full FROM eboard WHERE profile_id=".$id);
      if (count($results) > 0)
      {
         echo "<b>Current RSS Position: </b>" . $results[0]['position_full'];
      }

      $personalInterests = array(
         "RSS Committees" => "committees",
         "Past Positions Held" => "rss_previous",
      );
      foreach ($personalInterests as $key => $value)
      {
         if ($row[$value])
            echo "<b>" . $key . ": </b>" . $row[$value] . "<br>";
      }
      echo "</p>";

      echo "</div>";
   }

?>