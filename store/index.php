<!DOCTYPE html>
<html>
<head>
   <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/head.php"); ?>
   <link rel="stylesheet" type="text/css" href="store.css">
</head>
<body>
   <?php

      /* Retrieve Store data from DB */

      include ($_SERVER['DOCUMENT_ROOT'].'/_modules/globals.php');
      include ($DB_MODULE);

      db_connect();

      $results = db_select_all('merchandise');

      $merchObjs = array();

      for ($ii = 0; $ii < sizeof($results); $ii++)
      {
         $row = $results[$ii];
         $merchObj = array(
            'name' => $row['name'],
            'price' => $row['price'],
            'img_id' => $row['img_id'],
            'sizes' => $row['size'],
            'sizes_full' => $row['size_s']
         );

         array_push($merchObjs, $merchObj);
      }

   ?>

   <script type="text/javascript">
      var merchJSON = <?php echo json_encode($merchObjs); ?>;
   </script>

   <div id="wrapper">
      <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/header.php"); ?>
      <div class="main clearfix" style="position: relative">
         <div class="wrap border-bottom shadow-bottom">
            <span class="pagetitle" style="font-size: 2.5rem">STORE</span>
            <span class="cart-min v-align">Your cart (0)</span>
            <div class="cart">
               <div class="emptycart v-align h-align">Your cart is empty</div>
               <div class="cart-head">
                  <span class="v-align" style="right:90px">Quantity</span>
                  <span class="v-align" style="right:10px">Price</span>
               </div>
               <div class="cart-item-wrap">
               </div>
               <div class="total-bar">
                  <span class="v-align" style="right:90px;">Total:</span>
                  <span class="v-align total-price">$0.00</span>
               </div>
               <div class="checkoutrow">
                  <span class="v-align h-align">
                     <span class="button" onclick="goToCheckout()">Checkout</span>
                  </span>
               </div>
            </div>
         </div>
         <div class="pagewrap">
            <div class="merchwrap">
               <?php /* Content inserted here by JS */ ?>
            </div>
         </div>
         <div class="wrap border-top shadow-top" style="text-align:center">
            <span>Questions? &nbsp;Ideas for new merchandise? &nbsp;Send a message to <?php echo $publFL; ?> at <a class="norm" href="mailto:publicity@rssla.org">publicity@rssla.org</a>.</span>
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

   <script type="text/javascript" src="store_MerchObject.js"></script>
   <script type="text/javascript" src="store_CartObject.js"></script>
   <script type="text/javascript" src="store_Utils.js"></script>
   <script type="text/javascript" src="store.js"></script>

</body>
</html>