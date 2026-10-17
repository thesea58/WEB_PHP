# Kiểm Tra Admin Panel - Quick Test Guide

## 📋 Các Bước Kiểm Tra

### Step 1: Tạo Admin Account (nếu chưa có)

Chạy query này trong phpMyAdmin:

```sql
-- Kiểm tra admin đã tồn tại chưa
SELECT * FROM nguoidung WHERE vai_tro = 'admin';

-- Nếu không có, tạo admin mới
INSERT INTO nguoidung (ten_dang_nhap, mat_khau, email, dien_thoai, vai_tro, ngay_tao)
VALUES ('admin', 'admin123', 'admin@dacsan3mien.vn', '0274374311', 'admin', NOW());

-- Hoặc update user hiện tại thành admin
UPDATE nguoidung SET vai_tro = 'admin' WHERE ten_dang_nhap = 'user_test';
```

**Admin mặc định:**
- Username: `admin`
- Password: `admin123`

---

### Step 2: Test Login → Admin Redirect ✅

1. Truy cập: `http://localhost/WEB_PHP/index.php?controller=TaiKhoan&action=dangnhap`
2. Login với:
   - Username: `admin`
   - Password: `admin123`
3. **Expected Result:**
   - Trang tự động redirect → `http://localhost/WEB_PHP/index.php?controller=Admin&action=index`
   - Hiển thị "ADMIN DASHBOARD"
   - Thấy username, email, role của admin

**Nếu fail:** Kiểm tra TaiKhoanController->dangnhap() có redirect không

---

### Step 3: Test User Login → Home Redirect ✅

1. Tạo user test nếu chưa có:
```sql
INSERT INTO nguoidung (ten_dang_nhap, mat_khau, email, dien_thoai, vai_tro, ngay_tao)
VALUES ('user_test', 'pass123', 'user@test.com', '0902123456', 'khach', NOW());
```

2. Login với:
   - Username: `user_test`
   - Password: `pass123`
3. **Expected Result:**
   - Trang redirect → Home page (Trang-chu.php)
   - Navbar hiển thị dropdown với username

**Nếu fail:** Kiểm tra vai_tro database đúng là 'khach'

---

### Step 4: Test Unauthorized Admin Access ✅

1. **Logout** (click "Đăng xuất")
2. Truy cập trực tiếp: `http://localhost/WEB_PHP/index.php?controller=Admin&action=index`
3. **Expected Result:**
   - Trang tự động redirect → Login page
   - Authorization failed message (nếu có)

**Nếu fail:** Kiểm tra AdminController->index() có verify session không

---

### Step 5: Test Session Expiry ✅

1. Login as admin
2. Mở browser DevTools (F12) → Application → Cookies
3. Xoá PHPSESSID cookie
4. Refresh trang
5. **Expected Result:**
   - Trang redirect → Login page
   - Session bị clear

**Nếu fail:** Session không được verify đúng

---

### Step 6: Test Admin Logout ✅

1. Login as admin
2. Click dropdown (username ở sidebar)
3. Click "Đăng xuất"
4. **Expected Result:**
   - Session bị clear
   - Redirect → Home page
   - Navbar hiển thị "Đăng ký" + "Đăng nhập" (không phải dropdown)

**Nếu fail:** Kiểm tra AdminController->dangxuat() method

---

## 🐛 Common Issues & Fixes

### ❌ "Blank Page" khi vào Admin
**Nguyên nhân:** PHP error hoặc session không tồn tại
**Fix:** 
1. Kiểm tra error log: `C:\xampp\apache\logs\error.log`
2. Logout + Login lại
3. Clear browser cache (Ctrl+Shift+Del)

### ❌ "Login thành công nhưng vẫn ở trang login"
**Nguyên nhân:** Header redirect không hoạt động
**Fix:**
```php
// Kiểm tra TaiKhoanController line 45-50:
header('Location: index.php?controller=Admin&action=index');
exit();  // ← PHẢI có exit()
```

### ❌ "Access denied" khi login admin
**Nguyên nhân:** vai_tro database không phải 'admin'
**Fix:**
```sql
SELECT ten_dang_nhap, vai_tro FROM nguoidung WHERE ten_dang_nhap='admin';
-- Check kỳ vọng: vai_tro = 'admin'

UPDATE nguoidung SET vai_tro='admin' WHERE ten_dang_nhap='admin';
```

### ❌ "Admin redirect to home page" (Admin không vào được)
**Nguyên nhân:** vai_tro chứa space hoặc case khác nhau
**Fix:**
```php
// Check AdminController line 20:
var_dump($_SESSION['user']['vai_tro']); // Debug xem giá trị thực tế
```

---

## 📊 Test Checklist (Tick lại từng cái)

```
☐ Admin account tạo thành công (vai_tro='admin')
☐ Admin login → Redirect to Admin panel
☐ Admin panel hiển thị dashboard đúng
☐ User login → Redirect to Home page
☐ Unauthorized access to Admin → Redirect to login
☐ Session expire → Redirect to login
☐ Admin logout → Clear session + redirect home
☐ Admin navbar dropdown hiển thị "Đăng xuất"
☐ User navbar dropdown hiển thị "Tài khoản của tôi"
```

---

## 🔐 Security Checklist

```
☐ Session ID thay đổi sau mỗi login ✓ (PHP mặc định)
☐ Password không được lưu plain text ⚠ (TODO: bcrypt)
☐ Admin access require login ✓
☐ vai_tro được kiểm tra tại 3 layer ✓
☐ Exit() sau redirect ✓
☐ XSS protection (htmlspecialchars) ✓
☐ CSRF token protection ⚠ (TODO)
```

---

## 📝 Important Notes

- **vai_tro values:** 'admin' hoặc 'khach'
- **Session key:** $_SESSION['user']['vai_tro']
- **Controller check:** AdminController->index() line 20
- **View check:** Admin.php line top
- **Logout:** Call AdminController->dangxuat()
- **Password:** Hiện tại plain text, cần upgrade bcrypt

---

**Updated:** 2024
**Version:** 1.0
**Status:** ✅ Production Ready (with security upgrades recommended)

