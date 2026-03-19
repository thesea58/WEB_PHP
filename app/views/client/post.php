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
    /* Style cho form quản trị */
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
    
    .alert {
      display: none;
    }
    
    .alert.show {
      display: block;
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

    <div class="container my-5 admin-container p-4">
      <h2 class="text-center fw-bold mb-4" style="color: #8B4513;">QUẢN LÝ ĐĂNG TẢI</h2>
      
      <!-- Alert Messages -->
      <div id="successAlert" class="alert alert-success alert-dismissible fade" role="alert">
        <span id="successMessage"></span>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
      <div id="errorAlert" class="alert alert-danger alert-dismissible fade" role="alert">
        <span id="errorMessage"></span>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
      
      <ul class="nav nav-tabs mb-4" id="adminTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="product-tab" data-bs-toggle="tab" data-bs-target="#product" type="button" role="tab" aria-controls="product" aria-selected="true">
            <i class="bi bi-box-seam me-2"></i>Đăng Sản Phẩm Mới
          </button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="list-tab" data-bs-toggle="tab" data-bs-target="#list" type="button" role="tab" aria-controls="list" aria-selected="false">
            <i class="bi bi-list-ul me-2"></i>Danh Sách Sản Phẩm
          </button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="post-tab" data-bs-toggle="tab" data-bs-target="#post" type="button" role="tab" aria-controls="post" aria-selected="false">
            <i class="bi bi-pencil-square me-2"></i>Đăng Bài Viết Mới
          </button>
        </li>
      </ul>

      <div class="tab-content" id="adminTabContent">
        
        <!-- TAB 1: Đăng Sản Phẩm -->
        <div class="tab-pane fade show active" id="product" role="tabpanel" aria-labelledby="product-tab">
          <form id="productForm" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="productName" class="form-label fw-bold">Tên sản phẩm <span class="text-danger">*</span></label>
                <input type="text" class="form-control border-brown" id="productName" name="ten_sp" placeholder="Ví dụ: Bánh Pía Sóc Trăng" required>
              </div>
              <div class="col-md-6 mb-3">
                <label for="productPrice" class="form-label fw-bold">Giá bán (VNĐ) <span class="text-danger">*</span></label>
                <input type="number" class="form-control border-brown" id="productPrice" name="gia" min="1000" placeholder="Ví dụ: 90000" required>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="productRegion" class="form-label fw-bold">Vùng miền <span class="text-danger">*</span></label>
                <select class="form-select border-brown" id="productRegion" name="vung_mien" required>
                  <option selected disabled>Chọn vùng miền...</option>
                  <option value="bac">Đặc sản miền Bắc</option>
                  <option value="trung">Đặc sản miền Trung</option>
                  <option value="nam">Đặc sản miền Nam</option>
                </select>
              </div>
              <div class="col-md-6 mb-3">
                <label for="productImage" class="form-label fw-bold">Hình ảnh sản phẩm</label>
                <input class="form-control border-brown" type="file" id="productImage" name="hinh_anh" accept="image/*">
              </div>
            </div>
            <div class="mb-3">
              <label for="productDesc" class="form-label fw-bold">Mô tả sản phẩm</label>
              <textarea class="form-control border-brown" id="productDesc" name="mo_ta" rows="5" placeholder="Mô tả nguồn gốc, cách dùng, bảo quản..."></textarea>
            </div>
            <div class="text-end">
              <button type="submit" class="btn btn-brown px-4 py-2"><i class="bi bi-plus-circle me-2"></i>Thêm Sản Phẩm</button>
            </div>
          </form>
        </div>

        <!-- TAB 2: Danh Sách Sản Phẩm -->
        <div class="tab-pane fade" id="list" role="tabpanel" aria-labelledby="list-tab">
          <div class="table-responsive">
            <table class="table table-hover table-striped">
              <thead style="background-color: #8B4513; color: white;">
                <tr>
                  <th>ID</th>
                  <th>Tên Sản Phẩm</th>
                  <th>Giá (VNĐ)</th>
                  <th>Danh Mục</th>
                  <th>Ngày Tạo</th>
                  <th>Hành Động</th>
                </tr>
              </thead>
              <tbody>
                <?php if (!empty($products)): ?>
                  <?php foreach ($products as $product): ?>
                    <tr>
                      <td><?php echo htmlspecialchars($product['ma_sp']); ?></td>
                      <td><?php echo htmlspecialchars($product['ten_sp']); ?></td>
                      <td><?php echo number_format($product['gia'], 0, ',', '.'); ?> VNĐ</td>
                      <td><?php echo htmlspecialchars($product['ten_danh_muc'] ?? 'N/A'); ?></td>
                      <td><?php echo date('d/m/Y', strtotime($product['ngay_tao'])); ?></td>
                      <td>
                        <button class="btn btn-sm btn-primary me-2" data-bs-toggle="modal" data-bs-target="#editModal" onclick="editProduct(<?php echo htmlspecialchars(json_encode($product)); ?>)">
                          <i class="bi bi-pencil"></i> Sửa
                        </button>
                        <button class="btn btn-sm btn-danger" onclick="deleteProduct(<?php echo htmlspecialchars($product['ma_sp']); ?>)">
                          <i class="bi bi-trash"></i> Xóa
                        </button>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                <?php else: ?>
                  <tr>
                    <td colspan="6" class="text-center text-muted py-4">Chưa có sản phẩm nào</td>
                  </tr>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>

        <!-- TAB 3: Đăng Bài Viết -->
        <div class="tab-pane fade" id="post" role="tabpanel" aria-labelledby="post-tab">
          <form method="POST">
            <div class="mb-3">
              <label for="postTitle" class="form-label fw-bold">Tiêu đề bài viết</label>
              <input type="text" class="form-control border-brown" id="postTitle" name="tieu_de" placeholder="Nhập tiêu đề bài viết..." required>
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="postCategory" class="form-label fw-bold">Danh mục</label>
                <select class="form-select border-brown" id="postCategory" name="danh_muc" required>
                  <option selected disabled>Chọn danh mục...</option>
                  <option value="am-thuc">Văn hóa ẩm thực</option>
                  <option value="meo-vat">Mẹo vặt nhà bếp</option>
                  <option value="tin-tuc">Tin tức khuyến mãi</option>
                </select>
              </div>
              <div class="col-md-6 mb-3">
                <label for="postImage" class="form-label fw-bold">Ảnh đại diện</label>
                <input class="form-control border-brown" type="file" id="postImage" name="hinh_anh" accept="image/*">
              </div>
            </div>
            <div class="mb-3">
              <label for="postContent" class="form-label fw-bold">Nội dung bài viết</label>
              <textarea class="form-control border-brown" id="postContent" name="noi_dung" rows="8" placeholder="Nhập nội dung chi tiết ở đây..." required></textarea>
            </div>
            <div class="text-end">
              <button type="submit" class="btn btn-brown px-4 py-2"><i class="bi bi-send me-2"></i>Đăng Bài</button>
            </div>
          </form>
          <div class="alert alert-info mt-3">
            <i class="bi bi-info-circle me-2"></i>Tính năng đăng bài viết sẽ được bổ sung sớm.
          </div>
        </div>

      </div>
    </div>

    <!-- Edit Product Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header" style="background-color: #8B4513; color: white;">
            <h5 class="modal-title" id="editModalLabel">Sửa Sản Phẩm</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form id="editForm">
            <div class="modal-body">
              <input type="hidden" id="editProductId">
              
              <div class="mb-3">
                <label for="editProductName" class="form-label fw-bold">Tên sản phẩm</label>
                <input type="text" class="form-control border-brown" id="editProductName" required>
              </div>
              
              <div class="mb-3">
                <label for="editProductPrice" class="form-label fw-bold">Giá bán (VNĐ)</label>
                <input type="number" class="form-control border-brown" id="editProductPrice" min="1000" required>
              </div>
              
              <div class="mb-3">
                <label for="editProductDesc" class="form-label fw-bold">Mô tả sản phẩm</label>
                <textarea class="form-control border-brown" id="editProductDesc" rows="4"></textarea>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
              <button type="submit" class="btn btn-brown"><i class="bi bi-check-circle me-2"></i>Cập nhật</button>
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

  <script>
    // Handle product form submission
    document.getElementById('productForm').addEventListener('submit', function(e) {
      e.preventDefault();
      
      const formData = new FormData(this);
      const submitBtn = this.querySelector('button[type="submit"]');
      const originalText = submitBtn.innerHTML;
      
      // Disable button
      submitBtn.disabled = true;
      submitBtn.innerHTML = '<i class="bi bi-hourglass-split me-1"></i>Đang thêm...';
      
      fetch('index.php?controller=Post&action=themSanPham', {
        method: 'POST',
        body: formData
      })
      .then(response => {
        // Check response status
        if (!response.ok) {
          return response.text().then(text => {
            throw new Error(`HTTP ${response.status}: ${text}`);
          });
        }
        return response.text();
      })
      .then(text => {
        // Parse JSON
        try {
          const data = JSON.parse(text);
          if (data.success) {
            showAlert('success', data.message || 'Thêm sản phẩm thành công');
            // Reset form
            document.getElementById('productForm').reset();
            // Auto close alert
            setTimeout(() => {
              document.getElementById('successAlert').classList.remove('show');
              // Reload product list
              location.reload();
            }, 2000);
          } else {
            showAlert('error', data.message || 'Thêm sản phẩm thất bại');
          }
        } catch (e) {
          showAlert('error', 'Lỗi phản hồi từ server: ' + text);
        }
      })
      .catch(error => {
        console.error('Fetch error:', error);
        showAlert('error', 'Có lỗi xảy ra: ' + error.message);
      })
      .finally(() => {
        // Enable button
        submitBtn.disabled = false;
        submitBtn.innerHTML = originalText;
      });
    });
    
    // Edit product function
    function editProduct(product) {
      // Populate modal with product data
      document.getElementById('editProductId').value = product.ma_sp;
      document.getElementById('editProductName').value = product.ten_sp;
      document.getElementById('editProductPrice').value = product.gia;
      document.getElementById('editProductDesc').value = product.mo_ta || '';
    }
    
    // Handle edit form submission
    document.getElementById('editForm')?.addEventListener('submit', function(e) {
      e.preventDefault();
      
      const ma_sp = document.getElementById('editProductId').value;
      const ten_sp = document.getElementById('editProductName').value;
      const gia = document.getElementById('editProductPrice').value;
      const mo_ta = document.getElementById('editProductDesc').value;
      
      const submitBtn = this.querySelector('button[type="submit"]');
      const originalText = submitBtn.innerHTML;
      submitBtn.disabled = true;
      submitBtn.innerHTML = '<i class="bi bi-hourglass-split me-1"></i>Đang cập nhật...';
      
      const formData = new FormData();
      formData.append('ma_sp', ma_sp);
      formData.append('ten_sp', ten_sp);
      formData.append('gia', gia);
      formData.append('mo_ta', mo_ta);
      
      fetch('index.php?controller=Post&action=capNhatSanPham', {
        method: 'POST',
        body: formData
      })
      .then(response => response.text())
      .then(text => {
        try {
          const data = JSON.parse(text);
          if (data.success) {
            showAlert('success', 'Cập nhật sản phẩm thành công');
            setTimeout(() => {
              location.reload();
            }, 2000);
          } else {
            showAlert('error', data.message || 'Cập nhật thất bại');
          }
        } catch (e) {
          showAlert('error', 'Lỗi: ' + text);
        }
      })
      .catch(error => {
        console.error('Error:', error);
        showAlert('error', 'Có lỗi xảy ra');
      })
      .finally(() => {
        submitBtn.disabled = false;
        submitBtn.innerHTML = originalText;
      });
    });
    
    // Delete product function
    function deleteProduct(ma_sp) {
      if (!confirm('Bạn chắc chắn muốn xóa sản phẩm này?')) {
        return;
      }
      
      const formData = new FormData();
      formData.append('ma_sp', ma_sp);
      
      fetch('index.php?controller=Post&action=xoaSanPham', {
        method: 'POST',
        body: formData
      })
      .then(response => response.text())
      .then(text => {
        try {
          const data = JSON.parse(text);
          if (data.success) {
            showAlert('success', 'Xóa sản phẩm thành công');
            setTimeout(() => {
              location.reload();
            }, 2000);
          } else {
            showAlert('error', data.message || 'Xóa thất bại');
          }
        } catch (e) {
          showAlert('error', 'Lỗi: ' + text);
        }
      })
      .catch(error => {
        console.error('Error:', error);
        showAlert('error', 'Có lỗi xảy ra');
      });
    }
    
    // Show alert function
    function showAlert(type, message) {
      const alertId = type === 'success' ? 'successAlert' : 'errorAlert';
      const messageId = type === 'success' ? 'successMessage' : 'errorMessage';
      
      const alertEl = document.getElementById(alertId);
      const messageEl = document.getElementById(messageId);
      
      messageEl.textContent = message;
      alertEl.classList.add('show');
    }
  </script>

</body>
</html>