<?php
class NhaCungCapModel
{
    private $db;

    public function __construct($conn)
    {
        $this->db = $conn;
    }

    public function getAll()
    {
        $sql  = "SELECT * FROM nhacungcap WHERE trangthai = 1";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllForAdmin() {
        $sql  = "SELECT * FROM nhacungcap";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function isInPN($id) {
        $sql = "SELECT mapn FROM phieunhap where mancc = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->rowCount() > 0;
    }

    public function changeStatus($id, $status) { 
        $sql = "UPDATE nhacungcap SET trangthai = ? WHERE mancc = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$status, $id]);
    }

    public function delete($id) {
        $sql = "DELETE FROM nhacungcap WHERE mancc = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$id]);
    }

    public function add($newTen, $sdt, $diachi) {
        $sql = "INSERT INTO nhacungcap(tenncc, sdt, diachi, trangthai) VALUES (?, ?, ?, 1)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$newTen, $sdt, $diachi]);
    }

    public function update($id, $tenncc, $sdt, $diachi) {
        $sql = "UPDATE nhacungcap 
                SET tenncc = ?, sdt = ?, diachi = ? 
                WHERE mancc = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$tenncc, $sdt, $diachi, $id]);
    }
}