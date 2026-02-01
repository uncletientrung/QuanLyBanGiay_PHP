<?php
require_once 'constants.php';
try {
    $dsn = "mysql:host=" . DB_HOST . "; dbname=" . DB_NAME . "; charset=utf8";
    $conn = new PDO($dsn, DB_USER, DB_PASS);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "kết nối ok";

} catch (PDOException $e) {
    die("Kết nối thất bại: " . $e->getMessage());
}
