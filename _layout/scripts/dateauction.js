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
   $(".profilenavitem").click(function ()
   {
      $("#currentframe").animate({left: 0}, 200);
      $("#currentframe").attr("id", "frame" + currentframe);
      
      currentframe = Number($(this).attr("meta"));
      var prevframe = currentframe - 1;
      var nextframe = currentframe + 1;
      
      $(".profilewrap img").fadeOut(200, function ()
      {
         $(".profilewrap img").attr("src", "/resources/images/dateauction/" + names[currentframe] + ".png");
      });
      $(".profilewrap img").fadeIn(200);
      
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

      $(".profilewrap img").fadeOut(200, function ()
      {
         $(".profilewrap img").attr("src", "/resources/images/dateauction/" + names[currentframe] + ".png");
      });
      $(".profilewrap img").fadeIn(200);

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
      
      $(".profilewrap img").fadeOut(200, function ()
      {
         $(".profilewrap img").attr("src", "/resources/images/dateauction/" + names[currentframe] + ".png");
      });
      $(".profilewrap img").fadeIn(200);

      $("#frame" + currentframe).animate({left: "380px"}, 200);
      $("#frame" + currentframe).attr("id", "currentframe");

      $(".nextframe").show();

      if (!($("#frame" + prevframe).length))
         $(".prevframe").hide();
   });
});