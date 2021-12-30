-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 25, 2021 lúc 03:53 PM
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
  `MaPhieuTour` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `MaTour` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `DoTuoi` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `ThanhTien` float NOT NULL,
  `DonVi` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `congtydoitac`
--

CREATE TABLE `congtydoitac` (
  `MaCongTy` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `TenCongTy` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `HinhAnh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `SoDienThoai` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `Email` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `DiaChi` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `TinhTrang` int(11) NOT NULL,
  `PassWord` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giatour`
--

CREATE TABLE `giatour` (
  `MaTour` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `DoTuoi` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `MoTa` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `Gia` float NOT NULL,
  `DonVi` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoidung`
--

CREATE TABLE `nguoidung` (
  `MaNguoiDung` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `HoTen` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `HinhAnh` text COLLATE utf8_unicode_ci NOT NULL,
  `NgaySinh` date NOT NULL,
  `GioiTinh` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `SoDienThoai` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `Email` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `DiaChi` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `SoCMT` char(15) COLLATE utf8_unicode_ci NOT NULL,
  `PassWord` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `TinhTrang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MaNhanVien` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `HoTen` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `HinhAnh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `UserName` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `PassWord` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieudangkitour`
--

CREATE TABLE `phieudangkitour` (
  `MaPhieuTour` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `MaKhachHang` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `MaTour` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `HinhThucThanhToan` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `TinhTrang` int(11) NOT NULL,
  `TongTien` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tour`
--

CREATE TABLE `tour` (
  `MaTour` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `TenTour` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `HinhAnh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `NgayKhoiHanh` date NOT NULL,
  `NgayKetThuc` date NOT NULL,
  `DiemKhoiHanh` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `DiemKetThuc` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `LoaiHinh` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `MoTa` varchar(7000) COLLATE utf8_unicode_ci NOT NULL,
  `MaCongTy` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitietgia`
--
ALTER TABLE `chitietgia`
  ADD PRIMARY KEY (`MaPhieuTour`,`MaTour`,`DoTuoi`),
  ADD KEY `MaTour` (`MaTour`);

--
-- Chỉ mục cho bảng `congtydoitac`
--
ALTER TABLE `congtydoitac`
  ADD PRIMARY KEY (`MaCongTy`),
  ADD UNIQUE KEY `SoDienThoai` (`SoDienThoai`,`Email`);

--
-- Chỉ mục cho bảng `giatour`
--
ALTER TABLE `giatour`
  ADD PRIMARY KEY (`MaTour`,`DoTuoi`);

--
-- Chỉ mục cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`MaNguoiDung`),
  ADD UNIQUE KEY `SoDienThoai` (`SoDienThoai`,`Email`,`SoCMT`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MaNhanVien`),
  ADD UNIQUE KEY `MaNhanVien` (`MaNhanVien`);

--
-- Chỉ mục cho bảng `phieudangkitour`
--
ALTER TABLE `phieudangkitour`
  ADD PRIMARY KEY (`MaPhieuTour`),
  ADD UNIQUE KEY `MaKhachHang` (`MaKhachHang`),
  ADD KEY `MaTour` (`MaTour`);

--
-- Chỉ mục cho bảng `tour`
--
ALTER TABLE `tour`
  ADD PRIMARY KEY (`MaTour`),
  ADD KEY `MaCongTy` (`MaCongTy`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitietgia`
--
ALTER TABLE `chitietgia`
  ADD CONSTRAINT `chitietgia_ibfk_1` FOREIGN KEY (`MaTour`,`DoTuoi`) REFERENCES `giatour` (`MaTour`, `DoTuoi`);

--
-- Các ràng buộc cho bảng `phieudangkitour`
--
ALTER TABLE `phieudangkitour`
  ADD CONSTRAINT `phieudangkitour` FOREIGN KEY (`MaTour`) REFERENCES `tour` (`MaTour`),
  ADD CONSTRAINT `phieudangkitour_ibfk_1` FOREIGN KEY (`MaKhachHang`) REFERENCES `nguoidung` (`MaNguoiDung`),
  ADD CONSTRAINT `phieudangkitour_ibfk_2` FOREIGN KEY (`MaTour`) REFERENCES `giatour` (`MaTour`),
  ADD CONSTRAINT `phieudangkitour_ibfk_3` FOREIGN KEY (`MaPhieuTour`) REFERENCES `chitietgia` (`MaPhieuTour`);

--
-- Các ràng buộc cho bảng `tour`
--
ALTER TABLE `tour`
  ADD CONSTRAINT `tour_ibfk_1` FOREIGN KEY (`MaCongTy`) REFERENCES `congtydoitac` (`MaCongTy`),
  ADD CONSTRAINT `tour_ibfk_2` FOREIGN KEY (`MaTour`) REFERENCES `giatour` (`MaTour`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
