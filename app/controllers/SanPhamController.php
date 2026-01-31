<?php
require_once "../QuanLyBanGiay_PHP/app/models/SanPhamModel.php";

class SanPhamController
{
  private $model;
  private $listSP;
  public function __construct($db)
  {
    $this->model = new SanPhamModel($db);
    $this->listSP = $this->model->getAll();
  }
  public function getAll()
  {
    return $this->listSP;
  }
}
