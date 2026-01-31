<?php
require_once "../QuanLyBanGiay_PHP/app/models/SanPhamModel.php";

class SanPhamController
{
  private $model;
  public function __construct($db)
  {
    $this->model = new SanPhamModel($db);
  }
  public function getAll()
  {
    $listSP = $this->model->getAll();
    return $listSP;
  }
}
