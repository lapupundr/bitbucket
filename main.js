// "use strict";
const btnExit = document.getElementById('btn_exit');
$('#btn_reg').prop('disabled', true);
$('#btn_auth').prop('disabled', true);


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
            if (result.error === 'error') {

                if (result.login) {
                    loginError.textContent = result.login;
                    loginError.className = 'error active';
                }
                if (result.password) {
                    passwordError.textContent = result.password;
                    passwordError.className = 'error active';
                }
                if (result.pass_confirm) {
                    passConfirmError.textContent = result.pass_confirm;
                    passConfirmError.className = 'error active';
                }
                if (result.mail) {
                    emailError.textContent = result.mail;
                    emailError.className = 'error active';
                }
                if (result.name) {
                    nameError.textContent = result.name;
                    nameError.className = 'error active';
                }
                btnExit.hidden = true;
            } else {
                $('#result_form').html('Hello, ' + result.name);
                document.getElementById('form_reg').hidden = true;
                btnExit.hidden = false;
                if (result.hidden === 'false') {
                    document.getElementById('btn_forward').hidden = false;
                    btnExit.hidden = true;
                }
            }
        },
        error: function (response) {
            $('#result_form').html('Ошибка. Данные не отправлены.');
        }
    });
}
