<?php
    class LoaiModel{
        private $conn;
        public function __construct($db)
        {
            $this->conn = $db;
        }
        public function getAll(){
            $sql = "SELECT * FROM loai";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

    }



?>