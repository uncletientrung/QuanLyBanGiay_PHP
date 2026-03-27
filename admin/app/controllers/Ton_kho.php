<?php
class Ton_kho extends Controller
{
    private $productModel;
    public function __construct()
    {
        $this->productModel = $this->model("SanPhamModel");
    }

    public function default()
    {
        $this->renderView("main_layout", [
            "page" => "ton_kho",
            "title" => "Quản lý tồn kho",
            "Plugin"=> [
                "datatables" => 1,
                "flatpickr" => 1,
            ],
            "Script"=> "ton_kho",
        ]);
    }

    public function getAllStock()
    { 
        echo json_encode($this->productModel->getAllStock());
        exit();
    }

    public function getStockById()
    { 
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
            header('Content-Type: application/json');
            echo json_encode($this->productModel->getStockByID($id));
            exit();
        }
        echo json_encode("This one didnt run");
        exit();
    }
    
}
