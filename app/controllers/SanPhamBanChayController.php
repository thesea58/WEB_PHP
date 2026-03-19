<?php

class SanPhamBanChayController extends BaseController {
    public function index() {
        $sanPhamModel = new SanPhamModel($this->pdo);
        
        // Lấy tất cả sản phẩm bán chạy
        $sanPham = $sanPhamModel->laySanPhamBanChay(100);
        
        $this->render('San-pham-ban-chay', [
            'sanPham' => $sanPham
        ]);
    }
}
