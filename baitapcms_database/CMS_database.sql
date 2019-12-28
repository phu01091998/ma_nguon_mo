-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 28, 2019 lúc 06:46 PM
-- Phiên bản máy phục vụ: 10.4.8-MariaDB
-- Phiên bản PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `cms`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `catogry`
--

CREATE TABLE `catogry` (
  `catogryid` int(11) NOT NULL,
  `catogryname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `catogry`
--

INSERT INTO `catogry` (`catogryid`, `catogryname`) VALUES
(1, 'Sport'),
(3, 'Văn hóa'),
(4, 'Giáo dục'),
(5, 'Quốc tế'),
(6, ''),
(7, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `newsid` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `content` mediumtext NOT NULL,
  `author` varchar(200) NOT NULL,
  `datepost` date NOT NULL,
  `dateupdate` date NOT NULL,
  `image` varchar(200) NOT NULL,
  `video` varchar(500) NOT NULL,
  `catogryid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`newsid`, `title`, `content`, `author`, `datepost`, `dateupdate`, `image`, `video`, `catogryid`) VALUES
(3, 'Tin tức thứ 1', '<p>Tờ Mssssssundo Deportivo ca ngợi Messi với b&agrave;i viết &quot;Gi&acirc;y ph&uacute;t lịch sử, Messi lập kỷ lục với lần thứ 6 đăng quang danh hiệu &quot;Quả b&oacute;ng v&agrave;ng&quot; Chứng kiến gi&acirc;y ph&uacute;t lịch sử ấy, b&aacute;o ch&iacute; thế giới đ&atilde; ca ngợi cũng như nể phục t&agrave;i năng của Leo Messi. &quot;Lập kỷ lục lịch sử&quot;, &quot;lần thứ 6 đăng quang&quot; l&agrave; những cụm từ xuất hiện nhiều nhất tr&ecirc;n c&aacute;c b&agrave;i viết n&oacute;i về sự kiện trao giải &quot;Quả b&oacute;ng v&agrave;ng 2019&quot;. C&acirc;y viết Santi Gimenez bắt đầu b&agrave;i viết một c&aacute;ch đầy cảm x&uacute;c. &quot;Kỷ nguy&ecirc;n của Messi vẫn chưa c&oacute; hồi kết. Si&ecirc;u sao người Argentina chinh phục th&agrave;nh Paris với lần thứ 6 đăng quang danh hiệu &quot;Quả b&oacute;ng v&agrave;ng&quot;. Điều n&agrave;y đồng nghĩa với việc mọi người c&ocirc;ng nhận Messi l&agrave; cầu thủ xuất sắc nhất m&ugrave;a giải trước. Chiến thắng gi&uacute;p Leo vượt l&ecirc;n Ronaldo trong cuộc đua danh hiệu c&aacute; nh&acirc;n&quot;. Tất cả c&oacute; trong b&agrave;i viết &quot;Messi sigue siendo el rey&quot; - &quot;Messi vẫn l&agrave; Vua&quot; tr&ecirc;n tờ AS của T&acirc;y Ban Nha. Messi vượt Ronaldo gi&agrave;nh 6 B&oacute;ng v&agrave;ng: B&aacute;o ch&iacute; nể phục, mệnh danh l&agrave; &quot;Vua&quot; - 2 &quot;Messi vẫn l&agrave; Vua&quot; - b&agrave;i viết tr&ecirc;n tờ AS của T&acirc;y Ban Nha C&acirc;y viết Ben Hayward tr&ecirc;n tờ Evening Standard của Anh sử dụng cụm từ &quot;Vua b&oacute;ng v&agrave;ng&quot; để ca ngợi th&agrave;nh t&iacute;ch v&ocirc; tiền kho&aacute;ng hậu n&agrave;y của Leo Messi trong b&agrave;i viết &quot;Messi lu&ocirc;n khiến người ta m&ecirc; mẩn &quot;ph&eacute;p thuật&quot; của m&igrave;nh. B&oacute;ng v&agrave;ng lần thứ 6 l&agrave; điều xứng đ&aacute;ng&quot;. &quot;Mỗi khi Messi gi&agrave;nh B&oacute;ng v&agrave;ng, nhiều người lại cố t&igrave;m l&yacute; do để phản b&aacute;c. Anh ta kh&ocirc;ng v&ocirc; địch Champions League, Anh ta kh&ocirc;ng thể ghi b&agrave;n tại Anfield hay Van Dijk xứng đ&aacute;ng hơn... Trung vệ người H&agrave; Lan đ&uacute;ng l&agrave; đ&atilde; c&oacute; một m&ugrave;a giải xuất sắc c&ugrave;ng Liverpool v&agrave; đ&aacute;nh bại Messi tại Champions League.</p>\r\n', 'quocphu', '2019-12-08', '2019-12-10', 'abstract-1963838__340.jpg', '', 1),
(4, 'Tin tức thứ 2', '<p>Tờ Mundo Deportivo ca ngợi Messi với b&agrave;i viết &quot;Gi&acirc;y ph&uacute;t lịch sử, Messi lập kỷ lục với lần thứ 6 đăng quang danh hiệu &quot;Quả b&oacute;ng v&agrave;ng&quot; Chứng kiến gi&acirc;y ph&uacute;t lịch sử ấy, b&aacute;o ch&iacute; thế giới đ&atilde; ca ngợi cũng như nể phục t&agrave;i năng của Leo Messi. &quot;Lập kỷ lục lịch sử&quot;, &quot;lần thứ 6 đăng quang&quot; l&agrave; những cụm từ xuất hiện nhiều nhất tr&ecirc;n c&aacute;c b&agrave;i viết n&oacute;i về sự kiện trao giải &quot;Quả b&oacute;ng v&agrave;ng 2019&quot;. C&acirc;y viết Santi Gimenez bắt đầu b&agrave;i viết một c&aacute;ch đầy cảm x&uacute;c. &quot;Kỷ nguy&ecirc;n của Messi vẫn chưa c&oacute; hồi kết. Si&ecirc;u sao người Argentina chinh phục th&agrave;nh Paris với lần thứ 6 đăng quang danh hiệu &quot;Quả b&oacute;ng v&agrave;ng&quot;. Điều n&agrave;y đồng nghĩa với việc mọi người c&ocirc;ng nhận Messi l&agrave; cầu thủ xuất sắc nhất m&ugrave;a giải trước. Chiến thắng gi&uacute;p Leo vượt l&ecirc;n Ronaldo trong cuộc đua danh hiệu c&aacute; nh&acirc;n&quot;. Tất cả c&oacute; trong b&agrave;i viết &quot;Messi sigue siendo el rey&quot; - &quot;Messi vẫn l&agrave; Vua&quot; tr&ecirc;n tờ AS của T&acirc;y Ban Nha. Messi vượt Ronaldo gi&agrave;nh 6 B&oacute;ng v&agrave;ng: B&aacute;o ch&iacute; nể phục, mệnh danh l&agrave; &quot;Vua&quot; - 2 &quot;Messi vẫn l&agrave; Vua&quot; - b&agrave;i viết tr&ecirc;n tờ AS của T&acirc;y Ban Nha C&acirc;y viết Ben Hayward tr&ecirc;n tờ Evening Standard của Anh sử dụng cụm từ &quot;Vua b&oacute;ng v&agrave;ng&quot; để ca ngợi th&agrave;nh t&iacute;ch v&ocirc; tiền kho&aacute;ng hậu n&agrave;y của Leo Messi trong b&agrave;i viết &quot;Messi lu&ocirc;n khiến người ta m&ecirc; mẩn &quot;ph&eacute;p thuật&quot; của m&igrave;nh. B&oacute;ng v&agrave;ng lần thứ 6 l&agrave; điều xứng đ&aacute;ng&quot;. &quot;Mỗi khi Messi gi&agrave;nh B&oacute;ng v&agrave;ng, nhiều người lại cố t&igrave;m l&yacute; do để phản b&aacute;c. Anh ta kh&ocirc;ng v&ocirc; địch Champions League, Anh ta kh&ocirc;ng thể ghi b&agrave;n tại Anfield hay Van Dijk xứng đ&aacute;ng hơn... Trung vệ người H&agrave; Lan đ&uacute;ng l&agrave; đ&atilde; c&oacute; một m&ugrave;a giải xuất sắc c&ugrave;ng Liverpool v&agrave; đ&aacute;nh bại Messi tại Champions League.</p>\r\n', 'quocphu', '2019-12-08', '2019-12-10', 'france-4649350__340.jpg', '', 3),
(5, 'Tin tức thứ 3', '<p>Tờ Mundo Deportivo ca ngợi Messi với b&agrave;i viết &quot;Gi&acirc;y ph&uacute;t lịch sử, Messi lập kỷ lục với lần thứ 6 đăng quang danh hiệu &quot;Quả b&oacute;ng v&agrave;ng&quot; Chứng kiến gi&acirc;y ph&uacute;t lịch sử ấy, b&aacute;o ch&iacute; thế giới đ&atilde; ca ngợi cũng như nể phục t&agrave;i năng của Leo Messi. &quot;Lập kỷ lục lịch sử&quot;, &quot;lần thứ 6 đăng quang&quot; l&agrave; những cụm từ xuất hiện nhiều nhất tr&ecirc;n c&aacute;c b&agrave;i viết n&oacute;i về sự kiện trao giải &quot;Quả b&oacute;ng v&agrave;ng 2019&quot;. C&acirc;y viết Santi Gimenez bắt đầu b&agrave;i viết một c&aacute;ch đầy cảm x&uacute;c. &quot;Kỷ nguy&ecirc;n của Messi vẫn chưa c&oacute; hồi kết. Si&ecirc;u sao người Argentina chinh phục th&agrave;nh Paris với lần thứ 6 đăng quang danh hiệu &quot;Quả b&oacute;ng v&agrave;ng&quot;. Điều n&agrave;y đồng nghĩa với việc mọi người c&ocirc;ng nhận Messi l&agrave; cầu thủ xuất sắc nhất m&ugrave;a giải trước. Chiến thắng gi&uacute;p Leo vượt l&ecirc;n Ronaldo trong cuộc đua danh hiệu c&aacute; nh&acirc;n&quot;. Tất cả c&oacute; trong b&agrave;i viết &quot;Messi sigue siendo el rey&quot; - &quot;Messi vẫn l&agrave; Vua&quot; tr&ecirc;n tờ AS của T&acirc;y Ban Nha. Messi vượt Ronaldo gi&agrave;nh 6 B&oacute;ng v&agrave;ng: B&aacute;o ch&iacute; nể phục, mệnh danh l&agrave; &quot;Vua&quot; - 2 &quot;Messi vẫn l&agrave; Vua&quot; - b&agrave;i viết tr&ecirc;n tờ AS của T&acirc;y Ban Nha C&acirc;y viết Ben Hayward tr&ecirc;n tờ Evening Standard của Anh sử dụng cụm từ &quot;Vua b&oacute;ng v&agrave;ng&quot; để ca ngợi th&agrave;nh t&iacute;ch v&ocirc; tiền kho&aacute;ng hậu n&agrave;y của Leo Messi trong b&agrave;i viết &quot;Messi lu&ocirc;n khiến người ta m&ecirc; mẩn &quot;ph&eacute;p thuật&quot; của m&igrave;nh. B&oacute;ng v&agrave;ng lần thứ 6 l&agrave; điều xứng đ&aacute;ng&quot;. &quot;Mỗi khi Messi gi&agrave;nh B&oacute;ng v&agrave;ng, nhiều người lại cố t&igrave;m l&yacute; do để phản b&aacute;c. Anh ta kh&ocirc;ng v&ocirc; địch Champions League, Anh ta kh&ocirc;ng thể ghi b&agrave;n tại Anfield hay Van Dijk xứng đ&aacute;ng hơn... Trung vệ người H&agrave; Lan đ&uacute;ng l&agrave; đ&atilde; c&oacute; một m&ugrave;a giải xuất sắc c&ugrave;ng Liverpool v&agrave; đ&aacute;nh bại Messi tại Champions League.</p>\r\n\r\n<p><img alt=\"\" src=\"/baitapcms/image-content/636188145.jpg\" style=\"height:340px; width:604px\" /></p>\r\n', 'quocphu', '2019-12-08', '2019-12-10', 'animal-world-4371033__340.jpg', '', 1),
(6, 'Tin tức thứ 4', '<p>Tờ Mundo Deportivo ca ngợi Messi với b&agrave;i viết &quot;Gi&acirc;y ph&uacute;t lịch sử, Messi lập kỷ lục với lần thứ 6 đăng quang danh hiệu &quot;Quả b&oacute;ng v&agrave;ng&quot; Chứng kiến gi&acirc;y ph&uacute;t lịch sử ấy, b&aacute;o ch&iacute; thế giới đ&atilde; ca ngợi cũng như nể phục t&agrave;i năng của Leo Messi. &quot;Lập kỷ lục lịch sử&quot;, &quot;lần thứ 6 đăng quang&quot; l&agrave; những cụm từ xuất hiện nhiều nhất tr&ecirc;n c&aacute;c b&agrave;i viết n&oacute;i về sự kiện trao giải &quot;Quả b&oacute;ng v&agrave;ng 2019&quot;. C&acirc;y viết Santi Gimenez bắt đầu b&agrave;i viết một c&aacute;ch đầy cảm x&uacute;c. &quot;Kỷ nguy&ecirc;n của Messi vẫn chưa c&oacute; hồi kết. Si&ecirc;u sao người Argentina chinh phục th&agrave;nh Paris với lần thứ 6 đăng quang danh hiệu &quot;Quả b&oacute;ng v&agrave;ng&quot;. Điều n&agrave;y đồng nghĩa với việc mọi người c&ocirc;ng nhận Messi l&agrave; cầu thủ xuất sắc nhất m&ugrave;a giải trước. Chiến thắng gi&uacute;p Leo vượt l&ecirc;n Ronaldo trong cuộc đua danh hiệu c&aacute; nh&acirc;n&quot;. Tất cả c&oacute; trong b&agrave;i viết &quot;Messi sigue siendo el rey&quot; - &quot;Messi vẫn l&agrave; Vua&quot; tr&ecirc;n tờ AS của T&acirc;y Ban Nha. Messi vượt Ronaldo gi&agrave;nh 6 B&oacute;ng v&agrave;ng: B&aacute;o ch&iacute; nể phục, mệnh danh l&agrave; &quot;Vua&quot; - 2 &quot;Messi vẫn l&agrave; Vua&quot; - b&agrave;i viết tr&ecirc;n tờ AS của T&acirc;y Ban Nha C&acirc;y viết Ben Hayward tr&ecirc;n tờ Evening Standard của Anh sử dụng cụm từ &quot;Vua b&oacute;ng v&agrave;ng&quot; để ca ngợi th&agrave;nh t&iacute;ch v&ocirc; tiền kho&aacute;ng hậu n&agrave;y của Leo Messi trong b&agrave;i viết &quot;Messi lu&ocirc;n khiến người ta m&ecirc; mẩn &quot;ph&eacute;p thuật&quot; của m&igrave;nh. B&oacute;ng v&agrave;ng lần thứ 6 l&agrave; điều xứng đ&aacute;ng&quot;. &quot;Mỗi khi Messi gi&agrave;nh B&oacute;ng v&agrave;ng, nhiều người lại cố t&igrave;m l&yacute; do để phản b&aacute;c. Anh ta kh&ocirc;ng v&ocirc; địch Champions League, Anh ta kh&ocirc;ng thể ghi b&agrave;n tại Anfield hay Van Dijk xứng đ&aacute;ng hơn... Trung vệ người H&agrave; Lan đ&uacute;ng l&agrave; đ&atilde; c&oacute; một m&ugrave;a giải xuất sắc c&ugrave;ng Liverpool v&agrave; đ&aacute;nh bại Messi tại Champions League.</p>\r\n', 'quocphu', '2019-12-08', '2019-12-09', 'dragon-4417429__340.png', '', 4),
(7, 'Tin tức thứ 5', '<p>Tờ Mundo Deportivo ca ngợi Messi với b&agrave;i viết &quot;Gi&acirc;y ph&uacute;t lịch sử, Messi lập kỷ lục với lần thứ 6 đăng quang danh hiệu &quot;Quả b&oacute;ng v&agrave;ng&quot; Chứng kiến gi&acirc;y ph&uacute;t lịch sử ấy, b&aacute;o ch&iacute; thế giới đ&atilde; ca ngợi cũng như nể phục t&agrave;i năng của Leo Messi. &quot;Lập kỷ lục lịch sử&quot;, &quot;lần thứ 6 đăng quang&quot; l&agrave; những cụm từ xuất hiện nhiều nhất tr&ecirc;n c&aacute;c b&agrave;i viết n&oacute;i về sự kiện trao giải &quot;Quả b&oacute;ng v&agrave;ng 2019&quot;. C&acirc;y viết Santi Gimenez bắt đầu b&agrave;i viết một c&aacute;ch đầy cảm x&uacute;c. &quot;Kỷ nguy&ecirc;n của Messi vẫn chưa c&oacute; hồi kết. Si&ecirc;u sao người Argentina chinh phục th&agrave;nh Paris với lần thứ 6 đăng quang danh hiệu &quot;Quả b&oacute;ng v&agrave;ng&quot;. Điều n&agrave;y đồng nghĩa với việc mọi người c&ocirc;ng nhận Messi l&agrave; cầu thủ xuất sắc nhất m&ugrave;a giải trước. Chiến thắng gi&uacute;p Leo vượt l&ecirc;n Ronaldo trong cuộc đua danh hiệu c&aacute; nh&acirc;n&quot;. Tất cả c&oacute; trong b&agrave;i viết &quot;Messi sigue siendo el rey&quot; - &quot;Messi vẫn l&agrave; Vua&quot; tr&ecirc;n tờ AS của T&acirc;y Ban Nha. Messi vượt Ronaldo gi&agrave;nh 6 B&oacute;ng v&agrave;ng: B&aacute;o ch&iacute; nể phục, mệnh danh l&agrave; &quot;Vua&quot; - 2 &quot;Messi vẫn l&agrave; Vua&quot; - b&agrave;i viết tr&ecirc;n tờ AS của T&acirc;y Ban Nha C&acirc;y viết Ben Hayward tr&ecirc;n tờ Evening Standard của Anh sử dụng cụm từ &quot;Vua b&oacute;ng v&agrave;ng&quot; để ca ngợi th&agrave;nh t&iacute;ch v&ocirc; tiền kho&aacute;ng hậu n&agrave;y của Leo Messi trong b&agrave;i viết &quot;Messi lu&ocirc;n khiến người ta m&ecirc; mẩn &quot;ph&eacute;p thuật&quot; của m&igrave;nh. B&oacute;ng v&agrave;ng lần thứ 6 l&agrave; điều xứng đ&aacute;ng&quot;. &quot;Mỗi khi Messi gi&agrave;nh B&oacute;ng v&agrave;ng, nhiều người lại cố t&igrave;m l&yacute; do để phản b&aacute;c. Anh ta kh&ocirc;ng v&ocirc; địch Champions League, Anh ta kh&ocirc;ng thể ghi b&agrave;n tại Anfield hay Van Dijk xứng đ&aacute;ng hơn... Trung vệ người H&agrave; Lan đ&uacute;ng l&agrave; đ&atilde; c&oacute; một m&ugrave;a giải xuất sắc c&ugrave;ng Liverpool v&agrave; đ&aacute;nh bại Messi tại Champions League.</p>\r\n', 'quocphu', '2019-12-08', '2019-12-09', 'grasses-4476587__340.jpg', '', 3),
(8, 'Tin tức thứ 6', '<p>Tờ Mundo Deportivo ca ngợi Messi với b&agrave;i viết &quot;Gi&acirc;y ph&uacute;t lịch sử, Messi lập kỷ lục với lần thứ 6 đăng quang danh hiệu &quot;Quả b&oacute;ng v&agrave;ng&quot; Chứng kiến gi&acirc;y ph&uacute;t lịch sử ấy, b&aacute;o ch&iacute; thế giới đ&atilde; ca ngợi cũng như nể phục t&agrave;i năng của Leo Messi. &quot;Lập kỷ lục lịch sử&quot;, &quot;lần thứ 6 đăng quang&quot; l&agrave; những cụm từ xuất hiện nhiều nhất tr&ecirc;n c&aacute;c b&agrave;i viết n&oacute;i về sự kiện trao giải &quot;Quả b&oacute;ng v&agrave;ng 2019&quot;. C&acirc;y viết Santi Gimenez bắt đầu b&agrave;i viết một c&aacute;ch đầy cảm x&uacute;c. &quot;Kỷ nguy&ecirc;n của Messi vẫn chưa c&oacute; hồi kết. Si&ecirc;u sao người Argentina chinh phục th&agrave;nh Paris với lần thứ 6 đăng quang danh hiệu &quot;Quả b&oacute;ng v&agrave;ng&quot;. Điều n&agrave;y đồng nghĩa với việc mọi người c&ocirc;ng nhận Messi l&agrave; cầu thủ xuất sắc nhất m&ugrave;a giải trước. Chiến thắng gi&uacute;p Leo vượt l&ecirc;n Ronaldo trong cuộc đua danh hiệu c&aacute; nh&acirc;n&quot;. Tất cả c&oacute; trong b&agrave;i viết &quot;Messi sigue siendo el rey&quot; - &quot;Messi vẫn l&agrave; Vua&quot; tr&ecirc;n tờ AS của T&acirc;y Ban Nha. Messi vượt Ronaldo gi&agrave;nh 6 B&oacute;ng v&agrave;ng: B&aacute;o ch&iacute; nể phục, mệnh danh l&agrave; &quot;Vua&quot; - 2 &quot;Messi vẫn l&agrave; Vua&quot; - b&agrave;i viết tr&ecirc;n tờ AS của T&acirc;y Ban Nha C&acirc;y viết Ben Hayward tr&ecirc;n tờ Evening Standard của Anh sử dụng cụm từ &quot;Vua b&oacute;ng v&agrave;ng&quot; để ca ngợi th&agrave;nh t&iacute;ch v&ocirc; tiền kho&aacute;ng hậu n&agrave;y của Leo Messi trong b&agrave;i viết &quot;Messi lu&ocirc;n khiến người ta m&ecirc; mẩn &quot;ph&eacute;p thuật&quot; của m&igrave;nh. B&oacute;ng v&agrave;ng lần thứ 6 l&agrave; điều xứng đ&aacute;ng&quot;. &quot;Mỗi khi Messi gi&agrave;nh B&oacute;ng v&agrave;ng, nhiều người lại cố t&igrave;m l&yacute; do để phản b&aacute;c. Anh ta kh&ocirc;ng v&ocirc; địch Champions League, Anh ta kh&ocirc;ng thể ghi b&agrave;n tại Anfield hay Van Dijk xứng đ&aacute;ng hơn... Trung vệ người H&agrave; Lan đ&uacute;ng l&agrave; đ&atilde; c&oacute; một m&ugrave;a giải xuất sắc c&ugrave;ng Liverpool v&agrave; đ&aacute;nh bại Messi tại Champions League.</p>\r\n', 'quocphu', '2019-12-08', '2019-12-09', 'evening-sky-4437156__340.jpg', '', 1),
(9, 'Tin tức thứ 7', '<p>Tờ Mundo Deportivo ca ngợi Messi với b&agrave;i viết &quot;Gi&acirc;y ph&uacute;t lịch sử, Messi lập kỷ lục với lần thứ 6 đăng quang danh hiệu &quot;Quả b&oacute;ng v&agrave;ng&quot; Chứng kiến gi&acirc;y ph&uacute;t lịch sử ấy, b&aacute;o ch&iacute; thế giới đ&atilde; ca ngợi cũng như nể phục t&agrave;i năng của Leo Messi. &quot;Lập kỷ lục lịch sử&quot;, &quot;lần thứ 6 đăng quang&quot; l&agrave; những cụm từ xuất hiện nhiều nhất tr&ecirc;n c&aacute;c b&agrave;i viết n&oacute;i về sự kiện trao giải &quot;Quả b&oacute;ng v&agrave;ng 2019&quot;. C&acirc;y viết Santi Gimenez bắt đầu b&agrave;i viết một c&aacute;ch đầy cảm x&uacute;c. &quot;Kỷ nguy&ecirc;n của Messi vẫn chưa c&oacute; hồi kết. Si&ecirc;u sao người Argentina chinh phục th&agrave;nh Paris với lần thứ 6 đăng quang danh hiệu &quot;Quả b&oacute;ng v&agrave;ng&quot;. Điều n&agrave;y đồng nghĩa với việc mọi người c&ocirc;ng nhận Messi l&agrave; cầu thủ xuất sắc nhất m&ugrave;a giải trước. Chiến thắng gi&uacute;p Leo vượt l&ecirc;n Ronaldo trong cuộc đua danh hiệu c&aacute; nh&acirc;n&quot;. Tất cả c&oacute; trong b&agrave;i viết &quot;Messi sigue siendo el rey&quot; - &quot;Messi vẫn l&agrave; Vua&quot; tr&ecirc;n tờ AS của T&acirc;y Ban Nha. Messi vượt Ronaldo gi&agrave;nh 6 B&oacute;ng v&agrave;ng: B&aacute;o ch&iacute; nể phục, mệnh danh l&agrave; &quot;Vua&quot; - 2 &quot;Messi vẫn l&agrave; Vua&quot; - b&agrave;i viết tr&ecirc;n tờ AS của T&acirc;y Ban Nha C&acirc;y viết Ben Hayward tr&ecirc;n tờ Evening Standard của Anh sử dụng cụm từ &quot;Vua b&oacute;ng v&agrave;ng&quot; để ca ngợi th&agrave;nh t&iacute;ch v&ocirc; tiền kho&aacute;ng hậu n&agrave;y của Leo Messi trong b&agrave;i viết &quot;Messi lu&ocirc;n khiến người ta m&ecirc; mẩn &quot;ph&eacute;p thuật&quot; của m&igrave;nh. B&oacute;ng v&agrave;ng lần thứ 6 l&agrave; điều xứng đ&aacute;ng&quot;. &quot;Mỗi khi Messi gi&agrave;nh B&oacute;ng v&agrave;ng, nhiều người lại cố t&igrave;m l&yacute; do để phản b&aacute;c. Anh ta kh&ocirc;ng v&ocirc; địch Champions League, Anh ta kh&ocirc;ng thể ghi b&agrave;n tại Anfield hay Van Dijk xứng đ&aacute;ng hơn... Trung vệ người H&agrave; Lan đ&uacute;ng l&agrave; đ&atilde; c&oacute; một m&ugrave;a giải xuất sắc c&ugrave;ng Liverpool v&agrave; đ&aacute;nh bại Messi tại Champions League.</p>\r\n', 'quocphu', '2019-12-08', '2019-12-09', 'fountain-4518112__340.jpg', '', 3),
(18, 'bài viết hoàn chỉnh', '', 'quocphu', '2019-12-09', '2019-12-10', 'card-4395692__340.jpg', '', 1),
(27, 'tùng ysl ', '<p><u><strong><span style=\"color:#2ecc71\">&nbsp;T&ugrave;ng ysl </span></strong></u>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas feugiat consequat diam. Maecenas metus. Vivamus diam purus, cursus a, commodo non, facilisis vitae, nulla. Aenean dictum lacinia tortor. Nunc iaculis, nibh non iaculis aliquam, orci felis euismod neque, sed ornare massa mauris sed velit. Nulla pretium mi et risus. Fusce mi pede, tempor id, cursus ac, ullamcorper nec, enim. Sed tortor. Curabitur molestie. Duis velit augue, condimentum at, ultrices a, luctus ut, orci. Donec pellentesque egestas eros. Integer cursus, augue in cursus faucibus, eros pede bibendum sem, in tempus tellus justo quis ligula. Etiam eget tortor. Vestibulum rutrum, est ut placerat elementum, lectus nisl aliquam velit, tempor aliquam eros nunc nonummy metus. In eros metus, gravida a, gravida sed, lobortis id, turpis. Ut ultrices, ipsum at venenatis fringilla, sem nulla lacinia tellus, eget aliquet turpis mauris non enim.&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"/baitapcms/image-content/1112262839.jpg\" style=\"height:331px; width:500px\" /></p>\r\n', 'quocphu', '2019-12-10', '2019-12-10', 'dragon-4417429__340.png', '', 3),
(28, 'TTTTTTTT', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas feugiat consequat diam. Maecenas metus. Vivamus diam purus, cursus a, commodo non, facilisis vitae, nulla. Aenean dictum lacinia tortor. Nunc iaculis, nibh non iaculis aliquam, orci felis euismod neque, sed ornare massa mauris sed velit. Nulla pretium mi et risus. Fusce mi pede, tempor id, cursus ac, ullamcorper nec, enim. Sed tortor. Curabitur molestie. Duis velit augue, condimentum at, ultrices a, luctus ut, orci. Donec pellentesque egestas eros. Integer cursus, augue in cursus faucibus, eros pede bibendum sem, in tempus tellus justo quis ligula. Etiam eget tortor. Vestibulum rutrum, est ut placerat elementum, lectus nisl aliquam velit, tempor aliquam eros nunc nonummy metus. In eros metus, gravida a, gravida sed, lobortis id, turpis. Ut ultrices, ipsum at venenatis fringilla, sem nulla lacinia tellus, eget aliquet turpis mauris non enim. Nam turpis. Suspendisse lacinia. Curabitur ac tortor ut ipsum egestas eleme</p>\r\n\r\n<p><img alt=\"\" src=\"/baitapcms/image-content/2100825595.jpg\" style=\"height:334px; width:500px\" /></p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas feugiat consequat diam. Maecenas metus. Vivamus diam purus, cursus a, commodo non, facilisis vitae, nulla. Aenean dictum lacinia tortor. Nunc iaculis, nibh non iaculis aliquam, orci felis euismod neque, sed ornare massa mauris sed velit. Nulla pretium mi et risus. Fusce mi pede, tempor id, cursus ac, ullamcorper nec, enim. Sed tortor. Curabitur molestie. Duis velit augue, condimentum at, ultrices a, luctus ut, orci. Donec pellentesque egestas eros. Integer cursus, augue in cursus faucibus, eros pede bibendum sem, in tempus tellus justo quis ligula. Etiam eget tortor. Vestibulum rutrum, est ut placerat elementum, lectus nisl aliquam velit, tempor aliquam eros nunc nonummy metus. In eros metus, gravida a, gravida sed, lobortis id, turpis. Ut ultrices, ipsum at venenatis fringilla, sem nulla lacinia tellus, eget aliquet turpis mauris non enim. Nam turpis. Suspendisse lacinia. Curabitur ac tortor ut ipsum egestas eleme</p>\r\n', 'quocphu', '2019-12-11', '2019-12-11', 'girl-4364282__340.jpg', '', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news_catogry`
--

CREATE TABLE `news_catogry` (
  `id` int(11) NOT NULL,
  `newsid` int(11) NOT NULL,
  `catogryid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`username`, `password`) VALUES
('quocphu', '123');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `catogry`
--
ALTER TABLE `catogry`
  ADD PRIMARY KEY (`catogryid`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`newsid`);

--
-- Chỉ mục cho bảng `news_catogry`
--
ALTER TABLE `news_catogry`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `catogry`
--
ALTER TABLE `catogry`
  MODIFY `catogryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `newsid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `news_catogry`
--
ALTER TABLE `news_catogry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
