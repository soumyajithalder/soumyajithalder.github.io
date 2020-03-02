$(document).ready(function () {
    var form = $('#mainform');

    $(form).submit(function (event) {
        event.preventDefault();
        
        var formData=$(form).serialize();
        
        if(formData==''){
            alert("Please Fill All Fields");
        }
        else{
            $.ajax({
                type: "POST",
                url: "../Controller/addpost.php",,
                data: formData,
                success: function(resonse){
                    $('#success').html(resonse);
                }
            });
        }
        var form=document.getElementById('mainform').reset();
        return false;
    });
});