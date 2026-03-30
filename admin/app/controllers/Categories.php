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
                "sweetalert2" => 1,
                "notify" => 1,
            ],
            "Script" => "categories"
        ]);
    }

    public function getData()
    {
        echo json_encode($this->categoriesModel->getAllForAdmin());
        exit;
    }

    public function add()
    { 
        header('Content-Type: application/json');
        $tenloai = $_POST['tenloai'];
        if (isset($tenloai)) {
            $success = $this->categoriesModel->add($tenloai);
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
            if ($this->categoriesModel->isInProds($id))
                $success = $this->categoriesModel->changeStatus($id, 0);
            else 
                $success = $this->categoriesModel->delete($id);
            echo json_encode(['status' => $success ? 'success' : 'failed']);
            exit();
        }
        echo json_encode("Didnt run");
        exit();
    }

    public function update()
    { 
        header('Content-Type: application/json');
        $id = $_POST['id'];
        $tenloai = $_POST['tenloai'];
        if (isset($id) && isset($tenloai)) {
            $success = $this->categoriesModel->update($id, $tenloai);
            echo json_encode(['status' => $success ? 'success' : 'failed']);
            exit();
        }
        echo json_encode("Didnt run");
        exit();
    }
}
