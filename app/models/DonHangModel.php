<?php
class DonHangModel
{
    private $db;

    public function __construct($conn)
    {
        $this->db = $conn;
    }

    public function getAll()
    {
        $sql = "SELECT dh.*, kh.hoten 
                FROM donhang dh 
                JOIN khachhang kh ON dh.makh = kh.makh 
                ORDER BY dh.madh ASC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function addOrder_Model($user_id, $order_data, $dia_chi)
    {
        $sql = "INSERT INTO donhang (makh, tongtien, diachigiaohang, hinhthucthanhtoan)
                VALUES (?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$user_id, $order_data['tongtien'], $dia_chi, $order_data['hinhthucthanhtoan']]);
        return $this->db->lastInsertId(); // cái này trả về mã vừa thêm vào
    }
    public function beginTransaction()
    {
        return $this->db->beginTransaction();
    }

    public function commit()
    {
        return $this->db->commit();
    }

    public function rollBack()
    {
        return $this->db->rollBack();
    }

    public function updateStatusMulti($ids, $status)
    {
        $placeholders = implode(',', array_fill(0, count($ids), '?'));
        $sql = "UPDATE donhang SET trangthai = ? WHERE madh IN ($placeholders)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute(array_merge([$status], $ids));
    }
}
