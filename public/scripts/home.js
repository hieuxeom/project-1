const d = document;
const listFAQAnswer = d.querySelectorAll(".answer");
const listFAQQuestion = d.querySelectorAll(".question");

var currentToggle = null;
console.log(listFAQAnswer);
function hideAllAnswer() {
    listFAQAnswer.forEach((e) => {
        e.style.display = "none";
    })
}

hideAllAnswer();

listFAQQuestion.forEach((e) => {
    e.addEventListener("click", () => {
        hideAllAnswer();
        let x = e.getAttribute("data-answer")
        let n = d.getElementById("answer"+x).style.display;
        if (x !== currentToggle) {
            d.getElementById("answer"+x).style.display = "block";
            currentToggle = x;
        } else {
            d.getElementById("answer"+x).style.display = "none";
            currentToggle = null;

        }
    })
})

