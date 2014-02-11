<?php

   include_once($_SERVER["DOCUMENT_ROOT"] . "/_modules/globals.php");
   include_once($DB_MODULE);
   include_once($PRETTY_PRINT_MODULE);

   if (isset($_GET["dev"]) && $_GET["dev"] == "true")
   {
      $first_names = array(
         "Dylan",
         "Nathan",
         "Max",
         "Jonathan",
         "Joey",
         "Evan",
         "Tonya",
         "Jenny",
         "Arvin",
         "Lisa",
         "Austin",
         "Ethan",
         "Patrick"
      );

      $last_names = array(
         "Black",
         "Brucher",
         "Chern",
         "Chu",
         "Cox",
         "Krause",
         "Lee",
         "Li",
         "Nguyen",
         "Nguyen",
         "Park",
         "Rosenberg",
         "Tan"
      );

      $years = array(
         "2",
         "1",
         "1",
         "2",
         "4",
         "1",
         "1",
         "1",
         "1",
         "1",
         "1",
         "3",
         "2"
      );

      for ($ii = 0; $ii < count($years); $ii++)
      {
         $results[$ii] = array(
            "id" => $ii,
            "first_name" => $first_names[$ii],
            "last_name" => $last_names[$ii],
            "year" => $years[$ii]
         );
      }
   }
   else
   {
      db_connect();
      $query = "SELECT id, first_name, last_name, year FROM members WHERE is_active=1 ORDER BY last_name ASC";
      $results = db_select($query);
      db_close();
   }

   echo json_encode($results);

?>