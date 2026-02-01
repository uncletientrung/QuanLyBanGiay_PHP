<?php
require_once "../QuanLyBanGiay_PHP/app/models/SanPhamModel.php";

class SanPhamController
{
  private $model;
  private $listSP;
  private $totalSP;
  public function __construct($db)
  {
    $this->model = new SanPhamModel($db);
    $this->listSP = $this->model->getAll();
    $this->totalSP = $this->model->countAll();
  }
  public function getAll()
  {
    return $this->listSP;
  }

  public function countAll() {
    return $this->totalSP;
  }

  public function getByPage($limit, $offset) {
    return $this->model->getByPage($limit, $offset);
  }


}
