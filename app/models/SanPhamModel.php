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
                WHERE sp.so_luong IS NOT NULL
                ORDER BY sp.so_luong ASC
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
    
    /**
     * Thêm sản phẩm mới
     * Các trường không bắt buộc sẽ nhận giá trị mặc định hợp lệ
     */
    public function themSanPham($ten_sp, $gia, $mo_ta = '', $path_img = null, $id_danh_muc = 1, $ma_ncc = 1, $so_luong = 0) {
        // Đảm bảo path ảnh không null (cột path_img NOT NULL theo schema)
        if (empty($path_img)) {
            $path_img = 'img/default.png';
        }

        $sql = "INSERT INTO sanpham (ten_sp, gia, mo_ta, id_danh_muc, ma_ncc, so_luong, ngay_tao, path_img) 
                VALUES (:ten_sp, :gia, :mo_ta, :id_danh_muc, :ma_ncc, :so_luong, NOW(), :path_img)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':ten_sp', $ten_sp);
        $stmt->bindParam(':gia', $gia);
        $stmt->bindParam(':mo_ta', $mo_ta);
        $stmt->bindParam(':id_danh_muc', $id_danh_muc, PDO::PARAM_INT);
        $stmt->bindParam(':ma_ncc', $ma_ncc, PDO::PARAM_INT);
        $stmt->bindParam(':so_luong', $so_luong, PDO::PARAM_INT);
        $stmt->bindParam(':path_img', $path_img);

        if ($stmt->execute()) {
            return $this->pdo->lastInsertId();
        }
        return false;
    }
    
    /**
     * Lấy ID danh mục theo tên (miền)
     */
    public function layIDDanhMuc($ten_danh_muc) {
        $sql = "SELECT id FROM danhmuc WHERE ten_danh_muc = :ten_danh_muc LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':ten_danh_muc', $ten_danh_muc);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ? $result['id'] : null;
    }
    
    /**
     * Cập nhật sản phẩm
     * Chỉ cập nhật các trường được truyền (không truyền = giữ nguyên)
     */
    public function capNhatSanPham($ma_sp, $ten_sp = null, $gia = null, $mo_ta = null, $path_img = null, $id_danh_muc = null, $ma_ncc = null, $so_luong = null) {
        $fields = [];
        $params = [':ma_sp' => $ma_sp];

        if ($ten_sp !== null) { $fields[] = 'ten_sp = :ten_sp'; $params[':ten_sp'] = $ten_sp; }
        if ($gia !== null) { $fields[] = 'gia = :gia'; $params[':gia'] = $gia; }
        if ($mo_ta !== null) { $fields[] = 'mo_ta = :mo_ta'; $params[':mo_ta'] = $mo_ta; }
        if ($path_img !== null) { $fields[] = 'path_img = :path_img'; $params[':path_img'] = $path_img; }
        if ($id_danh_muc !== null) { $fields[] = 'id_danh_muc = :id_danh_muc'; $params[':id_danh_muc'] = (int)$id_danh_muc; }
        if ($ma_ncc !== null) { $fields[] = 'ma_ncc = :ma_ncc'; $params[':ma_ncc'] = (int)$ma_ncc; }
        if ($so_luong !== null) { $fields[] = 'so_luong = :so_luong'; $params[':so_luong'] = (int)$so_luong; }

        if (empty($fields)) {
            // Không có trường nào để cập nhật
            return false;
        }

        $sql = 'UPDATE sanpham SET ' . implode(', ', $fields) . ' WHERE ma_sp = :ma_sp';
        $stmt = $this->pdo->prepare($sql);

        foreach ($params as $key => $val) {
            if (is_int($val)) {
                $stmt->bindValue($key, $val, PDO::PARAM_INT);
            } else {
                $stmt->bindValue($key, $val);
            }
        }

        return $stmt->execute();
    }
    
    /**
     * Xóa sản phẩm
     */
    public function xoaSanPham($ma_sp) {
        $sql = "DELETE FROM sanpham WHERE ma_sp = :ma_sp";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':ma_sp', $ma_sp, PDO::PARAM_INT);
        
        return $stmt->execute();
    }
}
