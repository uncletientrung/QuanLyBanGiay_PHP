<?php
    class SanPhamModel{
        private $conn;
        public function __construct($db)
        {
            $this->conn = $db;
        }
        public function getAll(){
            $sql = "SELECT * FROM sanpham";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
            // Ví dụ trả về ['id' => 1, 'tenSP' => 'Giày Nike', 'gia' => 1200000],
        }
    }



?>