<?php
require_once "../QuanLyBanGiay_PHP/config/connectdb.php";
require_once "../QuanLyBanGiay_PHP/app/controllers/SanPhamController.php";

$spController = new SanPhamController($conn);
$listSP = $spController->getAll();
?>
<?php
foreach ($listSP as $sp) {
    echo "<pre>";
    print_r($sp);
    echo "</pre>";
}
