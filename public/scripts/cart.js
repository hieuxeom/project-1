var formData = new FormData();
const cartId = document.getElementById("cartId").value;

const quantity = document.querySelectorAll(".quantity-input");

quantity.forEach((e) => {
    e.addEventListener("blur", (k) => {
        let prodId = k.target.getAttribute("id").split("=")[1];
        let quantityVal = k.target.value;

        formData.append("prodId", prodId);
        formData.append("quantity", quantityVal);
        formData.append("cartId", cartId);
        //
        const XHR = new XMLHttpRequest();

        XHR.open("POST", `${envVars.apiUrl}/cart/update`);

        XHR.send(formData);
    })
})

function addQuantity(id) {
    let prodId = id
    let quantityBox = document.getElementById(`prodId=${id}`);

    let quantityVal = document.getElementById(`prodId=${id}`).value;

    quantityBox.value = Number(quantityVal) + 1;
    formData.append("prodId", prodId);
    formData.append("quantity", Number(quantityVal) + 1);
    formData.append("cartId", cartId);

    const XHR = new XMLHttpRequest();

    XHR.open("POST", `${envVars.apiUrl}/cart/update`);

    XHR.send(formData);
}

function minusQuantity(id) {
    let prodId = id
    let quantityBox = document.getElementById(`prodId=${id}`);

    let quantityVal = document.getElementById(`prodId=${id}`).value;

    quantityBox.value = Number(quantityVal) - 1;
    formData.append("prodId", prodId);
    formData.append("quantity", Number(quantityVal) - 1);
    formData.append("cartId", cartId);

    const XHR = new XMLHttpRequest();

    XHR.open("POST", `${envVars.apiUrl}/cart/update`);

    XHR.send(formData);
}

