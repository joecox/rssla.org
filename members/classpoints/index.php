<!DOCTYPE html>
<html>
<head>
   <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/head.php"); ?>
   <script>
      Array.prototype.max = function() {
      var max = this[0];
      var len = this.length;
      for (var i = 1; i < len; i++) if (this[i] > max) max = this[i];
         return max;
      }

      window.onload = function ()
      {

         <?php

            $dbh=mysql_connect ("localhost", "rssla_scholar", "hilltop23") or die ('I cannot connect to the database because: ' . mysql_error());
            mysql_select_db ("rssla_rss");
       
            $request = "SELECT * FROM classpoints";
            $query = mysql_query($request, $dbh);
            while ($results = mysql_fetch_array($query)) {
               $firstyears = $results['firstyears'];
               $secondyears = $results['secondyears'];
               $thirdyears = $results['thirdyears'];
               $fourthyears = $results['fourthyears'];
            }

            echo '  var data = ['.$firstyears.','.$secondyears.','.$thirdyears.','.$fourthyears.'];'."\n";

         ?>
         var canvas = document.getElementById("myCanvas");
         var context = canvas.getContext("2d");
   
         var maxheight = data.max();

         var bottom=520;
         var height1 = data[0]*150/maxheight+15*Math.log(data[0]);
         var height2 = data[1]*150/maxheight+15*Math.log(data[1]);
         var height3 = data[2]*150/maxheight+15*Math.log(data[2]);
         var height4 = data[3]*150/maxheight+15*Math.log(data[3]);

         var topLeftCorner1X = 50;
         var topLeftCorner2X = 160;
         var topLeftCorner3X = 280;
         var topLeftCorner4X = 400;

         var topLeftCorner1Y = bottom-height1;
         var topLeftCorner2Y = bottom-height2;
         var topLeftCorner3Y = bottom-height3;
         var topLeftCorner4Y = bottom-height4;


         var width = 100;


         context.beginPath();
         context.rect(topLeftCorner1X, topLeftCorner1Y, width, height1);
         context.fillStyle = "rgb(51,51,204)";
         context.fill();

         context.beginPath();
         context.rect(topLeftCorner2X, topLeftCorner2Y, width, height2);
         context.fillStyle = "rgb(255,147,30)";
         context.fill();

         context.beginPath();
         context.rect(topLeftCorner3X, topLeftCorner3Y, width, height3);
         context.fillStyle = "rgb(122,201,67)";
         context.fill();

         context.beginPath();
         context.rect(topLeftCorner4X, topLeftCorner4Y, width, height4);
         context.fillStyle = "rgb(51,153,204)";
         context.fill();               

         var destX = 0;
         var destY = 50;

         var imageObj = new Image();
         imageObj.onload = function(){
            context.drawImage(imageObj, destX, destY);
         };
         imageObj.src = "/resources/images/classpoints/hourglass.png";

         if (data[0] >= 100)
            var text1x = 57;
         else if (data[0] >= 10)
            var text1x = 65;
         else
            var text1x = 77;
         var text1y = 50;
         context.font = "30pt Arial";
         context.fillStyle = "rgb(0,0,0)";
         context.fillText(data[0], text1x, text1y);

         if (data[1] >= 100)
            var text2x = 177;
         else if (data[1] >= 10)
            var text2x = 188;
         else
            var text2x = 200;
         var text2y = 50;
         context.fillText(data[1], text2x, text2y);

         if (data[2] >= 100)
            var text3x = 300;
         else if (data[3] >= 10)
            var text3x = 310;
         else
            var text3x = 322;
         var text3y = 50;
         context.fillText(data[2], text3x, text3y);

         if (data[3] >= 100)
            var text4x = 425;
         else if (data[3] >= 10)
            var text4x = 435;
         else
            var text4x = 447;
         var text4y = 50;
         context.fillText(data[3], text4x, text4y);

}
</script>
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
            <span class="pagetitle">CLASS POINTS</span>
            <span class="helptext v-align">Earn points for your class by showing up to events, committee meetings, etc!<br>Points are recorded by eboard members.</span>
         </div>
         <div class="wrap center">
            <p style="font-size: 1.4rem">Current standings:</p>
            <canvas id="myCanvas" width="550" height="600">[No canvas support, please update your browser.]</canvas>
         </div>
      </div>
      <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/footer.php"); ?>
   </div>
</body>
</html>