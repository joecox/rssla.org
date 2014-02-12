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
      <div id="noUsers"><div>There are no current users.</div></div>
      <div id="sidebar"></div>
      <div id="main-viewer">
         <div id="editor"></div>
      </div>
   </body>
   <script>
      var instanceRef = new Firebase('https://rcce-rsslaorg.firebaseio.com/instances/');
      var loadedRef;
      var oUsers = {};
      var numUsers = 0;
      var $sidebar = $("#sidebar");
      var $mainViewer = $("#main-viewer");
      var $noUsers = $("#noUsers");

      var editor;

      instanceRef.on('child_added', function(snapshot)
      {
         var userId = snapshot.name();
         var userData = snapshot.val();

         var now = new Date();
         var expires = new Date(userData.expires);

         if (expires < now)
         {
            snapshot.ref().remove();
         }
         else if (userData.active)
         {
            addUser(snapshot);
            addToSidebar(userId);

            if (numUsers == 0)
            {
               initializeEditor();
               loadUserToMainViewer(userId);
            }

            numUsers++;
            $noUsers.hide();
         }         
      });

      instanceRef.on('child_changed', function(snapshot)
      {
         var userId = snapshot.name();
         var userData = snapshot.val();

         if (userData.active)
         {
            if (!oUsers[userId])
            {
               addUser(snapshot);
               addToSidebar(userId);
               $noUsers.hide();
            }
            else
            {
               oUsers[userId].data = userData;

               oUsers[userId].previewEditor.getSession().setValue(userData.code);

               if (loadedRef == oUsers[userId].ref)
               {
                  // Before update, store cursor position
                  var cursorPos = editor.getSession().selection.getCursor();

                  // Update code
                  editor.getSession().setValue(userData.code);

                  // Move cursor back to previous position
                  editor.getSession().selection.moveCursorTo(cursorPos.row, cursorPos.column, false);
               }
            }
         }
         else
         {
            removeUser(userId);
            loadNextUser();
         }
      });

      instanceRef.on('child_removed', function(snapshot)
      {
         var userId = snapshot.name();

         removeUser(userId);
         loadNextUser();
      });

      function initializeEditor()
      {
         editor = ace.edit("editor");
         editor.setTheme("ace/theme/monokai");
         editor.getSession().setMode("ace/mode/html");

         // Build input handler
         $(".ace_text-input").on("keyup", function ()
         {
            var code = editor.getSession().getValue();

            loadedRef.once('value', function(snapshot)
            {
               var expires = new Date(snapshot.val().expires);
               var now = new Date();

               if (expires > now)
               {
                  loadedRef.update({ code: code });
               }
               else
               {
                  removeUser(snapshot.name());
                  loadNextUser();
               }
            });
         });
      }

      function addUser(snapshot)
      {
         var userId = snapshot.name();
         var userData = snapshot.val();

         oUsers[userId] = {
            ref: instanceRef.child(userId),
            data: userData,
            preview: undefined,
            previewEditor: undefined
         };

         var $previewEditor = $("<div>").attr("id", userId)
                                        .addClass("preview-code-layer");
         var $previewText = $("<div>").addClass("preview-text-layer")
                                      .append($("<p>").addClass("text")
                                                      .append($("<span>").text(oUsers[userId].data.name)));
         var $userPreview = $("<div>").addClass("user-preview")
                                      .append($previewEditor)
                                      .append($previewText);

         oUsers[userId].preview = $userPreview;

         $userPreview.on("click", function()
         {
            loadUserToMainViewer(userId);
         });
      }

      function addToSidebar(userId)
      {
         var user = oUsers[userId];
         $sidebar.append(user.preview);

         user.preview.css("margin-left", "-300px")
                     .animate({ "margin-left": "0"}, 100);

         user.previewEditor = ace.edit(userId);
         user.previewEditor.setTheme("ace/theme/monokai");
         user.previewEditor.getSession().setMode("ace/mode/html");
         user.previewEditor.setReadOnly(true);
         user.previewEditor.setFontSize(3);
         user.previewEditor.renderer.setShowGutter(false);
         user.previewEditor.getSession().setValue(oUsers[userId].data.code);

      }

      function loadUserToMainViewer(userId)
      {
         loadedRef = oUsers[userId].ref;

         editor.getSession().setValue(oUsers[userId].data.code);

         // Add selected class
         for (key in oUsers)
         {
            oUsers[key].preview.removeClass("selected");
         }

         oUsers[userId].preview.addClass("selected");
      }

      function removeUser(userId)
      {
         // Remove elements & objects
         if (oUsers[userId].preview)
            oUsers[userId].preview.animate({ "margin-left": "-300px" },
                                           100, 
                                           function()
                                           {
                                              $(this).remove();
                                           });

         delete oUsers[userId];
      }

      function loadNextUser()
      {
         if (Object.keys(oUsers).length == 0)
         {
            $noUsers.show();
         }
         else
         {
            loadUserToMainViewer(Object.keys(oUsers)[0]);
         }
      }
   </script>
</html>