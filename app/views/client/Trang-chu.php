<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trang chủ - Đặc Sản Ba Miền</title>

  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/Trang-chu.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
  <link rel="icon" href="img/icon.png" type="image/png">

  <script src="js/bootstrap.bundle.js"></script>
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
            <li class="nav-item"><a class="nav-link" href="Gioi-thieu.php">Giới thiệu</a></li>
            <li class="nav-item">
              <a class="nav-link" href="bai-viet.php">Bài viết</a>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="san-pham.php" role="button" data-bs-toggle="dropdown">
                Sản phẩm
              </a>
              <ul class="dropdown-menu border-brown">
                <li><a class="dropdown-item" href="Dac-san-mien-bac.php">Đặc sản miền Bắc</a></li>
                <li><a class="dropdown-item" href="Dac-san-mien-trung.php">Đặc sản miền Trung</a></li>
                <li><a class="dropdown-item" href="Dac-san-mien-nam.php">Đặc sản miền Nam</a></li>
                	<li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item fw-bold" href="San-pham-ban-chay.php">🔥Sản phẩm bán chạy</a></li>
             
              </ul>
            </li>

            <li class="nav-item"><a class="nav-link" href="gio-hang.php">Giỏ hàng</a></li>
            <li class="nav-item"><a class="nav-link" href="dang-ky.php">Đăng ký</a></li>
            <li class="nav-item"><a class="nav-link" href="index.php?controller=TaiKhoan&action=dangnhap">Đăng nhập</a></li>
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

    <div class="container-fluid p-0" id="section">
  <div id="section-text" class="w-100">
        
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
              <li><a href="gio-hang.php" class="text-decoration-none text-brown">Giỏ hàng</a></li>
              <li><a href="dang-nhap.php" class="text-decoration-none text-brown">Đăng nhập</a></li>
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