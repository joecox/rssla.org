$(document).ready(function () 
{
   var names = ["host",
                "Crystal",
                "DylanB",
                "Jordan",
                "DylanR",
                "Julie",
                "Jon",
                "Serena",
                "Angel"]
   
   var currentframe = 0;

   /*$(".auctionee").hover(function(){$(this).append($("<p>Name</p>"));});*/
   
   // frame selection
   $(".auctionee").click(function ()
   {
      $("#currentframe").animate({left: 0}, 200);
      $("#currentframe").attr("id", "frame" + currentframe);
      
      currentframe = Number($(this).attr("meta"));
      var prevframe = currentframe - 1;
      var nextframe = currentframe + 1;
      
      
      $("#frame" + currentframe).animate({left: "380px"}, 200);
      $("#frame" + currentframe).attr("id", "currentframe");
      
      $(".prevframe").show();
      $(".nextframe").show();
      
      if (!($("#frame" + prevframe).length))
         $(".prevframe").hide();
      if (!($("#frame" + nextframe).length))
         $(".nextframe").hide();
   });

   // frame sliding
   $(".nextframe").click(function() 
   {
      $("#currentframe").animate({left: 0}, 200);
      $("#currentframe").attr("id", "frame" + currentframe);

      currentframe = currentframe + 1;
      var nextframe = currentframe + 1;

      $("#frame" + currentframe).animate({left: "380px"}, 200);
      $("#frame" + currentframe).attr("id", "currentframe");

      $(".prevframe").show();

      if (!($("#frame" + nextframe).length))
         $(".nextframe").hide();
   });

   $(".prevframe").click(function() 
   {
      $("#currentframe").animate({left: 0}, 200);
      $("#currentframe").attr("id", "frame" + currentframe);

      currentframe = currentframe - 1;
      var prevframe = currentframe - 1;
      

      $("#frame" + currentframe).animate({left: "380px"}, 200);
      $("#frame" + currentframe).attr("id", "currentframe");

      $(".nextframe").show();

      if (!($("#frame" + prevframe).length))
         $(".prevframe").hide();
   });
});