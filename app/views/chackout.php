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
    <form action="#">
      <div class="row g-5">
        <div class="col-md-12 col-lg-7 col-xl-6">
          <div class="form-item">
            <label class="form-label my-3">Họ và Tên<sup>*</sup></label>
            <input type="text" class="form-control">
          </div>
          <div class="form-item">
            <label class="form-label my-3">Địa chỉ nhận hàng <sup>*</sup></label>
            <input type="text" class="form-control" placeholder="Địa chỉ mặc định của người dùng">
          </div>
          <div class="form-item">
            <label class="form-label my-3">Số điện thoại<sup>*</sup></label>
            <input type="tel" class="form-control">
          </div>
          <div class="form-item">
            <label class="form-label my-3">Email<sup>*</sup></label>
            <input type="email" class="form-control">
          </div>
          <hr>
          <div class="form-check my-3">
            <input class="form-check-input" type="checkbox" id="Address-1" name="Address" value="Address">
            <label class="form-check-label" for="Address-1">Giao hàng đến 1 địa chỉ khác?</label>
          </div>
          <div class="form-item">
            <textarea name="text" class="form-control" spellcheck="false" cols="30" rows="11" placeholder="Nhập địa chỉ nhận hàng khác"></textarea>
          </div>
        </div>
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
              <tbody>
                <tr>
                  <th scope="row">
                    <div class="d-flex align-items-center mt-2">
                      <img src="img/vegetable-item-2.jpg" class="img-fluid rounded-circle" style="width: 90px; height: 90px;" alt="">
                    </div>
                  </th>
                  <td class="py-5">Awesome Brocoli</td>
                  <td class="py-5">$69.00</td>
                  <td class="py-5">2</td>
                  <td class="py-5">$138.00</td>
                </tr>
                <tr>
                  <th scope="row">
                    <div class="d-flex align-items-center mt-2">
                      <img src="img/vegetable-item-5.jpg" class="img-fluid rounded-circle" style="width: 90px; height: 90px;" alt="">
                    </div>
                  </th>
                  <td class="py-5">Potatoes</td>
                  <td class="py-5">$69.00</td>
                  <td class="py-5">2</td>
                  <td class="py-5">$138.00</td>
                </tr>
                <tr>
                  <th scope="row">
                    <div class="d-flex align-items-center mt-2">
                      <img src="img/vegetable-item-3.png" class="img-fluid rounded-circle" style="width: 90px; height: 90px;" alt="">
                    </div>
                  </th>
                  <td class="py-5">Big Banana</td>
                  <td class="py-5">$69.00</td>
                  <td class="py-5">2</td>
                  <td class="py-5">$138.00</td>
                </tr>
                <tr>
                  <th scope="row">
                  </th>
                  <td class="py-5">
                    <p class="mb-0 text-dark text-uppercase py-3">Tổng Tiền</p>
                  </td>
                  <td class="py-5"></td>
                  <td class="py-5"></td>
                  <td class="py-5">
                    <div class="py-3 border-bottom border-top">
                      <p class="mb-0 text-dark">$135.00</p>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="row g-4 text-center align-items-center justify-content-center border-bottom py-3">
            <div class="col-12">
              <div class="form-check text-start my-1">
                <input type="checkbox" class="form-check-input bg-primary border-0" id="Transfer-1" name="Transfer" value="Transfer">
                <label class="form-check-label" for="Transfer-1">Chuyển Khoản</label>
              </div>
              <p class="text-start text-dark">Vui lòng chuyển khoản vào QR hiện lên sau khi nhấn "Đặt Hàng". Sau khi chuyển 
                khoản hệ thống sẽ tự ghi nhận và lên đơn hàng. </p>
            </div>
          </div>
          <div class="row g-4 text-center align-items-center justify-content-center border-bottom py-3">
            <div class="col-12">
              <div class="form-check text-start my-1">
                <input type="checkbox" class="form-check-input bg-primary border-0" id="Delivery-1" name="Delivery" value="Delivery">
                <label class="form-check-label" for="Delivery-1">Thanh Toán Khi Nhận Hàng</label>
              </div>
            </div>
          </div>
          <div class="row g-4 text-center align-items-center justify-content-center border-bottom py-3">
            <div class="col-12">
              <div class="form-check text-start my-1">
                <input type="checkbox" class="form-check-input bg-primary border-0" id="Paypal-1" name="Paypal" value="Paypal">
                <label class="form-check-label" for="Paypal-1">VNPay</label>
              </div>
            </div>
          </div>
          <div class="row g-4 text-center align-items-center justify-content-center pt-4">
            <button type="button" class="btn border-secondary py-3 px-4 text-uppercase w-100 text-primary">Đặt Hàng</button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
<!-- Checkout Page End -->

</html>