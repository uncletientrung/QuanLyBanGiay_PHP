

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
<div class="container-fluid fruite py-2">

<!-- <?php
echo '<pre>';
print_r($sp['image']);
echo '</pre>';

?>  -->
  <div class="container py-3">
    <!-- <h1 class="mb-4">SHOP giày</h1> -->
    <div class="row g-4" >
      <div class="col-lg-12">
        <form method="GET" action="#start-products" id="filterForm">
          <div class="row g-4"  id="product-list">
            <div class="col-xl-3" id="start-products">
              <div class="input-group w-100 mx-auto d-flex">
                <input 
                  type="search" 
                  name="q" 
                  value="<?= htmlspecialchars($filters['q'] ?? '') ?>" 
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

            <!-- Sắp xếp -->
            <div class="col-xl-3">
              <div class="bg-light ps-3 py-3 rounded d-flex justify-content-between mb-4">
                <label for="sort">Sắp xếp</label>
                <select id="sort" name="sort" class="border-0 form-select-sm bg-light me-3" onchange="this.form.submit()">
                  <option value="default" <?= ($filters['sort'] ?? 'default') === 'default' ? 'selected' : '' ?>>Tất cả</option>
                  <option value="price_asc" <?= $filters['sort'] === 'price_asc' ? 'selected' : '' ?>>Giá tăng dần</option>
                  <option value="price_desc" <?= $filters['sort'] === 'price_desc' ? 'selected' : '' ?>>Giá giảm dần</option>
                  <option value="name_asc" <?= $filters['sort'] === 'name_asc' ? 'selected' : '' ?>>Tên A → Z</option>
                  <option value="name_desc" <?= $filters['sort'] === 'name_desc' ? 'selected' : '' ?>>Tên Z → A</option>
                  <option value="best_seller" <?= $filters['sort'] === 'best_seller' ? 'selected' : '' ?>>Bán chạy nhất</option>
                </select>
              </div>
            </div>
          </div>

          <div class="row g-4">
            <div class="col-lg-3">
              <div class="row g-2">  

                <!-- Khung Loại giày -->
                <div class="col-lg-12">
                  <div class="bg-white border border-2 rounded p-3 mb-2 shadow-sm">  
                    <h4 class="mb-2 pb-2 border-bottom border-navy">Loại giày</h4>
                    <?php foreach($listLoai as $loai): ?>
                      <div class="mb-2">
                        <input
                          type="checkbox"
                          class="me-2 form-check-input-custom"
                          id="loai-<?= $loai['maloai'] ?>"
                          name="loai[]"
                          value="<?= $loai['maloai'] ?>"
                          <?= in_array($loai['maloai'], $filters['loai'] ?? []) ? 'checked' : '' ?>
                        >
                        <label for="loai-<?= $loai['maloai'] ?>" class="form-check-label">
                          <?= htmlspecialchars($loai['tenloai']) ?>
                        </label>
                      </div>
                    <?php endforeach; ?>
                  </div>
                </div>

                <!-- Khung Thương hiệu -->
                <div class="col-lg-12">
                  <div class="bg-white border border-2 rounded p-3 mb-2 shadow-sm"> 
                    <h4 class="mb-2 pb-2 border-bottom border-navy">Thương hiệu</h4>
                    <?php foreach($listHang as $hang): ?>
                      <div class="mb-2">
                        <input
                          type="checkbox"
                          class="me-2 form-check-input-custom"
                          id="hang-<?= $hang['mahang'] ?>"
                          name="hang[]"
                          value="<?= $hang['mahang'] ?>"
                          <?= in_array($hang['mahang'], $filters['hang'] ?? []) ? 'checked' : '' ?>
                        >
                        <label for="hang-<?= $hang['mahang'] ?>" class="form-check-label">
                          <?= htmlspecialchars($hang['tenhang']) ?>
                        </label>
                      </div>
                    <?php endforeach; ?>
                  </div>
                </div>

                <!-- Khung Tầm giá -->
                <div class="col-lg-12">
                  <div class="bg-white border border-2 rounded p-3 mb-2 shadow-sm">  
                    <h4 class="mb-2 pb-2 border-bottom border-navy">Tầm giá</h4>
                    <?php
                    $price_ranges = [
                      'all' => 'Tất cả',
                      'under_500' => 'Dưới 500.000đ',
                      '500_1000' => '500.000đ - 1.000.000đ',
                      '1000_2000' => '1.000.000đ - 2.000.000đ',
                      '2000_3000' => '2.000.000đ - 3.000.000đ',
                      'over_3000' => 'Trên 3.000.000đ'
                    ];
                    foreach($price_ranges as $key => $label):
                    ?>
                      <div class="mb-2">
                        <input
                          type="radio"
                          class="me-2 form-check-input-custom"
                          id="price-<?= $key ?>"
                          name="price_range"
                          value="<?= $key ?>"
                          <?= ($filters['price_range'] ?? '') === $key ? 'checked' : '' ?>
                        >
                        <label for="price-<?= $key ?>" class="form-check-label"><?= $label ?></label>
                      </div>
                    <?php endforeach; ?>
                  </div>
                </div>

                <!-- Màu sắc -->
                <div class="col-lg-12">
                  <div class="bg-white border border-2 rounded p-3 mb-2 shadow-sm">  
                    <h4 class="mb-2 pb-2 border-bottom border-navy">Màu sắc</h4>
                    <?php foreach($listMauSac as $mau): ?>
                      <div class="mb-2">
                        <input
                          type="checkbox"
                          class="me-2 color-checkbox form-check-input-custom"
                          id="mau-<?= $mau['mamau'] ?>"
                          name="mau[]"
                          value="<?= $mau['mamau'] ?>"
                          <?= in_array($mau['mamau'], $_GET['mau'] ?? []) ? 'checked' : '' ?>
                        >
                        <label for="mau-<?= $mau['mamau'] ?>" class="form-check-label">
                          <?= htmlspecialchars($mau['tenmau']) ?>
                        </label>
                      </div>
                    <?php endforeach; ?>
                  </div>
                </div>

                <!-- Giới tính -->
                <div class="col-lg-12">
                  <div class="bg-white border border-2 rounded p-3 mb-2 shadow-sm">  
                    <h4 class="mb-2 pb-2 border-bottom border-navy">Giới tính</h4>
                    <div class="mb-2">
                      <input
                        type="checkbox"
                        class="me-2 gender-checkbox form-check-input-custom"
                        id="gioitinh-nam"
                        name="gioitinh[]"
                        value="nam"
                        <?= in_array('nam', (array)($_GET['gioitinh'] ?? [])) ? 'checked' : '' ?>
                      >
                      <label for="gioitinh-nam" class="form-check-label">Nam</label>
                    </div>
                    <div class="mb-2">
                      <input
                        type="checkbox"
                        class="me-2 gender-checkbox form-check-input-custom"
                        id="gioitinh-nu"
                        name="gioitinh[]"
                        value="nu"
                        <?= in_array('nu', (array)($_GET['gioitinh'] ?? [])) ? 'checked' : '' ?>
                      >
                      <label for="gioitinh-nu" class="form-check-label">Nữ</label>
                    </div>
                  </div>
                </div>

                <!-- Nút xóa bộ lọc -->
                <div class="col-lg-12">
                  <div class="d-grid">
                    <a href="<?= ROOT_URL ?>products#start-products" class="btn btn-filter-reset">
                      <i class="fas fa-redo me-2"></i>Xóa tất cả bộ lọc
                    </a>
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
                      <div class="product-item position-relative">

                        <div class="product-img">
                          <a href="<?= ROOT_URL ?>product-detail?masp=<?= $sp['masp'] ?>">
                            <img src="<?= !empty($sp['image']) ? $sp['image'] : NO_IMAGE ?>" class="img-fluid w-100">
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
                        if ($page - 1 == 1) unset($params['page']);
                        else $params['page'] = $page - 1;
                      ?>
                      <a class="rounded" href="?<?= http_build_query($params) ?>">&laquo;</a>
                    <?php endif; ?>

                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                      <?php
                        $params = $_GET;
                        unset($params['url']);
                        if ($i == 1) unset($params['page']);
                        else $params['page'] = $i;
                      ?>
                      <a href="?<?= http_build_query($params) ?>" class="rounded <?= ($i == $page) ? 'active' : '' ?>">
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

<!-- Xử lý checkbox tự submit -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('filterForm');
    
    // Checkbox màu sắc
    document.querySelectorAll('.color-checkbox').forEach(cb => {
        cb.addEventListener('change', () => form.submit());
    });
    
    // Checkbox giới tính
    document.querySelectorAll('.gender-checkbox').forEach(cb => {
        cb.addEventListener('change', () => form.submit());
    });
    
    // Checkbox loại giày & thương hiệu
    document.querySelectorAll('input[name="loai[]"], input[name="hang[]"]').forEach(cb => {
        cb.addEventListener('change', () => form.submit());
    });
    
    // Radio tầm giá tự submit khi thay đổi
    document.querySelectorAll('input[name="price_range"]').forEach(radio => {
        radio.addEventListener('change', () => form.submit());
    });
    
    
});
</script>