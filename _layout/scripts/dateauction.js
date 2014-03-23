$(document).ready(function () 
{
   var names = ["hosts",
                "Crystal",
                "DylanB",
                "Jordan",
                "DylanR",
                "Julie",
                "Jon",
                "Serena",
                "Angel"]
   
   var currentframe = 0;

   // frame selection
   $(".auctionee").click(function ()
   {
      var auctionee = this;

      $("#currentframe").fadeOut(200,function(){

         $("#currentframe").attr("id", "frame" + currentframe);
      
      currentframe = Number($(auctionee).attr("meta"));
      var prevframe = currentframe - 1;
      var nextframe = currentframe + 1;
      
     
      
      $("#frame" + currentframe).fadeIn(200);
      $("#frame" + currentframe).attr("id", "currentframe");
  

      $(".prevframe").show();
      $(".nextframe").show();

      if (!($("#frame"+prevframe).length))
        $(".prevframe").hide();
      if (!($("#frame"+nextframe).length))
        $(".nextframe").hide();
     
      });

      
   });

   // frame sliding
   $(".nextframe").click(function() 
   {
      $("#currentframe").fadeOut(200,function(){

        $("#currentframe").attr("id", "frame" + currentframe);

      currentframe = currentframe + 1;
      var nextframe = currentframe + 1;

      $("#frame" + currentframe).fadeIn(200);
      $("#frame" + currentframe).attr("id", "currentframe");

      $(".prevframe").show();
      if (!($("#frame" + nextframe).length))
         $(".nextframe").hide();
      });

   });

   $(".prevframe").click(function() 
   {
      $("#currentframe").fadeOut(200,function(){
      
      $("#currentframe").attr("id", "frame" + currentframe);

      currentframe = currentframe - 1;
      var prevframe = currentframe - 1;
      
      $("#frame" + currentframe).fadeIn();
   

      $("#frame" + currentframe).attr("id", "currentframe");

      $(".nextframe").show();

      if (!($("#frame" + prevframe).length))
         $(".prevframe").hide();
      });
    
      
   });
});