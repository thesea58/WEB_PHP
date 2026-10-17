<?php
session_start();
// Chuyển hướng người dùng trực tiếp vào trang chủ
header("Location: app/views/client/trang-chu.php");
exit();
?>