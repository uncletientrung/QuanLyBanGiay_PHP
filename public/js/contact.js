document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('contactForm');
    if (!form) return;

    const userInput = document.getElementById('userInput');
    const emailInput = document.getElementById('emailInput');
    const contentInput = document.getElementById('contentInput');
    const btnSend = document.getElementById('btnSend');

    function checkFormValidity() {
        const nameValue = userInput.value.trim();
        const emailValue = emailInput.value.trim();
        const contentValue = contentInput.value.trim();

        const isNameValid = nameValue.length >= 2;
        const isEmailValid = emailValue.length > 5 && emailValue.includes('@') && emailValue.includes('.');
        const isContentValid = contentValue.length >= 10;
        btnSend.disabled = !(isNameValid && isEmailValid && isContentValid);
        if (!btnSend.disabled) {
            btnSend.style.opacity = '1';
            btnSend.style.cursor = 'pointer';
        } else {
            btnSend.style.opacity = '0.5';
            btnSend.style.cursor = 'not-allowed';
        }
    }
    function isValidEmail(email) {
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
    }

    userInput.addEventListener('input', checkFormValidity);
    emailInput.addEventListener('input', checkFormValidity);
    contentInput.addEventListener('input', checkFormValidity);

    form.addEventListener('submit', function (e) {
        e.preventDefault();

        const userValue = userInput.value.trim();
        const emailValue = emailInput.value.trim();
        const contentValue = contentInput.value.trim();

        if (
            userValue === '' ||
            emailValue === '' ||
            contentValue === '' ||
            !isValidEmail(emailValue)
        ) {
            alert('Vui lòng nhập đầy đủ và đúng định dạng thông tin.');
            return;
        }
        const formData = new FormData(form);
        formData.append("send-email", "1");

        btnSend.disabled = true;
        btnSend.innerText = 'Đang gửi...';

        fetch(ROOT_URL + "contact/send-email", {
            method: 'POST',
            body: formData,
        })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Gửi thất bại');
                }
                return response.json();
            })
            .then(data => {
                if (!data.success) {
                    throw new Error(data.message || 'Gửi email thất bại');
                }

                alert(data.message || 'Gửi email thành công');
                window.location.href = ROOT_URL + 'contact';
            })
            .catch(error => {
                console.error(error);
                alert('Có lỗi xảy ra khi gửi email');
            })
            .finally(() => {
                btnSend.disabled = false;
                btnSend.innerText = 'Gửi';
            });
    });

    checkFormValidity();
});