<?php
class AuthCore
{
    // Đăng nhập rồi
    public static function onLogin()
    {
        if (isset($_SESSION['admin_logged'])) {
            header("Location: " . ROOT_URL_ADMIN . "dashboard");
            exit();
        }
    }

    // Chưa đăng nhập
    public static function check()
    {
        if (!isset($_SESSION['admin_logged']) && isset($_COOKIE['admin_token'])) {
            require_once MODEL_PATH_DIR . 'AdminModel.php';
            $adminModel = new AdminModel();
            $adminModel->validateToken($_COOKIE['admin_token']);
        }

        if (!isset($_SESSION['admin_logged'])) {
            header("Location: " . ROOT_URL_ADMIN . "auth/signin");
            exit();
        }
    }
}
