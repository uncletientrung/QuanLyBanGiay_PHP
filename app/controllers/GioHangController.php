<?php
require_once APP_PATH_DIR . 'models/GioHangModel.php';
require_once APP_PATH_DIR . 'models/SanPhamModel.php';
require_once APP_PATH_DIR . 'models/HinhAnhModel.php';


class GioHangController
{
    private $model;
    private $SanPhamModel;
    private $HinhAnhModel;
    public function __construct($db)
    {
        $this->model = new GioHangModel($db);
        $this->SanPhamModel = new SanPhamModel($db);
        $this->HinhAnhModel =  new HinhAnhModel($db);
    }
    public function getCartsByUserId($user_id)
    {
        return $this->model->getCartsByUserId_Model($user_id);
    }
    public function updateQuantity()
    {
        $user_id = $_SESSION['user-id'] ?? null;
        if (!$user_id) {
            echo json_encode(['success' => false]);
            exit;
        }
        $masp    = $_POST['masp'] ?? null;
        $action  = $_POST['action'] ?? null;
        $soluong = (int)($_POST['soluong'] ?? 0);
        switch ($action) {
            case 'minus':
                if($soluong >=2) $soluong--;
                break;
            case 'plus':
                $soluong++;
                break;
            case 'delete':
                $this->model->deleteItem_Model($user_id, $masp);
                echo json_encode(['success' => true]);
                exit;
            default:
                echo json_encode(['success' => false]);
                exit;
        }
        $this->model->updateQuantity_Model($user_id, $masp, $soluong);
        echo json_encode(['success' => true]);
    }
    public function showCarts()
    {
        $user_id = $_SESSION['user-id'] ?? NULL;
        if (!$user_id || $user_id == NULL) {
            header('location:' . ROOT_URL . 'account/login');
            exit();
        }
        $carts = $this->model->getCartsByUserId_Model($user_id); // list sản phẩm trong giỏ
        $total = 0;
        foreach ($carts as &$item) { // Tham chiếu
            $sp = $this->SanPhamModel->getSpById($item['masp']);
            $giaBan = $sp['gianhap'] + ($sp['gianhap'] * $sp['tyleloinhuan'] / 100);
            $item['tensp']  = $sp['tensp'];
            $item['gia']  = $giaBan;
            $item['path'] = $this->HinhAnhModel->getImageMainById($item['masp']);
            $total += $giaBan * $item['soluong'];
        }
        // return $carts;
        require VIEW_PATH_DIR . 'cart.php';
    }
}
