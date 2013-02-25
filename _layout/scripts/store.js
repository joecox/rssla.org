$(document).ready(function () {
   $(".merch").click(function() {
      $(".veil").fadeIn();
      $(".overlay").fadeIn();
      $("body").addClass("dialog-open");
   });

   $(".veil").click(function() {
      $(".overlay").fadeOut();
      $(this).fadeOut();
      $("body").removeClass("dialog-open");
   });

   $(".merch").hover(function() {
      $(this).children(".merchtext").fadeIn(200);
   }, function() {
      $(this).children(".merchtext").fadeOut(200);
   });
});