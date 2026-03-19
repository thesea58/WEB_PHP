<?php
/**
 * NguoiDungModel - Quản lý người dùng, đăng nhập, đăng ký
 */
class NguoiDungModel {
    protected $pdo;
    
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }
    
    /**
     * Kiểm tra đăng nhập
     */
    public function checkLogin($ten_dang_nhap, $mat_khau) {
        $sql = "SELECT * FROM nguoidung WHERE ten_dang_nhap = :ten_dang_nhap AND mat_khau = :mat_khau";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':ten_dang_nhap', $ten_dang_nhap);
        $stmt->bindParam(':mat_khau', $mat_khau);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    /**
     * Lấy người dùng theo ID
     */
    public function layNguoiDungTheoId($ma_nguoi_dung) {
        $sql = "SELECT * FROM nguoidung WHERE ma_nguoi_dung = :ma_nguoi_dung";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':ma_nguoi_dung', $ma_nguoi_dung, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    /**
     * Kiểm tra tên đăng nhập đã tồn tại
     */
    public function kiemTraTenDangNhap($ten_dang_nhap) {
        $sql = "SELECT * FROM nguoidung WHERE ten_dang_nhap = :ten_dang_nhap";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':ten_dang_nhap', $ten_dang_nhap);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC) ? true : false;
    }
    
    /**
     * Kiểm tra email đã tồn tại
     */
    public function kiemTraEmail($email) {
        $sql = "SELECT * FROM nguoidung WHERE email = :email";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC) ? true : false;
    }
    
    /**
     * Đăng ký người dùng mới
     */
    public function dangKy($ten_dang_nhap, $mat_khau, $email, $dien_thoai) {
        $sql = "INSERT INTO nguoidung (ten_dang_nhap, mat_khau, email, dien_thoai, vai_tro, ngay_tao) 
                VALUES (:ten_dang_nhap, :mat_khau, :email, :dien_thoai, 'khach', NOW())";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':ten_dang_nhap', $ten_dang_nhap);
        $stmt->bindParam(':mat_khau', $mat_khau);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':dien_thoai', $dien_thoai);
        
        try {
            return $stmt->execute();
        } catch (PDOException $e) {
            return false;
        }
    }
    
    /**
     * Cập nhật thông tin người dùng
     */
    public function capNhatThongTin($ma_nguoi_dung, $email, $dien_thoai) {
        $sql = "UPDATE nguoidung SET email = :email, dien_thoai = :dien_thoai 
                WHERE ma_nguoi_dung = :ma_nguoi_dung";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':ma_nguoi_dung', $ma_nguoi_dung, PDO::PARAM_INT);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':dien_thoai', $dien_thoai);
        return $stmt->execute();
    }
    
    /**
     * Đổi mật khẩu
     */
    public function doiMatKhau($ma_nguoi_dung, $mat_khau_cu, $mat_khau_moi) {
        // Kiểm tra mật khẩu cũ
        $user = $this->layNguoiDungTheoId($ma_nguoi_dung);
        if (!$user || $user['mat_khau'] !== $mat_khau_cu) {
            return false;
        }
        
        $sql = "UPDATE nguoidung SET mat_khau = :mat_khau WHERE ma_nguoi_dung = :ma_nguoi_dung";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':mat_khau', $mat_khau_moi);
        $stmt->bindParam(':ma_nguoi_dung', $ma_nguoi_dung, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
?>
