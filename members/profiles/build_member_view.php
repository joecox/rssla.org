<?php

   function buildMemberView($id)
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
      echo "</div>";
      
      echo "<div class=\"profile\" id=\"main-space\">";

      if ($row['show_email'])
      {
         echo "<div id=\"contact\">";
         echo "<b>Contact</b><br>";
         echo $row['email'];
         echo "</div>";
      }

      echo "<div>";
      echo "<span class=\"profile\" id=\"name\">" . $row['first_name'] . " " . $row['last_name'] . " / ";
      echo "<span class=\"profile\" id=\"year\">" . $years[$row['year']] . "</span>";
      echo "<span>";
      echo "</div>";

      if ($row['message'])
      {
         echo "<p class=\"profile\" id=\"quote\">" . $row['message'] ."</p>";
      }

      echo "<p class=\"profile\" id=\"basic-info\">";

      $basicInfo = array(
         "Birthday" => "birthday",
         "Birthplace" => "birthplace",
         "Hometown" => "hometown",
      );

      foreach ($basicInfo as $key => $value)
      {
         if ($row[$value])
            echo "<b>" . $key . ": </b>" . $row[$value] . "<br>";
      }

      echo "</p>";

      echo "<p class=\"profile\" id=\"school-info\">";

      $schoolInfo = array(
         "Major" => "major",
         "Minor" => "minor",
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
         "Favorite Sports" => "sports",
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