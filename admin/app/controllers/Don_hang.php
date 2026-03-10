<?php
class Don_hang extends Controller
{
    private $donhangModel;

    public function __construct()
    {
        $this->donhangModel = $this->model("DonHangModel");
    }

    public function default($id = null)
    {
        if ($id !== null) {
            return $this->detail($id);
        }

        $this->renderView("main_layout", [
            "page" => "don_hang",
            "title" => "Quản lý đơn hàng",
            "Plugin"  => [
                "flatpickr" => 1,
                "sweetalert2" => 1,
                "notify" => 1,
                "datatables" => 1,
                "jquery-validate" => 1
            ],
            "Script"  => "don_hang"
        ]);
    }

    public function getData()
    {
        echo json_encode($this->donhangModel->getAll());
        exit;
    }

    public function updateStatus()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id     = $_POST['id']     ?? null;
            $status = $_POST['status'] ?? null;

            if ($id && $status !== null) {
                $result = $this->donhangModel->updateStatus($id, $status);
                echo json_encode(['success' => $result]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Dữ liệu không hợp lệ']);
            }
        }
        exit;
    }

    public function updateBulkStatus()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ids = $_POST['ids'] ?? []; // Mảng danh sách mã đơn hàng
            $status = $_POST['status'] ?? ''; // Trạng thái mới

            if (!empty($ids) && $status !== '') {
                $result = $this->donhangModel->updateStatusMulti($ids, $status);

                if ($result) {
                    echo json_encode(['status' => 'success', 'message' => 'Cập nhật thành công']);
                } else {
                    echo json_encode(['status' => 'error', 'message' => 'Cập nhật thất bại']);
                }
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Dữ liệu không hợp lệ']);
            }
        }
        exit;
    }

    public function detail($id = null)
    {
        $order = $this->donhangModel->getDetail($id);
        $items = $this->donhangModel->getItems($id);

        if (!$order) {
            header('Location: /don_hang');
            exit;
        }

        $this->renderView("main_layout", [
            "page" => "don_hang_detail",
            "title" => "Chi tiết đơn hàng" . $id,
            "id" => $id,
            "order" => $order,
            "items" => $items,
            "Plugin"  => ["sweetalert2" => 1],
            "Script"  => "ct_don_hang"
        ]);
    }

    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'] ?? null;
            if ($id) {
                $result = $this->donhangModel->deleteFullOrder($id);
                echo json_encode(['success' => $result]);
            } else {
                echo json_encode(['success' => false, 'message' => 'ID không hợp lệ']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Method not allowed']);
        }
        exit;
    }
}
