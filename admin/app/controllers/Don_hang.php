<?php
class Don_hang extends Controller
{
    private $donhangModel;

    public function __construct()
    {
        $this->donhangModel = $this->model("DonHangModel");
    }

    public function default()
    {
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
}
