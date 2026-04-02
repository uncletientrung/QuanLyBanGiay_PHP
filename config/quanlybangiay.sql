-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2026 at 02:54 PM
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
  `password` varchar(255) NOT NULL,
  `hoten` varchar(255) NOT NULL,
  `sdt` varchar(15) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`maadmin`, `email`, `password`, `hoten`, `sdt`, `token`) VALUES
(1, 'admin@gmail.com', '$2y$10$luxIDeVvN.cM9LIwK3y1g.CybX0ItqoK415lP6e8LHqUxvOrd6x16', 'Trương Minh Vũ', '0912345678', 'f595a34b98fffb4381b3385cdb06a935c460ae08b2fc8866916c533b2a6b1e14');

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
(4, 'Lacoste', 0),
(5, 'Asics', 1),
(6, 'Clarks', 1);

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
(60, 12, 'public\\img\\products\\giay-puma-dribble-nam-trang-den-06.jpg', 0),
(61, 13, 'public\\img\\products\\giay-nike-vomero-18-nam-trang-xanh-den-01-1600x1600.jpg', 1),
(62, 13, 'public\\img\\products\\giay-nike-vomero-18-nam-trang-xanh-den-02-1600x1600.jpeg', 0),
(63, 13, 'public\\img\\products\\giay-nike-vomero-18-nam-trang-xanh-den-03-1600x1600.jpeg', 0),
(64, 13, 'public\\img\\products\\giay-nike-vomero-18-nam-trang-xanh-den-04-1600x1600.jpeg', 0),
(65, 13, 'public\\img\\products\\giay-nike-vomero-18-nam-trang-xanh-den-05-1600x1600.jpeg', 0),
(66, 13, 'public\\img\\products\\giay-nike-vomero-18-nam-trang-xanh-den-06-1600x1600.jpeg', 0),
(67, 14, 'public\\img\\products\\giay-nike-quest-6-nam-xam-cam-01-1600x1600.jpg', 1),
(68, 14, 'public\\img\\products\\giay-nike-quest-6-nam-xam-cam-02-1600x1600.jpg', 0),
(69, 14, 'public\\img\\products\\giay-nike-quest-6-nam-xam-cam-03-1600x1600.jpg', 0),
(70, 14, 'public\\img\\products\\giay-nike-quest-6-nam-xam-cam-04-1600x1600.jpg', 0),
(71, 14, 'public\\img\\products\\giay-nike-quest-6-nam-xam-cam-05-1600x1600.jpg', 0),
(72, 14, 'public\\img\\products\\giay-nike-quest-6-nam-xam-cam-06-1600x1600.jpg', 0),
(73, 15, 'public\\img\\products\\giay-nike-blazer-low-77-vintage-nam-den-trang-01-1600x1600.jpg', 1),
(74, 15, 'public\\img\\products\\giay-nike-blazer-low-77-vintage-nam-den-trang-02-1600x1600.jpg', 0),
(75, 15, 'public\\img\\products\\giay-nike-blazer-low-77-vintage-nam-den-trang-03-1600x1600.jpg', 0),
(76, 15, 'public\\img\\products\\giay-nike-blazer-low-77-vintage-nam-den-trang-04-1600x1600.jpg', 0),
(77, 15, 'public\\img\\products\\giay-nike-blazer-low-77-vintage-nam-den-trang-05-1600x1600.jpg', 0),
(78, 15, 'public\\img\\products\\giay-nike-blazer-low-77-vintage-nam-den-trang-06-1600x1600.jpg', 0),
(79, 16, 'public\\img\\products\\giay-nike-blazer-low-77-vintage-nam-trang-den-01-1600x1600.jpg', 1),
(80, 16, 'public\\img\\products\\giay-nike-blazer-low-77-vintage-nam-trang-den-02-1600x1600.jpg', 0),
(81, 16, 'public\\img\\products\\giay-nike-blazer-low-77-vintage-nam-trang-den-03-1600x1600.jpg', 0),
(82, 16, 'public\\img\\products\\giay-nike-blazer-low-77-vintage-nam-trang-den-04-1600x1600.jpg', 0),
(83, 16, 'public\\img\\products\\giay-nike-blazer-low-77-vintage-nam-trang-den-05-1600x1600.jpg', 0),
(84, 16, 'public\\img\\products\\giay-nike-blazer-low-77-vintage-nam-trang-den-06-1600x1600.jpg', 0),
(85, 17, 'public\\img\\products\\giay-adidas-response-2-nu-hong-nhe-02-1600x1600.jpg', 1),
(86, 17, 'public\\img\\products\\giay-adidas-response-2-nu-hong-nhe-01-1600x1600.jpg', 0),
(87, 17, 'public\\img\\products\\giay-adidas-response-2-nu-hong-nhe-03-1600x1600.jpg', 0),
(88, 17, 'public\\img\\products\\giay-adidas-response-2-nu-hong-nhe-04-1600x1600.jpg', 0),
(89, 17, 'public\\img\\products\\giay-adidas-response-2-nu-hong-nhe-05-1600x1600.jpg', 0),
(90, 17, 'public\\img\\products\\giay-adidas-response-2-nu-hong-nhe-06-1600x1600.jpg', 0),
(91, 18, 'public\\img\\products\\giay-adidas-vl-court-3-0-trang-xanh-nau-02-1600x1600.jpg', 1),
(92, 18, 'public\\img\\products\\giay-adidas-vl-court-3-0-trang-xanh-nau-01-1600x1600.jpg', 0),
(93, 18, 'public\\img\\products\\giay-adidas-vl-court-3-0-trang-xanh-nau-03-1600x1600.jpg', 0),
(94, 18, 'public\\img\\products\\giay-adidas-vl-court-3-0-trang-xanh-nau-04-1600x1600.jpg', 0),
(95, 18, 'public\\img\\products\\giay-adidas-vl-court-3-0-trang-xanh-nau-05-1600x1600.jpg', 0),
(96, 18, 'public\\img\\products\\giay-adidas-vl-court-3-0-trang-xanh-nau-06-1600x1600.jpg', 0),
(97, 19, 'public\\img\\products\\giay-adidas-supernova-comfortglide-nu-xam-trang-02-1600x1600.jpg', 1),
(98, 19, 'public\\img\\products\\giay-adidas-supernova-comfortglide-nu-xam-trang-01-1600x1600.jpg', 0),
(99, 19, 'public\\img\\products\\giay-adidas-supernova-comfortglide-nu-xam-trang-03-1600x1600.jpg', 0),
(100, 19, 'public\\img\\products\\giay-adidas-supernova-comfortglide-nu-xam-trang-04-1600x1600.jpg', 0),
(101, 19, 'public\\img\\products\\giay-adidas-supernova-comfortglide-nu-xam-trang-05-1600x1600.jpg', 0),
(102, 19, 'public\\img\\products\\giay-adidas-supernova-comfortglide-nu-xam-trang-06-1600x1600.jpg', 0),
(103, 20, 'public\\img\\products\\giay-adidas-jogit-nu-xam-02-1600x1600.jpg', 1),
(104, 20, 'public\\img\\products\\giay-adidas-jogit-nu-xam-01-1600x1600.jpg', 0),
(105, 20, 'public\\img\\products\\giay-adidas-jogit-nu-xam-03-1600x1600.jpg', 0),
(106, 20, 'public\\img\\products\\giay-adidas-jogit-nu-xam-04-1600x1600.jpg', 0),
(107, 20, 'public\\img\\products\\giay-adidas-jogit-nu-xam-05-1600x1600.jpg', 0),
(108, 20, 'public\\img\\products\\giay-adidas-jogit-nu-xam-06-1600x1600.jpg', 0),
(109, 21, 'public\\img\\products\\giay-adidas-adizero-sl-2-nam-xam-02-1600x1600.jpg', 1),
(110, 21, 'public\\img\\products\\giay-adidas-adizero-sl-2-nam-xam-01-1600x1600.jpg', 0),
(111, 21, 'public\\img\\products\\giay-adidas-adizero-sl-2-nam-xam-03-1600x1600.jpg', 0),
(112, 21, 'public\\img\\products\\giay-adidas-adizero-sl-2-nam-xam-04-1600x1600.jpg', 0),
(113, 21, 'public\\img\\products\\giay-adidas-adizero-sl-2-nam-xam-05-1600x1600.jpg', 0),
(114, 21, 'public\\img\\products\\giay-adidas-adizero-sl-2-nam-xam-06-1600x1600.jpg', 0),
(115, 22, 'public\\img\\products\\giay-adidas-supernova-comfortglide-nam-xam-xanh-02-1600x1600.jpg', 1),
(116, 22, 'public\\img\\products\\giay-adidas-supernova-comfortglide-nam-xam-xanh-01-1600x1600.jpg', 0),
(117, 22, 'public\\img\\products\\giay-adidas-supernova-comfortglide-nam-xam-xanh-03-1600x1600.jpg', 0),
(118, 22, 'public\\img\\products\\giay-adidas-supernova-comfortglide-nam-xam-xanh-04-1600x1600.jpg', 0),
(119, 22, 'public\\img\\products\\giay-adidas-supernova-comfortglide-nam-xam-xanh-05-1600x1600.jpg', 0),
(120, 22, 'public\\img\\products\\giay-adidas-supernova-comfortglide-nam-xam-xanh-06-1600x1600.jpg', 0),
(121, 23, 'public\\img\\products\\giay-adidas-ultrarun-5-nam-trang-02-1600x1600.jpg', 1),
(122, 23, 'public\\img\\products\\giay-adidas-ultrarun-5-nam-trang-01-1600x1600.jpg', 0),
(123, 23, 'public\\img\\products\\giay-adidas-ultrarun-5-nam-trang-03-1600x1600.jpg', 0),
(124, 23, 'public\\img\\products\\giay-adidas-ultrarun-5-nam-trang-04-1600x1600.jpg', 0),
(125, 23, 'public\\img\\products\\giay-adidas-ultrarun-5-nam-trang-05-1600x1600.jpg', 0),
(126, 23, 'public\\img\\products\\giay-adidas-ultrarun-5-nam-trang-06-1600x1600.jpg', 0),
(127, 24, 'public\\img\\products\\giay-adidas-pureboost-5-nu-trang-hong-02-1600x1600.jpg', 1),
(128, 24, 'public\\img\\products\\giay-adidas-pureboost-5-nu-trang-hong-01-1600x1600.jpg', 0),
(129, 24, 'public\\img\\products\\giay-adidas-pureboost-5-nu-trang-hong-03-1600x1600.jpg', 0),
(130, 24, 'public\\img\\products\\giay-adidas-pureboost-5-nu-trang-hong-04-1600x1600.jpg', 0),
(131, 24, 'public\\img\\products\\giay-adidas-pureboost-5-nu-trang-hong-05-1600x1600.jpg', 0),
(132, 24, 'public\\img\\products\\giay-adidas-pureboost-5-nu-trang-hong-06-1600x1600.jpg', 0),
(133, 25, 'public\\img\\products\\giay-asics-gel-excite-11-nu-xam-trang-02-1600x1600.jpg', 1),
(134, 25, 'public\\img\\products\\giay-asics-gel-excite-11-nu-xam-trang-01-1600x1600.jpg', 0),
(135, 25, 'public\\img\\products\\giay-asics-gel-excite-11-nu-xam-trang-03-1600x1600.jpg', 0),
(136, 25, 'public\\img\\products\\giay-asics-gel-excite-11-nu-xam-trang-04-1600x1600.jpg', 0),
(137, 25, 'public\\img\\products\\giay-asics-gel-excite-11-nu-xam-trang-05-1600x1600.jpg', 0),
(138, 25, 'public\\img\\products\\giay-asics-gel-excite-11-nu-xam-trang-06-1600x1600.jpg', 0),
(139, 26, 'public\\img\\products\\giay-asics-gel-kayano-32-nu-xanh-xam-02-1600x1600.jpg', 1),
(140, 26, 'public\\img\\products\\giay-asics-gel-kayano-32-nu-xanh-xam-01-1600x1600.jpg', 0),
(141, 26, 'public\\img\\products\\giay-asics-gel-kayano-32-nu-xanh-xam-03-1600x1600.jpg', 0),
(142, 26, 'public\\img\\products\\giay-asics-gel-kayano-32-nu-xanh-xam-04-1600x1600.jpg', 0),
(143, 26, 'public\\img\\products\\giay-asics-gel-kayano-32-nu-xanh-xam-05-1600x1600.jpg', 0),
(144, 26, 'public\\img\\products\\giay-asics-gel-kayano-32-nu-xanh-xam-06-1600x1600.jpg', 0),
(145, 27, 'public\\img\\products\\giay-asics-gt-1000-14-nam-den-xanh-02-1600x1600.jpg', 1),
(146, 27, 'public\\img\\products\\giay-asics-gt-1000-14-nam-den-xanh-01-1600x1600.jpg', 0),
(147, 27, 'public\\img\\products\\giay-asics-gt-1000-14-nam-den-xanh-03-1600x1600.jpg', 0),
(148, 27, 'public\\img\\products\\giay-asics-gt-1000-14-nam-den-xanh-04-1600x1600.jpg', 0),
(149, 27, 'public\\img\\products\\giay-asics-gt-1000-14-nam-den-xanh-05-1600x1600.jpg', 0),
(150, 27, 'public\\img\\products\\giay-asics-gt-1000-14-nam-den-xanh-06-1600x1600.jpg', 0),
(151, 28, 'public\\img\\products\\giay-asics-gel-contend-9-nam-xam-trang-02-1600x1600.jpg', 1),
(152, 28, 'public\\img\\products\\giay-asics-gel-contend-9-nam-xam-trang-01-1600x1600.jpg', 0),
(153, 28, 'public\\img\\products\\giay-asics-gel-contend-9-nam-xam-trang-03-1600x1600.jpg', 0),
(154, 28, 'public\\img\\products\\giay-asics-gel-contend-9-nam-xam-trang-04-1600x1600.jpg', 0),
(155, 28, 'public\\img\\products\\giay-asics-gel-contend-9-nam-xam-trang-05-1600x1600.jpg', 0),
(156, 28, 'public\\img\\products\\giay-asics-gel-contend-9-nam-xam-trang-06-1600x1600.jpg', 0),
(157, 29, 'public\\img\\products\\giay-asics-gel-challenger-15-nu-hong-nau-02-1600x1600.jpg', 1),
(158, 29, 'public\\img\\products\\giay-asics-gel-challenger-15-nu-hong-nau-01-1600x1600.jpg', 0),
(159, 29, 'public\\img\\products\\giay-asics-gel-challenger-15-nu-hong-nau-03-1600x1600.jpg', 0),
(160, 29, 'public\\img\\products\\giay-asics-gel-challenger-15-nu-hong-nau-04-1600x1600.jpg', 0),
(161, 29, 'public\\img\\products\\giay-asics-gel-challenger-15-nu-hong-nau-05-1600x1600.jpg', 0),
(162, 29, 'public\\img\\products\\giay-asics-gel-challenger-15-nu-hong-nau-06-1600x1600.jpg', 0),
(163, 30, 'public\\img\\products\\giay-asics-gel-resolution-x-nu-trang-tim-02-1600x1600.jpg', 1),
(164, 30, 'public\\img\\products\\giay-asics-gel-resolution-x-nu-trang-tim-01-1600x1600.jpg', 0),
(165, 30, 'public\\img\\products\\giay-asics-gel-resolution-x-nu-trang-tim-03-1600x1600.jpg', 0),
(166, 30, 'public\\img\\products\\giay-asics-gel-resolution-x-nu-trang-tim-04-1600x1600.jpg', 0),
(167, 30, 'public\\img\\products\\giay-asics-gel-resolution-x-nu-trang-tim-05-1600x1600.jpg', 0),
(168, 30, 'public\\img\\products\\giay-asics-gel-resolution-x-nu-trang-tim-06-1600x1600.jpg', 0),
(169, 31, 'public\\img\\products\\giay-clarks-tilden-plain-nam-den-02-1600x1600.jpg', 1),
(170, 31, 'public\\img\\products\\giay-clarks-tilden-plain-nam-den-01-1600x1600.jpg', 0),
(171, 31, 'public\\img\\products\\giay-clarks-tilden-plain-nam-den-03-1600x1600.jpg', 0),
(172, 31, 'public\\img\\products\\giay-clarks-tilden-plain-nam-den-04-1600x1600.jpg', 0),
(173, 31, 'public\\img\\products\\giay-clarks-tilden-plain-nam-den-05-1600x1600.jpg', 0),
(174, 31, 'public\\img\\products\\giay-clarks-tilden-plain-nam-den-06-1600x1600.jpg', 0),
(175, 32, 'public\\img\\products\\giay-clarks-howard-walk-nam-nau-07-1600x1600.jpg', 1),
(176, 32, 'public\\img\\products\\giay-clarks-howard-walk-nam-nau-00-1600x1600.jpg', 0),
(177, 32, 'public\\img\\products\\giay-clarks-howard-walk-nam-nau-03-1600x1600.jpg', 0),
(178, 32, 'public\\img\\products\\giay-clarks-howard-walk-nam-nau-04-1600x1600.jpg', 0),
(179, 32, 'public\\img\\products\\giay-clarks-howard-walk-nam-nau-05-1600x1600.jpg', 0),
(180, 32, 'public\\img\\products\\giay-clarks-howard-walk-nam-nau-06-1600x1600.jpg', 0),
(181, 33, 'public\\img\\products\\giay-clarks-tilden-walk-nam-nau-02-1600x1600.jpg', 1),
(182, 33, 'public\\img\\products\\giay-clarks-tilden-walk-nam-nau-01-1600x1600.jpg', 0),
(183, 33, 'public\\img\\products\\giay-clarks-tilden-walk-nam-nau-03-1600x1600.jpg', 0),
(184, 33, 'public\\img\\products\\giay-clarks-tilden-walk-nam-nau-04-1600x1600.jpg', 0),
(185, 33, 'public\\img\\products\\giay-clarks-tilden-walk-nam-nau-05-1600x1600.jpg', 0),
(186, 33, 'public\\img\\products\\giay-clarks-tilden-walk-nam-nau-06-1600x1600.jpg', 0),
(187, 34, 'public\\img\\products\\giay-puma-softride-enzo-nxt-nu-xam-trang-01-1600x1600.jpg', 1),
(188, 34, 'public\\img\\products\\giay-puma-softride-enzo-nxt-nu-xam-trang-02-1600x1600.jpg', 0),
(189, 34, 'public\\img\\products\\giay-puma-softride-enzo-nxt-nu-xam-trang-03-1600x1600.jpg', 0),
(190, 34, 'public\\img\\products\\giay-puma-softride-enzo-nxt-nu-xam-trang-04-1600x1600.jpg', 0),
(191, 34, 'public\\img\\products\\giay-puma-softride-enzo-nxt-nu-xam-trang-05-1600x1600.jpg', 0),
(192, 34, 'public\\img\\products\\giay-puma-softride-enzo-nxt-nu-xam-trang-06-1600x1600.jpg', 0),
(193, 35, 'public\\img\\products\\puma-Aviator-ProFoam-Sky-nam-trang-xam-01-1600x1600.jpg', 1),
(194, 35, 'public\\img\\products\\puma-Aviator-ProFoam-Sky-nam-trang-xam-02-1600x1600.jpg', 0),
(195, 35, 'public\\img\\products\\puma-Aviator-ProFoam-Sky-nam-trang-xam-03-1600x1600.jpg', 0),
(196, 35, 'public\\img\\products\\puma-Aviator-ProFoam-Sky-nam-trang-xam-04-1600x1600.jpg', 0),
(197, 35, 'public\\img\\products\\puma-Aviator-ProFoam-Sky-nam-trang-xam-05-1600x1600.jpg', 0),
(198, 35, 'public\\img\\products\\puma-Aviator-ProFoam-Sky-nam-trang-xam-05-1600x1600.jpg', 0),
(199, 36, 'public\\img\\products\\giay-puma-electrify-nitro-4-nam-trang-01-1600x1600.jpg', 1),
(200, 36, 'public\\img\\products\\giay-puma-electrify-nitro-4-nam-trang-02-1600x1600.jpg', 0),
(201, 36, 'public\\img\\products\\giay-puma-electrify-nitro-4-nam-trang-03-1600x1600.jpg', 0),
(202, 36, 'public\\img\\products\\giay-puma-electrify-nitro-4-nam-trang-04-1600x1600.jpg', 0),
(203, 36, 'public\\img\\products\\giay-puma-electrify-nitro-4-nam-trang-05-1600x1600.jpg', 0),
(204, 36, 'public\\img\\products\\giay-puma-electrify-nitro-4-nam-trang-06-1600x1600.jpg', 0),
(205, 37, 'public\\img\\products\\giay-puma-softride-proecho-slip-on-nu-trang-tim-01-1600x1600.jpg', 1),
(206, 37, 'public\\img\\products\\giay-puma-softride-proecho-slip-on-nu-trang-tim-02-1600x1600.jpg', 0),
(207, 37, 'public\\img\\products\\giay-puma-softride-proecho-slip-on-nu-trang-tim-03-1600x1600.jpg', 0),
(208, 37, 'public\\img\\products\\giay-puma-softride-proecho-slip-on-nu-trang-tim-04-1600x1600.jpg', 0),
(209, 37, 'public\\img\\products\\giay-puma-softride-proecho-slip-on-nu-trang-tim-05-1600x1600.jpg', 0),
(210, 37, 'public\\img\\products\\giay-puma-softride-proecho-slip-on-nu-trang-tim-06-1600x1600.jpg', 0);

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
(3, 'Vintage', 1),
(4, 'Giày Tây', 1);

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
(7, 'Xám Xanh Tím', 1),
(8, 'Xám Cam', 1),
(9, 'Trắng Đỏ', 1),
(10, 'Đen Trắng', 1),
(12, 'Hồng Nhẹ', 1),
(13, 'Trắng Xanh Nâu', 1),
(14, 'Xám Trắng', 1),
(15, 'Xám', 1),
(16, 'Xám Xanh', 1),
(17, 'Xanh Xám', 1),
(18, 'Đen Xanh', 1),
(19, 'Đen', 1),
(20, 'Nâu', 1);

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

