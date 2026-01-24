<?php
require_once __DIR__ . '/inc/_global/config.php';
require_once __DIR__ . '/inc/backend/config.php';

$dm->assets_folder = '../public';

$dm->inc_sidebar      = '';
$dm->inc_header       = '';
$dm->inc_footer       = '';
$dm->inc_side_overlay = '';

$dm->l_sidebar_visible_desktop = false;
$dm->l_sidebar_visible_mobile  = false;
$dm->l_sidebar_mini            = false;

require __DIR__ . '/inc/_global/views/head_start.php';
require __DIR__ . '/inc/_global/views/head_end.php';
require __DIR__ . '/inc/_global/views/page_start.php';

include __DIR__ . '/pages/' . $viewContent . '.php';

require __DIR__ . '/inc/_global/views/page_end.php';
require __DIR__ . '/inc/_global/views/footer_start.php';
require __DIR__ . '/inc/_global/views/footer_end.php';
