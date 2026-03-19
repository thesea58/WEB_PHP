<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Giới thiệu - Đặc Sản Ba Miền</title>

  <link rel="stylesheet" href="app/views/client/css/bootstrap.css">
  <link rel="stylesheet" href="app/views/client/css/Trang-chu.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
  <link rel="icon" href="app/views/client/img/icon.png" type="image/png">

  <script src="app/views/client/js/bootstrap.bundle.js"></script>
  <style>
    /* 1. Tối ưu Banner: Căn giữa chữ tuyệt đối */
    .about-header {
      background-image: url('app/views/client/img/Anh/Banner/banner.jpg');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      height: 450px;
      width: 100%;
      display: flex;
      flex-direction: column;
      justify-content: center; /* Căn giữa dọc */
      align-items: center;     /* Căn giữa ngang */
      position: relative;
	
    }

    /* 2. Khung chữ mờ trên Banner */
    .banner-content-box {
      background-color: rgba(255, 255, 255, 0.7); /* Nền trắng mờ */
      padding: 30px 60px;
      border-radius: 15px;
      text-align: center;
      border: 2px solid #8B4513;
      box-shadow: 0 4px 15px rgba(0,0,0,0.2);
    }

    /* 3. Tiện ích bổ sung */
    .text-brown { color: #8B4513 !important; }
    .bg-light-brown { background-color: #fdf5e6; }
    .border-brown { border-color: #8B4513 !important; }
    .img-hover:hover {
      transform: scale(1.02);
      transition: 0.3s;
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
          <button class="btn btn-brown" type="submit" style="background-color: #8B4513; color: white; border: none; padding: 5px 15px;">
            <i class="bi bi-search"></i>
          </button>
        </form>
      </div>
    </nav>

    <div class="about-header shadow-sm mb-5">
        <div class="banner-content-box">
            <h1 class="display-4 fw-bold text-brown mb-0">VỀ CHÚNG TÔI</h1>
            <p class="lead fw-bold text-brown mt-2 mb-0">Tinh hoa ẩm thực Việt - Gói trọn tâm tình trong từng đặc sản</p>
        </div>
    </div>

    <div class="container my-5">
      <div class="row align-items-center mb-5 g-5">
        <div class="col-md-6">
          <h2 class="fw-bold text-brown mb-4 border-bottom border-2 border-brown d-inline-block">Câu chuyện thương hiệu</h2>
          <p class="fs-5 text-justify">Được thành lập từ niềm đam mê với những hương vị truyền thống, <strong>Đặc Sản Ba Miền</strong> ra đời với sứ mệnh kết nối người tiêu dùng với những món ăn tinh túy nhất từ mọi miền Tổ quốc.</p>
          <p class="fs-5 text-justify">Chúng tôi tin rằng mỗi món đặc sản là một đại sứ văn hóa. Từ miếng <i>Thịt trâu gác bếp</i> đậm đà vùng Tây Bắc đến chiếc <i>Bánh pía</i> thơm nức Sóc Trăng, tất cả đều được chúng tôi tuyển chọn với tiêu chuẩn khắt khe nhất.</p>
        </div>
        <div class="col-md-6 text-center">
            <img src="app/views/client/img/Anh/Banner/banner.jpg" class="img-fluid rounded-4 shadow-lg img-hover" alt="Về chúng tôi">
        </div>
      </div>

      <div class="row text-center mt-5">
        <div class="col-md-4 mb-4">
          <div class="p-5 border border-brown rounded-4 h-100 bg-light-brown shadow-sm">
            <i class="bi bi-patch-check-fill fs-1 text-brown"></i>
            <h4 class="mt-3 fw-bold text-brown">Chất lượng thật</h4>
            <p>100% sản phẩm có nguồn gốc rõ ràng, đạt chuẩn vệ sinh an toàn thực phẩm.</p>
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="p-5 border border-brown rounded-4 h-100 bg-light-brown shadow-sm">
            <i class="bi bi-truck-flatbed fs-1 text-brown"></i>
            <h4 class="mt-3 fw-bold text-brown">Giao hàng nhanh</h4>
            <p>Quy trình đóng gói chuyên nghiệp, đảm bảo hàng đến tay vẫn giữ nguyên vị ngon.</p>
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="p-5 border border-brown rounded-4 h-100 bg-light-brown shadow-sm">
            <i class="bi bi-stars fs-1 text-brown"></i>
            <h4 class="mt-3 fw-bold text-brown">Trải nghiệm tốt</h4>
            <p>Luôn lắng nghe và hỗ trợ khách hàng nhiệt tình như người thân trong gia đình.</p>
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