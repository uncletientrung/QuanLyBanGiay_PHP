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
    if (!$user_id) {
        echo json_encode(['success' => false, 'error' => 'Vui lòng đăng nhập']);
        exit;
    }

    $masp   = $_POST['masp'] ?? null;
    $masize = $_POST['masize'] ?? null;
    $action = $_POST['action'] ?? null;

    if (!$masp || !$masize || !$action) {
        echo json_encode(['success' => false, 'error' => 'Thiếu thông tin']);
        exit;
    }

    // Lấy stock
    $stock = $this->SanPhamModel->getStock($masp, $masize);

    
    $soluong = $this->model->getQuantity($user_id, $masp, $masize);

    if ($soluong === 0) {
        echo json_encode(['success' => false, 'error' => 'Sản phẩm không tồn tại trong giỏ']);
        exit;
    }

    $new_soluong = $soluong;

    if ($action === 'minus') {
        if ($soluong > 1) {
            $new_soluong--;
        } else {
            echo json_encode(['success' => false, 'error' => 'Số lượng tối thiểu là 1']);
            exit;
        }
    } elseif ($action === 'plus') {
        if ($soluong >= $stock) {
            echo json_encode(['success' => false, 'error' => "Chỉ còn $stock sản phẩm trong kho!"]);
            exit;
        }
        $new_soluong++;
    } elseif ($action === 'set') {
        $quantity = (int)($_POST['quantity'] ?? 1);
        if ($quantity < 1) $quantity = 1;
        if ($quantity > $stock) {
            echo json_encode(['success' => false, 'error' => "Chỉ còn $stock sản phẩm trong kho!"]);
            exit;
        }
        $new_soluong = $quantity;
    } else {
        echo json_encode(['success' => false, 'error' => 'Hành động không hợp lệ']);
        exit;
    }

    // Update số lượng mới
    $updated = $this->model->updateQuantity_Model($user_id, $masp, $masize, $new_soluong);
    if (!$updated) {
        echo json_encode(['success' => false, 'error' => 'Cập nhật thất bại']);
        exit;
    }

    // Tính lại thành tiền và tổng giỏ
    $sp = $this->SanPhamModel->getSpById($masp);
    $gia = $sp['gianhap'] + ($sp['gianhap'] * $sp['tyleloinhuan'] / 100);
    $thanhtien = $gia * $new_soluong;

    $carts = $this->model->getCartsByUserId_Model($user_id);
    $tong = 0;
    foreach ($carts as $c) {
        $spCart = $this->SanPhamModel->getSpById($c['masp']);
        $giaCart = $spCart['gianhap'] + ($spCart['gianhap'] * $spCart['tyleloinhuan'] / 100);
        $tong += $giaCart * $c['soluong'];
    }

    echo json_encode([
        'success'      => true,
        'soluong_moi'  => $new_soluong,
        'thanhtien'    => number_format($thanhtien) . '₫',
        'tonggiohang'  => number_format($tong) . '₫'
    ]);
}
  public function deleteCartItem()
{
    $user_id = $_SESSION['user-id'] ?? NULL;
    $masp = $_POST['masp'] ?? NULL;
    $masize = $_POST['masize'] ?? NULL;

    if (!$user_id || !$masp || !$masize) {
        echo json_encode(['success' => false]);
        exit;
    }

    // Xóa sản phẩm
    $this->model->deleteItem_Model($user_id, $masp, $masize);

    // Lấy lại giỏ hàng
    $carts = $this->model->getCartsByUserId_Model($user_id);

    // Tính tổng tiền
    $tong = 0;
    foreach ($carts as $c) {
        $sp = $this->SanPhamModel->getSpById($c['masp']);
        $gia = $sp['gianhap'] * (1 + $sp['tyleloinhuan'] / 100);
        $tong += $gia * $c['soluong'];
    }

    // Đếm lại số item
    $cartCount = $this->model->countCartItem_Model($user_id);

    echo json_encode([
        'success'     => true,
        'tonggiohang' => number_format($tong) . '₫',
        'empty'       => count($carts) == 0,
        'cartCount'   => $cartCount
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
    $qty  = $data['qty'] ?? 1;

    if (!$masp || !$size) {
        echo json_encode([
            "success" => false,
            "error" => "Invalid data"
        ]);
        return;
    }

    $user_id = $_SESSION['user-id'] ?? null;

    // ===== Đã login =====
    if ($user_id) {

        $this->model->insertOrUpdateCart($user_id, $masp, $size, $qty);

        // đếm lại giỏ hàng
        $cartCount = $this->model->countCartItem_Model($user_id);

        echo json_encode([
            "success" => true,
            "cartCount" => $cartCount
        ]);

        return;
    }

    // ===== Chưa login =====
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    $_SESSION['cart'][] = [
        'masp' => $masp,
        'masize' => $size,
        'soluong' => $qty
    ];

    echo json_encode([
        "success" => true,
        "cartCount" => count($_SESSION['cart'])
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
