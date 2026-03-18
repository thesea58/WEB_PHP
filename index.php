<?php
session_start();
require_once 'config/dbConect.php';
// Kết nối database
$pdo = connectDB();

// Kết nối database
$pdo = connectDB();
if (!$pdo) {
    die('Không thể kết nối đến database!');
}else {
    echo 'Kết nối database thành công!';
}
?>
