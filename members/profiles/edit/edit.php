<?php

   function buildEditView($id)
   {
      $years = array(
         '1' => "First Year",
         '2' => "Second Year",
         '3' => "Third Year",
         '4' => "Fourth Year"
      );

      $results = db_select("SELECT * FROM `members` where id=".$id);
      $row = $results[0];

      echo "<div class=\"profile\" id=\"sidebar\">";
      echo "<div class=\"profile\" id=\"image-container\">";
      $image_src = $row["pf_photo_path"] ? $row["pf_photo_path"] : "general_profile_image.png";
      echo "<img class=\"profile\" id=\"profile-image\" src=\"/resources/images/members/" . $image_src . "\">";
      echo "</div>";
      echo "<input type=\"hidden\" name=\"MAX_FILE_SIZE\" value=\"30000000\"/>";
      echo "<input type=\"file\" name=\"profile-image\" style=\"margin-top:10px\"/>";
      echo "</div>";
      
      echo "<div class=\"profile\" id=\"main-space\">";

      echo "<div style=\"border-bottom: 1px solid #aaa; padding-bottom: 10px\">";
      echo "<input type=\"text\" name=\"first_name\" value=\"".$row['first_name']."\"/>";
      echo "<input type=\"text\" name=\"last_name\" value=\"".$row['last_name']."\"/>";
      echo "<select name=\"year\">";
      for ($ii = 1; $ii <= 4; $ii++)
      {
         if ($ii == $row['year'])
         {
            echo "<option value=\"".$ii."\" selected>".$years[$ii]."</option>";
         }
         else
         {
            echo "<option value=\"".$ii."\">".$years[$ii]."</option>";
         }
      }
      echo "</select>";
      if ($row['is_transfer'])
      {
         echo "<input type=\"checkbox\" name=\"transfer\" value=\"1\" checked style=\"margin-left:10px\"/> Are you a transfer?";
      }
      else
      {
         echo "<input type=\"checkbox\" name=\"transfer\" value=\"1\" style=\"margin-left:10px\"/> Are you a transfer?";
      }
      echo "</div>";

      echo "<div class=\"profile\" id=\"contact\" style=\"border-bottom: 1px solid #aaa; padding-bottom: 10px\">";
      echo "<div><b>Contact</b></div>";

      echo "<br/>";
      echo "Email: &nbsp;&nbsp;<input type=\"text\" name=\"email\" value=\"".$row['email']."\"/>&nbsp;&nbsp;";
      if ($row['show_email'])
      {
         echo "<input type=\"checkbox\" name=\"show_email\" checked/>Show Email?";
      }
      else
      {
         echo "<input type=\"checkbox\" name=\"show_email\"/>Show Email?";
      }

      echo "<br/>";
      echo "LinkedIn Profile URL: &nbsp;&nbsp;<input type=\"text\" name=\"linkedin_url\" value=\"".$row['linkedin_url']."\"/>";

      echo "<br/>";
      echo "Twitter Profile URL: &nbsp;&nbsp;<input type=\"text\" name=\"twitter_url\" value=\"".$row['twitter_url']."\"/>";

      echo "<br/>";
      echo "Facebook Profile URL: &nbsp;&nbsp;<input type=\"text\" name=\"facebook_url\" value=\"".$row['facebook_url']."\"/>";

      echo "<br/>";
      echo "Website URL: &nbsp;&nbsp;<input type=\"text\" name=\"website_url\" value=\"".$row['website_url']."\"/>";

      echo "</div>";

      echo "<div style=\"border-bottom: 1px solid #aaa; padding-bottom: 10px\">";
      echo "<p>Enter a greeting, words of wisdom, or some other message.</p>";
      echo "<textarea name=\"message\" rows=\"4\" cols=\"50\">" . $row['message'] ."</textarea>";
      echo "</div>";

      echo "<p class=\"profile\" id=\"basic-info\">";
      $basicInfo = array(
         "Birthday" => "birthday",
         "Birthplace" => "birthplace",
         "Hometown" => "hometown",
      );
      foreach ($basicInfo as $key => $value)
      {
         if ($row[$value])
            echo "<b>" . $key . ": &nbsp;&nbsp;</b><input type=\"text\" name=\"".$value."\" value=\"".$row[$value]."\"/><br/>";
      }
      echo "</p>";

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
         echo "<b>" . $key . ": &nbsp;&nbsp;</b><input type=\"text\" name=\"".$value."\" value=\"".$row[$value]."\"/><br/>";
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
         echo "<b>" . $key . ": &nbsp;&nbsp;</b><input type=\"text\" name=\"".$value."\" value=\"".$row[$value]."\"/><br/>";
      }
      echo "</p>";

      echo "<p class=\"profile\" id=\"rss-info\">";

      $rss = array(
         "RSS Committees" => "committees",
         "Past Positions Held" => "rss_previous",
      );
      foreach ($rss as $key => $value)
      {
         echo "<b>" . $key . ": &nbsp;&nbsp;</b><input type=\"text\" name=\"".$value."\" value=\"".$row[$value]."\"/><br/>";
      }
      echo "</p>";

      echo "<p>";
      echo "<input type=\"hidden\" name=\"userId\" value=\"".$id."\"/>";
      echo "<input type=\"hidden\" name=\"edit_request\" value=\"true\"/>";
      echo "<span class=\"button\">Save</span>";
      echo "</p>";

      echo "</div>";
   }

   function storeEditData()
   {
      $data = $_POST;

      $query = "UPDATE members SET ";
      $query .= "year=".$data['year'];
      $query .= ", is_transfer=".(isset($data['transfer']) ? 1 : 0);
      $query .= ", show_email=".(isset($data['show_email']) ? 1 : 0);

      $string = array(
         "first_name",
         "last_name",
         "email",
         "linkedin_url",
         "twitter_url",
         "facebook_url",
         "website_url",
         "message",
         "birthday",
         "birthplace",
         "hometown",
         "major",
         "minor",
         "other_organizations",
         "classes",
         "profs",
         "jobs",
         "research",
         "after_graduation",
         "food",
         "music",
         "movies",
         "tv_shows",
         "books",
         "sports",
         "games",
         "hobbies",
         "committees",
         "rss_previous",
      );
      foreach ($string as $col_name)
      {
         $query .= ", " . $col_name . "=" . ($data[$col_name] == "" ? "NULL" : "'".str_replace('\'', '\\\'', str_replace('"', '\"', $data[$col_name]))."'");
      }

      if (!empty($_FILES['profile-image']['name']))
      {
         $uploaddir = $_SERVER['DOCUMENT_ROOT'].'/resources/images/members/';
         $ext = pathinfo($_FILES['profile-image']['name'], PATHINFO_EXTENSION);
         $image_name = str_replace(' ', '', $data['first_name']).str_replace(' ', '', $data['last_name']).'.'.$ext;
         $uploadfile = $uploaddir.$image_name;

         move_uploaded_file($_FILES['profile-image']['tmp_name'], $uploadfile);

         $query .= ", pf_photo_path='".str_replace('\'', '\\\'', $image_name)."'";
      }
      
      $query .= " WHERE id=".$data['userId'].";";

      db_connect();

      db_insert($query);
   }
?>