<?php

   echo '<div class="topnav v-align">';

   if ($selected == "home")
   {
      echo '<span class="topnavitem selected"><a href="/about/">Home</a></span>';
   }
   else
   {
      echo '<span class="topnavitem"><a href="/about/">Home</a></span>';
   }

   if ($selected == "scholarship")
   {
      echo '<span class="topnavitem selected"><a href="/about/scholarship/">Scholarship</a></span>';
   }
   else
   {
      echo '<span class="topnavitem"><a href="/about/scholarship/">Scholarship</a></span>';
   }

   if ($selected == "society")
   {
      echo '<span class="topnavitem selected"><a href="/about/society/">Society</a></span>';
   }
   else
   {
      echo '<span class="topnavitem"><a href="/about/society/">Society</a></span>';
   }

   // if ($selected == "leadership")
   // {
   //    echo '<span class="topnavitem selected"><a href="/about/leadership">Leadership</a></span>';
   // }
   // else
   // {
   //    echo '<span class="topnavitem"><a href="/about/leadership">Leadership</a></span>';
   // }

   if ($selected == "constitution")
   {
      echo '<span class="topnavitem selected"><a href="/about/constitution">Constitution</a></span>';
   }
   else
   {
      echo '<span class="topnavitem"><a href="/about/constitution">Constitution</a></span>';
   }

   echo '</div>';

?>