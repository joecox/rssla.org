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
      var width = 690 - $(this).children("span").width();
      $(this).children("div").css("width", width + "px");
      var bottom = ($(this).children("span").height() / 2) - 1;
      $(this).children("div").css("bottom", bottom);
   });

   // moreinfo arrow move
   $(".moreinfo").hover(function () {
      $(this).children("img").css("right", "0px");
   })



   /* FORM ACTIONS */
   $(".button#submit").click(function ()
   {
      $(this).parent().parents("form").submit();
   })
});