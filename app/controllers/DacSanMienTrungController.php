<?php

class DacSanMienTrungController extends BaseController {
    public function index() {
        $sanPhamModel = new SanPhamModel($this->pdo);
        $danhMucModel = new DanhMucModel($this->pdo);
        
        // Lấy danh mục miền Trung (id = 2)
        $danhMuc = $danhMucModel->layDanhMucTheoId(2);
        $sanPham = $sanPhamModel->laySanPhamTheoMien(2);
        
        $this->render('Dac-san-mien-trung', [
            'danhMuc' => $danhMuc,
            'products' => $sanPham
        ]);
    }
}
