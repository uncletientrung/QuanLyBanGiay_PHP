<?php
require_once APP_PATH_DIR . 'models/DonHangModel.php';

class TrackOrderController
{
    private $DonHangModel;
    public function __construct($conn)
    {
        $this->DonHangModel = new DonHangModel($conn);
    }
    public function getStatusText($trangthaiDH)
    {
        switch ($trangthaiDH) {
            case 1:
                return 'Chờ xác nhận';
            case 2:
                return 'Đang giao hàng';
            case 3:
                return 'Đã giao hàng';
            case 0:
                return 'Đã hủy';
            default:
                return 'Chờ xác nhận';
        }
    }

    public function showTrackOrder()
    {
        $user_id = $_SESSION['user-id'] ?? NULL;
        $orders = $this->DonHangModel->getAllByMaKH($user_id);
        echo '<script> console.log(' . json_encode($orders) . ')</script>';
        foreach ($orders as &$order) {
            $order['soluongSP'] = $this->DonHangModel->getCountOrderByMaDH($order['madh']);
            $order['trangthaiDH'] = $this->getStatusText($order['trangthai']);
        }
        require VIEW_PATH_DIR . 'track-order.php';
    }
}
