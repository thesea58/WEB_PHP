<?php 
// Admin.php - Trang admin được render từ AdminController
// Kiểm tra xem user có phải admin không (an toàn hơn vì được handle ở controller)
if (!isset($_SESSION['user']) || $_SESSION['user']['vai_tro'] !== 'admin') {
    header('Location: index.php?controller=TrangChu&action=index');
    exit();
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trang Admin - Đặc Sản Ba Miền</title>

  <link rel="stylesheet" href="app/views/client/css/bootstrap.css">
  <link rel="stylesheet" href="app/views/client/css/Trang-chu.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
  <link rel="icon" href="app/views/client/img/icon.png" type="image/png">

  <script src="app/views/client/js/bootstrap.bundle.js"></script>

  <style>
    .admin-banner {
      background: linear-gradient(135deg, #8B4513 0%, #6b3210 100%);
      color: white;
      padding: 40px;
      border-radius: 10px;
      margin-bottom: 30px;
    }

    .admin-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 20px;
      margin-bottom: 30px;
    }

    .admin-card {
      background: white;
      padding: 25px;
      border-radius: 10px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
      text-align: center;
      transition: 0.3s;
    }

    .admin-card:hover {
      box-shadow: 0 5px 20px rgba(0,0,0,0.2);
      transform: translateY(-5px);
    }

    .admin-icon {
      font-size: 3rem;
      color: #8B4513;
      margin-bottom: 15px;
    }

    .admin-card h4 {
      color: #8B4513;
      font-weight: bold;
      margin-bottom: 10px;
    }

    .admin-card a {
      display: inline-block;
      margin-top: 10px;
      padding: 10px 20px;
      background: #8B4513;
      color: white;
      text-decoration: none !important;
      border-radius: 5px;
      transition: 0.3s;
    }

    .admin-card a:hover {
      background: #6b3210;
      color: white;
    }
  </style>
</head>

<body>
  <div class="container-fluid p-0">

    <nav id="nav" class="navbar navbar-expand-lg bg-white navbar-light sticky-top shadow-sm">
      <div class="container-fluid">

        <a class="navbar-brand d-flex align-items-center" href="index.php?controller=Admin&action=index">
          <img src="app/views/client/img/Anh/Banner/logo.jpg" alt="Logo" class="nav-logo" style="height: 120px;">
          <span class="brand-text ms-2" style="color: #8B4513; font-weight: 800; font-size: 1.4rem; text-transform: uppercase;">ĐẶC SẢN BA MIỀN - ADMIN</span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
          <ul class="navbar-nav fs-5">
            <li class="nav-item">
                <a class="nav-link" href="index.php?controller=XuLyDonHang&action=index">
                  <i class="bi bi-box-seam me-2"></i>Xử lý đơn hàng
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?controller=ThongKeDonHang&action=index">
                  <i class="bi bi-graph-up me-2"></i>Thống kê đơn hàng
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?controller=Post&action=index">
                  <i class="bi bi-pencil-square me-2"></i>Quản lý đăng tải
                </a>
            </li>
          
            <li class="nav-item dropdown ms-lg-3">
              <a class="nav-link dropdown-toggle fw-bold" href="#" role="button" data-bs-toggle="dropdown">
                <i class="bi bi-person-circle me-2"></i><?php echo htmlspecialchars($adminUser['ten_dang_nhap'] ?? 'Admin'); ?>
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="index.php?controller=Admin&action=index"><i class="bi bi-house me-2"></i>Về trang chủ</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item text-danger" href="index.php?controller=Admin&action=dangxuat"><i class="bi bi-box-arrow-right me-2"></i>Đăng xuất</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container my-5">
      <!-- Admin Banner -->
      <div class="admin-banner">
        <h1 class="mb-2">Chào mừng, Admin!</h1>
        <p class="mb-0">Quản lý toàn bộ hệ thống Đặc Sản Ba Miền từ tại đây</p>
      </div>

      <!-- Admin Menu Grid -->
      <div class="admin-grid">
        
        <!-- Card: Xử lý đơn hàng -->
        <div class="admin-card">
          <div class="admin-icon">
            <i class="bi bi-box-seam"></i>
          </div>
          <h4>Xử lý đơn hàng</h4>
          <p class="text-muted small">Quản lý và xử lý các đơn hàng từ khách hàng</p>
          <a href="index.php?controller=XuLyDonHang&action=index">
            Truy cập <i class="bi bi-arrow-right ms-2"></i>
          </a>
        </div>

        <!-- Card: Thống kê đơn hàng -->
        <div class="admin-card">
          <div class="admin-icon">
            <i class="bi bi-graph-up"></i>
          </div>
          <h4>Thống kê đơn hàng</h4>
          <p class="text-muted small">Xem báo cáo và thống kê bán hàng chi tiết</p>
          <a href="index.php?controller=ThongKeDonHang&action=index">
            Truy cập <i class="bi bi-arrow-right ms-2"></i>
          </a>
        </div>

        <!-- Card: Quản lý bài viết -->
        <div class="admin-card">
          <div class="admin-icon">
            <i class="bi bi-pencil-square"></i>
          </div>
          <h4>Quản lý bài viết</h4>
          <p class="text-muted small">Tạo, chỉnh sửa, xoá bài viết và tin tức</p>
          <a href="index.php?controller=Post&action=index">
            Truy cập <i class="bi bi-arrow-right ms-2"></i>
          </a>
        </div>
      </div>

      <!-- User Info -->
      <div class="card mt-5">
        <div class="card-body">
          <h5 class="card-title text-brown fw-bold">
            <i class="bi bi-info-circle me-2"></i>Thông tin tài khoản
          </h5>
          <table class="table table-borderless mb-0">
            <tr>
              <td class="fw-bold" width="200px">Tên đăng nhập:</td>
              <td><?php echo htmlspecialchars($adminUser['ten_dang_nhap'] ?? ''); ?></td>
            </tr>
            <tr>
              <td class="fw-bold">Email:</td>
              <td><?php echo htmlspecialchars($adminUser['email'] ?? ''); ?></td>
            </tr>
            <tr>
              <td class="fw-bold">Điện thoại:</td>
              <td><?php echo htmlspecialchars($adminUser['dien_thoai'] ?? 'N/A'); ?></td>
            </tr>
            <tr>
              <td class="fw-bold">Vai trò:</td>
              <td><span class="badge bg-danger">Admin</span></td>
            </tr>
            <tr>
              <td class="fw-bold">Ngày tạo:</td>
              <td><?php echo htmlspecialchars($adminUser['ngay_tao'] ?? 'N/A'); ?></td>
            </tr>
          </table>
        </div>
      </div>
    </div>

    <!-- Footer -->
    <footer id="footer" class="pt-5 pb-2 border-top bg-white mt-5">
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
            <h3 style="color: #8B4513;">Admin Links</h3>
            <ul class="list-unstyled">
              <li><a href="index.php?controller=XuLyDonHang&action=index" class="text-decoration-none text-brown">Xử lý đơn hàng</a></li>
              <li><a href="index.php?controller=ThongKeDonHang&action=index" class="text-decoration-none text-brown">Thống kê</a></li>
              <li><a href="index.php?controller=Post&action=index" class="text-decoration-none text-brown">Quản lý bài viết</a></li>
            </ul>
          </div>

          <div class="col-md-4 mb-2 text-brown">
            <h3 style="color: #8B4513;">Liên hệ</h3>
            <p><i class="bi bi-geo-alt"></i> TP.Hồ Chí Minh, Việt Nam</p>
            <p><i class="bi bi-telephone"></i> 0274 3743 118</p>
            <p><i class="bi bi-envelope"></i> contact@dacsan3mien.vn</p>
          </div>
        </div>
        <hr style="border-color: #8B4513;">
        <p class="text-center text-brown">&copy; 2026 Đặc sản ba miền - Admin Panel</p>
      </div>
    </footer>

  </div>

</body>
</html>
      </div>
    </nav>

    <div class="row m-0 py-5" id="section">
      <div id="section-text" class="container text-center">
        
            <div id="bannerSlider" class="carousel slide shadow rounded overflow-hidden my-5" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="app/views/client/img/Anh/Banner/banner.jpg" class="d-block w-100 banner-img" alt="Banner 1">
        </div>
        <div class="carousel-item">
          <img src="app/views/client/img/Anh/Trung/nemchua_thanhhoa.jpg" class="d-block w-100 banner-img" alt="Banner 2">
        </div>
        <div class="carousel-item">
          <img src="app/views/client/img/Anh/Nam/banhpia_soctrang.jpg" class="d-block w-100 banner-img" alt="Banner 3">
        </div>
        <div class="carousel-item">
          <img src="app/views/client/img/Anh/Bac/banhdauxanh_haiduong.png" class="d-block w-100 banner-img" alt="Banner 4">
        </div>
      </div>
  
  <button class="carousel-control-prev" type="button" data-bs-target="#bannerSlider" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#bannerSlider" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
  </button>
</div>
      </div>
    </div>

    <div class="container my-5" id="san-pham-ban-chay">
      <h2 class="text-center fw-bold mb-5" style="color: #8B4513;">SẢN PHẨM BÁN CHẠY</h2>
      <div class="row">
        
        <div class="col-md-3 col-sm-6 mb-4">
          <div class="card h-100 border-0 shadow-sm product-card">
            <img src="app/views/client/img/Anh/Trung/tre_binhdinh.jpg" class="card-img" alt="Tré Bình Định">
            <div class="card-body text-center">
              <h5 class="card-title fw-bold text-brown">Tré Bình Định</h5>
              <p class="card-text text-danger fw-bold">130.000đ</p>
              <button class="btn btn-outline-brown w-100">Thêm vào giỏ</button>
            </div>
          </div>
        </div>

        <div class="col-md-3 col-sm-6 mb-4">
          <div class="card h-100 border-0 shadow-sm product-card">
            <img src="app/views/client/img/Anh/Nam/banhpia_soctrang.jpg" class="card-img" alt="Bánh Pía Sóc Trăng">
            <div class="card-body text-center">
              <h5 class="card-title fw-bold text-brown">Bánh Pía Sóc Trăng</h5>
              <p class="card-text text-danger fw-bold">90.000đ</p>
              <button class="btn btn-outline-brown w-100">Thêm vào giỏ</button>
            </div>
          </div>
        </div>

        <div class="col-md-3 col-sm-6 mb-4">
          <div class="card h-100 border-0 shadow-sm product-card">
            <img src="app/views/client/img/Anh/Bac/traugacbep_TayBac.png" class="card-img" alt="Thịt Trâu Gác Bếp">
            <div class="card-body text-center">
              <h5 class="card-title fw-bold text-brown">Thịt Trâu Gác Bếp</h5>
              <p class="card-text text-danger fw-bold">500.000đ</p>
              <button class="btn btn-outline-brown w-100">Thêm vào giỏ</button>
            </div>
          </div>
        </div>

        <div class="col-md-3 col-sm-6 mb-4">
          <div class="card h-100 border-0 shadow-sm product-card">
            <img src="app/views/client/img/Anh/Trung/yenxao_khanhhoa.jpg" class="card-img" alt="Yến Xào Khánh Hòa">
            <div class="card-body text-center">
              <h5 class="card-title fw-bold text-brown">Yến Xào Khách Hòa</h5>
              <p class="card-text text-danger fw-bold">500.000đ</p>
              <button class="btn btn-outline-brown w-100">Thêm vào giỏ</button>
            </div>
          </div>
        </div>

      </div>
    </div>

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
            <p><i class="bi bi-geo-alt"></i> TP.Hồ Chí Minh, Việt Nam</p>
            <p><i class="bi bi-telephone"></i> 0274 3743 118</p>
            <p><i class="bi bi-envelope"></i> contact@dacsan3mien.vn</p>
          </div>
        </div>
        <hr style="border-color: #8B4513;">
        <p class="text-center text-brown">&copy; 2026 Đặc sản ba miền</p>
      </div>
    </footer>

  </div>
</body>
</html>