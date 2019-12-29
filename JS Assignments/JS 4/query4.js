$(document).ready(function() {
    $("header").click(function()
        {
            $("header").css("background-color","blue");
        });
    $("#sidebar").click(function()
        {
            $("#sidebar").text("Leftbar");
        });
    $("#extracontent").click(function()
        {
            $("#maincontent").fadeOut();
        });
});