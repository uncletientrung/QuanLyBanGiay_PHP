<?php
class User extends Controller
{
    private $khachHangModel;

    public function __construct()
    {
        $this->khachHangModel = $this->model("KhachHangModel");
    }

    public function default()
    {
        $this->renderView("main_layout", [
            "page" => "user",
            "title" => "Quản lý người dùng",
            "Plugin"  => [
                "sweetalert2" => 1,
                "notify" => 1,
                "datatables" => 1
            ],
            "Script"  => "user"
        ]);
    }

    public function getData()
    {
        echo json_encode($this->khachHangModel->getAll());
        exit;
    }

    public function getDetail()
    {
        $id = $_POST['id'];
        echo json_encode($this->khachHangModel->getById($id));
        exit;
    }

    public function add()
    {
        $data = [
            'hoten'     => $_POST['hoten'],
            'sdt'       => $_POST['sdt'],
            'diachi'    => $_POST['diachi'],
            'gioitinh'  => $_POST['gioitinh'],
            'trangthai' => $_POST['trangthai'],
            'email'     => $_POST['email'],
            'matkhau'   => $_POST['matkhau']
        ];
        $result = $this->khachHangModel->add($data);
        echo json_encode(['success' => $result]);
        exit;
    }

    public function update()
    {
        $id = $_POST['id'];
        $data = [
            'hoten'     => $_POST['hoten'],
            'sdt'       => $_POST['sdt'],
            'diachi'    => $_POST['diachi'],
            'gioitinh'  => $_POST['gioitinh'],
            'trangthai' => $_POST['trangthai'],
            'email'     => $_POST['email'],
            'matkhau'   => $_POST['matkhau']
        ];
        $result = $this->khachHangModel->update($id, $data);
        echo json_encode(['success' => $result]);
        exit;
    }

    public function delete()
    {
        $id = $_POST['id'];
        $result = $this->khachHangModel->delete($id);
        echo json_encode(['success' => $result]);
        exit;
    }
}
