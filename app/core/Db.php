<?php
// app/core/Db.php

class Db {
    public static function getConnection() {
        // QUAN TRỌNG: Trong Docker, host không phải là "localhost" mà là tên service "db"
        $servername = getenv('DB_HOST') ?: 'db'; 
        $username = getenv('DB_USER') ?: 'root';
        $password = getenv('DB_PASS') ?: 'rootpassword'; // Pass này phải khớp với docker-compose.yml
        $dbname = getenv('DB_NAME') ?: 'd2_';

        try {
            $conn = new PDO(
                "mysql:host=$servername;dbname=$dbname;charset=utf8",
                $username,
                $password
            ;
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            // Echo lỗi ra để debug (chỉ dùng lúc dev)
            die("Lỗi kết nối DB: " . $e->getMessage()); 
        }
    }
}