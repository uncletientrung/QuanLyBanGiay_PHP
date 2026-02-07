<?php
require_once "../QuanLyBanGiay_PHP/app/models/SanPhamModel.php";
require_once "../QuanLyBanGiay_PHP/app/models/HangModel.php";

class SanPhamController
{
    private $model;
    private $hangModel;

    public function __construct($db)
    {
        $this->model = new SanPhamModel($db);
        $this->hangModel = new HangModel($db);
    }

    /**
     * Phương thức chính để lấy sản phẩm (hỗ trợ cả không lọc và có lọc)
     * @param array $filters Mảng filters từ $_GET (đã xử lý sẵn)
     * @param int $page Trang hiện tại (1-based)
     * @param int $limit Số sản phẩm/trang
     * @return array Danh sách sản phẩm
     */
    public function getProducts(array $filters = [], int $page = 1, int $limit = 9): array
    {
        $offset = ($page - 1) * $limit;

        // Nếu không có filter nào thì dùng getByPage 
        if (empty($filters) || $this->isEmptyFilters($filters)) {
            return $this->model->getByPage($limit, $offset);
        }

        // Có filter → dùng getFiltered
        return $this->model->getFiltered($filters, $limit, $offset);
    }

  //  Đếm tổng sản phẩm theo filter (hoặc tổng tất cả nếu không filter)
    public function countProducts(array $filters = []): int
    {
        if (empty($filters) || $this->isEmptyFilters($filters)) {
            return $this->model->countAll();
        }

        return $this->model->countFiltered($filters);
    }

    // kiểm tra mảng filter có rỗng k
    public function isEmptyFilters(array $filters): bool
    {
        return empty($filters['q'])
            && empty($filters['hang'])
            && empty($filters['loai'])
            && empty($filters['gioitinh'])
            && empty($filters['mau'])
            && empty($filters['price_range'])
            && $filters['sort'] === 'default';
    }


    
    public function getAll()
    {
        return $this->model->getAll();
    }
    public function getBestSellingByName($tenHang){
        if($tenHang == "all") $maHang = false;
        else{
            $maHang = $this->hangModel->getIdByName($tenHang);
            // echo "<script>console.log(" . json_encode($maHang) . ");</script>";
        } 
        return $this->model->getBestSellingProductByMaHang($maHang);
    }

    public function countAll()
    {
        return $this->model->countAll();
    }

    public function getByPage($limit, $offset)
    {
        return $this->model->getByPage($limit, $offset);
    }

    public function getFiltered($filters, $limit, $offset)
    {
        return $this->model->getFiltered($filters, $limit, $offset);
    }

    public function countFiltered($filters)
    {
        return $this->model->countFiltered($filters);
    }
}