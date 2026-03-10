<?php
require_once APP_PATH_DIR . 'models/GioHangModel.php';
require_once APP_PATH_DIR . 'models/HangModel.php';
class HeaderController
{
    private $conn;
    public function __construct($conn)
    {
        $this->conn = $conn;
    }
    public function getHeaderData()
    {
        $data = [];
        $data['isLogin'] = !empty($_SESSION['user-id']);
        $data['cartCount'] = 0;
        if ($data['isLogin']) {
            $gioHangModel = new GioHangModel($this->conn);
            $data['cartCount'] =$gioHangModel->countCartItem_Model($_SESSION['user-id']);
        }
        $hangModel = new HangModel($this->conn);
        $data['listHang'] = $hangModel->getAll();
        
        return $data;
    }
}
