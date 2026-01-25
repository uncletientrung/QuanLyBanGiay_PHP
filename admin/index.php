<?php
// D:\xampp\htdocs\QuanLyBanGiay_PHP\admin -> __DIR__
// dirname(__DIR__) nhay ra 1 cap -> D:\xampp\htdocs\QuanLyBanGiay_PHP\
require_once dirname(__DIR__) . "/config/constants.php";
require_once dirname(__DIR__) . "/config/connectdb.php";

// Load Core
require_once dirname(__DIR__) . "/app/core/App.php";
require_once dirname(__DIR__) . "/app/core/Controller.php";

// Khởi tạo App
$myApp = new App();
