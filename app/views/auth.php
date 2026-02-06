<!-- Single Page Header start -->
<div class="container-fluid page-header py-5">
  <h1 class="text-center text-white display-6">Chào mừng bạn</h1>
  <p class="text-center text-white">Đăng nhập hoặc tạo tài khoản để tiếp tục</p>
  <!-- <ol class="breadcrumb justify-content-center mb-0">
    <li class="breadcrumb-item"><a href="<?= ROOT_URL ?>">Trang chủ</a></li>
    <li class="breadcrumb-item active text-white">Đăng nhập</li>
  </ol> -->
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

              <div class="tab-content">
                <div class="tab-pane fade show active" id="login">
                  <form>
                    <div class="mb-3">
                      <label class="form-label fw-bold">EMAIL*</label>
                      <input type="email" class="form-control" placeholder="Nhập email của bạn" required>
                    </div>
                    <div class="mb-3">
                      <label class="form-label fw-bold">MẬT KHẨU*</label>
                      <div class="input-group">
                        <input
                          type="password"
                          class="form-control"
                          placeholder="Nhập mật khẩu"
                          required
                          id="passwordInput">
                        <span class="input-group-text bg-white border-start-0" style="cursor: pointer;">
                          <i class="fas fa-eye eye-icon"></i>
                        </span>
                      </div>
                    </div>
                    <button type="submit" class="btn border-secondary w-100 py-2 fw-bold">
                      ĐĂNG NHẬP
                    </button>
                    <div class="text-center mt-3">
                      <a href="#" class="text-decoration-none" style="color: var(--bs-primary);">
                        QUÊN MẬT KHẨU?
                      </a>
                    </div>
                  </form>
                </div>

                <div class="tab-pane fade" id="register">
                  <form>
                    <div class="mb-3">
                      <label class="form-label fw-bold">HỌ VÀ TÊN*</label>
                      <input type="text" class="form-control" placeholder="Nhập họ tên của bạn" required>
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
                      <input type="email" class="form-control" placeholder="Nhập email của bạn" required>
                    </div>
                    <div class="mb-3">
                      <label class="form-label fw-bold">MẬT KHẨU*</label>
                      <div class="input-group">
                        <input
                          type="password"
                          class="form-control"
                          placeholder="Nhập mật khẩu"
                          required
                          id="registerPassword">
                        <span class="input-group-text bg-white border-start-0" style="cursor: pointer;">
                          <i class="fas fa-eye eye-icon" id="registerEye"></i>
                        </span>
                      </div>
                    </div>
                    <div class="mb-3">
                      <label class="form-label fw-bold">
                        SỐ ĐIỆN THOẠI*
                      </label>
                      <input type="tel" class="form-control" placeholder="Nhập số điện thoại" required>
                    </div>
                    <div class="mb-4">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="emailPuma" checked>
                        <label class="form-check-label" for="emailPuma">
                          Tôi đã đọc và chập nhận chính sách của website
                        </label>
                      </div>
                    </div>
                    <!-- Nút tạo tài khoản -->
                    <button type="submit" class="btn border-secondary w-100 py-3 fw-bold">
                      TẠO TÀI KHOẢN
                    </button>
                  </form>
                </div>
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
                  <input type="text" class="form-control" placeholder="Nhập mã đơn hàng" required>
                </div>

                <div class="mb-4">
                  <label class="form-label fw-bold">EMAIL ĐẶT HÀNG*</label>
                  <input type="email" class="form-control" placeholder="Nhập email đặt hàng" required>
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