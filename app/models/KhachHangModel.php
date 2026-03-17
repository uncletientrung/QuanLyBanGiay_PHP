<?php
class KhachHangModel
{
    private $db;

    public function __construct($conn)
    {
        $this->db = $conn;
    }

    public function getAll()
    {
        $sql = "SELECT * FROM khachhang";
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
    public function checkLogin($email, $password)
    {
        $sql = "SELECT * FROM khachhang WHERE trangthai = 1 AND email = ? AND matkhau = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$email, $password]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function getUserByEmail($email)
    {
        $sql = "SELECT * FROM khachhang WHERE trangthai = 1 AND email = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function updateProfile_Model($user_id, $user_data)
    {
        $sql = "UPDATE khachhang
                SET hoten = ?, email = ?, sdt = ?, gioitinh = ?, diachi = ?
                WHERE makh = ? ";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            $user_data['hoten'],
            $user_data['email'],
            $user_data['sdt'],
            $user_data['gioitinh'],
            $user_data['diachi'],
            $user_id
        ]);
        return $stmt->rowCount();
    }
    public function updatePassword_Model($user_id, $password)
    {
        $sql = "UPDATE khachhang
                SET matkhau = ?
                WHERE makh = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$password, $user_id]);
        return $stmt->rowCount();
    }

    public function createUser($data)
    {
        $sql = "INSERT INTO khachhang (hoten, sdt, diachi, gioitinh, email, matkhau, trangthai)
                VALUES (:hoten, :sdt, :diachi, :gioitinh, :email, :matkhau, 1)";
        $stmt = $this->db->prepare($sql);
        if ($stmt->execute($data)) {
            return $this->db->lastInsertId();
        }
        return false;
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

    public function checkExists($email, $sdt, $excludeId = null)
    {
        $sql = "SELECT * FROM khachhang WHERE (email = :email OR sdt = :sdt)";
        if ($excludeId) {
            $sql .= " AND makh != :id";
        }

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':sdt', $sdt);
        if ($excludeId) {
            $stmt->bindParam(':id', $excludeId);
        }

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function checkEmailExists($email)
    {
        $sql = "SELECT * FROM khachhang WHERE email = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$email]);
        return $stmt->rowCount() > 0;
    }
    public function checkSDTExists($sdt)
    {
        $sql = "SELECT * FROM khachhang WHERE sdt = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$sdt]);
        return $stmt->rowCount() > 0;
    }
}
