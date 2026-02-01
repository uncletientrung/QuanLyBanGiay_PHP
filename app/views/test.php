<?php
require_once "../QuanLyBanGiay_PHP/config/connectdb.php";
require_once "../QuanLyBanGiay_PHP/app/controllers/SanPhamController.php";
require_once "../QuanLyBanGiay_PHP/app/controllers/HinhAnhController.php";

$spController = new HinhAnhController($conn);
$listSP = $spController->getAll();
?>
<?php
// foreach ($listSP as $sp) {
//     echo "<pre>";
//     print_r($sp);
//     echo "</pre>";
// }

print_r($spController->getMainImageById(2));
