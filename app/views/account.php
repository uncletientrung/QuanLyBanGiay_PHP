<style>
  :root {
    --primary: #0b2a5b;
    --primary-dark: #081f44;
    --primary-light: #1a4a8b;
  }
  /* 2. Tiêu đề lớn "Tài khoản của tôi - Bảng điều khiển" */
  h3.fw-bold {
    color: var(--primary) !important;
  }

  /* 3. Các tiêu đề phần nhỏ (HỒ SƠ, MẬT KHẨU) */
  h5.fw-bold.mb-0 {
    color: var(--primary) !important;
  }

  /* 4. Nút ĐĂNG XUẤT + CHỈNH SỬA (cả desktop & mobile) */
  #account-btn-logout,
  #account-btn-edit-profile,
  #account-btn-edit-password-mobile,
  #account-btn-edit-password-desktop,
  .btn.border-secondary.fw-bold {
    color: var(--primary) !important;
    border-color: var(--primary) !important;
    background-color: white !important;
    transition: all 0.25s;
  }

  #account-btn-logout:hover,
  #account-btn-edit-profile:hover,
  #account-btn-edit-password-mobile:hover,
  #account-btn-edit-password-desktop:hover,
  .btn.border-secondary.fw-bold:hover {
    background-color: var(--primary) !important;
    color: white !important;
    border-color: var(--primary) !important;
  }

  /* 5. Alert success / error - đồng bộ màu */
  .alert-success {
    background-color: rgba(11, 42, 91, 0.1) !important;
    border-color: rgba(11, 42, 91, 0.3) !important;
    color: var(--primary) !important;
  }

  .alert-secondary.text-danger {
    color: #dc3545 !important; /* giữ đỏ cho error */
  }

  /* 6. Radio button (Nam/Nữ) - làm nổi bật khi checked */
  .form-check-input:checked {
    background-color: var(--primary) !important;
    border-color: var(--primary) !important;
  }

  /* 7. Input khi focus */
  .form-control:focus {
    border-color: var(--primary) !important;
    box-shadow: 0 0 0 0.25rem rgba(11, 42, 91, 0.25) !important;
  }

  /* 8. Icon toggle mắt (password) - màu accent */
  .toggle-password {
    color: var(--primary) !important;
  }

  /* 9. (Tùy chọn) Hover dòng thông tin */
  .row.g-3 > div:hover {
    background-color: rgba(11, 42, 91, 0.03);
  }

  /* 10. Border các card */
  .border.rounded.shadow-sm {
    border-color: rgba(11, 42, 91, 0.15) !important;
  }
</style>
<!-- Trang ẩn Start -->
<!-- <div class="container-fluid py-4">
  <h1 class="text-center text-white display-6"></h1>
</div> -->
<div class="container-fluid page-header py-5">
  <h1 class="text-center text-white display-6">Tài khoản của tôi</h1>
  <ol class="breadcrumb justify-content-center mb-0">
    <li class="breadcrumb-item"><a href="<?= ROOT_URL ?>">Trang chủ</a></li>
    <li class="breadcrumb-item active text-white">Tài khoản của tôi</li>
  </ol>
</div>
<!-- Trang ẩn End -->

