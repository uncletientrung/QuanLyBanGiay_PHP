<?php
require_once '../QuanLyBanGiay_PHP/config/connectdb.php';
require_once "../QuanLyBanGiay_PHP/app/controllers/SanPhamController.php";
require_once "../QuanLyBanGiay_PHP/app/controllers/HangController.php";
require_once "../QuanLyBanGiay_PHP/app/controllers/HinhAnhController.php";
require_once "../QuanLyBanGiay_PHP/app/controllers/MauSacController.php";
require_once "../QuanLyBanGiay_PHP/app/controllers/LoaiController.php";
$spController = new SanPhamController($conn);
$hangController = new HangController($conn);
$hinhAnhController = new HinhAnhController($conn);
$mauSacController = new MauSacController($conn);
$loaiController = new LoaiController($conn);
$listHang = $hangController->getAll();
$listMauSac = $mauSacController->getAll();
$listLoai = $loaiController->getLoaivaSoluongTuongUng();
$maxPrice = $_GET['max_price'] ?? 10000000;

// phân trang
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) $page = 1;

$limit = 9;//moi trang hien thi 9 san pham
$offset = ($page - 1) * $limit;
$totalProducts = $spController->countAll();
$totalPages = ceil($totalProducts / $limit);
$listSP = $spController->getByPage($limit, $offset);


?>
<!-- Single Page Header start -->
<div class="container-fluid page-header py-5">
  <h1 class="text-center text-white display-6">Shop</h1>
  <ol class="breadcrumb justify-content-center mb-0">
    <li class="breadcrumb-item"><a href="<?= ROOT_URL ?>">Trang chủ</a></li>
    <li class="breadcrumb-item active text-white">Shop</li>
  </ol>
</div>
<!-- Single Page Header End -->


<!-- Fruits Shop Start-->
<div class="container-fluid fruite py-5">
  <div class="container py-5">
    <h1 class="mb-4">SHOP giày Ộ i i</h1>
    <div class="row g-4">
      <div class="col-lg-12">
       <form method="GET" action="products">
        <input type="hidden" name="loai" value="<?= $_GET['loai'] ?? '' ?>">
        <div class="row g-4">
          <div class="col-xl-3">
            <div class="input-group w-100 mx-auto d-flex">
              <input 
                type="search" 
                name="q" 
                value="<?= $_GET['q'] ?? '' ?>" 
                class="form-control p-3" 
                placeholder="Tìm kiếm..." 
                aria-describedby="search-icon-1"
              >
              <button 
                type="submit" 
                class="input-group-text p-3 custom-search-btn" 
                id="search-icon-1"
              >
                <i class="fa fa-search"></i>
              </button>
            </div>
          </div>
          <!-- cai div col= 6 dung de cach khoang cach giua tim kiem va thuong hieu -->
          <div class="col-6"></div>

<!-- bat dau bo lọc -->
          <div class="col-xl-3">
            <div class="bg-light ps-3 py-3 rounded d-flex justify-content-between mb-4">
              <label for="hanggiay">Thương hiệu</label>
              <select id="hanggiay" name="hang" class="border-0 form-select-sm bg-light me-3" onchange="this.form.submit()">
                <option value="all">Tất cả</option>
                <?php foreach($listHang as $hang): ?>
                  <option value="<?= $hang['mahang'] ?>"
                    <?= (($_GET['hang'] ?? '') == $hang['mahang']) ? 'selected' : '' ?>>
                    <?= $hang['tenhang'] ?>
                  </option>
                <?php endforeach; ?>              
              </select>
            </div>
          </div>
