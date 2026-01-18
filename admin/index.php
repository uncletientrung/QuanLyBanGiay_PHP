<?php
require_once '../config/constants.php';

// Xác định trang cần hiển thị từ tham số URL
$page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';
$page = htmlspecialchars($page);

// Đường dẫn đến thư mục pages
$pages_dir = '../app/views/admin/pages/';
$page_file = $pages_dir . $page . '.php';

// Kiểm tra file tồn tại, nếu không thì dùng dashboard mặc định
if (!file_exists($page_file)) {
    $page = 'dashboard';
    $page_file = $pages_dir . 'dashboard.php';
}

// Load giao diện và truyền biến $page
include_once '../app/views/admin/main_layout.php';
