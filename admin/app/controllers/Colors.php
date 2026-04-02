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
                "sweetalert2" => 1,
                "notify" => 1,
            ],
            "Script" => "colors"
        ]);
    }

    public function getData()
    { 
        echo json_encode($this->colorModel->getAllForAdmin());
        exit;   
    }

    
    public function add()
    { 
        header('Content-Type: application/json');
        $tenmau = $_POST['tenmau'];
        if (isset($tenmau)) {
            $success = $this->colorModel->add($tenmau);
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
            if ($this->colorModel->isInProds($id))
                $success = $this->colorModel->changeStatus($id, 0);
            else 
                $success = $this->colorModel->delete($id);
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
            $success = $this->colorModel->changeStatus($id, 1);
            echo json_encode(['status' => $success ? 'success' : 'failed']);
            exit();
        }
        echo json_encode("Show failed");
        exit();
    }

    public function update()
    { 
        header('Content-Type: application/json');
        $id = $_POST['id'];
        $tenmau = $_POST['tenmau'];
        if (isset($id) && isset($tenmau)) {
            $success = $this->colorModel->update($id, $tenmau);
            echo json_encode(['status' => $success ? 'success' : 'failed']);
            exit();
        }
        echo json_encode("Didnt run");
        exit();
    }
}