<div class="container-fluid py-5">
  <div class="container py-4">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div class="d-flex justify-content-between align-items-center mb-4">
          <h3 class="fw-bold" style="color: var(--bs-primary);">
            Tài khoản của tôi - Bảng điều khiển
          </h3>
          <a class="btn border-secondary fw-bold px-4 py-2" id="account-btn-logout" style="color: var(--bs-primary); text-decoration: none;">
            ĐĂNG XUẤT
          </a>
        </div>

        <div class="alert alert-success text-center fw-bold text-primary"
          role="alert"
          id="success-message"
          style="display: none;">
          <i class="fas fa-check-circle me-2"></i>Chỉnh sửa thành công!
        </div>

        <div class="alert alert-secondary text-center fw-bold text-danger"
          role="alert"
          id="error-message"
          style="display: none;">
          <i class="fas fa-times-circle me-2"></i> Chỉnh sửa thất bại!
        </div>

        <div class="row g-4">
          <div class="col-lg-8">
            <div class="border rounded shadow-sm bg-white p-4 mb-4">
              <div class="d-flex justify-content-between align-items-center mb-3 pb-2 border-bottom">
                <h5 class="fw-bold mb-0" style="color: var(--bs-primary);">
                  <i class="fas fa-user me-2"></i> HỒ SƠ
                </h5>
                <button
                  class="btn border-secondary fw-bold" id="account-btn-edit-profile"
                  style="color: var(--bs-primary); text-decoration: none;"
                  type="button">
                  CHỈNH SỬA <i class="fas fa-edit ms-1"></i>
                </button>
              </div>

              <form id="profile-form">
                <div class="row g-3">
                  <div class="col-4 fw-bold">Họ và Tên</div>
                  <div class="col-8">
                    <input type="text" name='hoten' class="form-control" value="<?= $user['hoten'] ?>" readonly>
                  </div>

                  <div class="col-4 fw-bold">Email</div>
                  <div class="col-8">
                    <input type="email" name='email' class="form-control" value="<?= $user['email'] ?>" readonly>
                  </div>

                  <div class="col-4 fw-bold">Số điện thoại</div>
                  <div class="col-8">
                    <input type="tel" name='sdt' class="form-control" value="<?= $user['sdt'] ?>" readonly>
                  </div>

                  <div class="col-4 fw-bold">Giới tính</div>
                  <div class="col-8">
                    <div class="d-flex gap-4">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="gioitinh" id="male"
                          value="1" <?= $user['gioitinh'] == 1 ? 'checked' : '' ?>>
                        <label class="form-check-label" for="male">Nam</label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="gioitinh" id="female"
                          value="0" <?= $user['gioitinh'] == 0 ? 'checked' : '' ?>>
                        <label class="form-check-label" for="female">Nữ</label>
                      </div>
                    </div>
                  </div>

                  <div class="col-4 fw-bold">Địa chỉ</div>
                  <div class="col-8">
                    <?php if ($user['diachi'] == NULL): ?>
                      <p class="text-muted mb-4">Bạn chưa có địa chỉ nào được lưu.</p>
                    <?php else: ?>
                      <input type="text" name='diachi' class="form-control" value="<?= $user['diachi'] ?>" readonly>
                    <?php endif ?>
                  </div>
                </div>
              </form>
            </div>

            <!-- Hiển thị trên mobile -->
            <div class="border rounded shadow-sm bg-white p-4 mb-4 d-lg-none">
              <div class="d-flex justify-content-between align-items-center mb-3 pb-2 border-bottom">
                <h5 class="fw-bold mb-0" style="color: var(--bs-primary);">
                  <i class="fas fa-lock me-2"></i> MẬT KHẨU
                </h5>
                <a class="btn fw-bold border-secondary"
                  style="color: var(--bs-primary); text-decoration: none;"
                  id="account-btn-edit-password-mobile">
                  CHỈNH SỬA <i class="fas fa-edit ms-1"></i>
                </a>
              </div>

              <form id="password-form-mobile">
                <div class="row g-3">
                  <!-- Mật khẩu cũ -->
                  <div style="display: flex;">
                    <div class="col-4 fw-bold">Mật khẩu</div>
                    <div class="col-8">
                      <div class="input-group">
                        <input
                          type="password"
                          class="form-control"
                          name="password"
                          id="account-input-password-mobile"
                          value="<?= $user['matkhau'] ?>"
                          readonly>
                        <span class="input-group-text bg-white border-start-0 toggle-password"
                          style="cursor: pointer;">
                          <i class="fas fa-eye eye-icon"></i>
                        </span>
                      </div>
                    </div>
                  </div>

                  <!-- Mật khẩu mới -->
                  <div style="display: none;" id="mobile-form-password-new">
                    <div class="col-4 fw-bold">Mật khẩu mới</div>
                    <div class="col-8">
                      <div class="input-group">
                        <input
                          type="password"
                          class="form-control"
                          name="password-new"
                          id="account-input-passwordNew-mobile">
                        <span class="input-group-text bg-white border-start-0 toggle-password"
                          style="cursor: pointer;">
                          <i class="fas fa-eye eye-icon"></i>
                        </span>
                      </div>
                    </div>
                  </div>

                  <!-- Xác nhận mật khẩu -->
                  <div style="display: none;" id="mobile-form-password-confirm">
                    <div class="col-4 fw-bold">Xác nhận</div>
                    <div class="col-8">
                      <div class="input-group">
                        <input
                          type="password"
                          class="form-control"
                          name="password-confirm"
                          id="account-input-passwordConfirm-mobile">
                        <span class="input-group-text bg-white border-start-0 toggle-password"
                          style="cursor: pointer;">
                          <i class="fas fa-eye eye-icon"></i>
                        </span>
                      </div>
                    </div>
                  </div>

                </div>
              </form>
            </div>
          </div>

          <!-- Hiển thị trên desktop -->
          <div class="col-lg-4 d-none d-lg-block">
            <div class="border rounded shadow-sm bg-white p-4" style="top: 120px;">
              <div class="d-flex justify-content-between align-items-center mb-3 pb-2 border-bottom">
                <h5 class="fw-bold mb-0" style="color: var(--bs-primary);">
                  <i class="fas fa-lock me-2"></i> MẬT KHẨU
                </h5>
                <a class="btn fw-bold border-secondary"
                  style="color: var(--bs-primary); text-decoration: none;"
                  id="account-btn-edit-password-desktop">
                  CHỈNH SỬA <i class="fas fa-edit ms-1"></i>
                </a>
              </div>

              <form id="password-form-desktop">
                <div class="row g-3 ">
                  <div style="display: flex;">
                    <div class="col-4 fw-bold">Mật khẩu</div>
                    <div class="col-8">
                      <div class="input-group">
                        <input
                          type="password"
                          class="form-control"
                          value="<?= $user['matkhau'] ?>"
                          id="account-input-edit-password-desktop"
                          name="password"
                          readonly>
                        <span class="input-group-text bg-white border-start-0 toggle-password"
                          style="cursor: pointer;">
                          <i class="fas fa-eye eye-icon"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div style="display: none;" id="form-password-new">
                    <div class="col-4 fw-bold">Mật khẩu mới</div>
                    <div class="col-8">
                      <div class="input-group">
                        <input
                          type="password"
                          class="form-control"
                          id="account-input-edit-passwordNew-desktop"
                          name="password-new">
                        <span class="input-group-text bg-white border-start-0 toggle-password"
                          style="cursor: pointer;">
                          <i class="fas fa-eye eye-icon"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div style="display: none;" id="form-password-confirm">
                    <div class="col-4 fw-bold">Xác nhận mật khẩu</div>
                    <div class="col-8">
                      <div class="input-group">
                        <input
                          type="password"
                          class="form-control"
                          id="account-input-edit-passwordConfirm-desktop"
                          name="password-confirm">
                        <span class="input-group-text bg-white border-start-0 toggle-password"
                          style="cursor: pointer;">
                          <i class="fas fa-eye eye-icon"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>