<?php
   $userId = $_COOKIE['userId'];
?>

<?php if (!$GLOBALS['sessionIsValid']) : ?>
   <span class="flatbutton v-align" id="login">Log In</span>
<?php else : ?>
   <?php
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
   ?>
   <span class="flatbutton v-align" id="profilebox">
      <span id="name"><?php echo $first_name; ?></span>
      <div id="profile_box_content">
         <div class="account_control profile">
            <img src="/resources/images/members/<?php echo $image_src; ?>"/>
            <div id="name"><?php echo $first_name . " " . $last_name; ?></div>
            <div id="email"><i><?php echo $email; ?></i></div>
         </div>
         <div class="account_control buttons">
            <span class="account_control edit">Edit Profile</span>
            <span class="account_control logout" id="logout">Log Out</span>
         </div>
      </div>
   </span>
   <script>
      var $profile_box = $(".flatbutton#profilebox");
      var $name = $("#profilebox > #name");
      var $box_content = $("#profile_box_content");
      var profile_box_width = $profile_box.width();
      var profile_box_height = $profile_box.height();

      var profile_box_open = false;

      $profile_box.on("click", function(event)
      {
         event.stopPropagation();
         showProfileBox();
      });

      $("html").on("click", function()
      {
         if (profile_box_open)
         {
            hideProfileBox();
         }
      });

      $(".account_control.profile").on("click", function()
      {
         window.location = '/members/profiles/?id=<?php echo $userId; ?>';
      });

      $("#logout").on("click", function()
      {
         logout();
      });

      function showProfileBox()
      {
         $name.animate({ opacity: 0 }, 100, function () { $name.hide(); });
         $profile_box.animate({ "width": "300px",
                                "height": "120px",
                                "opacity": 1,
                                "backgroundColor": "#fff",
                                "padding": 0 }, 300, function ()
                                {
                                    $box_content.fadeIn(100);
                                });
         $profile_box.css({ border: "1px solid #bbb", 
                            "z-index": 99,
                            cursor: "default",
                            color: "black" });
         profile_box_open = true;
      }

      function hideProfileBox()
      {
         $box_content.hide();
         $name.show()
              .animate({ opacity: 1 });
         $profile_box.animate({ "width": profile_box_width + "px",
                                "height": profile_box_height + "px",
                                "opacity": 0.8,
                                "backgroundColor": "rgb(36,115,211)",
                                "padding": "6px 8px" }, 300);
         $profile_box.css({ border: "", 
                            "z-index": 0,
                            cursor: "pointer",
                            color: "white", });

         profile_box_open = false;
      }

      function logout()
      {
         deleteCookie("userId", "/");
         deleteCookie("sessionId", "/");
         window.location = ".";
      }

      function deleteCookie(name, path)
      {
         document.cookie = name + "=; expires=Thu, 01 Jan 1970 00:00:01 GMT;" + ( path ? "; path=" + path : "");
      }
   </script>
<?php endif; ?>