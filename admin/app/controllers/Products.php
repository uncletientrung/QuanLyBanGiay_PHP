<?php
class Products extends Controller
{
    private $productsModel;
    private $sizeModel;
    private $mediaModel;
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
                "ionrangeslider" => 1,
                "select2" => 1,
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
            "id" => $id,
            "Plugin"  => [
                "sweetalert2" => 1,
                "select2" => 1,
            ],
            "Script"  => "product_detail"
        ]);
    }
    public function delete()
    { 
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ids = $_POST['ids'] ?? []; // Mảng danh sách mã đơn hàng
            if (!empty($ids)) {
                $successCount = 0;
                foreach ($ids as $id) {
                    if ($this->productsModel->deleteById($id)) $successCount++;
                }

                if ($successCount > 0) {
                    echo json_encode(['status' => 'success', 'message' => "Thay đổi $successCount dòng trong sản phẩm"]);
                } else {
                    echo json_encode(['status' => 'error', 'message' => 'Thất bại']);
                }
            }
            exit;
        }
    }
}
