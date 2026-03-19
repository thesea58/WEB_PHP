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

       <div class="row">
    <div class="col-md-3 col-sm-6 mb-4">
        <div class="card h-100 shadow-sm product-card p-2">
            <img src="app/views/client/img/Anh/Bac/ruousanlung_laocai.jpg" class="card-img-top img-sp" style="cursor: pointer;"
                 data-bs-toggle="modal" data-bs-target="#productModal"
                 data-name="Rượu San Lùng Lào Cai" data-price="300.000đ" data-img="img/Anh/Bac/ruousanlung_laocai.jpg"
                 data-packaging="Chai thủy tinh cao cấp 500ml" data-ingredients="Gạo nương địa phương, men lá thảo dược"
                 data-nutrition="Nồng độ cồn 35-40%" data-flavor="Thơm nồng nàn, êm dịu, không gây đau đầu" 
                 data-storage="Nơi khô ráo, tránh ánh nắng trực tiếp" data-origin="Bản San Lùng, Lào Cai"
                 data-expiry="Hạn sử dụng: 36 tháng kể từ NXS" data-mfg="NXS: In trên bao bì"
                 data-usage="Dùng trực tiếp trong các bữa tiệc hoặc ngâm thảo dược quý.">
            <div class="card-body text-center d-flex flex-column">
                <h5 class="card-title fw-bold text-brown">Rượu San Lùng Lào Cai</h5>
                <p class="card-text text-danger fw-bold">300.000đ</p>
                <button class="btn btn-outline-brown mt-auto w-100">Thêm vào giỏ</button>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 mb-4">
        <div class="card h-100 shadow-sm product-card p-2">
            <img src="app/views/client/img/Anh/Bac/traugacbep_TayBac.png" class="card-img-top img-sp" style="cursor: pointer;"
                 data-bs-toggle="modal" data-bs-target="#productModal"
                 data-name="Trâu gác bếp Tây Bắc" data-price="500.000đ" data-img="img/Anh/Bac/traugacbep_TayBac.png"
                 data-packaging="Túi hút chân không 500g" data-ingredients="Thịt bắp trâu tươi, mắc khén, hạt dổi, ớt"
                 data-nutrition="Giàu Protein, ít chất béo" data-flavor="Vị ngọt thịt, cay nồng mắc khén, mùi khói đặc trưng" 
                 data-storage="Ngăn đá tủ lạnh (để bảo quản tốt nhất)" data-origin="Vùng núi cao Tây Bắc"
                 data-expiry="HSD: 6 tháng (cấp đông) - 1 tháng (ngăn mát)" data-mfg="NXS: Ghi trên tem nhãn"
