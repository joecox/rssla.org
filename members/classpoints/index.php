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

         var canvas = document.getElementById("canvas");
         var context = canvas.getContext("2d");

         var texty = 40;

         if (data[0] >= 100)
            var text1x = 57;
         else if (data[0] >= 10)
            var text1x = 65;
         else
            var text1x = 77;
         context.font = "30pt Arial";
         context.fillStyle = "rgb(0,0,0)";
         context.fillText(data[0], text1x, texty);

         if (data[1] >= 100)
            var text2x = 177;
         else if (data[1] >= 10)
            var text2x = 188;
         else
            var text2x = 200;
         context.fillText(data[1], text2x, texty);

         if (data[2] >= 100)
            var text3x = 300;
         else if (data[3] >= 10)
            var text3x = 310;
         else
            var text3x = 322;
         context.fillText(data[2], text3x, texty);

         if (data[3] >= 100)
            var text4x = 425;
         else if (data[3] >= 10)
            var text4x = 435;
         else
            var text4x = 447;
         context.fillText(data[3], text4x, texty);

/*
         var text1x = 77;
         context.font = "30pt Arial";
         context.fillStyle = "rgb(0,0,0)";
         context.fillText(0, text1x, texty);

         var text2x = 200;
         context.fillText(0, text2x, texty);

         var text3x = 322;
         context.fillText(0, text3x, texty);

         var text4x = 447;
         context.fillText(0, text4x, texty);
*/

         window.requestAnimFrame = (function(callback) {
            return window.requestAnimationFrame || window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame || window.oRequestAnimationFrame || window.msRequestAnimationFrame ||
            function(callback) {
               window.setTimeout(callback, 1000);
            };
         }) ();

         function drawRectangle(rectangle, context) {
            context.beginPath();
            context.rect(rectangle.x, rectangle.y, rectangle.width, rectangle.height);
            context.fillStyle = rectangle.color;
            context.fill();
         }

         function animate(rectangle, canvas, context, startTime) {
            // update
            var time = (new Date()).getTime() - startTime;

            var linearSpeed = 100;
            var new_y = bottom - linearSpeed * time / 1000;
            var new_h = linearSpeed * time / 1000;

            if (new_y > rectangle.max_y && new_h < rectangle.max_h)
            {
               rectangle.y = new_y;
               rectangle.height = new_h;
            }

            // clear
            context.clearRect(rectangle.x, rectangle.y, rectangle.width, rectangle.height);

            // draw the rectangle
            drawRectangle(rectangle, context);

            // request new frame
            requestAnimFrame(function () {
               animate(rectangle, canvas, context, startTime);
            });
         }

