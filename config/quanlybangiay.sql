-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2026 at 02:19 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

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
  `password` varchar(255) NOT NULL,
  `hoten` varchar(255) NOT NULL,
  `sdt` varchar(15) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`maadmin`, `email`, `password`, `hoten`, `sdt`, `token`) VALUES
(1, 'admin@gmail.com', '$2y$10$luxIDeVvN.cM9LIwK3y1g.CybX0ItqoK415lP6e8LHqUxvOrd6x16', 'Trương Minh Vũ', '0912345678', 'dda1e30f18105ade75f4f1073ee99c93da693931fd9e3e626201c5c0dcb1f03c');

-- --------------------------------------------------------

--
-- Table structure for table `ctdonhang`
--

CREATE TABLE `ctdonhang` (
  `madh` int(11) NOT NULL,
  `masp` int(11) NOT NULL,
  `masize` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `dongia` decimal(12,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ctdonhang`
--

INSERT INTO `ctdonhang` (`madh`, `masp`, `masize`, `soluong`, `dongia`) VALUES
(1, 1, 1, 1, 550000),
(1, 2, 2, 2, 110000),
(2, 3, 1, 3, 110000),
(2, 7, 2, 1, 100000),
(3, 1, 3, 2, 550000),
(4, 4, 1, 1, 110000),
(4, 5, 2, 1, 110000),
(4, 6, 3, 1, 110000),
(5, 1, 1, 1, 550000),
(5, 8, 2, 1, 110000),
(5, 11, 3, 1, 110000),
(5, 7, 4, 1, 100000),
(6, 12, 1, 2, 110000),
(6, 2, 2, 2, 110000),
(7, 1, 2, 1, 550000),
(7, 3, 3, 1, 110000),
(7, 7, 4, 1, 100000),
(8, 4, 1, 2, 110000),
(8, 5, 2, 3, 110000),
(9, 1, 1, 1, 550000),
(9, 7, 2, 1, 100000),
(10, 1, 3, 2, 550000),
(10, 6, 4, 1, 110000),
(11, 8, 1, 1, 110000),
(11, 11, 2, 1, 110000),
(11, 12, 3, 2, 110000),
(12, 1, 4, 1, 550000),
(12, 2, 1, 2, 110000),
(13, 3, 2, 4, 110000),
(13, 7, 3, 1, 100000),
(14, 4, 4, 4, 110000),
(14, 5, 1, 4, 110000),
(15, 6, 2, 3, 110000),
(16, 8, 3, 5, 110000),
(16, 11, 4, 4, 110000),
(17, 12, 1, 3, 110000),
(17, 2, 2, 3, 110000),
(18, 1, 3, 2, 550000),
(19, 3, 4, 2, 110000),
(19, 4, 1, 2, 110000),
(20, 1, 2, 1, 550000),
(20, 5, 3, 2, 110000),
(21, 6, 4, 4, 110000),
(21, 8, 1, 4, 110000),
(22, 11, 2, 3, 110000),
(22, 7, 3, 1, 100000),
(23, 12, 4, 5, 110000),
(24, 1, 1, 1, 550000),
(24, 2, 2, 2, 110000),
(25, 3, 3, 3, 110000),
(26, 4, 4, 6, 110000),
(26, 5, 1, 6, 110000),
(27, 6, 2, 4, 110000),
(28, 1, 3, 1, 550000),
(28, 8, 4, 1, 110000),
(28, 11, 1, 1, 110000),
(28, 7, 2, 1, 100000),
(29, 1, 3, 2, 550000),
(30, 12, 4, 4, 110000),
(31, 1, 1, 1, 550000),
(31, 2, 2, 1, 110000),
(31, 7, 3, 1, 100000),
(32, 3, 4, 5, 110000),
(33, 4, 1, 4, 110000),
(33, 5, 2, 4, 110000),
(34, 6, 3, 3, 110000),
(34, 7, 4, 1, 100000),
(35, 1, 1, 1, 550000),
(35, 8, 2, 4, 110000),
(36, 11, 3, 3, 110000),
(37, 1, 4, 2, 550000),
(37, 12, 1, 1, 110000),
(38, 1, 2, 1, 550000),
(38, 7, 3, 1, 100000),
(39, 2, 4, 4, 110000),
(40, 1, 1, 1, 550000),
(40, 3, 2, 2, 110000),
(41, 4, 3, 4, 110000),
(41, 7, 4, 1, 100000),
(42, 5, 1, 4, 110000),
(42, 6, 2, 4, 110000),
(43, 8, 3, 3, 110000),
(44, 1, 4, 2, 550000),
(45, 11, 1, 2, 110000),
(45, 12, 2, 2, 110000),
(46, 1, 3, 1, 550000),
(46, 2, 4, 2, 110000),
(47, 3, 1, 3, 110000),
(48, 4, 2, 3, 110000),
(48, 5, 3, 3, 110000),
(49, 6, 4, 4, 110000),
(50, 8, 1, 5, 110000),
(51, 11, 2, 2, 110000),
(52, 1, 3, 1, 550000),
(52, 12, 4, 4, 110000),
(53, 1, 1, 1, 550000),
(53, 2, 2, 2, 110000),
(54, 3, 3, 4, 110000);

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

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`madh`, `makh`, `tongtien`, `thoigiantao`, `diachigiaohang`, `hinhthucthanhtoan`, `trangthai`) VALUES
(1, 1, 770000, '2026-03-20 20:14:43', '123 Lê Lợi, Quận 1, TP.HCM', 'Tiền mặt', 1),
(2, 2, 430000, '2026-03-20 20:14:43', '45 Nguyễn Trãi, Hà Nội', 'Chuyển khoản', 0),
(3, 3, 1100000, '2026-02-11 20:14:43', '88 Phan Chu Trinh, Đà Nẵng', 'Tiền mặt', 1),
(4, 4, 330000, '2026-03-20 20:14:43', '202 Cách Mạng Tháng 8, Quận 3', 'Chuyển khoản', 0),
(5, 5, 870000, '2026-03-20 20:14:43', '12 Ngõ Tự Do, Hà Nội', 'Tiền mặt', 2),
(6, 6, 440000, '2026-03-20 20:14:43', '56 Nguyễn Văn Linh, Cần Thơ', 'Chuyển khoản', 0),
(7, 7, 760000, '2026-03-20 20:14:43', '15 Trần Phú, Nha Trang', 'Tiền mặt', 1),
(8, 8, 550000, '2026-02-09 20:14:43', '101 Láng Hạ, Hà Nội', 'Chuyển khoản', 0),
(9, 9, 650000, '2026-03-20 20:14:43', '78 Quang Trung, TP.HCM', 'Tiền mặt', -1),
(10, 10, 1210000, '2026-03-20 20:14:43', '34 Thống Nhất, Thủ Đức', 'Chuyển khoản', 1),
(11, 11, 440000, '2026-03-20 20:14:43', '22 Hàm Nghi, Quận 1', 'Tiền mặt', 0),
(12, 12, 770000, '2026-03-20 20:14:43', '09 Lê Hồng Phong, Nghệ An', 'Chuyển khoản', 1),
(13, 13, 540000, '2026-03-20 20:14:43', '12B Lý Thường Kiệt, Hà Nội', 'Tiền mặt', 0),
(14, 14, 880000, '2026-03-20 20:14:43', '18 Nguyễn Huệ, Huế', 'Chuyển khoản', 1),
(15, 15, 330000, '2026-03-20 20:14:43', '456 Võ Văn Kiệt, Quận 5', 'Tiền mặt', 0),
(16, 16, 990000, '2026-02-03 20:14:43', '123 Hùng Vương, Gia Lai', 'Chuyển khoản', 1),
(17, 17, 660000, '2026-03-20 20:14:43', '67 Xuân Thủy, Hà Nội', 'Tiền mặt', 0),
(18, 18, 1100000, '2026-03-20 20:14:43', '40 Kim Mã, Hà Nội', 'Chuyển khoản', 1),
(19, 19, 440000, '2026-02-16 20:14:43', '25 Phổ Quang, Quận Tân Bình', 'Tiền mặt', 0),
(20, 1, 770000, '2026-03-20 20:14:43', '123 Lê Lợi, Quận 1, TP.HCM', 'Chuyển khoản', 1),
(21, 2, 880000, '2026-03-20 20:14:43', '45 Nguyễn Trãi, Hà Nội', 'Tiền mặt', 0),
(22, 3, 430000, '2026-03-20 20:14:43', '88 Phan Chu Trinh, Đà Nẵng', 'Chuyển khoản', 1),
(23, 4, 550000, '2026-03-20 20:14:43', '202 Cách Mạng Tháng 8, Quận 3', 'Tiền mặt', 0),
(24, 5, 770000, '2026-03-20 20:14:43', '12 Ngõ Tự Do, Hà Nội', 'Chuyển khoản', 1),
(25, 6, 330000, '2026-02-16 20:14:43', '56 Nguyễn Văn Linh, Cần Thơ', 'Tiền mặt', 0),
(26, 7, 1320000, '2026-03-20 20:14:43', '15 Trần Phú, Nha Trang', 'Chuyển khoản', 1),
(27, 8, 440000, '2026-03-20 20:14:43', '101 Láng Hạ, Hà Nội', 'Tiền mặt', 0),
(28, 9, 870000, '2026-03-20 20:14:43', '78 Quang Trung, TP.HCM', 'Chuyển khoản', 1),
(29, 10, 1100000, '2026-03-20 20:14:43', '34 Thống Nhất, Thủ Đức', 'Tiền mặt', 2),
(30, 11, 440000, '2026-03-20 20:14:43', '22 Hàm Nghi, Quận 1', 'Chuyển khoản', 0),
(31, 12, 760000, '2026-03-20 20:14:43', '09 Lê Hồng Phong, Nghệ An', 'Tiền mặt', 1),
(32, 13, 550000, '2026-03-20 20:14:43', '12B Lý Thường Kiệt, Hà Nội', 'Chuyển khoản', 0),
(33, 14, 880000, '2026-03-20 20:14:43', '18 Nguyễn Huệ, Huế', 'Tiền mặt', 1),
(34, 15, 430000, '2026-03-20 20:14:43', '456 Võ Văn Kiệt, Quận 5', 'Chuyển khoản', 0),
(35, 16, 990000, '2026-03-20 20:14:43', '123 Hùng Vương, Gia Lai', 'Tiền mặt', 1),
(36, 17, 330000, '2026-03-20 20:14:43', '67 Xuân Thủy, Hà Nội', 'Chuyển khoản', 0),
(37, 18, 1210000, '2026-03-20 20:14:43', '40 Kim Mã, Hà Nội', 'Tiền mặt', 1),
(38, 19, 650000, '2026-03-20 20:14:43', '25 Phổ Quang, Quận Tân Bình', 'Chuyển khoản', -1),
(39, 1, 440000, '2026-03-20 20:14:43', '123 Lê Lợi, Quận 1, TP.HCM', 'Tiền mặt', 0),
(40, 2, 770000, '2026-03-20 20:14:43', '45 Nguyễn Trãi, Hà Nội', 'Chuyển khoản', 1),
(41, 3, 540000, '2026-03-20 20:14:43', '88 Phan Chu Trinh, Đà Nẵng', 'Tiền mặt', 0),
(42, 4, 880000, '2026-03-20 20:14:43', '202 Cách Mạng Tháng 8, Quận 3', 'Chuyển khoản', 1),
(43, 5, 330000, '2026-03-20 20:14:43', '12 Ngõ Tự Do, Hà Nội', 'Tiền mặt', 0),
(44, 6, 1100000, '2026-03-20 20:14:43', '56 Nguyễn Văn Linh, Cần Thơ', 'Chuyển khoản', 1),
(45, 7, 440000, '2026-03-20 20:14:43', '15 Trần Phú, Nha Trang', 'Tiền mặt', 0),
(46, 8, 770000, '2026-03-20 20:14:43', '101 Láng Hạ, Hà Nội', 'Chuyển khoản', 1),
(47, 9, 330000, '2026-03-20 20:14:43', '78 Quang Trung, TP.HCM', 'Tiền mặt', 0),
(48, 10, 660000, '2026-03-20 20:14:43', '34 Thống Nhất, Thủ Đức', 'Chuyển khoản', 1),
(49, 11, 440000, '2026-03-20 20:14:43', '22 Hàm Nghi, Quận 1', 'Tiền mặt', 0),
(50, 12, 550000, '2026-03-20 20:14:43', '09 Lê Hồng Phong, Nghệ An', 'Tiền mặt', 0),
(51, 13, 220000, '2026-03-20 20:14:43', '12B Lý Thường Kiệt, Hà Nội', 'Chuyển khoản', 0),
(52, 14, 990000, '2026-03-20 20:14:43', '18 Nguyễn Huệ, Huế', 'Tiền mặt', 1),
(53, 15, 770000, '2026-03-20 20:14:43', '456 Võ Văn Kiệt, Quận 5', 'Chuyển khoản', 1),
(54, 16, 440000, '2026-03-20 20:14:43', '123 Hùng Vương, Gia Lai', 'Tiền mặt', 1);

-- --------------------------------------------------------

--
-- Table structure for table `giohang`
--

CREATE TABLE `giohang` (
  `makh` int(11) NOT NULL,
  `masp` int(11) NOT NULL,
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

--
-- Dumping data for table `hang`
--

INSERT INTO `hang` (`mahang`, `tenhang`, `trangthai`) VALUES
(1, 'Nike', 1),
(2, 'Puma', 1),
(3, 'Adidas', 1),
(4, 'Vans', 1);

-- --------------------------------------------------------

--
-- Table structure for table `hinhanh`
--

CREATE TABLE `hinhanh` (
  `mahinhanh` int(11) NOT NULL,
  `masp` int(11) NOT NULL,
  `path` varchar(255) NOT NULL,
  `ismain` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hinhanh`
--

INSERT INTO `hinhanh` (`mahinhanh`, `masp`, `path`, `ismain`) VALUES
(1, 1, 'public/img/products/nike-mc-trainer-main.jpg', 1),
(2, 1, 'public/img/products/nike-mc-trainer-2.jpg', 0),
(3, 1, 'public/img/products/nike-mc-trainer-3.jpg', 0),
(4, 1, 'public/img/products/nike-mc-trainer-4.jpg', 0),
(5, 1, 'public/img/products/nike-mc-trainer-5.jpg', 0),
(6, 1, 'public/img/products/nike-mc-trainer-6.jpg', 0),
(7, 2, 'public\\img\\products\\nike-quest-main.jpg', 1),
(8, 2, 'public\\img\\products\\nike-quest-1.jpg', 0),
(9, 2, 'public\\img\\products\\nike-quest-2.jpg', 0),
(10, 2, 'public\\img\\products\\nike-quest-3.jpg', 0),
(11, 2, 'public\\img\\products\\nike-quest-4.jpg', 0),
(12, 2, 'public\\img\\products\\nike-quest-5.jpg', 0),
(13, 3, 'public\\img\\products\\giay-pickleball-tennis-nike-vapor-lite-3-nam-trang-den-01-main.jpg', 1),
(14, 3, 'public\\img\\products\\giay-pickleball-tennis-nike-vapor-lite-3-nam-trang-den-02.jpg', 0),
(15, 3, 'public\\img\\products\\giay-pickleball-tennis-nike-vapor-lite-3-nam-trang-den-03.jpg', 0),
(16, 3, 'public\\img\\products\\giay-pickleball-tennis-nike-vapor-lite-3-nam-trang-den-04.jpg', 0),
(17, 3, 'public\\img\\products\\giay-pickleball-tennis-nike-vapor-lite-3-nam-trang-den-05.jpg', 0),
(18, 3, 'public\\img\\products\\giay-pickleball-tennis-nike-vapor-lite-3-nam-trang-den-06.jpg', 0),
(19, 4, 'public\\img\\products\\giay-nike-winflo-11-nam-trang-xanh-01-main.jpg', 1),
(20, 4, 'public\\img\\products\\giay-nike-winflo-11-nam-trang-xanh-02.jpg', 0),
(21, 4, 'public\\img\\products\\giay-nike-winflo-11-nam-trang-xanh-03.jpg', 0),
(22, 4, 'public\\img\\products\\giay-nike-winflo-11-nam-trang-xanh-04.jpg', 0),
(23, 4, 'public\\img\\products\\giay-nike-winflo-11-nam-trang-xanh-05.jpg', 0),
(24, 4, 'public\\img\\products\\giay-nike-winflo-11-nam-trang-xanh-06.jpg', 0),
(25, 7, 'public\\img\\products\\giay-nike-structure-26-nu-xam-xanh-tim-01-main.jpg', 1),
(26, 7, 'public\\img\\products\\giay-nike-structure-26-nu-xam-xanh-tim-02.jpg', 0),
(27, 7, 'public\\img\\products\\giay-nike-structure-26-nu-xam-xanh-tim-03.jpg', 0),
(28, 7, 'public\\img\\products\\giay-nike-structure-26-nu-xam-xanh-tim-04.jpg', 0),
(29, 7, 'public\\img\\products\\giay-nike-structure-26-nu-xam-xanh-tim-05.jpg', 0),
(30, 7, 'public\\img\\products\\giay-nike-structure-26-nu-xam-xanh-tim-06.jpg', 0),
(31, 5, 'public\\img\\products\\giay-nike-run-defy-nu-trang-hong-01-main.jpg', 1),
(32, 5, 'public\\img\\products\\giay-nike-run-defy-nu-trang-hong-02.jpg', 0),
(33, 5, 'public\\img\\products\\giay-nike-run-defy-nu-trang-hong-03.jpg', 0),
(34, 5, 'public\\img\\products\\giay-nike-run-defy-nu-trang-hong-04.jpg', 0),
(35, 5, 'public\\img\\products\\giay-nike-run-defy-nu-trang-hong-05.jpg', 0),
(36, 5, 'public\\img\\products\\giay-nike-run-defy-nu-trang-hong-06.jpg', 0),
(37, 6, 'public\\img\\products\\giay-nike-run-defy-nam-xanh-trang-01-main.jpg', 1),
(38, 6, 'public\\img\\products\\giay-nike-run-defy-nam-xanh-trang-02.jpg', 0),
(39, 6, 'public\\img\\products\\giay-nike-run-defy-nam-xanh-trang-03.jpg', 0),
(40, 6, 'public\\img\\products\\giay-nike-run-defy-nam-xanh-trang-04.jpg', 0),
(41, 6, 'public\\img\\products\\giay-nike-run-defy-nam-xanh-trang-05.jpg', 0),
(42, 6, 'public\\img\\products\\giay-nike-run-defy-nam-xanh-trang-06.jpg', 0),
(43, 8, 'public\\img\\products\\giay-nike-metcon-10-nam-trang-den-xanh-01-main.jpg', 1),
(44, 8, 'public\\img\\products\\giay-nike-metcon-10-nam-trang-den-xanh-02.jpg', 0),
(45, 8, 'public\\img\\products\\giay-nike-metcon-10-nam-trang-den-xanh-03.jpg', 0),
(46, 8, 'public\\img\\products\\giay-nike-metcon-10-nam-trang-den-xanh-04.jpg', 0),
(47, 8, 'public\\img\\products\\giay-nike-metcon-10-nam-trang-den-xanh-05.jpg', 0),
(48, 8, 'public\\img\\products\\giay-nike-metcon-10-nam-trang-den-xanh-06.jpg', 0),
(49, 11, 'public\\img\\products\\giay-puma-skye-clean-distressed-nu-trang-01-main.jpg', 1),
(50, 11, 'public\\img\\products\\giay-puma-skye-clean-distressed-nu-trang-02.jpg', 0),
(51, 11, 'public\\img\\products\\giay-puma-skye-clean-distressed-nu-trang-03.jpg', 0),
(52, 11, 'public\\img\\products\\giay-puma-skye-clean-distressed-nu-trang-04.jpg', 0),
(53, 11, 'public\\img\\products\\giay-puma-skye-clean-distressed-nu-trang-05.jpg', 0),
(54, 11, 'public\\img\\products\\giay-puma-skye-clean-distressed-nu-trang-06.jpg', 0),
(55, 12, 'public\\img\\products\\giay-puma-dribble-nam-trang-den-01-main.jpg', 1),
(56, 12, 'public\\img\\products\\giay-puma-dribble-nam-trang-den-02.jpg', 0),
(57, 12, 'public\\img\\products\\giay-puma-dribble-nam-trang-den-03.jpg', 0),
(58, 12, 'public\\img\\products\\giay-puma-dribble-nam-trang-den-04.jpg', 0),
(59, 12, 'public\\img\\products\\giay-puma-dribble-nam-trang-den-05.jpg', 0),
(60, 12, 'public\\img\\products\\giay-puma-dribble-nam-trang-den-06.jpg', 0);

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

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`makh`, `email`, `matkhau`, `sdt`, `hoten`, `diachi`, `gioitinh`, `trangthai`) VALUES
(1, 'an.nguyen@gmail.com', '123', '0903123456', 'Nguyễn Văn An', '123 Lê Lợi, Phường Bến Thành, Quận 1, TP.HCM', 1, 1),
(2, 'bich.tran@yahoo.com', '123', '0912987654', 'Trần Thị Bích', '45 Nguyễn Trãi, Quận Thanh Xuân, Hà Nội', 0, 1),
(3, 'nam.lehoang@gmail.com', '123', '0988111222', 'Lê Hoàng Nam', '88 Phan Chu Trinh, Quận Hải Châu, Đà Nẵng', 1, 1),
(4, 'thao.vuthu@hotmail.com', '123', '0707888999', 'Vũ Thu Thảo', '202 Cách Mạng Tháng 8, Quận 3, TP.HCM', 0, 1),
(5, 'tuan.pham@gmail.com', '123', '0355444333', 'Phạm Minh Tuấn', '12 Ngõ Tự Do, Quận Hai Bà Trưng, Hà Nội', 1, 1),
(6, 'linh.buiphuong@gmail.com', '123', '0868222333', 'Bùi Phương Linh', '56 Nguyễn Văn Linh, Quận Ninh Kiều, Cần Thơ', 0, 1),
(7, 'anh.dangquoc@gmail.com', '123', '0945666777', 'Đặng Quốc Anh', '15 Trần Phú, Lộc Thọ, Nha Trang', 1, 1),
(8, 'van.ngothanh@gmail.com', '123', '0979333222', 'Ngô Thanh Vân', '101 Láng Hạ, Quận Đống Đa, Hà Nội', 0, 1),
(9, 'manh.doduy@gmail.com', '123', '0932555444', 'Đỗ Duy Mạnh', '78 Quang Trung, Quận Gò Vấp, TP.HCM', 1, 1),
(10, 'chi.trinhkim@gmail.com', '123', '0914888777', 'Trịnh Kim Chi', '34 Thống Nhất, TP. Thủ Đức, TP.HCM', 0, 1),
(11, 'bao.lygia@gmail.com', '123', '0909112233', 'Lý Gia Bảo', '22 Hàm Nghi, Quận 1, TP.HCM', 1, 1),
(12, 'trang.phanthu@gmail.com', '123', '0399123789', 'Phan Thu Trang', '09 Lê Hồng Phong, TP. Vinh, Nghệ An', 0, 1),
(13, 'tho.nguyenhuu@gmail.com', '123', '0987445566', 'Nguyễn Hữu Thọ', '12B Lý Thường Kiệt, Quận Hoàn Kiếm, Hà Nội', 1, 1),
(14, 'mai.hoangthi@gmail.com', '123', '0902889900', 'Hoàng Thị Mai', '18 Nguyễn Huệ, TP. Huế', 0, 1),
(15, 'duc.duongvan@gmail.com', '123', '0777555666', 'Dương Văn Đức', '456 Võ Văn Kiệt, Quận 5, TP.HCM', 1, 1),
(16, 'anh.vongoc@gmail.com', '123', '0388667788', 'Võ Ngọc Ánh', '123 Hùng Vương, TP. Pleiku, Gia Lai', 0, 1),
(17, 'dung.dinhtien@gmail.com', '123', '0944112244', 'Đinh Tiến Dũng', '67 Xuân Thủy, Quận Cầu Giấy, Hà Nội', 1, 1),
(18, 'lan.truongmy@gmail.com', '123', '0938776655', 'Trương Mỹ Lan', '40 Kim Mã, Quận Ba Đình, Hà Nội', 0, 1),
(19, 'triet.hominh@gmail.com', '123', '0915334455', 'Hồ Minh Triết', '25 Phổ Quang, Quận Tân Bình, TP.HCM', 1, 1),
(20, 'sam.vanlai@gmail.com', '', '0932431029', 'Lại Văn Sâm', 'D12/9D Vĩnh Lộc B', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `loai`
--

CREATE TABLE `loai` (
  `maloai` int(11) NOT NULL,
  `tenloai` varchar(255) NOT NULL,
  `trangthai` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loai`
--

INSERT INTO `loai` (`maloai`, `tenloai`, `trangthai`) VALUES
(1, 'Giày Thể Thao', 1),
(2, 'Giày Sneaker', 1),
(3, 'Giày Tây', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mau`
--

CREATE TABLE `mau` (
  `mamau` int(11) NOT NULL,
  `tenmau` varchar(255) NOT NULL,
  `trangthai` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mau`
--

INSERT INTO `mau` (`mamau`, `tenmau`, `trangthai`) VALUES
(1, 'Trắng', 1),
(2, 'Trắng Tím', 1),
(3, 'Trắng Xanh', 1),
(4, 'Trắng Đen', 1),
(5, 'Trắng Hồng', 1),
(6, 'Trắng Đen Xanh', 1),
(7, 'Xám Xanh Tím', 1);

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
  `mau` int(11) NOT NULL,
  `motasp` varchar(255) NOT NULL,
  `soluongdaban` int(11) NOT NULL,
  `trangthai` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`masp`, `tensp`, `loai`, `gioitinh`, `gianhap`, `tyleloinhuan`, `hang`, `mau`, `motasp`, `soluongdaban`, `trangthai`) VALUES
(1, 'Nike MC Trainer', 1, 1, 500000, 10, 1, 1, 'Giày cực xịn do chính tay độ mixi làm ra', 0, 1),
(2, 'Nike Quest', 1, 0, 100000, 10, 1, 2, 'Giày Nike Quest 6 là mẫu giày thể thao mang phong cách hiện đại, phù hợp cho các hoạt động hàng ngày lẫn luyện tập thể chất. Thiết kế đẹp với đai ôm ở giữa bàn chân giúp giữ chân ổn định khi bạn di chuyển, mang lại cảm giác thoải mái và an toàn.', 0, 1),
(3, 'Nike Vapor Lite Nam 3', 1, 1, 100000, 10, 1, 4, 'Giày Nike Vapor Lite 3 là phiên bản nâng cấp vượt trội dành cho các vận động viên yêu thích bộ môn tennis và pickleball. Được thiết kế để tối ưu khả năng di chuyển trên sân cứng, đôi giày này giúp bạn bứt tốc, phanh gấp và xoay người linh hoạt mà không bị', 0, 1),
(4, 'Nike Winflo 11', 1, 1, 100000, 10, 1, 3, 'Giày Nike Air Winflo 11 là một trong những mẫu giày thể thao tốt nhất của Nike vừa được ra mắt. Với kiểu dáng cực đẹp cùng công nghệ đỉnh cao, Nike Air Winflo 11 hứa hẹn sẽ mẫu giày cực hot của Nike trong năm nay.', 0, 1),
(5, 'Nike Run Defy Nữ', 1, 0, 100000, 10, 1, 5, 'Nike Run Defy là đôi giày thể thao dành cho những ai muốn tự định hình phong cách và tốc độ của riêng mình. Dù bạn đang tập luyện nhẹ nhàng hay chinh phục quãng đường dài, đôi giày này mang đến sự cân bằng hoàn hảo giữa độ êm ái, thoáng khí và độ bám linh', 0, 1),
(6, 'Nike Run Defy Nam', 1, 1, 100000, 10, 1, 3, 'Nike Run Defy là đôi giày thể thao dành cho những ai muốn tự định hình phong cách và tốc độ của riêng mình. Dù bạn đang tập luyện nhẹ nhàng hay chinh phục quãng đường dài, đôi giày này mang đến sự cân bằng hoàn hảo giữa độ êm ái, thoáng khí và độ bám linh', 0, 1),
(7, 'Nike Structure 26 Nữ', 1, 0, 100000, 0, 1, 7, 'Nike Structure 26 là mẫu giày thể thao mới nhất nổi bật của Nike trong năm nay, được thiết kế để phục vụ các hoạt động thể chất đa dạng như: chạy bộ, tập gym, đi bộ đường dài hoặc đơn giản là di chuyển hàng ngày. Với trọng tâm là độ ổn định, nâng đỡ và êm', 0, 1),
(8, 'Nike Metcon 10 Nam', 1, 1, 100000, 10, 1, 6, 'Giày Nike Metcon 10 là thế hệ mới nhất trong dòng giày training nổi tiếng của Nike, được thiết kế dành cho những người yêu thích tập luyện sức mạnh, crossfit và functional training cường độ cao. Phiên bản này mang đến sự ổn định vượt trội, độ linh hoạt tố', 0, 1),
(11, 'Puma Skye Clean Distressed Nữ', 2, 0, 100000, 10, 2, 1, 'Giày Puma Skye Clean Distressed là sự kết hợp hoàn hảo giữa thiết kế cổ điển và hơi thở hiện đại. Với thân giày mang phom dáng thể thao sân đấu truyền thống, các chi tiết khâu nổi bật cùng họa tiết đục lỗ tinh tế tạo nên vẻ ngoài độc đáo, dễ phối đồ và ph', 0, 1),
(12, 'Puma Dribble Nam', 2, 1, 100000, 10, 2, 4, 'Giày Puma Dribble lấy cảm hứng từ thể thao, mang đến thiết kế hiện đại kết hợp cùng sự thoải mái tối ưu cho cuộc sống năng động. Với form dáng mid-boot cá tính, đế cao su bền bỉ và chi tiết branding đặc trưng, đây là lựa chọn hoàn hảo cho phong cách thườn', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sanphamsize`
--

CREATE TABLE `sanphamsize` (
  `masp` int(11) NOT NULL,
  `masize` int(11) NOT NULL,
  `soluong` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sanphamsize`
--

INSERT INTO `sanphamsize` (`masp`, `masize`, `soluong`) VALUES
(1, 1, 10),
(1, 2, 5),
(1, 3, 9),
(1, 4, 15);

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `masize` int(11) NOT NULL,
  `tensize` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`masize`, `tensize`) VALUES
(1, 40),
(2, 41),
(3, 42),
(4, 43);

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
  ADD KEY `FK_ctdonhang_size` (`masize`);

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
  ADD PRIMARY KEY (`makh`,`masp`,`masize`),
  ADD KEY `FK_giohang_khachhang` (`makh`),
  ADD KEY `FK_giohang_sanpham` (`masp`),
  ADD KEY `fk_giohang_size` (`masize`);

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
  ADD KEY `fk_hinhanh_sanpham` (`masp`);

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
  ADD KEY `fk_sanpham_loai` (`loai`),
  ADD KEY `fk_sanpham_hang` (`hang`),
  ADD KEY `fk_sanpham_mau` (`mau`);

--
-- Indexes for table `sanphamsize`
--
ALTER TABLE `sanphamsize`
  ADD PRIMARY KEY (`masp`,`masize`),
  ADD KEY `masize` (`masize`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`masize`),
  ADD UNIQUE KEY `tensize` (`tensize`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `maadmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `madh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `hang`
--
ALTER TABLE `hang`
  MODIFY `mahang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hinhanh`
--
ALTER TABLE `hinhanh`
  MODIFY `mahinhanh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `makh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `loai`
--
ALTER TABLE `loai`
  MODIFY `maloai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mau`
--
ALTER TABLE `mau`
  MODIFY `mamau` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `masp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `masize` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ctdonhang`
--
ALTER TABLE `ctdonhang`
  ADD CONSTRAINT `FK_ctdonhang_dh` FOREIGN KEY (`madh`) REFERENCES `donhang` (`madh`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_ctdonhang_size` FOREIGN KEY (`masize`) REFERENCES `size` (`masize`),
  ADD CONSTRAINT `FK_ctdonhang_sp` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`masp`) ON UPDATE CASCADE;

--
-- Constraints for table `ctphieunhap`
--
ALTER TABLE `ctphieunhap`
  ADD CONSTRAINT `FK_ctphieunhap_phieunhap` FOREIGN KEY (`mapn`) REFERENCES `phieunhap` (`mapn`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_ctphieunhap_sanpham` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`masp`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_ctphieunhap_size` FOREIGN KEY (`masize`) REFERENCES `size` (`masize`);

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
  ADD CONSTRAINT `FK_giohang_sanpham` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`masp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_giohang_size` FOREIGN KEY (`masize`) REFERENCES `size` (`masize`) ON UPDATE CASCADE;

--
-- Constraints for table `hinhanh`
--
ALTER TABLE `hinhanh`
  ADD CONSTRAINT `fk_hinhanh_sanpham` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`masp`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `fk_sanpham_hang` FOREIGN KEY (`hang`) REFERENCES `hang` (`mahang`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_sanpham_loai` FOREIGN KEY (`loai`) REFERENCES `loai` (`maloai`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_sanpham_mau` FOREIGN KEY (`mau`) REFERENCES `mau` (`mamau`) ON UPDATE CASCADE;

--
-- Constraints for table `sanphamsize`
--
ALTER TABLE `sanphamsize`
  ADD CONSTRAINT `sanphamsize_ibfk_1` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`masp`) ON DELETE CASCADE,
  ADD CONSTRAINT `sanphamsize_ibfk_2` FOREIGN KEY (`masize`) REFERENCES `size` (`masize`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
