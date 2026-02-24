<?php
class GioHangModel{
    private $conn;
    public function __construct($db)
    {
        $this->conn= $db;
    }
    public function getCartsByUserId_Model($user_id){
        $sql= "SELECT * FROM giohang WHERE makh = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$user_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}