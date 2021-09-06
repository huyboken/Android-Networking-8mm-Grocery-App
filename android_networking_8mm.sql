-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 08, 2021 lúc 03:27 PM
-- Phiên bản máy phục vụ: 10.4.18-MariaDB
-- Phiên bản PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `android_networking_8mm`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  `admin_created` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `admin_created`) VALUES
(1, 'Bùi Trung Bắc', 'bac@gmail.com', '12345678', '07/07/2021'),
(2, 'Hasazo', 'hasazo@gmail.com', '12345678', '07/07/2021');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banners`
--

CREATE TABLE `banners` (
  `banner_id` int(10) NOT NULL,
  `banner_image` varchar(100) NOT NULL,
  `banner_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `banners`
--

INSERT INTO `banners` (`banner_id`, `banner_image`, `banner_date`) VALUES
(4, '152069banner1.jpg', '2021-07-09 18:48:41'),
(5, '220501banner2.jpg', '2021-07-09 18:48:58'),
(6, '390593banner3.jpg', '2021-07-09 18:49:11'),
(7, '203907banner4.jpg', '2021-07-09 18:49:22'),
(8, '48512banner5.jpg', '2021-07-09 18:49:33'),
(9, '493304banner6.jpg', '2021-07-09 18:49:42'),
(10, '534567banner7.jpg', '2021-07-09 18:49:55'),
(11, '312765banner8.jpg', '2021-07-09 18:50:06'),
(12, '192331banner9.jpg', '2021-07-09 18:50:17'),
(13, '368893banner10.jpg', '2021-07-09 18:50:27'),
(14, '612284banner11.jpg', '2021-07-09 18:50:35');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(10) NOT NULL,
  `cat_title` varchar(100) NOT NULL,
  `cat_image` varchar(100) NOT NULL,
  `cat_discount` varchar(100) NOT NULL,
  `cat_description` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`, `cat_image`, `cat_discount`, `cat_description`, `date`) VALUES
(29, 'Bia, nước giải khát', '632564beer_beverages_icon.png', 'GIẢM GIÁ TỚI 73%', 'A', '2021-07-06 03:46:59'),
(30, 'Dầu ăn, gia vị', '485135cookingoil_spice_icon.png', 'GIẢM GIÁ TỚI 20%', 'B', '2021-07-06 03:53:47'),
(31, 'Kẹo bánh đồ ăn vặt', '533277sweets_snacks_icon.png', 'GIẢM GIÁ TỚI 58%', 'C', '2021-07-06 04:00:41'),
(32, 'Sữa', '769677milk_icon.png', 'GIẢM GIÁ TỚI 92%', 'D', '2021-07-06 04:03:18'),
(33, 'Hóa phẩm và giấy', '322143chemicals_paper_icon.png', 'GIẢM GIÁ TỚI 50%', 'E', '2021-07-06 04:20:18'),
(34, 'Chăm sóc cá nhân', '921737personal_care_icon.png', 'GIẢM GIÁ TỚI 53%', 'F', '2021-07-06 04:22:14'),
(35, 'Tả bỉm đồ trẻ em', '482068baby_diaper_icon.png', 'GIẢM GIÁ TỚI 75%', 'G', '2021-07-06 04:32:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(30) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `strip_banner`
--

CREATE TABLE `strip_banner` (
  `strip_banner_id` int(10) NOT NULL,
  `strip_banner_image` varchar(100) NOT NULL,
  `strip_banner_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `strip_banner`
--

INSERT INTO `strip_banner` (`strip_banner_id`, `strip_banner_image`, `strip_banner_date`) VALUES
(10, 'strip_banner_image.jpg', '2021-07-14 02:58:29'),
(11, 'strip_banner_image.jpg', '2021-07-14 02:59:19'),
(12, 'strip_banner_image.jpg', '2021-07-14 03:00:25'),
(13, 'strip_banner_image.jpg', '2021-07-14 03:07:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_phone` varchar(100) NOT NULL,
  `date_created` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`, `user_phone`, `date_created`) VALUES
(12, 'bac', 'bac@gmail.com', '123', '', '2021-07-02 22:24:12'),
(13, 'bac2', 'bac2@gmail.com', '12345', '', '2021-07-02 22:26:22'),
(14, '', '', '', '123', '2021-07-02 22:35:51'),
(17, '', '', '', '0339287537', '2021-07-03 13:42:09'),
(18, '', '', '', '0961103428', '2021-07-03 16:18:37'),
(19, 'Bắc', 'baczz@gmail.com', '12345', '', '2021-07-03 16:39:50'),
(20, 'Bùi Trung Bắc', 'bacbui@gmail.com', '12345', '', '2021-07-03 21:10:21'),
(21, 'bac', 'ff@gmail.com', '12345678', '', '2021-08-04 17:21:34');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Chỉ mục cho bảng `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`banner_id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `strip_banner`
--
ALTER TABLE `strip_banner`
  ADD PRIMARY KEY (`strip_banner_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `banners`
--
ALTER TABLE `banners`
  MODIFY `banner_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `strip_banner`
--
ALTER TABLE `strip_banner`
  MODIFY `strip_banner_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
