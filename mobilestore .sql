-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2019 at 03:34 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mobilestore`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `idBanner` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `url` varchar(200) DEFAULT NULL,
  `visible` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`idBanner`, `name`, `url`, `visible`) VALUES
(3, 'thangoppo.jpeg', 'static/image/banner/thangoppo.jpeg', 1),
(4, 'redminote8.png', 'static/image/banner/redminote8.png', 1),
(5, 'banner-20-11.png', 'static/image/banner/banner-20-11.png', 1),
(15, 'banner111.jpeg', 'static/image/banner/banner111.jpeg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `binhluan`
--

CREATE TABLE `binhluan` (
  `idBinhLuan` int(11) NOT NULL,
  `ngayTao` date DEFAULT '1990-01-01',
  `noiDung` varchar(100) DEFAULT NULL,
  `soSao` float UNSIGNED DEFAULT '0',
  `mobile_idMobile` int(10) UNSIGNED NOT NULL,
  `khachhang_idKhachHang` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `chitietmuahang`
--

CREATE TABLE `chitietmuahang` (
  `idChiTiet` int(11) NOT NULL,
  `soLuong` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `soLuongTraLai` int(10) UNSIGNED DEFAULT '0',
  `thanhTien` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `ghiChu` varchar(200) DEFAULT NULL,
  `donmuahang_idDonHang` int(11) NOT NULL,
  `mobile_idMobile` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chitietmuahang`
--

INSERT INTO `chitietmuahang` (`idChiTiet`, `soLuong`, `soLuongTraLai`, `thanhTien`, `ghiChu`, `donmuahang_idDonHang`, `mobile_idMobile`) VALUES
(6, 2, 0, 12980000, NULL, 13, 13),
(7, 3, 0, 63570000, NULL, 13, 11),
(8, 2, 0, 65980000, NULL, 14, 8),
(9, 1, 0, 21190000, NULL, 15, 11),
(10, 1, 0, 42990000, NULL, 16, 3),
(11, 1, 0, 36990000, NULL, 16, 4),
(12, 1, 0, 30490000, NULL, 16, 10),
(13, 2, 0, 12980000, NULL, 17, 13),
(14, 1, 0, 21190000, NULL, 18, 11),
(15, 1, 0, 36990000, NULL, 19, 4),
(16, 1, 0, 30490000, NULL, 20, 10),
(17, 1, 0, 6490000, NULL, 21, 13),
(18, 2, 0, 12980000, NULL, 22, 13),
(19, 1, 0, 42990000, NULL, 22, 3),
(20, 1, 0, 43990000, NULL, 23, 2),
(21, 1, 0, 39990000, NULL, 23, 6),
(22, 1, 0, 30490000, NULL, 23, 10),
(23, 1, 0, 16990000, NULL, 24, 12),
(24, 1, 0, 6490000, NULL, 24, 13),
(25, 2, 0, 73980000, NULL, 25, 4),
(26, 1, 0, 21190000, NULL, 26, 11);

-- --------------------------------------------------------

--
-- Table structure for table `donmuahang`
--

