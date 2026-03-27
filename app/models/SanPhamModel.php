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

    function getNextId()
    { 
         $sql = "SELECT AUTO_INCREMENT as nextId
                FROM information_schema.tables
                WHERE table_schema = 'quanlybangiay'
                AND table_name = 'sanpham';";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addSanPham($data)
    { 
        $sql = "INSERT INTO sanpham (tensp, loai, gioitinh, gianhap, tyleloinhuan, hang, mau, motasp, soluongdaban, trangthai) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            $data['tensp'], $data['loai'], $data['gioitinh'], 
            0, 0, $data['hang'], 
            $data['mausac'], $data['motasp'], 0, $data['trangthai']]);
    }

    public function updateSanPham($data)
    { 
        $sql = "UPDATE sanpham SET tensp = :tensp, loai = :loai, gioitinh = :gioitinh, gianhap = :gianhap, tyleloinhuan = :tyleloinhuan, motasp = :motasp
                WHERE masp = :masp";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            ':masp' => $data['masp'],
            ':tensp' => $data['tensp'],
            ':loai' => $data['loai'],
            ':gioitinh' => $data['gioitinh'],
            ':gianhap' => $data['gianhap'],
            ':tyleloinhuan' => $data['tyleloinhuan'],
            ':motasp' => $data['motasp'],
        ]);
    }

    public function updateSizeAndStock($data, $oldId)
    {
        $this->conn->beginTransaction();
        $sql = "UPDATE sanphamsize SET soluong = :soluong, masize = :newId WHERE masp = :masp AND masize = :oldId";
        $stmt = $this->conn->prepare($sql);
        foreach ($data as $index => $value) {
            $stmt->execute([
                ":soluong"=> $value["soLuong"],
                ":masp"=> $value["masp"],
                ":newId"=> $value["masize"],
                ":oldId"=> $oldId[$index],
            ]);
        }
        return $this->conn->commit();
    }

    public function addNewSize($data, $oldId)
    {
        if ($oldId === null) $oldId = [];
        $toInsert = array_filter($data, function($item) use ($oldId) {
            return !in_array($item['masize'], $oldId);
        });
        $this->conn->beginTransaction();
        $sql = "INSERT INTO sanphamsize (masp, masize, soluong) VALUES (:masp, :masize, :soluong)";
        $stmt = $this->conn->prepare($sql);
        foreach ($toInsert as $value) {
            $stmt->execute([
                ":soluong"=> $value["soLuong"],
                ":masp"=> $value["masp"],
                ":masize"=> $value["masize"],
            ]);
        }
        return $this->conn->commit();
    }

    public function deleteSizeAndStock($data)
    {
        $this->conn->beginTransaction();
        foreach ($data as $value) {
            $sql = "DELETE FROM sanphamsize WHERE masp = :masp AND masize = :masize";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ":masp"=> $value["masp"],
                ":masize"=> $value["masize"],
            ]);
        }
        return $this->conn->commit();
    }

    public function getAllForAdmin()
    {
        $sql = "SELECT
                    s.masp,
                    s.tensp,
                    l.tenloai,
                    s.gioitinh,
                    s.gianhap,
                    s.tyleloinhuan,
                    h.tenhang,
                    m.tenmau,
                    s.trangthai,
                    GROUP_CONCAT(size.tensize SEPARATOR ', ') AS size
                FROM
                    sanpham s
                INNER JOIN loai l ON
                    s.loai = l.maloai
                INNER JOIN hang h ON
                    s.hang = h.mahang
                INNER JOIN mau m ON
                    s.mau = m.mamau
                LEFT JOIN sanphamsize ss ON
                	s.masp = ss.masp
                LEFT JOIN size ON
                	size.masize = ss.masize
                GROUP BY s.masp";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getSingle($id)
    {
        $sql = "SELECT
                    s.masp,
                    s.tensp,
                    l.tenloai,
                    s.gioitinh,
                    h.tenhang,
                    m.tenmau,
                    s.trangthai,
                    s.motasp
                FROM
                    sanpham s
                INNER JOIN loai l ON
                    s.loai = l.maloai
                INNER JOIN hang h ON
                    s.hang = h.mahang
                INNER JOIN mau m ON
                    s.mau = m.mamau
                WHERE s.masp = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function isInPhieuNhap($id)
    { 
        $sql = "SELECT masp FROM ctphieunhap WHERE masp = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->rowCount() > 0;
    }
    
    public function changeStatus($id)
    { 
        $sql = "UPDATE sanpham SET trangthai = 0 WHERE masp = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$id]);
    }

    public function deleteById($id)
    {
        $sql = "DELETE FROM sanpham WHERE masp = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        return true;
    }

    public function getSpById($masp)
    {
        $sql = "SELECT * FROM sanpham WHERE masp = ? AND trangthai = 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$masp]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateLoiNhuan($productId, $newValue){
        $sql = "UPDATE sanpham SET tyleloinhuan = ? WHERE masp = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$newValue, $productId]);
    }
    
    public function getAllStock()
    { 
        $sql = "SELECT 
                    s.masp, 
                    s.tensp, 
                    COALESCE(SUM(ss.soluong), 0) AS tong_soluong
                FROM sanpham AS s
                LEFT JOIN sanphamsize AS ss ON s.masp = ss.masp
                GROUP BY s.masp, s.tensp;";
        $stmt = $this->conn->prepare($sql); 
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getStockById($id)
    { 
        $sql = "SELECT 
                    ss.masize,
                    tensize,
                    soluong
                FROM sanphamsize as ss
                LEFT JOIN size as s ON ss.masize = s.masize
                WHERE masp = ?";
        $stmt = $this->conn->prepare($sql); 
        $stmt->execute([$id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getBestSellingProductByMaHang($maHang)
    {

        if ($maHang != false) {
            $sql = "SELECT * FROM sanpham WHERE trangthai = 1 AND hang = ? ORDER BY soluongdaban DESC LIMIT 8";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$maHang['mahang']]);
        } else {

            $sql = "SELECT * FROM sanpham WHERE trangthai = 1 ORDER BY soluongdaban DESC LIMIT 8";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
        }

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getBestSellingProduct()
    {
        $sql = "SELECT * FROM sanpham WHERE trangthai = 1 ORDER BY soluongdaban DESC LIMIT 12";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
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

        // tìm theo tên hoặc mô tả
        if (!empty($filters['q'])) {
            $where[] = "(tensp LIKE ? OR motasp LIKE ?)";
            $params[] = '%' . $filters['q'] . '%';
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
    public function getStock($masp, $masize)
    {
        $sql = "SELECT soluong FROM sanphamsize WHERE masp = ? AND masize = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$masp, $masize]);

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row['soluong'] ?? 0;
    }

    public function getSoluongdaban($masp)
    {
        $sql = "SELECT soluongdaban FROM sanpham WHERE masp = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$masp]);
        return $stmt->fetchColumn();
    }
    public function getStockAll($masp)
    {
        $sql = "SELECT SUM(soluong) as tong_kho FROM sanphamsize WHERE masp = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$masp]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['tong_kho'] ?? 0;
    }

    public function getAllWithStock()
    {
        $sql = "SELECT s.masp, s.tensp, s.gianhap, s.tyleloinhuan,
                       COALESCE(SUM(ss.soluong), 0) as tong_kho
                FROM sanpham s
                LEFT JOIN sanphamsize ss ON s.masp = ss.masp
                WHERE s.trangthai = 1
                GROUP BY s.masp
                ORDER BY s.tensp ASC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
