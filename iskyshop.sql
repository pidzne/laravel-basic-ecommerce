-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 08, 2023 lúc 03:59 PM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `iskyshop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `street` varchar(255) NOT NULL,
  `ward` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `address`
--

INSERT INTO `address` (`id`, `user_id`, `name`, `phone`, `street`, `ward`, `district`, `city`, `created_at`, `updated_at`) VALUES
(1, 1, 'a123456', '1234567890', '123 ppp', 'Phường Bến Thành', 'Quận 1', 'Thành phố Hồ Chí Minh', '2023-01-05 11:02:17', '2023-01-31 17:37:16'),
(3, 1, 'aaa', '123', '789 pp', 'Phường Hòa Minh', 'Quận Liên Chiểu', 'Thành phố Đà Nẵng', '2023-01-05 12:32:40', '2023-01-05 12:32:40'),
(4, 4, 'Nguyễn Văn A', '0912345678', '123 ABC', 'Phường Bến Thành', 'Quận 1', 'Thành phố Hồ Chí Minh', '2023-01-05 15:05:29', '2023-01-14 10:25:00'),
(5, 1, 'a', '123', 'a', 'Phường Thành Công', 'Quận Ba Đình', 'Thành phố Hà Nội', '2023-01-09 14:19:17', '2023-01-09 14:19:17'),
(6, 4, 'Nguyễn Văn B', '0912345678', '123 ABC', 'Phường Thành Công', 'Quận Ba Đình', 'Thành phố Hà Nội', '2023-01-14 10:25:33', '2023-01-14 10:25:33'),
(7, 1, 'a1111111111111', '11111111111', '111111pppp', 'Phường Bến Thành', 'Quận 1', 'Thành phố Hồ Chí Minh', '2023-02-06 14:03:25', '2023-02-06 14:03:39'),
(8, 1, 'Quan Tri Vien ISKY', '0912345678', '123 ISKY', 'Phường Hòa Minh', 'Quận Liên Chiểu', 'Thành phố Đà Nẵng', '2023-02-07 17:50:18', '2023-02-07 17:50:18'),
(9, 1, 'Nguoi dung ISKY', '0912345678', '123456 ISKY', 'Phường Hòa Minh', 'Quận Liên Chiểu', 'Thành phố Đà Nẵng', '2023-02-07 17:50:53', '2023-02-07 17:50:53'),
(10, 37, 'doan le', '09123456789', '133 abc', 'Phường Hòa Minh', 'Quận Liên Chiểu', 'Thành phố Đà Nẵng', '2023-02-08 07:23:04', '2023-02-08 07:23:04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `albums`
--

CREATE TABLE `albums` (
  `id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `album_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `album_status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `albums`
--

INSERT INTO `albums` (`id`, `prod_id`, `album_image`, `album_status`, `created_at`, `updated_at`) VALUES
(1, 1, '1671135890.webp', 0, '2022-12-15 11:18:31', '2023-01-06 09:24:50'),
(3, 1, '1671135925.jpg', 0, '2022-12-15 11:18:54', '2022-12-15 13:25:25'),
(6, 1, '1671135934.webp', 0, '2022-12-15 12:53:15', '2022-12-15 13:25:34'),
(8, 2, '1671135959.jpg', 0, '2022-12-15 12:57:04', '2022-12-15 13:25:59'),
(9, 2, '1671135991.jpg', 0, '2022-12-15 12:57:23', '2022-12-15 13:26:31'),
(10, 2, '1671136000.webp', 0, '2022-12-15 12:58:11', '2022-12-15 13:26:40'),
(11, 3, '1671136027.webp', 0, '2022-12-15 12:58:20', '2022-12-15 13:27:07'),
(12, 3, '1671136038.jpg', 0, '2022-12-15 12:58:29', '2022-12-15 13:27:18'),
(13, 3, '1671136049.webp', 0, '2022-12-15 12:58:37', '2022-12-15 13:27:29'),
(14, 4, '1671136121.webp', 0, '2022-12-15 12:59:34', '2022-12-15 13:28:41'),
(15, 4, '1671136133.webp', 0, '2022-12-15 12:59:43', '2022-12-15 13:28:53'),
(16, 4, '1671136141.webp', 0, '2022-12-15 12:59:52', '2022-12-15 13:29:01'),
(17, 6, '1671136470.webp', 0, '2022-12-15 13:02:24', '2022-12-15 13:34:30'),
(18, 7, '1671136582.webp', 0, '2022-12-15 13:04:25', '2022-12-15 13:36:22'),
(19, 5, '1671136293.jpg', 0, '2022-12-15 13:31:33', '2022-12-15 13:31:33'),
(20, 5, '1671136308.webp', 0, '2022-12-15 13:31:48', '2022-12-15 13:31:48'),
(21, 5, '1671136326.webp', 0, '2022-12-15 13:32:06', '2022-12-15 13:32:06'),
(22, 6, '1671136397.webp', 0, '2022-12-15 13:33:17', '2022-12-15 13:33:17'),
(23, 6, '1671136418.png', 0, '2022-12-15 13:33:38', '2022-12-15 13:33:38'),
(24, 7, '1671136507.jpg', 0, '2022-12-15 13:35:07', '2022-12-15 13:35:07'),
(25, 7, '1671136597.jpg', 0, '2022-12-15 13:36:37', '2022-12-15 13:36:37'),
(26, 8, '1671136651.webp', 0, '2022-12-15 13:37:31', '2022-12-15 13:37:31'),
(27, 8, '1671136672.webp', 0, '2022-12-15 13:37:52', '2022-12-15 13:37:52'),
(28, 8, '1671136687.webp', 0, '2022-12-15 13:38:07', '2022-12-15 13:38:07'),
(29, 9, '1671136707.webp', 0, '2022-12-15 13:38:27', '2022-12-15 13:38:27'),
(30, 9, '1671136791.webp', 0, '2022-12-15 13:39:51', '2022-12-15 13:39:51'),
(31, 9, '1671136810.webp', 0, '2022-12-15 13:40:10', '2022-12-15 13:40:10'),
(32, 10, '1671136829.webp', 0, '2022-12-15 13:40:29', '2022-12-15 13:40:29'),
(33, 10, '1671136868.jpg', 0, '2022-12-15 13:41:08', '2022-12-15 13:41:08'),
(34, 10, '1671136883.webp', 0, '2022-12-15 13:41:23', '2022-12-15 13:41:23'),
(35, 11, '1671136943.jpg', 0, '2022-12-15 13:42:23', '2022-12-15 13:42:23'),
(36, 11, '1671136958.webp', 0, '2022-12-15 13:42:38', '2022-12-15 13:42:38'),
(37, 11, '1671136973.webp', 0, '2022-12-15 13:42:53', '2022-12-15 13:42:53'),
(38, 12, '1671137021.webp', 0, '2022-12-15 13:43:41', '2022-12-15 13:43:41'),
(39, 12, '1671137040.webp', 0, '2022-12-15 13:44:00', '2022-12-15 13:44:00'),
(40, 12, '1671137059.webp', 0, '2022-12-15 13:44:19', '2022-12-15 13:44:19'),
(41, 13, '1671137109.jpg', 0, '2022-12-15 13:45:09', '2022-12-15 13:45:09'),
(42, 13, '1671137128.jpg', 0, '2022-12-15 13:45:28', '2022-12-15 13:45:28'),
(43, 13, '1671137143.webp', 0, '2022-12-15 13:45:43', '2022-12-15 13:45:43'),
(44, 14, '1671137596.webp', 0, '2022-12-15 13:53:16', '2022-12-15 13:53:16'),
(45, 14, '1671137612.webp', 0, '2022-12-15 13:53:32', '2022-12-15 13:53:32'),
(46, 14, '1671137651.webp', 0, '2022-12-15 13:54:11', '2022-12-15 13:54:11'),
(47, 15, '1671137816.jpg', 0, '2022-12-15 13:56:56', '2022-12-15 13:56:56'),
(48, 15, '1671137831.webp', 0, '2022-12-15 13:57:11', '2022-12-15 13:57:11'),
(49, 15, '1671137846.jpg', 0, '2022-12-15 13:57:26', '2022-12-15 13:57:26'),
(50, 16, '1671138022.jpg', 0, '2022-12-15 14:00:22', '2022-12-15 14:00:22'),
(51, 16, '1671138036.jpg', 0, '2022-12-15 14:00:36', '2022-12-15 14:00:36'),
(52, 16, '1671138054.jpg', 0, '2022-12-15 14:00:54', '2022-12-15 14:00:54'),
(53, 17, '1671138169.jpg', 0, '2022-12-15 14:02:49', '2022-12-15 14:02:49'),
(54, 17, '1671138182.jpg', 0, '2022-12-15 14:03:02', '2022-12-15 14:03:02'),
(55, 17, '1671138194.jpg', 0, '2022-12-15 14:03:14', '2022-12-15 14:03:14'),
(56, 18, '1671138430.webp', 0, '2022-12-15 14:07:10', '2022-12-15 14:07:10'),
(57, 18, '1671138441.webp', 0, '2022-12-15 14:07:21', '2022-12-15 14:07:21'),
(58, 18, '1671138454.webp', 0, '2022-12-15 14:07:34', '2022-12-15 14:07:34'),
(59, 19, '1671138628.webp', 0, '2022-12-15 14:10:28', '2022-12-15 14:10:28'),
(60, 19, '1671138641.webp', 0, '2022-12-15 14:10:41', '2022-12-15 14:10:41'),
(61, 19, '1671138653.webp', 0, '2022-12-15 14:10:53', '2022-12-15 14:10:53'),
(62, 20, '1671138774.webp', 0, '2022-12-15 14:12:54', '2022-12-15 14:12:54'),
(63, 20, '1671138789.webp', 0, '2022-12-15 14:13:09', '2022-12-15 14:13:09'),
(64, 20, '1671138805.webp', 0, '2022-12-15 14:13:25', '2022-12-15 14:13:25'),
(65, 21, '1671138912.jpeg', 0, '2022-12-15 14:15:12', '2022-12-15 14:15:12'),
(66, 21, '1671138927.webp', 0, '2022-12-15 14:15:27', '2022-12-15 14:15:27'),
(67, 21, '1671138940.webp', 0, '2022-12-15 14:15:40', '2022-12-15 14:15:40'),
(68, 22, '1671139072.webp', 0, '2022-12-15 14:17:52', '2022-12-15 14:17:52'),
(69, 22, '1671139085.jpg', 0, '2022-12-15 14:18:05', '2022-12-15 14:18:05'),
(70, 22, '1671139099.webp', 0, '2022-12-15 14:18:19', '2022-12-15 14:18:19'),
(71, 23, '1671139308.webp', 0, '2022-12-15 14:21:48', '2022-12-15 14:21:48'),
(72, 23, '1671139322.webp', 0, '2022-12-15 14:22:02', '2022-12-15 14:22:02'),
(73, 23, '1671139335.jpg', 0, '2022-12-15 14:22:15', '2022-12-15 14:22:15'),
(74, 24, '1671139446.jpg', 0, '2022-12-15 14:24:06', '2022-12-15 14:24:06'),
(75, 24, '1671139460.webp', 0, '2022-12-15 14:24:20', '2022-12-15 14:24:20'),
(76, 24, '1671139474.webp', 0, '2022-12-15 14:24:34', '2022-12-15 14:24:34'),
(77, 25, '1671139600.webp', 0, '2022-12-15 14:26:40', '2022-12-15 14:26:40'),
(78, 25, '1671139622.jpg', 0, '2022-12-15 14:27:02', '2022-12-15 14:27:02'),
(79, 25, '1671139637.webp', 0, '2022-12-15 14:27:17', '2022-12-15 14:27:17'),
(80, 26, '1671139745.jpg', 0, '2022-12-15 14:29:05', '2022-12-15 14:29:05'),
(81, 26, '1671139758.jpg', 0, '2022-12-15 14:29:18', '2022-12-15 14:29:18'),
(82, 26, '1671139772.jpg', 0, '2022-12-15 14:29:32', '2022-12-15 14:29:32'),
(83, 27, '1671139931.webp', 0, '2022-12-15 14:32:11', '2022-12-15 14:32:11'),
(84, 27, '1671139946.jpg', 0, '2022-12-15 14:32:26', '2022-12-15 14:32:26'),
(85, 27, '1671139960.jpg', 0, '2022-12-15 14:32:40', '2022-12-15 14:32:40'),
(86, 28, '1671140136.webp', 0, '2022-12-15 14:35:36', '2022-12-15 14:35:36'),
(87, 28, '1671140150.webp', 0, '2022-12-15 14:35:50', '2022-12-15 14:35:50'),
(88, 28, '1671140164.webp', 0, '2022-12-15 14:36:04', '2022-12-15 14:36:04'),
(89, 29, '1671140276.webp', 0, '2022-12-15 14:37:56', '2022-12-15 14:37:56'),
(90, 29, '1671140291.webp', 0, '2022-12-15 14:38:11', '2022-12-15 14:38:11'),
(91, 29, '1671140303.webp', 0, '2022-12-15 14:38:23', '2022-12-15 14:38:23'),
(92, 30, '1671140710.jpg', 0, '2022-12-15 14:45:10', '2022-12-15 14:45:10'),
(93, 30, '1671140724.webp', 0, '2022-12-15 14:45:24', '2022-12-15 14:45:24'),
(94, 30, '1671140738.jpg', 0, '2022-12-15 14:45:38', '2022-12-15 14:45:38'),
(95, 31, '1671140847.webp', 0, '2022-12-15 14:47:27', '2022-12-15 14:47:27'),
(96, 31, '1671140860.webp', 0, '2022-12-15 14:47:40', '2022-12-15 14:47:40'),
(97, 31, '1671140875.webp', 0, '2022-12-15 14:47:55', '2022-12-15 14:47:55'),
(98, 32, '1671141287.jpg', 0, '2022-12-15 14:54:47', '2022-12-15 14:54:47'),
(99, 32, '1671141304.webp', 0, '2022-12-15 14:55:04', '2022-12-15 14:55:04'),
(100, 32, '1671141323.webp', 0, '2022-12-15 14:55:23', '2022-12-15 14:55:23'),
(101, 33, '1671141468.webp', 0, '2022-12-15 14:57:48', '2022-12-15 14:57:48'),
(103, 33, '1671141504.webp', 0, '2022-12-15 14:58:24', '2022-12-15 14:58:24'),
(104, 33, '1671141542.webp', 0, '2022-12-15 14:59:02', '2022-12-15 14:59:02'),
(105, 34, '1671141668.webp', 0, '2022-12-15 15:01:08', '2022-12-15 15:01:08'),
(106, 34, '1671141747.webp', 0, '2022-12-15 15:02:27', '2022-12-15 15:02:27'),
(107, 34, '1671141760.webp', 0, '2022-12-15 15:02:40', '2022-12-15 15:02:40'),
(108, 35, '1671141871.webp', 0, '2022-12-15 15:04:31', '2022-12-15 15:04:31'),
(109, 35, '1671141883.jpeg', 0, '2022-12-15 15:04:43', '2022-12-15 15:04:43'),
(110, 35, '1671141899.jpg', 0, '2022-12-15 15:04:59', '2022-12-15 15:04:59'),
(111, 36, '1671142028.webp', 0, '2022-12-15 15:07:08', '2022-12-15 15:07:08'),
(112, 36, '1671142070.webp', 0, '2022-12-15 15:07:50', '2022-12-15 15:07:50'),
(113, 36, '1671142112.webp', 0, '2022-12-15 15:08:32', '2022-12-15 15:08:32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `blog_cate_id` int(11) NOT NULL COMMENT 'Danh mục bài viết',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tiêu đề bài viết',
  `content` varchar(2000) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Nội dung bài viết',
  `hashtag` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Hashtag bài viết',
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tác giả',
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Nguồn bài viết (nếu có)',
  `blog_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `blogs`
--

INSERT INTO `blogs` (`id`, `blog_cate_id`, `title`, `content`, `hashtag`, `author`, `link`, `blog_image`, `blog_status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Cách phối áo thun và áo sơ mi đẹp', 'Phối áo thun với áo sơ mi đã trở thành một công thức phối đồ phổ biến được rất nhiều bạn trẻ ưa chuộng. Với set đồ này, các bạn trẻ sẽ trở nên đầy trẻ trung, năng động và không kém phần thời trang, phong cách. Mặc dù cách phối này khá đơn giản nhưng không phải bạn trẻ nào cũng biết cách mix match đẹp chuẩn. Bài viết dưới đây, Candles sẽ  bật mí cho bạn cách phối áo thun với áo sơ mi nam sao cho thật phong cách, ấn tượng.\r\n\r\nVới áo thun, chúng ta có rất nhiều cách phối đồ khác nhau nhờ việc kiểu áo này rất “dễ tính” và có thể kết hợp ăn ý với những kiểu trang phục khác. Cách phối áo sơ mi với áo thun đã và đang là một cách phối đồ thịnh hành và chưa bao giờ lỗi mốt hiện nay.\r\n\r\nCách phối này đa phần được bạn trẻ áp dụng trong những hoạt động hàng ngày. Nếu nói kiểu áo sinh ra là để phối cùng với áo thun thì chắc chắn không thể bỏ qua những chiếc áo sơ mi với đa dạng mẫu mã, màu sắc, form dáng.', '#meovat', 'Quan Tri Vien ISKY', 'https://candles.vn/cach-phoi-ao-thun-va-ao-so-mi-dep-giup-chang-nang-tam-phong-cach-n87654.html', '1673627683.png', 0, '2023-01-13 09:13:11', '2023-02-07 21:36:50'),
(2, 2, 'Sơ mi cũng là văn hóa', 'Chiếc áo sơ mi giờ đây đã vượt lên hẳn ý nghĩa của một trang phục thông thường để trở thành nét văn hóa của con người hiện đại. Đó là văn hóa của hội nhập, của hiện đại và sự thanh lịch. Giờ đây, sơ mi cũng là văn hóa.\r\n\r\nSơ mi cũng là văn hóa bởi nó giúp người mặc trở nên thanh lịch hơn, hiện đại hơn, thoải mái hòa nhập với không gian xung quanh. Phải thừa nhận rằng chưa có loại trang phục nào giúp nam giới có thể xuất hiện đàng hoàng trong mọi hoàn cảnh, mọi thời điểm như sơ mi. Giảng đường, công sở, cơ quan nhà nước cho đến lễ lạt, tiệc tùng hoặc picnic đều là những nơi bạn có thể cùng sơ mi tự tin xuất hiện.\r\n\r\nSơ mi đã có một lịch sử xuất hiện lâu dài, một kỹ thuật may đo với những tiêu chuẩn khắt khe và nhiều biến tấu. Khác với áo thun đơn giản, sơ mi có hàng nút vạt, nút tay. Mặc sơ mi cho đúng cách là cả một văn hóa vì những qui tắc bất thành văn nhưng phong phú. Đó là mặc sơ mi bỏ bên ngoài quần cũng đẹp nhưng sơ mi bỏ vào trong quần chắc chắn lịch sự và đẹp hơn. Vì có hàng nút nên cách gài nút của nam và nữ cũng khác nhau, nút ở cổ hoặc măng set tay có thể cài hoặc không cài, và việc này cũng thể hiện những sắc thái tâm trạng khác nhau của người mặc.\r\n\r\nSơ mi còn là văn hóa vì nó là thành phần quan trọng nhất của bộ vest, bộ lễ phục trang trọng nhất, phổ biến nhất của con người cho đến lúc này dù đã có người biến tấu khi mặc vest với áo thun.\r\n\r\nNếu quần jean áo pull thể hiện một khía cạnh của con người bạn, đó là sự thoải mái, năng động, thì sơ mi cho bạn những tính cách đa dạng hơn: sơ mi trắng dài tay trang trọng lịch sự; đen dài tay – ấn tượng cá tính; màu ngắn tay – trẻ trung; ca rô – lãng mạn; thêu – lịch lãm; hoa cỏ – phóng khoáng và yêu đời, vạt ngang – sang trọng; vạt bầu – trẻ trung; màu và không trang trí – giản dị, hòa đồng; có thêu hoặc in hoa văn – cá tính và lãng mạn.\r\n\r\nNhà thiết kế của Mattana thể hiện mong muốn rằng, với sơ mi Mattana người mặc có thể xuất hiện tại nhiều nơi như hội thảo, lễ lạc, tiệc tùng, dạo phố, du lịch,… mà không hề ', '#aosomi', 'Quan Tri Vien ISKY', 'https://dongphucmattana.vn/so-mi-cung-la-van-hoa/', '1675814886.jpg', 0, '2023-02-06 06:55:04', '2023-02-07 17:08:06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` int(11) NOT NULL,
  `blog_cate_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tên danh mục bài viết',
  `blog_cate_status` tinyint(4) NOT NULL DEFAULT 0 COMMENT 'Trạng thái danh mục bài viết',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `blog_cate_name`, `blog_cate_status`, `created_at`, `updated_at`) VALUES
(1, 'Mẹo vặt', 0, '2023-01-12 07:38:59', '2023-02-07 21:36:11'),
(2, 'Áo sơ mi', 0, '2023-01-12 07:43:01', '2023-02-07 21:36:02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `brand_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `brand_image`, `brand_status`, `created_at`, `updated_at`) VALUES
(1, '5TheWay', '1671143973.jpg', 0, '2022-12-15 08:05:02', '2022-12-15 15:39:33'),
(2, 'Bad Habits', '1671143869.jpg', 0, '2022-12-15 10:38:03', '2022-12-15 15:37:49'),
(3, 'Grimm DC', '1671143876.jpg', 0, '2022-12-15 10:38:22', '2022-12-15 15:37:56');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `cate_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cate_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cate_status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `cate_name`, `cate_image`, `cate_status`, `created_at`, `updated_at`) VALUES
(1, 'Áo thun', '1671120832.png', 0, '2022-12-15 08:04:22', '2022-12-15 09:13:52'),
(2, 'Áo sơ mi', '1671120848.png', 0, '2022-12-15 09:14:08', '2022-12-15 09:14:08'),
(3, 'Quần', '1671120864.png', 0, '2022-12-15 09:14:24', '2022-12-15 09:14:24'),
(4, 'Áo khoác', '1671120895.png', 0, '2022-12-15 09:14:55', '2022-12-15 09:14:55'),
(5, 'Áo hoodie', '1671123155.png', 0, '2022-12-15 09:52:35', '2022-12-15 13:31:09'),
(6, 'Phụ kiện', '1671124663.png', 0, '2022-12-15 10:17:43', '2023-01-27 08:14:15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `colors`
--

CREATE TABLE `colors` (
  `id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `colors`
--

INSERT INTO `colors` (`id`, `prod_id`, `color`, `created_at`, `updated_at`) VALUES
(2, 1, 'Đỏ', '2023-01-03 08:05:53', '2023-01-03 08:05:53'),
(15, 1, 'Tím', '2023-01-31 18:22:23', '2023-01-31 18:22:23'),
(16, 6, 'Cam', '2023-01-31 18:28:02', '2023-01-31 18:28:02'),
(18, 6, 'Đỏ', '2023-01-31 18:28:18', '2023-01-31 18:28:18'),
(19, 6, 'Tím', '2023-01-31 18:28:29', '2023-01-31 18:28:29'),
(20, 1, 'Cam', '2023-01-31 18:35:33', '2023-01-31 18:35:33'),
(21, 36, 'Cam', '2023-01-31 18:36:33', '2023-01-31 18:36:33'),
(22, 36, 'Tím', '2023-01-31 18:36:46', '2023-01-31 18:36:46'),
(23, 36, 'Đỏ', '2023-01-31 18:36:50', '2023-01-31 18:36:50'),
(24, 35, 'Cam', '2023-01-31 18:36:57', '2023-01-31 18:36:57'),
(25, 35, 'Tím', '2023-01-31 18:37:02', '2023-01-31 18:37:02'),
(26, 35, 'Đỏ', '2023-01-31 18:37:06', '2023-01-31 18:37:06'),
(27, 34, 'Đỏ', '2023-01-31 18:38:38', '2023-01-31 18:38:38'),
(28, 34, 'Tím', '2023-01-31 18:38:42', '2023-01-31 18:38:42'),
(29, 34, 'Cam', '2023-01-31 18:38:45', '2023-01-31 18:38:45'),
(30, 33, 'Đỏ', '2023-01-31 18:38:56', '2023-01-31 18:38:56'),
(31, 33, 'Tím', '2023-01-31 18:39:00', '2023-01-31 18:39:00'),
(32, 33, 'Cam', '2023-01-31 18:39:03', '2023-01-31 18:39:03'),
(33, 32, 'Đỏ', '2023-01-31 18:39:22', '2023-01-31 18:39:22'),
(34, 32, 'Tím', '2023-01-31 18:39:27', '2023-01-31 18:39:27'),
(35, 32, 'Cam', '2023-01-31 18:39:30', '2023-01-31 18:39:30'),
(36, 31, 'Đỏ', '2023-01-31 18:40:11', '2023-01-31 18:40:11'),
(37, 31, 'Xanh', '2023-01-31 18:40:15', '2023-01-31 18:40:15'),
(38, 31, 'Vàng', '2023-01-31 18:40:19', '2023-01-31 18:40:19'),
(39, 30, 'Đen', '2023-01-31 18:40:31', '2023-01-31 18:40:31'),
(40, 30, 'Trắng', '2023-01-31 18:40:36', '2023-01-31 18:40:36'),
(41, 30, 'Cam', '2023-01-31 18:40:40', '2023-01-31 18:40:40'),
(42, 29, 'Đen', '2023-01-31 18:40:48', '2023-01-31 18:40:48'),
(43, 29, 'Trắng', '2023-01-31 18:40:54', '2023-01-31 18:40:54'),
(44, 29, 'Cam', '2023-01-31 18:40:58', '2023-01-31 18:40:58'),
(45, 28, 'Hồng', '2023-01-31 18:41:09', '2023-01-31 18:41:09'),
(46, 28, 'Đen cam', '2023-01-31 18:41:15', '2023-01-31 18:41:15'),
(47, 28, 'Tím đỏ', '2023-01-31 18:41:23', '2023-01-31 18:41:23'),
(48, 27, 'Đen', '2023-01-31 18:41:33', '2023-01-31 18:41:33'),
(49, 27, 'Tím', '2023-01-31 18:41:39', '2023-01-31 18:41:39'),
(50, 27, 'Trắng', '2023-01-31 18:41:43', '2023-01-31 18:41:43'),
(51, 26, 'Trắng', '2023-01-31 18:45:19', '2023-01-31 18:45:19'),
(52, 26, 'Đen', '2023-01-31 18:45:23', '2023-01-31 18:45:23'),
(53, 25, 'Đen', '2023-01-31 18:46:18', '2023-01-31 18:46:18'),
(54, 25, 'Trắng', '2023-01-31 18:46:21', '2023-01-31 18:46:21'),
(55, 24, 'Nâu', '2023-01-31 18:46:29', '2023-01-31 18:46:29'),
(56, 24, 'Đen', '2023-01-31 18:46:33', '2023-01-31 18:46:33'),
(57, 23, 'Đen', '2023-01-31 18:46:44', '2023-01-31 18:46:44'),
(58, 23, 'Nâu', '2023-01-31 18:46:52', '2023-01-31 18:46:52'),
(59, 22, 'Nâu', '2023-01-31 18:47:03', '2023-01-31 18:47:03'),
(60, 22, 'Đen', '2023-01-31 18:47:07', '2023-01-31 18:47:07'),
(62, 21, 'Xanh', '2023-02-07 10:20:32', '2023-02-07 10:20:32'),
(63, 21, 'Trắng', '2023-02-07 10:20:37', '2023-02-07 10:20:37'),
(64, 20, 'Đen', '2023-02-07 10:20:56', '2023-02-07 10:20:56'),
(65, 20, 'Vàng', '2023-02-07 10:21:00', '2023-02-07 10:21:00'),
(66, 19, 'Đen', '2023-02-07 10:21:08', '2023-02-07 10:21:08'),
(67, 19, 'Vàng', '2023-02-07 10:21:12', '2023-02-07 10:21:12'),
(68, 18, 'Đen', '2023-02-07 10:21:38', '2023-02-07 10:21:38'),
(69, 18, 'Vàng', '2023-02-07 10:21:41', '2023-02-07 10:21:41'),
(70, 17, 'Nâu', '2023-02-07 10:21:50', '2023-02-07 10:21:50'),
(71, 17, 'Đỏ', '2023-02-07 10:21:54', '2023-02-07 10:21:54'),
(72, 16, 'Đen', '2023-02-07 16:33:48', '2023-02-07 16:33:48'),
(73, 16, 'Trắng', '2023-02-07 16:33:51', '2023-02-07 16:33:51'),
(74, 15, 'Bạc', '2023-02-07 16:36:12', '2023-02-07 16:36:12'),
(75, 15, 'Trắng', '2023-02-07 16:36:16', '2023-02-07 16:36:16'),
(76, 15, 'Xanh', '2023-02-07 16:36:21', '2023-02-07 16:36:21'),
(77, 14, 'Trắng', '2023-02-07 16:36:31', '2023-02-07 16:36:31'),
(78, 14, 'Xanh', '2023-02-07 16:36:34', '2023-02-07 16:36:34'),
(79, 13, 'Nâu', '2023-02-07 16:37:28', '2023-02-07 16:37:28'),
(80, 13, 'Đen', '2023-02-07 16:37:31', '2023-02-07 16:37:31'),
(81, 13, 'Trắng', '2023-02-07 16:37:35', '2023-02-07 16:37:35'),
(82, 12, 'Hồng', '2023-02-07 16:37:44', '2023-02-07 16:37:44'),
(83, 12, 'Trắng', '2023-02-07 16:37:49', '2023-02-07 16:37:49'),
(84, 11, 'Xanh', '2023-02-07 16:48:20', '2023-02-07 16:48:20'),
(85, 11, 'Đen', '2023-02-07 16:48:23', '2023-02-07 16:48:23'),
(86, 10, 'Đen', '2023-02-07 16:48:32', '2023-02-07 16:48:32'),
(87, 10, 'Xanh', '2023-02-07 16:48:35', '2023-02-07 16:48:35'),
(88, 9, 'Đen', '2023-02-07 16:48:40', '2023-02-07 16:48:40'),
(89, 9, 'Trắng', '2023-02-07 16:48:43', '2023-02-07 16:48:43'),
(90, 8, 'Trắng', '2023-02-07 16:48:51', '2023-02-07 16:48:51'),
(91, 8, 'Bạc', '2023-02-07 16:48:56', '2023-02-07 16:48:56'),
(92, 8, 'Đen', '2023-02-07 16:48:58', '2023-02-07 16:48:58'),
(93, 8, 'Xanh', '2023-02-07 16:49:14', '2023-02-07 16:49:14'),
(94, 8, 'Cam', '2023-02-07 16:49:18', '2023-02-07 16:49:18'),
(95, 7, 'Đen', '2023-02-07 16:49:23', '2023-02-07 16:49:23'),
(96, 7, 'Trắng', '2023-02-07 16:49:48', '2023-02-07 16:49:48'),
(97, 5, 'Đen', '2023-02-07 16:50:34', '2023-02-07 16:50:34'),
(98, 5, 'Cam', '2023-02-07 16:50:37', '2023-02-07 16:50:37'),
(99, 5, 'Trắng', '2023-02-07 16:50:40', '2023-02-07 16:50:40'),
(100, 4, 'Cam', '2023-02-07 16:50:47', '2023-02-07 16:50:47'),
(101, 4, 'Đỏ', '2023-02-07 16:50:52', '2023-02-07 16:50:52'),
(102, 4, 'Đen', '2023-02-07 16:50:55', '2023-02-07 16:50:55'),
(103, 3, 'Vàng', '2023-02-07 16:51:07', '2023-02-07 16:51:07'),
(104, 3, 'Hồng', '2023-02-07 16:51:13', '2023-02-07 16:51:13'),
(105, 3, 'Trắng', '2023-02-07 16:51:16', '2023-02-07 16:51:16'),
(106, 2, 'Đen', '2023-02-07 16:51:27', '2023-02-07 16:51:27'),
(107, 2, 'Trắng', '2023-02-07 16:51:30', '2023-02-07 16:51:30'),
(108, 2, 'Xanh', '2023-02-07 16:51:32', '2023-02-07 16:51:32'),
(109, 36, 'Trắng', '2023-02-07 20:14:48', '2023-02-07 20:14:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id`, `prod_id`, `user_id`, `content`, `rating`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Sản phẩm OK', 5, 0, '2022-12-15 17:29:32', '2023-02-07 16:58:55'),
(2, 35, 1, 'Sản phẩm đẹp quá', 5, 0, '2022-12-15 17:29:54', '2022-12-15 17:29:54'),
(3, 29, 1, 'Áo dài quá!!!', 3, 0, '2022-12-15 17:30:23', '2023-02-07 16:58:43'),
(4, 21, 1, 'hay quá!!!', 5, 0, '2022-12-24 02:19:19', '2023-02-07 16:58:45'),
(5, 1, 1, 'Sản phẩm khá OK', 5, 0, '2022-12-24 08:12:06', '2023-02-07 16:58:47'),
(6, 1, 4, 'qqqq', 5, 0, '2022-12-27 07:44:19', '2023-02-07 16:58:49'),
(8, 1, 1, 'Đẹp quá!!!', 5, 0, '2023-01-31 05:56:25', '2023-01-31 05:56:25'),
(9, 1, 1, 'Dở quá!!!', 1, 0, '2023-02-07 22:11:57', '2023-02-07 22:11:57');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `title`, `message`, `created_at`, `updated_at`) VALUES
(10, 'Nguyễn Văn A', 'nva@a.com', '0912345678', 'Sản phẩm', 'Sản phẩm tốt!', '2022-12-27 11:37:36', '2022-12-27 11:37:36'),
(11, 'Nguyễn Văn B', 'nvb@a.com', '0912345678', 'Giao hàng', 'Giao hàng nhanh, gọn, lẹ', '2022-12-27 11:37:55', '2022-12-27 11:37:55'),
(12, 'Nguyễn Văn C', 'nvc@a.com', '0912345678', 'Sản phẩm', 'Sản phẩm tốt!', '2022-12-27 19:27:50', '2022-12-27 19:27:50'),
(13, 'Nguyễn Văn A', 'a@a.com', '0912345678', 'Sản phẩm', 'abc', '2023-02-08 00:19:59', '2023-02-08 00:19:59');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `coupons`
--

