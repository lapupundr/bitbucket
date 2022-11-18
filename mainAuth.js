// "use strict";
const form = document.getElementsByTagName('form')[0];
const login = document.getElementById('login');
const password = document.getElementById('password');
const loginError = document.querySelector('#login + span.error');
const passwordError = document.querySelector('#password + span.error');
// const passConfirmError = document.querySelector('#pass_confirm + span.error');
let errorData = true;

form.addEventListener('input', function (event) {
    if (errorData) {
        $('#btn_auth').prop('disabled', true);
    } else {
        $('#btn_auth').prop('disabled', false);
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

password.addEventListener('input', function (event) {
    if (password.validity.valid) {
        passwordError.textContent = '';
        passwordError.className = 'error';
        errorData = false;
    } else {
        showPassError();
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

function showPassError() {
    errorData = true;
    if (password.validity.valueMissing) {
        passwordError.textContent = 'You need to enter a password.';
    } else if (password.validity.tooShort) {
        passwordError.textContent = `Password should consist of numbers, letters and 6 symbols length`;
    }
    passwordError.className = 'error active';
}


