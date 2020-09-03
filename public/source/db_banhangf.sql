-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 11, 2019 lúc 05:24 PM
-- Phiên bản máy phục vụ: 10.1.39-MariaDB
-- Phiên bản PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_banhangf`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiet_hoadon`
--

CREATE TABLE `chitiet_hoadon` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_hoadon` int(10) NOT NULL,
  `id_sanpham` int(10) NOT NULL,
  `soluong` int(11) NOT NULL,
  `price` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Đang đổ dữ liệu cho bảng `chitiet_hoadon`
--

INSERT INTO `chitiet_hoadon` (`id`, `id_hoadon`, `id_sanpham`, `soluong`, `price`, `created_at`, `updated_at`) VALUES
(19, 16, 17, 1, 4250000, '2019-05-27 09:22:23', '2019-05-27 09:22:23'),
(18, 16, 31, 2, 1000000, '2019-05-27 09:22:23', '2019-05-27 09:22:23'),
(26, 19, 37, 1, 2000000, '2019-06-05 06:46:24', '2019-06-05 06:46:24'),
(27, 19, 38, 1, 3000000, '2019-06-05 06:46:24', '2019-06-05 06:46:24'),
(28, 19, 39, 1, 4000000, '2019-06-05 06:46:24', '2019-06-05 06:46:24'),
(29, 19, 42, 1, 2000000, '2019-06-05 06:46:24', '2019-06-05 06:46:24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_khachhang` int(11) DEFAULT NULL,
  `date_order` date DEFAULT NULL,
  `total` float DEFAULT NULL COMMENT 'tổng tiền',
  `payment` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'hình thức thanh toán',
  `note` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`id`, `id_khachhang`, `date_order`, `total`, `payment`, `note`, `created_at`, `updated_at`) VALUES
