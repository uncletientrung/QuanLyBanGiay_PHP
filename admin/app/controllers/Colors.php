<?php
class Colors extends Controller
{
    private $colorModel;
    
    public function __construct()
    { 
        $this ->colorModel = $this->model("MauSacModel");
    }

    public function default()
    {
        $this->renderView("main_layout", [
            "page" => "colors",
            "title" => "Quản lý màu sắc",
            "Plugin"  => [
                "datatables" => 1,
            ],
            "Script" => "colors"
        ]);
    }

    public function getData()
    { 
        echo json_encode($this->colorModel->getAll());
        exit;
    }
}