<!-- ket thuc bo loc -->
        </div>
        <div class="row g-4">
          <div class="col-lg-3">
            <div class="row g-4">
              <!-- start loại -->
              <div class="col-lg-12">
                <div class="mb-3">
                  <h4>Loại giày</h4>
                  <ul class="list-unstyled fruite-categorie">
                    <?php foreach($listLoai as $loai) :?>
                      <li>
                        <div class="d-flex justify-content-between fruite-name">
                          <?php
                            $params = $_GET;
                            unset($params['url']);
                            $params['loai'] = $loai['maloai'];
                            unset($params['page']); // reset về trang 1
                            ?>
                          <a href="?<?= http_build_query($params) ?>"><i class="fas fa-shoe-prints me-2"></i><?= $loai['tenloai'] ?></a>
                          <span>(<?= $loai['tongsoluong'] ?>)</span>
                        </div>
                      </li>
                      <?php endforeach; ?>                  
                  </ul>
                </div>
              </div>
              <!-- end loại -->

              <!-- start gia -->
              <div class="col-lg-12">
                <div class="mb-3">
                  <h4 class="mb-2">Tầm giá</h4>
                  <input
                    type="range"
                    name="max_price"
                    min="0"
                    max="10000000"
                    value="<?= $maxPrice ?>"
                    class="form-range w-100"
                    oninput="amount.value = this.value"
                    onchange="this.form.submit()">

                  <output id="amount"><?= number_format($maxPrice, 0, ',', '.') ?> ₫</output>

                </div>
              </div>
              <!-- end giá -->

              <!-- start màu -->
              <div class="col-lg-12">
                <div class="mb-3">
                  <h4>Màu sắc</h4>
                  <?php foreach($listMauSac as $mau): ?>
                    <div class="mb-2">
                      <input type="checkbox" class="me-2" id="mau-<?= $mau['mamau'] ?>" name="mau[]" value="<?= $mau['mamau'] ?>" <?= in_array($mau['mamau'], $_GET['mau'] ?? []) ? 'checked' : '' ?>
 onchange="this.form.submit()">
                      <label for="mau-<?= $mau['mamau'] ?>"> <?= $mau['tenmau'] ?></label>
                    </div>
                  <?php endforeach; ?>               
                </div>
              </div>
              <!-- end màu -->


              <!-- start gioi tinh -->
               <div class="col-lg-12">
                <div class="mb-3">
                  <h4>Giới tính</h4>
                  <div class="mb-2">
                    <input type="radio" name="gioitinh" value="nam"
                      <?= ($_GET['gioitinh'] ?? '') == 'nam' ? 'checked' : '' ?>
                      onchange="this.form.submit()">
                    <label for="Categories-1"> Nam</label>
                  </div>
                  <div class="mb-2">
                    <input type="radio" name="gioitinh" value="nu"
                      <?= ($_GET['gioitinh'] ?? '') == 'nu' ? 'checked' : '' ?>
                      onchange="this.form.submit()">
                    <label for="Categories-2"> Nữ</label>
                  </div>
                </div>
              </div>

              </form>

              <!-- end gioi tinh -->
              <div class="col-lg-12">
                <h4 class="mb-3">Featured products</h4>
                <div class="d-flex align-items-center justify-content-start">
                  <div class="rounded me-4" style="width: 100px; height: 100px;">
                    <img src="<?= IMAGE_PATH_DIR ?>featur-1.jpg" class="img-fluid rounded" alt="">
                  </div>
                  <div>
                    <h6 class="mb-2">Big Banana</h6>
                    <div class="d-flex mb-2">
                      <i class="fa fa-star text-secondary"></i>
                      <i class="fa fa-star text-secondary"></i>
                      <i class="fa fa-star text-secondary"></i>
                      <i class="fa fa-star text-secondary"></i>
                      <i class="fa fa-star"></i>
                    </div>
                    <div class="d-flex mb-2">
                      <h5 class="fw-bold me-2">2.99 $</h5>
                      <h5 class="text-danger text-decoration-line-through">4.11 $</h5>
                    </div>
                  </div>
                </div>
                <div class="d-flex align-items-center justify-content-start">
                  <div class="rounded me-4" style="width: 100px; height: 100px;">
                    <img src="<?= IMAGE_PATH_DIR ?>featur-2.jpg" class="img-fluid rounded" alt="">
                  </div>
                  <div>
                    <h6 class="mb-2">Big Banana</h6>
                    <div class="d-flex mb-2">
                      <i class="fa fa-star text-secondary"></i>
                      <i class="fa fa-star text-secondary"></i>
                      <i class="fa fa-star text-secondary"></i>
                      <i class="fa fa-star text-secondary"></i>
                      <i class="fa fa-star"></i>
                    </div>
                    <div class="d-flex mb-2">
                      <h5 class="fw-bold me-2">2.99 $</h5>
                      <h5 class="text-danger text-decoration-line-through">4.11 $</h5>
                    </div>
                  </div>
                </div>
                <div class="d-flex align-items-center justify-content-start">
                  <div class="rounded me-4" style="width: 100px; height: 100px;">
                    <img src="<?= IMAGE_PATH_DIR ?>featur-3.jpg" class="img-fluid rounded" alt="">
                  </div>
                  <div>
                    <h6 class="mb-2">Big Banana</h6>
                    <div class="d-flex mb-2">
                      <i class="fa fa-star text-secondary"></i>
                      <i class="fa fa-star text-secondary"></i>
                      <i class="fa fa-star text-secondary"></i>
                      <i class="fa fa-star text-secondary"></i>
                      <i class="fa fa-star"></i>
                    </div>
                    <div class="d-flex mb-2">
                      <h5 class="fw-bold me-2">2.99 $</h5>
                      <h5 class="text-danger text-decoration-line-through">4.11 $</h5>
                    </div>
                  </div>
                </div>
                <div class="d-flex justify-content-center my-4">
                  <a href="#" class="btn border border-secondary px-4 py-3 rounded-pill text-primary w-100">Vew More</a>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="position-relative">
                  <img src="<?= IMAGE_PATH_DIR ?>banner-fruits.jpg" class="img-fluid w-100 rounded" alt="">
                  <div class="position-absolute" style="top: 50%; right: 10px; transform: translateY(-50%);">
                    <h3 class="text-secondary fw-bold">Fresh <br> Fruits <br> Banner</h3>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-9">
            <div class="row g-4">
                <?php if (!empty($listSP)): ?>
                  <?php foreach ($listSP as $sp): ?>
                    <?php $giaBanSP = $sp['gianhap'] + $sp['gianhap'] * $sp['tyleloinhuan'] / 100; ?>
                    <div class="col-md-6 col-lg-6 col-xl-4">
                      <div class="rounded position-relative fruite-item">
                        <div class="fruite-img">
                          <img src="<?= $hinhAnhController->getMainImageById($sp['masp']) ?>" class="img-fluid w-100 rounded-top" alt="">
                        </div>
                        <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">
                          <?= $hangController->getNameById($sp['hang']) ?>
                        </div>
                       
                        <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                          <h4><?= $sp['tensp'] ?></h4>
                          
                          <div class="d-flex justify-content-between flex-lg-wrap">
                            <p class="text-dark fs-5 fw-bold mb-0">
                              <?= number_format($giaBanSP, 0, ',', '.') ?> ₫
                            </p>
                            <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php endforeach; ?>
                <?php endif; ?>
