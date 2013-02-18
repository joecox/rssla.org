<!DOCTYPE html>
<html>
<head>
   <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/head.php"); ?>
   <script src="/_layout/scripts/formbuilder.js"></script>
   <link rel="stylesheet" type="text/css" href="/_layout/stylesheets/formelements.css">
</head>
<body>
   <div id="wrapper">
      <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/header.php"); ?>
      <div class="main clearfix">
         <div class="cont solo">
            <div class="blocktitlecenter">Form Builder Utility</div>
            <br><br><br>
            <div class="blocktitlecenter" style="font-family: Helvetica; font-size:1rem">Step 1: Create the form</div>
            <div class="contentblock" style="text-align:center">
               <form action="forminsert.php" method="post">
                  <input type="hidden" name="numInput" value="0">
                  <div class="input">
                     <label for="title">Title: </label>
                     <input type="text" name="title" class="title">
                  </div>
               </form>
               <div class="button" id="addinput">
                  <span>Add input</span>
               </div>
            </div>
            <br><br><br>
            <div class="blocktitlecenter" style="font-family: Helvetica; font-size:1rem">Step 2: Link with a spreadsheet</div>
            <div class="contentblock" style="text-align:center">
               <div class="button" id="submit">
                     <span>Submit</span>
               </div>
            </div>
         </div>
      </div>
      <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/footer.php"); ?>
   </div>
</body>
</html>