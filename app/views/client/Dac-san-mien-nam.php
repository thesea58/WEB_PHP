DSMN
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặc Sản Miền Nam - Đặc Sản Ba Miền</title>
    
    <link rel="stylesheet" href="app/views/client/css/bootstrap.css">
    <link rel="stylesheet" href="app/views/client/css/Trang-chu.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="icon" href="app/views/client/img/icon.png" type="image/png">
    
    <script src="app/views/client/js/bootstrap.bundle.js"></script>
    <style>
		
        .text-brown { color: #8B4513; }
        .border-brown { border-color: #8B4513 !important; }
        
        /* Hiệu ứng card đồng bộ trang chủ */
        .product-card {
            transition: all 0.3s ease;
            border: none;
        }
        .product-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.15) !important;
        }
        .img-sp {
            height: 200px;
            object-fit: cover;
            border-radius: 8px;
        }
        .btn-outline-brown {
            color: #8B4513;
            border-color: #8B4513;
        }
        .btn-outline-brown:hover {
            background-color: #8B4513;
            color: var(--mau-vang);
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
          <button class="btn" type="submit" style="background-color: #8B4513; color: white; border: none;">
            <i class="bi bi-search"></i>
          </button>
        </form>
      </div>
    </nav>

    <div class="container my-5">
        <div class="text-center mb-5">
            <h1 class="fw-bold text-brown uppercase">Đặc Sản Miền Nam</h1>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <p class="text-muted">Đặc sản miền Nam Việt Nam nổi bật với hương vị đậm đà, phong phú và mang đậm dấu ấn vùng sông nước. Từ những món mắm đặc trưng đến những loại trái cây nhiệt đới ngọt lành, tất cả tạo nên một nền ẩm thực vô cùng quyến rũ.</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 col-sm-6 mb-4">
                <div class="card h-100 shadow-sm product-card p-2">
                    <img src="app/views/client/img/Anh/Nam/trasen_dongthap.jpg" class="card-img-top img-sp" alt="Trà sen Đồng Tháp">
                    <div class="card-body text-center d-flex flex-column">
                        <h5 class="card-title fw-bold text-brown">Trà sen Đồng Tháp</h5>
                        <p class="card-text text-danger fw-bold">150.000đ</p>
<button class="btn btn-outline-brown mt-auto w-100">Thêm vào giỏ</button>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 mb-4">
                <div class="card h-100 shadow-sm product-card p-2">
                    <img src="app/views/client/img/Anh/Nam/tomkho_camau.jpg" class="card-img-top img-sp" alt="Tôm khô Cà Mau">
                    <div class="card-body text-center d-flex flex-column">
                        <h5 class="card-title fw-bold text-brown">Tôm khô Cà Mau</h5>
                        <p class="card-text text-danger fw-bold">400.000đ</p>
                        <button class="btn btn-outline-brown mt-auto w-100">Thêm vào giỏ</button>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 mb-4">
                <div class="card h-100 shadow-sm product-card p-2">
                    <img src="app/views/client/img/Anh/Nam/nembuoi_tayninh.jpg" class="card-img-top img-sp" alt="Nem bưởi Tây Ninh">
                    <div class="card-body text-center d-flex flex-column">
                        <h5 class="card-title fw-bold text-brown">Nem bưởi Tây Ninh</h5>
                        <p class="card-text text-danger fw-bold">70.000đ</p>
                        <button class="btn btn-outline-brown mt-auto w-100">Thêm vào giỏ</button>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 mb-4">
                <div class="card h-100 shadow-sm product-card p-2">
                    <img src="app/views/client/img/Anh/Nam/matong_camau.jpg" class="card-img-top img-sp" alt="Mật ong Cà Mau">
                    <div class="card-body text-center d-flex flex-column">
                        <h5 class="card-title fw-bold text-brown">Mật ong Cà Mau</h5>
                        <p class="card-text text-danger fw-bold">250.000đ</p>
                        <button class="btn btn-outline-brown mt-auto w-100">Thêm vào giỏ</button>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 mb-4">
                <div class="card h-100 shadow-sm product-card p-2">
                    <img src="app/views/client/img/Anh/Nam/mamchua_baclieu.jpg" class="card-img-top img-sp" alt="Mắm chua Bạc Liêu">
                    <div class="card-body text-center d-flex flex-column">
                        <h5 class="card-title fw-bold text-brown">Mắm chua Bạc Liêu</h5>
                        <p class="card-text text-danger fw-bold">100.000đ</p>
                        <button class="btn btn-outline-brown mt-auto w-100">Thêm vào giỏ</button>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 mb-4">
                <div class="card h-100 shadow-sm product-card p-2">
<img src="app/views/client/img/Anh/Nam/khomuc_kiengiang.jpg" class="card-img-top img-sp" alt="Khô mực Kiên Giang">
<div class="card-body text-center d-flex flex-column">
                        <h5 class="card-title fw-bold text-brown">Khô mực Kiên Giang</h5>
                        <p class="card-text text-danger fw-bold">350.000đ</p>
                        <button class="btn btn-outline-brown mt-auto w-100">Thêm vào giỏ</button>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 mb-4">
                <div class="card h-100 shadow-sm product-card p-2">
                    <img src="app/views/client/img/Anh/Nam/keodua_bentre.jpg" class="card-img-top img-sp" alt="Kẹo dừa Bến Tre">
                    <div class="card-body text-center d-flex flex-column">
                        <h5 class="card-title fw-bold text-brown">Kẹo dừa Bến Tre</h5>
                        <p class="card-text text-danger fw-bold">80.000đ</p>
                        <button class="btn btn-outline-brown mt-auto w-100">Thêm vào giỏ</button>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 mb-4">
                <div class="card h-100 shadow-sm product-card p-2">
                    <img src="app/views/client/img/Anh/Nam/hatdieu_binhphuoc.jpg" class="card-img-top img-sp" alt="Hạt điều Bình Phước">
                    <div class="card-body text-center d-flex flex-column">
                        <h5 class="card-title fw-bold text-brown">Hạt điều Bình Phước</h5>
                        <p class="card-text text-danger fw-bold">200.000đ</p>
                        <button class="btn btn-outline-brown mt-auto w-100">Thêm vào giỏ</button>
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