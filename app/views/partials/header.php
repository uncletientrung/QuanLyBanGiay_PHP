<?php
require_once __DIR__ . '/auth_helper.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>ShoesGalaxy - Giày chính hãng & Giá tốt</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Google Web Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap"
    rel="stylesheet">

  <!-- Icon Font Stylesheet -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Libraries Stylesheet -->
  <link href="<?= ROOT_URL ?>public/lib/lightbox/css/lightbox.min.css" rel="stylesheet">
  <link href="<?= ROOT_URL ?>public/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Customized Bootstrap Stylesheet -->
  <link href="<?= ROOT_URL ?>public/css/bootstrap.min.css" rel="stylesheet">

  <!-- Template Stylesheet -->
  <link href="<?= ROOT_URL ?>public/css/style.css" rel="stylesheet">

<style>
  /* Tăng size cơ bản cho navbar */
  .navbar {
    font-size: 1.12rem;
  }

  /* Logo GalaxyShoes – dùng xanh navy */
  .navbar-brand {
    font-size: 2.4rem !important;
    font-weight: 800 !important;
    line-height: 1.1;
    letter-spacing: -1px;
    color: #2e2e5b !important;
    padding: 0.4rem 0;
  }

  /* Hiệu ứng hover mượt cho các menu chính */
  .navbar-nav .nav-link,
  .nav-item.dropdown .dropdown-toggle {
    font-size: 1.18rem !important;
    font-weight: 600 !important;
    padding: 0.8rem 1.3rem !important;
    color: #2e2e5b !important;           /* Màu mặc định: xanh navy */
    transition: all 0.35s ease;
    transform: scale(1);
    display: inline-block;
    will-change: transform;
    backface-visibility: hidden;
    -webkit-font-smoothing: antialiased;
  }

  /* Hover: phóng to nhẹ, giữ nguyên màu xanh navy */
  .navbar-nav .nav-link:hover,
  .nav-item.dropdown .dropdown-toggle:hover {
    transform: scale(1.08) translateZ(0);
    color: #2e2e5b !important;           /* Vẫn xanh navy khi hover */
    font-weight: 700 !important;
    backface-visibility: hidden;
    -webkit-font-smoothing: antialiased;
  }

  /* Active: chỉ dùng màu cam  */
  .navbar-nav .nav-link.active,
  .nav-item.dropdown .dropdown-toggle.active {
    font-size: 1.28rem !important;
    font-weight: 900 !important;
    color: #FFB524 !important;           /* Màu cam khi active */
    transform: scale(1.05) translateZ(0);
    backface-visibility: hidden;
    text-shadow: 0 1px 3px rgba(0,0,0,0.15); /* bóng nhẹ cho nổi bật */
  }

  /* Khi dropdown đang mở – dùng xanh navy đậm hơn một chút */
  .nav-item.dropdown .dropdown-toggle.show {
    transform: scale(1.04) translateZ(0);
    color: #2e2e5b !important;
    font-weight: 700 !important;
    backface-visibility: hidden;
  }

  /* Responsive – giảm scale trên mobile để tránh mờ */
  @media (max-width: 991.98px) {
    .navbar-nav .nav-link:hover,
    .nav-item.dropdown .dropdown-toggle:hover {
      transform: scale(1.04) translateZ(0);
    }
  }

  /* Responsive tablet */
  @media (max-width: 1199.98px) {
    .navbar-brand {
      font-size: 2.1rem !important;
    }
    .navbar-nav .nav-link,
    .nav-item.dropdown .dropdown-toggle {
      font-size: 1.12rem !important;
    }
    .navbar-nav .nav-link.active,
    .nav-item.dropdown .dropdown-toggle.active {
      font-size: 1.22rem !important;
    }
    .nav-item.dropdown .dropdown-toggle.show {
      font-size: 1.12rem !important;
    }
  }

  /* Responsive mobile */
  @media (max-width: 575.98px) {
    .navbar-brand {
      font-size: 1.9rem !important;
    }
    .navbar-nav .nav-link {
      padding: 0.7rem 1rem !important;
    }
  }
</style>
</head>

