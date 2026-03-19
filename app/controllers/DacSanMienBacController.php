<?php

class DacSanMienBacController extends BaseController {
    public function index() {
        // Khởi tạo model và lấy sản phẩm thuộc danh mục miền Bắc (id_danh_muc = 1)
        $sanPhamModel = new SanPhamModel($this->pdo);
        $mienBac = $sanPhamModel->laySanPhamTheoDanhMuc(1);

        // Truyền dữ liệu sang view
        $this->render('Dac-san-mien-bac', ['products' => $mienBac]);
    }
}
