<?php
require_once __DIR__ . '/inc/_global/config.php';
require_once __DIR__ . '/inc/backend/config.php';
$dm->assets_folder = '/QuanLyBanGiay_PHP/public/admin';

require __DIR__ . '/inc/_global/views/head_start.php';
require __DIR__ . '/inc/_global/views/head_end.php';
require __DIR__ . '/inc/_global/views/page_start.php';

// Kiểm tra và include nội dung
$targetFile = __DIR__ . '/pages/' . $viewContent . '.php';
if (file_exists($targetFile)) {
    include $targetFile;
} else {
    echo "<div class='content'><h2>Trang $viewContent đang xây dựng...</h2></div>";
}

require __DIR__ . '/inc/_global/views/page_end.php';
require __DIR__ . '/inc/_global/views/footer_start.php';
require __DIR__ . '/inc/_global/views/footer_end.php';
