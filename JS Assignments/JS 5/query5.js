$(document).ready(function() {
    $("footer").click(function()
        {
            $("#popup").css("display","block");
        });
    $("#btn").click(function()
        {
            $("#popup").css("display","none");
        });
});