-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 05, 2023 lúc 02:47 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `banthucpham`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category_product`
--

CREATE TABLE `category_product` (
  `id` int(11) NOT NULL,
  `cate_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `category_product`
--

INSERT INTO `category_product` (`id`, `cate_name`) VALUES
(25, 'Đặc sản'),
(26, 'Hải sản'),
(27, 'Khai vị'),
(28, 'Món chính');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `hten` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `noidung` varchar(500) NOT NULL,
  `ngaycmt` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`id`, `hten`, `email`, `noidung`, `ngaycmt`) VALUES
(7, 'huyen', 'huyenne@gmail.com', 'shop uy tín', '4/12/2023');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ordertb`
--

CREATE TABLE `ordertb` (
  `id` int(11) NOT NULL,
  `hten` varchar(50) NOT NULL,
  `sdt` varchar(11) NOT NULL,
  `sluong` int(11) NOT NULL,
  `ngay` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `ordertb`
--

INSERT INTO `ordertb` (`id`, `hten`, `sdt`, `sluong`, `ngay`) VALUES
(0, 'Nhan', '0901016787', 3, '2022-03-05 06:47:00'),
(0, 'Hoang', '0901016787', 4, '2022-03-05 18:45:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id_product` int(11) NOT NULL,
  `name_product` varchar(200) NOT NULL,
  `code_product` varchar(100) NOT NULL,
  `regular_price` varchar(100) DEFAULT NULL,
  `mota` text NOT NULL,
  `cate_id` int(11) NOT NULL,
  `thumbnail` varchar(250) NOT NULL,
  `date_product` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id_product`, `name_product`, `code_product`, `regular_price`, `mota`, `cate_id`, `thumbnail`, `date_product`) VALUES
(61, 'Món ăn', 'SP01', '59000', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', 25, 'f11366925ead8740dac733b2a0b1912c.jpg', '2022-03-04'),
(62, 'Món ăn 1', 'SP02', '59000', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', 25, 'f11366925ead8740dac733b2a0b1912c.jpg', '2022-03-04'),
(63, 'Món ăn 3', 'SP03', '59000', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', 26, 'f11366925ead8740dac733b2a0b1912c.jpg', '2022-03-04'),
(64, 'Món ăn 3', 'SP04', '59000', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', 27, 'f11366925ead8740dac733b2a0b1912c.jpg', '2022-03-04'),
(65, 'Món ăn 5', 'SP05', '59000', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', 28, 'f11366925ead8740dac733b2a0b1912c.jpg', '2022-03-04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `pwad` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `lever` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `username`, `pwad`, `email`, `lever`) VALUES
(1, 'huyen', 'e10adc3949ba59abbe56e057f20f883e', 'huyen@gmail.com', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `id_cart` int(20) NOT NULL,
  `id_product` int(20) NOT NULL,
  `tensp` varchar(30) NOT NULL,
  `soluong` int(20) NOT NULL,
  `dongia` int(20) NOT NULL,
  `hinhanhsp` varchar(30) NOT NULL,
  `userName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_cart`
--

INSERT INTO `tbl_cart` (`id_cart`, `id_product`, `tensp`, `soluong`, `dongia`, `hinhanhsp`, `userName`) VALUES
(97, 61, 'Món ăn', 3, 59000, 'f11366925ead8740dac733b2a0b191', 'ngochuyen');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `ten` varchar(50) NOT NULL,
  `sdt` varchar(20) NOT NULL,
  `diachi` varchar(250) NOT NULL,
  `tong` int(11) NOT NULL,
  `tien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `ten`, `sdt`, `diachi`, `tong`, `tien`) VALUES
(2, 'Nhan', '0901016787', 'asdfasdad', 1, 59000),
(3, 'Nhan', '0901016787', 'asdasdada', 1, 59000),
(4, 'Nhan', '0901016787', 'asdasdada', 1, 59000),
(5, 'nh', '036654458', 'vl', 1, 59000),
(6, 'ngochuyen', '0384163818', 'V?nh long', 1, 118000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `email_user` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `pass`, `email_user`) VALUES
(3, 'huyen', '123456', 'ngochuyen@gmail.com'),
(8, 'Nhan', 'd169186c60e1448fc54c37127323b5d5', 'hoangnhan191120@gmail.com'),
(9, 'Hoang', 'd169186c60e1448fc54c37127323b5d5', 'hoangnhan191120@gmail.com'),
(10, 'nhuyen', 'e10adc3949ba59abbe56e057f20f883e', 'ht139944@gmail.com'),
(11, 'ngochuyen', 'e10adc3949ba59abbe56e057f20f883e', 'huyenit200x@gmail.com');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category_product`
--
ALTER TABLE `category_product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`);

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Chỉ mục cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`id_cart`);

--
-- Chỉ mục cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category_product`
--
ALTER TABLE `category_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `id_cart` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
