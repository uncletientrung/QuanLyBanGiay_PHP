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
}
