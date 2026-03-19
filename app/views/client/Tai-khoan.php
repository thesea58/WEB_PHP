<?php session_start(); ?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tài khoản - Đặc Sản Ba Miền</title>

  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="css/Trang-chu.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

  <script src="js/bootstrap.bundle.js"></script>

  <style>
    body {
      background: #f5f5f5;
    }

    .text-brown {
      color: #8B4513;
    }

    .account-container {
      display: flex;
      gap: 20px;
      padding: 30px;
    }

    .account-sidebar {
      width: 260px;
      background: #fff;
      border-radius: 10px;
      padding: 20px;
    }

    .account-content {
      flex: 1;
      background: #fff;
      border-radius: 10px;
      padding: 25px;
    }

    .user-avatar img {
      width: 80px;
      border-radius: 50%;
    }

    .menu-item {
      padding: 10px;
      border-radius: 5px;
      cursor: pointer;
    }

    .menu-item:hover,
    .menu-item.active {
      background: #f3e5d8;
      color: #8B4513;
      font-weight: bold;
    }

    .btn-brown {
      background: #8B4513;
      color: white;
      border: none;
    }

    .btn-brown:hover {
      background: #6b3210;
    }
  </style>
</head>

<body>
  <div class="container-fluid p-0">

    <nav id="nav" class="navbar navbar-expand-lg bg-white navbar-light sticky-top shadow-sm">
      <div class="container-fluid">

        <a class="navbar-brand d-flex align-items-center" href="index.php?controller=TrangChu&action=index">
          <img src="img/Anh/Banner/logo.jpg" alt="Logo" class="nav-logo" style="height: 120px;">
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
                <a class="nav-link" href="gioi-thieu.php">Giới thiệu</a>
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
            <li class="nav-item"><a class="nav-link" href="dang-nhap.php">Đăng nhập</a></li>
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

  <!-- ACCOUNT -->
  <div class="account-container">

    <!-- SIDEBAR -->
    <div class="account-sidebar text-center">
      <div class="user-avatar">
        <img src="img/avt.jpg">
      </div>
      <div class="fw-bold mt-2">Nguyễn Văn A</div>
      <a href="#" class="text-brown"><i class="bi bi-pencil-square"></i> Sửa hồ sơ</a>

      <hr>

      <div class="menu-item active">Tài khoản của tôi</div>
      <div class="menu-item">Đơn mua</div>
      <div class="menu-item">Thông báo</div>
      <div class="menu-item">Ví</div>
    </div>

    <!-- CONTENT -->
    <div class="account-content">

      <h4 class="text-brown">Hồ sơ cá nhân</h4>

      <div class="mb-3">
        <label>Tên đăng nhập</label>
        <input class="form-control" value="nguyenvana">
      </div>

      <div class="mb-3">
        <label>Họ tên</label>
        <input class="form-control" value="Nguyễn Văn A">
      </div>

      <div class="mb-3">
        <label>Email</label>
        <input class="form-control" value="nguyenvana@gmail.com">
      </div>

      <button class="btn btn-brown">Lưu thay đổi</button>

      <hr>

      <h4 class="text-brown mt-3">Đổi mật khẩu</h4>

      <input class="form-control mb-2" type="password" placeholder="Mật khẩu cũ">
      <input class="form-control mb-2" type="password" placeholder="Mật khẩu mới">
      <input class="form-control mb-2" type="password" placeholder="Nhập lại mật khẩu">

      <button class="btn btn-brown mt-2">Cập nhật mật khẩu</button>

    </div>

  </div>

  <!-- FOOTER (giữ style giống trang chủ) -->
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