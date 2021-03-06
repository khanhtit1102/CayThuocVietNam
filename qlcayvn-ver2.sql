-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2021 at 12:25 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qlcayvn`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `phone` char(15) DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1,
  `level` tinyint(4) DEFAULT 1,
  `avatar` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `address`, `email`, `password`, `phone`, `status`, `level`, `avatar`, `created_at`, `update_at`) VALUES
(2, 'GamNT', 'nha A10 p1981', 'ngogam1997@gmail.com', '202cb962ac59075b964b07152d234b70', '0389444395', 1, 2, NULL, NULL, '2021-05-21 10:16:53');

-- --------------------------------------------------------

--
-- Table structure for table `baithuoc`
--

CREATE TABLE `baithuoc` (
  `maBaiThuoc` int(11) NOT NULL,
  `tenBaiThuoc` varchar(200) DEFAULT NULL,
  `maCayThuoc` int(11) DEFAULT NULL,
  `id` int(11) DEFAULT NULL,
  `tenBenh` varchar(200) DEFAULT NULL,
  `cachdung` text DEFAULT NULL,
  `anh` varchar(200) DEFAULT NULL,
  `tacdung` varchar(200) DEFAULT NULL,
  `kiengky` varchar(200) DEFAULT NULL,
  `trangthai` tinyint(4) DEFAULT 1,
  `slug` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `baithuoc`
--

INSERT INTO `baithuoc` (`maBaiThuoc`, `tenBaiThuoc`, `maCayThuoc`, `id`, `tenBenh`, `cachdung`, `anh`, `tacdung`, `kiengky`, `trangthai`, `slug`) VALUES
(2, 'Ch???a c???m m??u', NULL, 2, 'C???m m??u', 'rau di???p c?? 2 kg, b???ch c???p 1 kg, t???t c??? s???y kh?? t??n b???t, ng??y u???ng 6-12 g, chia 3 l???n.', 'cammau.jpg', 'd??ng khi b??? xu???t huy???t do tr??', '', 1, 'chua-cam-mau'),
(3, 'Ch???a b???nh x????ng, kh???p', NULL, 2, 'Phong th???p ??au nh???c, g??y x????ng (sau khi ???? c??? ?????nh l???i): ', 'L???y m???t n???m c??y hoa c???t l???n t????i, gi?? n??t, ?????p v??o ch??? ??au (V??n S??n trung th???o d?????c).', 'xuongkhop.jpg', '', '', 1, 'chua-benh-xuong-khop');

-- --------------------------------------------------------

--
-- Table structure for table `binhluan`
--

CREATE TABLE `binhluan` (
  `id_binhluan` int(11) NOT NULL,
  `noidung` text DEFAULT NULL,
  `anh` text DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `maCayThuoc` int(11) DEFAULT NULL,
  `maBaiThuoc` int(11) DEFAULT NULL,
  `comment_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `binhluan`
--

INSERT INTO `binhluan` (`id_binhluan`, `noidung`, `anh`, `id_user`, `maCayThuoc`, `maBaiThuoc`, `comment_at`) VALUES
(10, 'ca ??c sac a ', 'NULL', 9, 18, NULL, '2021-06-01 12:03:34'),
(11, 'B??nh lu???n ??? b??i thu???c', '4425577.png', 9, NULL, 2, '2021-06-01 00:53:18');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `banner` varchar(200) DEFAULT '0',
  `home` tinyint(4) DEFAULT NULL,
  `slug` varchar(200) DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `image`, `banner`, `home`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'C??y Thu???c', NULL, '0', 1, 'cay-thuoc', 1, NULL, NULL),
