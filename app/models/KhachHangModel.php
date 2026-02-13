<?php
class KhachHangModel
{
    private $db;

    public function __construct()
    {
        global $conn;
        $this->db = $conn;
    }

    public function getAll()
    {
        $sql = "SELECT * FROM khachhang ORDER BY makh ASC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
