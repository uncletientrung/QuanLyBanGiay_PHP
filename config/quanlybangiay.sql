-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2026 at 07:00 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quanlybangiay`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `maadmin` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` int(50) NOT NULL,
  `hoten` varchar(255) NOT NULL,
  `sdt` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ctdonhang`
--

CREATE TABLE `ctdonhang` (
  `madh` int(11) NOT NULL,
  `masp` int(11) NOT NULL,
  `masize` int(11) NOT NULL,
  `mamau` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `dongia` decimal(12,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ctphieunhap`
--

CREATE TABLE `ctphieunhap` (
  `mapn` int(11) NOT NULL,
  `masp` int(11) NOT NULL,
  `masize` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `dongia` decimal(12,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `madh` int(11) NOT NULL,
  `makh` int(11) NOT NULL,
  `tongtien` decimal(12,0) NOT NULL,
  `thoigiantao` datetime NOT NULL DEFAULT current_timestamp(),
  `diachigiaohang` varchar(255) NOT NULL,
  `hinhthucthanhtoan` varchar(50) NOT NULL,
  `trangthai` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `giohang`
--

CREATE TABLE `giohang` (
  `makh` int(11) NOT NULL,
  `masp` int(11) NOT NULL,
  `mamau` int(11) NOT NULL,
  `masize` int(11) NOT NULL,
  `soluong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hang`
--

CREATE TABLE `hang` (
  `mahang` int(11) NOT NULL,
  `tenhang` varchar(255) NOT NULL,
  `trangthai` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hinhanh`
--

CREATE TABLE `hinhanh` (
  `mahinhanh` int(11) NOT NULL,
  `masp` int(11) NOT NULL,
  `path` varchar(255) NOT NULL,
  `ismain` int(1) NOT NULL,
  `mamau` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Triggers `hinhanh`
--
DELIMITER $$
CREATE TRIGGER `trg_hinhanh_ismain` BEFORE UPDATE ON `hinhanh` FOR EACH ROW BEGIN
  IF NEW.ismain = 1 THEN
    UPDATE hinhanh SET ismain = 0 WHERE masp = NEW.masp AND mahinhanh != NEW.mahinhanh;
  END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `makh` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `matkhau` varchar(50) NOT NULL,
  `sdt` varchar(50) NOT NULL,
  `hoten` varchar(255) NOT NULL,
  `diachi` varchar(255) NOT NULL,
  `gioitinh` int(1) NOT NULL,
  `trangthai` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loai`
--

CREATE TABLE `loai` (
  `maloai` int(11) NOT NULL,
  `tenloai` varchar(255) NOT NULL,
  `trangthai` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mau`
--

CREATE TABLE `mau` (
  `mamau` int(11) NOT NULL,
  `tenmau` varchar(255) NOT NULL,
  `trangthai` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nhacungcap`
--

CREATE TABLE `nhacungcap` (
  `mancc` int(11) NOT NULL,
  `tenncc` varchar(255) NOT NULL,
  `sdt` varchar(50) NOT NULL,
  `diachi` varchar(255) NOT NULL,
  `trangthai` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `phieunhap`
--

CREATE TABLE `phieunhap` (
  `mapn` int(11) NOT NULL,
  `maadmin` int(11) NOT NULL,
  `mancc` int(11) NOT NULL,
  `thoigiantao` datetime NOT NULL DEFAULT current_timestamp(),
  `tongtien` decimal(12,0) NOT NULL,
  `trangthai` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `masp` int(11) NOT NULL,
  `tensp` varchar(255) NOT NULL,
  `loai` int(11) NOT NULL,
  `gioitinh` int(1) NOT NULL,
  `gianhap` decimal(15,0) NOT NULL,
  `tyleloinhuan` double NOT NULL DEFAULT 0,
  `hang` int(11) NOT NULL,
  `motasp` text NOT NULL,
  `trangthai` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sanphambienthe`
--

CREATE TABLE `sanphambienthe` (
  `id` int(11) NOT NULL,
  `masp` int(11) NOT NULL,
  `mamau` int(11) NOT NULL,
  `masize` int(11) NOT NULL,
  `soluongtonkho` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `masize` int(11) NOT NULL,
  `tensize` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`maadmin`);

--
-- Indexes for table `ctdonhang`
--
ALTER TABLE `ctdonhang`
  ADD KEY `FK_ctdonhang_dh` (`madh`),
  ADD KEY `FK_ctdonhang_sp` (`masp`),
  ADD KEY `FK_ctdonhang_size` (`masize`),
  ADD KEY `FK_ctdonhang_mau` (`mamau`);

--
-- Indexes for table `ctphieunhap`
--
ALTER TABLE `ctphieunhap`
  ADD KEY `FK_ctphieunhap_phieunhap` (`mapn`),
  ADD KEY `FK_ctphieunhap_sanpham` (`masp`),
  ADD KEY `FK_ctphieunhap_size` (`masize`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`madh`),
  ADD KEY `FK_donhang_khachhang` (`makh`);

--
-- Indexes for table `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`makh`,`masp`,`mamau`,`masize`),
  ADD KEY `FK_giohang_khachhang` (`makh`),
  ADD KEY `FK_giohang_sanpham` (`masp`),
  ADD KEY `FK_giohang_mau` (`mamau`),
  ADD KEY `FK_giohang_size` (`masize`);

--
-- Indexes for table `hang`
--
ALTER TABLE `hang`
  ADD PRIMARY KEY (`mahang`);

--
-- Indexes for table `hinhanh`
--
ALTER TABLE `hinhanh`
  ADD PRIMARY KEY (`mahinhanh`),
  ADD KEY `fk_hinhanh_mau` (`mamau`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`makh`);

--
-- Indexes for table `loai`
--
ALTER TABLE `loai`
  ADD PRIMARY KEY (`maloai`);

--
-- Indexes for table `mau`
--
ALTER TABLE `mau`
  ADD PRIMARY KEY (`mamau`);

--
-- Indexes for table `nhacungcap`
--
ALTER TABLE `nhacungcap`
  ADD PRIMARY KEY (`mancc`);

--
-- Indexes for table `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD PRIMARY KEY (`mapn`),
  ADD KEY `FK_phieunhap_admin` (`maadmin`),
  ADD KEY `FK_phieunhap_nhacungcap` (`mancc`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`masp`),
  ADD KEY `FK_sanpham_loai` (`loai`),
  ADD KEY `FK_sanpham_hang` (`hang`);

--
-- Indexes for table `sanphambienthe`
--
ALTER TABLE `sanphambienthe`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uk_variant` (`masp`,`mamau`,`masize`),
  ADD KEY `fk_spct_mau` (`mamau`),
  ADD KEY `fk_spct_size` (`masize`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`masize`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `maadmin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `madh` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hang`
--
ALTER TABLE `hang`
  MODIFY `mahang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hinhanh`
--
ALTER TABLE `hinhanh`
  MODIFY `mahinhanh` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `makh` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loai`
--
ALTER TABLE `loai`
  MODIFY `maloai` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mau`
--
ALTER TABLE `mau`
  MODIFY `mamau` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nhacungcap`
--
ALTER TABLE `nhacungcap`
  MODIFY `mancc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phieunhap`
--
ALTER TABLE `phieunhap`
  MODIFY `mapn` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `masp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sanphambienthe`
--
ALTER TABLE `sanphambienthe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ctdonhang`
--
ALTER TABLE `ctdonhang`
  ADD CONSTRAINT `FK_ctdonhang_dh` FOREIGN KEY (`madh`) REFERENCES `donhang` (`madh`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_ctdonhang_mau` FOREIGN KEY (`mamau`) REFERENCES `mau` (`mamau`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_ctdonhang_size` FOREIGN KEY (`masize`) REFERENCES `size` (`masize`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_ctdonhang_sp` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`masp`) ON UPDATE CASCADE;

--
-- Constraints for table `ctphieunhap`
--
ALTER TABLE `ctphieunhap`
  ADD CONSTRAINT `FK_ctphieunhap_phieunhap` FOREIGN KEY (`mapn`) REFERENCES `phieunhap` (`mapn`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_ctphieunhap_sanpham` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`masp`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_ctphieunhap_size` FOREIGN KEY (`masize`) REFERENCES `size` (`masize`) ON UPDATE CASCADE;

--
-- Constraints for table `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `FK_donhang_khachhang` FOREIGN KEY (`makh`) REFERENCES `khachhang` (`makh`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `FK_giohang_khachhang` FOREIGN KEY (`makh`) REFERENCES `khachhang` (`makh`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_giohang_mau` FOREIGN KEY (`mamau`) REFERENCES `mau` (`mamau`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_giohang_sanpham` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`masp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_giohang_size` FOREIGN KEY (`masize`) REFERENCES `size` (`masize`) ON UPDATE CASCADE;

--
-- Constraints for table `hinhanh`
--
ALTER TABLE `hinhanh`
  ADD CONSTRAINT `fk_hinhanh_mau` FOREIGN KEY (`mamau`) REFERENCES `mau` (`mamau`);

--
-- Constraints for table `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD CONSTRAINT `FK_phieunhap_admin` FOREIGN KEY (`maadmin`) REFERENCES `admin` (`maadmin`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_phieunhap_nhacungcap` FOREIGN KEY (`mancc`) REFERENCES `nhacungcap` (`mancc`) ON UPDATE CASCADE;

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `FK_sanpham_hang` FOREIGN KEY (`hang`) REFERENCES `hang` (`mahang`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_sanpham_loai` FOREIGN KEY (`loai`) REFERENCES `loai` (`maloai`) ON UPDATE CASCADE;

--
-- Constraints for table `sanphambienthe`
--
ALTER TABLE `sanphambienthe`
  ADD CONSTRAINT `fk_spct_mau` FOREIGN KEY (`mamau`) REFERENCES `mau` (`mamau`),
  ADD CONSTRAINT `fk_spct_size` FOREIGN KEY (`masize`) REFERENCES `size` (`masize`),
  ADD CONSTRAINT `fk_spct_sp` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`masp`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
