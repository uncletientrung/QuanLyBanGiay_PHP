<?php
class MauSacModel
{
    private $db;
    public function __construct()
    {
        global $conn;
        $this->db = $conn;
    }
    public function getAll()
    {
        $sql = "SELECT * FROM mau where trangthai = 1";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllForAdmin()
    {
        $sql = "SELECT * FROM mau";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getNameById($maMau)
    {
        $sql = "SELECT tenmau FROM mau WHERE trangthai = 1 AND mamau = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$maMau]);
        return $stmt->fetchColumn();
    }
    public function getNameByIdNoStatus($maMau)
    {
        $sql = "SELECT tenmau FROM mau WHERE mamau = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$maMau]);
        return $stmt->fetchColumn();
    }

    public function add($tenmau) {
        $sql = "INSERT INTO mau(tenmau, trangthai) VALUES (?, 1)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$tenmau]);
    }
    
    public function delete($id) {
        $sql = "DELETE FROM mau WHERE mamau = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$id]);
    }

    public function update($id, $tenmau) {
        $sql = "UPDATE mau SET tenmau = ? WHERE mamau = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$tenmau, $id]);
    }

    public function isInProds($id)
    { 
        $sql = "SELECT masp from sanpham WHERE mau = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->rowCount() > 0;
    }

    public function changeStatus($id, $status)
    { 
        try {
                $this->db->beginTransaction();

                $sql = "UPDATE mau SET trangthai = ? WHERE mamau = ?";
                $stmt = $this->db->prepare($sql);
                $stmt->execute([$status, $id]);
            
                $sql2 = "UPDATE sanpham SET trangthai = ? WHERE mau = ?";
                $stmt2 = $this->db->prepare($sql2);
                $stmt2->execute([$status, $id]);

                return $this->db->commit();

            } catch (Exception $e) {
                $this->db->rollBack();
                return false;
            }
    }
}
