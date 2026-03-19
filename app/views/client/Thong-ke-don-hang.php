<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thống kê đơn hàng - Đặc Sản Ba Miền</title>

  <link rel="stylesheet" href="app/views/client/css/bootstrap.css">
  <link rel="stylesheet" href="app/views/client/css/Trang-chu.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
  <script src="app/views/client/js/bootstrap.bundle.js"></script>
  <style>
    .stat-card {
      background: white;
      border-left: 4px solid #8B4513;
      padding: 20px;
      margin-bottom: 15px;
      border-radius: 4px;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .stat-card h6 {
      color: #8B4513;
      font-weight: bold;
      margin-bottom: 10px;
    }

    .stat-value {
      font-size: 2rem;
      font-weight: bold;
      color: #333;
    }

    .stat-unit {
      color: #666;
      font-size: 0.9rem;
    }

    .text-brown {
      color: #8B4513;
    }

    .filter-section {
      background: white;
      padding: 20px;
      border-radius: 4px;
      margin-bottom: 20px;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .filter-section h5 {
      color: #8B4513;
      font-weight: bold;
      margin-bottom: 15px;
    }
  </style>
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
      </div>
    </nav>

  <!-- CONTENT -->
  <div class="content">
  <div class="container mt-4 mb-5">

    <!-- FILTER SECTION -->
    <div class="filter-section">
      <h5><i class="bi bi-funnel me-2"></i>Bộ lọc dữ liệu</h5>
      <form method="GET" class="row g-3">
        <input type="hidden" name="controller" value="ThongKeDonHang">
        <input type="hidden" name="action" value="index">
        
        <!-- Status Filter -->
        <div class="col-md-3">
          <label class="form-label">Trạng thái đơn:</label>
          <select class="form-select" name="trang_thai">
            <option value="">-- Tất cả --</option>
            <option value="Chờ xử lý" <?php echo ($trang_thai === 'Chờ xử lý') ? 'selected' : ''; ?>>Chờ xử lý</option>
            <option value="Đang giao" <?php echo ($trang_thai === 'Đang giao') ? 'selected' : ''; ?>>Đang giao</option>
            <option value="Hoàn thành" <?php echo ($trang_thai === 'Hoàn thành') ? 'selected' : ''; ?>>Hoàn thành</option>
            <option value="Hủy" <?php echo ($trang_thai === 'Hủy') ? 'selected' : ''; ?>>Hủy</option>
          </select>
        </div>

        <!-- Year Filter -->
        <div class="col-md-3">
          <label class="form-label">Năm:</label>
          <select class="form-select" name="nam">
            <option value="">-- Tất cả --</option>
            <?php foreach ($namList as $n): ?>
              <option value="<?php echo $n['nam']; ?>" <?php echo ($nam == $n['nam']) ? 'selected' : ''; ?>>
                <?php echo $n['nam']; ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>

        <!-- Quarter Filter -->
        <div class="col-md-3">
          <label class="form-label">Quý:</label>
          <select class="form-select" name="quy">
            <option value="">-- Tất cả --</option>
            <option value="1" <?php echo ($quy === '1') ? 'selected' : ''; ?>>Quý I</option>
            <option value="2" <?php echo ($quy === '2') ? 'selected' : ''; ?>>Quý II</option>
            <option value="3" <?php echo ($quy === '3') ? 'selected' : ''; ?>>Quý III</option>
            <option value="4" <?php echo ($quy === '4') ? 'selected' : ''; ?>>Quý IV</option>
          </select>
        </div>

        <!-- Month Filter -->
        <div class="col-md-3">
          <label class="form-label">Tháng:</label>
          <select class="form-select" name="thang">
            <option value="">-- Tất cả --</option>
            <?php for ($i = 1; $i <= 12; $i++): ?>
              <option value="<?php echo $i; ?>" <?php echo ($thang == $i) ? 'selected' : ''; ?>>
                Tháng <?php echo $i; ?>
              </option>
            <?php endfor; ?>
          </select>
        </div>

        <div class="col-12">
          <button type="submit" class="btn" style="background: #8B4513; color: white;">
            <i class="bi bi-search me-2"></i>Lọc dữ liệu
          </button>
          <a href="index.php?controller=ThongKeDonHang&action=index" class="btn btn-secondary">
            <i class="bi bi-arrow-clockwise me-2"></i>Đặt lại
          </a>
        </div>
      </form>
    </div>

    <!-- STATISTICS SECTION -->
    <div class="row g-3 align-items-stretch mb-4">

      <!-- LEFT SIDE - Stats -->
      <div class="col-md-4">
        
        <!-- Card 1: Total Orders -->
        <div class="stat-card">
          <h6><i class="bi bi-box-seam me-2"></i>Tổng đơn hàng</h6>
          <div class="stat-value"><?php echo $thongKe['tong_don'] ?? 0; ?></div>
          <div class="stat-unit">đơn</div>
        </div>

        <!-- Card 2: Total Revenue -->
        <div class="stat-card">
          <h6><i class="bi bi-cash-coin me-2"></i>Tổng doanh thu</h6>
          <div class="stat-value"><?php echo number_format($thongKe['tong_doanh_thu'] ?? 0, 0, ',', '.'); ?></div>
          <div class="stat-unit">₫</div>
        </div>

        <!-- Status breakdown (only if no status filter applied) -->
        <?php if (empty($trang_thai)): ?>
          <div style="border-top: 2px solid #8B4513; padding-top: 20px; margin-top: 20px;">
            <h6 class="text-brown fw-bold mb-3">Theo trạng thái:</h6>
            <?php foreach ($thongKeTheoTrangThai as $tk): ?>
              <div class="d-flex justify-content-between mb-2">
                <span><?php echo htmlspecialchars($tk['trang_thai']); ?></span>
                <strong><?php echo $tk['so_luong']; ?></strong>
              </div>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>

      </div>

      <!-- RIGHT SIDE - Table -->
      <div class="col-md-8">
        <div class="bg-white border rounded p-2" style="box-shadow: 0 2px 4px rgba(0,0,0,0.1);">

          <?php if (empty($hoaDons)): ?>
            <div class="alert alert-info m-3">
              <i class="bi bi-info-circle me-2"></i>Không có dữ liệu đơn hàng với bộ lọc này
            </div>
          <?php else: ?>

          <div class="table-responsive">
            <table class="table table-hover mb-0">
              <thead class="table-light">
                <tr>
                  <th width="80px">Mã đơn</th>
                  <th>Khách hàng</th>
                  <th>Sản phẩm</th>
                  <th>Địa chỉ</th>
                  <th>Trạng thái</th>
                  <th width="120px">Tổng tiền</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($hoaDons as $hd): ?>
                  <tr>
                    <td class="fw-bold text-brown">#<?php echo str_pad($hd['ma_hd'], 3, '0', STR_PAD_LEFT); ?></td>
                    <td>
                      <strong><?php echo htmlspecialchars($hd['ten_khach_hang']); ?></strong><br>
                      <small class="text-muted"><?php echo htmlspecialchars($hd['dien_thoai']); ?></small>
                    </td>
                    <td>
                      <?php 
                      foreach ($hd['chiTiets'] as $ct) {
                          echo htmlspecialchars($ct['ten_sp'] ?? 'Sản phẩm') . " (SL: " . $ct['so_luong'] . ")<br>";
                      }
                      ?>
                    </td>
                    <td><small><?php echo htmlspecialchars($hd['dia_chi']); ?></small></td>
                    <td>
                      <span class="badge bg-<?php 
                        $status = $hd['trang_thai'];
                        if ($status === 'Chờ xử lý') echo 'warning';
                        elseif ($status === 'Đang giao') echo 'info';
                        elseif ($status === 'Hoàn thành') echo 'success';
                        else echo 'danger';
                      ?>">
                        <?php echo htmlspecialchars($status); ?>
                      </span>
                    </td>
                    <td class="text-danger fw-bold"><?php echo number_format($hd['tong_tien'], 0, ',', '.'); ?>₫</td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>

          <?php endif; ?>

        </div>
      </div>

    </div>
  </div>
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
              <li><a href="index.php?controller=Admin&action=index" class="text-decoration-none text-brown">Admin Panel</a></li>
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