-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 26, 2024 lúc 06:15 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `bandoan`
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
(28, 'Món chính'),
(29, ' Đồ Uống');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `hten` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `noidung` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ngaycmt` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`id`, `hten`, `email`, `noidung`, `ngaycmt`) VALUES
(8, 'Manh Nguyen', 'nguyenvanmanh2003dl@gmail.com', 'Quan Ban Hang Hoi dat nha', '18/6/2024'),
(9, 'Nguyen Manh', 'manhdz@gmail.com', 'Quán Làm ăn chán', '18/6/2024'),
(10, 'MaxCoder', 'nguyenvanmanh2003dl@gmail.com', 'Quán cho mình xin 1 cốc nước free', '20/6/2024');

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
(3, 'Manh Nguyen', '0852608689', 1000, '2024-06-07 14:31:00');

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
(66, 'Cá Rô Chiên Giòn', 'SP06', '200000', 'Cá rô phi rất nhiều món ăn thơm ngon, hấp dẫn.', 26, 'cachien.jpg', '2024-06-17'),
(67, 'Cá Tra Hấp Bia', 'SP07', '122000', 'Cá tra hấp bia là món ăn hấp dẫn', 26, 'cahap.jpg', '2024-06-17'),
(68, 'Bia 333', 'SP08', '15000', 'Thơm ngon chính hãng bia 333. Bia 333 330ml thùng 24 lon chất lượng bảo đảm', 29, 'bia.jpg', '2024-06-17'),
(69, 'Giả Cầy', 'SP09', '150000', '150000/1kg giả cầy làm từ thịt...', 25, 'GiaCay.jpg', '2024-06-17'),
(70, 'Cua Hoàng Đế', 'SP10', '5000000', 'Cua Hoàng Đế hấp bia. Chỉ cần 1-2 lon bia ', 26, 'CuaHoangde.jpg', '2024-06-17'),
(71, 'Gà Rán MAXCHE', 'SP11', '100000', '100000đ/5 đùi gà chiên , rán tẩm sốt cay', 28, 'GaRan.jpg', '2024-06-17'),
(72, 'Trà Tắc', 'SP12', '10000', 'Trà tắc là loại nước uống được chế biến giữa trà và quả tắc. ', 29, 'traTac.jpg', '2024-06-17'),
(73, 'Nem Chua ', 'SP13', '50000', 'Nem chua là một món ăn sử dụng thịt lợn, lợi dụng men của lá chuối', 25, 'nem-chua-chuan-thanh-hoa.jpg', '2024-06-17'),
(74, 'Trà Sữa Bá Vương', 'SP14', '30000', 'Các tín đồ nghiện “cà kê”, “tà tưa” hiện nay.', 29, 'trasua.png', '2024-06-17'),
(75, 'Rau Muống Xào Tỏi', 'SP15', '50000', 'Rau muống xào tỏi là một món ăn dân giã', 27, 'image2.jpg', '2024-06-17'),
(76, 'Thịt Bò Hầm', 'SP16', '500000', 'Bò hầm tiêu xanh nóng hổi, thơm lừng. ', 28, 'thitbo.jpg', '2024-06-17'),
(77, 'Thịt Kho Tàu', 'SP17', '60000', 'Miếng thịt mềm rục màu đỏ au kèm vị bùi của nước dừa xiêm', 28, 'thit-kho-tau.jpg', '2024-06-17');

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
(4, 'ManhNguyen', 'e10adc3949ba59abbe56e057f20f883e', 'nguyenvanmanh2003dl@gmail.com', 0);

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

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `ten` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `sdt` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `diachi` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tong` int(11) NOT NULL,
  `tien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `ten`, `sdt`, `diachi`, `tong`, `tien`) VALUES
(3, 'Nhan', '0901016787', 'asdasdada', 1, 59000),
(4, 'Nhan', '0901016787', 'asdasdada', 1, 59000),
(5, 'nh', '036654458', 'vl', 1, 59000),
(6, 'ngochuyen', '0384163818', 'V?nh long', 1, 118000),
(7, 'Nguy?n V?n', '0852608689', 'An Tr?ng Th?i B?nh', 2, 1060000),
(8, 'M?nh', '0852608689', 'H? N?i ', 1, 5000000),
(9, 'Nguyen Manh', '0852608689', 'H? N?i Viet Nam', 1, 70000),
(10, 'Nguyễn Mạnh ĐZZ', '0852608689', 'Chợ Nhổn, Hà Nội', 2, 130000);

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
(9, 'Hoang', 'd169186c60e1448fc54c37127323b5d5', 'hoangnhan191120@gmail.com'),
(10, 'nhuyen', 'e10adc3949ba59abbe56e057f20f883e', 'ht139944@gmail.com'),
(11, 'ngochuyen', 'e10adc3949ba59abbe56e057f20f883e', 'huyenit200x@gmail.com'),
(12, 'manh', 'e10adc3949ba59abbe56e057f20f883e', 'nguyenvanmanh2003dl@gmail.com'),
(13, 'ManhNguyen', 'e10adc3949ba59abbe56e057f20f883e', 'nguyenvanmanh200dl@gmail.com');

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
-- Chỉ mục cho bảng `ordertb`
--
ALTER TABLE `ordertb`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `ordertb`
--
ALTER TABLE `ordertb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `id_cart` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
