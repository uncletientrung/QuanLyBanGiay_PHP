<!-- Single Page Header start -->
<div class="container-fluid page-header py-5">
  <h1 class="text-center text-white display-6">Tài khoản của tôi</h1>
  <ol class="breadcrumb justify-content-center mb-0">
    <li class="breadcrumb-item"><a href="<?= ROOT_URL ?>">Trang chủ</a></li>
    <li class="breadcrumb-item active text-white">Tài khoản của tôi</li>
  </ol>
</div>
<!-- Single Page Header End -->

<div class="container-fluid py-5">
  <div class="container py-4">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div class="d-flex justify-content-between align-items-center mb-4">
          <h3 class="fw-bold" style="color: var(--bs-primary);">
            Tài khoản của tôi - Bảng điều khiển
          </h3>
          <a href="<?= ROOT_URL ?>logout" class="btn border-secondary fw-bold px-4 py-2">
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
                <a href="#" class="fw-bold" style="color: var(--bs-primary); text-decoration: none;">
                  CHỈNH SỬA <i class="fas fa-edit ms-1"></i>
                </a>
              </div>
              <div class="row g-3">
                <div class="col-4 fw-bold">Họ và Tên</div>
                <div class="col-8">
                  <input type="text" class="form-control" value="Độ mixi" readonly>
                </div>

                <div class="col-4 fw-bold">Email</div>
                <div class="col-8">
                  <input type="email" class="form-control" value="mixigaming@gmail.com" readonly>
                </div>

                <div class="col-4 fw-bold">Số điện thoại</div>
                <div class="col-8">
                  <input type="tel" class="form-control" value="84352447642" readonly>
                </div>

                <div class="col-4 fw-bold">Giới tính</div>
                <div class="col-8">
                  <div class="d-flex gap-4">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="gender" id="male" value="Nam" checked readonly>
                      <label class="form-check-label" for="male">Nam</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="gender" id="female" value="Nữ" readonly>
                      <label class="form-check-label" for="female">Nữ</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Hiển thị trên mobile -->
            <div class="border rounded shadow-sm bg-white p-4 mb-4 d-lg-none">
              <div class="d-flex justify-content-between align-items-center mb-3 pb-2 border-bottom">
                <h5 class="fw-bold mb-0" style="color: var(--bs-primary);">
                  <i class="fas fa-lock me-2"></i> MẬT KHẨU
                </h5>
                <a href="#" class="fw-bold" style="color: var(--bs-primary); text-decoration: none;">
                  CHỈNH SỬA <i class="fas fa-edit ms-1"></i>
                </a>
              </div>

              <div class="row g-3">
                <div class="col-4 fw-bold">Mật khẩu</div>
                <div class="col-8">
                  <input type="password" class="form-control" value="•••••••••" readonly>
                </div>
              </div>
            </div>

            <div class="border rounded shadow-sm bg-white p-4">
              <div class="d-flex justify-content-between align-items-center mb-3 pb-2 border-bottom">
                <h5 class="fw-bold mb-0" style="color: var(--bs-primary);">
                  <i class="fas fa-map-marker-alt me-2"></i> SỔ ĐỊA CHỈ
                </h5>
              </div>
              <p class="text-muted mb-4">Bạn chưa có địa chỉ nào được lưu.</p>
              <button class="btn btn-dark w-100 py-3 fw-bold">
                <i class="fas fa-plus me-2"></i> THÊM ĐỊA CHỈ MỚI
              </button>
            </div>
          </div>

          <!-- Hiển thị trên desktop -->
          <div class="col-lg-4 d-none d-lg-block">
            <div class="border rounded shadow-sm bg-white p-4" style="top: 120px;">
              <div class="d-flex justify-content-between align-items-center mb-3 pb-2 border-bottom">
                <h5 class="fw-bold mb-0" style="color: var(--bs-primary);">
                  <i class="fas fa-lock me-2"></i> MẬT KHẨU
                </h5>
                <a href="#" class="fw-bold" style="color: var(--bs-primary); text-decoration: none;">
                  CHỈNH SỬA <i class="fas fa-edit ms-1"></i>
                </a>
              </div>
              <div class="row g-3">
                <div class="col-5 fw-bold">Mật khẩu</div>
                <div class="col-7">
                  <input type="password" class="form-control" value="•••••••••" readonly>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>