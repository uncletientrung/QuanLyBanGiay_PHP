<?php
class AdminModel
{
    private $db;

    public function __construct()
    {
        global $conn;
        $this->db = $conn;
    }

    public function checkLogin($email, $password)
    {
        $sql = "SELECT * FROM admin WHERE email = :email AND password = :pass";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':email' => $email,
            ':pass' => $password
        ]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAdminById($id)
    {
        $sql = "SELECT * FROM admin WHERE maadmin = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateProfile($maadmin, $hoten, $email, $sdt)
    {
        $sql = "UPDATE admin SET hoten = :hoten, email = :email, sdt = :sdt WHERE maadmin = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':hoten' => $hoten,
            ':email' => $email,
            ':sdt' => $sdt,
            ':id' => $maadmin
        ]);
    }

    public function updatePassword($maadmin, $newPassword)
    {
        $sql = "UPDATE admin SET password = :pass WHERE maadmin = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':pass' => $newPassword,
            ':id' => $maadmin
        ]);
    }
}
