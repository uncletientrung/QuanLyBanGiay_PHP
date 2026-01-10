<?php
require './config/connectdb.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>ShoeGalaxy - Vũ trụ giày</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT_URL ?>public/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@400;700;800&display=swap" rel="stylesheet">
</head>

<body>
    <header class="header">
        <div class="container header__container">

            <div class="logo">
                <img src="<?= ROOT_URL ?>public/images/logo.jpeg" alt="ShoeGalaxy">
            </div>

            <nav class="nav">
                <ul class="nav__menu">
                    <li><a href="<?= ROOT_URL ?>">Trang chủ</a></li>
                    <li><a href="#">Giới thiệu</a></li>
                    <li><a href="#">⚡ Sản phẩm</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Liên hệ</a></li>
                    <li><a href="#">Kiểm tra đơn hàng</a></li>
                </ul>
            </nav>

            <div class="header__icons">
                <i class="bi bi-search"></i>
                <i class="bi bi-person"></i>
                <div class="cart">
                    <i class="bi bi-cart-plus"></i>
                    <span class="badge">3</span>
                </div>
            </div>

        </div>
    </header>
</body>

</html>