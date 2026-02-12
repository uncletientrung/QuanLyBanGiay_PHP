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

            if ($this->adminModel->updateProfile($maadmin, $hoten, $email, $sdt)) {
                $_SESSION['admin_user']['hoten'] = $hoten;
                $_SESSION['admin_user']['email'] = $email;
                $_SESSION['admin_user']['sdt']   = $sdt;
                echo json_encode(["status" => "success", "message" => "Cập nhật thông tin thành công!"]);
            } else {
                echo json_encode(["status" => "error", "message" => "Không có thay đổi hoặc có lỗi xảy ra!"]);
            }
            exit;
        }
    }

    public function changePassword()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $maadmin = $_SESSION['admin_user']['maadmin'];
            $currentPassword = $_POST['current_password'] ?? '';
            $newPassword     = $_POST['new_password'] ?? '';

            $user = $this->adminModel->getAdminById($maadmin);

            if ($currentPassword !== $user['password']) {
                echo json_encode(["status" => "error", "message" => "Mật khẩu hiện tại không đúng!"]);
            } else {
                if ($this->adminModel->updatePassword($maadmin, $newPassword)) {
                    echo json_encode(["status" => "success", "message" => "Đổi mật khẩu thành công!"]);
                } else {
                    echo json_encode(["status" => "error", "message" => "Lỗi không thể cập nhật!"]);
                }
            }
            exit;
        }
    }
}
