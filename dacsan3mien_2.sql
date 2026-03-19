-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 19, 2026 lúc 03:03 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `dacsan3mien`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiet_hoadon`
--

CREATE TABLE `chitiet_hoadon` (
  `id` int(10) UNSIGNED NOT NULL,
  `ma_hd` int(10) UNSIGNED NOT NULL,
  `ma_sp` int(10) UNSIGNED NOT NULL,
  `so_luong` int(10) UNSIGNED NOT NULL,
  `gia` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitiet_hoadon`
--

INSERT INTO `chitiet_hoadon` (`id`, `ma_hd`, `ma_sp`, `so_luong`, `gia`) VALUES
(1, 1, 1, 2, 240000.00),
(2, 2, 5, 1, 200000.00),
(3, 3, 10, 1, 500000.00),
(4, 4, 16, 5, 500000.00),
(5, 5, 29, 1, 400000.00);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten_danh_muc` varchar(100) NOT NULL,
  `mo_ta` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `ten_danh_muc`, `mo_ta`) VALUES
(1, 'Đặc sản miền Bắc', 'Các loại đặc sản nổi tiếng của các tỉnh miền Bắc'),
(2, 'Đặc sản miền Trung', 'Các loại đặc sản nổi tiếng của các tỉnh miền Trung'),
(3, 'Đặc sản miền Nam', 'Các loại đặc sản nổi tiếng của các tỉnh miền Nam');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `ma_hd` int(10) UNSIGNED NOT NULL,
  `ma_nguoi_dung` int(10) UNSIGNED NOT NULL,
  `ten_khach_hang` varchar(100) NOT NULL,
  `dien_thoai` varchar(20) DEFAULT NULL,
  `dia_chi` text DEFAULT NULL,
  `tong_tien` decimal(10,2) UNSIGNED NOT NULL,
  `trang_thai` varchar(50) NOT NULL DEFAULT 'cho xu ly',
  `ngay_dat` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`ma_hd`, `ma_nguoi_dung`, `ten_khach_hang`, `dien_thoai`, `dia_chi`, `tong_tien`, `trang_thai`, `ngay_dat`) VALUES
(1, 2, 'Nguyễn Văn A', '0911111111', 'TP.HCM1', 120000.00, 'cho xu ly', '2026-03-18 20:00:15'),
(2, 3, 'Trần Thị B', '0922222222', 'Điện Biên', 200000.00, 'Dang giao', '2026-03-18 20:11:02'),
(3, 4, 'Lê Văn C', '0933333333', 'Cần Thơ', 95000.00, 'Hoan thanh', '2026-03-18 20:11:02'),
(4, 5, 'Phạm Thị D', '0944444444', 'Đà Nẵng', 150000.00, 'cho xu ly', '2026-03-18 20:11:02'),
(5, 6, 'Hoàng Văn E', '0955555555', 'Hải Phòng', 70000.00, 'Dang giao', '2026-03-18 20:11:02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoidung`
--

