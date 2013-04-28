<?php
   $js = '<script>
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
                     url: "updateCP_process.php",
                     type: "POST",
                     data: data,
                     dataType: "text"
                  })
                  .done(function (response) {
                     $("<div style=\'margin-top:10px\'>" + response + "</div>").appendTo("#cprow").hide().fadeIn(200);
                  });
               }
            }
         </script>';
      
   $html = '<p>Update Class Points</p>
            <p id="cprow">
               <input id="1" type="text" name="1st" size="3" placeholder="1st yrs">
               <input id="2" type="text" name="2nd" size="3" placeholder="2nd yrs">
               <input id="3" type="text" name="3rd" size="3" placeholder="3rd yrs">
               <input id="4" type="text" name="4th" size="3" placeholder="4th yrs">
               <input type="submit" id="submit" onclick="submitCP()">
            </p>';

   $arr = array('js' => $js, 'html' => $html);

   return json_encode($arr);
?>