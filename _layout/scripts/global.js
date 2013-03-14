/* HEADER */

function fadeIn(obj) {
   $(obj).fadeIn(1200);
}

/* MAIN */

$(document).ready(function () 
{
   // set min-heights to max
   var maxHeight = Math.max.apply(null, $(".cont").map(function ()
   {
      return $(this).height();
   }).get());
   
   $(".cont").css("min-height", maxHeight);

   // initially hide the photobanner
   $(".photobanner[src='']").parent(".bannerwrap").css("display", "none");

   // frame sliding
   var currentframe = 0;

   $(".nextframe").click(function() 
   {
      $("#currentframe").fadeOut(200, function()
      {
         $("#currentframe").attr("id", "frame" + currentframe);

         currentframe = currentframe + 1;
         var nextframe = currentframe + 1;

         $("#frame" + currentframe).fadeIn(200);
         $("#frame" + currentframe).attr("id", "currentframe");

         $(".prevframe").show();

         if (!($("#frame" + nextframe).length))
            $(".nextframe").hide();
      });
   });

   $(".prevframe").click(function() 
   {
      $("#currentframe").fadeOut(200, function() 
      {
         $("#currentframe").attr("id", "frame" + currentframe);

         currentframe = currentframe - 1;
         var prevframe = currentframe - 1;

         $("#frame" + currentframe).fadeIn(200);
         $("#frame" + currentframe).attr("id", "currentframe");

         $(".nextframe").show();

         if (!($("#frame" + prevframe).length))
            $(".prevframe").hide();
      });
   });

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