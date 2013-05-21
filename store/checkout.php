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
         <div class="bannerwrap">
            <img class="photobanner" src="">
            <div class="bannertext"></div>
         </div>
         <div class="wrap border-bottom shadow-bottom">
            <span class="pagetitle">STORE: 
               <span class="pagetitle little">CHECKOUT</span>
            </span>
         </div>
         <div class="fullpage-contwrap" style="min-height: 200px">
            <div class="wrapper-dropdown" tabindex="1">
               <div class="selector">Checkout as:</div>
               <ul class="dropdown">
                  <li>Current Member</li>
                  <li class="last">Alumnus</li>
               </ul>
            </div>
         </div>
         <div class="wrap border-top shadow-top" style="text-align:center">
            <span>Send questions or ideas for new merchandise to <?php echo $publFL; ?> at <a class="norm" href="mailto:publicity@rssla.org">publicity@rssla.org</a>.</span>
         </div>
      </div>
      <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/footer.php"); ?>
   </div>
</body>
</html>