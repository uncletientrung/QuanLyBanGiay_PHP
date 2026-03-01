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
        $user_id = $_SESSION['user-id'] ?? NULL;
        if ($user_id != NULL) {
            unset($_SESSION['user-id']);
            header('location:' . APP_PATH);
        }
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
        return $user_data;
    }
    public function showAccountPage()
    {
        $user_id = $_SESSION['user-id'] ?? NULL;
        $user = $this->UserModel->getById($user_id);
        require VIEW_PATH_DIR . 'account.php';
    }
}
