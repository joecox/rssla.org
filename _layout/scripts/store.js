$(document).ready(function () {
   $(".product").click(function() {
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
   $(".product").attr("src", "/resources/images/gear/merch_placeholder.png");

   // Cart UI
   $(".cart-min").hover(function () {
      $(".cart").css("z-index", 10);
      $(".cart").animate({opacity: 1.0}, 200);
   }, function () {});

   $(".cart").hover(function () {}, function () {
      $(this).animate({opacity: 0}, 200, function () {
         $(this).css("z-index", -99);
      });
   })
});