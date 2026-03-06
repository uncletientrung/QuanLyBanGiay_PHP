<?php
require_once APP_PATH_DIR . 'models/GioHangModel.php';
require_once APP_PATH_DIR . 'models/SanPhamModel.php';
require_once APP_PATH_DIR . 'models/HinhAnhModel.php';
require_once APP_PATH_DIR . 'models/KhachHangModel.php';
require_once APP_PATH_DIR . "models/DonHangModel.php";
require_once APP_PATH_DIR . "models/CTDonHangModel.php";
require_once APP_PATH_DIR . "models/SizeModel.php";

class ChackoutController
{
    private $KhachHangModel;
    private $CartModel;
    private $SanPhamModel;
    private $HinhAnhModel;
    private $DonHangModel;
    private $CTDonHangModel;
    private $SizeModel;

    public function __construct($conn)
    {
        $this->KhachHangModel = new KhachHangModel($conn);
        $this->CartModel = new GioHangModel($conn);
        $this->SanPhamModel = new SanPhamModel($conn);
        $this->HinhAnhModel = new HinhAnhModel($conn);
        $this->DonHangModel = new DonHangModel($conn);
        $this->CTDonHangModel = new CTDonHangModel($conn);
        $this->SizeModel = new SizeModel($conn);
    }
    public function addOrder()
    {
        $user_id = $_SESSION['user-id'] ?? null;
        if (!$user_id) return false;
        $user = $this->KhachHangModel->getById($user_id);
        $carts = $this->CartModel->getCartsByUserId_Model($user_id);
        if (empty($carts)) return false;
        try {
            $this->DonHangModel->beginTransaction();
            $tongtien = 0;
            foreach ($carts as $item) {
                $tongtien += $item['giaban'] * $item['soluong'];
            }
            $pttt = $_POST['phuongthucthanhtoan'] ?? 2;
            $order_data = [
                'tongtien' => $tongtien,
                'phuongthucthanhtoan' => $pttt == 1 ? "Chuyển khoản" : "Tiền mặt"
            ];
            $diachi = empty($_POST['diachi_khac']) ? $user['diachi'] : $_POST['diachi_khac'];
            $madh = $this->DonHangModel->addOrder_Model($user_id, $order_data, $diachi);
            if (!$madh) {
                $this->DonHangModel->rollBack();
                return false;
            }

            foreach ($carts as $item) {
                $addDetail = $this->CTDonHangModel->addOrderDetail_Model($madh, $item);
                if (!$addDetail) {
                    $this->DonHangModel->rollBack();
                    return false;
                }
                $update = $this->SizeModel->updateSoLuongSize_Model(
                    $item['masp'],
                    $item['masize'],
                    $item['soluong']
                );
                if (!$update) {
                    $this->DonHangModel->rollBack();
                    return false;
                }
                $this->CartModel->deleteItem_Model($user_id, $item['masp']);
            }

            $this->DonHangModel->commit();
            return true;
        } catch (Exception $e) {
            $this->DonHangModel->rollBack();
            return false;
        }
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
