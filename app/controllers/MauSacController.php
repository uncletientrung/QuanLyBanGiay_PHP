<?php
require_once "../QuanLyBanGiay_PHP/app/models/MauSacModel.php";
class MauSacController
{
    private $model;
    private $listMauSac;
    public function __construct($db)
    {
        $this->model = new MauSacModel($db);
        $this->listMauSac = $this->model->getAll();
    }
    public function getAll()
    {
        return $this->listMauSac;
    }

    public function getNameById($maMau){
        return $this->model->getNameById($maMau);
    }
}