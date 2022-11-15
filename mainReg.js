// "use strict";
const form = document.getElementsByTagName('form')[0];
const login = document.getElementById('login');
const password = document.getElementById('password');
const passConfirm = document.getElementById('pass_confirm');
const email = document.getElementById('mail');
const name = document.getElementById('name');
const loginError = document.querySelector('#login + span.error');
const passError = document.querySelector('#password + span.error');
const passConfirmError = document.querySelector('#pass_confirm + span.error');
const emailError = document.querySelector('#mail + span.error');
const nameError = document.querySelector('#name + span.error');
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

password.addEventListener('input', function (event) {
    if (password.validity.valid) {
        passError.textContent = '';
        passError.className = 'error';
        errorData = false;
    } else {
        showPassError();
    }
});

passConfirm.addEventListener('input', function (event) {
    if (passConfirm.validity.valid) {
        passConfirmError.textContent = '';
        passConfirmError.className = 'error';
        errorData = false;
    } else {
        showPassConfirmError();
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

function showPassError() {
    errorData = true;
    if (password.validity.valueMissing) {
        passError.textContent = 'You need to enter a password.';
    } else if (password.validity.patternMismatch) {
        passError.textContent = `Password should consist of numbers, letters and 6 symbols length`;
    }
    passError.className = 'error active';
}

function showPassConfirmError() {
    errorData = true;
    if (passConfirm.validity.valueMissing) {
        passConfirmError.textContent = 'You need to confirm a password.';
    } else if (password.value === passConfirm.value) {
        console.log(password.value, passConfirm.value);
        passConfirmError.textContent = `Passwords do not match`;
    }
    passConfirmError.className = 'error active';
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


