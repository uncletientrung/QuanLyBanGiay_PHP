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

    public function getIdAndName()
    { 
        echo json_encode($this->productsModel->getIdAndName());
        exit();
    }

    public function detail($id = null)
    {
        if ($id != 0)
        {
            $productInfo = $this->productsModel->getSingle($id);
            $productImg = $this->imgModel->getImageById($id);
        }
        else {
            $nextId = $this->productsModel->getNextId();
            $productInfo = [[
                "masp" => $nextId[0]['nextId'],
                "tensp" => "", 
                "tenloai" => "",
                "gioitinh" => "",
                "tenhang" => "",
                "tenmau" => "",
                "trangthai" => "",
                "motasp" => ""
            ]];
            
            $productImg = [];
        }
        if ($productInfo == null)
        { 
            header('Location: /products');
            exit();
        }

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
                "jquery-validate" => 1,
            ],
            "Script"  => "product_detail"
        ]);
    }
    public function delete()
    { 
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ids = $_POST['ids'] ?? [];
            if (!empty($ids)) {
                $successCount = 0;
                foreach ($ids as $id) {
                    if ($this->productsModel->hasDependencies($id)) { 
                        $this->productsModel->changeStatus($id);
                        $successCount++;
                    } else {
                        $this->productsModel->deleteById($id);
                    }
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

    public function addNewProd()
    { 
        if (isset($_POST['data']))
        {
            $data = $_POST['data'];
            $success = $this->productsModel->addSanPham($data);
            echo json_encode(['status' => $success ? 'success' : 'error']);
            exit();
        }
    }
    
    public function updateInfo()
    {
        if (isset($_POST['data']))
        {
            $data = $_POST['data'];
            $success = $this->productsModel->updateSanpham($data);
            echo json_encode(['status' => $success ? 'success' : 'error']);
            exit();
        }
    }

    public function addNewSize() {
        if(isset($_POST['data'])) {
            $data = $_POST['data'];
            $oldId = $_POST['oldId'];
            $success = $this->productsModel->addNewSize($data, $oldId);
            echo json_encode(['status' => $success ? 'success' : 'error']);
            exit();
        }
        echo json_encode("No param");
        exit();
    }

    public function updateSizeAndStock() {
        if(isset($_POST['data'])  && isset($_POST['oldId'])) {
            $data = $_POST['data'];
            $oldId = $_POST['oldId'];
            $success = $this->productsModel->updateSizeAndStock($data, $oldId);
            echo json_encode(['status' => $success ? 'success' : 'error']);
            exit();
        }
    }

    public function deleteSizeAndStock() {
        if(isset($_POST['data'])) {
            $data = $_POST['data'];
            $success = $this->productsModel->deleteSizeAndStock($data);
            echo json_encode(['status' => $success ? 'success' : 'error']);
            exit();
        }
    }
    
    public function upload() {
        $targetDir = __DIR__ . "/../../../public/img/products/";
        
        $masp = $_POST['masp'] ?? null;
        $uploadedFiles = [];

        if (isset($_FILES['images'])) {
            foreach ($_FILES['images']['tmp_name'] as $key => $tmpName) {
                $fileName = basename($_FILES['images']['name'][$key]);
                $targetFilePath = $targetDir . $fileName;

                if (move_uploaded_file($tmpName, $targetFilePath)) {
                    $dbPath = "public/img/products/" . $fileName;
                    $this->imgModel->insertImage($masp, $dbPath);
                    $uploadedFiles[] = $dbPath;
                }
            }
        }

            $data = [
                'status' => 'success',
                'message' => 'It worked!',
                'files' => $uploadedFiles
            ];

        // 2. Encode the ARRAY
        header('Content-Type: application/json');
        echo json_encode($data);
        exit();
    }

    public function setBanner() {
        $path = $_POST['path'] ?? null;
        $masp = $_POST['masp'] ?? null;

        if ($path && $masp) {
            $success = $this->imgModel->updateBanner($masp, $path);

            header('Content-Type: application/json');
            echo json_encode(['status' => $success ? 'success' : 'error']);
            exit();
        }
    }

    public function deleteImage() {
        $path = $_POST['path'] ?? null;
        $masp = $_POST['masp'] ?? null;

        if ($path && $masp) {
            $success = $this->imgModel->delete($masp, $path);

            header('Content-Type: application/json');
            echo json_encode(['status' => $success ? 'success' : 'error']);
            exit();
        }
    }

    public function checkDuplicateName() {
        $tensp = $_POST['tensp'];
        if (isset($tensp)) {
            echo json_encode(!$this->productsModel->checkDuplicateName($tensp));
            exit();
        }
        echo json_encode(false);
        exit(); 
    }
}
