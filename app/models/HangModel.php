<?php
    class HangModel{
        private $conn;
        public function __construct($db)
        {
            $this->conn = $db;
        }
        public function getAll(){
            $sql = "SELECT * FROM hang where trangthai = 1";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }



?>