<?php
class SanPhamModel
{
    private $conn;
    private $HangModel;
    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getAll() 
    {
        $sql = "SELECT * FROM sanpham WHERE trangthai = 1 ORDER BY masp DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getBestSellingProductByMaHang($maHang){
        
        if($maHang != false){
            $sql = "SELECT * FROM sanpham WHERE trangthai = 1 AND hang = ? ORDER BY soluongdaban DESC LIMIT 8";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$maHang['mahang']]);
        }else{
            
            $sql = "SELECT * FROM sanpham WHERE trangthai = 1 ORDER BY soluongdaban DESC LIMIT 8";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
        }
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);   
    }

    public function countAll() 
    {
        $sql = "SELECT COUNT(*) as total FROM sanpham WHERE trangthai = 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return (int) $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    }

    // lấy sản phẩm theo trang (không filter)
    public function getByPage($limit, $offset) 
    {
        $sql = "SELECT * FROM sanpham WHERE trangthai = 1 ORDER BY masp DESC LIMIT :limit OFFSET :offset";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // lấy sản phẩm có filter
    public function getFiltered(array $filters, int $limit, int $offset): array
{
    $sql = "SELECT * FROM sanpham WHERE trangthai = 1";
    $where = [];
    $params = [];

    // tìm theo tên
    if (!empty($filters['q'])) {
        $where[] = "tensp LIKE ?";
        $params[] = '%' . $filters['q'] . '%';
    }

    // lọc hãng
    if (!empty($filters['hang'])) {
        $placeholders = implode(',', array_fill(0, count($filters['hang']), '?'));
        $where[] = "hang IN ($placeholders)";
        $params = array_merge($params, $filters['hang']);
    }

    // lọc loại
    if (!empty($filters['loai'])) {
        $placeholders = implode(',', array_fill(0, count($filters['loai']), '?'));
        $where[] = "loai IN ($placeholders)";
        $params = array_merge($params, $filters['loai']);
    }

    // lọc giới tính
    if (!empty($filters['gioitinh'])) {
        $map = ['nam' => 1, 'nu' => 0];
        $values = array_intersect_key($map, array_flip($filters['gioitinh']));
        if (!empty($values)) {
            $placeholders = implode(',', array_fill(0, count($values), '?'));
            $where[] = "gioitinh IN ($placeholders)";
            $params = array_merge($params, array_values($values));
        }
    }

    // lọc giá 
    if (!empty($filters['price_range']) && $filters['price_range'] !== 'all') {
        $ranges = [
            'under_500'  => [0, 499999],
            '500_1000'   => [500000, 999999],
            '1000_2000'  => [1000000, 1999999],
            '2000_3000'  => [2000000, 2999999],
            'over_3000'  => [3000000, 1000000000],
        ];

        if (isset($ranges[$filters['price_range']])) {
            $where[] = "(gianhap + gianhap * tyleloinhuan / 100) BETWEEN ? AND ?";
            $params = array_merge($params, $ranges[$filters['price_range']]);
        }
    }

    // lọc màu
    if (!empty($filters['mau'])) {
        $placeholders = implode(',', array_fill(0, count($filters['mau']), '?'));
        $where[] = "mau IN ($placeholders)";
        $params = array_merge($params, $filters['mau']);
    }

    // ghép WHERE
    if (!empty($where)) {
        $sql .= ' AND ' . implode(' AND ', $where);
    }

    // SORT
    switch ($filters['sort']) {
        case 'price_asc':
            $sql .= " ORDER BY (gianhap + gianhap * tyleloinhuan / 100) ASC";
            break;
        case 'price_desc':
            $sql .= " ORDER BY (gianhap + gianhap * tyleloinhuan / 100) DESC";
            break;
        case 'name_asc':
            $sql .= " ORDER BY tensp ASC";
            break;
        case 'name_desc':
            $sql .= " ORDER BY tensp DESC";
            break;
        case 'best_seller':
            $sql .= " ORDER BY soluongdaban DESC";
            break;
        default:
            $sql .= " ORDER BY masp DESC";
    }

    // LIMIT
    $sql .= " LIMIT ? OFFSET ?";
    $params[] = $limit;
    $params[] = $offset;

    $stmt = $this->conn->prepare($sql);

    foreach ($params as $i => $v) {
        $stmt->bindValue($i + 1, $v, is_int($v) ? PDO::PARAM_INT : PDO::PARAM_STR);
    }

    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


   public function countFiltered(array $filters): int
{
    $sql = "SELECT COUNT(*) as total FROM sanpham WHERE trangthai = 1";
    $where = [];
    $params = [];

    // tìm theo tên
    if (!empty($filters['q'])) {
        $where[] = "tensp LIKE ?";
        $params[] = '%' . $filters['q'] . '%';
    }

    // lọc hãng
    if (!empty($filters['hang'])) {
        $placeholders = implode(',', array_fill(0, count($filters['hang']), '?'));
        $where[] = "hang IN ($placeholders)";
        $params = array_merge($params, $filters['hang']);
    }

    // lọc loại
    if (!empty($filters['loai'])) {
        $placeholders = implode(',', array_fill(0, count($filters['loai']), '?'));
        $where[] = "loai IN ($placeholders)";
        $params = array_merge($params, $filters['loai']);
    }

    // lọc giới tính
    if (!empty($filters['gioitinh'])) {
        $map = ['nam' => 1, 'nu' => 0];
        $values = array_intersect_key($map, array_flip($filters['gioitinh']));

        if (!empty($values)) {
            $placeholders = implode(',', array_fill(0, count($values), '?'));
            $where[] = "gioitinh IN ($placeholders)";
            $params = array_merge($params, array_values($values));
        }
    }

    // lọc giá
    if (!empty($filters['price_range']) && $filters['price_range'] !== 'all') {
        $ranges = [
            'under_500'  => [0, 499999],
            '500_1000'   => [500000, 999999],
            '1000_2000'  => [1000000, 1999999],
            '2000_3000'  => [2000000, 2999999],
            'over_3000'  => [3000000, 1000000000],
        ];

        if (isset($ranges[$filters['price_range']])) {
            $where[] = "(gianhap + gianhap * tyleloinhuan / 100) BETWEEN ? AND ?";
            $params = array_merge($params, $ranges[$filters['price_range']]);
        }
    }

    // lọc màu
    if (!empty($filters['mau'])) {
        $placeholders = implode(',', array_fill(0, count($filters['mau']), '?'));
        $where[] = "mau IN ($placeholders)";
        $params = array_merge($params, $filters['mau']);
    }

    // ghép WHERE
    if (!empty($where)) {
        $sql .= ' AND ' . implode(' AND ', $where);
    }

    $stmt = $this->conn->prepare($sql);

    foreach ($params as $i => $v) {
        $stmt->bindValue($i + 1, $v, is_int($v) ? PDO::PARAM_INT : PDO::PARAM_STR);
    }

    $stmt->execute();
    return (int)$stmt->fetchColumn();
}

}
?>