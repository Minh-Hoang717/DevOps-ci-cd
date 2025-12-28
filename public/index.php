<?php
// public/index.php
// THÊM 3 DÒNG NÀY ĐỂ DEBUG
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// 1. Load các file cấu hình và core cần thiết
require_once __DIR__ . '/../app/core/Db.php';
require_once __DIR__ . '/../app/core/Controller.php'; // Bạn nhớ tạo file này nếu chưa có, hoặc xóa dòng này nếu class Controller rỗng
require_once __DIR__ . '/../app/controllers/CategoryController.php';

// 2. Khởi tạo Controller chính
$app = new CategoryController();

// 3. Chạy hàm index
$app->index();
?>