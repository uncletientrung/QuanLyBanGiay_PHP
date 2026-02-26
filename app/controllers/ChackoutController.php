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
        $this->CartModel = new GioHangController($conn);
        $this->SanPhamModel = new SanPhamController($conn);
        $this->HinhAnhModel = new HinhAnhController($conn);
    }
}
