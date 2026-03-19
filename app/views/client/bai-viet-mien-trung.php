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
            <h1 class="fw-bold text-brown" style="font-family: 'Times New Roman', serif;">CỘI NGUỒN RƯỢU BÀU ĐÁ BÌNH ĐỊNH</h1>
            <p class="text-muted"><i>Tác giả: LAN ANH</i></p>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-10 fs-5" style="line-height: 1.8; text-align: justify;">
                

                <p>Ngày xửa ngày xưa, men theo hai bờ sông Kôn từ thượng nguồn xuôi về hạ bạn, có nhiều làng rượu ngon nổi tiếng, nhất là các làng: Vĩnh Phúc, Vĩnh Cửu, Tiên Thuận, Đồng Hào, Phú Lạc, Phú Mỹ, Vĩnh Lộc, An Vinh… Thuộc Tây Sơn hạ đạo, mà dân gian thường gọi là rượu Tây Sơn.</p>
                
                <p>Còn <b>rượu Bàu Đá</b> cái “Thương hiệu” của rượu Bình Định nổi danh trong Nam, ngoài Bắc ngày nay cũng chính là dòng rượu Tây Sơn, cùng thừa hưởng chung dòng nước ngọt ngào của ngọn nguồn sông Kôn được ủ lạnh, lọc trong từ những hộc đá ngầm ở Vực Bà, Nước Miên, Nước Trinh, sông Kxôm, Hầm hô… ban tặng cho một dòng sông, một vùng đất; nhưng cái tên rượu Bàu Đá như một câu chuyện dân gian lại bắt đầu từ xóm “Tân Long”.</p>

                <p>Xóm có tên gọi Tân Long, (thôn Cù Lâm, xã Nhơn Lộc, huyện An Nhơn, tỉnh Bình Định), xưa nay chuyên nghề làm ruộng, tại xóm Tân Long có một cái bàu rộng khoảng 3 sào của ông xã Lựu, trong bàu có nhiều hòn đá to do thiên nhiên sinh ra. Từ khi xóm Bàu Đá nấu rượu và phát triển kinh doanh nghề rượu người ta lấy tên xóm Bàu Đá đặt cho tên rượu gọi là “rượu Bàu Đá”.</p>

                <div class="my-4 text-center">
                    <img src="img/Anh/Trung/cong.jpg" alt="Xóm Tân Long Bình Định" class="img-fluid rounded shadow-sm" style="max-height: 400px; background-color: #f0f0f0;">
                    <p class="text-muted mt-2" style="font-size: 0.9rem;"><i>Hình 2: Nơi khởi nguồn của thương hiệu rượu danh tiếng</i></p>
                </div>

                <h3 class="text-brown fw-bold mt-5">Quy trình nấu rượu cổ truyền</h3>
                <p>Đặc biệt ở cái xóm rượu Bàu Đá này vẫn giữ nguyên công thức cổ truyền từ việc chọn gạo; kỹ thuật nấu cơm; họ không dùng các loại men bột công nghiệp mà chọn loại men bánh dân gian. Kỹ thuật ủ cơm rượu phải lấy từ giếng bộng đất nung, hoặc giếng đá ong. Họ không nấu nồi nhôm mà là nồi đồng, nắp đậy nồi bằng đất nung; cất rượu bằng ống tre…</p>

                <div class="my-4 text-center">
                    <img src=" img/Anh/Trung/nau.jpg" alt="Quy trình nấu rượu Bàu Đá" class="img-fluid rounded shadow-sm" style="max-height: 400px; background-color: #f0f0f0;">
<p class="text-muted mt-2" style="font-size: 0.9rem;"><i>Hình 3: Nghệ nhân thực hiện các bước nấu rượu thủ công</i></p>
                </div>

                <h3 class="text-brown fw-bold mt-5">Cách thưởng lãm cầu kỳ</h3>
                <p>Thưởng lãm rượu Bàu Đá cũng cầu kỳ lắm lắm; Rượu trong bầu, chai, nậm phải rót ra bình gọi là ve vòi. Rót rượu ra chén hạt mít sao cho có tiếng kêu róc rách, vun bọt nhưng rượu không được tràn ra miệng chén. Ngậm một ngụm rượu trong giây lát, uống xong ta thấy đọng lại vị ngọt thanh, mùi thơm khó tả…</p>

                <div class="p-4 my-4 border-start border-4 border-brown bg-light italic">
                    <p class="mb-0"><i>"Ai về Bình Định mà chưa được thưởng thức món chim mía Tây Sơn; chim se sẻ, nem chợ huyện Tuy Phước nhâm nhi với chén rượu Bàu Đá coi như chưa về Bình Định vậy."</i></p>
                </div>

                <p>Rượu Bàu Đá thường được dùng trong những ngày giỗ chạp, lễ nghi, hội hè, đình đám, nhất là những ngày Tết cổ truyền. Con cháu nội ngoại về mừng tuổi ông, bà có chén rượu Bàu Đá đặt lên bàn thờ thắp nén hương thành kính ta thấy ấm cúng thiêng liêng…</p>
                
                <p class="text-end fw-bold text-brown mt-4">“Rượu Bàu Đá” – Nét văn hóa đặc trưng của miền đất võ Tây Sơn, Bình Định</p>
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
