const fullnameInput = document.querySelector("#fullnameInput")
const emailInput = document.querySelector("#emailInput")
const addressInput = document.querySelector("#addressInput")

const submitButton = document.querySelector("#submitButton")

fullnameInput.addEventListener("blur", () => {
    checkEmpty()
})

emailInput.addEventListener("blur", () => {
    checkEmpty()
})

addressInput.addEventListener("blur", () => {
    checkEmpty()
})

function checkEmpty() {
    if (fullnameInput.value == "" || emailInput.value == ""  || addressInput.value == "") {
        submitButton.disabled = true;
        return false;
    } else {
        submitButton.disabled = false;
        return true;
    }
}

checkEmpty()