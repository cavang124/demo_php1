-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 03, 2021 lúc 08:21 AM
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
-- Cơ sở dữ liệu: `quanly`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donors`
--

CREATE TABLE `donors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `money` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `donors`
--

INSERT INTO `donors` (`id`, `name`, `address`, `email`, `money`, `status`) VALUES
(3, 'TNHC', 'Học viện Công nghệ Bưu chính Viễn thông', 'thia@gmail.com', 10000000, 0),
(5, 'Sữa Milk Box', 'Nhân Chính, Thanh Xuân, Hà Nội', 'thia@gmail.com', 50000000, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `speaker`
--

CREATE TABLE `speaker` (
  `id_speaker` int(11) NOT NULL,
  `name` varchar(120) NOT NULL,
  `position` int(11) NOT NULL,
  `company` varchar(120) NOT NULL,
  `image` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `speaker`
--

INSERT INTO `speaker` (`id_speaker`, `name`, `position`, `company`, `image`) VALUES
(1, 'Nguyễn Thị Nga ', 0, 'Ominext Group', 'Trưởng phòng đầu tư và phát triển'),
(2, 'Đào Bích Phượng', 2, 'TTC Solutions', 'Leader Automatic Team');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ticket`
--

CREATE TABLE `ticket` (
  `id_ticket` int(11) NOT NULL,
  `name` varchar(120) NOT NULL,
  `price` int(11) NOT NULL,
  `description` text NOT NULL,
  `sale_qty` int(11) NOT NULL,
  `sale_value` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `ticket`
--

INSERT INTO `ticket` (`id_ticket`, `name`, `price`, `description`, `sale_qty`, `sale_value`, `quantity`) VALUES
(1, 'Ngay Hoi Tuyen dung', 100000, 've co tem dan trong gia', 50000, 60000, 100000),
(2, 'Ngay Hoi Tuyen dung', 100000, 've co tem dan trong gia', 50000, 60000, 100000),
(3, 'Ngay hoi tuyen dung', 500000, 've co tem trong gia \r\ncho vip ', 400000, 300000, 450000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `topic`
--

CREATE TABLE `topic` (
  `id` int(11) NOT NULL,
  `name` varchar(120) NOT NULL,
  `topic_image` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `stage` int(11) NOT NULL,
  `timestart` datetime(6) DEFAULT NULL,
  `timeend` datetime(6) DEFAULT NULL,
  `id_speaker` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `topic`
--

INSERT INTO `topic` (`id`, `name`, `topic_image`, `description`, `stage`, `timestart`, `timeend`, `id_speaker`) VALUES
(1, 'Viec IT', 'cong nghe 4.0 tai Viet Nam', 'Chuyen gia hang dau ve linh vuc IT', 1, '2020-12-09 07:20:18.000000', '2020-12-09 14:00:00.000000', 1),
(2, 'IT va tuyen dung', 'Cac tieu chi ve ung vien cua IT', 'Leader tuyen dung co tam\r\n', 2, '2020-12-10 08:00:00.000000', '2020-12-10 11:00:00.000000', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `name` varchar(180) NOT NULL,
  `address` varchar(255) NOT NULL,
  `username` varchar(120) NOT NULL,
  `password` varchar(40) NOT NULL,
  `email` varchar(150) NOT NULL,
  `image` varchar(150) NOT NULL,
  `phone` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id_user`, `role`, `name`, `address`, `username`, `password`, `email`, `image`, `phone`) VALUES
(1, 1, 'Tran Hoa', 'Ha Noi', 'HoaT', '25d55ad283aa400af464c76d713c07ad', 'tranhoa@gmail.com', 'Nhan vien ', '0911234566'),
(3, 2, 'Do Oanh', 'Hai Phong', 'OanhD', 'o1234567', 'oanhdo@gmail.com', 'Nhan vien', '0956123458'),
(4, 2, 'Do Oanh', 'Hai Phong', 'OanhD', 'o1234567', 'oanhdo@gmail.com', 'Nhan vien', '0956123458');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_ticket`
--

CREATE TABLE `user_ticket` (
  `id_user` int(11) NOT NULL,
  `id_ticket` int(11) NOT NULL,
  `status` varchar(120) NOT NULL,
  `time` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `user_ticket`
--

INSERT INTO `user_ticket` (`id_user`, `id_ticket`, `status`, `time`) VALUES
(1, 1, 'Nghe va ghi chu', '0000-00-00 00:00:00.000000'),
(4, 2, 'Nghe ', '2020-12-09 01:00:00.000000');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `donors`
--
ALTER TABLE `donors`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `speaker`
--
ALTER TABLE `speaker`
  ADD PRIMARY KEY (`id_speaker`);

--
-- Chỉ mục cho bảng `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id_ticket`);

--
-- Chỉ mục cho bảng `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_speaker` (`id_speaker`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Chỉ mục cho bảng `user_ticket`
--
ALTER TABLE `user_ticket`
  ADD KEY `id_ticket` (`id_ticket`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `donors`
--
ALTER TABLE `donors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `speaker`
--
ALTER TABLE `speaker`
  MODIFY `id_speaker` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id_ticket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `topic`
--
ALTER TABLE `topic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `topic`
--
ALTER TABLE `topic`
  ADD CONSTRAINT `topic_ibfk_1` FOREIGN KEY (`id_speaker`) REFERENCES `speaker` (`id_speaker`);

--
-- Các ràng buộc cho bảng `user_ticket`
--
ALTER TABLE `user_ticket`
  ADD CONSTRAINT `user_ticket_ibfk_1` FOREIGN KEY (`id_ticket`) REFERENCES `ticket` (`id_ticket`),
  ADD CONSTRAINT `user_ticket_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
