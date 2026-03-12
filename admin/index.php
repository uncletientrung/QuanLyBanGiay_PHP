<?php
// __DIR__ -> D:\xampp\htdocs\QuanLyBanGiay_PHP\admin
// dirname(__DIR__): lùi 1 cấp -> D:\xampp\htdocs\QuanLyBanGiay_PHP
require_once dirname(__DIR__) . "/config/connectdb.php";

// Load Core
require_once __DIR__ . "/app/core/App.php";
require_once __DIR__ . "/app/core/Controller.php";

// Khởi tạo App
$myApp = new App();
