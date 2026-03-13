<?php
require_once APP_PATH_DIR . 'controllers/GioHangController.php';
require_once APP_PATH_DIR . 'controllers/ChackoutController.php';
require_once APP_PATH_DIR . 'controllers/HeaderController.php';
require_once APP_PATH_DIR . 'controllers/AccountController.php';
require_once APP_PATH_DIR . 'controllers/SanPhamController.php';
require_once APP_PATH_DIR . 'controllers/TrackOrderController.php';
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = str_replace(APP_PATH, '', $uri);
$uri = trim($uri, '/');
$accountController = new AccountController($conn);
$chackoutController = new ChackoutController($conn);
function requireLogin()
{
    if (empty($_SESSION['user-id'])) {
        header('location:' . ROOT_URL . 'account/login');
        exit;
    }
}
function checkCart($conn)
{
    requireLogin();
    require_once APP_PATH_DIR . 'controllers/GioHangController.php';
    $cartController = new GioHangController($conn);
    return $cartController->countCartItem() > 0;
}
function render($view, $conn)
{
    $headerData = prepareHeader($conn);
    extract($headerData); // Tách array thành các biến
    require VIEW_PATH_DIR . 'partials/header.php';
    require VIEW_PATH_DIR . $view . '.php';
    require VIEW_PATH_DIR . 'partials/footer.php';
}
function prepareHeader($conn) // Chuẩn bị các dữ liệu cho Header
{
    $headerController = new HeaderController($conn);
    return $headerController->getHeaderData();
}
if ($uri == '' || $uri == '/' || $uri == 'home') {
    $headerData = prepareHeader($conn);
    extract($headerData);
    require VIEW_PATH_DIR . 'partials/header.php';
    $controller = new SanPhamController($conn);
    $controller->showHome();
    require VIEW_PATH_DIR . 'partials/footer.php';
    exit;
}
//sản phẩm Start
if ($uri == 'products') {
    $headerData = prepareHeader($conn);
    extract($headerData);
    require VIEW_PATH_DIR . 'partials/header.php';
    $controller = new SanPhamController($conn);
    $controller->showProducts();
    require VIEW_PATH_DIR . 'partials/footer.php';
    exit;
}

// sản phẩm END

// Giỏ hàng START
if ($uri == 'cart') {
    requireLogin();
    $headerData = prepareHeader($conn);
    extract($headerData);
    require VIEW_PATH_DIR . 'partials/header.php';
    $controller = new GioHangController($conn);
    $controller->showCarts();
    require VIEW_PATH_DIR . 'partials/footer.php';
    exit;
}
if ($uri == 'cart/update') {
    requireLogin();
    $headerData = prepareHeader($conn);
    extract($headerData);
    $controller = new GioHangController($conn);
    $controller->updateQuantity();
    exit;
}
if ($uri == 'cart/delete') {
    requireLogin();
    $headerData = prepareHeader($conn);
    extract($headerData);
    $controller = new GioHangController($conn);
    $controller->deleteCartItem();
    exit;
}
// Giỏ hàng END

// Cổng thanh toán START
if ($uri == 'chackout') {
    if (!checkCart($conn)) {
        header('location:' . ROOT_URL . 'cart');
        exit;
    }
    $headerData = prepareHeader($conn);
    extract($headerData);
    require VIEW_PATH_DIR . 'partials/header.php';
    $chackoutController->showChackout();
    require VIEW_PATH_DIR . 'partials/footer.php';
    exit;
}
if ($uri == 'chackout/add-order') {
    if (!checkCart($conn)) {
        header('location:' . ROOT_URL . 'cart');
        exit;
    }
    $headerData = prepareHeader($conn);
    extract($headerData);
    $addOrderStatus = $chackoutController->addOrder();

    if ($addOrderStatus) {
        $_SESSION['add-order'] = true;
    } else {
        $_SESSION['add-order'] = false;
    }
    exit;
}
// Cổng thanh toán END

// Kiểm tra trạng thái đơn hàng START
if ($uri == 'track-order') {
    requireLogin();
    $headerData = prepareHeader($conn);
    extract($headerData);
    require VIEW_PATH_DIR . 'partials/header.php';
    $trackOrderController = new TrackOrderController($conn);
    $trackOrderController->showTrackOrder();
    require VIEW_PATH_DIR . 'partials/footer.php';
    exit;
}
if ($uri == 'track-order-detail') {
    requireLogin();
    $headerData = prepareHeader($conn);
    extract($headerData);
    require VIEW_PATH_DIR . 'partials/header.php';
    $trackOrderController = new TrackOrderController($conn);
    $trackOrderController->showTrackOrderDetail();
    require VIEW_PATH_DIR . 'partials/footer.php';
    exit;
}
// Kiểm tra trạng thái đơn hàng END

if ($uri == 'contact') {
    render('contact', $conn);
    exit;
}
if ($uri == 'product-detail') {
    $headerData = prepareHeader($conn);
    extract($headerData);
    require VIEW_PATH_DIR . 'partials/header.php';
    $controller = new SanPhamController($conn);
    $controller->showDetail();
    require VIEW_PATH_DIR . 'partials/footer.php';
    exit;
}
// Account START
if ($uri == 'account') {
    requireLogin();
    $headerData = prepareHeader($conn);
    extract($headerData);
    require VIEW_PATH_DIR . 'partials/header.php';
    $accountController = new AccountController($conn);
    $accountController->showAccountPage();
    require VIEW_PATH_DIR . 'partials/footer.php';
    exit;
}
if ($uri == 'account/login') {
    render('auth', $conn);
    exit;
}
if ($uri == 'account/logout') {
    requireLogin();
    $accountController->logout();
    exit;
}
if ($uri == 'account/update') {
    requireLogin();
    $accountController->updateProfile();
    exit();
}
if ($uri == 'account/update/password') {
    requireLogin();
    $accountController->updatePassword();
    exit();
}
// Account END

// Chỗ debug
if ($uri == 'debug') {
    require VIEW_PATH_DIR . 'debug.php';
    exit;
}

if ($uri == 'test') {
    require VIEW_PATH_DIR . 'test.php';
    exit;
}

// ===========================================

if ($uri == 'login') {
    require VIEW_PATH_DIR . 'login.php';
    exit;
}

if ($uri == 'return-policy') {
    render('return-policy', $conn);
    exit;
}

if ($uri == 'about-us') {
    render('about-us', $conn);
    exit;
}

if ($uri == 'contact-us') {
    render('contact', $conn);
    exit;
}

if ($uri == 'privacy-policy') {
    render('privacy-policy', $conn);
    exit;
}

if ($uri == 'cs-vanchuyen') {
    render('csvanchuyen', $conn);
    exit;
}
if ($uri == 'cs-kiemhang') {
    render('cskiemhang', $conn);
    exit;
}
if ($uri == 'cs-thanhtoan') {
    render('csthanhtoan', $conn);
    exit;
}
if ($uri == 'cs-baohanh') {
    render('csbaohanh', $conn);
    exit;
}
if ($uri == 'dk-dichvu') {
    render('dkdichvu', $conn);
    exit;
}

render('404', $conn);
