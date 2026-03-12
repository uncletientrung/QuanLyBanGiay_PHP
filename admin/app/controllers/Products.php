<?php
class Products extends Controller
{
    private $productsModel;
    public function __construct()
    {
        $this->productsModel = $this->model("SanPhamModel");
    }

    public function default()
    {
        $this->renderView("main_layout", [
            "page" => "products",
            "title" => "Quản lý sản phẩm",
            "Plugin" => [
                "datatables" => 1,
            ],
            "Script" => "products"
        ]);
    }

    public function getData()
    {
        echo json_encode($this->productsModel->getAllForAdmin());
        exit();
    }
}
