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

            $user = $this->adminModel->checkLogin($email, $password);

            if ($user) {
                $_SESSION['admin_logged'] = true;
                $_SESSION['admin_user'] = $user;
                echo json_encode(["status" => "success"]);
            } else {
                echo json_encode(["status" => "error", "message" => "Email hoặc mật khẩu không chính xác!"]);
            }
            exit;
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
