<?php
require './config/connectdb.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>ShoeGalaxy - Vũ trụ giày</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?= ROOT_URL ?>public/css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@400;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>

<body>
  <header class="header sticky-top bg-white">
    <div class="header_main">
      <div class="container-fluid px-0">
        <div class="row align-items-center py-3 gx-0">
          <!-- Logo to hơn -->
          <div class="col-lg-3 col-md-3 col-4">
            <div class="logo_container">
              <a href="index.php">
                <img src="public/images/logo-shoe-galaxy.png" alt="Logo giày" class="img-fluid" style="max-width: 200px; height: auto;">
              </a>
            </div>
          </div>

          <!-- Thanh search - rộng hơn, bo tròn, giống shop hiện đại -->
          <div class="col-lg-5 col-md-5 col-8">
            <div class="header_search">
              <form action="" class="d-flex align-items-center rounded-pill overflow-hidden border border-1 border-secondary-subtle shadow-sm">
                <input
                  type="search"
                  name="search"
                  required
                  class="header_search_input form-control border-0 shadow-none px-4 py-3"
                  placeholder="Tìm kiếm sản phẩm...">
                <button type="submit" class="btn border-0 px-4 py-3" style="background-color: #00d2d4;">
                  <i class="fa-solid fa-magnifying-glass fs-4 text-white"></i>
                </button>
              </form>
            </div>
          </div>

          <!-- Wishlist + Cart + User - gọn bên phải -->
          <div class="col-lg-4 col-md-4 col-12 mt-3 mt-md-0">
            <div class="wishlist_cart d-flex justify-content-end align-items-center gap-4 gap-lg-5">
              <!-- Cart -->
              <div class="cart position-relative">
                <div class="cart_container d-flex align-items-center">
                  <div class="cart_icon">
                    <img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560918704/cart.png" alt="Cart" width="32">
                    <div class="cart_count"><span>10</span></div>
                  </div>
                </div>
              </div>

              <!-- User -->
              <div class="top_bar_user d-flex align-items-center gap-3">
                <div class="user_icon">
                  <img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560918647/user.svg" alt="User" width="32">
                </div>
                <div class="d-flex flex-column small">
                  <a href="view/register/" class="text-dark">Đăng ký</a>
                  <a href="view/login/" class="text-dark">Đăng nhập</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- NAV giữ nguyên nhưng tăng font & hover -->
    <nav class="main_nav d-none d-lg-block">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="main_nav_content d-flex flex-row justify-content-center">
              <div class="main_nav_menu">
                <ul class="standard_dropdown main_nav_dropdown d-flex gap-5">
                  <li><a href="index.php">Trang chủ</a></li>
                  <li class="hassubs">
                    <a href="#">Tất cả danh mục <i class="fas fa-chevron-down"></i></a>
                    <ul>
                      <li><a href="">Không Bấm</a></li>
                      <li><a href="">Được Đâu</a></li>
                      <li><a href="">Đừng Chọn</a></li>
                      <li><a href="">Cảm Ơn</a></li>
                    </ul>
                  </li>
                  <li><a href="?type=Alert">Liên hệ</a></li>
                  <li><a href="?type=Alert">Kiểm tra đơn hàng</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </nav>
  </header>
</body>

</html>