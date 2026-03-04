<?php
class MauSacModel{
    private $db;
    public function __construct()
    {
        global $conn;
        $this->db = $conn;
    }
    public function getAll(){
        $sql = "SELECT * FROM mau where trangthai = 1";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
   public function getNameById($maMau)
        {
            $sql = "SELECT tenmau FROM mau WHERE trangthai = 1 AND mamau = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$maMau]);
            return $stmt->fetchColumn(); 
        }
}