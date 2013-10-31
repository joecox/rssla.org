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
         <div class="wrap-center" style="height: 200px; position: relative;">
            <div class="cont solo" style="width: 400px;">
               <div class="contentblock" style="text-align: center; margin-top: 80px">
                  <div><b>Thank you for your order.</b></div>
                  <div>An email with the details of your order has been sent to the Publicity Director, <?php echo $publFL; ?>.</div>
                  <div style="margin: 10px 0">You will receive an email with details on how to pick up and pay for your order within a few days.</div>
                  <div style="margin-top: 20px">
                     <span class="button back-to-store">Back to Store</span>
                  </div>
               </div>
            </div>
         </div>
         <div class="wrap border-top shadow-top" style="text-align:center; clear: both;">
            <span>Questions? &nbsp;Ideas for new merchandise? &nbsp;Send a message to <?php echo $publFL; ?> at <a class="norm" href="mailto:publicity@rssla.org">publicity@rssla.org</a>.</span>
         </div>
      </div>
      <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/footer.php"); ?>
   </div>

   <script>
      $(".back-to-store").click(function () { window.location = "/store"; });
   </script>

   <?php
      $to = "publicity@rssla.org";
      $subject = "Merchandise Order on RSSLA.org";

      $message = "A merchandise order has been submitted on RSSLA.org.  Below are the details.";
      $message .= "<br/><br/>";
      $message .= "<pre style=\"font-size: 1.2rem;\">";
      $message .= "Name: " . $_POST['name'] . "<br/>";
      $message .= "Year: " . $_POST['year'] . "<br/>";
      $message .= "Email: " . $_POST['email'] . "<br/>" . "<br/>";

      $orderData = json_decode($_POST['orderData'], true);
      for ($ii = 0; $ii < sizeof($orderData); $ii++)
      {
         $item = $orderData[$ii];
         $message .= "Item ". ($ii + 1) . ": " . "<br/>";
         $message .= "Name: " . $item['name'] . "<br/>";
         if (isset($item['merch_size_full']))
         {
            $message .= "Size: " . $item['merch_size_full'] . "<br/>";
         }
         $message .= "Item Price: $" . $item['item_price_str'] . "<br/>";
         $message .= "Quantity: " .$item['quantity'] . "<br/>";
         $message .= "Total Item Price: " . $item['price_str'] . "<br/><br/>";
      }

      $message .= "Total Order Price: " . $_POST['total_price'] . "<br/><br/>";
      $message .= "</pre>";

      $message .= "Please contact the orderer within a few days to arrange pickup and payment.";

      $headers = "MIME-Version: 1.0" . "\r\n";
      $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";

      $headers .= "From: <website@rssla.org>" . "\r\n";

      mail($to, $subject, $message, $headers, "-fwebsite@rssla.org");

   ?>

</body>
</html>