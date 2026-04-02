<?php
class Suppliers extends Controller
{
    
    private $supplierModel;
    public function __construct()
    {
        $this->supplierModel = $this->model("NhaCungCapModel");
    }

    public function default()
    {
        $this->renderView("main_layout", [
            "page" => "suppliers",
            "title" => "Quản lý nhà cung cấp",
            "Plugin"  => [
                "datatables" => 1,
                "sweetalert2" => 1,
                "notify" => 1,
                "jquery-validate" => 1,
            ],
            "Script" => "suppliers"
        ]);
    }

    //Fetching the data
    public function getData()
    { 
        //Gán kết quả vào Tab Response của HTTP Request
        echo json_encode($this->supplierModel->getAll());
        exit;
    }

    public function add() {
        $prefix = "Công Ty ";
        $ten    = $_POST['ten-nhacungcap'];
        $sdt    = $_POST['sdt-nhacungcap'];
        $diachi = $_POST['diachi-nhacungcap'];
        $newTen = $prefix . $ten;
        
        if (isset($ten) || isset($sdt) || isset($diachi)) {
            $success = $this->supplierModel->add($newTen, $sdt, $diachi);
            echo json_encode(['status' => $success ? 'success' : 'failed']);
            exit();
        }
        echo json_encode("Didnt run");
        exit();
    }

    public function update() {
        $prefix = "Công Ty ";
        $id = $_POST['mancc'];
        $ten    = $_POST['ten-nhacungcap'];
        $sdt    = $_POST['sdt-nhacungcap'];
        $diachi = $_POST['diachi-nhacungcap'];
        $newTen = $prefix . $ten;
        
        if (isset($ten) || isset($sdt) || isset($diachi)) {
            $success = $this->supplierModel->update($id, $newTen, $sdt, $diachi);
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
            if ($this->supplierModel->isInPN($id))
                $success = $this->supplierModel->changeStatus($id, 0);
            else 
                $success = $this->supplierModel->delete($id);
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
            $success = $this->supplierModel->changeStatus($id, 1);
            echo json_encode(['status' => $success ? 'success' : 'failed']);
            exit();
        }
        echo json_encode("Show failed");
        exit();
    }
}
