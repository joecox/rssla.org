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
         <?php $selected="mailmerge"; include($root."/eboard/eboard_sidenav.php"); ?>
         <div class="cont three-quarters">
            <div class="rowtitle"><span>Mail Merge</span></div>
            <div class="contentblock">
               <p>To use the RSS Mail Merge tool, do the following:</p>
               <ol>
                  <li>Enter your name in the 'Name' field.</li>
                  <li>Enter the email address you want to appear as the 'From' address in the 'From' field. <br/> NOTE: Currently the address must be an '@rssla.org' address to be authenticated correctly.</li>
                  <li>Enter the subject in the 'Subject' field.</li>
                  <li>Enter your message in the 'Message' box.
                     <ul>
                        <br>
                        <li>To insert a variable, type {var}, where var is your variable name.  The variable name may contain any alphanumeric characters.</li>
                        <li>You may also use gender-specific pronouns if your CSV has a column containing the word 'Gender' (see below).  You must write '{Column Name he/she}', '{Column Name him/her}', or '{Column Name his/her}' to have the correct gender-specific pronoun inserted (uppercase and lowercase are supported).  EXAMPLE: '{Friend Gender His/Her} job has been good for {Friend Gender him/her}.'</li>
                     </ul>
                  </li>
                  <li>Upload your CSV file with your variable data.
                     <ul>
                        <br>
                        <li>To create a CSV, enter your data in Excel or the Google Docs spreadsheet editor.</li>
                        <li>For each variable you used in your message, create a column in the spreadsheet.  In the first cell of that column, enter the variable name.  In the cells below that header, enter your data.</li>
                        <li>Your CSV must also contain an 'Email' column with valid emails.  However, the order of your columns does not matter.</li>
                        <li>If you wish to use gender-specific pronouns, include a column with values 'M' and 'F'.  The column header must include "Gender" in it, such as "Friend Gender".  He/She, him/her, and his/her will be set accordingly.</li>
                        <li>NOTE: Gender-specific contractions (he's, she's) are not yet supported.</li>
                        <li>If you're using Excel, go to File -> Save As and specify the file type as Comma Separated Values (.csv).  If you're using Google Docs, go to File -> Download As -> Comma Separated Values (.csv).</li>
                     </ul>
                  </li>
                  <li>Review your message before sending.  Not a whole lot of error checking is implemented yet, so make sure your message and CSV are correct.</li>
                  <li>Click Submit.  You will be taken to another page with the output results of the processing script.</li>
               </ol>
            </div>
            <form action="send.php" method="post" style="font-weight:400;" enctype="multipart/form-data">
               <div class="inputwrap">
                  <label for="name">Name:</label>
                  <input type="text" name="name" size="30"/>
               </div>
               <div class="inputwrap">
                  <label for="email">From:</label>
                  <input type="text" name="email" size="30"/>
               </div>
               <div class="inputwrap">
                  <label for="subject">Subject:</label>
                  <input type="text" name="subject" size="30"/>
               </div>
               <div class="inputwrap">
                  <label for="message">Message:</label>
                  <textarea name="message" style="width: 90%;" rows="10"></textarea>
               </div>
               <div class="inputwrap">
                  <label for="file">CSV File:</label>
                  <input type="hidden" name="MAX_FILE_SIZE" value="300000"/>
                  <input type="file" name="csv"/>
               </div>
               <div class="inputwrap">
                  <span id="submit" class="button">Submit</span>
               </div>
            </form>
         </div>
      </div>
      <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/footer.php"); ?>
   </div>

   <script type="text/javascript" src="mailmerge.js"></script>

</body>
</html>