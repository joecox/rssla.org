<?php
   /**
     * TODO: Send $itemArray through POST to processing script
     * Mesh JS code with merch row prices & PHP
     * Back link to Store
     */ 
?>

<!DOCTYPE html>
<html>
<head>
   <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/head.php"); ?>
   <link rel="stylesheet" type="text/css" href="store.css">
   <script type="text/javascript" src="checkout.js"></script>
</head>
<body>
   <div id="wrapper">
      <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/header.php"); ?>
      <div class="main clearfix">
         <div class="bannerwrap">
            <img class="photobanner" src="">
            <div class="bannertext"></div>
         </div>
         <div class="wrap border-bottom shadow-bottom">
            <span class="pagetitle">STORE: 
               <span class="pagetitle little">CHECKOUT</span>
            </span>
         </div>
         <div class="wrap-center" style="min-height: 200px; position: relative;">
            <div class="cont half left" style="float: left;">
               <div class="contentblock">
                  <h1>Your Items</h1>
                  <div class="cart-head checkout">
                     <span class="v-align" style="right:70px">Quantity</span>
                     <span class="v-align" style="right:10px">Price</span>
                  </div>
                  <div class="cart-item-wrap">
                     <?php
                        $itemArray = array();
                        for ($ii = 0; $ii < sizeof($_POST) / 6; $ii++)
                        {
                           $item = array();
                           $item['img-id'] = $_POST['img-id' . $ii];
                           $item['name'] = $_POST['item-name' . $ii];
                           $item['quantity'] = $_POST['item-quant' . $ii];
                           $item['price'] = $_POST['item-price' . $ii];
                           $item['size'] = $_POST['item-size' . $ii];

                           array_push($itemArray, $item);

                           echo '<div class="cart-item checkout" id="' . $ii . '">';
                           echo '<img class="prod-min v-align" src="/resources/images/gear/merch_' .$item['img-id']. '_large.png">';
                           echo '<span class="prod-name checkout">' .$item['name']. '</span>';
                           echo '<input type="text" size="1" value="' .$item['quantity']. '" name="quantity" class="prod-quant checkout">';
                           echo '<span class="prod-price v-align checkout" meta="' .$item['price']. '">$' .$item['price']. '</span>';
                           if ($item['size'] != "null")
                              echo '<span class="prod-size">' .$item['size']. '</span>';
                           echo '</div>';
                        }

                     ?>
                  </div>
                  <div class="total-bar checkout">
                     <span class="v-align" style="right:80px;">Total:</span>
                     <span class="v-align total-price">$0.00</span>
                  </div>
               </div>
               <div class="contentblock">
                  <span class="button back-to-store">Back to Store</span>
               </div>
            </div>
            <div class="cont half" style="float: right;">
               <div class="contentblock">
                  <h1>Your Information</h1>
               </div>
               <div class="contentblock" style="margin-left: 0; margin-right: 0;">
                  <form method="POST" action="submitOrder.php">
                     <div class="inputwrap">
                        <label for="name">Name:</label>
                        <input type="text" name="name" size="40"/>
                     </div>
                     <div class="inputwrap">
                        <label for="year">Year:</label>
                        <select type="text" name="year">
                           <option value="1st">Freshman</option>
                           <option value="2nd">Sophomore</option>
                           <option value="3rd">Junior</option>
                           <option value="4th">Senior</option>
                           <option value="5th">5th year</option>
                           <option value="Alumnus">Alumnus</option>
                        </select>
                     </div>
                     <div class="inputwrap">
                        <label for="email">Email:</label>
                        <input type="text" name="email" size="40"/>
                     </div>
                  </form>
               </div>
               <div class="contentblock">
                  <p>Shortly after you submit your order, you will receive an email from the Publicity Director, <?php echo $publFL; ?> regarding how to pick up and pay for your order.</p>
                  <p>The methods of payment currently available are cash and credit card via our Square card reader.</p>
                  <span class="button submit-order">Submit Order</span>
               </div>
            </div>
         </div>
         <div class="wrap border-top shadow-top" style="text-align:center; clear: both;">
            <span>Questions? &nbsp;Ideas for new merchandise? &nbsp;Send a message to <?php echo $publFL; ?> at <a class="norm" href="mailto:publicity@rssla.org">publicity@rssla.org</a>.</span>
         </div>
      </div>
      <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/footer.php"); ?>
   </div>
</body>
</html>