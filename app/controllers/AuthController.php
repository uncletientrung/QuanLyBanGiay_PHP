<?php
require_once __DIR__ . '/../../config/connectdb.php';
require_once __DIR__ . '/../models/AuthModel.php';
require_once __DIR__ . '/GioHangController.php'; 
class AuthController
{
    private $model;
    private $gioHangController;
    public function __construct($db)
    {
        $this->model = new AuthModel($db);
        $this->gioHangController = new GioHangController($db);
    }
    public function checkLoginUser()
    {
        if (isset($_POST['login'])) {
            $errors = [];
            $email = filter_var($_POST['userEmail'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $password = filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            if (empty($email)) {
                $errors['email'] = "Vui lòng nhập Email người dùng";
            }
            if (empty($password)) {
                $errors['password'] = "Vui lòng nhập mật khẩu người dùng";
            }
            if (!empty($password) && !empty($email)) {
                $khachhang = $this->model->getUserByEmail($email);
                if ($khachhang != FALSE) { // Nếu tìm thấy khách dựa trên mail
                    if ($khachhang['matkhau'] == $password) {
                        $_SESSION['user-id'] = $khachhang['makh'];
                         $this->gioHangController->mergeCartAfterLogin($khachhang['makh']);
                        header('location:' . ROOT_URL);
                    } else {
                        $errors['password'] = "Vui lòng nhập đúng mật khẩu";
                    }
                } else {
                    $errors['email'] = "Email người dùng không tồn tại";
                }
            }
            if (!empty($errors)) {
                $_SESSION['login-errors'] = $errors;
                $_SESSION['login-data'] = $_POST;
                header('location:' . ROOT_URL . 'account/login');
                die();
            }
        } else {
            header('location:' . ROOT_URL . 'account/login');
            die();
        }
    }
}
$auth = new AuthController($conn);
if (isset($_POST['login'])) {
    $auth->checkLoginUser();
}
