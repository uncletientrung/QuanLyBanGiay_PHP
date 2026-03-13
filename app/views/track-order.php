<!-- Single Page Header start -->
<div class="container-fluid page-header py-5" style="background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url(../img/hero-img-nike.jpg);">
  <h1 class="text-center text-white display-6">Đơn Hàng Của Tôi</h1>
  <ol class="breadcrumb justify-content-center mb-0">
    <li class="breadcrumb-item"><a href="<?= ROOT_URL ?>" class="text-white">Trang chủ</a></li>
    <li class="breadcrumb-item active text-white">Kiểm tra đơn hàng</li>
  </ol>
</div>
<!-- Single Page Header End -->

<!-- Orders Section Start -->
<div class="container-fluid py-5">
  <div class="container">

    <!-- Tabs trạng thái -->
    <ul class="nav nav-tabs nav-justified mb-4 border-bottom-0" id="orderTabs" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active fw-bold" id="all-tab" data-bs-toggle="tab" data-bs-target="#all" type="button" role="tab">Tất cả</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link fw-bold" id="processing-tab" data-bs-toggle="tab" data-bs-target="#processing" type="button" role="tab">Đang xử lý</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link fw-bold" id="shipping-tab" data-bs-toggle="tab" data-bs-target="#shipping" type="button" role="tab">Đang giao</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link fw-bold" id="delivered-tab" data-bs-toggle="tab" data-bs-target="#delivered" type="button" role="tab">Đã giao</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link fw-bold text-danger" id="cancelled-tab" data-bs-toggle="tab" data-bs-target="#cancelled" type="button" role="tab">Đã hủy</button>
      </li>
    </ul>

    <!-- Tab content -->
    <div class="tab-content" id="orderTabContent">
      <div class="tab-pane fade show active" id="all" role="tabpanel">

        <!-- Không có đơn hàng -->
        <div class="text-center py-5 my-5 d-none" id="no-orders">
          <i class="fa fa-box-open fa-5x text-muted mb-4"></i>
          <h4 class="text-muted mb-3">Bạn chưa có đơn hàng nào</h4>
          <p class="text-muted mb-4">Hãy tiếp tục mua sắm nhé!</p>
          <a href="<?= ROOT_URL ?>products" class="btn btn-primary px-5 py-3 rounded-pill">
            <i class="fa fa-arrow-left me-2"></i> Quay lại cửa hàng
          </a>
        </div>

        <!-- Danh sách đơn hàng dạng card -->
        <div class="row g-4" id="orders-list">

          <!-- Ví dụ 1 card đơn hàng (bạn sẽ loop tương tự bằng PHP) -->
          <div class="col-12">
            <div class="card order-card shadow-sm border-0 rounded-3 overflow-hidden hover-shadow"
              style="transition: all 0.3s; cursor: pointer;"
              onclick="location.href='chi-tiet-don-hang?madh=12345';"> <!-- link chi tiết -->

              <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <div>
                    <small class="text-muted">Mã đơn: #123456789</small><br>
                    <small class="text-muted">Ngày đặt: 12/03/2026 - 09:45</small>
                  </div>
                  <span class="badge bg-warning text-dark px-3 py-2 fs-6 fw-bold">
                    Chờ xác nhận
                  </span>
                </div>

                <!-- Sản phẩm trong đơn (hiển thị 1-2 sp đại diện + số lượng còn lại) -->
                <div class="d-flex align-items-center mb-3">
                  <img src="path/to/product1.jpg" alt="" class="rounded me-3" style="width: 70px; height: 70px; object-fit: cover;">
                  <div class="flex-grow-1">
                    <p class="mb-1 fw-bold product-name">Áo Nike Dri-FIT phiên bản giới hạn</p>
                    <small class="text-muted">Size: L × 1</small>
                  </div>
                  <div class="text-end">
                    <p class="mb-0 fw-bold text-danger">980.000₫</p>
                  </div>
                </div>

                <!-- Nếu nhiều sản phẩm -->
                <small class="text-primary d-block mb-3">+ 2 sản phẩm khác</small>

                <hr class="my-3">

                <div class="d-flex justify-content-between align-items-center">
                  <div>
                    <small class="text-muted">Tổng tiền:</small><br>
                    <strong class="fs-5 text-dark">2.450.000₫</strong>
                  </div>
                  <button class="btn btn-outline-secondary rounded-pill px-4">
                    Xem chi tiết
                  </button>
                </div>
              </div>
            </div>
          </div>

          <!-- Card mẫu 2: Đã giao -->
          <div class="col-12">
            <div class="card order-card shadow-sm border-0 rounded-3 overflow-hidden">
              <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <div>
                    <small class="text-muted">Mã đơn: #987654321</small><br>
                    <small class="text-muted">Ngày đặt: 05/03/2026 - 14:20</small>
                  </div>
                  <span class="badge bg-success text-white px-3 py-2 fs-6 fw-bold">
                    Đã giao
                  </span>
                </div>

                <div class="d-flex align-items-center mb-3">
                  <img src="path/to/product2.jpg" alt="" class="rounded me-3" style="width: 70px; height: 70px; object-fit: cover;">
                  <div class="flex-grow-1">
                    <p class="mb-1 fw-bold">Giày Air Jordan 1 High</p>
                    <small class="text-muted">Size: 42 × 1</small>
                  </div>
                  <div class="text-end">
                    <p class="mb-0 fw-bold text-danger">3.200.000₫</p>
                  </div>
                </div>

                <hr class="my-3">

                <div class="d-flex justify-content-between align-items-center">
                  <div>
                    <small class="text-muted">Tổng tiền:</small><br>
                    <strong class="fs-5 text-dark">3.200.000₫</strong>
                  </div>
                  <button class="btn btn-outline-secondary rounded-pill px-4">
                    Mua lại
                  </button>
                </div>
              </div>
            </div>
          </div>

          <!-- Thêm nhiều card khác tương tự -->

        </div>
      </div>

      <!-- Các tab khác (pending, processing, shipping, delivered, cancelled) -->
      <!-- Bạn copy phần trên và thay đổi id, class badge tương ứng -->

    </div>
  </div>
</div>
<!-- Orders Section End -->

<!-- CSS bổ sung (thêm vào file CSS của bạn) -->
<style>
  .order-card {
    border: 1px solid #dce3f0;
    background: #fff;
  }

  .order-card:hover {
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    transform: translateY(-3px);
  }

  .badge {
    font-size: 0.9rem !important;
  }

  .bg-warning {
    background-color: #ffc107 !important;
  }

  .bg-success {
    background-color: var(--navy) !important;
  }

  /* hoặc màu xanh bạn thích */
  .bg-danger {
    background-color: #dc3545 !important;
  }

  .hover-shadow:hover {
    box-shadow: 0 0 45px rgba(11, 61, 145, 0.2) !important;
    /* navy nhẹ */
  }
</style>