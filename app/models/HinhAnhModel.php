<?php
class HinhAnhModel
{
    private $conn;
    public function __construct($db)
    {
        $this->conn = $db;
    }
    public function getAll()
    {
        $sql = "SELECT * FROM hinhanh";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getImageById($maHinhAnh)
    {
        $sql = "SELECT * FROM hinhanh WHERE masp = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$maHinhAnh]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
