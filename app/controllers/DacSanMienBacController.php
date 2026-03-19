<?php

class DacSanMienBacController extends BaseController {
    public function index() {
        $sanPhamModel = new SanPhamModel($this->pdo);
        $danhMucModel = new DanhMucModel($this->pdo);
        
        // Lấy danh mục miền Bắc (id = 1)
        $danhMuc = $danhMucModel->layDanhMucTheoId(1);
        $sanPham = $sanPhamModel->laySanPhamTheoMien(1);
        
        $this->render('Dac-san-mien-bac', [
            'danhMuc' => $danhMuc,
            'sanPham' => $sanPham
        ]);
    }
}
