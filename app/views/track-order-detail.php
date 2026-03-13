<!-- Header (giữ nguyên) -->
<div class="container-fluid page-header py-4">
  <h1 class="text-center text-white display-6">Chi Tiết Đơn Hàng #<?= $madh ?></h1>
  <ol class="breadcrumb justify-content-center mb-0">
    <li class="breadcrumb-item"><a href="<?= ROOT_URL ?>">Trang chủ</a></li>
    <li class="breadcrumb-item"><a href="<?= ROOT_URL ?>my-orders">Đơn hàng của tôi</a></li>
    <li class="breadcrumb-item active text-white">#<?= $madh ?></li>
  </ol>
</div>

<!-- Order Detail gọn - giống checkout -->
<div class="container py-5">
  <div class="row g-4">

    <!-- Cột trái: Info nhận hàng + Phương thức thanh toán + Trạng thái (tất cả trong 1 khối) -->
    <div class="col-lg-5">
      <div class="checkout-section bg-light rounded-3 p-4">
        <h4 class="mb-4 fw-bold text-navy">Thông tin nhận hàng</h4>
        <p class="mb-2"><strong><?= $user['hoten'] ?></strong></p>
        <p class="mb-2">SĐT: <?= $user['sdt'] ?></p>
        <p class="mb-2">Địa chỉ nhận hàng: <?= $order['diachigiaohang'] ?></p>
        <p class="mb-4">Ngày lên đơn: <?= $order_create ?></p>

        <h5 class="mb-3 fw-bold text-navy">Phương thức thanh toán</h5>
        <p class="mb-4"> <?= $order['hinhthucthanhtoan'] == "Tiền mắt"
                            ? 'Thanh toán khi nhận hàng (COD) ' :  'Chuyển khoản' ?></p>

        <!-- Trạng thái đơn hàng - nằm trong cùng khung -->
        <h5 class="mb-3 fw-bold text-navy">Trạng thái đơn hàng</h5>
        <p class="mb-4"> <?= $order_status ?></p>
      </div>
    </div>

    <!-- Cột phải: Sản phẩm + Tổng tiền -->
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
                    <td>2</td>
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
          <span class="fw-bold">5.160.000₫</span>
        </div>
        <div class="d-flex justify-content-between mb-2">
          <span>Phí vận chuyển:</span>
          <span class="text-success">Miễn phí</span>
        </div>
        <div class="d-flex justify-content-between fs-5 fw-bold">
          <span>Tổng thanh toán:</span>
          <span class="text-danger">5.160.000₫</span>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- CSS (thêm hoặc cập nhật vào file CSS của bạn) -->
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

  .checkout-section,
  .order-summary {
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
  }
</style>