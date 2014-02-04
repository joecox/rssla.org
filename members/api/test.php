<html>
   <head>
      <?php
         $json = file_get_contents("http://rssla.org/members/api/members.php?dev=true");
      ?>
      <script>
         var json = <?php echo $json; ?>;
      </script>
   </head>
</html>