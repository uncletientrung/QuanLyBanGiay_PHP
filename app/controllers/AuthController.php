<?php
require_once "../QuanLyBanGiay_PHP/app/models/AuthModel.php";
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
        }
    }
}