data-usage="Hấp cách thủy hoặc quay lò vi sóng 2 phút, sau đó đập dập xé nhỏ.">
            <div class="card-body text-center d-flex flex-column">
                <h5 class="card-title fw-bold text-brown">Trâu gác bếp Tây Bắc</h5>
                <p class="card-text text-danger fw-bold">500.000đ</p>
                <button class="btn btn-outline-brown mt-auto w-100">Thêm vào giỏ</button>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 mb-4">
        <div class="card h-100 shadow-sm product-card p-2">
            <img src="app/views/client/img/Anh/Trung/tre_binhdinh.jpg" class="card-img-top img-sp" style="cursor: pointer;"
                 data-bs-toggle="modal" data-bs-target="#productModal"
                 data-name="Tré Bình Định" data-price="130.000đ" data-img="img/Anh/Trung/tre_binhdinh.jpg"
                 data-packaging="Gói lá ổi tươi, bọc rơm khô truyền thống" data-ingredients="Tai heo, mũi heo, thính gạo, riềng, tỏi"
                 data-nutrition="Nhiều Collagen tự nhiên từ bì heo" data-flavor="Chua thanh, giòn sần sật, cay nồng vị riềng" 
                 data-storage="Ngăn mát tủ lạnh từ 0-5 độ C" data-origin="Huyện Hoài Nhơn, Bình Định"
                 data-expiry="HSD: 15 ngày kể từ ngày sản xuất" data-mfg="NXS: Sản xuất mới mỗi ngày"
                 data-usage="Lột bỏ lớp rơm, đánh tơi thịt, trộn kèm rau thơm, dưa leo.">
            <div class="card-body text-center d-flex flex-column">
                <h5 class="card-title fw-bold text-brown">Tré Bình Định</h5>
                <p class="card-text text-danger fw-bold">130.000đ</p>
                <button class="btn btn-outline-brown mt-auto w-100">Thêm vào giỏ</button>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 mb-4">
        <div class="card h-100 shadow-sm product-card p-2">
            <img src="app/views/client/img/Anh/Trung/yenxao_khanhhoa.jpg" class="card-img-top img-sp" style="cursor: pointer;"
                 data-bs-toggle="modal" data-bs-target="#productModal"
                 data-name="Yến xào Khánh Hòa" data-price="500.000đ" data-img="img/Anh/Trung/yenxao_khanhhoa.jpg"
                 data-packaging="Hộp gỗ lót nhung sang trọng" data-ingredients="100% Tổ yến đảo thiên nhiên nguyên chất"
                 data-nutrition="Chứa 18 loại Axit Amin và khoáng chất quý" data-flavor="Mùi tanh nhẹ tự nhiên, vị thanh khiết" 
                 data-storage="Nơi khô ráo, tránh ẩm ướt" data-origin="Đảo yến Nha Trang, Khánh Hòa"
                 data-expiry="HSD: 24 tháng kể từ ngày đóng gói" data-mfg="NXS: Ghi trên tem kiểm định"
                 data-usage="Chưng với đường phèn, táo đỏ hoặc hạt sen để bồi bổ sức khỏe.">
            <div class="card-body text-center d-flex flex-column">
                <h5 class="card-title fw-bold text-brown">Yến xào Khánh Hòa</h5>
<p class="card-text text-danger fw-bold">500.000đ</p>
                <button class="btn btn-outline-brown mt-auto w-100">Thêm vào giỏ</button>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 mb-4">
        <div class="card h-100 shadow-sm product-card p-2">
            <img src="app/views/client/img/Anh/Nam/khomuc_kiengiang.jpg" class="card-img-top img-sp" style="cursor: pointer;"
                 data-bs-toggle="modal" data-bs-target="#productModal"
                 data-name="Khô mực Kiên Giang" data-price="350.000đ" data-img="img/Anh/Nam/khomuc_kiengiang.jpg"
                 data-packaging="Túi hút chân không kín khí" data-ingredients="Mực ống câu tươi sấy khô tự nhiên"
                 data-nutrition="Hàm lượng đạm và canxi cực cao" data-flavor="Vị ngọt đậm đà, thịt mực dai và thơm" 
                 data-storage="Ngăn đông tủ lạnh để giữ độ ngọt" data-origin="Vùng biển đảo Kiên Giang"
                 data-expiry="HSD: 12 tháng (cấp đông)" data-mfg="NXS: Xem trên nhãn sản phẩm"
                 data-usage="Nướng trên lửa than hoặc cồn, xé nhỏ chấm cùng tương ớt.">
            <div class="card-body text-center d-flex flex-column">
                <h5 class="card-title fw-bold text-brown">Khô mực Kiên Giang</h5>
                <p class="card-text text-danger fw-bold">350.000đ</p>
                <button class="btn btn-outline-brown mt-auto w-100">Thêm vào giỏ</button>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 mb-4">
        <div class="card h-100 shadow-sm product-card p-2">
            <img src="app/views/client/img/Anh/Nam/keodua_BenTre.jpg" class="card-img-top img-sp" style="cursor: pointer;"
                 data-bs-toggle="modal" data-bs-target="#productModal"
                 data-name="Kẹo dừa Bến Tre" data-price="80.000đ" data-img="img/Anh/Nam/keodua_BenTre.jpg"
                 data-packaging="Hộp giấy truyền thống mộc mạc" data-ingredients="Nước cốt dừa nguyên chất, mạch nha, đường"
                 data-nutrition="Cung cấp năng lượng tức thì" data-flavor="Béo ngậy vị cốt dừa, ngọt thanh mạch nha" 
                 data-storage="Nhiệt độ phòng, nơi thoáng mát" data-origin="Xứ Dừa Bến Tre"
                 data-expiry="HSD: 6 tháng kể từ NXS" data-mfg="NXS: In trực tiếp trên hộp"
                 data-usage="Dùng trực tiếp, ngon nhất khi nhâm nhi cùng trà nóng.">
            <div class="card-body text-center d-flex flex-column">
                <h5 class="card-title fw-bold text-brown">Kẹo dừa bến tre</h5>
                <p class="card-text text-danger fw-bold">80.000đ</p>
                <button class="btn btn-outline-brown mt-auto w-100">Thêm vào giỏ</button>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 mb-4">
        <div class="card h-100 shadow-sm product-card p-2">
