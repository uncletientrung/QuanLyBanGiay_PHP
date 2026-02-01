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

        public function countAll() {
            $sql = "SELECT COUNT(*) AS total FROM sanpham";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
        }
        public function getByPage($limit, $offset) {
            $sql = "SELECT * FROM sanpham LIMIT :limit OFFSET :offset";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
            $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }



    }



?>