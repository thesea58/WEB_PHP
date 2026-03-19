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
              <?php if (!empty($gioHang)): ?>
                <?php foreach ($gioHang as $item): ?>
                <tr class="text-center">
                  <td class="d-flex align-items-center">
                    <img src="app/views/client/<?php echo htmlspecialchars($item['path_img']); ?>" 
                         width="60" class="rounded"
                         onerror="this.src='app/views/client/img/icon.png'">
                    <span class="ms-2 fw-semibold"><?php echo htmlspecialchars($item['ten_sp']); ?></span>
                  </td>
                  <td><?php echo number_format($item['gia'], 0, ',', '.'); ?>đ</td>
                  <td><?php echo $item['so_luong']; ?></td>
                  <td class="fw-bold text-danger"><?php echo number_format($item['gia'] * $item['so_luong'], 0, ',', '.'); ?>đ</td>
                </tr>
                <?php endforeach; ?>
              <?php else: ?>
                <tr>
                  <td colspan="4" class="text-center text-muted py-4">Giỏ hàng trống</td>
                </tr>
              <?php endif; ?>
            </tbody>
          </table>

        </div>
      </div>

      <!-- FORM -->
      <div class="col-lg-5">
        <div id="alertBox"></div>
        <form id="checkoutForm">

          <div class="card border-0 shadow rounded-4 p-4">

            <h4 class="fw-bold mb-3" style="color:#8B4513;">Thông tin nhận hàng</h4>

            <input type="text" name="ten" id="ten" class="form-control mb-3 rounded-3" placeholder="Họ tên" 
                   value="<?php echo htmlspecialchars($user['ten_dang_nhap'] ?? ''); ?>" required>
            <input type="tel" name="sdt" id="sdt" class="form-control mb-3 rounded-3" placeholder="Số điện thoại (ví dụ: 0981234567)" required>
            <input type="text" name="diachi" id="diachi" class="form-control mb-3 rounded-3" placeholder="Địa chỉ giao hàng" required>

            <label class="fw-semibold mb-2">Phương thức thanh toán</label>
            <select name="thanhtoan" id="thanhtoan" class="form-select mb-3 rounded-3" onchange="showQR(this.value)">
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
              <span><?php echo number_format($tongTien, 0, ',', '.'); ?>đ</span>
            </div>

            <div class="d-flex justify-content-between mb-3 text-success">
              <span>Giảm giá:</span>
              <span>-0đ</span>
            </div>

            <div class="d-flex justify-content-between fs-5 fw-bold mb-4">
              <span>Tổng:</span>
              <span class="text-danger"><?php echo number_format($tongTien, 0, ',', '.'); ?>đ</span>
            </div>

            <button type="submit" class="btn w-100 py-3 fw-bold text-white rounded-3" id="submitBtn"
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
// Show/hide QR code based on payment method
function showQR(value){
  const qr = document.getElementById("qr-box");
  qr.style.display = (value === "bank") ? "block" : "none";
}

// Handle checkout form submission
document.getElementById('checkoutForm').addEventListener('submit', function(e) {
  e.preventDefault();
  
  const ten = document.getElementById('ten').value.trim();
  const sdt = document.getElementById('sdt').value.trim();
  const diachi = document.getElementById('diachi').value.trim();
  const thanhtoan = document.getElementById('thanhtoan').value;
  
  // Validate
  if (!ten || !sdt || !diachi) {
    showAlert('error', 'Vui lòng điền đầy đủ thông tin');
    return;
  }
  
  // Validate phone number
  if (!/^0\d{9}$/.test(sdt)) {
    showAlert('error', 'Số điện thoại không hợp lệ (ví dụ: 0981234567)');
    return;
  }
  
  const formData = new FormData();
  formData.append('ten', ten);
  formData.append('sdt', sdt);
  formData.append('diachi', diachi);
  formData.append('thanhtoan', thanhtoan);
  
  const submitBtn = document.getElementById('submitBtn');
  const originalText = submitBtn.innerHTML;
  submitBtn.disabled = true;
  submitBtn.innerHTML = '<i class="bi bi-hourglass-split me-1"></i>Đang xử lý...';
  
  fetch('index.php?controller=ThanhToan&action=xulyThanhToan', {
    method: 'POST',
    body: formData
  })
  .then(response => {
    if (!response.ok) {
      return response.text().then(text => {
        throw new Error(`HTTP ${response.status}: ${text}`);
      });
    }
    return response.text();
  })
  .then(text => {
    try {
      const data = JSON.parse(text);
      if (data.success) {
        showAlert('success', data.message || 'Đặt hàng thành công!');
        setTimeout(() => {
          window.location.href = 'index.php?controller=TaiKhoan&action=index';
        }, 2000);
      } else {
        showAlert('error', data.message || 'Đặt hàng thất bại');
      }
    } catch (e) {
      showAlert('error', 'Lỗi phản hồi từ server: ' + text);
    }
  })
  .catch(error => {
    console.error('Error:', error);
    showAlert('error', 'Có lỗi xảy ra: ' + error.message);
  })
  .finally(() => {
    submitBtn.disabled = false;
    submitBtn.innerHTML = originalText;
  });
});

// Show alert message
function showAlert(type, message) {
  const alertBox = document.getElementById('alertBox');
  const alertClass = type === 'success' ? 'alert alert-success' : 'alert alert-danger';
  alertBox.innerHTML = `
    <div class="${alertClass} alert-dismissible fade show" role="alert">
      ${message}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  `;
  
  // Auto close after 5 seconds
  if (type === 'success') {
    setTimeout(() => {
      alertBox.innerHTML = '';
    }, 5000);
  }
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
