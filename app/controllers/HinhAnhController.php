<?php
require_once "../QuanLyBanGiay_PHP/app/models/HinhAnhModel.php";
require_once "../QuanLyBanGiay_PHP/config/constants.php";
class HinhAnhController
{
    private $model;
    private $listHinhAnh;
    public function __construct($db)
    {
        $this->model = new HinhAnhModel($db);
        $this->listHinhAnh = $this->model->getAll();
    }
    public function getAll()
    {
        return $this->listHinhAnh;
    }
    public function getMainImageById($maHinhanh)
    {
        $listImageById = $this->model->getImageById($maHinhanh);
        foreach ($listImageById as $image) {
            if ($image['ismain'] == 1) {
                return $image['path'];
            }
        }
        return NO_IMAGE;
    }
    public function getAllById($maHinhanh){
        return $this->model->getImageById($maHinhanh);
       
    }
}
