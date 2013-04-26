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
   
   // Item add
   $(".add-to-cart").click(function () {
      // get the img_id
      var merchObj = $(this).parent().parent().parent();
      var img_src = merchObj.children(".productwrap")
                            .children("img.product")
                            .attr("src");
      var pattern = new RegExp("_.*_");
      var result = pattern.exec(img_src);
      var img_id = result[0].replace(/_/g, '');

      // get the merch info
      var name = merchObj.children(".infowrap")
                         .children("div:first-child")
                         .children(".productname")
                         .text();
      var size = merchObj.children(".infowrap")
                         .children("div:first-child")
                         .children("select")
                         .val();
      var price_s = merchObj.children(".productwrap")
                            .children(".merchprice")
                            .text();
      var price = parseInt(price_s.replace('$', ''));

      // calculate frame dimensions


      // create the item object
      var merch = {
         img_id: img_id,
         frame_h: 200,
         frame_w: 830,
         frame_top: 25,
         frame_left: 60,
         price: price,
         size: size,
         name: name
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
      sprite.attr("src", "/resources/images/gear/merch_" + merch.img_id + "_sprite.png")
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

   function incrementCartMin ()
   {
      var text = $(".cart-min").text();
      var patt2 = new RegExp("[(].*[)]");
      var result = patt2.exec(text);
      var n = parseInt(result[0].replace(/[()]/g, ''));

      $(".cart-min").text("Your cart (" + (++n).toString() + ")");
   }

   function addToCart(merch)
   {
      // Show cart structure
      $(".emptycart").css("opacity", 0);
      $(".cart-head").css("opacity", 1);
      $(".cart-item-wrap").css("opacity", 1);
      $(".total-bar").css("opacity", 1);
      $(".checkout").css("opacity", 1);

      // increment the cart counter
      incrementCartMin();

      // determine if merch is already in cart
      var cart_merchObj = merchInCart(merch);
      if(cart_merchObj.inCart)
      {
         incrementCartItem(merch, cart_merchObj.item);
         updateTotal(merch);
      }
      else
      {
         addCartItem(merch);
         updateTotal(merch);
      }
      // set total price
   }

   function merchInCart(merch)
   {
      var names = $(".prod-name");
      for (ii = 0; ii < names.size(); ii++)
      {
         if (names[ii].textContent == merch.name)
         {
            var obj = {
               inCart: true,
               item: names[ii].parentElement.id
            }
            return obj;
         }
      }
      var obj = {
         inCart: false,
      }
      return obj;
   }

   function incrementCartItem(merch, cartItem)
   {
      // increment quantity
      var itemObj = $(".cart-item#" + cartItem);
      var n = itemObj.children("input")
                     .val();
      itemObj.children("input")
             .val((++n).toString());

      // update price
      var cur_price_s = itemObj.children(".prod-price").text();
      var cur_price = parseInt(cur_price_s.replace('$', ''));
      var new_price = cur_price + merch.price;
      var new_price_s = "$" + new_price;
      itemObj.children(".prod-price").text(new_price_s);
   }

   function addCartItem(merch)
   {
      var items = $(".prod-name");
      var n = items.size();
      var newCartItem = '<div class="cart-item" id="' + n + '">' +
                           '<img class="prod-min v-align" src="/resources/images/gear/merch_' + merch.img_id + '_cart.png">' +
                           '<span class="prod-name v-align">' + merch.name + '</span>' +
                           '<input type="text" size="1" value="1" name="quantity" class="prod-quant" onchange="quantityChange()">' +
                           '<span class="prod-price v-align" meta="' + merch.price + '">$' + merch.price + '</span>' +
                        '</div>'
      $(".cart-item-wrap").append(newCartItem);
   }

   function updateTotal(merch)
   {
      var cur_total_s = $(".total-price").text();
      var cur_total = parseInt(cur_total_s.replace('$', ''));
      var new_total = cur_total + merch.price;
      var new_total_s = "$" + new_total;

      $(".total-price").text(new_total_s);
   }

   // Item quantity change
   function quantityChange ()
   {
      var new_quantity = $(this).val();
      var base_price = parseInt($(this).sibling(".prod-price").attr("meta"));

      var new_total_price = new_quantity * base_price;

      $(this).sibling(".prod-price").text('$' + new_total_price);
   }
});
