<?php
class Brands extends Controller
{
    private $brandsModel;

    public function __construct()
    {
        $this->brandsModel = $this->model("HangModel");
    }

    public function default()
    {
        $this->renderView("main_layout", [
            "page" => "brands",
            "title" => "Quản lý thương hiệu",
            "Plugin"  => [
                "datatables" => 1,
            ],
            "Script" => "brands"
        ]);
    }

    //Fetching the data
    public function getData()
    { 
        //Gán kết quả vào Tab Response của HTTP Request
        echo json_encode($this->brandsModel->getAll());
        exit;
    }

    public function add()
    { 
        header('Content-Type: application/json');
        $tenhang = $_POST['tenhang'];
        if (isset($tenhang)) {
            $success = $this->brandsModel->add($tenhang);
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
            $success = $this->brandsModel->delete($id);
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
        $tenhang = $_POST['tenhang'];
        if (isset($id) && isset($tenhang)) {
            $success = $this->brandsModel->update($id, $tenhang);
            echo json_encode(['status' => $success ? 'success' : 'failed']);
            exit();
        }
        echo json_encode("Didnt run");
        exit();
    }
}
