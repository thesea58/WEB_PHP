<?php
/**
 * NhaCungCapModel - Quản lý nhà cung cấp
 */
class NhaCungCapModel {
    protected $pdo;
    
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }
    
    /**
     * Lấy tất cả nhà cung cấp
     */
    public function layTatCaNhaCungCap() {
        $sql = "SELECT * FROM nhacungcap ORDER BY ma_ncc ASC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    /**
     * Lấy nhà cung cấp theo ID
     */
    public function layNhaCungCapTheoId($ma_ncc) {
        $sql = "SELECT * FROM nhacungcap WHERE ma_ncc = :ma_ncc";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':ma_ncc', $ma_ncc, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
