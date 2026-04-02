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
                "sweetalert2" => 1,
                "notify" => 1,
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
        
    public function getDataByProd() {
        $id  = $_GET['id'] ?? [];
        if (!empty($id)) {
            echo json_encode($this->sizeModel->getSizeBySanPham($id));
        }
        exit();
    }
    
    public function add()
    { 
        header('Content-Type: application/json');
        $sosize = $_POST['sosize'];
        if (isset($sosize)) {
            $success = $this->sizeModel->add($sosize);
            echo json_encode(['status' => $success ? 'success' : 'failed']);
            exit();
        }
        echo json_encode("Didnt run");
        exit();
    }

    public function delete()
    { 
        header('Content-Type: application/json');
        $id = $_POST['id'];
        if (isset($id)) {
            if ($this->sizeModel->isInProds($id))
                $success = $this->sizeModel->changeStatus($id, 0);
            else 
                $success = $this->sizeModel->delete($id);
            echo json_encode(['status' => $success ? 'success' : 'failed']);
            exit();
        }
        echo json_encode("Delete failed");
        exit();
    }

    public function show()
    { 
        header('Content-Type: application/json');
        $id = $_POST['id'];
        if (isset($id)) {
            $success = $this->sizeModel->changeStatus($id, 1);
            echo json_encode(['status' => $success ? 'success' : 'failed']);
            exit();
        }
        echo json_encode("Show failed");
        exit();
    }
}