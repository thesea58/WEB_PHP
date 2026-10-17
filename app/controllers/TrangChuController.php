<?php
// app/controllers/TrangChuController.php

class TrangChuController extends BaseController {
    
    public function index() {
        // Khởi tạo model
        $sanPhamModel = new SanPhamModel($this->pdo);
        $danhMucModel = new DanhMucModel($this->pdo);
        
        // Lấy dữ liệu sản phẩm bán chạy
        $sanPhamBanChay = $sanPhamModel->laySanPhamBanChay(4);
        
        // Lấy danh sách danh mục
        $danhMucList = $danhMucModel->layTatCaDanhMuc();

        // Truyền dữ liệu sang view Trang-chu.php
        $this->render('Trang-chu', [
            'sanPhamBanChay' => $sanPhamBanChay,
            'danhMucList' => $danhMucList
        ]);
    }
}
