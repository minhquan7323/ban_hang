-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 02, 2023 lúc 11:48 AM
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
-- Cơ sở dữ liệu: `ban_hang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `hinh` varchar(256) NOT NULL,
  `rong` varchar(256) NOT NULL,
  `cao` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `banner`
--

INSERT INTO `banner` (`id`, `hinh`, `rong`, `cao`) VALUES
(1, 'banner_2.png', '990px', '150px');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `footer`
--

CREATE TABLE `footer` (
  `id` int(11) NOT NULL,
  `html` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `footer`
--

INSERT INTO `footer` (`id`, `html`) VALUES
(1, '<table width=\"990px\">\r\n<tbody>\r\n<tr>\r\n<td align=\"right\" width=\"495px\">Cửa h&agrave;ng :</td>\r\n<td width=\"495px\">deKor</td>\r\n</tr>\r\n<tr>\r\n<td align=\"right\">Điện thoại :</td>\r\n<td>0123456789</td>\r\n</tr>\r\n<tr>\r\n<td align=\"right\">Địa chỉ :</td>\r\n<td>11, quận 1, tp.HCM</td>\r\n</tr>\r\n</tbody>\r\n</table>');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoa_don`
--

CREATE TABLE `hoa_don` (
  `id` int(11) NOT NULL,
  `nguoi_dung_id` int(11) NOT NULL,
  `ten_nguoi_mua` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `dia_chi` mediumtext NOT NULL,
  `quan_huyen` varchar(256) NOT NULL,
  `tinh_thanh` varchar(256) NOT NULL,
  `dien_thoai` varchar(256) NOT NULL,
  `noi_dung` mediumtext NOT NULL,
  `hang_duoc_mua` mediumtext NOT NULL,
  `ngay_mua` date NOT NULL,
  `tong_tien` int(255) NOT NULL,
  `tinh_trang` varchar(255) NOT NULL,
  `phuong_thuc_thanh_toan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hoa_don`
--

INSERT INTO `hoa_don` (`id`, `nguoi_dung_id`, `ten_nguoi_mua`, `email`, `dia_chi`, `quan_huyen`, `tinh_thanh`, `dien_thoai`, `noi_dung`, `hang_duoc_mua`, `ngay_mua`, `tong_tien`, `tinh_trang`, `phuong_thuc_thanh_toan`) VALUES
(23, 47, 'quan1', 'quan1@gmail.com', 'áddsaas', 'Huyện Thanh Miện', 'Tỉnh Hải Dương', '547765475', 'cc', '31[|||]1[|||||]', '2023-04-20', 3790000, 'Đã xác nhận', 'COD'),
(24, 47, 'quan1', 'quan1@gmail.com', 'áddsaas', 'Huyện Thanh Miện', 'Tỉnh Hải Dương', '547765475', '', '4[|||]1[|||||]19[|||]1[|||||]', '2023-04-20', 23150000, 'Đã gửi hàng', 'COD'),
(33, 46, 'quan', 'quan@gmail.com', '123', 'Huyện Tam Nông', 'Tỉnh Phú Thọ', '123123123', '', '15[|||]1[|||||]', '2023-04-22', 1100000, 'Đã xác nhận', 'COD'),
(35, 46, 'quan moi', 'quan@gmail.com', 'quan moi', 'Huyện Vĩnh Bảo', 'Thành phố Hải Phòng', '123', 'dia chi moi', '32[|||]1[|||||]', '2023-04-22', 4000000, 'Hoàn thành', 'COD'),
(36, 48, 'test', 'quan2@gmail.com', 'test', 'Huyện Thanh Miện', 'Tỉnh Hải Dương', '123', 'test', '30[|||]1[|||||]', '2023-04-22', 5400000, 'Chờ xử lý', 'COD'),
(49, 65, 'Phạm Cao Minh Quân', 'quan6@gmail.com', '23', 'Huyện Hà Quảng', 'Tỉnh Cao Bằng', '0123987232', '', '32[|||]1[|||||]', '2023-04-30', 4000000, 'Chờ xử lý', 'COD'),
(57, 65, 'Phạm Cao Minh Quân', 'quan6@gmail.com', '23', 'Huyện Lương Tài', 'Tỉnh Bắc Ninh', '0123123123', '', '16[|||]1000[|||||]', '2023-05-01', 467000000, 'Chờ xử lý', 'Online'),
(72, 66, 'moi', 'quan7@gmail.com', 'test', 'Thành phố Hưng Yên', 'Tỉnh Hưng Yên', '0123123123', '', '32[|||]99[|||||]', '2023-05-02', 396000000, 'Chờ xử lý', 'Online'),
(83, 66, 'Phạm Cao Minh Quân', 'quan7@gmail.com', 'test', 'Thị xã Từ Sơn', 'Tỉnh Bắc Ninh', '0999999999', '', '30[|||]1[|||||]', '2023-05-02', 5400000, 'chờ xử lý', 'COD'),
(84, 66, 'Phạm Cao Minh Quân', 'quan7@gmail.com', 'test', 'Thị xã Từ Sơn', 'Tỉnh Bắc Ninh', '0999999999', '', '31[|||]1[|||||]', '2023-05-02', 3790000, 'chờ xử lý', 'Online');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menu_doc`
--

CREATE TABLE `menu_doc` (
  `id` int(11) NOT NULL,
  `ten` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `menu_doc`
--

INSERT INTO `menu_doc` (`id`, `ten`) VALUES
(10, 'Bàn gỗ'),
(11, 'Đèn trang trí'),
(12, 'Giường ngủ'),
(13, 'Kệ sách'),
(14, 'Phòng tắm'),
(15, 'Rèm cửa'),
(16, 'Ghế sofa'),
(17, 'Tủ quần áo');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menu_ngang`
--

CREATE TABLE `menu_ngang` (
  `id` int(11) NOT NULL,
  `ten` varchar(256) NOT NULL,
  `noi_dung` mediumtext NOT NULL,
  `loai_menu` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `menu_ngang`
--

INSERT INTO `menu_ngang` (`id`, `ten`, `noi_dung`, `loai_menu`) VALUES
(1, 'Trang chủ', '', 'trang_chu'),
(2, 'Giới thiệu', '<p><strong>DEKOR</strong>&nbsp;xin gửi tới to&agrave;n thể qu&yacute; kh&aacute;ch h&agrave;ng lời ch&uacute;c sức khỏe v&agrave; lời cảm ơn s&acirc;u sắc bởi sự quan t&acirc;m của qu&yacute; kh&aacute;ch d&agrave;nh cho ch&uacute;ng t&ocirc;i !</p>\r\n<p>Thương hiệu DEKOR được x&acirc;y dựng v&agrave; ph&aacute;t triển bởi C&ocirc;ng ty Cổ phần X&acirc;y dựng Nội thất DEKOR. Với mục đ&iacute;ch mang lại sự tiện nghi v&agrave; kh&ocirc;ng gian sang trọng đến cho to&agrave;n thể qu&yacute; kh&aacute;ch h&agrave;ng, DEKOR kh&ocirc;ng ngừng cải tiến c&ocirc;ng nghệ, n&acirc;ng cao năng suất chất lượng sản phẩm để trở th&agrave;nh một c&ocirc;ng ty h&agrave;ng đầu về sản xuất v&agrave; cung cấp c&aacute;c sản phẩm nội thất từ đồ gỗ.</p>\r\n<p>Với đội ngũ kiến tr&uacute;c sư t&agrave;i năng đầy s&aacute;ng tạo đ&atilde; gi&uacute;p DEKOR ng&agrave;y c&agrave;ng khẳng định được vị thế của m&igrave;nh trong lĩnh vực thiết kế v&agrave; thi c&ocirc;ng nội thất kh&ocirc;ng chỉ tr&ecirc;n địa b&agrave;n H&agrave; Nội m&agrave; c&ograve;n tr&ecirc;n c&aacute;c tỉnh l&acirc;n cận. DEKOR lu&ocirc;n lỗ lực ph&aacute;t triển để cho ra những sản phẩm mới v&agrave; độc đ&aacute;o, đa dạng về mẫu m&atilde;, an to&agrave;n về chất lượng v&agrave; gi&aacute; cả. DEKOR tự h&agrave;o l&agrave; c&ocirc;ng ty nội thất h&agrave;ng đầu chuy&ecirc;n cung cấp c&aacute;c sản phẩm đồ gỗ nội thất, sofa cao cấp tr&ecirc;n thị trường.</p>\r\n<p>Với phương ch&acirc;m \"ho&agrave;n thiện tr&ecirc;n từng bước tiến\" c&ugrave;ng ti&ecirc;u ch&iacute; \"lu&ocirc;n hướng tới kh&aacute;ch h&agrave;ng\", DEKOR sẽ kh&ocirc;ng ngừng n&acirc;ng cao chuy&ecirc;n m&ocirc;n v&agrave; cải tiến quy tr&igrave;nh sản xuất để mang lại những sản phẩm dịch vụ với chất lượng tốt nhất đến cho kh&aacute;ch h&agrave;ng. Đến với DEKOR, ch&uacute;ng t&ocirc;i sẽ gi&uacute;p cho ng&ocirc;i nh&agrave; bạn ho&agrave;n thiện hơn.</p>', ''),
(3, 'Sản phẩm', '', 'san_pham'),
(5, 'Liên hệ', '<div class=\"section2\">\r\n<h4>Th&ocirc;ng tin cửa h&agrave;ng</h4>\r\n</div>\r\n<div class=\"section3\">\r\n<ul class=\"max1\">\r\n<li>\r\n<p>Đường Số 1, Quận 1, Th&agrave;nh Phố Hồ Ch&iacute; Minh, Việt Nam</p>\r\n</li>\r\n<li>\r\n<p><a href=\"http://127.0.0.1:5500/NhomA03/header/LienHe.html\">+84 123 456 789</a><br /><a href=\"http://127.0.0.1:5500/NhomA03/header/LienHe.html\">+84 987 654 321</a></p>\r\n</li>\r\n<li>\r\n<p><a href=\"http://127.0.0.1:5500/NhomA03/header/LienHe.html\">diachiemail@gmail.com</a></p>\r\n</li>\r\n</ul>\r\n</div>', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoi_dung`
--

CREATE TABLE `nguoi_dung` (
  `nguoi_dung_id` int(11) NOT NULL,
  `tai_khoan` varchar(256) NOT NULL,
  `mat_khau` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `trang_thai` varchar(256) NOT NULL,
  `ho_ten` varchar(255) NOT NULL,
  `so_dien_thoai` varchar(10) NOT NULL,
  `dia_chi` mediumtext NOT NULL,
  `tinh_thanh` mediumtext NOT NULL,
  `quan_huyen` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nguoi_dung`
--

INSERT INTO `nguoi_dung` (`nguoi_dung_id`, `tai_khoan`, `mat_khau`, `email`, `trang_thai`, `ho_ten`, `so_dien_thoai`, `dia_chi`, `tinh_thanh`, `quan_huyen`) VALUES
(46, 'quan', 'quan', 'quan@gmail.com', '', 'quan', '123123123', 'ccc', 'Tỉnh Phú Thọ', 'Huyện Tam Nông'),
(47, 'quan1', 'quan1', 'quan1@gmail.com', 'co', 'quan1', '547765475', 'áddsaas', 'Tỉnh Hải Dương', 'Huyện Thanh Miện'),
(48, 'quan2', 'quan2', 'quan2@gmail.com', '', 'quan2', '789989898', '123', 'Tỉnh Lào Cai', 'Huyện Bảo Thắng'),
(56, 'test', 'test', 'test@gmail.com', '', 'ok chua', '123', 'test', 'Tỉnh Bắc Ninh', 'Huyện Quế Võ'),
(61, '123adssad', '123', '1231231@gmail.com', '', '123', '123', 'ghjghjhg', 'Tỉnh Bắc Ninh', 'Huyện Lương Tài'),
(65, 'quan6', 'quan6', 'quan6@gmail.com', '', 'Phạm Cao Minh Quân', '0123123123', '23', 'Tỉnh Bắc Ninh', 'Huyện Lương Tài'),
(66, 'quan7', 'quan7', 'quan7@gmail.com', '', 'Phạm Cao Minh Quân', '0999999999', 'test', 'Tỉnh Bắc Ninh', 'Thị xã Từ Sơn');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quang_cao`
--

CREATE TABLE `quang_cao` (
  `id` int(11) NOT NULL,
  `html` mediumtext NOT NULL,
  `vi_tri` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `quang_cao`
--

INSERT INTO `quang_cao` (`id`, `html`, `vi_tri`) VALUES
(1, '<p><a href=\"#\">&nbsp;</a></p>', 'trai'),
(2, '<p><a href=\"#\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"/ban_hang/hinh_anh/tinymce/qc_t_1.png\" alt=\"\" /></a></p>\r\n<p style=\"text-align: center;\"><a href=\"#\"><img src=\"/ban_hang/hinh_anh/tinymce/qc_t_2.png\" alt=\"\" /></a></p>\r\n<p><a href=\"#\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"/ban_hang/hinh_anh/tinymce/qc_t_3.png\" alt=\"\" /></a></p>', 'phai');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `san_pham`
--

CREATE TABLE `san_pham` (
  `id` int(11) NOT NULL,
  `ten` varchar(256) NOT NULL,
  `gia` int(255) NOT NULL,
  `hinh_anh` varchar(256) NOT NULL,
  `noi_dung` mediumtext NOT NULL,
  `thuoc_menu` int(255) NOT NULL,
  `noi_bat` varchar(256) NOT NULL,
  `trang_chu` varchar(256) NOT NULL,
  `sap_xep_trang_chu` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `san_pham`
--

INSERT INTO `san_pham` (`id`, `ten`, `gia`, `hinh_anh`, `noi_dung`, `thuoc_menu`, `noi_bat`, `trang_chu`, `sap_xep_trang_chu`) VALUES
(1, 'Bàn cafe tròn gỗ đẹp', 4500000, '1_1.png', '<p>Chất li&ecirc;u: Sản xuất từ Gỗ MDF sơn Bệt 2k</p>\r\n<p>K&iacute;ch thước: 800x800x350mm(Qu&yacute; kh&aacute;ch c&oacute; thể đặt k&iacute;ch thước kh&aacute;c để ph&ugrave; hợp với ph&ograve;ng nh&agrave; m&igrave;nh)</p>\r\n<p>M&agrave;u: n&acirc;u</p>\r\n<p>Chất lượng: Gỗ c&ocirc;ng nghiệp MDF nhập khẩu nguy&ecirc;n tấm từ Malaysia, vật liệu chất lượng cao.</p>\r\n<p>Với 100% nhựa nguy&ecirc;n chất, đảm bảo kh&ocirc;ng độc hại, kh&ocirc;ng mối mọt, ẩm ướt..v..v</p>', 10, '', 'co', 1),
(2, 'Bàn gỗ dài', 1890000, '1_2.png', '<p>B&agrave;n m&agrave;u ghi ch&igrave; chất liệu gỗ c&ocirc;ng nghiệp nhập khẩu.</p>\r\n<p>K&iacute;ch thước : W1200 x D600 x H750</p>\r\n<p>Ngo&agrave;i ra c&ugrave;ng kiểu d&aacute;ng c&ograve;n c&oacute; k&iacute;ch thước : W1200 x D700 x H750 v&agrave; c&aacute;c loại từ 1,4 - 1,8m.</p>\r\n<p>Ghế cafe TF 105 Với thiết kế đơn giản nhưng sang trọng, được tối ưu c&aacute;c chi tiết g&oacute;c canh, để tạo cho bạn c&oacute; cảm gi&aacute;c ngồi thoải m&aacute;i nhất c&oacute; thể.</p>\r\n<p>Đảm bảo kh&ocirc;ng độc hại, sẽ tạo n&ecirc;n bộ b&agrave;n ghế ho&agrave;n hảo cho kh&ocirc;ng gian của qu&yacute; kh&aacute;ch h&agrave;ng.</p>', 10, '', 'co', 2),
(3, 'Bàn GTY 091', 3500000, '1_3.png', '<p>Nếu qu&yacute; kh&aacute;ch l&agrave; người c&oacute; t&iacute;nh c&aacute;ch hiện đại th&igrave; mẫu b&agrave;n ăn 11 l&agrave; d&agrave;nh cho qu&yacute; kh&aacute;ch.</p>\r\n<p>Kh&ocirc;ng rườm r&agrave;, mặt b&agrave;n trong xanh được t&ocirc; điểm bằng hai m&eacute;p k&iacute;nh uốn cong bằng c&ocirc;ng nghệ hiện đại.</p>\r\n<p>Bốn ch&acirc;n b&agrave;n v&agrave; phụ kiện kết nối h&igrave;nh trụ tr&ograve;n đồng bộ tạo n&ecirc;n t&iacute;nh logic trong thiết kế.</p>\r\n<p>Mặt b&agrave;n l&agrave; k&iacute;nh 12 ly cường lực, đợt k&iacute;nh (ngăn b&agrave;n) k&iacute;nh dầy 7 ly c&oacute; nhiều mầu v&agrave; hoa văn.</p>\r\n<p>Khoảng c&aacute;ch giữa mặt b&agrave;n v&agrave; đợt k&iacute;nh (nếu c&oacute;) thường trong khoảng 16-18cm.</p>', 10, '', 'co', 3),
(4, 'Bàn tròn kính', 23000000, '1_4.png', '<p>B&agrave;n tr&agrave; được l&agrave;m bằng gỗ veneer với thiết kế đơn giản bền đẹp ph&ugrave; hợp với nhiều kh&ocirc;ng gian sống</p>\r\n<p>Chất li&ecirc;u: Sản xuất từ Gỗ veneer</p>\r\n<p>K&iacute;ch thước: 600x900x350mm(Qu&yacute; kh&aacute;ch c&oacute; thể đặt k&iacute;ch thước kh&aacute;c để ph&ugrave; hợp với ph&ograve;ng nh&agrave; m&igrave;nh)</p>\r\n<p>M&agrave;u: Trắng</p>\r\n<p>Chất lượng: Gỗ c&ocirc;ng nghiệp veneer sơn pu, m&agrave;u sắc bền đẹp</p>', 10, '', 'co', 4),
(5, 'Đèn tường Composite An Phước B948', 10000000, '2_1.png', '<p>Ng&agrave;y nay, trang tr&iacute; nội thất l&agrave; sở th&iacute;ch v&agrave; đam m&ecirc; của nhiều người, th&ocirc;ng qua c&aacute;ch lựa chọn v&agrave; b&agrave;y tr&iacute; c&aacute;c vật dụng sẽ n&oacute;i l&ecirc;n c&aacute; t&iacute;nh v&agrave; thể hiện mắt thẩm mỹ bạn. Nếu bạn l&agrave; người y&ecirc;u th&iacute;ch phong c&aacute;ch cổ điển, tinh tế th&igrave; sản phẩm đ&egrave;n tường An Phước B984 sẽ l&agrave; sự lựa chọn ho&agrave;n hảo d&agrave;nh cho bạn. Với thiết kế đậm chất cổ điển nhưng vẫn mang một ch&uacute;t hơi thở của hiện đại nhờ chất liệu hợp kim v&agrave; thủy tinh cao cấp, đ&egrave;n tường An Phước B984 lu&ocirc;n c&oacute; sức h&uacute;t k&igrave; lạ đối với người nh&igrave;n v&agrave; tạo n&ecirc;n điểm nhấn đặc sắc cho kh&ocirc;ng gian của bạn.</p>', 11, 'co', 'co', 5),
(6, 'Đèn trang trí vách Netviet NV 8205/1', 590000, '2_2.png', '<p>đ&egrave;n v&aacute;ch k&iacute;nh treo tường</p>\r\n<p>k&iacute;ch thước : L270 x H300</p>\r\n<p>loại b&oacute;ng : E27 x 1</p>\r\n<p>Th&acirc;n đ&egrave;n bằng th&eacute;p phun sơn chống ăn m&ograve;n</p>\r\n<p>Chao đ&egrave;n l&agrave;m bằng thủy tinh chịu nhiệt tốt</p>', 11, '', 'co', 6),
(7, 'Đèn trang trí vách cao cấp NETVIET NV 8825', 780000, '2_3.png', '<p>K&iacute;ch thước( cm):31x20x75</p>\r\n<p>Loại b&oacute;ng sử dụng: E14 x 1</p>\r\n<p>Vị tr&iacute; lắp: V&aacute;ch tường hoặc trụ cột.</p>\r\n<p>Ứng dụng: Lắp đặt ở vị tr&iacute; v&aacute;ch c&oacute; mặt phẳng như tường ph&ograve;ng kh&aacute;ch, ph&ograve;ng ngủ, h&agrave;nh lang ph&ugrave; hợp cho biệt thự, nh&agrave; phố, kh&aacute;ch sạn, nh&agrave; h&agrave;ng,...</p>', 11, '', 'co', 7),
(8, 'Đèn trang trí vách cao cấp pha lê Netviet NV 9005/2', 970000, '2_4.png', '<p>K&iacute;ch thước( cm): 40x40x42</p>\r\n<p>Loại b&oacute;ng sử dụng: E14 x 2</p>\r\n<p>Vị tr&iacute; lắp: V&aacute;ch tường hoặc trụ cột.</p>\r\n<p>Ứng dụng: Lắp đặt ở vị tr&iacute; v&aacute;ch c&oacute; mặt phẳng như tường ph&ograve;ng kh&aacute;ch, ph&ograve;ng ngủ, h&agrave;nh lang ph&ugrave; hợp cho biệt thự, nh&agrave; phố, kh&aacute;ch sạn, nh&agrave; h&agrave;ng,...</p>', 11, '', 'co', 8),
(9, 'Giường Bellasofa B1239', 9000000, '3_1.png', '<p>Interiorvnex l&agrave; thương hiệu nội thất uy t&iacute;n được nhiều người tin d&ugrave;ng ở Ch&acirc;u &Acirc;u, đặc biệt l&agrave; &Yacute; v&agrave; Đan Mạch. Tại Việt Nam, Interiorvnex Vietnam kh&ocirc;ng chỉ cung cấp nội thất ph&ograve;ng kh&aacute;ch như Sofa hiện đại sang trọng m&agrave; c&ograve;n cung cấp trọn bộ nội thất Ph&ograve;ng Ngủ: Giường, Tủ &Aacute;o, B&agrave;n Trang Điểm, Tủ Đầu Giường,...</p>', 12, '', 'co', 9),
(10, 'Giường Bellasofa BS701', 11000000, '3_2.png', '<p>Bellasofa l&agrave; thương hiệu nội thất uy t&iacute;n được nhiều người tin d&ugrave;ng ở Ch&acirc;u &Acirc;u, đặc biệt l&agrave; &Yacute;v&agrave; Đan Mạch. Tại Việt Nam, Bellasofa Vietnam kh&ocirc;ng chỉ cung cấp nội thất ph&ograve;ng kh&aacute;ch như Sofa hiện đại sang trọng m&agrave; c&ograve;n cung cấp trọn bộ nội thất Ph&ograve;ng Ngủ: Giường, Tủ &Aacute;o, B&agrave;n Trang Điểm, Tủ Đầu Giường,...</p>\r\n<p>Đặc điểm nổi bật của Giường Bellasofa BS701:</p>\r\n<p>Thiết kế tinh tế v&agrave; hiện đại ph&ugrave; hợp với phong c&aacute;ch Việt Nam.</p>', 12, '', 'co', 10),
(11, 'Giường ngủ FURNILAND - Jangin Haim (1.8m)', 12000000, '3_3.png', '<p>Sản phẩm bảo h&agrave;nh trong 6 th&aacute;ng bằng h&igrave;nh thức H&oacute;a đơn mua h&agrave;ng</p>\r\n<p>Sản xuất tại: H&agrave;n Quốc</p>\r\n<p>Chất liệu: gỗ tr&agrave;m; MDF; PVC</p>\r\n<p>Thiết kế sang trọng</p>', 12, '', 'co', 11),
(12, 'Giường ngủ FURNILAND - Jangin Christine (1m8)', 12000000, '3_4.png', '<p>Chất liệu: giả da, gỗ tr&agrave;m, MDF</p>\r\n<p>Kiểu d&aacute;ng sang trọng; đẹp mắt</p>\r\n<p>Ph&ugrave; hợp nhiều kh&ocirc;ng gian</p>\r\n<p>V&aacute;n c&ocirc;ng nghiệp MFC v&agrave; MDF cao cấp bề mặt chống trầy xước</p>\r\n<p>Được xử l&yacute; chống mọt v&agrave; chống h&uacute;t ẩm.</p>', 12, '', 'co', 12),
(13, 'Kệ sách BIG ONE VIETNAM SPR-1980DK', 460000, '4_1.png', '<p>Quy c&aacute;ch sản phẩm: Kệ s&aacute;ch 4 tầng cao 90 cm, chiều s&acirc;u 28cm v&agrave; c&oacute; chiều rộng 40cm, hồi 2cm d&agrave;y dặn, chắc chắn. Bạn c&oacute; thể dễ d&agrave;ng chọn được một sản phẩm c&oacute; chiều cao, rộng ph&ugrave; hợp với kh&ocirc;ng gian nh&agrave; bạn.</p>\r\n<p>M&agrave;u sắc sản phẩm: C&oacute; 2 m&agrave;u cơ bản l&agrave; m&agrave;u gỗ tự nhi&ecirc;n v&agrave; m&agrave;u c&aacute;nh gi&aacute;n. M&agrave;u tự nhi&ecirc;n của gỗ cao su c&oacute; m&agrave;u v&agrave;ng s&aacute;ng ph&ugrave; hợp với kh&ocirc;ng gian nội thất hiện đại, m&agrave;u c&aacute;nh gi&aacute;n ph&ugrave; hợp với kh&ocirc;ng gian nội thất giả cổ.</p>\r\n<p>H&igrave;nh thức sản phẩm: Với bộ &oacute;c s&aacute;ng tạo của người thợ, thớ gỗ cao su mịn m&agrave;ng c&ugrave;ng sự hỗ trợ của c&ocirc;ng nghệ, m&aacute;y m&oacute;c c&aacute;c sản phẩm kệ s&aacute;ch gỗ cao su tr&ocirc;ng rất trang nh&atilde; v&agrave; đẹp mắt. Kệ s&aacute;ch của bạn tr&ocirc;ng sinh động v&agrave; đẹp hơn hẳn khi c&oacute; ch&uacute; gấu b&ocirc;ng, một khung ảnh nhỏ hay vật trang tr&iacute; n&agrave;o đ&oacute;.</p>\r\n<p>T&iacute;nh hữu dụng: Kệ s&aacute;ch &ndash; c&oacute; thể gọi l&agrave; kệ đa năng &ndash; với kết cấu vững chắc bạn c&oacute; thể để từ s&aacute;ch vở, mũ bảo hiểm, gi&agrave;y d&eacute;p, đồ d&ugrave;ng gia đ&igrave;nh, c&oacute; thể trưng b&agrave;y h&agrave;ng h&oacute;a hay bất cứ đồ d&ugrave;ng ph&ugrave; hợp. G&oacute;c gia đ&igrave;nh trở l&ecirc;n gọn g&agrave;ng v&agrave; đ&aacute;ng y&ecirc;u biết mấy khi c&oacute; sự hiện diện của c&aacute;c kệ s&aacute;ch.</p>\r\n<p>Ch&iacute;nh s&aacute;ch bảo h&agrave;nh: Được đ&aacute;nh gi&aacute; l&agrave; sản phẩm th&acirc;n thiện với m&ocirc;i trường v&igrave; sau 30 đến 50 năm khi hết tuổi khai th&aacute;c mủ gỗ cao su mới được khai th&aacute;c. Kh&aacute;ch h&agrave;ng c&oacute; thể ho&agrave;n to&agrave;n an t&acirc;m về sản phẩm kệ s&aacute;ch do Bestgoods cung cấp với chế độ bảo h&agrave;nh mối mọt, cong v&ecirc;nh, nứt lẻ, thay thế bất cứ chi tiết n&agrave;o của sản phẩm lỗi, hỏng do vận chuyển hoặc lỗi của nh&agrave; sản xuất.</p>', 13, '', 'co', 13),
(14, 'Kệ sách gỗ 4 tầng 40', 510000, '4_2.png', '<p>Quy c&aacute;ch sản phẩm: Kệ s&aacute;ch 4 tầng cao 90 cm, chiều s&acirc;u 28cm v&agrave; c&oacute; chiều rộng 40cm, hồi 2cm d&agrave;y dặn, chắc chắn. Bạn c&oacute; thể dễ d&agrave;ng chọn được một sản phẩm c&oacute; chiều cao, rộng ph&ugrave; hợp với kh&ocirc;ng gian nh&agrave; bạn.</p>\r\n<p>M&agrave;u sắc sản phẩm: C&oacute; 2 m&agrave;u cơ bản l&agrave; m&agrave;u gỗ tự nhi&ecirc;n v&agrave; m&agrave;u c&aacute;nh gi&aacute;n. M&agrave;u tự nhi&ecirc;n của gỗ cao su c&oacute; m&agrave;u v&agrave;ng s&aacute;ng ph&ugrave; hợp với kh&ocirc;ng gian nội thất hiện đại, m&agrave;u c&aacute;nh gi&aacute;n ph&ugrave; hợp với kh&ocirc;ng gian nội thất giả cổ.</p>\r\n<p>H&igrave;nh thức sản phẩm: Với bộ &oacute;c s&aacute;ng tạo của người thợ, thớ gỗ cao su mịn m&agrave;ng c&ugrave;ng sự hỗ trợ của c&ocirc;ng nghệ, m&aacute;y m&oacute;c c&aacute;c sản phẩm kệ s&aacute;ch gỗ cao su tr&ocirc;ng rất trang nh&atilde; v&agrave; đẹp mắt. Kệ s&aacute;ch của bạn tr&ocirc;ng sinh động v&agrave; đẹp hơn hẳn khi c&oacute; ch&uacute; gấu b&ocirc;ng, một khung ảnh nhỏ hay vật trang tr&iacute; n&agrave;o đ&oacute;.</p>\r\n<p>T&iacute;nh hữu dụng: Kệ s&aacute;ch &ndash; c&oacute; thể gọi l&agrave; kệ đa năng &ndash; với kết cấu vững chắc bạn c&oacute; thể để từ s&aacute;ch vở, mũ bảo hiểm, gi&agrave;y d&eacute;p, đồ d&ugrave;ng gia đ&igrave;nh, c&oacute; thể trưng b&agrave;y h&agrave;ng h&oacute;a hay bất cứ đồ d&ugrave;ng ph&ugrave; hợp. G&oacute;c gia đ&igrave;nh trở l&ecirc;n gọn g&agrave;ng v&agrave; đ&aacute;ng y&ecirc;u biết mấy khi c&oacute; sự hiện diện của c&aacute;c kệ s&aacute;ch.</p>\r\n<p>Ch&iacute;nh s&aacute;ch bảo h&agrave;nh: Được đ&aacute;nh gi&aacute; l&agrave; sản phẩm th&acirc;n thiện với m&ocirc;i trường v&igrave; sau 30 đến 50 năm khi hết tuổi khai th&aacute;c mủ gỗ cao su mới được khai th&aacute;c. Kh&aacute;ch h&agrave;ng c&oacute; thể ho&agrave;n to&agrave;n an t&acirc;m về sản phẩm kệ s&aacute;ch do Bestgoods cung cấp với chế độ bảo h&agrave;nh mối mọt, cong v&ecirc;nh, nứt lẻ, thay thế bất cứ chi tiết n&agrave;o của sản phẩm lỗi, hỏng do vận chuyển hoặc lỗi của nh&agrave; sản xuất.</p>', 13, '', 'co', 14),
(15, 'Kệ trang trí Rubik Modulo Home 1846', 1100000, '4_3.png', '<p>Kệ trang tr&iacute; Rubik Modulo Home 1846 của Modulo Home kh&ocirc;ng những l&agrave; sản phẩm gi&uacute;p bạn để s&aacute;ch, đồ lưu niệm,... m&agrave; c&ograve;n l&agrave; vật trang tr&iacute; v&agrave; t&ocirc; điểm th&ecirc;m cho kh&ocirc;ng gian nội thất của bạn. Kệ c&oacute; kết cấu chắc chắn v&agrave; bền đẹp do được l&agrave;m từ gỗ c&ocirc;ng nghiệp nhập khẩu từ Malaysia gi&uacute;p vẻ ngo&agrave;i sang trọng v&agrave; bắt mắt hơn. Kệ trang tr&iacute; Rubik Modulo Home 1846 c&oacute; nhiều ngăn với k&iacute;ch thước ph&ugrave; hợp để bạn c&oacute; thể lưu giữ bộ sưu tập s&aacute;ch, những khung h&igrave;nh kỷ niệm, những ch&uacute; gấu b&ocirc;ng đ&aacute;ng y&ecirc;u hay một v&agrave;i chai nước hoa, chai rượu với kiểu d&aacute;ng lạ mắt để trang tr&iacute; cho ng&ocirc;i nh&agrave; của m&igrave;nh.</p>', 13, '', 'co', 15),
(16, 'Giá sách treo Hurakids 2130-002', 467000, '4_4.png', '<p>Đối với c&aacute;c kh&ocirc;ng gian nội thất nhỏ hẹp th&igrave; lựa chọn những vật dụng, đồ d&ugrave;ng, thiết bị,... c&oacute; k&iacute;ch thước nhỏ gọn, tiện lợi, đa năng v&agrave; kh&ocirc;ng chiếm nhiều kh&ocirc;ng gian l&agrave; một việc v&ocirc; c&ugrave;ng cần thiết. H&atilde;y nhanh tay sở hữu ngay chiếc kệ s&aacute;ch treo Hurakids 2130-002 để kh&ocirc;ng gian nh&agrave; bạn được sắp xếp gọn g&agrave;ng v&agrave; khoa học hơn. Sản phẩm được thiết kế gi&uacute;p bạn đựng s&aacute;ch b&aacute;o, t&agrave;i liệu phục vụ cho c&ocirc;ng việc, học tập,... một c&aacute;ch hợp l&yacute; v&agrave; gọn g&agrave;ng. Với m&agrave;u sắc tươi s&aacute;ng, trang nh&atilde; từ chất liệu gỗ cao cấp, kệ s&aacute;ch treo Hurakids 2130-002 vừa được trang bị độ bền tuyệt đối, chịu lực tốt vừa mang đến vẻ sang trọng, thu h&uacute;t cho kh&ocirc;ng gian nh&agrave; bạn. Đ&acirc;y chắc chắn sẽ l&agrave; dụng cụ hỗ trợ đắc lực gi&uacute;p kh&ocirc;ng gian sống của bạn được ngăn nắp v&agrave; gọn g&agrave;ng hơn rất nhiều.</p>', 13, '', 'co', 16),
(17, 'Bóng đèn DTY', 98000, '5_1.png', '<p>Đ&egrave;n kh&ocirc;ng chỉ l&agrave; sản phẩm thiết thực cho mọi gia đ&igrave;nh, l&agrave;m s&aacute;ng căn ph&ograve;ng m&agrave; c&ograve;n gi&uacute;p t&ocirc; điểm cho kh&ocirc;ng gian th&ecirc;m ấm c&uacute;ng, sang trọng. Nhiều người vẫn ưa th&iacute;ch một căn ph&ograve;ng lu&ocirc;n s&aacute;ng đ&egrave;n để mong những điều tốt đẹp nhất đến với nh&agrave; m&igrave;nh theo nghệ thuật thiết kế phong thủy, nội thất. V&igrave; thế m&agrave; ch&uacute;ng t&ocirc;i mang lại cho bạn b&oacute;ng đ&egrave;n LED 7W gi&uacute;p thắp s&aacute;ng kh&ocirc;ng gian nh&agrave; bạn m&agrave; vẫn tiết kiệm điện năng hiệu quả nhất.</p>', 14, 'co', 'co', 17),
(18, 'Kệ chứa xà phòng', 98000, '5_2.png', '<p>Chứa vật d&ugrave;ng nh&agrave; tắm v&agrave; giữ nh&agrave; tắm gọn g&agrave;ng</p>\r\n<p>M&agrave;u sắc b&aacute;t mắt</p>\r\n<p>Phần trọng t&acirc;m</p>\r\n<p>Sản phẩm thương hiệu Anh, lắp r&aacute;p Trung Quốc</p>\r\n<p>Bộ sản phẩm bao gồm: 1x1 Kệ Đồ Cho Ph&ograve;ng Tắm</p>', 14, '', 'co', 18),
(19, 'Thanh treo giấy vệ sinh', 150000, '5_3.png', '<p>Hộp đựng giấy vệ sinh gắn tường cỡ nhỏ Public 14cm l&agrave; sản phẩm được l&agrave;m từ nhựa PP c&oacute; độ cứng vừa phải, lu&ocirc;n bền đẹp, kh&ocirc;ng phai m&agrave;u, kh&oacute; g&atilde;y vỡ theo thời gian sử dụng.</p>\r\n<p>Thiết kế h&igrave;nh ảnh ngộ nghĩnh ngay ph&iacute;a trước sản phẩm kh&ocirc;ng chỉ gi&uacute;p t&ocirc; điểm th&ecirc;m cho kh&ocirc;ng gian nh&agrave; tắm m&agrave; c&ograve;n k&iacute;ch th&iacute;ch c&aacute;c b&eacute; chăm sử dụng hơn để giữ g&igrave;n vệ sinh cho ch&iacute;nh bản th&acirc;n ngay từ khi c&ograve;n nhỏ.</p>\r\n<p>Đường răng cắt giấy ẩn s&acirc;u b&ecirc;n trong gi&uacute;p ngắt đoạn dễ d&agrave;ng m&agrave; kh&ocirc;ng g&acirc;y nguy hiểm cho mọi th&agrave;nh vi&ecirc;n trong gia đ&igrave;nh.</p>', 14, '', 'co', 19),
(20, 'Thanh sắt treo khăn', 98000, '5_4.png', '<p>Bộ 2 thanh treo khăn đ&ocirc;i Minh Bảo MAQ.I.42.1 sẽ gi&uacute;p bạn treo những chiếc khăn tắm, khăn mặt ngay ngắn v&agrave; gọn g&agrave;ng, l&agrave;m đẹp th&ecirc;m kh&ocirc;ng gian ph&ograve;ng tắm.</p>\r\n<p>Thanh treo c&oacute; chất liệu inox s&aacute;ng b&oacute;ng, kh&ocirc;ng gỉ s&eacute;t khi sử dụng l&acirc;u trong m&ocirc;i trường nhiều độ ẩm.</p>\r\n<p>V&igrave; thế bạn c&oacute; thể y&ecirc;n t&acirc;m khi treo thanh trong ph&ograve;ng tắm v&agrave; d&ugrave;ng để treo khăn ướt. K&iacute;ch thước thanh treo 60 x 35cm.</p>', 14, '', 'co', 20),
(21, 'Rèm cửa 01', 900000, '6_1.png', '<p>R&egrave;m nh&agrave; tắm họa tiết bong b&oacute;ng Bubble Fish Interdesign</p>\r\n<p>Xuất xứ: l&agrave; sản phẩm của Interdesign Mỹ</p>\r\n<p>K&iacute;ch thước: 1.83m x 1.83m</p>\r\n<p>M&agrave;u sắc: Trắng, họa tiết: bong b&oacute;ng c&aacute; v&agrave;ng</p>\r\n<p>Chất liệu: EVA vinyl</p>', 15, '', 'co', 21),
(22, 'Rèm cửa 02', 990000, '6_2.png', '<p>R&egrave;m nh&agrave; tắm họa tiết bong b&oacute;ng Bubble Fish Interdesign</p>\r\n<p>Xuất xứ: l&agrave; sản phẩm của Interdesign Mỹ</p>\r\n<p>K&iacute;ch thước: 1.83m x 1.83m</p>\r\n<p>M&agrave;u sắc: Trắng, họa tiết: bong b&oacute;ng c&aacute; v&agrave;ng</p>\r\n<p>Chất liệu: EVA vinyl</p>', 15, '', 'co', 22),
(23, 'Rèm cửa 03', 600000, '6_3.png', '<p>R&egrave;m nh&agrave; tắm họa tiết bong b&oacute;ng Bubble Fish Interdesign</p>\r\n<p>Xuất xứ: l&agrave; sản phẩm của Interdesign Mỹ</p>\r\n<p>K&iacute;ch thước: 1.83m x 1.83m</p>\r\n<p>M&agrave;u sắc: Trắng, họa tiết: bong b&oacute;ng c&aacute; v&agrave;ng</p>\r\n<p>Chất liệu: EVA vinyl</p>', 15, '', 'co', 23),
(24, 'Rèm cửa 04', 777000, '6_4.png', '<p>R&egrave;m nh&agrave; tắm họa tiết bong b&oacute;ng Bubble Fish Interdesign</p>\r\n<p>Xuất xứ: l&agrave; sản phẩm của Interdesign Mỹ</p>\r\n<p>K&iacute;ch thước: 1.83m x 1.83m</p>\r\n<p>M&agrave;u sắc: Trắng, họa tiết: bong b&oacute;ng c&aacute; v&agrave;ng</p>\r\n<p>Chất liệu: EVA vinyl</p>', 15, '', 'co', 24),
(25, 'Sopha cafe', 2300000, '7_1.png', '<p>- Chất liệu nỉ ấm &aacute;p kết hợp h&agrave;i h&ograve;a c&ugrave;ng m&agrave;u sắc</p>\r\n<p>- Kiểu d&aacute;ng thiết kế đặc biệt với phần tựa lưng thấp v&agrave; c&oacute; đệm m&uacute;t d&agrave;y nhưng lại kh&ocirc;ng tạo cảm gi&aacute;c th&ocirc; cho to&agrave;n bộ bộ sofa.</p>\r\n<p>- Gam m&agrave;u lạnh của bộ ghế sofa kết hợp c&ugrave;ng m&agrave;u gối tạo sự h&ograve;a trộn h&agrave;i h&ograve;a giữa m&agrave;u sắc</p>\r\n<p>- Bộ sofa n&agrave;y d&agrave;nh cho những căn ph&ograve;ng c&oacute; kh&ocirc;ng gian đủ rộng để b&agrave;i tr&iacute;.</p>\r\n<p>- Cấu tạo: Vật liệu bọc nỉ nhập khẩu Indo</p>', 16, '', 'co', 25),
(26, 'Ghế sopha đơn êm ái', 2600000, '7_2.png', '<p>Với sự kết hợp h&agrave;i ho&agrave; về m&agrave;u sắc, mẫu m&atilde; v&agrave; kh&ocirc;ng gian kiến tr&uacute;c của ng&ocirc;i nh&agrave;.</p>\r\n<p>Những t&ocirc;ng m&agrave;u hiện đại, thiết kế trẻ trung theo từng phong c&aacute;ch.</p>\r\n<p>C&ocirc;ng ty sản xuất sofa đơn đẹp rẻ tại 356 Bạch Mai sẽ mang đến cho bạn những bộ ghế sofa gi&aacute; rẻ hợp với kh&ocirc;ng gian sống.</p>\r\n<p>Với nhiều mẫu m&atilde; thiết kế đa dạng theo phong c&aacute;ch kh&aacute;c nhau. Những sản phẩm sofa gi&aacute; rẻ tại đ&acirc;y tự h&agrave;o mang đến cho bạn kh&ocirc;ng gian sống ho&agrave;n hảo nhất.</p>\r\n<p>Khung gỗ : tự nhi&ecirc;n cao cấp</p>', 16, '', 'co', 26),
(27, 'Sofa đơn SFD18', 5100000, '7_3.png', '<p>Chất liệu: khung gỗ tự nhi&ecirc;n đ&atilde; qua xử l&yacute; chống cong v&ecirc;nh, mối mọt.</p>\r\n<p>Đệm m&uacute;t cứng hoặc mềm (t&ugrave;y chọn).</p>\r\n<p>Ch&acirc;n gỗ tr&ograve;n cao 3cm.</p>\r\n<p>Nỉ Indo nhập khẩu.</p>\r\n<p>Ghế c&oacute; 2 đệm, mỗi đệm d&agrave;y 12 cm</p>', 16, '', 'co', 27),
(28, 'Ghế sopha kem', 2600000, '7_4.png', '<p>Với sự kết hợp h&agrave;i ho&agrave; về m&agrave;u sắc, mẫu m&atilde; v&agrave; kh&ocirc;ng gian kiến tr&uacute;c của ng&ocirc;i nh&agrave;.</p>\r\n<p>Những t&ocirc;ng m&agrave;u hiện đại, thiết kế trẻ trung theo từng phong c&aacute;ch.</p>\r\n<p>C&ocirc;ng ty sản xuất sofa đơn đẹp rẻ tại 356 Bạch Mai sẽ mang đến cho bạn những bộ ghế sofa gi&aacute; rẻ hợp với kh&ocirc;ng gian sống.</p>\r\n<p>Với nhiều mẫu m&atilde; thiết kế đa dạng theo phong c&aacute;ch kh&aacute;c nhau. Những sản phẩm sofa gi&aacute; rẻ tại đ&acirc;y tự h&agrave;o mang đến cho bạn kh&ocirc;ng gian sống ho&agrave;n hảo nhất.</p>\r\n<p>Khung gỗ : tự nhi&ecirc;n cao cấp</p>', 16, '', 'co', 28),
(29, 'Tủ áo B1238', 5100000, '8_1.png', '<p>Thiết kế tinh tế v&agrave; hiện đại ph&ugrave; hợp với phong c&aacute;ch Việt Nam.</p>\r\n<p>Tủ chia th&agrave;nh 2 ngăn đứng với 3 c&aacute;nh cửa mở đ&oacute;ng tiện dụng:</p>\r\n<p>Ngăn đứng lớn để treo &aacute;o, ph&iacute;a dưới trong ngăn treo &aacute;o c&oacute; trang bị 2 ngăn k&eacute;o nhỏ v&agrave; 3 ngăn mở c&oacute; thể chứa c&aacute;c vật dụng cần thiết.</p>\r\n<p>Ngăn đứng nhỏ hơn để treo quần, ph&iacute;a dưới trong ngăn treo quần c&oacute; trang bị 1 ngăn mở để chứa c&aacute;c vật dụng cần thiết.</p>', 17, 'co', 'co', 29),
(30, 'Tủ áo B1241K', 5400000, '8_2.png', '<p>Thiết kế tinh tế v&agrave; hiện đại ph&ugrave; hợp với phong c&aacute;ch Việt Nam.</p>\r\n<p>Tủ chia th&agrave;nh 2 ngăn đứng với 3 c&aacute;nh cửa mở đ&oacute;ng tiện dụng:</p>\r\n<p>Ngăn đứng lớn để treo &aacute;o, ph&iacute;a dưới trong ngăn treo &aacute;o c&oacute; trang bị 2 ngăn k&eacute;o nhỏ v&agrave; 3 ngăn mở c&oacute; thể chứa c&aacute;c vật dụng cần thiết.</p>\r\n<p>Ngăn đứng nhỏ hơn để treo quần, ph&iacute;a dưới trong ngăn treo quần c&oacute; trang bị 1 ngăn mở để chứa c&aacute;c vật dụng cần thiết.</p>', 17, 'co', 'co', 30),
(31, 'Tủ Áo Bellasofa B1239', 3790000, '8_3.png', '<p>Thiết kế tinh tế và hiện đại phù hợp với phong cách Việt Nam.</p>\r\n<p>Tủ chia thành 2 ngăn đứng với 3 cánh cửa mở đóng tiện dụng:</p>\r\n<p>Ngăn đứng lớn để treo áo, phía dưới trong ngăn treo áo có trang bị 2 ngăn kéo nhỏ và 3 ngăn mở có thể chứa các vật dụng cần thiết.</p>\r\n<p>Ngăn đứng nhỏ hơn để treo quần, phía dưới trong ngăn treo quần có trang bị 1 ngăn mở để chứa các vật dụng cần thiết.</p>', 17, '', 'co', 31),
(32, 'Tủ quần áo BIG ONE VIETNAM WVR-1855L', 4000000, '8_4.png', '<p>Thiết kế tinh tế và hiện đại phù hợp với phong cách Việt Nam.</p>\r\n<p>Tủ chia thành 2 ngăn đứng với 3 cánh cửa mở đóng tiện dụng:</p>\r\n<p>Ngăn đứng lớn để treo áo, phía dưới trong ngăn treo áo có trang bị 2 ngăn kéo nhỏ và 3 ngăn mở có thể chứa các vật dụng cần thiết.</p>\r\n<p>Ngăn đứng nhỏ hơn để treo quần, phía dưới trong ngăn treo quần có trang bị 1 ngăn mở để chứa các vật dụng cần thiết.</p>', 17, '', 'co', 32);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slideshow`
--

CREATE TABLE `slideshow` (
  `id` int(11) NOT NULL,
  `hinh` varchar(256) NOT NULL,
  `lien_ket` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `slideshow`
--

INSERT INTO `slideshow` (`id`, `hinh`, `lien_ket`) VALUES
(1, 'a_1.png', '#'),
(2, 'a_2.png', '#'),
(3, 'a_3.png', '#'),
(4, 'a_4.png', '#');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thong_tin_quan_tri`
--

CREATE TABLE `thong_tin_quan_tri` (
  `id` int(11) NOT NULL,
  `ky_danh` varchar(256) NOT NULL,
  `mat_khau` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thong_tin_quan_tri`
--

INSERT INTO `thong_tin_quan_tri` (`id`, `ky_danh`, `mat_khau`) VALUES
(1, 'admin', 'c3284d0f94606de1fd2af172aba15bf3');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `footer`
--
ALTER TABLE `footer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nguoi_dung_id` (`nguoi_dung_id`);

--
-- Chỉ mục cho bảng `menu_doc`
--
ALTER TABLE `menu_doc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `menu_ngang`
--
ALTER TABLE `menu_ngang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nguoi_dung`
--
ALTER TABLE `nguoi_dung`
  ADD PRIMARY KEY (`nguoi_dung_id`);

--
-- Chỉ mục cho bảng `quang_cao`
--
ALTER TABLE `quang_cao`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `slideshow`
--
ALTER TABLE `slideshow`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `thong_tin_quan_tri`
--
ALTER TABLE `thong_tin_quan_tri`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `footer`
--
ALTER TABLE `footer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `hoa_don`
--
ALTER TABLE `hoa_don`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT cho bảng `menu_doc`
--
ALTER TABLE `menu_doc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `menu_ngang`
--
ALTER TABLE `menu_ngang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `nguoi_dung`
--
ALTER TABLE `nguoi_dung`
  MODIFY `nguoi_dung_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT cho bảng `quang_cao`
--
ALTER TABLE `quang_cao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT cho bảng `slideshow`
--
ALTER TABLE `slideshow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `thong_tin_quan_tri`
--
ALTER TABLE `thong_tin_quan_tri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD CONSTRAINT `hoa_don_ibfk_1` FOREIGN KEY (`nguoi_dung_id`) REFERENCES `nguoi_dung` (`nguoi_dung_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
