<?php
require_once __DIR__ . '/inc/_global/config.php';
require_once __DIR__ . '/inc/backend/config.php';

$dm->assets_folder = '/QuanLyBanGiay_Php/admin/public';

include "inc/script.php";

require __DIR__ . '/inc/_global/views/header.php';

include __DIR__ . '/pages/' . $page . '.php';

require __DIR__ . '/inc/_global/views/footer.php';