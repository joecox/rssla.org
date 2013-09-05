$(document).ready(function () {
   var login_box_open = false;

   $(".selector").click(function () {
      if (!login_box_open)
      {
         $(".wrapper-dropdown").addClass("active");
         $(this).addClass("active");
         $(".dropdown").animate({'max-height': "257px"}, 200);
         login_box_open = true;
      }
      else if (login_box_open)
      {
         $(".dropdown").animate({'max-height': 0}, 200);
         $(".wrapper-dropdown").removeClass("active");
         $(this).removeClass("active");
         login_box_open = false;
      }
   });

   $(".dropdown").children("li").click(function () {
      var text = $(this).text();
      $(".selector").text(text);
      $(".dropdown").animate({'max-height': 0}, 200);
      $(".wrapper-dropdown").removeClass("active");
      $(".selector").removeClass("active");
      login_box_open = false;
   });

   $(document).click(function () {
      $(".dropdown").animate({'max-height': 0}, 200);
      $(".wrapper-dropdown").removeClass("active");
      $(".selector").removeClass("active");
      login_box_open = false;
   });

   $(".wrapper-dropdown").click(function(event) {
      event.stopPropagation();
   });

   function filled (id, pw) {
      if (id == "Login as:" || pw == "")
         return false;
      else return true;
   }

   function ajaxPW () {
      var id = $(".selector").text();
      var pw = $("input#pw").val();
      if (filled(id, pw))
      {
         var data = 'id=' + id + '&pw=' + pw;
         $.ajax({
            url: "validate.php",
            type: "POST",
            data: data,
            dataType: "json"
         })
         .done(function (response) {
            if (response.success) {
               $(".login-box").fadeOut(200, function () {
                  $("#incorr_msg").fadeOut(200, function () {
                     $("#contwrap").hide().append(response.newcont).fadeIn(200);
                  });
               });

               
            }
            else
               $("#incorr_msg").text("Incorrect password.")
                               .fadeIn(200);
         })
         .fail(function () {
            alert("fail");
         });
      }
      else
      {
         $("#incorr_msg").text("Select a login identity.")
                         .fadeIn(200);
      }
   }

   $(".submit-square").click(function () {ajaxPW();});

   // Handle enter key AJAX
   $("input#pw").keypress(function(event) {
      if (event.keyCode == 13) {
         event.preventDefault();
         ajaxPW();
      }
   });

   $("#addMerch").click(function () 
   {
      window.location = "add.php";
   });

   $(".merchDelete").click(function ()
   {
      var id = $(this).attr("meta");
      $.ajax({
         url: "delete.php",
         type: "GET",
         data: { 'id': id },
         dataType: "JSON"
      })
      .done(function (response)
      {
         if (response.success)
         {
            window.location = ".";
         }
      })
      .fail(function (response)
      {
         alert("Failed");
      });
   });
});