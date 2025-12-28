<?php
// app/controllers/CategoryController.php
session_start();
// Sửa đường dẫn require cho đúng với vị trí file
require_once __DIR__ . '/../models/CategoryModel.php';
require_once __DIR__ . '/../models/AdminModel.php';

class CategoryController
{
    private $categoryModel;
    private $adminModel;

    public function __construct()
    {
        $this->categoryModel = new CategoryModel();
        $this->adminModel = new AdminModel();
    }

    public function index()
    {
        // Khởi tạo biến thông báo để tránh lỗi Undefined variable ở View
        $addMsg = '';

        // --- XỬ LÝ LOGIN ---
        if (isset($_POST['login'])) {
            $admin = $this->adminModel->login(
                $_POST['username'],
                $_POST['password']
            );
            if ($admin) {
                $_SESSION['admin'] = $admin;
                // Refresh lại trang để nhận session
                header("Location: index.php");
                exit;
            } else {
                echo "<script>alert('Sai tên đăng nhập hoặc mật khẩu');</script>";
            }
        }

        // --- THÊM PHẦN NÀY: XỬ LÝ LOGOUT ---
        if (isset($_GET['action']) && $_GET['action'] == 'logout') {
            unset($_SESSION['admin']);
            session_destroy();
            header("Location: index.php"); // Load lại trang, nó sẽ tự nhảy vào form login
            exit;
        }

        // Kiểm tra Session
        if (!isset($_SESSION['admin'])) {
            // Đường dẫn tính từ public/index.php gọi vào
            require "../app/views/auth/login.php";
            return; // Dừng lại, không chạy code bên dưới
        }

        // --- XỬ LÝ THÊM (ADD) ---
        if (isset($_POST['add_category'])) {
            $check = $this->categoryModel->insert(
                $_POST['cat_id'],
                $_POST['cat_name']
            );

            if ($check) {
                // Cách 1: Redirect để tránh resubmit form
                header("Location: index.php");
                exit;
            } else {
                $addMsg = "Lỗi thêm dữ liệu!";
            }
        }

        // --- XỬ LÝ XÓA (DELETE) ---
        if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
            $this->categoryModel->delete($_GET['id']);
            header("Location: index.php");
            exit;
        }

        // --- PHÂN TRANG & HIỂN THỊ ---
        $page = $_GET['page'] ?? 1;
        $limit = 5;
        $offset = ($page - 1) * $limit;

        $categories = $this->categoryModel->getAll($limit, $offset);
        $totalRecords = $this->categoryModel->count();
        $totalPages = ceil($totalRecords / $limit);

        // Gọi View hiển thị
        require "../app/views/category/index.php";
    }
}
