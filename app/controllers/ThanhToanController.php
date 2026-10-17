<?php

class ThanhToanController extends BaseController {
    
    public function index() {
        // Kiểm tra đăng nhập
        if (!isset($_SESSION['user'])) {
            header('Location: index.php?controller=TaiKhoan&action=dangnhap');
            exit();
        }
        
        // Lấy giỏ hàng từ session
        $gioHang = $_SESSION['cart'] ?? [];
        
        // Nếu giỏ hàng trống, chuyển về trang giỏ hàng
        if (empty($gioHang)) {
            header('Location: index.php?controller=GioHang&action=index');
            exit();
        }
        
        // Tính tổng tiền
        $tongTien = 0;
        foreach ($gioHang as $item) {
            $tongTien += $item['gia'] * $item['so_luong'];
        }
        
        $this->render('Thanh-toan', [
            'gioHang' => $gioHang,
            'tongTien' => $tongTien,
            'user' => $_SESSION['user']
        ]);
    }
    
    /**
     * Xử lý thanh toán
     */
    public function xulyThanhToan() {
        header('Content-Type: application/json; charset=utf-8');
        
        // Kiểm tra đăng nhập
        if (!isset($_SESSION['user'])) {
            http_response_code(401);
            echo json_encode(['success' => false, 'message' => 'Vui lòng đăng nhập']);
            exit();
        }
        
        // Lấy dữ liệu từ POST
        $ten_ng = isset($_POST['ten']) ? trim($_POST['ten']) : '';
        $sdt = isset($_POST['sdt']) ? trim($_POST['sdt']) : '';
        $dia_chi = isset($_POST['diachi']) ? trim($_POST['diachi']) : '';
        $phuong_thuc_tt = isset($_POST['thanhtoan']) ? trim($_POST['thanhtoan']) : 'cod';
        
        // Validate
        if (empty($ten_ng) || empty($sdt) || empty($dia_chi)) {
            http_response_code(400);
            echo json_encode(['success' => false, 'message' => 'Vui lòng điền đầy đủ thông tin']);
            exit();
        }
        
        // Kiểm tra SDT hợp lệ
        if (!preg_match('/^0\d{9}$/', $sdt)) {
            http_response_code(400);
            echo json_encode(['success' => false, 'message' => 'Số điện thoại không hợp lệ']);
            exit();
        }
        
        // Lấy giỏ hàng
        $gioHang = $_SESSION['cart'] ?? [];
        if (empty($gioHang)) {
            http_response_code(400);
            echo json_encode(['success' => false, 'message' => 'Giỏ hàng của bạn trống']);
            exit();
        }
        
        // Tính tổng tiền
        $tong_tien = 0;
        foreach ($gioHang as $item) {
            $tong_tien += $item['gia'] * $item['so_luong'];
        }
        
        // Lấy mã người dùng từ session (sử dụng key `ma_nguoi_dung` theo chuẩn project)
        $ma_nguoi_dung = $_SESSION['user']['ma_nguoi_dung'] ?? null;
        if (!$ma_nguoi_dung) {
            http_response_code(400);
            echo json_encode(['success' => false, 'message' => 'Người dùng không hợp lệ']);
            exit();
        }
        
        try {
            require_once 'app/models/HoaDonModel.php';
            $hoaDonModel = new HoaDonModel($this->pdo);
            
            // Tạo hóa đơn
            $ma_hd = $hoaDonModel->taoHoaDon(
                $ma_nguoi_dung,
                $tong_tien,
                'dang_xu_ly',
                $ten_ng,
                $sdt,
                $dia_chi,
                $phuong_thuc_tt
            );
            
            if (!$ma_hd) {
                throw new Exception('Không thể tạo đơn hàng');
            }
            
            // Thêm chi tiết từng sản phẩm
            foreach ($gioHang as $item) {
                $hoaDonModel->themChiTietHoaDon(
                    $ma_hd,
                    $item['ma_sp'],
                    $item['so_luong'],
                    $item['gia']
                );
            }
            
            // Xóa giỏ hàng sau khi đặt hàng
            unset($_SESSION['cart']);
            
            echo json_encode([
                'success' => true,
                'message' => 'Đặt hàng thành công! Mã hóa đơn: ' . $ma_hd,
                'ma_hd' => $ma_hd
            ]);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode([
                'success' => false,
                'message' => 'Lỗi: ' . $e->getMessage()
            ]);
        }
        exit();
    }
}