<img src="app/views/client/img/Anh/Nam/banhpia_soctrang.jpg" class="card-img-top img-sp" style="cursor: pointer;"
                 data-bs-toggle="modal" data-bs-target="#productModal"
                 data-name="Bánh pía Sóc Trăng" data-price="90.000đ" data-img="img/Anh/Nam/banhpia_soctrang.jpg"
                 data-packaging="Gói 4 cái, có túi hút ẩm" data-ingredients="Đậu xanh, sầu riêng tươi, trứng muối, bột mì"
                 data-nutrition="Năng lượng cao, giàu dinh dưỡng" data-flavor="Vỏ bánh mềm, nhân sầu riêng thơm nồng" 
                 data-storage="Nơi khô ráo hoặc ngăn mát nếu muốn để lâu" data-origin="Vũng Thơm, Sóc Trăng"
                 data-expiry="HSD: 45 ngày (nhiệt độ thường)" data-mfg="NXS: Xem trên bao bì"
                 data-usage="Ăn trực tiếp, lột bỏ lớp giấy lót mỏng dưới đáy bánh.">
            <div class="card-body text-center d-flex flex-column">
                <h5 class="card-title fw-bold text-brown">Bánh pía Sóc Trăng</h5>
                <p class="card-text text-danger fw-bold">90.000đ</p>
                <button class="btn btn-outline-brown mt-auto w-100">Thêm vào giỏ</button>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-sm-6 mb-4">
        <div class="card h-100 shadow-sm product-card p-2">
            <img src="app/views/client/img/Anh/Trung/taoxanhsay_ninhthuan.png" class="card-img-top img-sp" style="cursor: pointer;"
                 data-bs-toggle="modal" data-bs-target="#productModal"
                 data-name="Táo sấy Ninh Thuận" data-price="110.000đ" data-img="img/Anh/Trung/taoxanhsay_ninhthuan.png"
                 data-packaging="Túi zip 250g tiện lợi" data-ingredients="Táo xanh Phan Rang tươi sấy dẻo"
                 data-nutrition="Giàu Vitamin C, chất xơ và khoáng chất" data-flavor="Chua chua ngọt ngọt, vị dẻo dai tự nhiên" 
                 data-storage="Đóng kín miệng túi sau khi mở" data-origin="Vùng nắng Ninh Thuận"
                 data-expiry="HSD: 9 tháng kể từ ngày sản xuất" data-mfg="NXS: In trên mép túi"
                 data-usage="Dùng như món ăn vặt hàng ngày hoặc đãi khách.">
            <div class="card-body text-center d-flex flex-column">
                <h5 class="card-title fw-bold text-brown">Táo xấy Ninh Thuận</h5>
                <p class="card-text text-danger fw-bold">110.000đ</p>
                <button class="btn btn-outline-brown mt-auto w-100">Thêm vào giỏ</button>
            </div>
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
