<?php
    class AuthModel{
        private $conn;
        public function __construct($db)
        {
            $this->conn=$db;
        }
        public function checkLogin($email, $password){
            $sql = "SELECT * FROM khachhang WHERE trangthai = 1 AND email = ? AND matkhau = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$email, $password]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    }

