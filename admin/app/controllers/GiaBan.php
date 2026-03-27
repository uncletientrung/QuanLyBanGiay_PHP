<?php
class GiaBan extends Controller
{
    private $productModel;
    
    public function __construct()
    {
        $this->productModel = $this->model("SanPhamModel");
    }
    public function default()
    {
        $this->renderView("main_layout", [
            "page" => "giaban",
            "title" => "Quản lý giá bán",
            "Plugin" => [
                "datatables" => 1,
                "ionrangeslider" => 1,
                "select2" => 1,
            ],
            "Script" => "giaban"
        ]);
    }

    public function updateLoiNhuan() {
        if(isset($_POST["productId"]) && isset($_POST["newValue"])) {
            $productId = $_POST["productId"];
            $newValue = $_POST["newValue"];
            
            $success = $this->productModel->updateLoiNhuan($productId, $newValue);
            header('Content-Type: application/json');
            echo json_encode(['status' => $success ? 'success' : 'error']);
            exit();
        }
    }
}
