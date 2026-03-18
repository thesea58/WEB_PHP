<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng ký - Đặc Sản Ba Miền</title>

  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/Trang-chu.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
  <link rel="icon" href="img/icon.png" type="image/png">

  <script src="js/bootstrap.bundle.js"></script>
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
      background: rgba(0,0,0,0.4); /* Làm tối nền một chút để form nổi bật hơn */
      z-index: -1;
    }

    .auth-card {
      max-width: 720px;
      margin: 60px auto;
      border-radius: 15px;
      background: rgba(255,255,255,0.95);
      backdrop-filter: blur(5px);
      border: none;
    }

    .auth-header {
      text-align: center;
      padding: 25px 15px 10px;
    }

    .auth-header h2 {
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

    .btn-register {
      background: #8B4513;
      color: white;
      border-radius: 10px;
      font-weight: bold;
      transition: 0.3s;
    }

    .btn-register:hover {
      background: #6e3410;
      color: white;
    }

    label {
      font-weight: 600;
      color: #5d2e0d;
      margin-bottom: 5px;
    }
    
    .form-control:focus {
        border-color: #8B4513;
        box-shadow: 0 0 0 0.25rem rgba(139, 69, 19, 0.25);
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
            <li class="nav-item"><a class="nav-link active fw-bold" href="dang-ky.php">Đăng ký</a></li>
            <li class="nav-item"><a class="nav-link" href="dang-nhap.php">Đăng nhập</a></li>
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

    <div class="container py-4">
      <div class="card shadow-lg auth-card">
        <div class="auth-header">
          <h2><i class="bi bi-person-plus-fill"></i> ĐĂNG KÝ</h2>
          <p class="text-muted">Tham gia cùng chúng tôi để nhận ưu đãi hấp dẫn</p>
        </div>

        <div class="card-body p-4">
          <form method="POST">
            <div class="row g-3">
              <div class="col-md-6">
                <label>Tên đăng nhập</label>
                <input type="text" name="username" class="form-control border-brown" placeholder="VD: dacsan123" required>
              </div>

              <div class="col-md-6">
                <label>Họ và tên</label>
                <input type="text" name="fullname" class="form-control border-brown" placeholder="Nguyễn Văn A" required>
              </div>

              <div class="col-md-6">
                <label>Email</label>
                <input type="email" name="email" class="form-control border-brown" placeholder="email@example.com" required>
              </div>

              <div class="col-md-6">
                <label>Số điện thoại</label>
                <input type="text" name="phone" class="form-control border-brown" placeholder="090..." required>
              </div>

              <div class="col-md-6">
                <label>Giới tính</label><br>
                <div class="mt-2">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="male" value="Nam" checked>
                        <label class="form-check-label" for="male">Nam</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="female" value="Nữ">
                        <label class="form-check-label" for="female">Nữ</label>
                    </div>
                </div>
              </div>

              <div class="col-md-6">
                <label>Ngày sinh</label>
                <input type="date" name="dob" class="form-control border-brown" required>
              </div>

              <div class="col-md-6">
                <label>Mật khẩu</label>
                <input type="password" name="password" class="form-control border-brown" required>
              </div>

              <div class="col-md-6">
                <label>Nhập lại mật khẩu</label>
                <input type="password" name="confirmPassword" class="form-control border-brown" required>
              </div>
            </div>

            <button type="submit" class="btn btn-register w-100 mt-4 py-2 fs-5 shadow-sm">TẠO TÀI KHOẢN</button>

            <p class="text-center mt-3 mb-0">
              Đã có tài khoản? 
              <a href="dang-nhap.php" class="text-brown fw-bold text-decoration-none">Đăng nhập ngay</a>
            </p>
          </form>
        </div>
      </div>
    </div>

    <footer id="footer" class="pt-5 pb-2 border-top bg-white mt-5">
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