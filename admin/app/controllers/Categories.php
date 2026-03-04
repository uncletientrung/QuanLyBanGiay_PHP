<?php
class Categories extends Controller
{
    private $categoriesModel;
    
    public function __construct()
    {
        $this->categoriesModel = $this->model("LoaiModel");
    }
    public function default()
    {
        $this->renderView("main_layout", [
            "page" => "categories",
            "title" => "Quản lý danh mục",
            "Plugin" => [
                "datatables" => 1,
            ],
            "Script" => "categories"
        ]);
    }

    public function getData()
    {
        echo json_encode($this->categoriesModel->getAll());
        exit;
    }
}
