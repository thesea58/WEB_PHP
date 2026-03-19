<?php

class DacSanMienNamController extends BaseController {
    public function index() {
        $sanPhamModel = new SanPhamModel($this->pdo);
        $danhMucModel = new DanhMucModel($this->pdo);
        
        // Lấy danh mục miền Nam (id = 3)
        $danhMuc = $danhMucModel->layDanhMucTheoId(3);
        $sanPham = $sanPhamModel->laySanPhamTheoMien(3);
        
        $this->render('Dac-san-mien-nam', [
            'danhMuc' => $danhMuc,
            'sanPham' => $sanPham
        ]);
    }
}
