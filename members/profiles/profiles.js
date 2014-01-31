// Open Profile Creation Dialogue
$("#create-profile-link").click(function ()
{
   showCreateProfileDialogue();
});

function showCreateProfileDialogue ()
{
   var html = "<p style=\"text-align:center\"><i>All fields required</i></p>";
       html+= "<form id=\"create\" method=\"post\" style=\"text-align:center\">";
       html+= "<input id=\"sid_input\" name=\"sid\" type=\"text\" size=\"25\" placeholder=\"Student ID Number\"/>";
       html+= "<input name=\"fname\" type=\"text\" size=\"25\" placeholder=\"First Name\"/>";
       html+= "<input name=\"lname\" type=\"text\" size=\"25\" placeholder=\"Last Name\"/>";
       html+= "<select name=\"year\">";
       html+= "<option value=\"1\">First Year</option>";
       html+= "<option value=\"2\">Second Year</option>";
       html+= "<option value=\"3\">Third Year</option>";
       html+= "<option value=\"4\">Fourth Year</option>";
       html+= "</select>";
       html+= "<div style=\"margin: 10px\">";
       html+= "<input type=\"checkbox\" name=\"transfer\">Are you a transfer?";
       html+= "</div>";
       html+= "<input name=\"email\" type=\"text\" size=\"25\" placeholder=\"Email\"/>";
       html+= "<input name=\"pw\" type=\"password\" size=\"25\" placeholder=\"Password (6-30 characters)\"/>";
       html+= "<div style=\"margin-top:20px\">";
       html+= "<span class=\"button\">Continue</span>";
       html+= "</div>";
       html+= "</form>";

   var options = {
      "height": 550,
      "width": 500,
      "html": html,
   };

   showModal("custom", options, true);
}

var valid_sid;
$("body").on("click", "form#create .button", function()
{
   var form_valid = true;
   var invalidArr = Array();

   $("form input").each(function ()
   {
      if ($(this).val() == "")
      {
         form_valid = false;
         invalidArr.push($(this).attr("name"));
      }
   });

   var sid = $("input[name=sid]").val();
   if (sid.length < 9)
   {
      form_valid = false;
      invalidArr.push("sid");
   }
   else if (!valid_sid)
   {
      form_valid = false;
      invalidArr.push("sid");
   }

   var pw = $("input[name=pw]").val();
   if (pw.length < 6 || pw.length > 30)
   {
      form_valid = false;
      invalidArr.push("pw");
   }

   if (form_valid)
   {
      $("form input").each(function ()
      {
         $(this).css("background", "white");
      });

      createProfileAjax();
   }
   else
   {
      $("form input").each(function ()
      {
         $(this).css("background", "white");
      });

      for (var input in invalidArr)
      {
         $("input[name=" + invalidArr[input] + "]").css("background", "#ff4c4c");
      }
   }
});

// SID Check
$("body").on("input", "input[name=sid]", function()
{
   var sid = $(this).val();

   if (sid.length >= 9)
   {
      $.ajax({
         url: "check_sid.php",
         type: "POST",
         dataType: "JSON",
         data: {sid: sid}
      })
      .done(function(response)
      {
         if (response.success)
         {
            valid_sid = response.valid_sid;
         }
      });
   }
});

// Check for enter keyup event
$("body").on("keyup", "form#create input[name=pw]", function(event)
{
   var key = (event.keyCode ? event.keyCode : event.which);
   if (key == '13')
   {
      $("form#create .button").trigger("click");
   }
});

