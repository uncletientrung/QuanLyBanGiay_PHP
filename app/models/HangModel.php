<?php
    class HangModel{
        private $db;
        public function __construct()
        {
            global $conn;
            $this->db = $conn;
        }
        public function getAll(){
            $sql = "SELECT * FROM hang where trangthai = 1";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        public function getIdByName($tenHang){
            $sql = "SELECT mahang FROM hang where trangthai = 1 AND LOWER(tenhang) = LOWER(?) LIMIT 1";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$tenHang]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
          public function getNameById($maHang)
        {
            $sql = "SELECT tenhang FROM hang WHERE trangthai = 1 AND mahang = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$maHang]);
            return $stmt->fetchColumn(); 
        }
    }



?>