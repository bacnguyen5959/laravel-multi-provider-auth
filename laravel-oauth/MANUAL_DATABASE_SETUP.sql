-- Hướng dẫn setup database thủ công
-- Họ tên: [Nhập họ tên của bạn]
-- Mã sinh viên: [Nhập mã sinh viên của bạn]

-- Bước 1: Tạo database
CREATE DATABASE IF NOT EXISTS laravel_oauth CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- Bước 2: Sử dụng database
USE laravel_oauth;

-- Bước 3: Tạo bảng users
CREATE TABLE IF NOT EXISTS users (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    email_verified_at TIMESTAMP NULL,
    password VARCHAR(255) NULL,
    provider VARCHAR(255) NULL,
    provider_id VARCHAR(255) NULL,
    avatar VARCHAR(255) NULL,
    student_id VARCHAR(255) NULL,
    remember_token VARCHAR(100) NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL,
    UNIQUE KEY unique_email (email),
    UNIQUE KEY unique_provider_id (provider, provider_id),
    INDEX idx_provider_provider_id (provider, provider_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Bước 4: Tạo bảng migrations (để Laravel không chạy lại migration)
CREATE TABLE IF NOT EXISTS migrations (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    migration VARCHAR(255) NOT NULL,
    batch INT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Bước 5: Insert record vào migrations
INSERT INTO migrations (migration, batch) VALUES 
('0001_01_01_000000_create_users_table', 1),
('0001_01_01_000001_create_cache_table', 1),
('0001_01_01_000002_create_jobs_table', 1);

-- Kiểm tra kết quả
SHOW COLUMNS FROM users;
