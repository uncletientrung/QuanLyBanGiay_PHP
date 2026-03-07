<?php
class DonHangModel
{
    private $db;

    public function __construct($conn)
    {
        $this->db = $conn;
    }

    public function getAll()
    {
        $sql = "SELECT dh.*, kh.hoten 
                FROM donhang dh 
                JOIN khachhang kh ON dh.makh = kh.makh 
                ORDER BY dh.madh ASC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