function createProfileAjax()
{
   // Add modal veil & loading gif
   $modal = $(".modal");
   $modal_veil = $("<div>").css("position", "absolute")
                           .css("top", "0")
                           .css("height", "100%")
                           .css("width", "100%")
                           .css("z-index", "99")
                           .css("background", "rgba(163,163,163,0.42)");

   $loading_gif = $("<img>").attr("src", "/resources/images/UI/rss_seal_loading.gif")
                            .css("position", "absolute")
                            .css("height", "150px")
                            .css("width", "150px")
                            .css("top", "50%")
                            .css("left", "50%")
                            .css("margin-top", "-75px")
                            .css("margin-left", "-75px")
                            .css("z-index", "100");

   $(".modal-inner").css("-webkit-filter", "blur(1px)");
   $modal.append($modal_veil);
   $modal.append($loading_gif);

   setTimeout(function(){}, 1000);

   $.ajax({
      url: "create_profile.php",
      type: "POST",
      dataType: "JSON",
      data: $("form#create").serialize(),
   })
   .done(function(response)
   {
      if (response.success)
      {
         document.cookie = "userId=" + response.userId + ";path=/";
         document.cookie = "sessionId=" + response.sessionId + ";path=/";
         window.location = "./?id=" + response.userId;
      }
      else
      {
         $("veil").trigger("click");
         if (response.user_exists)
         {
            var html = "<p style=\"text-align:center\">You already have a profile. Please log in.</p>";

            var options = {
               "height": 70,
               "width": 400,
               "html": html,
            };

            showModal("custom", options, true);
         }
      }
   });
}

$("#login").click(function ()
{
   openLogInDialogue();
});

function openLogInDialogue()
{
   var html = "<p style=\"text-align:center\"><i id=\"msg\">All fields required</i></p>";
       html+= "<form id=\"login\" method=\"post\" style=\"text-align:center\">";
       html+= "<input name=\"email\" type=\"text\" size=\"25\" placeholder=\"Email\"/>";
       html+= "<input name=\"pw\" type=\"password\" size=\"25\" placeholder=\"Password\"/>";
       html+= "<div style=\"margin-top:20px\">";
       html+= "<span class=\"button\">Log In</span>";
       html+= "</div>";
       html+= "</form>";

   var options = {
      "height": 275,
      "width": 500,
      "html": html,
   };

   showModal("custom", options, true);
}

$("body").on("keyup", "form#login input[name=pw]", function(event)
{
   var key = (event.keyCode ? event.keyCode : event.which);
   if (key == '13')
   {
      $("form#login .button").trigger("click");
   }
});

$("body").on("click", "form#login .button", function()
{
   var valid = true;
   var invalidArr = Array();

   $("form input").each(function ()
   {
      if ($(this).val() == "")
      {
         valid = false;
         invalidArr.push($(this).attr("name"));
      }
   });

   if (valid)
   {
      $("form input").each(function ()
      {
         $(this).css("background", "white");
      });

      loginAjax();
   }
   else
   {
      $("form input").each(function ()
      {
         $(this).css("background", "white");
      });

      for (var input in invalidArr)
      {
         $("input[name=" + invalidArr[input] + "]").css("background", "#ff4c4c");
      }
   }
});

function loginAjax()
{
   // Add modal veil & loading gif
   $modal = $(".modal");
   $modal_veil = $("<div>").css("position", "absolute")
                           .css("top", "0")
                           .css("height", "100%")
                           .css("width", "100%")
                           .css("z-index", "99")
                           .css("background", "rgba(163,163,163,0.42)");

   $loading_gif = $("<img>").attr("src", "/resources/images/UI/rss_seal_loading.gif")
                            .css("position", "absolute")
                            .css("height", "150px")
                            .css("width", "150px")
                            .css("top", "50%")
                            .css("left", "50%")
                            .css("margin-top", "-75px")
                            .css("margin-left", "-75px")
                            .css("z-index", "100");

   $(".modal-inner").css("-webkit-filter", "blur(1px)");
   $modal.append($modal_veil);
   $modal.append($loading_gif);

   $.ajax({
      url: "/members/login.php",
      type: "POST",
      dataType: "JSON",
      data: $("form#login").serialize(),
   })
   .done(function(response)
   {
      if (response.success)
      {
         document.cookie = "userId=" + response.userId + ";path=/";
         document.cookie = "sessionId=" + response.sessionId + ";path=/";
         window.location = ".";
      }
      else
      {
         $("#msg").html(response.fail_msg);
      }
   });
}