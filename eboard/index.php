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
            <span class="pagetitle">EBOARD SERVICES</span>
            <span class="helptext v-align">Services for Eboard members only.</span>
         </div>
         <div style="height: 300px; margin-top: 10px">
            <div id="contwrap" style="height: 300px; position:relative;">
               <span id="incorr_msg">Incorrect password.</span>
               <div class="login-box v-align h-align">
                  <form method="post">
                     <div class="wrapper-dropdown" tabindex="1">
                        <div class="selector">Login as:</div>
                        <ul class="dropdown">
                           <li>President</li>
                           <li>IVP</li>
                           <li>EVP</li>
                           <li>Treasurer</li>
                           <li>Secretary</li>
                           <li>Activities</li>
                           <li>Communications</li>
                           <li>CRD</li>
                           <li>EPD</li>
                           <li>Outreach</li>
                           <li>Publicity</li>
                           <li>ARL</li>
                           <li class="last">LAMP</li>
                        </ul>
                     </div>
                     <input class="pw" type="password" id="pw" placeholder="Password">
                     <span class="submit-square"></span>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/footer.php"); ?>
   </div>
</body>
</html>