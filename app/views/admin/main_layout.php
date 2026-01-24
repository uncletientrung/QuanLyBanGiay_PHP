<?php
require_once __DIR__ . '/inc/_global/config.php';
require_once __DIR__ . '/inc/backend/config.php';

$dm->assets_folder = '../public';

$dm->inc_sidebar      = __DIR__ . '/inc/backend/views/inc_sidebar.php';
$dm->inc_header       = __DIR__ . '/inc/backend/views/inc_header.php';
$dm->inc_footer       = __DIR__ . '/inc/backend/views/inc_footer.php';
$dm->inc_side_overlay = __DIR__ . '/inc/backend/views/inc_side_overlay.php';

$dm->l_sidebar_visible_desktop = true;
$dm->l_sidebar_visible_mobile  = false;
$dm->l_header_fixed            = true;

require __DIR__ . '/inc/_global/views/head_start.php';
require __DIR__ . '/inc/_global/views/head_end.php';
require __DIR__ . '/inc/_global/views/page_start.php';

include __DIR__ . '/pages/' . $viewContent . '.php';

require __DIR__ . '/inc/_global/views/page_end.php';
require __DIR__ . '/inc/_global/views/footer_start.php';
require __DIR__ . '/inc/_global/views/footer_end.php';