--
-- Dumping data for table `nhacungcap`
--

INSERT INTO `nhacungcap` (`mancc`, `tenncc`, `sdt`, `diachi`, `trangthai`) VALUES
(1, 'Công ty TNHH Giày Biti\'s', '028 3875 1234', '22 Lý Chiêu Hoàng, Phường 10, Quận 6, TP. Hồ Chí Minh', 1),
(2, 'Công ty Cổ phần Giày Việt (Vina Giày)', '028 3931 9787', '456 Nguyễn Văn Quá, Phường Đông Hưng Thuận, Quận 12, TP. Hồ Chí Minh', 1),
(3, 'Công ty TNHH Giày Thượng Đình', '024 3987 6543', 'Số 10 Phố Tràng Tiền, Hoàn Kiếm, Hà Nội', 1),
(4, 'Công ty Cổ phần Juno Holding', '028 7300 1234', '123 Nguyễn Thị Minh Khai, Phường Bến Nghé, Quận 1, TP. Hồ Chí Minh', 1),
(5, 'Công ty TNHH Giày Ananas', '028 6654 3210', 'Khu công nghiệp Tân Bình, Quận Tân Bình, TP. Hồ Chí Minh', 1),
(6, 'Công ty TNHH Giày Đông Hải', '028 3750 8899', 'Lô A1, Khu công nghiệp Biên Hòa, Đồng Nai', 1),
(7, 'Công ty TNHH Giày RieNevan', '028 6688 7755', 'Phường Tân Sơn Nhì, Quận Tân Phú, TP. Hồ Chí Minh', 1),
(8, 'Công ty TNHH Giày Vascara', '028 3999 1122', '456 Lê Văn Sỹ, Phường 14, Quận 3, TP. Hồ Chí Minh', 1),
(9, 'Công ty TNHH Giày Hạnh Dung', '028 3845 6677', '789 Cách Mạng Tháng 8, Phường 12, Quận 10, TP. Hồ Chí Minh', 1),
(10, 'Công ty TNHH Sản xuất Giày Quốc Định', '028 3765 4321', 'Khu công nghiệp Tân Tạo, Bình Tân, TP. Hồ Chí Minh', 1),
(11, 'Công ty TNHH Giày Laforce', '024 6678 9900', 'Số 45 Nguyễn Trãi, Thanh Xuân, Hà Nội', 1),
(12, 'Công ty TNHH Giày Tùng Moscow', '028 3812 3456', 'Phường Tân Thới Hiệp, Quận 12, TP. Hồ Chí Minh', 1),
(13, 'Công ty TNHH Giày Aviwin', '028 6650 1122', 'Khu công nghiệp Long Bình, Biên Hòa, Đồng Nai', 1),
(14, 'Công ty TNHH Giày Dincox', '028 7301 2345', 'Phường Sơn Kỳ, Quận Tân Phú, TP. Hồ Chí Minh', 1),
(15, 'Công ty TNHH Giày Nam Việt', '028 3758 9999', 'Khu công nghiệp VSIP, Bình Dương', 1);

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
  `motasp` varchar(1000) NOT NULL,
  `soluongdaban` int(11) NOT NULL,
  `trangthai` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`masp`, `tensp`, `loai`, `gioitinh`, `gianhap`, `tyleloinhuan`, `hang`, `mau`, `motasp`, `soluongdaban`, `trangthai`) VALUES
