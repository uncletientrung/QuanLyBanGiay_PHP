<?php
class Products extends Controller
{
    private $productsModel;
    private $sizeModel;
    private $brandsModel;
    private $categoriesModel;
    private $colorsModel;

    private $imgModel;
    public function __construct()
    {
        $this->productsModel = $this->model("SanPhamModel");
        $this->imgModel = $this->model("HinhAnhModel");
        $this->sizeModel = $this->model("SizeModel");
        $this->brandsModel = $this->model("HangModel");
        $this->categoriesModel = $this->model("LoaiModel");
        $this->colorsModel = $this->model("MauSacModel");
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
        $productInfo = $this->productsModel->getSingle($id);

        if ($productInfo == null)
            { 
                header('Location: /products');
                exit();
            }

        $productImg = $this->imgModel->getImageById($id);
        $productSize = $this->sizeModel->getSizeBySanPham($id);
        $size = $this->sizeModel->getAll();
        $brands = $this->brandsModel->getAll();
        $colors = $this->colorsModel->getAll();
        $categories = $this->categoriesModel->getAll();

        $this->renderView("main_layout", [
            "page" => "product_detail",
            "product" => $productInfo,
            "id" => $id,
            "img" => $productImg,
            "size" => $productSize,
            "allSize" => $size,
            "brands" => $brands,
            "categories"=> $categories,
            "colors"=> $colors,
            "Plugin"  => [
                "sweetalert2" => 1,
                "select2" => 1,
                "datatables" => 1,
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
