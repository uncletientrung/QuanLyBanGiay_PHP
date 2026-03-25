<!-- Single Page Header start -->
<div class="container-fluid page-header py-5">
  <h1 class="text-center text-white display-6">Chi Tiết</h1>
  <ol class="breadcrumb justify-content-center mb-0">
    <li class="breadcrumb-item"><a href="<?= ROOT_URL ?>">Trang chủ</a></li>
    <li class="breadcrumb-item"><a href="<?= ROOT_URL . '/products' ?>">Giày</a></li>
    <li class="breadcrumb-item active text-white">Chi tiết</li>
  </ol>
</div>
<!-- Single Page Header End -->

<!-- Single Product Start -->
<div class="container-fluid py-4">
  <div class="container py-4">
    <div class="row g-4 mb-4">
      <div class="col-12">
        <div class="row g-4">
          <!-- Cột trái: Hình ảnh + Tabs  -->
          <div class="col-lg-7">

            <!-- Div mẹ chứa thumbnail + ảnh lớn -->
            <div class="row g-3 mb-4">
              <div class="col-2 d-none d-lg-block">
                <div class="d-flex flex-column gap-2">

                  <?php if (!empty($listHinh)): ?>

                    <?php foreach ($listHinh as $index => $hinh): ?>
                      <img src="<?= $hinh['path'] ?>"
                        class="img-fluid thumb-img <?= $index == 0 ? 'active' : '' ?>"
                        onclick="changeImage(this)"
                        style="cursor: pointer; border: 2px solid transparent; transition: all 0.3s ease; width: 95px; height: 95px; object-fit: cover;">
                    <?php endforeach; ?>

                  <?php else: ?>

                    <?php for ($i = 0; $i < 6; $i++): ?>
                      <img src="<?= ROOT_URL . NO_IMAGE ?>"
                        class="img-fluid thumb-img <?= $i == 0 ? 'active' : '' ?>"
                        onclick="changeImage(this)"
                        style="cursor: pointer; border: 2px solid transparent; transition: all 0.3s ease; width: 95px; height: 95px; object-fit: cover;">
                    <?php endfor; ?>

                  <?php endif; ?>

                </div>
              </div>

              <!-- Ảnh lớn  -->
              <div class="col-10">
                <div class=" product-image-container"
                  style="min-height: 600px; display: flex; align-items: center; justify-content: center; overflow: hidden; background: #ffffff; position: relative;">
                  <img id="mainImage"
                    src="<?= $currentSP['image'] ?>"
                    class="img-fluid product-main-image"
                    style="transition: all 0.4s ease; max-height: 580px; object-fit: contain; cursor: zoom-in; width: 100%;"> <!-- thêm border-radius ở đây -->
                </div>
              </div>
            </div>

            <!-- Tabs mô tả -->
            <div class="ps-lg-0 ps-3">
              <nav>
                <div class="nav nav-tabs mb-3">
                  <button class="nav-link active border-white border-bottom-0" type="button" role="tab"
                    id="nav-about-tab" data-bs-toggle="tab" data-bs-target="#nav-about"
                    aria-controls="nav-about" aria-selected="true">Mô tả</button>
                  <button class="nav-link border-white border-bottom-0" type="button" role="tab"
                    id="nav-shipping-tab" data-bs-toggle="tab" data-bs-target="#nav-shipping"
                    aria-controls="nav-shipping" aria-selected="false">Chính sách thanh toán</button>
                  <button class="nav-link border-white border-bottom-0" type="button" role="tab"
                    id="nav-return-tab" data-bs-toggle="tab" data-bs-target="#nav-return"
                    aria-controls="nav-return" aria-selected="false">Chính sách đổi trả</button>
                </div>
              </nav>
              <div class="tab-content mb-5">

                <!-- MÔ TẢ -->
                <div class="tab-pane active" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                  <p><?= $currentSP['motasp'] ?></p>
                </div>

                <!-- CHÍNH SÁCH THANH TOÁN -->
                <div class="tab-pane" id="nav-shipping" role="tabpanel" aria-labelledby="nav-shipping-tab">
                  <h5>1. Giới thiệu</h5>
                  <p>
                    Chào mừng quý khách hàng đến với website của <strong>GalaxyShoes</strong>.
                    Khi quý khách truy cập và sử dụng website của chúng tôi có nghĩa là quý khách
                    đồng ý với các điều khoản mua bán được quy định tại đây.
                  </p>
                  <p>
                    GalaxyShoes có quyền thay đổi, chỉnh sửa, bổ sung hoặc lược bỏ bất kỳ phần nào
                    trong điều khoản mà không cần thông báo trước. Việc tiếp tục sử dụng website
                    sau khi điều khoản được cập nhật đồng nghĩa với việc quý khách chấp nhận
                    những thay đổi đó.
                  </p>

                  <h5>2. Hướng dẫn sử dụng website</h5>
                  <ul>
                    <li>Khách hàng phải đủ 18 tuổi hoặc truy cập dưới sự giám sát của người giám hộ hợp pháp.</li>
                    <li>Khách hàng có đầy đủ năng lực hành vi dân sự theo quy định pháp luật Việt Nam.</li>
                    <li>Trong quá trình đăng ký, quý khách đồng ý nhận email quảng cáo từ GalaxyShoes.</li>
                    <li>Có thể từ chối nhận email bằng cách nhấn vào liên kết hủy đăng ký ở cuối mỗi email.</li>
                  </ul>

                  <h5>3. Thanh toán an toàn và tiện lợi</h5>
                  <p>Quý khách có thể lựa chọn các hình thức thanh toán sau:</p>
                  <ul>
                    <li><strong>Cách 1:</strong> Thanh toán trực tiếp tại cửa hàng.</li>
                    <li><strong>Cách 2:</strong> Thanh toán khi nhận hàng (COD).</li>
                    <li><strong>Cách 3:</strong> Thanh toán online qua chuyển khoản ngân hàng.</li>
                  </ul>
                </div>

                <!-- CHÍNH SÁCH ĐỔI TRẢ -->
                <div class="tab-pane" id="nav-return" role="tabpanel" aria-labelledby="nav-return-tab">
                  <p>
                    <strong>GalaxyShoes.vn</strong> luôn trân trọng sự tín nhiệm của quý khách và cam kết
                    mang đến những sản phẩm chất lượng cao với chi phí hợp lý.
                  </p>

                  <p>
                    Tất cả sản phẩm mua tại GalaxyShoes.vn được hỗ trợ đổi size hoặc mẫu trong vòng
                    <strong>07 ngày</strong> kể từ ngày nhận hàng, với điều kiện còn hóa đơn mua hàng
                    và sản phẩm còn nguyên vẹn.
                  </p>

                  <h5>Trường hợp được đổi/trả</h5>
                  <ul>
                    <li>Sản phẩm không đúng chủng loại, mẫu mã như đã đặt.</li>
                    <li>Sản phẩm bị bong tróc, bể vỡ trong quá trình vận chuyển.</li>
                    <li>Phát hiện hàng giả, hàng kém chất lượng, không chính hãng.</li>
                  </ul>

                  <p>
                    Quý khách vui lòng kiểm tra hàng và ký nhận với nhân viên giao hàng.
                    Nếu có vấn đề, hãy liên hệ trong vòng <strong>24h</strong> qua Hotline:
                    <strong>0909 669 035</strong>.
                  </p>

                  <h5>Trường hợp không áp dụng đổi/trả</h5>
                  <ul>
                    <li>Hàng order theo yêu cầu.</li>
                    <li>Quá 07 ngày kể từ ngày nhận hàng.</li>
                    <li>Sản phẩm bị rách, bẩn, hư hỏng do người sử dụng.</li>
                    <li>Sản phẩm đã cắt tag/mác hoặc đã qua sử dụng.</li>
                    <li>Không còn size/mẫu để đổi.</li>
                  </ul>

                  <h5>Quy trình đổi/trả</h5>
                  <ol>
                    <li>Liên hệ Hotline 0909 669 035 trong vòng 07 ngày kể từ khi nhận hàng.</li>
                    <li>Cung cấp thông tin đơn hàng để GalaxyShoes kiểm tra.</li>
                    <li>Gửi sản phẩm kèm hóa đơn về địa chỉ GalaxyShoes.</li>
                    <li>Sau khi kiểm tra đạt yêu cầu, GalaxyShoes sẽ gửi sản phẩm đổi cho quý khách.</li>
                  </ol>

                  <p>
                    <strong>Lưu ý:</strong> Khách hàng chịu phí vận chuyển 2 chiều khi đổi/trả.
                    Mỗi đơn hàng chỉ hỗ trợ đổi <strong>01 lần</strong>.
                  </p>
                </div>

              </div>

            </div>

          </div>

          <!-- Cột phải: Thông tin sản phẩm -->
          <div class="col-lg-5">
            <!-- Tên sản phẩm nổi bật hơn -->
            <h4 class="fw-bold mb-2 product-name" style="font-size: 2.5rem; line-height: 1.1;"><?= $currentSP['tensp'] ?></h4>

            <div class="product-meta">


              <div class="meta-brand">
                <span class="label">Thương hiệu</span>
                <span class="value"><?= $hang ?></span>
              </div>


              <div class="meta-attrs">
                <div class="attr">
                  <span class="label">Loại</span>
                  <span class="value"><?= $loai ?></span>
                </div>
                <div class="attr">
                  <span class="label">Màu sắc</span>
                  <span class="value"><?= $mau ?></span>
                </div>
                <div class="attr">
                  <span class="label">Giới tính</span>
                  <span class="value"><?= $gioitinh ?></span>
                </div>

              </div>

            </div>








            <!-- Giá -->
            <p class="gia-ban" data-gia="<?= $giaBan ?>">
              <?= number_format($giaBan, 0, ',', '.') ?> ₫
            </p>

            <div class="mb-4">
              <p class="fw-bold mb-2">Size</p>

              <div class="d-flex gap-2 flex-wrap">
                <?php if (!empty($listSize)): ?>
                  <?php foreach ($listSize as $size): ?>
                    <button
                      type="button"
                      class="btn btn-outline-secondary btn-sm size-btn 
                      <?= $size['soluong'] == 0 ? 'disabled' : '' ?>"
                      data-size-id="<?= $size['masize'] ?>"
                      data-size="<?= $size['tensize'] ?>"
                      data-stock="<?= $size['soluong'] ?>"
                      <?= $size['soluong'] == 0 ? 'disabled' : '' ?>>
                      <?= $size['tensize'] ?>
                    </button>
                  <?php endforeach; ?>
                <?php else: ?>
                  <p class="none-size">Sản phẩm này hiện chưa có size!</p>
                <?php endif; ?>
              </div>

              <!-- Hiển thị số lượng -->
              <!-- Hiển thị số lượng -->
              <p class="meta-stock fw-bold mb-2">
                Tình trạng:
                <?php if ($soluongtonkho > 0): ?>
                  <span class="stock-status in-stock">Còn hàng (<?= $soluongtonkho ?>)</span>
                <?php else: ?>
                  <span class="stock-status out-of-stock">Hết hàng</span>
                <?php endif; ?>
              </p>



            </div>
            <div class="d-flex align-items-center gap-3 mb-4">
              <div class="input-group quantity" style="width: 130px;">
                <button class="btn btn-sm btn-minus rounded-circle bg-light border">
                  <i class="fa fa-minus"></i>
                </button>
                <input id="qty" type="text" class="form-control form-control-sm text-center border-0" value="1">
                <button class="btn btn-sm btn-plus rounded-circle bg-light border">
                  <i class="fa fa-plus"></i>
                </button>
              </div>

              <a
                class="btn border border-secondary rounded-pill px-5 py-2 text-primary add-to-cart-btn"
                data-masp="<?= $currentSP['masp'] ?>"
                data-tensp="<?= htmlspecialchars($currentSP['tensp']) ?>">
                <i class="fa fa-shopping-bag me-2 text-primary"></i> Thêm vào giỏ
              </a>
            </div>
            <?php if (!isset($_SESSION['user-id'])): ?>

              <a href="<?= ROOT_URL ?>account/login"
                class="btn btn-danger w-100 mb-4 py-3 fw-bold">
                Mua ngay
              </a>

            <?php else: ?>

              <a
                class="btn btn-danger w-100 mb-4 py-3 fw-bold buy-now-btn"
                data-masp="<?= $currentSP['masp'] ?>">
                Mua ngay
              </a>

            <?php endif; ?>

            <!-- Khung icons info - làm dài bằng nút Mua ngay -->
            <div class="rounded py-3 bg-white border mb-4 w-100">
              <div class="row text-center gx-0">
                <div class="col">
                  <i class="fa fa-truck fa-2x text-primary mb-2"></i>
                  <p class="mb-0 fw-bold">Giao hàng toàn quốc</p>
                  <p class="mb-0 text-muted small">2-5 ngày</p>
                </div>
                <div class="col">
                  <i class="fa fa-tags fa-2x text-primary mb-2"></i>
                  <p class="mb-0 fw-bold">Ưu đãi hấp dẫn</p>
                  <p class="mb-0 text-muted small">Khuyến mãi liên tục</p>
                </div>
                <div class="col">
                  <i class="fa fa-check-circle fa-2x text-primary mb-2"></i>
                  <p class="mb-0 fw-bold">Chính hãng</p>
                  <p class="mb-0 text-muted small">100% chính hãng</p>
                </div>
              </div>
            </div>

            <!-- Khung Tại sao chọn GalaxyShoes - cũng dài bằng nút Mua ngay -->
            <div class="border rounded p-4 mb-4 w-100">
              <h6 class="fw-bold mb-3 text-primary" style="font-size: 1.25rem;">Tại sao khách hàng lựa chọn GalaxyShoes?</h6>
              <ul class="list-unstyled mb-0">
                <li class="mb-2">✓ 100% Hàng chính hãng</li>
                <li class="mb-2">✓ Đổi hàng 30 ngày</li>
                <li class="mb-2">✓ Uy tín hơn 9 năm</li>
                <li class="mb-2">✓ 100.000+ khách hàng tin tưởng</li>
                <li>✓ Miễn phí vận chuyển đơn trên 500.000đ</li>
              </ul>
            </div>

            <!-- Collapse chính sách nếu có - giữ nguyên -->
          </div>

        </div>
      </div>
    </div>

    <h1 class="fw-bold mb-0 text-primary">Gợi ý sản phẩm</h1>

    <div class="vesitable">
      <div class="owl-carousel vegetable-carousel justify-content-center">

        <?php if (!empty($listSP)) : ?>
          <?php foreach ($listSP as $sp): ?>
            <?php $giaBanSP = $sp['gianhap'] + $sp['gianhap'] * $sp['tyleloinhuan'] / 100; ?>

            <div class="product-item position-relative">

              <div class="product-img">
                <a href="<?= ROOT_URL ?>product-detail?masp=<?= $sp['masp'] ?>">
                  <img src="<?= $sp['image'] ?>" class="img-fluid w-100">
                </a>
              </div>

              <div class="brand-tag">
                <?= htmlspecialchars($sp['tenhang']) ?>
              </div>

              <div class="product-content p-2">
                <p class="product-price">
                  <?= number_format($giaBanSP, 0, ',', '.') ?> ₫
                </p>
                <p class="product-name">
                  <?= htmlspecialchars($sp['tensp']) ?>
                </p>
              </div>

            </div>

          <?php endforeach; ?>
        <?php else: ?>
          <div class="col-12 text-center">
            <p class="text-muted fs-5">Không có sản phẩm nào</p>
          </div>
        <?php endif; ?>

      </div>
    </div>



  </div>
