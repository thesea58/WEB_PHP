<?php
// app/controllers/TaiKhoanController.php

class TaiKhoanController extends BaseController {

    public function dangnhap() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            $userModel = new NguoiDungModel($this->pdo);
            $user = $userModel->checkLogin($username, $password);

            if ($user) {
                $_SESSION['user'] = $user;
                header('Location: index.php');
                exit();
            } else {
                $error = "Tên đăng nhập hoặc mật khẩu không đúng!";
                $this->render('Dang-nhap', ['error' => $error]);
            }
        } else {
            $this->render('Dang-nhap');
        }
    }

    public function dangxuat() {
        unset($_SESSION['user']);
        header('Location: index.php');
        exit();
    }

    public function index() {
        // Logic to fetch user data if needed
        $this->render('Tai-khoan');
    }
}
