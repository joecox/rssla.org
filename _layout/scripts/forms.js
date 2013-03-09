   /* FORM ACTIONS */
$(document).ready(function ()
{
   // Form validation
   $(".button#submit").click(function ()
   {
      var anyBad = false;
      $("input[type='text'].required").each(function () 
      {
         if ($(this).attr("name") == "optgender")
            return;
         else
         {
            if ($(this).val() == "")
            {
               $(this).parents(".inputwrap").css("background-color", "rgba(255,0,0,0.2)");
               anyBad = true;
               return;
            }
            else
               $(this).parents(".inputwrap").css("background-color", "white");
         }
      });
      $(".radiowrap.required").each(function () 
      {
         var nonechecked = true;
         $(this).children().each(function ()
         {
            if ($(this).prop("checked"))
            {
               nonechecked = false;
               return;
            }
         });
         if (nonechecked)
         {
            anyBad = true;
            $(this).parents(".inputwrap").css("background-color", "rgba(255,0,0,0.2)");
         }
         else
            $(this).parents(".inputwrap").css("background-color", "white");
      });
      $(".checkwrap.required").each(function () 
      {
         var nonechecked = true;
         $(this).children().each(function ()
         {
            if ($(this).prop("checked"))
            {
               nonechecked = false;
               return;
            }
         });
         if (nonechecked)
         {
            anyBad = true;
            $(this).parents(".inputwrap").css("background-color", "rgba(255,0,0,0.2)");
         }
         else
            $(this).parents(".inputwrap").css("background-color", "white");
      });
      $("textarea.required").each(function () 
      {
         if ($(this).val() == "")
         {
            $(this).parents(".inputwrap").css("background-color", "rgba(255,0,0,0.2)");
            anyBad = true;
            return;
         }
         else
            $(this).parents(".inputwrap").css("background-color", "white");
      });
      // Select bar validation
      $(".selectbar.required").each(function () 
      {
         var nonechecked = true;
         $(this).children(".button.radio").each(function ()
         {
            if ($(this).hasClass("selected"))
            {
               nonechecked = false;
               return;
            }
         });
         if (nonechecked)
         {
            anyBad = true;
            $(this).css("background-color", "rgba(255,0,0,0.2)");
         }
         else
            $(this).css("background-color", "white");
      });
      if (!anyBad)
         $(this).parent().parents("form").submit();
      else
      {
         $('html, body').animate({scrollTop: $("[style$='rgba(255, 0, 0, 0.2);']").first().offset().top});
      }
   });

   


   $(".button.radio").click(function ()
   {
      $(".button.radio.selected").each(function ()
      {
         var val = $(this).attr("value");
         $(this).siblings(".radiowrap").children("input[value=" + val + "]").prop("checked", false);
      })
      $(".button.radio.selected").removeClass("selected");
      $(this).addClass("selected");
      var val = $(this).attr("value");
      $(this).siblings(".radiowrap").children("input[value=" + val + "]").prop("checked", true);
   });

   $("label.required").append("<span style='color:red'> *</span");

   $("input[type='text']").prop("size", "30");

   $(".sidenavitem").click(function ()
   {
      $(this).addClass("selected");
      $(this).parent().siblings("a").children(".sidenavitem").removeClass("selected");
   });
});