<?php
require_once "../QuanLyBanGiay_PHP/config/connectdb.php";
require_once "../QuanLyBanGiay_PHP/app/controllers/SanPhamController.php";
require_once "../QuanLyBanGiay_PHP/app/controllers/HinhAnhController.php";

$spController = new SanPhamController($conn);
$listSP = $spController->getAll();
$listBestSellingALL = $spController->getBestSellingByName("all");
?>
<?php
// echo "<script>console.log(" . json_encode($maHang) . ");</script>";
foreach ($listBestSellingALL as $sp) { // Danh sách sản phẩm
    echo "<pre>";
    print_r($sp);
    echo "</pre>";
}