</div>
<!-- Single Product End -->
<!-- MODAL THÔNG BÁO GIỎ HÀNG  -->
<div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-md">
    <div class="modal-content border-0 shadow-sm rounded-4 overflow-hidden">

      <!-- Header nhẹ nhàng -->
      <div class="modal-header cart-header border-0 px-4 py-3">
        <div class="d-flex align-items-center gap-3">
          <div class="bg-white rounded-circle p-2 shadow-sm">
            <i class="fa fa-check fs-4"></i>
          </div>
          <h5 class="modal-title fw-semibold mb-0 fs-4" id="cartModalLabel">Đã thêm vào giỏ hàng</h5>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <!-- Body chính - tone trắng + xanh nhạt -->
      <div class="modal-body px-4 pb-4 pt-3 text-center">
        <div id="cartMessage" class="mb-4 fs-5 fw-medium text-dark">
          <!-- JS sẽ điền nội dung động vào đây -->
        </div>

        <div class="d-flex flex-column flex-sm-row justify-content-center gap-3">
          <button id="continueShopping" class="btn btn-outline-secondary px-5 py-2 rounded-pill fw-medium">
            Tiếp tục mua sắm
          </button>
          <a id="viewCart" href="<?= ROOT_URL ?>cart" class="btn btn-soft-green px-5 py-2 rounded-pill fw-medium text-white">
            Xem giỏ hàng
          </a>
        </div>
      </div>
    </div>
  </div>

