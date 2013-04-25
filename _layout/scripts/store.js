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
   $(".product").attr("src", "/resources/images/gear/merch_placeholder_large.png");

   // Cart UI
   $(".cart-min").hover(function () {
      $(".cart").css("z-index", 10);
      $(".cart").animate({opacity: 1.0}, 200);
   }, function () {});

   $(".cart").hover(function () {}, function () {
      $(this).animate({opacity: 0}, 200, function () {
         $(this).css("z-index", -99);
      });
   });
   
   // Item add animation
   $(".add-to-cart").click(function () {
      // get the img_id
      var merchObj = $(this).parent().parent().parent();
      var img_src = merchObj.children(".productwrap")
                            .children("img.product")
                            .attr("src");
      var pattern = new RegExp("_.*_");
      var result = pattern.exec(img_src);
      var img_id = result[0].replace(/_/g, '');

      // calculate frame dimensions


      // create the item object
      var merch = {
         img_id: img_id,
         frame_h: 200,
         frame_w: 830,
         frame_top: 25,
         frame_left: 60,
         price: 10,
         size: 'M',
         name: 'PEE Shirt'
      }

      // generate the frame
      var frame = generateFrame(merch);
      // generate the sprite
      var sprite = generateSprite(frame, merch);
      // animate the sprite and destroy the sprite/frame
      animateSprite(sprite, frame, merch, destroyAnim);

      // add the item to the cart
      addToCart(merch);
   });

   function generateFrame(merch) 
   {
      $(".main").append('<div class="item-add-frame"></div>');
      var frame = $(".item-add-frame");
      frame.css("top", merch.frame_top + "px")
           .css("left", merch.frame_left + "px")
           .css("height", merch.frame_h + "px")
           .css("width", merch.frame_w + "px");

      return frame;
   }

   function generateSprite(frame, merch)
   {
      frame.append('<img class="item-add-sprite">');
      sprite = $(".item-add-sprite");
      sprite.attr("src", "/resources/images/gear/merch_" + merch.img_id + "_sprite")
            .css("top", "160px")
            .css("right", "790px")
            .css("width", "40px");

      return sprite;
   }

   function animateSprite(sprite, frame, merch, callback)
   {
      sprite.fadeIn(200, function () {
         sprite.animate({top: 0, right: 0}, function () {
            sprite.fadeOut(200, callback(sprite, frame));
         });
      });
   }

   function destroyAnim(sprite, frame)
   {
      setTimeout(function () 
      {
         sprite.remove();
         frame.remove();
      }, 200);
      
   }

   function incrementCart ()
   {
      var text = $(".cart-min").text();
      var patt2 = new RegExp("[(].*[)]");
      var result = patt2.exec(text);
      var n = parseInt(result[0].replace(/[()]/g, ''));

      $(".cart-min").text("Your cart (" + (++n).toString() + ")");
   }

   function addToCart (merch)
   {
      // increment the cart counter
      incrementCart();
      // set total price
      
   }
});
