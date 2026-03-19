<?php
session_start();
require_once 'config/dbConect.php';
require_once 'models/SanPhamModel.php';
// Kết nối database
$pdo = connectDB();

// Kết nối database
$pdo = connectDB();
if (!$pdo) {
    die('Không thể kết nối đến database!');
}else {
    echo 'Kết nối database thành công!';
}
// Khởi tạo model
$sanphamModel = new ProductModel($pdo);
// Lấy tất cả sản phẩm
$products = $sanphamModel->getAllProducts();

// Hiển thị sản phẩm
foreach ($products as $product) {
    echo "Tên sản phẩm: " . $product['ten_sp'] . "<br>";
    echo "Giá: " . $product['gia'] . "<br>";
    echo "Danh mục: " . $product['ten_danh_muc'] . "<br>";
    echo "Ngày tạo: " . $product['ngay_tao'] . "<br><hr>";
}
?>
