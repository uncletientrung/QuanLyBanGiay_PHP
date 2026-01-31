<?php
class Auth extends Controller
{

    public function signin()
    {
        $this->renderView("simple_layout", [
            "page" => "auth/signin",
            "title" => "Đăng nhập"
        ]);
    }

    public function signup()
    {
        $this->renderView("simple_layout", [
            "page" => "auth/signup",
            "title" => "Đăng ký"
        ]);
    }

    public function reminder()
    {
        $this->renderView("simple_layout", [
            "page" => "auth/reminder",
            "title" => "Quên mật khẩu"
        ]);
    }
}
