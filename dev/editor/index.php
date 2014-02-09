<?php

   $userSet = isset($_COOKIE["user"]);

?>
<html>
   <head>
      <script type="text/javascript" src="/_layout/scripts/jquery.js"></script>
      <?php if ($userSet) :?>
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
      <?php endif; ?>
      <link rel="stylesheet" type="text/css" href="/editor/editor.css"/>
   </head>
   <?php if ($userSet) : ?>
      <body>
         <p>Editing as: <?php echo $_COOKIE["user"]; ?></p>
         <div id="editor"></div>
      </body>
      <script src="ace/src/ace.js"></script>
      <script>
         // Initialize ACE
         var editor = ace.edit("editor");
         editor.setTheme("ace/theme/monokai");
         editor.getSession().setMode("ace/mode/html");

         // Initialize Firebase
         var user = "<?php echo $_COOKIE["user"]; ?>";
         var userRef = new Firebase('https://fiery-fire-3705.firebaseio.com/users/');
         var thisUser = userRef.child(user);

         // Load code from Firebase
         thisUser.on('value', function(snapshot)
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
            thisUser.set({ code: code });
         });

         // Remove Firebase ref on window close
         window.onbeforeunload = function ()
         {
            thisUser.remove();
         }
      </script>
   <?php else : ?>
      <body>
         <form method="post" id="userInput">
            <p>Enter your name and hit enter:</p>
            <input type="text" name="user"/>
         </form>
      </body>
      <script>
         $("#userInput > input").keypress(function(e)
         {
            if (e.keyCode == 13)
            {
               var user = $(this).val();
               document.cookie = "user=" + user;
               window.location = '.';
            }
         });
      </script>
   <?php endif; ?>
</html>
