<?php
require_once "../QuanLyBanGiay_PHP/config/connectdb.php";
require_once "../QuanLyBanGiay_PHP/app/controllers/SanPhamController.php";
require_once "../QuanLyBanGiay_PHP/app/controllers/HangController.php";
require_once "../QuanLyBanGiay_PHP/app/controllers/HinhAnhController.php";

$spController = new SanPhamController($conn);
$hangController = new HangController($conn);
$hinhAnhController = new HinhAnhController($conn);

$listSP = $spController->getAll();

$listBestSellingALL = $spController->getBestSellingByName("all");
$listBestSellingPuma = $spController->getBestSellingByName("puma");
$listBestSellingAdidas = $spController->getBestSellingByName("adidas");
$listBestSellingVans = $spController->getBestSellingByName("vans");
$listBestSellingNike = $spController->getBestSellingByName("nike");
?>

<!-- Banner đầu trang -->
<div class="container-fluid py-3 mb-4 hero-header">
  <div class="container py-3">
    <div class="row g-5 align-items-center">
      <div class="col-md-12 col-lg-7">
        <h4 class="mb-3 text-secondary">Giày chính hãng – Chất lượng cao</h4>
        <h1 class="mb-5 display-3 text-primary">Giày Cao Cấp Cho Cuộc Sống Hiện Đại</h1>
        <div class="position-relative mx-auto">
          <input class="form-control border-2 border-secondary w-75 py-3 px-4 rounded-pill" type="text"
            placeholder="Nhập từ khóa để tìm kiếm sản phẩm">
          <button type="submit"
            class="btn btn-primary border-2 border-secondary py-3 px-4 position-absolute rounded-pill text-white h-100"
            style="top: 0; right: 25%;">Tìm sản phẩm</button>
        </div>
      </div>

      <div class="col-md-12 col-lg-5">
        <div id="carouselId" class="carousel slide position-relative" data-bs-ride="carousel">
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active rounded">
              <img src="public/img/hero-img-nike.jpg" class="img-fluid w-100 h-100 bg-secondary rounded" alt="First slide">
              <a href="#" class="btn px-4 py-2 text-white rounded">Nike</a>
            </div>
            <div class="carousel-item rounded">
              <img src="public/img/hero-img-converse.jpg" class="img-fluid w-100 h-100 rounded" alt="Second slide">
              <a href="#" class="btn px-4 py-2 text-white rounded">Converse</a>
            </div>
            <!-- <div class="carousel-item rounded">
              <img src="public/img/hero-img-vans.png" class="img-fluid w-100 h-100 rounded" alt="Second slide">
              <a href="#" class="btn px-4 py-2 text-white rounded">Vans</a>
            </div> -->
            <div class="carousel-item rounded">
              <img src="public/img/hero-img-clark.jpg" class="img-fluid w-100 h-100 rounded" alt="Second slide">
              <a href="#" class="btn px-4 py-2 text-white rounded">Clark</a>
            </div>
            <div class="carousel-item rounded">
              <img src="public/img/hero-img-puma.jpg" class="img-fluid w-100 h-100 rounded" alt="Second slide">
              <a href="#" class="btn px-4 py-2 text-white rounded">Puma</a>
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Banner đầu trang End -->


<!-- Các chính sách Start-->
<div class="container-fluid featurs py-3">
  <div class="container py-3">
    <div class="row g-4">
      <div class="col-md-6 col-lg-3">
        <div class="featurs-item text-center rounded bg-light p-4">
          <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
            <i class="fas fa-car-side fa-3x text-white"></i>
          </div>
          <div class="featurs-content text-center">
            <h5>Vận chuyển toàn quốc</h5>
            <p class="mb-0">Vận chuyển nhanh chóng</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3">
        <div class="featurs-item text-center rounded bg-light p-4">
          <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
            <i class="fas fa-medal fa-3x text-white"></i>
          </div>
          <div class="featurs-content text-center">
            <h5>Bảo đảm chất lượng</h5>
            <p class="mb-0">Sản phẩm đã được kiểm định</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3">
        <div class="featurs-item text-center rounded bg-light p-4">
          <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
            <i class="fas fa-gift fa-3x text-white"></i>
          </div>
          <div class="featurs-content text-center">
            <h5>Ưu đãi hấp dẫn</h5>
            <p class="mb-0">Nhiều ưu đãi khuyến mãi hot</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3">
        <div class="featurs-item text-center rounded bg-light p-4">
          <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
            <i class="fa fa-phone-volume fa-3x text-white"></i>
          </div>
          <div class="featurs-content text-center">
            <h5>Hotline: 0984898154</h5>
            <p class="mb-0">Vui lòng gọi hotline để được hỗ trợ</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Các chính sách End -->