(19, 19, '2019-06-05', 11000000, NULL, 'asd', '2019-06-05 06:46:24', '2019-06-05 06:46:24'),
(16, 17, '2019-05-27', 6250000, '', 'asd', '2019-05-27 16:25:27', '2019-05-27 09:22:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`id`, `name`, `gender`, `email`, `address`, `phone_number`, `note`, `created_at`, `updated_at`) VALUES
(17, 'Hoang', 'nam', 'kickoffmanvn@yahoo.com', 'Trịnh Đình Thảo', '0123456677', 'asd', '2019-05-27 09:22:23', '2019-05-27 09:22:23'),
(19, 'hoang2', 'nam', 'kickoffmanvn@yahoo.com', 'qwe', '123', 'asd', '2019-06-05 06:46:24', '2019-06-05 06:46:24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai_sanpham`
--

CREATE TABLE `loai_sanpham` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `loai_sanpham`
--

INSERT INTO `loai_sanpham` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Action Figure', '', 'kirito_Figure.jpg', NULL, NULL),
(2, 'Chibi Figure', '', 'naruto_Figure.jpg', NULL, NULL),
(3, 'Manga', '', 'manga.jpg', NULL, NULL),
(4, 'Các thể loại Figure khác', '', 'zerotwo.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_type` int(10) UNSIGNED DEFAULT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `price` float DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `unit` tinyint(4) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id`, `name`, `id_type`, `description`, `price`, `image`, `unit`, `created_at`, `updated_at`) VALUES
(1, 'Action Figure 1', 1, '', 250000, 'af1.jpg', 3, NULL, NULL),
(2, 'Action Figure 2', 1, '', 500000, 'af2.jpg', 4, NULL, NULL),
(4, 'Action Figure 4', 1, '', 1000000, 'af4.jpg', 8, NULL, NULL),
(5, 'Action Figure 5', 1, '', 1250000, 'af5.jpg', 10, NULL, NULL),
(6, 'Action Figure 6', 1, '', 1500000, 'af6.jpg', 12, NULL, NULL),
(7, 'Action Figure 7', 1, '', 1750000, 'af7.jpg', 14, NULL, NULL),
(8, 'Action Figure 8', 1, '', 2000000, 'af8.jpg', 16, NULL, NULL),
(9, 'Action Figure 9', 1, '', 2250000, 'af9.jpg', 18, NULL, NULL),
(10, 'Action Figure 10', 1, '', 2500000, 'af10.jpg', 20, NULL, NULL),
(11, 'Action Figure 11', 1, '', 2750000, 'af11.jpg', 22, NULL, NULL),
(12, 'Action Figure 12', 1, '', 3000000, 'af12.jpg', 24, NULL, NULL),
(13, 'Action Figure 13', 1, '', 3250000, 'af13.jpg', 26, NULL, NULL),
(14, 'Action Figure 14', 1, '', 3500000, 'af14.jpg', 28, NULL, NULL),
(15, 'Action Figure 15', 1, '', 3750000, 'af15.jpg', 0, NULL, NULL),
(16, 'Action Figure 16', 1, '', 4000000, 'af16.jpg', 1, NULL, NULL),
(17, 'Chibi Figure 1', 2, '', 4250000, 'cf1.jpg', 3, NULL, NULL),
(18, 'Chibi Figure 2', 2, '', 4500000, 'cf2.jpg', 5, NULL, NULL),
(19, 'Chibi Figure 3', 2, '', 4750000, 'cf3.jpg', 7, NULL, NULL),
(20, 'Chibi Figure 4', 2, '', 5000000, 'cf4.jpg', 9, NULL, NULL),
(21, 'Chibi Figure 5', 2, '', 5250000, 'cf5.jpg', 11, NULL, NULL),
(22, 'Chibi Figure 6', 2, '', 5500000, 'cf6.jpg', 13, NULL, NULL),
(23, 'Chibi Figure 7', 2, '', 5750000, 'cf7.jpg', 15, NULL, NULL),
(24, 'Chibi Figure 8', 2, '', 6000000, 'cf8.jpg', 17, NULL, NULL),
(25, 'Chibi Figure 9', 2, '', 6250000, 'cf9.jpg', 19, NULL, NULL),
(26, 'Chibi Figure 10', 2, '', 6500000, 'cf10.jpg', 21, NULL, NULL),
(27, 'Chibi Figure 11', 2, '', 6750000, 'cf11.jpg', 23, NULL, NULL),
(28, 'Chibi Figure 12', 2, '', 7000000, 'cf12.jpg', 25, NULL, NULL),
(29, 'Chibi Figure 13', 2, '', 7250000, 'cf13.jpg', 27, NULL, NULL),
(30, 'Chibi Figure 14', 2, '', 7500000, 'cf14.jpg', 29, NULL, NULL),
(31, 'Manga 1', 3, '', 1000000, 'm1.jpg', 3, NULL, NULL),
(32, 'Manga 2', 3, '', 2000000, 'm2.jpg', 3, NULL, NULL),
(33, 'Manga 3', 3, '', 3000000, 'm3.jpg', 3, NULL, NULL),
(34, 'Manga 4', 3, '', 4000000, 'm4.jpg', 3, NULL, NULL),
(35, 'Manga 5', 3, '', 5000000, 'm5.jpg', 3, NULL, NULL),
(36, 'Manga 6', 3, '', 1000000, 'm6.jpg', 3, NULL, NULL),
(37, 'Figure khác 1', 4, '', 2000000, 'f1.jpg', 0, NULL, NULL),
(38, 'Figure khác 2', 4, '', 3000000, 'f2.jpg', 0, NULL, NULL),
(39, 'Figure khác 3', 4, '', 4000000, 'f3.jpg', 0, NULL, NULL),
(40, 'Figure khác 4', 4, '', 5000000, 'f4.jpg', 0, NULL, NULL),
(41, 'Figure khác 5', 4, '', 1000000, 'f5.jpg', 0, NULL, NULL),
(42, 'Figure khác 6', 4, '', 2000000, 'f6.jpg', 0, NULL, NULL),
(43, 'Figure khác 7', 4, '', 3000000, 'f7.jpg', 0, NULL, NULL),
(44, 'Figure khác 8', 4, '', 4000000, 'f8.jpg', 0, NULL, NULL),
(45, 'Figure khác 9', 4, '', 5000000, 'f9.jpg', 0, NULL, NULL),
(46, 'Figure khác 10', 4, '', 1000000, 'f10.jpg', 0, NULL, NULL),
(47, 'Figure khác 11', 4, '', 2000000, 'f11.jpg', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `phone`, `address`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Huỳnh Đức Huy Hoàng', 'kickoffmanvn@yahoo.com', '$2y$10$txnENiKx2DTj608hxxhLeu32IYS1KF4UH4iUY4HqTs0qfjL7oZWaG', '123456789', 'asd', NULL, '2019-06-04 04:34:43', '2019-06-04 04:34:43'),
(2, 'hoang', 'kickoffmanvn1@yahoo.com', '$2y$10$.euLId8QS4lTbdTpOEG2TuukITgdXnSi9U1wNfO0/1dcbHr6x5Xse', '123', 'Street Address', NULL, '2019-06-05 06:49:53', '2019-06-05 06:49:53'),
(3, 'huy hoang', 'kickoffmanvn2@gmail.com', '$2y$10$1j5LcL.HfcmB3TQzZg7X2OrwLJ0EhfY98r6m.Lx07MISMKRFzXgwW', '1234', 'qwe', NULL, '2019-06-10 06:10:28', '2019-06-10 06:10:28');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitiet_hoadon`
--
ALTER TABLE `chitiet_hoadon`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `loai_sanpham`
--
ALTER TABLE `loai_sanpham`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_type` (`id_type`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chitiet_hoadon`
--
ALTER TABLE `chitiet_hoadon`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `loai_sanpham`
--
ALTER TABLE `loai_sanpham`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`id_type`) REFERENCES `loai_sanpham` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
