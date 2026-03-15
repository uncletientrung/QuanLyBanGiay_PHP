<?php
require_once APP_PATH_DIR . 'models/DonHangModel.php';
require_once APP_PATH_DIR . 'models/KhachHangModel.php';
require_once APP_PATH_DIR . 'models/SizeModel.php';
require_once APP_PATH_DIR . 'models/CTDonHangModel.php';
require_once APP_PATH_DIR . 'models/SanPhamModel.php';
require_once APP_PATH_DIR . 'models/HinhAnhModel.php';
require_once APP_PATH_DIR . 'models/MauSacModel.php';

class TrackOrderController
{
    private $DonHangModel;
    private $KhachHangModel;
    private $SizeModel;
    private $CTDonHangModel;
    private $SanPhamModel;
    private $HinhAnhModel;
    private $MauSacModel;
    public function __construct($conn)
    {
        $this->DonHangModel = new DonHangModel($conn);
        $this->KhachHangModel = new KhachHangModel($conn);
        $this->SizeModel = new SizeModel($conn);
        $this->CTDonHangModel = new CTDonHangModel($conn);
        $this->SanPhamModel = new SanPhamModel($conn);
        $this->HinhAnhModel = new HinhAnhModel($conn);
        $this->MauSacModel = new MauSacModel($conn);
    }
    public function getStatusText($trangthaiDH)
    {
        switch ($trangthaiDH) {
            case 0:
                return 'Chờ xác nhận';
            case 1:
                return 'Đang giao hàng';
            case 2:
                return 'Đã giao hàng';
            case -1:
                return 'Đã hủy';
            default:
                return 'Chờ xác nhận';
        }
    }

    public function showTrackOrder()
    {
        $user_id = $_SESSION['user-id'] ?? NULL;
        $order_truocDaoNguoc = $this->DonHangModel->getAllByMaKH($user_id);
        $orders = array_reverse($order_truocDaoNguoc);
        foreach ($orders as &$order) {
            $order['soluongSP'] = $this->CTDonHangModel->getCountOrderDetailByMaDH($order['madh']);
            $order['trangthaiDH'] = $this->getStatusText($order['trangthai']);
            $order['thoigiantao'] = date('d-m-Y H:i', strtotime($order['thoigiantao']));
        }
        echo '<script> console.log(' . json_encode($orders) . ')</script>';
        unset($order);
        require VIEW_PATH_DIR . 'track-order.php';
    }
    public function showTrackOrderDetail()
    {
        $user_id = $_SESSION['user-id'] ?? NULL;
        $user = $this->KhachHangModel->getById($user_id);
        $madh = $_GET['madh'];
        $order = $this->DonHangModel->getDHByMaDH($madh);
        $order_status = $this->getStatusText($order['trangthai']);
        $order_create = $order['thoigiantao'] = date('d-m-Y H:i', strtotime($order['thoigiantao']));
        $order_details = $this->CTDonHangModel->getAllOrderDetailByMaDH($madh);
        $tongtien = 0;
        foreach ($order_details as &$detail) {
            $detail['sanpham'] = $this->SanPhamModel->getSpById($detail['masp']);
            $detail['tensize'] = $this->SizeModel->getNameById($detail['masize'])['tensize'];
            $detail['main-image'] = $this->HinhAnhModel->getImageMainById($detail['sanpham']['masp']);
            $detail['tenmau'] = $this->MauSacModel->getNameByIdNoStatus($detail['sanpham']['mau']);
            $tongtien += $detail['dongia'] * $detail['soluong'];
        }
        unset($detail);
        echo "<script>console.log(" . json_encode($order) . ")</script>";
        echo "<script>console.log(" . json_encode($user) . ")</script>";
        echo "<script>console.log(" . json_encode($order_details) . ")</script>";

        require VIEW_PATH_DIR . 'track-order-detail.php';
    }
}