CREATE TABLE `coupons` (
  `id` int(11) NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Mã giảm giá',
  `discount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Mức giảm giá (%)',
  `start_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Ngày bắt đầu',
  `end_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Ngày kết thúc',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `detail_info`
--

CREATE TABLE `detail_info` (
  `id` int(11) NOT NULL COMMENT 'Mã chi tiết sp',
  `prod_id` int(11) NOT NULL COMMENT 'Mã sản phẩm',
  `clo_style` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Phong cách',
  `clo_material` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Chất liệu',
  `clo_origin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Xuất xứ',
  `clo_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Kiểu quần, áo',
  `clo_cate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Loại quần, áo',
  `clo_model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Mẫu quần, áo',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `detail_info`
--

INSERT INTO `detail_info` (`id`, `prod_id`, `clo_style`, `clo_material`, `clo_origin`, `clo_type`, `clo_cate`, `clo_model`, `created_at`, `updated_at`) VALUES
(4, 1, 'Giới trẻ', 'Cotton', 'Việt Nam', 'Thun', 'Áo', 'Họa tiết', '2023-01-31 10:26:08', '2023-01-31 10:26:08'),
(5, 36, 'Giới trẻ', 'Vải', 'Việt Nam', 'Túi xách đa năng', 'Phụ kiện', 'In chìm', '2023-01-31 18:49:58', '2023-01-31 18:49:58'),
(6, 35, 'Giới trẻ', 'Vải', 'Việt Nam', 'Túi xách đa năng', 'Phụ kiện', 'In chìm', '2023-01-31 18:50:14', '2023-01-31 18:50:14'),
(7, 34, 'Giới trẻ', 'Vải', 'Việt Nam', 'Mũ đa năng', 'Phụ kiện', 'Hoa văn', '2023-01-31 18:50:42', '2023-01-31 18:50:42'),
(8, 33, 'Giới trẻ', 'Vải', 'Việt Nam', 'Balo đa năng', 'Phụ kiện', 'Đặc biệt', '2023-01-31 18:51:16', '2023-01-31 18:51:16'),
(9, 32, 'Giới trẻ', 'Vải', 'Việt Nam', 'Túi xách đa năng', 'Phụ kiện', 'Hoa văn', '2023-01-31 18:51:33', '2023-01-31 18:51:33'),
(10, 31, 'Giới trẻ', 'Len', 'Việt Nam', 'Áo khoác', 'Áo hoodie', 'Họa tiết', '2023-01-31 18:52:16', '2023-01-31 18:52:38'),
(11, 30, 'Giới trẻ', 'Len', 'Việt Nam', 'Áo khoác', 'Áo hoodie', 'In chìm', '2023-01-31 18:52:58', '2023-01-31 18:52:58'),
(12, 24, 'Giới trẻ', 'Cotton', 'Việt Nam', 'Jacket', 'Áo hoodie', 'Đặc biệt', '2023-01-31 18:53:20', '2023-01-31 18:57:21'),
(13, 29, 'Giới trẻ', 'Cotton', 'Việt Nam', 'Áo khoác', 'Áo hoodie', 'In chìm', '2023-01-31 18:55:25', '2023-01-31 18:55:25'),
(14, 28, 'Giới trẻ', 'Cotton', 'Việt Nam', 'Áo khoác', 'Áo hoodie', 'Hoa văn', '2023-01-31 18:56:07', '2023-01-31 18:56:07'),
(15, 27, 'Giới trẻ', 'Cotton', 'Việt Nam', 'Áo khoác', 'Áo hoodie', 'Họa tiết', '2023-01-31 18:56:26', '2023-01-31 18:56:26'),
(16, 26, 'Giới trẻ', 'Cotton', 'Việt Nam', 'Jacket', 'Áo khoác', 'Họa tiết', '2023-01-31 18:56:45', '2023-01-31 18:56:45'),
(17, 25, 'Giới trẻ', 'Vải', 'Việt Nam', 'Jacket', 'Áo khoác', 'Hoa văn', '2023-01-31 18:57:01', '2023-01-31 18:57:01'),
(18, 23, 'Giới trẻ', 'Cotton', 'Việt Nam', 'Jacket', 'Áo khoác', 'Đặc biệt', '2023-01-31 18:57:40', '2023-01-31 18:57:40'),
(19, 22, 'Giới trẻ', 'Cotton', 'Việt Nam', 'Short', 'Quần', 'Đặc biệt', '2023-01-31 18:58:03', '2023-01-31 18:58:03'),
(20, 21, 'Giới trẻ', 'Thêu', 'Việt Nam', 'Quần dài', 'Quần', 'Vải', '2023-02-07 16:40:35', '2023-02-07 16:40:35'),
(21, 20, 'Giới trẻ', 'Cotton', 'Việt Nam', 'Short', 'Quần', 'In chìm', '2023-02-07 16:41:06', '2023-02-07 16:41:06'),
(22, 19, 'Giới trẻ', 'Thêu', 'Việt Nam', 'Quần dài', 'Quần', 'Hoa văn', '2023-02-07 16:41:38', '2023-02-07 16:41:38'),
(23, 18, 'Giới trẻ', 'Cotton', 'Việt Nam', 'Short', 'Quần', 'In chìm', '2023-02-07 16:42:07', '2023-02-07 16:42:07'),
(24, 17, 'Giới trẻ', 'Vải', 'Việt Nam', 'Jacket', 'Áo sơ mi', 'Lụa', '2023-02-07 16:42:49', '2023-02-07 16:42:49'),
(25, 16, 'Giới trẻ', 'Len', 'Việt Nam', 'Jacket', 'Áo sơ mi', 'Họa tiết', '2023-02-07 16:43:22', '2023-02-07 16:43:22'),
(26, 15, 'Giới trẻ', 'Len', 'Việt Nam', 'Jacket', 'Áo sơ mi', 'Caro', '2023-02-07 16:43:47', '2023-02-07 16:43:47'),
(27, 14, 'Giới trẻ', 'Cotton', 'Việt Nam', 'Ngắn tay', 'Áo sơ mi', 'Họa tiết', '2023-02-07 16:44:32', '2023-02-07 16:44:32'),
(28, 13, 'Giới trẻ', 'Cotton', 'Việt Nam', 'Tay dài', 'Áo sơ mi', 'Họa tiết', '2023-02-07 16:44:58', '2023-02-07 16:44:58'),
(29, 12, 'Giới trẻ', 'Cotton', 'Việt Nam', 'Tay dài', 'Áo sơ mi', 'In chìm', '2023-02-07 16:45:19', '2023-02-07 16:45:19'),
(30, 11, 'Giới trẻ', 'Cotton', 'Việt Nam', 'Tay ngắn', 'Áo thun', 'Vải', '2023-02-07 16:46:33', '2023-02-07 16:46:33'),
(31, 10, 'Giới trẻ', 'Len', 'Việt Nam', 'Tay ngắn', 'Áo thun', 'In chìm', '2023-02-07 16:46:59', '2023-02-07 16:46:59'),
(32, 9, 'Giới trẻ', 'Cotton', 'Việt Nam', 'Tay ngắn', 'Áo thun', 'Hoa văn', '2023-02-07 16:47:19', '2023-02-07 16:47:19'),
(33, 8, 'Giới trẻ', 'Len', 'Việt Nam', 'Tay ngắn', 'Áo thun', 'Họa tiết', '2023-02-07 16:47:41', '2023-02-07 16:47:41'),
(34, 7, 'Giới trẻ', 'Cotton', 'Việt Nam', 'Tay ngắn', 'Áo thun', 'Lụa', '2023-02-07 16:47:55', '2023-02-07 16:47:55'),
(35, 6, 'Giới trẻ', 'Cotton', 'Việt Nam', 'Tay ngắn', 'Áo thun', 'Đặc biệt', '2023-02-07 16:50:27', '2023-02-07 16:50:27'),
(36, 5, 'Giới trẻ', 'Cotton', 'Việt Nam', 'Tay ngắn', 'Áo thun', 'Họa tiết', '2023-02-07 16:53:05', '2023-02-07 16:53:05'),
(37, 4, 'Giới trẻ', 'Cotton', 'Việt Nam', 'Tay dài', 'Áo hoodie', 'In chìm', '2023-02-07 16:53:31', '2023-02-07 16:53:31'),
(38, 3, 'Giới trẻ', 'Cotton', 'Việt Nam', 'Tay ngắn', 'Áo thun', 'Hoa văn', '2023-02-07 16:53:57', '2023-02-07 16:53:57'),
(39, 2, 'Giới trẻ', 'Len', 'Việt Nam', 'Tay ngắn', 'Áo thun', 'Hoa văn', '2023-02-07 16:54:30', '2023-02-07 16:54:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` int(11) NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_11_23_212751_create_categories_table', 1),
(6, '2022_11_23_212752_create_brands_table', 1),
(7, '2022_11_23_212762_create_products_table', 1),
(8, '2022_11_26_175640_create_orders_table', 1),
(9, '2022_11_26_175746_create_order_details_table', 1),
(10, '2022_11_26_185454_create_contacts_table', 1),
(11, '2022_11_29_044356_create_comments_table', 1),
(12, '2022_12_05_162657_create_sliders_table', 1),
(13, '2022_12_06_171743_create_wishlist_table', 1),
(14, '2022_12_13_164256_create_albums_table', 1),
(15, '2022_12_15_141104_create_vnpays_table', 2),
(16, '2022_12_15_141204_create_vnpays_table', 3),
(17, '2023_01_03_130904_create_colors_table', 4),
(18, '2023_01_03_130921_create_sizes_table', 4),
(19, '2023_01_04_094624_create_address_table', 5),
(20, '2023_01_11_122347_create_shipping_fees_table', 6),
(21, '2023_01_11_150455_create_blog_categories_table', 6),
(22, '2023_01_11_150517_create_blogs_table', 6),
(23, '2023_01_11_150538_create_coupons_table', 6),
(24, '2023_01_20_175544_create_detail_info_table', 7),
(25, '2023_01_20_175648_create_descriptions_table', 7),
(26, '2023_01_20_175555_create_detail_info_table', 8);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `po_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_total` int(11) NOT NULL,
  `order_date` datetime NOT NULL,
  `order_delivery` int(11) DEFAULT NULL,
  `order_status` tinyint(4) NOT NULL DEFAULT 0,
  `order_cancel` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `po_number`, `order_name`, `order_email`, `order_phone`, `order_address`, `order_message`, `order_total`, `order_date`, `order_delivery`, `order_status`, `order_cancel`, `payment_method`, `created_at`, `updated_at`) VALUES
