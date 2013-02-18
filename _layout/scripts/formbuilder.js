$(document).ready(function ()
{
   var numInput = 0;
   $("#addinput").click(function ()
   {
      numInput = numInput + 1;

      var newInput = '<div class="input" id="q' + numInput + '">' +
                        '<label for="label' + numInput + '">Input Label: </label>' +
                        '<input type="text" name="label' + numInput + '" class="labelinput">' + 
                     
                        '<label for="type' + numInput + '">Type: </label>' +
                        '<select name="type' + numInput + '" id="typeinput">' +
                           '<option value="text">Text</option>' +
                           '<option value="paragraph">Paragraph</option>' +
                           '<option value="radio">Radio buttons</option>' +
                           '<option value="checkbox">Checkboxes</option>' +
                           '<option value="select">Drop-down List</option>' +
                        '</select>' +
                        '<div class="button del">' +
                           '<span>Remove</span>' +
                        '</div>' +
                        '<div class="optionwrap">' +
                        '</div>' +
                        '<div class="button" id="addoption">' +
                           '<span>Add option</span>' +
                        '</div>' +
                        '<input type="hidden" name="q' + numInput + 'numOpt" value="0">' +
                     '</div>';

      $(newInput).appendTo(".contentblock form").hide().slideDown(400, function ()
      {
         var numOptions = 0;
         $(this).children("#addoption").click(function()
         {
            numOptions = numOptions + 1;

            var newOption = '<div class="option">' +
                               '<label for="q' + numInput + 'opt' + numOptions + '">Option ' + numOptions + ': </label>' +
                               '<input type="text" name="q' + numInput + 'opt' + numOptions + '" class="optioninput">' +
/*
                               '<div class="button del" id="del-opt' + numOptions + '">' +
                                  '<span>Remove</span>' +
                               '</div>' +
*/
                            '</div>';

            $(newOption).appendTo($(this).siblings(".optionwrap")).hide().slideDown();
            $(this).siblings('input[type="hidden"]').attr("value", numOptions);

/*
            $(this).siblings(".optionwrap").children(".option").children(".del").click(function () 
            {
               $(this).parents(".option").slideUp(400, function () {$(this).remove();});

               numOptions = numOptions - 1;
               $(this).parents(".option").parents(".optionwrap").siblings('input[type="hidden"]').attr("value", numOptions);
            });
*/
         });

         $(this).siblings('input[type="hidden"]').attr("value", numInput);

         $(this).children("#typeinput").change(function ()
         {
            if ($(this).find('option:selected').val() == "text" || $(this).find('option:selected').val() == "paragraph")
            {
               $(this).siblings(".button#addoption").slideUp();
               $(this).siblings(".optionwrap").children(".option").slideUp(400, function() {
                  $(this).remove();
               });
               $(this).siblings('input[type="hidden"]').attr("value", 0);
               numOptions = 0;
            }
            else
               $(this).siblings(".button#addoption").slideDown().css("display", "inline-block");
         });

         $(this).children(".del").click(function () 
         {
            $(this).parents(".input").slideUp(400, function () {$(this).remove();});

            numInput = numInput - 1;
            $(this).parents(".input").siblings('input[type="hidden"]').attr("value", numInput);
         });
      });
   });
});