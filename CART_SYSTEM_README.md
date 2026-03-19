# Hệ Thống Giỏ Hàng - Tài Liệu Hướng Dẫn

## Tổng Quan
Hệ thống giỏ hàng lưu trữ dữ liệu trong `$_SESSION['cart']` và yêu cầu người dùng phải đăng nhập.

## Cấu Trúc Dữ Liệu Giỏ Hàng

```php
$_SESSION['cart'] = [
    [
        'ma_sp' => 1,                          // ID sản phẩm
        'ten_sp' => 'Bánh Cốm Hà Nội',        // Tên sản phẩm
        'gia' => 50000,                        // Giá sản phẩm
        'so_luong' => 2,                       // Số lượng
        'path_img' => 'img/Anh/Bac/...'       // Đường dẫn ảnh
    ],
    ...
]
```

## GioHangController - Các Method

### 1. `index()`
**Mục đích:** Hiển thị trang giỏ hàng

**Logic:**
- Nếu chưa đăng nhập → Hiển thị message "Vui lòng đăng nhập" + nút đăng nhập
- Nếu đã đăng nhập → Hiển thị danh sách sản phẩm trong giỏ

**Dữ liệu truyền tới view:**
```php
[
    'notLoggedIn' => boolean,    // Trạng thái đăng nhập
    'gioHang' => [],            // Danh sách sản phẩm
    'tongTien' => 0             // Tổng giá trị giỏ
]
```

### 2. `themVaoGio()` [POST]
**Mục đích:** Thêm sản phẩm vào giỏ hàng

**Tham số POST:**
```
ma_sp       : int - ID sản phẩm
so_luong    : int - Số lượng (mặc định: 1)
```

**Phản hồi JSON:**
```json
{ 
    "success": true/false,
    "message": "Thông báo",
    "cartCount": 3
}
```

**Ví dụ sử dụng:**
```html
<button onclick="themVaoGio(5, 2)">Thêm vào giỏ</button>
```

### 3. `xoaKhoiGio()` [POST]
**Mục đích:** Xoá sản phẩm khỏi giỏ hàng

**Tham số POST:**
```
ma_sp : int - ID sản phẩm
```

**Ví dụ sử dụng:**
```html
<button onclick="xoaKhoiGio(5)">Xoá</button>
```

### 4. `capNhatSoLuong()` [POST]
**Mục đích:** Cập nhật số lượng sản phẩm

**Tham số POST:**
```
ma_sp       : int - ID sản phẩm
so_luong    : int - Số lượng mới
```

**Ví dụ sử dụng:**
```html
<button onclick="capNhatSoLuong(5, 3)">Cập nhật</button>
```

## JavaScript Functions

### `themVaoGio(ma_sp, so_luong = 1)`
Thêm sản phẩm vào giỏ, reload trang khi thành công.

### `xoaKhoiGio(ma_sp)`
Xoá sản phẩm, yêu cầu xác nhận trước, reload trang khi thành công.

### `capNhatSoLuong(ma_sp, so_luong)`
Cập nhật số lượng, reload trang khi thành công.

## Hàm Helper (cart-helper.php)

### `renderAddToCartButton($ma_sp, $classes = '')`
Hiển thị button "Thêm vào giỏ"
- Nếu chưa login: Hiển thị link redirect tới login
- Nếu đã login: Hiển thị button gọi `themVaoGio()`

**Ví dụ:**
```php
<?php renderAddToCartButton($sanPham['ma_sp']); ?>
```

### `getCartCount()`
Lấy số lượng sản phẩm trong giỏ
**Trả về:** int

### `getCartTotal()`
Lấy tổng giá trị giỏ hàng
**Trả về:** int (đơn vị: đồng)

## Cách Tích Hợp Vào Product Pages

### 1. Import cart-helper.php
Thêm vào đầu view file:
```php
<?php include 'includes/cart-helper.php'; ?>
```

### 2. Thay thế button "Thêm vào giỏ"
```html
<!-- Cũ -->
<button class="btn btn-outline-brown w-100">Thêm vào giỏ</button>

<!-- Mới -->
<?php renderAddToCartButton($sanPham['ma_sp'], 'btn btn-outline-brown w-100'); ?>
```

### 3. Cập nhật navbar badge
Hiển thị số lượng sản phẩm trong giỏ:
```html
<span class="badge rounded-pill bg-danger"><?php echo getCartCount(); ?></span>
```

## Luồng Hoạt Động

### Thêm Vào Giỏ
```
1. User click button "Thêm vào giỏ"
   ↓
2. themVaoGio(ma_sp, so_luong) được gọi
   ↓
3. POST request tới GioHangController->themVaoGio()
   ↓
4. Controller kiểm tra:
   - User đã login chưa?
   - Sản phẩm có tồn tại không?
   ↓
5. Thêm/Update sản phẩm vào $_SESSION['cart']
   ↓
6. Trả về JSON success response
   ↓
7. Reload trang hoặc cập nhật UI
```

### Xem Giỏ Hàng
```
1. User truy cập /index.php?controller=GioHang
   ↓
2. GioHangController->index() xử lý
   ↓
3. Kiểm tra $_SESSION['user']:
   - Chưa login → Hiển thị trang login request
   - Đã login → Lấy $_SESSION['cart'], calculate tổng
   ↓
4. Render view Gio-hang.php với dữ liệu
```

## Ghi Chú Bảo Mật

✅ **Đã triển khai:**
- Kiểm tra user đã đăng nhập
- Prepared statements trong database queries
- XSS protection: htmlspecialchars() trên output
- CSRF protection: POST requests chỉ nghe POST method

⚠️ **Cần cải thiện (future):**
- Lưu cart vào database thay vì session (để persistent)
- Thêm rate limiting cho API endpoints
- Validate số lượng (maximum, minimum)
- Kiểm tra kho hàng khi checkout

## Troubleshooting

### Giỏ hàng không lưu sau khi reload
**Nguyên nhân:** Session bị timeout hoặc not started
**Giải pháp:** Kiểm tra `session_start()` được gọi ở `index.php`

### Button "Thêm vào giỏ" không hoạt động
**Nguyên nhân:** JavaScript functions không được load
**Giải pháp:** Kiểm tra `Gio-hang.php` được include, hoặc move `<script>` block

### Cart không hiển thị sau đăng nhập
**Nguyên nhân:** Session data bị clear khi redirect
**Giải pháp:** Đảm bảo không có `session_destroy()` không cần thiết

