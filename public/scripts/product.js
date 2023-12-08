const addButton = document.querySelector("#addButton");
const minusButton = document.querySelector("#minusButton");
const quantityInput = document.querySelector("#quantityInput");
const submitButton = document.querySelector("#submitButton");
const productStock = document.querySelector("#productStock");

function checkValidQuantity() {
    let stock = productStock.getAttribute("data-value");
    let quantity = quantityInput.value;
    console.log(typeof (stock), typeof (quantity))
    return Number(quantity) <= Number(stock);
}


quantityInput.addEventListener("change", () => {
    submitButton.disabled = !checkValidQuantity();
})


var cartId = null
try {
    cartId = document.querySelector("#cartId").value;
} catch (e) {
    cartId = null;
}
const prodId = document.querySelector("#prodId").value;
addButton.addEventListener("click", (e) => {
    quantityInput.value = Number(quantityInput.value) + 1;
    submitButton.disabled = !checkValidQuantity();
})

minusButton.addEventListener("click", (e) => {
    if (quantityInput.value != 0) {
        quantityInput.value = Number(quantityInput.value) - 1;
        submitButton.disabled = !checkValidQuantity();
    }
})

submitButton.addEventListener("click", (e) => {
    if (!cartId) {
        console.log("Không tìm thấy giỏ hàng");
    } else {
        formData = new FormData();
        formData.append("prodId", prodId);
        formData.append("quantity", Number(quantityInput.value));
        formData.append("cartId", cartId);

        const XHR = new XMLHttpRequest();

        XHR.open("POST", `${envVars.apiUrl}/cart/add`);

        XHR.send(formData);

        window.location = `${envVars.apiUrl}/product`;
    }

})