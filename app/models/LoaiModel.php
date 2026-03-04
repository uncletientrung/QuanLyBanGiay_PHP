<?php
    class LoaiModel{
        private $db;
        public function __construct()
        {
            global $conn;
            $this->db = $conn;
        }
        public function getAll(){
            $sql = "SELECT * FROM loai where trangthai = 1";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

       public function getNameById($maLoai)
        {
            $sql = "SELECT tenloai FROM loai WHERE trangthai = 1 AND maloai = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$maLoai]);
            return $stmt->fetchColumn(); 
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
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    }



?>