<?php
ob_start(); // 👈 thêm dòng này
include("classlogin/classlogin.php");

if (isset($_POST['username']) && isset($_POST['password'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $login = new login();
    $kq = $login->mylogin($user, $pass);

    if ($kq == 0) {
        echo "<script>alert('Sai tài khoản hoặc mật khẩu'); window.location='Dang-nhap.php';</script>";
    }
}
ob_end_flush(); // 👈 thêm dòng này
?>