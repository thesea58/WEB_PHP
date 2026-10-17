<?php
/**
 * Cấu hình kết nối cơ sở dữ liệu trên InfinityFree
 */
define('DB_HOST', 'sql207.infinityfree.com');      // Thay bằng Hostname của bạn
define('DB_USER', 'if0_43201279');                 // Thay bằng Username của bạn
define('DB_PASS', 'tbt110305');             // Thay bằng Password của bạn
define('DB_NAME', 'if0_43201279_dacsan3mien');     // Thay bằng Tên database đầy đủ

function connectDB() {
    try {
        $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];
        return new PDO($dsn, DB_USER, DB_PASS, $options);
    } catch (PDOException $e) {
        die("Kết nối CSDL thất bại: " . $e->getMessage());
    }
}

define('BASE_URL', '/');
?>