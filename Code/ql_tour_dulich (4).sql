-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 10, 2022 lúc 11:44 AM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ql_tour_dulich`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietgia`
--

CREATE TABLE `chitietgia` (
  `maPhieuTour` char(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maTour` char(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doTuoi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `soLuong` int(11) NOT NULL,
  `thanhTien` bigint(20) NOT NULL,
  `donVi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietgia`
--

INSERT INTO `chitietgia` (`maPhieuTour`, `maTour`, `doTuoi`, `soLuong`, `thanhTien`, `donVi`) VALUES
('PT1293', 'Tour2', '2', 1, 1424456, ''),
('PT1293', 'Tour2', '3', 1, 974945, ''),
('PT9622', 'Tour1', '1', 2, 300000, ''),
('PT9622', 'Tour1', '2', 2, 500000, ''),
('PT9622', 'Tour1', '3', 1, 140000, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `doitac`
--

CREATE TABLE `doitac` (
  `id` int(11) NOT NULL,
  `maCongTy` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenCongTy` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinhAnh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `soDienThoai` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diaChi` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tinhTrang` int(11) NOT NULL DEFAULT 0,
  `linkXacMinhEmail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thoiGianXacMinhEmail` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `doitac`
--

INSERT INTO `doitac` (`id`, `maCongTy`, `tenCongTy`, `hinhAnh`, `soDienThoai`, `email`, `diaChi`, `password`, `tinhTrang`, `linkXacMinhEmail`, `thoiGianXacMinhEmail`) VALUES
(1, 'Cty1', 'CongTy1', NULL, '0211615616', 'congty1@gmail.com', 'Hà Nội', '123456', 1, '', NULL),
(2, 'Cty2', 'Công Ty 2', NULL, '0211615617', 'congty2@gmail.com', 'Hà Đông', '123456', 1, '', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giatour`
--

CREATE TABLE `giatour` (
  `maTour` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doTuoi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `moTa` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gia` bigint(20) NOT NULL,
  `donVi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `giatour`
--

INSERT INTO `giatour` (`maTour`, `doTuoi`, `moTa`, `gia`, `donVi`) VALUES
('Tour1', '1', 'Trẻ em', 150000, ''),
('Tour1', '2', 'Người lớn', 250000, ''),
('Tour1', '3', 'Người Già', 140000, ''),
('Tour2', '1', 'Trẻ em', 448896, ''),
('Tour2', '2', 'Trung Niên', 1424456, ''),
('Tour2', '3', 'Người Già', 974945, ''),
('Tour3', '1', 'Thiếu Nhi', 461432, ''),
('Tour3', '2', 'Người Lớn', 142424, ''),
('Tour3', '3', 'Người Già', 545547, ''),
('Tour4', '1', 'Thiếu nhi', 64451, ''),
('Tour4', '2', 'Trung niên', 12427, ''),
('Tour4', '3', 'Người Lớn', 4534645, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoidung`
--

CREATE TABLE `nguoidung` (
  `id` int(11) NOT NULL,
  `maNguoiDung` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hoVaTen` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinhAnh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ngaySinh` date NOT NULL,
  `gioiTinh` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `soDienThoai` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diaChi` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `soCMT` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tinhTrang` int(11) NOT NULL DEFAULT 0,
  `linkXacMinhEmail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thoiGianXacMinhEmail` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nguoidung`
--

INSERT INTO `nguoidung` (`id`, `maNguoiDung`, `hoVaTen`, `hinhAnh`, `ngaySinh`, `gioiTinh`, `soDienThoai`, `email`, `diaChi`, `soCMT`, `password`, `tinhTrang`, `linkXacMinhEmail`, `thoiGianXacMinhEmail`) VALUES
(1, '1', 'Lê Công Minh', NULL, '2001-07-01', 'Nam', '02116156163', 'cmza@gmail.com', 'Hà Đông Hà Nội', '00145464646', '123', 1, '', NULL),
(4, 'KH4N2911', 'Lê Công Minh', NULL, '2022-01-21', 'Nam', '021451614465', 'congminhlei4@gmail.com', 'Hà Đông', '12354644646', '$2y$10$rJrH67/Hbf20HuLr0H3XveG1VEFdAqoIg8TXPIM.d7BO.Dz9djQ36', 1, '857734c6c6494c1179348c7780cbe9b7121', '2022-01-06 07:06:12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `id` int(11) NOT NULL,
  `maNhanVien` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hoVaTen` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinhAnh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ngaySinh` date NOT NULL,
  `gioiTinh` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `soDienThoai` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tinhTrang` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieudangkitour`
--

CREATE TABLE `phieudangkitour` (
  `maPhieuTour` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maNguoiDung` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `soKhach` int(11) NOT NULL,
  `maTour` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thoiGianDat` datetime NOT NULL,
  `hinhThucThanhToan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tinhTrang` int(11) NOT NULL DEFAULT 0,
  `tongTien` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phieudangkitour`
--

INSERT INTO `phieudangkitour` (`maPhieuTour`, `maNguoiDung`, `soKhach`, `maTour`, `thoiGianDat`, `hinhThucThanhToan`, `tinhTrang`, `tongTien`) VALUES
('PT1293', 'KH4N2911', 2, 'Tour2', '2022-01-10 11:22:50', 'Chuyển Khoản', 0, 2399401),
('PT9622', 'KH4N2911', 5, 'Tour1', '2022-01-10 11:21:24', 'Tiền Mặt', 0, 940000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tour`
--

CREATE TABLE `tour` (
  `id` int(11) NOT NULL,
  `maTour` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenTour` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinhAnh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ngayKhoiHanh` date NOT NULL,
  `ngayKetThuc` date NOT NULL,
  `diemKhoiHanh` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diemKetThuc` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `loaiHinh` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `moTa` varchar(7000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maCongTy` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tinhTrang` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tour`
--

INSERT INTO `tour` (`id`, `maTour`, `tenTour`, `hinhAnh`, `ngayKhoiHanh`, `ngayKetThuc`, `diemKhoiHanh`, `diemKetThuc`, `loaiHinh`, `moTa`, `maCongTy`, `tinhTrang`) VALUES
(1, 'Tour1', 'Hà Nội- Lạng Sơn', 'Tour1', '2022-07-13', '2022-07-19', 'Hà Nội', 'Lạng Sơn', 'Miền Bắc', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Nisl tincidunt eget nullam non. Quis hendrerit dolor magna eget est lorem ipsum dolor sit. Volutpat odio facilisis mauris sit amet massa. Commodo odio aenean sed adipiscing diam donec adipiscing tristique. Mi eget mauris pharetra et. Non tellus orci ac auctor augue. Elit at imperdiet dui accumsan sit. Ornare arcu dui vivamus arcu felis. Egestas integer eget aliquet nibh praesent. In hac habitasse platea dictumst quisque sagittis purus. Pulvinar elementum integer enim neque volutpat ac.', 'Cty1', 1),
(2, 'Tour2', 'Hà Nội Hà Nam', 'Tour2', '2022-07-06', '2022-07-20', 'Hà Nội', 'Hà Nam', 'Leo núi', 'lore jansfjasifn oan osafnjoasujdsaoi jaso jj ioaj dọi a ạ psaj psaj dpa jp japsdjp ad', 'Cty2', 1),
(3, 'Tour3', 'Hà Nội Hà Bắc', 'Tour3', '2022-05-13', '2022-06-20', 'Hà Nội', 'Hà Bắc', 'Mạo hiểm', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'Cty1', 1),
(4, 'Tour4', 'Hà Đông Hà Tây', 'Tour4', '2022-03-06', '2022-04-20', 'Hà Đông', 'Hà Tây', 'Miền Bắc', 'Mô Tả adbadba', 'Cty2', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitietgia`
--
ALTER TABLE `chitietgia`
  ADD PRIMARY KEY (`maPhieuTour`,`maTour`,`doTuoi`),
  ADD KEY `maTour` (`maTour`,`doTuoi`);

--
-- Chỉ mục cho bảng `doitac`
--
ALTER TABLE `doitac`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `maCongTy` (`maCongTy`),
  ADD UNIQUE KEY `soDienThoai` (`soDienThoai`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Chỉ mục cho bảng `giatour`
--
ALTER TABLE `giatour`
  ADD PRIMARY KEY (`maTour`,`doTuoi`);

--
-- Chỉ mục cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `maNguoiDung` (`maNguoiDung`),
  ADD UNIQUE KEY `soDienThoai` (`soDienThoai`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `diaChi` (`diaChi`),
  ADD UNIQUE KEY `soCMT` (`soCMT`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `maNhanVien` (`maNhanVien`),
  ADD UNIQUE KEY `soDienThoai` (`soDienThoai`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Chỉ mục cho bảng `phieudangkitour`
--
ALTER TABLE `phieudangkitour`
  ADD PRIMARY KEY (`maPhieuTour`),
  ADD KEY `maTour` (`maTour`),
  ADD KEY `maNguoiDung` (`maNguoiDung`);

--
-- Chỉ mục cho bảng `tour`
--
ALTER TABLE `tour`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `maTour` (`maTour`),
  ADD KEY `maCongTy` (`maCongTy`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `doitac`
--
ALTER TABLE `doitac`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tour`
--
ALTER TABLE `tour`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitietgia`
--
ALTER TABLE `chitietgia`
  ADD CONSTRAINT `chitietgia_ibfk_1` FOREIGN KEY (`maPhieuTour`) REFERENCES `phieudangkitour` (`maPhieuTour`),
  ADD CONSTRAINT `chitietgia_ibfk_2` FOREIGN KEY (`maTour`,`doTuoi`) REFERENCES `giatour` (`maTour`, `doTuoi`);

--
-- Các ràng buộc cho bảng `giatour`
--
ALTER TABLE `giatour`
  ADD CONSTRAINT `giatour_ibfk_1` FOREIGN KEY (`maTour`) REFERENCES `tour` (`maTour`);

--
-- Các ràng buộc cho bảng `phieudangkitour`
--
ALTER TABLE `phieudangkitour`
  ADD CONSTRAINT `phieudangkitour_ibfk_1` FOREIGN KEY (`maTour`) REFERENCES `tour` (`maTour`),
  ADD CONSTRAINT `phieudangkitour_ibfk_2` FOREIGN KEY (`maNguoiDung`) REFERENCES `nguoidung` (`maNguoiDung`);

--
-- Các ràng buộc cho bảng `tour`
--
ALTER TABLE `tour`
  ADD CONSTRAINT `tour_ibfk_1` FOREIGN KEY (`maCongTy`) REFERENCES `doitac` (`maCongTy`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
