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

        <div class="row g-4">
          <div class="col-lg-8">
            <div class="border rounded shadow-sm bg-white p-4 mb-4">
              <div class="d-flex justify-content-between align-items-center mb-3 pb-2 border-bottom">
                <h5 class="fw-bold mb-0" style="color: var(--bs-primary);">
                  <i class="fas fa-user me-2"></i> HỒ SƠ
                </h5>
                <button class="btn border-secondary fw-bold" id="account-btn-edit-profile" style="color: var(--bs-primary); text-decoration: none;">
                  CHỈNH SỬA <i class="fas fa-edit ms-1"></i>
                </button>
              </div>

              <form id="profile-form" method="POST" action="<?= ROOT_URL ?>account/update">
                <div class="row g-3">
                  <div class="col-4 fw-bold">Họ và Tên</div>
                  <div class="col-8">
                    <input type="text" name='hoten' class="form-control" value="<?= $user['hoten'] ?>" readonly>
                  </div>

                  <div class="col-4 fw-bold">Email</div>
                  <div class="col-8">
                    <input type="email" name= 'email' class="form-control" value="<?= $user['email'] ?>" readonly>
                  </div>

                  <div class="col-4 fw-bold">Số điện thoại</div>
                  <div class="col-8">
                    <input type="tel" name='sdt' class="form-control" value="<?= $user['sdt'] ?>" readonly>
                  </div>

                  <div class="col-4 fw-bold">Giới tính</div>
                  <div class="col-8">
                    <div class="d-flex gap-4">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="male"
                          value="Nam" <?= $user['gioitinh'] == 1 ? 'checked' : '' ?> readonly>
                        <label class="form-check-label" for="male">Nam</label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="female"
                          value="Nữ" <?= $user['gioitinh'] == 0 ? 'checked' : '' ?> readonly>
                        <label class="form-check-label" for="female">Nữ</label>
                      </div>
                    </div>
                  </div>

                  <div class="col-4 fw-bold">Địa chỉ</div>
                  <div class="col-8">
                    <?php if ($user['diachi'] == NULL): ?>
                      <p class="text-muted mb-4">Bạn chưa có địa chỉ nào được lưu.</p>
                    <?php else: ?>
                      <input type="text" name = 'diachi' class="form-control" value="<?= $user['diachi'] ?>" readonly>
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

              <div class="row g-3">
                <div class="col-4 fw-bold">Mật khẩu</div>
                <div class="col-8">
                  <input type="password" class="form-control" value="<?= $user['matkhau'] ?>" 
                         id="account-input-edit-password-mobile" readonly>
                </div>
              </div>
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
              <div class="row g-3">
                <div class="col-5 fw-bold">Mật khẩu</div>
                <div class="col-7">
                  <input type="password" class="form-control" value="<?= $user['matkhau'] ?>" 
                  id="account-input-edit-password-desktop" readonly>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>