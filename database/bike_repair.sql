-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2020 at 02:28 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bike_repair`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_lg`
--

CREATE TABLE `admin_lg` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `First_Name` varchar(75) COLLATE utf8_unicode_ci NOT NULL,
  `Last_Name` varchar(75) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin_lg`
--

INSERT INTO `admin_lg` (`id`, `username`, `password`, `First_Name`, `Last_Name`, `status`) VALUES
(1, 'icecooler112', '0953103854', 'Bunditpong', 'Tapinta', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `bike_user`
--

CREATE TABLE `bike_user` (
  `bu_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bike_id` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `year_bike` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `brand` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dealer`
--

CREATE TABLE `dealer` (
  `dl_id` int(11) NOT NULL,
  `dl_nameshop` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dl_address` text COLLATE utf8_unicode_ci NOT NULL,
  `dl_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dl_phone` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dealer`
--

INSERT INTO `dealer` (`dl_id`, `dl_nameshop`, `dl_address`, `dl_email`, `dl_phone`) VALUES
(1, 'Honda Bigwing', '22/2 อำเภอเมือง จังหวัดเชียงใหม่', 'Honda@hotmail.com', '1234567890'),
(2, 'Kawasaki', '42/1 อำเภอเมือง จังหวัดเชียงใหม่', 'Kawasaki@hotmail.com', '1234566789');

-- --------------------------------------------------------

--
-- Table structure for table `detail_repair`
--

CREATE TABLE `detail_repair` (
  `dt_id` int(11) NOT NULL,
  `h_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `numproduct` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `h_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bike_id` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `datetime` datetime NOT NULL,
  `h_price` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `p_id` int(11) NOT NULL,
  `pname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `price_income` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `numproduct` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `detail` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dl_id` int(11) NOT NULL,
  `dl_insurance` text COLLATE utf8_unicode_ci NOT NULL,
  `dl_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `pname`, `price_income`, `price`, `numproduct`, `detail`, `image`, `dl_id`, `dl_insurance`, `dl_date`) VALUES
(22, 'ลูกสูบฟอร์จ (forged) สลัก 13 มิล ขนาด 53.00 - 59.00 มิล', '', '1,500', '20', 'รุ่นรถ : WAVE110i , WAVE125i , DREAM SUPER CUB , MSX , MSX SF , SONIC หรือรถที่ใช้ก้านสูบสลัก 13 มิล ทุกรุ่น', '1580447708.jpg', 1, '1 ปี', '2020-02-03'),
(23, 'ก้านสูบไฮสปีด WAVE125', '', '500', '10', 'รุ่นรถ : WAVE125\r\nใช้ทดแทนก้านสูบเดิมติดรถ', '1580447865.jpg', 2, '', '0000-00-00'),
(24, 'วาล์วแต่งไฮสปีด WAVE125 , WAVE125i เก่า', '', '500', '10', 'รุ่นรถ : WAVE125 , WAVE125i เก่า1.วาล์วแต่งไฮสปีดแข็งแรงทนทาน2.รองรับรอบเครื่องสูงได้3.ผลิตจากวัตถดิบอย่างดีไม่ขาดง่ายเหมือนวาล์วทั่วไป4.ผ่านการทดสอบในสนามแข่งขันแล้ว5.ใช้เพื่อทดแทนชิ้นส่วนเดิมที่สึกหรอ', '1580448035.jpg', 2, '', '0000-00-00'),
(25, 'เสื้อสูบแต่งไฮสปีด WAVE125i เก่า , WAVE125 (54 mm)', '', '1,299', '10', 'รุ่นรถ : WAVE12554 mm. Liner outside 58.50 mm.56 mm. Liner outside 59.00 mm.1. เสื้อสูบแต่งไฮสปีด สามารถใส่กับลูกสูบแต่งหรือลูกสูบขนาดใหญ่กว่าของเดิมได้2. ใช้สำหรับการแข่งขันในสนามแข่งได้3. เหมาะสำหรับรถที่ต้องการเพิ่มซีซี', '1580449194.jpg', 1, '', '0000-00-00'),
(28, 'คาร์บูเอ็นโปร (PE)', '', '800', '6', '1.จูนง่าย และนิ่ง\r\n2.ปรับแต่งชุดทำงานภายในใหม่ทั้งหมด\r\n3.ปรับแต่งให้ใช้ได้กับรถทั้ง 2 และ 4 จังหวะ\r\n4.อัตราการตอบสนองที่ไวกว่าคาร์บูทั่วไป', '1580450585.jpg', 1, '', '0000-00-00'),
(29, 'คาร์บูเรเตอร์เคเหลี่ยม (PWK)', '', '400', '8', 'รุ่นรถ : รถที่ใช้คาร์บูเรเตอร์ทุกรุ่น\r\n1.จูนง่าย และนิ่ง\r\n2.ปรับแต่งชุดทำงานภายในใหม่ทั้งหมด\r\n3.ปรับแต่งให้ใช้ได้กับรถทั้ง 2 และ 4 จังหวะ\r\n4.อัตราการตอบสนองที่ไวกว่าคาร์บูทั่วไป', '1580455309.jpg', 1, '', '0000-00-00'),
(30, 'คาร์บูเรเตอร์เหลี่ยมตัวใหญ่ (BIG PWK)', '', '4,500', '6', 'รุ่นรถ : รถที่ใช้คาร์บูเรเตอร์ทุกรุ่น\r\n1.จูนง่าย และนิ่ง\r\n2.ปรับแต่งชุดทำงานภายในใหม่ทั้งหมด\r\n3.ปรับแต่งให้ใช้ได้กับรถทั้ง 2 และ 4 จังหวะ\r\n4.อัตราการตอบสนองที่ไวกว่าคาร์บูทั่วไป', '1580455414.jpg', 1, '', '0000-00-00'),
(31, 'นมหนูน้ำมันเอ็นโปร (PE)', '', '70', '30', 'รุ่นรถ : รถที่ใช้คาร์บูเรเตอร์เอ็นโปร\r\n1.ผลิตจากวัตถุดิบอย่างดี\r\n2.มีขนาดมาตราฐาน', '1580455562.jpg', 1, '', '0000-00-00'),
(32, 'นมหนูน้ำมันเคเหลี่ยม (PWK)', '', '70', '20', 'รุ่นรถ : รถที่ใช้คาร์บูเรเตอร์เคเหลี่ยม\r\n1.ผลิตจากวัตถุดิบอย่างดี\r\n2.มีขนาดมาตราฐาน', '1580455977.jpg', 1, '', '0000-00-00'),
(33, 'นมหนูอากาศ คุณภาพดี', '', '70', '20', 'รุ่นรถ : รถที่ใช้คาร์บูเรเตอร์เอ็นโปรและเคเหลี่ยมเท่านั้น\r\n1.ผลิตจากวัตถุดิบอย่างดี\r\n2.มีขนาดมาตราฐาน', '1580456056.jpg', 1, '', '0000-00-00'),
(34, 'ชุดแผ่นคลัชแต่ง WAVE125', '', '450', '25', 'รุ่นรถ : WAVE125\r\n1. ชุดคลัชเนื้อพิเศษ จับตัวได้ดีกว่าแผ่นคลัชแบบทั่วไป ไม่จำเป็นต้องใช้สปริงคลัชแต่ง และแนะนำให้ใส่กับสปริงเดิมติดรถ', '1580456147.jpg', 1, '', '0000-00-00'),
(35, 'กล่องไฟแต่ง 2 กราฟ WAVE125S', '', '1,500', '25', 'รุ่นรถ : WAVE125S1.ตัวกล่องไฟแต่งมี 2 กราฟให้เลือก2.ต่อแทนกล่องเดิมได้ทันที ไม่ต้องแปลงสายใดๆ', '1580457156.jpg', 1, '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL,
  `staff_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `staff_address` text COLLATE utf8_unicode_ci NOT NULL,
  `staff_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `staff_phone` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `staff_name`, `staff_address`, `staff_email`, `staff_phone`) VALUES
(3, 'สมปอง มองทำไม', '11/1 ตำบลหนึ่ง อำเภอหนึ่ง จังหวัดหนึ่ง', 'leonado_1123@hotmail.com', '1234567889');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idcard` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(75) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `fullname`, `idcard`, `phone`, `email`) VALUES
(31, 'Bunditpong Tapinta', '1580300087300', '2147483647', 'icecooler_112@hotmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_lg`
--
ALTER TABLE `admin_lg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bike_user`
--
ALTER TABLE `bike_user`
  ADD PRIMARY KEY (`bu_id`);

--
-- Indexes for table `dealer`
--
ALTER TABLE `dealer`
  ADD PRIMARY KEY (`dl_id`);

--
-- Indexes for table `detail_repair`
--
ALTER TABLE `detail_repair`
  ADD PRIMARY KEY (`dt_id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`h_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_lg`
--
ALTER TABLE `admin_lg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bike_user`
--
ALTER TABLE `bike_user`
  MODIFY `bu_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dealer`
--
ALTER TABLE `dealer`
  MODIFY `dl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `detail_repair`
--
ALTER TABLE `detail_repair`
  MODIFY `dt_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `h_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
