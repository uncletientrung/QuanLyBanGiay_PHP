<?php
require_once APP_PATH_DIR . "models/KhachHangModel.php";
class AccountController
{
    private $UserModel;
    public function __construct($conn)
    {
        $this->UserModel = new KhachHangModel($conn);
    }
    public function logout()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Xóa sạch các key user
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
        }
        if (isset($_SESSION['user-id'])) {
            unset($_SESSION['user-id']);
        }

        // Hủy cookie session (nếu dùng)
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

        // Destroy session hoàn toàn
        session_destroy();

        // Chống cache
        header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
        header("Pragma: no-cache");
        header("Expires: Thu, 01 Jan 1970 00:00:00 GMT");

        // Redirect + timestamp chống cache
        header('Location: ' . APP_PATH . '?t=' . time());
        exit();
    }
    public function updateProfile()
    {
        $user_id = $_SESSION['user-id'] ?? NULL;
        $user_data = [];
        $user_data['hoten'] = $_POST['hoten'] ?? NULL;
        $user_data['email'] = $_POST['email'] ?? NULL;
        $user_data['sdt'] = $_POST['sdt'] ?? NULL;
        $user_data['gioitinh'] = $_POST['gioitinh'] ?? NULL;
        $user_data['diachi'] = $_POST['diachi'] ?? NULL;
        $rowCount = $this->UserModel->updateProfile_Model($user_id, $user_data);
        if ($rowCount >= 0) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'Cập nhật thất bại'
            ]);
        }
        // return $user_data;
    }
    public function updatePassword()
    {
        $user_id = $_SESSION['user-id'] ?? NULL;
        $user = $this->UserModel->getById($user_id);
        $password_data = [];
        $password_data['old-password'] = $_POST['password'] ?? '';
        $password_data['new-password'] = $_POST['password-new'] ?? '';
        $password_data['confirm-password'] = $_POST['password-confirm'] ?? '';
        if (empty($password_data['old-password']) || empty($password_data['new-password']) || 
            empty($password_data['confirm-password'])) {
            echo json_encode([
                'success' => false,
                'message' => 'Vui lòng nhập đầy đủ thông tin chỉnh sửa mật khẩu'
            ]);
            return;
        }
        if ($user['matkhau'] != $password_data['old-password']) {
            echo json_encode([
                'success' => false,
                'message' => 'Mật khẩu cũ không chính xác'
            ]);
            return;
        }
        if ($password_data['new-password'] != $password_data['confirm-password']) {
            echo json_encode([
                'success' => false,
                'message' => 'Mật khẩu mới không trùng nhau'
            ]);
            return;
        }
        $rowCount = $this->UserModel->updatePassword_Model($user_id, $password_data['new-password']);
        if ($rowCount >= 0) {
            echo json_encode([
                'success' => true,
                'current-password' => $password_data['new-password']
                ]);
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'Cập nhật password thất bại'
            ]);
        }
    }
    public function showAccountPage()
    {
        $user_id = $_SESSION['user-id'] ?? NULL;
        $user = $this->UserModel->getById($user_id);
        require VIEW_PATH_DIR . 'account.php';
    }
}
