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
                JOIN khachhang kh ON dh.makh = kh.makh";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAllByMaKH($makh)
    {
        $sql = "SELECT * FROM donhang WHERE makh = ? ";
        $stmt =  $this->db->prepare($sql);
        $stmt->execute([$makh]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getCountOrderByMaDH($madh)
    {
        $sql = "SELECT COUNT(*) as total FROM donhang WHERE madh =?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$madh]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['total'];
    }
    public function addOrder_Model($user_id, $order_data, $dia_chi)
    {
        $sql = "INSERT INTO donhang (makh, tongtien, diachigiaohang, hinhthucthanhtoan, trangthai)
                VALUES (?, ?, ?, ?, 0)";
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

    public function updateStatus($id, $status)
    {
        return $this->updateStatusMulti([$id], $status);
    }

    public function updateStatusMulti($ids, $status)
    {
        $placeholders = implode(',', array_fill(0, count($ids), '?'));
        $sql = "UPDATE donhang SET trangthai = ? WHERE madh IN ($placeholders)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute(array_merge([$status], $ids));
    }

    public function getDetail($id)
    {
        $sql = "SELECT dh.*, kh.hoten, kh.email, kh.sdt, kh.gioitinh, kh.diachi as diachi_kh 
            FROM donhang dh 
            JOIN khachhang kh ON dh.makh = kh.makh 
            WHERE dh.madh = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getItems($id)
    {
        $sql = "SELECT ct.*, sp.tensp, s.tensize, m.tenmau 
            FROM ctdonhang ct
            JOIN sanpham sp ON ct.masp = sp.masp
            JOIN size s ON ct.masize = s.masize
            JOIN mau m ON sp.mau = m.mamau
            WHERE ct.madh = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteFullOrder($id)
    {
        try {
            $this->db->beginTransaction();

            $sqlDetails = "DELETE FROM ctdonhang WHERE madh = ?";
            $stmt1 = $this->db->prepare($sqlDetails);
            $stmt1->execute([$id]);

            $sqlOrder = "DELETE FROM donhang WHERE madh = ?";
            $stmt2 = $this->db->prepare($sqlOrder);
            $result = $stmt2->execute([$id]);

            $this->db->commit();
            return $result;
        } catch (Exception $e) {
            $this->db->rollBack();
            return false;
        }
    }

    public function huyDonHang_Model($madh)
    {
        try {
            $this->db->beginTransaction();

            $sql = "UPDATE donhang SET trangthai = -1 WHERE madh = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$madh]);

            // Hoàn kho
            $items = $this->getItems($madh);
            foreach ($items as $item) {
                $sqlStock = "UPDATE sanphamsize 
                         SET soluong = soluong + ? 
                         WHERE masp = ? AND masize = ?";
                $stmtStock = $this->db->prepare($sqlStock);
                $stmtStock->execute([$item['soluong'], $item['masp'], $item['masize']]);
            }

            $this->db->commit();
            return true;
        } catch (Exception $e) {
            $this->db->rollBack();
            return false;
        }
    }
}
