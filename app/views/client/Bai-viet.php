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
		/* 1. Lớp bọc nội dung có ảnh nền */
    .banner-background-section {
        background: url("app/views/client/img/Anh/Banner/banner.jpg") no-repeat center center fixed;
        background-size: cover;
        position: relative; /* Quan trọng để lớp mờ bám theo div này */
        padding: 60px 0;    /* Tạo khoảng trống trên dưới cho đẹp */
    }

    /* 2. Lớp phủ mờ (overlay) chỉ nằm trong div này */
    .banner-background-section::before {
        content: "";
        position: absolute;
        top: 0; 
        left: 0; 
        width: 100%; 
        height: 100%;
        background: rgba(255, 255, 255, 0.7); /* Màu trắng mờ 70% giúp sản phẩm nổi bật */
        z-index: 1; /* Nằm dưới nội dung */
    }

    /* 3. Đảm bảo nội dung (Container) nằm trên lớp mờ */
    .banner-background-section .container {
        position: relative;
        z-index: 2; /* Nằm trên lớp overlay */
    }

    /* Giữ các class hỗ trợ khác */
    .text-brown { color: #8B4513; }
    .product-card { border: none; transition: 0.3s; }
    .product-card:hover { transform: translateY(-5px); box-shadow: 0 5px 15px rgba(0,0,0,0.2) !important; }
        
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
          <button class="btn" type="submit" style="background-color: #8B4513; color: white; border: none;">
            <i class="bi bi-search"></i>
          </button>
        </form>
      </div>
    </nav>
    
<div class="container my-5">
        <div class="text-center mb-5">
            <h2 class="fw-bold text-brown" style="text-transform: uppercase;">Bài Viết Đặc Sản Ba Miền</h2>
            <p class="text-center mb-5 text-muted">
            Việt Nam không chỉ nổi tiếng với cảnh đẹp mà còn là thiên đường ẩm thực đa dạng và đặc sắc. 
            Trải dài từ Bắc vào Nam, mỗi vùng miền đều mang đến những hương vị riêng biệt, phản ánh rõ nét 
            bản sắc văn hóa và truyền thống địa phương. Những món đặc sản tiêu biểu không chỉ làm say lòng 
            người thưởng thức mà còn góp phần lưu giữ tinh hoa ẩm thực dân tộc, tạo nên một bức tranh ẩm thực 
            Việt Nam đầy màu sắc và hấp dẫn.
            </p>
        </div>

        <div class="row">
            <div class="col-md-4 text-center mb-4">
                <div class="p-4 border rounded shadow-sm h-100 d-flex flex-column bg-light product-card">
                    <img src="app/views/client/img/Anh/Bac/banhchung_langdam_HaNam.png" alt="Ảnh đặc sản miền Bắc" class="img-fluid mb-3 rounded shadow-sm" style="height: 200px; object-fit: cover; background-color: #ddd;">
                    
                    <h4 class="fw-bold text-brown">Bánh chưng làng Đầm Hà Nam - Đặc sản miền Bắc</h4>
                    <p class="text-muted flex-grow-1">Giá trị văn hoá và bí quyết làm nên tên tuổi bánh chưng làng Đầm</p>
                    <a href="index.php?controller=BaiVietMienBac&action=index" class="btn btn-outline-brown w-100 mt-3">Xem thêm</a>
                </div>
            </div>
<div class="col-md-4 text-center mb-4">
                <div class="p-4 border rounded shadow-sm h-100 d-flex flex-column bg-light product-card">
                    <img src="app/views/client/img/Anh/Nam/trasen_dongthap.jpg" alt="Cua Cà Mau" class="img-fluid mb-3 rounded shadow-sm" style="height: 200px; object-fit: cover; background-color: #ddd;">
                    
                    <h4 class="fw-bold text-brown">Trà sen Đồng Tháp - Đặc sản miền Nam</h4>
                    <p class="text-muted flex-grow-1">Trà Oolong Sen, dược liệu quý từ thiên nhiên Đồng Tháp</p>
                    <a href="index.php?controller=BaiVietMienNam&action=index" class="btn btn-outline-brown w-100 mt-3">Xem thêm</a>
                </div>
            </div>

            <div class="col-md-4 text-center mb-4">
                <div class="p-4 border rounded shadow-sm h-100 d-flex flex-column bg-light product-card">
                    <img src="app/views/client/img/Anh/Trung/ruoubauda_binhdinh.jpg" alt="Ảnh đặc sản miền Trung" class="img-fluid mb-3 rounded shadow-sm" style="height: 200px; object-fit: cover; background-color: #ddd;">
                    
                    <h4 class="fw-bold text-brown">Rượu bầu đá Bình Định - Đặc sản miền Trung</h4>
                    <p class="text-muted flex-grow-1">Cội nguồn rượu Bầu Đá Bình Định</p>
                    <a href="index.php?controller=BaiVietMienTrung&action=index" class="btn btn-outline-brown w-100 mt-3">Xem thêm</a>
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
