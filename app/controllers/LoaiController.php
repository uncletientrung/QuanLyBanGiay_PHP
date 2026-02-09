<?php
require_once "../QuanLyBanGiay_PHP/app/models/LoaiModel.php";
class LoaiController
{
    private $model;
    private $listLoai;
    private $listLoaiTheoSL;
    public function __construct($db)
    {
        $this->model = new LoaiModel($db);
        $this->listLoai = $this->model->getAll();
        $this->listLoaiTheoSL = $this->model->getLoaivaSoluongTuongUng();
    }
    public function getAll()
    {
        return $this->listLoai;
    }

    public function getNameById($maLoai){
        return $this->model->getNameById($maLoai);
    }

    public function getLoaivaSoluongTuongUng(){
        return $this->listLoaiTheoSL;
    }
}