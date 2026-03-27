<?php
class Nhap_hang extends Controller
{
    private $phieuNhapModel;

    public function __construct()
    {
        $this->phieuNhapModel = $this->model("PhieuNhapModel");
    }

    public function default($id = null)
    {
        if ($id !== null) {
            return $this->edit($id);
        }

        $this->renderView("main_layout", [
            "page" => "nhap_hang",
            "title" => "Quản lý nhập hàng",
            "Plugin" => ["datatables" => 1, "sweetalert2" => 1, "flatpickr" => 1],
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
        // Xử lý POST JSON (tạo phiếu mới từ AJAX)
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            header('Content-Type: application/json');

            $data     = json_decode(file_get_contents('php://input'), true);
            $mancc    = $data['mancc']     ?? null;
            $ngay     = $data['ngaynhap']  ?? null;
            $tt       = $data['trangthai'] ?? 0;
            $products = $data['products']  ?? [];

            if (!$ngay || empty($products)) {
                echo json_encode(['success' => false, 'message' => 'Dữ liệu không hợp lệ']);
                exit;
            }

            // Lấy maadmin từ session
            $maadmin = $_SESSION['maadmin'] ?? 1;

            $result = $this->phieuNhapModel->create($ngay, $tt, $products, $maadmin, $mancc);
            echo json_encode(['success' => $result]);
            exit;
        }

        // GET — render form tạo phiếu
        $nccModel  = $this->model("NhaCungCapModel");
        $suppliers = $nccModel->getAll();
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
            "suppliers" => $suppliers,
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

    public function edit($id = null)
    {
        if (!$id) {
            header('Location: /nhap_hang');
            exit;
        }

        $phieu = $this->phieuNhapModel->getById($id);

        if (!$phieu) {
            header('Location: /nhap_hang');
            exit;
        }

        // Chặn sửa nếu phiếu đã hoàn tất
        if ((int)$phieu['trangthai'] === 1) {
            header('Location: /nhap_hang');
            exit;
        }

        $chiTiet      = $this->phieuNhapModel->getChiTiet($id);
        $sanPhamModel = $this->model("SanPhamModel");
        $products     = $sanPhamModel->getAllWithStock();
        $nccModel     = $this->model("NhaCungCapModel");
        $suppliers    = $nccModel->getAll();

        $this->renderView("main_layout", [
            "page"     => "nhap_hang_add",
            "title"    => "Sửa phiếu nhập PN" . str_pad($id, 3, '0', STR_PAD_LEFT),
            "Plugin"   => ["flatpickr" => 1, "sweetalert2" => 1],
            "products" => $products,
            "nextMaPN" => 'PN' . str_pad($id, 3, '0', STR_PAD_LEFT),
            "phieu"    => $phieu,
            "chiTiet"  => $chiTiet,
            "suppliers" => $suppliers,
            "isEdit"   => true,
            "Script"   => "nhap_hang_add",
        ]);
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            header('Content-Type: application/json');
            $data     = json_decode(file_get_contents('php://input'), true);
            $mapn     = $data['mapn']      ?? null;
            $mancc    = $data['mancc']     ?? null;
            $ngay     = $data['ngaynhap']  ?? null;
            $tt       = $data['trangthai'] ?? 0;
            $products = $data['products']  ?? [];

            if (!$mapn || empty($products)) {
                echo json_encode(['success' => false, 'message' => 'Dữ liệu không hợp lệ']);
                exit;
            }

            // Chặn sửa nếu phiếu đã hoàn tất
            $phieu = $this->phieuNhapModel->getById($mapn);
            if (!$phieu || (int)$phieu['trangthai'] === 1) {
                echo json_encode(['success' => false, 'message' => 'Phiếu đã hoàn tất, không thể chỉnh sửa']);
                exit;
            }

            $result = $this->phieuNhapModel->update($mapn, $ngay, $tt, $products, $mancc);
            echo json_encode(['success' => $result]);
            exit;
        }
    }

    public function getDetail()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            header('Content-Type: application/json');
            $id      = $_POST['id'] ?? null;
            $phieu   = $this->phieuNhapModel->getById($id);
            $chiTiet = $this->phieuNhapModel->getChiTiet($id);
            echo json_encode(['phieu' => $phieu, 'chiTiet' => $chiTiet]);
            exit;
        }
    }
}
