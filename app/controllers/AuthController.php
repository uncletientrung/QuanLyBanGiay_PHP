<?php
require_once "../QuanLyBanGiay_PHP/app/models/AuthModel.php";
require '../QuanLyBanGiay_PHP/config/constants.php';
class AuthController
{
    private $model;
    public function __construct($db)
    {
        $this->model = new AuthModel($db);
    }
    public function checkLoginUser()
    {
        if (isset($_POST['submit'])) {
            $email = filter_var($_POST['userEmail'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $passwrod = filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            if (!$email) {
                $_SESSION['login'] = "Vui lòng nhập Email người dùng";
            } elseif (!$passwrod) {
                $_SESSION['login'] = "Vui lòng nhập mật khẩu người dùng";
            } else {
                $khachhang = $this->model->getUserByEmail($email);
                if ($khachhang != FALSE) { // Nếu tìm thấy khách dựa trên mail
                    if ($khachhang['matkhau'] == $passwrod) {
                        $_SESSION['user-id'] = $khachhang['makh'];
                        header('location:' . ROOT_URL);
                    } else {
                        $_SESSION['login'] = "Vui lòng nhập đúng mật khẩu";
                    }
                } else {
                    $_SESSION['login'] = "Email người dùng không tồn tại";
                }
            }
            if(isset($_SESSION['login'])){
                $_SESSION['login-data']=$_POST;
                header('location:'.ROOT_URL.'account/login');
                die();
            }
        }else{
            header('location:'.ROOT_URL.'account/login');
            die();
        }
    }
}
