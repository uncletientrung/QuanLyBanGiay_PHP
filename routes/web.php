<?php
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); // chỉ trả về vd /QuanLyBanGiay_Php/products
$uri = str_replace(APP_PATH, '', $uri);

if ($uri == '' || $uri == '/' || $uri == 'home') {
    require VIEW_PATH_DIR . 'partials/header.php';
    require VIEW_PATH_DIR . 'home.php';
    require VIEW_PATH_DIR . 'partials/footer.php';
    exit;
}
if ($uri == 'products') {
    require VIEW_PATH_DIR . 'partials/header.php';
    require VIEW_PATH_DIR . 'products.php';
    require VIEW_PATH_DIR . 'partials/footer.php';
    exit;
}
if ($uri == 'cart') {
    require VIEW_PATH_DIR . 'partials/header.php';
    require VIEW_PATH_DIR . 'cart.php';
    require VIEW_PATH_DIR . 'partials/footer.php';
    exit;
}
if ($uri == 'checkout') {
    require VIEW_PATH_DIR . 'partials/header.php';
    require VIEW_PATH_DIR . 'checkout.php';
    require VIEW_PATH_DIR . 'partials/footer.php';
    exit;
}
if ($uri == 'contact') {
    require VIEW_PATH_DIR . 'partials/header.php';
    require VIEW_PATH_DIR . 'contact.php';
    require VIEW_PATH_DIR . 'partials/footer.php';
    exit;
}
if ($uri == 'test') {
    require VIEW_PATH_DIR . 'test.php';
    exit;
}
if ($uri == 'login') {
    require VIEW_PATH_DIR . 'login.php';
    exit;
}
if ($uri == 'chinhsachdoitra') {
    require VIEW_PATH_DIR . 'partials/header.php';
    require VIEW_PATH_DIR . 'chinhsachdoitra.php';
    require VIEW_PATH_DIR . 'partials/footer.php';
    exit;
}
if ($uri == 'about-us') {
    require VIEW_PATH_DIR . 'partials/header.php';
    require VIEW_PATH_DIR . 'about-us.php';
    require VIEW_PATH_DIR . 'partials/footer.php';
    exit;
}

require VIEW_PATH_DIR . '404.php';
