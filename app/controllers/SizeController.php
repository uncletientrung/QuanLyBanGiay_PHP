<?php
require_once "../QuanLyBanGiay_PHP/app/models/SanPhamModel.php";
require_once "../QuanLyBanGiay_PHP/app/models/SizeModel.php";

class SizeController
{
    private $model;


    public function __construct($db)
    {
        $this->model = new SizeModel($db);
       
    }

    public function getSizeBySanPham($maSP)
    {
        return $this->model->getSizeBySanPham($maSP);
    }

}