<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng nhập - Đặc Sản Ba Miền</title>

  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/Trang-chu.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
  <link rel="icon" href="img/icon.png" type="image/png">

  <style>
    body {
      background: url("img/Anh/Banner/banner.jpg") no-repeat center center fixed;
      background-size: cover;
      position: relative;
    }

    body::before {
      content: "";
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0,0,0,0.3); 
      z-index: -1;
    }

    .login-container {
      max-width: 450px;
      margin: 80px auto;
      position: relative;
      z-index: 1;
    }

    .login-card {
      border-radius: 15px;
      overflow: hidden;
      background: rgba(255,255,255,0.95);
      backdrop-filter: blur(5px);
      border: none;
    }

    .login-header {
      text-align: center;
      padding: 25px 15px 10px;
    }

    .login-header h4 {
      color: #8B4513;
      font-weight: 800;
      text-transform: uppercase;
    }

    .text-brown {
      color: #8B4513;
    }

    .border-brown {
      border-color: #8B4513 !important;
    }

    .btn-login {
      border-radius: 10px;
      font-weight: bold;
      background: #8B4513;
      color: white;
      border: none;
      padding: 10px;
      transition: 0.3s;
    }

    .btn-login:hover {
      background: #6e3410;
      color: white;
    }
    
    .form-control:focus {
      border-color: #8B4513;
      box-shadow: 0 0 0 0.25rem rgba(139, 69, 19, 0.25);
    }
    
    a {
      color: #8B4513;
      text-decoration: none;
    }
    
    a:hover {
      color: #6e3410;
      text-decoration: underline;
    }
  </style>

  <script src="js/bootstrap.bundle.js"></script>
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
            <li class="nav-item dropdown">
            <li class="nav-item">
              <a class="nav-link" href="bai-viet.php">Bài viết</a>
            </li>
              <a class="nav-link dropdown-toggle" href="san-pham.php" role="button" data-bs-toggle="dropdown">Sản phẩm</a>
             <ul class="dropdown-menu border-brown">
                <li><a class="dropdown-item" href="Dac-san-mien-bac.php">Đặc sản miền Bắc</a></li>
                <li><a class="dropdown-item" href="Dac-san-mien-trung.php">Đặc sản miền Trung</a></li>
                <li><a class="dropdown-item" href="Dac-san-mien-nam.php">Đặc sản miền Nam</a></li>
                	<li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item fw-bold" href="San-pham-ban-chay.php">Sản phẩm bán chạy</a></li>
             
              </ul>
            </li>
            <li class="nav-item"><a class="nav-link" href="gio-hang.php">Giỏ hàng</a></li>
            <li class="nav-item"><a class="nav-link" href="dang-ky.php">Đăng ký</a></li>
            <li class="nav-item"><a class="nav-link active fw-bold" href="dang-nhap.php">Đăng nhập</a></li>
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

    <div class="login-container">
      <div class="card shadow-lg login-card">
        <div class="login-header">
          <h4><i class="bi bi-person-circle"></i> Đăng nhập</h4>
        </div>

        <div class="card-body p-4">
  		  <form action="trang-chu-2.php">
            <div class="mb-3">
              <label class="form-label fw-bold text-brown">Tên đăng nhập</label>
              <input type="text" class="form-control border-brown" placeholder="Nhập username">
            </div>

            <div class="mb-3">
              <label class="form-label fw-bold text-brown">Mật khẩu</label>
              <input type="password" class="form-control border-brown" placeholder="Nhập mật khẩu">
            </div>

            <div class="d-flex justify-content-between mb-4">
              <div class="form-check">
                <input class="form-check-input border-brown" type="checkbox" id="remember">
                <label class="form-check-label" for="remember">Ghi nhớ</label>
              </div>
              <a href="#" data-bs-toggle="modal" data-bs-target="#forgotModal" class="fw-bold">Quên mật khẩu?</a>
            </div>

            <button type="submit" class="btn btn-login w-100 shadow-sm">ĐĂNG NHẬP</button>

            <p class="text-center mt-4 mb-0">
              Chưa có tài khoản?
              <a href="dang-ky.php" class="fw-bold">Đăng ký ngay</a>
            </p>
          </form>
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
              <li><a href="trang-chu.php" class="text-brown">Trang chủ</a></li>
              <li><a href="gio-hang.php" class="text-brown">Giỏ hàng</a></li>
              <li><a href="dang-nhap.php" class="text-brown">Đăng nhập</a></li>
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

  <div class="modal fade" id="forgotModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header border-0">
          <h5 class="modal-title fw-bold text-brown">Khôi phục mật khẩu</h5>
          <button class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <p>Vui lòng nhập email để nhận mã khôi phục:</p>
          <input type="email" class="form-control border-brown" placeholder="email@example.com">
        </div>
        <div class="modal-footer border-0">
          <button class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
          <button class="btn btn-login px-4">Gửi</button>
        </div>
      </div>
    </div>
  </div>

</body>
</html>