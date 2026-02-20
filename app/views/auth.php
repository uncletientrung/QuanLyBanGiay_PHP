<?php
require_once "../QuanLyBanGiay_PHP/config/connectdb.php";
$errors = $_SESSION['login-errors'] ?? [];
$user_email = $_SESSION['login-data']['userEmail'] ?? '';
unset($_SESSION['login-errors']);
unset($_SESSION['login-data']);
?>


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
                <div class="tab-pane fade show active" id="login">
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
                        <?php if(isset($errors['password'])): ?>
                          <div class="invalid-feedback">
                            <?= $errors['password'] ?>
                          </div>
                        <?php endif ?>

                      </div>
                    </div>
                    <button type="submit" name="login" class="btn border-secondary w-100 py-2 fw-bold">
                      ĐĂNG NHẬP
                    </button>
                    <div class="text-center mt-3">
                      <a href="#" class="text-decoration-none" style="color: var(--bs-primary);">
                        QUÊN MẬT KHẨU?
                      </a>
                    </div>
                  </form>
                </div>
                <!-- Tab đăng nhập END -->

                <!-- Tab tạo tài khoản START -->
                <div class="tab-pane fade" id="register">
                  <form>
                    <div class="mb-3">
                      <label class="form-label fw-bold">HỌ VÀ TÊN*</label>
                      <input type="text" class="form-control is-invalid" placeholder="Nhập họ tên của bạn">
                      <div class="invalid-feedback">
                        Vui lòng nhập họ và tên
                      </div>
                    </div>
                    <div class="mb-3">
                      <label class="form-label fw-bold">GIỚI TÍNH</label>
                      <div class="d-flex gap-4">
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="gender" id="male" value="Nam">
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
                      <input type="email" class="form-control is-invalid" placeholder="Nhập email của bạn">
                      <div class="invalid-feedback">
                        Email không hợp lệ hoặc đã được sử dụng
                      </div>
                    </div>
                    <div class="mb-3">
                      <label class="form-label fw-bold">MẬT KHẨU*</label>
                      <div class="input-group has-validation">
                        <input
                          type="password"
                          class="form-control is-invalid"
                          placeholder="Nhập mật khẩu"
                          id="registerPassword">
                        <span class="input-group-text bg-white border-start-0" style="cursor: pointer;">
                          <i class="fas fa-eye eye-icon" id="registerEye"></i>
                        </span>
                        <div class="invalid-feedback">
                          Mật khẩu phải có ít nhất 6 ký tự
                        </div>
                      </div>
                    </div>
                    <div class="mb-3">
                      <label class="form-label fw-bold">SỐ ĐIỆN THOẠI*</label>
                      <input type="tel" class="form-control is-invalid" placeholder="Nhập số điện thoại">
                      <div class="invalid-feedback">
                        Số điện thoại không hợp lệ (10-11 số)
                      </div>
                    </div>
                    <div class="mb-4">
                      <div class="form-check">
                        <input class="form-check-input is-invalid" type="checkbox" id="emailPuma" checked>
                        <label class="form-check-label" for="emailPuma">
                          Tôi đã đọc và chấp nhận chính sách của website
                        </label>
                        <div class="invalid-feedback d-block">
                          Vui lòng đồng ý với điều khoản sử dụng
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn border-secondary w-100 py-3 fw-bold">
                      TẠO TÀI KHOẢN
                    </button>
                  </form>
                </div>
                <!-- Tab tạo tài khoản END -->
              </div>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="border p-4 rounded shadow-sm bg-white h-100">
              <h5 class="mb-3 fw-bold" style="color: var(--bs-primary);">
                Kiểm tra trạng thái đơn hàng
              </h5>
              <p class="text-muted mb-4">
                Nếu chưa đăng ký tài khoản, vui lòng nhập mã đơn hàng & email.
              </p>
              <form>
                <div class="mb-3">
                  <label class="form-label fw-bold">MÃ ĐƠN HÀNG*</label>
                  <input type="text" class="form-control is-invalid" placeholder="Nhập mã đơn hàng">
                  <div class="invalid-feedback">
                    Mã đơn hàng không tồn tại hoặc chưa nhập
                  </div>
                </div>

                <div class="mb-4">
                  <label class="form-label fw-bold">EMAIL ĐẶT HÀNG*</label>
                  <input type="email" class="form-control is-invalid" placeholder="Nhập email đặt hàng">
                  <div class="invalid-feedback">
                    Vui lòng nhập email đã đặt hàng
                  </div>
                </div>
                <button type="submit" class="btn border-secondary w-100 py-2 fw-bold">
                  KIỂM TRA TRẠNG THÁI
                </button>
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