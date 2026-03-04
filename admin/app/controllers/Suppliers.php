<?php
class Suppliers extends Controller
{
    /*
    private $supplierModel;
    public function __construct()
    {
        $this->supplierModel = $this->model("NhaCungCapModel");
    }
    */

    public function default()
    {
        $this->renderView("main_layout", [
            "page" => "suppliers",
            "title" => "Quản lý nhà cung cấp",
            "Plugin"  => [
                "datatables" => 1,
            ],
            "Script" => "suppliers"
        ]);
    }

    //Fetching the data
    /*
    public function getData()
    { 
        //Gán kết quả vào Tab Response của HTTP Request
        echo json_encode($this->supplierModel->getAll());
        exit;
    }
    */
}
