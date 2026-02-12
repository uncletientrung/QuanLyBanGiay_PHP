<?php
class User extends Controller
{
    public function default()
    {
        $this->renderView("main_layout", [
            "page" => "user",
            "title" => "Quản lý người dùng",
            "Plugin"  => [
                "datatables" => 1
            ],
            "Script"  => "user"
        ]);
    }
}
