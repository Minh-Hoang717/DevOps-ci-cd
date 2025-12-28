<?php
require_once __DIR__ . '/../core/Db.php';

class AdminModel {
    private $conn;

    public function __construct() {
        $this->conn = Db::getConnection();
    }

    public function login($username, $password) {
        $stmt = $this->conn->prepare(
            "SELECT * FROM admin WHERE username = ? AND password = ?"
        );
        $stmt->execute([$username, md5($password)]);
        return $stmt->fetch();
    }
}
