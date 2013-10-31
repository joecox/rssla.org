function approve(obj)
{
   var url = $(obj)
               .closest(".heldImg-container")
               .find('img')
               .attr('src');

   var action = 'approve';

   var data = 'url=' + url + '&action=' + action;
   $.ajax({
      url: "setPhotoStatus.php",
      type: "POST",
      data: data,
      dataType: "text"
   })
   .done(function () {
      animateOnDecide(obj, action);
   });
}

function reject(obj)
{
   var url = $(obj)
               .closest(".heldImg-container")
               .find('img')
               .attr('src');

   var action = 'reject';

   var data = 'url=' + url + '&action=' + action;
   $.ajax({
      url: "setPhotoStatus.php",
      type: "POST",
      data: data,
      dataType: "text"
   })
   .done(function () {
      animateOnDecide(obj, action);
   });
}

function animateOnDecide (obj, action)
{
   obj = $(obj).closest(".heldImg-container");

   $(obj).find(".decideOverlay")
         .animate({ "opacity": 0 }, 200);

   $(obj).find("." + action + "Overlay")
         .animate({ "opacity": 1 }, 200);

   $(obj).find(".heldImgVeil")
         .removeClass("heldImgVeil")
         .addClass("heldImgVeilLocked");

   setTimeout(function ()
   {
      $(obj).fadeOut(200, function() { $(this).remove(); resetContHeight(); });

   }, 2000);
}

$(document).ready(function ()
{
   // Hover approve/reject overlay
   $(".heldImg-container").hover(function ()
   {
      $(this).find(".heldImgVeil")
             .stop()
             .animate({ "opacity": 0.8 }, 200);
      
      $(this).find(".decideOverlay")
             .stop()
             .animate({ "opacity": 1 }, 200);
   },
   function ()
   {
      $(this).find(".heldImgVeil")
             .stop()
             .animate({ "opacity": 0 }, 200);
      
      $(this).find(".decideOverlay")
             .stop()
             .animate({ "opacity": 0 }, 200);
   });

   // Hover effects on Approve/Reject halves
   $(".approveHeldImg").hover(function ()
   {
      $(this).animate({ "background": "rgb(100,100,100)" });
   },
   function ()
   {

   });


});