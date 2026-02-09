<?php
require_once "../QuanLyBanGiay_PHP/app/models/HangModel.php";

class HangController
{
    private $model;
    private $listHang;
    private $hangMap =[];
    public function __construct($db)
    {
        $this->model = new HangModel($db);
        $this->listHang = $this->model->getAll();
        foreach($this->listHang as $hang){
            $this->hangMap[$hang['mahang']] = $hang['tenhang']; // Dùng hashmap
        }
    }
    public function getAll()
    {
        return $this->listHang;
    }
    public function getNameById($idHang) {
        return $this->hangMap[$idHang] ?? null;
    }
    public function getNamebyid2($maHang){
        return $this->model->getNameById($maHang);
    }
}
