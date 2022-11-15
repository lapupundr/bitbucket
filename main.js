// "use strict";

$('#btn_reg').prop('disabled', true);

$(document).ready(function () {
    $("#btn_reg").click(
        function () {
            console.log('Нажата submit-кнопка');
            sendAjaxForm('result_form', 'form_reg', '/RegistrationPost');
            return false;
        }
    );
});

$(document).ready(function () {
    $("#btn_auth").click(
        function () {
            console.log('Нажата submit-кнопка');
            sendAjaxForm('result_form', 'form_reg', '/AuthorizationPost');
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
            $('#result_form').html('Hello, ' + result.name);
            document.getElementById('form_reg').hidden = true;
            if (result.hidden === 'false') {
                document.getElementById('btn_forward').hidden = false;
            }
        },
        error: function (response) {
            $('#result_form').html('Ошибка. Данные не отправлены.');
        }
    });
}
