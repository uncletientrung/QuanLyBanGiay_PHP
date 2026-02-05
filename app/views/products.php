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

// xu lý filters từ GET
$filters = [
    'q'         => isset($_GET['q']) && trim($_GET['q']) !== '' ? trim($_GET['q']) : null,
    'hang'      => (isset($_GET['hang']) && $_GET['hang'] !== 'all' && $_GET['hang'] !== '') ? (int)$_GET['hang'] : null,
    'loai'      => isset($_GET['loai']) && $_GET['loai'] !== '' ? (int)$_GET['loai'] : null,
    'gioitinh'  => !empty($_GET['gioitinh']) ? array_map('trim', (array)$_GET['gioitinh']) : [],
    'max_price' => isset($_GET['max_price']) && is_numeric($_GET['max_price']) ? (int)$_GET['max_price'] : null,
    'mau'       => !empty($_GET['mau']) ? array_map('intval', (array)$_GET['mau']) : [],
];

// Phân trang
$page = max(1, (int)($_GET['page'] ?? 1));
$limit = 9;

// Lấy dữ liệu
$listSP = $spController->getProducts($filters, $page, $limit);
$totalProducts = $spController->countProducts($filters);
$totalPages = ceil($totalProducts / $limit);


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
    <h1 class="mb-4">SHOP giày</h1>
    <div class="row g-4">
      <div class="col-lg-12">
       <form method="GET" action="products" id="filterForm">
        <input type="hidden" name="loai" value="<?= $_GET['loai'] ?? '' ?>" id="loaiInput">
        <div class="row g-4">
          <div class="col-xl-3">
            <div class="input-group w-100 mx-auto d-flex">
              <input 
                type="search" 
                name="q" 
                value="<?= htmlspecialchars($_GET['q'] ?? '') ?>" 
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
          <div class="col-6"></div>

          <!-- Bộ lọc thương hiệu -->
          <div class="col-xl-3">
            <div class="bg-light ps-3 py-3 rounded d-flex justify-content-between mb-4">
              <label for="hanggiay">Thương hiệu</label>
              <select id="hanggiay" name="hang" class="border-0 form-select-sm bg-light me-3" onchange="this.form.submit()">
                <option value="all">Tất cả</option>
                <?php foreach($listHang as $hang): ?>
                  <option value="<?= $hang['mahang'] ?>"
                    <?= (($_GET['hang'] ?? '') == $hang['mahang']) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($hang['tenhang']) ?>
                  </option>
                <?php endforeach; ?>              
              </select>
            </div>
          </div>
        </div>
        
        <div class="row g-4">
          <div class="col-lg-3">
            <div class="row g-4">
              <div class="col-lg-12">
                <div class="mb-3">
                  <h4>Loại giày</h4>
                  <ul class="list-unstyled fruite-categorie">
                    <li>
                      <div class="d-flex justify-content-between fruite-name">
                        <?php
                          $paramsAll = $_GET;
                          unset($paramsAll['url']);
                          unset($paramsAll['loai']); // Bỏ filter loại
                          unset($paramsAll['page']); // Reset về trang 1
                        ?>
                        <a href="?<?= http_build_query($paramsAll) ?>" 
                           class="<?= !isset($_GET['loai']) ? 'fw-bold text-primary' : '' ?>">
                          <i class="fas fa-list me-2"></i>Tất cả
                        </a>
                      </div>
                    </li>
                    
                    <?php foreach($listLoai as $loai) :?>
                      <li>
                        <div class="d-flex justify-content-between fruite-name">
                          <?php
                            $params = $_GET;
                            unset($params['url']);
                            $params['loai'] = $loai['maloai'];
                            unset($params['page']); // reset về trang 1
                          ?>
                          <a href="?<?= http_build_query($params) ?>"
                             class="<?= (isset($_GET['loai']) && $_GET['loai'] == $loai['maloai']) ? 'fw-bold text-primary' : '' ?>">
                            <i class="fas fa-shoe-prints me-2"></i><?= htmlspecialchars($loai['tenloai']) ?>
                          </a>
                          <span>(<?= $loai['tongsoluong'] ?>)</span>
                        </div>
                      </li>
                    <?php endforeach; ?>                  
                  </ul>
                </div>
              </div>

              <!-- Tầm giá -->
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
                    oninput="amount.value = Number(this.value).toLocaleString('vi-VN') + ' ₫'"
                    onchange="this.form.submit()">
                  <output id="amount"><?= number_format($maxPrice, 0, ',', '.') ?> ₫</output>
                </div>
              </div>

              <!-- Màu sắc-->
              <div class="col-lg-12">
                <div class="mb-3">
                  <h4>Màu sắc</h4>
                  <?php foreach($listMauSac as $mau): ?>
                    <div class="mb-2">
                      <input 
                        type="checkbox" 
                        class="me-2 color-checkbox" 
                        id="mau-<?= $mau['mamau'] ?>" 
                        name="mau[]" 
                        value="<?= $mau['mamau'] ?>" 
                        <?= in_array($mau['mamau'], $_GET['mau'] ?? []) ? 'checked' : '' ?>
                      >
                      <label for="mau-<?= $mau['mamau'] ?>"> <?= htmlspecialchars($mau['tenmau']) ?></label>
                    </div>
                  <?php endforeach; ?>               
                </div>
              </div>

              <!-- Giới tính -->
              <div class="col-lg-12">
                <div class="mb-3">
                  <h4>Giới tính</h4>
                  <div class="mb-2">
                    <input 
                      type="checkbox" 
                      class="me-2 gender-checkbox" 
                      id="gioitinh-nam" 
                      name="gioitinh[]" 
                      value="nam"
                      <?= in_array('nam', (array)($_GET['gioitinh'] ?? [])) ? 'checked' : '' ?>
                    >
                    <label for="gioitinh-nam">Nam</label>
                  </div>
                  <div class="mb-2">
                    <input 
                      type="checkbox" 
                      class="me-2 gender-checkbox" 
                      id="gioitinh-nu" 
                      name="gioitinh[]" 
                      value="nu"
                      <?= in_array('nu', (array)($_GET['gioitinh'] ?? [])) ? 'checked' : '' ?>
                    >
                    <label for="gioitinh-nu">Nữ</label>
                  </div>
                </div>
              </div>

              <!--Nút xóa tất cả bộ lọc -->
              <div class="col-lg-12">
                <div class="d-grid">
                  <a href="products" class="btn btn-outline-secondary">
                    <i class="fas fa-redo me-2"></i>Xóa tất cả bộ lọc
                  </a>
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

          <!-- Danh sách sản phẩm -->
          <div class="col-lg-9">
            <div class="row g-4">
                <?php if (!empty($listSP)): ?>
                  <?php foreach ($listSP as $sp): ?>
                    <?php $giaBanSP = $sp['gianhap'] + $sp['gianhap'] * $sp['tyleloinhuan'] / 100; ?>
                    <div class="col-md-6 col-lg-6 col-xl-4">
                      <div class="rounded position-relative fruite-item">
                        <div class="fruite-img">
                          <a href="<?= ROOT_URL ?>product-detail?masp=<?= $sp['masp'] ?>">
                            <img 
                              src="<?= $hinhAnhController->getMainImageById($sp['masp']) ?>" 
                              class="img-fluid w-100 rounded-top" 
                              alt=""
                            >
                          </a>
                        </div>
                        <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">
                          <?= htmlspecialchars($hangController->getNameById($sp['hang'])) ?>
                        </div>
                       
                        <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                          <h4><?= htmlspecialchars($sp['tensp']) ?></h4>
                          
                          <div class="d-flex justify-content-between flex-lg-wrap">
                            <p class="text-dark fs-5 fw-bold mb-0">
                              <?= number_format($giaBanSP, 0, ',', '.') ?> ₫
                            </p>
                            <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary">
                              <i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php endforeach; ?>
                <?php else: ?>
                  <div class="col-12">
                    <div class="no-product-found text-center py-5">
                      <i class="fa fa-search fa-3x mb-3"></i>
                      <h5>Không tìm thấy sản phẩm</h5>
                      <p class="text-muted">
                        Không có sản phẩm nào phù hợp với bộ lọc của bạn.<br>
                        Hãy thử thay đổi từ khóa hoặc điều kiện lọc.
                      </p>
                    </div>
                  </div>
                <?php endif; ?>



              <!-- Phân trang -->
              <div class="col-12">
                <div class="pagination d-flex justify-content-center mt-5">
                  <?php if ($page > 1): ?>
                    <?php
                      $params = $_GET;
                      unset($params['url']);
                      if ($page - 1 == 1) {
                          unset($params['page']);
                      } else {
                          $params['page'] = $page - 1;
                      }
                    ?>
                    <a class="rounded" href="?<?= http_build_query($params) ?>">&laquo;</a>
                  <?php endif; ?>

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
       </form>
      </div>
    </div>
  </div>
</div>

<!-- xu ly check box -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('filterForm');
    
    // Xử lý checkbox màu sắc
    document.querySelectorAll('.color-checkbox').forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            form.submit();
        });
    });
    
    // Xử lý checkbox giới tính
    document.querySelectorAll('.gender-checkbox').forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            form.submit();
        });
    });
});
</script>

