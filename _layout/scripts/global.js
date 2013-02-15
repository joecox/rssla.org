function fadeIn(obj) {
   $(obj).fadeIn(1200);
}

$(document).ready(function () {
   var maxHeight = Math.max.apply(null, $(".cont").map(function ()
   {
      return $(this).height();
   }).get());
   
   $(".cont").css("min-height", maxHeight);
});