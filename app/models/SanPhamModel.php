<?php
// app/models/SanPhamModel.php

class SanPhamModel {
    private $db;

    public function __construct($pdo) {
        $this->db = $pdo;
    }

    // Lấy tất cả sản phẩm
    public function layTatCaSanPham() {
        $stmt = $this->db->prepare("SELECT * FROM sanpham ORDER BY ngay_tao DESC");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Lấy sản phẩm theo danh mục (ID)
    public function laySanPhamTheoDanhMuc($id_danh_muc) {
        $stmt = $this->db->prepare("SELECT * FROM sanpham WHERE id_danh_muc = ?");
        $stmt->execute([$id_danh_muc]);
        return $stmt->fetchAll();
    }

    // Lấy chi tiết một sản phẩm
    public function layChiTietSanPham($ma_sp) {
        $stmt = $this->db->prepare("SELECT s.*, d.ten_danh_muc, n.ten_ncc 
                                    FROM sanpham s
                                    JOIN danhmuc d ON s.id_danh_muc = d.id
                                    JOIN nhacungcap n ON s.ma_ncc = n.ma_ncc
                                    WHERE s.ma_sp = ?");
        $stmt->execute([$ma_sp]);
        return $stmt->fetch();
    }

    // Tìm kiếm sản phẩm
    public function timKiemSanPham($tu_khoa) {
        $stmt = $this->db->prepare("SELECT * FROM sanpham WHERE ten_sp LIKE ?");
        $stmt->execute(["%$tu_khoa%"]);
        return $stmt->fetchAll();
    }
}
