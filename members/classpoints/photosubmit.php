<!DOCTYPE html>
<html>
<head>
   <link type="text/css" rel="stylesheet" href="photosubmit.css"/>
   <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/head.php"); ?>
</head>
<body>
   <div id="wrapper">
      <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/header.php"); ?>
      <div class="main clearfix">
         <div class="topbar">
            <span class="pagetitle">Class Points</span>
            <div class="topnav v-align">
               <span class="topnavitem"><a href="index.php">Home</a></span>
               <span class="topnavitem selected"><a href="photosubmit.php">Submit a Photo</a></span>
               <span id="description">Upload a photo and tag your friends to earn points for your class!</span>
            </div>
         </div>
         <div class="fullpage-contwrap">
            <div class="cont half left">
               <div class="rowtitle top">
                  <span>Upload a Photo</span>
               </div>
            

               <div class="contentblock" id="picture">
               
                     <div class="button"><span id="buttontext">Choose file...</span></div>
               </div>
               
            </div>


         <!-- PLACE CONTENT HERE -->
            <div class="cont half right">
               <div class="rowtitle top">
                  <span>Tag Your Friends</span>
               </div>

               <div class="contentblock">
                  <table id="taginfo">
                     <tr>
                        <td>
                           <input type="text">
                        </td>
                        <td>
                           <select name="">
                              <option value="">1st</option>
                              <option value="">2nd</option>
                              <option value="">3rd</option>
                              <option value="">4th</option>
                           </select>
                        </td>
                     </tr>

                     <tr>
                        <td>Name</td>
                        <td>Year</td>
                     </tr>
                  

            
                              <tr>
                        <td>
                           <input type="text">
                        </td>
                        <td>
                           <select name="">
                              <option value="">1st</option>
                              <option value="">2nd</option>
                              <option value="">3rd</option>
                              <option value="">4th</option>
                           </select>
                        </td>
                     </tr>

                     <tr>
                        <td>Name</td>
                        <td>Year</td>
                     </tr>
                  
            
                     <tr>
                        <td>
                           <input type="text">
                        </td>
                        <td>
                           <select name="">
                              <option value="">1st</option>
                              <option value="">2nd</option>
                              <option value="">3rd</option>
                              <option value="">4th</option>
                           </select>
                        </td>
                     </tr>

                     <tr>
                        <td>Name</td>
                        <td>Year</td>
                     </tr>
                  
           
                     <tr>
                        <td>
                           <input type="text">
                        </td>
                        <td>
                           <select name="">
                              <option value="">1st</option>
                              <option value="">2nd</option>
                              <option value="">3rd</option>
                              <option value="">4th</option>
                           </select>
                        </td>
                     </tr>

                     <tr>
                        <td>Name</td>
                        <td>Year</td>
                     </tr>

                     <tr>
                        <td>
                           <input type="text">
                        </td>
                        <td>
                           <select name="">
                              <option value="">1st</option>
                              <option value="">2nd</option>
                              <option value="">3rd</option>
                              <option value="">4th</option>
                           </select>
                        </td>
                     </tr>

                     <tr>
                        <td>Name</td>
                        <td>Year</td>
                     </tr>


                    

                 </table>
            

                           <div class="button" id="newtag"><span id="buttontext">Tag Another</span></div>
                 
                           <div class="button"><a href="confirmation.php"><span id="buttontext">Submit!</span></a></div>
                   



               </div>
            </div>

         </div>
         <!-- Optional bottom bar
         <div class="bottombar">
            <span>Submit!</span>
         </div>
         -->
      </div>
      <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/footer.php"); ?>
   </div>
   <script>
   	$("#newtag").click(function()
   		{
   			var html = '<tr><td><input type="text"></td><td><select name=""><option value="">1st</option><option value="">2nd</option><option value="">3rd</option><option value="">4th</option></select></td></tr><tr><td>Name</td><td>Year</td></tr>';

                $("#taginfo").append(html);
   		
   		});
   	
   </script>
</body>
</html>