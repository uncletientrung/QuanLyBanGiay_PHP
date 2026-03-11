<?php
class ThongKeModel
{
    private $db;

    public function __construct($conn)
    {
        $this->db = $conn;
    }

    public function getOverviewStats($startDate, $endDate)
    {
        $sqlRev = "SELECT SUM(tongtien) as total FROM donhang WHERE trangthai IN (1, 2) AND thoigiantao BETWEEN ? AND ?";
        $stmtRev = $this->db->prepare($sqlRev);
        $stmtRev->execute([$startDate, $endDate]);
        $revenue = $stmtRev->fetch(PDO::FETCH_ASSOC)['total'] ?? 0;

        $sqlOrders = "SELECT COUNT(*) as total FROM donhang WHERE trangthai IN (1, 2) AND thoigiantao BETWEEN ? AND ?";
        $stmtOrders = $this->db->prepare($sqlOrders);
        $stmtOrders->execute([$startDate, $endDate]);
        $orders = $stmtOrders->fetch(PDO::FETCH_ASSOC)['total'] ?? 0;

        $sqlProducts = "SELECT SUM(ct.soluong) as total 
                    FROM ctdonhang ct 
                    JOIN donhang dh ON ct.madh = dh.madh 
                    WHERE dh.trangthai IN (1, 2) AND dh.thoigiantao BETWEEN ? AND ?";
        $stmtProducts = $this->db->prepare($sqlProducts);
        $stmtProducts->execute([$startDate, $endDate]);
        $products = $stmtProducts->fetch(PDO::FETCH_ASSOC)['total'] ?? 0;

        $sqlCust = "SELECT COUNT(*) as total FROM khachhang";
        $customers = $this->db->query($sqlCust)->fetch(PDO::FETCH_ASSOC)['total'] ?? 0;

        return [
            'revenue' => (float)$revenue,
            'orders' => (int)$orders,
            'products_sold' => (int)$products,
            'customers' => (int)$customers
        ];
    }

    public function getRevenueByDay($startDate, $endDate)
    {
        $sql = "SELECT DATE(thoigiantao) as date, SUM(tongtien) as total 
            FROM donhang 
            WHERE trangthai IN (1, 2) AND thoigiantao BETWEEN ? AND ?
            GROUP BY DATE(thoigiantao)
            ORDER BY date ASC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$startDate, $endDate]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTopProducts($limit = 10)
    {
        $sql = "SELECT sp.tensp, h.tenhang, SUM(ct.soluong) as total_sold, sp.gianhap * (1 + sp.tyleloinhuan/100) as giaban
                FROM ctdonhang ct
                JOIN sanpham sp ON ct.masp = sp.masp
                JOIN hang h ON sp.hang = h.mahang
                GROUP BY sp.masp
                ORDER BY total_sold DESC
                LIMIT ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(1, (int)$limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTopCustomers($limit = 10)
    {
        $sql = "SELECT kh.hoten, COUNT(dh.madh) as order_count, SUM(dh.tongtien) as total_spent
                FROM donhang dh
                JOIN khachhang kh ON dh.makh = kh.makh
                WHERE dh.trangthai = 1
                GROUP BY kh.makh
                ORDER BY total_spent DESC
                LIMIT ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(1, (int)$limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
