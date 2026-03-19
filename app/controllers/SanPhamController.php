<?php
require_once APP_PATH_DIR . 'models/SanPhamModel.php';
require_once APP_PATH_DIR . 'models/HangModel.php';
require_once APP_PATH_DIR . 'models/MauSacModel.php';
require_once APP_PATH_DIR . 'models/LoaiModel.php';
require_once APP_PATH_DIR . 'models/HinhAnhModel.php';
require_once APP_PATH_DIR . 'models/SizeModel.php';

class SanPhamController
{
    private $model;
    private $hangModel;
    private $mauModel;
    private $loaiModel;
    private $hinhAnhModel;
    private $sizeModel;


    public function __construct($db)
    {
        $this->model = new SanPhamModel($db);
        $this->hangModel = new HangModel($db);
        $this->loaiModel = new LoaiModel($db);
        $this->mauModel = new MauSacModel($db);
        $this->hinhAnhModel= new HinhAnhModel($db);
        $this->sizeModel= new SizeModel($db);
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
            && ($filters['sort'] ?? 'default') === 'default';
    }



    public function getAll()
    {
        return $this->model->getAll();
    }
    public function getBestSellingByName($tenHang)
    {
        if ($tenHang == "all") $maHang = false;
        else {
            $maHang = $this->hangModel->getIdByName($tenHang);
            // echo "<script>console.log(" . json_encode($maHang) . ");</script>";
        }
        return $this->model->getBestSellingProductByMaHang($maHang);
    }
    public function getSpById($masp)
    {
        return $this->model->getSpById($masp);
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

    public function showProducts()
    {

        $listHang = $this->hangModel->getAll();
        $listMauSac = $this->mauModel->getAll();
        $listLoai = $this->loaiModel->getLoaivaSoluongTuongUng();

        $filters = [
            'q' => isset($_GET['q']) && trim($_GET['q']) !== '' ? trim($_GET['q']) : null,
            'hang' => !empty($_GET['hang']) ? array_map('intval', (array)$_GET['hang']) : [],
            'loai' => !empty($_GET['loai']) ? array_map('intval', (array)$_GET['loai']) : [],
            'gioitinh' => !empty($_GET['gioitinh']) ? array_map('trim', (array)$_GET['gioitinh']) : [],
            'mau' => !empty($_GET['mau']) ? array_map('intval', (array)$_GET['mau']) : [],
            'price_range' => $_GET['price_range'] ?? null,
            'sort' => $_GET['sort'] ?? 'default',
        ];

        $page = max(1, (int)($_GET['page'] ?? 1));
        $limit = 9;

        $listSP = $this->getProducts($filters, $page, $limit);
        $totalProducts = $this->countProducts($filters);
        $totalPages = ceil($totalProducts / $limit);

        foreach ($listSP as &$sp) {
            $sp['image'] = $this->hinhAnhModel->getImageMainById($sp['masp']);
            $sp['tenhang'] = $this->hangModel->getNameById($sp['hang']);
        }
        unset($sp);

        require VIEW_PATH_DIR . 'products.php';
    }

    public function showDetail(){
        $masp = isset($_GET['masp']) ? $_GET['masp'] : null;
        if(!$masp){
            echo "Không tìm thấy sản phẩm";
            return;
        }

        $listHang = $this->hangModel->getAll();
        $listMau = $this->mauModel->getAll();
        $listLoai = $this->loaiModel->getAll();
        $listSP = $this->model->getAll();
        $listSize = $this->sizeModel->getSizeBySanPham($masp);
        $listHinh = $this->hinhAnhModel->getImageById($masp);
        $currentSP= $this->model->getSpById($masp);
        $hang=$this->hangModel->getNameById($currentSP['hang']);
        $loai=$this->loaiModel->getNameById($currentSP['loai']);
        $mau= $this->mauModel->getNameById($currentSP['mau']);
        $gioitinh = ($currentSP['gioitinh']==1) ? 'Nam' : 'Nữ';
        $giaBan = $currentSP['gianhap'] + $currentSP['gianhap'] * $currentSP['tyleloinhuan'] / 100;
        $currentSP['image']  = $this->hinhAnhModel->getImageMainById($masp);

        foreach ($listSP as &$sp) {
            $sp['image'] = $this->hinhAnhModel->getImageMainById($sp['masp']);
            $sp['tenhang'] = $this->hangModel->getNameById($sp['hang']);//ham nay dung cho related product
        }
        unset($sp);
        require VIEW_PATH_DIR . 'product-detail.php';


    }

    public function showHome(){
        $listSP = $this->model->getAll();
        $listBestSellingALL = $this->model->getBestSellingProduct();
        foreach ($listBestSellingALL as &$sp) {
            $sp['image'] = $this->hinhAnhModel->getImageMainById($sp['masp']);
            $sp['tenhang'] = $this->hangModel->getNameById($sp['hang']);
        }
        unset($spp);
        foreach ($listSP as &$sp) {
            $sp['image'] = $this->hinhAnhModel->getImageMainById($sp['masp']);
            $sp['tenhang'] = $this->hangModel->getNameById($sp['hang']);
        }
        unset($sp);
        require VIEW_PATH_DIR . 'home.php';
    }

    public function ajaxProducts()
    {
        $filters = [
            'q'           => isset($_GET['q']) && trim($_GET['q']) !== '' ? trim($_GET['q']) : null,
            'hang'        => !empty($_GET['hang'])     ? array_map('intval', (array)$_GET['hang'])   : [],
            'loai'        => !empty($_GET['loai'])     ? array_map('intval', (array)$_GET['loai'])   : [],
            'gioitinh'    => !empty($_GET['gioitinh']) ? array_map('trim',   (array)$_GET['gioitinh']): [],
            'mau'         => !empty($_GET['mau'])      ? array_map('intval', (array)$_GET['mau'])    : [],
            'price_range' => $_GET['price_range'] ?? null,
            'sort'        => $_GET['sort'] ?? 'default',
        ];

        $page  = max(1, (int)($_GET['page'] ?? 1));
        $limit = 9;

        $listSP       = $this->getProducts($filters, $page, $limit);
        $totalProducts = $this->countProducts($filters);
        $totalPages   = ceil($totalProducts / $limit);

        foreach ($listSP as &$sp) {
            $sp['image']   = $this->hinhAnhModel->getImageMainById($sp['masp']);
            $sp['tenhang'] = $this->hangModel->getNameById($sp['hang']);
            $sp['giaban']  = $sp['gianhap'] + $sp['gianhap'] * $sp['tyleloinhuan'] / 100;
        }
        unset($sp);

        echo json_encode([
            'products'   => $listSP,
            'page'       => $page,
            'totalPages' => $totalPages,
            'total'      => $totalProducts,
        ]);
    }
}