(1, 'Nike MC Trainer - Nam', 1, 1, 500000, 10, 1, 4, 'Giày Nike MC Trainer 3 được thiết kế để tối ưu hóa mọi chuyển động trong phòng gym, từ những bài tập cường độ cao đến các động tác giữ thăng bằng. Với khả năng kết hợp sự thoải mái, bền bỉ và phong cách, đây là đôi giày lý tưởng cho cả tập luyện và sử dụng hàng ngày.\r\n\r\nĐặc điểm nổi bật:\r\nĐộ thoáng khí vượt trội: Thân giày bằng lưới mang lại cảm giác thoáng mát, giúp bạn luôn thoải mái trong suốt buổi tập.\r\nĐế phẳng ổn định: Thiết kế đế phẳng mang lại sự ổn định, hỗ trợ bạn thực hiện các động tác với độ chính xác cao nhất.\r\nĐa hướng linh hoạt: Đế cao su với họa tiết bám đường linh hoạt, cho phép bạn di chuyển dễ dàng theo nhiều hướng.\r\nĐộ bền tối ưu: Mũi giày và gót giày được gia cố bằng lớp bảo vệ chắc chắn, tăng cường độ bền ở những vị trí chịu lực nhiều nhất.\r\n\r\nNike MC Trainer 3 không chỉ là đôi giày tập luyện mà còn là lựa chọn hoàn hảo để bạn thể hiện phong cách cá nhân trong mọi hoạt động hàng ngày.', 0, 1),
(2, 'Nike Quest - Nữ', 1, 0, 100000, 10, 1, 2, 'Giày Nike Quest là mẫu giày thể thao mang phong cách hiện đại, phù hợp cho các hoạt động hàng ngày lẫn luyện tập thể chất. Thiết kế đẹp với đai ôm ở giữa bàn chân giúp giữ chân ổn định khi bạn di chuyển, mang lại cảm giác thoải mái và an toàn.\r\n\r\nTính năng nổi bật\r\nDây đai giữa bàn chân: Phần dây đai này giữ bàn chân cố định hơn khi bạn điều chỉnh dây giày, giúp tăng độ ôm và hỗ trợ thêm cho những bước chuyển động.\r\n\r\nĐệm giữa êm ái: Độ cao phần đệm giữa tăng thêm sự êm ái và đàn hồi, giúp tạo cảm giác thoải mái mỗi khi bước đi, từ việc di chuyển hàng ngày đến những hoạt động thể thao.\r\n\r\nĐế cao su bền bỉ: Đế ngoài làm từ cao su có độ bám tốt, giúp bạn tự tin trên mọi bề mặt mà không lo trơn trượt.\r\n\r\nNike Quest là lựa chọn tuyệt vời cho những ai tìm kiếm một đôi giày thể thao vừa phong cách vừa thoải mái, đáp ứng tốt trong nhiều hoàn cảnh sử dụng.', 0, 1),
(3, 'Nike Vapor Lite - Nam', 1, 1, 100000, 10, 1, 4, 'Giày Nike Vapor Lite là phiên bản nâng cấp vượt trội dành cho các vận động viên yêu thích bộ môn tennis và pickleball. Được thiết kế để tối ưu khả năng di chuyển trên sân cứng, đôi giày này giúp bạn bứt tốc, phanh gấp và xoay người linh hoạt mà không bị cản trở bởi trọng lượng hay độ bám.\r\n\r\nƯu điểm nổi bật:\r\nĐế ngoài cao su mới: Cải tiến với hợp chất cao su đặc biệt giúp tăng độ bám và hỗ trợ các chuyển động cắt góc nhanh chóng, mượt mà.\r\n\r\nMũi giày tăng cường độ bền: Lớp cao su bọc mũi sử dụng cùng chất liệu mới giúp chống mài mòn ở vùng chịu lực cao.\r\n\r\nThân giày bằng lưới kỹ thuật: Bền hơn lưới thường, mang lại sự thoáng khí và êm ái vượt trội khi chơi thể thao.\r\n\r\nĐệm giữa êm ái: Lớp foam mềm mại hỗ trợ bàn chân khi thi đấu cường độ cao.\r\n\r\nThích hợp cho sân cứng: Thiết kế chuyên dụng giúp tối ưu hiệu suất trên mặt sân tiêu chuẩn.\r\n\r\nNike Vapor Lite – Sự lựa chọn lý tưởng cho những ai đang tìm kiếm một đôi giày nhẹ, chắc chắn và đáng tin cậy để chinh phục mọi đường bóng.', 0, 1),
(4, 'Nike Winflo - Nam', 1, 1, 100000, 10, 1, 3, 'Giày Nike Air Winflo là một trong những mẫu giày thể thao tốt nhất của Nike vừa được ra mắt. Với kiểu dáng cực đẹp cùng công nghệ đỉnh cao, Nike Air Winflo hứa hẹn sẽ mẫu giày cực hot của Nike trong năm nay.\r\n\r\nGiày Nike Air Winflo có nhiều sự cải tiến vượt trội so với mẫu Winflo 10 trước đó đặc biệt là bộ đệm hoàn toàn mới Cushlon 3.0 trài dài toàn bộ đế giày mang đến độ êm ái và khả năng cân bằng cực tốt cho người sử dụng.\r\n\r\nPhần upper với chất liệu mesh cao cấp, mềm mại linh hoạt và rất thoáng khí. Phần đế ngoài hình dạng Waffle làm bằng chất liệu cao su cao cấp cho độ bám và khả năng chống mài mòn tuyệt vời.\r\n\r\nVới những cải tiến vượt trội từ kiểu dáng và công nghệ so với phiên bản trước, Nike Air Winflo 11 là lựa chọn xuất sắc cho một đôi giày thể thao.', 0, 1),
(5, 'Nike Run Defy - Nữ', 1, 0, 100000, 10, 1, 5, 'Nike Run Defy là đôi giày thể thao dành cho những ai muốn tự định hình phong cách và tốc độ của riêng mình. Dù bạn đang tập luyện nhẹ nhàng hay chinh phục quãng đường dài, đôi giày này mang đến sự cân bằng hoàn hảo giữa độ êm ái, thoáng khí và độ bám linh hoạt.\r\n\r\nĐiểm nổi bật:\r\nThân giày vải lưới thoáng khí: Giúp đôi chân luôn mát mẻ, kể cả khi chạy trong thời tiết nóng bức hoặc vận động cường độ cao.\r\nĐệm foam đàn hồi: Mang lại cảm giác êm ái và ổn định cho từng bước chạy, phù hợp với nhiều tốc độ và cường độ khác nhau.\r\nRãnh uốn linh hoạt: Tăng cường độ linh hoạt, tạo cảm giác chuyển động mượt mà và tự nhiên hơn.\r\nĐế ngoài Waffle bền chắc: Với chất liệu cao su dẻo và các chi tiết tăng cường, giúp tăng độ bám và độ bền trong suốt quá trình sử dụng.', 0, 1),
(6, 'Nike Run Defy - Nam', 1, 1, 100000, 10, 1, 3, 'Nike Run Defy là đôi giày thể thao dành cho những ai muốn tự định hình phong cách và tốc độ của riêng mình. Dù bạn đang tập luyện nhẹ nhàng hay chinh phục quãng đường dài, đôi giày này mang đến sự cân bằng hoàn hảo giữa độ êm ái, thoáng khí và độ bám linh hoạt.\r\n\r\nĐiểm nổi bật:\r\nThân giày vải lưới thoáng khí: Giúp đôi chân luôn mát mẻ, kể cả khi chạy trong thời tiết nóng bức hoặc vận động cường độ cao.\r\nĐệm foam đàn hồi: Mang lại cảm giác êm ái và ổn định cho từng bước chạy, phù hợp với nhiều tốc độ và cường độ khác nhau.\r\nRãnh uốn linh hoạt: Tăng cường độ linh hoạt, tạo cảm giác chuyển động mượt mà và tự nhiên hơn.\r\nĐế ngoài Waffle bền chắc: Với chất liệu cao su dẻo và các chi tiết tăng cường, giúp tăng độ bám và độ bền trong suốt quá trình sử dụng.', 0, 1),
(7, 'Nike Structure - Nữ', 1, 0, 100000, 0, 1, 7, 'Nike Structure 26 là mẫu giày thể thao mới nhất nổi bật của Nike trong năm nay, được thiết kế để phục vụ các hoạt động thể chất đa dạng như: chạy bộ, tập gym, đi bộ đường dài hoặc đơn giản là di chuyển hàng ngày. Với trọng tâm là độ ổn định, nâng đỡ và êm ái lâu dài, mẫu giày này tích hợp những công nghệ tiên tiến nhất của Nike, đặc biệt phù hợp cho người có bàn chân dễ mỏi hoặc cần kiểm soát chuyển động bàn chân.\r\nNike Structure 26 không chỉ là một đôi giày chạy bộ thông thường. Với sự kết hợp giữa đệm ReactX phản hồi cao, hệ thống hỗ trợ vòm chân, và thiết kế thân giày thông minh, đây là lựa chọn lý tưởng cho mọi nhu cầu vận động hàng ngày – từ thể thao cho đến di chuyển lâu dài.\r\nNếu bạn đang tìm kiếm một đôi giày thể thao đa năng, công nghệ cao, hỗ trợ tốt cho bàn chân – Nike Structure chính là sự đầu tư xứng đáng.', 0, 1),
(8, 'Nike Metcon - Nam', 1, 1, 100000, 10, 1, 6, 'Giày Nike Metcon 10 là thế hệ mới nhất trong dòng giày training nổi tiếng của Nike, được thiết kế dành cho những người yêu thích tập luyện sức mạnh, crossfit và functional training cường độ cao. Phiên bản này mang đến sự ổn định vượt trội, độ linh hoạt tối ưu và khả năng hoàn trả năng lượng ấn tượng, giúp bạn chinh phục mọi thử thách trong phòng tập.\r\n\r\nPhần gót giày được trang bị tấm Hyperlift siêu cứng, giúp tăng độ ổn định tối đa khi nâng tạ nặng, squats, deadlifts hay cleans mà vẫn giữ cảm giác tự nhiên khi di chuyển. So với Metcon 9, Metcon 10 có hộp mũi rộng hơn, giúp ngón chân được thoải mái hơn và tăng khả năng truyền lực toàn bàn chân khi thực hiện động tác nặng.\r\n\r\nPhần midsole được nâng cấp với ReactX foam thế hệ mới, nhẹ hơn nhưng mang lại độ đàn hồi cao hơn, giúp tăng hoàn trả năng lượng và hỗ trợ các bài tập yêu cầu độ linh hoạt như box jump hay sprint. Các đường rãnh linh hoạt (flex grooves) trên đế ngoài giúp chuyển động mượt mà, phản hồi nhanh theo từng động tác.', 0, 1),
(11, 'Puma Skye Clean Distressed - Nữ', 2, 0, 100000, 10, 2, 1, 'Giày Puma Skye Clean Distressed lấy cảm hứng từ thể thao, mang đến thiết kế hiện đại kết hợp cùng sự thoải mái tối ưu cho cuộc sống năng động. Với form dáng mid-boot cá tính, đế cao su bền bỉ và chi tiết branding đặc trưng, đây là lựa chọn hoàn hảo cho phong cách thường ngày.', 0, 1),
(12, 'Puma Dribble - Nam', 2, 1, 100000, 10, 2, 4, 'Giày Puma Dribble lấy cảm hứng từ thể thao, mang đến thiết kế hiện đại kết hợp cùng sự thoải mái tối ưu cho cuộc sống năng động. Với form dáng mid-boot cá tính, đế cao su bền bỉ và chi tiết branding đặc trưng, đây là lựa chọn hoàn hảo cho phong cách thường ngày.\r\n\r\nĐặc điểm nổi bật:\r\nThiết kế thể thao trẻ trung, dễ phối đồ.\r\n\r\nForm dáng regular fit, mid-boot cho cảm giác chắc chắn.\r\n\r\nĐế cao su bền bỉ, tăng độ bám và linh hoạt khi di chuyển.\r\n\r\nDây buộc truyền thống ôm vừa vặn bàn chân.\r\n\r\nLogo PUMA đặc trưng, khẳng định phong cách thương hiệu.\r\n\r\nKhám phá ngay PUMA Dribble chính hãng tại Myshoes.vn để nâng tầm phong cách cùng sự thoải mái vượt trội!', 0, 1),
(13, 'Nike Vomero - Nam', 1, 1, 1700000, 13, 1, 6, 'Giày Nike Vomero 18 không chỉ là một đôi giày chạy bộ hiệu suất cao, mà còn là lựa chọn hoàn hảo cho phong cách sống năng động hiện đại. Với thiết kế thanh lịch, chất liệu cao cấp và công nghệ đệm tiên tiến, Vomero 18 dễ dàng đồng hành cùng bạn từ buổi chạy sáng sớm đến những hoạt động thường ngày – vừa thoải mái vừa thời trang.', 0, 1),
(14, 'Nike Quest - Nam', 1, 1, 1500000, 15, 1, 8, 'Giày Nike Quest 6 là mẫu giày thể thao mang phong cách hiện đại, phù hợp cho các hoạt động hàng ngày lẫn luyện tập thể chất. Thiết kế đẹp với đai ôm ở giữa bàn chân giúp giữ chân ổn định khi bạn di chuyển, mang lại cảm giác thoải mái và an toàn.\r\n\r\nTính năng nổi bật\r\nDây đai giữa bàn chân: Phần dây đai này giữ bàn chân cố định hơn khi bạn điều chỉnh dây giày, giúp tăng độ ôm và hỗ trợ thêm cho những bước chuyển động.\r\n\r\nĐệm giữa êm ái: Độ cao phần đệm giữa tăng thêm sự êm ái và đàn hồi, giúp tạo cảm giác thoải mái mỗi khi bước đi, từ việc di chuyển hàng ngày đến những hoạt động thể thao.\r\n\r\nĐế cao su bền bỉ: Đế ngoài làm từ cao su có độ bám tốt, giúp bạn tự tin trên mọi bề mặt mà không lo trơn trượt.\r\n\r\nNike Quest 6 là lựa chọn tuyệt vời cho những ai tìm kiếm một đôi giày thể thao vừa phong cách vừa thoải mái, đáp ứng tốt trong nhiều hoàn cảnh sử dụng.', 0, 1),
(15, 'Nike Blazer Low \'77 Vintage - Nam ', 3, 1, 2000000, 12, 1, 10, 'Nike Blazer Low \'77 Vintage là mẫu giày thời trang mang phong cách cổ điển của Nike, lấy cảm hứng từ các thiết kế thập niên 70. Với kiểu dáng low-top gọn gàng, chất liệu da cao cấp và các chi tiết suede retro, đôi giày mang lại vẻ ngoài đơn giản nhưng đầy cá tính, dễ dàng phối với nhiều phong cách trang phục hằng ngày.\r\n\r\nThiết kế retro mang đậm dấu ấn Nike\r\nNike Blazer Low \'77 Vintage giữ nguyên phong cách cổ điển, với logo Swoosh retro và đường nét thiết kế tối giản. Phần upper kết hợp da cao cấp cùng các chi tiết suede mềm mại, vừa tăng độ bền vừa tạo nên vẻ ngoài vintage đặc trưng.\r\n\r\nCảm giác thoải mái khi mang hằng ngày\r\nĐôi giày được thiết kế với cổ giày thấp và lớp đệm êm, giúp mang lại cảm giác thoải mái khi di chuyển trong thời gian dài. Kiểu dáng gọn gàng và form ôm chân giúp đôi giày phù hợp cho các hoạt động thường ngày.\r\nKết cấu vulcanized bền bỉ\r\nNike sử dụng kết cấu vulcanized giúp liên kết chặt chẽ giữa phần đế ngoài và thân giày, mang lại độ bền cao và vẻ ngoài gọn ', 0, 1),
(16, 'Nike Blazer Low \'77 Vintage - Nam', 3, 1, 2000000, 15, 1, 4, 'Nike Blazer Low \'77 Vintage là mẫu giày thời trang mang phong cách cổ điển của Nike, lấy cảm hứng từ các thiết kế thập niên 70. Với kiểu dáng low-top gọn gàng, chất liệu da cao cấp và các chi tiết suede retro, đôi giày mang lại vẻ ngoài đơn giản nhưng đầy cá tính, dễ dàng phối với nhiều phong cách trang phục hằng ngày.\r\n\r\nThiết kế retro mang đậm dấu ấn Nike\r\nNike Blazer Low \'77 Vintage giữ nguyên phong cách cổ điển, với logo Swoosh retro và đường nét thiết kế tối giản. Phần upper kết hợp da cao cấp cùng các chi tiết suede mềm mại, vừa tăng độ bền vừa tạo nên vẻ ngoài vintage đặc trưng.\r\n\r\nCảm giác thoải mái khi mang hằng ngày\r\nĐôi giày được thiết kế với cổ giày thấp và lớp đệm êm, giúp mang lại cảm giác thoải mái khi di chuyển trong thời gian dài. Kiểu dáng gọn gàng và form ôm chân giúp đôi giày phù hợp cho các hoạt động thường ngày.', 0, 1),
(17, 'Adidas Response - Nữ', 2, 0, 1400000, 12, 3, 12, 'Giày Adidas Response 2 – Êm ái, linh hoạt cho chạy bộ và luyện tập hằng ngày\r\nGiày Adidas Response 2 được thiết kế để mang lại sự thoải mái và tự tin trong từng bước chạy. Với cấu trúc nhẹ cùng lớp đệm êm ái, đôi giày phù hợp cho chạy bộ hằng ngày, luyện tập thể thao hoặc các hoạt động di chuyển thường xuyên.\r\n\r\nPhần upper lưới thoáng khí giúp tăng khả năng lưu thông không khí, giữ cho bàn chân luôn khô ráo và dễ chịu trong suốt quá trình vận động. Thiết kế nhẹ và ôm chân tự nhiên giúp đôi giày thích ứng linh hoạt với từng bước chạy.\r\n\r\nĐế giữa được trang bị Cloudfoam+ EVA cushioning chạy dọc toàn bộ bàn chân, mang lại cảm giác êm ái và đàn hồi tốt khi tiếp đất. Công nghệ này giúp hấp thụ lực hiệu quả và tạo cảm giác bật nhẹ, giúp mỗi bước chạy trở nên mượt mà và thoải mái hơn.', 0, 1),
(18, 'Adidas VL Court - Nam', 2, 1, 1460000, 11, 3, 13, 'Giày Adidas VL Court 3.0 là mẫu sneaker thời trang cổ điển mang phong cách tối giản và tinh tế, dễ dàng kết hợp với mọi outfit thường ngày. Thân giày da mềm mại cùng 3 sọc biểu tượng adidas nổi bật mang đến vẻ ngoài sang trọng và trẻ trung.\r\n\r\nBên trong là lót giày êm ái và đệm nhẹ, giúp di chuyển thoải mái suốt cả ngày. Đế cao su lưu hóa (vulcanized rubber) bền chắc, bám tốt trên nhiều bề mặt – từ sân trượt ván cho đến những bước đi dạo phố.', 0, 1),
(19, 'Adidas Supernova Comfortglide - Nữ', 2, 0, 1400000, 16, 3, 14, 'Giày Adidas Supernova Comfortglide được thiết kế dành riêng cho những buổi chạy bộ hằng ngày, mang đến sự thoải mái tối đa và khả năng hỗ trợ tuyệt vời. Dù bạn là người mới bắt đầu hay đang tập luyện để chinh phục các mục tiêu cao hơn, đôi giày này sẽ đồng hành để giúp bạn bứt phá trên từng sải bước.\r\n\r\nƯu điểm nổi bật:\r\nĐế giữa Dreamstrike toàn phần: Hấp thụ lực tốt, mang lại cảm giác êm ái và đàn hồi liên tục.\r\n\r\nUpper vải lưới mono-mesh thoáng khí: Ôm vừa chân, giữ cho bàn chân luôn khô thoáng và thoải mái.\r\n\r\nĐế ngoài siêu nhẹ, chống mài mòn: Tăng độ bền và bám chắc trên nhiều loại địa hình.\r\n\r\nThiết kế gọn gàng, tinh tế: Dễ dàng kết hợp với nhiều trang phục thể thao và thường ngày.', 0, 1),
(20, 'Adidas Jogit - Nữ', 1, 0, 1400000, 9, 3, 15, 'Giày Adidas Jogit là mẫu giày thể thao đa dụng, được thiết kế để mang lại sự thoải mái tối đa cho cả vận động và sinh hoạt hằng ngày. Với trọng lượng nhẹ, kiểu dáng hiện đại cùng chất liệu thoáng khí, đôi giày giúp bạn luôn tự tin trong mọi hoạt động – từ chạy bộ, tập gym cho tới đi chơi, đi làm.\r\n\r\nƯu điểm nổi bật:\r\nThân giày lưới thoáng khí: Giúp bàn chân luôn mát mẻ, giảm cảm giác bí bách khi mang lâu.\r\n\r\nĐệm Lightmotion toàn phần: Êm ái và đàn hồi, hỗ trợ bước di chuyển mượt mà trong suốt ngày dài.\r\n\r\nĐế ngoài Adiwear bền bỉ: Bám tốt trên nhiều bề mặt, chống mài mòn hiệu quả.\r\n\r\nPhong cách thể thao hiện đại: Thiết kế tối giản, dễ phối với trang phục tập luyện hoặc thời trang casual.', 0, 1),
(21, 'Adidas Adizero SL - Nam', 1, 1, 1000000, 0, 3, 15, 'Adidas Adizero SL 2 là đôi giày chạy bộ siêu nhẹ, được thiết kế cho những vận động viên yêu thích tốc độ và sự linh hoạt mỗi ngày. Với cấu trúc đệm tiên tiến và thiết kế tối giản, đôi giày mang đến sự kết hợp hoàn hảo giữa độ nhạy, độ êm và cảm giác thoáng mát trên từng bước chạy.\r\n\r\nƯu điểm nổi bật Adidas Adizero SL 2:\r\nĐệm Lightstrike Pro cao cấp: Tăng độ đàn hồi, hỗ trợ hoàn trả năng lượng tối đa, giúp bạn duy trì tốc độ ổn định.\r\n\r\nThân giày lưới siêu nhẹ: Tạo cảm giác thoáng khí, giảm áp lực lên bàn chân, phù hợp cả khi tập luyện dài ngày.\r\n\r\nForm dáng streamline: Gọn gàng, ôm chân chắc chắn nhưng vẫn mang đến sự linh hoạt tự nhiên.\r\n\r\nThiết kế tối ưu cho tốc độ: Lý tưởng cho luyện tập hằng ngày và các buổi chạy tốc độ ngắn – trung bình.', 0, 1),
(22, 'Adidas Supernova Comfortglide - Nam', 2, 1, 1700000, 4, 3, 16, 'Giày Adidas Supernova Comfortglide được thiết kế dành riêng cho những buổi chạy bộ hằng ngày, mang đến sự thoải mái tối đa và khả năng hỗ trợ tuyệt vời. Dù bạn là người mới bắt đầu hay đang tập luyện để chinh phục các mục tiêu cao hơn, đôi giày này sẽ đồng hành để giúp bạn bứt phá trên từng sải bước.\r\n\r\nƯu điểm nổi bật:\r\nĐế giữa Dreamstrike toàn phần: Hấp thụ lực tốt, mang lại cảm giác êm ái và đàn hồi liên tục.\r\n\r\nUpper vải lưới mono-mesh thoáng khí: Ôm vừa chân, giữ cho bàn chân luôn khô thoáng và thoải mái.\r\n\r\nĐế ngoài siêu nhẹ, chống mài mòn: Tăng độ bền và bám chắc trên nhiều loại địa hình.\r\n\r\nThiết kế gọn gàng, tinh tế: Dễ dàng kết hợp với nhiều trang phục thể thao và thường ngày.', 0, 1),
(23, 'Adidas Ultrarun - Nam', 2, 1, 1900000, 5, 3, 1, 'Adidas Ultrarun 5 không chỉ là đôi giày chạy bộ, mà còn là lựa chọn lý tưởng cho mọi nhu cầu hàng ngày của bạn. Với thiết kế đa năng, đôi giày này mang đến sự thoải mái và phong cách vượt trội, từ những buổi tập luyện thể thao đến những chuyến đi dạo hay các hoạt động thường nhật.\r\n\r\nĐặc điểm nổi bật:\r\nĐệm Bounce 2.0: Nhẹ nhàng và đàn hồi, hỗ trợ bước chân êm ái dù bạn đang chạy bộ hay di chuyển hàng ngày.\r\nThân giày vải lưới: Đảm bảo độ thông thoáng và thoải mái, giữ cho đôi chân luôn khô thoáng suốt cả ngày dài.\r\nĐế ngoài siêu bám: Mang lại độ ổn định và tự tin trên mọi địa hình, từ đường phố đến công viên.', 0, 1),
(24, 'Adidas Pureboost - Nữ', 2, 0, 1500000, 3, 3, 5, 'Adidas Pureboost 5 là đôi giày thể thao lý tưởng cho cả ngày năng động, từ chạy bộ buổi sáng đến các hoạt động thường nhật. Với thiết kế thân thiện với môi trường và hiệu suất vượt trội, đôi giày này mang đến sự thoải mái và tự tin trong từng bước đi.\r\n\r\nTính năng nổi bật\r\nLớp đệm BOOST nhẹ nhất: Mang lại sự đàn hồi và phản hồi năng lượng tối ưu, giúp bạn luôn tràn đầy sức sống trong mọi hoạt động.\r\n\r\nThân giày lưới thoáng khí: Được thiết kế để ôm chân vừa vặn, mang lại cảm giác thoải mái và thông thoáng suốt cả ngày.\r\n\r\nĐế ngoài Adiwear bền bỉ: Tăng cường độ bám trên nhiều địa hình, giúp bạn di chuyển dễ dàng và an toàn.\r\n\r\nChất liệu tái chế: Sử dụng tối thiểu 20% vật liệu tái chế, đôi giày không chỉ bảo vệ môi trường mà còn góp phần xây dựng lối sống bền vững.', 0, 1),
(25, 'Asics Gel-Excite - Nữ ', 1, 0, 1500000, 0, 5, 15, 'Giày Asics Gel-Excite 11 sở hữu thiết kế thoải mái và linh hoạt, phù hợp cho cả chạy bộ lẫn các hoạt động tập luyện hằng ngày. Mẫu giày này được tối ưu để mang lại cảm giác êm ái hơn dưới bàn chân, giúp bạn duy trì sự dễ chịu trong suốt quá trình vận động.\r\n\r\nĐế giữa được trang bị công nghệ AMPLIFOAM™ PLUS với độ dày cao hơn, tạo cảm giác mềm mại và êm hơn so với AMPLIFOAM™ tiêu chuẩn. Kết hợp cùng công nghệ GEL™ ở gót, Gel-Excite 11 hỗ trợ giảm chấn hiệu quả khi tiếp đất, mang lại trải nghiệm chạy ổn định và thoải mái.\r\n\r\nPhần upper mesh jacquard kỹ thuật ôm chân tự nhiên, cho cảm giác mềm mại và tăng độ thoáng khí. Bên trong, lót giày OrthoLite™ giúp tăng độ êm và kiểm soát độ ẩm, giữ cho bàn chân luôn khô thoáng trong suốt quá trình sử dụng.', 0, 1),
(26, ' Asics Gel Kayano - Nữ', 2, 0, 1500000, 0, 5, 17, 'Giày Asics Gel Kayano 32 là thế hệ mới nhất của dòng Kayano huyền thoại, được thiết kế dành cho người chạy bộ cần độ ổn định cao, khả năng hỗ trợ vượt trội và cảm giác êm ái lâu dài. Đây là lựa chọn lý tưởng cho những buổi chạy dài, chạy phục hồi hoặc người có xu hướng overpronation.\r\n\r\nĐế giữa sử dụng FF BLAST™ PLUS thế hệ mới với trọng lượng nhẹ hơn nhưng có độ êm cao hơn, kết hợp cùng chiều cao đế được tối ưu giúp từng bước chạy trở nên mượt mà, ổn định và ít tiêu hao năng lượng hơn. Ở gót chân, PureGEL™ phiên bản nâng cấp mang lại cảm giác tiếp đất mềm hơn rõ rệt, giảm áp lực lên khớp và cơ khi chạy đường dài.\r\n\r\nĐiểm nổi bật của Kayano 32 nằm ở hệ thống hướng dẫn 4D GUIDANCE SYSTEM™, hoạt động như một pod thông minh phản hồi theo tải trọng của bàn chân, giúp giữ sải bước cân bằng và ổn định trong suốt quá trình chạy. Cấu trúc này giúp đôi giày hỗ trợ thích ứng theo chuyển động thực tế, thay vì ép chân vào một form cố định.', 0, 1),
(27, 'Asics GT-1000 - Nam', 2, 1, 1100000, 5, 5, 10, 'Giày Asics GT-1000 14 được thiết kế dành cho người chạy bộ cần sự ổn định, hỗ trợ tốt và cảm giác êm ái trong suốt quãng đường chạy. Với cấu trúc nhẹ cùng các công nghệ đệm tiên tiến của Asics, đôi giày giúp bạn duy trì nhịp chạy thoải mái và tự tin hơn trên mọi cung đường.\r\n\r\nĐiểm nổi bật của GT-1000 14 nằm ở 3D GUIDANCE SYSTEM™, công nghệ hỗ trợ giúp định hướng chuyển động của bàn chân theo cách tự nhiên. Hệ thống này giúp tăng độ ổn định trong từng bước chạy, đồng thời hỗ trợ người chạy duy trì tư thế và nhịp độ hiệu quả hơn.\r\n\r\nĐế giữa của giày kết hợp PureGEL™ technology và lớp đệm FF BLAST™ foam, mang lại cảm giác tiếp đất mềm mại và khả năng hấp thụ lực tốt. Nhờ đó, áp lực lên khớp và bàn chân được giảm đáng kể, giúp người chạy cảm thấy thoải mái hơn khi chạy trên các bề mặt cứng.\r\n\r\nBên cạnh đó, thiết kế tổng thể của giày tập trung vào sự cân bằng giữa hỗ trợ và độ êm, giúp bạn có thể chạy xa hơn mà vẫn giữ được cảm giác dễ chịu trong từng bước di chuyển', 0, 1),
(28, 'Asics Gel-Contend - Nam', 2, 1, 1100000, 6, 5, 14, 'Giày Asics Gel-Contend 9 được thiết kế để mang lại sự cân bằng giữa độ êm, khả năng hỗ trợ và độ bền, phù hợp cho chạy bộ, tập luyện thể thao hoặc sử dụng hằng ngày. Với cấu trúc ổn định cùng các công nghệ đệm đặc trưng của Asics, đôi giày giúp người dùng cảm nhận được sự thoải mái trong từng bước di chuyển.\r\n\r\nPhần thân giày sử dụng engineered mesh co giãn theo chuyển động tự nhiên của bàn chân, giúp ôm chân vừa vặn và tăng độ thoáng khí. Các đường khâu tổng hợp trên lớp overlay giúp tăng độ chắc chắn, hỗ trợ bàn chân ổn định hơn trong quá trình vận động.\r\n\r\nĐế giữa của giày kết hợp công nghệ GEL™ và lớp đệm AMPLIFOAM+, mang lại khả năng hấp thụ lực tốt và cảm giác êm ái khi tiếp đất. Sự kết hợp này giúp tăng độ bền cho đôi giày đồng thời tạo cảm giác mềm mại và thoải mái dưới bàn chân.', 0, 1),
(29, 'Asics Gel-Challenger - Nữ ', 1, 0, 1100000, 0, 5, 12, 'Giày Asics Gel-Challenger 15 được thiết kế để mang lại sự ổn định và cảm giác thoải mái tối đa cho người chơi tennis và pickleball. Với cấu trúc chắc chắn và khả năng hỗ trợ tốt trong các chuyển động ngang, đôi giày giúp bạn tự tin di chuyển và kiểm soát trận đấu hiệu quả hơn.\r\n\r\nPhần upper mềm mại nhưng vẫn đảm bảo độ nâng đỡ kết hợp cùng cổ giày dày hơn giúp ôm chân chắc chắn và tạo cảm giác êm ái khi thi đấu trong thời gian dài. Thiết kế này giúp bàn chân luôn ổn định khi bạn tăng tốc hoặc đổi hướng nhanh trên sân.\r\n\r\nCông nghệ WINGWALL™ được tích hợp ở phần hông đế giày giúp tăng độ vững chắc khi di chuyển ngang – một yếu tố quan trọng trong các pha bóng tốc độ cao. Nhờ đó, người chơi có thể bước vào cú đánh với sự tự tin và tạo ra lực đánh mạnh mẽ hơn.\r\n\r\nĐế ngoài thiết kế full-length outsole kết hợp rãnh tách (separated groove) giúp tăng diện tích tiếp xúc với mặt sân, mang lại cảm giác tiếp đất êm hơn và ổn định hơn trong mỗi bước di chuyển.', 0, 1),
(30, 'Asics GeL-Resolution X - Nữ', 1, 0, 1800000, 2, 5, 2, 'Giày Asics GEL-RESOLUTION X được thiết kế dành cho những người chơi thích kiểm soát trận đấu từ cuối sân, nơi đòi hỏi sự ổn định, độ bám và khả năng di chuyển ngang liên tục. Đây là mẫu giày lý tưởng cho cả tennis và pickleball, đặc biệt phù hợp với lối chơi thiên về phòng thủ – phản công và giữ nhịp độ cao trong suốt trận đấu.\r\n\r\nĐế giữa hai lớp giúp tăng độ ổn định khi tiếp đất, trong khi công nghệ DYNALACING™ được tối ưu để tăng độ ôm và độ bám bàn chân khi cần hỗ trợ thêm, giúp bạn tự tin thực hiện các pha bứt tốc và đổi hướng nhanh. Khi di chuyển ngang, công nghệ DYNAWALL™ kéo dài đến gót chân giúp giữ vững sự ổn định, hạn chế trượt và mất thăng bằng – yếu tố đặc biệt quan trọng trong pickleball và tennis hiện đại.\r\n\r\nThiết kế cổ giày cao hơn ở mặt trong giúp giảm nguy cơ lật cổ chân khi đổi hướng đột ngột, mang lại cảm giác an toàn và kiểm soát tốt hơn trong những pha bóng căng thẳng.', 0, 1),
(31, 'Clarks Tilden Plain - Nam', 4, 1, 1800000, 0, 6, 19, 'Giày Clarks Tilden Plain mang phong cách Derby cổ điển với đường nét tinh giản, bóng mịn và sang trọng. Được chế tác từ da thật cao cấp cùng độ hoàn thiện tỉ mỉ, đôi giày toát lên vẻ lịch lãm, chuyên nghiệp – phù hợp hoàn hảo cho môi trường công sở, các buổi gặp gỡ đối tác hay sự kiện trang trọng.\r\n\r\nBên trong giày, lớp đệm Cushion Soft™ kết hợp công nghệ OrthoLite® Hybrid™ mang đến cảm giác êm ái vượt trội, hỗ trợ giảm áp lực và tăng khả năng thoáng khí. Thiết kế này giúp bàn chân luôn dễ chịu, khô thoáng kể cả khi mang suốt ngày dài.\r\n\r\nPhần đế ngoài bằng cao su bền chắc, mang lại độ bám ổn định và độ đàn hồi cao, đảm bảo bước đi linh hoạt và tự tin trên nhiều bề mặt. Với sự kết hợp giữa thiết kế cổ điển và công nghệ hiện đại, Clarks Tilden Plain là lựa chọn hoàn hảo cho quý ông yêu thích sự tinh tế và thoải mái trong từng chi tiết.', 0, 1),
(32, 'Clarks Howard Walk - Nam', 4, 1, 2200000, 7, 6, 20, 'Giày Clarks Howard Walk là mẫu giày tây cổ điển đậm chất quý ông, mang đến phong cách trang trọng, lịch lãm và tinh tế trong mọi hoàn cảnh. Được chế tác từ da thật cao cấp, đôi giày mang lại vẻ ngoài sang trọng cùng độ bền vượt trội – hoàn hảo cho môi trường công sở, sự kiện quan trọng hay những buổi gặp gỡ đối tác.\r\n\r\nThiết kế lace-up buộc dây truyền thống đảm bảo sự vừa vặn và chỉn chu, trong khi phần chun ẩn tinh tế giúp dễ dàng điều chỉnh ôm chân thoải mái hơn. Lớp đệm Cushion Plus™ với foam tái chế 20% mang đến cảm giác êm ái, hấp thụ lực tốt và giảm áp lực lên bàn chân, giúp bạn luôn thoải mái kể cả khi di chuyển suốt ngày dài.\r\n\r\nPhần cổ giày có đệm (padded topline) bảo vệ mắt cá chân, hạn chế ma sát, tăng cảm giác êm nhẹ khi sử dụng. Đế ngoài bằng cao su TPR bền chắc và bám tốt, hỗ trợ bước đi vững vàng và linh hoạt trên nhiều bề mặt.', 0, 1),
(33, 'Clarks Tilden Walk - Nam ', 4, 1, 2000000, 6, 6, 20, 'Giày Clarks Tilden Walk là mẫu giày tây cổ điển với thiết kế mũi vuông tinh tế, mang đến phong thái lịch lãm và chuyên nghiệp cho phái mạnh. Được chế tác từ da thật cao cấp, đôi giày không chỉ bền đẹp mà còn dễ dàng kết hợp cùng vest, quần âu hay trang phục công sở, giúp quý ông tự tin trong mọi hoàn cảnh – từ những sự kiện trang trọng đến những ngày đi làm thường nhật.\r\n\r\nTrang bị Cushion Soft™ footbed kết hợp công nghệ OrthoLite® Hybrid™, giày mang đến sự êm ái vượt trội, hỗ trợ giảm áp lực và giữ cho bàn chân luôn thoải mái, thoáng khí cả ngày dài. Đế ngoài bằng cao su bền chắc với độ bám tốt, giúp bước đi vững vàng và linh hoạt trên nhiều bề mặt.\r\n\r\nVới sự kết hợp giữa thiết kế sang trọng, chất liệu cao cấp và công nghệ hiện đại, Clarks Tilden Walk chính là lựa chọn lý tưởng cho những ai tìm kiếm một đôi giày tây vừa đẹp mắt vừa thoải mái để sử dụng hàng ngày.', 0, 1),
(34, 'Puma Softride Enzo NXT - Nữ ', 2, 0, 1600000, 12, 2, 14, 'Giày Puma Softride Enzo NXT là sự kết hợp hoàn hảo giữa hiệu năng thể thao và phong cách thời trang hiện đại, kết tinh từ hai dòng nổi tiếng của Puma: Softride và Enzo. Thiết kế năng động cùng công nghệ đệm tiên tiến mang đến trải nghiệm êm ái vượt trội và cảm giác thoải mái suốt cả ngày, dù bạn tập luyện trong phòng gym hay di chuyển ngoài phố.\r\n\r\nPhần đế sử dụng công nghệ Softride EVA độc quyền giúp hấp thụ lực cực tốt, giảm áp lực lên bàn chân và đầu gối trong từng bước chạy. Thân giày được thiết kế hiện đại, ôm chân vừa vặn, với điểm nhấn là logo Puma nổi bật và form dáng thể thao mạnh mẽ giúp bạn tự tin thể hiện phong cách.\r\n\r\nKhông chỉ là một đôi giày chạy bộ, Puma Softride Enzo NXT còn là lựa chọn lý tưởng cho phong cách sống năng động – kết hợp hoàn hảo giữa sự êm ái, bền bỉ và gu thời trang thể thao cao cấp.', 0, 1),
(35, 'Puma Aviator ProFoam Sky - Nam', 2, 1, 1600000, 0, 2, 1, 'Puma Aviator ProFoam Sky là đôi giày chạy bộ siêu nhẹ, mang đến sự thoáng khí và độ êm vượt trội. Lấy cảm hứng từ dòng Magnify Nitro, sản phẩm sở hữu upper lưới kỹ thuật thoáng khí, đệm ProFoam Lite đàn hồi và đế cao su bền chắc, hỗ trợ bạn tự tin chinh phục từng km chạy.\r\n\r\nƯu điểm nổi bật:\r\nUpper lưới thoáng khí: Giữ bàn chân luôn mát mẻ khi vận động.\r\n\r\nĐệm ProFoam Lite siêu nhẹ: Tạo cảm giác đàn hồi và êm ái suốt quá trình chạy.\r\n\r\nĐế cao su bền bỉ: Bám tốt, tăng độ ổn định trên nhiều bề mặt.\r\n\r\nThiết kế gọn gàng, hiện đại: Dễ dàng kết hợp với outfit thể thao năng động.', 0, 1),
(36, 'Puma Electrify NITRO™ - Nam', 2, 1, 1200000, 2, 2, 1, 'Giày Puma Electrify NITRO™ 4 – Năng Lượng Bùng Nổ, Êm Ái Mỗi Bước Chạy\r\nPuma Electrify NITRO™ 4 được thiết kế để mang đến trải nghiệm chạy bộ nhẹ nhàng, linh hoạt và đầy sức bật. Nhờ sự kết hợp giữa công nghệ NITROFOAM™ và PROFOAMLITE, đôi giày giúp hấp thụ lực tối ưu, hoàn trả năng lượng mạnh mẽ và duy trì độ ổn định trên từng sải bước.\r\n\r\nƯu điểm nổi bật:\r\nNITROFOAM™ siêu nhẹ: Đệm chứa nitơ tiên tiến, mang lại cảm giác đàn hồi và bùng nổ khi chạy.\r\n\r\nPROFOAMLITE EVA: Tăng khả năng hấp thụ chấn động, hỗ trợ bước chuyển mượt mà và ổn định.\r\n\r\nUpper lưới thoáng khí: Giữ chân luôn mát mẻ, khô ráo ngay cả khi vận động cường độ cao.\r\n\r\nĐế ngoài PUMAGRIP cao su đặc biệt: Cung cấp độ bám vượt trội, phù hợp nhiều bề mặt.\r\n\r\nHướng đến bền vững: Sử dụng ít nhất 30% vật liệu tái chế trong cấu trúc giày.', 0, 1),
(37, 'Puma Softride Pro Echo Slip On - Nữ', 2, 0, 1200000, 4, 2, 2, 'Puma Softride Pro Echo Slip On là đôi giày thể thao lý tưởng cho phong cách sống năng động hằng ngày. Thiết kế mang tính tiện lợi với dáng slip-on không dây, kết hợp cùng công nghệ đệm SOFTRIDE độc quyền, giúp mỗi bước chân trở nên nhẹ nhàng và thoải mái hơn bao giờ hết.\r\n\r\nƯu điểm nổi bật:\r\nMidsole SOFTRIDE êm ái: Hấp thụ lực tối ưu, mang lại sự dễ chịu cả ngày dài.\r\n\r\nCổ giày đệm dày: Hỗ trợ cổ chân, giảm áp lực khi vận động.\r\n\r\nThiết kế slip-on tiện lợi: Mang vào và tháo ra nhanh chóng, phù hợp cho nhịp sống hiện đại.\r\n\r\nKiểu dáng thể thao hiện đại: Dễ dàng sử dụng khi đi bộ, chạy nhẹ, tập luyện hay đi chơi.\r\n\r\nĐế ngoài bền chắc: Tăng độ bám và độ bền trên nhiều bề mặt.', 0, 1);

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
(1, 4, 15),
(2, 1, 13),
(2, 4, 34),
(3, 1, 44),
(3, 2, 19),
(3, 3, 7),
(3, 4, 33),
(4, 1, 13),
(4, 2, 9),
(5, 1, 48),
(5, 2, 27),
(5, 3, 7),
(5, 4, 43),
(6, 1, 36),
(6, 2, 11),
(6, 3, 13),
(6, 4, 33),
(7, 1, 26),
(8, 1, 14),
(8, 2, 30),
(8, 3, 46),
(8, 4, 5),
(11, 2, 36),
(12, 1, 49),
(12, 2, 44),
(13, 1, 13),
(13, 2, 23),
(13, 3, 30),
(13, 4, 45),
(14, 1, 9),
(14, 4, 34),
(15, 1, 45),
(15, 2, 19),
(15, 3, 11),
(15, 4, 24),
(16, 1, 22),
(16, 2, 28),
(16, 4, 10),
(17, 1, 20),
(18, 1, 19),
(18, 2, 13),
(18, 3, 33),
(19, 1, 16),
(19, 4, 25),
(20, 1, 9),
(20, 2, 31),
(20, 3, 6),
(20, 4, 17),
(21, 1, 6),
(22, 2, 7),
(22, 3, 35),
(23, 2, 18),
(24, 3, 15),
(24, 4, 27),
(25, 2, 5),
(25, 3, 48),
(26, 2, 11),
(26, 3, 36),
(26, 4, 24),
(27, 1, 48),
(27, 2, 7),
(27, 3, 34),
(27, 4, 27),
(28, 1, 19),
(28, 2, 46),
(29, 4, 40),
(30, 1, 50),
(30, 2, 22),
(30, 3, 7),
(30, 4, 13),
(31, 1, 44),
(31, 2, 9),
(31, 4, 25),
(32, 2, 32),
(32, 4, 22),
(33, 1, 50),
(33, 2, 27),
(34, 1, 42),
(34, 2, 39),
(35, 1, 32),
(35, 4, 43),
(36, 2, 24),
(36, 4, 30),
(37, 1, 13),
(37, 4, 45);

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `masize` int(11) NOT NULL,
  `tensize` int(20) NOT NULL,
  `trangthai` int(1) NOT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`masize`, `tensize`, `trangthai`) VALUES
(1, 40, 1),
(2, 41, 1),
(3, 42, 1),
(4, 43, 1);

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
  MODIFY `mahang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `hinhanh`
--
ALTER TABLE `hinhanh`
  MODIFY `mahinhanh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `makh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `loai`
--
ALTER TABLE `loai`
  MODIFY `maloai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mau`
--
ALTER TABLE `mau`
  MODIFY `mamau` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `nhacungcap`
--
ALTER TABLE `nhacungcap`
  MODIFY `mancc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `phieunhap`
--
ALTER TABLE `phieunhap`
  MODIFY `mapn` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `masp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

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
