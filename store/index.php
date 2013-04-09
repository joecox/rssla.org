<!DOCTYPE html>
<html>
<head>
   <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/head.php"); ?>
   <link rel="stylesheet" type="text/css" href="/_layout/stylesheets/store_styles.css">
   <script type="text/javascript" src="/_layout/scripts/store.js"></script>
</head>
<body>
   <div id="wrapper">
      <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/header.php"); ?>
      <div class="main clearfix">
         <div class="wrap border-bottom shadow-bottom">
            <span class="pagetitle" style="font-size: 2.5rem">STORE</span>
            <span class="helptext v-align">Click a product image to see more information.</span>
            <span class="cart-min v-align">Your cart (0)</span>
            <div class="cart">
               <div style="display:none" class="emptycart v-align h-align">Your cart is empty</div>
               <div class="cart-head">
                  <span class="v-align" style="right:70px">Quantity</span>
                  <span class="v-align" style="right: 10px">Price</span>
               </div>
               <div class="cart-item">
                  <img class="prod-min v-align" src="">
                  <span class="prod-name v-align">PEE Shirt</span>
                  <input type="text" size="1" value="1" name="quantity" class="prod-quant">
                  <span class="prod-price v-align">$10</span>
               </div>
               <div class="total-bar">
                  <span class="v-align" style="right:80px;">Total:</span>
                  <span class="v-align prod-price">$10</span>
               </div>
               <div style="height:50px;">
                  <span class="button v-align h-align">Go to checkout</span>
               </div>
            </div>
         </div>
         <div class="pagewrap">
            <div class="merchwrap">
               <div class="merchrow">
                  <div class="merch left tee">
                     <div class="productwrap">
                        <img class="product" src="/resources/images/gear/PEE_front.jpg">
                     </div>
                     <div class="infowrap">
                        <div style="margin-bottom:8px">
                           <span class="productname">PEE Shirt</span>
                           <select style="float:right">
                              <option value="S">Small</option>
                              <option value="M">Medium</option>
                              <option value="L">Large</option>
                              <option value="XL">XLarge</option>
                           </select>
                        </div>
                        <div>
                           <span class="productprice">$10</span>
                           <span class="button small add-to-cart">Add to cart</span>
                        </div>
                     </div>
                  </div>
                  <div class="merch mid-left tee">
                     <img class="product" src="/resources/images/gear/PEE_front.jpg">
                  </div>
                  <div class="merch mid-right tee">
                     <div class="productwrap">
                        <img class="product" src="/resources/images/gear/PEE_front.jpg">
                        <div class="merchprice">$10</div>
                     </div>
                  </div>
                  <div class="merch right tee">
                     <div class="productwrap">
                        <img class="product" src="/resources/images/gear/PEE_front.jpg">
                        <div class="merchprice">$5</div>
                     </div>
                  </div>
               </div>
               <div class="merchrow">
                  <div class="merch left other">
                     <div class="productwrap">
                        <img class="product" src="/resources/images/gear/tee_Nerd_bk.jpg">
                        <div class="merchprice">$2.50</div>
                     </div>
                  </div>
                  <div class="merch mid-left tee">
                     <div class="productwrap">
                        <img class="product" src="/resources/images/gear/tee_Nerd_bk.jpg">
                        <div class="merchprice">$10</div>
                     </div>
                  </div>
                  <div class="merch mid-right tee">
                     <div class="productwrap">
                        <img class="product" src="/resources/images/gear/PEE_front.jpg">
                        <div class="merchprice">$10</div>
                     </div>
                  </div>
                  <div class="merch right tee">
                     <div class="productwrap">
                        <img class="product" src="/resources/images/gear/tee_Nerd_bk.jpg">
                        <div class="merchprice">$10</div>
                     </div>
                  </div>
               </div>
               <div class="merchrow">
                  <div class="merch left tee">
                     <div class="productwrap">
                        <img class="product" src="/resources/images/gear/tee_Nerd_bk.jpg">
                        <div class="merchprice">$5</div>
                     </div>
                  </div>
                  <div class="merch mid-left other">
                     <div class="productwrap">
                        <img class="product" src="/resources/images/gear/tee_Nerd_bk.jpg">
                        <div class="merchprice">$3.50</div>
                     </div>
                  </div>
                  <div class="merch mid-right tee">
                     <div class="productwrap">
                        <img class="product" src="/resources/images/gear/PEE_front.jpg">
                        <div class="merchprice">$1.50</div>
                     </div>
                  </div>
                  <div class="merch right tee">
                     <div class="productwrap">
                        <img class="product" src="/resources/images/gear/tee_Nerd_bk.jpg">
                        <div class="merchprice">$10</div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="veil"></div>
         <div class="overlay">
            <div class="overlaywrap">
               <img>
            </div>
         </div>
      </div>
      <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/footer.php"); ?>
   </div>
</body>
</html>