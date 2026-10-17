<?php

class TrangChu2Controller extends BaseController {
    public function index() {
        $sanPhamModel = new SanPhamModel($this->pdo);
        $bestSellers = $sanPhamModel->laySanPhamBanChay(4);
        $this->render('trang-chu', ['sanPhamBanChay' => $bestSellers]);
    }
}
