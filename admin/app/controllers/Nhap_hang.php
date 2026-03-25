<?php
class Nhap_hang extends Controller
{
    private $phieuNhapModel;

    public function __construct()
    {
        $this->phieuNhapModel = $this->model("PhieuNhapModel");
    }

    public function default()
    {
        $this->renderView("main_layout", [
            "page" => "nhap_hang",
            "title" => "Quản lý nhập hàng",
            "Plugin" => ["datatables" => 1, "sweetalert2" => 1],
            "Script" => "nhap_hang"
        ]);
    }

    public function getData()
    {
        echo json_encode($this->phieuNhapModel->getAll());
        exit;
    }

    public function add()
    {
        $sanPhamModel = $this->model("SanPhamModel");
        $products  = $sanPhamModel->getAllWithStock();
        $nextMaPN  = $this->phieuNhapModel->getNextMaPN();

        $this->renderView("main_layout", [
            "page"      => "nhap_hang_add",
            "title"     => "Tạo phiếu nhập mới",
            "Plugin"    => [
                "flatpickr"   => 1,
                "sweetalert2" => 1,
                "select2"     => 1
            ],
            "products"  => $products,
            "nextMaPN"  => $nextMaPN,
            "Script"    => "nhap_hang_add",
        ]);
    }

    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            header('Content-Type: application/json');
            $id = $_POST['id'] ?? null;
            if ($id) {
                $result = $this->phieuNhapModel->deleteById($id);
                echo json_encode(['success' => $result]);
            } else {
                echo json_encode(['success' => false]);
            }
            exit;
        }
    }
}
