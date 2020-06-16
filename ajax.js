$(document).ready(function () {
    $("#btn").click(
        function () {
            sendAjaxForm('alert', 'ajax_form', 'save_data.php');
            return false;
        }
    );
});

function sendAjaxForm(alert, ajax_form, url) {
    $.ajax({
        url: url,
        type: "POST",
        dataType: "html",
        data: $("#" + ajax_form).serialize(),
        success: function (response) {
            result = $.parseJSON(response);
            if (result.response_message === 'Данные успешно отправлены') {
                $('#alert').html(
                    "<div class='container'><div class='alert alert-success'>"
                    + result.response_message +
                    "</div></div>"
                );
            } else {
                $('#alert').html(
                    "<div class='container'><div class='alert alert-danger'>"
                    + result.response_message +
                    "</div></div>"
                );
            }
        },
        error: function (response) {
            $('#alert').html(
                "<div class='container'><div class='alert alert-danger'>Ошибка. Данные не отправлены</div></div>"
            );
        }
    });
}