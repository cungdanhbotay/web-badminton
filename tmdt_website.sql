-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2023 at 11:53 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tmdt_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinhadmin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenadmin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='trang cua admin';

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `hinhadmin`, `tenadmin`) VALUES
('admin', '123123', 'logo.png', 'admin'),
('admin', '123123', 'logo.png', 'admin'),
('admin', '123123', 'logo.png', 'admin'),
('admin', '123123', 'logo.png', 'admin'),
('admin', '123123', 'logo.png', 'admin'),
('admin', '123123', 'logo.png', 'admin'),
('admin', '123123', 'logo.png', 'admin'),
('admin', '123123', 'logo.png', 'admin'),
('admin', '123123', 'logo.png', 'admin'),
('admin', '123123', 'logo.png', 'admin'),
('admin', '123123', 'logo.png', 'admin'),
('admin', '123123', 'logo.png', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `binhluan`
--

CREATE TABLE `binhluan` (
  `mabl` int(11) NOT NULL,
  `masp` int(11) NOT NULL,
  `makh` int(11) NOT NULL,
  `noidung` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thoigianbl` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chitietdathang`
--

CREATE TABLE `chitietdathang` (
  `masp` int(11) DEFAULT NULL,
  `giaban` decimal(20,6) DEFAULT NULL,
  `soluongddh` int(11) DEFAULT NULL,
  `mactdh` int(11) NOT NULL,
  `maddh` int(11) DEFAULT NULL,
  `tongthanhtien` decimal(20,6) NOT NULL DEFAULT 0.000000,
  `magh` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chitietdathang`
--

INSERT INTO `chitietdathang` (`masp`, `giaban`, `soluongddh`, `mactdh`, `maddh`, `tongthanhtien`, `magh`) VALUES
(11, '200000.000000', 1, 49, 38, '0.000000', NULL),
(7, '320000.000000', 1, 50, 38, '0.000000', NULL),
(8, '620000.000000', 1, 51, 38, '0.000000', NULL),
(9, '380000.000000', 1, 52, 38, '0.000000', NULL),
(10, '210000.000000', 1, 53, 38, '0.000000', NULL),
(8, '620000.000000', 1, 54, 39, '0.000000', NULL),
(20, '600000.000000', 1, 55, 40, '0.000000', NULL),
(22, '210000.000000', 1, 56, 40, '0.000000', NULL),
(11, '200000.000000', 1, 57, 40, '0.000000', NULL),
(7, '320000.000000', 1, 58, 40, '0.000000', NULL),
(8, '620000.000000', 1, 59, 40, '0.000000', NULL),
(9, '380000.000000', 1, 60, 40, '0.000000', NULL),
(10, '210000.000000', 1, 61, 40, '0.000000', NULL),
(42, '550.000000', 1, 69, 50, '0.000000', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dondathang`
--

CREATE TABLE `dondathang` (
  `maddh` int(11) NOT NULL,
  `makh` int(11) DEFAULT NULL,
  `manv` int(11) DEFAULT NULL,
  `ngaydathang` date DEFAULT NULL,
  `ngaygiaohang` date DEFAULT NULL,
  `ngaychuyenhang` date DEFAULT NULL,
  `noigiaohang` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dondathang`
--

INSERT INTO `dondathang` (`maddh`, `makh`, `manv`, `ngaydathang`, `ngaygiaohang`, `ngaychuyenhang`, `noigiaohang`) VALUES
(50, 13, NULL, '2023-04-16', '2023-04-23', '2023-04-19', 'gan DH FPT');

-- --------------------------------------------------------

--
-- Table structure for table `giohang`
--

CREATE TABLE `giohang` (
  `magh` int(11) NOT NULL,
  `masp` int(11) DEFAULT NULL,
  `makh` int(11) DEFAULT NULL,
  `maddh` int(11) DEFAULT NULL,
  `soluong` int(11) DEFAULT NULL,
  `diachi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tenhang` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `giasanpham` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hinhsanpham` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hinhsanpham`
--

CREATE TABLE `hinhsanpham` (
  `maha` int(11) NOT NULL,
  `tenha` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `masp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `makh` int(11) NOT NULL,
  `tenkh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `diachi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dienthoai` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `gioitinh` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinhanhkh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`makh`, `tenkh`, `diachi`, `email`, `dienthoai`, `gioitinh`, `password`, `hinhanhkh`) VALUES
(10, 'Nguyễn Thế Nguyễn', 'ap 7 xa vinh vien a', 'thenguyen@gmail.com', '0963493525', NULL, '4297f44b13955235245b2497399d7a93', '20220906195318_z3291000804057_8da4f78de3586c70a6b5ee84df06b0a3.jpg'),
(11, 'Nguyễn Hoàng Duy Quang', 'Vĩnh Long', 'duyquang@gmail.com', '0898546429', NULL, 'e10adc3949ba59abbe56e057f20f883e', '20220909142448_z3709102498360_3c30a03ba0ab900397120a13e02e4a80.jpg'),
(12, 'BaoPhan', 'Gan truong dai hoc nam can tho', 'nhatpro3q2000@gmail.com', '055445455454', NULL, '4297f44b13955235245b2497399d7a93', 'avata.png'),
(13, 'bao', 'gan DH FPT', 'cungdanhbotay@gmail.com', '036696886', NULL, '202cb962ac59075b964b07152d234b70', 'avata.png');

-- --------------------------------------------------------

--
-- Table structure for table `loaisanpham`
--

CREATE TABLE `loaisanpham` (
  `malh` int(11) NOT NULL,
  `tenloai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loaisanpham`
--

INSERT INTO `loaisanpham` (`malh`, `tenloai`) VALUES
(8, 'RACKET'),
(9, 'CLOTHES'),
(10, 'ACCESSORIES'),
(11, 'SHOES');

-- --------------------------------------------------------

--
-- Table structure for table `nhacungcap`
--

CREATE TABLE `nhacungcap` (
  `mancc` int(11) NOT NULL,
  `tenncc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `diachincc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dienthoaincc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `emailncc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='table nha cung cap';

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `manv` int(11) NOT NULL,
  `hoten` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ngaysinhnv` date DEFAULT NULL,
  `diachinv` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `luongnv` decimal(20,6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`manv`, `hoten`, `ngaysinhnv`, `diachinv`, `luongnv`) VALUES
(5, 'bao phan', '2000-01-01', 'Tan Hung Cai Nuoc Ca Mau', '80000.000000');

-- --------------------------------------------------------

--
-- Table structure for table `phananh`
--

CREATE TABLE `phananh` (
  `tenpa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `motapa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `masp` int(11) NOT NULL,
  `maddh` int(11) NOT NULL,
  `makh` int(11) NOT NULL,
  `mapa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `masp` int(11) NOT NULL,
  `tenhang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `math` int(11) NOT NULL DEFAULT 0,
  `giamoi` decimal(20,6) NOT NULL DEFAULT 0.000000,
  `hinhsp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `soluong` int(11) NOT NULL DEFAULT 0,
  `donvitinh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `giacu` decimal(20,6) NOT NULL DEFAULT 0.000000,
  `tukhoa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mota` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `malh` int(11) NOT NULL DEFAULT 0,
  `object1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `object2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `object3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `object4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `object5` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `object6` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `object7` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `object8` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `object9` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `object10` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `object11` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='table san pham';

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`masp`, `tenhang`, `math`, `giamoi`, `hinhsp`, `soluong`, `donvitinh`, `giacu`, `tukhoa`, `mota`, `malh`, `object1`, `object2`, `object3`, `object4`, `object5`, `object6`, `object7`, `object8`, `object9`, `object10`, `object11`) VALUES
(28, ' ZERV Manila T-shirt Light Blue', 15, '39.000000', '2.jpg', 20, '$', '54.000000', NULL, '<p>clothes</p>\r\n', 9, ' ZERV', 'blue', 'No', 'No', ' XS / S / M / L / XL / XXL / XXXL', 'No', 'Men', 'No', 'No', 'No', 'No'),
(31, ' ZERV Dragonfly Classic Z33', 15, '54.000000', '5.jpg', 20, '$', '100.000000', NULL, '<p>racket</p>\r\n', 8, ' ZERV', ' Green', ' Normal (83-87 grams)', ' Head heavy', ' Amateur / Exerciser / Youth', ' Allround', ' Unisex', ' Excluded', ' 72', ' Medium', ' Graphite'),
(32, ' Li-Ning AXForce 9', 15, '39.000000', 'vot-cau-long-lining-axforce-9-dec.jpg', 20, '$', '100.000000', NULL, '<p>clothes</p>\r\n', 8, 'Li-Ning', ' Black', ' Normal (83-87 grams)', ' Head heavy', ' Beginner / Amateur / Exerciser', ' Power', ' Head heavy', ' Included', ' 72', ' Flexible', ' Carbon'),
(33, ' ZERV Dragonfly Elite Z35', 15, '79.000000', '7.jpg', 20, '$', '109.000000', NULL, '<p>racket</p>\r\n', 8, ' ZERV', ' Blue / Yellow', ' Light (82 grams or less)', ' Head light', ' Amateur / Exerciser / Youth', ' Allround', ' Unisex', ' Excluded', ' 72', 'Medium', 'Graphite'),
(34, ' Yonex Astrox 100 ZZ Kurenai', 15, '189.000000', '9.jpg', 20, '$', '239.000000', NULL, '<p>racket</p>\r\n', 8, ' Yonex', ' Black / Red', ' Normal (83-87 grams)', ' Head heavy', ' Practiced / Tournament player', ' Power', ' Head heavy', ' Excluded', ' 76', ' Very Stiff', ' Graphite / Namd'),
(37, ' ZERV Badminton Cover', 15, '6.000000', '13.jpg', 20, '$', '7.000000', NULL, '<p>cover</p>\r\n', 10, ' ZERV', 'Black', 'No', 'No', 'No', 'No', ' Women and Men', 'No', 'No', 'No', 'No'),
(39, '  Yonex Arcsaber 11 Pro 3UG4 Yonex-Arcsaber-11-Pro-p', 15, '174.000000', '16.jpg', 20, '$', '219.000000', NULL, '<p>racket</p>\r\n', 8, ' Yonex', ' Black / Red', ' Heavy (88 grams or more)', ' Even balance', ' Exerciser / Practiced / Tournament player', ' Control / Allround', ' Even balance', ' Excluded', ' 76', ' Stiff', ' Graphite'),
(41, 'Nike Court Lite', 20, '39.000000', 'images.jpg', 20, '$', '209.000000', NULL, '<p>run&nbsp;</p>\r\n', 11, 'Nike', 'white', 'No', 'No', ' XS / S / M / L / XL / XXL / XXXL', 'No', 'No', 'No', 'No', 'No', 'No'),
(42, 'Nike Mercurial Air Zoom Ultra SE', 20, '550.000000', '3a60f2a04bd0.jpg', 19, '$', '1100.000000', NULL, '<p>run</p>\r\n', 11, 'Nike', ' Black / White', 'No', 'No', ' XS / S / M / L / XL / XXL / XXXL', 'No', ' Women and Men', 'No', 'No', 'No', 'No'),
(43, 'Adidas Wucht P5.1', 21, '1000.000000', 's-l1600.jpg', 20, '$', '2500.000000', NULL, '<p>run</p>\r\n', 11, 'Adidas', 'Red', 'No', 'No', ' XS / S / M / L / XL / XXL / XXXL', 'No', ' Women and Men', 'No', 'No', 'No', 'No'),
(44, ' Adidas Handball Spezial', 21, '999.000000', 'images (1).jpg', 20, '$', '1500.000000', NULL, '<p>run</p>\r\n', 11, 'Adidas', 'Black', 'No', 'No', ' XS / S / M / L / XL / XXL / XXXL', 'No', 'Men', 'No', 'No', 'No', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `thamso`
--

CREATE TABLE `thamso` (
  `mats` int(11) NOT NULL,
  `tents` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `thuonghieu`
--

CREATE TABLE `thuonghieu` (
  `math` int(11) NOT NULL,
  `tenth` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `diachith` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dienthoaith` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `emailth` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `malh` int(11) DEFAULT NULL,
  `hinhanhth` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `thuonghieu`
--

INSERT INTO `thuonghieu` (`math`, `tenth`, `diachith`, `dienthoaith`, `emailth`, `malh`, `hinhanhth`) VALUES
(15, ' ZERV', '49 tran hoang na', '023678598', 'abc@gmail.com', 8, NULL),
(18, ' Li-Ning', '49 tran hoang na', '0334696968', 'abc@gmail.com', 8, NULL),
(19, 'Yonex', '49 tran hoang na', '0334696968', 'abc@gmail.com', 8, NULL),
(20, 'Nike', '49 tran hoang na', '0334696968', 'abc@gmail.com', 11, NULL),
(21, 'Adidas', '49 tran hoang na', '0334696968', 'abc@gmail.com', 11, NULL),
(22, 'Donexpro', '49 tran hoang na', '0334696968', 'abc@gmail.com', 9, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tintuc`
--

CREATE TABLE `tintuc` (
  `matt` int(11) NOT NULL,
  `tieude` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `noidung` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hinhanhtt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tintuc`
--

INSERT INTO `tintuc` (`matt`, `tieude`, `noidung`, `hinhanhtt`) VALUES
(1, 'Thủ tướng chỉ đạo tổ chức thăm hỏi, hỗ trợ người b', 'Công điện nêu rõ, hồi 20 giờ 48 phút ngày 6/9/2022, xảy ra vụ cháy cơ sở kinh doanh dịch vụ Karaoke tại số 166C gây hậu quả đặc biệt nghiêm trọng, làm nhiều người chết. ', 'tintuc1.png'),
(2, 'Toyota Việt Nam ra mắt Toyota Lạng Sơn', 'Toyota Lạng Sơn được xây dựng trên diện tích 6.818m2 với 3 khu vực chính: phòng trưng bày sản phẩm, khu vực phòng chờ cho khách hàng và xưởng dịch vụ. Khu vực xưởng được thiết kế với 28 khoang sửa chữa, bao gồm 18 khoang bảo dưỡng nhanh/sửa chữa chung và 10 khoang sửa chữa đồng sơn được trang bị phòng sơn hiện đại, hệ thống khuấy sơn và pha màu trong khu vực khép kín, đảm bảo vệ sinh môi trường. Đặc biệt, Toyota Lạng Sơn có khu vực phòng trưng bày, phòng chờ khách hàng rộng rãi, thiết kế hiện đại mang lại cho khách hàng cảm giác thoải mái khi tới đại lý sử dụng dịch vụ.', 'tintuc2.png'),
(3, 'Cựu hiệu phó dâm ô nữ sinh ở Tây Ninh bị tuyên phạ', 'Theo cáo trạng, khoảng 8h30 ngày 10/5, tại Trường THCS Long Khánh (huyện Bến Cầu, tỉnh Tây Ninh), ông Nguyễn Văn Trác là Phó hiệu trưởng thấy cháu C. (SN 2007) là học sinh của trường đang nghỉ giải lao tại sân trường sau khi thi hết môn, liền gọi cháu C. lên phòng làm việc riêng.', 'tintuc3.png');

-- --------------------------------------------------------

--
-- Table structure for table `yeuthich`
--

CREATE TABLE `yeuthich` (
  `mayt` int(11) NOT NULL,
  `makh` int(11) DEFAULT NULL,
  `masp` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `yeuthich`
--

INSERT INTO `yeuthich` (`mayt`, `makh`, `masp`) VALUES
(46, 13, 37),
(47, 13, 32),
(48, 13, 42),
(49, 13, 41);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`mabl`),
  ADD KEY `FK_binhluan_sanpham` (`masp`),
  ADD KEY `FK_binhluan_khachhang` (`makh`);

--
-- Indexes for table `chitietdathang`
--
ALTER TABLE `chitietdathang`
  ADD PRIMARY KEY (`mactdh`),
  ADD KEY `FK_chitietdathang_sanpham` (`masp`),
  ADD KEY `FK_chitietdathang_dondathang` (`maddh`),
  ADD KEY `FK_chitietdathang_giohang` (`magh`);

--
-- Indexes for table `dondathang`
--
ALTER TABLE `dondathang`
  ADD PRIMARY KEY (`maddh`),
  ADD KEY `FK_dondathang_khachhang` (`makh`),
  ADD KEY `FK_dondathang_nhanvien` (`manv`);

--
-- Indexes for table `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`magh`),
  ADD KEY `FK_giohang_sanpham` (`masp`),
  ADD KEY `FK_giohang_khachhang` (`makh`),
  ADD KEY `FK_giohang_dondathang` (`maddh`);

--
-- Indexes for table `hinhsanpham`
--
ALTER TABLE `hinhsanpham`
  ADD PRIMARY KEY (`maha`),
  ADD KEY `FK__sanpham` (`masp`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`makh`);

--
-- Indexes for table `loaisanpham`
--
ALTER TABLE `loaisanpham`
  ADD PRIMARY KEY (`malh`);

--
-- Indexes for table `nhacungcap`
--
ALTER TABLE `nhacungcap`
  ADD PRIMARY KEY (`mancc`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`manv`);

--
-- Indexes for table `phananh`
--
ALTER TABLE `phananh`
  ADD PRIMARY KEY (`mapa`),
  ADD KEY `FK_phananh_dondathang` (`maddh`),
  ADD KEY `FK_phananh_khachhang` (`makh`),
  ADD KEY `FK_phananh_sanpham` (`masp`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`masp`),
  ADD KEY `FK_sanpham_loaisanpham` (`malh`),
  ADD KEY `FK_sanpham_thuonghieu` (`math`);

--
-- Indexes for table `thamso`
--
ALTER TABLE `thamso`
  ADD PRIMARY KEY (`mats`);

--
-- Indexes for table `thuonghieu`
--
ALTER TABLE `thuonghieu`
  ADD PRIMARY KEY (`math`) USING BTREE,
  ADD KEY `FK_thuonghieu_loaisanpham` (`malh`);

--
-- Indexes for table `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`matt`);

--
-- Indexes for table `yeuthich`
--
ALTER TABLE `yeuthich`
  ADD PRIMARY KEY (`mayt`),
  ADD KEY `FK__khachhang` (`makh`),
  ADD KEY `FK_yeuthich_sanpham` (`masp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `mabl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `chitietdathang`
--
ALTER TABLE `chitietdathang`
  MODIFY `mactdh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `dondathang`
--
ALTER TABLE `dondathang`
  MODIFY `maddh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `giohang`
--
ALTER TABLE `giohang`
  MODIFY `magh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `hinhsanpham`
--
ALTER TABLE `hinhsanpham`
  MODIFY `maha` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `makh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `loaisanpham`
--
ALTER TABLE `loaisanpham`
  MODIFY `malh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `nhacungcap`
--
ALTER TABLE `nhacungcap`
  MODIFY `mancc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `manv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `phananh`
--
ALTER TABLE `phananh`
  MODIFY `mapa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `masp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `thamso`
--
ALTER TABLE `thamso`
  MODIFY `mats` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `thuonghieu`
--
ALTER TABLE `thuonghieu`
  MODIFY `math` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tintuc`
--
ALTER TABLE `tintuc`
  MODIFY `matt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `yeuthich`
--
ALTER TABLE `yeuthich`
  MODIFY `mayt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `FK_binhluan_khachhang` FOREIGN KEY (`makh`) REFERENCES `khachhang` (`makh`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_binhluan_sanpham` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`masp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `chitietdathang`
--
ALTER TABLE `chitietdathang`
  ADD CONSTRAINT `FK_chitietdathang_dondathang` FOREIGN KEY (`maddh`) REFERENCES `dondathang` (`maddh`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_chitietdathang_giohang` FOREIGN KEY (`magh`) REFERENCES `giohang` (`magh`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_chitietdathang_sanpham` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`masp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dondathang`
--
ALTER TABLE `dondathang`
  ADD CONSTRAINT `FK_dondathang_khachhang` FOREIGN KEY (`makh`) REFERENCES `khachhang` (`makh`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_dondathang_nhanvien` FOREIGN KEY (`manv`) REFERENCES `nhanvien` (`manv`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `FK_giohang_dondathang` FOREIGN KEY (`maddh`) REFERENCES `dondathang` (`maddh`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_giohang_khachhang` FOREIGN KEY (`makh`) REFERENCES `khachhang` (`makh`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_giohang_sanpham` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`masp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hinhsanpham`
--
ALTER TABLE `hinhsanpham`
  ADD CONSTRAINT `FK__sanpham` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`masp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `phananh`
--
ALTER TABLE `phananh`
  ADD CONSTRAINT `FK_phananh_dondathang` FOREIGN KEY (`maddh`) REFERENCES `dondathang` (`maddh`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_phananh_khachhang` FOREIGN KEY (`makh`) REFERENCES `khachhang` (`makh`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_phananh_sanpham` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`masp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `FK_sanpham_loaisanpham` FOREIGN KEY (`malh`) REFERENCES `loaisanpham` (`malh`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_sanpham_thuonghieu` FOREIGN KEY (`math`) REFERENCES `thuonghieu` (`math`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `thuonghieu`
--
ALTER TABLE `thuonghieu`
  ADD CONSTRAINT `FK_thuonghieu_loaisanpham` FOREIGN KEY (`malh`) REFERENCES `loaisanpham` (`malh`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `yeuthich`
--
ALTER TABLE `yeuthich`
  ADD CONSTRAINT `FK__khachhang` FOREIGN KEY (`makh`) REFERENCES `khachhang` (`makh`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_yeuthich_sanpham` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`masp`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
