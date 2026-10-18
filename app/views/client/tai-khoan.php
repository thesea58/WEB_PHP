<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tài khoản - Đặc Sản Ba Miền</title>

  <link rel="stylesheet" href="app/views/client/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="app/views/client/css/trang-chu.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
  <link rel="icon" href="app/views/client/img/icon.png" type="image/png">

  <script src="app/views/client/js/bootstrap.bundle.js"></script>

  <style>
    body {
      background: #f5f5f5;
    }

    .text-brown {
      color: #8B4513;
    }

    .coming-soon-container {
      min-height: 70vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 40px 20px;
    }

    .coming-soon-card {
      background: white;
      border-radius: 15px;
      padding: 60px 40px;
      text-align: center;
      max-width: 600px;
      box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    }

    .coming-soon-icon {
      font-size: 5rem;
      color: #8B4513;
      margin-bottom: 20px;
    }

    .coming-soon-title {
      font-size: 2rem;
      color: #8B4513;
      font-weight: bold;
      margin-bottom: 15px;
    }

    .coming-soon-text {
      color: #666;
      font-size: 1.1rem;
      margin-bottom: 30px;
    }

    .btn-back {
      background: #8B4513;
      color: white;
      padding: 12px 40px;
      border-radius: 10px;
      text-decoration: none !important;
      display: inline-block;
      transition: 0.3s;
    }

    .btn-back:hover {
      background: #6b3210;
      color: white;
      text-decoration: none;
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
              <a class="nav-link" href="index.php?controller=TrangChu&action=index">Trang chủ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?controller=GioiThieu&action=index">Giới thiệu</a>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="index.php?controller=SanPham&action=index" role="button" data-bs-toggle="dropdown">
                Sản phẩm
              </a>
              <ul class="dropdown-menu border-brown">
                <li><a class="dropdown-item" href="index.php?controller=DacSanMienBac&action=index">Đặc sản miền Bắc</a></li>
                <li><a class="dropdown-item" href="index.php?controller=DacSanMienTrung&action=index">Đặc sản miền Trung</a></li>
                <li><a class="dropdown-item" href="index.php?controller=DacSanMienNam&action=index">Đặc sản miền Nam</a></li>
                	<li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item fw-bold" href="index.php?controller=SanPhamBanChay&action=index">🔥Sản phẩm bán chạy</a></li>
             
              </ul>
            </li>

            <li class="nav-item"><a class="nav-link" href="index.php?controller=GioHang&action=index">Giỏ hàng</a></li>
            
            <?php if (isset($_SESSION['user'])): ?>
              <!-- Đã đăng nhập -->
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle active fw-bold" href="#" role="button" data-bs-toggle="dropdown">
                  <i class="bi bi-person-circle"></i> <?php echo htmlspecialchars($_SESSION['user']['ten_dang_nhap']); ?>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
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

    <!-- NỘI DUNG QUẢN LÝ TÀI KHOẢN VÀ ĐƠN HÀNG -->
    <div class="container py-5" style="min-height: 75vh;">
      <div class="row g-4">
        
        <!-- CỘT TRÁI: THÔNG TIN TÀI KHOẢN -->
        <div class="col-lg-4">
          <div class="card border-0 shadow-sm rounded-4 p-4 bg-white mb-4">
            <div class="text-center mb-3">
              <div class="d-inline-flex align-items-center justify-content-center bg-light text-brown rounded-circle mb-2" style="width: 80px; height: 80px; font-size: 2.5rem;">
                <i class="bi bi-person-circle"></i>
              </div>
              <h5 class="fw-bold mb-1 text-brown"><?php echo htmlspecialchars($user['ten_dang_nhap'] ?? 'Khách hàng'); ?></h5>
              <span class="badge bg-secondary"><?php echo htmlspecialchars($user['vai_tro'] ?? 'Khách hàng'); ?></span>
            </div>

            <hr>

            <div class="small">
              <p class="mb-2"><strong><i class="bi bi-envelope me-2"></i>Email:</strong> <?php echo htmlspecialchars($user['email'] ?? 'Chưa cập nhật'); ?></p>
              <p class="mb-2"><strong><i class="bi bi-telephone me-2"></i>Điện thoại:</strong> <?php echo htmlspecialchars($user['dien_thoai'] ?? 'Chưa cập nhật'); ?></p>
              <p class="mb-0"><strong><i class="bi bi-calendar3 me-2"></i>Ngày tham gia:</strong> <?php echo isset($user['ngay_tao']) ? date('d/m/Y', strtotime($user['ngay_tao'])) : 'N/A'; ?></p>
            </div>
          </div>
        </div>

        <!-- CỘT PHẢI: QUẢN LÝ ĐƠN HÀNG -->
        <div class="col-lg-8">
          <div class="card border-0 shadow-sm rounded-4 bg-white overflow-hidden">
            <div class="card-header bg-white border-0 py-3 px-4 d-flex justify-content-between align-items-center">
              <h5 class="fw-bold mb-0 text-brown">
                <i class="bi bi-bag-check me-2"></i>Đơn hàng của tôi
              </h5>
              <span class="badge bg-light text-dark border">
                Tổng: <?php echo count($hoaDons ?? []); ?> đơn
              </span>
            </div>

            <div class="card-body p-0">
              <?php if (empty($hoaDons)): ?>
                <div class="text-center py-5">
                  <i class="bi bi-inbox text-muted" style="font-size: 3rem;"></i>
                  <p class="text-muted mt-2">Bạn chưa có đơn hàng nào.</p>
                  <a href="index.php?controller=TrangChu&action=index" class="btn btn-sm text-white px-3 py-2 rounded-3" style="background:#8B4513;">
                    Mua sắm ngay
                  </a>
                </div>
              <?php else: ?>
                <div class="table-responsive">
                  <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                      <tr class="text-center">
                        <th width="90">Mã đơn</th>
                        <th class="text-start">Chi tiết sản phẩm</th>
                        <th>Tổng tiền</th>
                        <th>Trạng thái</th>
                        <th>Thời gian</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($hoaDons as $hd): ?>
                        <tr>
                          <!-- Mã đơn -->
                          <td class="text-center fw-bold text-brown">
                            #<?php echo str_pad($hd['ma_hd'], 4, '0', STR_PAD_LEFT); ?>
                          </td>

                          <!-- Chi tiết sản phẩm -->
                          <td>
                            <?php if (!empty($hd['chiTiets'])): ?>
                              <?php foreach ($hd['chiTiets'] as $ct): ?>
                                <div class="small">
                                  • <?php echo htmlspecialchars($ct['ten_sp'] ?? 'Sản phẩm'); ?> 
                                  <span class="text-muted">x <?php echo (int)$ct['so_luong']; ?></span>
                                </div>
                              <?php endforeach; ?>
                            <?php else: ?>
                              <span class="text-muted small">Đơn hàng</span>
                            <?php endif; ?>
                            
                            <?php if ($hd['trang_thai'] === 'Chờ đối soát'): ?>
                              <div class="mt-1">
                                <small class="text-muted" style="font-size: 0.8rem;">
                                  <i class="bi bi-qr-code me-1"></i>Nội dung CK: 
                                  <code>DacSan3Mien_<?php echo $hd['ma_nguoi_dung']; ?>_<?php echo preg_replace('/[^A-Za-z0-9]/', '', strtoupper(iconv('UTF-8', 'ASCII//TRANSLIT', $hd['ten_khach_hang'] ?? 'KHACH'))); ?>_<?php echo $hd['ma_hd']; ?></code>
                                </small>
                              </div>
                            <?php endif; ?>
                          </td>

                          <!-- Tổng tiền -->
                          <td class="text-center fw-bold text-danger">
                            <?php echo number_format($hd['tong_tien'], 0, ',', '.'); ?>đ
                          </td>

                          <!-- Trạng thái -->
                          <td class="text-center">
                            <?php if ($hd['trang_thai'] === 'Chờ đối soát'): ?>
                              <span class="badge bg-warning text-dark py-2 px-3 rounded-pill">
                                <i class="bi bi-clock-history me-1"></i>Chờ đối soát
                              </span>
                            <?php elseif ($hd['trang_thai'] === 'Đã thanh toán'): ?>
                              <span class="badge bg-success py-2 px-3 rounded-pill">
                                <i class="bi bi-check-circle me-1"></i>Đã thanh toán
                              </span>
                            <?php elseif (in_array($hd['trang_thai'], ['Đang xử lý', 'dang_xu_ly', 'Chờ xử lý', 'cho_xu_ly', 'cho xu ly'])): ?>
                              <span class="badge bg-info text-dark py-2 px-3 rounded-pill">
                                <i class="bi bi-hourglass-split me-1"></i>Đang xử lý
                              </span>
                            <?php elseif (in_array($hd['trang_thai'], ['Đang giao', 'dang_giao'])): ?>
                              <span class="badge bg-primary py-2 px-3 rounded-pill">
                                <i class="bi bi-truck me-1"></i>Đang giao
                              </span>
                            <?php elseif (in_array($hd['trang_thai'], ['Hoàn thành', 'hoan_thanh'])): ?>
                              <span class="badge bg-success py-2 px-3 rounded-pill">
                                <i class="bi bi-check2-all me-1"></i>Hoàn thành
                              </span>
                            <?php elseif (in_array($hd['trang_thai'], ['Hủy', 'huy'])): ?>
                              <span class="badge bg-danger py-2 px-3 rounded-pill">
                                <i class="bi bi-x-circle me-1"></i>Đã hủy
                              </span>
                            <?php else: ?>
                              <span class="badge bg-secondary py-2 px-3 rounded-pill">
                                <?php echo htmlspecialchars($hd['trang_thai']); ?>
                              </span>
                            <?php endif; ?>
                          </td>

                          <!-- Thời gian đặt -->
                          <td class="text-center text-muted small">
                            <?php echo date('H:i d/m/Y', strtotime($hd['ngay_dat'])); ?>
                          </td>
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

</body>
</html>