<?php
require_once __DIR__ . '/inc/_global/config.php';
require_once __DIR__ . '/inc/backend/config.php';

$dm->assets_folder = '../public';

require __DIR__ . '/inc/_global/views/head_start.php';
require __DIR__ . '/inc/_global/views/head_end.php';
require __DIR__ . '/inc/_global/views/page_start.php';

include __DIR__ . '/pages/' . $viewContent . '.php';

require __DIR__ . '/inc/_global/views/page_end.php';
require __DIR__ . '/inc/_global/views/footer_start.php';
require __DIR__ . '/inc/_global/views/footer_end.php';
