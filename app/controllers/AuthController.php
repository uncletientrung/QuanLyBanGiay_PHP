<?php
require_once __DIR__ . '/../../config/connectdb.php';
require_once __DIR__ . '/../models/AuthModel.php';
require_once __DIR__ . '/GioHangController.php';
require_once APP_PATH_DIR . 'models/KhachHangModel.php';
require_once APP_PATH_DIR . "models/DonHangModel.php";
require_once APP_PATH_DIR . "models/CTDonHangModel.php";

class AuthController
{
    private $model;
    private $gioHangController;
    private $KhachHangModel;
    private $DonHangModel;
    private $CTDonHangModel;
    public function __construct($db)
    {
        $this->model = new AuthModel($db);
        $this->gioHangController = new GioHangController($db);
        $this->KhachHangModel = new KhachHangModel($db);
        $this->DonHangModel  = new DonHangModel($db);
        $this->CTDonHangModel = new CTDonHangModel($db);
    }
    public function checkLoginUser()
    {
        if (!isset($_POST['login'])) {
            echo json_encode(['success' => false, 'message' => 'Yêu cầu không hợp lệ']);
            exit;
        }
        $errors = [];
        $email    = trim($_POST['userEmail'] ?? '');
        $password = trim($_POST['password'] ?? '');

        if (empty($email)) {
            $errors['email'] = "Vui lòng nhập Email";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "Email không đúng định dạng";
        }

        if (empty($password)) {
            $errors['password'] = "Vui lòng nhập mật khẩu";
        } elseif (strlen($password) < 3) {
            $errors['password'] = "Mật khẩu phải có ít nhất 3 ký tự";
        }

        if (!empty($errors)) {
            echo json_encode(['success' => false, 'errors' => $errors]);
            exit;
        }

        $khachhang = $this->model->getUserByEmail($email);
        if ($khachhang === false) {
            echo json_encode([
                'success' => false,
                'errors' => ['email' => "Email này chưa được đăng ký"]
            ]);
            exit;
        }
        // So sánh mật khẩu 
        if ($khachhang['matkhau'] === $password) {
            $_SESSION['user']    = $khachhang;
            $_SESSION['user-id'] = $khachhang['makh'];
            $this->gioHangController->mergeCartAfterLogin($khachhang['makh']);
            echo json_encode([
                'success' => true,
                'message' => 'Đăng nhập thành công'
            ]);
            exit;
        } else {
            echo json_encode([
                'success' => false,
                'errors' => ['password' => "Mật khẩu không đúng"]
            ]);
            exit;
        }
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

    public function checkDonHang()
    {
        if (!isset($_POST['checkorder'])) {
            echo json_encode(['success' => false, 'message' => 'Yêu cầu không hợp lệ']);
            exit;
        }
        $errors = [];
        $orderCode  = trim($_POST['orderCode'] ?? '');
        $email = trim($_POST['orderEmail'] ?? '');
        if (empty($orderCode)) {
            $errors['orderCode'] = 'Mã đơn hàng không được để trống';
        } else if (!preg_match('/^DH-[0-9]+$/', $orderCode)) {
            $errors['orderCode'] = 'Mã đơn hàng không đúng định dạng (DH-số)';
        }

        if (empty($email)) {
            $errors['orderEmail'] = 'Email không được để trống';
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['orderEmail'] = 'Email không hợp lệ';
        }

        $order = $this->DonHangModel->getDHByMaDH(substr($orderCode, 3));
        if (!$order) {
            $errors['general'] = 'Đơn hàng này không tồn tại';
        }

        $user = $this->KhachHangModel->getUserByEmail($email);
        if (!$user) {
            $errors['general'] = 'Người dùng này không còn tồn tại trong hệ thống';
        }
        if ($order && $user && $order['makh'] != $user['makh']) {
            $errors['general'] = 'Email không khớp với đơn hàng';
        }

        if (!empty($errors)) {
            echo json_encode(['success' => false, 'errors' => $errors]);
            exit;
        } else {
            echo json_encode([
                'success' => true,
                'data' => [
                    'madh' => $order['madh'],
                    'thoigiantao' => $order['thoigiantao'],
                    'sdt' => $user['sdt'],
                    'diachigiaohang' => $order['diachigiaohang'],
                    'trangthai' => $this->getStatusText($order['trangthai']),
                    'tongtien' => $order['tongtien'],
                    'username' => $user['hoten']
                ]
            ]);
            exit;
        }
    }
}