<!-- Các sản phẩm bán chạy Start-->
<div class="container-fluid fruite py-3">
  <div class="container py-3">
    <div class="tab-class text-center">
      <div class="row g-4">
        <div class="col-lg-4 text-start">
          <h1>Sản phẩm bán chạy</h1>
        </div>
        <div class="col-lg-8 text-end">
          <ul class="nav nav-pills d-inline-flex text-center mb-3">
            <li class="nav-item">
              <a class="d-flex m-2 py-2 bg-light rounded-pill active" data-bs-toggle="pill" href="#tab-1">
                <span class="text-dark" style="width: 130px;">Tất cả</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="d-flex py-2 m-2 bg-light rounded-pill" data-bs-toggle="pill" href="#tab-2">
                <span class="text-dark" style="width: 130px;">Adidas</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="d-flex m-2 py-2 bg-light rounded-pill" data-bs-toggle="pill" href="#tab-3">
                <span class="text-dark" style="width: 130px;">Nike</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="d-flex m-2 py-2 bg-light rounded-pill" data-bs-toggle="pill" href="#tab-4">
                <span class="text-dark" style="width: 130px;">Puma</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="d-flex m-2 py-2 bg-light rounded-pill" data-bs-toggle="pill" href="#tab-5">
                <span class="text-dark" style="width: 130px;">Vans</span>
              </a>
            </li>
          </ul>
        </div>
      </div>

      <div class="tab-content">
        <div id="tab-1" class="tab-pane fade show p-0 active">
          <div class="row g-4">
            <div class="col-lg-12">
              <div class="row g-4">
                <?php if (!empty($listBestSellingALL)): ?>
                  <?php foreach ($listBestSellingALL as $sp): ?>
                    <?php $giaBanSP = $sp['gianhap'] + $sp['gianhap'] * $sp['tyleloinhuan'] / 100; ?>
                    <div class="col-md-6 col-lg-4 col-xl-3">
                      <div class="rounded position-relative fruite-item">
                        <div class="fruite-img">
                          <img src="<?= $hinhAnhController->getMainImageById($sp['masp']) ?>" class="img-fluid w-100 rounded-top" alt="">
                        </div>
                        <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">
                          <?= $hangController->getNameById($sp['hang']) ?>
                        </div>
                        <div class="p-4 border border-secondary border-top-0">
                          <h4 class="text-start"><?= $sp['tensp'] ?></h4>
                          <div class="d-flex justify-content-between align-items-center flex-lg-wrap">

                            <p class="text-dark fs-5 fw-bold mb-0">
                              <?= number_format($giaBanSP, 0, ',', '.') ?> ₫
                            </p>
                            <p class="text-black fs-6 mb-0">
                              Đã bán: <?= $sp['soluongdaban'] ?>
                            </p>
                            <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                class="fa fa-shopping-bag me-2 text-primary"></i>THÊM VÀO GIỎ</a>
                          </div>
                        </div>
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
        <div id="tab-2" class="tab-pane fade show p-0">
          <div class="row g-4">
            <div class="col-lg-12">
              <div class="row g-4">
                <?php if (!empty($listBestSellingAdidas)): ?>
                  <?php foreach ($listBestSellingAdidas as $sp): ?>
                    <?php $giaBanSP = $sp['gianhap'] + $sp['gianhap'] * $sp['tyleloinhuan'] / 100; ?>
                    <div class="col-md-6 col-lg-4 col-xl-3">
                      <div class="rounded position-relative fruite-item">
                        <div class="fruite-img">
                          <img src="<?= $hinhAnhController->getMainImageById($sp['masp']) ?>" class="img-fluid w-100 rounded-top" alt="">
                        </div>
                        <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">
                          <?= $hangController->getNameById($sp['hang']) ?>
                        </div>
                        <div class="p-4 border border-secondary border-top-0">
                          <h4 class="text-start"><?= $sp['tensp'] ?></h4>
                          <div class="d-flex justify-content-between align-items-center flex-lg-wrap">

                            <p class="text-dark fs-5 fw-bold mb-0">
                              <?= number_format($giaBanSP, 0, ',', '.') ?> ₫
                            </p>
                            <p class="text-black fs-6 mb-0">
                              Đã bán: <?= $sp['soluongdaban'] ?>
                            </p>
                            <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                class="fa fa-shopping-bag me-2 text-primary"></i>THÊM VÀO GIỎ</a>
                          </div>
                        </div>
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
        <div id="tab-3" class="tab-pane fade show p-0">
          <div class="row g-4">
            <div class="col-lg-12">
              <div class="row g-4">
                <?php if (!empty($listBestSellingNike)): ?>
                  <?php foreach ($listBestSellingNike as $sp): ?>
                    <?php $giaBanSP = $sp['gianhap'] + $sp['gianhap'] * $sp['tyleloinhuan'] / 100; ?>
                    <div class="col-md-6 col-lg-4 col-xl-3">
                      <div class="rounded position-relative fruite-item">
                        <div class="fruite-img">
                          <img src="<?= $hinhAnhController->getMainImageById($sp['masp']) ?>" class="img-fluid w-100 rounded-top" alt="">
                        </div>
                        <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">
                          <?= $hangController->getNameById($sp['hang']) ?>
                        </div>
                        <div class="p-4 border border-secondary border-top-0">
                          <h4 class="text-start"><?= $sp['tensp'] ?></h4>
                          <div class="d-flex justify-content-between align-items-center flex-lg-wrap">

                            <p class="text-dark fs-5 fw-bold mb-0">
                              <?= number_format($giaBanSP, 0, ',', '.') ?> ₫
                            </p>
                            <p class="text-black fs-6 mb-0">
                              Đã bán: <?= $sp['soluongdaban'] ?>
                            </p>
                            <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                class="fa fa-shopping-bag me-2 text-primary"></i>THÊM VÀO GIỎ</a>
                          </div>
                        </div>
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
        <div id="tab-4" class="tab-pane fade show p-0">
          <div class="row g-4">
            <div class="col-lg-12">
              <div class="row g-4">
                <?php if (!empty($listBestSellingPuma)): ?>
                  <?php foreach ($listBestSellingPuma as $sp): ?>
                    <?php $giaBanSP = $sp['gianhap'] + $sp['gianhap'] * $sp['tyleloinhuan'] / 100; ?>
                    <div class="col-md-6 col-lg-4 col-xl-3">
                      <div class="rounded position-relative fruite-item">
                        <div class="fruite-img">
                          <img src="<?= $hinhAnhController->getMainImageById($sp['masp']) ?>" class="img-fluid w-100 rounded-top" alt="">
                        </div>
                        <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">
                          <?= $hangController->getNameById($sp['hang']) ?>
                        </div>
                        <div class="p-4 border border-secondary border-top-0">
                          <h4 class="text-start"><?= $sp['tensp'] ?></h4>
                          <div class="d-flex justify-content-between align-items-center flex-lg-wrap">

                            <p class="text-dark fs-5 fw-bold mb-0">
                              <?= number_format($giaBanSP, 0, ',', '.') ?> ₫
                            </p>
                            <p class="text-black fs-6 mb-0">
                              Đã bán: <?= $sp['soluongdaban'] ?>
                            </p>
                            <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                class="fa fa-shopping-bag me-2 text-primary"></i>THÊM VÀO GIỎ</a>
                          </div>
                        </div>
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
        <div id="tab-5" class="tab-pane fade show p-0">
          <div class="row g-4">
            <div class="col-lg-12">
              <div class="row g-4">

                <?php if (!empty($listBestSellingVans)): ?>
                  <?php foreach ($listBestSellingVans as $sp): ?>
                    <?php $giaBanSP = $sp['gianhap'] + $sp['gianhap'] * $sp['tyleloinhuan'] / 100; ?>
                    <div class="col-md-6 col-lg-4 col-xl-3">
                      <div class="rounded position-relative fruite-item">
                        <div class="fruite-img">
                          <img src="<?= $hinhAnhController->getMainImageById($sp['masp']) ?>" class="img-fluid w-100 rounded-top" alt="">
                        </div>
                        <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">
                          <?= $hangController->getNameById($sp['hang']) ?>
                        </div>
                        <div class="p-4 border border-secondary border-top-0">
                          <h4 class="text-start"><?= $sp['tensp'] ?></h4>
                          <div class="d-flex justify-content-between align-items-center flex-lg-wrap">

                            <p class="text-dark fs-5 fw-bold mb-0">
                              <?= number_format($giaBanSP, 0, ',', '.') ?> ₫
                            </p>
                            <p class="text-black fs-6 mb-0">
                              Đã bán: <?= $sp['soluongdaban'] ?>
                            </p>
                            <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i
                                class="fa fa-shopping-bag me-2 text-primary"></i>THÊM VÀO GIỎ</a>
                          </div>
                        </div>
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
      </div>
    </div>
  </div>
