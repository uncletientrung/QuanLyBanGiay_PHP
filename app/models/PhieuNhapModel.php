<?php
class PhieuNhapModel
{
    private $db;

    public function __construct($conn)
    {
        $this->db = $conn;
    }

    public function getAll()
    {
        $sql = "SELECT p.*, a.hoten as tenadmin, n.tenncc 
                FROM phieunhap p 
                LEFT JOIN admin a ON p.maadmin = a.maadmin 
                LEFT JOIN nhacungcap n ON p.mancc = n.mancc 
                ORDER BY p.mapn DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
