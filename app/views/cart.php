<!-- Single Page Header start -->
<div class="container-fluid page-header py-5">
  <h1 class="text-center text-white display-6">Cart</h1>
  <ol class="breadcrumb justify-content-center mb-0">
    <li class="breadcrumb-item"><a href="<?= ROOT_URL ?>">Home</a></li>
    <li class="breadcrumb-item active text-white">Cart</li>
  </ol>
</div>
<!-- Single Page Header End -->

<!-- Danh sách giỏ hàng Start -->
<div class="container-fluid py-3">
  <div class="container py-3">
    <div class="row g-5">
      <div class="col-lg-8">
        <div class="table-responsive">
          <!-- Title bảng -->
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Sản Phẩm</th>
                <th scope="col">Tên Sản Phẩm</th>
                <th scope="col">Size</th>
                <th scope="col">Đơn Giá</th>
                <th scope="col">Số Lượng</th>
                <th scope="col">Số Tiền</th>
                <th scope="col">Thao Tác</th>
              </tr>
            </thead>
            <!-- Danh sách sản phẩm trong giỏ -->
            <tbody id="cart-body">
              <?php if (!empty($carts)): ?>
                <?php foreach ($carts as $item): ?>
                  <tr id="cart-row-<?= $item['masp'] ?>">
                    <th scope="row">
                      <div class="d-flex align-items-center">
                        <img src=<?= $item['path'] ?> class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;" alt="">
                      </div>
                    </th>
                    <td>
                      <p class="mb-0 mt-4"><?= $item['tensp'] ?></p>
                    </td>
                    <td>
                      <p class="mb-0 mt-4"><?= $item['tensize'] ?></p>
                    </td>
                    <td>
                      <p class="mb-0 mt-4">
                      <p class="mb-0 mt-4"><?= number_format($item['gia']) ?>₫</p>
                      </p>
                    </td>
                    <!-- Số lượng -->
                    <td>
                      <div class="input-group quantity mt-4" style="width: 100px;">
                        <div class="input-group-btn">
                          <button class="btn btn-sm btn-minus rounded-circle bg-light border"
                            data-masp="<?= $item['masp'] ?>">
                            <i class="fa fa-minus"></i>
                          </button>
                        </div>

                        <input type="text"
                          id="quantity-<?= $item['masp'] ?>"
                          class="form-control form-control-sm text-center border-0"
                          value="<?= $item['soluong'] ?>"
                          readonly>

                        <div class="input-group-btn">
                          <button class="btn btn-sm btn-plus rounded-circle bg-light border"
                            data-masp="<?= $item['masp'] ?>">
                            <i class="fa fa-plus"></i>
                          </button>
                        </div>
                      </div>
                    </td>

                    <td>
                      <p class="mb-0 mt-4" id="price-<?= $item['masp'] ?>">
                        <?= number_format($item['gia'] * $item['soluong']) ?>₫
                      </p>
                    </td>

                    <!-- Thao tác -->
                    <td>
                      <button class="btn btn-md rounded-circle bg-light border mt-4 btn-cart-delete"
                              data-masp="<?= $item['masp'] ?>">
                        <i class="fa fa-times text-danger"></i>
                      </button>
                    </td>

                  </tr>
                <?php endforeach ?>
              <?php else: ?>
                <tr>
                  <td colspan="6">
                    <div class="text-center py-5">
                      <i class="fa fa-shopping-cart fa-4x text-muted mb-4"></i>
                      <h4 class="text-muted mb-3">
                        Không có sản phẩm
                      </h4>
                      <p class="text-muted mb-4">
                        Hãy quay lại cửa hàng để chọn sản phẩm bạn yêu thích
                      </p>
                      <a href="<?= ROOT_URL ?>products" class="btn btn-primary px-4 py-2">
                        <i class="fa fa-arrow-left me-2"></i>
                        Quay lại shop
                      </a>
                    </div>
                  </td>
                </tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>

      <!-- Cart total -->
      <div class="col-lg-4">
        <div class="bg-light rounded">
          <div class="p-4">
            <h1 class="display-6 mb-4">Tổng giỏ hàng</h1>
            <div class="d-flex justify-content-between mb-4">
              <h5 class="mb-0 me-4">Tổng tạm tính:</h5>
              <p class="mb-0" id="cart-total"><?= number_format($total) ?>₫</p>
            </div>
            <div class="d-flex justify-content-between">
              <h5 class="mb-0 me-4">Phí vận chuyển:</h5>
              <div class="">
                <p class="mb-0">Free</p>
              </div>
            </div>
          </div>
          <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
            <h5 class="mb-0 ps-4 me-4">Tổng cộng</h5>
            <p class="mb-0 pe-4" id="cart-total-final"><?= number_format($total) ?>₫</p>
          </div>
          <a
            class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4"
            href="<?= APP_PATH . "chackout" ?>">
            Tiến hành thanh toán
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Danh sách giỏ hàng End -->