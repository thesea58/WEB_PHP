# Dự án Website Bán Nông Sản Sạch (PHP MVC)

Dự án này được thiết kế để chạy trên môi trường **XAMPP** hoặc **Laragon** trên Windows.

## 1. Cấu trúc thư mục
- Đặt thư mục `nongsan_shop` vào trong:
  - XAMPP: `C:\xampp\htdocs\nongsan_shop`
  - Laragon: `C:\laragon\www\nongsan_shop`

## 2. Cài đặt Cơ sở dữ liệu
1. Mở trình duyệt và truy cập: `http://localhost/phpmyadmin`
2. Tạo một database mới tên là: `nongsan_db`
3. Chọn database vừa tạo, click vào tab **Import** (Nhập).
4. Chọn file `database.sql` trong thư mục dự án và nhấn **Go** (Thực hiện).

## 3. Cấu hình kết nối
Mở file `config/db.php` và kiểm tra thông tin kết nối:
```php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', ''); // Mật khẩu mặc định của XAMPP/Laragon thường để trống
define('DB_NAME', 'nongsan_db');
```

## 4. Chạy ứng dụng
Mở trình duyệt và truy cập:
- `http://localhost/nongsan_shop/`

## 5. Tài khoản Admin
- Trang quản trị (Tương lai): `http://localhost/nongsan_shop/admin`
- Tài khoản: `admin`
- Mật khẩu: `123456`

## Các chức năng chính
- Xem danh sách và chi tiết sản phẩm nông sản.
- Thêm sản phẩm vào giỏ hàng.
- Tìm kiếm sản phẩm.
- Giao diện thân thiện, chuẩn SEO.
- Sử dụng PHP PDO để bảo mật chống SQL Injection.
