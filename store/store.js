var merchObjArr = new Array();
var inCartArr = {};
var cart_size = 0;
var inCartKeys = new Array();
var total_quantity = 0;
var total_price = 0;
var total_str = total_price.toFixed(2).toString();

var frame_top = 22.5;
var frame_right = 70;

var cart_id_count = 0;

$(document).ready(function ()
{
   createMerchObjects();
   renderMerchDOM();

   createHandlers();

   reloadCart();
});

function createMerchObjects ()
{
   for (var ii = 0; ii < merchJSON.length; ii++)
   {
      var obj = merchJSON[ii];
      var merchObj = new MerchObject();

      merchObj.id = ii;
      merchObj.name = obj['name'];
      merchObj.img_id = obj['img_id'];

      merchObj.row = Math.floor(ii / 4);
      merchObj.column = ii % 4;
      var merchClasses = new Array(
         "left",
         "mid-left",
         "mid-right",
         "right"
      );
      merchObj.column_class = merchClasses[merchObj.column];

      merchObj.frame_h = 207.5 + (merchObj.row * 325);
      merchObj.frame_w = 100 + ((3 - merchObj.column) * 240);
      merchObj.top = merchObj.frame_h - 40;
      merchObj.right = merchObj.frame_w - 40;

      merchObj.price = parseFloat(obj['price']);
      merchObj.price_str = merchObj.price % 1 === 0 ? merchObj.price.toString()
                                                    : merchObj.price.toFixed(2).toString();

      if (obj['sizes'] != null)
      {
         merchObj.sizes = obj['sizes'].split(",");
         merchObj.selected_size = merchObj.sizes[0];
      }
         
      if (obj['sizes_full'] != null)
      {
         merchObj.sizes_full = obj['sizes_full'].split(",");
         merchObj.selected_size_full = merchObj.sizes_full[0];
      }

      merchObjArr.push(merchObj);
   }
}

function renderMerchDOM ()
{
   var merchRow = "<div class=\"merchrow\" rownum=\"0\"></div>";

   for (var ii = 0; ii < merchObjArr.length; ii++)
   {
      var merchObj = merchObjArr[ii];

      if (merchObj.column == 0)
      {
         merchRow = "<div class=\"merchrow\" rownum=\"" + merchObj.row + "\"></div>";
         $(".merchwrap").append(merchRow);
      }

      var merchHTML = "<div class=\"merch " + merchObj.column_class + "\" id=\"" + merchObj.id + "\">";
      merchHTML += "<div class=\"productwrap\">";
      merchHTML += "<img class=\"product\" id=\"" + merchObj.img_id + "\" src=\"/resources/images/gear/merch_" + merchObj.img_id + "_large.png\">";
      merchHTML += "<div class=\"merchprice\" meta=\"" + merchObj.price + "\">$" + merchObj.price_str + "</div>";
      merchHTML += "</div>";
      merchHTML += "<div class=\"infowrap\">";
      merchHTML += "<div style=\"margin-bottom: 8px;\">";
      merchHTML += "<span class=\"productname\">" + merchObj.name + "</span>";
      merchHTML += "</div>";
      merchHTML += "<div>";
      if (merchObj.sizes.length > 0)
      {
         merchHTML += "<select class=\"size-select\" style=\"float: left;\">";
         for (var jj = 0; jj < merchObj.sizes.length; jj++)
         {
            var size = merchObj.sizes[jj];
            var size_full = merchObj.sizes_full[jj];
            merchHTML += "<option value=\"" + size + "\">" + size_full + "</option>";
         }
         merchHTML += "</select>";
      }
      merchHTML += "<span class=\"button small add-to-cart\">Add to cart</span>";
      merchHTML += "</div>";
      merchHTML += "</div>";
      merchHTML += "</div>";

      $(".merchrow[rownum=" + merchObj.row + "]").append(merchHTML);
   }
}

function createHandlers ()
{
   // Cart UI
   $(".cart-min").click(function ()
   {
      $(".cart").css("z-index", 10);
      $(".cart").animate({opacity: 1.0}, 200);
   });

   $(".cart").hover(function () {}, function ()
   {
      $(this).animate({opacity: 0}, 200, function ()
      {
         $(this).css("z-index", -99);
      });
   });

   // Item add
   $(".add-to-cart").click(function ()
   {
      addToCart(this);
   });

   // Size selection change in object
   $(".size-select").change(function ()
   {
      changeSelectedSize(this);
   });

   // Total updating in cart
   $(".cart-item-wrap").on("change", ".prod-quant", function ()
   {
      var index = $(this).closest(".cart-item")
                         .attr("id");
      index = parseInt(index);
      var quantity = $(this).val();
      quantity = parseInt(quantity);
      if (quantity == 0)
      {
         removeCartItem(index);
      }
      else
      {
         updateCartItemQuantity(index, quantity);
         updateCartItemPrice(index);
         updateTotalCartPrice();
         updateTotalCartQuantity();
         sessionStorage.setItem("order-data", JSON.stringify(inCartArr));
      }
   });

   $(".cart-item-wrap").on("click", ".remove-link", function ()
   {
      var index = $(this).closest(".cart-item")
                         .attr("id");
      index = parseInt(index);
      removeCartItem(index);
   });
}

