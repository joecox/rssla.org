<!DOCTYPE html>
<html>
<head>
   <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/head.php"); ?>
   <link rel="stylesheet" type="text/css" href="reimbursement.css">
</head>
<body>
   <div id="wrapper">
      <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/header.php"); ?>
      <div class="main clearfix">
         <?php $selected="reimbursement"; include($root."/eboard/eboard_sidenav.php"); ?>
         <div class="cont three-quarters">
            <div class="rowtitle"><span>Submit Reimbursement Request</span></div>
            <div class="contentblock">
               <form action="send.php" method="post" style="font-weight:400;" enctype="multipart/form-data">
                  <p><b>Basic Information</b></p>
                  <label for="name">Name:</label>
                  <input type="text" name="name" size="50"/>
                  <label for="phone_email">Phone or Email:</label>
                  <input type="text" name="phone_email" size="50"/>
                  <label for="subject">Committee:</label>
                  <input type="text" name="subject" size="50"/>
                  <label for="event_name">Name of Event:</label>
                  <input type="text" name="event_name" size="50"/>
                  <label for="event_date">Date of Event:</label>
                  <input type="text" name="event_date" size="20"/>
                  <p><b>Event Budget</b></p>
                  <p>Please fill this in with all of the expenses of your event, even if they are not ones you are expecting reimbursement for.  This is to help create a historical budget for events. As in the example, they do not have to be very detailed.</p>
                  <table id="event_budget_table">
                     <tr>
                        <th>Charge</th>
                        <th>Price</th>
                        <th>Reason for Use:</th>
                     </tr>
                     <tr class="event_budget_row">
                        <td>
                           <input type="text" name="charge_1" placeholder="Ex: Food" size="40"/>
                        </td>
                        <td>
                           $ <input type="text" name="price_1" placeholder="250" size="15"/>
                        </td>
                        <td>
                           <input type="text" name="reason_1" placeholder="To convert to ATP for use in cellular respiration" size="50"/>
                        </td>
                     </tr>
                     <tr class="event_budget_row">
                        <td>
                           <input type="text" name="charge_2" size="40"/>
                        </td>
                        <td>
                           $ <input type="text" name="price_2" size="15"/>
                        </td>
                        <td>
                           <input type="text" name="reason_2" size="50"/>
                        </td>
                     </tr>
                     <tr class="event_budget_row">
                        <td>
                           <input type="text" name="charge_3" size="40"/>
                        </td>
                        <td>
                           $ <input type="text" name="price_3" size="15"/>
                        </td>
                        <td>
                           <input type="text" name="reason_3" size="50"/>
                        </td>
                     </tr>
                     <tr class="event_budget_row">
                        <td>
                           <input type="text" name="charge_4" size="40"/>
                        </td>
                        <td>
                           $ <input type="text" name="price_4" size="15"/>
                        </td>
                        <td>
                           <input type="text" name="reason_4" size="50"/>
                        </td>
                     </tr>
                     <tr class="event_budget_row">
                        <td>
                           <input type="text" name="charge_5" size="40"/>
                        </td>
                        <td>
                           $ <input type="text" name="price_5" size="15"/>
                        </td>
                        <td>
                           <input type="text" name="reason_5" size="50"/>
                        </td>
                     </tr>
                     <tr class="event_budget_row">
                        <td>
                           <input type="text" name="charge_6" size="40"/>
                        </td>
                        <td>
                           $ <input type="text" name="price_6" size="15"/>
                        </td>
                        <td>
                           <input type="text" name="reason_6" size="50"/>
                        </td>
                     </tr>
                  </table>
               </form>
            </div>
            <div class="inputwrap">
               <span id="submit" class="button" onclick="$('form').submit()">Submit</span>
            </div>
         </div>
      </div>
      <?php include($_SERVER['DOCUMENT_ROOT']."/_layout/footer.php"); ?>
   </div>

   <script src="reimbursement.js"></script>
</body>
</html>