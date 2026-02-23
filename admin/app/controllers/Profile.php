<?php
class Profile extends Controller
{
    private $adminModel;

    public function __construct()
    {
        $this->adminModel = $this->model("AdminModel");
    }

    public function default()
    {
        $this->renderView("main_layout", [
            "page" => "profile",
            "title" => "Trang cá nhân",
            "user" => $_SESSION['admin_user'],
            "Plugin"  => [
                "jquery-validate" => 1,
                "notify" => 1
            ],
            "Script"  => "profile"
        ]);
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $maadmin = $_SESSION['admin_user']['maadmin'];
            $hoten   = trim($_POST['hoten'] ?? '');
            $email   = trim($_POST['email'] ?? '');
            $sdt     = trim($_POST['sdt'] ?? '');

            $result = $this->adminModel->updateAdminProfile($maadmin, $hoten, $email, $sdt);

            $resData = json_decode($result, true);
            if ($resData['status'] === 'success') {
                $_SESSION['admin_user']['hoten'] = $hoten;
                $_SESSION['admin_user']['email'] = $email;
                $_SESSION['admin_user']['sdt']   = $sdt;
            }

            echo $result;
            exit;
        }
    }

    public function changePassword()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $maadmin = $_SESSION['admin_user']['maadmin'];
            $current = $_POST['current_password'] ?? '';
            $new     = $_POST['new_password'] ?? '';

            echo $this->adminModel->changePassword($maadmin, $current, $new);
            exit;
        }
    }
}