CREATE TABLE `nguoidung` (
  `ma_nguoi_dung` int(10) UNSIGNED NOT NULL,
  `ten_dang_nhap` varchar(50) NOT NULL,
  `mat_khau` varchar(255) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `dien_thoai` varchar(20) NOT NULL,
  `vai_tro` varchar(20) NOT NULL DEFAULT 'khach',
  `ngay_tao` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nguoidung`
--

INSERT INTO `nguoidung` (`ma_nguoi_dung`, `ten_dang_nhap`, `mat_khau`, `email`, `dien_thoai`, `vai_tro`, `ngay_tao`) VALUES
(1, 'admin', '123456', 'admin@gmail.com', '0900000000', 'admin', '2026-03-02 17:44:26'),
(2, 'nguyenvana', '123456', 'vana@gmail.com', '0911111111', 'khach', '2026-03-18 17:49:37'),
(3, 'tranthib', '123456', 'chi@gmail.com', '0922222222', 'khach', '2026-03-18 17:49:37'),
(4, 'levanc', '123456', 'vanc@gmail.com', '0933333333', 'khach', '2026-03-18 17:49:37'),
(5, 'phamthid', '123456', 'thid@gmail.com', '0944444444', 'khach', '2026-03-18 17:49:37'),
(6, 'hoangvane', '123456', 'vane@gmail.com', '0955555555', 'khach', '2026-03-18 20:06:32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhacungcap`
--

CREATE TABLE `nhacungcap` (
  `ma_ncc` int(10) UNSIGNED NOT NULL,
  `ten_ncc` varchar(150) NOT NULL,
  `so_dien_thoai` varchar(20) NOT NULL,
  `dia_chi` text NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhacungcap`
--

INSERT INTO `nhacungcap` (`ma_ncc`, `ten_ncc`, `so_dien_thoai`, `dia_chi`, `email`) VALUES
(1, 'Đặc sản làng Đầm Hà Nam', '0901111111', 'Làng Đầm, xã Liêm Tuyền, TP. Phủ Lý, Hà Nam', 'hanam@dacsan.vn'),
(2, 'Đặc sản Hải Dương', '0902222222', 'Phường Nguyễn Trãi, TP. Hải Dương, Hải Dương', 'haiduong@dacsan.vn'),
(3, 'Đặc sản Bắc Kạn', '0903333333', 'Xã Dương Quang, TP. Bắc Kạn, Bắc Kạn', 'backan@dacsan.vn'),
(4, 'Đặc sản Hạ Long Quảng Ninh', '0904444444', 'Phường Hồng Hải, TP. Hạ Long, Quảng Ninh', 'halong@dacsan.vn'),
(5, 'Đặc sản Điện Biên', '0905555555', 'Phường Mường Thanh, TP. Điện Biên Phủ, Điện Biên', 'dienbien@dacsan.vn'),
(6, 'Đặc sản Hưng Yên', '0906666666', 'Xã Hồng Nam, TP. Hưng Yên, Hưng Yên', 'hungyen@dacsan.vn'),
(7, 'Đặc sản Hà Nội', '0907777777', 'Phố Hàng Đường, Quận Hoàn Kiếm, Hà Nội', 'hanoi@dacsan.vn'),
(8, 'Đặc sản Yên Tử Quảng Ninh', '0908888888', 'Khu di tích Yên Tử, TP. Uông Bí, Quảng Ninh', 'yentu@dacsan.vn'),
(9, 'Đặc sản Lào Cai', '0909999999', 'Xã Bản Phố, Huyện Bắc Hà, Lào Cai', 'laocai@dacsan.vn'),
(10, 'Đặc sản Tây Bắc', '0910000000', 'Thị trấn Mộc Châu, Huyện Mộc Châu, Sơn La', 'taybac@dacsan.vn'),
(11, 'Đặc sản Bình Thuận', '0911111111', 'Phường Phú Trinh, TP. Phan Thiết, Bình Thuận', 'binhthuan@dacsan.vn'),
(12, 'Đặc sản Bình Định', '0912222222', 'Phường Nhơn Bình, TP. Quy Nhơn, Bình Định', 'binhdinh@dacsan.vn'),
(13, 'Đặc sản Phú Yên', '0913333333', 'Phường 7, TP. Tuy Hòa, Phú Yên', 'phuyen@dacsan.vn'),
(14, 'Đặc sản Đà Nẵng', '0914444444', 'Quận Hải Châu, TP. Đà Nẵng', 'danang@dacsan.vn'),
(15, 'Đặc sản Huế', '0915555555', 'Phường Thuận Hòa, TP. Huế, Thừa Thiên Huế', 'hue@dacsan.vn'),
(16, 'Đặc sản Thanh Hóa', '0916666666', 'Phường Đông Sơn, TP. Thanh Hóa, Thanh Hóa', 'thanhhoa@dacsan.vn'),
(17, 'Đặc sản Ninh Thuận', '0917777777', 'Phường Kinh Dinh, TP. Phan Rang - Tháp Chàm, Ninh Thuận', 'ninhthuan@dacsan.vn'),
(18, 'Đặc sản Khánh Hòa', '0918888888', 'Phường Vĩnh Hải, TP. Nha Trang, Khánh Hòa', 'khanhhoa@dacsan.vn'),
(19, 'Đặc sản Sóc Trăng', '0919999999', 'Phường 6, TP. Sóc Trăng, Sóc Trăng', 'soctrang@dacsan.vn'),
(20, 'Đặc sản Trà Vinh', '0920000000', 'Phường 1, TP. Trà Vinh, Trà Vinh', 'travinh@dacsan.vn'),
(21, 'Đặc sản Bình Phước', '0921111111', 'Phường Tân Phú, TP. Đồng Xoài, Bình Phước', 'binhphuoc@dacsan.vn'),
(22, 'Đặc sản Bến Tre', '0922222222', 'Phường Phú Khương, TP. Bến Tre, Bến Tre', 'bentre@dacsan.vn'),
(23, 'Đặc sản Kiên Giang', '0923333333', 'Phường Vĩnh Thanh, TP. Rạch Giá, Kiên Giang', 'kiengiang@dacsan.vn'),
(24, 'Đặc sản Vĩnh Hưng Bạc Liêu', '0924444444', 'Xã Vĩnh Hưng, Huyện Vĩnh Lợi, Bạc Liêu', 'baclieu@dacsan.vn'),
(25, 'Đặc sản Cà Mau', '0925555555', 'Phường 5, TP. Cà Mau, Cà Mau', 'camau@dacsan.vn'),
(26, 'Đặc sản Tây Ninh', '0926666666', 'Phường 2, TP. Tây Ninh, Tây Ninh', 'tayninh@dacsan.vn'),
(27, 'Đặc sản Đồng Tháp', '0927777777', 'Phường 1, TP. Sa Đéc, Đồng Tháp', 'dongthap@dacsan.vn');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `ma_sp` int(10) UNSIGNED NOT NULL,
  `ten_sp` varchar(200) NOT NULL,
  `gia` decimal(10,2) UNSIGNED NOT NULL,
  `mo_ta` text DEFAULT NULL,
  `id_danh_muc` int(10) UNSIGNED NOT NULL,
  `ma_ncc` int(10) UNSIGNED NOT NULL,
  `so_luong` int(10) UNSIGNED NOT NULL,
  `ngay_tao` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`ma_sp`, `ten_sp`, `gia`, `mo_ta`, `id_danh_muc`, `ma_ncc`, `so_luong`, `ngay_tao`) VALUES
(1, 'Bánh Chưng làng Đầm Hà Nam', 120000.00, 'Bánh chưng truyền thống Hà Nam, gạo nếp cái hoa vàng, nhân thịt đậu xanh.', 1, 1, 50, '2026-03-18 17:42:07'),
(2, 'Cơm lam Bắc Kạn', 60000.00, 'Cơm lam nướng ống tre, hương vị núi rừng.', 1, 3, 40, '2026-03-18 17:42:07'),
(3, 'Bánh đậu xanh Hải Dương', 80000.00, 'Đặc sản nổi tiếng Hải Dương, mềm mịn, thơm ngọt.', 1, 2, 50, '2026-03-18 19:13:54'),
(4, 'Chả mực Hạ Long', 350000.00, 'Chả mực giã tay nổi tiếng Quảng Ninh.', 1, 4, 60, '2026-03-18 19:13:54'),
(5, 'Lạp xưởng Điện Biên', 200000.00, 'Lạp xưởng hun khói, đậm vị Tây Bắc.', 1, 5, 25, '2026-03-18 19:13:54'),
(6, 'Long nhãn Hưng Yên', 150000.00, 'Nhãn sấy khô, ngọt tự nhiên.', 1, 6, 100, '2026-03-18 19:13:54'),
(7, 'Ô mai Hà Nội', 90000.00, 'Ô mai chua ngọt đặc trưng Hà Nội.', 1, 7, 80, '2026-03-18 19:13:54'),
(8, 'Rượu mơ Yên Tử', 250000.00, 'Rượu mơ thơm dịu, dễ uống.', 1, 8, 20, '2026-03-18 19:13:54'),
(9, 'Rượu San Lùng Lào Cai', 300000.00, 'Rượu truyền thống vùng cao.', 1, 9, 15, '2026-03-18 19:13:54'),
(10, 'Trâu gác bếp Tây Bắc', 500000.00, 'Thịt trâu hun khói, đặc sản Tây Bắc.', 1, 10, 10, '2026-03-18 19:13:54'),
(11, 'Bánh cốm sữa Bình Thuận', 70000.00, 'Bánh cốm dẻo thơm, vị sữa đặc trưng.', 2, 11, 50, '2026-03-18 19:26:19'),
(12, 'Bánh tráng nước dừa Bình Định', 60000.00, 'Bánh tráng giòn, thơm nước dừa.', 2, 12, 60, '2026-03-18 19:26:19'),
(13, 'Cá mai tẩm mè Phú Yên', 120000.00, 'Cá mai khô tẩm mè, đậm vị biển.', 2, 13, 40, '2026-03-18 19:26:19'),
(14, 'Chả giò Đà Nẵng', 90000.00, 'Chả giò thơm ngon, tiện lợi.', 2, 14, 70, '2026-03-18 19:26:19'),
(15, 'Mè xửng Huế', 80000.00, 'Kẹo mè truyền thống Huế.', 2, 15, 80, '2026-03-18 19:26:19'),
(16, 'Nem chua Thanh Hóa', 100000.00, 'Nem chua chua cay hấp dẫn.', 2, 16, 55, '2026-03-18 19:26:19'),
(17, 'Rượu Bầu Đá Bình Định', 300000.00, 'Rượu mạnh nổi tiếng Bình Định.', 2, 12, 20, '2026-03-18 19:26:19'),
(18, 'Táo xanh sấy Ninh Thuận', 110000.00, 'Táo sấy dẻo, vị chua ngọt.', 2, 17, 65, '2026-03-18 19:26:19'),
(19, 'Tré Bình Định', 130000.00, 'Món tré chua cay độc đáo.', 2, 12, 45, '2026-03-18 19:26:19'),
(20, 'Yến sào Khánh Hòa', 500000.00, 'Yến sào bổ dưỡng cao cấp.', 2, 18, 15, '2026-03-18 19:26:19'),
(21, 'Bánh pía Sóc Trăng', 90000.00, 'Bánh pía nhân đậu xanh, sầu riêng.', 3, 19, 60, '2026-03-18 19:38:44'),
(22, 'Bánh tét Trà Vinh', 120000.00, 'Bánh tét truyền thống miền Tây.', 3, 20, 40, '2026-03-18 19:38:44'),
(23, 'Hạt điều Bình Phước', 200000.00, 'Hạt điều rang muối thơm ngon.', 3, 21, 70, '2026-03-18 19:38:44'),
(24, 'Kẹo dừa Bến Tre', 80000.00, 'Kẹo dừa mềm ngọt đặc trưng.', 3, 22, 80, '2026-03-18 19:38:44'),
(25, 'Khô mực Kiên Giang', 350000.00, 'Mực khô chất lượng cao.', 3, 23, 30, '2026-03-18 19:38:44'),
(26, 'Mắm chua Bạc Liêu', 100000.00, 'Mắm chua đậm đà miền Tây.', 3, 24, 50, '2026-03-18 19:38:44'),
(27, 'Mật ong Cà Mau', 250000.00, 'Mật ong rừng nguyên chất.', 3, 25, 35, '2026-03-18 19:38:44'),
(28, 'Nem bưởi Tây Ninh', 70000.00, 'Nem chay từ bưởi độc đáo.', 3, 26, 65, '2026-03-18 19:38:44'),
(29, 'Tôm khô Cà Mau', 400000.00, 'Tôm khô loại 1, thịt ngọt.', 3, 25, 25, '2026-03-18 19:38:44'),
(30, 'Trà sen Đồng Tháp', 150000.00, 'Trà sen thơm dịu, thanh mát.', 3, 27, 45, '2026-03-18 19:38:44');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitiet_hoadon`
--
ALTER TABLE `chitiet_hoadon`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`ma_hd`);

--
-- Chỉ mục cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`ma_nguoi_dung`);

--
-- Chỉ mục cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  ADD PRIMARY KEY (`ma_ncc`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`ma_sp`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chitiet_hoadon`
--
ALTER TABLE `chitiet_hoadon`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `ma_hd` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `ma_nguoi_dung` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  MODIFY `ma_ncc` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `ma_sp` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
