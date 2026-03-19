<!-- Header (giữ nguyên) -->
<div class="container-fluid page-header py-4">
  <h1 class="text-center text-white display-6">Chi Tiết Đơn Hàng DH-<?= $madh ?></h1>
  <ol class="breadcrumb justify-content-center mb-0">
    <li class="breadcrumb-item"><a href="<?= ROOT_URL ?>">Trang chủ</a></li>
    <li class="breadcrumb-item"><a href="<?= ROOT_URL ?>track-order">Đơn hàng của tôi</a></li>
    <li class="breadcrumb-item active text-white">DH-<?= $madh ?></li>
  </ol>
</div>

<div class="container py-5">
  <div class="row g-4">
    <!-- Cột trái-->
    <div class="col-lg-5">
      <div class="checkout-section bg-light rounded-3 p-4 shadow-sm">
        <h4 class="mb-4 fw-bold text-navy">Thông tin nhận hàng</h4>

        <div class="order-info mb-4">
          <div class="info-item d-flex justify-content-between mb-2">
            <span class="text-muted">Người nhận:</span>
            <strong class="text-dark"><?= $user['hoten'] ?></strong>
          </div>
          <div class="info-item d-flex justify-content-between mb-2">
            <span class="text-muted">Số điện thoại:</span>
            <strong class="text-dark"><?= $user['sdt'] ?></strong>
          </div>
          <div class="info-item d-flex justify-content-between mb-3">
            <span class="text-muted">Địa chỉ:</span>
            <strong class="text-dark text-end"><?= $order['diachigiaohang'] ?></strong>
          </div>
          <div class="info-item d-flex justify-content-between">
            <span class="text-muted">Ngày đặt hàng:</span>
            <strong class="text-dark"><?= $order_create ?></strong>
          </div>
        </div>

        <hr class="my-4 border-secondary-subtle">

        <h5 class="mb-3 fw-bold text-navy">Phương thức thanh toán</h5>
        <p class="mb-4 text-dark fw-medium">
          <?= $order['hinhthucthanhtoan'] == "Tiền mặt"
            ? 'Thanh toán khi nhận hàng (COD)'
            : 'Chuyển khoản ngân hàng' ?>
        </p>

        <h5 class="mb-3 fw-bold text-navy">Trạng thái đơn hàng</h5>
        <span class="badge 
      <?php
      $status = $order['trangthai'];
      echo match ($status) {
        0     => 'bg-warning text-dark',
        1     => 'bg-success text-white',
        2     => 'bg-primary text-white',
        -1    => 'bg-danger text-white',
        default => 'bg-secondary text-white'
      };
      ?>
      px-4 py-2 fs-6 fw-bold d-inline-block">
          <?= $order_status ?>
        </span>
        <?php if ($order['trangthai'] == 0): ?>
          <div class="mt-3">
            <a href="track-order/cancel-order?madh=<?= $order['madh'] ?>"
              class="btn btn-outline-danger rounded-pill px-4"
              onclick="return confirm('Bạn có chắc muốn hủy đơn hàng này không?')">
              Hủy đơn
            </a>
          </div>
        <?php endif; ?>
      </div>
    </div>

    <!-- Cột phải-->
    <div class="col-lg-7">
      <div class="order-summary bg-white border border-secondary-subtle rounded-3 p-4">
        <h4 class="mb-4 fw-bold text-navy">Sản phẩm đã đặt</h4>
        <div class="table-responsive">
          <table class="table table-borderless">
            <thead class="bg-light">
              <tr>
                <th>Sản phẩm</th>
                <th>Tên</th>
                <th>SL</th>
                <th>Thành tiền</th>
              </tr>
            </thead>
            <tbody>
              <!-- Row ví dụ - bạn loop PHP -->
              <?php if (!empty($order_details)): ?>
                <?php foreach ($order_details as $detail): ?>
                  <tr>
                    <td><img src="<?= $detail['main-image'] ?>" style="width:60px;height:60px;object-fit:cover;border-radius:6px;" alt=""></td>
                    <td>
                      <?= $detail['sanpham']['tensp'] ?><br>
                      <small class="text-muted">Size: <?= $detail['tensize'] ?> - Màu: <?= $detail['tenmau'] ?></small>
                    </td>
                    <td><?= $detail['soluong'] ?></td>
                    <td class="fw-bold text-danger"><?= number_format($detail['dongia'] * $detail['soluong']) ?></td>
                  </tr>
                <?php endforeach; ?>
              <?php endif ?>
            </tbody>
          </table>
        </div>

        <hr class="my-4">

        <div class="d-flex justify-content-between mb-2">
          <span>Tổng tiền hàng:</span>
          <span class="fw-bold"><?= number_format($tongtien) ?></span>
        </div>
        <div class="d-flex justify-content-between mb-2">
          <span>Phí vận chuyển:</span>
          <span class="text-success">Miễn phí</span>
        </div>
        <div class="d-flex justify-content-between fs-5 fw-bold">
          <span>Tổng thanh toán:</span>
          <span class="text-danger"><?= number_format($tongtien) ?></span>
        </div>
      </div>
    </div>
  </div>
</div>

<style>
  .text-navy {
    color: var(--navy) !important;
  }

  .step-circle {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 14px;
    font-weight: bold;
    margin: 0 auto 4px;
  }

  .order-summary {
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
  }

  .checkout-section {
    box-shadow: 0 2px 12px rgba(0, 0, 0, 0.06);
    border: 1px solid rgba(0, 0, 0, 0.04);
  }

  .order-info {
    background: rgba(255, 255, 255, 0.5);
    padding: 16px;
    border-radius: 10px;
    border: 1px solid rgba(0, 0, 0, 0.06);
  }

  .info-item {
    font-size: 1rem;
    line-height: 1.5;
  }

  .info-item span.text-muted {
    min-width: 110px;
    display: inline-block;
    flex-shrink: 0;
  }

  .info-item strong {
    font-weight: 600;
    color: #1a1a1a;
  }

  .text-end {
    text-align: right;
  }

  .badge.fs-6 {
    font-size: 1.05rem !important;
    padding: 0.65em 1.4em !important;
    border-radius: 50px !important;
    letter-spacing: 0.3px;
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

  /* Responsive nhỏ gọn hơn trên mobile */
  @media (max-width: 576px) {
    .info-item {
      flex-direction: column;
      align-items: flex-start;
      gap: 4px;
    }

    .info-item span.text-muted {
      min-width: auto;
    }
  }
</style>