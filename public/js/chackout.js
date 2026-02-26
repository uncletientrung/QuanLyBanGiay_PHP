const checkbox = document.getElementById("chackout-address-checkbox");
const textareaBox = document.getElementById("chackout-address-textarea");
checkbox.addEventListener("change", function() {
    if (checkbox.checked === true) {
        textareaBox.style.display = "block";
    } else {
        textareaBox.style.display = "none";
    }

});