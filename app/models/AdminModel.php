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
}
