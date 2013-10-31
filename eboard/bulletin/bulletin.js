var post_type = 'event';

function createHandlers ()
{
   $("#post_type").on("change", function ()
   {
      var type = $(this).val();
      changePostType(type);
   });
}

function changePostType (type)
{
   if (post_type != type)
   {
      post_type = type;

      $(".post_form").slideUp();
      $("#" + type + "_post").slideDown();
   }
   

}

$(document).ready(function ()
{
   createHandlers();
});