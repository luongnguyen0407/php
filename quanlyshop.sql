-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2022 at 01:15 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quanlyshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `maCT` int(11) NOT NULL,
  `maHoaDon` int(11) NOT NULL,
  `soLuong` int(20) NOT NULL,
  `giaBan` int(20) NOT NULL,
  `maSP` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chitiethoadon`
--

INSERT INTO `chitiethoadon` (`maCT`, `maHoaDon`, `soLuong`, `giaBan`, `maSP`) VALUES
(29, 20, 3, 7500000, 4),
(30, 20, 1, 9349332, 9),
(31, 20, 1, 10490000, 11);

-- --------------------------------------------------------

--
-- Table structure for table `chitietkh`
--

CREATE TABLE `chitietkh` (
  `maKH` int(20) NOT NULL,
  `sdt` varchar(15) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `tenKH` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `diaChi` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

CREATE TABLE `danhmuc` (
  `maDanhMuc` varchar(11) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `tenDanhMuc` varchar(30) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `mieuTa` varchar(100) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`maDanhMuc`, `tenDanhMuc`, `mieuTa`) VALUES
('DT', 'Điện Thoại', 'Điện thoại di động'),
('LT', 'Laptop', 'macbook');

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `maHoaDon` int(11) NOT NULL,
  `maKhachHang` int(11) NOT NULL,
  `soDT` varchar(20) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `diaChi` varchar(200) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `tongTien` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `ngayXuat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`maHoaDon`, `maKhachHang`, `soDT`, `diaChi`, `tongTien`, `ngayXuat`) VALUES
(20, 77, '04836376', 'hadsgas', '42339332', '2022-08-08');

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `idKH` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `userName` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `chucVu` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`idKH`, `email`, `password`, `userName`, `chucVu`) VALUES
(77, 'lolwukonglee@gmail.com', '$2y$10$NgGHUh6xWLEMCBDrZ63ZWez7v6zVqU0wn4GVTNlXSFT4CbKF/7DnK', 'Lương', 0),
(78, 'long@gmail.com', '$2y$10$EPcNSLBgZEJ1WcdQZUa1feiSrn/tdaQqWIoUX8UMbOWvdrxuJWTiK', 'long', 0),
(79, 'luong@gmail.com', '$2y$10$rWGzk8gCLqKIcPv2kEzZLuDyiSjv.YbZFR2gjzyT6sF0QHZ/DVVBS', 'Hùng ', 0),
(82, 'hung@gmail.com', '$2y$10$MgzjBSoccomnRiIoufRBUuWL.28lHhi.RZlYuMqSYvn8pAYKOlU5u', 'hùng', 0),
(83, 'admin@gmail.com', '$2y$10$CiAR4feINlIJBwQAaYXHB.xuoVYUF3RocwqNs1xYtjaI9V2UjWZAW', 'Admin', 1),
(84, 'luongtureng@gmail.com', '$2y$10$4RCCq7Kd8CWhdyu7GxHnJOJNiPu.cXCsloJIR4Vr0QYbjpjSOFwjy', 'hung', 0),
(85, 'mothai@gmail.com', '$2y$10$k/FV4JHR5aWbI6jeJA7VAuWHmeacg.VMLpaJohkg06banbO.vBikm', 'luong', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `maSanPham` int(11) NOT NULL,
  `tenSanPham` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `maDanhMuc` varchar(30) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `moTa` varchar(1000) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `giaSanPham` int(11) NOT NULL,
  `srcImg` varchar(200) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`maSanPham`, `tenSanPham`, `maDanhMuc`, `moTa`, `giaSanPham`, `srcImg`) VALUES
