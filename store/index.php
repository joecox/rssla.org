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
      <div class="main clearfix" style="position: relative">
         <div class="wrap border-bottom shadow-bottom">
            <span class="pagetitle" style="font-size: 2.5rem">STORE</span>
            <span class="helptext v-align">Click a product image to see more information.</span>
            <span class="cart-min v-align">Your cart (0)</span>
            <div class="cart">
               <div class="emptycart v-align h-align">Your cart is empty</div>
               <div class="cart-head">
                  <span class="v-align" style="right:70px">Quantity</span>
                  <span class="v-align" style="right:10px">Price</span>
               </div>
               <div class="cart-item-wrap">
               </div>
               <div class="total-bar">
                  <span class="v-align" style="right:80px;">Total:</span>
                  <span class="v-align total-price">$0.00</span>
               </div>
               <div class="checkout">
                  <span class="button v-align h-align">Go to checkout</span>
               </div>
            </div>
         </div>
         <div class="pagewrap">
            <div class="merchwrap">
               <div class="merchrow">
                  <div class="merch left">
                     <div class="productwrap">
                        <img class="product" src="/resources/images/gear/PEE_front.jpg">
                        <div class="merchprice">$15</div>
                     </div>
                     <div class="infowrap">
                        <div style="margin-bottom:8px">
                           <span class="productname">PEE Shirt</span>
                        </div>
                        <div>
                           <select style="float:left">
                              <option value="S">Small</option>
                              <option value="M">Medium</option>
                              <option value="L">Large</option>
                              <option value="XL">XLarge</option>
                           </select>
                           <span class="button small add-to-cart">Add to cart</span>
                        </div>
                     </div>
                  </div>
                  <div class="merch mid-left">
                     <img class="product" src="/resources/images/gear/PEE_front.jpg">
                  </div>
                  <div class="merch mid-right">
                     <div class="productwrap">
                        <img class="product" src="/resources/images/gear/PEE_front.jpg">
                        <div class="merchprice">$10</div>
                     </div>
                     <div class="infowrap">
                        <div style="margin-bottom:8px">
                           <span class="productname">Shirt 2</span>
                           <select style="float:right">
                              <option value="S">Small</option>
                              <option value="M">Medium</option>
                              <option value="L">Large</option>
                              <option value="XL">XLarge</option>
                           </select>
                        </div>
                        <div>
                           <span class="button small add-to-cart">Add to cart</span>
                        </div>
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