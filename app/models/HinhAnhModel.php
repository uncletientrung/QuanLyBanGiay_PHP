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
    public function getImageMainById($masp)
    {
        $sql = "SELECT * FROM hinhanh WHERE masp = ? AND ismain = 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$masp]);
        $image = $stmt->fetch(PDO::FETCH_ASSOC);

        return $image ? $image['path'] : NO_IMAGE;
    }
    public function insertImage($masp, $path) {
        $sql = "INSERT INTO hinhanh (masp, path, ismain) VALUES (:masp, :path, 0)";
        $stmt = $this->conn->prepare($sql);
        
        return $stmt->execute([
            ':masp'   => $masp,
            ':path'   => $path,
        ]);
    }

    public function delete($masp, $path) {
        $sql = "DELETE FROM hinhanh WHERE path = :path AND masp = :masp";
        $stmt = $this->conn->prepare($sql);
        
        return $stmt->execute([
            ':masp'   => $masp,
            ':path'   => $path,
        ]);
    }

    public function updateBanner($masp, $path) {
        $this->conn->beginTransaction();
        $sql = "UPDATE hinhanh SET ismain = 0 WHERE masp = :masp AND ismain = 1";
        $stmt = $this->conn->prepare($sql);
        
        $stmt->execute([
            ':masp'   => $masp,
        ]);

        $sqlSet = "UPDATE hinhanh SET ismain = 1 WHERE masp = :masp AND path = :path";
        $stmtSet = $this->conn->prepare($sqlSet);
        $stmtSet->execute([
            ':masp' => $masp,
            ':path' => $path
        ]);
        return $this->conn->commit();
    }
}
