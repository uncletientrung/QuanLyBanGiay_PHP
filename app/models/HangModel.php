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

        public function getAllForAdmin(){
            $sql = "SELECT * FROM hang";
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
        public function getNameById($maHang){
            $sql = "SELECT tenhang FROM hang WHERE trangthai = 1 AND mahang = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$maHang]);
            return $stmt->fetchColumn(); 
        }

        public function add($tenhang) {
            $sql = "INSERT INTO hang(tenhang, trangthai) VALUES (?, 1)";
            $stmt = $this->db->prepare($sql);
            return $stmt->execute([$tenhang]);
        }
        
        public function delete($id) {
            $sql = "DELETE FROM hang WHERE mahang = ?";
            $stmt = $this->db->prepare($sql);
            return $stmt->execute([$id]);
        }

        public function update($id, $tenhang) {
            $sql = "UPDATE hang SET tenhang = ? WHERE mahang = ?";
            $stmt = $this->db->prepare($sql);
            return $stmt->execute([$tenhang, $id]);
        }

        public function isInProds($id)
        { 
            $sql = "SELECT masp from sanpham WHERE hang = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$id]);
            return $stmt->rowCount() > 0;
        }

        public function changeStatus($id, $status)
        { 
            try {
                $this->db->beginTransaction();

                $sql1 = "UPDATE hang SET trangthai = ? WHERE mahang = ?";
                $stmt1 = $this->db->prepare($sql1);
                $stmt1->execute([$status, $id]);

                $sql2 = "UPDATE sanpham SET trangthai = ? WHERE hang = ?";
                $stmt2 = $this->db->prepare($sql2);
                $stmt2->execute([$status, $id]);

                return $this->db->commit();

            } catch (Exception $e) {
                $this->db->rollBack();
                return false;
            }
        }
    }
?>