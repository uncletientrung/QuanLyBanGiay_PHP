<?php
// auth_helper.php - Đặt ở đầu mọi trang cần dùng $isLogin và $user

// Luôn start session đầu tiên
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Kiểm tra trạng thái login dựa trực tiếp vào $_SESSION
$isLogin = isset($_SESSION['user']) 
           && is_array($_SESSION['user']) 
           && !empty($_SESSION['user']['makh'])  // dùng makh làm key chính xác
           && !empty($_SESSION['user']['hoten']);

$user = $isLogin ? $_SESSION['user'] : null;

// Nếu bạn vẫn dùng $_SESSION['user-id'] riêng
if ($isLogin && !isset($_SESSION['user-id'])) {
    $_SESSION['user-id'] = $user['makh'] ?? null;
}

// Debug tạm (xóa sau khi fix xong)
if (isset($_GET['debug_session'])) {
    echo '<div style="background: #fff3cd; padding: 15px; border: 1px solid #ffeeba; margin: 10px 0; font-family: monospace;">';
    echo "<strong>Debug Session:</strong><br>";
    echo "isLogin: " . var_export($isLogin, true) . "<br>";
    echo "user key tồn tại: " . (isset($_SESSION['user']) ? 'Có' : 'Không') . "<br>";
    echo "hoten: " . ($user['hoten'] ?? 'không có') . "<br>";
    echo "makh: " . ($user['makh'] ?? 'không có') . "<br>";
    echo "Toàn bộ _SESSION[user]: " . print_r($_SESSION['user'] ?? 'không tồn tại', true);
    echo '</div>';
}
?>