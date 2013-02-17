$(document).ready(function ()
{
   var numInput = 0;
   $(".addinput").click(function ()
   {
      var newInput = '<div class="input">' +
                     '<label for="input' +
                     numInput +
                     '">Input Label: </label>' +
                     '<input type="text" name="input' +
                     numInput + 
                     '" class="labelinput"></div>';
      $(newInput).appendTo("form");

      numInput = numInput + 1;
   });
});