<?php
/**
 * HoaDonModel - Quản lý hóa đơn và chi tiết hóa đơn
 */
class HoaDonModel {
    protected $pdo;
    
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }
    
    /**
     * Lấy tất cả hóa đơn
     */
    public function layTatCaHoaDon() {
        $sql = "SELECT * FROM hoadon ORDER BY ma_hd DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    /**
     * Lấy hóa đơn của người dùng
     */
    public function layHoaDonCuaNguoiDung($ma_nguoi_dung) {
        $sql = "SELECT * FROM hoadon WHERE ma_nguoi_dung = :ma_nguoi_dung ORDER BY ma_hd DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':ma_nguoi_dung', $ma_nguoi_dung, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    /**
     * Lấy chi tiết hóa đơn
     */
    public function layChiTietHoaDon($ma_hd) {
        $sql = "SELECT ct.*, sp.ten_sp, sp.path_img 
                FROM chitiet_hoadon ct
                LEFT JOIN sanpham sp ON ct.ma_sp = sp.ma_sp
                WHERE ct.ma_hd = :ma_hd";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':ma_hd', $ma_hd, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    /**
     * Tạo hóa đơn mới
     */
    public function taoHoaDon($ma_nguoi_dung, $ten_khach_hang, $dien_thoai, $dia_chi, $tong_tien) {
        $sql = "INSERT INTO hoadon (ma_nguoi_dung, ten_khach_hang, dien_thoai, dia_chi, tong_tien, ngay_dat) 
                VALUES (:ma_nguoi_dung, :ten_khach_hang, :dien_thoai, :dia_chi, :tong_tien, NOW())";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':ma_nguoi_dung', $ma_nguoi_dung, PDO::PARAM_INT);
        $stmt->bindParam(':ten_khach_hang', $ten_khach_hang);
        $stmt->bindParam(':dien_thoai', $dien_thoai);
        $stmt->bindParam(':dia_chi', $dia_chi);
        $stmt->bindParam(':tong_tien', $tong_tien);
        
        if ($stmt->execute()) {
            return $this->pdo->lastInsertId();
        }
        return false;
    }
    
    /**
     * Thêm chi tiết hóa đơn
     */
    public function themChiTietHoaDon($ma_hd, $ma_sp, $so_luong, $gia) {
        $sql = "INSERT INTO chitiet_hoadon (ma_hd, ma_sp, so_luong, gia) 
                VALUES (:ma_hd, :ma_sp, :so_luong, :gia)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':ma_hd', $ma_hd, PDO::PARAM_INT);
        $stmt->bindParam(':ma_sp', $ma_sp, PDO::PARAM_INT);
        $stmt->bindParam(':so_luong', $so_luong, PDO::PARAM_INT);
        $stmt->bindParam(':gia', $gia);
        return $stmt->execute();
    }
    
    /**
     * Cập nhật trạng thái hóa đơn
     */
    public function capNhatTrangThai($ma_hd, $trang_thai) {
        $sql = "UPDATE hoadon SET trang_thai = :trang_thai WHERE ma_hd = :ma_hd";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':trang_thai', $trang_thai);
        $stmt->bindParam(':ma_hd', $ma_hd, PDO::PARAM_INT);
        return $stmt->execute();
    }
    
    /**
     * Lấy chi tiết hóa đơn theo ID
     */
    public function layHoaDonTheoId($ma_hd) {
        $sql = "SELECT * FROM hoadon WHERE ma_hd = :ma_hd";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':ma_hd', $ma_hd, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    /**
     * Lấy hóa đơn theo bộ lọc (trạng thái, tháng, quý, năm)
     */
    public function layHoaDonTheoFilter($trang_thai = '', $thang = '', $quy = '', $nam = '') {
        $sql = "SELECT * FROM hoadon WHERE 1=1";
        $params = [];
        
        // Filter by status
        if (!empty($trang_thai)) {
            $sql .= " AND trang_thai = :trang_thai";
            $params[':trang_thai'] = $trang_thai;
        }
        
        // Filter by year
        if (!empty($nam)) {
            $sql .= " AND YEAR(ngay_dat) = :nam";
            $params[':nam'] = (int)$nam;
        }
        
        // Filter by quarter
        if (!empty($quy)) {
            $quy = (int)$quy;
            $month_start = ($quy - 1) * 3 + 1;
            $month_end = $quy * 3;
            
            if (!empty($nam)) {
                $sql .= " AND MONTH(ngay_dat) BETWEEN :month_start AND :month_end";
            } else {
                $sql .= " AND MONTH(ngay_dat) BETWEEN :month_start AND :month_end";
            }
            $params[':month_start'] = $month_start;
            $params[':month_end'] = $month_end;
        }
        
        // Filter by month
        if (!empty($thang) && empty($quy)) {
            $sql .= " AND MONTH(ngay_dat) = :thang";
            $params[':thang'] = (int)$thang;
            
            if (!empty($nam)) {
                // Already filtered by year above
            }
        }
        
        $sql .= " ORDER BY ngay_dat DESC";
        
        $stmt = $this->pdo->prepare($sql);
        foreach ($params as $key => $value) {
            $stmt->bindValue($key, $value);
        }
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    /**
     * Lấy thống kê theo trạng thái
     */
    public function layThongKeTheoTrangThai() {
        $sql = "SELECT trang_thai, COUNT(*) as so_luong 
                FROM hoadon 
                GROUP BY trang_thai 
                ORDER BY trang_thai";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    /**
     * Tính tổng doanh thu theo bộ lọc
     */
    public function tinhTongDoanhThuTheoFilter($trang_thai = '', $thang = '', $quy = '', $nam = '') {
        $sql = "SELECT SUM(tong_tien) as tong_doanh_thu, COUNT(*) as tong_don 
                FROM hoadon WHERE 1=1";
        $params = [];
        
        // Filter by status
        if (!empty($trang_thai)) {
            $sql .= " AND trang_thai = :trang_thai";
            $params[':trang_thai'] = $trang_thai;
        }
        
        // Filter by year
        if (!empty($nam)) {
            $sql .= " AND YEAR(ngay_dat) = :nam";
            $params[':nam'] = (int)$nam;
        }
        
        // Filter by quarter
        if (!empty($quy)) {
            $quy = (int)$quy;
            $month_start = ($quy - 1) * 3 + 1;
            $month_end = $quy * 3;
            $sql .= " AND MONTH(ngay_dat) BETWEEN :month_start AND :month_end";
            $params[':month_start'] = $month_start;
            $params[':month_end'] = $month_end;
        }
        
        // Filter by month
        if (!empty($thang) && empty($quy)) {
            $sql .= " AND MONTH(ngay_dat) = :thang";
            $params[':thang'] = (int)$thang;
        }
        
        $stmt = $this->pdo->prepare($sql);
        foreach ($params as $key => $value) {
            $stmt->bindValue($key, $value);
        }
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>