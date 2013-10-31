var orderData = {};

var total_price = 0;
var total_str = total_price.toFixed(2).toString();

$(document).ready(function ()
{
   getOrderData();
   createOrderRows();
   updateTotalCartPrice();
   createHandlers();
});

function getOrderData ()
{
   orderData = JSON.parse(sessionStorage.getItem("order-data"));
}

function createOrderRows ()
{
   for (var key in orderData)
   {
      var cartObj = orderData[key];
      addCartItemHTML(cartObj);
   }
}

function addCartItemHTML (cartObj)
{
   var newCartItem = '<div class="cart-item checkout" id="' + cartObj.id + '">' +
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

function updateTotalCartPrice ()
{
   total_price = 0;
   for (var key in orderData)
   {
      var inCartObj = orderData[key];
      total_price += inCartObj.price;
   }
   total_str = total_price.toFixed(2).toString();
   $(".total-price").text("$" + total_str);
}

function createHandlers ()
{
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

   $(".back-to-store").click(function ()
   {
      // Back to /store
      window.location = "/store";
   });

   $(".submit-order").click(function ()
   {
      $("form").append("<input type=\"hidden\" name=\"orderData\" value=\'" + JSON.stringify(orderData) + "\'/>");
      $("form").append("<input type=\"hidden\" name=\"total_price\" value=\"" + total_str + "\"/>");

      sessionStorage.removeItem("order-data");
      $("form").submit();
   });
}

function updateCartItemQuantity (index, quantity)
{
   var inCartObj = orderData[index.toString()];
   inCartObj.quantity = quantity;
}

function updateCartItemPrice (index)
{
   var inCartObj = orderData[index.toString()];
   inCartObj.price = inCartObj.item_price * inCartObj.quantity;
   inCartObj.price_str = inCartObj.price.toFixed(2).toString();

   var $cartItem = $(".cart-item#" + index);
   $cartItem.find(".prod-price").text("$" + inCartObj.price_str);
}

function removeCartItem (index)
{
   $(".cart-item#" + index).slideUp(200, function () { $(this).remove(); });
   delete orderData[index.toString()];
   updateTotalCartPrice();
   sessionStorage.setItem("order-data", JSON.stringify(inCartArr));
}