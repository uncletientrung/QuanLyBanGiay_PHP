<?php
class Sizes extends Controller
{
    private $sizeModel;
    public function __construct()
    { 
        $this->sizeModel = $this->model("SizeModel");
    }

    public function default()
    {
        $this->renderView("main_layout", [
            "page" => "sizes",
            "title" => "Quản lý kích cỡ",
            "Plugin"  => [
                "datatables" => 1,
            ],
            "Script" => "size"
        ]);
    }

public function getData()
    { 
        //Gán kết quả vào Tab Response của HTTP Request
        echo json_encode($this->sizeModel->getAll());
        exit;
    }
}
