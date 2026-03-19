<?php

class SanPhamBanChayController extends BaseController {
    public function index() {
        $sanPhamModel = new SanPhamModel($this->pdo);
        $products = $sanPhamModel->laySanPhamBanChay(8);
        $this->render('San-pham-ban-chay', ['products' => $products]);
    }
}
