<?php

class DacSanMienNamController extends BaseController {
    public function index() {
        $sanPhamModel = new SanPhamModel($this->pdo);
        $mienNam = $sanPhamModel->laySanPhamTheoDanhMuc(3);
        $this->render('Dac-san-mien-nam', ['products' => $mienNam]);
    }
}
