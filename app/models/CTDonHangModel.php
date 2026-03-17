<?php
class CTDonHangModel
{
    private $conn;
    public function __construct($conn)
    {
        $this->conn =  $conn;
    }
    public function addOrderDetail_Model($madonhang, $order_detail_data)
    {
        $sql = "INSERT INTO ctdonhang (madh, masp, masize, soluong, dongia)
                VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $result = $stmt->execute([
            $madonhang,
            $order_detail_data['masp'],
            $order_detail_data['masize'],
            $order_detail_data['soluong'],
            $order_detail_data['dongia']
        ]);
        return $stmt->rowCount();
    }

    public function getCountOrderDetailByMaDH($madh)
    {
        $sql = "SELECT SUM(soluong) as total FROM ctdonhang WHERE madh =?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$madh]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['total'];
    }
    public function getCountLoaiSPByMaDH($madh)
    {
        $sql = "SELECT COUNT(*) as total FROM ctdonhang WHERE madh =?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$madh]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['total'];
    }
    public function getAllOrderDetailByMaDH($madh)
    {
        $sql = "SELECT * FROM ctdonhang WHERE madh = ?";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute([$madh]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function beginTransaction()
    {
        return $this->conn->beginTransaction();
    }

    public function commit()
    {
        return $this->conn->commit();
    }

    public function rollBack()
    {
        return $this->conn->rollBack();
    }
}