<!--  
              <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="rounded position-relative fruite-item">
                  <div class="fruite-img">
                    <img src="<?= IMAGE_PATH_DIR ?>fruite-item-5.jpg" class="img-fluid w-100 rounded-top" alt="">
                  </div>
                  <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">Fruits</div>
                  <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                    <h4>Grapes</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                    <div class="d-flex justify-content-between flex-lg-wrap">
                      <p class="text-dark fs-5 fw-bold mb-0">$4.99 / kg</p>
                      <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-lg-6 col-xl-4">
                <div class="rounded position-relative fruite-item">
                  <div class="fruite-img">
                    <img src="<?= IMAGE_PATH_DIR ?>fruite-item-1.jpg" class="img-fluid w-100 rounded-top" alt="">
                  </div>
                  <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">Fruits</div>
                  <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                    <h4>Oranges</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt</p>
                    <div class="d-flex justify-content-between flex-lg-wrap">
                      <p class="text-dark fs-5 fw-bold mb-0">$4.99 / kg</p>
                      <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                    </div>
                  </div>
                </div>
              </div> -->




              <div class="col-12">
                <div class="pagination d-flex justify-content-center mt-5">
                    <!-- nut pre -->
                  <?php if ($page > 1): ?>
                    <?php
                      $params = $_GET;
                      unset($params['url']); // nếu có router

                      if ($page - 1 == 1) {
                          unset($params['page']);
                      } else {
                          $params['page'] = $page - 1;
                      }
                    ?>
                    <a class="rounded" href="?<?= http_build_query($params) ?>">&laquo;</a>
                  <?php endif; ?>
                  <!-- so trang -->

                  <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                    <?php
                      $params = $_GET;
                      unset($params['url']);

                      if ($i == 1) {
                          unset($params['page']);
                      } else {
                          $params['page'] = $i;
                      }
                    ?>
                    <a
                      href="?<?= http_build_query($params) ?>"
                      class="rounded <?= ($i == $page) ? 'active' : '' ?>">
                      <?= $i ?>
                    </a>
                  <?php endfor; ?>
                  <!-- nut next -->

                  <?php if ($page < $totalPages): ?>
                    <?php
                      $params = $_GET;
                      unset($params['url']);

                      $params['page'] = $page + 1;
                    ?>
                    <a class="rounded" href="?<?= http_build_query($params) ?>">&raquo;</a>
                  <?php endif; ?>


                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Fruits Shop End-->


<script>
document.getElementById('search-icon-1').addEventListener('click', function() {
  this.closest('form').submit();
});
</script>