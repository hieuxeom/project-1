const addButton =  document.querySelector("#addButton");
const minusButton =  document.querySelector("#minusButton");
const quantityInput = document.querySelector("#quantityInput");
const submitButton = document.querySelector("#submitButton")
const cartId = document.querySelector("#cartId").value;
const prodId = document.querySelector("#prodId").value;
addButton.addEventListener("click", (e) => {
    quantityInput.value = Number(quantityInput.value) + 1;
})

minusButton.addEventListener("click", (e) => {
    if (quantityInput.value != 0) {
        quantityInput.value = Number(quantityInput.value) -  1;
    }
})

submitButton.addEventListener("click", (e) => {
    formData = new FormData();
    formData.append("prodId", prodId);
    formData.append("quantity", Number(quantityInput.value));
    formData.append("cartId", cartId);

    const XHR = new XMLHttpRequest();

    XHR.open("POST", `${envVars.apiUrl}/cart/add`);

    XHR.send(formData);

    window.location = `${envVars.apiUrl}/product`
})