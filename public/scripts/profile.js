function sendOTP(userId) {
    const getOTP = document.getElementById("getOTP");
    console.log(getOTP)
    getOTP.disabled = true;
    getOTP.textContent = "Đã gửi mã!";

    const XHR = new XMLHttpRequest();

    let formData = new FormData();
    formData.append("userId", userId)

    XHR.open("POST", `${envVars.apiUrl}/auth/sendOTP`);

    XHR.send(formData);
}