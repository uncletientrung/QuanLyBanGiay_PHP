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
            "title" => "Đăng nhập",
            "Plugin"  => [
                "jquery-validate" => 1,
                "notify" => 1
            ],
            "Script"  => "signin"
        ]);
    }

    public function postSignin()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = trim($_POST['email'] ?? '');
            $password = trim($_POST['password'] ?? '');
            echo $this->adminModel->checkLogin($email, $password);
            exit;
        }
    }

    public function logout()
    {
        $this->adminModel->logout();
        header("Location: " . ROOT_URL_ADMIN . "auth/signin");
        exit();
    }
}
