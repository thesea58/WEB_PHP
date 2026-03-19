<?php
// app/controllers/TrangChuController.php

class TrangChuController extends BaseController {
    
    public function index() {
        // Khởi tạo model
        $sanPhamModel = new SanPhamModel($this->pdo);
        
        // Lấy dữ liệu sản phẩm mới nhất
        $tatCaSanPham = $sanPhamModel->layTatCaSanPham();
        
        // // Lấy sản phẩm theo từng miền để hiển thị các mục riêng
        // $mienBac = $sanPhamModel->laySanPhamTheoMien(1);
        // $mienTrung = $sanPhamModel->laySanPhamTheoMien(2);
        // $mienNam = $sanPhamModel->laySanPhamTheoMien(3);

        // Lấy sản phẩm bán chạy để hiển thị tại trang chủ
        $bestSellers = $sanPhamModel->laySanPhamBanChay(4);

        // Truyền dữ liệu sang view Trang-chu.php
        $this->render('Trang-chu', [
            'tatCaSanPham' => $tatCaSanPham,
            'bestSellers' => $bestSellers
        ]);
    }
}
