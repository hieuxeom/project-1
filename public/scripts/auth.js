// Register check

const vietnameseFullNameRegex = /^[\p{L}\s']{2,30}$/u;
const usernameRegex = /^[a-zA-Z0-9_]{4,20}$/;
const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
const strongPasswordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;



const fullNameInput = document.querySelector("input[name='fullname']");
const userNameInput = document.querySelector("input[name='username']");
const emailInput = document.querySelector("input[name='email']");
const passwordInput = document.querySelector("input[name='password']");
const rePasswordInput = document.querySelector("input[name='repassword']");
const registerSubmitButton = document.querySelector("#registerSubmit");


function isValidVietnameseFullName(name = fullNameInput.value) {
    return vietnameseFullNameRegex.test(name);
}

function isValidUsername(username = userNameInput.value) {
    return usernameRegex.test(username)
}

function isValidEmail(email = emailInput.value) {
    return emailRegex.test(email)
}

function isStrongPassword(password = passwordInput.value) {
    return strongPasswordRegex.test(password)
}

function isMatchPassword() {
    return passwordInput.value === rePasswordInput.value;
}

function checkEmptyInputs() {
    const inputs = [
        fullNameInput,
        userNameInput,
        emailInput,
        passwordInput,
        rePasswordInput,
    ];

    for (const input of inputs) {
        if (!input.value.trim()) {
            registerSubmitButton.disabled = true;
            return false; // Stop further processing if any input is empty
        }
    }

    if (isValidVietnameseFullName() && isValidUsername() && isValidEmail() && isStrongPassword() && isMatchPassword()) {
        registerSubmitButton.disabled = false;
        return true;
    } else {
        registerSubmitButton.disabled = true;
        return false;
    }
}

fullNameInput.addEventListener("blur", (e) => {
    if (isValidVietnameseFullName(e.target.value)) {
        fullNameInput.classList.remove("is-invalid");
        fullNameInput.classList.add("is-valid")
    } else {
        fullNameInput.classList.remove("is-valid");
        fullNameInput.classList.add("is-invalid")
    }
    checkEmptyInputs();
});


checkEmptyInputs();
userNameInput.addEventListener("blur", (e) => {
    if (isValidUsername(e.target.value)) {
        userNameInput.classList.remove("is-invalid");
        userNameInput.classList.add("is-valid")
    } else {
        userNameInput.classList.remove("is-valid");
        userNameInput.classList.add("is-invalid")
    }
    checkEmptyInputs();
});

emailInput.addEventListener("blur", (e) => {
    if (isValidEmail(e.target.value)) {
        emailInput.classList.remove("is-invalid");
        emailInput.classList.add("is-valid")
    } else {
        emailInput.classList.remove("is-valid");
        emailInput.classList.add("is-invalid")
    }
    checkEmptyInputs();
});

passwordInput.addEventListener("blur", (e) => {
    if (isStrongPassword(e.target.value)) {
        passwordInput.classList.remove("is-invalid");
        passwordInput.classList.add("is-valid")
    } else {
        passwordInput.classList.remove("is-valid");
        passwordInput.classList.add("is-invalid")
    }
    checkEmptyInputs();
});

rePasswordInput.addEventListener("blur", () => {
    if (isMatchPassword()) {
        rePasswordInput.classList.remove("is-invalid");
        rePasswordInput.classList.add("is-valid")
    } else {
        rePasswordInput.classList.remove("is-valid");
        rePasswordInput.classList.add("is-invalid")
    }
    checkEmptyInputs();
});

