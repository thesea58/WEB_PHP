<?php
// app/controllers/TaiKhoanController.php

class TaiKhoanController extends BaseController {

    public function index() {
        if (!isset($_SESSION['user'])) {
            header('Location: index.php?controller=DangNhap&action=index');
            exit();
        }
        
        $nguoiDungModel = new NguoiDungModel($this->pdo);
        $user = $nguoiDungModel->layNguoiDungTheoId($_SESSION['user']['ma_nguoi_dung']);
        
        $this->render('Tai-khoan', [
            'user' => $user
        ]);
    }

    public function dangnhap() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            $userModel = new NguoiDungModel($this->pdo);
            $user = $userModel->checkLogin($username, $password);

            if ($user) {
                $_SESSION['user'] = $user;
                header('Location: index.php?controller=TrangChu&action=index');
                exit();
            } else {
                $error = "Tên đăng nhập hoặc mật khẩu không đúng!";
                $this->render('Dang-nhap', ['error' => $error]);
            }
        } else {
            $this->render('Dang-nhap');
        }
    }
    
    public function dangky() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ten_dang_nhap = $_POST['username'] ?? '';
            $mat_khau = $_POST['password'] ?? '';
            $mat_khau_xac_nhan = $_POST['password_confirm'] ?? '';
            $email = $_POST['email'] ?? '';
            $dien_thoai = $_POST['phone'] ?? '';
            
            $userModel = new NguoiDungModel($this->pdo);
            
            // Kiểm tra validation
            $errors = [];
            
            if (empty($ten_dang_nhap) || strlen($ten_dang_nhap) < 3) {
                $errors[] = "Tên đăng nhập phải có ít nhất 3 ký tự!";
            }
            
            if (empty($mat_khau) || strlen($mat_khau) < 6) {
                $errors[] = "Mật khẩu phải có ít nhất 6 ký tự!";
            }
            
            if ($mat_khau !== $mat_khau_xac_nhan) {
                $errors[] = "Mật khẩu xác nhận không khớp!";
            }
            
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Email không hợp lệ!";
            }
            
            if ($userModel->kiemTraTenDangNhap($ten_dang_nhap)) {
                $errors[] = "Tên đăng nhập đã tồn tại!";
            }
            
            if ($userModel->kiemTraEmail($email)) {
                $errors[] = "Email đã được đăng ký!";
            }
            
            if (empty($errors)) {
                // Đăng ký thành công
                if ($userModel->dangKy($ten_dang_nhap, $mat_khau, $email, $dien_thoai)) {
                    $_SESSION['success'] = "Đăng ký thành công! Vui lòng đăng nhập.";
                    header('Location: index.php?controller=TaiKhoan&action=dangnhap');
                    exit();
                } else {
                    $errors[] = "Có lỗi khi đăng ký. Vui lòng thử lại!";
                    $this->render('Dang-ky', ['errors' => $errors]);
                }
            } else {
                $this->render('Dang-ky', ['errors' => $errors]);
            }
        } else {
            $this->render('Dang-ky');
        }
    }

    public function dangxuat() {
        unset($_SESSION['user']);
        header('Location: index.php?controller=TrangChu&action=index');
        exit();
    }
    
    public function capnhatthongtin() {
        if (!isset($_SESSION['user'])) {
            header('Location: index.php?controller=DangNhap&action=index');
            exit();
        }
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'] ?? '';
            $dien_thoai = $_POST['dien_thoai'] ?? '';
            
            $userModel = new NguoiDungModel($this->pdo);
            
            if ($userModel->capNhatThongTin($_SESSION['user']['ma_nguoi_dung'], $email, $dien_thoai)) {
                $_SESSION['user']['email'] = $email;
                $_SESSION['user']['dien_thoai'] = $dien_thoai;
                $success = "Cập nhật thông tin thành công!";
            } else {
                $success = "Có lỗi khi cập nhật. Vui lòng thử lại!";
            }
            
            $user = $userModel->layNguoiDungTheoId($_SESSION['user']['ma_nguoi_dung']);
            $this->render('Tai-khoan', [
                'user' => $user,
                'success' => $success
            ]);
        }
    }
    
    public function doiMatKhau() {
        if (!isset($_SESSION['user'])) {
            header('Location: index.php?controller=DangNhap&action=index');
            exit();
        }
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $mat_khau_cu = $_POST['old_password'] ?? '';
            $mat_khau_moi = $_POST['new_password'] ?? '';
            $mat_khau_xac_nhan = $_POST['confirm_password'] ?? '';
            
            $userModel = new NguoiDungModel($this->pdo);
            
            $errors = [];
            
            if (empty($mat_khau_cu)) {
                $errors[] = "Vui lòng nhập mật khẩu cũ!";
            }
            
            if (empty($mat_khau_moi) || strlen($mat_khau_moi) < 6) {
                $errors[] = "Mật khẩu mới phải có ít nhất 6 ký tự!";
            }
            
            if ($mat_khau_moi !== $mat_khau_xac_nhan) {
                $errors[] = "Mật khẩu xác nhận không khớp!";
            }
            
            if (empty($errors)) {
                if ($userModel->doiMatKhau($_SESSION['user']['ma_nguoi_dung'], $mat_khau_cu, $mat_khau_moi)) {
                    $success = "Đổi mật khẩu thành công!";
                } else {
                    $errors[] = "Mật khẩu cũ không chính xác!";
                }
            }
            
            $user = $userModel->layNguoiDungTheoId($_SESSION['user']['ma_nguoi_dung']);
            $this->render('Tai-khoan', [
                'user' => $user,
                'errors' => $errors ?? [],
                'success' => $success ?? ''
            ]);
        }
    }
}
