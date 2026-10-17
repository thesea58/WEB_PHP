<?php

class ThongKeDonHangController extends BaseController {
    public function index() {
        // Kiểm tra admin access
        if (!isset($_SESSION['user']) || $_SESSION['user']['vai_tro'] !== 'admin') {
            header('Location: index.php?controller=TaiKhoan&action=dangnhap');
            exit();
        }
        
        // Load model
        require_once 'app/models/HoaDonModel.php';
        $hoaDonModel = new HoaDonModel($this->pdo);
        
        // Get filter parameters
        $trang_thai = isset($_GET['trang_thai']) ? trim($_GET['trang_thai']) : '';
        $thang = isset($_GET['thang']) ? trim($_GET['thang']) : '';
        $quy = isset($_GET['quy']) ? trim($_GET['quy']) : '';
        $nam = isset($_GET['nam']) ? trim($_GET['nam']) : '';
        
        // Get filtered invoices
        $hoaDons = $hoaDonModel->layHoaDonTheoFilter($trang_thai, $thang, $quy, $nam);
        
        // Load chi tiết cho mỗi invoice
        foreach ($hoaDons as &$hd) {
            $hd['chiTiets'] = $hoaDonModel->layChiTietHoaDon($hd['ma_hd']);
        }
        
        // Get statistics
        $thongKe = $hoaDonModel->tinhTongDoanhThuTheoFilter($trang_thai, $thang, $quy, $nam);
        $thongKeTheoTrangThai = $hoaDonModel->layThongKeTheoTrangThai();
        
        // Get all years for filter
        $sql = "SELECT DISTINCT YEAR(ngay_dat) as nam FROM hoadon ORDER BY nam DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $namList = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        // Render view
        $this->render('Thong-ke-don-hang', [
            'hoaDons' => $hoaDons,
            'thongKe' => $thongKe,
            'thongKeTheoTrangThai' => $thongKeTheoTrangThai,
            'namList' => $namList,
            'trang_thai' => $trang_thai,
            'thang' => $thang,
            'quy' => $quy,
            'nam' => $nam
        ]);
    }
}
