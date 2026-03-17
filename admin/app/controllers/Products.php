<?php
class Products extends Controller
{
    private $productsModel;
    public function __construct()
    {
        $this->productsModel = $this->model("SanPhamModel");
    }

    public function default($id = null)
    {
        if ($id !== null) {
            return $this->detail($id);
        }

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

    public function detail($id = null)
    {
        $this->renderView("main_layout", [
            "page" => "product_detail",
            "title" => "Chi tiết sản phẩm " . $id,
            "id" => $id,
            "Plugin"  => ["select2" => 1],
            "Script"  => "product_detail"
        ]);
    }
}
