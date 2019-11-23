-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 23, 2019 lúc 04:48 PM
-- Phiên bản máy phục vụ: 10.1.38-MariaDB
-- Phiên bản PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `phonemanager`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phone`
--

CREATE TABLE `phone` (
  `phoneid` int(11) NOT NULL,
  `phonename` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` bigint(20) NOT NULL,
  `description` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `typeid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phone`
--

INSERT INTO `phone` (`phoneid`, `phonename`, `image`, `price`, `description`, `typeid`) VALUES
(1, 'blackberry-evolve-black-600x600', 'blackberry-evolve-black-600x600.jpg', 10000, '...', 1),
(2, 'blackberry-key2-4', 'blackberry-key2-4-600x600.jpg', 10000, '...', 1),
(3, 'blackberry-key2-le-1', 'blackberry-key2-le-1-600x600.jpg', 10000, '...', 1),
(4, 'blackberry-keyone-3gb', 'blackberry-keyone-3gb-600x600.jpg', 10000, '...', 1),
(5, 'blackberry-keyone-9', 'blackberry-keyone-9-600x600.jpg', 10000, '...', 1),
(6, 'coolpad-f110-blue-1', 'coolpad-f110-blue-1-600x600.jpg', 2000000, '...', 2),
(7, 'coolpad-f116-8', 'coolpad-f116-8-600x600.jpg', 2000000, '...', 2),
(8, 'coolpad-f126-black', 'coolpad-f126-black-600x600.jpg', 2000000, '...', 2),
(9, 'coolpad-f129-black', 'coolpad-f129-black-600x600.jpg', 2000000, '...', 2),
(10, 'coolpad-f210-blue', 'coolpad-f210-blue-600x600.jpg', 2000000, '...', 2),
(11, 'coolpad-mega-5-blue', 'coolpad-mega-5-blue-600x600.jpg', 2000000, '...', 2),
(12, 'coolpad-n3c-gray', 'coolpad-n3c-gray-600x600.jpg', 2000000, '...', 2),
(13, 'coolpad-n3d-blue', 'coolpad-n3d-blue-600x600.jpg', 2000000, '...', 2),
(14, 'coolpad-n5-black', 'coolpad-n5-black-600x600.jpg', 2000000, '...', 2),
(15, 'huawei-nova-3i-600-600', 'huawei-nova-3i-600-600-600x600.jpg', 3000000, '...', 3),
(16, 'huawei-p30-lite-1', 'huawei-p30-lite-1-600x600.jpg', 3000000, '...', 3),
(17, 'huawei-p30-pro-1', 'huawei-p30-pro-1-600x600.jpg', 3000000, '...', 3),
(19, 'huawei-y7-pro-2019-1', 'huawei-y7-pro-2019-1-600x600.jpg', 3000000, '...', 3),
(20, 'huawei-y9-prime-2019-blue-2', 'huawei-y9-prime-2019-blue-2-600x600.jpg', 3000000, '...', 3),
(21, 'iphone-11-128gb-white', 'iphone-11-128gb-white-600x600.jpg', 4000000, '...', 4),
(22, 'iphone-11-pro-256gb-black', 'iphone-11-pro-256gb-black-600x600.jpg', 4000000, '...', 4),
(23, 'iphone-11-pro-black', 'iphone-11-pro-black-600x600.jpg', 4000000, '...', 4),
(24, 'iphone-11-pro-max-256gb-green', 'iphone-11-pro-max-256gb-green-600x600.jpg', 4000000, '...', 4),
(25, 'iphone-11-pro-max-512gb-gold', 'iphone-11-pro-max-512gb-gold-600x600.jpg', 4000000, '...', 4),
(26, 'iphone-11-pro-max-green', 'iphone-11-pro-max-green-600x600.jpg', 4000000, '...', 4),
(27, 'iphone-11-red', 'iphone-11-red-600x600.jpg', 4000000, '...', 4),
(28, 'iphone-x-64gb-20-11', 'iphone-x-64gb-20-11.jpg', 4000000, '...', 4),
(29, 'iphone-xs-20-11', 'iphone-xs-20-11.jpg', 4000000, '...', 4),
(30, 'iphone-xs-256gb-20-11', 'iphone-xs-256gb-20-11.jpg', 4000000, '...', 4),
(31, 'iphone-xs-max-20-11', 'iphone-xs-max-20-11.jpg', 4000000, '...', 4),
(32, 'iphone-xs-max-256gb-20-11', 'iphone-xs-max-256gb-20-11.jpg', 4000000, '...', 4),
(33, 'itel-alpha-lite-black', 'itel-alpha-lite-black-600x600.jpg', 3000000, '...', 5),
(34, 'itel-it2161', 'itel-it2161-600x600.jpg', 3000000, '...', 5),
(35, 'itel-it2171-red', 'itel-it2171-red-600x600.jpg', 3000000, '...', 5),
(36, 'itel-it5025-blue-2', 'itel-it5025-blue-2-600x600.jpg', 3000000, '...', 5),
(37, 'itel-it5092-gold', 'itel-it5092-gold-600x600.jpg', 3000000, '...', 5),
(38, 'itel-it6120', 'itel-it6120-600x600.jpg', 3000000, '...', 5),
(39, 'itel-p15-blue', 'itel-p15-blue-600x600.jpg', 3000000, '...', 5),
(40, 'itel-p33-gold', 'itel-p33-gold-600x600.jpg', 3000000, '...', 5),
(41, 'itel-s15-pro-green', 'itel-s15-pro-green-600x600.jpg', 3000000, '...', 5),
(42, 'itel-s33-gold', 'itel-s33-gold-600x600.jpg', 3000000, '...', 5),
(43, 'itel-value-100-black', 'itel-value-100-black-600x600.jpg', 3000000, '...', 5),
(44, 'masstel-fami-12-black', 'masstel-fami-12-black-600x600.jpg', 5000000, '...', 6),
(45, 'masstel-izi-112-black', 'masstel-izi-112-black-600x600.jpg', 5000000, '...', 6),
(46, 'masstel-izi-206-blue', 'masstel-izi-206-blue-600x600.jpg', 5000000, '...', 6),
(47, 'masstel-izi-280-blue', 'masstel-izi-280-blue-600x600.jpg', 5000000, '...', 6),
(48, 'masstel-izi-300-gold', 'masstel-izi-300-gold-600x600.jpg', 5000000, '...', 6),
(49, 'masstel-x5-fami-gold', 'masstel-x5-fami-gold-600x600.jpg', 5000000, '...', 6),
(50, 'mobell-m217-black', 'mobell-m217-black-600x600.jpg', 4000000, '...', 7),
(51, 'mobell-m218-green', 'mobell-m218-green-600x600.jpg', 4000000, '...', 7),
(52, 'mobell-m228-9', 'mobell-m228-9-600x600.jpg', 4000000, '...', 7),
(53, 'mobell-m229-2019-blue', 'mobell-m229-2019-blue-600x600.jpg', 4000000, '...', 7),
(54, 'mobell-m339-1', 'mobell-m339-1-300x300.jpg', 4000000, '...', 7),
(55, 'mobell-m389-1-1', 'mobell-m389-1-1-300x300.jpg', 4000000, '...', 7),
(56, 'mobell-m529-gold-300-1', 'mobell-m529-gold-300-1-300x300.jpg', 4000000, '...', 7),
(57, 'mobell-m-889-600', 'mobell-m-889-600-600x600.jpg', 4000000, '...', 7),
(58, 'mobell-nova-p3-300', 'mobell-nova-p3-300-300x300.jpg', 4000000, '...', 7),
(59, 'mobell-rock-3-2', 'mobell-rock-3-2-300x300.jpg', 4000000, '...', 7),
(60, 'mobell-s41-gold-1', 'mobell-s41-gold-1-600x600.jpg', 4000000, '...', 7),
(61, 'mobell-s51-gold-2', 'mobell-s51-gold-2-600x600.jpg', 4000000, '...', 7),
(62, 'mobell-s60-red-1', 'mobell-s60-red-1-600x600.jpg', 4000000, '...', 7),
(63, 'mobell-m729-black', 'mobell-m729-black-600x600.jpg', 4000000, '...', 7),
(64, 'mobell-s61-blue-2', 'mobell-s61-blue-2-600x600.jpg', 4000000, '...', 7),
(65, 'nokia-22-black', 'nokia-22-black-600x600.jpg', 500000, '...', 8),
(66, 'nokia-32-1', 'nokia-32-1-600x600.jpg', 500000, '...', 8),
(67, 'nokia-32-16gb-2', 'nokia-32-16gb-2-600x600.jpg', 500000, '...', 8),
(68, 'nokia-51-plus-black-18thangbh', 'nokia-51-plus-black-18thangbh-600x600.jpg', 500000, '...', 8),
(69, 'nokia-61-plus-2', 'nokia-61-plus-2-600x600.jpg', 500000, '...', 8),
(70, 'nokia-72-black', 'nokia-72-black-600x600.jpg', 500000, '...', 8),
(71, 'nokia-81-blue-18thangbh', 'nokia-81-blue-18thangbh-600x600.jpg', 500000, '...', 8),
(72, 'nokia-105-2019-blue', 'nokia-105-2019-blue-600x600.jpg', 500000, '...', 8),
(73, 'nokia-105-single-sim-2017-den', 'nokia-105-single-sim-2017-den-300x300.jpg', 500000, '...', 8),
(74, 'nokia-105-single-sim-2019-black', 'nokia-105-single-sim-2019-black-600x600.jpg', 500000, '...', 8),
(75, 'nokia-106-2018', 'nokia-106-2018-600x600.jpg', 500000, '...', 8),
(76, 'nokia-110-2019-green', 'nokia-110-2019-green-600x600.jpg', 500000, '...', 8),
(77, 'nokia-130-2017-mo-ta-den', 'nokia-130-2017-mo-ta-den-300x300.jpg', 500000, '...', 8),
(78, 'nokia-150-khong-the-nho-6', 'nokia-150-khong-the-nho-6-300x300.jpg', 500000, '...', 8),
(79, 'nokia-210-gray-1', 'nokia-210-gray-1-600x600.jpg', 500000, '...', 8),
(80, 'nokia-230-khong-the-blue', 'nokia-230-khong-the-blue-600x600.jpg', 500000, '...', 8),
(81, 'nokia-800-tough-black', 'nokia-800-tough-black-600x600.jpg', 500000, '...', 8),
(82, 'nokia-2720-2019-black-2', 'nokia-2720-2019-black-2-600x600.jpg', 500000, '...', 8),
(83, 'nokia-3310-2017-black', 'nokia-3310-2017-black-600x600.jpg', 500000, '...', 8),
(84, 'oppo-a1k-red', 'oppo-a1k-red-600x600.jpg', 7000000, '...', 9),
(85, 'oppo-a5-2020-20-11', 'oppo-a5-2020-20-11.jpg', 7000000, '...', 9),
(86, 'oppo-a5-2020-128gb-black', 'oppo-a5-2020-128gb-black-600x600.jpg', 7000000, '...', 9),
(87, 'oppo-a5s-red', 'oppo-a5s-red-600x600.jpg', 7000000, '...', 9),
(88, 'oppo-a7-20-11', 'oppo-a7-20-11.jpg', 7000000, '...', 9),
(89, 'oppo-a9-20-11', 'oppo-a9-20-11.jpg', 7000000, '...', 9),
(90, 'oppo-a9-2020-trang-bac-ha', 'oppo-a9-2020-trang-bac-ha-600x600.jpg', 7000000, '...', 9),
(91, 'oppo-f9-tim', 'oppo-f9-tim-600x600.jpg', 7000000, '...', 9),
(92, 'oppo-f11-20-11', 'oppo-f11-20-11.jpg', 7000000, '...', 9),
(93, 'oppo-f11-pro-128gb', 'oppo-f11-pro-128gb-600x600.jpg', 7000000, '...', 9),
(94, 'oppo-k3-black-docquyen', 'oppo-k3-black-docquyen-600x600.jpg', 7000000, '...', 9),
(95, 'oppo-reno2', 'oppo-reno2-600x600.jpg', 7000000, '...', 9),
(96, 'oppo-reno2-f-20-11', 'oppo-reno2-f-20-11.jpg', 7000000, '...', 9),
(97, 'oppo-reno2-f-xanh-tinh-van-docquyen', 'oppo-reno2-f-xanh-tinh-van-docquyen-600x600.jpg', 7000000, '...', 9),
(98, 'oppo-reno-10x-zoom-edition-20-11', 'oppo-reno-10x-zoom-edition-20-11.jpg', 7000000, '...', 9),
(99, 'oppo-reno-20-11', 'oppo-reno-20-11.jpg', 7000000, '...', 9),
(100, 'realme-3-20-11', 'realme-3-20-11.jpg', 3000000, '...', 10),
(101, 'realme-3-64gb-20-11', 'realme-3-64gb-20-11.jpg', 3000000, '...', 10),
(102, 'realme-3-pro-blue-2nambh', 'realme-3-pro-blue-2nambh-600x600.jpg', 3000000, '...', 10),
(103, 'realme-5-4gb-20-11', 'realme-5-4gb-20-11.jpg', 3000000, '...', 10),
(104, 'realme-5-20-11', 'realme-5-20-11.jpg', 3000000, '...', 10),
(105, 'realme-5-pro-8gb-green', 'realme-5-pro-8gb-green-600x600.jpg', 3000000, '...', 10),
(106, 'realme-5-pro-20-11', 'realme-5-pro-20-11.jpg', 3000000, '...', 10),
(107, 'realme-c2-2g-32gb-black', 'realme-c2-2g-32gb-black-600x600.jpg', 3000000, '...', 10),
(108, 'realme-c2-16gb-20-11', 'realme-c2-16gb-20-11.jpg', 3000000, '...', 10),
(109, 'realme-c2-new-blue', 'realme-c2-new-blue-600x600.jpg', 3000000, '...', 10),
(110, 'realme-xt-20-11', 'realme-xt-20-11.jpg', 3000000, '...', 10),
(111, 'samsung-galaxy-a7-2018-128gb-black', 'samsung-galaxy-a7-2018-128gb-black-600x600.jpg', 8000000, '...', 11),
(112, 'samsung-galaxy-a7-2018-blue', 'samsung-galaxy-a7-2018-blue-600x600.jpg', 8000000, '...', 11),
(113, 'samsung-galaxy-a9-2018-blue', 'samsung-galaxy-a9-2018-blue-600x600.jpg', 8000000, '...', 11),
(114, 'samsung-galaxy-a10-red', 'samsung-galaxy-a10-red-600x600.jpg', 8000000, '...', 11),
(115, 'samsung-galaxy-a10s-20-11', 'samsung-galaxy-a10s-20-11.jpg', 8000000, '...', 11),
(116, 'samsung-galaxy-a20-red', 'samsung-galaxy-a20-red-600x600.jpg', 8000000, '...', 11),
(117, 'samsung-galaxy-a20s-20-11', 'samsung-galaxy-a20s-20-11.jpg', 8000000, '...', 11),
(118, 'samsung-galaxy-a20s-32gb-red', 'samsung-galaxy-a20s-32gb-red-600x600.jpg', 8000000, '...', 11),
(119, 'samsung-galaxy-a30-32gb', 'samsung-galaxy-a30-32gb-600x600.jpg', 8000000, '...', 11),
(120, 'samsung-galaxy-a30-blue', 'samsung-galaxy-a30-blue-600x600.jpg', 8000000, '...', 11),
(121, 'samsung-galaxy-a30s-20-11', 'samsung-galaxy-a30s-20-11.jpg', 8000000, '...', 11),
(122, 'samsung-galaxy-a50-128gb-blue', 'samsung-galaxy-a50-128gb-blue-600x600.jpg', 8000000, '...', 11),
(123, 'samsung-galaxy-a50-black', 'samsung-galaxy-a50-black-600x600.jpg', 8000000, '...', 11),
(124, 'samsung-galaxy-a50s-20-11', 'samsung-galaxy-a50s-20-11.jpg', 8000000, '...', 11),
(125, 'samsung-galaxy-a70-20-11', 'samsung-galaxy-a70-20-11.jpg', 8000000, '...', 11),
(126, 'samsung-galaxy-a80-20-11', 'samsung-galaxy-a80-20-11.jpg', 8000000, '...', 11),
(127, 'samsung-galaxy-m20-1', 'samsung-galaxy-m20-1-600x600.jpg', 8000000, '...', 11),
(128, 'samsung-galaxy-note-9-black', 'samsung-galaxy-note-9-black-600x600.jpg', 8000000, '...', 11),
(129, 'samsung-galaxy-note-10-20-11', 'samsung-galaxy-note-10-20-11.jpg', 8000000, '...', 11),
(130, 'samsung-galaxy-note-10-plus-20-11', 'samsung-galaxy-note-10-plus-20-11.jpg', 8000000, '...', 11),
(131, 'samsung-galaxy-s10-plus-black', 'samsung-galaxy-s10-plus-black-600x600.jpg', 8000000, '...', 11),
(132, 'samsung-galaxy-s10-white', 'samsung-galaxy-s10-white-600x600.jpg', 8000000, '...', 11),
(133, 'sieu-pham-galaxy-s-moi-2-512gb-black', 'sieu-pham-galaxy-s-moi-2-512gb-black-600x600.jpg', 8000000, '...', 11),
(134, 'vivo-s1-blue', 'vivo-s1-blue-600x600.jpg', 4000000, '...', 12),
(135, 'vivo-v11i-blue', 'vivo-v11i-blue-600x600.jpg', 4000000, '...', 12),
(136, 'vivo-v15-20-11', 'vivo-v15-20-11.jpg', 4000000, '...', 12),
(137, 'vivo-v15-64gb-red', 'vivo-v15-64gb-red-600x600.jpg', 4000000, '...', 12),
(138, 'vivo-v17-pro-blue-noo', 'vivo-v17-pro-blue-noo-600x600.jpg', 4000000, '...', 12),
(139, 'vivo-y11-blue', 'vivo-y11-blue-600x600.jpg', 4000000, '...', 12),
(140, 'vivo-y12-red', 'vivo-y12-red-600x600.jpg', 4000000, '...', 12),
(141, 'vivo-y15-blue-quanghai', 'vivo-y15-blue-quanghai-600x600.jpg', 4000000, '...', 12),
(142, 'vivo-y17-purple', 'vivo-y17-purple-600x600.jpg', 4000000, '...', 12),
(143, 'vivo-y19-white-quanghai', 'vivo-y19-white-quanghai-600x600.jpg', 4000000, '...', 12),
(144, 'vivo-y91-black', 'vivo-y91-black-600x600.jpg', 4000000, '...', 12),
(145, 'vivo-y91c', 'vivo-y91c-600x600.jpg', 4000000, '...', 12),
(146, 'vivo-y93-32gb-black', 'vivo-y93-32gb-black-600x600.jpg', 4000000, '...', 12),
(147, 'vsmart-bee-blue', 'vsmart-bee-blue-600x600.jpg', 4000000, '...', 13),
(148, 'vsmart-joy-2-plus-2gb-blue-18thangbh', 'vsmart-joy-2-plus-2gb-blue-18thangbh-600x600.jpg', 4000000, '...', 13),
(149, 'vsmart-live-6gb-white-18thangbh', 'vsmart-live-6gb-white-18thangbh-600x600.jpg', 4000000, '...', 13),
(150, 'vsmart-live-blue-18thangbh', 'vsmart-live-blue-18thangbh-600x600.jpg', 4000000, '...', 13),
(151, 'vsmart-star-coral', 'vsmart-star-coral-600x600.jpg', 4000000, '...', 13),
(152, 'xiaomi-mi-9-se-20-11', 'xiaomi-mi-9-se-20-11.jpg', 5000000, '...', 14),
(153, 'xiaomi-mi-9t-red-18thangbh', 'xiaomi-mi-9t-red-18thangbh-600x600.jpg', 5000000, '...', 14),
(154, 'xiaomi-mi-a3-white-18thangbh', 'xiaomi-mi-a3-white-18thangbh-600x600.jpg', 5000000, '...', 14),
(155, 'xiaomi-redmi-7-16gb-blue-18thangbh', 'xiaomi-redmi-7-16gb-blue-18thangbh-600x600.jpg', 5000000, '...', 14),
(156, 'xiaomi-redmi-7a-16gb-black-18thangbh', 'xiaomi-redmi-7a-16gb-black-18thangbh-600x600.jpg', 5000000, '...', 14),
(157, 'xiaomi-redmi-7a-blue-18thangbh', 'xiaomi-redmi-7a-blue-18thangbh-600x600.jpg', 5000000, '...', 14),
(158, 'xiaomi-redmi-7-black-18thangbh', 'xiaomi-redmi-7-black-18thangbh-600x600.jpg', 5000000, '...', 14),
(159, 'xiaomi-redmi-8-64gb-red-docquyen', 'xiaomi-redmi-8-64gb-red-docquyen-600x600.jpg', 5000000, '...', 14),
(160, 'xiaomi-redmi-8a-red-18thangbh', 'xiaomi-redmi-8a-red-18thangbh-600x600.jpg', 5000000, '...', 14),
(161, 'xiaomi-redmi-8-blue-docquyen', 'xiaomi-redmi-8-blue-docquyen-600x600.jpg', 5000000, '...', 14),
(162, 'xiaomi-redmi-go-16gb-20-11', 'xiaomi-redmi-go-16gb-20-11.jpg', 5000000, '...', 14),
(163, 'xiaomi-redmi-note-7-20-11', 'xiaomi-redmi-note-7-20-11.jpg', 5000000, '...', 14),
(164, 'xiaomi-redmi-note-8', 'xiaomi-redmi-note-8.jpg', 5000000, '...', 14),
(165, 'xiaomi-redmi-note-8-32gb-white-18thangbh', 'xiaomi-redmi-note-8-32gb-white-18thangbh-600x600.jpg', 5000000, '...', 14),
(166, 'xiaomi-redmi-note-8-128gb-20-11', 'xiaomi-redmi-note-8-128gb-20-11.jpg', 5000000, '...', 14),
(167, 'xiaomi-redmi-note-8-pro-6gb-64gb-xanh-duong-docquy', 'xiaomi-redmi-note-8-pro-6gb-64gb-xanh-duong-docquyen-600x600.jpg', 5000000, '...', 14),
(168, 'xiaomi-redmi-note-8-pro-6gb-128gb-black-18thangbh', 'xiaomi-redmi-note-8-pro-6gb-128gb-black-18thangbh-600x600.jpg', 5000000, '...', 14),
(169, 'xiaomi-redmi-note-8-pro-6gb-128gb-xanh-duong-docqu', 'xiaomi-redmi-note-8-pro-6gb-128gb-xanh-duong-docquyen-600x600.jpg', 5000000, '...', 14),
(170, 'xiaomi-redmi-note-8-pro-white-18thangbh', 'xiaomi-redmi-note-8-pro-white-18thangbh-600x600.jpg', 5000000, '...', 14);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `type`
--

CREATE TABLE `type` (
  `typeid` int(11) NOT NULL,
  `typename` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `type`
--

INSERT INTO `type` (`typeid`, `typename`) VALUES
(1, 'blackberry'),
(2, 'coolpad'),
(3, 'huawei'),
(4, 'iphone'),
(5, 'itel'),
(6, 'masstel'),
(7, 'mobell'),
(8, 'nokia'),
(9, 'oppo'),
(10, 'realme'),
(11, 'samsung'),
(12, 'vivo'),
(13, 'vsmart'),
(14, 'xiaomi');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `phone`
--
ALTER TABLE `phone`
  ADD PRIMARY KEY (`phoneid`);

--
-- Chỉ mục cho bảng `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`typeid`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `phone`
--
ALTER TABLE `phone`
  MODIFY `phoneid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;

--
-- AUTO_INCREMENT cho bảng `type`
--
ALTER TABLE `type`
  MODIFY `typeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
