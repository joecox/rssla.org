/* HEADER */

function fadeIn(obj) {
   $(obj).fadeIn(1200);
}

/* MAIN */


$(document).ready(function () 
{
   var maxHeight = Math.max.apply(null, $(".cont").map(function ()
   {
      return $(this).height();
   }).get());
   
   $(".cont").css("min-height", maxHeight);
});

$(document).ready(function () 
{
   $(".photobanner[src='']").parent(".bannerwrap").css("display", "none");
});


// frame sliding
$(document).ready(function()
{
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
});