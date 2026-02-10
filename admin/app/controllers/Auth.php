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
}
