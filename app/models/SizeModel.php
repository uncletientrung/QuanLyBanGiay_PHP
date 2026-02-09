<?php
    class SizeModel{
        private $conn;
        public function __construct($db)
        {
            $this->conn = $db;
        }
        public function getAll(){
            $sql = "SELECT * FROM size where trangthai = 1";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getSizeBySanPham($maSP)
        {
            $sql = "
                SELECT s.masize, s.tensize, ss.soluong
                FROM sanphamsize ss
                JOIN size s ON ss.masize = s.masize
                WHERE ss.masp = ?
            ";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$maSP]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getSoLuongSize($maSP, $maSize)
        {
            $sql = "
                SELECT soluong
                FROM sanphamsize
                WHERE masp = ? AND masize = ?
            ";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$maSP, $maSize]);
            return $stmt->fetchColumn();
        }



    }