(3, 'Iphone 13 pro max', 'DT', '	\r\nĐiện thoại iPhone 13 Pro Max 128 GB - siêu phẩm được mong chờ nhất ở nửa cuối năm 2021 đến từ Apple. Máy có thiết kế không mấy đột phá khi so với người tiền nhiệm, bên trong đây vẫn là một sản phẩm có màn hình siêu đẹp, tần số quét được nâng cấp lên 120 Hz mượt mà, cảm biến camera có kích thước lớn hơn, cùng hiệu năng mạnh mẽ với sức mạnh đến từ Apple A15 Bionic, sẵn sàng cùng bạn chinh phục mọi thử thách.', 12000000, 'f2e9b070951412dea23d8711a7dd899e.jpg'),
(4, 'Iphone 11 pro max', 'DT', 'iPhone 11 Pro Max 128 GB một siêu phẩm smartphone đến từ Apple. Máy có một hiệu năng hoàn toàn mạnh mẽ đáp ứng tốt nhiều nhu cầu đến từ người dùng và mang trong mình một thiết kế đầy vuông vức, sang trọng.', 7500000, 'dc1fda92dcb58371393ce380f2ceebb2.jpg'),
(6, 'Iphone 11 pro', 'DT', 'Theo chu kỳ cứ mỗi 3 năm thì iPhone lại thay đổi thiết kế và 2020 là năm đánh dấu cột mốc quan trong này, vì thế rất có thể đây là thời điểm các mẫu iPhone 12 sẽ có một sự thay đổi mạnh mẽ về thiết kế.\r\n\r\niPhone 11 Pro  sở hữu diện mạo mới mới với khung viền được vát thẳng và mạnh mẽ như trên iPad Pro 2020, chấm dứt hơn 6 năm với kiểu thiết kế bo cong trên iPhone 6 được ra mắt lần đầu tiên vào năm 2014.', 4300523, '423a4154cd9ee6d6b0d26cfa7f8321c0.jpg'),
(9, 'Iphone XS', 'DT', 'Theo chu kỳ cứ mỗi 3 năm thì iPhone lại thay đổi thiết kế và 2020 là năm đánh dấu cột mốc quan trong này, vì thế rất có thể đây là thời điểm các mẫu XS sẽ có một sự thay đổi mạnh mẽ về thiết kế.\r\n\r\niPhone XS sở hữu diện mạo mới mới với khung viền được vát thẳng và mạnh mẽ như trên iPad Pro 2020, chấm dứt hơn 6 năm với kiểu thiết kế bo cong trên iPhone 6 được ra mắt lần đầu tiên vào năm 2014.', 9349332, 'e3ef185238aefdaf70383cca11fc3ac5.jpg'),
(10, 'Samsung Galaxy M53', 'DT', 'Có lẽ 2022 là một năm bùng nổ của nhà Samsung, khi hãng liên tục trình làng nhiều sản phẩm có cấu hình mạnh mẽ cùng một mức giá bán hợp lý trên thị trường smartphone tầm trung và giá rẻ, tiêu biểu trong số đó có Samsung Galaxy M53 được xem là cái tên được cộng đồng người dùng tích cực quan tâm và săn đón kể cả khi chưa ra mắt.', 12490000, 'a3a7d1cd3d318b6f6ed42f365d86aa3e.jpg'),
(11, 'OPPO Reno7 Z 5G ', 'DT', 'OPPO đã trình làng mẫu Reno7 Z 5G với thiết kế OPPO Glow độc quyền, camera mang hiệu ứng như máy DSLR chuyên nghiệp cùng viền sáng kép, máy có một cấu hình mạnh mẽ và đạt chứng nhận xếp hạng A về độ mượt.', 10490000, '9b8e9be58be8ec829e90714b289d7fd7.jpg'),
(12, 'POCO C40', 'DT', 'Tháng 06/2022 điện thoại POCO C40 đã chính thức được cho ra mắt tại thị trường Việt Nam, sở hữu cho một mình màn hình kích thước lớn, viên pin dung lượng khủng và một con chip JR510 mới lạ trên thị trường công nghệ hiện nay.', 3190000, '929bde553ac07c52fe891a65b7829629.jpg'),
(13, 'Vivo Y01 ', 'DT', 'Vivo Y01 được trình làng với một bộ thông số kỹ thuật ấn tượng trong tầm giá, sở hữu những ưu điểm như: Màn hình kích thước lớn, hiệu năng ổn định và thời gian sử dụng lâu dài, được xem là thiết bị phù hợp với những bạn học sinh - sinh viên cho các công việc học tập hay giải trí nhẹ nhàng sau những phút giây căng thẳng.', 2990000, 'b1c7da14a44dcd43de0c94121ea95084.jpg'),
(14, 'Realme C21-Y 4GB', 'DT', 'Realme C21-Y 4GB với thiết kế đẹp, tinh tế dành cho người dùng phổ thông đang tìm kiếm một chiếc điện thoại có cấu hình tốt, đầy đủ tính năng hấp dẫn và quan trọng nhất là Realme đã trang bị viên pin khủng cho chiếc máy này đáp ứng tốt một ngày dài sử dụng.', 3690000, '6397dd6744d133d8587b5e133792f5d2.jpg'),
(15, 'Samsung Galaxy A33 5G 6GB', 'DT', 'Samsung Galaxy A33 5G 6GB ra mắt vào ngày 17/03, được xem là bản cập nhật khá lớn so với thế hệ tiền nhiệm Galaxy A32 về thiết kế đến thông số kỹ thuật bên trong, nhằm mang đến vẻ ngoài đẹp mắt cũng như cạnh tranh trực tiếp ở phần hiệu năng đối với các đối thủ cùng phân khúc giá.', 7490000, '5dc6b597f35fbe3466356c746329385e.jpg'),
(16, 'Samsung Galaxy S22 Ultra 5G 128GB ', 'DT', 'Galaxy S22 Ultra 5G chiếc smartphone cao cấp nhất trong bộ 3 Galaxy S22 series mà Samsung đã cho ra mắt. Tích hợp bút S Pen hoàn hảo trong thân máy, trang bị vi xử lý mạnh mẽ cho các tác vụ sử dụng vô cùng mượt mà và nổi bật hơn với cụm camera không viền độc đáo mang đậm dấu ấn riêng.', 27990000, '2526369962bcd2e2a475fada29734d38.jpeg'),
(17, 'Samsung-Galaxy-A13', 'DT', 'Điện thoại Redmi được mệnh danh là dòng sản phẩm quốc dân ngon - bổ  - rẻ của Xiaomi và Redmi Note 11 (4GB/64GB) cũng không phải ngoại lệ, máy sở hữu một hiệu năng ổn định, màn hình 90 Hz mượt mà, cụm camera AI đến 50 MP cùng một mức giá vô cùng tốt.', 4390000, 'f548f64ed37b204d4aff5a9ea3ec5499.jpg'),
(23, 'Laptop Apple MacBook Air M1 2020', 'LT', 'Laptop Apple Air M1 2020 có thiết kế đẹp, sang trọng với CPU M1 độc quyền từ Apple cho hiệu năng đồ họa cao, màn hình Retina hiển thị siêu nét cùng với hệ thống bảo mật tối ưu.', 30990000, 'fe212560e2f62ac4b227dccecb2b2123.jpg'),
(24, 'Laptop Apple MacBook Pro M2 2022', 'LT', 'Thiết kế thanh lịch, sang trọng cùng hiệu năng vượt trội đến từ vi xử lý tân tiến Apple M2 có trong Macbook Pro M2, hứa hẹn sẽ mang lại nhiều giá trị cho người dùng sáng tạo, phục vụ tốt nhu cầu thiết kế đồ hoạ nâng cao.', 33490000, 'ee6236a3167aa4c12887fb1876ec6ff9.jpg'),
(25, 'Laptop Apple MacBook Pro 16 M1 Max 2021', 'LT', 'Thật ấn tượng với Apple MacBook Pro 16 M1 Max 2021 mang trên mình \"bộ áo mới\" độc đáo, cuốn hút mọi ánh nhìn cùng màn hình tai thỏ lần đầu tiên xuất hiện ở dòng Mac và ẩn bên trong là bộ cấu hình mạnh mẽ tuyệt vời đến từ con chip M1 Max tân tiến.', 88190000, '69bc55cb4318aa228bff220614765a38.jpg'),
(26, 'Laptop MacBook Pro 14 M1 Max 2021', 'LT', 'Khoác lên mình vẻ ngoài mới lạ so với các dòng Mac trước đó, thiết kế màn hình tai thỏ ấn tượng, bắt mắt cùng bộ hiệu năng đỉnh cao M1 Max mạnh mẽ, MacBook Pro 14 inch M1 Max 2021 xứng tầm là chiếc laptop cao cấp chuyên dụng dành cho dân kỹ thuật - đồ họa, sáng tạo nội dung.', 74100000, 'cd46ffc57aeae03b35de71947916cbad.jpg'),
(27, 'Laptop MacBook Pro 14 M1 Pro 2021', 'LT', 'Khoác lên mình vẻ ngoài mới lạ so với các dòng Mac trước đó, thiết kế màn hình tai thỏ ấn tượng, bắt mắt cùng bộ hiệu năng đỉnh cao M1 Pro mạnh mẽ, MacBook Pro 14 inch M1 Pro 2021 xứng tầm là chiếc laptop cao cấp chuyên dụng dành cho dân kỹ thuật - đồ họa, sáng tạo nội dung.', 69190000, 'bb302c2dad27b8714ba64c8e3a1cf8b5.jpg'),
(28, 'Laptop Apple MacBook Pro 16 M1 Pro', 'LT', 'Thể hiện đẳng cấp sang chảnh cùng chiếc MacBook Pro 16 M1 Pro 2021 cực kì sang trọng, cùng hiệu năng mạnh mẽ được nâng cấp với chip M1 Pro cho hiệu suất đột phá và thời lượng pin ấn tượng, đem đến cho bạn trải nghiệm tuyệt vời nhất.', 62190000, 'd45756000bd59d5a579da1601f68507c.jpg'),
(29, 'Laptop MacBook Pro 14 M1 Pro 2021', 'LT', 'Sự đẳng cấp không chỉ ở thiết kế thời thượng, sang trọng mà còn sở hữu sức mạnh siêu năng với con chip Apple M1 Pro, phiên bản nâng cấp ấn tượng đến từ nhà Apple, mang đến cho bạn trải nghiệm làm việc chuyên nghiệp nhất dù là các tác vụ laptop đồ họa - kỹ thuật chuyên sâu.', 50190000, '78b534ef605c83cecf0301a14cb249b4.jpg'),
(30, 'Laptop Apple MacBook Pro M1 2020', 'LT', 'Macbook Pro M1 2020 được nâng cấp với bộ vi xử lý mới cực kỳ mạnh mẽ, chiếc laptop này sẽ phục vụ tốt cho công việc của bạn, đặc biệt cho lĩnh vực đồ họa, kỹ thuật.', 41490000, 'c7ba00556e763a6419f733239a139f89.jpg'),
(31, 'Laptop Apple MacBook Air M2 2022', 'LT', 'Siêu phẩm MacBook Air M2 được trình làng vào giữa năm 2022 một lần nữa đã khẳng định vị thế của Apple trong phân khúc laptop cao cấp - sang trọng, đánh bật mọi rào cản với con chip Apple M2 đầy mạnh mẽ cùng lối thiết kế lịch lãm, thời thượng đặc trưng cùng thời lượng pin lên đến 18 giờ ấn tượng. ', 32990000, '6c0909bf542778d5b02b3d4f3714a9d7.jpg'),
(32, 'Laptop Apple MacBook Air M1 2020', 'LT', 'Laptop Apple MacBook Air M1 2020 thuộc dòng laptop cao cấp sang trọng có cấu hình mạnh mẽ, chinh phục được các tính năng văn phòng lẫn đồ hoạ mà bạn mong muốn, thời lượng pin dài, thiết kế mỏng nhẹ sẽ đáp ứng tốt các nhu cầu làm việc của bạn.', 24990000, '286b2a11d41b5b23385726c8096fc442.jpg'),
(33, 'Laptop Lenovo Gaming Legion 5 15ITH6', 'LT', 'Phong cách thiết kế độc đáo, trẻ trung cùng hiệu năng mạnh mẽ vượt trội của card màn hình NVIDIA RTX hội tụ trong chiếc laptop Lenovo Gaming Legion 5 15ITH6 i7 (82JK00FNVN) hứa hẹn sẽ cân mọi tựa game đình đám cũng như sẵn sàng hỗ trợ bạn xử lý các tác vụ nặng.', 32990000, '265aecba9cc76ea227458674b900f510.jpg'),
(34, 'Laptop Asus TUF Gaming FX506LHB', 'LT', 'Nếu bạn đang tìm kiếm một chiếc laptop gaming nhưng vẫn sở hữu một mức giá phải chăng thì laptop Asus TUF Gaming FX506LHB i5 (HN188W) sẽ là sự lựa chọn đáng cân nhắc với card đồ họa rời NVIDIA GeForce GTX mạnh mẽ cùng phong cách thiết kế cứng cáp, độc đáo. ', 16490000, 'a575eb719815d4bc8ec77794d43d5574.jpg'),
(35, 'Laptop MSI Modern 14 B11MOU i3', 'LT', 'Laptop MSI Modern 14 B11MOU i3 (1027VN) là phiên bản laptop phổ thông được nhà MSI cho ra mắt với sứ mệnh phục vụ tốt mọi tác vụ thiết yếu cơ bản hằng ngày của người dùng khi sở hữu cấu hình ổn định đến từ con chip Intel Gen 11 cùng ngoại hình trang nhã, thời thượng và mang tính di động cao.', 11610000, 'f17a812bbc2ca8aba8de161319798566.jpg'),
(36, 'Laptop Asus VivoBook Pro 14x OLED', 'DT', 'Nếu bạn đang tìm kiếm một chiếc laptop có thể đáp ứng tối đa mọi nhu cầu từ học tập, văn phòng cơ bản đến thiết kế đồ họa - kỹ thuật chuyên sâu, laptop Asus VivoBook Pro 14x OLED M7400QC R5 (KM013W) sẽ là một sự lựa chọn sáng giá khi sở hữu cấu hình vượt trội cùng phong cách thiết kế đẳng cấp trên từng đường nét máy. ', 27290000, 'a2f202a02e8e5c83b2717196c1467f7c.jpg'),
(37, 'Laptop Asus VivoBook Pro 14x OLED', 'DT', 'Nếu bạn đang tìm kiếm một chiếc laptop có thể đáp ứng tối đa mọi nhu cầu từ học tập, văn phòng cơ bản đến thiết kế đồ họa - kỹ thuật chuyên sâu, laptop Asus VivoBook Pro 14x OLED M7400QC R5 (KM013W) sẽ là một sự lựa chọn sáng giá khi sở hữu cấu hình vượt trội cùng phong cách thiết kế đẳng cấp trên từng đường nét máy. ', 27290000, 'c09e89288d98f7aba10e8d1ae5d1be16.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD PRIMARY KEY (`maCT`),
  ADD KEY `FK-CTHD-HD` (`maHoaDon`),
  ADD KEY `FK-CTHD-SP` (`maSP`);

--
-- Indexes for table `chitietkh`
--
ALTER TABLE `chitietkh`
  ADD KEY `maKH` (`maKH`);

--
-- Indexes for table `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`maDanhMuc`);

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`maHoaDon`),
  ADD KEY `maKhachHang` (`maKhachHang`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`idKH`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`maSanPham`),
  ADD KEY `FK-SP-DM` (`maDanhMuc`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  MODIFY `maCT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `maHoaDon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `idKH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `maSanPham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD CONSTRAINT `FK-CTHD-HD` FOREIGN KEY (`maHoaDon`) REFERENCES `hoadon` (`maHoaDon`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK-CTHD-SP` FOREIGN KEY (`maSP`) REFERENCES `sanpham` (`maSanPham`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `chitietkh`
--
ALTER TABLE `chitietkh`
  ADD CONSTRAINT `chitietkh_ibfk_1` FOREIGN KEY (`maKH`) REFERENCES `khachhang` (`idKH`);

--
-- Constraints for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`maKhachHang`) REFERENCES `khachhang` (`idKH`);

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `FK-SP-DM` FOREIGN KEY (`maDanhMuc`) REFERENCES `danhmuc` (`maDanhMuc`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
