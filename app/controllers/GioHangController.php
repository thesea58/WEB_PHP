<?php

class GioHangController extends BaseController {
    
    public function index() {
        if (!isset($_SESSION['user'])) {
            $this->render('Gio-hang', [
                'notLoggedIn' => true
            ]);
            return;
        }
        
        // Lấy giỏ hàng từ session
        $gioHang = $_SESSION['cart'] ?? [];
        
        // Tính tổng tiền
        $tongTien = 0;
        foreach ($gioHang as $item) {
            $tongTien += $item['gia'] * $item['so_luong'];
        }
        
        $this->render('Gio-hang', [
            'gioHang' => $gioHang,
            'tongTien' => $tongTien,
            'notLoggedIn' => false
        ]);
    }
    
    /**
     * Thêm sản phẩm vào giỏ hàng
     */
    public function themVaoGio() {
        if (!isset($_SESSION['user'])) {
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'message' => 'Vui lòng đăng nhập!']);
            exit;
        }
        
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            header('HTTP/1.0 405 Method Not Allowed');
            exit;
        }
        
        $ma_sp = $_POST['ma_sp'] ?? 0;
        $so_luong = (int)($_POST['so_luong'] ?? 1);
        
        if (!$ma_sp || $so_luong < 1) {
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'message' => 'Dữ liệu không hợp lệ!']);
            exit;
        }
        
        // Lấy thông tin sản phẩm từ database
        $sanPhamModel = new SanPhamModel($this->pdo);
        $sanPham = $sanPhamModel->laySanPhamTheoId($ma_sp);
        
        if (!$sanPham) {
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'message' => 'Sản phẩm không tồn tại!']);
            exit;
        }
        
        // Kiểm tra nếu sản phẩm đã có trong giỏ
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
        
        $found = false;
        foreach ($_SESSION['cart'] as &$item) {
            if ($item['ma_sp'] == $ma_sp) {
                $item['so_luong'] += $so_luong;
                $found = true;
                break;
            }
        }
        
        // Nếu sản phẩm chưa có trong giỏ, thêm mới
        if (!$found) {
            $_SESSION['cart'][] = [
                'ma_sp' => $sanPham['ma_sp'],
                'ten_sp' => $sanPham['ten_sp'],
                'gia' => $sanPham['gia'],
                'so_luong' => $so_luong,
                'path_img' => $sanPham['path_img']
            ];
        }
        
        header('Content-Type: application/json');
        echo json_encode([
            'success' => true,
            'message' => 'Thêm vào giỏ hàng thành công!',
            'cartCount' => count($_SESSION['cart'])
        ]);
        exit;
    }
    
    /**
     * Xoá sản phẩm khỏi giỏ hàng
     */
    public function xoaKhoiGio() {
        if (!isset($_SESSION['user'])) {
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'message' => 'Vui lòng đăng nhập!']);
            exit;
        }
        
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            header('HTTP/1.0 405 Method Not Allowed');
            exit;
        }
        
        $ma_sp = $_POST['ma_sp'] ?? 0;
        
        if (!isset($_SESSION['cart'])) {
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'message' => 'Giỏ hàng trống!']);
            exit;
        }
        
        // Tìm và xoá sản phẩm
        foreach ($_SESSION['cart'] as $key => $item) {
            if ($item['ma_sp'] == $ma_sp) {
                unset($_SESSION['cart'][$key]);
                $_SESSION['cart'] = array_values($_SESSION['cart']); // Reindex array
                break;
            }
        }
        
        header('Content-Type: application/json');
        echo json_encode([
            'success' => true,
            'message' => 'Xoá khỏi giỏ hàng thành công!',
            'cartCount' => count($_SESSION['cart'])
        ]);
        exit;
    }
    
    /**
     * Cập nhật số lượng sản phẩm
     */
    public function capNhatSoLuong() {
        if (!isset($_SESSION['user'])) {
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'message' => 'Vui lòng đăng nhập!']);
            exit;
        }
        
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            header('HTTP/1.0 405 Method Not Allowed');
            exit;
        }
        
        $ma_sp = $_POST['ma_sp'] ?? 0;
        $so_luong = (int)($_POST['so_luong'] ?? 1);
        
        if ($so_luong < 1) {
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'message' => 'Số lượng phải lớn hơn 0!']);
            exit;
        }
        
        if (!isset($_SESSION['cart'])) {
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'message' => 'Giỏ hàng trống!']);
            exit;
        }
        
        // Tìm và cập nhật số lượng
        foreach ($_SESSION['cart'] as &$item) {
            if ($item['ma_sp'] == $ma_sp) {
                $item['so_luong'] = $so_luong;
                break;
            }
        }
        
        header('Content-Type: application/json');
        echo json_encode(['success' => true, 'message' => 'Cập nhật thành công!']);
        exit;
    }
}