function addToCart (obj)
{
   var $merchHTML = $(obj).closest(".merch");
   var merchObj = merchObjArr[parseInt($merchHTML[0].id)];

   // generate the frame
   var frame = generateFrame(merchObj);
   // generate the sprite
   var sprite = generateSprite(frame, merchObj);
   // animate the sprite and destroy the sprite/frame
   animateSprite(sprite, frame, merchObj, $merchHTML, destroyAnimation);

   // add the item to the cart
   addCartData(merchObj);
   updateTotalCartQuantity();
   updateTotalCartPrice();

   showCartStructure();
}

function generateFrame (merch) 
{
   $(".main").append('<div class="item-add-frame"></div>');
   var frame = $(".item-add-frame");
   frame.css("top", frame_top + "px")
        .css("right", frame_right + "px")
        .css("height", merch.frame_h + "px")
        .css("width", merch.frame_w + "px");

   return frame;
}

function generateSprite (frame, merch)
{
   frame.append('<img class="item-add-sprite">');
   sprite = $(".item-add-sprite");
   sprite.attr("src", "/resources/images/gear/merch_" + merch.img_id + "_large.png")
         .css("top", merch.top)
         .css("right", merch.right)
         .css("width", "40px")
         .css("border-radius", "20px");

   return sprite;
}

function animateSprite (sprite, frame, merch, $merchHTML, callback)
{
   $(".product").each(function ()
   {
      if ($(this).width() != 220)
      {
         $(this).remove();
      }
   });

   var cardObj = $merchHTML.find(".product");
   var cardParent = cardObj.parent();

   var cardClone = cardObj.clone();
   cardClone.css("opacity", 0)
            .css("z-index", -1);

   cardParent.prepend(cardClone);

   cardObj.animate({ width: "40px" }, { queue: false, duration: 300 })
          .animate({ height: "40px" }, { queue: false, duration: 300 })
          .animate({ "border-radius": "110px" }, { queue: false, duration: 150 })
          .animate({ top: "90px" }, { queue: false, duration: 300 })
          .animate({ left: "90px" }, { queue: false, duration: 300, complete: 
      function()
      {
         sprite.show();
         cardObj.remove();
         sprite.animate({top: 0, right: 0}, function ()
         {
            sprite.fadeOut(200, callback(sprite, frame));
         });

         setTimeout(function()
         {
            cardClone.animate({ "opacity": 1 },
               function()
               {
                  cardClone.attr("class", "product");
                  cardClone.css("opacity", "");
               }
            );
         }, 100);
      }
   });
}

function destroyAnimation (sprite, frame)
{
   setTimeout(function () 
   {
      sprite.remove();
      frame.remove();
   }, 200);
}

function addCartData (merchObj)
{  
   var index = getInCartIndex(merchObj);
   if (index >= 0)
   {
      incrementCartItemQuantity(index);
      updateCartItemPrice(index);
   }
   else
   {
      var cartObj = addCartItemData(merchObj);
      addCartItemHTML(cartObj);
      cart_id_count++;
      cart_size++;
   }
   sessionStorage.setItem("order-data", JSON.stringify(inCartArr));
}

function removeCartItem (index)
{
   $(".cart-item#" + index).slideUp(200, function () { $(this).remove(); });
   delete inCartArr[index.toString()];

   updateTotalCartQuantity();
   updateTotalCartPrice();

   sessionStorage.setItem("order-data", JSON.stringify(inCartArr));

   cart_size--;
   if (cart_size == 0) resetCart();
}

function resetCart()
{
   $(".emptycart").animate({opacity: 1});
   $(".cart-head").animate({opacity: 0});
   $(".cart-item-wrap").animate({opacity: 0});
   $(".total-bar").animate({opacity: 0});
   $(".checkoutrow").animate({opacity: 0});

   $(".cart-min").text("Your cart (0)");

   sessionStorage.removeItem("order-data");
}

function reloadCart ()
{
   if (sessionStorage.getItem("order-data"))
   {
      inCartArr = JSON.parse(sessionStorage.getItem("order-data"));
      for (var key in inCartArr)
      {
         var cartObj = inCartArr[key];
         addCartItemHTML(cartObj);
         updateTotalCartQuantity();
         updateTotalCartPrice();
      }
      showCartStructure();
   }
}

function goToCheckout ()
{
   sessionStorage.setItem("order-data", JSON.stringify(inCartArr));
   window.location = "checkout.php";
}
