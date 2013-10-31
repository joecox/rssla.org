<?php
   /* Replace the names each year.
    * Here is how to remember the naming convention:
    * Abbreviations are abbreviations (e.g. arl)
    * Otherwise, the variable name is the first letters of the full office name until you'd hit a vowel (but minimum 3 letters).
    * 
    * FL is full name, FN is first name, LN is last name, MID is the memberID of their profile.
    */

   $presFL = "Keaton Boyle";
   $pres_min = str_replace(' ', '', strtolower($presFL));
   $pres_pieces = explode(' ', $presFL);
   $presFN = $pres_pieces[0];
   $presLN = $pres_pieces[1];
   $presMID = "372";

   $ivpFL = "Christina Chung";
   $ivp_min = str_replace(' ', '', strtolower($ivpFL));
   $ivp_pieces = explode(' ', $ivpFL);
   $ivpFN = $ivp_pieces[0];
   $ivpLN = $ivp_pieces[1];
   $ivpMID = "395";

   $evpFL = "Jonathan Han";
   $evp_min = str_replace(' ', '', strtolower($evpFL));
   $evp_pieces = explode(' ', $evpFL);
   $evpFN = $evp_pieces[0];
   $evpLN = $evp_pieces[1];
   $evpMID = "";

   $treasFL = "Gayan Seneviratna";
   $treas_min = str_replace(' ', '', strtolower($treasFL));
   $treas_pieces = explode(' ', $treasFL);
   $treasFN = $treas_pieces[0];
   $treasLN = $treas_pieces[1];
   $treasMID = "455";

   $secrFL = "Emily Parker";
   $secr_min = str_replace(' ', '', strtolower($secrFL));
   $secr_pieces = explode(' ', $secrFL);
   $secrFN = $secr_pieces[0];
   $secrLN = $secr_pieces[1];
   $secrMID = "351";

   $activFL = "Anna Dornisch";
   $activ_min = str_replace(' ', '', strtolower($activFL));
   $activ_pieces = explode(' ', $activFL);
   $activFN = $activ_pieces[0];
   $activLN = $activ_pieces[1];
   $activMID = "446";

   $commFL = "Joey Cox";
   $comm_min = str_replace(' ', '', strtolower($commFL));
   $comm_pieces = explode(' ', $commFL);
   $commFN = $comm_pieces[0];
   $commLN = $comm_pieces[1];
   $commMID = "401";

   $crdFL = "Joselyn Ho";
   $crd_min = str_replace(' ', '', strtolower($crdFL));
   $crd_pieces = explode(' ', $crdFL);
   $crdFN = $crd_pieces[0];
   $crdLN = $crd_pieces[1];
   $crdMID = "";

   $epdFL = "Sharon Abada";
   $epd_min = str_replace(' ', '', strtolower($epdFL));
   $epd_pieces = explode(' ', $epdFL);
   $epdFN = $epd_pieces[0];
   $epdLN = $epd_pieces[1];
   $epdMID = "";

   $outrFL = "Vishal Yadav";
   $outr_min = str_replace(' ', '', strtolower($outrFL));
   $outr_pieces = explode(' ', $outrFL);
   $outrFN = $outr_pieces[0];
   $outrLN = $outr_pieces[1];
   $outrMID = "";

   $publFL = "Erin Standen";
   $publ_min = str_replace(' ', '', strtolower($publFL));
   $publ_pieces = explode(' ', $publFL);
   $publFN = $publ_pieces[0];
   $publLN = $publ_pieces[1];
   $publMID = "";

   $arlFL = "Brent Louie";
   $pres_min = str_replace(' ', '', strtolower($arlFL));
   $arl_pieces = explode(' ', $arlFL);
   $arlFN = $arl_pieces[0];
   $arlLN = $arl_pieces[1];
   $arlMID = "";

   $lampFL = "Molly Montgomery";
   $lamp_min = str_replace(' ', '', strtolower($lampFL));
   $lamp_pieces = explode(' ', $lampFL);
   $lampFN = $lamp_pieces[0];
   $lampLN = $lamp_pieces[1];
   $lampMID = "";
?>