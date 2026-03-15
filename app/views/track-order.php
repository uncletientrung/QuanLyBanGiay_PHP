<!-- Single Page Header start -->
<div class="container-fluid page-header py-4">
  <h1 class="text-center text-white display-6">Shop</h1>
  <ol class="breadcrumb justify-content-center mb-0">
    <li class="breadcrumb-item"><a href="<?= ROOT_URL ?>">Trang chủ</a></li>
    <li class="breadcrumb-item active text-white">Theo dõi đơn hàng</li>
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
        <!--  Thông báo lên đơn thành công-->
        <?php if (isset($_SESSION['add-order']) && $_SESSION['add-order'] == true): ?>
          <div class="container mt-4">
            <div class="alert alert-success d-flex align-items-center ">
              <i class="fa fa-check-circle"></i>
              <span class="fw-bold">Thêm đơn hàng thành công</span>
            </div>
          </div>
          <?php unset($_SESSION['add-order']); ?>
        <?php endif; ?>

        <!--  Thông báo hủy đơn thành công-->
        <?php if (isset($_SESSION['cancle-order']) && $_SESSION['cancle-order'] == true): ?>
          <div class="container mt-4">
            <div class="alert alert-danger d-flex align-items-center ">
              <i class="fa fa-check-circle"></i>
              <span class="fw-bold">Hủy đơn hàng thành công</span>
            </div>
          </div>
          <?php unset($_SESSION['cancle-order']); ?>
        <?php endif; ?>

        <!-- Danh sách đơn hàng dạng card -->
        <div class="row g-4" id="orders-list">
          <?php if (!empty($orders)) : ?>
            <?php foreach ($orders as $order): ?>

              <div class="col-12">
                <div class="card order-card shadow-sm border-2 border-dark rounded-3 overflow-hidden hover-shadow"
                  style="transition: all 0.3s; cursor: pointer;"
                  data-status="<?= $order['trangthai'] ?>">

                  <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                      <div>
                        <small class="fw-bold text-dark">Mã đơn: DH-<?= $order['madh'] ?></small><br>
                        <small class="fw-bold text-dark">Ngày đặt: <?= $order['thoigiantao'] ?></small>
                      </div>
                      <span class="badge <?php
                                          echo $order['trangthai'] == 0 ? 'bg-warning text-dark' : ($order['trangthai'] == 1 ? 'bg-success text-white' : ($order['trangthai'] == 2 ? 'bg-primary text-white' : ($order['trangthai'] == -1 ? 'bg-danger text-white' : 'bg-secondary text-white')));
                                          ?>
                        px-3 py-2 fs-6 fw-bold">
                        <?= $order['trangthaiDH'] ?>
                      </span>
                    </div>

                    <!-- Nếu nhiều sản phẩm -->
                    <small class="fw-bold text-dark  d-block mb-3"> Tổng <?= $order['soluongSP'] ?> sản phẩm ( <?= $order['soloaiSP'] ?> loại)</small>
                    <hr class="my-3">
                    <div class="d-flex justify-content-between align-items-center">
                      <div>
                        <small class="text-muted">Tổng tiền:</small><br>
                        <strong class="fs-5 text-dark"><?= number_format($order['tongtien']) ?></strong>
                      </div>

                      <div class="d-flex gap-2">

                        <?php if ($order['trangthai'] == 0): ?>
                          <a class="btn btn-outline-danger rounded-pill px-4"
                            href="track-order/cancel-order?madh=<?= $order['madh'] ?>"
                            onclick="return confirm('Bạn có chắc muốn hủy đơn hàng này không?')">
                            Hủy đơn
                          </a>
                        <?php endif; ?>

                        <a class="btn btn-outline-secondary rounded-pill px-4"
                          href="track-order-detail?madh=<?= $order['madh'] ?>">
                          Xem chi tiết
                        </a>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          <?php endif ?>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Orders Section End -->

<!-- CSS bổ sung (thêm vào file CSS của bạn) -->
<style>
  .badge {
    font-size: 0.9rem !important;
  }

  .bg-warning {
    background-color: #ffc107 !important;
  }

  .bg-success {
    background-color: var(--navy) !important;
  }

  .bg-danger {
    background-color: #dc3545 !important;
  }

  .hover-shadow:hover {
    box-shadow: 0 0 45px rgba(11, 61, 145, 0.2) !important;
  }
</style>