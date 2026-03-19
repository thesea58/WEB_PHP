# Hướng dẫn sử dụng Models - Đặc Sản Ba Miền

## Tổng quan

Dự án sử dụng mô hình MVC với các Model để quản lý dữ liệu từ database. Tất cả Model đều được tự động tải qua `spl_autoload_register` trong `index.php`.

## Cấu trúc Models

### 1. **SanPhamModel.php**
Quản lý sản phẩm từ database

#### Các phương thức chính:

```php
// Lấy tất cả sản phẩm
$sanPhamModel = new SanPhamModel($pdo);
$allProducts = $sanPhamModel->layTatCaSanPham();

// Lấy sản phẩm theo miền (danh mục)
// id_danh_muc: 1 = Miền Bắc, 2 = Miền Trung, 3 = Miền Nam
$backProducts = $sanPhamModel->laySanPhamTheoMien(1);

// Lấy chi tiết sản phẩm theo ID
$product = $sanPhamModel->laySanPhamTheoId(1);

// Lấy sản phẩm bán chạy (giới hạn số lượng)
$topProducts = $sanPhamModel->laySanPhamBanChay(8);

// Tìm kiếm sản phẩm
$results = $sanPhamModel->timKiemSanPham('bánh');
```

### 2. **DanhMucModel.php**
Quản lý danh mục sản phẩm

```php
$danhMucModel = new DanhMucModel($pdo);

// Lấy tất cả danh mục
$categories = $danhMucModel->layTatCaDanhMuc();

// Lấy danh mục theo ID
$category = $danhMucModel->layDanhMucTheoId(1);
```

### 3. **NguoiDungModel.php**
Quản lý người dùng, đăng nhập, đăng ký

```php
$userModel = new NguoiDungModel($pdo);

// Kiểm tra đăng nhập
$user = $userModel->checkLogin('username', 'password');

// Lấy thông tin người dùng
$user = $userModel->layNguoiDungTheoId(1);

// Kiểm tra tên đăng nhập đã tồn tại
if ($userModel->kiemTraTenDangNhap('username')) {
    // Tên đăng nhập đã tồn tại
}

// Kiểm tra email
if ($userModel->kiemTraEmail('email@example.com')) {
    // Email đã tồn tại
}

// Đăng ký người dùng mới
$success = $userModel->dangKy('username', 'password', 'email@gmail.com', '0911111111');

// Cập nhật thông tin
$userModel->capNhatThongTin(1, 'newemail@gmail.com', '0922222222');

// Đổi mật khẩu
$success = $userModel->doiMatKhau(1, 'oldPassword', 'newPassword');
```

### 4. **HoaDonModel.php**
Quản lý hóa đơn và chi tiết hóa đơn

```php
$hoaDonModel = new HoaDonModel($pdo);

// Lấy tất cả hóa đơn (admin)
$allInvoices = $hoaDonModel->layTatCaHoaDon();

// Lấy hóa đơn của người dùng
$userInvoices = $hoaDonModel->layHoaDonCuaNguoiDung(1);

// Lấy chi tiết hóa đơn
$details = $hoaDonModel->layChiTietHoaDon(1);

// Tạo hóa đơn mới
$invoiceId = $hoaDonModel->taoHoaDon(1, 'Nguyễn Văn A', '0911111111', '123 Đường ABC', 500000);

// Thêm chi tiết hóa đơn
$hoaDonModel->themChiTietHoaDon($invoiceId, 1, 2, 240000);

// Cập nhật trạng thái
$hoaDonModel->capNhatTrangThai(1, 'Đang giao');
```

### 5. **NhaCungCapModel.php**
Quản lý nhà cung cấp

```php
$nhaCungCapModel = new NhaCungCapModel($pdo);

// Lấy tất cả nhà cung cấp
$suppliers = $nhaCungCapModel->layTatCaNhaCungCap();

// Lấy nhà cung cấp theo ID
$supplier = $nhaCungCapModel->layNhaCungCapTheoId(1);
```

