<?php

   $userSet = isset($_COOKIE["userId"]);

?>
<html>
   <head>
      <script type="text/javascript" src="/_layout/scripts/jquery.js"></script>
      <script type='text/javascript' src='https://cdn.firebase.com/js/client/1.0.3/firebase.js'></script>
      <style media="screen">
         #editor { 
            position: absolute;
            top: 60px;
            right: 0;
            bottom: 0;
            left: 0;
         }
      </style>
      <link rel="stylesheet" type="text/css" href="/editor/editor.css"/>
   </head>
   <?php if ($userSet) : ?>
      <body>
         <p id="name"></p>
         <div id="editor"></div>
      </body>
      <script src="ace/src/ace.js"></script>
      <script>
         // Initialize ACE
         var editor = ace.edit("editor");
         editor.setTheme("ace/theme/monokai");
         editor.getSession().setMode("ace/mode/html");

         // Initialize Firebase
         var userId = "<?php echo $_COOKIE["userId"]; ?>";
         var instanceRef = new Firebase('https://rcce-rsslaorg.firebaseio.com/instances/');
         var userName;

         var userDataRef = instanceRef.child(userId);
         userDataRef.update({ active: true });
         userDataRef.once('value', function(snapshot)
         {
            userName = snapshot.val().name;
            $("#name").text("Editing as: " + userName);
         });

         // Load code from Firebase
         userDataRef.on('value', function(snapshot)
         {
            var code = snapshot.val().code;

            // Before update, store cursor position
            var cursorPos = editor.getSession().selection.getCursor();

            // Update code
            editor.getSession().setValue(code);

            // Move cursor back to previous position
            editor.getSession().selection.moveCursorTo(cursorPos.row, cursorPos.column, false);
         });

         // Build input handler
         $(".ace_text-input").on("keyup", function ()
         {
            var code = editor.getSession().getValue();

            userDataRef.once('value', function(snapshot)
            {
               var expires = new Date(snapshot.val().expires);
               var now = new Date();

               if (expires > now)
               {
                  userDataRef.update({ code: code });
               }
            });
         });

         window.onbeforeunload = function()
         {
            userDataRef.update({ active: false });
         }
      </script>
   <?php else : ?>
      <body>
         <div id="userInput">
            <p>Enter your name and hit enter:</p>
            <input type="text" name="user"/>
         </div>
      </body>
      <script>
         $("#userInput > input").keypress(function(e)
         {
            if (e.keyCode == 13)
            {
               var userName = $(this).val();
               var instanceRef = new Firebase('https://rcce-rsslaorg.firebaseio.com/instances/');

               var now = new Date();
               var time = now.getTime();
               var nhours = 10;
               time += nhours * 3600 * 1000;
               now.setTime(time);
               var timeStr = now.toUTCString();

               var userRef = instanceRef.push({ name: userName, expires: timeStr, active: true, code: "" }, function()
               {
                  var userId = userRef.name();

                  document.cookie = "userId=" + userId + "; expires=" + timeStr;

                  window.location = '.';
               });   
            }
         });
      </script>
   <?php endif; ?>
</html>
