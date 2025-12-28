CREATE DATABASE IF NOT EXISTS d2_;
USE d2_;

-- Bảng Admin
CREATE TABLE IF NOT EXISTS admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL -- Lưu ý: Password này là MD5
);

-- Bảng Category
CREATE TABLE IF NOT EXISTS category (
    cat_id VARCHAR(20) PRIMARY KEY,
    cat_name VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Thêm dữ liệu mẫu
-- Password: '123' -> MD5: '202cb962ac59075b964b07152d234b70'
INSERT INTO admin (username, password) VALUES ('admin', '202cb962ac59075b964b07152d234b70');

INSERT INTO category (cat_id, cat_name) VALUES 
('IT01', 'Sách Lập trình Web'),
('IT02', 'Sách DevOps cơ bản'),
('KT01', 'Sách Kinh tế vĩ mô');