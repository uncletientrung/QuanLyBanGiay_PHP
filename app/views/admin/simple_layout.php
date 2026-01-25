<?php
require_once __DIR__ . '/inc/_global/config.php';

$dm->assets_folder = '/QuanLyBanGiay_Php/public';

require __DIR__ . '/inc/_global/views/head_start.php';
require __DIR__ . '/inc/_global/views/head_end.php';
require __DIR__ . '/inc/_global/views/page_start.php';

include __DIR__ . '/pages/' . $page . '.php';

require __DIR__ . '/inc/_global/views/page_end.php';
require __DIR__ . '/inc/_global/views/footer_start.php';
require __DIR__ . '/inc/_global/views/footer_end.php';
