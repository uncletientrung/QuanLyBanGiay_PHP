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

    public function getIdAndName()
    { 
        $sql = "SELECT masp as id, tensp as text FROM sanpham";
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
            $data['tensp'],
            $data['loai'],
            $data['gioitinh'],
            0,
            0,
            $data['hang'],
            $data['mausac'],
            $data['motasp'],
            0,
            $data['trangthai']
        ]);
    }

    public function updateSanPham($data)
    {
        $sql = "UPDATE sanpham SET tensp = :tensp, loai = :loai, gioitinh = :gioitinh, motasp = :motasp, trangthai = :trangthai
                WHERE masp = :masp";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            ':masp' => $data['masp'],
            ':tensp' => $data['tensp'],
            ':loai' => $data['loai'],
            ':gioitinh' => $data['gioitinh'],
            ':motasp' => $data['motasp'],
            ':trangthai' => $data['trangthai'],
        ]);
    }

    public function updateSizeAndStock($data, $oldId)
    {
        $this->conn->beginTransaction();
        $sql = "UPDATE sanphamsize SET soluong = :soluong, masize = :newId WHERE masp = :masp AND masize = :oldId";
        $stmt = $this->conn->prepare($sql);
        foreach ($data as $index => $value) {
            $stmt->execute([
                ":soluong" => $value["soLuong"],
                ":masp" => $value["masp"],
                ":newId" => $value["masize"],
                ":oldId" => $oldId[$index],
            ]);
        }
        return $this->conn->commit();
    }

    public function addNewSize($data, $oldId)
    {
        if ($oldId === null) $oldId = [];
        $toInsert = array_filter($data, function ($item) use ($oldId) {
            return !in_array($item['masize'], $oldId);
        });
        $this->conn->beginTransaction();
        $sql = "INSERT INTO sanphamsize (masp, masize, soluong) VALUES (:masp, :masize, :soluong)";
        $stmt = $this->conn->prepare($sql);
        foreach ($toInsert as $value) {
            $stmt->execute([
                ":soluong" => $value["soLuong"],
                ":masp" => $value["masp"],
                ":masize" => $value["masize"],
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
                ":masp" => $value["masp"],
                ":masize" => $value["masize"],
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

    public function hasDependencies($id)
    {
        $sql = "SELECT 
            (SELECT COUNT(*) FROM ctdonhang WHERE masp = ?) + 
            (SELECT COUNT(*) FROM ctphieunhap WHERE masp = ?) as total";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id, $id]);
        $result = $stmt->fetch();

        return $result['total'] > 0;
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

    public function updateLoiNhuan($productId, $newValue)
    {
        $sql = "UPDATE sanpham SET tyleloinhuan = ? WHERE masp = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$newValue, $productId]);
    }

    public function getAllStock()
    {
        $sql = "SELECT 
                    s.masp, 
                    s.tensp, 
                    l.tenloai,
                    COALESCE(SUM(ss.soluong), 0) AS tong_soluong
                FROM sanpham AS s
                LEFT JOIN sanphamsize AS ss ON s.masp = ss.masp
                INNER JOIN loai as l ON l.maloai = s.loai
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
    public function getNewestProducts()
    {
        $sql = "SELECT * FROM sanpham 
                WHERE trangthai = 1 
                ORDER BY masp DESC 
                LIMIT 12";
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
                ORDER BY s.masp DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // THỐNG KÊ PHIẾU NHẬP - XUẤT
    public function getThongKeNhapXuat($fromDate = null, $toDate = null)
    {
        $whereNhap = "WHERE pn.trangthai = 1";
        $whereXuat = "WHERE dh.trangthai IN (1, 2)";
        $params = [];

        if ($fromDate && $toDate) {
            $whereNhap .= " AND pn.thoigiantao BETWEEN ? AND ?";
            $whereXuat .= " AND dh.thoigiantao BETWEEN ? AND ?";
            // Nhập(from, to), Xuất(from, to)
            $params = [$fromDate, $toDate, $fromDate, $toDate];
        }

        $sql = "SELECT 
                s.masp, 
                s.tensp,
                (SELECT COALESCE(SUM(ctpn.soluong), 0) 
                 FROM ctphieunhap ctpn 
                 JOIN phieunhap pn ON ctpn.mapn = pn.mapn 
                 $whereNhap AND ctpn.masp = s.masp) as tong_nhap,
                (SELECT COALESCE(SUM(ctdh.soluong), 0) 
                 FROM ctdonhang ctdh 
                 JOIN donhang dh ON ctdh.madh = dh.madh 
                 $whereXuat AND ctdh.masp = s.masp) as tong_xuat
            FROM sanpham s
            WHERE s.trangthai = 1";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getChiTietNhapXuat($masp, $fromDate = null, $toDate = null)
    {
        // Điều kiện thời gian
        $condNhap = "pn.trangthai = 1 AND ctpn.masp = ?";
        $condXuat = "dh.trangthai IN (1, 2) AND ctdh.masp = ?";
        $paramsNhap = [$masp];
        $paramsXuat = [$masp];

        if ($fromDate && $toDate) {
            $condNhap .= " AND pn.thoigiantao BETWEEN ? AND ?";
            $condXuat .= " AND dh.thoigiantao BETWEEN ? AND ?";
            array_push($paramsNhap, $fromDate, $toDate);
            array_push($paramsXuat, $fromDate, $toDate);
        } elseif ($fromDate) {
            $condNhap .= " AND pn.thoigiantao >= ?";
            $condXuat .= " AND dh.thoigiantao >= ?";
            $paramsNhap[] = $fromDate;
            $paramsXuat[] = $fromDate;
        } elseif ($toDate) {
            $condNhap .= " AND pn.thoigiantao <= ?";
            $condXuat .= " AND dh.thoigiantao <= ?";
            $paramsNhap[] = $toDate;
            $paramsXuat[] = $toDate;
        }

        // Phiếu nhập
        $sqlNhap = "SELECT 
                    pn.mapn,
                    pn.thoigiantao,
                    a.hoten as tenadmin,
                    n.tenncc,
                    ctpn.soluong,
                    ctpn.dongia
                FROM ctphieunhap ctpn
                JOIN phieunhap pn ON ctpn.mapn = pn.mapn
                LEFT JOIN admin a ON pn.maadmin = a.maadmin
                LEFT JOIN nhacungcap n ON pn.mancc = n.mancc
                WHERE {$condNhap}
                ORDER BY pn.thoigiantao DESC";

        $stmtNhap = $this->conn->prepare($sqlNhap);
        $stmtNhap->execute($paramsNhap);
        $phieuNhap = $stmtNhap->fetchAll(PDO::FETCH_ASSOC);

        // Đơn hàng
        $sqlXuat = "SELECT 
                    dh.madh,
                    dh.thoigiantao,
                    kh.hoten as tenkhachhang,
                    ctdh.soluong,
                    ctdh.dongia
                FROM ctdonhang ctdh
                JOIN donhang dh ON ctdh.madh = dh.madh
                LEFT JOIN khachhang kh ON dh.makh = kh.makh
                WHERE {$condXuat}
                ORDER BY dh.thoigiantao DESC";

        $stmtXuat = $this->conn->prepare($sqlXuat);
        $stmtXuat->execute($paramsXuat);
        $donHang = $stmtXuat->fetchAll(PDO::FETCH_ASSOC);

        return [
            'phieu_nhap' => $phieuNhap,
            'don_hang'   => $donHang,
        ];
    }

    public function getTotalStockByDateAndId($id, $date)
    { 
        $sql = "SELECT
                    COALESCE(
                        (
                        SELECT
                            SUM(ctpn.soluong)
                        FROM
                            ctphieunhap AS ctpn
                        INNER JOIN phieunhap AS pn
                        ON
                            ctpn.mapn = pn.mapn
                        WHERE
                            ctpn.masp = ? AND DATE(pn.thoigiantao) <= ?
                    ),
                    0
                    ) as tongnhap, 
                    COALESCE(
                        (
                        SELECT
                            SUM(ctdh.soluong)
                        FROM
                            ctdonhang AS ctdh
                        INNER JOIN donhang AS dh
                        ON
                            ctdh.madh = dh.madh
                        WHERE
                            ctdh.masp = ? AND DATE(dh.thoigiantao) <= ?
                    ),
                    0
                    ) as tongxuat,
                    (
                        COALESCE(
                            (
                            SELECT
                                SUM(ctpn.soluong)
                            FROM
                                ctphieunhap AS ctpn
                            INNER JOIN phieunhap AS pn
                            ON
                                ctpn.mapn = pn.mapn
                            WHERE
                                ctpn.masp = ? AND DATE(pn.thoigiantao) <= ?
                        ),
                        0
                        ) - COALESCE(
                            (
                            SELECT
                                SUM(ctdh.soluong)
                            FROM
                                ctdonhang AS ctdh
                            INNER JOIN donhang AS dh
                            ON
                                ctdh.madh = dh.madh
                            WHERE
                                ctdh.masp = ? AND DATE(dh.thoigiantao) <= ?
                        ),
                        0
                        )
                    ) AS tongsl;";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            $id, $date, // for tongnhap
            $id, $date, // for tongxuat
            $id, $date, // for tongsl (first half)
            $id, $date  // for tongsl (second half)
        ]);        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getList($id, $date, $table) {
        if ($table === 'nhap') {
            $sql = "SELECT
                        ctpn.mapn,
                        thoigiantao,
                        soluong
                    FROM
                        phieunhap AS pn
                    INNER JOIN ctphieunhap AS ctpn
                    ON
                        pn.mapn = ctpn.mapn
                    WHERE
                        masp = ? AND DATE(thoigiantao) <= ?";
        } else {
            $sql = "SELECT
                        ctdh.madh,
                        thoigiantao,
                        soluong
                    FROM
                        donhang AS dh
                    INNER JOIN ctdonhang AS ctdh
                    ON
                        dh.madh = ctdh.madh
                    WHERE
                        masp = ? AND DATE(thoigiantao) <= ?";
        }

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id, $date]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
