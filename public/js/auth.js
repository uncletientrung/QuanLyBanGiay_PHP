document.addEventListener('DOMContentLoaded', function () { // Đăng nhập
  const form = document.getElementById('loginForm');
  if (!form) return;

  const emailInput = document.getElementById('loginEmail');
  const passwordInput = document.getElementById('loginPassword');
  const loginBtn = document.getElementById('loginBtn');
  const emailError = document.getElementById('emailError');
  const passwordError = document.getElementById('passwordError');
  const formMessage = document.getElementById('formMessage');

  const togglePassword = document.querySelector('.toggle-password');
  if (togglePassword) {
    togglePassword.addEventListener('click', function () {
      const type = passwordInput.type === 'password' ? 'text' : 'password';
      passwordInput.type = type;
      this.querySelector('i').classList.toggle('fa-eye');
      this.querySelector('i').classList.toggle('fa-eye-slash');
    });
  }
  function validateForm() {
    const emailValue = emailInput.value.trim();
    const passValue = passwordInput.value;

    const isEmailValid = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailValue); // Trả về T/F
    const isPassValid = passValue.length >= 3;

    // Cập nhật trạng thái visual
    emailInput.classList.toggle('is-valid', isEmailValid && emailValue !== '');
    emailInput.classList.toggle('is-invalid', !isEmailValid && emailValue !== '');
    passwordInput.classList.toggle('is-valid', isPassValid);
    passwordInput.classList.toggle('is-invalid', !isPassValid && passValue !== '');

    // Bật tắt nút login
    loginBtn.disabled = !(isEmailValid && isPassValid);

    // Xóa lỗi cũ khi người dùng đang gõ
    if (emailInput === document.activeElement) emailError.textContent = '';
    if (passwordInput === document.activeElement) passwordError.textContent = '';
  }

  // Thêm sự kiện nhập email, password 
  emailInput.addEventListener('input', validateForm);
  passwordInput.addEventListener('input', validateForm);

  // Submit form
  form.addEventListener("submit", function (e) {
    e.preventDefault();

    // Xóa thông báo cũ
    formMessage.textContent = "";
    formMessage.className = "mt-3 text-center";

    const formData = new FormData(form);
    formData.append("login", "1");

    loginBtn.disabled = true;
    loginBtn.textContent = "ĐANG ĐĂNG NHẬP...";

    fetch(ROOT_URL + "login", {
      method: "POST",
      body: formData,
    })
      .then((res) => res.json())
      .then((result) => {
        if (result.success) {
          // Đăng nhập thành công
          formMessage.textContent = "Đăng nhập thành công! Đang chuyển hướng...";
          formMessage.classList.add("text-success");
          setTimeout(() => {
            window.location.href = ROOT_URL;
          }, 100);

        } else {
          if (result.errors) {
            if (result.errors.email) {
              emailError.textContent = result.errors.email;
              emailInput.classList.add("is-invalid");
            }

            if (result.errors.password) {
              passwordError.textContent = result.errors.password;
              passwordInput.classList.add("is-invalid");
            }

            if (result.errors.general) {
              formMessage.textContent = result.errors.general;
              formMessage.classList.add("text-danger");
            }

          } else {
            formMessage.textContent =
              result.message || "Có lỗi xảy ra, vui lòng thử lại.";
            formMessage.classList.add("text-danger");
          }
        }
      })
      .catch((err) => {
        formMessage.textContent = "Không thể kết nối đến database";
        formMessage.classList.add("text-danger");
        console.error(err);
      })
      .finally(() => {
        loginBtn.disabled = false;
        loginBtn.textContent = "ĐĂNG NHẬP";
      });
  });
  validateForm();
});

