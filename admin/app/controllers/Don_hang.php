<?php
class Don_hang extends Controller
{
    private $donhangModel;

    public function __construct()
    {
        $this->donhangModel = $this->model("DonHangModel");
    }

    public function default()
    {
        $this->renderView("main_layout", [
            "page" => "don_hang",
            "title" => "Quản lý đơn hàng",
            "Plugin"  => [
                "flatpickr" => 1,
                "sweetalert2" => 1,
                "notify" => 1,
                "datatables" => 1,
                "jquery-validate" => 1
            ],
            "Script"  => "don_hang"
        ]);
    }

    public function getData()
    {
        echo json_encode($this->donhangModel->getAll());
        exit;
    }
}
