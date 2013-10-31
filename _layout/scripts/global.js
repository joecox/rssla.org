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
   $(".rowtitle").not(".top").children("div").css("height", "1px");
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
