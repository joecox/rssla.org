$(document).ready(function()
{
   $(".featured-container").hover(function()
   {
      $(this)
         .find(".featured-overlay")
         .stop()
         .animate({
            opacity: 1
         }, 200);
   }, function()
   {
      $(this)
         .find(".featured-overlay")
         .stop()
         .animate({
            opacity: 0
         }, 200);
   });



   $(window).load(function() {
      $(".featured-overlay").each(function()
      {
         $(this)
            .children(".featured-overlay-bkgd")
            .css("height", $(this)
                              .siblings("img")
                              .height());
      });
   });
   
});