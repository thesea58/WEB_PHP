<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Xử lý đơn hàng - Đặc Sản Ba Miền</title>

  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/Trang-chu.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

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
      background: rgba(0,0,0,0.3);
      z-index: -1;
    }

    .text-brown {
      color: #8B4513;
    }

    .btn-brown {
      background: #8B4513;
      color: white;
      border: none;
    }

    .btn-brown:hover {
      background: #6b3210;
    }

    .order-container {
      padding: 30px;
    }
  </style>
</head>

<body>

<div class="container-fluid p-0">

  <!-- NAVBAR -->
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
            <li class="nav-item">
                <a class="nav-link" href="trang-chu.php">Trang chủ</a>
            </li>
        
            <li class="nav-item">
                <a class="nav-link" href="bai-viet.php">Bài viết</a>
            </li>
        
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle active fw-bold" href="san-pham.php" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Sản phẩm
                </a>
                <ul class="dropdown-menu border-brown">
                    <li><a class="dropdown-item" href="Dac-san-mien-bac.php">Đặc sản miền Bắc</a></li>
                    <li><a class="dropdown-item" href="Dac-san-mien-trung.php">Đặc sản miền Trung</a></li>
                    <li><a class="dropdown-item" href="Dac-san-mien-nam.php">Đặc sản miền Nam</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item fw-bold" href="san-pham-ban-chay.php">Sản phẩm bán chạy</a></li>
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

  <!-- CONTENT -->
  <div class="order-container container">

  <h3 class="text-white text-center mb-4"><b>Xử lý đơn hàng</b></h3>

  <table class="table table-bordered text-center bg-white">
    <thead class="table-light">
      <tr>
        <th>Mã đơn</th>
        <th>Khách hàng</th>
        <th>Sản phẩm</th>
        <th>Nơi giao</th>
        <th>Tổng tiền</th>
        <th>Trạng thái</th>
        <th>Hành động</th>
      </tr>
    </thead>
<tbody>
  <tr>
    <td>#001</td>
    <td>Nguyễn Văn A</td>
    <td>Khô cá miền Tây</td>
    <td>TP.HCM</td>
    <td class="text-danger">120.000đ</td>
    <td>Chờ xử lý</td>
    <td>Duyệt</td>
  </tr>

  <tr>
    <td>#002</td>
    <td>Trần Thị B</td>
    <td>Lạp xưởng</td>
    <td>Điện Biên</td>
    <td class="text-danger">200.000đ</td>
    <td>Đang giao</td>
    <td>Đang giao</td>
  </tr>

  <tr>
    <td>#003</td>
    <td>Lê Văn C</td>
    <td>Bánh pía</td>
    <td>Cần Thơ</td>
    <td class="text-danger">95.000đ</td>
    <td>Hoàn thành</td>
    <td>Xong</td>
  </tr>

  <tr>
    <td>#004</td>
    <td>Phạm Thị D</td>
    <td>Mực khô Phan Thiết</td>
    <td>Đà Nẵng</td>
    <td class="text-danger">150.000đ</td>
    <td>Chờ xử lý</td>
    <td>Duyệt</td>
  </tr>

  <tr>
    <td>#005</td>
    <td>Hoàng Văn E</td>
    <td>Bánh đậu xanh Hải Dương</td>
    <td>Hải Phòng</td>
    <td class="text-danger">70.000đ</td>
    <td>Đang giao</td>
    <td>Đang giao</td>
  </tr>
</tbody>
  </table>

</div>

  <!-- FOOTER -->
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