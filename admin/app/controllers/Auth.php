<?php
class Auth extends Controller
{
    private $adminModel;

    public function __construct()
    {
        $this->adminModel = $this->model("AdminModel");
    }

    public function signin()
    {
        if (isset($_SESSION['admin_logged'])) {
            header("Location: " . ROOT_URL_ADMIN . "dashboard");
            exit();
        }

        $this->renderView("simple_layout", [
            "page" => "auth/signin",
            "title" => "Đăng nhập"
        ]);
    }

    public function postSignin()
    {
        $email = trim($_POST['login-email'] ?? '');
        $password = trim($_POST['login-password'] ?? '');

        if (empty($email) || empty($password)) {
            $_SESSION['error'] = "Vui lòng nhập đầy đủ email và mật khẩu!";
            header("Location: " . ROOT_URL_ADMIN . "auth/signin");
            exit();
        }

        $user = $this->adminModel->checkLogin($email, $password);

        if ($user) {
            $_SESSION['admin_logged'] = true;
            $_SESSION['admin_user'] = $user;

            header("Location: " . ROOT_URL_ADMIN . "dashboard");
            exit();
        } else {
            $_SESSION['error'] = "Email hoặc mật khẩu không chính xác!";
            header("Location: " . ROOT_URL_ADMIN . "auth/signin");
            exit();
        }
    }

    public function logout()
    {
        unset($_SESSION['admin_logged']);
        unset($_SESSION['admin_user']);

        header("Location: " . ROOT_URL_ADMIN . "auth/signin");
        exit();
    }
}
