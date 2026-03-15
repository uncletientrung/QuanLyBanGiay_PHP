<?php
require_once APP_PATH_DIR . 'models/GioHangModel.php';
require_once APP_PATH_DIR . 'models/SanPhamModel.php';
require_once APP_PATH_DIR . 'models/HinhAnhModel.php';
require_once APP_PATH_DIR . 'models/SizeModel.php';

class GioHangController
{
  private $model;
  private $SanPhamModel;
  private $HinhAnhModel;
  private $SizeModel;
  public function __construct($db)
  {
    $this->model = new GioHangModel($db);
    $this->SanPhamModel = new SanPhamModel($db);
    $this->HinhAnhModel =  new HinhAnhModel($db);
    $this->SizeModel = new SizeModel($db);
  }
  public function getCartsByUserId($user_id)
  {
    return $this->model->getCartsByUserId_Model($user_id);
  }
  public function updateQuantity()
  {
    $user_id = $_SESSION['user-id'] ?? null;
    $masp   = $_POST['masp'] ?? null;
    $action = $_POST['action'] ?? null;
    $carts = $this->model->getCartsByUserId_Model($user_id);
    foreach ($carts as $item) {
      if ($item['masp'] == $masp) {
        $soluong = (int)$item['soluong'];
        break;
      }
    }
    if ($action === 'minus' && $soluong > 1) {
      $soluong--;
    } elseif ($action === 'plus') {
      $soluong++;
    }
    $this->model->updateQuantity_Model($user_id, $masp, $soluong);
    $carts = $this->model->getCartsByUserId_Model($user_id);
    $sp = $this->SanPhamModel->getSpById($masp);
    $gia = $sp['gianhap'] + ($sp['gianhap'] * $sp['tyleloinhuan'] / 100);

    // Tính lại tổng giỏ hàng
    $tong = 0;
    foreach ($carts as $c) {
      $spCart = $this->SanPhamModel->getSpById($c['masp']);
      $giaCart = $spCart['gianhap'] + ($spCart['gianhap'] * $spCart['tyleloinhuan'] / 100);
      $tong += $giaCart * $c['soluong'];
    }
    echo json_encode([
      'success'      => true,
      'soluong_moi'  => $soluong,
      'thanhtien'    => number_format($gia * $soluong) . '₫',
      'tonggiohang'  => number_format($tong) . '₫'
    ]);
  }
  public function deleteCartItem()
  {
    $user_id = $_SESSION['user-id'] ?? NULL;
    $masp = $_POST['masp'] ?? NULL;
    if (!$user_id || !$masp) {
      echo json_encode(['success' => false]);
      exit;
    }
    $this->model->deleteItem_Model($user_id, $masp);
    $carts = $this->model->getCartsByUserId_Model($user_id);
    $tong = 0;
    foreach ($carts as $c) {
      $sp = $this->SanPhamModel->getSpById($c['masp']);
      $gia = $sp['gianhap'] * (1 + $sp['tyleloinhuan'] / 100);
      $tong += $gia * $c['soluong'];
    }
    echo json_encode([
      'success'     => true,
      'masp'        => $masp,
      'tonggiohang' => number_format($tong) . '₫',
      'empty'       => count($carts) == 0
    ]);
  }
  public function countCartItem()
  {
    $user_id = $_SESSION['user-id'] ?? NULL;
    return $this->model->countCartItem_Model($user_id);
  }
  
  public function showCarts()
  {
    $user_id = $_SESSION['user-id'] ?? null;

    if ($user_id) {
      // Nếu đã đăng nhập → lấy từ DB
      $carts = $this->model->getCartsByUserId_Model($user_id);
    } else {
      // Nếu chưa đăng nhập → lấy từ session
      $carts = $_SESSION['cart'] ?? [];
    }
    $total = 0;
    foreach ($carts as &$item) {
      $sp = $this->SanPhamModel->getSpById($item['masp']);
      $size = $this->SizeModel->getNameById($item['masize'])['tensize'];
      $giaBan = $sp['gianhap'] + ($sp['gianhap'] * $sp['tyleloinhuan'] / 100);
      $item['tensp'] = $sp['tensp'];
      $item['gia'] = $giaBan;
      $item['tensize'] = $size;
      $item['path'] = $this->HinhAnhModel->getImageMainById($sp['masp']);
      $total += $giaBan * $item['soluong'];
    }
    unset($item); // item đang trỏ đến phần tử cuối nên xóa
    require VIEW_PATH_DIR . 'cart.php';
  }



  public function addToCart()
  {
    $data = json_decode(file_get_contents("php://input"), true);

    $masp = $data['masp'] ?? null;
    $size = $data['size'] ?? null;
    $qty = $data['qty'] ?? 1;

    if (!$masp || !$size) {
      echo json_encode([
        "error" => "Invalid data"
      ]);
      return;
    }

    $user_id = $_SESSION['user-id'] ?? null;

    // đã login
    if ($user_id) {

      $this->model->insertOrUpdateCart($user_id, $masp, $size, $qty);

      echo json_encode([
        "message" => "Đã thêm vào DB"
      ]);

      return;
    }

    // chưa login
    if (!isset($_SESSION['cart'])) {
      $_SESSION['cart'] = [];
    }

    $_SESSION['cart'][] = [
      'masp' => $masp,
      'masize' => $size,
      'soluong' => $qty
    ];

    echo json_encode([
      "message" => "Đã thêm vào session"
    ]);
  }
  public function mergeCartAfterLogin($user_id)
  {
    if (!isset($_SESSION['cart'])) {
      return;
    }

    foreach ($_SESSION['cart'] as $item) {

      $this->model->insertOrUpdateCart(
        $user_id,
        $item['masp'],
        $item['masize'],
        $item['soluong']
      );
    }

    // clear session cart
    unset($_SESSION['cart']);
  }
}
