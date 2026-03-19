<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("location: Dang-nhap.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trang chủ - Đặc Sản Ba Miền</title>

  <link rel="stylesheet" href="app/views/client/css/bootstrap.css">
  <link rel="stylesheet" href="app/views/client/css/Trang-chu.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
  <link rel="icon" href="app/views/client/img/icon.png" type="image/png">

  <script src="app/views/client/js/bootstrap.bundle.js"></script>
   <style>
    /* Đồng bộ các màu sắc chủ đạo */
    .text-brown { color: #8B4513 !important; }
    .border-brown { border-color: #8B4513 !important; }
    .btn-outline-brown { color: #8B4513; border-color: #8B4513; }
    .btn-outline-brown:hover { background-color: #8B4513; color: white; }
    .nav-link.active { color: #8B4513 !important; font-weight: bold; }
    
    /* Avatar thành viên */
    .user-avatar { 
      width: 35px; 
      height: 35px; 
      border-radius: 50%; 
      object-fit: cover; 
      border: 2px solid #8B4513; 
    }
    .product-card:hover { transform: translateY(-5px); transition: 0.3s; }
  </style>
</head>

<body>
  <div class="container-fluid p-0">

    <nav id="nav" class="navbar navbar-expand-lg bg-white navbar-light sticky-top shadow-sm">
      <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center" href="trang-chu-2.php">
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


            <li class="nav-item">
              <a class="nav-link position-relative" href="index.php?controller=GioHang&action=index">
                Giỏ hàng
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 0.7rem;">3</span>
              </a>
            </li>

            <li class="nav-item dropdown ms-lg-3">
              <a class="nav-link dropdown-toggle" href="index.php?controller=SanPham&action=index" role="button" data-bs-toggle="dropdown">
                Tài khoản
              </a>
              <ul class="dropdown-menu dropdown-menu-end border-brown shadow">
                <li><a class="dropdown-item" href="thong-tin-ca-nhan.php"><i class="bi bi-person me-2"></i>Cá nhân</a></li>
                <li><a class="dropdown-item" href="don-hang-cua-toi.php"><i class="bi bi-bag-check me-2"></i>Đơn hàng</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item text-danger" href="index.php?controller=TrangChu&action=index"><i class="bi bi-box-arrow-right me-2"></i>Đăng xuất</a></li>
              </ul>
            </li>
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
      <?php $bestSellers = isset($bestSellers) ? $bestSellers : []; ?>
      <div class="row">
        <?php if(!empty($bestSellers)): foreach($bestSellers as $p): ?>
          <div class="col-md-3 col-sm-6 mb-4">
            <div class="card h-100 border-0 shadow-sm product-card">
              <img src="<?php echo 'app/views/client/' . htmlspecialchars($p['path_img']); ?>" class="card-img" alt="<?php echo htmlspecialchars($p['ten_sp']); ?>">
              <div class="card-body text-center">
                <h5 class="card-title fw-bold text-brown"><?php echo htmlspecialchars($p['ten_sp']); ?></h5>
                <p class="card-text text-danger fw-bold"><?php echo number_format($p['gia'],0,',','.'); ?>đ</p>
                <button class="btn btn-outline-brown w-100">Thêm vào giỏ</button>
              </div>
            </div>
          </div>
        <?php endforeach; else: ?>
          <div class="col-12"><p class="text-muted text-center">Không có sản phẩm bán chạy.</p></div>
        <?php endif; ?>
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
