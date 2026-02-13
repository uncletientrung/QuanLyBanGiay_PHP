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

    public function getById($id)
    {
        $sql = "SELECT * FROM khachhang WHERE makh = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function add($data)
    {
        $sql = "INSERT INTO khachhang (hoten, sdt, diachi, gioitinh, trangthai, email, matkhau)
                       VALUES (:hoten, :sdt, :diachi, :gioitinh, :trangthai, :email, :matkhau)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($data);
    }

    public function update($id, $data)
    {
        $sql = "UPDATE khachhang 
                SET hoten = :hoten, sdt = :sdt, diachi = :diachi, gioitinh = :gioitinh, trangthai = :trangthai, email = :email, matkhau = :matkhau 
                WHERE makh = :makh";
        $data['makh'] = $id;
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($data);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM khachhang WHERE makh = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
