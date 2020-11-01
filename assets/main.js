$(function () {
    $('#PiTact').submit(function (e){
        e.preventDefault();
        var icon;
        $.ajax({
            url: "inc/mailer.php",
            method: 'POST',
            data: $(this).serialize(),
            dataType: 'json',
            success: function (data) {
                if(data.status == 0) {
                    icon = 'error';
                } else {
                    icon = 'success';
                    $('#PiTact')[0].reset();
                }
                swal({
                    icon: icon,
                    title: data.msg
                });
            }
        });
    });
});