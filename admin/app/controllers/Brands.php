<?php
class Brands extends Controller
{
    private $brandsModel;

    public function __construct()
    {
        $this->brandsModel = $this->model("HangModel");
    }

    public function default()
    {
        $this->renderView("main_layout", [
            "page" => "brands",
            "title" => "Quản lý thương hiệu",
            "Plugin"  => [
                "datatables" => 1,
            ],
            "Script" => "brands"
        ]);
    }

    //Fetching the data
    public function getData()
    { 
        //Gán kết quả vào Tab Response của HTTP Request
        echo json_encode($this->brandsModel->getAll());
        exit;
    }
}
