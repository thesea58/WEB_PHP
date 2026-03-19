<?php
/**
 * SanPhamModel - Quản lý dữ liệu sản phẩm
 */
class SanPhamModel {
    protected $pdo;
    
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }
    
    /**
     * Lấy tất cả sản phẩm
     */
    public function layTatCaSanPham() {
        $sql = "SELECT sp.*, dm.ten_danh_muc, ncc.ten_ncc 
                FROM sanpham sp
                LEFT JOIN danhmuc dm ON sp.id_danh_muc = dm.id
                LEFT JOIN nhacungcap ncc ON sp.ma_ncc = ncc.ma_ncc
                ORDER BY sp.ma_sp DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    /**
     * Lấy sản phẩm theo danh mục (miền)
     */
    public function laySanPhamTheoMien($id_danh_muc) {
        $sql = "SELECT sp.*, dm.ten_danh_muc, ncc.ten_ncc 
                FROM sanpham sp
                LEFT JOIN danhmuc dm ON sp.id_danh_muc = dm.id
                LEFT JOIN nhacungcap ncc ON sp.ma_ncc = ncc.ma_ncc
                WHERE sp.id_danh_muc = :id_danh_muc
                ORDER BY sp.ma_sp DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_danh_muc', $id_danh_muc, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    /**
     * Lấy chi tiết sản phẩm theo ID
     */
    public function laySanPhamTheoId($ma_sp) {
        $sql = "SELECT sp.*, dm.ten_danh_muc, ncc.ten_ncc 
                FROM sanpham sp
                LEFT JOIN danhmuc dm ON sp.id_danh_muc = dm.id
                LEFT JOIN nhacungcap ncc ON sp.ma_ncc = ncc.ma_ncc
                WHERE sp.ma_sp = :ma_sp";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':ma_sp', $ma_sp, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    /**
     * Lấy sản phẩm bán chạy (có số lượng)
     */
    public function laySanPhamBanChay($limit = 8) {
        $sql = "SELECT sp.*, dm.ten_danh_muc, ncc.ten_ncc 
                FROM sanpham sp
                LEFT JOIN danhmuc dm ON sp.id_danh_muc = dm.id
                LEFT JOIN nhacungcap ncc ON sp.ma_ncc = ncc.ma_ncc
                WHERE sp.so_luong > 0
                ORDER BY sp.ma_sp DESC
                LIMIT :limit";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    /**
     * Tìm kiếm sản phẩm
     */
    public function timKiemSanPham($keyword) {
        $sql = "SELECT sp.*, dm.ten_danh_muc, ncc.ten_ncc 
                FROM sanpham sp
                LEFT JOIN danhmuc dm ON sp.id_danh_muc = dm.id
                LEFT JOIN nhacungcap ncc ON sp.ma_ncc = ncc.ma_ncc
                WHERE sp.ten_sp LIKE :keyword OR sp.mo_ta LIKE :keyword
                ORDER BY sp.ma_sp DESC";
        $stmt = $this->pdo->prepare($sql);
        $keyword = '%' . $keyword . '%';
        $stmt->bindParam(':keyword', $keyword);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
