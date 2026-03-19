<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quản lý Bài Viết & Sản Phẩm - Đặc Sản Ba Miền</title>

  <link rel="stylesheet" href="app/views/client/css/bootstrap.css">
  <link rel="stylesheet" href="app/views/client/css/Trang-chu.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
  <link rel="icon" href="app/views/client/img/icon.png" type="image/png">

  <script src="app/views/client/js/bootstrap.bundle.js"></script>
  <style>
    /* Thêm một chút style cho form quản trị để đồng bộ với theme */
    .admin-container {
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
    .nav-tabs .nav-link.active {
      color: #8B4513;
      font-weight: bold;
      border-color: #8B4513 #8B4513 #fff;
    }
    .nav-tabs .nav-link {
      color: #555;
    }
    .btn-brown {
      background-color: #8B4513;
      color: white;
    }
    .btn-brown:hover {
      background-color: #6b340e;
      color: white;
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
              <a class="nav-link dropdown-toggle" href="index.php?controller=SanPham&action=index" role="button" data-bs-toggle="dropdown">
                Quản trị
              </a>
              <ul class="dropdown-menu dropdown-menu-end border-brown shadow">
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

    <div class="container my-5 admin-container p-4">
      <h2 class="text-center fw-bold mb-4" style="color: #8B4513;">QUẢN LÝ ĐĂNG TẢI</h2>
      
      <ul class="nav nav-tabs mb-4" id="adminTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="post-tab" data-bs-toggle="tab" data-bs-target="#post" type="button" role="tab" aria-controls="post" aria-selected="true">
            <i class="bi bi-pencil-square me-2"></i>Đăng Bài Viết Mới
          </button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="product-tab" data-bs-toggle="tab" data-bs-target="#product" type="button" role="tab" aria-controls="product" aria-selected="false">
            <i class="bi bi-box-seam me-2"></i>Đăng Sản Phẩm Mới
          </button>
        </li>
      </ul>

      <div class="tab-content" id="adminTabContent">
        
        <div class="tab-pane fade show active" id="post" role="tabpanel" aria-labelledby="post-tab">
          <form action="process_post.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="postTitle" class="form-label fw-bold">Tiêu đề bài viết</label>
              <input type="text" class="form-control border-brown" id="postTitle" placeholder="Nhập tiêu đề bài viết...">
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="postCategory" class="form-label fw-bold">Danh mục</label>
                <select class="form-select border-brown" id="postCategory">
                  <option selected disabled>Chọn danh mục...</option>
                  <option value="am-thuc">Văn hóa ẩm thực</option>
                  <option value="meo-vat">Mẹo vặt nhà bếp</option>
                  <option value="tin-tuc">Tin tức khuyến mãi</option>
                </select>
              </div>
              <div class="col-md-6 mb-3">
                <label for="postImage" class="form-label fw-bold">Ảnh đại diện</label>
                <input class="form-control border-brown" type="file" id="postImage">
              </div>
            </div>
            <div class="mb-3">
              <label for="postContent" class="form-label fw-bold">Nội dung bài viết</label>
              <textarea class="form-control border-brown" id="postContent" rows="8" placeholder="Nhập nội dung chi tiết ở đây..."></textarea>
            </div>
            <div class="text-end">
              <button type="submit" class="btn btn-brown px-4 py-2"><i class="bi bi-send me-2"></i>Đăng Bài</button>
            </div>
          </form>
        </div>

        <div class="tab-pane fade" id="product" role="tabpanel" aria-labelledby="product-tab">
          <form action="process_product.php" method="POST" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="productName" class="form-label fw-bold">Tên sản phẩm</label>
                <input type="text" class="form-control border-brown" id="productName" placeholder="Ví dụ: Bánh Pía Sóc Trăng">
              </div>
              <div class="col-md-6 mb-3">
                <label for="productPrice" class="form-label fw-bold">Giá bán (VNĐ)</label>
                <input type="number" class="form-control border-brown" id="productPrice" placeholder="Ví dụ: 90000">
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="productRegion" class="form-label fw-bold">Vùng miền</label>
                <select class="form-select border-brown" id="productRegion">
                  <option selected disabled>Chọn vùng miền...</option>
                  <option value="bac">Đặc sản miền Bắc</option>
                  <option value="trung">Đặc sản miền Trung</option>
                  <option value="nam">Đặc sản miền Nam</option>
                </select>
              </div>
              <div class="col-md-6 mb-3">
                <label for="productImage" class="form-label fw-bold">Hình ảnh sản phẩm</label>
                <input class="form-control border-brown" type="file" id="productImage">
              </div>
            </div>
            <div class="mb-3">
              <label for="productDesc" class="form-label fw-bold">Mô tả sản phẩm</label>
              <textarea class="form-control border-brown" id="productDesc" rows="5" placeholder="Mô tả nguồn gốc, cách dùng, bảo quản..."></textarea>
            </div>
            <div class="form-check mb-3">
              <input class="form-check-input" type="checkbox" value="1" id="bestSeller">
              <label class="form-check-label fw-bold text-danger" for="bestSeller">
                Đánh dấu là Sản phẩm bán chạy (🔥)
              </label>
            </div>
            <div class="text-end">
              <button type="submit" class="btn btn-brown px-4 py-2"><i class="bi bi-plus-circle me-2"></i>Thêm Sản Phẩm</button>
            </div>
          </form>
        </div>

      </div>
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
</body>
</html>