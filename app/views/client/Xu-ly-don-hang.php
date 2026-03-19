<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Xử lý đơn hàng - Đặc Sản Ba Miền</title>

  <link rel="stylesheet" href="app/views/client/css/bootstrap.css">
  <link rel="stylesheet" href="app/views/client/css/Trang-chu.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

  <script src="app/views/client/js/bootstrap.bundle.js"></script>

  <style>
    .status-badge {
      padding: 8px 12px;
      border-radius: 4px;
      font-weight: bold;
      cursor: pointer;
      transition: 0.2s;
    }

    .status-cho-xu-ly {
      background: #ffc107;
      color: black;
    }

    .status-dang-giao {
      background: #17a2b8;
      color: white;
    }

    .status-hoan-thanh {
      background: #28a745;
      color: white;
    }

    .status-huy {
      background: #dc3545;
      color: white;
    }

    .order-details {
      background: #f8f9fa;
      padding: 15px;
      border-left: 4px solid #8B4513;
      margin: 10px 0;
    }

    .status-dropdown {
      width: auto;
      display: inline-block;
    }

    .save-status-btn {
      padding: 4px 12px;
      font-size: 0.85rem;
      margin-left: 10px;
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
                <a class="nav-link" href="index.php?controller=XuLyDonHang&action=index">Xử lý đơn hàng</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?controller=ThongKeDonHang&action=index">Thống kê đơn hàng</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?controller=Post&action=index">Quản lý đăng tải</a>
            </li>
          
            <li class="nav-item dropdown ms-lg-3">
              <a class="nav-link dropdown-toggle fw-bold" href="#" role="button" data-bs-toggle="dropdown">
                <i class="bi bi-person-circle me-2"></i><?php echo htmlspecialchars($_SESSION['user']['ten_dang_nhap'] ?? 'Admin'); ?>
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="index.php?controller=Admin&action=index"><i class="bi bi-house me-2"></i>Về Admin Panel</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item text-danger" href="index.php?controller=Admin&action=dangxuat"><i class="bi bi-box-arrow-right me-2"></i>Đăng xuất</a></li>
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

  <!-- CONTENT -->
  <div class="order-container container">

  <h3 class="text-white text-center mb-4"><b>Xử lý đơn hàng</b></h3>

  <!-- Alerts -->
  <div id="successAlert" class="alert alert-success alert-dismissible fade" role="alert" style="display: none;">
    <span id="successMessage"></span>
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  </div>
  <div id="errorAlert" class="alert alert-danger alert-dismissible fade" role="alert" style="display: none;">
    <span id="errorMessage"></span>
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  </div>

  <?php if (empty($hoaDons)): ?>
    <div class="alert alert-info text-center">
      <i class="bi bi-info-circle me-2"></i>Không có đơn hàng nào
    </div>
  <?php else: ?>

  <div class="table-responsive bg-white rounded">
    <table class="table table-hover mb-0">
      <thead class="table-light">
        <tr>
          <th width="80px">Mã đơn</th>
          <th>Khách hàng</th>
          <th>Sản phẩm</th>
          <th>Địa chỉ giao</th>
          <th width="120px">Tổng tiền</th>
          <th>Trạng thái</th>
          <th width="180px">Hành động</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($hoaDons as $hd): ?>
          <tr>
            <td class="fw-bold text-brown">#<?php echo str_pad($hd['ma_hd'], 3, '0', STR_PAD_LEFT); ?></td>
            <td><?php echo htmlspecialchars($hd['ten_khach_hang'] ?? 'N/A'); ?></td>
            <td>
              <small class="text-muted"><?php echo htmlspecialchars($hd['dien_thoai'] ?? ''); ?></small><br>
              <?php 
              foreach ($hd['chiTiets'] ?? [] as $ct) {
                  echo htmlspecialchars($ct['ten_sp'] ?? 'Sản phẩm') . " (SL: " . $ct['so_luong'] . ")<br>";
              }
              ?>
            </td>
            <td><?php echo htmlspecialchars($hd['dia_chi'] ?? 'N/A'); ?></td>
            <td class="text-danger fw-bold"><?php echo number_format($hd['tong_tien'] ?? 0, 0, ',', '.'); ?>đ</td>
            <td>
              <select class="form-select form-select-sm status-dropdown" data-ma-hd="<?php echo $hd['ma_hd']; ?>">
                <option value="Chờ xử lý" <?php echo ($hd['trang_thai'] === 'Chờ xử lý') ? 'selected' : ''; ?>>Chờ xử lý</option>
                <option value="Đang giao" <?php echo ($hd['trang_thai'] === 'Đang giao') ? 'selected' : ''; ?>>Đang giao</option>
                <option value="Hoàn thành" <?php echo ($hd['trang_thai'] === 'Hoàn thành') ? 'selected' : ''; ?>>Hoàn thành</option>
                <option value="Hủy" <?php echo ($hd['trang_thai'] === 'Hủy') ? 'selected' : ''; ?>>Hủy</option>
              </select>
            </td>
            <td>
              <button class="btn btn-sm btn-primary save-status-btn" onclick="saveStatus(<?php echo $hd['ma_hd']; ?>, this)">
                <i class="bi bi-check-circle me-1"></i>Lưu
              </button>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

  <?php endif; ?>

</div>

  <!-- FOOTER -->
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

<script>
// Hàm lưu trạng thái đơn hàng
function saveStatus(maHd, btn) {
    const select = btn.parentElement.parentElement.querySelector('.status-dropdown');
    const trangThai = select.value;
    
    // Disable button khi đang xử lý
    btn.disabled = true;
    btn.innerHTML = '<i class="bi bi-hourglass-split me-1"></i>Đang lưu...';
    
    // Gửi AJAX request
    fetch('index.php?controller=XuLyDonHang&action=capNhatTrangThai', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: 'ma_hd=' + maHd + '&trang_thai=' + encodeURIComponent(trangThai)
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Hiển thị success message
            showAlert('success', data.message);
            
            // Highlight dòng thành công
            btn.parentElement.parentElement.classList.add('table-success');
            setTimeout(() => {
                btn.parentElement.parentElement.classList.remove('table-success');
            }, 2000);
        } else {
            showAlert('error', data.message);
        }
    })
    .catch(error => {
        showAlert('error', 'Có lỗi xảy ra: ' + error.message);
    })
    .finally(() => {
        // Enable button lại
        btn.disabled = false;
        btn.innerHTML = '<i class="bi bi-check-circle me-1"></i>Lưu';
    });
}

// Hàm hiển thị alert
function showAlert(type, message) {
    const alertId = type === 'success' ? 'successAlert' : 'errorAlert';
    const messageId = type === 'success' ? 'successMessage' : 'errorMessage';
    
    const alertEl = document.getElementById(alertId);
    const messageEl = document.getElementById(messageId);
    
    messageEl.textContent = message;
    alertEl.style.display = 'block';
    alertEl.classList.add('show');
    
    // Auto close sau 5 giây
    setTimeout(() => {
        alertEl.classList.remove('show');
        setTimeout(() => {
            alertEl.style.display = 'none';
        }, 150);
    }, 5000);
}
</script>

</body>
</html>