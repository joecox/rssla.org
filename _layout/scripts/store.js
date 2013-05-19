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
   $(".cart-min").click(function () {
      $(".cart").css("z-index", 10);
      $(".cart").animate({opacity: 1.0}, 200);
   });

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
      var price = parseFloat(price_s.replace('$', ''));

      // calculate frame dimensions
      if (merchObj.hasClass("left"))
         var frame_w = 810;
      else if (merchObj.hasClass("mid-left"))
         var frame_w = 570;
      else if (merchObj.hasClass("mid-right"))
         var frame_w = 330;
      else if (merchObj.hasClass("right"))
         var frame_w = 90;

      var rownum = parseInt(merchObj.parent().attr("rownum"));
      var frame_h = 170 + (rownum * 327);

      // create the item object
      var merch = {
         img_id: img_id,
         frame_h: frame_h,
         frame_w: frame_w,
         frame_top: 25,
         frame_right: 40,
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
           .css("right", merch.frame_right + "px")
           .css("height", merch.frame_h + "px")
           .css("width", merch.frame_w + "px");

      return frame;
   }

   function generateSprite(frame, merch)
   {
      frame.append('<img class="item-add-sprite">');
      sprite = $(".item-add-sprite");
      sprite.attr("src", "/resources/images/gear/merch_" + merch.img_id + "_sprite.png")
            .css("top", merch.frame_h)
            .css("right", merch.frame_w)
            .css("width", "40px");

      return sprite;
   }

   function animateSprite(sprite, frame, merch, callback)
   {
      sprite.fadeIn(200, function () {
         sprite.animate({top: -3, right: 30}, function () {
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
         updateTotal();
      }
      else
      {
         addCartItem(merch);
         updateTotal();
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
      var cur_price = parseFloat(cur_price_s.replace('$', ''));
      var new_price = cur_price + merch.price;
      var new_price_s = "$" + fixPrecision("" + new_price);
      itemObj.children(".prod-price").text(new_price_s);
   }

   function addCartItem(merch)
   {
      var items = $(".prod-name");
      var n = items.size();
      var newCartItem = '<div class="cart-item" id="' + n + '">' +
                           '<img class="prod-min v-align" src="/resources/images/gear/merch_' + merch.img_id + '_cart.png">' +
                           '<span class="prod-name v-align">' + merch.name + '</span>' +
                           '<input type="text" size="1" value="1" name="quantity" class="prod-quant" onchange="quantityChange(this)">' +
                           '<span class="prod-price v-align" meta="' + merch.price + '">$' + fixPrecision("" + merch.price) + '</span>' +
                        '</div>'
      $(".cart-item-wrap").append(newCartItem);
   }
});

function updateTotal()
{
   var prices = $(".prod-price");
   var new_total = 0;
   for (var ii = 0; ii < prices.size(); ii++)
   {
      var price_s = $(prices[ii]).text();
      var price = parseFloat(price_s.replace('$', ''));
      new_total += price;
   }
   var new_total_s = "$" + fixPrecision("" + new_total);

   $(".total-price").text(new_total_s);
}

// Item quantity change
function quantityChange (obj)
{
   var jobj = $(obj);
   var new_quantity = jobj.val();
   var base_price = parseFloat(jobj.siblings(".prod-price").attr("meta"));

   var new_total_price = new_quantity * base_price;

   var cur_quantity = parseFloat((jobj.siblings(".prod-price").text()).replace('$', '')) / base_price;

   jobj.siblings(".prod-price").text('$' + fixPrecision("" + new_total_price));

   updateTotal();

   var diff = new_quantity - cur_quantity;
   var cur_total_q = getCartMin();
   var diff_total_q = cur_total_q + diff;
   updateCartMin(diff_total_q);
}

function getCartMin()
{
   var text = $(".cart-min").text();
   var patt2 = new RegExp("[(].*[)]");
   var result = patt2.exec(text);
   var n = parseInt(result[0].replace(/[()]/g, ''));
   return n;
}

function updateCartMin(n)
{
   $(".cart-min").text("Your cart (" + n.toString() + ")");
}

function fixPrecision (price)
{
   var patt1 = /^[0-9]*\.[0-9]{2}$/;
   var patt2 = /^[0-9]*\.[0-9]{1}$/;
   var patt3 = /^[0-9]*$/;

   if(patt1.test(price) || patt3.test(price))
   {
      return price;
   }
   else if (patt2.test(price))
   {
      return (price + "0");
   }
}
