<?php
class User extends Controller
{
    private $khachHangModel;

    public function __construct()
    {
        $this->khachHangModel = $this->model("KhachHangModel");
    }

    public function default()
    {
        $this->renderView("main_layout", [
            "page" => "user",
            "title" => "Quản lý người dùng",
            "Plugin"  => [
                "sweetalert2" => 1,
                "notify" => 1,
                "datatables" => 1
            ],
            "Script"  => "user"
        ]);
    }

    public function getData()
    {
        $data = $this->khachHangModel->getAll();
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }
}
