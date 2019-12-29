$(document).ready(function() {
    $("footer").click(function()
        {
            $("#popup").css({"display":"flex","justify-content":"center","align-items":"center"});
        });
    $("#btn").click(function()
        {
            $("#popup").css("display","none");
        });
});