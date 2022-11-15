// "use strict";
const form = document.getElementsByTagName('form')[0];
const login = document.getElementById('login');
const password = document.getElementById('pass');
const pass_confirm = document.getElementById('pass_confirm');
const email = document.getElementById('mail');
const name = document.getElementById('name');
const loginError = document.querySelector('#login + span.error');
const emailError = document.querySelector('#mail + span.error');
const nameError = document.querySelector('#name + span.error');
$('#btn_reg').prop('disabled', true);
let errorData = true;

form.addEventListener('input', function (event) {
    if (errorData) {
        $('#btn_reg').prop('disabled', true);
    } else {
        $('#btn_reg').prop('disabled', false);
    }
})

login.addEventListener('input', function (event) {
    if (login.validity.valid) {
        loginError.textContent = '';
        loginError.className = 'error';
        errorData = false;
    } else {
        showError();
    }
});

email.addEventListener('input', function (event) {
    if (email.validity.valid) {
        emailError.textContent = '';
        emailError.className = 'error';
        errorData = false;
    } else {
        showEmailError();
    }
});

name.addEventListener('input', function (event) {
    if (name.validity.valid) {
        nameError.textContent = '';
        nameError.className = 'error';
        errorData = false;
    } else {
        showNameError();
    }
});

function showError() {
    errorData = true;
    if (login.validity.valueMissing) {
        loginError.textContent = 'You need to enter a login.';
    } else if (login.validity.tooShort) {
        loginError.textContent = `Login should be at least ${login.minLength} characters; you entered ${login.value.length}.`;
    }
    loginError.className = 'error active';
}

function showEmailError() {
    errorData = true;
    if (email.validity.valueMissing) {
        emailError.textContent = 'You need to enter an e-mail address.';
    } else if (email.validity.typeMismatch) {
        emailError.textContent = 'Entered value needs to be an e-mail address.';
    } else if (email.validity.tooShort) {
        emailError.textContent = `Email should be at least ${email.minLength} characters; you entered ${email.value.length}.`;
    }
    emailError.className = 'error active';
}

function showNameError() {
    errorData = true;
    if (name.validity.valueMissing) {
        nameError.textContent = 'You need to enter a name.';
    }else if (name.validity.patternMismatch){
        nameError.textContent = 'Name should contain only letters more than 2'
    }
    nameError.className = 'error active';
}

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
