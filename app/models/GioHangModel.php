<?php
class GioHangModel
{
    private $conn;
    public function __construct($db)
    {
        $this->conn = $db;
    }
    public function getCartsByUserId_Model($user_id)
    {
        $sql = "SELECT * FROM giohang WHERE makh = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$user_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function updateQuantity_Model($makh, $masp, $soluong)
    {
        $sql = "UPDATE giohang SET soluong = ? WHERE makh = ? AND masp = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$soluong, $makh, $masp]);
    }
    public function deleteItem_Model($makh, $masp){ // Chưa nhét size vào tất cả
        $sql = "DELETE FROM giohang WHERE makh = ? AND masp = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$makh, $masp]);
    }
    public function countCartItem_Model($user_id){
        $sql = "SELECT COUNT(*) as total FROM giohang WHERE makh =?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$user_id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['total'];
    }
}
