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
            "user" => $_SESSION['admin_user']
        ]);
    }

    public function postUpdate()
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

                $_SESSION['success'] = "Cập nhật thông tin thành công!";
            } else {
                $_SESSION['error'] = "Có lỗi xảy ra, vui lòng thử lại!";
            }
            header("Location: " . ROOT_URL_ADMIN . "profile");
            exit();
        }
    }

    public function postChangePassword()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $maadmin = $_SESSION['admin_user']['maadmin'];
            $currentPassword = $_POST['current_password'] ?? '';
            $newPassword     = $_POST['new_password'] ?? '';
            $confirmPassword = $_POST['confirm_password'] ?? '';

            if (empty($currentPassword) || empty($newPassword) || empty($confirmPassword)) {
                $_SESSION['error'] = "Vui lòng nhập đầy đủ thông tin!";
                header("Location: " . ROOT_URL_ADMIN . "profile");
                exit();
            }

            if ($newPassword !== $confirmPassword) {
                $_SESSION['error'] = "Mật khẩu mới không khớp!";
                header("Location: " . ROOT_URL_ADMIN . "profile");
                exit();
            }

            $user = $this->adminModel->getAdminById($maadmin);

            if ($currentPassword !== $user['password']) {
                $_SESSION['error'] = "Mật khẩu hiện tại không chính xác!";
            } else {
                if ($this->adminModel->updatePassword($maadmin, $newPassword)) {
                    $_SESSION['success'] = "Đổi mật khẩu thành công!";
                } else {
                    $_SESSION['error'] = "Có lỗi xảy ra, vui lòng thử lại!";
                }
            }

            header("Location: " . ROOT_URL_ADMIN . "profile");
            exit();
        }
    }
}
