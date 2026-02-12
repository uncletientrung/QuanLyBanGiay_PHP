<?php
require_once __DIR__ . '/inc/_global/config.php';

$dm->assets_folder = '/QuanLyBanGiay_Php/admin/public';

require __DIR__ . '/inc/_global/views/header.php';

include __DIR__ . '/pages/' . $page . '.php';

require __DIR__ . '/inc/_global/views/footer.php';

include "inc/script.php";
