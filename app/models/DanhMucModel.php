<?php
/**
 * DanhMucModel - Quản lý danh mục sản phẩm
 */
class DanhMucModel {
    protected $pdo;
    
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }
    
    /**
     * Lấy tất cả danh mục
     */
    public function layTatCaDanhMuc() {
        $sql = "SELECT * FROM danhmuc ORDER BY id ASC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    /**
     * Lấy danh mục theo ID
     */
    public function layDanhMucTheoId($id) {
        $sql = "SELECT * FROM danhmuc WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
