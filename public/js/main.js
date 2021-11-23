$(document).ready(function () {
    $('#username').keyup(function () {
        var username = $(this).val();
        $.post(
            '../AjaxController/check_username',
            { input: username },
            function (data) {
                if (data == 'true') {
                    $('#mgs').html('username is already exist');
                } else {
                    $('#mgs').html('');
                }
            }
        );
    });
});
