<?php
// app/controllers/TrangChuController.php

class TrangChuController extends BaseController {
    
    public function index() {
        try {
            // Khởi tạo model
            $sanPhamModel = new SanPhamModel($this->pdo);
            $danhMucModel = new DanhMucModel($this->pdo);
            
            // Lấy dữ liệu sản phẩm bán chạy
            $sanPhamBanChay = $sanPhamModel->laySanPhamBanChay(4);
            
            // Lấy danh sách danh mục
            $danhMucList = $danhMucModel->layTatCaDanhMuc();
        } catch (Exception $e) {
            $sanPhamBanChay = [];
            $danhMucList = [];
            error_log("Database error in TrangChuController: " . $e->getMessage());
        }

        // Truyền dữ liệu sang view trang-chu.php
        $this->render('trang-chu', [
            'sanPhamBanChay' => $sanPhamBanChay,
            'danhMucList' => $danhMucList
        ]);
    }
}
