<?php
require_once APP_PATH_DIR . 'models/GioHangModel.php';
require_once APP_PATH_DIR . 'models/SanPhamModel.php';
require_once APP_PATH_DIR . 'models/HinhAnhModel.php';
require_once APP_PATH_DIR . 'models/KhachHangModel.php';

class ChackoutController
{
    private $KhachHangModel;
    private $CartModel;
    private $SanPhamModel;
    private $HinhAnhModel;
    public function __construct($conn)
    {
        $this->KhachHangModel = new KhachHangModel($conn);
        $this->CartModel = new GioHangModel($conn);
        $this->SanPhamModel = new SanPhamModel($conn);
        $this->HinhAnhModel = new HinhAnhModel($conn);
    }
    public function showChackout()
    {
        $user_id = $_SESSION['user-id'] ?? NULL;
        $user = $this->KhachHangModel->getById($user_id);
        $carts = $this->CartModel->getCartsByUserId_Model($user_id);
        $total = 0;
        foreach ($carts as &$item) {
            $sp = $this->SanPhamModel->getSpById($item['masp']);
            $giaBan = $sp['gianhap'] * (1 + $sp['tyleloinhuan'] / 100);
            $item['tensp'] = $sp['tensp'];
            $item['giaban'] = $giaBan;
            $item['path'] = $this->HinhAnhModel->getImageMainById($item['masp']);
            $total += $item['soluong'] * $giaBan;
        }
        require VIEW_PATH_DIR . 'chackout.php';
    }
}