(2, 'B??i Thu???c', NULL, '0', 1, 'bai-thuoc', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `caythuoc`
--

CREATE TABLE `caythuoc` (
  `maCayThuoc` int(11) NOT NULL,
  `tenCayThuoc` varchar(200) NOT NULL,
  `tenKhac` varchar(200) NOT NULL,
  `tenKhoaHoc` varchar(200) NOT NULL,
  `anh` text NOT NULL,
  `gioi` varchar(100) NOT NULL,
  `bo` varchar(100) NOT NULL,
  `ho` varchar(100) NOT NULL,
  `tong` varchar(100) NOT NULL,
  `chi` varchar(100) NOT NULL,
  `loai` varchar(100) NOT NULL,
  `mota` text NOT NULL,
  `tinhchat` text NOT NULL,
  `id` int(11) NOT NULL,
  `slug` varchar(200) DEFAULT NULL,
  `home` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `caythuoc`
--

INSERT INTO `caythuoc` (`maCayThuoc`, `tenCayThuoc`, `tenKhac`, `tenKhoaHoc`, `anh`, `gioi`, `bo`, `ho`, `tong`, `chi`, `loai`, `mota`, `tinhchat`, `id`, `slug`, `home`) VALUES
(13, 'C??y Hoa C???t L???n', '', '', '112145_hoa-cut-lon-1.jpg', 'Plantae', 'Asterales', 'Asteraceae', 'Eupatorieae', 'Ageratum', 'A. conyzoides', 'Hoa C???t L???n', '', 1, 'cay-hoa-cut-lon', 0),
(14, 'C??y Rau Di???p C??', '', '', 'rau-diep-ca (1).jpg', 'Plantae', 'Piperales', 'Saururaceae', '', '', '', '- Ph??n b???:\r\n    Lo??i c???a l???c ?????a ch??u ??, ph??n b??? t??? ???n ????? qua Trung Qu???c, Nh???t B???n, Th??i Lan, c??c n?????c ????ng Nam ??. ??? Vi???t Nam, di???p c?? m???c hoang ??? ch??? ???m ?????t.\r\n?????c ??i???m: \r\n    L?? m???t lo???i c??? nh???, m???c quanh n??m (evergreen), ??a ch??? ???m ?????t, c?? th??n r??? m???c ng???m d?????i ?????t. R??? nh??? m???c ??? c??c ?????t. L?? m???c c??ch (so le), h??nh tim, c?? b???, ?????u l?? h??i nh???n hay nh???n h???n, khi v?? ra c?? m??i tanh nh?? m??i c??. C??y th???o cao 15???50 cm; th??n m??u l???c ho???c t??m ?????, m???c ?????ng cao 40 cm, c?? l??ng ho???c ??t l??ng. C???m hoa nh??? h??nh b??ng bao b???i 4 l?? b???c m??u tr???ng, trong ch???a nhi???u hoa nh??? m??u v??ng nh???t, tr??ng to??n b??? b??? ngo??i c???a c???m hoa v?? l?? b???c gi???ng nh?? m???t c??y hoa ????n ?????c. Qu??? nang m??? ??? ?????nh, h???t h??nh tr??i xoan, nh???n. M??a hoa th??ng 5-8, qu??? th??ng 7-10.\r\n- Th??nh ph???n h??a h???c;\r\n      L?? m???t lo???i c??? nh???, m???c quanh n??m (evergreen), ??a ch??? ???m ?????t, c?? th??n r??? m???c ng???m d?????i ?????t. R??? nh??? m???c ??? c??c ?????t. L?? m???c c??ch (so le), h??nh tim, c?? b???, ?????u l?? h??i nh???n hay nh???n h???n, khi v?? ra c?? m??i tanh nh?? m??i c??. C??y th???o cao 15???50 cm; th??n m??u l???c ho???c t??m ?????, m???c ?????ng cao 40 cm, c?? l??ng ho???c ??t l??ng. C???m hoa nh??? h??nh b??ng bao b???i 4 l?? b???c m??u tr???ng, trong ch???a nhi???u hoa nh??? m??u v??ng nh???t, tr??ng to??n b??? b??? ngo??i c???a c???m hoa v?? l?? b???c gi???ng nh?? m???t c??y hoa ????n ?????c. Qu??? nang m??? ??? ?????nh, h???t h??nh tr??i xoan, nh???n. M??a hoa th??ng 5-8, qu??? th??ng 7-10.\r\n- Ch???a b???nh:\r\n    Th?????ng d??ng t????i. C?? th??? ph??i hay s???y kh?? ????? d??ng d???n ho???c s???c n?????c u???ng.\r\n- T??nh v???, t??c d???ng:\r\n    Theo ????ng y, gi???p c?? v??? cay, chua, m??i tanh, t??nh m??t (h??i l???nh, theo Hu), h??i ?????c, t??n kh??, t??n ??? (Kariyone & Kimure), cay v??o ph??? kinh.\r\n- L??u ??:\r\n    Nh???ng ng?????i nguy??n kh?? h??, c?? ch???ng ??au ch??n kh??ng n??n d??ng. Nh???ng ng?????i kh??ng ph???i th???p nhi???t v?? sang ?????c c??ng kh??ng n??n d??ng.\r\n- Tr??? B???nh: \r\n   Kh??ng vi??m, c???m m??u, s???t, s???t xu???t huy???t, vi??m tai gi???a, vi??m ph???i do s???i,...', '', 1, 'cay-rau-diep-ca', 0),
(16, 'C??y Ng???i C???u', '', '', 'ng???i c???u_1.png', '', '', '', '', '', '', '', '', 1, 'cay-ngai-cuu', 0),
(18, 'C??y Rau Ng??t', '', '', 'hoa-giong-rau-ngot-6.jpg', '', '', '', '', '', '', '', '', 1, 'cay-rau-ngot', 0),
(19, 'Itaque repudiandae consectetur.', '', '', 'icons8-facebook-512.png|BG.jpg|icons8-near-me-64.png|', '', '', '', '', '', '', '', '', 1, 'itaque-repudiandae-consectetur', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` char(15) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `avatar` varchar(100) DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1,
  `token` tinyint(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `address`, `password`, `avatar`, `status`, `token`, `created_at`, `update_at`) VALUES
(9, 'Ngo Thi Gam', 'ngogam@gmail.com', '0378448101', 'Nam ?????nh', '202cb962ac59075b964b07152d234b70', NULL, 1, NULL, NULL, NULL),
(13, 'Gam', 'ngogam3456@gmail.com', '0378448101', 'Y??n Nh??n- ?? y??n-Nam ?????nh', '827ccb0eea8a706c4c34a16891f84e7b', NULL, 1, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `baithuoc`
--
ALTER TABLE `baithuoc`
  ADD PRIMARY KEY (`maBaiThuoc`),
  ADD KEY `id` (`id`),
  ADD KEY `maCayThuoc` (`maCayThuoc`);

--
-- Indexes for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id_binhluan`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `maBaiThuoc` (`maBaiThuoc`),
  ADD KEY `maCayThuoc` (`maCayThuoc`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `caythuoc`
--
ALTER TABLE `caythuoc`
  ADD PRIMARY KEY (`maCayThuoc`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `baithuoc`
--
ALTER TABLE `baithuoc`
  MODIFY `maBaiThuoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id_binhluan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `caythuoc`
--
ALTER TABLE `caythuoc`
  MODIFY `maCayThuoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `baithuoc`
--
ALTER TABLE `baithuoc`
  ADD CONSTRAINT `baithuoc_ibfk_1` FOREIGN KEY (`id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `baithuoc_ibfk_2` FOREIGN KEY (`maCayThuoc`) REFERENCES `caythuoc` (`maCayThuoc`);

--
-- Constraints for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `binhluan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `binhluan_ibfk_3` FOREIGN KEY (`maBaiThuoc`) REFERENCES `baithuoc` (`maBaiThuoc`),
  ADD CONSTRAINT `binhluan_ibfk_4` FOREIGN KEY (`maCayThuoc`) REFERENCES `caythuoc` (`maCayThuoc`);

--
-- Constraints for table `caythuoc`
--
ALTER TABLE `caythuoc`
  ADD CONSTRAINT `caythuoc_ibfk_1` FOREIGN KEY (`id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
