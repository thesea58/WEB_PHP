<?php

class PostController extends BaseController {
    
    public function index() {
        // Kiểm tra admin access
        if (!isset($_SESSION['user']) || $_SESSION['user']['vai_tro'] !== 'admin') {
            header('Location: index.php?controller=TaiKhoan&action=dangnhap');
            exit();
        }
        
        // Lấy danh sách sản phẩm
        require_once 'app/models/SanPhamModel.php';
        $sanPhamModel = new SanPhamModel($this->pdo);
        $products = $sanPhamModel->layTatCaSanPham();
        
        $this->render('post', ['products' => $products]);
    }
    
    /**
     * Thêm sản phẩm mới
     */
    public function themSanPham() {
        header('Content-Type: application/json; charset=utf-8');
        
        // Kiểm tra admin access
        if (!isset($_SESSION['user']) || $_SESSION['user']['vai_tro'] !== 'admin') {
            http_response_code(401);
            echo json_encode(['success' => false, 'message' => 'Bạn không có quyền']);
            exit();
        }
        
        // Lấy dữ liệu từ POST
        $ten_sp = isset($_POST['ten_sp']) ? trim($_POST['ten_sp']) : '';
        $gia = isset($_POST['gia']) ? (int)$_POST['gia'] : 0;
        $mo_ta = isset($_POST['mo_ta']) ? trim($_POST['mo_ta']) : '';
        $vung_mien = isset($_POST['vung_mien']) ? trim($_POST['vung_mien']) : '';
        
        // Validate input
        if (empty($ten_sp) || $gia <= 0 || empty($vung_mien)) {
            http_response_code(400);
            echo json_encode(['success' => false, 'message' => 'Vui lòng điền: Tên sản phẩm, Giá, Vùng miền']);
            exit();
        }
        
        // Xử lý upload file
        $path_img = 'app/views/client/img/Anh/SPBC/default.jpg'; // Default image
        if (isset($_FILES['hinh_anh']) && $_FILES['hinh_anh']['error'] == 0) {
            $upload_dir = 'app/views/client/img/Anh/SPBC/';
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }
            
            // Rename file to avoid conflicts
            $file_ext = pathinfo($_FILES['hinh_anh']['name'], PATHINFO_EXTENSION);
            $file_name = 'product_' . time() . '_' . rand(1000, 9999) . '.' . $file_ext;
            $target_file = $upload_dir . $file_name;
            
            // Validate file type
            $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
            if (!in_array(strtolower($file_ext), $allowed_types)) {
                http_response_code(400);
                echo json_encode(['success' => false, 'message' => 'Chỉ hỗ trợ ảnh (jpg, png, gif)']);
                exit();
            }
            
            // Move file
            if (move_uploaded_file($_FILES['hinh_anh']['tmp_name'], $target_file)) {
                $path_img = $target_file;
            } else {
                http_response_code(500);
                echo json_encode(['success' => false, 'message' => 'Lỗi upload ảnh']);
                exit();
            }
        }
        
        // Get category ID based on vung_mien
        require_once 'app/models/SanPhamModel.php';
        $sanPhamModel = new SanPhamModel($this->pdo);
        
        // Map vung_mien to category name
        $category_map = [
            'bac' => 'Đặc sản miền Bắc',
            'trung' => 'Đặc sản miền Trung',
            'nam' => 'Đặc sản miền Nam'
        ];
        
        if (!isset($category_map[$vung_mien])) {
            http_response_code(400);
            echo json_encode(['success' => false, 'message' => 'Vùng miền không hợp lệ']);
            exit();
        }
        
        $category_name = $category_map[$vung_mien];
        $id_danh_muc = $sanPhamModel->layIDDanhMuc($category_name);
        
        if (!$id_danh_muc) {
            http_response_code(400);
            echo json_encode(['success' => false, 'message' => 'Danh mục không tìm thấy, vui lòng kiểm tra database']);
            exit();
        }
        
        // Insert product
        $ma_sp = $sanPhamModel->themSanPham($ten_sp, $gia, $mo_ta, $path_img, $id_danh_muc);
        
        if ($ma_sp) {
            http_response_code(200);
            echo json_encode([
                'success' => true, 
                'message' => 'Thêm sản phẩm thành công! (ID: ' . $ma_sp . ')',
                'ma_sp' => $ma_sp
            ]);
        } else {
            http_response_code(500);
            echo json_encode(['success' => false, 'message' => 'Lỗi thêm sản phẩm vào database']);
        }
        exit();
    }
    
    /**
     * Cập nhật sản phẩm
     */
    public function capNhatSanPham() {
        header('Content-Type: application/json; charset=utf-8');
        
        // Kiểm tra admin access
        if (!isset($_SESSION['user']) || $_SESSION['user']['vai_tro'] !== 'admin') {
            http_response_code(401);
            echo json_encode(['success' => false, 'message' => 'Bạn không có quyền']);
            exit();
        }
        
        // Lấy dữ liệu
        $ma_sp = isset($_POST['ma_sp']) ? (int)$_POST['ma_sp'] : 0;
        $ten_sp = isset($_POST['ten_sp']) ? trim($_POST['ten_sp']) : '';
        $gia = isset($_POST['gia']) ? (int)$_POST['gia'] : 0;
        $mo_ta = isset($_POST['mo_ta']) ? trim($_POST['mo_ta']) : '';
        
        // Validate
        if ($ma_sp <= 0 || empty($ten_sp) || $gia <= 0) {
            http_response_code(400);
            echo json_encode(['success' => false, 'message' => 'Dữ liệu không hợp lệ']);
            exit();
        }
        
        require_once 'app/models/SanPhamModel.php';
        $sanPhamModel = new SanPhamModel($this->pdo);
        
        if ($sanPhamModel->capNhatSanPham($ma_sp, $ten_sp, $gia, $mo_ta)) {
            echo json_encode(['success' => true, 'message' => 'Cập nhật sản phẩm thành công']);
        } else {
            http_response_code(500);
            echo json_encode(['success' => false, 'message' => 'Cập nhật thất bại']);
        }
        exit();
    }
    
    /**
     * Xóa sản phẩm
     */
    public function xoaSanPham() {
        header('Content-Type: application/json; charset=utf-8');
        
        // Kiểm tra admin access
        if (!isset($_SESSION['user']) || $_SESSION['user']['vai_tro'] !== 'admin') {
            http_response_code(401);
            echo json_encode(['success' => false, 'message' => 'Bạn không có quyền']);
            exit();
        }
        
        $ma_sp = isset($_POST['ma_sp']) ? (int)$_POST['ma_sp'] : 0;
        
        if ($ma_sp <= 0) {
            http_response_code(400);
            echo json_encode(['success' => false, 'message' => 'ID sản phẩm không hợp lệ']);
            exit();
        }
        
        require_once 'app/models/SanPhamModel.php';
        $sanPhamModel = new SanPhamModel($this->pdo);
        
        if ($sanPhamModel->xoaSanPham($ma_sp)) {
            echo json_encode(['success' => true, 'message' => 'Xóa sản phẩm thành công']);
        } else {
            http_response_code(500);
            echo json_encode(['success' => false, 'message' => 'Xóa thất bại']);
        }
        exit();
    }
}
