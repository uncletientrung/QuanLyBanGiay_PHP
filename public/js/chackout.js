const checkbox = document.getElementById("chackout-address-checkbox");
const textareaBox = document.getElementById("chackout-address-textarea");
checkbox.addEventListener("change", function () {
    if (checkbox.checked === true) {
        textareaBox.style.display = "block";
        textareaBox.querySelector('textarea').value = "";
    } else {
        textareaBox.style.display = "none";
        textareaBox.querySelector('textarea').value = "";
    }

});