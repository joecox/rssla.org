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
                  <span class="v-align h-align">
                     <span class="button">Members checkout</span>
                     <span class="button">Alumni checkout</span>
                  </span>
               </div>
            </div>
         </div>
         <div class="pagewrap">
            <div class="merchwrap">
               <?php

                  $db_connection = mysql_connect("localhost", "rssla_scholar", "hilltop23");
                  mysql_select_db("rssla_rss");

                  $query = "SELECT * FROM merchandise";
                  $result = mysql_query($query);

                  for ($ii = 0; $ii < mysql_num_rows($result); $ii++)
                  {
                     $row = mysql_fetch_row($result);
                     $ids[$ii] = $row[0];
                     $names[$ii] = $row[1];
                     $prices[$ii] = $row[2];
                     $img_ids[$ii] = $row[3];
                     $sizes[$ii] = $row[4];
                     $size_s[$ii] = $row[5];
                  }

                  for ($ii = 0; $ii < sizeof($ids); $ii = $ii + 4)
                  {
                     echo '<div class="merchrow" rownum=' . ($ii / 4) . '>';
                     for ($jj = $ii; $jj < $ii + 4 && $jj < sizeof($ids); $jj++)
                     {
                        switch ($jj % 4)
                        {
                           case 0:
                              $pos = "left";
                              break;
                           case 1:
                              $pos = "mid-left";
                              break;
                           case 2:
                              $pos = "mid-right";
                              break;
                           case 3:
                              $pos = "right";
                              break;
                        }

                        $size_pieces = explode(',', $sizes[$jj]);
                        $size_s_pieces = explode(',', $size_s[$jj]);


                        if (preg_match("/^[0-9]*\.[0-9]{2}$/", $prices[$jj]))
                        {
                           $price = $prices[$jj];
                        }
                        else if (preg_match("/^[0-9]*\.[0-9]{1}$/", $prices[$jj]))
                        {
                           $price = $prices[$jj] . "0";
                        }
                        else if (preg_match("/^[0-9]*$/", $prices[$jj]))
                        {
                           $price = $prices[$jj];
                        }

                        echo '<div class="merch '.$pos.'">' .
                                '<div class="productwrap">' .
                                    '<img class="product" src="/resources/images/gear/merch_'.$img_ids[$jj].'_card.jpg">' .
                                    '<div class="merchprice">$'.$price.'</div>' .
                                 '</div>' .
                                 '<div class="infowrap">' .
                                    '<div style="margin-bottom:8px">' .
                                       '<span class="productname">'.$names[$jj].'</span>' .
                                    '</div>' .
                                    '<div>';
                                    if($size_pieces[0] != '')
                                    {
                                       echo '<select style="float:left">';
                                       for ($kk = 0; $kk < sizeof($size_pieces); $kk++)
                                       {
                                          echo '<option value="'.$size_pieces[$kk].'">'.$size_s_pieces[$kk].'</option>';
                                       }
                                       echo '</select>';
                                    }
                        echo           '<span class="button small add-to-cart">Add to cart</span>' .
                                    '</div>' .
                                 '</div>' .
                              '</div>';
                     }
                     echo '</div>';
                  }

               ?>
            </div>
         </div>
         <div class="wrap border-top shadow-top" style="text-align:center">
            <div>Send questions or ideas for new merchandise to <?php echo $publFL; ?> at <a class="norm" href="mailto:publicity@rssla.org">publicity@rssla.org</a></div>
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