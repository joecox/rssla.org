// Open Profile Creation Dialogue
$("#create-profile-link").click(function ()
{
   showCreateProfileDialogue();
});

function showCreateProfileDialogue ()
{
   var html = "<p style=\"text-align:center\"><i>All fields required</i></p>";
       html+= "<form id=\"create\" method=\"post\" style=\"text-align:center\">";
       html+= "<input name=\"sid\" type=\"text\" size=\"25\" placeholder=\"Student ID Number\"/>";
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

$("body").on("click", "form#create .button", function()
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

   var pw = $("input[name=pw]").val();
   if (pw.length < 6 || pw.length > 30)
   {
      valid = false;
      invalidArr.push("pw");
   }

   if (valid)
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

function createProfileAjax()
{
   $.ajax({
      url: "processCreate.php",
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
      }
   });
}

$(".login.button").click(function ()
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