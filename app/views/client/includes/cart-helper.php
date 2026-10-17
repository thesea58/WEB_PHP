<?php
/**
 * Hàm helper để hỗ trợ giỏ hàng
 * Sử dụng trong các view file để tạo button "Thêm vào giỏ"
 */

/**
 * Hiển thị button "Thêm vào giỏ"
 */
function renderAddToCartButton($ma_sp, $classes = 'btn btn-outline-brown w-100') {
    if (!isset($_SESSION['user'])) {
        // Nếu chưa đăng nhập, redirect tới login
        echo '<a href="index.php?controller=DangNhap&action=index" class="' . htmlspecialchars($classes) . '">
            <i class="bi bi-box-arrow-in-down me-2"></i>Thêm vào giỏ
        </a>';
    } else {
        // Nếu đã đăng nhập, hiển thị button có hàm onclick
        echo '<button class="' . htmlspecialchars($classes) . '" onclick="themVaoGio(' . intval($ma_sp) . ', 1)">
            <i class="bi bi-box-arrow-in-down me-2"></i>Thêm vào giỏ
        </button>';
    }
}

/**
 * Lấy số lượng sản phẩm trong giỏ
 */
function getCartCount() {
    if (!isset($_SESSION['cart'])) {
        return 0;
    }
    return count($_SESSION['cart']);
}

/**
 * Lấy tổng giá trị giỏ hàng
 */
function getCartTotal() {
    if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
        return 0;
    }
    
    $total = 0;
    foreach ($_SESSION['cart'] as $item) {
        $total += $item['gia'] * $item['so_luong'];
    }
    return $total;
}
