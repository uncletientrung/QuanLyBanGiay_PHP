<?php
class Nhap_hang extends Controller
{
    private $phieuNhapModel;

    public function __construct()
    {
        $this->phieuNhapModel = $this->model("PhieuNhapModel");
    }

    public function default()
    {
        $this->renderView("main_layout", [
            "page" => "nhap_hang",
            "title" => "Quản lý nhập hàng",
            "Plugin" => ["sweetalert2" => 1, "datatables" => 1],
            "Script" => "nhap_hang"
        ]);
    }

    public function getData()
    {
        echo json_encode($this->phieuNhapModel->getAll());
        exit;
    }
}
