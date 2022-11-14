// "use strict";
const form  = document.getElementsByTagName('form')[0];
const email = document.getElementById('mail');
const emailError = document.querySelector('#mail + span.error');

email.addEventListener('input', function (event) {
    console.log('valid email input');

    if (email.validity.valid) {
        emailError.textContent = '';
        emailError.className = 'error';
    } else {
        showError();
    }
});

form.addEventListener('submit', function (event) {
    // Если поле email валдно, позволяем форме отправляться
    console.log('valid email');

    if (!email.validity.valid) {
        // Если поле email не валидно, отображаем соответствующее сообщение об ошибке
        showError();
        // Затем предотвращаем стандартное событие отправки формы
        event.preventDefault();
    }
});

function showError() {
    if (email.validity.valueMissing) {
        // Если поле пустое,
        // отображаем следующее сообщение об ошибке
        emailError.textContent = 'You need to enter an e-mail address.';
    } else if (email.validity.typeMismatch) {
        // Если поле содержит не email-адрес,
        // отображаем следующее сообщение об ошибке
        emailError.textContent = 'Entered value needs to be an e-mail address.';
    } else if (email.validity.tooShort) {
        // Если содержимое слишком короткое,
        // отображаем следующее сообщение об ошибке
        emailError.textContent = `Email should be at least ${email.minLength} characters; you entered ${email.value.length}.`;
    }

    // Задаём соответствующую стилизацию
    emailError.className = 'error active';
}

$(document).ready(function () {
    // $('#btn_reg').prop('disabled', true);
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
