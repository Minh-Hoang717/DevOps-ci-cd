<?php
// app/core/Db.php

// Ưu tiên lấy từ biến môi trường (Environment Variable), nếu không có thì dùng giá trị mặc định
define("HOST", getenv('DB_HOST') ?: "localhost");
define("DB_NAME", getenv('DB_NAME') ?: "d2_");
define("DB_USER", getenv('DB_USER') ?: "root");
define("DB_PASS", getenv('DB_PASS') ?: "");

class Db {
    public static function getConnection() {
        try {
            $conn = new PDO(
                "mysql:host=" . HOST . ";dbname=" . DB_NAME . ";charset=utf8",
                DB_USER,
                DB_PASS
            );
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            // Trong môi trường Production, không nên echo lỗi chi tiết ra màn hình
            die("Kết nối thất bại. Vui lòng kiểm tra cấu hình Database.");
        }
    }
}