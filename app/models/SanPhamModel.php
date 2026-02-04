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

        // tim theo tên
        if (!empty($filters['q'])) {
            $where[] = "tensp LIKE ?";
            $params[] = '%' . $filters['q'] . '%';
        }

        // lọc hãng
        if ($filters['hang'] !== null) {
            $where[] = "hang = ?";
            $params[] = $filters['hang'];
        }

        // lọc loại
        if ($filters['loai'] !== null) {
            $where[] = "loai = ?";
            $params[] = $filters['loai'];
        }

        // lọc giới tính
        if (!empty($filters['gioitinh']) && is_array($filters['gioitinh'])) {
            $gioitinhValues = [];
            foreach ($filters['gioitinh'] as $gt) {
                $gioitinhValues[] = ($gt === 'nam') ? 1 : 0;
            }
            
            if (!empty($gioitinhValues)) {
                $placeholders = implode(',', array_fill(0, count($gioitinhValues), '?'));
                $where[] = "gioitinh IN ($placeholders)";
                $params = array_merge($params, $gioitinhValues);
            }
        }

        // lọc giá max
        if ($filters['max_price'] !== null && $filters['max_price'] < 10000000) {
            $where[] = "(gianhap + gianhap * tyleloinhuan / 100) <= ?";
            $params[] = $filters['max_price'];
        }

        // lọc màu
        if (!empty($filters['mau']) && is_array($filters['mau'])) {
            
            $validMau = array_filter($filters['mau'], function($m) {
                return is_numeric($m) && $m > 0;
            });
            
            if (!empty($validMau)) {
                $placeholders = implode(',', array_fill(0, count($validMau), '?'));
                $where[] = "mau IN ($placeholders)";
                $params = array_merge($params, array_values($validMau));
            }
        }

        // Ghép điều kiện WHERE
        if (!empty($where)) {
            $sql .= ' AND ' . implode(' AND ', $where);
        }

        $sql .= " ORDER BY masp DESC LIMIT ? OFFSET ?";
        $params[] = $limit;
        $params[] = $offset;

        $stmt = $this->conn->prepare($sql);

        //  Bind parameters
        foreach ($params as $index => $value) {
            $stmt->bindValue($index + 1, $value, is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR);
        }

        try {
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("getFiltered error: " . $e->getMessage() . " | SQL: " . $sql . " | Params: " . json_encode($params));
            return [];
        }
    }

    // đếm sản phẩm có filter
    public function countFiltered(array $filters): int
    {
        $sql = "SELECT COUNT(*) as total FROM sanpham WHERE trangthai = 1";
        $where = [];
        $params = [];

        // Tìm kiếm theo tên
        if (!empty($filters['q'])) {
            $where[] = "tensp LIKE ?";
            $params[] = '%' . $filters['q'] . '%';
        }

        // Lọc theo hãng
        if ($filters['hang'] !== null) {
            $where[] = "hang = ?";
            $params[] = $filters['hang'];
        }

        //  Lọc theo loại
        if ($filters['loai'] !== null) {
            $where[] = "loai = ?";
            $params[] = $filters['loai'];
        }

        // Lọc theo giới tính
        if (!empty($filters['gioitinh']) && is_array($filters['gioitinh'])) {
            $gioitinhValues = [];
            foreach ($filters['gioitinh'] as $gt) {
                $gioitinhValues[] = ($gt === 'nam') ? 1 : 0;
            }
            
            if (!empty($gioitinhValues)) {
                $placeholders = implode(',', array_fill(0, count($gioitinhValues), '?'));
                $where[] = "gioitinh IN ($placeholders)";
                $params = array_merge($params, $gioitinhValues);
            }
        }

        //  Lọc theo giá
        if ($filters['max_price'] !== null && $filters['max_price'] < 10000000) {
            $where[] = "(gianhap + gianhap * tyleloinhuan / 100) <= ?";
            $params[] = $filters['max_price'];
        }

        // Lọc theo màu
        if (!empty($filters['mau']) && is_array($filters['mau'])) {
            $validMau = array_filter($filters['mau'], function($m) {
                return is_numeric($m) && $m > 0;
            });
            
            if (!empty($validMau)) {
                $placeholders = implode(',', array_fill(0, count($validMau), '?'));
                $where[] = "mau IN ($placeholders)";
                $params = array_merge($params, array_values($validMau));
            }
        }

        //  Ghép điều kiện WHERE
        if (!empty($where)) {
            $sql .= ' AND ' . implode(' AND ', $where);
        }

        $stmt = $this->conn->prepare($sql);

        //  Bind parameters
        foreach ($params as $index => $value) {
            $stmt->bindValue($index + 1, $value, is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR);
        }

        try {
            $stmt->execute();
            return (int) $stmt->fetch(PDO::FETCH_ASSOC)['total'];
        } catch (PDOException $e) {
            error_log("countFiltered error: " . $e->getMessage() . " | SQL: " . $sql . " | Params: " . json_encode($params));
            return 0;
        }
    }
}
?>