</div>
<!-- Các sản phẩm bán chạy End-->


<!-- Ảnh model Start -->
<div class="container-fluid service py-3">
  <div class="container py-3">
    <h1 class="mb-3">Đại sứ phong cách</h1>
    <div class="row g-4 justify-content-center">
      <div class="col-12 col-sm-6 col-lg-3 d-flex">
        <a href="#">
          <div class="service-item bg-dark rounded border border-dark">
            <img src="public/img/model-img-2.jpg" class="img-fluid rounded-top w-100" style="height:486.163px; object-fit:cover;" alt="">
            <div class="px-4 rounded-bottom" style="height:80px;">
              <div class="text-center py-2 rounded">
                <h4 class="text-white">AUTHENTIC</h4>
                <h6 class="text-white mb-0">Cam kết 100% chính hãng</h6>
              </div>
            </div>
          </div>
        </a>
      </div>
      <div class="col-12 col-sm-6 col-lg-3 d-flex">
        <a href="#">
          <div class="service-item bg-secondary rounded border border-secondary">
            <img src="public/img/model-img-4.png" class="img-fluid rounded-top w-100" style="height:486.163px; object-fit:cover;" alt="">
            <div class="px-4 rounded-bottom" style="height:80px;">
              <div class="text-center py-2 rounded">
                <h4 class="text-white">PREMIUM</h4>
                <h6 class="text-white mb-0">Chất liệu cao cấp – Gia công tỉ mỉ</h6>
              </div>
            </div>
          </div>
        </a>
      </div>
      <div class="col-12 col-sm-6 col-lg-3 d-flex">
        <a href="#">
          <div class="service-item bg-dark rounded border border-dark">
            <img src="public/img/model-img-3.jpg" class="img-fluid rounded-top w-100" style="height:486.163px; object-fit:cover;" alt="">
            <div class="px-4 rounded-bottom" style="height:80px;">
              <div class="text-center py-2 rounded">
                <h4 class="text-white">BEST DEAL</h4>
                <h6 class="text-white mb-0">Nhiều ưu đãi hấp dẫn</h6>
              </div>
            </div>
          </div>
        </a>
      </div>
      <div class="col-12 col-sm-6 col-lg-3 d-flex">
        <a href="#">
          <div class="service-item bg-secondary rounded border border-secondary">
            <img src="public/img/model-img-1.jpg" class="img-fluid rounded-top w-100" style="height:486.163px; object-fit:cover;" alt="">
            <div class="px-4 rounded-bottom" style="height:80px;">
              <div class="text-center py-2 rounded">
                <h4 class="text-white">STYLE</h4>
                <h6 class="text-white mb-0">Phong cách trẻ trung – Cá tính</h6>
              </div>
            </div>
          </div>
        </a>
      </div>
    </div>
  </div>
