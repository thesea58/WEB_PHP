<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Giỏ hàng - Đặc Sản Ba Miền</title>

  <link rel="stylesheet" href="app/views/client/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
  
  <link rel="stylesheet" href="app/views/client/css/Trang-chu.css">
  <link rel="stylesheet" href="app/views/client/css/Gio-hang.css"> <link rel="icon" href="app/views/client/img/icon.png" type="image/png">
  <script src="app/views/client/js/bootstrap.bundle.js"></script>
</head>

<body>
  <div class="container-fluid p-0">

    <nav id="nav" class="navbar navbar-expand-lg bg-white navbar-light sticky-top shadow-sm">
      <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center" href="index.php?controller=TrangChu&action=index">
          <img src="app/views/client/img/Anh/Banner/logo.jpg" alt="Logo" class="nav-logo" style="height: 120px;">
          <span class="brand-text ms-2">ĐẶC SẢN BA MIỀN</span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
          <ul class="navbar-nav fs-5">
            <li class="nav-item">
                <a class="nav-link" href="index.php?controller=TrangChu&action=index">Trang chủ</a>
            </li>
        <li class="nav-item">
                <a class="nav-link" href="index.php?controller=GioiThieu&action=index">Giới thiệu</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?controller=BaiViet&action=index">Bài viết</a>
            </li>
        
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle active fw-bold" href="index.php?controller=SanPham&action=index" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Sản phẩm
                </a>
                <ul class="dropdown-menu border-brown">
                    <li><a class="dropdown-item" href="index.php?controller=DacSanMienBac&action=index">Đặc sản miền Bắc</a></li>
                    <li><a class="dropdown-item" href="index.php?controller=DacSanMienTrung&action=index">Đặc sản miền Trung</a></li>
                    <li><a class="dropdown-item" href="index.php?controller=DacSanMienNam&action=index">Đặc sản miền Nam</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item fw-bold" href="index.php?controller=SanPhamBanChay&action=index">🔥Sản phẩm bán chạy</a></li>
                </ul>
            </li>
            </li>
            <li class="nav-item">
              <a class="nav-link position-relative" href="index.php?controller=GioHang&action=index">
                Giỏ hàng
                <span id="cartCountBadge" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 0.7rem;"><?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0; ?></span>
              </a>
            </li>

            <?php if (isset($_SESSION['user'])): ?>
              <!-- Đã đăng nhập -->
              <li class="nav-item dropdown ms-lg-3">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                  <i class="bi bi-person-circle"></i> <?php echo htmlspecialchars($_SESSION['user']['ten_dang_nhap']); ?>
                </a>
                <ul class="dropdown-menu dropdown-menu-end border-brown shadow">
                  <li><a class="dropdown-item" href="index.php?controller=TaiKhoan&action=index"><i class="bi bi-person me-2"></i>Tài khoản của tôi</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item text-danger" href="index.php?controller=TaiKhoan&action=dangxuat"><i class="bi bi-box-arrow-right me-2"></i>Đăng xuất</a></li>
                </ul>
              </li>
            <?php else: ?>
              <!-- Chưa đăng nhập -->
              <li class="nav-item"><a class="nav-link" href="index.php?controller=DangKy&action=index">Đăng ký</a></li>
              <li class="nav-item"><a class="nav-link" href="index.php?controller=DangNhap&action=index">Đăng nhập</a></li>
            <?php endif; ?>
          </ul>
          </div>

        <form class="d-flex ms-3" role="search">
          <input class="form-control me-2 border-brown" type="search" placeholder="Tìm kiếm..." required>
          <button class="btn btn-search-custom" type="submit" style="background-color: #8B4513; color: white; border: none;">
            <i class="bi bi-search"></i>
          </button>
        </form>

        </div>
    </nav>

    <section class="cart-section">
      <div class="cart-bg-overlay"></div>
      <div class="container cart-container">
        <h2 class="cart-title text-center"><i class=""></i> GIỎ HÀNG CỦA BẠN</h2>
        
        <?php if (isset($notLoggedIn) && $notLoggedIn): ?>
          <!-- Chưa đăng nhập -->
          <div class="row g-4 mt-4">
            <div class="col-lg-8 mx-auto">
              <div class="card shadow-lg p-5 rounded-4 text-center border-0">
                <i class="bi bi-lock-fill" style="font-size: 4rem; color: #8B4513; margin-bottom: 20px;"></i>
                <h3 class="fw-bold text-brown mb-3">Bạn chưa đăng nhập</h3>
                <p class="text-muted mb-4">Vui lòng đăng nhập để xem giỏ hàng của bạn.</p>
                <div class="d-flex gap-3 justify-content-center">
                  <a href="index.php?controller=DangNhap&action=index" class="btn btn-lg" style="background-color: #8B4513; color: white; padding: 12px 40px;">
                    <i class="bi bi-box-arrow-in-right me-2"></i>Đăng nhập
                  </a>
                  <a href="index.php?controller=DangKy&action=index" class="btn btn-lg btn-outline-brown" style="padding: 12px 40px;">
                    <i class="bi bi-person-plus me-2"></i>Đăng ký
                  </a>
                </div>
                <p class="text-muted mt-4">
                  <i class="bi bi-info-circle"></i>
                  Bạn là khách mới? <a href="index.php?controller=GioiThieu&action=index" class="text-brown fw-bold">Tìm hiểu thêm</a>
                </p>
              </div>
            </div>
          </div>
        <?php else: ?>
          <!-- Đã đăng nhập -->
          <div class="row g-4 mt-2">
            <div class="col-lg-8">
              <?php if (empty($gioHang)): ?>
                <div class="card shadow-sm rounded-4 bg-white border text-center p-5">
                  <i class="bi bi-inbox" style="font-size: 3rem; color: #ccc; margin-bottom: 15px;"></i>
                  <p class="text-muted mb-3">Giỏ hàng của bạn còn trống</p>
                  <a href="index.php?controller=SanPham&action=index" class="btn btn-brown">
                    <i class="bi bi-shop me-2"></i>Tiếp tục mua sắm
                  </a>
                </div>
              <?php else: ?>
                <div class="table-responsive shadow-sm rounded-4 bg-white border">
                  <table class="table align-middle m-0 table-cart">
                    <thead class="bg-light">
                      <tr>
                        <th class="ps-4 py-3">Sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Tổng cộng</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($gioHang as $item): ?>
                      <tr>
                        <td class="ps-4 d-flex align-items-center">
                          <img src="app/views/client/<?php echo htmlspecialchars($item['path_img']); ?>" 
                               alt="<?php echo htmlspecialchars($item['ten_sp']); ?>"
                               style="width: 80px; height: 80px; object-fit: cover; border-radius: 5px;">
                          <div class="ms-3">
                            <div class="fw-bold product-name"><?php echo htmlspecialchars($item['ten_sp']); ?></div>
                            <small class="text-muted">Mã SP: <?php echo $item['ma_sp']; ?></small>
                          </div>
                        </td>
                        <td><?php echo number_format($item['gia'], 0, ',', '.'); ?>đ</td>
                        <td>
                          <div class="input-group" style="width: 100px;">
                            <button class="btn btn-sm btn-outline-secondary" onclick="capNhatSoLuong(<?php echo $item['ma_sp']; ?>, <?php echo $item['so_luong'] - 1; ?>)">−</button>
                            <input type="number" class="form-control text-center quantity-input" 
                                   value="<?php echo $item['so_luong']; ?>" 
                                   min="1" 
                                   onchange="capNhatSoLuong(<?php echo $item['ma_sp']; ?>, this.value)"
                                   style="max-width: 60px;">
                            <button class="btn btn-sm btn-outline-secondary" onclick="capNhatSoLuong(<?php echo $item['ma_sp']; ?>, <?php echo $item['so_luong'] + 1; ?>)">+</button>
                          </div>
                        </td>
                        <td class="fw-bold text-brown">
                          <?php echo number_format($item['gia'] * $item['so_luong'], 0, ',', '.'); ?>đ
                        </td>
                        <td>
                          <button class="btn btn-sm btn-remove" onclick="xoaKhoiGio(<?php echo $item['ma_sp']; ?>)">
                            <i class="bi bi-x-lg"></i>
                          </button>
                        </td>
                      </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
                <div class="mt-4">
                  <a href="index.php?controller=SanPham&action=index" class="back-link"><i class="bi bi-arrow-left"></i> Tiếp tục chọn đặc sản</a>
                </div>
              <?php endif; ?>
            </div>

            <div class="col-lg-4">
              <div class="card summary-card border-0 shadow-sm p-4 rounded-4">
                <h4 class="fw-bold mb-4 border-bottom pb-2">Hóa đơn của bạn</h4>
                <div class="d-flex justify-content-between mb-3">
                  <span>Sản phẩm (<?php echo count($gioHang); ?> món):</span>
                  <span><?php echo number_format($tongTien, 0, ',', '.'); ?>đ</span>
                </div>
                <div class="d-flex justify-content-between mb-3 text-success fw-medium">
                  <span>Khuyến mãi đặc biệt:</span>
                  <span>-0đ</span>
                </div>
                <hr>
                <div class="d-flex justify-content-between mb-4 fs-4 fw-bold total-price">
                  <span>Tổng cộng:</span>
                  <span><?php echo number_format($tongTien, 0, ',', '.'); ?>đ</span>
                </div>
                <?php if (!empty($gioHang)): ?>
                  <a href="index.php?controller=ThanhToan&action=index" 
                       class="btn btn-checkout btn-lg w-100 py-3 fw-bold shadow">
                      ĐẶT HÀNG NGAY
                    </a>
                <?php else: ?>
                  <button class="btn btn-checkout btn-lg w-100 py-3 fw-bold shadow" disabled>
                      ĐẶT HÀNG NGAY
                    </button>
                <?php endif; ?>
                <small class="text-muted text-center d-block mt-3">
                  Cam kết chuẩn vị truyền thống 100%
                </small>
              </div>
            </div>
          </div>
        <?php endif; ?>

   
    <footer id="footer" class="pt-5 pb-2 border-top bg-white">
      <div class="container">
        <div class="row">
          <div class="col-md-4 mb-3 text-brown">
            <img src="app/views/client/img/Anh/Banner/logo.jpg" alt="Logo" class="nav-logo" style="height: 120px;">
            <p class="mt-3">
              Đặc sản ba miền – Tinh hoa ẩm thực Việt!<br>
              Mang đến hương vị truyền thống chuẩn vị Bắc – Trung – Nam.
            </p>
          </div>

          <div class="col-md-4 mb-3">
            <h3 style="color: #8B4513;">Liên kết nhanh</h3>
            <ul class="list-unstyled">
              <li><a href="index.php?controller=TrangChu&action=index" class="text-decoration-none text-brown">Trang chủ</a></li>
              <li><a href="index.php?controller=GioHang&action=index" class="text-decoration-none text-brown">Giỏ hàng</a></li>
              <li><a href="index.php?controller=DangNhap&action=index" class="text-decoration-none text-brown">Đăng nhập</a></li>
            </ul>
          </div>

          <div class="col-md-4 mb-2 text-brown">
            <h3 style="color: #8B4513;">Liên hệ</h3>
            <p><i class="bi bi-geo-alt"></i> Bình Dương, Việt Nam</p>
            <p><i class="bi bi-telephone"></i> 0274 3743 118</p>
            <p><i class="bi bi-envelope"></i> contact@dacsan3mien.vn</p>
          </div>
        </div>
        <hr style="border-color: #8B4513;">
        <p class="text-center text-brown">&copy; 2025 Đặc sản ba miền</p>
      </div>
    </footer>

  </div>
