$(document).ready(function() {
    $("form").submit(function() {
        var firstname = $.trim($("#firstname").val());
        var lastname = $.trim($("#lastname").val());
        if (firstname === "" || lastname === "") {
            alert("Fields are empty.");
            return false;
        }
    });
});