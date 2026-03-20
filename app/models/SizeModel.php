<?php
class SizeModel
{
    private $conn;
    public function __construct($db)
    {
        $this->conn = $db;
    }
    public function getAll()
    {
        $sql = "SELECT * FROM size";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getSizeBySanPham($maSP)
    {
        $sql = "
                SELECT s.masize, s.tensize, ss.soluong
                FROM sanphamsize ss
                JOIN size s ON ss.masize = s.masize
                WHERE ss.masp = ?
            ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$maSP]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getSoLuongSize($maSP, $maSize)
    {
        $sql = "
                SELECT soluong
                FROM sanphamsize
                WHERE masp = ? AND masize = ?
            ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$maSP, $maSize]);
        return $stmt->fetchColumn();
    }

    public function updateSoLuongSanPhamSize_Model($maSP, $maSize, $soLuongTru)
    {
        $soLuongHienTai = $this->getSoLuongSize($maSP, $maSize);
        $soLuongSauTru = $soLuongHienTai - $soLuongTru;
        $sql = "UPDATE sanphamsize 
            SET soluong = ? 
            WHERE masp = ? AND masize = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$soLuongSauTru, $maSP, $maSize]);
    }

    public function hoanSoLuongSanPhamSize_Model($maSP, $maSize, $soLuongHoan)
    {
        $sql = "UPDATE sanphamsize SET soluong = soluong + ? WHERE masp = ? AND masize = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$soLuongHoan, $maSP, $maSize]);
    }

    public function getNameById($maSize)
    {
        $sql = "SELECT * FROM size where masize = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$maSize]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
