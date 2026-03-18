<?php session_start(); ?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thanh Toán - Đặc Sản Ba Miền</title>
  
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/Trang-chu.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
  <link rel="icon" href="img/icon.png" type="image/png">
  
  <script src="js/bootstrap.bundle.js"></script>

  <style>
    body { background: #f8f9fa; }
    .card { border-radius: 15px; border: none; box-shadow: 0 4px 15px rgba(0,0,0,0.05); }
    .title { color: #8B4513; font-weight: 800; border-left: 5px solid #8B4513; padding-left: 15px; text-transform: uppercase; margin-bottom: 20px; }
    
    .btn-pay { background: #8B4513; color: white; font-weight: bold; border-radius: 10px; border: none; transition: 0.3s; }
    .btn-pay:hover { background: #6e3410; color: white; transform: translateY(-2px); }
    
    .text-brown { color: #8B4513; }
    .border-brown { border-color: #8B4513 !important; }
    
    .form-control:focus { border-color: #8B4513; box-shadow: 0 0 0 0.25rem rgba(139, 69, 19, 0.15); }
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
            <a class="nav-link dropdown-toggle" href="san-pham.php" role="button" data-bs-toggle="dropdown">Sản phẩm</a>
            <ul class="dropdown-menu border-brown">
              <li><a class="dropdown-item" href="san-pham.php?danhmuc=mien-bac">Đặc sản miền Bắc</a></li>
              <li><a class="dropdown-item" href="san-pham.php?danhmuc=mien-trung">Đặc sản miền Trung</a></li>
              <li><a class="dropdown-item" href="san-pham.php?danhmuc=mien-nam">Đặc sản miền Nam</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item fw-bold" href="san-pham.php?danhmuc=ban-chay">Sản phẩm bán chạy</a></li>
            </ul>
          </li>
          <li class="nav-item"><a class="nav-link" href="gio-hang.php">Giỏ hàng</a></li>
          <li class="nav-item"><a class="nav-link" href="dang-ky.php">Đăng ký</a></li>
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

  <div class="container py-5">
    <h2 class="text-center fw-bold mb-5 text-brown">HOÀN TẤT ĐƠN HÀNG</h2>
    
    <form method="POST" action="xu-ly-thanh-toan.php"> 
      <div class="row g-4">
        <div class="col-lg-8">
          <div class="card p-4 mb-4">
            <h5 class="title">THÔNG TIN KHÁCH HÀNG</h5>
            <div class="row g-3 mt-1">
              <div class="col-md-6">
                <label class="form-label fw-bold">Họ và tên *</label>
                <input name="name" class="form-control border-brown" placeholder="Nhập họ và tên" required>
              </div>
              <div class="col-md-6">
                <label class="form-label fw-bold">Số điện thoại *</label>
                <input name="phone" class="form-control border-brown" placeholder="Nhập số điện thoại" required>
              </div>
              <div class="col-12">
                <label class="form-label fw-bold">Địa chỉ giao hàng *</label>
                <input name="address" class="form-control border-brown" placeholder="Số nhà, tên đường, phường/xã, quận/huyện..." required>
              </div>
              <div class="col-12">
                <label class="form-label fw-bold">Email</label>
                <input name="email" type="email" class="form-control border-brown" placeholder="email@example.com">
              </div>
              <div class="col-12">
                <label class="form-label fw-bold">Ghi chú đơn hàng</label>
                <textarea name="note" class="form-control border-brown" rows="3" placeholder="Yêu cầu đặc biệt về thời gian giao hàng..."></textarea>
              </div>
            </div>
          </div>

          <div class="card p-4">
            <h5 class="title">PHƯƠNG THỨC THANH TOÁN</h5>
            <div class="form-check mt-3">
              <input class="form-check-input border-brown" type="radio" name="pay" value="cod" id="pay1" checked>
              <label class="form-check-label fw-bold" for="pay1">Thanh toán khi nhận hàng (COD)</label>
              <p class="text-muted small">Quý khách thanh toán tiền mặt cho nhân viên giao hàng.</p>
            </div>
            <div class="form-check mt-2">
              <input class="form-check-input border-brown" type="radio" name="pay" value="bank" id="pay2">
              <label class="form-check-label fw-bold" for="pay2">Chuyển khoản ngân hàng</label>
              <p class="text-muted small">Hệ thống sẽ cung cấp số tài khoản sau khi bạn bấm xác nhận.</p>
            </div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="card p-4 sticky-top" style="top: 140px; z-index: 1;">
            <h5 class="title">ĐƠN HÀNG CỦA BẠN</h5>
            <div class="order-items mt-3">
              <?php
              $tong = 0;
              if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
                  $_SESSION['cart'] = [
                      ["ten" => "Bánh cốm Hà Nội", "gia" => 50000, "soluong" => 2],
                      ["ten" => "Nem chua Thanh Hóa", "gia" => 60000, "soluong" => 1],
                      ["ten" => "Khô cá lóc miền Tây", "gia" => 120000, "soluong" => 1]
                  ];
              }

              foreach ($_SESSION['cart'] as $item) {
                  $thanhtien = $item['gia'] * $item['soluong'];
                  $tong += $thanhtien;
                  echo '<div class="d-flex justify-content-between mb-2">
                          <span class="text-muted">' . $item['ten'] . ' <small>(x' . $item['soluong'] . ')</small></span>
                          <span class="fw-bold">' . number_format($thanhtien, 0, ',', '.') . 'đ</span>
                        </div>';
              }
              ?>
            </div>

            <hr class="my-3">
            <div class="d-flex justify-content-between mb-2">
              <span>Tạm tính</span>
              <span class="fw-bold"><?php echo number_format($tong, 0, ',', '.'); ?>đ</span>
            </div>
            <div class="d-flex justify-content-between mb-2">
              <span>Phí vận chuyển</span>
              <span class="fw-bold">20.000đ</span>
            </div>
            <hr class="my-3">
            <div class="d-flex justify-content-between align-items-center">
              <h5 class="fw-bold mb-0">TỔNG CỘNG</h5>
              <h4 class="text-danger fw-bold mb-0"><?php echo number_format($tong + 20000, 0, ',', '.'); ?>đ</h4>
            </div>

            <button type="submit" class="btn btn-pay w-100 mt-4 py-3 fs-5 shadow-sm">
              ĐẶT HÀNG NGAY
            </button>
            <p class="text-center mt-3 small text-muted italic">
              <i class="bi bi-shield-check"></i> Cam kết thông tin được bảo mật
            </p>
          </div>
        </div>
      </div>
    </form> 
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
            <li><a href="san-pham.php" class="text-decoration-none text-brown">Sản phẩm</a></li>
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