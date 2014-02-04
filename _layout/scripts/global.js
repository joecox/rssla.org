/* HEADER */

var loadedHeaderImages = 0;
var numHeaderImages = 5;

$(function ()
{
   // $(".headerphoto").each(function ()
   // {
   //    $(this).load(function ()
   //    {
   //       loadedHeaderImages++;

   //       if (loadedHeaderImages == numHeaderImages)
   //       {
            // check if homepage
            var home = true;
            var patt = /rssla\.org\/?$/;
            var patt2 = /localhost\/?$/;
            if (patt.exec(window.location.href) == null &&
                patt2.exec(window.location.href) == null)
            {
               var home = false;
            }
            // set cover-up width
            var width = ($("html").width() - 1000) / 2;
            $("#photobarCoverPanelRight")
               .width(width)
               .css("right", "-" + width + "px");

            setTimeout(function() {
               for (ii = 0; ii < 5; ii++)
               {
                  var obj = $(".headerphoto[num=" + ii + "]");
                  var leftString = $(obj).css("left");
                  var left = leftString.replace("px", "") - 1000;

                  // check if homepage
                  if (home)
                  {
                     $(obj).animate({left: left + "px"}, {queue: false, duration: 1200});
                  }
                  else
                  {
                     $(obj).css("left", left + "px");
                  }
                  $(obj).animate({opacity: 1}, {queue: false, duration: 1800});
               }
               $("body").css("overflow-x", "");
            }, 100);
   //       }
   //    });
   // });
});

/* MAIN */

var $html = $("html");

function setContHeight () 
{
   var maxHeight = Math.max.apply(null, $(".cont").map(function ()
   {
      return $(this).height();
   }).get());
   
   $(".cont").css("min-height", maxHeight);
}

function resetContHeight ()
{
   $(".cont").css("min-height", "");
   setContHeight();
}

$(document).ready(function () 
{
   // Vertical aligning
   $(".v-align").each(function() {
      if($(this).parent().css("position") == "absolute")
         ;
      else
         $(this).parent().css("position", "relative");
      var top = ($(this).parent().height() / 2) 
                  - ($(this).height() / 2)
                  - (parseInt($(this).css("padding-top")) / 2)
                  - (parseInt($(this).css("padding-bottom")) / 2);
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

   $(window).load(function ()
   {
      // set min-heights to max
      var maxHeight = Math.max.apply(null, $(".cont").map(function ()
      {
         return $(this).height();
      }).get());
      
      $(".cont").css("min-height", maxHeight);
   });
   
   // initially hide the photobanner
   $(".photobanner[src='']").parent(".bannerwrap").css("display", "none");

   // Konami
   var keys    = [];
   var konami  = '38,38,40,40,37,39,37,39,66,65';
   $(window).keydown(function(e) {
      keys.push( e.keyCode );
      if ( keys.toString().indexOf( konami ) >= 0 )
      {
         $(".nav")
            .animate({
               opacity: 0
            });
         $(".nav#hidden")
            .animate({
               opacity: 1
            })
            .css("z-index", "2");
         keys = [];
      }
   });

   // Rowtitle side-line
   $(".rowtitle").not(".top").append("<div></div>");
   $(".rowtitle").not(".top").children("div").css("position", "absolute");
   $(".rowtitle").not(".top").children("div").css("right", "0");
   $(".rowtitle").not(".top").children("div").css("background-color", "#ccc");
   $(".rowtitle").not(".top").children("div").css("height", "2px");
   $(".rowtitle").not(".top").each(function () 
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
});

function selectSideItem (obj)
{
   var jobj = $(obj);
   $(".sidenav").children(".sidenavitem").removeClass("selected");
   jobj.addClass("selected");
}

/* http://stackoverflow.com/questions/9333379/javascript-css-check-if-overflow */
function isOverflowed (element)
{
   return element.scrollHeight > element.clientHeight || element.scrollWidth > element.clientWidth;
}

function jq_isOverflowed (element)
{
   return element[0].scrollHeight > element[0].clientHeight || element[0].scrollWidth > element[0].clientWidth;
}

function goTo (url)
{
   window.location = url;
}

function showModal (type, options, persistent)
{
   if ($(".modal").length > 0)
   {
      var $modal = $(".modal").removeClass()
                              .addClass("modal")
                              .html("")
                              .show();
   }
   else
   {
      var $modal = $("<div>").addClass("modal");
   }

   if ($(".veil").length > 0)
   {
      var $veil = $(".veil").show();
   }
   else
   {
      var $veil = $("<div>").addClass("veil");
   }

   switch (type)
   {
      case "notif":
      {
         $modal.addClass("notif");
         
         var src = options["src"];
         var text = options["text"];

         $inner = $("<div>").addClass("modal-inner");

         $inner.append($("<img>").addClass("image")
                                 .attr("src", src));
         $inner.append($("<div>").addClass("text")
                                 .html(text));
         $modal.append($inner);
      }
      case "custom":
      {
         $modal.css("margin-top", "-" + (options["height"] / 2) + "px");
         $modal.css("margin-left", "-" + (options["width"] / 2) + "px");

         $inner = $("<div>").addClass("modal-inner");

         $inner.css("height", (options["height"] - 20) + "px");
         $inner.css("width", (options["width"] - 20) + "px");

         $inner.append(options["html"]);

         $modal.append($inner);
      }
   }

   $("body").append($modal);
   $("body").append($veil);

   $veil.click(function(){ removeModal(); });

   $modal.fadeIn(100);
   $veil.fadeIn(100);

   if (!persistent)
   {
      setTimeout(removeModal(), 2000);
   }

   function removeModal()
   {
      $modal.fadeOut(200, function ()
      {
         $modal.remove();        
      });

      $veil.fadeOut(200, function ()
      {
         $veil.remove();
      });
   }
}

function showProcessingModal ()
{
   var options = {
      src: "/resources/images/UI/loading.gif",
      text: "Processing, please wait."
   };
   showModal("notif", options, true);
}

/* ACCOUNT CONTROL */

$(document).ready(function()
{
   var $profile_box = $("#account_control");
   var $name = $("#account_control > #name");
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
      window.location = '/members/profiles/?id=' + userId;
   });

   $("#logout").on("click", function()
   {
      logout();
   });

   $("#login").click(function ()
   {
      openLogInDialogue();
   });

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
                                 $(this).css("color", "black");
                             });
      $profile_box.css({ border: "1px solid #bbb", 
                         cursor: "default" });
      profile_box_open = true;
   }

   function hideProfileBox()
   {
      $box_content.hide();
      $name.show()
           .animate({ opacity: 1 });
      $profile_box.animate({ "width": profile_box_width + "px",
                             "height": profile_box_height + "px",
                             "opacity": 0.9,
                             "backgroundColor": "rgb(61,106,162)",
                             "padding": "7px 10px" }, 300, function()
                             {
                                 $(this).css("opacity", "");
                             });
      $profile_box.css({ border: "", 
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

   function deleteCookie(name, path, domain)
   {
      document.cookie = name + "=; expires=Thu, 01 Jan 1970 00:00:01 GMT;" + ( path ? "; path=" + path : "") + ( domain ? "; domain=" + domain : "");
   }

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

      $("#login > [name=email]").trigger("focus");
   }

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

      $("html").css("cursor", "none");

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
            $("html").css("cursor", "default");
            $loading_gif.remove();
            $modal_veil.remove();
            $(".modal-inner").css("-webkit-filter", "");
         }
      });
   }
});