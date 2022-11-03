// "use strict";

$(document).ready(function () {
    $("#btn").click(
        function () {
            alert('Нажата submit-кнопка');
            sendAjaxForm('result_form', 'form_reg', '/RegistrationPost');
            return false;
        }
    );
});

function sendAjaxForm(result_form, form_reg, url) {
    $.ajax({
        url: url,
        type: "POST",
        dataType: "html",
        data: $("#" + form_reg).serialize(),
        success: function (response) {
            result = $.parseJSON(response);
            console.log(result);
            $('#result_form').html('Привет ' + result.login + '<br>Твое имя ' + result.name);
        },
        error: function (response) {
            $('#result_form').html('Ошибка. Данные не отправлены.');
        }
    });
}