(35, 1, 'isky9331', 'Quan Tri Vien ISKY', 'admin@isky.com', '0912345678', 'a, Phường Thành Công, Quận Ba Đình, Thành phố Hà Nội', 'aaaaaaaaaaaaa', 990000, '2023-01-05 11:03:20', 0, 5, '0', 0, NULL, '2023-02-06 11:01:04'),
(36, 1, 'isky2211', 'Quan Tri Vien ISKY', 'admin@isky.com', '0912345678', 'a, Phường Thành Công, Quận Ba Đình, Thành phố Hà Nội', 'aaaaaaaaaaaaaaaaaa', 550000, '2023-01-05 11:08:12', 0, 2, NULL, 0, NULL, '2023-02-06 03:54:16'),
(38, 1, 'isky2268', 'Quan Tri Vien ISKY', 'admin@isky.com', '0912345678', '789 pp, Phường Hòa Minh, Quận Liên Chiểu, Thành phố Đà Nẵng', 'aaaaaaa', 990000, '2023-01-05 12:33:00', 0, 1, NULL, 0, NULL, '2023-02-06 03:54:11'),
(39, 4, 'isky9391', 'Nguoi Dung ISKY', 'user@isky.com', '0912345678', '123 pp, Phường Hòa Minh, Quận Liên Chiểu, Thành phố Đà Nẵng', 'Giao hàng nhanh, gọn, lẹ', 1540000, '2023-01-05 15:07:32', 0, 2, NULL, 0, NULL, '2023-02-06 03:54:04'),
(42, 1, 'isky5202', 'Quan Tri Vien ISKY', 'admin@isky.com', '0912345678', '789 pp, Phường Hòa Minh, Quận Liên Chiểu, Thành phố Đà Nẵng', NULL, 1500000, '2023-01-06 15:46:58', 1, 1, NULL, 0, '2023-01-06 08:46:58', '2023-02-06 03:53:57'),
(43, 1, 'isky1167', 'Quan Tri Vien ISKY', 'admin@isky.com', '0912345678', '789 pp, Phường Hòa Minh, Quận Liên Chiểu, Thành phố Đà Nẵng', NULL, 500000, '2023-01-06 15:49:26', 0, 1, NULL, 0, '2023-01-06 08:49:26', '2023-02-06 10:08:42'),
(44, 4, 'isky8963', 'Nguoi Dung ISKY', 'user@isky.com', '0912345678', '123 pp, Phường Hòa Minh, Quận Liên Chiểu, Thành phố Đà Nẵng', 'OK!', 100000, '2023-01-07 15:36:49', 0, 2, NULL, 0, '2023-01-07 08:36:49', '2023-02-06 08:23:14'),
(45, 1, 'isky6266', 'Quan Tri Vien ISKY', 'admin@isky.com', '0912345678', 'a, Phường Thành Công, Quận Ba Đình, Thành phố Hà Nội', 'aaaaaaaaaa', 200000, '2023-01-09 14:19:35', 1, 3, NULL, 0, '2023-01-09 07:19:35', '2023-01-09 20:48:25'),
(46, 1, 'isky8333', 'a123456', 'admin@isky.com', '1234567890', '789 pp, Phường Hòa Minh, Quận Liên Chiểu, Thành phố Đà Nẵng', 'Giao nhanh, gọn, lẹ', 1000000, '2023-02-01 01:58:43', 0, 1, NULL, 0, '2023-01-31 18:58:43', '2023-02-06 08:22:50'),
(47, 1, 'isky4359', 'a123456', 'admin@isky.com', '1234567890', '789 pp, Phường Hòa Minh, Quận Liên Chiểu, Thành phố Đà Nẵng', 'Giao nhanh, gọn, lẹ', 8150000, '2023-02-01 01:59:29', 1, 2, NULL, 0, '2023-01-31 18:59:29', '2023-02-06 08:21:36'),
(48, 1, 'isky7204', 'a123456', 'admin@isky.com', '1234567890', '789 pp, Phường Hòa Minh, Quận Liên Chiểu, Thành phố Đà Nẵng', 'Giao nhanh, gọn, lẹ', 102000000, '2023-02-01 02:13:29', 0, 0, NULL, 0, '2023-01-31 19:13:29', '2023-02-06 08:20:38'),
(49, 1, 'isky2334', 'a123456', 'admin@isky.com', '1234567890', '789 pp, Phường Hòa Minh, Quận Liên Chiểu, Thành phố Đà Nẵng', 'aaa', 1000000, '2023-02-06 10:54:59', 1, 5, '0', 0, '2023-02-06 03:54:59', '2023-02-07 22:16:41'),
(50, 1, 'isky7247', 'a1111111111111', 'admin@isky.com', '11111111111', '111111pppp, Phường Bến Thành, Quận 1, Thành phố Hồ Chí Minh', 'aaaaaaaaa', 1000000, '2023-02-06 14:04:27', NULL, 2, NULL, 0, '2023-02-06 07:04:27', '2023-02-07 22:21:00'),
(51, 1, 'isky5239', 'a1111111111111', 'admin@isky.com', '11111111111', '111111pppp, Phường Bến Thành, Quận 1, Thành phố Hồ Chí Minh', 'Giao nhanh, gọn, lẹ', 130850000, '2023-02-06 15:37:32', 0, 3, NULL, 0, '2023-02-06 08:37:32', '2023-02-07 09:57:20'),
(52, 1, 'isky9783', 'a1111111111111', 'admin@isky.com', '11111111111', '111111pppp, Phường Bến Thành, Quận 1, Thành phố Hồ Chí Minh', 'Giao nhanh, gọn, lẹ', 37200000, '2023-02-06 17:36:37', NULL, 3, NULL, 0, '2023-02-06 10:36:37', '2023-02-06 10:36:53'),
(53, 1, 'isky8829', 'a1111111111111', 'admin@isky.com', '11111111111', '111111pppp, Phường Bến Thành, Quận 1, Thành phố Hồ Chí Minh', 'OK!', 9900000, '2023-02-07 10:24:57', 0, 7, NULL, 1, '2023-02-07 03:24:57', '2023-02-07 03:24:57'),
(56, 1, 'isky3473', 'Nguoi dung ISKY', 'admin@isky.com', '0912345678', '123456 ISKY, Phường Hòa Minh, Quận Liên Chiểu, Thành phố Đà Nẵng', 'GIao nhanh, gọn, lẹ', 1000000, '2023-02-08 05:25:13', 1, 0, NULL, 0, '2023-02-07 22:25:13', '2023-02-07 22:26:05'),
(57, 37, 'isky3995', 'doan le', 'doanfpolydn@gmail.com', '09123456789', '133 abc, Phường Hòa Minh, Quận Liên Chiểu, Thành phố Đà Nẵng', 'aaaa', 1500000, '2023-02-08 07:24:02', 2, 7, NULL, 1, '2023-02-08 00:24:02', '2023-02-08 00:24:02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `size` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `prod_id`, `quantity`, `price`, `size`, `color`, `created_at`, `updated_at`) VALUES
(46, 35, 36, 1, 990000, 'M', 'Cam', NULL, NULL),
(47, 36, 35, 1, 550000, 'L', 'Đỏ', NULL, NULL),
(49, 38, 36, 1, 990000, 'M', 'Cam', NULL, NULL),
(50, 39, 36, 1, 990000, 'M', 'Cam', NULL, NULL),
(51, 39, 35, 1, 550000, 'L', 'Đỏ', NULL, NULL),
(52, 42, 1, 10, 1000000, 'XXL', 'Xanh', '2023-01-06 08:46:58', '2023-01-06 08:46:58'),
(53, 42, 1, 5, 500000, 'S', 'Đỏ', '2023-01-06 08:46:58', '2023-01-06 08:46:58'),
(54, 43, 1, 5, 500000, 'XXL', 'Đỏ', '2023-01-06 08:49:26', '2023-01-06 08:49:26'),
(55, 44, 1, 1, 100000, 'XXL', 'Đỏ', '2023-01-07 08:36:49', '2023-01-07 08:36:49'),
(56, 45, 1, 1, 100000, 'XXL', 'Xanh', '2023-01-09 07:19:35', '2023-01-09 07:19:35'),
(57, 45, 1, 1, 100000, 'S', 'Đỏ', '2023-01-09 07:19:35', '2023-01-09 07:19:35'),
(58, 46, 31, 10, 1000000, 'M', 'Xanh', '2023-01-31 18:58:43', '2023-01-31 18:58:43'),
(59, 47, 29, 10, 2550000, 'XL', 'Đen', '2023-01-31 18:59:29', '2023-01-31 18:59:29'),
(60, 47, 30, 10, 5600000, 'S', 'Đen', '2023-01-31 18:59:29', '2023-01-31 18:59:29'),
(61, 48, 28, 50, 42500000, 'S', 'Hồng', '2023-01-31 19:13:29', '2023-01-31 19:13:29'),
(62, 48, 27, 50, 49500000, 'L', 'Trắng', '2023-01-31 19:13:29', '2023-01-31 19:13:29'),
(63, 48, 1, 100, 10000000, 'XXL', 'Tím', '2023-01-31 19:13:29', '2023-01-31 19:13:29'),
(64, 49, 31, 10, 1000000, 'S', 'Xanh', '2023-02-06 03:54:59', '2023-02-06 03:54:59'),
(65, 50, 1, 10, 1000000, 'S', 'Đỏ', '2023-02-06 07:04:27', '2023-02-06 07:04:27'),
(66, 51, 29, 10, 2550000, 'S', 'Trắng', '2023-02-06 08:37:32', '2023-02-06 08:37:32'),
(67, 51, 27, 20, 19800000, 'M', 'Đen', '2023-02-06 08:37:32', '2023-02-06 08:37:32'),
(68, 51, 28, 30, 25500000, 'L', 'Hồng', '2023-02-06 08:37:32', '2023-02-06 08:37:32'),
(69, 51, 30, 50, 28000000, 'XL', 'Cam', '2023-02-06 08:37:32', '2023-02-06 08:37:32'),
(70, 51, 35, 100, 55000000, 'L', 'Đỏ', '2023-02-06 08:37:32', '2023-02-06 08:37:32'),
(71, 52, 36, 30, 29700000, 'L', 'Đỏ', '2023-02-06 10:36:37', '2023-02-06 10:36:37'),
(72, 52, 34, 30, 7500000, 'M', 'Tím', '2023-02-06 10:36:37', '2023-02-06 10:36:37'),
(73, 53, 36, 10, 9900000, 'M', 'Cam', '2023-02-07 03:24:57', '2023-02-07 03:24:57'),
(77, 56, 4, 10, 1000000, 'S', 'Đỏ', '2023-02-07 22:25:13', '2023-02-07 22:25:13'),
(78, 57, 1, 15, 1500000, 'XXL', 'Đỏ', '2023-02-08 00:24:02', '2023-02-08 00:24:02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` int(11) NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `cate_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `prod_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_small_description` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_detail_description` varchar(2000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_original_price` int(11) NOT NULL,
  `prod_selling_price` int(11) NOT NULL,
  `prod_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_quantity` int(11) NOT NULL,
  `prod_top_selling` tinyint(4) NOT NULL DEFAULT 0,
  `prod_status` tinyint(4) NOT NULL DEFAULT 0,
  `prod_views` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `cate_id`, `brand_id`, `prod_name`, `prod_small_description`, `prod_detail_description`, `prod_original_price`, `prod_selling_price`, `prod_image`, `prod_quantity`, `prod_top_selling`, `prod_status`, `prod_views`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'BAD RAGLAN', 'Chiếc áo dành cho các đối tượng giới trẻ, nhìn là đã mê', '<p><strong>ĐỘT PH&Aacute;</strong></p>\r\n\r\n<ul>\r\n	<li>Sản phẩm mang thiết kế độc đ&aacute;o</li>\r\n	<li>Được thiết kế tr&ecirc;n c&ocirc;ng nghệ ti&ecirc;u chuẩn cao, mang đến sự năng động, c&aacute; t&iacute;nh</li>\r\n	<li>Gia c&ocirc;ng 100% tại Việt Nam</li>\r\n</ul>\r\n\r\n<p><strong>ĐẶC ĐIỂM NỔI BẬT</strong></p>\r\n\r\n<ul>\r\n	<li>Chất liệu: 80% Cotton, 18% Polyester, 2% Spandex</li>\r\n	<li>Co gi&atilde;n, mềm mại, tho&aacute;ng kh&iacute; v&agrave; thoải m&aacute;i khi mang cả ng&agrave;y</li>\r\n	<li>Kiểu dệt Mesh tại phần bắp ch&acirc;n v&agrave; l&ograve;ng b&agrave;n ch&acirc;n mang đến sự &ocirc;m hơn v&agrave; tho&aacute;ng kh&iacute; hơn</li>\r\n	<li>Giữ nhiệt tốt</li>\r\n	<li>Đa họa tiết</li>\r\n	<li>Mang lại sự trẻ trung, kh&ocirc;ng lỗi thời</li>\r\n	<li>Đem lại cảm gi&aacute;c hack tuổi</li>\r\n</ul>\r\n\r\n<p><strong>PH&Aacute; C&Aacute;CH</strong></p>\r\n\r\n<ul>\r\n	<li>Được gia c&ocirc;ng với chất liệu an to&agrave;n 100%</li>\r\n	<li>L&agrave;m nổi bật phong c&aacute;ch, thể hiện bản lĩnh của giới trẻ</li>\r\n	<li>Nổi bật giữa đ&aacute;m đ&ocirc;ng với sản phẩm chất lượng</li>\r\n</ul>\r\n\r\n<p><strong>XUẤT XỨ</strong></p>\r\n\r\n<ul>\r\n	<li>Việt Nam</li>\r\n</ul>', 100000, 0, '1671128297.png', 874, 0, 0, 206, '2022-12-15 08:06:44', '2023-02-08 00:33:30'),
(2, 1, 1, 'BAD UNIVERSITY', 'Chiếc áo dành cho các đối tượng giới rẻ, nhìn là đã mê', '<p><strong>ĐỘT PH&Aacute;</strong></p>\r\n\r\n<ul>\r\n	<li>Sản phẩm mang thiết kế độc đ&aacute;o</li>\r\n	<li>Được thiết kế tr&ecirc;n c&ocirc;ng nghệ ti&ecirc;u chuẩn cao, mang đến sự năng động, c&aacute; t&iacute;nh</li>\r\n	<li>Gia c&ocirc;ng 100% tại Việt Nam</li>\r\n</ul>\r\n\r\n<p><strong>ĐẶC ĐIỂM NỔI BẬT</strong></p>\r\n\r\n<ul>\r\n	<li>Chất liệu: 80% Cotton, 18% Polyester, 2% Spandex</li>\r\n	<li>Co gi&atilde;n, mềm mại, tho&aacute;ng kh&iacute; v&agrave; thoải m&aacute;i khi mang cả ng&agrave;y</li>\r\n	<li>Kiểu dệt Mesh tại phần bắp ch&acirc;n v&agrave; l&ograve;ng b&agrave;n ch&acirc;n mang đến sự &ocirc;m hơn v&agrave; tho&aacute;ng kh&iacute; hơn</li>\r\n	<li>Giữ nhiệt tốt</li>\r\n	<li>Đa họa tiết</li>\r\n	<li>Mang lại sự trẻ trung, kh&ocirc;ng lỗi thời</li>\r\n	<li>Đem lại cảm gi&aacute;c hack tuổi</li>\r\n</ul>\r\n\r\n<p><strong>PH&Aacute; C&Aacute;CH</strong></p>\r\n\r\n<ul>\r\n	<li>Được gia c&ocirc;ng với chất liệu an to&agrave;n 100%</li>\r\n	<li>L&agrave;m nổi bật phong c&aacute;ch, thể hiện bản lĩnh của giới trẻ</li>\r\n	<li>Nổi bật giữa đ&aacute;m đ&ocirc;ng với sản phẩm chất lượng</li>\r\n</ul>\r\n\r\n<p><strong>XUẤT XỨ</strong><br />\r\nViệt Nam</p>', 120000, 90, '1671128598.png', 1000, 1, 0, 21, '2022-12-15 11:23:18', '2023-02-07 11:47:45'),
(3, 1, 1, 'BALLOON RABBIT TEE', 'Chiếc áo dành cho các đối tượng giới rẻ, nhìn là đã mê', '<p><strong>ĐỘT PH&Aacute;</strong></p>\r\n\r\n<ul>\r\n	<li>Sản phẩm mang thiết kế độc đ&aacute;o</li>\r\n	<li>Được thiết kế tr&ecirc;n c&ocirc;ng nghệ ti&ecirc;u chuẩn cao, mang đến sự năng động, c&aacute; t&iacute;nh</li>\r\n	<li>Gia c&ocirc;ng 100% tại Việt Nam</li>\r\n</ul>\r\n\r\n<p><strong>ĐẶC ĐIỂM NỔI BẬT</strong></p>\r\n\r\n<ul>\r\n	<li>Chất liệu: 80% Cotton, 18% Polyester, 2% Spandex</li>\r\n	<li>Co gi&atilde;n, mềm mại, tho&aacute;ng kh&iacute; v&agrave; thoải m&aacute;i khi mang cả ng&agrave;y</li>\r\n	<li>Kiểu dệt Mesh tại phần bắp ch&acirc;n v&agrave; l&ograve;ng b&agrave;n ch&acirc;n mang đến sự &ocirc;m hơn v&agrave; tho&aacute;ng kh&iacute; hơn</li>\r\n	<li>Giữ nhiệt tốt</li>\r\n	<li>Đa họa tiết</li>\r\n	<li>Mang lại sự trẻ trung, kh&ocirc;ng lỗi thời</li>\r\n	<li>Đem lại cảm gi&aacute;c hack tuổi</li>\r\n</ul>\r\n\r\n<p><strong>PH&Aacute; C&Aacute;CH</strong></p>\r\n\r\n<ul>\r\n	<li>Được gia c&ocirc;ng với chất liệu an to&agrave;n 100%</li>\r\n	<li>L&agrave;m nổi bật phong c&aacute;ch, thể hiện bản lĩnh của giới trẻ</li>\r\n	<li>Nổi bật giữa đ&aacute;m đ&ocirc;ng với sản phẩm chất lượng</li>\r\n</ul>\r\n\r\n<p><strong>XUẤT XỨ</strong></p>\r\n\r\n<ul>\r\n	<li>Việt Nam</li>\r\n</ul>', 150000, 90, '1671128993.png', 1000, 1, 0, 70, '2022-12-15 11:29:53', '2023-02-07 11:49:06'),
(4, 5, 1, 'BASICISM LAYER ORANGE', 'Chiếc áo dành cho các đối tượng giới rẻ, nhìn là đã mê', '<p><strong>ĐỘT PH&Aacute;</strong></p>\r\n\r\n<ul>\r\n	<li>Sản phẩm mang thiết kế độc đ&aacute;o</li>\r\n	<li>Được thiết kế tr&ecirc;n c&ocirc;ng nghệ ti&ecirc;u chuẩn cao, mang đến sự năng động, c&aacute; t&iacute;nh</li>\r\n	<li>Gia c&ocirc;ng 100% tại Việt Nam</li>\r\n</ul>\r\n\r\n<p><strong>ĐẶC ĐIỂM NỔI BẬT</strong></p>\r\n\r\n<ul>\r\n	<li>Chất liệu: 80% Cotton, 18% Polyester, 2% Spandex</li>\r\n	<li>Co gi&atilde;n, mềm mại, tho&aacute;ng kh&iacute; v&agrave; thoải m&aacute;i khi mang cả ng&agrave;y</li>\r\n	<li>Kiểu dệt Mesh tại phần bắp ch&acirc;n v&agrave; l&ograve;ng b&agrave;n ch&acirc;n mang đến sự &ocirc;m hơn v&agrave; tho&aacute;ng kh&iacute; hơn</li>\r\n	<li>Giữ nhiệt tốt</li>\r\n	<li>Đa họa tiết</li>\r\n	<li>Mang lại sự trẻ trung, kh&ocirc;ng lỗi thời</li>\r\n	<li>Đem lại cảm gi&aacute;c hack tuổi</li>\r\n</ul>\r\n\r\n<p><strong>PH&Aacute; C&Aacute;CH</strong></p>\r\n\r\n<ul>\r\n	<li>Được gia c&ocirc;ng với chất liệu an to&agrave;n 100%</li>\r\n	<li>L&agrave;m nổi bật phong c&aacute;ch, thể hiện bản lĩnh của giới trẻ</li>\r\n	<li>Nổi bật giữa đ&aacute;m đ&ocirc;ng với sản phẩm chất lượng</li>\r\n</ul>\r\n\r\n<p><strong>XUẤT XỨ</strong></p>\r\n\r\n<ul>\r\n	<li>Việt Nam</li>\r\n</ul>', 100000, 0, '1671129424.png', 990, 0, 0, 18, '2022-12-15 11:37:04', '2023-02-07 22:25:13'),
(5, 1, 1, 'BLACK BUDDY RABBIT TEE', 'Chiếc áo dành cho các đối tượng giới rẻ, nhìn là đã mê', '<p><strong>ĐỘT PH&Aacute;</strong></p>\r\n\r\n<ul>\r\n	<li>Sản phẩm mang thiết kế độc đ&aacute;o</li>\r\n	<li>Được thiết kế tr&ecirc;n c&ocirc;ng nghệ ti&ecirc;u chuẩn cao, mang đến sự năng động, c&aacute; t&iacute;nh</li>\r\n	<li>Gia c&ocirc;ng 100% tại Việt Nam</li>\r\n</ul>\r\n\r\n<p><strong>ĐẶC ĐIỂM NỔI BẬT</strong></p>\r\n\r\n<ul>\r\n	<li>Chất liệu: 80% Cotton, 18% Polyester, 2% Spandex</li>\r\n	<li>Co gi&atilde;n, mềm mại, tho&aacute;ng kh&iacute; v&agrave; thoải m&aacute;i khi mang cả ng&agrave;y</li>\r\n	<li>Kiểu dệt Mesh tại phần bắp ch&acirc;n v&agrave; l&ograve;ng b&agrave;n ch&acirc;n mang đến sự &ocirc;m hơn v&agrave; tho&aacute;ng kh&iacute; hơn</li>\r\n	<li>Giữ nhiệt tốt</li>\r\n	<li>Đa họa tiết</li>\r\n	<li>Mang lại sự trẻ trung, kh&ocirc;ng lỗi thời</li>\r\n	<li>Đem lại cảm gi&aacute;c hack tuổi</li>\r\n</ul>\r\n\r\n<p><strong>PH&Aacute; C&Aacute;CH</strong></p>\r\n\r\n<ul>\r\n	<li>Được gia c&ocirc;ng với chất liệu an to&agrave;n 100%</li>\r\n	<li>L&agrave;m nổi bật phong c&aacute;ch, thể hiện bản lĩnh của giới trẻ</li>\r\n	<li>Nổi bật giữa đ&aacute;m đ&ocirc;ng với sản phẩm chất lượng</li>\r\n</ul>\r\n\r\n<p><strong>XUẤT XỨ</strong></p>\r\n\r\n<ul>\r\n	<li>Việt Nam</li>\r\n</ul>', 150000, 70, '1671130094.png', 1000, 0, 0, 8, '2022-12-15 11:48:14', '2023-01-31 06:59:17'),
(6, 1, 1, 'LABEL WASH', 'Chiếc áo dành cho các đối tượng giới rẻ, nhìn là đã mê', '<p><strong>ĐỘT PH&Aacute;</strong></p>\r\n\r\n<ul>\r\n	<li>Sản phẩm mang thiết kế độc đ&aacute;o</li>\r\n	<li>Được thiết kế tr&ecirc;n c&ocirc;ng nghệ ti&ecirc;u chuẩn cao, mang đến sự năng động, c&aacute; t&iacute;nh</li>\r\n	<li>Gia c&ocirc;ng 100% tại Việt Nam</li>\r\n</ul>\r\n\r\n<p><strong>ĐẶC ĐIỂM NỔI BẬT</strong></p>\r\n\r\n<ul>\r\n	<li>Chất liệu: 80% Cotton, 18% Polyester, 2% Spandex</li>\r\n	<li>Co gi&atilde;n, mềm mại, tho&aacute;ng kh&iacute; v&agrave; thoải m&aacute;i khi mang cả ng&agrave;y</li>\r\n	<li>Kiểu dệt Mesh tại phần bắp ch&acirc;n v&agrave; l&ograve;ng b&agrave;n ch&acirc;n mang đến sự &ocirc;m hơn v&agrave; tho&aacute;ng kh&iacute; hơn</li>\r\n	<li>Giữ nhiệt tốt</li>\r\n	<li>Đa họa tiết</li>\r\n	<li>Mang lại sự trẻ trung, kh&ocirc;ng lỗi thời</li>\r\n	<li>Đem lại cảm gi&aacute;c hack tuổi</li>\r\n</ul>\r\n\r\n<p><strong>PH&Aacute; C&Aacute;CH</strong></p>\r\n\r\n<ul>\r\n	<li>Được gia c&ocirc;ng với chất liệu an to&agrave;n 100%</li>\r\n	<li>L&agrave;m nổi bật phong c&aacute;ch, thể hiện bản lĩnh của giới trẻ</li>\r\n	<li>Nổi bật giữa đ&aacute;m đ&ocirc;ng với sản phẩm chất lượng</li>\r\n</ul>\r\n\r\n<p><strong>XUẤT XỨ</strong></p>\r\n\r\n<ul>\r\n	<li>Việt Nam</li>\r\n</ul>', 150000, 70, '1671132826.png', 1000, 0, 0, 3, '2022-12-15 12:13:03', '2023-01-31 06:59:22'),
(7, 1, 1, 'ESCAPE PLAN BLACK', 'Chiếc áo dành cho các đối tượng giới rẻ, nhìn là đã mê', '<p><strong>ĐỘT PH&Aacute;</strong></p>\r\n\r\n<ul>\r\n	<li>Sản phẩm mang thiết kế độc đ&aacute;o</li>\r\n	<li>Được thiết kế tr&ecirc;n c&ocirc;ng nghệ ti&ecirc;u chuẩn cao, mang đến sự năng động, c&aacute; t&iacute;nh</li>\r\n	<li>Gia c&ocirc;ng 100% tại Việt Nam</li>\r\n</ul>\r\n\r\n<p><strong>ĐẶC ĐIỂM NỔI BẬT</strong></p>\r\n\r\n<ul>\r\n	<li>Chất liệu: 80% Cotton, 18% Polyester, 2% Spandex</li>\r\n	<li>Co gi&atilde;n, mềm mại, tho&aacute;ng kh&iacute; v&agrave; thoải m&aacute;i khi mang cả ng&agrave;y</li>\r\n	<li>Kiểu dệt Mesh tại phần bắp ch&acirc;n v&agrave; l&ograve;ng b&agrave;n ch&acirc;n mang đến sự &ocirc;m hơn v&agrave; tho&aacute;ng kh&iacute; hơn</li>\r\n	<li>Giữ nhiệt tốt</li>\r\n	<li>Đa họa tiết</li>\r\n	<li>Mang lại sự trẻ trung, kh&ocirc;ng lỗi thời</li>\r\n	<li>Đem lại cảm gi&aacute;c hack tuổi</li>\r\n</ul>\r\n\r\n<p><strong>PH&Aacute; C&Aacute;CH</strong></p>\r\n\r\n<ul>\r\n	<li>Được gia c&ocirc;ng với chất liệu an to&agrave;n 100%</li>\r\n	<li>L&agrave;m nổi bật phong c&aacute;ch, thể hiện bản lĩnh của giới trẻ</li>\r\n	<li>Nổi bật giữa đ&aacute;m đ&ocirc;ng với sản phẩm chất lượng</li>\r\n</ul>\r\n\r\n<p><strong>XUẤT XỨ</strong></p>\r\n\r\n<ul>\r\n	<li>Việt Nam</li>\r\n</ul>', 200000, 80, '1671132885.png', 1000, 0, 0, 11, '2022-12-15 12:14:44', '2022-12-24 21:04:58'),
(8, 1, 1, 'ESCAPE BLUE SKY', 'Chiếc áo dành cho các đối tượng giới rẻ, nhìn là đã mê', '<p><strong>ĐỘT PH&Aacute;</strong></p>\r\n\r\n<ul>\r\n	<li>Sản phẩm mang thiết kế độc đ&aacute;o</li>\r\n	<li>Được thiết kế tr&ecirc;n c&ocirc;ng nghệ ti&ecirc;u chuẩn cao, mang đến sự năng động, c&aacute; t&iacute;nh</li>\r\n	<li>Gia c&ocirc;ng 100% tại Việt Nam</li>\r\n</ul>\r\n\r\n<p><strong>ĐẶC ĐIỂM NỔI BẬT</strong></p>\r\n\r\n<ul>\r\n	<li>Chất liệu: 80% Cotton, 18% Polyester, 2% Spandex</li>\r\n	<li>Co gi&atilde;n, mềm mại, tho&aacute;ng kh&iacute; v&agrave; thoải m&aacute;i khi mang cả ng&agrave;y</li>\r\n	<li>Kiểu dệt Mesh tại phần bắp ch&acirc;n v&agrave; l&ograve;ng b&agrave;n ch&acirc;n mang đến sự &ocirc;m hơn v&agrave; tho&aacute;ng kh&iacute; hơn</li>\r\n	<li>Giữ nhiệt tốt</li>\r\n	<li>Đa họa tiết</li>\r\n	<li>Mang lại sự trẻ trung, kh&ocirc;ng lỗi thời</li>\r\n	<li>Đem lại cảm gi&aacute;c hack tuổi</li>\r\n</ul>\r\n\r\n<p><strong>PH&Aacute; C&Aacute;CH</strong></p>\r\n\r\n<ul>\r\n	<li>Được gia c&ocirc;ng với chất liệu an to&agrave;n 100%</li>\r\n	<li>L&agrave;m nổi bật phong c&aacute;ch, thể hiện bản lĩnh của giới trẻ</li>\r\n	<li>Nổi bật giữa đ&aacute;m đ&ocirc;ng với sản phẩm chất lượng</li>\r\n</ul>\r\n\r\n<p><strong>XUẤT XỨ</strong></p>\r\n\r\n<ul>\r\n	<li>Việt Nam</li>\r\n</ul>', 100000, 0, '1671133204.png', 1000, 0, 0, 1, '2022-12-15 12:19:58', '2022-12-27 09:20:27'),
(9, 1, 1, 'GOOD BOY', 'Chiếc áo dành cho các đối tượng giới rẻ, nhìn là đã mê', '<p><strong>ĐỘT PH&Aacute;</strong></p>\r\n\r\n<ul>\r\n	<li>Sản phẩm mang thiết kế độc đ&aacute;o</li>\r\n	<li>Được thiết kế tr&ecirc;n c&ocirc;ng nghệ ti&ecirc;u chuẩn cao, mang đến sự năng động, c&aacute; t&iacute;nh</li>\r\n	<li>Gia c&ocirc;ng 100% tại Việt Nam</li>\r\n</ul>\r\n\r\n<p><strong>ĐẶC ĐIỂM NỔI BẬT</strong></p>\r\n\r\n<ul>\r\n	<li>Chất liệu: 80% Cotton, 18% Polyester, 2% Spandex</li>\r\n	<li>Co gi&atilde;n, mềm mại, tho&aacute;ng kh&iacute; v&agrave; thoải m&aacute;i khi mang cả ng&agrave;y</li>\r\n	<li>Kiểu dệt Mesh tại phần bắp ch&acirc;n v&agrave; l&ograve;ng b&agrave;n ch&acirc;n mang đến sự &ocirc;m hơn v&agrave; tho&aacute;ng kh&iacute; hơn</li>\r\n	<li>Giữ nhiệt tốt</li>\r\n	<li>Đa họa tiết</li>\r\n	<li>Mang lại sự trẻ trung, kh&ocirc;ng lỗi thời</li>\r\n	<li>Đem lại cảm gi&aacute;c hack tuổi</li>\r\n</ul>\r\n\r\n<p><strong>PH&Aacute; C&Aacute;CH</strong></p>\r\n\r\n<ul>\r\n	<li>Được gia c&ocirc;ng với chất liệu an to&agrave;n 100%</li>\r\n	<li>L&agrave;m nổi bật phong c&aacute;ch, thể hiện bản lĩnh của giới trẻ</li>\r\n	<li>Nổi bật giữa đ&aacute;m đ&ocirc;ng với sản phẩm chất lượng</li>\r\n</ul>\r\n\r\n<p><strong>XUẤT XỨ</strong></p>\r\n\r\n<ul>\r\n	<li>Việt Nam</li>\r\n</ul>', 100000, 0, '1671133341.png', 1000, 0, 0, 2, '2022-12-15 12:25:23', '2022-12-27 12:21:05'),
(10, 1, 1, 'EXIT BLACK', 'Chiếc áo dành cho các đối tượng giới rẻ, nhìn là đã mê', '<p><strong>ĐỘT PH&Aacute;</strong></p>\r\n\r\n<ul>\r\n	<li>Sản phẩm mang thiết kế độc đ&aacute;o</li>\r\n	<li>Được thiết kế tr&ecirc;n c&ocirc;ng nghệ ti&ecirc;u chuẩn cao, mang đến sự năng động, c&aacute; t&iacute;nh</li>\r\n	<li>Gia c&ocirc;ng 100% tại Việt Nam</li>\r\n</ul>\r\n\r\n<p><strong>ĐẶC ĐIỂM NỔI BẬT</strong></p>\r\n\r\n<ul>\r\n	<li>Chất liệu: 80% Cotton, 18% Polyester, 2% Spandex</li>\r\n	<li>Co gi&atilde;n, mềm mại, tho&aacute;ng kh&iacute; v&agrave; thoải m&aacute;i khi mang cả ng&agrave;y</li>\r\n	<li>Kiểu dệt Mesh tại phần bắp ch&acirc;n v&agrave; l&ograve;ng b&agrave;n ch&acirc;n mang đến sự &ocirc;m hơn v&agrave; tho&aacute;ng kh&iacute; hơn</li>\r\n	<li>Giữ nhiệt tốt</li>\r\n	<li>Đa họa tiết</li>\r\n	<li>Mang lại sự trẻ trung, kh&ocirc;ng lỗi thời</li>\r\n	<li>Đem lại cảm gi&aacute;c hack tuổi</li>\r\n</ul>\r\n\r\n<p><strong>PH&Aacute; C&Aacute;CH</strong></p>\r\n\r\n<ul>\r\n	<li>Được gia c&ocirc;ng với chất liệu an to&agrave;n 100%</li>\r\n	<li>L&agrave;m nổi bật phong c&aacute;ch, thể hiện bản lĩnh của giới trẻ</li>\r\n	<li>Nổi bật giữa đ&aacute;m đ&ocirc;ng với sản phẩm chất lượng</li>\r\n</ul>\r\n\r\n<p><strong>XUẤT XỨ</strong><br />\r\nViệt Nam</p>', 250000, 0, '1671133398.png', 1000, 0, 0, 1, '2022-12-15 12:31:24', '2023-01-06 08:12:51'),
(11, 1, 1, 'GREEN TEE', '200000', '<p><strong>ĐỘT PH&Aacute;</strong></p>\r\n\r\n<ul>\r\n	<li>Sản phẩm mang thiết kế độc đ&aacute;o</li>\r\n	<li>Được thiết kế tr&ecirc;n c&ocirc;ng nghệ ti&ecirc;u chuẩn cao, mang đến sự năng động, c&aacute; t&iacute;nh</li>\r\n	<li>Gia c&ocirc;ng 100% tại Việt Nam</li>\r\n</ul>\r\n\r\n<p><strong>ĐẶC ĐIỂM NỔI BẬT</strong></p>\r\n\r\n<ul>\r\n	<li>Chất liệu: 80% Cotton, 18% Polyester, 2% Spandex</li>\r\n	<li>Co gi&atilde;n, mềm mại, tho&aacute;ng kh&iacute; v&agrave; thoải m&aacute;i khi mang cả ng&agrave;y</li>\r\n	<li>Kiểu dệt Mesh tại phần bắp ch&acirc;n v&agrave; l&ograve;ng b&agrave;n ch&acirc;n mang đến sự &ocirc;m hơn v&agrave; tho&aacute;ng kh&iacute; hơn</li>\r\n	<li>Giữ nhiệt tốt</li>\r\n	<li>Đa họa tiết</li>\r\n	<li>Mang lại sự trẻ trung, kh&ocirc;ng lỗi thời</li>\r\n	<li>Đem lại cảm gi&aacute;c hack tuổi</li>\r\n</ul>\r\n\r\n<p><strong>PH&Aacute; C&Aacute;CH</strong></p>\r\n\r\n<ul>\r\n	<li>Được gia c&ocirc;ng với chất liệu an to&agrave;n 100%</li>\r\n	<li>L&agrave;m nổi bật phong c&aacute;ch, thể hiện bản lĩnh của giới trẻ</li>\r\n	<li>Nổi bật giữa đ&aacute;m đ&ocirc;ng với sản phẩm chất lượng</li>\r\n</ul>\r\n\r\n<p><strong>XUẤT XỨ</strong></p>\r\n\r\n<ul>\r\n	<li>Việt Nam</li>\r\n</ul>', 300000, 60, '1671133576.png', 1000, 0, 0, 4, '2022-12-15 12:46:16', '2023-02-07 12:01:06'),
(12, 2, 1, 'PINK BRIGHT', 'Chiếc áo dành cho các đối tượng giới rẻ, nhìn là đã mê', '<p><strong>ĐỘT PH&Aacute;</strong></p>\r\n\r\n<ul>\r\n	<li>Sản phẩm mang thiết kế độc đ&aacute;o</li>\r\n	<li>Được thiết kế tr&ecirc;n c&ocirc;ng nghệ ti&ecirc;u chuẩn cao, mang đến sự năng động, c&aacute; t&iacute;nh</li>\r\n	<li>Gia c&ocirc;ng 100% tại Việt Nam</li>\r\n</ul>\r\n\r\n<p><strong>ĐẶC ĐIỂM NỔI BẬT</strong></p>\r\n\r\n<ul>\r\n	<li>Chất liệu: 80% Cotton, 18% Polyester, 2% Spandex</li>\r\n	<li>Co gi&atilde;n, mềm mại, tho&aacute;ng kh&iacute; v&agrave; thoải m&aacute;i khi mang cả ng&agrave;y</li>\r\n	<li>Kiểu dệt Mesh tại phần bắp ch&acirc;n v&agrave; l&ograve;ng b&agrave;n ch&acirc;n mang đến sự &ocirc;m hơn v&agrave; tho&aacute;ng kh&iacute; hơn</li>\r\n	<li>Giữ nhiệt tốt</li>\r\n	<li>Đa họa tiết</li>\r\n	<li>Mang lại sự trẻ trung, kh&ocirc;ng lỗi thời</li>\r\n	<li>Đem lại cảm gi&aacute;c hack tuổi</li>\r\n</ul>\r\n\r\n<p><strong>PH&Aacute; C&Aacute;CH</strong></p>\r\n\r\n<ul>\r\n	<li>Được gia c&ocirc;ng với chất liệu an to&agrave;n 100%</li>\r\n	<li>L&agrave;m nổi bật phong c&aacute;ch, thể hiện bản lĩnh của giới trẻ</li>\r\n	<li>Nổi bật giữa đ&aacute;m đ&ocirc;ng với sản phẩm chất lượng</li>\r\n</ul>\r\n\r\n<p><strong>XUẤT XỨ</strong></p>\r\n\r\n<ul>\r\n	<li>Việt Nam</li>\r\n</ul>', 100000, 80, '1671133845.png', 1000, 0, 0, 1, '2022-12-15 12:50:45', '2022-12-24 11:11:00'),
(13, 2, 1, 'EXPLORER SHIRT', 'Chiếc áo dành cho các đối tượng giới rẻ, nhìn là đã mê', '<p><strong>ĐỘT PH&Aacute;</strong></p>\r\n\r\n<ul>\r\n	<li>Sản phẩm mang thiết kế độc đ&aacute;o</li>\r\n	<li>Được thiết kế tr&ecirc;n c&ocirc;ng nghệ ti&ecirc;u chuẩn cao, mang đến sự năng động, c&aacute; t&iacute;nh</li>\r\n	<li>Gia c&ocirc;ng 100% tại Việt Nam</li>\r\n</ul>\r\n\r\n<p><strong>ĐẶC ĐIỂM NỔI BẬT</strong></p>\r\n\r\n<ul>\r\n	<li>Chất liệu: 80% Cotton, 18% Polyester, 2% Spandex</li>\r\n	<li>Co gi&atilde;n, mềm mại, tho&aacute;ng kh&iacute; v&agrave; thoải m&aacute;i khi mang cả ng&agrave;y</li>\r\n	<li>Kiểu dệt Mesh tại phần bắp ch&acirc;n v&agrave; l&ograve;ng b&agrave;n ch&acirc;n mang đến sự &ocirc;m hơn v&agrave; tho&aacute;ng kh&iacute; hơn</li>\r\n	<li>Giữ nhiệt tốt</li>\r\n	<li>Đa họa tiết</li>\r\n	<li>Mang lại sự trẻ trung, kh&ocirc;ng lỗi thời</li>\r\n	<li>Đem lại cảm gi&aacute;c hack tuổi</li>\r\n</ul>\r\n\r\n<p><strong>PH&Aacute; C&Aacute;CH</strong></p>\r\n\r\n<ul>\r\n	<li>Được gia c&ocirc;ng với chất liệu an to&agrave;n 100%</li>\r\n	<li>L&agrave;m nổi bật phong c&aacute;ch, thể hiện bản lĩnh của giới trẻ</li>\r\n	<li>Nổi bật giữa đ&aacute;m đ&ocirc;ng với sản phẩm chất lượng</li>\r\n</ul>\r\n\r\n<p><strong>XUẤT XỨ</strong></p>\r\n\r\n<ul>\r\n	<li>Việt Nam</li>\r\n</ul>', 200000, 70, '1671133951.png', 1000, 0, 0, 1, '2022-12-15 12:52:31', '2022-12-24 08:38:05'),
(14, 2, 1, 'CIGARABBIT SHIRT', 'Chiếc áo dành cho các đối tượng giới rẻ, nhìn là đã mê', '<p><strong>ĐỘT PH&Aacute;</strong></p>\r\n\r\n<ul>\r\n	<li>Sản phẩm mang thiết kế độc đ&aacute;o</li>\r\n	<li>Được thiết kế tr&ecirc;n c&ocirc;ng nghệ ti&ecirc;u chuẩn cao, mang đến sự năng động, c&aacute; t&iacute;nh</li>\r\n	<li>Gia c&ocirc;ng 100% tại Việt Nam</li>\r\n</ul>\r\n\r\n<p><strong>ĐẶC ĐIỂM NỔI BẬT</strong></p>\r\n\r\n<ul>\r\n	<li>Chất liệu: 80% Cotton, 18% Polyester, 2% Spandex</li>\r\n	<li>Co gi&atilde;n, mềm mại, tho&aacute;ng kh&iacute; v&agrave; thoải m&aacute;i khi mang cả ng&agrave;y</li>\r\n	<li>Kiểu dệt Mesh tại phần bắp ch&acirc;n v&agrave; l&ograve;ng b&agrave;n ch&acirc;n mang đến sự &ocirc;m hơn v&agrave; tho&aacute;ng kh&iacute; hơn</li>\r\n	<li>Giữ nhiệt tốt</li>\r\n	<li>Đa họa tiết</li>\r\n	<li>Mang lại sự trẻ trung, kh&ocirc;ng lỗi thời</li>\r\n	<li>Đem lại cảm gi&aacute;c hack tuổi</li>\r\n</ul>\r\n\r\n<p><strong>PH&Aacute; C&Aacute;CH</strong></p>\r\n\r\n<ul>\r\n	<li>Được gia c&ocirc;ng với chất liệu an to&agrave;n 100%</li>\r\n	<li>L&agrave;m nổi bật phong c&aacute;ch, thể hiện bản lĩnh của giới trẻ</li>\r\n	<li>Nổi bật giữa đ&aacute;m đ&ocirc;ng với sản phẩm chất lượng</li>\r\n</ul>\r\n\r\n<p><strong>XUẤT XỨ</strong></p>\r\n\r\n<ul>\r\n	<li>Việt Nam</li>\r\n</ul>', 300000, 60, '1671137498.png', 1000, 0, 0, 1, '2022-12-15 13:51:38', '2023-02-07 16:44:32'),
(15, 2, 1, 'CHECKED RABBIT SHIRT', 'Chiếc áo dành cho các đối tượng giới rẻ, nhìn là đã mê', '<p><strong>ĐỘT PH&Aacute;</strong></p>\r\n\r\n<ul>\r\n	<li>Sản phẩm mang thiết kế độc đ&aacute;o</li>\r\n	<li>Được thiết kế tr&ecirc;n c&ocirc;ng nghệ ti&ecirc;u chuẩn cao, mang đến sự năng động, c&aacute; t&iacute;nh</li>\r\n	<li>Gia c&ocirc;ng 100% tại Việt Nam</li>\r\n</ul>\r\n\r\n<p><strong>ĐẶC ĐIỂM NỔI BẬT</strong></p>\r\n\r\n<ul>\r\n	<li>Chất liệu: 80% Cotton, 18% Polyester, 2% Spandex</li>\r\n	<li>Co gi&atilde;n, mềm mại, tho&aacute;ng kh&iacute; v&agrave; thoải m&aacute;i khi mang cả ng&agrave;y</li>\r\n	<li>Kiểu dệt Mesh tại phần bắp ch&acirc;n v&agrave; l&ograve;ng b&agrave;n ch&acirc;n mang đến sự &ocirc;m hơn v&agrave; tho&aacute;ng kh&iacute; hơn</li>\r\n	<li>Giữ nhiệt tốt</li>\r\n	<li>Đa họa tiết</li>\r\n	<li>Mang lại sự trẻ trung, kh&ocirc;ng lỗi thời</li>\r\n	<li>Đem lại cảm gi&aacute;c hack tuổi</li>\r\n</ul>\r\n\r\n<p><strong>PH&Aacute; C&Aacute;CH</strong></p>\r\n\r\n<ul>\r\n	<li>Được gia c&ocirc;ng với chất liệu an to&agrave;n 100%</li>\r\n	<li>L&agrave;m nổi bật phong c&aacute;ch, thể hiện bản lĩnh của giới trẻ</li>\r\n	<li>Nổi bật giữa đ&aacute;m đ&ocirc;ng với sản phẩm chất lượng</li>\r\n</ul>\r\n\r\n<p><strong>XUẤT XỨ</strong></p>\r\n\r\n<ul>\r\n	<li>Việt Nam</li>\r\n</ul>', 650000, 0, '1671137798.png', 1000, 0, 0, 3, '2022-12-15 13:56:38', '2023-02-07 16:43:47'),
(16, 2, 1, 'ESSENTIAL FLANNEL', 'Chiếc áo dành cho các đối tượng giới rẻ, nhìn là đã mê', '<p><strong>ĐỘT PH&Aacute;</strong></p>\r\n\r\n<ul>\r\n	<li>Sản phẩm mang thiết kế độc đ&aacute;o</li>\r\n	<li>Được thiết kế tr&ecirc;n c&ocirc;ng nghệ ti&ecirc;u chuẩn cao, mang đến sự năng động, c&aacute; t&iacute;nh</li>\r\n	<li>Gia c&ocirc;ng 100% tại Việt Nam</li>\r\n</ul>\r\n\r\n<p><strong>ĐẶC ĐIỂM NỔI BẬT</strong></p>\r\n\r\n<ul>\r\n	<li>Chất liệu: 80% Cotton, 18% Polyester, 2% Spandex</li>\r\n	<li>Co gi&atilde;n, mềm mại, tho&aacute;ng kh&iacute; v&agrave; thoải m&aacute;i khi mang cả ng&agrave;y</li>\r\n	<li>Kiểu dệt Mesh tại phần bắp ch&acirc;n v&agrave; l&ograve;ng b&agrave;n ch&acirc;n mang đến sự &ocirc;m hơn v&agrave; tho&aacute;ng kh&iacute; hơn</li>\r\n	<li>Giữ nhiệt tốt</li>\r\n	<li>Đa họa tiết</li>\r\n	<li>Mang lại sự trẻ trung, kh&ocirc;ng lỗi thời</li>\r\n	<li>Đem lại cảm gi&aacute;c hack tuổi</li>\r\n</ul>\r\n\r\n<p><strong>PH&Aacute; C&Aacute;CH</strong></p>\r\n\r\n<ul>\r\n	<li>Được gia c&ocirc;ng với chất liệu an to&agrave;n 100%</li>\r\n	<li>L&agrave;m nổi bật phong c&aacute;ch, thể hiện bản lĩnh của giới trẻ</li>\r\n	<li>Nổi bật giữa đ&aacute;m đ&ocirc;ng với sản phẩm chất lượng</li>\r\n</ul>\r\n\r\n<p><strong>XUẤT XỨ</strong></p>\r\n\r\n<ul>\r\n	<li>Việt Nam</li>\r\n</ul>', 650000, 0, '1671137962.png', 1000, 0, 0, 1, '2022-12-15 13:59:22', '2023-02-07 16:43:22'),
(17, 2, 1, 'OLD SKOOL FLANNEL RED', 'Chiếc áo dành cho các đối tượng giới rẻ, nhìn là đã mê', '<p><strong>ĐỘT PH&Aacute;</strong></p>\r\n\r\n<ul>\r\n	<li>Sản phẩm mang thiết kế độc đ&aacute;o</li>\r\n	<li>Được thiết kế tr&ecirc;n c&ocirc;ng nghệ ti&ecirc;u chuẩn cao, mang đến sự năng động, c&aacute; t&iacute;nh</li>\r\n	<li>Gia c&ocirc;ng 100% tại Việt Nam</li>\r\n</ul>\r\n\r\n<p><strong>ĐẶC ĐIỂM NỔI BẬT</strong></p>\r\n\r\n<ul>\r\n	<li>Chất liệu: 80% Cotton, 18% Polyester, 2% Spandex</li>\r\n	<li>Co gi&atilde;n, mềm mại, tho&aacute;ng kh&iacute; v&agrave; thoải m&aacute;i khi mang cả ng&agrave;y</li>\r\n	<li>Kiểu dệt Mesh tại phần bắp ch&acirc;n v&agrave; l&ograve;ng b&agrave;n ch&acirc;n mang đến sự &ocirc;m hơn v&agrave; tho&aacute;ng kh&iacute; hơn</li>\r\n	<li>Giữ nhiệt tốt</li>\r\n	<li>Đa họa tiết</li>\r\n	<li>Mang lại sự trẻ trung, kh&ocirc;ng lỗi thời</li>\r\n	<li>Đem lại cảm gi&aacute;c hack tuổi</li>\r\n</ul>\r\n\r\n<p><strong>PH&Aacute; C&Aacute;CH</strong></p>\r\n\r\n<ul>\r\n	<li>Được gia c&ocirc;ng với chất liệu an to&agrave;n 100%</li>\r\n	<li>L&agrave;m nổi bật phong c&aacute;ch, thể hiện bản lĩnh của giới trẻ</li>\r\n	<li>Nổi bật giữa đ&aacute;m đ&ocirc;ng với sản phẩm chất lượng</li>\r\n</ul>\r\n\r\n<p><strong>XUẤT XỨ</strong></p>\r\n\r\n<ul>\r\n	<li>Việt Nam</li>\r\n</ul>', 650000, 0, '1671138152.png', 1000, 0, 0, 1, '2022-12-15 14:02:32', '2023-02-07 16:42:49'),
(18, 3, 1, 'MOUNTAIN SHORT', 'Chiếc áo dành cho các đối tượng giới rẻ, nhìn là đã mê', '<p><strong>ĐỘT PH&Aacute;</strong></p>\r\n\r\n<ul>\r\n	<li>Sản phẩm mang thiết kế độc đ&aacute;o</li>\r\n	<li>Được thiết kế tr&ecirc;n c&ocirc;ng nghệ ti&ecirc;u chuẩn cao, mang đến sự năng động, c&aacute; t&iacute;nh</li>\r\n	<li>Gia c&ocirc;ng 100% tại Việt Nam</li>\r\n</ul>\r\n\r\n<p><strong>ĐẶC ĐIỂM NỔI BẬT</strong></p>\r\n\r\n<ul>\r\n	<li>Chất liệu: 80% Cotton, 18% Polyester, 2% Spandex</li>\r\n	<li>Co gi&atilde;n, mềm mại, tho&aacute;ng kh&iacute; v&agrave; thoải m&aacute;i khi mang cả ng&agrave;y</li>\r\n	<li>Kiểu dệt Mesh tại phần bắp ch&acirc;n v&agrave; l&ograve;ng b&agrave;n ch&acirc;n mang đến sự &ocirc;m hơn v&agrave; tho&aacute;ng kh&iacute; hơn</li>\r\n	<li>Giữ nhiệt tốt</li>\r\n	<li>Đa họa tiết</li>\r\n	<li>Mang lại sự trẻ trung, kh&ocirc;ng lỗi thời</li>\r\n	<li>Đem lại cảm gi&aacute;c hack tuổi</li>\r\n</ul>\r\n\r\n<p><strong>PH&Aacute; C&Aacute;CH</strong></p>\r\n\r\n<ul>\r\n	<li>Được gia c&ocirc;ng với chất liệu an to&agrave;n 100%</li>\r\n	<li>L&agrave;m nổi bật phong c&aacute;ch, thể hiện bản lĩnh của giới trẻ</li>\r\n	<li>Nổi bật giữa đ&aacute;m đ&ocirc;ng với sản phẩm chất lượng</li>\r\n</ul>\r\n\r\n<p><strong>XUẤT XỨ</strong></p>\r\n\r\n<ul>\r\n	<li>Việt Nam</li>\r\n</ul>', 500000, 0, '1671138358.png', 1000, 0, 0, 1, '2022-12-15 14:05:58', '2023-02-07 10:21:27'),
(19, 3, 1, '\"OUTDOOR EVERYDAY\" CARGO PANTS', 'Chiếc áo dành cho các đối tượng giới rẻ, nhìn là đã mê', '<p><strong>ĐỘT PH&Aacute;</strong></p>\r\n\r\n<ul>\r\n	<li>Sản phẩm mang thiết kế độc đ&aacute;o</li>\r\n	<li>Được thiết kế tr&ecirc;n c&ocirc;ng nghệ ti&ecirc;u chuẩn cao, mang đến sự năng động, c&aacute; t&iacute;nh</li>\r\n	<li>Gia c&ocirc;ng 100% tại Việt Nam</li>\r\n</ul>\r\n\r\n<p><strong>ĐẶC ĐIỂM NỔI BẬT</strong></p>\r\n\r\n<ul>\r\n	<li>Chất liệu: 80% Cotton, 18% Polyester, 2% Spandex</li>\r\n	<li>Co gi&atilde;n, mềm mại, tho&aacute;ng kh&iacute; v&agrave; thoải m&aacute;i khi mang cả ng&agrave;y</li>\r\n	<li>Kiểu dệt Mesh tại phần bắp ch&acirc;n v&agrave; l&ograve;ng b&agrave;n ch&acirc;n mang đến sự &ocirc;m hơn v&agrave; tho&aacute;ng kh&iacute; hơn</li>\r\n	<li>Giữ nhiệt tốt</li>\r\n	<li>Đa họa tiết</li>\r\n	<li>Mang lại sự trẻ trung, kh&ocirc;ng lỗi thời</li>\r\n	<li>Đem lại cảm gi&aacute;c hack tuổi</li>\r\n</ul>\r\n\r\n<p><strong>PH&Aacute; C&Aacute;CH</strong></p>\r\n\r\n<ul>\r\n	<li>Được gia c&ocirc;ng với chất liệu an to&agrave;n 100%</li>\r\n	<li>L&agrave;m nổi bật phong c&aacute;ch, thể hiện bản lĩnh của giới trẻ</li>\r\n	<li>Nổi bật giữa đ&aacute;m đ&ocirc;ng với sản phẩm chất lượng</li>\r\n</ul>\r\n\r\n<p><strong>XUẤT XỨ</strong></p>\r\n\r\n<ul>\r\n	<li>Việt Nam</li>\r\n</ul>', 850000, 0, '1671138610.png', 1000, 0, 0, 2, '2022-12-15 14:10:10', '2023-02-07 16:41:38'),
(20, 3, 1, '\"OUTDOOR EVERYDAY\" SHORTS - BL', 'Chiếc áo dành cho các đối tượng giới rẻ, nhìn là đã mê', '<p><strong>ĐỘT PH&Aacute;</strong></p>\r\n\r\n<ul>\r\n	<li>Sản phẩm mang thiết kế độc đ&aacute;o</li>\r\n	<li>Được thiết kế tr&ecirc;n c&ocirc;ng nghệ ti&ecirc;u chuẩn cao, mang đến sự năng động, c&aacute; t&iacute;nh</li>\r\n	<li>Gia c&ocirc;ng 100% tại Việt Nam</li>\r\n</ul>\r\n\r\n<p><strong>ĐẶC ĐIỂM NỔI BẬT</strong></p>\r\n\r\n<ul>\r\n	<li>Chất liệu: 80% Cotton, 18% Polyester, 2% Spandex</li>\r\n	<li>Co gi&atilde;n, mềm mại, tho&aacute;ng kh&iacute; v&agrave; thoải m&aacute;i khi mang cả ng&agrave;y</li>\r\n	<li>Kiểu dệt Mesh tại phần bắp ch&acirc;n v&agrave; l&ograve;ng b&agrave;n ch&acirc;n mang đến sự &ocirc;m hơn v&agrave; tho&aacute;ng kh&iacute; hơn</li>\r\n	<li>Giữ nhiệt tốt</li>\r\n	<li>Đa họa tiết</li>\r\n	<li>Mang lại sự trẻ trung, kh&ocirc;ng lỗi thời</li>\r\n	<li>Đem lại cảm gi&aacute;c hack tuổi</li>\r\n</ul>\r\n\r\n<p><strong>PH&Aacute; C&Aacute;CH</strong></p>\r\n\r\n<ul>\r\n	<li>Được gia c&ocirc;ng với chất liệu an to&agrave;n 100%</li>\r\n	<li>L&agrave;m nổi bật phong c&aacute;ch, thể hiện bản lĩnh của giới trẻ</li>\r\n	<li>Nổi bật giữa đ&aacute;m đ&ocirc;ng với sản phẩm chất lượng</li>\r\n</ul>\r\n\r\n<p><strong>XUẤT XỨ</strong></p>\r\n\r\n<ul>\r\n	<li>Việt Nam</li>\r\n</ul>', 480000, 0, '1671138746.png', 1000, 0, 0, 6, '2022-12-15 14:12:26', '2023-02-07 16:41:06'),
(21, 3, 1, 'SIGNATURE LASER-PRINTED JEANS', 'Chiếc áo dành cho các đối tượng giới rẻ, nhìn là đã mê', '<p><strong>ĐỘT PH&Aacute;</strong></p>\r\n\r\n<ul>\r\n	<li>Sản phẩm mang thiết kế độc đ&aacute;o</li>\r\n	<li>Được thiết kế tr&ecirc;n c&ocirc;ng nghệ ti&ecirc;u chuẩn cao, mang đến sự năng động, c&aacute; t&iacute;nh</li>\r\n	<li>Gia c&ocirc;ng 100% tại Việt Nam</li>\r\n</ul>\r\n\r\n<p><strong>ĐẶC ĐIỂM NỔI BẬT</strong></p>\r\n\r\n<ul>\r\n	<li>Chất liệu: 80% Cotton, 18% Polyester, 2% Spandex</li>\r\n	<li>Co gi&atilde;n, mềm mại, tho&aacute;ng kh&iacute; v&agrave; thoải m&aacute;i khi mang cả ng&agrave;y</li>\r\n	<li>Kiểu dệt Mesh tại phần bắp ch&acirc;n v&agrave; l&ograve;ng b&agrave;n ch&acirc;n mang đến sự &ocirc;m hơn v&agrave; tho&aacute;ng kh&iacute; hơn</li>\r\n	<li>Giữ nhiệt tốt</li>\r\n	<li>Đa họa tiết</li>\r\n	<li>Mang lại sự trẻ trung, kh&ocirc;ng lỗi thời</li>\r\n	<li>Đem lại cảm gi&aacute;c hack tuổi</li>\r\n</ul>\r\n\r\n<p><strong>PH&Aacute; C&Aacute;CH</strong></p>\r\n\r\n<ul>\r\n	<li>Được gia c&ocirc;ng với chất liệu an to&agrave;n 100%</li>\r\n	<li>L&agrave;m nổi bật phong c&aacute;ch, thể hiện bản lĩnh của giới trẻ</li>\r\n	<li>Nổi bật giữa đ&aacute;m đ&ocirc;ng với sản phẩm chất lượng</li>\r\n</ul>\r\n\r\n<p><strong>XUẤT XỨ</strong></p>\r\n\r\n<ul>\r\n	<li>Việt Nam</li>\r\n</ul>', 750000, 0, '1671138894.png', 1000, 0, 0, 7, '2022-12-15 14:14:54', '2023-02-07 16:40:35'),
(22, 3, 1, 'UTILITY BOX POCKET SHORTS - TA', 'Chiếc áo dành cho các đối tượng giới rẻ, nhìn là đã mê', '<p><strong>ĐỘT PH&Aacute;</strong></p>\r\n\r\n<ul>\r\n	<li>Sản phẩm mang thiết kế độc đ&aacute;o</li>\r\n	<li>Được thiết kế tr&ecirc;n c&ocirc;ng nghệ ti&ecirc;u chuẩn cao, mang đến sự năng động, c&aacute; t&iacute;nh</li>\r\n	<li>Gia c&ocirc;ng 100% tại Việt Nam</li>\r\n</ul>\r\n\r\n<p><strong>ĐẶC ĐIỂM NỔI BẬT</strong></p>\r\n\r\n<ul>\r\n	<li>Chất liệu: 80% Cotton, 18% Polyester, 2% Spandex</li>\r\n	<li>Co gi&atilde;n, mềm mại, tho&aacute;ng kh&iacute; v&agrave; thoải m&aacute;i khi mang cả ng&agrave;y</li>\r\n	<li>Kiểu dệt Mesh tại phần bắp ch&acirc;n v&agrave; l&ograve;ng b&agrave;n ch&acirc;n mang đến sự &ocirc;m hơn v&agrave; tho&aacute;ng kh&iacute; hơn</li>\r\n	<li>Giữ nhiệt tốt</li>\r\n	<li>Đa họa tiết</li>\r\n	<li>Mang lại sự trẻ trung, kh&ocirc;ng lỗi thời</li>\r\n	<li>Đem lại cảm gi&aacute;c hack tuổi</li>\r\n</ul>\r\n\r\n<p><strong>PH&Aacute; C&Aacute;CH</strong></p>\r\n\r\n<ul>\r\n	<li>Được gia c&ocirc;ng với chất liệu an to&agrave;n 100%</li>\r\n	<li>L&agrave;m nổi bật phong c&aacute;ch, thể hiện bản lĩnh của giới trẻ</li>\r\n	<li>Nổi bật giữa đ&aacute;m đ&ocirc;ng với sản phẩm chất lượng</li>\r\n</ul>\r\n\r\n<p><strong>XUẤT XỨ</strong></p>\r\n\r\n<ul>\r\n	<li>Việt Nam</li>\r\n</ul>', 600000, 0, '1671139032.png', 1000, 0, 0, 1, '2022-12-15 14:17:12', '2023-01-31 18:58:03'),
(23, 4, 1, '\"TAKE A TRIP\" WINDBREAKER JACK', 'Chiếc áo dành cho các đối tượng giới rẻ, nhìn là đã mê', '<p><strong>ĐỘT PH&Aacute;</strong></p>\r\n\r\n<ul>\r\n	<li>Sản phẩm mang thiết kế độc đ&aacute;o</li>\r\n	<li>Được thiết kế tr&ecirc;n c&ocirc;ng nghệ ti&ecirc;u chuẩn cao, mang đến sự năng động, c&aacute; t&iacute;nh</li>\r\n	<li>Gia c&ocirc;ng 100% tại Việt Nam</li>\r\n</ul>\r\n\r\n<p><strong>ĐẶC ĐIỂM NỔI BẬT</strong></p>\r\n\r\n<ul>\r\n	<li>Chất liệu: 80% Cotton, 18% Polyester, 2% Spandex</li>\r\n	<li>Co gi&atilde;n, mềm mại, tho&aacute;ng kh&iacute; v&agrave; thoải m&aacute;i khi mang cả ng&agrave;y</li>\r\n	<li>Kiểu dệt Mesh tại phần bắp ch&acirc;n v&agrave; l&ograve;ng b&agrave;n ch&acirc;n mang đến sự &ocirc;m hơn v&agrave; tho&aacute;ng kh&iacute; hơn</li>\r\n	<li>Giữ nhiệt tốt</li>\r\n	<li>Đa họa tiết</li>\r\n	<li>Mang lại sự trẻ trung, kh&ocirc;ng lỗi thời</li>\r\n	<li>Đem lại cảm gi&aacute;c hack tuổi</li>\r\n</ul>\r\n\r\n<p><strong>PH&Aacute; C&Aacute;CH</strong></p>\r\n\r\n<ul>\r\n	<li>Được gia c&ocirc;ng với chất liệu an to&agrave;n 100%</li>\r\n	<li>L&agrave;m nổi bật phong c&aacute;ch, thể hiện bản lĩnh của giới trẻ</li>\r\n	<li>Nổi bật giữa đ&aacute;m đ&ocirc;ng với sản phẩm chất lượng</li>\r\n</ul>\r\n\r\n<p><strong>XUẤT XỨ</strong></p>\r\n\r\n<ul>\r\n	<li>Việt Nam</li>\r\n</ul>', 950000, 0, '1671139235.png', 1000, 0, 0, 0, '2022-12-15 14:20:35', '2023-01-31 18:57:40'),
(24, 4, 1, 'WIND BREAKER JACKET', 'Chiếc áo dành cho các đối tượng giới rẻ, nhìn là đã mê', '<p><strong>ĐỘT PH&Aacute;</strong></p>\r\n\r\n<ul>\r\n	<li>Sản phẩm mang thiết kế độc đ&aacute;o</li>\r\n	<li>Được thiết kế tr&ecirc;n c&ocirc;ng nghệ ti&ecirc;u chuẩn cao, mang đến sự năng động, c&aacute; t&iacute;nh</li>\r\n	<li>Gia c&ocirc;ng 100% tại Việt Nam</li>\r\n</ul>\r\n\r\n<p><strong>ĐẶC ĐIỂM NỔI BẬT</strong></p>\r\n\r\n<ul>\r\n	<li>Chất liệu: 80% Cotton, 18% Polyester, 2% Spandex</li>\r\n	<li>Co gi&atilde;n, mềm mại, tho&aacute;ng kh&iacute; v&agrave; thoải m&aacute;i khi mang cả ng&agrave;y</li>\r\n	<li>Kiểu dệt Mesh tại phần bắp ch&acirc;n v&agrave; l&ograve;ng b&agrave;n ch&acirc;n mang đến sự &ocirc;m hơn v&agrave; tho&aacute;ng kh&iacute; hơn</li>\r\n	<li>Giữ nhiệt tốt</li>\r\n	<li>Đa họa tiết</li>\r\n	<li>Mang lại sự trẻ trung, kh&ocirc;ng lỗi thời</li>\r\n	<li>Đem lại cảm gi&aacute;c hack tuổi</li>\r\n</ul>\r\n\r\n<p><strong>PH&Aacute; C&Aacute;CH</strong></p>\r\n\r\n<ul>\r\n	<li>Được gia c&ocirc;ng với chất liệu an to&agrave;n 100%</li>\r\n	<li>L&agrave;m nổi bật phong c&aacute;ch, thể hiện bản lĩnh của giới trẻ</li>\r\n	<li>Nổi bật giữa đ&aacute;m đ&ocirc;ng với sản phẩm chất lượng</li>\r\n</ul>\r\n\r\n<p><strong>XUẤT XỨ</strong></p>\r\n\r\n<ul>\r\n	<li>Việt Nam</li>\r\n</ul>', 560000, 0, '1671139397.png', 1000, 0, 0, 0, '2022-12-15 14:23:17', '2023-01-31 18:53:20'),
(25, 4, 1, 'FIRER VARSITY', 'Chiếc áo dành cho các đối tượng giới rẻ, nhìn là đã mê', '<p><strong>ĐỘT PH&Aacute;</strong></p>\r\n\r\n<ul>\r\n	<li>Sản phẩm mang thiết kế độc đ&aacute;o</li>\r\n	<li>Được thiết kế tr&ecirc;n c&ocirc;ng nghệ ti&ecirc;u chuẩn cao, mang đến sự năng động, c&aacute; t&iacute;nh</li>\r\n	<li>Gia c&ocirc;ng 100% tại Việt Nam</li>\r\n</ul>\r\n\r\n<p><strong>ĐẶC ĐIỂM NỔI BẬT</strong></p>\r\n\r\n<ul>\r\n	<li>Chất liệu: 80% Cotton, 18% Polyester, 2% Spandex</li>\r\n	<li>Co gi&atilde;n, mềm mại, tho&aacute;ng kh&iacute; v&agrave; thoải m&aacute;i khi mang cả ng&agrave;y</li>\r\n	<li>Kiểu dệt Mesh tại phần bắp ch&acirc;n v&agrave; l&ograve;ng b&agrave;n ch&acirc;n mang đến sự &ocirc;m hơn v&agrave; tho&aacute;ng kh&iacute; hơn</li>\r\n	<li>Giữ nhiệt tốt</li>\r\n	<li>Đa họa tiết</li>\r\n	<li>Mang lại sự trẻ trung, kh&ocirc;ng lỗi thời</li>\r\n	<li>Đem lại cảm gi&aacute;c hack tuổi</li>\r\n</ul>\r\n\r\n<p><strong>PH&Aacute; C&Aacute;CH</strong></p>\r\n\r\n<ul>\r\n	<li>Được gia c&ocirc;ng với chất liệu an to&agrave;n 100%</li>\r\n	<li>L&agrave;m nổi bật phong c&aacute;ch, thể hiện bản lĩnh của giới trẻ</li>\r\n	<li>Nổi bật giữa đ&aacute;m đ&ocirc;ng với sản phẩm chất lượng</li>\r\n</ul>\r\n\r\n<p><strong>XUẤT XỨ</strong></p>\r\n\r\n<ul>\r\n	<li>Việt Nam</li>\r\n</ul>', 1800000, 0, '1671139551.png', 1000, 0, 0, 1, '2022-12-15 14:25:51', '2023-01-31 18:57:01'),
(26, 4, 1, 'SUKAJAN JACKET', 'Chiếc áo dành cho các đối tượng giới rẻ, nhìn là đã mê', '<p><strong>ĐỘT PH&Aacute;</strong></p>\r\n\r\n<ul>\r\n	<li>Sản phẩm mang thiết kế độc đ&aacute;o</li>\r\n	<li>Được thiết kế tr&ecirc;n c&ocirc;ng nghệ ti&ecirc;u chuẩn cao, mang đến sự năng động, c&aacute; t&iacute;nh</li>\r\n	<li>Gia c&ocirc;ng 100% tại Việt Nam</li>\r\n</ul>\r\n\r\n<p><strong>ĐẶC ĐIỂM NỔI BẬT</strong></p>\r\n\r\n<ul>\r\n	<li>Chất liệu: 80% Cotton, 18% Polyester, 2% Spandex</li>\r\n	<li>Co gi&atilde;n, mềm mại, tho&aacute;ng kh&iacute; v&agrave; thoải m&aacute;i khi mang cả ng&agrave;y</li>\r\n	<li>Kiểu dệt Mesh tại phần bắp ch&acirc;n v&agrave; l&ograve;ng b&agrave;n ch&acirc;n mang đến sự &ocirc;m hơn v&agrave; tho&aacute;ng kh&iacute; hơn</li>\r\n	<li>Giữ nhiệt tốt</li>\r\n	<li>Đa họa tiết</li>\r\n	<li>Mang lại sự trẻ trung, kh&ocirc;ng lỗi thời</li>\r\n	<li>Đem lại cảm gi&aacute;c hack tuổi</li>\r\n</ul>\r\n\r\n<p><strong>PH&Aacute; C&Aacute;CH</strong></p>\r\n\r\n<ul>\r\n	<li>Được gia c&ocirc;ng với chất liệu an to&agrave;n 100%</li>\r\n	<li>L&agrave;m nổi bật phong c&aacute;ch, thể hiện bản lĩnh của giới trẻ</li>\r\n	<li>Nổi bật giữa đ&aacute;m đ&ocirc;ng với sản phẩm chất lượng</li>\r\n</ul>\r\n\r\n<p><strong>XUẤT XỨ</strong></p>\r\n\r\n<ul>\r\n	<li>Việt Nam</li>\r\n</ul>', 900000, 0, '1671139711.png', 1000, 0, 0, 0, '2022-12-15 14:28:31', '2023-01-31 18:56:45'),
(27, 4, 1, 'BAD D.N.A BOMBER JACKET', 'Chiếc áo dành cho các đối tượng giới rẻ, nhìn là đã mê', '<p><strong>ĐỘT PH&Aacute;</strong></p>\r\n\r\n<ul>\r\n	<li>Sản phẩm mang thiết kế độc đ&aacute;o</li>\r\n	<li>Được thiết kế tr&ecirc;n c&ocirc;ng nghệ ti&ecirc;u chuẩn cao, mang đến sự năng động, c&aacute; t&iacute;nh</li>\r\n	<li>Gia c&ocirc;ng 100% tại Việt Nam</li>\r\n</ul>\r\n\r\n<p><strong>ĐẶC ĐIỂM NỔI BẬT</strong></p>\r\n\r\n<ul>\r\n	<li>Chất liệu: 80% Cotton, 18% Polyester, 2% Spandex</li>\r\n	<li>Co gi&atilde;n, mềm mại, tho&aacute;ng kh&iacute; v&agrave; thoải m&aacute;i khi mang cả ng&agrave;y</li>\r\n	<li>Kiểu dệt Mesh tại phần bắp ch&acirc;n v&agrave; l&ograve;ng b&agrave;n ch&acirc;n mang đến sự &ocirc;m hơn v&agrave; tho&aacute;ng kh&iacute; hơn</li>\r\n	<li>Giữ nhiệt tốt</li>\r\n	<li>Đa họa tiết</li>\r\n	<li>Mang lại sự trẻ trung, kh&ocirc;ng lỗi thời</li>\r\n	<li>Đem lại cảm gi&aacute;c hack tuổi</li>\r\n</ul>\r\n\r\n<p><strong>PH&Aacute; C&Aacute;CH</strong></p>\r\n\r\n<ul>\r\n	<li>Được gia c&ocirc;ng với chất liệu an to&agrave;n 100%</li>\r\n	<li>L&agrave;m nổi bật phong c&aacute;ch, thể hiện bản lĩnh của giới trẻ</li>\r\n	<li>Nổi bật giữa đ&aacute;m đ&ocirc;ng với sản phẩm chất lượng</li>\r\n</ul>\r\n\r\n<p><strong>XUẤT XỨ</strong></p>\r\n\r\n<ul>\r\n	<li>Việt Nam</li>\r\n</ul>', 990000, 0, '1671139912.png', 930, 0, 0, 3, '2022-12-15 14:31:52', '2023-02-06 08:37:32'),
(28, 5, 1, 'MEMORABLE ZIP HOODIE', 'Chiếc áo dành cho các đối tượng giới rẻ, nhìn là đã mê', '<p><strong>ĐỘT PH&Aacute;</strong></p>\r\n\r\n<ul>\r\n	<li>Sản phẩm mang thiết kế độc đ&aacute;o</li>\r\n	<li>Được thiết kế tr&ecirc;n c&ocirc;ng nghệ ti&ecirc;u chuẩn cao, mang đến sự năng động, c&aacute; t&iacute;nh</li>\r\n	<li>Gia c&ocirc;ng 100% tại Việt Nam</li>\r\n</ul>\r\n\r\n<p><strong>ĐẶC ĐIỂM NỔI BẬT</strong></p>\r\n\r\n<ul>\r\n	<li>Chất liệu: 80% Cotton, 18% Polyester, 2% Spandex</li>\r\n	<li>Co gi&atilde;n, mềm mại, tho&aacute;ng kh&iacute; v&agrave; thoải m&aacute;i khi mang cả ng&agrave;y</li>\r\n	<li>Kiểu dệt Mesh tại phần bắp ch&acirc;n v&agrave; l&ograve;ng b&agrave;n ch&acirc;n mang đến sự &ocirc;m hơn v&agrave; tho&aacute;ng kh&iacute; hơn</li>\r\n	<li>Giữ nhiệt tốt</li>\r\n	<li>Đa họa tiết</li>\r\n	<li>Mang lại sự trẻ trung, kh&ocirc;ng lỗi thời</li>\r\n	<li>Đem lại cảm gi&aacute;c hack tuổi</li>\r\n</ul>\r\n\r\n<p><strong>PH&Aacute; C&Aacute;CH</strong></p>\r\n\r\n<ul>\r\n	<li>Được gia c&ocirc;ng với chất liệu an to&agrave;n 100%</li>\r\n	<li>L&agrave;m nổi bật phong c&aacute;ch, thể hiện bản lĩnh của giới trẻ</li>\r\n	<li>Nổi bật giữa đ&aacute;m đ&ocirc;ng với sản phẩm chất lượng</li>\r\n</ul>\r\n\r\n<p><strong>XUẤT XỨ</strong></p>\r\n\r\n<ul>\r\n	<li>Việt Nam</li>\r\n</ul>', 850000, 0, '1671140084.png', 920, 0, 0, 2, '2022-12-15 14:34:44', '2023-02-06 08:37:32'),
(29, 5, 1, 'NOBODY HOODIE BLACK', 'Chiếc áo dành cho các đối tượng giới rẻ, nhìn là đã mê', '<p><strong>ĐỘT PH&Aacute;</strong></p>\r\n\r\n<ul>\r\n	<li>Sản phẩm mang thiết kế độc đ&aacute;o</li>\r\n	<li>Được thiết kế tr&ecirc;n c&ocirc;ng nghệ ti&ecirc;u chuẩn cao, mang đến sự năng động, c&aacute; t&iacute;nh</li>\r\n	<li>Gia c&ocirc;ng 100% tại Việt Nam</li>\r\n</ul>\r\n\r\n<p><strong>ĐẶC ĐIỂM NỔI BẬT</strong></p>\r\n\r\n<ul>\r\n	<li>Chất liệu: 80% Cotton, 18% Polyester, 2% Spandex</li>\r\n	<li>Co gi&atilde;n, mềm mại, tho&aacute;ng kh&iacute; v&agrave; thoải m&aacute;i khi mang cả ng&agrave;y</li>\r\n	<li>Kiểu dệt Mesh tại phần bắp ch&acirc;n v&agrave; l&ograve;ng b&agrave;n ch&acirc;n mang đến sự &ocirc;m hơn v&agrave; tho&aacute;ng kh&iacute; hơn</li>\r\n	<li>Giữ nhiệt tốt</li>\r\n	<li>Đa họa tiết</li>\r\n	<li>Mang lại sự trẻ trung, kh&ocirc;ng lỗi thời</li>\r\n	<li>Đem lại cảm gi&aacute;c hack tuổi</li>\r\n</ul>\r\n\r\n<p><strong>PH&Aacute; C&Aacute;CH</strong></p>\r\n\r\n<ul>\r\n	<li>Được gia c&ocirc;ng với chất liệu an to&agrave;n 100%</li>\r\n	<li>L&agrave;m nổi bật phong c&aacute;ch, thể hiện bản lĩnh của giới trẻ</li>\r\n	<li>Nổi bật giữa đ&aacute;m đ&ocirc;ng với sản phẩm chất lượng</li>\r\n</ul>\r\n\r\n<p><strong>XUẤT XỨ</strong></p>\r\n\r\n<ul>\r\n	<li>Việt Nam</li>\r\n</ul>', 850000, 70, '1671140231.png', 980, 0, 0, 9, '2022-12-15 14:37:11', '2023-02-07 12:01:00'),
(30, 5, 1, 'SPRAY WASHED SWEATER', 'Chiếc áo dành cho các đối tượng giới rẻ, nhìn là đã mê', '<p><strong>ĐỘT PH&Aacute;</strong></p>\r\n\r\n<ul>\r\n	<li>Sản phẩm mang thiết kế độc đ&aacute;o</li>\r\n	<li>Được thiết kế tr&ecirc;n c&ocirc;ng nghệ ti&ecirc;u chuẩn cao, mang đến sự năng động, c&aacute; t&iacute;nh</li>\r\n	<li>Gia c&ocirc;ng 100% tại Việt Nam</li>\r\n</ul>\r\n\r\n<p><strong>ĐẶC ĐIỂM NỔI BẬT</strong></p>\r\n\r\n<ul>\r\n	<li>Chất liệu: 80% Cotton, 18% Polyester, 2% Spandex</li>\r\n	<li>Co gi&atilde;n, mềm mại, tho&aacute;ng kh&iacute; v&agrave; thoải m&aacute;i khi mang cả ng&agrave;y</li>\r\n	<li>Kiểu dệt Mesh tại phần bắp ch&acirc;n v&agrave; l&ograve;ng b&agrave;n ch&acirc;n mang đến sự &ocirc;m hơn v&agrave; tho&aacute;ng kh&iacute; hơn</li>\r\n	<li>Giữ nhiệt tốt</li>\r\n	<li>Đa họa tiết</li>\r\n	<li>Mang lại sự trẻ trung, kh&ocirc;ng lỗi thời</li>\r\n	<li>Đem lại cảm gi&aacute;c hack tuổi</li>\r\n</ul>\r\n\r\n<p><strong>PH&Aacute; C&Aacute;CH</strong></p>\r\n\r\n<ul>\r\n	<li>Được gia c&ocirc;ng với chất liệu an to&agrave;n 100%</li>\r\n	<li>L&agrave;m nổi bật phong c&aacute;ch, thể hiện bản lĩnh của giới trẻ</li>\r\n	<li>Nổi bật giữa đ&aacute;m đ&ocirc;ng với sản phẩm chất lượng</li>\r\n</ul>\r\n\r\n<p><strong>XUẤT XỨ</strong></p>\r\n\r\n<ul>\r\n	<li>Việt Nam</li>\r\n</ul>', 560000, 0, '1671140671.png', 940, 0, 0, 6, '2022-12-15 14:44:31', '2023-02-08 00:05:30'),
(31, 5, 1, 'TAKE IT EASY HOODIE', 'Chiếc áo dành cho các đối tượng giới rẻ, nhìn là đã mê', '<p><strong>ĐỘT PH&Aacute;</strong></p>\r\n\r\n<ul>\r\n	<li>Sản phẩm mang thiết kế độc đ&aacute;o</li>\r\n	<li>Được thiết kế tr&ecirc;n c&ocirc;ng nghệ ti&ecirc;u chuẩn cao, mang đến sự năng động, c&aacute; t&iacute;nh</li>\r\n	<li>Gia c&ocirc;ng 100% tại Việt Nam</li>\r\n</ul>\r\n\r\n<p><strong>ĐẶC ĐIỂM NỔI BẬT</strong></p>\r\n\r\n<ul>\r\n	<li>Chất liệu: 80% Cotton, 18% Polyester, 2% Spandex</li>\r\n	<li>Co gi&atilde;n, mềm mại, tho&aacute;ng kh&iacute; v&agrave; thoải m&aacute;i khi mang cả ng&agrave;y</li>\r\n	<li>Kiểu dệt Mesh tại phần bắp ch&acirc;n v&agrave; l&ograve;ng b&agrave;n ch&acirc;n mang đến sự &ocirc;m hơn v&agrave; tho&aacute;ng kh&iacute; hơn</li>\r\n	<li>Giữ nhiệt tốt</li>\r\n	<li>Đa họa tiết</li>\r\n	<li>Mang lại sự trẻ trung, kh&ocirc;ng lỗi thời</li>\r\n	<li>Đem lại cảm gi&aacute;c hack tuổi</li>\r\n</ul>\r\n\r\n<p><strong>PH&Aacute; C&Aacute;CH</strong></p>\r\n\r\n<ul>\r\n	<li>Được gia c&ocirc;ng với chất liệu an to&agrave;n 100%</li>\r\n	<li>L&agrave;m nổi bật phong c&aacute;ch, thể hiện bản lĩnh của giới trẻ</li>\r\n	<li>Nổi bật giữa đ&aacute;m đ&ocirc;ng với sản phẩm chất lượng</li>\r\n</ul>\r\n\r\n<p><strong>XUẤT XỨ</strong></p>\r\n\r\n<ul>\r\n	<li>Việt Nam</li>\r\n</ul>', 500000, 80, '1671140827.png', 980, 0, 0, 12, '2022-12-15 14:47:07', '2023-02-07 22:10:37'),
(32, 6, 1, 'AVOCADO FLOATING BAG', 'Chiếc áo dành cho các đối tượng giới rẻ, nhìn là đã mê', '<p><strong>ĐỘT PH&Aacute;</strong></p>\r\n\r\n<ul>\r\n	<li>Sản phẩm mang thiết kế độc đ&aacute;o</li>\r\n	<li>Được thiết kế tr&ecirc;n c&ocirc;ng nghệ ti&ecirc;u chuẩn cao, mang đến sự năng động, c&aacute; t&iacute;nh</li>\r\n	<li>Gia c&ocirc;ng 100% tại Việt Nam</li>\r\n</ul>\r\n\r\n<p><strong>ĐẶC ĐIỂM NỔI BẬT</strong></p>\r\n\r\n<ul>\r\n	<li>Chất liệu: 80% Cotton, 18% Polyester, 2% Spandex</li>\r\n	<li>Co gi&atilde;n, mềm mại, tho&aacute;ng kh&iacute; v&agrave; thoải m&aacute;i khi mang cả ng&agrave;y</li>\r\n	<li>Kiểu dệt Mesh tại phần bắp ch&acirc;n v&agrave; l&ograve;ng b&agrave;n ch&acirc;n mang đến sự &ocirc;m hơn v&agrave; tho&aacute;ng kh&iacute; hơn</li>\r\n	<li>Giữ nhiệt tốt</li>\r\n	<li>Đa họa tiết</li>\r\n	<li>Mang lại sự trẻ trung, kh&ocirc;ng lỗi thời</li>\r\n	<li>Đem lại cảm gi&aacute;c hack tuổi</li>\r\n</ul>\r\n\r\n<p><strong>PH&Aacute; C&Aacute;CH</strong></p>\r\n\r\n<ul>\r\n	<li>Được gia c&ocirc;ng với chất liệu an to&agrave;n 100%</li>\r\n	<li>L&agrave;m nổi bật phong c&aacute;ch, thể hiện bản lĩnh của giới trẻ</li>\r\n	<li>Nổi bật giữa đ&aacute;m đ&ocirc;ng với sản phẩm chất lượng</li>\r\n</ul>\r\n\r\n<p><strong>XUẤT XỨ</strong></p>\r\n\r\n<ul>\r\n	<li>Việt Nam</li>\r\n</ul>', 650000, 0, '1671141237.png', 1000, 0, 0, 1, '2022-12-15 14:53:57', '2023-02-02 07:32:59'),
(33, 6, 1, 'B.T.S RABBIT BACKPACK', 'Chiếc áo dành cho các đối tượng giới rẻ, nhìn là đã mê', '<p><strong>ĐỘT PH&Aacute;</strong></p>\r\n\r\n<ul>\r\n	<li>Sản phẩm mang thiết kế độc đ&aacute;o</li>\r\n	<li>Được thiết kế tr&ecirc;n c&ocirc;ng nghệ ti&ecirc;u chuẩn cao, mang đến sự năng động, c&aacute; t&iacute;nh</li>\r\n	<li>Gia c&ocirc;ng 100% tại Việt Nam</li>\r\n</ul>\r\n\r\n<p><strong>ĐẶC ĐIỂM NỔI BẬT</strong></p>\r\n\r\n<ul>\r\n	<li>Chất liệu: 80% Cotton, 18% Polyester, 2% Spandex</li>\r\n	<li>Co gi&atilde;n, mềm mại, tho&aacute;ng kh&iacute; v&agrave; thoải m&aacute;i khi mang cả ng&agrave;y</li>\r\n	<li>Kiểu dệt Mesh tại phần bắp ch&acirc;n v&agrave; l&ograve;ng b&agrave;n ch&acirc;n mang đến sự &ocirc;m hơn v&agrave; tho&aacute;ng kh&iacute; hơn</li>\r\n	<li>Giữ nhiệt tốt</li>\r\n	<li>Đa họa tiết</li>\r\n	<li>Mang lại sự trẻ trung, kh&ocirc;ng lỗi thời</li>\r\n	<li>Đem lại cảm gi&aacute;c hack tuổi</li>\r\n</ul>\r\n\r\n<p><strong>PH&Aacute; C&Aacute;CH</strong></p>\r\n\r\n<ul>\r\n	<li>Được gia c&ocirc;ng với chất liệu an to&agrave;n 100%</li>\r\n	<li>L&agrave;m nổi bật phong c&aacute;ch, thể hiện bản lĩnh của giới trẻ</li>\r\n	<li>Nổi bật giữa đ&aacute;m đ&ocirc;ng với sản phẩm chất lượng</li>\r\n</ul>\r\n\r\n<p><strong>XUẤT XỨ</strong></p>\r\n\r\n<ul>\r\n	<li>Việt Nam</li>\r\n</ul>', 700000, 0, '1671141398.png', 1000, 0, 0, 2, '2022-12-15 14:56:38', '2023-02-06 10:36:10'),
(34, 6, 1, 'BROWN HANGOUT BUCKET', 'Chiếc áo dành cho các đối tượng giới rẻ, nhìn là đã mê', '<p><strong>ĐỘT PH&Aacute;</strong></p>\r\n\r\n<ul>\r\n	<li>Sản phẩm mang thiết kế độc đ&aacute;o</li>\r\n	<li>Được thiết kế tr&ecirc;n c&ocirc;ng nghệ ti&ecirc;u chuẩn cao, mang đến sự năng động, c&aacute; t&iacute;nh</li>\r\n	<li>Gia c&ocirc;ng 100% tại Việt Nam</li>\r\n</ul>\r\n\r\n<p><strong>ĐẶC ĐIỂM NỔI BẬT</strong></p>\r\n\r\n<ul>\r\n	<li>Chất liệu: 80% Cotton, 18% Polyester, 2% Spandex</li>\r\n	<li>Co gi&atilde;n, mềm mại, tho&aacute;ng kh&iacute; v&agrave; thoải m&aacute;i khi mang cả ng&agrave;y</li>\r\n	<li>Kiểu dệt Mesh tại phần bắp ch&acirc;n v&agrave; l&ograve;ng b&agrave;n ch&acirc;n mang đến sự &ocirc;m hơn v&agrave; tho&aacute;ng kh&iacute; hơn</li>\r\n	<li>Giữ nhiệt tốt</li>\r\n	<li>Đa họa tiết</li>\r\n	<li>Mang lại sự trẻ trung, kh&ocirc;ng lỗi thời</li>\r\n	<li>Đem lại cảm gi&aacute;c hack tuổi</li>\r\n</ul>\r\n\r\n<p><strong>PH&Aacute; C&Aacute;CH</strong></p>\r\n\r\n<ul>\r\n	<li>Được gia c&ocirc;ng với chất liệu an to&agrave;n 100%</li>\r\n	<li>L&agrave;m nổi bật phong c&aacute;ch, thể hiện bản lĩnh của giới trẻ</li>\r\n	<li>Nổi bật giữa đ&aacute;m đ&ocirc;ng với sản phẩm chất lượng</li>\r\n</ul>\r\n\r\n<p><strong>XUẤT XỨ</strong></p>\r\n\r\n<ul>\r\n	<li>Việt Nam</li>\r\n</ul>', 250000, 0, '1671141624.png', 970, 0, 0, 2, '2022-12-15 15:00:24', '2023-02-06 10:36:37'),
(35, 6, 1, 'OUTDOOR PUFFER TOTE', 'Chiếc áo dành cho các đối tượng giới rẻ, nhìn là đã mê', '<p><strong>ĐỘT PH&Aacute;</strong></p>\r\n\r\n<ul>\r\n	<li>Sản phẩm mang thiết kế độc đ&aacute;o</li>\r\n	<li>Được thiết kế tr&ecirc;n c&ocirc;ng nghệ ti&ecirc;u chuẩn cao, mang đến sự năng động, c&aacute; t&iacute;nh</li>\r\n	<li>Gia c&ocirc;ng 100% tại Việt Nam</li>\r\n</ul>\r\n\r\n<p><strong>ĐẶC ĐIỂM NỔI BẬT</strong></p>\r\n\r\n<ul>\r\n	<li>Chất liệu: 80% Cotton, 18% Polyester, 2% Spandex</li>\r\n	<li>Co gi&atilde;n, mềm mại, tho&aacute;ng kh&iacute; v&agrave; thoải m&aacute;i khi mang cả ng&agrave;y</li>\r\n	<li>Kiểu dệt Mesh tại phần bắp ch&acirc;n v&agrave; l&ograve;ng b&agrave;n ch&acirc;n mang đến sự &ocirc;m hơn v&agrave; tho&aacute;ng kh&iacute; hơn</li>\r\n	<li>Giữ nhiệt tốt</li>\r\n	<li>Đa họa tiết</li>\r\n	<li>Mang lại sự trẻ trung, kh&ocirc;ng lỗi thời</li>\r\n	<li>Đem lại cảm gi&aacute;c hack tuổi</li>\r\n</ul>\r\n\r\n<p><strong>PH&Aacute; C&Aacute;CH</strong></p>\r\n\r\n<ul>\r\n	<li>Được gia c&ocirc;ng với chất liệu an to&agrave;n 100%</li>\r\n	<li>L&agrave;m nổi bật phong c&aacute;ch, thể hiện bản lĩnh của giới trẻ</li>\r\n	<li>Nổi bật giữa đ&aacute;m đ&ocirc;ng với sản phẩm chất lượng</li>\r\n</ul>\r\n\r\n<p><strong>XUẤT XỨ</strong></p>\r\n\r\n<ul>\r\n	<li>Việt Nam</li>\r\n</ul>', 550000, 0, '1671141828.png', 900, 0, 0, 21, '2022-12-15 15:03:48', '2023-02-08 00:42:34');
INSERT INTO `products` (`id`, `cate_id`, `brand_id`, `prod_name`, `prod_small_description`, `prod_detail_description`, `prod_original_price`, `prod_selling_price`, `prod_image`, `prod_quantity`, `prod_top_selling`, `prod_status`, `prod_views`, `created_at`, `updated_at`) VALUES
(36, 6, 1, 'TACTICAL \"\'FOREST\'\" 2-IN-1 BAC', 'Chiếc áo dành cho các đối tượng giới rẻ, nhìn là đã mê', '<p><strong>ĐỘT PH&Aacute;</strong></p>\r\n\r\n<ul>\r\n	<li>Sản phẩm mang thiết kế độc đ&aacute;o</li>\r\n	<li>Được thiết kế tr&ecirc;n c&ocirc;ng nghệ ti&ecirc;u chuẩn cao, mang đến sự năng động, c&aacute; t&iacute;nh</li>\r\n	<li>Gia c&ocirc;ng 100% tại Việt Nam</li>\r\n</ul>\r\n\r\n<p><strong>ĐẶC ĐIỂM NỔI BẬT</strong></p>\r\n\r\n<ul>\r\n	<li>Chất liệu: 80% Cotton, 18% Polyester, 2% Spandex</li>\r\n	<li>Co gi&atilde;n, mềm mại, tho&aacute;ng kh&iacute; v&agrave; thoải m&aacute;i khi mang cả ng&agrave;y</li>\r\n	<li>Kiểu dệt Mesh tại phần bắp ch&acirc;n v&agrave; l&ograve;ng b&agrave;n ch&acirc;n mang đến sự &ocirc;m hơn v&agrave; tho&aacute;ng kh&iacute; hơn</li>\r\n	<li>Giữ nhiệt tốt</li>\r\n	<li>Đa họa tiết</li>\r\n	<li>Mang lại sự trẻ trung, kh&ocirc;ng lỗi thời</li>\r\n	<li>Đem lại cảm gi&aacute;c hack tuổi</li>\r\n</ul>\r\n\r\n<p><strong>PH&Aacute; C&Aacute;CH</strong></p>\r\n\r\n<ul>\r\n	<li>Được gia c&ocirc;ng với chất liệu an to&agrave;n 100%</li>\r\n	<li>L&agrave;m nổi bật phong c&aacute;ch, thể hiện bản lĩnh của giới trẻ</li>\r\n	<li>Nổi bật giữa đ&aacute;m đ&ocirc;ng với sản phẩm chất lượng</li>\r\n</ul>\r\n\r\n<p><strong>XUẤT XỨ</strong></p>\r\n\r\n<ul>\r\n	<li>Việt Nam</li>\r\n</ul>', 990000, 0, '1671141981.png', 958, 0, 0, 20, '2022-12-15 15:06:21', '2023-02-08 00:26:44');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shipping_fees`
--

CREATE TABLE `shipping_fees` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tên loại hình ship',
  `fee` int(11) NOT NULL COMMENT 'Phí giao hàng',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sizes`
--

CREATE TABLE `sizes` (
  `id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sizes`
--

INSERT INTO `sizes` (`id`, `prod_id`, `size`, `created_at`, `updated_at`) VALUES
(2, 1, 'S', '2023-01-03 08:05:53', '2023-01-03 08:05:53'),
(6, 1, 'XXL', '2023-01-06 07:58:37', '2023-01-06 07:58:37'),
(11, 1, 'M', '2023-01-31 18:35:48', '2023-01-31 18:35:48'),
(12, 1, 'L', '2023-01-31 18:35:53', '2023-01-31 18:35:53'),
(13, 1, 'XL', '2023-01-31 18:35:57', '2023-01-31 18:35:57'),
(14, 35, 'M', '2023-01-31 18:38:03', '2023-01-31 18:38:03'),
(15, 35, 'L', '2023-01-31 18:38:07', '2023-01-31 18:38:07'),
(16, 36, 'M', '2023-01-31 18:38:15', '2023-01-31 18:38:15'),
(17, 36, 'L', '2023-01-31 18:38:19', '2023-01-31 18:38:19'),
(18, 34, 'M', '2023-01-31 18:38:25', '2023-01-31 18:38:25'),
(19, 34, 'L', '2023-01-31 18:38:28', '2023-01-31 18:38:28'),
(20, 33, 'M', '2023-01-31 18:39:10', '2023-01-31 18:39:10'),
(21, 33, 'L', '2023-01-31 18:39:13', '2023-01-31 18:39:13'),
(22, 32, 'M', '2023-01-31 18:39:37', '2023-01-31 18:39:37'),
(23, 32, 'L', '2023-01-31 18:39:40', '2023-01-31 18:39:40'),
(24, 31, 'S', '2023-01-31 18:43:34', '2023-01-31 18:43:34'),
(25, 31, 'M', '2023-01-31 18:43:38', '2023-01-31 18:43:38'),
(26, 31, 'L', '2023-01-31 18:43:42', '2023-01-31 18:43:42'),
(27, 31, 'XL', '2023-01-31 18:43:45', '2023-01-31 18:43:45'),
(28, 31, 'XXL', '2023-01-31 18:43:50', '2023-01-31 18:43:50'),
(29, 30, 'S', '2023-01-31 18:43:57', '2023-01-31 18:43:57'),
(30, 30, 'M', '2023-01-31 18:44:00', '2023-01-31 18:44:00'),
(31, 30, 'L', '2023-01-31 18:44:03', '2023-01-31 18:44:03'),
(32, 30, 'XL', '2023-01-31 18:44:06', '2023-01-31 18:44:06'),
(33, 30, 'XXL', '2023-01-31 18:44:09', '2023-01-31 18:44:09'),
(34, 29, 'S', '2023-01-31 18:44:16', '2023-01-31 18:44:16'),
(35, 29, 'M', '2023-01-31 18:44:19', '2023-01-31 18:44:19'),
(36, 29, 'XL', '2023-01-31 18:44:23', '2023-01-31 18:44:23'),
(37, 29, 'L', '2023-01-31 18:44:25', '2023-01-31 18:44:25'),
(38, 29, 'XXL', '2023-01-31 18:44:28', '2023-01-31 18:44:28'),
(39, 28, 'S', '2023-01-31 18:44:40', '2023-01-31 18:44:40'),
(40, 28, 'M', '2023-01-31 18:44:42', '2023-01-31 18:44:42'),
(41, 28, 'L', '2023-01-31 18:44:45', '2023-01-31 18:44:45'),
(42, 28, 'XL', '2023-01-31 18:44:48', '2023-01-31 18:44:48'),
(43, 28, 'XXL', '2023-01-31 18:44:50', '2023-01-31 18:44:50'),
(44, 27, 'S', '2023-01-31 18:44:57', '2023-01-31 18:44:57'),
(45, 27, 'M', '2023-01-31 18:45:00', '2023-01-31 18:45:00'),
(46, 27, 'L', '2023-01-31 18:45:03', '2023-01-31 18:45:03'),
(47, 27, 'XL', '2023-01-31 18:45:05', '2023-01-31 18:45:05'),
(48, 27, 'XXL', '2023-01-31 18:45:08', '2023-01-31 18:45:08'),
(49, 26, 'S', '2023-01-31 18:47:18', '2023-01-31 18:47:18'),
(50, 26, 'M', '2023-01-31 18:47:20', '2023-01-31 18:47:20'),
(51, 26, 'L', '2023-01-31 18:47:23', '2023-01-31 18:47:23'),
(52, 26, 'XL', '2023-01-31 18:47:26', '2023-01-31 18:47:26'),
(53, 26, 'XXL', '2023-01-31 18:47:29', '2023-01-31 18:47:29'),
(54, 25, 'S', '2023-01-31 18:47:37', '2023-01-31 18:47:37'),
(55, 25, 'M', '2023-01-31 18:47:40', '2023-01-31 18:47:40'),
(56, 25, 'L', '2023-01-31 18:47:43', '2023-01-31 18:47:43'),
(57, 25, 'XL', '2023-01-31 18:47:46', '2023-01-31 18:47:46'),
(58, 25, 'XXL', '2023-01-31 18:47:49', '2023-01-31 18:47:49'),
(59, 24, 'S', '2023-01-31 18:47:56', '2023-01-31 18:47:56'),
(60, 24, 'M', '2023-01-31 18:47:59', '2023-01-31 18:47:59'),
(61, 24, 'L', '2023-01-31 18:48:02', '2023-01-31 18:48:02'),
(62, 24, 'XL', '2023-01-31 18:48:06', '2023-01-31 18:48:06'),
(63, 24, 'XXL', '2023-01-31 18:48:09', '2023-01-31 18:48:09'),
(64, 23, 'S', '2023-01-31 18:48:21', '2023-01-31 18:48:21'),
(65, 23, 'M', '2023-01-31 18:48:24', '2023-01-31 18:48:24'),
(66, 23, 'L', '2023-01-31 18:48:27', '2023-01-31 18:48:27'),
(67, 23, 'XL', '2023-01-31 18:48:30', '2023-01-31 18:48:30'),
(68, 23, 'XXL', '2023-01-31 18:48:32', '2023-01-31 18:48:32'),
(69, 22, 'S', '2023-01-31 18:48:39', '2023-01-31 18:48:39'),
(70, 22, 'M', '2023-01-31 18:48:41', '2023-01-31 18:48:41'),
(71, 22, 'L', '2023-01-31 18:48:45', '2023-01-31 18:48:45'),
(72, 22, 'XL', '2023-01-31 18:48:47', '2023-01-31 18:48:47'),
(73, 22, 'XXL', '2023-01-31 18:48:50', '2023-01-31 18:48:50'),
(74, 21, 'S', '2023-02-07 10:23:07', '2023-02-07 10:23:07'),
(75, 21, 'M', '2023-02-07 10:23:10', '2023-02-07 10:23:10'),
(76, 21, 'L', '2023-02-07 10:23:13', '2023-02-07 10:23:13'),
(77, 21, 'XL', '2023-02-07 10:23:17', '2023-02-07 10:23:17'),
(78, 21, 'XXL', '2023-02-07 10:23:21', '2023-02-07 10:23:21'),
(79, 20, 'S', '2023-02-07 16:32:03', '2023-02-07 16:32:03'),
(80, 20, 'M', '2023-02-07 16:32:07', '2023-02-07 16:32:07'),
(81, 20, 'XL', '2023-02-07 16:32:13', '2023-02-07 16:32:13'),
(82, 20, 'L', '2023-02-07 16:32:16', '2023-02-07 16:32:16'),
(83, 20, 'XXL', '2023-02-07 16:32:19', '2023-02-07 16:32:19'),
(84, 19, 'S', '2023-02-07 16:32:34', '2023-02-07 16:32:34'),
(85, 19, 'M', '2023-02-07 16:32:37', '2023-02-07 16:32:37'),
(86, 19, 'L', '2023-02-07 16:32:39', '2023-02-07 16:32:39'),
(87, 19, 'XL', '2023-02-07 16:32:42', '2023-02-07 16:32:42'),
(88, 19, 'XXL', '2023-02-07 16:32:46', '2023-02-07 16:32:46'),
(89, 18, 'S', '2023-02-07 16:32:52', '2023-02-07 16:32:52'),
(90, 18, 'M', '2023-02-07 16:32:55', '2023-02-07 16:32:55'),
(91, 18, 'L', '2023-02-07 16:32:58', '2023-02-07 16:32:58'),
(92, 18, 'XL', '2023-02-07 16:33:01', '2023-02-07 16:33:01'),
(93, 18, 'XXL', '2023-02-07 16:33:05', '2023-02-07 16:33:05'),
(94, 17, 'S', '2023-02-07 16:33:09', '2023-02-07 16:33:09'),
(95, 17, 'M', '2023-02-07 16:33:12', '2023-02-07 16:33:12'),
(96, 17, 'L', '2023-02-07 16:33:15', '2023-02-07 16:33:15'),
(97, 17, 'XL', '2023-02-07 16:33:18', '2023-02-07 16:33:18'),
(98, 17, 'XXL', '2023-02-07 16:33:21', '2023-02-07 16:33:21'),
(99, 16, 'S', '2023-02-07 16:38:07', '2023-02-07 16:38:07'),
(100, 16, 'M', '2023-02-07 16:38:10', '2023-02-07 16:38:10'),
(101, 16, 'L', '2023-02-07 16:38:13', '2023-02-07 16:38:13'),
(102, 16, 'XL', '2023-02-07 16:38:16', '2023-02-07 16:38:16'),
(103, 16, 'XXL', '2023-02-07 16:38:19', '2023-02-07 16:38:19'),
(104, 15, 'S', '2023-02-07 16:38:23', '2023-02-07 16:38:23'),
(105, 15, 'M', '2023-02-07 16:38:27', '2023-02-07 16:38:27'),
(106, 15, 'L', '2023-02-07 16:38:30', '2023-02-07 16:38:30'),
(107, 15, 'XL', '2023-02-07 16:38:33', '2023-02-07 16:38:33'),
(108, 15, 'XXL', '2023-02-07 16:38:40', '2023-02-07 16:38:40'),
(109, 14, 'S', '2023-02-07 16:38:45', '2023-02-07 16:38:45'),
(110, 14, 'M', '2023-02-07 16:38:47', '2023-02-07 16:38:47'),
(111, 14, 'L', '2023-02-07 16:38:51', '2023-02-07 16:38:51'),
(112, 14, 'XL', '2023-02-07 16:38:53', '2023-02-07 16:38:53'),
(113, 14, 'XXL', '2023-02-07 16:38:57', '2023-02-07 16:38:57'),
(114, 13, 'S', '2023-02-07 16:39:02', '2023-02-07 16:39:02'),
(115, 13, 'M', '2023-02-07 16:39:04', '2023-02-07 16:39:04'),
(116, 13, 'L', '2023-02-07 16:39:07', '2023-02-07 16:39:07'),
(117, 13, 'XL', '2023-02-07 16:39:10', '2023-02-07 16:39:10'),
(118, 13, 'XXL', '2023-02-07 16:39:13', '2023-02-07 16:39:13'),
(119, 12, 'S', '2023-02-07 16:39:17', '2023-02-07 16:39:17'),
(120, 12, 'M', '2023-02-07 16:39:20', '2023-02-07 16:39:20'),
(121, 12, 'L', '2023-02-07 16:39:24', '2023-02-07 16:39:24'),
(122, 12, 'XL', '2023-02-07 16:39:27', '2023-02-07 16:39:27'),
(123, 12, 'XXL', '2023-02-07 16:39:33', '2023-02-07 16:39:33'),
(124, 36, 'XXL', '2023-02-07 20:14:39', '2023-02-07 20:14:39'),
(125, 4, 'S', '2023-02-07 22:24:16', '2023-02-07 22:24:16'),
(126, 4, 'M', '2023-02-07 22:24:19', '2023-02-07 22:24:19'),
(127, 4, 'L', '2023-02-07 22:24:22', '2023-02-07 22:24:22'),
(128, 4, 'XL', '2023-02-07 22:24:24', '2023-02-07 22:24:24'),
(129, 4, 'XXL', '2023-02-07 22:24:27', '2023-02-07 22:24:27'),
(130, 11, 'S', '2023-02-07 22:26:38', '2023-02-07 22:26:38'),
(131, 11, 'M', '2023-02-07 22:26:41', '2023-02-07 22:26:41'),
(132, 11, 'L', '2023-02-07 22:26:44', '2023-02-07 22:26:44'),
(133, 11, 'XL', '2023-02-07 22:26:47', '2023-02-07 22:26:47'),
(134, 11, 'XXL', '2023-02-07 22:26:50', '2023-02-07 22:26:50'),
(135, 10, 'S', '2023-02-07 22:27:00', '2023-02-07 22:27:00'),
(136, 10, 'M', '2023-02-07 22:27:03', '2023-02-07 22:27:03'),
(137, 10, 'L', '2023-02-07 22:27:05', '2023-02-07 22:27:05'),
(138, 10, 'XL', '2023-02-07 22:27:07', '2023-02-07 22:27:07'),
(139, 10, 'XXL', '2023-02-07 22:27:10', '2023-02-07 22:27:10'),
(140, 9, 'S', '2023-02-07 22:27:15', '2023-02-07 22:27:15'),
(141, 9, 'M', '2023-02-07 22:27:18', '2023-02-07 22:27:18'),
(142, 9, 'L', '2023-02-07 22:27:20', '2023-02-07 22:27:20'),
(143, 9, 'XL', '2023-02-07 22:27:23', '2023-02-07 22:27:23'),
(144, 9, 'XXL', '2023-02-07 22:27:26', '2023-02-07 22:27:26'),
(145, 8, 'S', '2023-02-07 22:27:33', '2023-02-07 22:27:33'),
(146, 8, 'M', '2023-02-07 22:27:36', '2023-02-07 22:27:36'),
(147, 8, 'L', '2023-02-07 22:27:39', '2023-02-07 22:27:39'),
(148, 8, 'XL', '2023-02-07 22:27:42', '2023-02-07 22:27:42'),
(149, 8, 'XXL', '2023-02-07 22:27:44', '2023-02-07 22:27:44'),
(150, 7, 'S', '2023-02-07 22:27:48', '2023-02-07 22:27:48'),
(151, 7, 'M', '2023-02-07 22:27:52', '2023-02-07 22:27:52'),
(152, 7, 'L', '2023-02-07 22:27:58', '2023-02-07 22:27:58'),
(153, 7, 'XL', '2023-02-07 22:28:01', '2023-02-07 22:28:01'),
(154, 7, 'XXL', '2023-02-07 22:28:04', '2023-02-07 22:28:04'),
(155, 6, 'S', '2023-02-07 22:28:15', '2023-02-07 22:28:15'),
(156, 6, 'M', '2023-02-07 22:28:18', '2023-02-07 22:28:18'),
(157, 6, 'L', '2023-02-07 22:28:20', '2023-02-07 22:28:20'),
(158, 6, 'XL', '2023-02-07 22:28:23', '2023-02-07 22:28:23'),
(159, 6, 'XXL', '2023-02-07 22:28:26', '2023-02-07 22:28:26'),
(160, 5, 'S', '2023-02-07 22:28:30', '2023-02-07 22:28:30'),
(161, 5, 'M', '2023-02-07 22:28:33', '2023-02-07 22:28:33'),
(162, 5, 'L', '2023-02-07 22:28:36', '2023-02-07 22:28:36'),
(163, 5, 'XL', '2023-02-07 22:28:38', '2023-02-07 22:28:38'),
(164, 5, 'XXL', '2023-02-07 22:28:42', '2023-02-07 22:28:42'),
(165, 3, 'S', '2023-02-07 22:29:13', '2023-02-07 22:29:13'),
(166, 3, 'M', '2023-02-07 22:29:15', '2023-02-07 22:29:15'),
(167, 3, 'L', '2023-02-07 22:29:18', '2023-02-07 22:29:18'),
(168, 3, 'XL', '2023-02-07 22:29:21', '2023-02-07 22:29:21'),
(169, 3, 'XXL', '2023-02-07 22:29:24', '2023-02-07 22:29:24'),
(170, 2, 'S', '2023-02-07 22:29:28', '2023-02-07 22:29:28'),
(171, 2, 'M', '2023-02-07 22:29:32', '2023-02-07 22:29:32'),
(172, 2, 'L', '2023-02-07 22:29:35', '2023-02-07 22:29:35'),
(173, 2, 'XL', '2023-02-07 22:29:37', '2023-02-07 22:29:37'),
(174, 2, 'XXL', '2023-02-07 22:29:40', '2023-02-07 22:29:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sliders`
--

CREATE TABLE `sliders` (
  `id` int(11) NOT NULL,
  `slider_title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slider_subtitle1` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slider_subtitle2` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slider_subtitle3` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slider_subtitle4` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slider_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slider_status` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sliders`
--

INSERT INTO `sliders` (`id`, `slider_title`, `slider_subtitle1`, `slider_subtitle2`, `slider_subtitle3`, `slider_subtitle4`, `slider_image`, `slider_status`, `created_at`, `updated_at`) VALUES
(1, 'Ưu đãi hot', 'Sale', '90%', 'Nhân dịp kỷ niệm 50 năm', 'Xem ngay', '1671123950.jpg', 0, '2022-12-15 10:04:31', '2022-12-15 10:05:50'),
(2, 'Khuyến mãi hot', 'Big', 'Sale', 'Dành cho áo khoác nữ', 'Khám phá', '1671124034.jpg', 0, '2022-12-15 10:07:14', '2022-12-15 10:07:14'),
(3, 'Deal trong tuần', 'Deal', 'Hot', 'Số lượng có hạn', 'Xem chi tiết', '1671124199.jpg', 0, '2022-12-15 10:08:31', '2022-12-15 10:09:59'),
(4, 'Bộ sưu tập kỷ niệm', 'Sale', '70%', 'Dành cho sản phẩm iSky', 'Xem ngay', '1671124419.jpg', 0, '2022-12-15 10:11:07', '2023-01-31 07:32:47'),
(5, 'Ưu đãi mùa đông', 'Big', 'Sale', 'Đối với tay dài nữ', 'Khám phá', '1671124486.jpg', 0, '2022-12-15 10:14:46', '2022-12-15 10:14:46');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `facebook_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `facebook_id`, `google_id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `gender`, `image`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 'Quan Tri Vien ISKY', 'admin@isky.com', NULL, '$2y$10$heudYIIJgGaigjDzThjn1OWV94jNMSdaUtONDdhTjguZe3GmozHPe', '0912345678', '1', '1671120552.jpg', 0, NULL, '2022-12-15 05:03:16', '2023-02-08 00:30:11'),
(4, NULL, NULL, 'Nguoi Dung ISKY', 'user@isky.com', NULL, '$2y$10$l5hX3HgS2Ong0FZT0DjhWe3vkq9kb3Ejjy5LnYM1YQuhvDPqmA0Fa', '0912345678', '1', '1671153141.profileImgjpg', 1, NULL, '2022-12-15 18:12:21', '2023-02-08 00:29:55'),
(37, NULL, '105140134863040569869', 'doan le', 'doanfpolydn@gmail.com', NULL, NULL, NULL, NULL, '105140134863040569869.jpg', 0, NULL, '2023-02-08 00:21:52', '2023-02-08 00:21:52');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`),
  ADD KEY `albums_prod_id_foreign` (`prod_id`);

--
-- Chỉ mục cho bảng `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blogs_blog_cate_id_foreign` (`blog_cate_id`);

--
-- Chỉ mục cho bảng `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `colors_prod_id_foreign` (`prod_id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_prod_id_foreign` (`prod_id`),
  ADD KEY `comments_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `detail_info`
--
ALTER TABLE `detail_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_info_prod_id_foreign` (`prod_id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`),
  ADD KEY `order_details_prod_id_foreign` (`prod_id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_cate_id_foreign` (`cate_id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`);

--
-- Chỉ mục cho bảng `shipping_fees`
--
ALTER TABLE `shipping_fees`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sizes_prod_id_foreign` (`prod_id`);

--
-- Chỉ mục cho bảng `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Chỉ mục cho bảng `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishlist_user_id_foreign` (`user_id`),
  ADD KEY `wishlist_prod_id_foreign` (`prod_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `albums`
--
ALTER TABLE `albums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT cho bảng `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `detail_info`
--
ALTER TABLE `detail_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã chi tiết sp', AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT cho bảng `shipping_fees`
--
ALTER TABLE `shipping_fees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;

--
-- AUTO_INCREMENT cho bảng `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `albums`
--
ALTER TABLE `albums`
  ADD CONSTRAINT `albums_prod_id_foreign` FOREIGN KEY (`prod_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_blog_cate_id_foreign` FOREIGN KEY (`blog_cate_id`) REFERENCES `blog_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `colors`
--
ALTER TABLE `colors`
  ADD CONSTRAINT `colors_prod_id_foreign` FOREIGN KEY (`prod_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_prod_id_foreign` FOREIGN KEY (`prod_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `detail_info`
--
ALTER TABLE `detail_info`
  ADD CONSTRAINT `detail_info_prod_id_foreign` FOREIGN KEY (`prod_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_details_prod_id_foreign` FOREIGN KEY (`prod_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_cate_id_foreign` FOREIGN KEY (`cate_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `sizes`
--
ALTER TABLE `sizes`
  ADD CONSTRAINT `sizes_prod_id_foreign` FOREIGN KEY (`prod_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_prod_id_foreign` FOREIGN KEY (`prod_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wishlist_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
