<?php

class XuLyDonHangController extends BaseController {
    
    public function index() {
        // Kiểm tra xem user đã đăng nhập và là admin không
        if (!isset($_SESSION['user']) || $_SESSION['user']['vai_tro'] !== 'admin') {
            header('Location: index.php?controller=TaiKhoan&action=dangnhap');
            exit();
        }
        
        // Load invoices từ database
        require_once 'app/models/HoaDonModel.php';
        $hoaDonModel = new HoaDonModel($this->pdo);
        $hoaDons = $hoaDonModel->layTatCaHoaDon();
        
        // Load details cho mỗi invoice
        foreach ($hoaDons as &$hd) {
            $hd['chiTiets'] = $hoaDonModel->layChiTietHoaDon($hd['ma_hd']);
        }
        
        // Render view với data
        $this->render('Xu-ly-don-hang', [
            'hoaDons' => $hoaDons
        ]);
    }
    
    /**
     * Cập nhật trạng thái hóa đơn (AJAX endpoint)
     */
    public function capNhatTrangThai() {
        // Kiểm tra admin
        if (!isset($_SESSION['user']) || $_SESSION['user']['vai_tro'] !== 'admin') {
            http_response_code(401);
            echo json_encode(['success' => false, 'message' => 'Unauthorized']);
            exit();
        }
        
        // Lấy dữ liệu từ POST
        $ma_hd = isset($_POST['ma_hd']) ? intval($_POST['ma_hd']) : 0;
        $trang_thai = isset($_POST['trang_thai']) ? trim($_POST['trang_thai']) : '';
        
        if (!$ma_hd || !$trang_thai) {
            http_response_code(400);
            echo json_encode(['success' => false, 'message' => 'Invalid request']);
            exit();
        }
        
        // Update status
        require_once 'app/models/HoaDonModel.php';
        $hoaDonModel = new HoaDonModel($this->pdo);
        
        if ($hoaDonModel->capNhatTrangThai($ma_hd, $trang_thai)) {
            echo json_encode(['success' => true, 'message' => 'Cập nhật thành công']);
        } else {
            http_response_code(500);
            echo json_encode(['success' => false, 'message' => 'Cập nhật thất bại']);
        }
        exit();
    }
}
