<?php
   $userId = $_COOKIE['userId'];
?>

<?php if (!$GLOBALS['sessionIsValid']) : ?>
   <span class="flatbutton v-align" id="login">Log In</span>
<?php else : ?>
   <?php
      $results = db_select("SELECT first_name, last_name, pf_photo_path FROM members WHERE id=".$userId);
      $row = $results[0];
      $first_name = $row["first_name"];
      $last_name = $row["last_name"];
      $image_src = $row["pf_photo_path"] ? $row["pf_photo_path"] : "general_profile_image.png";
   ?>
   <span class="flatbutton v-align" id="profilebox">
      <span id="name"><?php echo $first_name; ?></span>
      <div id="profile_box_content">
         <img src="/resources/images/members/<?php echo $image_src; ?>" onclick="goTo('/members/profiles/?id=<?php echo $userId; ?>')"/>
         <span id="name" style="margin-left: 10px" onclick="goTo('/members/profiles/?id=<?php echo $userId; ?>')"><?php echo $first_name . " " . $last_name; ?></span>
         <div style="margin-top: 20px">
            <span class="button" style="margin-right: 90px">Edit Profile</span>
            <span class="button" id="logout">Log Out</span>
         </div>
      </div>
   </span>
   <script>
      var $profile_box = $(".flatbutton#profilebox");
      var $name = $("#profilebox > #name");
      var $box_content = $("#profile_box_content");
      var profile_box_width = $profile_box.width();
      var profile_box_height = $profile_box.height();

      $profile_box.on("click", function(event)
      {
         event.stopPropagation();
         showProfileBox();
      });

      $("html").on("click", function()
      {
         hideProfileBox();
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
                                "backgroundColor": "#fff" }, 300, function ()
                                {
                                    $box_content.fadeIn(100);
                                });
         $profile_box.css({ border: "1px solid #bbb", 
                            "z-index": 99,
                            cursor: "default",
                            color: "black" });
      }

      function hideProfileBox()
      {
         $box_content.hide();
         $name.show()
              .animate({ opacity: 1 });
         $profile_box.animate({ "width": profile_box_width + "px",
                                "height": profile_box_height + "px",
                                "opacity": 0.8,
                                "backgroundColor": "rgb(36,115,211)" }, 300);
         $profile_box.css({ border: "", 
                            "z-index": 0,
                            cursor: "pointer",
                            color: "white" });
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