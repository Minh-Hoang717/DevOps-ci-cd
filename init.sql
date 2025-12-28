CREATE DATABASE IF NOT EXISTS d2_ CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE d2_;

-- Bảng Admin
CREATE TABLE IF NOT EXISTS admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Bảng Category
CREATE TABLE IF NOT EXISTS category (
    cat_id VARCHAR(20) PRIMARY KEY,
    cat_name VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO admin (username, password) VALUES ('admin', '202cb962ac59075b964b07152d234b70');

INSERT INTO category (cat_id, cat_name) VALUES 
('IT01', 'Sách Lập trình Web'),
('IT02', 'Sách DevOps cơ bản'),
('KT01', 'Sách Kinh tế vĩ mô');