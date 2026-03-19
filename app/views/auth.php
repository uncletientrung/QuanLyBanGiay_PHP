<?php
require_once "../QuanLyBanGiay_PHP/config/connectdb.php";
$errors = $_SESSION['login-errors'] ?? [];
$user_email = $_SESSION['login-data']['userEmail'] ?? '';
unset($_SESSION['login-errors']);
unset($_SESSION['login-data']);
?>

<style>
    /* Màu chữ chính cho các tiêu đề cần đổi */
    .nav-link.active,
    .nav-link.fw-bold,
    .form-label.fw-bold,
    #checkOrderForm .form-label.fw-bold {
        color: #2e2e5b !important;
    }

    .form-check-input:checked {
        background-color: #2e2e5b;
        border-color: #2e2e5b;
    }

    .btn.border-secondary {
        color: #2e2e5b;
        border-color: #2e2e5b;
        background-color: transparent;
        transition: all 0.3s ease;
    }

    .btn.border-secondary:hover,
    .btn.border-secondary:focus,
    .btn.border-secondary:active {
        background-color: #2e2e5b;
        color: white;
        border-color: #2e2e5b;
    }

    /* Khi nút bị disabled vẫn giữ tone navy nhẹ */
    .btn.border-secondary:disabled {
        color: #5c5c8a;
        border-color: #5c5c8a;
        opacity: 0.65;
    }

    /* Hover cho eye icon (tùy chọn) */
    .toggle-password:hover,
    .toggle-password-reg:hover {
        color: #2e2e5b;
    }
    /* Bỏ hoàn toàn viền focus (box-shadow xanh) của Bootstrap 5 */
    .form-control:focus,
    .form-check-input:focus,
    .btn:focus,
    input:focus,
    textarea:focus,
    select:focus {
        box-shadow: none !important;     /* quan trọng nhất */
        outline: none !important;        /* phòng trường hợp browser dùng outline */
    }
    *:focus-visible {
        outline: none !important;
        box-shadow: none !important;
    }

    .form-control:focus,
    .form-check-input:focus {
        /* box-shadow: 0 0 0 0.2rem rgba(46, 46, 91, 0.25); */  /* comment nếu muốn bỏ hẳn */
        border-color: #2e2e5b;   /* viền input đổi thành navy khi focus */}
</style>
<!-- Single Page Header start -->
<div class="container-fluid page-header py-5">
  <h1 class="text-center text-white display-6">Chào mừng bạn</h1>
  <p class="text-center text-white">Đăng nhập hoặc tạo tài khoản để tiếp tục</p>
</div>
<!-- Single Page Header End -->

<!-- Form Auth Start -->
<div class="container-fluid featurs py-1">
  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div class="row g-4">
          <div class="col-lg-6">
            <div class="border p-4 rounded shadow-sm bg-white">
              <!-- 2 Tab  -->
              <ul class="nav nav-tabs mb-4 border-0" id="accountTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active fw-bold" id="login-tab" data-bs-toggle="tab" data-bs-target="#login" type="button" role="tab" aria-selected="true">
                    Đăng nhập
                  </button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link fw-bold" id="register-tab" data-bs-toggle="tab" data-bs-target="#register" type="button" role="tab" aria-selected="false">
                    Tạo tài khoản
                  </button>
                </li>
              </ul>

              <!-- Tab content -->
              <div class="tab-content">
                <!-- Tab đăng nhập START-->
                <!-- <div class="tab-pane fade show active" id="login">
                  <form action="<?= ROOT_URL ?>app/controllers/AuthController.php" method="POST">
                    <div class="mb-3">
                      <label class="form-label fw-bold">EMAIL*</label>
                      <input type="text"
                        class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>"
                        name="userEmail"
                        placeholder="Nhập email của bạn"
                        value="<?= $user_email ?>">

                      <?php if (isset($errors['email'])): ?>
                        <div class="invalid-feedback">
                          <?= $errors['email'] ?>
                        </div>
                      <?php endif ?>
                    </div>
                    <div class="mb-3">
                      <label class="form-label fw-bold">MẬT KHẨU*</label>
                      <div class="input-group has-validation">
                        <input
                          type="password"
                          class="form-control <?= isset($errors['password']) ? 'is-invalid' : '' ?>"
                          name="password"
                          placeholder="Nhập mật khẩu"
                          id="passwordInput">
                        <span class="input-group-text bg-white border-start-0" style="cursor: pointer;">
                          <i class="fas fa-eye eye-icon"></i>
                        </span>
                        <?php if (isset($errors['password'])): ?>
                          <div class="invalid-feedback">
                            <?= $errors['password'] ?>
                          </div>
                        <?php endif ?>

                      </div>
                    </div>
                    <button type="submit" name="login" class="btn border-secondary w-100 py-2 fw-bold" >
                      ĐĂNG NHẬP
                    </button>
                    <div class="text-center mt-3">
                      <a href="#" class="text-decoration-none" style="color: var(--bs-primary);">
                        QUÊN MẬT KHẨU?
                      </a>
                    </div>
                  </form>
                </div> -->
                <!-- Tab đăng nhập END -->

                <!-- Tab đăng nhập START-->
                <div class="tab-pane fade show active" id="login">
                  <form id="loginForm" novalidate>
                    <div class="mb-3">
                      <label class="form-label fw-bold">EMAIL*</label>
                      <input type="email"
                        class="form-control"
                        name="userEmail"
                        id="loginEmail"
                        placeholder="Nhập email của bạn"
                        value="<?= htmlspecialchars($user_email) ?>"
                        required>
                      <div class="invalid-feedback" id="emailError"></div>
                    </div>

                    <div class="mb-3">
                      <label class="form-label fw-bold">MẬT KHẨU* </label>
                      <div class="input-group has-validation">
                        <input type="password"
                          class="form-control"
                          name="password"
                          id="loginPassword"
                          placeholder="Nhập mật khẩu (tối thiểu 3 ký tự)"
                          required
                          minlength="3">
                        <span class="input-group-text bg-white border-start-0 toggle-password" style="cursor: pointer;">
                          <i class="fas fa-eye eye-icon"></i>
                        </span>
                        <div class="invalid-feedback" id="passwordError"></div>
                      </div>
                    </div>

                    <button type="submit"
                      id="loginBtn"
                      class="btn border-secondary w-100 py-2 fw-bold"
                      disabled>
                      ĐĂNG NHẬP
                    </button>

                    <!-- <div class="text-center mt-3">
                      <a href="#" class="text-decoration-none" style="color: var(--bs-primary);">
                        QUÊN MẬT KHẨU?
                      </a>
                    </div> -->

                    <!-- Thông báo chung của login-->
                    <div id="formMessage" class="mt-3 text-center" style="min-height: 1.5rem;"></div>
                  </form>
                </div>
                <!-- Tab đăng nhập END -->

                <!-- Tab tạo tài khoản START -->
                <div class="tab-pane fade" id="register">
                  <form id="registerForm" novalidate>
                    <div class="mb-3">
                      <label class="form-label fw-bold">HỌ VÀ TÊN*</label>
                      <input type="text"
                        class="form-control"
                        name="fullName"
                        id="regFullName"
                        placeholder="Nhập họ và tên"
                        required>
                      <div class="invalid-feedback" id="fullNameError">
                        Tên không được chứa ký tự đặc biệt
                      </div>
                    </div>

                    <div class="mb-3">
                      <label class="form-label fw-bold">GIỚI TÍNH</label>
                      <div class="d-flex gap-4">
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="gender" id="male" value="Nam" checked>
                          <label class="form-check-label" for="male">Nam</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="gender" id="female" value="Nữ">
                          <label class="form-check-label" for="female">Nữ</label>
                        </div>
                      </div>
                    </div>

                    <div class="mb-3">
                      <label class="form-label fw-bold">EMAIL*</label>
                      <input type="email"
                        class="form-control"
                        name="email"
                        id="regEmail"
                        placeholder="Nhập email của bạn"
                        required>
                      <div class="invalid-feedback" id="emailError">
                        Email không hợp lệ hoặc đã được sử dụng
                      </div>
                    </div>

                    <div class="mb-3">
                      <label class="form-label fw-bold">MẬT KHẨU*</label>
                      <div class="input-group has-validation">
                        <input type="password"
                          class="form-control"
                          name="password"
                          id="regPassword"
                          placeholder="Nhập mật khẩu (tối thiểu 3 ký tự)"
                          required
                          minlength="3">
                        <span class="input-group-text bg-white border-start-0 toggle-password-reg" style="cursor: pointer;">
                          <i class="fas fa-eye eye-icon"></i>
                        </span>
                        <div class="invalid-feedback" id="passwordError">
                          Mật khẩu phải có ít nhất 3 ký tự
                        </div>
                      </div>
                    </div>

                    <div class="mb-3">
                      <label class="form-label fw-bold">NHẬP LẠI MẬT KHẨU*</label>
                      <div class="input-group has-validation">
                        <input type="password"
                          class="form-control"
                          name="confirmPassword"
                          id="regConfirmPassword"
                          placeholder="Nhập lại mật khẩu"
                          required>
                        <span class="input-group-text bg-white border-start-0 toggle-password-reg" style="cursor: pointer;">
                          <i class="fas fa-eye eye-icon"></i>
                        </span>
                        <div class="invalid-feedback" id="confirmPasswordError">
                          Mật khẩu nhập lại không khớp
                        </div>
                      </div>
                    </div>

                    <div class="mb-3">
                      <label class="form-label fw-bold">SỐ ĐIỆN THOẠI*</label>
                      <input type="tel"
                        class="form-control"
                        name="phone"
                        id="regPhone"
                        placeholder="Nhập số điện thoại"
                        required
                        pattern="^0[0-9]{9}$">
                      <div class="invalid-feedback" id="phoneError">
                        Số điện thoại phải bắt đầu bằng 0 và có 10 số
                      </div>
                    </div>

                    <div class="mb-3">
                      <label class="form-label fw-bold">ĐỊA CHỈ*</label>
                      <input type="text"
                        class="form-control"
                        name="address"
                        id="regAddress"
                        placeholder="Nhập địa chỉ giao hàng"
                        required>
                      <div class="invalid-feedback" id="addressError">
                        Địa chỉ không được chứa ký tự đặc biệt
                      </div>
                    </div>

                    <button type="submit"
                      id="registerBtn"
                      class="btn border-secondary w-100 py-3 fw-bold"
                      disabled>
                      TẠO TÀI KHOẢN
                    </button>

                    <!-- Thông báo chung -->
                    <div id="registerMessage" class="mt-4 text-center" style="min-height: 2rem;"></div>
                  </form>
                </div>
                <!-- Tab tạo tài khoản END -->
              </div>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="border p-4 rounded shadow-sm bg-white h-100">
              <h5 class="mb-3 fw-bold" style="color: #2e2e5b;">
                Kiểm tra trạng thái đơn hàng
              </h5>
              <p class="text-muted mb-4">
                Nếu chưa đăng ký tài khoản, vui lòng nhập mã đơn hàng & email.
              </p>
              <form id="checkOrderForm" novalidate>
                <div class="mb-3">
                  <label class="form-label fw-bold">MÃ ĐƠN HÀNG*</label>
                  <input type="text"
                    class="form-control"
                    name="orderCode"
                    id="orderCode"
                    placeholder="Nhập mã đơn hàng"
                    required
                    pattern="^DH-[0-9]+$">
                  <div class="invalid-feedback" id="orderCodeError">
                    Mã đơn hàng phải có dạng DH-số (ví dụ DH-1, DH-123)
                  </div>
                </div>

                <div class="mb-3">
                  <label class="form-label fw-bold">EMAIL ĐẶT HÀNG*</label>
                  <input type="email"
                    class="form-control"
                    name="orderEmail"
                    id="orderEmail"
                    placeholder="Nhập email đã đặt hàng"
                    required>
                  <div class="invalid-feedback" id="orderEmailError">
                    Vui lòng nhập email hợp lệ
                  </div>
                </div>

                <button type="submit"
                  id="checkOrderBtn"
                  class="btn border-secondary w-100 py-2 fw-bold"
                  disabled>
                  KIỂM TRA TRẠNG THÁI
                </button>

                <!-- Khu vực hiển thị kết quả / lỗi -->
                <div id="checkOrderMessage" class="text-center" style="min-height: 2rem;"></div>

                <!-- Khu vực hiển thị chi tiết đơn hàng (nếu thành công) -->
                <div id="orderResult" class="mt-3" style="display: none;">
                </div>
              </form>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
<!-- Form Auth End -->

</html>