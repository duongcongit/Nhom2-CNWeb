-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2022 at 04:40 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ql_tour_dulich`
--

-- --------------------------------------------------------

--
-- Table structure for table `chitietgia`
--

CREATE TABLE `chitietgia` (
  `maPhieuTour` char(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maTour` char(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doTuoi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `soLuong` int(11) NOT NULL,
  `thanhTien` bigint(20) NOT NULL,
  `donVi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doitac`
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

-- --------------------------------------------------------

--
-- Table structure for table `giatour`
--

CREATE TABLE `giatour` (
  `maTour` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doTuoi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `moTa` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gia` bigint(20) NOT NULL,
  `donVi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nguoidung`
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

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
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
-- Table structure for table `phieudangkitour`
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

-- --------------------------------------------------------

--
-- Table structure for table `tour`
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
-- Indexes for dumped tables
--

--
-- Indexes for table `chitietgia`
--
ALTER TABLE `chitietgia`
  ADD PRIMARY KEY (`maPhieuTour`,`maTour`,`doTuoi`),
  ADD KEY `maTour` (`maTour`,`doTuoi`);

--
-- Indexes for table `doitac`
--
ALTER TABLE `doitac`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `maCongTy` (`maCongTy`),
  ADD UNIQUE KEY `soDienThoai` (`soDienThoai`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `giatour`
--
ALTER TABLE `giatour`
  ADD PRIMARY KEY (`maTour`,`doTuoi`);

--
-- Indexes for table `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `maNguoiDung` (`maNguoiDung`),
  ADD UNIQUE KEY `soDienThoai` (`soDienThoai`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `diaChi` (`diaChi`),
  ADD UNIQUE KEY `soCMT` (`soCMT`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `maNhanVien` (`maNhanVien`),
  ADD UNIQUE KEY `soDienThoai` (`soDienThoai`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `phieudangkitour`
--
ALTER TABLE `phieudangkitour`
  ADD PRIMARY KEY (`maPhieuTour`),
  ADD KEY `maTour` (`maTour`),
  ADD KEY `maNguoiDung` (`maNguoiDung`);

--
-- Indexes for table `tour`
--
ALTER TABLE `tour`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `maTour` (`maTour`),
  ADD KEY `maCongTy` (`maCongTy`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doitac`
--
ALTER TABLE `doitac`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tour`
--
ALTER TABLE `tour`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitietgia`
--
ALTER TABLE `chitietgia`
  ADD CONSTRAINT `chitietgia_ibfk_1` FOREIGN KEY (`maTour`) REFERENCES `tour` (`maTour`),
  ADD CONSTRAINT `chitietgia_ibfk_2` FOREIGN KEY (`maTour`,`doTuoi`) REFERENCES `giatour` (`maTour`, `doTuoi`);

--
-- Constraints for table `giatour`
--
ALTER TABLE `giatour`
  ADD CONSTRAINT `giatour_ibfk_1` FOREIGN KEY (`maTour`) REFERENCES `tour` (`maTour`);

--
-- Constraints for table `phieudangkitour`
--
ALTER TABLE `phieudangkitour`
  ADD CONSTRAINT `phieudangkitour_ibfk_1` FOREIGN KEY (`maTour`) REFERENCES `tour` (`maTour`),
  ADD CONSTRAINT `phieudangkitour_ibfk_2` FOREIGN KEY (`maNguoiDung`) REFERENCES `nguoidung` (`maNguoiDung`);

--
-- Constraints for table `tour`
--
ALTER TABLE `tour`
  ADD CONSTRAINT `tour_ibfk_1` FOREIGN KEY (`maCongTy`) REFERENCES `doitac` (`maCongTy`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
