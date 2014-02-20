<?php

   include_once($DB_MODULE);

   function show_login()
   {
      echo '<span class="flatbutton" id="login">Log In</span>';
   }

   function show_account_control($userId)
   {
      db_connect();

      $results = db_select("SELECT first_name, last_name, email, pf_photo_path FROM members WHERE id=".$userId);
      $row = $results[0];
      $first_name = $row["first_name"];
      $last_name = $row["last_name"];

      if (strlen($row["email"]) > 28)
      {
         $email = substr($row["email"], 0, 25) . "...";
      }
      else
      {
         $email = $row["email"];
      }
      $image_src = $row["pf_photo_path"] ? $row["pf_photo_path"] : "general_profile_image.png";

      $account_control_html = <<<ACCOUNT_CONTROL_HEREDOC

      <span class="flatbutton" id="account_control">
         <span id="name">$first_name</span>
         <div id="profile_box_content">
            <div class="account_control profile">
               <img src="/resources/images/members/$image_src"/>
               <div id="name">$first_name $last_name</div>
               <div id="email"><i>$email</i></div>
            </div>
            <div class="account_control buttons">
               <span class="account_control edit"><a href="/members/profiles/edit/?id=$userId">Edit Profile</a></span>
               <span class="account_control logout" id="logout">Log Out</span>
            </div>
         </div>
      </span>

ACCOUNT_CONTROL_HEREDOC;

      echo $account_control_html;
   }

?>