CREATE TABLE `donmuahang` (
  `idDonHang` int(11) NOT NULL,
  `ngayTao` datetime DEFAULT NULL,
  `ngayThanhToan` datetime DEFAULT NULL,
  `diaChiNhanHang` varchar(100) NOT NULL,
  `trangThaiDonHang` varchar(30) NOT NULL,
  `loaiDonHang` varchar(45) NOT NULL,
  `tongTien` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `biHuy` varchar(45) DEFAULT NULL,
  `ghiChu` varchar(200) DEFAULT NULL,
  `khachhang_idKhachHang` int(10) UNSIGNED NOT NULL,
  `nhanvien_idNhanVien` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `donmuahang`
--

INSERT INTO `donmuahang` (`idDonHang`, `ngayTao`, `ngayThanhToan`, `diaChiNhanHang`, `trangThaiDonHang`, `loaiDonHang`, `tongTien`, `biHuy`, `ghiChu`, `khachhang_idKhachHang`, `nhanvien_idNhanVien`) VALUES
(13, '2019-12-08 23:28:42', NULL, '112 Goc De, Minh Khai, Ha Noi', 'ch??a ph?? duy???t', 'xu???t h??ng', 76550000, '0', NULL, 35, NULL),
(14, '2019-12-08 23:38:06', NULL, 'Minh Khai, Hai B?? Tr??ng, H?? N???i', '???? ph?? duy???t', 'xu???t h??ng', 65980000, '0', NULL, 35, NULL),
(15, '2019-12-08 23:44:26', NULL, 'D??ng Ngh??a, V?? Th??, Th??i B??nh ', 'ch??a ph?? duy???t', 'xu???t h??ng', 21190000, '0', NULL, 35, NULL),
(16, '2019-12-08 23:49:50', NULL, 'C???ng k?? t??c x?? ?????i h???c B??ch Khoa H?? N???i', 'ch??a ph?? duy???t', 'xu???t h??ng', 110470000, '0', NULL, 38, NULL),
(17, '2019-12-08 23:58:30', NULL, '204 ???? La Th??nh, Th??? Quan, H?? N???i', '??ang giao h??ng', 'xu???t h??ng', 12980000, '0', NULL, 38, 34),
(18, '2019-12-09 00:00:00', NULL, '?????i h???c x??y d???ng H?? N???i ', '???? ph?? duy???t', 'xu???t h??ng', 21190000, '0', NULL, 38, NULL),
(19, '2019-12-09 00:02:46', '2019-12-26 01:10:18', 'C???u v?????t ?????i h???c Kinh T??? Qu???c D??n, H?? N???i ', '???? thanh to??n', 'xu???t h??ng', 36990000, '0', NULL, 38, 35),
(20, '2019-12-09 00:13:06', NULL, '112 ?????i C???n, V??nh Ph??c', '??ang giao h??ng', 'xu???t h??ng', 30490000, '0', NULL, 40, 35),
(21, '2019-12-26 04:28:57', NULL, '322 L?? Trong T???n, Ho??ng Mai, H?? N???i', '???? ph?? duy???t', 'xu???t h??ng', 6490000, '0', NULL, 42, NULL),
(22, '2019-12-26 13:07:34', NULL, '322 L?? Trong T???n, Ho??ng Mai, H?? N???i', 'ch??a ph?? duy???t', 'xu???t h??ng', 55970000, '0', NULL, 42, NULL),
(23, '2019-12-26 13:18:16', NULL, 'Thanh H??a', 'ch??a ph?? duy???t', 'xu???t h??ng', 114470000, '0', NULL, 45, NULL),
(24, '2019-12-26 13:19:07', NULL, '?????i h???c B??ch khoa H?? N???i', '???? ph?? duy???t', 'xu???t h??ng', 23480000, '0', NULL, 45, NULL),
(25, '2019-12-26 13:22:45', NULL, 'Nam Tr???c-Nam ?????nh', '??ang giao h??ng', 'xu???t h??ng', 73980000, '0', NULL, 46, 34),
(26, '2019-12-26 13:23:54', NULL, 'Nam ?????nh', 'ch??a ph?? duy???t', 'xu???t h??ng', 21190000, '0', NULL, 46, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `giohang`
--

CREATE TABLE `giohang` (
  `khachhang_idKhachHang` int(10) UNSIGNED NOT NULL,
  `ngaytao` date DEFAULT '1990-01-01',
  `soLuongSP` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `giohang`
--

INSERT INTO `giohang` (`khachhang_idKhachHang`, `ngaytao`, `soLuongSP`) VALUES
(35, '2019-12-07', 0),
(38, '2019-12-08', 0),
(39, '2019-12-08', 0),
(40, '2019-12-09', 0),
(41, '2019-12-15', 0),
(42, '2019-12-26', 0),
(45, '2019-12-26', 0),
(46, '2019-12-26', 0);

-- --------------------------------------------------------

--
-- Table structure for table `giohang_has_mobile`
--

CREATE TABLE `giohang_has_mobile` (
  `id` int(11) NOT NULL,
  `soLuong` int(10) UNSIGNED DEFAULT '0',
  `ngayThem` datetime NOT NULL DEFAULT '1990-01-01 00:00:00',
  `mobile_idMobile` int(10) UNSIGNED NOT NULL,
  `giohang_khachhang_idKhachHang` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `giohang_has_mobile`
--

INSERT INTO `giohang_has_mobile` (`id`, `soLuong`, `ngayThem`, `mobile_idMobile`, `giohang_khachhang_idKhachHang`) VALUES
(45, 3, '2019-12-08 12:00:17', 11, 39),
(48, 1, '2019-12-09 20:40:51', 13, 35),
(49, 1, '2019-12-15 15:44:35', 7, 35),
(50, 1, '2019-12-15 18:29:37', 10, 35),
(51, 1, '2019-12-15 18:39:55', 3, 41);

-- --------------------------------------------------------

--
-- Table structure for table `hinhanh`
--

CREATE TABLE `hinhanh` (
  `idHinhAnh` int(11) NOT NULL,
  `tenAnh` varchar(50) DEFAULT NULL,
  `url` varchar(300) NOT NULL,
  `moTa` varchar(100) DEFAULT NULL,
  `logo` int(11) DEFAULT '0',
  `Mobile_idMobile` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hinhanh`
--

INSERT INTO `hinhanh` (`idHinhAnh`, `tenAnh`, `url`, `moTa`, `logo`, `Mobile_idMobile`) VALUES
(4, 'iphone-11-pro-max-512gb-gold-600x600.jpg', 'static/image/mobile/iphone-11-pro-max-512gb-gold-600x600.jpg', '', 1, 1),
(5, 'iphone-11-pro-max-512gb-xam-1-1-org.jpg', 'static/image/mobile/iphone-11-pro-max-512gb-xam-1-1-org.jpg', '', 0, 1),
(6, 'iphone-11-pro-max-512gb-xam-4-1-org.jpg', 'static/image/mobile/iphone-11-pro-max-512gb-xam-4-1-org.jpg', '', 0, 1),
(7, 'iphone-11-pro-max-512gb-xam-5-org.jpg', 'static/image/mobile/iphone-11-pro-max-512gb-xam-5-org.jpg', '', 0, 1),
(8, 'iphone-11-pro-max-512gb-xam-12-org.jpg', 'static/image/mobile/iphone-11-pro-max-512gb-xam-12-org.jpg', '', 0, 1),
(14, 'iphone-11-pro-max-512gb-gold-600x600.jpg', 'static/image/mobile/iphone-11-pro-max-512gb-gold-600x600.jpg', '', 1, 2),
(15, 'iphone-11-pro-max-512gb-xam-1-1-org.jpg', 'static/image/mobile/iphone-11-pro-max-512gb-xam-1-1-org.jpg', '', 0, 2),
(16, 'iphone-11-pro-max-512gb-xam-4-1-org.jpg', 'static/image/mobile/iphone-11-pro-max-512gb-xam-4-1-org.jpg', '', 0, 2),
(17, 'iphone-11-pro-max-512gb-xam-5-org.jpg', 'static/image/mobile/iphone-11-pro-max-512gb-xam-5-org.jpg', '', 0, 2),
(18, 'iphone-11-pro-max-512gb-xam-12-org.jpg', 'static/image/mobile/iphone-11-pro-max-512gb-xam-12-org.jpg', '', 0, 2),
(19, 'iphone-11-pro-max-512gb-gold-600x600.jpg', 'static/image/mobile/iphone-11-pro-max-512gb-gold-600x600.jpg', '', 1, 3),
(20, 'iphone-11-pro-max-512gb-xam-1-1-org.jpg', 'static/image/mobile/iphone-11-pro-max-512gb-xam-1-1-org.jpg', '', 0, 3),
(21, 'iphone-11-pro-max-512gb-xam-4-1-org.jpg', 'static/image/mobile/iphone-11-pro-max-512gb-xam-4-1-org.jpg', '', 0, 3),
(22, 'iphone-11-pro-max-512gb-xam-5-org.jpg', 'static/image/mobile/iphone-11-pro-max-512gb-xam-5-org.jpg', '', 0, 3),
(23, 'iphone-11-pro-max-512gb-xam-12-org.jpg', 'static/image/mobile/iphone-11-pro-max-512gb-xam-12-org.jpg', '', 0, 3),
(24, 'iphone-11-pro-max-256gb-green-600x600.jpg', 'static/image/mobile/iphone-11-pro-max-256gb-green-600x600.jpg', '', 1, 4),
(25, 'iphone-11-pro-max-256gb-xam-1-1-org.jpg', 'static/image/mobile/iphone-11-pro-max-256gb-xam-1-1-org.jpg', '', 0, 4),
(26, 'iphone-11-pro-max-256gb-xam-4-1-org.jpg', 'static/image/mobile/iphone-11-pro-max-256gb-xam-4-1-org.jpg', '', 0, 4),
(27, 'iphone-11-pro-max-256gb-xam-5-org.jpg', 'static/image/mobile/iphone-11-pro-max-256gb-xam-5-org.jpg', '', 0, 4),
(28, 'iphone-11-pro-max-256gb-xam-11-org.jpg', 'static/image/mobile/iphone-11-pro-max-256gb-xam-11-org.jpg', '', 0, 4),
(29, 'iphone-11-pro-max-256gb-green-600x600.jpg', 'static/image/mobile/iphone-11-pro-max-256gb-green-600x600.jpg', '', 1, 5),
(30, 'iphone-11-pro-max-256gb-xam-1-1-org.jpg', 'static/image/mobile/iphone-11-pro-max-256gb-xam-1-1-org.jpg', '', 0, 5),
(31, 'iphone-11-pro-max-256gb-xam-4-1-org.jpg', 'static/image/mobile/iphone-11-pro-max-256gb-xam-4-1-org.jpg', '', 0, 5),
(32, 'iphone-11-pro-max-256gb-xam-5-org.jpg', 'static/image/mobile/iphone-11-pro-max-256gb-xam-5-org.jpg', '', 0, 5),
(33, 'iphone-11-pro-max-256gb-xam-11-org.jpg', 'static/image/mobile/iphone-11-pro-max-256gb-xam-11-org.jpg', '', 0, 5),
(34, 'iphone-11-pro-max-256gb-green-600x600.jpg', 'static/image/mobile/iphone-11-pro-max-256gb-green-600x600.jpg', '', 1, 6),
(35, 'iphone-11-pro-max-256gb-xam-1-1-org.jpg', 'static/image/mobile/iphone-11-pro-max-256gb-xam-1-1-org.jpg', '', 0, 6),
(36, 'iphone-11-pro-max-256gb-xam-4-1-org.jpg', 'static/image/mobile/iphone-11-pro-max-256gb-xam-4-1-org.jpg', '', 0, 6),
(37, 'iphone-11-pro-max-256gb-xam-5-org.jpg', 'static/image/mobile/iphone-11-pro-max-256gb-xam-5-org.jpg', '', 0, 6),
(38, 'iphone-11-pro-max-256gb-xam-11-org.jpg', 'static/image/mobile/iphone-11-pro-max-256gb-xam-11-org.jpg', '', 0, 6),
(39, 'iphone-11-pro-max-green-600x600.jpg', 'static/image/mobile/iphone-11-pro-max-green-600x600.jpg', '', 1, 7),
(40, 'iphone-11-pro-max-xam-1-1-org.jpg', 'static/image/mobile/iphone-11-pro-max-xam-1-1-org.jpg', '', 0, 7),
(41, 'iphone-11-pro-max-xam-4-1-org.jpg', 'static/image/mobile/iphone-11-pro-max-xam-4-1-org.jpg', '', 0, 7),
(42, 'iphone-11-pro-max-xam-6-org.jpg', 'static/image/mobile/iphone-11-pro-max-xam-6-org.jpg', '', 0, 7),
(43, 'iphone-11-pro-max-xam-11-org.jpg', 'static/image/mobile/iphone-11-pro-max-xam-11-org.jpg', '', 0, 7),
(44, 'iphone-11-pro-max-green-600x600.jpg', 'static/image/mobile/iphone-11-pro-max-green-600x600.jpg', '', 1, 8),
(45, 'iphone-11-pro-max-xam-1-1-org.jpg', 'static/image/mobile/iphone-11-pro-max-xam-1-1-org.jpg', '', 0, 8),
(46, 'iphone-11-pro-max-xam-4-1-org.jpg', 'static/image/mobile/iphone-11-pro-max-xam-4-1-org.jpg', '', 0, 8),
(47, 'iphone-11-pro-max-xam-8-org.jpg', 'static/image/mobile/iphone-11-pro-max-xam-8-org.jpg', '', 0, 8),
(48, 'iphone-11-pro-max-xam-11-org.jpg', 'static/image/mobile/iphone-11-pro-max-xam-11-org.jpg', '', 0, 8),
(49, 'iphone-11-pro-max-green-600x600.jpg', 'static/image/mobile/iphone-11-pro-max-green-600x600.jpg', '', 1, 9),
(50, 'iphone-11-pro-max-xam-1-1-org.jpg', 'static/image/mobile/iphone-11-pro-max-xam-1-1-org.jpg', '', 0, 9),
(51, 'iphone-11-pro-max-xam-4-1-org.jpg', 'static/image/mobile/iphone-11-pro-max-xam-4-1-org.jpg', '', 0, 9),
(52, 'iphone-11-pro-max-xam-8-org.jpg', 'static/image/mobile/iphone-11-pro-max-xam-8-org.jpg', '', 0, 9),
(53, 'iphone-11-pro-max-xam-11-org.jpg', 'static/image/mobile/iphone-11-pro-max-xam-11-org.jpg', '', 0, 9),
(54, 'iphone-xs-max-256gb.jpg', 'static/image/mobile/iphone-xs-max-256gb.jpg', '', 1, 10),
(55, 'iphone-xs-max-256gb-mau-bac-1-1-org.jpg', 'static/image/mobile/iphone-xs-max-256gb-mau-bac-1-1-org.jpg', '', 0, 10),
(56, 'iphone-xs-max-256gb-mau-bac-4-org.jpg', 'static/image/mobile/iphone-xs-max-256gb-mau-bac-4-org.jpg', '', 0, 10),
(57, 'iphone-xs-max-256gb-mau-bac-9-org.jpg', 'static/image/mobile/iphone-xs-max-256gb-mau-bac-9-org.jpg', '', 0, 10),
(58, 'iphone-xs-max-256gb-mau-bac-10-org.jpg', 'static/image/mobile/iphone-xs-max-256gb-mau-bac-10-org.jpg', '', 0, 10),
(59, 'sieu-pham-galaxy-s-moi-2-512gb-black-600x600.jpg', 'static/image/mobile/sieu-pham-galaxy-s-moi-2-512gb-black-600x600.jpg', '', 1, 11),
(60, 'samsung-galaxy-s10-plus-512gb-den-1-1-org.jpg', 'static/image/mobile/samsung-galaxy-s10-plus-512gb-den-1-1-org.jpg', '', 0, 11),
(61, 'samsung-galaxy-s10-plus-512gb-den-4-org.jpg', 'static/image/mobile/samsung-galaxy-s10-plus-512gb-den-4-org.jpg', '', 0, 11),
(62, 'samsung-galaxy-s10-plus-512gb-den-10-org.jpg', 'static/image/mobile/samsung-galaxy-s10-plus-512gb-den-10-org.jpg', '', 0, 11),
(63, 'samsung-galaxy-s10-plus-512gb-den-12-org.jpg', 'static/image/mobile/samsung-galaxy-s10-plus-512gb-den-12-org.jpg', '', 0, 11),
(64, 'oppo-reno-10x-zoom-edition.jpg', 'static/image/mobile/oppo-reno-10x-zoom-edition.jpg', '', 1, 12),
(65, 'oppo-reno-10x-zoom-edition-den-1-org.jpg', 'static/image/mobile/oppo-reno-10x-zoom-edition-den-1-org.jpg', '', 0, 12),
(66, 'oppo-reno-10x-zoom-edition-den-4-org.jpg', 'static/image/mobile/oppo-reno-10x-zoom-edition-den-4-org.jpg', '', 0, 12),
(67, 'oppo-reno-10x-zoom-edition-den-13-org.jpg', 'static/image/mobile/oppo-reno-10x-zoom-edition-den-13-org.jpg', '', 0, 12),
(68, 'oppo-reno-10x-zoom-edition-den-11-org.jpg', 'static/image/mobile/oppo-reno-10x-zoom-edition-den-11-org.jpg', '', 0, 12),
(69, 'xiaomi-mi-9-se.jpg', 'static/image/mobile/xiaomi-mi-9-se.jpg', '', 1, 13),
(70, 'xiaomi-mi-9-se-xanh-1-org.jpg', 'static/image/mobile/xiaomi-mi-9-se-xanh-1-org.jpg', '', 0, 13),
(71, 'xiaomi-mi-9-se-xanh-4-org.jpg', 'static/image/mobile/xiaomi-mi-9-se-xanh-4-org.jpg', '', 0, 13),
(72, 'xiaomi-mi-9-se-xanh-9-org.jpg', 'static/image/mobile/xiaomi-mi-9-se-xanh-9-org.jpg', '', 0, 13),
(73, 'xiaomi-mi-9-se-xanh-11-org.jpg', 'static/image/mobile/xiaomi-mi-9-se-xanh-11-org.jpg', '', 0, 13),
(84, 'oppo-a5-2020-128gb-black-600x600.jpg', 'static/image/mobile/OPPOA5(2020)128GB/oppo-a5-2020-128gb-black-600x600.jpg', NULL, 1, 16),
(85, 'oppo-a5-2020-128gb-den-1-org.jpg', 'static/image/mobile/OPPOA5(2020)128GB/oppo-a5-2020-128gb-den-1-org.jpg', NULL, 0, 16),
(86, 'oppo-a5-2020-128gb-den-4-org.jpg', 'static/image/mobile/OPPOA5(2020)128GB/oppo-a5-2020-128gb-den-4-org.jpg', NULL, 0, 16),
(87, 'oppo-a5-2020-128gb-den-5-org.jpg', 'static/image/mobile/OPPOA5(2020)128GB/oppo-a5-2020-128gb-den-5-org.jpg', NULL, 0, 16),
(88, 'oppo-a5-2020-128gb-den-12-org.jpg', 'static/image/mobile/OPPOA5(2020)128GB/oppo-a5-2020-128gb-den-12-org.jpg', NULL, 0, 16),
(89, 'anh-chinh-Oppo-Reno2-Z-1-600x600.png', 'static/image/mobile/OPPOReno2/anh-chinh-Oppo-Reno2-Z-1-600x600.png', NULL, 1, 17),
(90, 'anh-phu2_2oppo-reno2.jpg', 'static/image/mobile/OPPOReno2/anh-phu2_2oppo-reno2.jpg', NULL, 0, 17),
(91, 'anh-phu4_1oppo-reno2.jpg', 'static/image/mobile/OPPOReno2/anh-phu4_1oppo-reno2.jpg', NULL, 0, 17),
(92, 'anh-phu3_oppo-reno-2.jpg', 'static/image/mobile/OPPOReno2/anh-phu3_oppo-reno-2.jpg', NULL, 0, 17),
(93, 'rsz_1anh_phu_1-_oppo-_reno2.jpg', 'static/image/mobile/OPPOReno2/rsz_1anh_phu_1-_oppo-_reno2.jpg', NULL, 0, 17),
(94, 'anh-chinh-oppo-a9.png', 'static/image/mobile/OppoA92020/anh-chinh-oppo-a9.png', NULL, 1, 18),
(95, 'oppo-a9-tim-1-org_4ddf578a63564969a3fd4c52cb18e9ec', 'static/image/mobile/OppoA92020/oppo-a9-tim-1-org_4ddf578a63564969a3fd4c52cb18e9ec_master.jpg', NULL, 0, 18),
(96, 'oppo-a9-tim-5-org_6ec846dd6ba4467982bc46e455598fb8', 'static/image/mobile/OppoA92020/oppo-a9-tim-5-org_6ec846dd6ba4467982bc46e455598fb8_master.jpg', NULL, 0, 18),
(97, 'oppo-a9-tim-8-org_d3dd9133a8da41b487f614258b58968a', 'static/image/mobile/OppoA92020/oppo-a9-tim-8-org_d3dd9133a8da41b487f614258b58968a_master.jpg', NULL, 0, 18),
(98, 'oppo-a9-xanh-la-10-org_dad8404d37444f9cb140da1bdcb', 'static/image/mobile/OppoA92020/oppo-a9-xanh-la-10-org_dad8404d37444f9cb140da1bdcb16843_master.jpg', NULL, 0, 18),
(99, 'anh-chinh-samsung-galaxy-a50-black-600x600.jpg', 'static/image/mobile/SamsungGalaxyA50S/anh-chinh-samsung-galaxy-a50-black-600x600.jpg', NULL, 1, 19),
(100, 'samsung-galaxy-a50s-xanh-5-org_9e2e0114922c42839ae', 'static/image/mobile/SamsungGalaxyA50S/samsung-galaxy-a50s-xanh-5-org_9e2e0114922c42839aea6ee63af6a2af_master.jpg', NULL, 0, 19),
(101, 'samsung-galaxy-a50s-xanh-6-org_ef5476cb316b40acbe0', 'static/image/mobile/SamsungGalaxyA50S/samsung-galaxy-a50s-xanh-6-org_ef5476cb316b40acbe0e6ef9b7b87981_master.jpg', NULL, 0, 19),
(102, 'samsung-galaxy-a50s-xanh-8-org_9c15fd09d88d454687f', 'static/image/mobile/SamsungGalaxyA50S/samsung-galaxy-a50s-xanh-8-org_9c15fd09d88d454687f58fc48a84a028_master.jpg', NULL, 0, 19),
(103, 'samsung-galaxy-a50s-xanh-9-org_0eee9b99156748d28ee', 'static/image/mobile/SamsungGalaxyA50S/samsung-galaxy-a50s-xanh-9-org_0eee9b99156748d28eef76ec1fd63460_master.jpg', NULL, 0, 19),
(104, 'anh-chinh-samsung-galaxy-note-10-plus-bac-1.jpg', 'static/image/mobile/SamsungGalaxyNote10+/anh-chinh-samsung-galaxy-note-10-plus-bac-1.jpg', NULL, 1, 20),
(105, 'samsung-galaxy-note-10-plus-bac-4-org_099f1a4ef854', 'static/image/mobile/SamsungGalaxyNote10+/samsung-galaxy-note-10-plus-bac-4-org_099f1a4ef854418d89619bb9d8ddcd46_master.jpg', NULL, 0, 20),
(106, 'samsung-galaxy-note-10-plus-bac-12-org_cec8b656ad5', 'static/image/mobile/SamsungGalaxyNote10+/samsung-galaxy-note-10-plus-bac-12-org_cec8b656ad5546ab9512d8008b07c0b0_master.jpg', NULL, 0, 20),
(107, 'samsung-galaxy-note-10-plus-den-5-org_51be61b35f0d', 'static/image/mobile/SamsungGalaxyNote10+/samsung-galaxy-note-10-plus-den-5-org_51be61b35f0d4a49b58f3e52c3af3196_master.jpg', NULL, 0, 20),
(108, 'samsung-galaxy-note-10-plus-den-10-org_50dfc0ff5a0', 'static/image/mobile/SamsungGalaxyNote10+/samsung-galaxy-note-10-plus-den-10-org_50dfc0ff5a0e4bcb94988a2b60f6b37f_master.jpg', NULL, 0, 20),
(109, 'anh-chinh-samsung-galaxy-a20-red-600x600.jpg', 'static/image/mobile/SamsungGalaxyA20/anh-chinh-samsung-galaxy-a20-red-600x600.jpg', NULL, 1, 21),
(110, 'samsung_galaxy_a20_den_4_org_a25d95a88b93466e9cf90', 'static/image/mobile/SamsungGalaxyA20/samsung_galaxy_a20_den_4_org_a25d95a88b93466e9cf906c313116431_master.jpg', NULL, 0, 21),
(111, 'samsung_galaxy_a20_den_8_org_6f15d567ad6b4e458080d', 'static/image/mobile/SamsungGalaxyA20/samsung_galaxy_a20_den_8_org_6f15d567ad6b4e458080d554cc078693_master.jpg', NULL, 0, 21),
(112, 'samsung_galaxy_a20_den_9_org_93cccec2b7344a8d9d06d', 'static/image/mobile/SamsungGalaxyA20/samsung_galaxy_a20_den_9_org_93cccec2b7344a8d9d06d0484d38c617_master.jpg', NULL, 0, 21),
(113, 'samsung_galaxy_a20_den_10_org_2f59771612aa4056bbf6', 'static/image/mobile/SamsungGalaxyA20/samsung_galaxy_a20_den_10_org_2f59771612aa4056bbf6f167c8be5300_master.jpg', NULL, 0, 21),
(139, 'anh-chinh-samsung-galaxy-a80-gold-600x600.jpg', 'static/image/mobile/SamsungGalaxyA80/anh-chinh-samsung-galaxy-a80-gold-600x600.jpg', NULL, 1, 23),
(140, 'samsung-galaxy-a80-vang-hong-6-org_4d31a021dd1c42f', 'static/image/mobile/SamsungGalaxyA80/samsung-galaxy-a80-vang-hong-6-org_4d31a021dd1c42f9af3164df5b29a3f0_master.jpg', NULL, 0, 23),
(141, 'samsung-galaxy-a80-vang-hong-8-org_8af89a3681eb45a', 'static/image/mobile/SamsungGalaxyA80/samsung-galaxy-a80-vang-hong-8-org_8af89a3681eb45a9bf4c34dc766c9ddb_master.jpg', NULL, 0, 23),
(142, 'samsung-galaxy-a80-vang-hong-9-org_b404cd6d9963415', 'static/image/mobile/SamsungGalaxyA80/samsung-galaxy-a80-vang-hong-9-org_b404cd6d9963415e920d1e50329f2755_master.jpg', NULL, 0, 23),
(143, 'samsung-galaxy-a80-vang-hong-13-org_a417a105ee5941', 'static/image/mobile/SamsungGalaxyA80/samsung-galaxy-a80-vang-hong-13-org_a417a105ee5941dfbabf71ba7b99a5ba_master.jpg', NULL, 0, 23),
(144, 'anh-chinh-samsung-note8-den.png', 'static/image/mobile/SamsungGalaxyNote8/anh-chinh-samsung-note8-den.png', NULL, 1, 24),
(145, 'samsung-galaxy-note8-den-4-1-org_master.jpg', 'static/image/mobile/SamsungGalaxyNote8/samsung-galaxy-note8-den-4-1-org_master.jpg', NULL, 0, 24),
(146, 'samsung-galaxy-note8-den-6-1-org_master.jpg', 'static/image/mobile/SamsungGalaxyNote8/samsung-galaxy-note8-den-6-1-org_master.jpg', NULL, 0, 24),
(147, 'samsung-galaxy-note8-den-7-1-org_master.jpg', 'static/image/mobile/SamsungGalaxyNote8/samsung-galaxy-note8-den-7-1-org_master.jpg', NULL, 0, 24),
(148, 'samsung-galaxy-note8-den-8-1-org_master.jpg', 'static/image/mobile/SamsungGalaxyNote8/samsung-galaxy-note8-den-8-1-org_master.jpg', NULL, 0, 24),
(149, 'anhchinh7psilver_2.jpg', 'static/image/mobile/Iphone7plus32GB/anhchinh7psilver_2.jpg', NULL, 1, 25),
(150, 'iphone-7-plus-bac1-2-1-org_master.jpg', 'static/image/mobile/Iphone7plus32GB/iphone-7-plus-bac1-2-1-org_master.jpg', NULL, 0, 25),
(151, 'iphone-7-plus-bac1-3-1-org_master.jpg', 'static/image/mobile/Iphone7plus32GB/iphone-7-plus-bac1-3-1-org_master.jpg', NULL, 0, 25),
(152, 'iphone-7-plus-bac1-7-1-org_master.jpg', 'static/image/mobile/Iphone7plus32GB/iphone-7-plus-bac1-7-1-org_master.jpg', NULL, 0, 25),
(153, 'iphone-7-plus-bac1-8-1-org_master.jpg', 'static/image/mobile/Iphone7plus32GB/iphone-7-plus-bac1-8-1-org_master.jpg', NULL, 0, 25),
(154, 'anh-chinh-huawei-p30-lite-1-600x600.jpg', 'static/image/mobile/HuaweiP30Lite/anh-chinh-huawei-p30-lite-1-600x600.jpg', NULL, 1, 26),
(155, 'huawei_p30_lite_xanh_duong_5_org_0de79c9e37964c7bb', 'static/image/mobile/HuaweiP30Lite/huawei_p30_lite_xanh_duong_5_org_0de79c9e37964c7bb88b94b1c85e2cd2_master.jpg', NULL, 0, 26),
(156, 'huawei_p30_lite_xanh_duong_7_org_a92d252fd5454c3c8', 'static/image/mobile/HuaweiP30Lite/huawei_p30_lite_xanh_duong_7_org_a92d252fd5454c3c8f05588d0b5363b9_master.jpg', NULL, 0, 26),
(157, 'huawei_p30_lite_xanh_duong_8_org_22bc4e4c45734f1d8', 'static/image/mobile/HuaweiP30Lite/huawei_p30_lite_xanh_duong_8_org_22bc4e4c45734f1d809925fff1808efe_master.jpg', NULL, 0, 26),
(158, 'huawei_p30_lite_xanh_duong_10_org_e91f012b3db84b0e', 'static/image/mobile/HuaweiP30Lite/huawei_p30_lite_xanh_duong_10_org_e91f012b3db84b0e8fea9562ad490e36_master.jpg', NULL, 0, 26),
(159, 'anh-chinh-huawei-y9-2019-1-600x600.jpg', 'static/image/mobile/HuaweiY92019/anh-chinh-huawei-y9-2019-1-600x600.jpg', NULL, 1, 27),
(160, 'huawei-y9-2019-den-7-org_master.jpg', 'static/image/mobile/HuaweiY92019/huawei-y9-2019-den-7-org_master.jpg', NULL, 0, 27),
(161, 'huawei-y9-2019-den-8-org_master.jpg', 'static/image/mobile/HuaweiY92019/huawei-y9-2019-den-8-org_master.jpg', NULL, 0, 27),
(162, 'huawei-y9-2019-den-10-org_master.jpg', 'static/image/mobile/HuaweiY92019/huawei-y9-2019-den-10-org_master.jpg', NULL, 0, 27),
(163, 'huawei-y9-2019-den-11-org_master.jpg', 'static/image/mobile/HuaweiY92019/huawei-y9-2019-den-11-org_master.jpg', NULL, 0, 27),
(164, 'hinh-chinh-huawei-y7-pro-2019-1-600x600.jpg', 'static/image/mobile/HuaweiY7Pro2019/hinh-chinh-huawei-y7-pro-2019-1-600x600.jpg', NULL, 1, 28),
(165, 'huawei-y7-pro-2019-xanh-duong-6-org_master.jpg', 'static/image/mobile/HuaweiY7Pro2019/huawei-y7-pro-2019-xanh-duong-6-org_master.jpg', NULL, 0, 28),
(166, 'huawei-y7-pro-2019-xanh-duong-7-org_master.jpg', 'static/image/mobile/HuaweiY7Pro2019/huawei-y7-pro-2019-xanh-duong-7-org_master.jpg', NULL, 0, 28),
(167, 'huawei-y7-pro-2019-xanh-duong-8-org_master.jpg', 'static/image/mobile/HuaweiY7Pro2019/huawei-y7-pro-2019-xanh-duong-8-org_master.jpg', NULL, 0, 28),
(168, 'huawei-y7-pro-2019-xanh-duong-9-org_master.jpg', 'static/image/mobile/HuaweiY7Pro2019/huawei-y7-pro-2019-xanh-duong-9-org_master.jpg', NULL, 0, 28),
(169, 'hinh-chinh-vivo-1610-y55s-hh-600x600.jpg', 'static/image/mobile/VivoY55S/hinh-chinh-vivo-1610-y55s-hh-600x600.jpg', NULL, 1, 29),
(170, 'vivo-y55s-vangdong-4-org_master.jpg', 'static/image/mobile/VivoY55S/vivo-y55s-vangdong-4-org_master.jpg', NULL, 0, 29),
(171, 'vivo-y55s-vangdong-5-org_master.jpg', 'static/image/mobile/VivoY55S/vivo-y55s-vangdong-5-org_master.jpg', NULL, 0, 29),
(172, 'vivo-y55s-vangdong-7-org_master.jpg', 'static/image/mobile/VivoY55S/vivo-y55s-vangdong-7-org_master.jpg', NULL, 0, 29),
(173, 'vivo-y55s-vangdong-8-org_master.jpg', 'static/image/mobile/VivoY55S/vivo-y55s-vangdong-8-org_master.jpg', NULL, 0, 29),
(174, 'hinh-chinh-vivo-y69-hh-600x600.jpg', 'static/image/mobile/VivoY69/hinh-chinh-vivo-y69-hh-600x600.jpg', NULL, 1, 30),
(175, 'vivo-y69-vangdong-4-1-org_master.jpg', 'static/image/mobile/VivoY69/vivo-y69-vangdong-4-1-org_master.jpg', NULL, 0, 30),
(176, 'vivo-y69-vangdong-5-1-org_master.jpg', 'static/image/mobile/VivoY69/vivo-y69-vangdong-5-1-org_master.jpg', NULL, 0, 30),
(177, 'vivo-y69-vangdong-6-1-org_master.jpg', 'static/image/mobile/VivoY69/vivo-y69-vangdong-6-1-org_master.jpg', NULL, 0, 30),
(178, 'vivo-y69-vangdong-7-1-org_master.jpg', 'static/image/mobile/VivoY69/vivo-y69-vangdong-7-1-org_master.jpg', NULL, 0, 30),
(179, 'hinh-chinh-P_setting_fff_1_90_end_600.jpg', 'static/image/mobile/AsusZenfone4MaxPro/hinh-chinh-P_setting_fff_1_90_end_600.jpg', NULL, 1, 31),
(180, 'asus-zenfone-4-max-pro-zc554kl-vangdong-4-1-org_ma', 'static/image/mobile/AsusZenfone4MaxPro/asus-zenfone-4-max-pro-zc554kl-vangdong-4-1-org_master.jpg', NULL, 0, 31),
(181, 'asus-zenfone-4-max-pro-zc554kl-vangdong-6-1-org_ma', 'static/image/mobile/AsusZenfone4MaxPro/asus-zenfone-4-max-pro-zc554kl-vangdong-6-1-org_master.jpg', NULL, 0, 31),
(182, 'asus-zenfone-4-max-pro-zc554kl-vangdong-7-1-org_ma', 'static/image/mobile/AsusZenfone4MaxPro/asus-zenfone-4-max-pro-zc554kl-vangdong-7-1-org_master.jpg', NULL, 0, 31),
(183, 'asus-zenfone-4-max-pro-zc554kl-vangdong-8-1-org_ma', 'static/image/mobile/AsusZenfone4MaxPro/asus-zenfone-4-max-pro-zc554kl-vangdong-8-1-org_master.jpg', NULL, 0, 31),
(184, 'hinh-chinh-2710-p2-1536114690.jpg', 'static/image/mobile/Nokia6.1Plus/hinh-chinh-2710-p2-1536114690.jpg', NULL, 1, 32),
(185, 'nokia-23-xanh-la-6-org.jpg', 'static/image/mobile/Nokia6.1Plus/nokia-23-xanh-la-6-org.jpg', NULL, 0, 32),
(186, 'nokia-23-xanh-la-8-org.jpg', 'static/image/mobile/Nokia6.1Plus/nokia-23-xanh-la-8-org.jpg', NULL, 0, 32),
(187, 'nokia-23-xanh-la-10-org.jpg', 'static/image/mobile/Nokia6.1Plus/nokia-23-xanh-la-10-org.jpg', NULL, 0, 32),
(188, 'nokia-23-xanh-la-11-org.jpg', 'static/image/mobile/Nokia6.1Plus/nokia-23-xanh-la-11-org.jpg', NULL, 0, 32),
(189, 'hinh-chinh-op-lung-nokia-8.1-chong-soc-likgus-armo', 'static/image/mobile/Nokia8.1/hinh-chinh-op-lung-nokia-8.1-chong-soc-likgus-armor-6.jpg', NULL, 1, 33),
(190, 'hinh-phu1-nokia-81-xanh-duong-1-org.jpg', 'static/image/mobile/Nokia8.1/hinh-phu1-nokia-81-xanh-duong-1-org.jpg', NULL, 0, 33),
(191, 'hinh-phu2-nokia-81-xanh-duong-9-org.jpg', 'static/image/mobile/Nokia8.1/hinh-phu2-nokia-81-xanh-duong-9-org.jpg', NULL, 0, 33),
(192, 'hinh-phu3-nokia-81-xanh-duong-8-org.jpg', 'static/image/mobile/Nokia8.1/hinh-phu3-nokia-81-xanh-duong-8-org.jpg', NULL, 0, 33),
(193, 'hinh-phu4-nokia-81-xanh-duong-7-org.jpg', 'static/image/mobile/Nokia8.1/hinh-phu4-nokia-81-xanh-duong-7-org.jpg', NULL, 0, 33),
(194, 'v17-pro-5_600x600.jpg', 'static/image/mobile/VivoV17Pro/v17-pro-5_600x600.jpg', NULL, 1, 34),
(195, 'vivo-v17-pro-trang-4-org.jpg', 'static/image/mobile/VivoV17Pro/vivo-v17-pro-trang-4-org.jpg', NULL, 0, 34),
(196, 'vivo-v17-pro-trang-5-org.jpg', 'static/image/mobile/VivoV17Pro/vivo-v17-pro-trang-5-org.jpg', NULL, 0, 34),
(197, 'vivo-v17-pro-trang-7-org.jpg', 'static/image/mobile/VivoV17Pro/vivo-v17-pro-trang-7-org.jpg', NULL, 0, 34),
(198, 'vivo-v17-pro-trang-8-org.jpg', 'static/image/mobile/VivoV17Pro/vivo-v17-pro-trang-8-org.jpg', NULL, 0, 34),
(199, 'vivo-y91-black-600x600.jpg', 'static/image/mobile/VivoY91C/vivo-y91-black-600x600.jpg', NULL, 1, 35),
(200, 'vivo-y91c-den-4-org.jpg', 'static/image/mobile/VivoY91C/vivo-y91c-den-4-org.jpg', NULL, 0, 35),
(201, 'vivo-y91c-den-5-org.jpg', 'static/image/mobile/VivoY91C/vivo-y91c-den-5-org.jpg', NULL, 0, 35),
(202, 'vivo-y91c-den-9-org.jpg', 'static/image/mobile/VivoY91C/vivo-y91c-den-9-org.jpg', NULL, 0, 35),
(203, 'vivo-y91c-den-10-org.jpg', 'static/image/mobile/VivoY91C/vivo-y91c-den-10-org.jpg', NULL, 0, 35),
(209, 'samsung-galaxy-a70-white-600x600.jpg', 'static/image/mobile/SamsungGalaxyA70/samsung-galaxy-a70-white-600x600.jpg', NULL, 1, 37),
(210, 'samsung-galaxy-a70-trang-5-org.jpg', 'static/image/mobile/SamsungGalaxyA70/samsung-galaxy-a70-trang-5-org.jpg', NULL, 0, 37),
(211, 'samsung-galaxy-a70-trang-8-org.jpg', 'static/image/mobile/SamsungGalaxyA70/samsung-galaxy-a70-trang-8-org.jpg', NULL, 0, 37),
(212, 'samsung-galaxy-a70-trang-9-org.jpg', 'static/image/mobile/SamsungGalaxyA70/samsung-galaxy-a70-trang-9-org.jpg', NULL, 0, 37),
(213, 'samsung-galaxy-a70-trang-10-org.jpg', 'static/image/mobile/SamsungGalaxyA70/samsung-galaxy-a70-trang-10-org.jpg', NULL, 0, 37),
(214, 'anh-chinh_oppo-a1k.jpeg', 'static/image/mobile/OPPOA1K/anh-chinh_oppo-a1k.jpeg', NULL, 1, 38),
(215, 'oppo-a1k-do-5-org.jpg', 'static/image/mobile/OPPOA1K/oppo-a1k-do-5-org.jpg', NULL, 0, 38),
(216, 'oppo-a1k-do-10-org.jpg', 'static/image/mobile/OPPOA1K/oppo-a1k-do-10-org.jpg', NULL, 0, 38),
(217, 'oppo-a1k-do-8-org.jpg', 'static/image/mobile/OPPOA1K/oppo-a1k-do-8-org.jpg', NULL, 0, 38),
(218, 'oppo-a1k-do-9-org.jpg', 'static/image/mobile/OPPOA1K/oppo-a1k-do-9-org.jpg', NULL, 0, 38),
(219, 'anh-chinh-Xiaomi-Redmi-Note-10-Pro-White.jpg', 'static/image/mobile/XiaomiMiNote10Pro/anh-chinh-Xiaomi-Redmi-Note-10-Pro-White.jpg', NULL, 1, 39),
(220, 'xiaomi-mi-note-10-pro-den-8-org.jpg', 'static/image/mobile/XiaomiMiNote10Pro/xiaomi-mi-note-10-pro-den-8-org.jpg', NULL, 0, 39),
(221, 'xiaomi-mi-note-10-pro-den-9-org.jpg', 'static/image/mobile/XiaomiMiNote10Pro/xiaomi-mi-note-10-pro-den-9-org.jpg', NULL, 0, 39),
(222, 'xiaomi-mi-note-10-pro-den-10-org.jpg', 'static/image/mobile/XiaomiMiNote10Pro/xiaomi-mi-note-10-pro-den-10-org.jpg', NULL, 0, 39),
(223, 'xiaomi-mi-note-10-pro-den-11-org.jpg', 'static/image/mobile/XiaomiMiNote10Pro/xiaomi-mi-note-10-pro-den-11-org.jpg', NULL, 0, 39),
(224, 'xiaomi-mi-9t-red-600x600.jpg', 'static/image/mobile/XiaomiMi9T/xiaomi-mi-9t-red-600x600.jpg', NULL, 1, 40),
(225, 'xiaomi-mi-9t-do-8-1-org.jpg', 'static/image/mobile/XiaomiMi9T/xiaomi-mi-9t-do-8-1-org.jpg', NULL, 0, 40),
(226, 'xiaomi-mi-9t-do-10-1-org.jpg', 'static/image/mobile/XiaomiMi9T/xiaomi-mi-9t-do-10-1-org.jpg', NULL, 0, 40),
(227, 'xiaomi-mi-9t-do-11-1-org.jpg', 'static/image/mobile/XiaomiMi9T/xiaomi-mi-9t-do-11-1-org.jpg', NULL, 0, 40),
(228, 'xiaomi-mi-9t-do-13-1-org.jpg', 'static/image/mobile/XiaomiMi9T/xiaomi-mi-9t-do-13-1-org.jpg', NULL, 0, 40),
(229, 'xiaomi-redmi-8a-1-600x600.jpg', 'static/image/mobile/XiaomiRedmi8A/xiaomi-redmi-8a-1-600x600.jpg', NULL, 1, 41),
(230, 'xiaomi-redmi-8a-do-5-org.jpg', 'static/image/mobile/XiaomiRedmi8A/xiaomi-redmi-8a-do-5-org.jpg', NULL, 0, 41),
(231, 'xiaomi-redmi-8a-do-7-org.jpg', 'static/image/mobile/XiaomiRedmi8A/xiaomi-redmi-8a-do-7-org.jpg', NULL, 0, 41),
(232, 'xiaomi-redmi-8a-do-9-org.jpg', 'static/image/mobile/XiaomiRedmi8A/xiaomi-redmi-8a-do-9-org.jpg', NULL, 0, 41),
(233, 'xiaomi-redmi-8a-do-10-org.jpg', 'static/image/mobile/XiaomiRedmi8A/xiaomi-redmi-8a-do-10-org.jpg', NULL, 0, 41),
(234, 'nokia-23-green-600x600.jpg', 'static/image/mobile/Nokia2.3/nokia-23-green-600x600.jpg', NULL, 1, 42),
(235, 'nokia-23-xanh-la-6-org.jpg', 'static/image/mobile/Nokia2.3/nokia-23-xanh-la-6-org.jpg', NULL, 0, 42),
(236, 'nokia-23-xanh-la-8-org.jpg', 'static/image/mobile/Nokia2.3/nokia-23-xanh-la-8-org.jpg', NULL, 0, 42),
(237, 'nokia-23-xanh-la-10-org.jpg', 'static/image/mobile/Nokia2.3/nokia-23-xanh-la-10-org.jpg', NULL, 0, 42),
(238, 'nokia-23-xanh-la-11-org.jpg', 'static/image/mobile/Nokia2.3/nokia-23-xanh-la-11-org.jpg', NULL, 0, 42);

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `idKhachHang` int(10) UNSIGNED NOT NULL,
  `tenKhachHang` varchar(45) NOT NULL,
  `soDienThoai` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `matKhau` varchar(100) NOT NULL,
  `activation` varchar(300) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  `ngayTao` date DEFAULT '1990-01-01',
  `diaChi` varchar(45) DEFAULT NULL,
  `wishlist` varchar(200) NOT NULL,
  `codeChangePass` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`idKhachHang`, `tenKhachHang`, `soDienThoai`, `email`, `matKhau`, `activation`, `status`, `ngayTao`, `diaChi`, `wishlist`, `codeChangePass`) VALUES
(35, 'Hoang Van Nam', '0965351741', 'nitb.stone@gmail.com', '$2y$10$9CpP7dYbdPIeBYQYieJiguCfXoUvnWXm8gW4GuTKPfryTR5pp9trG', 'dd7651f1a23963c3b6713d479ce82016', 1, '2019-11-26', 'D??ng Ngh??a, V?? Th??, Th??i B??nh', ',7,4', '$2y$10$7vt8UhNT.d9DZ9AMJ2YEEu8AGNrTDyUWyGrS48ReSmN8TaK4U73w2'),
(38, 'Mr. Nam', '0929619622', 'nam@simicart.com', '$2y$10$duhd4cbY.XK.yLc5xgaKFeAA8Dyo7L88YvqOjHKB/JTPXOH1ROkri', '05764c70d58a851b02f72e7c31a0a514', 1, '2019-12-08', 'Th??i B??nh - Vi???t Nam', ',3,11', NULL),
(39, 'Hi Mai', '123123', 'maiphambkhn@gmail.com', '$2y$10$XPuoPxZzyN.cZajN3ME2MeFVLX93G3hT7EN8/B3hVMFsbxfmIhX82', '72d8b7846dce461cd8b0aad792fe5ee9', 1, '2019-12-08', 'hihi', ',10', NULL),
(40, 'anh Nam', '0973951247', 'nam.hv143022@sis.hust.edu.vn', '$2y$10$uLx9C02CIk6WP9/S.78RaeWWJV1gegNBmN78W.d1KX7t1V2OwP6AC', '7eccb803e73eba42e4ff6bccff2f8d66', 1, '2019-12-09', 'Duy Phi??n, Tam D????ng, V??nh Ph??c', ',12,3', NULL),
(41, 'Ng?? M???nh Nam', '0912773182', 'shopnamhoang@gmail.com', '$2y$10$FSsB/8zHc5P.t6epIyodbu1Uqicwh/oRhQnFdrxVAqAdeTvwjbE2i', 'ffabdc3a16cd89d40ea6ab13a70316c2', 1, '2019-12-15', 'G???c ?????, Minh Khai, H?? N???i', ',7,4', NULL),
(42, 'Thang', '0344213030', 'thangbao2698@gmail.com', '$2y$10$clx/EPrHsLsWdvwnDsGkHORyJyA1CGmD/YUnq5TxSrYd8O5QsCxF.', '201157d476b2ad0263758e7a1256ba09', 1, '2019-12-26', 'H?? T??nh', ',13', NULL),
(43, 'Thang', '0344213030', 'thangbao2698@gmail.com', '$2y$10$qrOcRWuQk3w4wWMvN87c4OwpW0eoy3RULfDt8CRHtYU4feALGV9mW', '72974ec4229bae39c81d285599dfc7f7', 0, '2019-12-26', 'H?? T??nh', '', NULL),
(44, 'L?? Tr???ng T??ng', '0344213030', 'trongtung442@gmail.com', '$2y$10$NKz9.hnfZsT4dNekEfjCjuU8WbJawJRCLgk6/LaaFRAGQjW9IjCcS', '3de0d076066be712d92726d6a9028768', 0, '2019-12-26', 'Thanh H??a', '', NULL),
(45, 'L?? Tr???ng T??ng', '0344213030', 'trongtung422@gmail.com', '$2y$10$JYVdYBFTIGi2dfjEcniNQ.dWTbyk8hlLPypTZgNby6ytGUSyuy5T.', '2b02165a1153ab25ee15793267586a1e', 1, '2019-12-26', 'Thanh H??a', '', NULL),
(46, 'Nguy???n V??n ?????t', '0344213030', 'datnv.vnist@gmail.com', '$2y$10$/85z.7LVCB2qgNzGjoRUregXmUeR1/VxK/KPPyWQpUkeAdH6MQ.xa', '0bf61c34653734d573adb85572b09a8b', 1, '2019-12-26', 'H?? N???i', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mobile`
--

CREATE TABLE `mobile` (
  `idMobile` int(10) UNSIGNED NOT NULL,
  `tenDienThoai` varchar(100) NOT NULL,
  `giaNhap` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `giaBan` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `giamGia` int(10) UNSIGNED DEFAULT '0',
  `moTa` varchar(1000) DEFAULT NULL,
  `ngayNhapKho` datetime DEFAULT '1990-01-01 00:00:00',
  `soLuongTrongKho` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `mauSac` varchar(45) NOT NULL,
  `CPU` varchar(100) NOT NULL,
  `gpu` varchar(100) DEFAULT NULL,
  `RAM` varchar(45) NOT NULL,
  `boNhoTrong` varchar(100) DEFAULT NULL,
  `heDieuHanh` varchar(100) NOT NULL,
  `manHinh` varchar(100) NOT NULL,
  `cameraSau` varchar(100) NOT NULL,
  `cameraTruoc` varchar(100) NOT NULL,
  `dungLuongPin` varchar(100) NOT NULL,
  `sacNhanh` varchar(100) DEFAULT NULL,
  `SIM` varchar(100) NOT NULL,
  `4G` int(11) DEFAULT NULL,
  `soLuotXem` int(11) NOT NULL DEFAULT '0',
  `soSao` float DEFAULT '0',
  `mucDichSuDung` varchar(4) DEFAULT NULL,
  `visibleOnHome` int(1) DEFAULT '0',
  `NhaCungCap_idNhaCungCap` int(10) UNSIGNED DEFAULT NULL,
  `NhaSanXuat_idNhaSanXuat` int(10) UNSIGNED NOT NULL,
  `theloai_idTheloai` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mobile`
--

INSERT INTO `mobile` (`idMobile`, `tenDienThoai`, `giaNhap`, `giaBan`, `giamGia`, `moTa`, `ngayNhapKho`, `soLuongTrongKho`, `mauSac`, `CPU`, `gpu`, `RAM`, `boNhoTrong`, `heDieuHanh`, `manHinh`, `cameraSau`, `cameraTruoc`, `dungLuongPin`, `sacNhanh`, `SIM`, `4G`, `soLuotXem`, `soSao`, `mucDichSuDung`, `visibleOnHome`, `NhaCungCap_idNhaCungCap`, `NhaSanXuat_idNhaSanXuat`, `theloai_idTheloai`) VALUES
(1, 'iPhone 11 Pro Max 512GB', 40000000, 42990000, 0, '????? t??m ki???m m???t chi???c smartphone c?? hi???u n??ng m???nh m??? v?? c?? th??? s??? d???ng m?????t m?? trong 2-3 n??m t???i th?? kh??ng c?? chi???c m??y n??o x???ng ??ang h??n chi???c iPhone 11 Pro Max 512GB m???i ra m???t trong n??m 2019 c???a Apple.', '2019-11-20 00:00:00', 20, 'Xanh l??', 'Apple A13 Bionic 6 nh??n, 2 nh??n 2.65 GHz & 4 nh??n 1.8 GHz', '	Apple GPU 4 nh??n', '4', '	512', '	iOS 13', '	6.5\", 	OLED, 1242 x 2688 Pixels', '3 camera 12 MP', '	12 MP', '	3969', 'Ti???t ki???m pin, S???c pin nhanh, S???c pin kh??ng d??y', '	Nano SIM & eSIM', 1, 0, 0, '1111', 1, 1, 1, 2),
(2, 'iPhone 11 Pro Max 512GB', 40500000, 43990000, 0, '????? t??m ki???m m???t chi???c smartphone c?? hi???u n??ng m???nh m??? v?? c?? th??? s??? d???ng m?????t m?? trong 2-3 n??m t???i th?? kh??ng c?? chi???c m??y n??o x???ng ??ang h??n chi???c iPhone 11 Pro Max 512GB m???i ra m???t trong n??m 2019 c???a Apple.', '2019-11-20 00:00:00', 30, 'B???c', 'Apple A13 Bionic 6 nh??n, 2 nh??n 2.65 GHz & 4 nh??n 1.8 GHz', '	Apple GPU 4 nh??n', '4', '512', 'iOS 13', '	6.5\", 	OLED, 1242 x 2688 Pixels', '3 camera 12 MP', '	12 MP', '	3969', 'Ti???t ki???m pin, S???c pin nhanh, S???c pin kh??ng d??y', '	Nano SIM & eSIM', 1, 0, 0, '1111', 0, 1, 1, 2),
(3, 'iPhone 11 Pro Max 512GB', 42500000, 45990000, 3000000, '????? t??m ki???m m???t chi???c smartphone c?? hi???u n??ng m???nh m??? v?? c?? th??? s??? d???ng m?????t m?? trong 2-3 n??m t???i th?? kh??ng c?? chi???c m??y n??o x???ng ??ang h??n chi???c iPhone 11 Pro Max 512GB m???i ra m???t trong n??m 2019 c???a Apple.', '2019-11-20 00:00:00', 40, '??en', 'Apple A13 Bionic 6 nh??n, 2 nh??n 2.65 GHz & 4 nh??n 1.8 GHz', '	Apple GPU 4 nh??n', '4', '512', 'iOS 13', '	6.5\", 	OLED, 1242 x 2688 Pixels', '3 camera 12 MP', '	12 MP', '	3969', 'Ti???t ki???m pin, S???c pin nhanh, S???c pin kh??ng d??y', '	Nano SIM & eSIM', 1, 0, 0, '1111', 1, 1, 1, 2),
(4, 'iPhone 11 Pro Max 256GB', 35000000, 36990000, 0, 'iPhone 11 Pro Max 256GB l?? chi???c iPhone cao c???p nh???t trong b??? 3 iPhone Apple gi???i thi???u trong n??m 2019 v?? qu??? th???c chi???c smartphone n??y mang trong m??nh nhi???u trang b??? x???ng ????ng v???i t??n g???i \"Pro\".', '2019-11-25 00:00:00', 30, 'Xanh l??', '	Apple A13 Bionic 6 nh??n, 	2 nh??n 2.65 GHz & 4 nh??n 1.8 GHz', '	Apple GPU 4 nh??n', '4', '256', '	iOS 13', '	6.5\", OLED, 1242 x 2688 Pixels', '	3 camera 12 MP', '	12 MP', '3969 ', '	Ti???t ki???m pin, S???c pin nhanh, S???c pin kh??ng d??y', '	Nano SIM & eSIM', 1, 0, 0, '1111', 1, 1, 1, 2),
(5, 'iPhone 11 Pro Max 256GB', 36000000, 37990000, 0, 'iPhone 11 Pro Max 256GB l?? chi???c iPhone cao c???p nh???t trong b??? 3 iPhone Apple gi???i thi???u trong n??m 2019 v?? qu??? th???c chi???c smartphone n??y mang trong m??nh nhi???u trang b??? x???ng ????ng v???i t??n g???i \"Pro\".', '2019-11-25 00:00:00', 40, 'B???c', '	Apple A13 Bionic 6 nh??n, 	2 nh??n 2.65 GHz & 4 nh??n 1.8 GHz', '	Apple GPU 4 nh??n', '4', '256', '	iOS 13', '	6.5\", OLED, 1242 x 2688 Pixels', '	3 camera 12 MP', '	12 MP', '3969 ', '	Ti???t ki???m pin, S???c pin nhanh, S???c pin kh??ng d??y', '	Nano SIM & eSIM', 1, 0, 0, '1111', 0, 1, 1, 2),
(6, 'iPhone 11 Pro Max 256GB', 38000000, 39990000, 0, 'iPhone 11 Pro Max 256GB l?? chi???c iPhone cao c???p nh???t trong b??? 3 iPhone Apple gi???i thi???u trong n??m 2019 v?? qu??? th???c chi???c smartphone n??y mang trong m??nh nhi???u trang b??? x???ng ????ng v???i t??n g???i \"Pro\".', '2019-11-25 00:00:00', 45, '??en', '	Apple A13 Bionic 6 nh??n, 	2 nh??n 2.65 GHz & 4 nh??n 1.8 GHz', '	Apple GPU 4 nh??n', '4', '256', '	iOS 13', '	6.5\", OLED, 1242 x 2688 Pixels', '	3 camera 12 MP', '	12 MP', '3969 ', '	Ti???t ki???m pin, S???c pin nhanh, S???c pin kh??ng d??y', '	Nano SIM & eSIM', 1, 0, 0, '1111', 0, 1, 1, 2),
(7, 'iPhone 11 Pro Max 64GB', 30000000, 31990000, 1500000, 'Trong n??m 2019 th?? chi???c smartphone ???????c nhi???u ng?????i mong mu???n s??? h???u tr??n tay v?? s??? d???ng nh???t kh??ng ai kh??c ch??nh l?? iPhone 11 Pro Max 64GB t???i t??? nh?? Apple.', '2019-11-16 00:00:00', 30, 'Xanh l??', '	Apple A13 Bionic 6 nh??n, 	2 nh??n 2.65 GHz & 4 nh??n 1.8 GHz', '	Apple GPU 4 nh??n', '4', '256', '	iOS 13', '	6.5\", OLED, 1242 x 2688 Pixels', '	3 camera 12 MP', '	12 MP', '3969 ', '	Ti???t ki???m pin, S???c pin nhanh, S???c pin kh??ng d??y', '	Nano SIM & eSIM', 1, 0, 0, '1111', 0, 1, 1, 2),
(8, 'iPhone 11 Pro Max 64GB', 31000000, 32990000, 0, 'Trong n??m 2019 th?? chi???c smartphone ???????c nhi???u ng?????i mong mu???n s??? h???u tr??n tay v?? s??? d???ng nh???t kh??ng ai kh??c ch??nh l?? iPhone 11 Pro Max 64GB t???i t??? nh?? Apple.', '2019-11-16 00:00:00', 35, 'B???c', '	Apple A13 Bionic 6 nh??n, 	2 nh??n 2.65 GHz & 4 nh??n 1.8 GHz', '	Apple GPU 4 nh??n', '4', '256', '	iOS 13', '	6.5\", OLED, 1242 x 2688 Pixels', '	3 camera 12 MP', '	12 MP', '3969 ', '	Ti???t ki???m pin, S???c pin nhanh, S???c pin kh??ng d??y', '	Nano SIM & eSIM', 1, 0, 0, '1111', 1, 1, 1, 6),
(9, 'iPhone 11 Pro Max 64GB', 32000000, 33990000, 0, 'Trong n??m 2019 th?? chi???c smartphone ???????c nhi???u ng?????i mong mu???n s??? h???u tr??n tay v?? s??? d???ng nh???t kh??ng ai kh??c ch??nh l?? iPhone 11 Pro Max 64GB t???i t??? nh?? Apple.', '2019-11-16 00:00:00', 40, '??en', '	Apple A13 Bionic 6 nh??n, 	2 nh??n 2.65 GHz & 4 nh??n 1.8 GHz', '	Apple GPU 4 nh??n', '4', '256', '	iOS 13', '	6.5\", OLED, 1242 x 2688 Pixels', '	3 camera 12 MP', '	12 MP', '3969 ', '	Ti???t ki???m pin, S???c pin nhanh, S???c pin kh??ng d??y', '	Nano SIM & eSIM', 1, 0, 0, '1111', 0, 1, 1, 2),
(10, 'iPhone Xs Max 256GB', 28000000, 30490000, 0, 'Sau 1 n??m mong ch???, chi???c smartphone cao c???p nh???t c???a Apple ???? ch??nh th???c ra m???t mang t??n iPhone Xs Max 256 GB. M??y c??c trang b??? c??c t??nh n??ng cao c???p nh???t t??? chip A12 Bionic, d??n loa ??a chi???u cho t???i camera k??p t??ch h???p tr?? tu??? nh??n t???o.', '2019-11-16 00:00:00', 20, 'V??ng ?????ng', '	Apple A12 Bionic 6 nh??n, 2 nh??n 2.5 GHz Vortex & 4 nh??n 1.6 GHz Tempest', 'Apple GPU 4 nh??n', '4', '256', '	iOS 12', '	6.5\", OLED, 1242 x 2688 Pixels', 'Ch??nh 12 MP & Ph??? 12 MP', '	7 MP', '3174', '	Ti???t ki???m pin, S???c pin nhanh, S???c pin kh??ng d??y', '	Nano SIM & eSIM', 1, 0, 0, '1111', 1, 1, 1, 6),
(11, 'Samsung Galaxy S10+ (512GB)', 21000000, 22990000, 1800000, 'Samsung Galaxy S10+ 512GB - phi??n b???n k??? ni???m 10 n??m chi???c Galaxy S ?????u ti??n ra m???t, l?? m???t chi???c smartphone h???i t??? ????? c??c y???u t??? m?? b???n c???n ??? m???t chi???c m??y cao c???p trong n??m 2019.', '2019-11-16 00:00:00', 20, '??en', '	Exynos 9820 8 nh??n 64-bit, 2 nh??n 2.7 GHz, 2 nh??n 2.3 GHz v?? 4 nh??n 1.9 GHz', '	Mali-G76 MP12', '8', '512', '	Android 9.0 (Pie)', '	6.4\", 	2K+ (1440 x 3040 Pixels), 	Dynamic AMOLED', 'Ch??nh 12 MP & Ph??? 12 MP, 16 MP', 'Ch??nh 10 MP & Ph??? 8 MP', '4100', 'Ti???t ki???m pin, Si??u ti???t ki???m pin, S???c pin nhanh, S???c pin kh??ng d??y, S???c ng?????c kh??ng d??y', '	2 SIM Nano (SIM 2 chung khe th??? nh???)', 1, 0, 0, '1111', 0, 2, 2, 2),
(12, 'OPPO Reno 10x Zoom Edition', 15000000, 16990000, 0, 'Nh???ng chi???c flagship trong n??m 2019 kh??ng ch??? c?? m???t camera ch???p ???nh ?????p, ch???p x??a ph??ng ???o di???u m?? c??n ph???i \"ch???p th???t xa\" v?? v???i chi???c OPPO Reno 10x Zoom Edition ch??nh th???c gia nh???p th??? tr?????ng \"smartphone c?? camera si??u zoom\".', '2019-11-16 00:00:00', 30, 'Xanh r??u', '	Snapdragon 855 8 nh??n 64-bit, 1 nh??n 2.84 GHz, 3 nh??n 2.42 GHz & 4 nh??n 1.8 GHz', '	Adreno 640', '8', '256', '	Android 9.0 (Pie)', '	6.6\", 	Full HD+ (1080 x 2340 Pixels), 	AMOLED', 'Ch??nh 48 MP & Ph??? 13 MP, 8 MP', '	16 MP', '	4065', '	Ti???t ki???m pin, S???c nhanh VOOC', '	2 SIM Nano (SIM 2 chung khe th??? nh???)', 1, 0, 0, '1111', 1, 3, 3, 6),
(13, 'Xiaomi Mi 9 SE', 6000000, 7490000, 1000000, 'V???n nh?? th?????ng l??? th?? b??n c???nh chi???c flagship Xiaomi Mi 9 cao c???p c???a m??nh th?? Xiaomi c??ng gi???i thi???u th??m phi??n b???n r??t g???n l?? chi???c Xiaomi Mi 9 SE. M??y v???n s??? h???u cho m??nh nhi???u trang b??? cao c???p t????ng t??? ????n anh.', '2019-11-16 00:00:00', 40, 'Xanh d????ng', '	Snapdragon 712 8 nh??n 64-bit, 2.3 GHz', '	Adreno 616', '6', '64', '	Android 9.0 (Pie)', '	5.97\", Full HD+ (1080 x 2340 Pixels), 	Super AMOLED', '	Ch??nh 48 MP & Ph??? 13 MP, 8 MP', '	20 MP', '3070 ', '	Ti???t ki???m pin, S???c pin nhanh', '	2 Nano SIM', 1, 0, 0, '1111', 1, 4, 4, 6),
(16, 'OPPO A5 (2020) 128GB', 5000000, 5290000, 0, 'OPPO A5 (2020) 128GB l?? chi???c smartphone m???i ra m???t c???a th????ng hi???u OPPO nh???n nhi???m v??? ????nh chi???m ph??n kh??c gi?? r???/t???m trung v???i r???t nhi???u ??i???m nh???n ????ng gi??.', NULL, 15, '??en', 'Snapdragon 665 8 nh??n, 4 nh??n 2.0 GHz & 4 nh??n 1.8 GHz', 'Adreno 610', '4', '128', 'Android 9.0 (Pie)', '6.5\", HD+ (720 x 1600 Pixels)', 'Ch??nh 12 MP & Ph??? 8 MP, 2 MP, 2 MP', '8 MP', '5000', 'Ti???t ki???m pin', '2 Nano SIM', 1, 0, 0, '1111', 1, 3, 3, 2),
(17, 'OPPO Reno2', 14990000, 15500000, 10, 'S???n ph???m m???i', NULL, 20, '??en', 'Snapdragon 730G 8 nh??n', 'Adreno 618', '8', '256', 'Android 9.0', 'Sunlight AMOLED, Full HD+ (1080 x 2400 Pixels), 6.55\"', 'ch??nh 48MP &ph??? 13 MP', '16 MP', '4000', 'S???c nhanh VOOC', '2 Sim Nano', 1, 0, 0, '1111', 0, 4, 3, 1),
(18, 'Oppo A9 2020', 5990000, 6500000, 500000, 'S???n ph???m m???i', NULL, 30, 'Xanh', 'Snapdragon 665 8 nh??n', 'Adreno 610', '8', '128', 'Android 9.0', '\"C??ng ngh??? m??n h??nh: TFT ????? ph??n gi???i:	HD+ (720 x 1600 Pixels) M??n h??nh r???ng:	6.5\"\" M???t k??nh c???m ???ng', 'ch??nh 48MP &ph??? 13 MP', '16 MP', '5000', 'Ti???t ki???m pin', '2 Sim Nano', 1, 0, 0, '1111', 0, 5, 3, 1),
(19, 'Samsung Galaxy A50S', 5990000, 6500000, 1000000, 'S???n ph???m m???i', NULL, 10, '??en', 'Exynos 9610 8 nh??n', 'Mali-G72 MP3', '4', '64', 'Android 9.0', '\"C??ng ngh??? m??n h??nh: Super AMOLED ????? ph??n gi???i: Full HD+ (1080 x 2340 Pixels) M??n h??nh r???ng: 6.4\"\" M', 'ch??nh 48MP &ph??? 8 MP', '32 MP', '4000', 'S???c pin nhanh, ti???t ki???m pin', '2 Sim Nano', 1, 0, 0, '1111', 1, 5, 2, 3),
(20, 'Samsung Galaxy Note 10+', 25500000, 26990000, 1000000, 'S???n ph???m m???i', NULL, 30, 'Tr???ng', 'Exynos 9825 8 nh??n??', 'Mali-G76 MP12', '12', '256', 'Android 9.0', '\"C??ng ngh??? m??n h??nh: Dynamic AMOLED ????? ph??n gi???i:WHQD+ (1.440 x 3.040 Pixels) M??n h??nh r???ng:	6.8\"\" M', 'ch??nh 12MP & ph??? 12MP', '10 MP', '4300', 'S???c pin nhanh, ti???t ki???m pin, s???c pin kh??ng d??y', '2 Sim Nano', 1, 0, 0, '1111', 1, 2, 2, 3),
(21, 'Samsung Galaxy A20', 3400000, 4190000, 0, 'S???n ph???m m???i', NULL, 10, '?????', 'Exynos 7884 8 nh??n', 'Mali??? G71', '3', '32', 'Android 9.0', '\"C??ng ngh??? m??n h??nh:Super AMOLED ????? ph??n gi???i:HD+ (720 x 1560 Pixels) M??n h??nh r???ng:	6.4\"\" M???t k??nh ', 'ch??nh 13Mp& ph??? 5MP', '8 MP', '4000', 'Ti???t ki???m pin', '2 Sim Nano', 1, 0, 0, '1111', 0, 2, 2, 3),
(23, 'Samsung Galaxy A80', 13500000, 14990000, 0, 'S???n ph???m m???i', NULL, 19, '??en h???ng', 'Snapdragon 730 8 nh??n', 'Adreno 618', '8', '128', 'Android 9.0', 'C??ng ngh??? m??n h??nh: Dynamic AMOLED ????? ph??n gi???i:Full HD+ (1080 x 2400 Pixels) M??n h??nh r???ng:	6.7\"\" M', 'Ch??nh 48 MP & Ph??? 8 MP,', 'Ch??nh 48 MP & Ph??? 8 MP', '4500', 'Ch??nh 48 MP & Ph??? 8 MP', '2 Sim Nano', 1, 0, 0, '1111', 0, 6, 2, 5),
(24, 'Samsung Galaxy Note 8', 16000000, 17490000, 0, 'S???n ph???m m???i', NULL, 30, '??en', 'Exynos 8895 8', 'Mali-G71 MP20', '6', '64', 'Android 7.1', 'C??ng ngh??? m??n h??nh:Super AMOLED ????? ph??n gi???i2K (1440 x 2960 Pixels) M??n h??nh r???ng:	6.3\"\" M???t k??nh c???', '2 camera 12 MP', '8 MP', '4300', 'S???c pin nhanh, ti???t ki???m pin, s???c pin kh??ng d??y', '2 Sim Nano', 1, 0, 0, '1111', 0, 6, 2, 5),
(25, ' Iphone 7 plus 32GB', 13000000, 14990000, 1000000, 'S???n ph???m m???i', NULL, 20, 'Tr???ng', 'Apple A10 Fusion 4 nh??n 64-bit', 'PowerVR Series7XT Plus', '3', '32', 'iOS 10', '\"C??ng ngh??? m??n h??nh:LED-backlit IPS LCD ????? ph??n gi???i:Full HD (1080 x 1920 pixels) M??n h??nh r???ng:5.5\"', '2 camera 12 MP', '7 MP', '1990', 'Ti???t ki???m pin', '1 Sim Nano', 1, 0, 0, '1111', 0, 2, 1, 5),
(26, 'Huawei P30 Lite', 3500000, 5490000, 0, 'S???n ph???m t???t', NULL, 20, 'Xanh', 'HiSilicon Kirin 710', 'Mali-G51 MP4', '6', '128', 'Android 9.0', '\"C??ng ngh??? m??n h??nh:IPS LCD ????? ph??n gi???i:Full HD+ (1080 x 2340 Pixels) M??n h??nh r???ng:6.15\"\" M???t k??nh', 'Ch??nh 24 MP & Ph??? 8 MP', '32 MP', '5000', 'S???c pin nhanh,??Ti???t ki???m pin', '2 Sim Nano', 1, 0, 0, '1111', 0, 6, 7, 1),
(27, 'Huawei Y9 2019', 3500000, 4990000, 0, 'S???n ph???m t???t', NULL, 1, '??en', 'HiSilicon Kirin 710', 'Mali-G51 MP4', '4', '64', 'Android 8.1', '\"C??ng ngh??? m??n h??nh:LTPS LCD ????? ph??n gi???i:Full HD+ (1080 x 2340 Pixels) M??n h??nh r???ng:6.5\"\" M???t k??nh', 'ch??nh 13Mp& ph??? 5MP', '16 MP v?? 2 MP??', '4000', 'S???c pin nhanh,??Ti???t ki???m pin', '2 Sim Nano', 1, 0, 0, '1111', 0, 6, 7, 5),
(28, 'Huawei Y7 Pro 2019', 2000000, 2790000, 0, 'S???n ph???m m???i', NULL, 15, 'Xanh tr???ng', 'Snapdragon 450 8 nh??n', 'Adreno 506', '3', '32', 'Android 8.1', '\"C??ng ngh??? m??n h??nh:IPS LCD ????? ph??n gi???i:HD+ (720 x 1520 Pixels) M??n h??nh r???ng:6.26\"\" M???t k??nh c???m ???', '13 MP v?? 2 MP', '16 MP', '4000', 'Ti???t ki???m pin', '2 Sim Nano', 1, 0, 0, '1111', 0, 5, 7, 5),
(29, 'Vivo Y55S', 2500000, 3990000, 0, 'S???n ph???m m???i', NULL, 2, 'Tr???ng', 'Snapdragon 425 4 nh??n', 'Adreno 308', '2', '16', 'Android 6.0', '\"C??ng ngh??? m??n h??nh:TFT ????? ph??n gi???i:HD (720 x 1280 pixels) M??n h??nh r???ng:5.2\"\" M???t k??nh c???m ???ng:K??n', '13 MP', '5 MP', '2730', 'Kh??ng c??', '2 Sim Nano', 1, 0, 0, '1111', 0, 5, 5, 2),
(30, 'Vivo Y69', 4000000, 5490000, 0, 'S???n ph???m t???t', NULL, 15, 'V??ng', 'Mediatek MT6750 8 nh??n', 'Mali-T860', '3', '32', 'Android 7.0', '\"C??ng ngh??? m??n h??nh:IPS LCD ????? ph??n gi???i:HD (720 x 1280 pixels) M??n h??nh r???ng:5.5\"\" M???t k??nh c???m ???ng', '13 MP', '16 MP', '3000', 'Kh??ng c??', '2 Sim Nano', 1, 0, 0, '1111', 0, 4, 5, 4),
(31, 'Asus Zenfone 4 Max Pro', 3500000, 4990000, 200000, 'S???n ph???m m???i', NULL, 25, 'V??ng', 'Snapdragon 430 8 nh??n', 'Adreno 505', '3', '32', 'Android 7.0', '\"C??ng ngh??? m??n h??nh:IPS LCD ????? ph??n gi???i:HD (720 x 1280 pixels) M??n h??nh r???ng:5.5\"\" M???t k??nh c???m ???ng', '16 MP v?? 5 MP', '16 MP', '5000', 'Ti???t ki???m pin', '2 Sim Nano', 1, 0, 0, '1111', 0, 4, 8, 4),
(32, 'Nokia 6.1 Plus', 3500000, 4790000, 0, 'S???n ph???m m???i', NULL, 20, '??en', 'Snapdragon 636, 8 nh??n', 'Adreno 506', '4', '64', 'Android 8.1', '\"C??ng ngh??? m??n h??nh:IPS LCD ????? ph??n gi???i:Full HD+ 1080 x 2280 pixels M??n h??nh r???ng:5.8\"\" M???t k??nh c???', '16 MP v?? 5 MP', '16 MP', '3060', 'Ti???t ki???m pin, s???c nhanh', '2 Sim Nano', 1, 0, 0, '1111', 0, 3, 8, 6),
(33, 'Nokia 8.1', 5000000, 6590000, 0, 'S???n ph???m m???i', NULL, 30, '??en', 'Snapdragon 710 8 nh??n', 'Adreno 616', '4', '64', 'Android 9.0', '\"C??ng ngh??? m??n h??nh	IPS LCD ????? ph??n gi???i	Full HD+ (1080 x 2280 Pixels) M??n h??nh r???ng	6.18??? M???t k??nh ', 'Ch??nh 12 MP & Ph??? 13 MP', '20 MP', '3500', 'Ti???t ki???m pin, s???c nhanh', '2 Sim Nano', 1, 0, 0, '1111', 0, 3, 8, 6),
(34, 'Vivo V17 Pro', 8000000, 9990000, 300000, 'S???n ph???m m???i', NULL, 19, 'Tr???ng', 'Snapdragon 675 8 nh??n', 'Adreno 612', '8', '128', 'Android 9.0', '\"C??ng ngh??? m??n h??nh	Super AMOLED ????? ph??n gi???i	Full HD+ (1080 x 2400 Pixels) M??n h??nh r???ng	6.44\"\" M???t', '\"	Ch??nh 48 MP & Ph??? 8 MP, 2 MP, 2 MP\"', 'Ch??nh 32 MP & Ph??? 8 MP', '3500', 'Ti???t ki???m pin, s???c nhanh', '2 Sim Nano', 1, 0, 0, '1111', 0, 2, 5, 6),
(35, 'Vivo Y91C', 1500000, 2500000, 0, 'S???n ph???m m???i', NULL, 30, 'Xanh', 'MediaTek MT6762R 8 nh??n', 'PowerVR GE8320', '2', '32', 'Android 8.1', '\"C??ng ngh??? m??n h??nh	IPS LCD ????? ph??n gi???i	HD+ (720 x 1520 Pixels) M??n h??nh r???ng	6.22\"\" M???t k??nh c???m ???', '13 MP', '5 MP', '4030', 'ti???t ki???m pin', '2 Sim Nano', 1, 0, 0, '1111', 0, 2, 5, 3),
(37, 'Samsung Galaxy A70', 7000000, 8790000, 1000000, 'S???n ph???m m???i', NULL, 20, 'Tr???ng', 'Snapdragon 675 8 nh??n', 'Adreno 612', '6', '128', 'Android 9.0', '\"C??ng ngh??? m??n h??nh	Super AMOLED ????? ph??n gi???i	Full HD+ (1080 x 2400 Pixels) M??n h??nh r???ng	6.7\"\" M???t ', 'Ch??nh 32 MP & Ph??? 8 MP, 5 MP', '32 MP', '4500', 'Ti???t ki???m pin, S???c pin nhanh', '2 Sim Nano', 1, 0, 0, '1111', 0, 1, 2, 6),
(38, ' OPPO A1K', 1500000, 2990000, 0, 'S???n ph???m m???i', NULL, 30, '?????', 'MediaTek MT6762R 8 nh??n', 'PowerVR GE8320', '2', '32', 'Android 9.0', '\"C??ng ngh??? m??n h??nh	IPS LCD ????? ph??n gi???i	HD+ (720 x 1560 Pixels) M??n h??nh r???ng	6.1\"\" M???t k??nh c???m ???n', '8 MP', '5 MP', '4000', 'ti???t ki???m pin', '2 Sim Nano', 1, 0, 0, '1111', 0, 1, 3, 6),
(39, 'Xiaomi Mi Note 10 Pro', 13000000, 14590000, 300000, 'S???n ph???m m???i', NULL, 25, 'Tr???ng', 'Snapdragon 730G 8 nh??n', 'Adreno 618', '8', '256', 'Android 9.0', '\"C??ng ngh??? m??n h??nh	AMOLED ????? ph??n gi???i	Full HD+ (1080 x 2340 Pixels) M??n h??nh r???ng	6.47\"\" M???t k??nh ', 'Ch??nh 108 MP & Ph??? 20 MP, 12 MP, 5 MP, 2 MP', '32 MP', '5260', 'Ti???t ki???m pin, S???c pin nhanh', '2 Sim Nano', 1, 0, 0, '1111', 0, 1, 4, 3),
(40, ' Xiaomi Mi 9T', 6000000, 7990000, 500000, 's???n ph???m m???i', NULL, 28, '????? ??en', 'Snapdragon 730 8 nh??n', 'Adreno 618', '6', '64', 'Android 9.0', '\"C??ng ngh??? m??n h??nh	AMOLED ????? ph??n gi???i	Full HD+ (1080 x 2340 Pixels) M??n h??nh r???ng	6.39\"\" M???t k??nh ', 'Ch??nh 48 MP & Ph??? 13 MP, 8 MP', '20 MP', '4000', 'Ti???t ki???m pin, S???c pin nhanh', '2 Sim Nano', 1, 0, 0, '1111', 0, 2, 4, 3),
(41, 'Xiaomi Redmi 8A', 1500000, 2590000, 0, 'S???n ph???m m???i', NULL, 10, '????? ??en', 'Snapdragon 439 8 nh??n', 'Adreno 505', '2', '32', 'Android 9.0', '\"C??ng ngh??? m??n h??nh	IPS LCD ????? ph??n gi???i	HD+ (720 x 1520 Pixels) M??n h??nh r???ng	6.22\"\" M???t k??nh c???m ???', '12 MP', '8 MP', '5000', 'Ti???t ki???m pin, S???c pin nhanh', '2 Sim Nano', 1, 0, 0, '1111', 0, 3, 4, 3),
(42, 'Nokia 2.3', 1500000, 2590000, 0, 'S???n ph???m m???i', NULL, 26, 'Xanh', 'Mediatek MT6761 4 nh??n (Helio A22)', 'PowerVR GE8320', '2', '32', 'Android 9.0', '\"C??ng ngh??? m??n h??nh	TFT ????? ph??n gi???i	HD+ (720 x 1520 Pixels) M??n h??nh r???ng	6.2\"\" M???t k??nh c???m ???ng	??a', 'Ch??nh 13 MP & Ph??? 2 MP', '5 MP', '4000', 'kh??ng c??', '2 Sim Nano', 1, 0, 0, '1111', 0, 4, 8, 6);

-- --------------------------------------------------------

--
-- Table structure for table `mobile_has_sukiengiamgia`
--

CREATE TABLE `mobile_has_sukiengiamgia` (
  `id` int(11) NOT NULL,
  `ngayBatDau` date DEFAULT '1990-01-01',
  `ngayKetThuc` date DEFAULT '1990-01-01',
  `giamGia` int(10) UNSIGNED DEFAULT '0',
  `mobile_idMobile` int(10) UNSIGNED NOT NULL,
  `sukiengiamgia_idSuKienGiamGia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nhacungcap`
--

CREATE TABLE `nhacungcap` (
  `idNhaCungCap` int(10) UNSIGNED NOT NULL,
  `tenNhaCC` varchar(100) NOT NULL,
  `diaChi` varchar(45) NOT NULL,
  `dienThoai` varchar(45) NOT NULL,
  `moTa` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nhacungcap`
--

INSERT INTO `nhacungcap` (`idNhaCungCap`, `tenNhaCC`, `diaChi`, `dienThoai`, `moTa`) VALUES
(1, 'C??ng ty TNHH FPT Shop', 'B???n Ngh??, Tp. H??? Ch?? Minh', '(028)38236894', 'Nh?? cung c???p ??i???n tho???i FPT Shop'),
(2, 'C??ng ty TNHH Th??? Gi???i Di ?????ng', 'T??n B??nh, Tp. H??? Ch?? Minh', '(028)35100100', 'Nh?? cung c???p ??i???n tho???i Th??? Gi???i Di ?????ng'),
(3, 'C??ng ty CP XNK USCOM', 'S??? 12 Y??n L??ng, L??ng H???, ?????ng ??a, H?? N???i', '(024)0936218888', 'Nh?? ph??n ph???i thi???t b??? di ?????ng USCOM  t???i H?? N???i'),
(4, 'C??ng ty TNHH TSMobile', '64 Ng?? 39 H??o Nam, ?????ng ??a, H?? N???i', '(024)22413776', 'Nh?? ph??n ph???i ??i???n tho???i di ?????ng  TSMobile t???i H?? N???i'),
(5, 'Trung t??m VietPhones', '412 T??y S??n, ?????ng ??a, H?? N???i', '(024)66803104', 'Nh?? ph??n ph???i ??i???n tho???i di ?????ng  Vietphones t???i H?? N???i'),
(6, 'Nh???t C?????ng Mobile', '42 Th??i H??, H?? N???i', '0986522617', 'Nh?? ph??n ph???i ??i???n tho???i Nh???t C?????ng');

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `idNhanVien` int(10) UNSIGNED NOT NULL,
  `tenNhanVien` varchar(45) NOT NULL,
  `gioiTinh` varchar(45) DEFAULT NULL,
  `ngaySinh` date DEFAULT '1990-01-01',
  `queQuan` varchar(45) NOT NULL,
  `cmnd` varchar(45) NOT NULL,
  `soDienThoai` varchar(20) NOT NULL,
  `chucvu` varchar(45) NOT NULL,
  `ghiChu` varchar(100) DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `matKhau` varchar(300) NOT NULL,
  `status` int(1) DEFAULT '1',
  `codeChangePass` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`idNhanVien`, `tenNhanVien`, `gioiTinh`, `ngaySinh`, `queQuan`, `cmnd`, `soDienThoai`, `chucvu`, `ghiChu`, `email`, `matKhau`, `status`, `codeChangePass`) VALUES
(25, 'Ho??ng V??n Nam', 'Nam', '1995-11-30', 'D??ng Ngh??a, V?? Th??, Th??i B??nh', '152067394', '0965351741', 'Qu???n tr??? vi??n', 'Admin t???ng', 'nitb.stone@gmail.com', '$2y$10$5g8boGaDeOFighvhQurIY.a5vEUpUZBDau/keOSUBru5UO5OTBFxa', 1, '$2y$10$s7YhfYcqd5Z4G1lIXuWw5.oy3FIU7oJcGS7FLo.dDcgFQYv9b6dS.'),
(30, 'Ph???m Mai', 'N???', '1996-04-11', 'V??nh Ph??c', '152099112', '0929619622', 'Nh??n vi??n b??n h??ng', 'Nh??n vi??n b??n h??ng 1', 'maipham@gmail.com', '$2y$10$mQ3CQqcvYhe9jIvwZdnd0eyu.HZ/9iBKcEVpkC8LJ3j7E3wIEvnKW', 1, NULL),
(31, 'Nguy???n M???nh Th???ng', 'Nam', '1997-06-18', 'Can L???c - H?? T??nh', '138222712', '0932817216', 'Nh??n vi??n b??n h??ng', 'Nh??n vi??n b??n h??ng 2', 'manhthang@gmail.com', '$2y$10$e83NWcErFVOAk9TiDFSRCOI5dq3ZQBUpgHfOmPi2KkE6SE/mylmB6', 1, NULL),
(32, 'Nguy???n V??n T??', 'Nam', '1997-11-20', 'C???m V??n - C???m Th???y - Thanh H??a', '127192012', '0988126133', 'Nh??n vi??n th??? kho', 'Nh??n vi??n th??? kho 1', 'vantu@gmail.com', '$2y$10$hVRmO8ctNgsvSvV/.fPG/O2BbPmepe2Ryc/e2EJaKxjp7diNtt9FW', 1, NULL),
(33, 'Ho??ng Tu???n Anh', 'Nam', '1998-02-02', '??an Ph?????ng - H?? N???i', '122718229', '0361172281', 'Nh??n vi??n th??? kho', 'Nh??n vi??n th??? kho 2', 'anhtuan@gmail.com', '$2y$10$5EzybsiPpdD/HRIP1EE2euoG/acT2Nytx2aQePonxeysBrx35M38K', 1, NULL),
(34, 'Phan V??n Long', 'Nam', '1994-12-11', 'Ho??ng C???u - ?????ng ??a - H?? N???i', '122910224', '0912888212', 'Nh??n vi??n giao h??ng', 'Nh??n vi??n giao h??ng 1', 'vanlong@gmail.com', '$2y$10$Qf0/i5MGHpm2x3acgOH1N.NcV.GKhAweH519USTWzQCFwNM7toStW', 1, NULL),
(35, 'Nguy???n Quang H???i', 'Nam', '1996-12-08', 'Giao Th???y - Nam ?????nh', '133291821', '035812112', 'Nh??n vi??n giao h??ng', 'Nh??n vi??n giao h??ng 2', 'quanghai@gmail.com', '$2y$10$mqYvNVtFITRjtZadNJCqFOb19msmfAtgzPdJL.pqYhjLgZaHc51qK', 1, NULL),
(36, 'Nam Ho??ng', 'Nam', '1996-04-10', 'V?? Th??, Th??i B??nh', '152067394', '0929619622', 'Qu???n tr??? vi??n', 'Qu???n tr??? vi??n 2', 'shopnamhoang@gmail.com', '$2y$10$V5g/zw8jMgtheX8WF14/HOtnjdVm.HNug5MKRwCbmiCg3GV9RwgoG', 1, NULL),
(37, 'nam', 'Nam', '2019-12-20', 'De La Thanh', '1211111111', '11111111', 'Qu???n tr??? vi??n', 'qtv', 'nam@simicart.com', '$2y$10$HdZNv43Tpf.YQm/WmIXuouX7LpbcnJXXYcH7bTnGYpLTkRdB3GMKm', 2, NULL),
(38, 'admin', 'Nam', '2019-12-16', 'Ha Noi', '111222333', '0911222333', 'Qu???n tr??? vi??n', 'Quan tri vien', 'admin@gmail.com', '$2y$10$P12454QiolfQz/BPYN3vqu1XqtviCEe9zS/WNEJCLt4.a8XL/nhRC', 1, NULL),
(39, 'Nguy???n V??n Th???ng', 'Nam', '1998-02-06', 'H?? T??nh', '184291338', '0344213030', 'Nh??n vi??n b??n h??ng', 'B??n h??ng', 'thangbao2698@gmail.com', '$2y$10$slVUWtc4sEUAciSulGErGe04DkPecA15dBDdqzILvrxNDG57d/Myq', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nhasanxuat`
--

CREATE TABLE `nhasanxuat` (
  `idNhaSanXuat` int(10) UNSIGNED NOT NULL,
  `tenNhaSX` varchar(100) NOT NULL,
  `diaChi` varchar(45) NOT NULL,
  `dienThoai` varchar(45) NOT NULL,
  `moTa` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nhasanxuat`
--

INSERT INTO `nhasanxuat` (`idNhaSanXuat`, `tenNhaSX`, `diaChi`, `dienThoai`, `moTa`) VALUES
(1, 'Apple', 'Hoa K???', '0912213428', 'Nh?? s???n xu???t ??i???n tho???i Iphone.'),
(2, 'Samsung', 'H??n Qu???c', '0958234123', 'Nh?? s???n xu???t ??i???n tho???i Samsung.'),
(3, 'Oppo', 'Trung Qu???c', '0908098298', 'Nh?? s???n xu???t ??i???n tho???i Oppo.'),
(4, 'Xiaomi', 'B???c Kinh, Trung Qu???c', '0948219201', 'Nh?? s???n xu???t ??i???n tho???i Xiaomi.'),
(5, 'Vivo', 'Trung Qu???c', '0968226882', 'Nh?? s???n xu???t ??i???n tho???i Vivo.'),
(6, 'Realme', 'Trung Qu???c', '0998223090', 'Nh?? s???n xu???t ??i???n tho???i Realmel.'),
(7, 'Huawei', 'Trung Qu???c', '0928293021', 'Nh?? s???n xu???t ??i???n tho???i Huawei.'),
(8, 'Vingroup', 'Vi???t Nam', '0938339220', 'Nh?? s???n xu???t ??i???n tho???i Vingroup.');

-- --------------------------------------------------------

--
-- Table structure for table `sukiengiamgia`
--

CREATE TABLE `sukiengiamgia` (
  `idSuKienGiamGia` int(11) NOT NULL,
  `tenSuKien` varchar(45) NOT NULL,
  `moTa` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `theloai`
--

CREATE TABLE `theloai` (
  `idTheloai` int(10) UNSIGNED NOT NULL,
  `tentheloai` varchar(45) NOT NULL,
  `moTa` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `theloai`
--

INSERT INTO `theloai` (`idTheloai`, `tentheloai`, `moTa`) VALUES
(1, 'M???t h??ng b??nh th?????ng', NULL),
(2, 'M???t h??ng m???i', NULL),
(3, 'M???t h??ng ???????c y??u th??ch', NULL),
(4, 'M???t h??ng b??n ch???y', NULL),
(5, 'M???t h??ng ??? ???m', NULL),
(6, 'N???i b???t', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`idBanner`);

--
-- Indexes for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`idBinhLuan`),
  ADD KEY `fk_binhluan_mobile1_idx` (`mobile_idMobile`),
  ADD KEY `fk_binhluan_khachhang1_idx` (`khachhang_idKhachHang`);

--
-- Indexes for table `chitietmuahang`
--
ALTER TABLE `chitietmuahang`
  ADD PRIMARY KEY (`idChiTiet`),
  ADD KEY `fk_chitietmuahang_donmuahang1_idx` (`donmuahang_idDonHang`),
  ADD KEY `fk_chitietmuahang_mobile1_idx` (`mobile_idMobile`);

--
-- Indexes for table `donmuahang`
--
ALTER TABLE `donmuahang`
  ADD PRIMARY KEY (`idDonHang`),
  ADD KEY `fk_donmuahang_khachhang1_idx` (`khachhang_idKhachHang`),
  ADD KEY `fk_donmuahang_nhanvien1_idx` (`nhanvien_idNhanVien`);

--
-- Indexes for table `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`khachhang_idKhachHang`);

--
-- Indexes for table `giohang_has_mobile`
--
ALTER TABLE `giohang_has_mobile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_giohang_has_mobile_mobile1_idx` (`mobile_idMobile`),
  ADD KEY `fk_giohang_has_mobile_giohang1_idx` (`giohang_khachhang_idKhachHang`);

--
-- Indexes for table `hinhanh`
--
ALTER TABLE `hinhanh`
  ADD PRIMARY KEY (`idHinhAnh`),
  ADD KEY `fk_HinhAnh_Mobile1_idx` (`Mobile_idMobile`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`idKhachHang`);

--
-- Indexes for table `mobile`
--
ALTER TABLE `mobile`
  ADD PRIMARY KEY (`idMobile`),
  ADD KEY `fk_Mobile_NhaCungCap1_idx` (`NhaCungCap_idNhaCungCap`),
  ADD KEY `fk_Mobile_NhaSanXuat1_idx` (`NhaSanXuat_idNhaSanXuat`),
  ADD KEY `fk_mobile_theloai1_idx` (`theloai_idTheloai`);

--
-- Indexes for table `mobile_has_sukiengiamgia`
--
ALTER TABLE `mobile_has_sukiengiamgia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_mobile_has_sukiengiamgia_mobile1_idx` (`mobile_idMobile`),
  ADD KEY `fk_mobile_has_sukiengiamgia_sukiengiamgia1_idx` (`sukiengiamgia_idSuKienGiamGia`);

--
-- Indexes for table `nhacungcap`
--
ALTER TABLE `nhacungcap`
  ADD PRIMARY KEY (`idNhaCungCap`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`idNhanVien`);

--
-- Indexes for table `nhasanxuat`
--
ALTER TABLE `nhasanxuat`
  ADD PRIMARY KEY (`idNhaSanXuat`);

--
-- Indexes for table `sukiengiamgia`
--
ALTER TABLE `sukiengiamgia`
  ADD PRIMARY KEY (`idSuKienGiamGia`);

--
-- Indexes for table `theloai`
--
ALTER TABLE `theloai`
  ADD PRIMARY KEY (`idTheloai`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `idBanner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `idBinhLuan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chitietmuahang`
--
ALTER TABLE `chitietmuahang`
  MODIFY `idChiTiet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `donmuahang`
--
ALTER TABLE `donmuahang`
  MODIFY `idDonHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `giohang_has_mobile`
--
ALTER TABLE `giohang_has_mobile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `hinhanh`
--
ALTER TABLE `hinhanh`
  MODIFY `idHinhAnh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=239;

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `idKhachHang` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `mobile`
--
ALTER TABLE `mobile`
  MODIFY `idMobile` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `mobile_has_sukiengiamgia`
--
ALTER TABLE `mobile_has_sukiengiamgia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nhacungcap`
--
ALTER TABLE `nhacungcap`
  MODIFY `idNhaCungCap` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `idNhanVien` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `nhasanxuat`
--
ALTER TABLE `nhasanxuat`
  MODIFY `idNhaSanXuat` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sukiengiamgia`
--
ALTER TABLE `sukiengiamgia`
  MODIFY `idSuKienGiamGia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `theloai`
--
ALTER TABLE `theloai`
  MODIFY `idTheloai` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `fk_binhluan_khachhang1` FOREIGN KEY (`khachhang_idKhachHang`) REFERENCES `khachhang` (`idKhachHang`),
  ADD CONSTRAINT `fk_binhluan_mobile1` FOREIGN KEY (`mobile_idMobile`) REFERENCES `mobile` (`idMobile`);

--
-- Constraints for table `chitietmuahang`
--
ALTER TABLE `chitietmuahang`
  ADD CONSTRAINT `fk_chitietmuahang_donmuahang1` FOREIGN KEY (`donmuahang_idDonHang`) REFERENCES `donmuahang` (`idDonHang`),
  ADD CONSTRAINT `fk_chitietmuahang_mobile1` FOREIGN KEY (`mobile_idMobile`) REFERENCES `mobile` (`idMobile`);

--
-- Constraints for table `donmuahang`
--
ALTER TABLE `donmuahang`
  ADD CONSTRAINT `fk_donmuahang_khachhang1` FOREIGN KEY (`khachhang_idKhachHang`) REFERENCES `khachhang` (`idKhachHang`),
  ADD CONSTRAINT `fk_donmuahang_nhanvien1` FOREIGN KEY (`nhanvien_idNhanVien`) REFERENCES `nhanvien` (`idNhanVien`);

--
-- Constraints for table `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `fk_giohang_khachhang1` FOREIGN KEY (`khachhang_idKhachHang`) REFERENCES `khachhang` (`idKhachHang`);

--
-- Constraints for table `giohang_has_mobile`
--
ALTER TABLE `giohang_has_mobile`
  ADD CONSTRAINT `fk_giohang_has_mobile_giohang1` FOREIGN KEY (`giohang_khachhang_idKhachHang`) REFERENCES `giohang` (`khachhang_idKhachHang`),
  ADD CONSTRAINT `fk_giohang_has_mobile_mobile1` FOREIGN KEY (`mobile_idMobile`) REFERENCES `mobile` (`idMobile`);

--
-- Constraints for table `hinhanh`
--
ALTER TABLE `hinhanh`
  ADD CONSTRAINT `fk_HinhAnh_Mobile1` FOREIGN KEY (`Mobile_idMobile`) REFERENCES `mobile` (`idMobile`);

--
-- Constraints for table `mobile`
--
ALTER TABLE `mobile`
  ADD CONSTRAINT `fk_Mobile_NhaCungCap1` FOREIGN KEY (`NhaCungCap_idNhaCungCap`) REFERENCES `nhacungcap` (`idNhaCungCap`),
  ADD CONSTRAINT `fk_Mobile_NhaSanXuat1` FOREIGN KEY (`NhaSanXuat_idNhaSanXuat`) REFERENCES `nhasanxuat` (`idNhaSanXuat`),
  ADD CONSTRAINT `fk_mobile_theloai1` FOREIGN KEY (`theloai_idTheloai`) REFERENCES `theloai` (`idTheloai`);

--
-- Constraints for table `mobile_has_sukiengiamgia`
--
ALTER TABLE `mobile_has_sukiengiamgia`
  ADD CONSTRAINT `fk_mobile_has_sukiengiamgia_mobile1` FOREIGN KEY (`mobile_idMobile`) REFERENCES `mobile` (`idMobile`),
  ADD CONSTRAINT `fk_mobile_has_sukiengiamgia_sukiengiamgia1` FOREIGN KEY (`sukiengiamgia_idSuKienGiamGia`) REFERENCES `sukiengiamgia` (`idSuKienGiamGia`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
