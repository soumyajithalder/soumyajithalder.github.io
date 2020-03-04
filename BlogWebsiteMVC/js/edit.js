$(document).ready(function () {
    $("#update").click(function () {
        event.preventDefault();
        var title = $("#title").val();
        var post = $("#post").val();
        var userImage = $("#img").val();
        // Returns successful data submission message when the entered information is stored in database.
        var dataString = 'title=' + title + '&post=' + post + '&userImage=' + userImage;
        if (title == '' || post == '' || userImage == '') {
            alert("Please Fill All Fields");
        } else {
            // AJAX Code To Submit Form.
            $.ajax({
                type: "POST",
                url: "../Controller/edit-ajax.php",
                data: dataString,
                cache: false,
                success: function(response){
                    $('#success').html(response);
                }
            });
        }
        return false;
    });
});
