<?php
class Ton_kho extends Controller
{
    private $productModel;
    public function __construct()
    {
        $this->productModel = $this->model("SanPhamModel");
    }

    public function default()
    {
        $this->renderView("main_layout", [
            "page" => "ton_kho",
            "title" => "Quản lý tồn kho",
            "Plugin" => [
                "datatables" => 1,
                "flatpickr" => 1,
                "notify" => 1,
                "select2" => 1,
                "sweetalert2" => 1,                
            ],
            "Script" => ["ton_kho", "report_nhapxuat"],
        ]);
    }

    public function getAllStock()
    {
        echo json_encode($this->productModel->getAllStock());
        exit();
    }

    public function getStockById()
    {
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
            header('Content-Type: application/json');
            echo json_encode($this->productModel->getStockByID($id));
            exit();
        }
        echo json_encode("This one didnt run");
        exit();
    }

    // THỐNG KÊ NHẬP - XUẤT
    public function getThongKeNhapXuat()
    {
        $fromDate = $_GET['from'] ?? null;
        $toDate = $_GET['to'] ?? null;

        $fromDateRaw = $fromDate;
        $toDateRaw   = $toDate;

        if (!empty($fromDate)) {
            $dateObj  = DateTime::createFromFormat('d-m-Y H:i', $fromDate);
            $fromDate = $dateObj ? $dateObj->format('Y-m-d H:i:s') : null;
        } else {
            $fromDate = null;
        }

        if (!empty($toDate)) {
            $dateObj = DateTime::createFromFormat('d-m-Y H:i', $toDate);
            $toDate  = $dateObj ? $dateObj->format('Y-m-d H:i:s') : null;
        } else {
            $toDate = null;
        }

        $data = $this->productModel->getThongKeNhapXuat($fromDate, $toDate);

        header('Content-Type: application/json');
        echo json_encode([
            'data' => $data,
            '_debug' => [
                'input_from'    => $fromDateRaw,
                'input_to'      => $toDateRaw,
                'parsed_from'   => $fromDate,
                'parsed_to'     => $toDate,
                'total_products' => count($data),
            ]
        ]);
        exit();
    }

    public function getChiTietThongKe()
    {
        $masp     = $_GET['masp']  ?? null;
        $fromDate = $_GET['from']  ?? null;
        $toDate   = $_GET['to']    ?? null;

        if (!$masp) {
            echo json_encode(['success' => false, 'message' => 'Thiếu mã sản phẩm']);
            exit();
        }

        if (!empty($fromDate)) {
            $d = DateTime::createFromFormat('d-m-Y H:i', $fromDate);
            $fromDate = $d ? $d->format('Y-m-d H:i:s') : null;
        } else {
            $fromDate = null;
        }

        if (!empty($toDate)) {
            $d = DateTime::createFromFormat('d-m-Y H:i', $toDate);
            $toDate = $d ? $d->format('Y-m-d H:i:s') : null;
        } else {
            $toDate = null;
        }

        $data = $this->productModel->getChiTietNhapXuat($masp, $fromDate, $toDate);

        header('Content-Type: application/json');
        echo json_encode(['success' => true, 'data' => $data]);
        exit();
    }

    public function getTotalStockByDateAndId()
    { 
        $id = $_GET['id'];
        $date = $_GET['date'];
        header('Content-Type: application/json');
        if ($id && $date) {
            echo json_encode($this->productModel->getTotalStockByDateAndId($id, $date));
            exit();
        }
        echo json_encode("Không thể kết nối");
        exit();
    }
}