/*
         function animatePts(rectangle, pointnum, canvas, context, startTime) {
            var timeout = 100;
            setTimeout(function () {
               if (rectangle.points < rectangle.max_p)
               {
                  // increase the point count
                  context.font = "30pt Arial";
                  context.fillStyle = "rgb(0,0,0)";
                  var points = rectangle.points + 1;
                  rectangle.points++;

                  switch (pointnum) {
                     case 1:
                        if (points >= 100)
                           text1x = 57;
                        else if (points >= 10)
                           text1x = 65;
                        else
                           text1x = 77;
                        context.clearRect(text1x, texty-50, 100, 50);
                        context.fillText(points, text1x, texty);
                        break;
                     case 2:
                        if (points >= 100)
                           text2x = 177;
                        else if (points >= 10)
                           text2x = 188;
                        else
                           text2x = 200;
                        context.clearRect(text2x, texty-50, 100, 50);
                        context.fillText(points, text2x, texty);
                        break;
                     case 3:
                        if (points >= 100)
                           text3x = 300;
                        else if (points >= 10)
                           text3x = 310;
                        else
                           text3x = 322;
                        context.clearRect(text3x, texty-50, 100, 50);
                        context.fillText(points, text3x, texty);
                        break;
                     case 4:
                        if (points >= 100)
                           text4x = 425;
                        else if (points >= 10)
                           text4x = 435;
                        else
                           text4x = 447;
                        context.clearRect(text4x, texty-50, 100, 50);
                        context.fillText(points, text4x, texty);
                        break;
                  }
               }

               // request new frame
               requestAnimFrame(function () {
                  animatePts(rectangle, pointnum, canvas, context, startTime);
               });
            }, timeout);  
         }
*/

         var maxheight = data.max();
         var bottom = 520;
         var height1 = data[0] * 200/maxheight + 15 * Math.log(data[0]);
         var height2 = data[1] * 200/maxheight + 15 * Math.log(data[1]);
         var height3 = data[2] * 200/maxheight + 15 * Math.log(data[2]);
         var height4 = data[3] * 200/maxheight + 15 * Math.log(data[3]);
         var topLeftCorner1Y = bottom - height1;
         var topLeftCorner2Y = bottom - height2;
         var topLeftCorner3Y = bottom - height3;
         var topLeftCorner4Y = bottom - height4;

         var rect1 = {
            x: 50,
            y: bottom,
            width: 100,
            height: 0,
            max_y: topLeftCorner1Y,
            max_h: height1,
            color: "rgb(51,51,204)",
            points: 0,
            max_p: data[0]
         };
         var rect2 = {
            x: 160,
            y: bottom,
            width: 100,
            height: 0,
            max_y: topLeftCorner2Y,
            max_h: height2,
            color: "rgb(255,147,30)",
            points: 0,
            max_p: data[1]
         }
         var rect3 = {
            x: 280,
            y: bottom,
            width: 100,
            height: 0,
            max_y: topLeftCorner3Y,
            max_h: height3,
            color: "rgb(122,201,67)",
            points: 0,
            max_p: data[2]
         }
         var rect4 = {
            x: 400,
            y: bottom,
            width: 100,
            height: 0,
            max_y: topLeftCorner4Y,
            max_h: height4,
            color: "rgb(51,153,204)",
            points: 0,
            max_p: data[3]
         }

         drawRectangle(rect1, context);
         drawRectangle(rect2, context);
         drawRectangle(rect3, context);
         drawRectangle(rect4, context);

         var disp = false;

         var wsh = $(window).scrollTop();
         var csh = $("#canvas").offset().top;
         var wh = $(window).height();
         $(window).ready(function () {
            if (!disp && wsh >= (500 + csh - wh))
            {
               var startTime = (new Date()).getTime();
               animate(rect1, canvas, context, startTime);
               //animatePts(rect1, 1, canvas, context, startTime);
               animate(rect2, canvas, context, startTime);
               //animatePts(rect2, 2, canvas, context, startTime);
               animate(rect3, canvas, context, startTime);
               //animatePts(rect3, 3, canvas, context, startTime);
               animate(rect4, canvas, context, startTime);
               //animatePts(rect4, 4, canvas, context, startTime);
               disp = true;
            }
         });
         $(window).scroll(function () {
            wsh = $(window).scrollTop();
            csh = $("#canvas").offset().top;
            wh = $(window).height();
            if (!disp && wsh >= (500 + csh - wh))
            {
               var startTime = (new Date()).getTime();
               animate(rect1, canvas, context, startTime);
               //animatePts(rect1, 1, canvas, context, startTime);
               animate(rect2, canvas, context, startTime);
               //animatePts(rect2, 2, canvas, context, startTime);
               animate(rect3, canvas, context, startTime);
               //animatePts(rect3, 3, canvas, context, startTime);
               animate(rect4, canvas, context, startTime);
               //animatePts(rect4, 4, canvas, context, startTime);
               disp = true;
            }
         });

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
         <div class="wrap center" style="height: 650px">
            <p style="font-size: 1.4rem">Current standings:</p>
            <canvas class="h-align" id="canvas" width="550" height="600" style="z-index: 0">[No canvas support, please update your browser.]</canvas>
            <img src="/resources/images/classpoints/hourglass.png" style="position:absolute; top: 94px; left: 225px; background-color:transparent">
         </div>
      </div>
      <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/footer.php"); ?>
   </div>
</body>
</html>