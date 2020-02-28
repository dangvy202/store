-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 24, 2019 lúc 07:02 PM
-- Phiên bản máy phục vụ: 10.1.37-MariaDB
-- Phiên bản PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `php1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bangchitietdathang`
--

CREATE TABLE `bangchitietdathang` (
  `stt` int(9) NOT NULL,
  `so_hoadon` int(10) NOT NULL,
  `ma_sp` int(9) NOT NULL,
  `so_luong` int(11) NOT NULL,
  `gia_ban` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoa_don`
--

CREATE TABLE `hoa_don` (
  `so_hoadon` int(10) NOT NULL,
  `ma_kh` int(9) NOT NULL,
  `ngay_mua` date NOT NULL,
  `thanh_tien` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khach_hang`
--

CREATE TABLE `khach_hang` (
  `ma_kh` int(9) NOT NULL,
  `ten_kh` varchar(255) COLLATE ucs2_unicode_ci NOT NULL,
  `dia_chi` varchar(255) COLLATE ucs2_unicode_ci NOT NULL,
  `dien_thoai` int(10) NOT NULL,
  `email` varchar(255) COLLATE ucs2_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai_hang`
--

CREATE TABLE `loai_hang` (
  `ma_loai` int(9) NOT NULL,
  `ten_loai` varchar(255) COLLATE ucs2_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `ma_sp` int(9) NOT NULL,
  `ten_sp` varchar(255) COLLATE ucs2_unicode_ci NOT NULL,
  `don_gia` double NOT NULL,
  `hinh` varchar(255) COLLATE ucs2_unicode_ci NOT NULL,
  `loai_sp` int(9) NOT NULL,
  `mo_ta` varchar(255) COLLATE ucs2_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bangchitietdathang`
--
ALTER TABLE `bangchitietdathang`
  ADD PRIMARY KEY (`stt`),
  ADD KEY `chitiet_hoadon_sanpham` (`so_hoadon`),
  ADD KEY `chitiet_sanpham` (`ma_sp`);

--
-- Chỉ mục cho bảng `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD PRIMARY KEY (`so_hoadon`),
  ADD KEY `hoadon_khachhang` (`ma_kh`);

--
-- Chỉ mục cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`ma_kh`);

--
-- Chỉ mục cho bảng `loai_hang`
--
ALTER TABLE `loai_hang`
  ADD PRIMARY KEY (`ma_loai`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`ma_sp`),
  ADD KEY `loaihang_sanpham` (`loai_sp`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bangchitietdathang`
--
ALTER TABLE `bangchitietdathang`
  MODIFY `stt` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `hoa_don`
--
ALTER TABLE `hoa_don`
  MODIFY `so_hoadon` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  MODIFY `ma_kh` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `loai_hang`
--
ALTER TABLE `loai_hang`
  MODIFY `ma_loai` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `ma_sp` int(9) NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bangchitietdathang`
--
ALTER TABLE `bangchitietdathang`
  ADD CONSTRAINT `chitiet_hoadon_sanpham` FOREIGN KEY (`so_hoadon`) REFERENCES `hoa_don` (`so_hoadon`),
  ADD CONSTRAINT `chitiet_sanpham` FOREIGN KEY (`ma_sp`) REFERENCES `sanpham` (`ma_sp`);

--
-- Các ràng buộc cho bảng `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD CONSTRAINT `hoadon_khachhang` FOREIGN KEY (`ma_kh`) REFERENCES `khach_hang` (`ma_kh`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `loaihang_sanpham` FOREIGN KEY (`loai_sp`) REFERENCES `loai_hang` (`ma_loai`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
