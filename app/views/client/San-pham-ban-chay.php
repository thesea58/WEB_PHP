<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặc Sản Miền Nam - Đặc Sản Ba Miền</title>
    
    <link rel="stylesheet" href="app/views/client/css/bootstrap.css">
    <link rel="stylesheet" href="app/views/client/css/Trang-chu.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="icon" href="app/views/client/img/icon.png" type="image/png">
    
    <script src="app/views/client/js/bootstrap.bundle.js"></script>
    <style>
		/* 1. Lớp bọc nội dung có ảnh nền */
    .banner-background-section {
        background: url("app/views/client/img/Anh/Banner/banner.jpg") no-repeat center center fixed;
        background-size: cover;
        position: relative; /* Quan trọng để lớp mờ bám theo div này */
        padding: 60px 0;    /* Tạo khoảng trống trên dưới cho đẹp */
    }

    /* 2. Lớp phủ mờ (overlay) chỉ nằm trong div này */
    .banner-background-section::before {
        content: "";
        position: absolute;
        top: 0; 
        left: 0; 
        width: 100%; 
        height: 100%;
        background: rgba(255, 255, 255, 0.7); /* Màu trắng mờ 70% giúp sản phẩm nổi bật */
        z-index: 1; /* Nằm dưới nội dung */
    }

    /* 3. Đảm bảo nội dung (Container) nằm trên lớp mờ */
    .banner-background-section .container {
        position: relative;
        z-index: 2; /* Nằm trên lớp overlay */
    }

    /* Giữ các class hỗ trợ khác */
    .text-brown { color: #8B4513; }
    .product-card { border: none; transition: 0.3s; }
    .product-card:hover { transform: translateY(-5px); box-shadow: 0 5px 15px rgba(0,0,0,0.2) !important; }
        
        /* Hiệu ứng card đồng bộ trang chủ */
        .product-card {
            transition: all 0.3s ease;
            border: none;
        }
        .product-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.15) !important;
        }
        .img-sp {
            height: 200px;
            object-fit: cover;
            border-radius: 8px;
        }
        .btn-outline-brown {
            color: #8B4513;
            border-color: #8B4513;
        }
        .btn-outline-brown:hover {
            background-color: #8B4513;
            color: var(--mau-vang);
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
            <li class="nav-item">
                <a class="nav-link" href="index.php?controller=BaiViet&action=index">Bài viết</a>
            </li>
        
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle active fw-bold" href="index.php?controller=SanPham&action=index" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
              <li class="nav-item">
              <a class="nav-link position-relative" href="index.php?controller=GioHang&action=index">
                Giỏ hàng
                <span id="cartCountBadge" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 0.7rem;"><?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0; ?></span>
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
          <button class="btn" type="submit" style="background-color: #8B4513; color: white; border: none;">
            <i class="bi bi-search"></i>
          </button>
</form>
      </div>
    </nav>

    <div class="container my-5">
<div class="text-center mb-5">
            <h1 class="fw-bold text-brown uppercase">Sản Phẩm Bán Chạy</h1>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <p class="text-muted">Sản phẩm bán chạy tại cửa hàng là những tinh hoa được tuyển chọn dựa trên sự yêu thích và đánh giá cao từ đông đảo khách hàng. Đây không chỉ là những món ăn ngon, mà còn là những cái tên đại diện cho chất lượng và hương vị chuẩn mực nhất của cả ba miền Bắc – Trung – Nam.</p>
                </div>
            </div>
        </div>

        <?php $products = isset($products) ? $products : []; ?>
        <div class="row">
            <?php if(!empty($products)): foreach($products as $p): ?>
                <div class="col-md-3 col-sm-6 mb-4">
                    <div class="card h-100 shadow-sm product-card p-2">
                        <img src="<?php echo 'app/views/client/' . htmlspecialchars($p['path_img']); ?>" class="card-img-top img-sp" style="cursor: pointer;"
                             data-bs-toggle="modal" data-bs-target="#productModal"
                             data-name="<?php echo htmlspecialchars($p['ten_sp']); ?>"
                             data-price="<?php echo number_format($p['gia'],0,',','.'); ?>đ"
                             data-img="<?php echo 'app/views/client/' . htmlspecialchars($p['path_img']); ?>"
                             data-packaging=""
                             data-ingredients=""
                             data-nutrition=""
                             data-flavor=""
                             data-storage=""
                             data-origin=""
                             data-expiry=""
                             data-mfg=""
                             data-usage="">
                        <div class="card-body text-center d-flex flex-column">
                            <h5 class="card-title fw-bold text-brown"><?php echo htmlspecialchars($p['ten_sp']); ?></h5>
                            <p class="card-text text-danger fw-bold"><?php echo number_format($p['gia'],0,',','.'); ?>đ</p>
                            <button class="btn btn-outline-brown mt-auto w-100 add-to-cart-btn" data-ma-sp="<?php echo htmlspecialchars($p['ma_sp']); ?>" data-qty="1">Thêm vào giỏ</button>
                        </div>
                    </div>
                </div>
            <?php endforeach; else: ?>
                <div class="col-12"><p class="text-muted">Không có sản phẩm bán chạy.</p></div>
            <?php endif; ?>
        </div>

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
  
  
  <div class="modal fade" id="productModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-bottom-0">
                <h5 class="modal-title fw-bold text-brown">Chi tiết sản phẩm</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-5 text-center">
                        <img src="" id="modalImg" class="img-fluid rounded shadow-sm mb-3" alt="Sản phẩm">
                        <h4 class="fw-bold text-danger" id="modalPrice"></h4>
                    </div>
                    <div class="col-md-7">
                        <h3 class="fw-bold text-brown" id="modalName"></h3>
                        <p class="text-muted mb-1"><i class="bi bi-geo-alt"></i> <span id="modalOrigin"></span></p>
                        <hr>
                        <ul class="list-unstyled">
                            <li class="mb-2"><strong>Nguyên liệu:</strong> <span id="modalIngredients"></span></li>
                            <li class="mb-2"><strong>Bao bì:</strong> <span id="modalPackaging"></span></li>
                            <li class="mb-2"><strong>Hương vị:</strong> <span id="modalFlavor"></span></li>
                            <li class="mb-2"><strong>Cách dùng:</strong> <span id="modalUsage"></span></li>
                            <li class="mb-2"><strong>Bảo quản:</strong> <span id="modalStorage"></span></li>
                            <li class="mb-2 text-primary"><strong><span id="modalMfg"></span></strong></li>
                            <li class="mb-2 text-primary"><strong><span id="modalExpiry"></span></strong></li>
</ul>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-top-0">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var pModal = document.getElementById('productModal');
    if(pModal) {
        pModal.addEventListener('show.bs.modal', function (event) {
            var btn = event.relatedTarget; 
            // Cập nhật các thông tin cơ bản
            pModal.querySelector('#modalName').textContent = btn.getAttribute('data-name');
            pModal.querySelector('#modalPrice').textContent = btn.getAttribute('data-price');
            pModal.querySelector('#modalImg').src = btn.getAttribute('data-img');
            pModal.querySelector('#modalPackaging').textContent = btn.getAttribute('data-packaging');
            pModal.querySelector('#modalIngredients').textContent = btn.getAttribute('data-ingredients');
            pModal.querySelector('#modalFlavor').textContent = btn.getAttribute('data-flavor');
            pModal.querySelector('#modalStorage').textContent = btn.getAttribute('data-storage');
            
            // Cập nhật các thông tin mới thêm
            pModal.querySelector('#modalOrigin').textContent = btn.getAttribute('data-origin');
            pModal.querySelector('#modalUsage').textContent = btn.getAttribute('data-usage');
            pModal.querySelector('#modalMfg').textContent = btn.getAttribute('data-mfg');
            pModal.querySelector('#modalExpiry').textContent = btn.getAttribute('data-expiry');
        });
    }
});
</script>
</body>
</html>
