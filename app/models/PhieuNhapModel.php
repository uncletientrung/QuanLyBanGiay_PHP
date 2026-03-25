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

    public function getNextMaPN()
    {
        $sql  = "SELECT MAX(mapn) as max_mapn FROM phieunhap";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $row  = $stmt->fetch(PDO::FETCH_ASSOC);
        $next = ($row['max_mapn'] ?? 0) + 1;
        return 'PN' . str_pad($next, 3, '0', STR_PAD_LEFT);
    }

    public function deleteById($id)
    {
        try {
            $this->db->beginTransaction();

            $stmt1 = $this->db->prepare("DELETE FROM ctphieunhap WHERE mapn = ?");
            $stmt1->execute([$id]);

            $stmt2 = $this->db->prepare("DELETE FROM phieunhap WHERE mapn = ?");
            $stmt2->execute([$id]);

            $this->db->commit();
            return true;
        } catch (Exception $e) {
            $this->db->rollBack();
            return false;
        }
    }
}
