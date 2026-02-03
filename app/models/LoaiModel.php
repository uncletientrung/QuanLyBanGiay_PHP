<?php
    class LoaiModel{
        private $conn;
        public function __construct($db)
        {
            $this->conn = $db;
        }
        public function getAll(){
            $sql = "SELECT * FROM loai where trangthai = 1";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

    public function getLoaivaSoluongTuongUng(){
        $sql ="select l.maloai,l.tenloai,
        SUM(spsize.soluong) AS tongsoluong
        FROM loai l
        JOIN sanpham sp ON sp.loai=l.maloai
        JOIN sanphamsize spsize ON spsize.masp=sp.masp
        where 
            l.trangthai=1 AND sp.trangthai=1
        GROUP BY l.maloai,l.tenloai
        ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    }



?>