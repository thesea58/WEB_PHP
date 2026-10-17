<?php
/**
 * Helper function to generate URLs following MVC pattern
 * @param string $controller The controller name (without "Controller" suffix)
 * @param string $action The action method name
 * @param array $params Additional parameters to pass as query string
 * @return string The generated URL
 */
function generateUrl($controller = 'TrangChu', $action = 'index', $params = []) {
    $url = "index.php?controller={$controller}&action={$action}";
    
    foreach ($params as $key => $value) {
        $url .= "&{$key}={$value}";
    }
    
    return $url;
}

/**
 * Map of view file names to controller names
 */
function getControllerForView($viewName) {
    $mappings = [
        'Trang-chu' => 'TrangChu',
        'Trang-chu-2' => 'TrangChu2',
        'Gioi-thieu' => 'GioiThieu',
        'Bai-viet' => 'BaiViet',
        'bai-viet-mien-bac' => 'BaiVietMienBac',
        'bai-viet-mien-trung' => 'BaiVietMienTrung',
        'bai-viet-mien-nam' => 'BaiVietMienNam',
        'Dac-san-mien-bac' => 'DacSanMienBac',
        'Dac-san-mien-trung' => 'DacSanMienTrung',
        'Dac-san-mien-nam' => 'DacSanMienNam',
        'San-pham-ban-chay' => 'SanPhamBanChay',
        'Dang-ky' => 'DangKy',
        'Dang-nhap' => 'DangNhap',
        'Gio-hang' => 'GioHang',
        'Tai-khoan' => 'TaiKhoan',
        'Thanh-toan' => 'ThanhToan',
        'Xu-ly-don-hang' => 'XuLyDonHang',
        'Thong-ke-don-hang' => 'ThongKeDonHang',
        'Admin' => 'Admin',
        'post' => 'Post',
    ];
    
    return $mappings[$viewName] ?? 'TrangChu';
}
?>
