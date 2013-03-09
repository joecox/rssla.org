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
   });



   /* FORM ACTIONS */

   // Form validation
   $(".button#submit").click(function ()
   {
      var anyBad = false;
      $("input[type='text'].required").each(anyBad = function () 
      {
         if ($(this).attr("name") == "optgender")
            return;
         else
         {
            if ($(this).val() == "")
            {
               $(this).parents(".inputwrap").css("background-color", "rgba(255,0,0,0.2)");
               return true;
            }
            else
               $(this).parents(".inputwrap").css("background-color", "white");
         }
      });
      $("input[type='radio'].required").each(anyBad = function () 
      {
         if ($(this).val() == "")
         {
            $(this).parents(".inputwrap").css("background-color", "rgba(255,0,0,0.2)");
            return true;
         }
         else
            $(this).parents(".inputwrap").css("background-color", "white");
      });
      $("input[type='checkbox'].required").each(anyBad = function () 
      {
         if ($(this).val() == "")
         {
            $(this).parents(".inputwrap").css("background-color", "rgba(255,0,0,0.2)");
            return true;
         }
         else
            $(this).parents(".inputwrap").css("background-color", "white");
      });
      $("textarea.required").each(anyBad = function () 
      {
         if ($(this).val() == "")
         {
            $(this).parents(".inputwrap").css("background-color", "rgba(255,0,0,0.2)");
            return true;
         }
         else
            $(this).parents(".inputwrap").css("background-color", "white");
      });
      if (!anyBad)
         $(this).parent().parents("form").submit();
      else
         return;
   });

   $(".button.radio").click(function ()
   {
      $(".button.radio.selected").each(function ()
      {
         var val = $(this).attr("value");
         $("input[value=" + val + "]").prop("checked", false);
      })
      $(".button.radio.selected").removeClass("selected");
      $(this).addClass("selected");
      var val = $(this).attr("value");
      $("input[value=" + val + "]").prop("checked", true);
   });

   $("label.required").append("<span style='color:red'> *</span");

   $("input[type='text']").prop("size", "30");

   $(".sidenavitem").click(function ()
   {
      $(this).addClass("selected");
      $(this).parent().siblings("a").children(".sidenavitem").removeClass("selected");
   });
});