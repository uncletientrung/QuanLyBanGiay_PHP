<?php
require_once __DIR__ . '/../../config/constants.php';

class Database {
    protected static $conn = null;

    public function __construct() {
        if (self::$conn === null) {
            try {
                $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8";
                self::$conn = new PDO($dsn, DB_USER, DB_PASS);
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Kết nối CSDL thất bại: " . $e->getMessage());
            }
        }
    }

    protected function queryAll($sql, $params = []) {
        $stmt = self::$conn->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    protected function queryOne($sql, $params = []) {
        $stmt = self::$conn->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    protected function execute($sql, $params = []) {
        $stmt = self::$conn->prepare($sql);
        return $stmt->execute($params);
    }
}
