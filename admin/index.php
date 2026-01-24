<?php
require_once '../config/constants.php';
require_once '../config/connectdb.php';

// Lấy trang hiện tại
$page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';
$viewContent = rtrim($page, '/');

$routes = [
    'signin'  => 'auth/signin',
    'signup'  => 'auth/signup',
    'reminder' => 'auth/reminder'
];

if (array_key_exists($viewContent, $routes)) {
    $viewContent = $routes[$viewContent];
}

$targetFile = '../app/views/admin/pages/' . $viewContent . '.php';

if (!file_exists($targetFile)) {
    echo "<script>console.log('Không tìm thấy: " . $targetFile . "');</script>";
    $viewContent = 'error/error_404';
    $targetFile = '../app/views/admin/pages/' . $viewContent . '.php';
}

$blankPages = ['auth/signin', 'auth/signup', 'auth/reminder', 'error/error_404'];

if (in_array($viewContent, $blankPages)) {
    include_once '../app/views/admin/simple_layout.php';
} else {
    include_once '../app/views/admin/main_layout.php';
}
