<?php
require_once __DIR__ . '/../core/Db.php';

class CategoryModel {
    private $conn;

    public function __construct() {
        $this->conn = Db::getConnection();
    }

    public function getAll($limit, $offset) {
        $sql = "SELECT * FROM category ORDER BY created_at DESC LIMIT $offset, $limit";
        return $this->conn->query($sql)->fetchAll();
    }

    public function count() {
        return $this->conn->query("SELECT COUNT(*) FROM category")->fetchColumn();
    }

    public function insert($id, $name) {
        $stmt = $this->conn->prepare(
            "INSERT INTO category (cat_id, cat_name) VALUES (?, ?)"
        );
        return $stmt->execute([$id, $name]);
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM category WHERE cat_id = ?");
        return $stmt->execute([$id]);
    }

    public function find($id) {
        $stmt = $this->conn->prepare("SELECT * FROM category WHERE cat_id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function update($id, $name) {
        $stmt = $this->conn->prepare(
            "UPDATE category SET cat_name = ? WHERE cat_id = ?"
        );
        return $stmt->execute([$name, $id]);
    }
}
