var bulletin_edited = false;
var $save = $(".button#save");
var $send = $(".button#send");

function createHandlers ()
{
    $("input").on("input", function () { setEditedState(); });
    $("textarea").on("input", function() { setEditedState(); });
    $("select").on("change", function() { setEditedState(); });

    $send.click(function ()
    {
        sendBulletin();
    });

    $save.click(function ()
    {
        saveAndRecompile();
    });
}

function setEditedState ()
{
    if (!bulletin_edited)
    {
        bulletin_edited = true;
        $send.fadeOut(200, function ()
        {
            $save.fadeIn(200);
        });
    }
}

function setCurrentState ()
{
    if (bulletin_edited)
    {
        bulletin_edited = false;
        $save.fadeOut(200, function ()
        {
            $send.fadeIn(200);
        });
    }
}

function sendBulletin ()
{
    showProcessingModal();

    $.ajax({
        url: "sendBulletin.php",
        type: "POST",
        dataType: "JSON"
    })
    .done(function(response)
    {
        if (response.success)
        {
            var options = {
                src: "/resources/images/eboard/approve_icon.png",
                text: "Sent."
            };
            showModal("notif", options, false);
        }
    });
}

function saveAndRecompile ()
{
    showProcessingModal();

    $.ajax({
        url: "saveBulletinElements.php",
        type: "POST",
        dataType: "JSON"
    })
    .done(function(response)
    {
        if (response.success)
        {
            compileBulletin();
        }
    });
}

function compileBulletin ()
{
    $.ajax({
        url: "compileBulletin.php",
        type: "POST",
        dataType: "JSON"
    })
    .done(function(response)
    {
        if (response.success)
        {
            var options = {
                src: "/resources/images/eboard/approve_icon.png",
                text: "Saved."
            };
            showModal("notif", options, false);
        }
    });
}

$(document).ready(function ()
{
    createHandlers();
});