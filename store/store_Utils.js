function changeSelectedSize (selectObj)
{
   var $merchHTML = $(selectObj).closest(".merch");
   var merchObj = merchObjArr[parseInt($merchHTML[0].id)];

   merchObj.selected_size = $(selectObj).val();
   merchObj.selected_size_full = $(selectObj).find("option:selected").text();
}

function updateTotalCartQuantity ()
{
   total_quantity = 0;
   for (var key in inCartArr)
   {
      var inCartObj = inCartArr[key];
      total_quantity += inCartObj.quantity;
   }
   $(".cart-min").text("Your cart (" + total_quantity.toString() + ")");
}

function updateTotalCartPrice ()
{
   total_price = 0;
   for (var key in inCartArr)
   {
      var inCartObj = inCartArr[key];
      total_price += inCartObj.price;
   }
   total_str = total_price.toFixed(2).toString();
   $(".total-price").text("$" + total_str);
}

function merchInCart (merchObj)
{
   for (var key in inCartArr)
   {
      var inCartObj = inCartArr[key];
      if (inCartObj.merch_id == merchObj.id &&
          inCartObj.merch_size == merchObj.selected_size)
      {
         return true;
      }
   }
   return false;
}

function getInCartIndex (merchObj)
{
   for (var key in inCartArr)
   {
      var inCartObj = inCartArr[key];

      if (inCartObj.merch_id == merchObj.id &&
          inCartObj.merch_size == merchObj.selected_size)
      {
         return inCartObj.id;
      }
   }
   return -1;
}

function incrementCartItemQuantity (index)
{
   var inCartObj = inCartArr[index.toString()];
   inCartObj.quantity++;

   var $cartItem = $(".cart-item#" + index);
   $cartItem.find(".prod-quant").val(inCartObj.quantity);
}

function updateCartItemQuantity (index, quantity)
{
   var inCartObj = inCartArr[index.toString()];
   inCartObj.quantity = quantity;
}

function updateCartItemPrice (index)
{
   var inCartObj = inCartArr[index.toString()];
   inCartObj.price = inCartObj.item_price * inCartObj.quantity;
   inCartObj.price_str = inCartObj.price.toFixed(2).toString();

   var $cartItem = $(".cart-item#" + index);
   $cartItem.find(".prod-price").text("$" + inCartObj.price_str);
}

function addCartItemHTML (cartObj)
{
   var newCartItem = '<div class="cart-item" id="' + cartObj.id + '">' +
                        '<img class="prod-min v-align" src="/resources/images/gear/merch_' + cartObj.img_id + '_large.png">' +
                        '<span class="prod-name v-align">' + cartObj.name + '</span>' +
                        '<input type="text" size="1" value="' + cartObj.quantity + '" name="quantity" class="prod-quant">' +
                        '<span class="prod-price v-align" meta="' + cartObj.price + '">$' + cartObj.price_str + '</span>' +
                        '<span class="remove-link">Remove</span>';
   if (cartObj.merch_size != undefined)
      newCartItem += '<span class="prod-size">' + cartObj.merch_size_full + '</span>';
   newCartItem += '</div>';
   $(".cart-item-wrap").append(newCartItem);
}

function addCartItemData (merchObj)
{
   var cartObj = new CartObject();
   cartObj.id = cart_id_count;
   cartObj.merch_id = merchObj.id;
   cartObj.name = merchObj.name;
   cartObj.img_id = merchObj.img_id;
   cartObj.quantity = 1;
   cartObj.item_price = merchObj.price;
   cartObj.item_price_str = cartObj.item_price.toFixed(2).toString();
   cartObj.price = cartObj.item_price;
   cartObj.price_str = cartObj.price.toFixed(2).toString();
   cartObj.merch_size = merchObj.selected_size;
   cartObj.merch_size_full = merchObj.selected_size_full;

   inCartArr[cartObj.id.toString()] = cartObj;

   return cartObj;
}

function showCartStructure ()
{
   $(".emptycart").css("opacity", 0);
   $(".cart-head").css("opacity", 1);
   $(".cart-item-wrap").css("opacity", 1);
   $(".total-bar").css("opacity", 1);
   $(".checkoutrow").css("opacity", 1);
}