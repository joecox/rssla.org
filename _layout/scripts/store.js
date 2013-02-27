$(document).ready(function () {
   $(".productwrap").click(function() {
      $("body").addClass("dialog-open");
      $(".veil").fadeIn();

      var source = $(this).children("img").attr("src");
      $(".overlaywrap").children("img").attr("src", source);
      
      $(".overlay").fadeIn();
   });

   $(".veil").click(function() {
      $(".overlay").fadeOut();
      $(this).fadeOut();
      $("body").removeClass("dialog-open");
   });

   $(".productwrap").hover(function() {
      $(this).children(".merchtext").fadeIn(200);
   }, function() {
      $(this).children(".merchtext").fadeOut(200);
   });

   // temp
   $(".productwrap").children(".product").attr("src", "/resources/images/gear/merch_placeholder.png");
});