<nav class="nav">
   <table class="navbar">
      <tr>
         <td class="navbutton" id="home" onclick="goTo('/');">
            <a href="/">
               <span class="navtext">Home</span>
            </a>
         </td>
         <td class="navbutton" id="about" onclick="goTo('/about/');">
            <a href="/about/">
               <span class="navtext">About</span>
            </a>
         </td>
         <td class="navbutton" id="events" onclick="goTo('/events/calendar');">
            <a href="/events/calendar">
               <span class="navtext">Events</span>
            </a>
         </td>
         <td class="navbutton coming" id="outreach" onclick="goTo('#');">
            <a href="#">
               <span class="navtext">Outreach</span>
            </a>
         </td>
         <td class="navbutton" id="members" onclick="goTo('/members/');">
            <a href="/members/">
               <span class="navtext">Members</span>
            </a>
         </td>
         <td class="navbutton" id="prospective" onclick="goTo('/prospective/osp');">
            <a href="/prospective/osp/">
               <span class="navtext" style="font-size: 0.9rem">Prospective Scholars</span>
            </a>
         </td>
         <td class="navbutton" id="alumni" onclick="goTo('/alumni/');">
            <a href="/alumni/">
               <span class="navtext">Alumni</span>
            </a>
         </td>
         <td class="navbutton coming" id="sponsors" onclick="goTo('#');">
            <a href="#">
               <span class="navtext">Sponsors</span>
            </a>
         </td>
         <td class="navbutton coming" id="store" onclick="goTo('#');">
            <a href="#">
               <span class="navtext">Store</span>
            </a>
         </td>
      </tr>
   </table>
   <table class="dropdown-bar" id="about">
      <tr>
         <td class="nav-list"></td>
         <td class="nav-list" id="about">
            <ul>
               <a href="/about/scholarship/">
                  <li>Scholarship</li>
               </a>
               <a href="/about/society/">
                  <li>Society</li>
               </a>
               <a href="/about/leadership/">
                  <li>Leadership</li>
               </a>
               <a href="/about/constitution/">
                  <li>Constitution</li>
               </a>
            </ul>
         </td>
         <td class="nav-list" id="events">
            <!-- <ul class="nav-list">
               <a href="/events/">
                  <li>Featured</li>
               </a>
               <a href="/events/calendar">
                  <li>Calendar</li>
               </a>
            </ul> -->
         </td>
         <td class="nav-list" id="outreach">
            <!-- <ul class="nav-list">
               <a href="/volunteer/">
                  <li>Volunteering</li>
               </a>
               <a href="/lamp/">
                  <li>LAMP</li>
               </a>
            </ul> -->
         </td>
         <td class="nav-list" id="members"></td>
         <td class="nav-list" id="prospective"></td>
         <td class="nav-list" id="alumni"></td>
         <td class="nav-list" id="sponsors"></td>
         <td class="nav-list" id="store"></td>
      </tr>
   </table>
   <table class="dropdown-bar" id="members">
      <tr>
         <td class="nav-list"></td>
         <td class="nav-list" id="about"></td>
         <td class="nav-list" id="events">
            <!-- <ul class="nav-list">
               <a href="/events/">
                  <li>Featured</li>
               </a>
               <a href="/events/calendar">
                  <li>Calendar</li>
               </a>
            </ul> -->
         </td>
         <td class="nav-list" id="outreach">
            <!-- <ul class="nav-list">
               <a href="/volunteer/">
                  <li>Volunteering</li>
               </a>
               <a href="/lamp/">
                  <li>LAMP</li>
               </a>
            </ul> -->
         </td>
         <td class="nav-list" id="members">
            <ul>
               <a href="/members/profiles/">
                  <li>Profiles</li>
               </a>
               <a href="/members/classpoints/">
                  <li>Class Points</li>
               </a>
            </ul>
         </td>
         <td class="nav-list" id="prospective"></td>
         <td class="nav-list" id="alumni"></td>
         <td class="nav-list" id="sponsors"></td>
         <td class="nav-list" id="store"></td>
      </tr>
   </table>
</nav>

<script type="text/javascript">
   /* GoTo */
   function goTo (href)
   {
      window.location = href;
   }
   /* NAVBAR DROPDOWN SHOWING/HIDING */
   var hovered = {
      "about" : false,
      "events" : false,
      "outreach" : false,
      "members" : false,
      "prospective" : false,
      "alumni" : false,
      "sponsors" : false,
      "store" : false
   };
   $(function ()
   {
      $(".navbutton").hover(function ()
      {
         var id = $(this).attr("id");
         hovered[id] = true;
         var dropdown = $(".nav > .dropdown-bar#" + id + " #" + id);
         $(".nav > .dropdown-bar#" + id).css("display", "table");
         if (dropdown.find("ul").length > 0)
         {
            dropdown.css("visibility", "visible");
         }
      }, function ()
      {
         var id = $(this).attr("id");
         hovered[id] = false;
         // wait to see if list hover set to true
         setTimeout(function () {
            if (!(hovered[id]))
            {
               $(".nav > .dropdown-bar#" + id).hide();
               $(".nav > .dropdown-bar#" + id + " #" + id).css("visibility", "hidden");
               $(".navbutton#" + id).css("background-color", "")
                                    .find(".navtext")
                                    .css("color", "");
            }
         }, 1);
      });

      $(".nav-list").hover(function () {
         var id = $(this).attr("id");
         hovered[id] = true;

         $(".navbutton#" + id).css("background-color", "#3d6aa2")
                              .find(".navtext")
                              .css("color", "#ebc62f");
      }, function ()
      {
         var id = $(this).attr("id");
         hovered[id] = false;
         // wait to see if button hover set to true
         setTimeout(function () {
            if (!(hovered[id]))
            {
               $(".nav > .dropdown-bar#" + id).hide();
               $(".nav > .dropdown-bar#" + id + " #" + id).css("visibility", "hidden");
               $(".navbutton#" + id).css("background-color", "")
                                    .find(".navtext")
                                    .css("color", "");
            }
         }, 1);
      })
   });

   /* Coming Soon nav items */
   $(".navbutton.coming").hover(function ()
   {
      var text = $(this).find(".navtext");
      var cur_text = text.text();
      var set_text = "Coming Soon";
      text.text(set_text)
          .attr("meta", cur_text)
          .css("font-size", "0.8rem");
   }, function () 
   {
      var text = $(this).find(".navtext");
      var set_text = text.attr("meta");
      text.text(set_text)
          .css("font-size", "");
   });

   /* Coming Soon nav-list items */
   $("a.coming li").hover(function ()
   {
      var text = $(this).text();
      var set_text = "COMING SOON";

      $(this).text(set_text)
             .attr("meta", text)
             .css("font-size", "0.8rem")
             .css("line-height", "19px");
   }, function ()
   {
      var set_text = $(this).attr("meta");
      $(this).text(set_text)
             .css("font-size", "")
             .css("line-height", "");
   });
</script>