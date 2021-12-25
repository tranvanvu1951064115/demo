-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 25, 2021 lúc 03:37 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `twitter`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_comment`
--

CREATE TABLE `tb_comment` (
  `comment_id` int(11) NOT NULL,
  `comment_by` int(11) NOT NULL,
  `comment_on` int(11) NOT NULL,
  `comment_status` text NOT NULL,
  `comment_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tb_comment`
--

INSERT INTO `tb_comment` (`comment_id`, `comment_by`, `comment_on`, `comment_status`, `comment_at`) VALUES
(15, 31, 300, '', '2021-12-25 18:05:12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_loves`
--

CREATE TABLE `tb_loves` (
  `love_id` int(11) NOT NULL,
  `love_forTweet` int(11) NOT NULL,
  `love_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tb_loves`
--

INSERT INTO `tb_loves` (`love_id`, `love_forTweet`, `love_by`) VALUES
(122, 299, 30);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_retweet`
--

CREATE TABLE `tb_retweet` (
  `retweet_id` int(11) NOT NULL,
  `retweet_by` int(11) NOT NULL,
  `retweet_from` int(11) NOT NULL,
  `retweet_status` text NOT NULL,
  `retweet_On` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_tweets`
--

CREATE TABLE `tb_tweets` (
  `tweet_id` int(11) NOT NULL,
  `tweet_status` text NOT NULL,
  `tweet_by` int(11) NOT NULL,
  `tweet_image` text NOT NULL,
  `tweet_postedOn` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tb_tweets`
--

INSERT INTO `tb_tweets` (`tweet_id`, `tweet_status`, `tweet_by`, `tweet_image`, `tweet_postedOn`) VALUES
(299, 'How are you doing ?', 30, '', '2021-12-24 18:03:35'),
(300, 'How are you?', 30, '', '2021-12-24 19:38:33'),
(304, '312312', 31, '', '2021-12-25 18:13:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_users`
--

CREATE TABLE `tb_users` (
  `user_id` int(11) NOT NULL,
  `user_firstName` varchar(100) NOT NULL,
  `user_lastName` varchar(100) NOT NULL,
  `user_userName` varchar(150) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_profileImage` varchar(255) NOT NULL,
  `user_profileCover` varchar(255) NOT NULL,
  `user_following` int(11) NOT NULL,
  `user_followers` int(11) NOT NULL,
  `user_bio` text NOT NULL,
  `user_country` varchar(255) NOT NULL,
  `user_website` varchar(255) NOT NULL,
  `user_signUpDate` datetime NOT NULL DEFAULT current_timestamp(),
  `user_profileEdit` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tb_users`
--

INSERT INTO `tb_users` (`user_id`, `user_firstName`, `user_lastName`, `user_userName`, `user_email`, `user_password`, `user_profileImage`, `user_profileCover`, `user_following`, `user_followers`, `user_bio`, `user_country`, `user_website`, `user_signUpDate`, `user_profileEdit`) VALUES
(30, 'Wilson', 'Kyler', 'wilsonkyler', 'wilsonkylerkl@gmail.com', '$2y$10$N4I8SOAIOVBb0GAI51.eu.2HOZnFzsQRjods7qN2onXo1XFgIoF6K', 'frontend/assets/image/defaultProfilePic.png', 'frontend/assets/image/backgroundImage.png', 0, 0, '', '', '', '2021-12-23 14:08:25', '0'),
(31, 'Tan', 'Vu', 'tanvu', 'tanvu13042001@gmail.com', '$2y$10$93a9LFpv4x218BGZrKr6k.dcLAq7s1pljcSr/3UZnIoXU8OhdOHRu', 'frontend/assets/image/profilePic.jpeg', 'frontend/assets/image/backgroundImage.png', 0, 0, '', '', '', '2021-12-23 23:21:21', '0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_verification`
--

CREATE TABLE `tb_verification` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tb_verification`
--

INSERT INTO `tb_verification` (`id`, `user_id`, `code`, `status`, `createdAt`) VALUES
(70, 30, '9089935e9b7d191250312fad7', '1', '2021-12-23 14:08:29'),
(71, 30, '9089935e9b7d191250312fad7', '1', '2021-12-23 14:08:44'),
(72, 31, '8e061cfab4455cabe3e322416', '1', '2021-12-23 23:21:25'),
(73, 31, '8e061cfab4455cabe3e322416', '1', '2021-12-23 23:21:47'),
(74, 31, '8e061cfab4455cabe3e322416', '1', '2021-12-23 23:23:23');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tb_comment`
--
ALTER TABLE `tb_comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `fk_foreign_commentForTweet` (`comment_on`),
  ADD KEY `fk_foreign_commentUser` (`comment_by`);

--
-- Chỉ mục cho bảng `tb_loves`
--
ALTER TABLE `tb_loves`
  ADD PRIMARY KEY (`love_id`),
  ADD KEY `fk_foreign_byTweet` (`love_forTweet`),
  ADD KEY `fk_foreign_byUser` (`love_by`);

--
-- Chỉ mục cho bảng `tb_retweet`
--
ALTER TABLE `tb_retweet`
  ADD PRIMARY KEY (`retweet_id`);

--
-- Chỉ mục cho bảng `tb_tweets`
--
ALTER TABLE `tb_tweets`
  ADD PRIMARY KEY (`tweet_id`),
  ADD KEY `fk_foreign_tweets` (`tweet_by`);

--
-- Chỉ mục cho bảng `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Chỉ mục cho bảng `tb_verification`
--
ALTER TABLE `tb_verification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_foreign_verify` (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tb_comment`
--
ALTER TABLE `tb_comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `tb_loves`
--
ALTER TABLE `tb_loves`
  MODIFY `love_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT cho bảng `tb_retweet`
--
ALTER TABLE `tb_retweet`
  MODIFY `retweet_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tb_tweets`
--
ALTER TABLE `tb_tweets`
  MODIFY `tweet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=305;

--
-- AUTO_INCREMENT cho bảng `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `tb_verification`
--
ALTER TABLE `tb_verification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tb_comment`
--
ALTER TABLE `tb_comment`
  ADD CONSTRAINT `fk_foreign_commentForTweet` FOREIGN KEY (`comment_on`) REFERENCES `tb_tweets` (`tweet_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_foreign_commentUser` FOREIGN KEY (`comment_by`) REFERENCES `tb_users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tb_loves`
--
ALTER TABLE `tb_loves`
  ADD CONSTRAINT `fk_foreign_byTweet` FOREIGN KEY (`love_forTweet`) REFERENCES `tb_tweets` (`tweet_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_foreign_byUser` FOREIGN KEY (`love_by`) REFERENCES `tb_users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tb_tweets`
--
ALTER TABLE `tb_tweets`
  ADD CONSTRAINT `fk_foreign_tweets` FOREIGN KEY (`tweet_by`) REFERENCES `tb_users` (`user_id`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tb_verification`
--
ALTER TABLE `tb_verification`
  ADD CONSTRAINT `fk_foreign_verify` FOREIGN KEY (`user_id`) REFERENCES `tb_users` (`user_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
