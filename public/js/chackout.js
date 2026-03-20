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

// Hiển thị Toast
function showToast(message) {
    const toast = document.getElementById("toast");
    toast.innerText = message;
    toast.classList.add("show");
    setTimeout(() => {
        toast.classList.remove("show");
    }, 3000);
}
// Hiển thị thông tin ngân hàng
const submitBtn = document.getElementById("submitBtn");
const form = document.getElementById("checkout-form");
const transferRadio = document.getElementById("Transfer-1");

submitBtn.addEventListener("click", function () {
    if (transferRadio.checked) {
        const modal = new bootstrap.Modal(document.getElementById('transferModal'));
        modal.show();
    } else {
        form.submit();
    }
});
document.getElementById("confirmTransfer").addEventListener("click", function () {
    form.submit(); // Bấm xác nhận chuyển khoản
});