<body>
  <!-- Load trang -->
  <div id="spinner"
    class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
    <div class="spinner-grow text-primary" role="status"></div>
  </div>
  <!-- Loading End -->

  <?php
  $currentPage = $_GET['url'] ?? 'home';
  ?>

  <!-- NAV start -->
  <div class="container-fluid fixed-top">
    <div class="container topbar bg-primary d-none d-lg-block">
      <div class="d-flex justify-content-between">
          <div class="top-info ps-2">
          <small class="me-3"><i class="fas fa-map-marker-alt me-2 text-secondary"></i> <a class="text-white">273 An Dương Vương, P.2, Quận 5</a></small>
          <small class="me-3"><i class="fas fa-envelope me-2 text-secondary"></i><a class="text-white">shoesgalaxy@gmail.com</a></small>
        </div>
        <div class="top-link pe-2">
          <a href="<?= ROOT_URL ?>privacy-policy" class="text-white"><small class="text-white mx-2">Chính sách bảo mật</small>/</a>
          <a href="<?= ROOT_URL ?>dk-dichvu" class="text-white"><small class="text-white mx-2">Điều khoản dịch vụ</small>/</a>
          <a href="<?= ROOT_URL ?>cs-baohanh" class="text-white"><small class="text-white ms-2">Chính sách bảo hành</small></a>
        </div>
      </div>
    </div>

    <div class="container px-0">
      <nav class="navbar navbar-light bg-white navbar-expand-xl">
        <a href="<?= ROOT_URL ?>" class="navbar-brand">
          <h1 class="text-primary display-6">GalaxyShoes</h1>
        </a>
        <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
          <span class="fa fa-bars text-primary"></span>
        </button>

        <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
          <div class="navbar-nav mx-auto">
            <a href="<?= ROOT_URL ?>"
              class="nav-item nav-link <?= $currentPage == 'home' ? 'active' : '' ?>">
              Trang chủ
            </a>

            <div class="nav-item dropdown">
              <span class="nav-item nav-link dropdown-toggle 
                <?= $currentPage == 'products' || $currentPage == 'product-detail' ? 'active' : '' ?>"
                data-bs-toggle="dropdown" style="cursor: pointer;">
                Giày
              </span>
              <div class="dropdown-menu m-0 bg-secondary rounded-0">
                <a href="<?= ROOT_URL ?>products" class="dropdown-item">Tất cả</a>
                <?php foreach ($listHang as $hang): ?>
                  <a href="<?= ROOT_URL ?>products?hang[]=<?= $hang['mahang'] ?>" class="dropdown-item"><?= htmlspecialchars($hang['tenhang']) ?></a>
                <?php endforeach; ?>
              </div>
            </div>

            <a href="<?= ROOT_URL ?>about-us"
              class="nav-item nav-link <?= $currentPage == 'about-us' ? 'active' : '' ?>">
              Giới thiệu
            </a>

            <a href="<?= ROOT_URL ?>contact"
              class="nav-item nav-link <?= $currentPage == 'contact' ? 'active' : '' ?>">
              Liên hệ
            </a>

            <a href="<?= ROOT_URL ?>track-order"
              class="nav-item nav-link <?= $currentPage == 'track-order' ? 'active' : '' ?>">
              Theo dõi đơn hàng
            </a>
          </div>

          <div class="d-flex m-3 me-0">
            <!-- Button cart -->
            <a href="<?= ROOT_URL ?>cart" class="position-relative me-4 my-auto">
              <i class="fa fa-shopping-bag fa-2x"></i>
              <?php if ($isLogin && $cartCount > 0): ?>
                <span id="cart-count"
                  class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark px-1"
                  style="top: -5px; left: 15px; height: 20px; min-width: 20px;">
                  <?= $cartCount ?>
                </span>
              <?php endif; ?>
            </a>

            <!-- Button user / Avatar -->
            <a href="<?= ROOT_URL . ($isLogin ? 'account' : 'account/login') ?>" class="my-auto position-relative">
              <?php
              $initial = null;

              if ($isLogin && isset($user['hoten']) && trim($user['hoten']) !== '') {
                $hoten = trim($user['hoten']);

                function remove_accents($str) {
                  $utf8 = [
                    'a' => 'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ',
                    'A' => 'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
                    'd' => 'đ', 'D' => 'Đ',
                    'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
                    'E' => 'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
                    'i' => 'í|ì|ỉ|ĩ|ị', 'I' => 'Í|Ì|Ỉ|Ĩ|Ị',
                    'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
                    'O' => 'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
                    'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
                    'U' => 'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
                    'y' => 'ý|ỳ|ỷ|ỹ|ỵ', 'Y' => 'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
                  ];
                  foreach ($utf8 as $ascii => $unicode) {
                    $str = preg_replace("/($unicode)/i", $ascii, $str);
                  }
                  return $str;
                }

                $hoten_no_accent = remove_accents($hoten);
                $words = preg_split('/\s+/', $hoten_no_accent);
                $lastWord = end($words);

                if ($lastWord !== '') {
                  $initial = strtoupper(substr($lastWord, 0, 1));
                }
              }
              ?>

              <?php if ($initial !== null): ?>
                <div class="avatar-initials">
                  <?= htmlspecialchars($initial) ?>
                </div>
              <?php else: ?>
                <i class="fas fa-user fa-2x text-primary"></i>
              <?php endif; ?>
            </a>
          </div>
        </div>
      </nav>
    </div>
  </div>
  <!-- NAV End -->

  <!-- Thanh tìm kiếm -->
  <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
      <div class="modal-content rounded-0">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tìm kiếm sản phẩm</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body d-flex align-items-center">
          <div class="input-group w-75 mx-auto d-flex">
            <input type="search" class="form-control p-3" placeholder="Nhập từ khóa tìm kiếm...." aria-describedby="search-icon-1">
            <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal Search End -->