<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặc Sản Miền Nam - Đặc Sản Ba Miền</title>
    
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/Trang-chu.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="icon" href="img/icon.png" type="image/png">
    
    <script src="js/bootstrap.bundle.js"></script>
    <style>
		/* 1. Lớp bọc nội dung có ảnh nền */
    .banner-background-section {
        background: url("img/Anh/Banner/banner.jpg") no-repeat center center fixed;
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
        <a class="navbar-brand d-flex align-items-center" href="trang-chu.php">
          <img src="img/Anh/Banner/logo.jpg" alt="Logo" class="nav-logo" style="height: 120px;">
<span class="brand-text ms-2" style="color: #8B4513; font-weight: 800; font-size: 1.4rem; text-transform: uppercase;">ĐẶC SẢN BA MIỀN</span>
        </a>
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
          <ul class="navbar-nav fs-5">
            <li class="nav-item"><a class="nav-link" href="trang-chu.php">Trang chủ</a></li>
            <li class="nav-item">
            <li class="nav-item">
                <a class="nav-link" href="gioi-thieu.php">Giới thiệu</a>
            </li>
              <a class="nav-link" href="bai-viet.php">Bài viết</a>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle active fw-bold" href="san-pham.php" role="button" data-bs-toggle="dropdown">Sản phẩm</a>
              <ul class="dropdown-menu border-brown">
                <li><a class="dropdown-item" href="Dac-san-mien-bac.php">Đặc sản miền Bắc</a></li>
                <li><a class="dropdown-item" href="Dac-san-mien-trung.php">Đặc sản miền Trung</a></li>
                <li><a class="dropdown-item" href="Dac-san-mien-nam.php">Đặc sản miền Nam</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item fw-bold" href="San-pham-ban-chay.php">🔥Sản phẩm bán chạy</a></li>
             </ul>
            </li>
              <li class="nav-item">
              <a class="nav-link position-relative" href="gio-hang.php">
                Giỏ hàng
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 0.7rem;">3</span>
              </a>
            </li>
           <li class="nav-item dropdown ms-lg-3">
              <a class="nav-link dropdown-toggle" href="san-pham.php" role="button" data-bs-toggle="dropdown">
                Tài khoản
              </a>
              <ul class="dropdown-menu dropdown-menu-end border-brown shadow">
                <li><a class="dropdown-item" href="thong-tin-ca-nhan.php"><i class="bi bi-person me-2"></i>Cá nhân</a></li>
                <li><a class="dropdown-item" href="don-hang-cua-toi.php"><i class="bi bi-bag-check me-2"></i>Đơn hàng</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item text-danger" href="trang-chu.php"><i class="bi bi-box-arrow-right me-2"></i>Đăng xuất</a></li>
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
    
<div class="banner-background-section">
    <div class="container bg-white p-5 shadow-sm rounded">
        
        <div class="text-center mb-5">
            <h1 class="fw-bold text-brown" style="font-family: 'Times New Roman', serif; text-transform: uppercase;">Bánh Chưng Làng Đầm – Tinh Hoa Ẩm Thực Đất Hà Nam</h1>
            <p class="text-muted"><i>Thức quà truyền thống đậm tình xứ Bắc</i></p>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-10 fs-5" style="line-height: 1.8; text-align: justify;">
<p>Bánh chưng làng Đầm, đặc sản nổi bật của vùng Hà Nam xưa, là món quà truyền thống giàu ý nghĩa mỗi độ Tết đến xuân về. Hương nếp thơm quyện trong từng chiếc bánh không chỉ gợi nhắc không khí sum họp, mà còn là thức quà biếu được yêu thích trải dài khắp các tỉnh phía Bắc.</p>

                <h3 class="text-brown fw-bold mt-4">1. Biểu tượng ẩm thực Hà Nam</h3>
                <p>Nằm tại thôn Bích Trì, Liêm Tuyền, làng Đầm nổi tiếng với nghề làm bánh chưng truyền thống được truyền từ đời này sang đời khác. Điểm đặc biệt của bánh nơi đây là kỹ thuật <b>gói thủ công không dùng khuôn</b> nhưng vẫn vuông vắn, chắc tay. Vỏ bánh xanh mướt từ lá dong ôm trọn nhân nếp cái hoa vàng, đậu xanh bùi và thịt lợn ba chỉ đậm đà.</p>

                <div class="my-4 text-center">
                    <img src="img/Anh/Bac/BanhChung.jpg" alt="Bánh chưng làng Đầm trứ danh" class="img-fluid rounded shadow-sm" style="max-height: 400px; width: 100%; object-fit: cover; background-color: #f0f0f0;">
                    <p class="text-muted mt-2" style="font-size: 0.9rem;"><i>Hình 1: Bánh chưng làng Đầm nổi tiếng với vẻ ngoài vuông vắn dù không dùng khuôn</i></p>
                </div>

                <h3 class="text-brown fw-bold mt-5">2. Quy trình chế biến tỉ mỉ</h3>
                <p>Để có một chiếc bánh đạt chuẩn, người thợ phải chọn gạo nếp cái hoa vàng Hải Hậu dẻo thơm, đỗ xanh mẩy hạt và thịt lợn ba chỉ tươi ngon được tẩm ướp vừa vặn. Lá dong phải chọn loại lá to, xanh, không quá già cũng không quá non.</p>
                
                <p><b>Bí quyết làm nên thương hiệu:</b> Người dân làng Đầm sử dụng <b>nước mưa</b> để luộc bánh trong nồi tôn truyền thống suốt 10 tiếng đồng hồ. Sự kết hợp này giúp bánh chín dền, dẻo và giữ được mùi thơm tự nhiên đặc trưng mà không loại bánh nào có được.</p>

                <div class="my-4 text-center">
                    <img src="img/Anh/Bac/GoiBanh.jpg" alt="Quy trình làm bánh chưng" class="img-fluid rounded shadow-sm" style="max-height: 400px; background-color: #f0f0f0;">
                    <p class="text-muted mt-2" style="font-size: 0.9rem;"><i>Hình 2: Công đoạn luộc bánh bằng nước mưa và nồi tôn truyền thống</i></p>
                </div>

                <h3 class="text-brown fw-bold mt-5">3. Cách thưởng thức đúng vị</h3>
                <p>Khi thưởng thức, nên rọc lá dong theo bốn góc để giữ nguyên khối bánh. Từng miếng bánh xanh bóng, thơm ngậy nhân đậu thịt, ăn kèm với dưa hành muối hoặc củ kiệu sẽ tạo nên sự cân bằng hoàn hảo, tôn vinh tinh hoa ẩm thực Việt.</p>
<h3 class="text-brown fw-bold mt-5">4. Giá trị văn hóa và kinh tế</h3>
                <p>Năm 2025, bánh chưng làng Đầm không chỉ là món ăn mà còn là sợi dây gắn kết cộng đồng, giải quyết việc làm cho hàng chục hộ dân địa phương. Mỗi dịp Tết, làng nghề có thể cung ứng hàng nghìn chiếc bánh đi khắp các đô thị lớn như Hà Nội, Hải Phòng, mang theo câu chuyện truyền thống của cha ông đi xa hơn.</p>

                <div class="p-4 my-4 border-start border-4 border-brown bg-light">
                    <p class="mb-0"><i>"Hương vị bánh chưng làng Đầm chạm tới ký ức về những mùa Tết sum vầy, là thành quả của sự kiên nhẫn và lòng yêu nghề của người dân đất Bắc."</i></p>
                </div>

                <p class="text-end fw-bold text-brown mt-4">Nguồn: Đặc sản Ba Miền tổng hợp</p>
            </div>
        </div>

    </div>
</div>



    <footer id="footer" class="pt-5 pb-2 border-top bg-white">
      <div class="container">
        <div class="row">
          <div class="col-md-4 mb-3 text-brown">
            <img src="img/Anh/Banner/logo.jpg" alt="Logo" class="nav-logo" style="height: 120px;">
            <p class="mt-3">
              Đặc sản ba miền – Tinh hoa ẩm thực Việt!<br>
              Mang đến hương vị truyền thống chuẩn vị Bắc – Trung – Nam.
            </p>
          </div>

          <div class="col-md-4 mb-3">
            <h3 style="color: #8B4513;">Liên kết nhanh</h3>
            <ul class="list-unstyled">
              <li><a href="trang-chu.php" class="text-decoration-none text-brown">Trang chủ</a></li>
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