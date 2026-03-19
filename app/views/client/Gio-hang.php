<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Giỏ hàng - Đặc Sản Ba Miền</title>

  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
  
  <link rel="stylesheet" href="css/Trang-chu.css">
  <link rel="stylesheet" href="css/Gio-hang.css"> <link rel="icon" href="img/icon.png" type="image/png">
  <script src="js/bootstrap.bundle.js"></script>
</head>

<body>
  <div class="container-fluid p-0">

    <nav id="nav" class="navbar navbar-expand-lg bg-white navbar-light sticky-top shadow-sm">
      <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center" href="trang-chu.php">
          <img src="img/Anh/Banner/logo.jpg" alt="Logo" class="nav-logo" style="height: 120px;">
          <span class="brand-text ms-2">ĐẶC SẢN BA MIỀN</span>
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
                <a class="nav-link" href="gioi-thieu.php">Giới thiệu</a>
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
                    <li><a class="dropdown-item fw-bold" href="San-pham-ban-chay.php">🔥Sản phẩm bán chạy</a></li>
                </ul>
            </li>
            </li>
            <li class="nav-item">
              <a class="nav-link position-relative" href="gio-hang.php">
                Giỏ hàng
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 0.7rem;">3</span>
              </a>
            </li>

            <li class="nav-item dropdown ms-lg-3">
              <a class="nav-link dropdown-toggle" href="san-pham.php" role="button" data-bs-toggle="dropdown">
                Tài khoản
              </a>
              <ul class="dropdown-menu dropdown-menu-end border-brown shadow">
                <li><a class="dropdown-item" href="thong-tin-ca-nhan.php"><i class="bi bi-person me-2"></i>Cá nhân</a></li>
                <li><a class="dropdown-item" href="don-hang-cua-toi.php"><i class="bi bi-bag-check me-2"></i>Đơn hàng</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item text-danger" href="trang-chu.php"><i class="bi bi-box-arrow-right me-2"></i>Đăng xuất</a></li>
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

    <section class="cart-section">
      <div class="cart-bg-overlay"></div> <div class="container cart-container">
        <h2 class="cart-title text-center"><i class=""></i> GIỎ HÀNG CỦA BẠN</h2>
        
        <div class="row g-4 mt-2">
          <div class="col-lg-8">
            <div class="table-responsive shadow-sm rounded-4 bg-white border">
              <table class="table align-middle m-0 table-cart">
                <thead class="bg-light">
                  <tr>
                    <th class="ps-4 py-3">Sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Tổng cộng</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="ps-4 d-flex align-items-center">
                      <img src="https://images.unsplash.com/photo-1563805042-7684c019e1cb?w=200" alt="Bánh Cốm">
                      <div class="ms-3">
                        <div class="fw-bold product-name">Bánh Cốm Hà Nội</div>
                        <small class="text-muted">Miền Bắc</small>
                      </div>
                    </td>
                    <td>50.000đ</td>
                    <td><input type="number" class="form-control quantity-input" value="1" min="1"></td>
                    <td class="fw-bold text-brown">50.000đ</td>
                    <td><button class="btn btn-sm btn-remove"><i class="bi bi-x-lg"></i></button></td>
                  </tr>
                  <tr>
                    <td class="ps-4 d-flex align-items-center">
                      <img src="https://images.unsplash.com/photo-1512621776951-a57141f2eefd?w=200" alt="Nem Chua">
                      <div class="ms-3">
                        <div class="fw-bold product-name">Nem Chua Thanh Hóa</div>
                        <small class="text-muted">Miền Trung</small>
                      </div>
                    </td>
                    <td>45.000đ</td>
                    <td><input type="number" class="form-control quantity-input" value="2" min="1"></td>
                    <td class="fw-bold text-brown">90.000đ</td>
                    <td><button class="btn btn-sm btn-remove"><i class="bi bi-x-lg"></i></button></td>
                  </tr>
                  <tr>
                    <td class="ps-4 d-flex align-items-center">
                      <img src="https://images.unsplash.com/photo-1599487488170-d11ec9c172f0?w=200" alt="Khô Cá">
                      <div class="ms-3">
                        <div class="fw-bold product-name">Khô Cá Miền Tây</div>
                        <small class="text-muted">Miền Nam</small>
                      </div>
                    </td>
                    <td>120.000đ</td>
                    <td><input type="number" class="form-control quantity-input" value="1" min="1"></td>
                    <td class="fw-bold text-brown">120.000đ</td>
                    <td><button class="btn btn-sm btn-remove"><i class="bi bi-x-lg"></i></button></td>
                  </tr>
                  <tr>
                    <td class="ps-4 d-flex align-items-center">
                      <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?w=200" alt="Chả Quế">
                      <div class="ms-3">
                        <div class="fw-bold product-name">Chả Quế Ước Lễ</div>
                        <small class="text-muted">Miền Bắc</small>
                      </div>
                    </td>
                    <td>85.000đ</td>
                    <td><input type="number" class="form-control quantity-input" value="1" min="1"></td>
                    <td class="fw-bold text-brown">85.000đ</td>
                    <td><button class="btn btn-sm btn-remove"><i class="bi bi-x-lg"></i></button></td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="mt-4">
              <a href="san-pham.php" class="back-link"><i class="bi bi-arrow-left"></i> Tiếp tục chọn đặc sản</a>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="card summary-card border-0 shadow-sm p-4 rounded-4">
              <h4 class="fw-bold mb-4 border-bottom pb-2">Hóa đơn của bạn</h4>
              <div class="d-flex justify-content-between mb-3">
                <span>Tạm tính (4 món):</span>
                <span>345.000đ</span>
              </div>
              <div class="d-flex justify-content-between mb-3 text-success fw-medium">
                <span>Khuyến mãi đặc biệt:</span>
                <span>-15.000đ</span>
              </div>
              <hr>
              <div class="d-flex justify-content-between mb-4 fs-4 fw-bold total-price">
                <span>Tổng cộng:</span>
                <span>330.000đ</span>
              </div>
              <a href="Thanh-toan.php" 
                   class="btn btn-checkout btn-lg w-100 py-3 fw-bold shadow">
                  ĐẶT HÀNG NGAY
                </a>
                   <small class="text-muted text-center d-block">
  Cam kết chuẩn vị truyền thống 100%
</small>
              </div>
            </div>
          </div>
          </div>
    </section>

   
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