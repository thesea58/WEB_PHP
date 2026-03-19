<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Giỏ hàng - Đặc Sản Ba Miền</title>

  <link rel="stylesheet" href="app/views/client/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
  
  <link rel="stylesheet" href="app/views/client/css/Trang-chu.css">
  <link rel="stylesheet" href="app/views/client/css/Gio-hang.css"> <link rel="icon" href="app/views/client/img/icon.png" type="image/png">
  <style>
    body {
      background: url("app/views/client/img/Anh/Banner/banner.jpg") no-repeat center center fixed;
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
  </style>
  <script src="app/views/client/js/bootstrap.bundle.js"></script>
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
              <a class="nav-link dropdown-toggle active fw-bold" href="index.php?controller=SanPham&action=index" role="button" data-bs-toggle="dropdown">Sản phẩm</a>
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
          <button class="btn btn-search-custom" type="submit" style="background-color: #8B4513; color: white; border: none;">
            <i class="bi bi-search"></i>
          </button>
        </form>

      </div>
    </nav>

    <section class="cart-section py-5" style="background:#f8f5f2;">
  <div class="container">

    <h2 class="text-center fw-bold mb-5" style="color:#8B4513;">
      THANH TOÁN ĐƠN HÀNG
    </h2>

    <div class="row g-4">

      <!-- DANH SÁCH -->
      <div class="col-lg-7">
        <div class="card border-0 shadow rounded-4 overflow-hidden">
          
          <div class="p-3 fw-bold text-white" style="background:#8B4513;">
            Đơn hàng của bạn
          </div>

          <table class="table align-middle m-0">
            <thead class="table-light text-center">
              <tr>
                <th>Sản phẩm</th>
                <th>Giá</th>
                <th>SL</th>
                <th>Tổng</th>
              </tr>
            </thead>

            <tbody>
              <tr class="text-center">
                <td class="d-flex align-items-center">
                  <img src="app/views/client/img/Anh/Trung/banhcomsua_binhthuan.jpg" width="60" class="rounded">
                  <span class="ms-2 fw-semibold">Bánh Cốm</span>
                </td>
                <td>50.000đ</td>
                <td>1</td>
                <td class="fw-bold text-danger">50.000đ</td>
              </tr>

              <tr class="text-center">
                <td class="d-flex align-items-center">
                  <img src="app/views/client/img/Anh/Trung/nemchua_thanhhoa.jpg" width="60" class="rounded">
                  <span class="ms-2 fw-semibold">Nem Chua</span>
                </td>
                <td>45.000đ</td>
                <td>2</td>
                <td class="fw-bold text-danger">90.000đ</td>
              </tr>

              <tr class="text-center">
                <td class="d-flex align-items-center">
                  <img src="https://images.unsplash.com/photo-1599487488170-d11ec9c172f0?w=200" width="60" class="rounded">
                  <span class="ms-2 fw-semibold">Khô cá</span>
                </td>
                <td>120.000đ</td>
                <td>1</td>
                <td class="fw-bold text-danger">120.000đ</td>
              </tr>
            </tbody>
          </table>

        </div>
      </div>

      <!-- FORM -->
      <div class="col-lg-5">
        <form action="xu-ly-thanh-toan.php" method="POST">

          <div class="card border-0 shadow rounded-4 p-4">

            <h4 class="fw-bold mb-3" style="color:#8B4513;">Thông tin nhận hàng</h4>

            <input type="text" name="ten" class="form-control mb-3 rounded-3" placeholder="Họ tên" required>
<input type="text" name="sdt" class="form-control mb-3 rounded-3" placeholder="Số điện thoại" required>
            <input type="text" name="diachi" class="form-control mb-3 rounded-3" placeholder="Địa chỉ giao hàng" required>

            <label class="fw-semibold mb-2">Phương thức thanh toán</label>
            <select name="thanhtoan" class="form-select mb-3 rounded-3" onchange="showQR(this.value)">
              <option value="cod">Thanh toán khi nhận (COD)</option>
              <option value="bank">Chuyển khoản QR</option>
            </select>

            <!-- QR -->
            <div id="qr-box" class="text-center mb-3 p-3 border rounded-3" style="display:none; background:#f9f9f9;">
              <p class="fw-bold mb-2">Quét mã để thanh toán</p>
              <img src="https://png.pngtree.com/png-clipart/20190924/original/pngtree-qr-code-free-png-png-image_4863862.jpg" width="160" class="mb-2">
              <p class="small text-muted">Nội dung: THANHTOAN</p>
            </div>

            <hr>

            <div class="d-flex justify-content-between mb-2">
              <span>Tạm tính:</span>
              <span>260.000đ</span>
            </div>

            <div class="d-flex justify-content-between mb-3 text-success">
              <span>Giảm giá:</span>
              <span>-0đ</span>
            </div>

            <div class="d-flex justify-content-between fs-5 fw-bold mb-4">
              <span>Tổng:</span>
              <span class="text-danger">260.000đ</span>
            </div>


            <button class="btn w-100 py-3 fw-bold text-white rounded-3"
              style="background:#8B4513;">
              XÁC NHẬN THANH TOÁN
            </button>

          </div>

        </form>
      </div>

    </div>
  </div>
</section>

<script>
function showQR(value){
  const qr = document.getElementById("qr-box");
  qr.style.display = (value === "bank") ? "block" : "none";
}
</script>
   
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
            <p><i class="bi bi-geo-alt"></i> Bình Dương, Việt Nam</p>
            <p><i class="bi bi-telephone"></i> 0274 3743 118</p>
            <p><i class="bi bi-envelope"></i> contact@dacsan3mien.vn</p>
          </div>
        </div>
        <hr style="border-color: #8B4513;">
        <p class="text-center text-brown">&copy; 2025 Đặc sản ba miền</p>
      </div>
    </footer>

  </div>
</body>
</html>
