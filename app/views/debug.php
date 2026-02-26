<?php
require_once "../QuanLyBanGiay_PHP/config/connectdb.php";
require_once "../QuanLyBanGiay_PHP/app/controllers/SanPhamController.php";
require_once "../QuanLyBanGiay_PHP/app/controllers/HinhAnhController.php";
require_once "../QuanLyBanGiay_PHP/app/controllers/AuthController.php";
require_once "../QuanLyBanGiay_PHP/app/controllers/GioHangController.php";

$spController = new SanPhamController($conn);
$listSP = $spController->getAll();
$listBestSellingALL = $spController->getBestSellingByName("all");
$UserController = new AuthController($conn);
$GioHangController = new GioHangController($conn);



?>
<?php
// echo "<script>console.log(" . json_encode($maHang) . ");</script>";
// foreach ($listBestSellingALL as $sp) { // Danh sách sản phẩm
//     echo "<pre>";
//     print_r($sp);
//     echo "</pre>";
// }
print_r($GioHangController->countCartItem());