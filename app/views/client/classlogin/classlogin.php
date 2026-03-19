<?php
class login
{
    private function connect()
    {
        $con = mysqli_connect("localhost", "root", "", "dacsan3mien");
        if (!$con) {
            die("Không thể kết nối cơ sở dữ liệu");
        }
        mysqli_set_charset($con, "utf8");
        return $con;
    }

    public function mylogin($user, $pass)
    {
        $link = $this->connect();
        // Truy vấn theo đúng tên cột trong file SQL của bạn
        $sql = "SELECT * FROM nguoidung WHERE ten_dang_nhap='$user' AND mat_khau='$pass' LIMIT 1";
        $result = mysqli_query($link, $sql);
        
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            if (session_status() === PHP_SESSION_NONE) session_start();
            
            $_SESSION['user'] = $row['ten_dang_nhap'];
            $_SESSION['vai_tro'] = $row['vai_tro']; // Lưu giá trị 'admin' hoặc 'khach'

            // Kiểm tra giá trị chuỗi 'admin'
            if ($row['vai_tro'] == 'admin') {
                header('location: Admin.php');
            } else {
                header('location: Trang-chu-2.php');
            }
            exit(); 
        } else {
            return 0;
        }
        mysqli_close($link);
    }
}
?>