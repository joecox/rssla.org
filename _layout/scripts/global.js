/* HEADER */

function fadeIn(obj) {
   $(obj).fadeIn(1200);
}

/* MAIN */

$(document).ready(function () 
{
   // Vertical aligning
   $(".v-align").each(function() {
      if($(this).parent().css("position") == "absolute")
         ;
      else
         $(this).parent().css("position", "relative");
      var top = ($(this).parent().height() / 2) - ($(this).height() / 2);
      $(this).css("top", top);
   });

   $(".button.v-align").each(function() {
      if($(this).parent().css("position") == "absolute")
         ;
      else
         $(this).parent().css("position", "relative");
      var top = ($(this).parent().height() / 2) - ($(this).height() / 2)
                                                - parseInt($(this).css("padding-top"), 10);
      $(this).css("top", top);
   });

   // Horizontal aligning
   $(".h-align").each(function() {
      if($(this).parent().css("position") == "absolute")
         ;
      else
         $(this).parent().css("position", "relative");
      var left = ($(this).parent().width() / 2) - ($(this).width() / 2);
      $(this).css("left", left);
   });

   $(".button.h-align").each(function() {
      if($(this).parent().css("position") == "absolute")
         ;
      else
         $(this).parent().css("position", "relative");
      var left = ($(this).parent().width() / 2) - ($(this).width() / 2)
                                                - parseInt($(this).css("padding-left"), 10);
      $(this).css("left", left);
   });

   // set min-heights to max
   var maxHeight = Math.max.apply(null, $(".cont").map(function ()
   {
      return $(this).height();
   }).get());
   
   $(".cont").css("min-height", maxHeight);

   // initially hide the photobanner
   $(".photobanner[src='']").parent(".bannerwrap").css("display", "none");

   // Rowtitle side-line
   $(".rowtitle").append("<div></div>");
   $(".rowtitle").children("div").css("position", "absolute");
   $(".rowtitle").children("div").css("right", "0");
   $(".rowtitle").children("div").css("background-color", "#ccc");
   $(".rowtitle").children("div").css("height", "1px");
   $(".rowtitle").each(function () 
   {
      var width = $(this).width() - 20 - $(this).children("span").width();
      $(this).children("div").css("width", width + "px");
      var bottom = ($(this).children("span").height() / 2) - 1;
      $(this).children("div").css("bottom", bottom);
   });

   // Sidenavitem
   $(".sidenavitem").click(function ()
   {
      $("sidenav").children(".sidenavitem").removeClass("selected");
      $(this).addClass("selected");
   });

   // sponsors align
/*
   $(".blurb").each(function () 
   {
      var margin_top = ($(this).height() / 2) - ($(this).siblings("a").children("img").css("height") / 2);
      if ($(this).height() > $(this).siblings("a").children("img").css("height"))
         $(this).siblings("a").children("img").css("margin-top", margin_top);
      else
         $(this).css("margin-top", margin_top);
   });
*/
/*
   // auto picture resizing
   $("img").each(function ()
   {
      if ($(this).width() > $(this).parent().width())
         $(this).width = $(this).parent().width();
   });
*/
   // coming soon nav items
   $(".navbutton.coming").hover(function ()
   {
      var cur_text = $(this).children().text();
      var cur_class = $(this).children().attr("class");
      var set_text = $(this).attr("meta");
      $(this).children().attr("class", "oneline");
      $(this).children().text(set_text);
      $(this).children().attr("meta1", cur_text);
      $(this).children().attr("meta2", cur_class); 
   }, function () 
   {
      var set_text = $(this).children().attr("meta1");
      var set_class = $(this).children().attr("meta2");
      $(this).children().attr("class", set_class);
      $(this).children().text(set_text);
   });
});

/* EBOARD SIGNIN *************************************************************/
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
               $("#incorr_msg").fadeIn(200);
         })
         .fail(function () {
            alert("fail");
         });
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
});

function selectSideItem (obj)
{
   var jobj = $(obj);
   $(".sidenav").children(".sidenavitem").removeClass("selected");
   jobj.addClass("selected");
}