</div>
<style>
  .thumb-img:hover {
    transform: scale(1.08);
    border-color: #8c9deb !important;
    box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4) !important;
  }

  .thumb-img.active {
    border-color: #8c9eed !important;
    box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
  }

  .product-main-image {
    transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
  }

  .product-main-image:hover {
    transform: scale(1.12);
    cursor: zoom-in;
  }


  @media (max-width: 768px) {
    .product-image-container {
      min-height: 350px !important;
    }
  }

  .vesitable-item {
    display: flex;
    flex-direction: column;
    height: 100%;
  }

  .vesitable-item .p-4 {
    display: flex;
    flex-direction: column;
    flex-grow: 1;
  }

  .vesitable-item h4 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
    min-height: 3.6rem;
    max-height: 3.6rem;
    margin-bottom: 1rem;
  }

  .vesitable-item .d-flex {
    margin-top: auto;
  }

  .product-meta {
    margin-top: 16px;
    font-family: system-ui, -apple-system, sans-serif;
  }

  /* Thương hiệu */
  .meta-brand {
    margin-bottom: 16px;
  }

  .meta-brand .label {
    font-size: 13px;
    font-weight: 500;
    color: #6b7280;
    display: block;
    margin-bottom: 4px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
  }

  .meta-brand .value {
    font-size: 22px;
    /* to hơn rõ rệt */
    font-weight: 700;
    color: #2e2e5b;
    letter-spacing: -0.3px;
    line-height: 1.1;
  }

  .meta-stock {

    margin-bottom: -13px !important;
    margin-top: 13px;
    padding: 10px -15px;
    /* padding 0 như mẫu */

    font-family: "Open Sans", sans-serif;

    font-size: 16px;

    font-weight: 700;

    line-height: 1.4;

  }



  .meta-stock::after {

    content: " ";

  }



  .stock-status {

    font-weight: 600;

    padding-left: 6px;

  }



  /* Còn hàng */

  .in-stock {

    color: #1e40af;

  }



  /* Hết hàng */

  .out-of-stock {

    color: #dc2626;

    font-weight: 700;

  }

  .none-size {
    color: #dc3545;
    margin-bottom: -5px;
    font-style: italic;
  }

  .product-name {
    color: #2e2e5b !important;
  }

  .meta-attrs {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(110px, 1fr));
    gap: 12px 20px;
  }

  .btn-minus:focus,
  .btn-minus:active,
  .btn-plus:focus,
  .btn-plus:active {
    box-shadow: 0 0 0 0.2rem rgba(46, 46, 91, 0.3) !important;
  }

  .attr {
    display: flex;
    flex-direction: column;
  }

  .attr .label {
    font-size: 12px;
    font-weight: 500;
    color: #9ca3af;
    margin-bottom: 3px;
    text-transform: uppercase;
    letter-spacing: 0.4px;
  }

  .attr .value {
    font-size: 15px;
    font-weight: 600;
    color: #1f2937;
  }

  .size-btn.disabled {
    opacity: 0.4;
    cursor: not-allowed;
    text-decoration: line-through;
  }

  .size-btn.active {
    color: #fff;
    box-shadow: 0 0 0 0.25rem rgba(251, 191, 36, 0.4);
  }


  /* Modal tone dịu - pastel nhẹ nhàng */
  #cartModal .modal-content {
    border-radius: 24px;
    background: #ffffff;
  }

  #cartModal .modal-header {
    background: linear-gradient(135deg, #f0f9f4 0%, #e8f5e9 100%);
    border-bottom: none !important;
  }

  .bg-gradient-soft-green {
    background: linear-gradient(135deg, #f0f9f4 0%, #e8f5e9 100%);
  }

  .btn-soft-green {
    background: #4caf50;
    border: none;
    transition: all 0.25s ease;
  }

  .btn-soft-green:hover {
    background: #43a047;
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(76, 175, 80, 0.25);
  }

  #cartModal .modal-body {
    background: #fafafa;
  }

  .nav-tabs .nav-link {
    color: #2c3e50;
  }

  .nav-tabs .nav-link:hover {
    color: #2c3e50;
  }

  #cartModal #cartMessage {
    line-height: 1.6;
    color: #2c3e50;
  }

  #cartModal .btn-outline-secondary {
    border-color: #adb5bd;
    color: #495057;
    transition: all 0.25s ease;
  }

  #cartModal .btn-outline-secondary:hover {
    background: #e9ecef;
    color: #212529;
  }

  /* Hiệu ứng mượt khi mở modal */
  #cartModal .modal-dialog {
    transform: scale(0.95);
    opacity: 0;
    transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
  }

  #cartModal.show .modal-dialog {
    transform: scale(1);
    opacity: 1;
  }

  .gia-ban {
    font-size: 2rem;
    /* to như h5 */
    font-weight: 800;
    /* fw-bolder */
    color: #dc3545;
    text-shadow: 0 0 0.4px #dc3545;
    /* đỏ bootstrap text-danger */
    letter-spacing: -0.5px;
    margin-top: 15px;
    margin-bottom: 1rem;
    white-space: nowrap;
    /* không rớt dòng */
    line-height: 1.2;
  }

  /* Mobile thân thiện */
  @media (max-width: 576px) {
    #cartModal .modal-dialog {
      margin: 1rem;
    }

    #cartModal .btn {
      width: 100%;
      padding: 0.75rem 1.25rem;
    }
  }
</style>
<script>
  const BASE_URL = "<?= ROOT_URL ?>";
</script>
<script src="<?= APP_PATH ?>public/js/product-detail.js"></script>