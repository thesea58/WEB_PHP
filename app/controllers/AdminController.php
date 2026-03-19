<?php

class AdminController extends BaseController {
    
    public function index() {
        // Kiểm tra xem user đã đăng nhập chưa
        if (!isset($_SESSION['user'])) {
            header('Location: index.php?controller=TaiKhoan&action=dangnhap');
            exit();
        }
        
        // Kiểm tra xem user có phải admin không
        if (!isset($_SESSION['user']['vai_tro']) || $_SESSION['user']['vai_tro'] !== 'admin') {
            // Nếu không phải admin, redirect tới trang chủ
            header('Location: index.php?controller=TrangChu&action=index');
            exit();
        }
        
        // Fetch admin info từ database
        require_once 'app/models/NguoiDungModel.php';
        $userModel = new NguoiDungModel($this->pdo);
        $ma_nguoi_dung = $_SESSION['user']['ma_nguoi_dung'];
        $adminUser = $userModel->layNguoiDungTheoId($ma_nguoi_dung);
        
        // Nếu không tìm thấy admin trong DB, redirect
        if (!$adminUser) {
            header('Location: index.php?controller=TrangChu&action=index');
            exit();
        }
        
        // Nếu là admin, render trang admin với data từ DB
        $this->render('Admin', [
            'adminUser' => $adminUser
        ]);
    }
    
    /**
     * Đăng xuất (cho admin)
     */
    public function dangxuat() {
        unset($_SESSION['user']);
        header('Location: index.php?controller=TrangChu&action=index');
        exit();
    }
}
