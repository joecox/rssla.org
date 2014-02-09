<html>
   <head>
      <script src="/_layout/scripts/jquery.js"></script>
      <script type='text/javascript' src='https://cdn.firebase.com/js/client/1.0.3/firebase.js'></script>
      <script src="../ace/src/ace.js"></script>
      <link rel="stylesheet" type="text/css" href="/editor/editor.css"/>
      <style>
         #editor { 
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
         }
      </style>
   </head>
   <body>
      <div id="sidebar"></div>
      <div id="main-viewer">
         <div id="editor"></div>
      </div>
   </body>
   <script>
      var userRef = new Firebase('https://fiery-fire-3705.firebaseio.com/users/');
      var loadedRef;
      var oUsers = {};
      var numUsers = 0;
      var $sidebar = $("#sidebar");
      var $mainViewer = $("#main-viewer");

      var editor;

      userRef.on('child_added', function(snapshot)
      {
         var userName = snapshot.name();
         var userData = snapshot.val();

         oUsers[userName] = {
            ref: userRef.child(userName),
            data: userData,
            preview: undefined
         };

         addUser(snapshot);
         updateSidebar();

         if (numUsers == 0)
         {
            initializeEditor();
            loadUserToMainViewer(snapshot);
         }

         numUsers++;
      });

      userRef.on('child_changed', function(snapshot)
      {
         var userName = snapshot.name();
         var userData = snapshot.val();

         oUsers[userName].data = userData;
         if (loadedRef == oUsers[userName].ref)
         {
            // Before update, store cursor position
            var cursorPos = editor.getSession().selection.getCursor();

            // Update code
            editor.getSession().setValue(userData.code);

            // Move cursor back to previous position
            editor.getSession().selection.moveCursorTo(cursorPos.row, cursorPos.column, false);
         }
      });

      userRef.on('child_removed', function(snapshot)
      {
         var userName = snapshot.name();

         oUsers[userName].preview.remove();
         delete oUsers[userName];
      });

      function initializeEditor()
      {
         editor = ace.edit("editor");
         editor.setTheme("ace/theme/monokai");
         editor.getSession().setMode("ace/mode/html");
      }

      function addUser(snapshot)
      {
         var userName = snapshot.name();
         var userData = snapshot.val();

         var $userPreview = $("<div>").addClass("user-preview")
                                      .css("text-align", "center")
                                      .text(userName);

         oUsers[userName].preview = $userPreview;

         $userPreview.on("click", function()
         {
            editor.getSession().setValue(oUsers[userName].data.code);
            loadedRef = oUsers[userName].ref;
         });
      }

      function updateSidebar()
      {
         for (key in oUsers)
         {
            var user = oUsers[key];
            $sidebar.append(user.preview);
         }
      }

      function loadUserToMainViewer(snapshot)
      {
         var userName = snapshot.name();
         var userData = snapshot.val();

         loadedRef = oUsers[userName].ref;

         editor.getSession().setValue(userData.code);

         // Build input handler
         $(".ace_text-input").on("keyup", function ()
         {
            var code = editor.getSession().getValue();
            loadedRef.set({ code: code });
         });
      }

      // setInterval(function()
      // {
      //    getCode();
      // }, 100);

      // function getCode()
      // {
      //    var oCode;
      //    $.ajax({
      //       url: "getCode.php",
      //       type: "GET",
      //       dataType: "JSON"
      //    })
      //    .done(function(response)
      //    {
      //       if (response.success)
      //       {
      //          oCode = response.code;
      //          updateCodes(oCode);
      //       }
      //    });
      // }

      // function updateCodes(oCode)
      // {
      //    for (index in oCode)
      //    {
      //       var entry = oCode[index];
      //       var id = entry.id;
      //       var code = entry.code;

      //       $("textarea#" + id).val(code);
      //    }
      // }
   </script>
</html>