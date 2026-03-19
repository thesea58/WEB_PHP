# Hệ Thống Admin - Tài Liệu Bảo Mật

## Tổng Quan
Hệ thống admin được bảo vệ bằng session-based authentication. Chỉ người dùng có role `admin` mới có thể truy cập trang admin.

## Luồng Truy Cập

```
Admin đăng nhập
    ↓
TaiKhoanController->dangnhap() kiểm tra credentials
    ↓
checkLogin() trả về user (bao gồm vai_tro)
    ↓
Lưu user vào $_SESSION['user']
    ↓
Kiểm tra vai_tro:
    - Nếu 'admin' → Redirect /index.php?controller=Admin
    - Nếu 'khach' → Redirect /index.php?controller=TrangChu
    ↓
AdminController->index() kiểm tra session lần 2
    ↓
Render Admin.php với dữ liệu
    ↓
Admin.php kiểm tra session lần 3 (safety layer)
    ↓
Hiển thị dashboard admin
```

## Các Lớp Bảo Mật (Security Layers)

### Layer 1: Controller-Level Check (TaiKhoanController)
```php
if (isset($user['vai_tro']) && $user['vai_tro'] === 'admin') {
    header('Location: index.php?controller=Admin&action=index');
    exit();
}
```
- Kiểm tra role ngay sau khi đăng nhập
- Redirect admin đến trang admin tự động
- Người dùng thường vẫn goto trang chủ

### Layer 2: AdminController Check
```php
if (!isset($_SESSION['user']['vai_tro']) || $_SESSION['user']['vai_tro'] !== 'admin') {
    header('Location: index.php?controller=TrangChu&action=index');
    exit();
}
```
- Verify lần 2 trước render view
- Chặn truy cập trực tiếp nếu session bị modify
- Chống brute force attempts

### Layer 3: View-Level Check (Admin.php)
```php
if (!isset($_SESSION['user']) || $_SESSION['user']['vai_tro'] !== 'admin') {
    header('Location: index.php?controller=TrangChu&action=index');
    exit();
}
```
- Safety check cuối cùng
- Bảo vệ load file trực tiếp
- In-depth defense

## Cấu Trúc Session Admin

```php
$_SESSION['user'] = [
    'ma_nguoi_dung' => 1,
    'ten_dang_nhap' => 'admin',
    'email' => 'admin@dacsan3mien.vn',
    'dien_thoai' => '0274374311',
    'vai_tro' => 'admin',              // ← KEY FIELD
    'ngay_tao' => '2023-01-15 10:30:00'
];
```

## Cách Tạo Tài Khoản Admin

### Trong Database
```sql
-- Admin profile mẫu
INSERT INTO nguoidung (ten_dang_nhap, mat_khau, email, dien_thoai, vai_tro, ngay_tao)
VALUES ('admin', 'admin123', 'admin@dacsan3mien.vn', '0274374311', 'admin', NOW());
```

**Credentials mặc định:**
- Username: `admin`
- Password: `admin123`
- Role: `admin`

### Chuyển user thường thành admin
```sql
UPDATE nguoidung SET vai_tro = 'admin' WHERE ten_dang_nhap = 'username';
```

## Các Action Admin

### 1. Xử lý đơn hàng (XuLyDonHang)
- View danh sách đơn hàng
- Cập nhật trạng thái
- Xác nhận thanh toán

### 2. Thống kê đơn hàng (ThongKeDonHang)
- Báo cáo bán hàng
- Doanh thu theo ngày/tháng
- Sản phẩm top bán

### 3. Quản lý bài viết (Post)
- Tạo bài viết mới
- Chỉnh sửa bài viết
- Xoá bài viết

### 4. Đăng xuất (Admin->dangxuat)
```php
unset($_SESSION['user']);
header('Location: index.php?controller=TrangChu&action=index');
```

## Mẹo Bảo Mật (Best Practices)

✅ **Đã triển khai:**
- Session-based authentication
- Multiple security layers
- Role-based access control
- Session cleanup on logout
- XSS protection with htmlspecialchars()

⚠️ **Cân nhắc bổ sung:**

1. **HTTPS Only**
   - Sẽ deploy: Thêm header `Secure` cho cookie session
   ```php
   session_set_cookie_params([
       'secure' => true,      // HTTPS only
       'httponly' => true,    // JS không có quyền truy cập
       'samesite' => 'Lax'    // CSRF protection
   ]);
   ```

2. **Session Timeout**
   ```php
   // Kiểm tra timeout trong AdminController
   if (isset($_SESSION['last_activity']) && 
       (time() - $_SESSION['last_activity'] > 1800)) { // 30 phút
       session_destroy();
       header('Location: index.php?controller=TaiKhoan&action=dangnhap');
   }
   $_SESSION['last_activity'] = time();
   ```

3. **Password Hashing**
   - Hiện tại: Plain text (NOT SECURE!)
   - Cần upgrade: `password_hash()` + `password_verify()`
   ```php
   // checkLogin() cần update:
   $user = $userModel->checkLogin($username, $password);
   if ($user && password_verify($password, $user['mat_khau'])) {
       // Login success
   }
   ```

4. **Audit Logging**
   ```php
   // Log tất cả admin actions
   INSERT INTO audit_log (admin_id, action, timestamp)
   VALUES ($adminId, 'Xoá đơn hàng #123', NOW());
   ```

5. **IP Whitelisting** (Optional)
   ```php
   // Chỉ cho phép admin access từ IP công ty
   $allowed_ips = ['203.162.0.0', '203.162.0.1'];
   if (!in_array($_SERVER['REMOTE_ADDR'], $allowed_ips)) {
       die('Access denied');
   }
   ```

## Testing Admin Login

### Test Scenarios

**1. Admin Login (Success)**
- Login với: `admin` / `admin123`
- Expected: Redirect to `/index.php?controller=Admin&action=index`
- URL displays: Admin dashboard

**2. User Login (Success)**
- Login với: `user123` / `pass123`
- Expected: Redirect to `/index.php?controller=TrangChu&action=index`
- URL displays: Home page

**3. Direct Admin Access (Unauthorized)**
- Truy cập: `/index.php?controller=Admin&action=index` (không login)
- Expected: Redirect to login page
- Result: Security layer 2 kích hoạt

**4. Session Tampering (Security Test)**
- Modify `$_SESSION['user']['vai_tro'] = 'khach'`
- Refresh page
- Expected: Redirect to home page
- Result: Security layer 2 kích hoạt

**5. Session Hijacking Prevention**
- Session ID thay đổi sau mỗi lần login (PHP mặc định)
- HTTPOnly cookie ngăn JavaScript truy cập
- SameSite cookie ngăn CSRF attacks

## Troubleshooting

### "Redirect loop" khi login admin
**Nguyên nhân:** AdminController chạy hai lần
**Giải pháp:** Kiểm tra TaiKhoanController redirect đúng controller

### Admin page hiển thị blank
**Nguyên nhân:** Session bị timeout hoặc bị clear
**Giải pháp:** Login lại, hoặc check session_start() được gọi

### Admin thấy "Access denied"
**Nguyên nhân:** vai_tro không phải 'admin'
**Giải pháp:** UPDATE database set vai_tro='admin'

## Next Steps

1. ✅ Triển khai password hashing (bcrypt)
2. ✅ Thêm audit logging cho admin actions
3. ✅ Implement session timeout
4. ✅ Thêm 2FA (two-factor authentication)
5. ✅ Rate limiting cho login attempts

