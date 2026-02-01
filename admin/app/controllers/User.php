<?php
class User extends Controller
{
    public function default()
    {
        $this->renderView("main_layout", [
            "page" => "user", // Sẽ load file views/admin/pages/user.php
            "title" => "Quản lý người dùng"
        ]);
    }
}