</div>
<!-- Ảnh model End -->

<!-- Danh sách sản phẩm Start-->
<div class="container-fluid vesitable py-3 pb-1">
  <div class="container py-3 pb-2 mb-0">
    <h1 class="mb-2">Gợi ý sản phẩm</h1>
    <div class="owl-carousel vegetable-carousel justify-content-center">
      <?php if (!empty($listSP)): ?>
        <?php foreach ($listSP as $sp): ?>
          <?php $giaBanSP = $sp['gianhap'] + $sp['gianhap'] * $sp['tyleloinhuan'] / 100; ?>
          <div class="border border-primary rounded position-relative vesitable-item">
            <div class="vesitable-img">
              <img src="<?= $hinhAnhController->getMainImageById($sp['masp']) ?>" class="img-fluid w-100 rounded-top" alt="">
            </div>
            <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">
              <?= $hangController->getNameById($sp['hang']) ?></div>
            <div class="p-4 rounded-bottom">
              <h4 class="text-start"><?= $sp['tensp'] ?></h4>
              <div class="d-flex justify-content-between align-items-center flex-lg-wrap">
                <p class="text-dark fs-5 fw-bold mb-0">
                  <?= number_format($giaBanSP, 0, ',', '.') ?> ₫
                </p>
                <p class="text-black fs-6 mb-0">
                  Đã bán: <?= $sp['soluongdaban'] ?>
                </p>
                <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i
                    class="fa fa-shopping-bag me-2 text-primary"></i>THÊM VÀO GIỎ</a>
              </div>
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
<!-- Danh sách sản phẩm Shop End -->