document.addEventListener('DOMContentLoaded', function () { // Kiểm tra đơn hàng
  const checkForm = document.getElementById('checkOrderForm');
  if (!checkForm) return;

  const orderCodeInput = document.getElementById('orderCode');
  const orderEmailInput = document.getElementById('orderEmail');
  const checkBtn = document.getElementById('checkOrderBtn');
  const orderCodeError = document.getElementById('orderCodeError');
  const orderEmailError = document.getElementById('orderEmailError');
  const messageDiv = document.getElementById('checkOrderMessage');
  const resultDiv = document.getElementById('orderResult');

  function validateCheckOrder() {
    const codeValue = orderCodeInput.value.trim();
    const emailValue = orderEmailInput.value.trim();

    const isCodeValid = /^DH-[0-9]+$/.test(codeValue);
    const isEmailValid = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailValue);

    // Cập nhật visual feedback
    orderCodeInput.classList.toggle('is-valid', isCodeValid && codeValue !== '');
    orderCodeInput.classList.toggle('is-invalid', !isCodeValid && codeValue !== '');
    orderEmailInput.classList.toggle('is-valid', isEmailValid && emailValue !== '');
    orderEmailInput.classList.toggle('is-invalid', !isEmailValid && emailValue !== '');

    // Enable/disable nút
    checkBtn.disabled = !(isCodeValid && isEmailValid);

    // Xóa lỗi field khi đang focus nhập
    if (orderCodeInput === document.activeElement) orderCodeError.textContent = '';
    if (orderEmailInput === document.activeElement) orderEmailError.textContent = '';
  }

  orderCodeInput.addEventListener('input', validateCheckOrder);
  orderEmailInput.addEventListener('input', validateCheckOrder);

  checkForm.addEventListener("submit", function (e) {
    e.preventDefault();

    // Reset trạng thái
    messageDiv.textContent = "";
    messageDiv.className = "mt-4 text-center";
    resultDiv.style.display = "none";
    resultDiv.innerHTML = "";

    const formData = new FormData(checkForm);
    formData.append("checkorder", "1");

    checkBtn.disabled = true;
    checkBtn.textContent = "ĐANG KIỂM TRA...";

    fetch(ROOT_URL + "check-order", {
      method: "POST",
      body: formData,
    })
      .then((res) => res.json())
      .then((result) => {
        if (result.success) {
          messageDiv.textContent = "Đã tìm thấy mã đơn DH-" + result.data.madh;
          messageDiv.classList.add("text-success");

          let html = `
       <div class="card border-0 shadow-sm rounded-3">
        <div class="card-body">

          <h5 class="fw-bold mb-4">Thông tin đơn hàng</h5>

          <div class="row g-4">

            <div class="col-md-6">
              <small class="text-muted d-block">Mã đơn hàng</small>
              <span class="fw-semibold">DH-${result.data.madh || "—"}</span>
            </div>

            <div class="col-md-6">
              <small class="text-muted d-block">Ngày đặt</small>
              <span class="fw-semibold">${result.data.thoigiantao || "—"}</span>
            </div>

            <div class="col-md-6">
              <small class="text-muted d-block">Tên người nhận</small>
              <span class="fw-semibold">${result.data.username || "—"}</span>
            </div>

            <div class="col-md-6">
              <small class="text-muted d-block">Số điện thoại</small>
              <span class="fw-semibold">${result.data.sdt || "—"}</span>
            </div>

            <div class="col-12">
              <small class="text-muted d-block">Địa chỉ giao hàng</small>
              <span class="fw-semibold">${result.data.diachigiaohang || "—"}</span>
            </div>

            <div class="col-md-6">
              <small class="text-muted d-block">Trạng thái</small>
              <span class="badge bg-success px-3 py-2">
                ${result.data.trangthai || "—"}
              </span>
            </div>

            <div class="col-md-6">
              <small class="text-muted d-block">Tổng tiền</small>
              <span class="fw-bold text-danger fs-5">
                ${result.data.tongtien
                    ? Number(result.data.tongtien).toLocaleString("vi-VN") + " ₫"
                    : "—"}
              </span>
            </div>

          </div>

        </div>
      </div>
        `;

          resultDiv.innerHTML = html;
          resultDiv.style.display = "block";
        } else {
          messageDiv.textContent =
            result.message ||
            "Không tìm thấy đơn hàng hoặc thông tin không khớp.";
          messageDiv.classList.add("text-danger");

          if (result.errors) {
            if (result.errors.orderCode) {
              orderCodeError.textContent = result.errors.orderCode;
              orderCodeInput.classList.add("is-invalid");
            }

            if (result.errors.orderEmail) {
              orderEmailError.textContent = result.errors.orderEmail;
              orderEmailInput.classList.add("is-invalid");
            }
            if (result.errors.general) {
              messageDiv.textContent = result.errors.general;
              messageDiv.classList.add("text-danger");
            }
          }
        }
      })
      .catch((err) => {
        messageDiv.textContent =
          "Không thể kết nối. Vui lòng thử lại sau.";
        messageDiv.classList.add("text-danger");
        console.error(err);
      })
      .finally(() => {
        checkBtn.disabled = false;
        checkBtn.textContent = "KIỂM TRA TRẠNG THÁI";
      });
  });

  // Chạy validate lần đầu
  validateCheckOrder();
});