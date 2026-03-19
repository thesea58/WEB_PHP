<?php
/**
 * Script to update all links in client views to use MVC pattern
 * This script replaces all old direct .php links with controller-based URLs
 */

$viewDir = __DIR__ . '/app/views/client/';

// Define link replacements
$linkReplacements = [
    // Direct page links
    'href="trang-chu.php"' => 'href="index.php?controller=TrangChu&action=index"',
    'href="gioi-thieu.php"' => 'href="index.php?controller=GioiThieu&action=index"',
    'href="Gioi-thieu.php"' => 'href="index.php?controller=GioiThieu&action=index"',
    'href="bai-viet.php"' => 'href="index.php?controller=BaiViet&action=index"',
    'href="Bai-viet.php"' => 'href="index.php?controller=BaiViet&action=index"',
    'href="bai-viet-mien-bac.php"' => 'href="index.php?controller=BaiVietMienBac&action=index"',
    'href="bai-viet-mien-trung.php"' => 'href="index.php?controller=BaiVietMienTrung&action=index"',
    'href="bai-viet-mien-nam.php"' => 'href="index.php?controller=BaiVietMienNam&action=index"',
    'href="Dac-san-mien-bac.php"' => 'href="index.php?controller=DacSanMienBac&action=index"',
    'href="Dac-san-mien-trung.php"' => 'href="index.php?controller=DacSanMienTrung&action=index"',
    'href="Dac-san-mien-nam.php"' => 'href="index.php?controller=DacSanMienNam&action=index"',
    'href="San-pham-ban-chay.php"' => 'href="index.php?controller=SanPhamBanChay&action=index"',
    'href="san-pham.php"' => 'href="index.php?controller=SanPham&action=index"',
    'href="dang-ky.php"' => 'href="index.php?controller=DangKy&action=index"',
    'href="Dang-ky.php"' => 'href="index.php?controller=DangKy&action=index"',
    'href="dang-nhap.php"' => 'href="index.php?controller=DangNhap&action=index"',
    'href="Dang-nhap.php"' => 'href="index.php?controller=DangNhap&action=index"',
    'href="gio-hang.php"' => 'href="index.php?controller=GioHang&action=index"',
    'href="Gio-hang.php"' => 'href="index.php?controller=GioHang&action=index"',
    'href="tai-khoan.php"' => 'href="index.php?controller=TaiKhoan&action=index"',
    'href="Tai-khoan.php"' => 'href="index.php?controller=TaiKhoan&action=index"',
    'href="thanh-toan.php"' => 'href="index.php?controller=ThanhToan&action=index"',
    'href="Thanh-toan.php"' => 'href="index.php?controller=ThanhToan&action=index"',
    'href="xu-ly-don-hang.php"' => 'href="index.php?controller=XuLyDonHang&action=index"',
    'href="Xu-ly-don-hang.php"' => 'href="index.php?controller=XuLyDonHang&action=index"',
    'href="thong-ke-don-hang.php"' => 'href="index.php?controller=ThongKeDonHang&action=index"',
    'href="Thong-ke-don-hang.php"' => 'href="index.php?controller=ThongKeDonHang&action=index"',
    'href="post.php"' => 'href="index.php?controller=Post&action=index"',
    'href="admin.php"' => 'href="index.php?controller=Admin&action=index"',
    'href="Admin.php"' => 'href="index.php?controller=Admin&action=index"',
];

// Get all PHP files in client folder (excluding subdirectories)
$files = glob($viewDir . '*.php');

echo "Found " . count($files) . " PHP files\n";
echo "Looking in: " . $viewDir . "\n\n";

foreach ($files as $file) {
    $content = file_get_contents($file);
    $original = $content;
    
    // Apply all replacements
    foreach ($linkReplacements as $old => $new) {
        $content = str_replace($old, $new, $content);
    }
    
    // Only write if content changed
    if ($content !== $original) {
        file_put_contents($file, $content);
        echo "Updated: " . basename($file) . "\n";
    }
}

echo "\nCompleted!\n";
?>