</body>

<script>
/**
 * Thêm sản phẩm vào giỏ hàng
 */
function themVaoGio(ma_sp, so_luong = 1) {
    const formData = new FormData();
    formData.append('ma_sp', ma_sp);
    formData.append('so_luong', so_luong);
    
    fetch('index.php?controller=GioHang&action=themVaoGio', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert(data.message);
            location.reload();
        } else {
            alert('Lỗi: ' + data.message);
        }
    })
    .catch(error => console.error('Error:', error));
}

/**
 * Xoá sản phẩm khỏi giỏ hàng
 */
function xoaKhoiGio(ma_sp) {
    if (!confirm('Bạn có chắc chắn muốn xoá sản phẩm này?')) {
        return;
    }
    
    const formData = new FormData();
    formData.append('ma_sp', ma_sp);
    
    fetch('index.php?controller=GioHang&action=xoaKhoiGio', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert(data.message);
            location.reload();
        } else {
            alert('Lỗi: ' + data.message);
        }
    })
    .catch(error => console.error('Error:', error));
}

/**
 * Cập nhật số lượng sản phẩm
 */
function capNhatSoLuong(ma_sp, so_luong) {
    so_luong = parseInt(so_luong);
    
    if (so_luong < 1) {
        alert('Số lượng phải lớn hơn 0!');
        return;
    }
    
    const formData = new FormData();
    formData.append('ma_sp', ma_sp);
    formData.append('so_luong', so_luong);
    
    fetch('index.php?controller=GioHang&action=capNhatSoLuong', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            location.reload();
        } else {
            alert('Lỗi: ' + data.message);
        }
    })
    .catch(error => console.error('Error:', error));
}
</script>
</html>