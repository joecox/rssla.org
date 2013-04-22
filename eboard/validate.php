<?php
   $db_connection = mysql_connect("localhost", "rssla_scholar", "hilltop23") or die("Could not connect to database");
   mysql_select_db("rssla_rss");
   $query = "SELECT pw FROM validation WHERE name = 'eboard'";
   $result = mysql_query($query);
   $row = mysql_fetch_row($result);
   $pw = $row[0];

   if ($pw == $_POST['pw'])
   {
      $newcont = '<script>
                     function submitCP() {
                        var first = $("input#1").val();
                        var second = $("input#2").val();
                        var third = $("input#3").val();
                        var fourth = $("input#4").val();
                        if (first == "" || second == "" || third == "" || fourth == "")
                           ;
                        else
                        {
                           data = "first=" + first + "&second=" + second + "&third=" + third + "&fourth=" + fourth;
                           $.ajax({
                              url: "updateCP.php",
                              type: "POST",
                              data: data,
                              dataType: "text"
                           })
                           .done(function (response) {
                              $("<div style=\'margin-top:10px\'>" + response + "</div>").appendTo("#cprow").hide().fadeIn(200);
                           });
                        }
                     }
                  </script>
                  <div class="cont quarter left">
                  </div>
                  <div class="cont three-quarters">
                     <div class="contentblock">
                        <p>Update Class Points</p>
                        <p id="cprow">
                           <input id="1" type="text" name="1st" size="3" placeholder="1st yrs">
                           <input id="2" type="text" name="2nd" size="3" placeholder="2nd yrs">
                           <input id="3" type="text" name="3rd" size="3" placeholder="3rd yrs">
                           <input id="4" type="text" name="4th" size="3" placeholder="4th yrs">
                           <input type="submit" id="submit" onclick="submitCP()">
                        </p>
                     </div>
                  </div>';
      $arr = array('success' => true, 'newcont' => $newcont);
   }
   else
   {
      $arr = array('success' => false);
   }

   echo json_encode($arr);
?>