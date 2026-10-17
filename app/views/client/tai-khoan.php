<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tài khoản - Đặc Sản Ba Miền</title>

  <link rel="stylesheet" href="app/views/client/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="app/views/client/css/Trang-chu.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
  <link rel="icon" href="app/views/client/img/icon.png" type="image/png">

  <script src="app/views/client/js/bootstrap.bundle.js"></script>

  <style>
    body {
      background: #f5f5f5;
    }

    .text-brown {
      color: #8B4513;
    }

    .coming-soon-container {
      min-height: 70vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 40px 20px;
    }

    .coming-soon-card {
      background: white;
      border-radius: 15px;
      padding: 60px 40px;
      text-align: center;
      max-width: 600px;
      box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    }

    .coming-soon-icon {
      font-size: 5rem;
      color: #8B4513;
      margin-bottom: 20px;
    }

    .coming-soon-title {
      font-size: 2rem;
      color: #8B4513;
      font-weight: bold;
      margin-bottom: 15px;
    }

    .coming-soon-text {
      color: #666;
      font-size: 1.1rem;
      margin-bottom: 30px;
    }

    .btn-back {
      background: #8B4513;
      color: white;
      padding: 12px 40px;
      border-radius: 10px;
      text-decoration: none !important;
      display: inline-block;
      transition: 0.3s;
    }

    .btn-back:hover {
      background: #6b3210;
      color: white;
      text-decoration: none;
    }
  </style>
</head>

<body>
  <div class="container-fluid p-0">

    <nav id="nav" class="navbar navbar-expand-lg bg-white navbar-light sticky-top shadow-sm">
      <div class="container-fluid">

        <a class="navbar-brand d-flex align-items-center" href="index.php?controller=TrangChu&action=index">
          <img src="app/views/client/img/Anh/Banner/logo.jpg" alt="Logo" class="nav-logo" style="height: 120px;">
          <span class="brand-text ms-2" style="color: #8B4513; font-weight: 800; font-size: 1.4rem; text-transform: uppercase;">ĐẶC SẢN BA MIỀN</span>
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

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="index.php?controller=SanPham&action=index" role="button" data-bs-toggle="dropdown">
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

            <li class="nav-item"><a class="nav-link" href="index.php?controller=GioHang&action=index">Giỏ hàng</a></li>
            
            <?php if (isset($_SESSION['user'])): ?>
              <!-- Đã đăng nhập -->
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle active fw-bold" href="#" role="button" data-bs-toggle="dropdown">
                  <i class="bi bi-person-circle"></i> <?php echo htmlspecialchars($_SESSION['user']['ten_dang_nhap']); ?>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
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

    <!-- Coming Soon -->
    <div class="coming-soon-container">
      <div class="coming-soon-card">
        <div class="coming-soon-icon">
          <i class="bi bi-wrench-adjustable"></i>
        </div>
        <h1 class="coming-soon-title">Trang Tài Khoản</h1>
        <p class="coming-soon-text">
          Trang này đang được cập nhật với các tính năng mới.<br>
          Vui lòng quay lại sau!
        </p>
        <a href="index.php?controller=TrangChu&action=index" class="btn-back">
          <i class="bi bi-arrow-left me-2"></i>Quay lại Trang Chủ
        </a>
      </div>
    </div>

    <!-- FOOTER -->
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