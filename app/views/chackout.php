<!-- Single Page Header start -->
<div class="container-fluid page-header py-5">
  <h1 class="text-center text-white display-6">Checkout</h1>
  <ol class="breadcrumb justify-content-center mb-0">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active text-white">Checkout</li>
  </ol>
</div>
<!-- Single Page Header End -->


<!-- Checkout Page Start -->
<div class="container py-3">
  <div class="container py-3">
    <h1 class="mb-4">Thông tin hóa đơn</h1>
    <form action="<?= ROOT_URL ?>chackout/add-order" method="POST" id="checkout-form">
      <div class="row g-5">
        <!-- Thông tin người dùng -->
        <div class="col-md-12 col-lg-7 col-xl-6">
          <div class="form-item">
            <label class="form-label my-3">Họ và Tên<sup>*</sup></label>
            <input type="text" class="form-control"
              name="hoten" value="<?= $user['hoten'] ?>" readonly>
          </div>
          <div class="form-item">
            <label class="form-label my-3">Địa chỉ nhận hàng <sup>*</sup></label>
            <input type="text" class="form-control" placeholder="Địa chỉ mặc định của người dùng"
              name="diachi" value="<?= $user['diachi'] ?>" readonly>
          </div>
          <div class="form-item">
            <label class="form-label my-3">Số điện thoại<sup>*</sup></label>
            <input type="tel" class="form-control"
              name="sdt" value="<?= $user['sdt'] ?>" readonly>
          </div>
          <div class="form-item">
            <label class="form-label my-3">Email<sup>*</sup></label>
            <input type="email" class="form-control"
              name="email" value="<?= $user['email'] ?>" readonly>
          </div>
          <hr>
          <div class="form-check my-3">
            <input class="form-check-input" type="checkbox" id="chackout-address-checkbox">
            <label class="form-check-label" for="Address-1">
              Giao hàng đến 1 địa chỉ khác?</label>
          </div>
          <div class="form-item" id="chackout-address-textarea" style="display: none;">
            <textarea name="diachi_khac" class="form-control" spellcheck="false" cols="30" rows="11"
              placeholder="Nhập địa chỉ nhận hàng khác"></textarea>
          </div>
        </div>
        <!-- Giỏ hàng -->
        <div class="col-md-12 col-lg-7 col-xl-6">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Sản Phẩm</th>
                  <th scope="col">Tên Sản Phẩm</th>
                  <th scope="col">Đơn Giá</th>
                  <th scope="col">Số Lượng</th>
                  <th scope="col">Số Tiền</th>
                </tr>
              </thead>
              <!-- Sản phẩm trong giỏ -->
              <tbody>
                <?php if (!empty($carts)): ?>
                  <?php
                  $tongtien = 0;
                  foreach ($carts as $item):
                    $thanhtien = $item['soluong'] * $item['giaban'];
                    $tongtien += $thanhtien;
                  ?>
                    <tr>
                      <th scope="row">
                        <div class="d-flex align-items-center mt-2">
                          <img src="<?= $item['path'] ?>" class="img-fluid rounded-circle" style="width: 90px; height: 90px;" alt="">
                        </div>
                      </th>
                      <td class="py-5"><?= $item['tensp'] ?></td>
                      <td class="py-5"><?= number_format($item['giaban']) ?></td>
                      <td class="py-5"><?= number_format($item['soluong']) ?></td>
                      <td class="py-5"><?= number_format($item['soluong'] * $item['giaban']) ?></td>
                    </tr>
                  <?php endforeach; ?>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
          <!-- Tổng đơn hàng -->
          <div class="text-end fw-bold fs-5 mt-3">
            Tổng tiền: <?= number_format($tongtien) ?> đ
          </div>
          <!-- PT thanh toán -->
          <div class="row g-4 text-center align-items-center justify-content-center border-bottom py-3">
            <div class="col-12">
              <div class="form-check text-start my-1">
                <input type="radio" class="form-check-input bg-primary border-0" id="Transfer-1" 
                      name="phuongthucthanhtoan" value="1">
                <label class="form-check-label" for="Transfer-1">Chuyển Khoản</label>
              </div>
              <p class="text-start text-dark">
                Vui lòng chuyển khoản vào QR hiện lên sau khi nhấn "Đặt Hàng". Sau khi chuyển
                khoản hệ thống sẽ tự ghi nhận và lên đơn hàng.
              </p>
            </div>
          </div>
          <div class="row g-4 text-center align-items-center justify-content-center border-bottom py-3">
            <div class="col-12">
              <div class="form-check text-start my-1">
                <input type="radio" class="form-check-input bg-primary border-0" id="Delivery-1" 
                      name="phuongthucthanhtoan" value="2" checked>
                <label class="form-check-label" for="Delivery-1">Thanh Toán Khi Nhận Hàng</label>
              </div>
            </div>
          </div>

          <div class="row g-4 text-center align-items-center justify-content-center pt-4">
            <button type="submit" class="btn border-secondary py-3 px-4 text-uppercase w-100 text-primary">
              Đặt Hàng
            </button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
<!-- Checkout Page End -->

</html>