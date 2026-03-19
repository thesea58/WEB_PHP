<?php

class DacSanMienTrungController extends BaseController {
    public function index() {
        $sanPhamModel = new SanPhamModel($this->pdo);
        $mienTrung = $sanPhamModel->laySanPhamTheoDanhMuc(2);
        $this->render('Dac-san-mien-trung', ['products' => $mienTrung]);
    }
}
