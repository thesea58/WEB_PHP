<?php
class ProductModel {
    private $db;

    public function __construct($pdo) {
        
        $this->db = $pdo;
    }

    // Lấy tất cả sản phẩm từ bảng `sanpham`
    public function getAllProducts() {
        $stmt = $this->db->query("SELECT s.*, d.ten_danh_muc AS ten_danh_muc FROM sanpham s JOIN danhmuc d ON s.id_danh_muc = d.id ORDER BY s.ngay_tao DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>