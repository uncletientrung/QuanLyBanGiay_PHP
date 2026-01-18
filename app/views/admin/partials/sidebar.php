<?php
// Kiểm tra xem người dùng có đang ở trang nào để active link
$current_page = basename($_SERVER['PHP_SELF']);
$dashboard_active = ($current_page == 'main_layout.php' || strpos($_SERVER['REQUEST_URI'], 'dashboard') !== false) ? 'active' : '';
$orders_active = (strpos($_SERVER['REQUEST_URI'], 'orders') !== false) ? 'active' : '';
?>

<nav id="sidebar" aria-label="Main Navigation">
    <div class="bg-header-dark">
        <div class="content-header bg-white-5">
            <a class="fw-semibold text-white tracking-wide" href="<?php echo APP_PATH; ?>admin/">
                <span class="smini-hidden">
                    <span class="opacity-75">Shoe</span> Glaxy
                </span>
            </a>
            <div>
                <!-- Nút đóng sidebar trên mobile -->
                <button type="button" class="btn btn-sm btn-alt-secondary d-lg-none" data-toggle="layout" data-action="sidebar_close">
                    <i class="fa fa-times-circle"></i>
                </button>
            </div>
        </div>
    </div>

    <div class="js-sidebar-scroll">
        <div class="content-side">
            <ul class="nav-main">
                <li class="nav-main-item">
                    <a class="nav-main-link <?php echo $dashboard_active; ?>" href="<?php echo APP_PATH; ?>admin/?page=dashboard">
                        <i class="nav-main-link-icon fa fa-rocket"></i>
                        <span class="nav-main-link-name">Tổng quan</span>
                    </a>
                </li>

                <li class="nav-main-heading">Sản phẩm</li>
                <li class="nav-main-item">
                    <a class="nav-main-link <?php echo $orders_active; ?>" href="<?php echo APP_PATH; ?>admin/?page=orders">
                        <i class="nav-main-link-icon fa-solid fa-shoe-prints"></i>
                        <span class="nav-main-link-name">Đơn hàng</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>