## Ví dụ sử dụng trong Controller

```php
class DacSanMienBacController extends BaseController {
    public function index() {
        // Tạo instance của Model
        $sanPhamModel = new SanPhamModel($this->pdo);
        $danhMucModel = new DanhMucModel($this->pdo);
        
        // Lấy dữ liệu
        $danhMuc = $danhMucModel->layDanhMucTheoId(1); // Miền Bắc
        $sanPham = $sanPhamModel->laySanPhamTheoMien(1);
        
        // Truyền dữ liệu sang view
        $this->render('Dac-san-mien-bac', [
            'danhMuc' => $danhMuc,
            'sanPham' => $sanPham
        ]);
    }
}
```

## Ví dụ sử dụng trong View

```php
<?php if (isset($sanPham) && is_array($sanPham)): ?>
    <?php foreach ($sanPham as $item): ?>
        <div class="col-md-3">
            <div class="card">
                <img src="app/views/client/<?php echo htmlspecialchars($item['path_img']); ?>" 
                     alt="<?php echo htmlspecialchars($item['ten_sp']); ?>">
                <div class="card-body">
                    <h5><?php echo htmlspecialchars($item['ten_sp']); ?></h5>
                    <p>Giá: <?php echo number_format($item['gia'], 0, ',', '.'); ?>đ</p>
                    <p>Danh mục: <?php echo htmlspecialchars($item['ten_danh_muc']); ?></p>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <p>Không có sản phẩm nào.</p>
<?php endif; ?>
```

## Database Configuration

Kết nối database được cấu hình trong `config/dbConect.php`:

```php
<?php
function connectDB() {
    $host = 'localhost';
    $db = 'dacsan3mien';
    $user = 'root';
    $pass = '';
    
    try {
        $pdo = new PDO(
            'mysql:host=' . $host . ';dbname=' . $db,
            $user,
            $pass,
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );
        return $pdo;
    } catch (PDOException $e) {
        die('Kết nối database thất bại: ' . $e->getMessage());
    }
}
?>
```

## Cấu trúc Database

### Bảng sanpham
- `ma_sp` - ID sản phẩm
- `ten_sp` - Tên sản phẩm
- `gia` - Giá
- `mo_ta` - Mô tả
- `id_danh_muc` - ID danh mục
- `ma_ncc` - ID nhà cung cấp
- `so_luong` - Số lượng
- `path_img` - Đường dẫn ảnh

### Bảng danhmuc
- `id` - ID danh mục (1=Bắc, 2=Trung, 3=Nam)
- `ten_danh_muc` - Tên danh mục
- `mo_ta` - Mô tả

### Bảng nguoidung
- `ma_nguoi_dung` - ID người dùng
- `ten_dang_nhap` - Username
- `mat_khau` - Password
- `email` - Email
- `dien_thoai` - Điện thoại
- `vai_tro` - Role (admin/khach)

## Lưu ý quan trọng

1. **PDO Prepared Statements**: Tất cả Model sử dụng prepared statements để bảo vệ khỏi SQL injection

2. **Fetch Mode**: Các Model sử dụng `PDO::FETCH_ASSOC` để trả về mảng kết hợp

3. **Exception Handling**: Một số phương thức có try-catch để xử lý lỗi

4. **Session Management**: Dữ liệu đăng nhập được lưu trong `$_SESSION['user']`

5. **Security**: Mật khẩu hiện tại được lưu dưới dạng plain text. Nên sử dụng hashing cho production (password_hash, password_verify)

## Cập nhật Security

Để bảo mật mật khẩu, sửa `NguoiDungModel.php`:

```php
// Thay thế trong hàm dangKy
$mat_khau_hash = password_hash($mat_khau, PASSWORD_BCRYPT);
// Và binding:
$stmt->bindParam(':mat_khau', $mat_khau_hash);

// Thay thế trong checkLogin
$user = // lấy từ DB
if ($user && password_verify($mat_khau, $user['mat_khau'])) {
    // Đăng nhập thành công
}
```

---
