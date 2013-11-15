<!DOCTYPE html>
<html>
<head>
   <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/head.php"); ?>
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
            <span class="pagetitle">RSS Prom -- Casino Night!</span>
           
         </div>
	<div class="fullpage-contwrap">
            <div class="cont solo">
               <div class="fillprom">
                  <img class="fillprom" src="/resources/images/prom/poker-chips-by-sanzar-murzin.jpg">

<div>
	<br><br>
	<div class="wrap border-bottom shadow-bottom">
	<span class="pagetitle">Sign Up for RSS prom here!
	</span>
	</div>
	</div>
	
	<div class = "content block">

		<form class = "fullpage-contwrap" method="POST" action="/prom/promform.php">
		Your name: <input type="text" name="name"><br><br>
		<input type="checkbox" name="guestbool" value="guestboolean">I have a date (not a sucker)<br><br>
<input type="checkbox" name="imverysorry" value="insultjoey">My date is Joey (ooh, taking the grenade. Good man.)
		
		<br><br>Guest name: <input type="text" name="guestname">  
		<input type="submit" value="Submit">
		</form> 
	</div>
	
         			<br><div class="contentblock">
				<div><ul>
				<li>Simply input your name and the name of your date (if you have one, sucker), and your tickets will be generated automatically. <br><br><li>The payment fee of literally a million dollars (in the appropriate jchunits) will be routed through PayPal. <br><br><li>If you are planning on bringing a guest, please check the appropriate box (sucker?).</ul></div>
            			
               </div>
            </div>
<br><br><br>
<div class="wrap border-bottom shadow-bottom">
	<span class="pagetitle">What is RSS Prom?
	</span></div>
         
<div><br><br>Tired of studying?  Don't miss your chance to have fun at the RSS Prom!  You can bet you'll have a great time at our casino-themed event. Dress up, play games, eat, and make more friends.  Look forward to it during the second week of winter quarter at _____.
	</div></div>
      </div>


      <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/footer.php"); ?>
   </div>
</body>
</html>
