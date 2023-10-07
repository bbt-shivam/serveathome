-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2020 at 06:26 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `serveathome`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `contact` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `image` varchar(200) NOT NULL,
  `address` varchar(300) NOT NULL,
  `pincode` int(6) NOT NULL,
  `city` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL,
  `Country` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `password`, `contact`, `email`, `image`, `address`, `pincode`, `city`, `state`, `Country`) VALUES
(1, 'bbt  shivam', 'bbt', '87654321', '7990361072', 'st050647@gmail.com', 'bbt.jpg', '202, 2nd Floor, Raghuveer textile Mall, aai mata chowk, Parvat patiya', 395010, 'Surat', 'Gujrat', 'India');

-- --------------------------------------------------------

--
-- Table structure for table `bank_dtls`
--

CREATE TABLE `bank_dtls` (
  `bid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `acno` int(20) NOT NULL,
  `acname` varchar(30) NOT NULL,
  `bname` varchar(25) NOT NULL,
  `ifsc_code` varchar(10) NOT NULL,
  `pan_no` varchar(20) NOT NULL,
  `pan_name` varchar(50) NOT NULL,
  `pan_image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bank_dtls`
--

INSERT INTO `bank_dtls` (`bid`, `pid`, `acno`, `acname`, `bname`, `ifsc_code`, `pan_no`, `pan_name`, `pan_image`) VALUES
(10, 25, 2147483647, 'Shivam Tiwari', 'UBI', 'UBINO20134', 'AAAPL1234C', 'Shivam Tiwari', 'AAAPL1234C.jpeg'),
(23, 42, 2147483647, 'Jinal Sheladiya', 'State Bank of India', 'SBINO7896', 'JSAPL1234C', 'Jinal Sheladiya', 'JSAPL1234C.jpeg'),
(24, 43, 2147483647, 'Mayank Sheladiya', 'Bank or Baroda', 'BOBNO45123', 'MKASL1234C', 'Mayank Sheladiya', 'MKASL1234C.jpeg'),
(25, 44, 2147483647, 'Aman Shukla', 'State Bank of India', 'SBINO7111', 'AMANL1234S', 'Aman Shukla', 'AMANL1234S.jpeg'),
(26, 45, 2147483647, 'Dhara Sorathiya', 'Axis Bank', 'AXINO54120', 'DHARP1224C', 'Dhara Sorathiya', 'DHARP1224C.jpeg'),
(27, 46, 2147483647, 'Sunny Shukla', 'State Bank of India', 'SBINO54210', 'SNAPL1234S', 'Sunny Shukla', 'SNAPL1234S.jpeg'),
(28, 47, 2147483647, 'Kishan Tiwari', 'Union Bank Of India', 'UBINO12053', 'KIAPL1874C', 'Kishan Tiwari', 'KIAPL1874C.jpeg'),
(29, 48, 2147483647, 'Nitin Tripathi', 'Union Bank Of India', 'UBINO87541', 'NITIL1234T', 'Nitin Tripathi', 'NITIL1234T.jpeg'),
(30, 49, 2147483647, 'Rajni Virani', 'State Bank of India', 'SBINO7896', 'RAJIL1214C', 'Rajni Virani', 'RAJIL1214C.jpeg'),
(31, 50, 2147483647, 'Rahul Dubey', 'State Bank of India', 'SBINO5214', 'RAHUL1234T', 'Rahul Dubey', 'RAHUL1234T.jpeg'),
(32, 51, 2147483647, 'Arti Kanani', 'State Bank of India', 'SBINO7896', 'ARTPL1234C', 'Arti Kanani', 'ARTPL1234C.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cid` int(11) NOT NULL,
  `cname` varchar(70) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `cimg` varchar(100) DEFAULT NULL,
  `roll` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cid`, `cname`, `parent_id`, `cimg`, `roll`) VALUES
(1, 'Salon at home', 0, 'subcat-salon.jpg', 0),
(2, 'Massage at home', 0, 'subcat-massage.jpg', 0),
(3, 'Appliances- Service & Repair', 0, 'subcat-appliances-.jpg', 0),
(4, 'Cleaning', 0, 'subcat-cleaning.jpg', 0),
(5, 'Electrician, Plumber, Carpenter', 0, 'subcat-electrician,.png', 0),
(9, 'Salon at home for women', 1, 'subcat-salon3.jpg', 1),
(11, 'Men\'s Haircut & Grooming', 1, 'subcat-mens.jpg', 1),
(12, 'Massage for Men', 2, 'subcat-massage.jpeg', 1),
(13, 'Massage for Women', 2, 'subcat-massage1.jpeg', 1),
(14, 'AC Service and Repair', 3, 'subcat-ac.jpeg', 1),
(15, 'Geyser Service and Repair', 3, 'subcat-geyser1.jpg', 1),
(16, 'Washing Machine Service and Repair', 3, 'subcat-washing.jpg', 1),
(17, 'Refrigerator Repair', 3, 'subcat-refrigerator.jpeg', 1),
(18, 'RO or Water Purifier Repair', 3, 'subcat-ro.jpg', 1),
(19, 'Microwave Repair', 3, 'subcat-microwave.jpg', 1),
(20, 'Television Repair & Installation', 3, 'subcat-television.jpg', 1),
(23, 'Full Home Deep Cleaning', 4, 'subcat-full.jpeg', 1),
(24, 'Pest Control', 4, 'subcat-pest.jpg', 1),
(25, 'Car Cleaning', 4, 'subcat-car.jpg', 1),
(26, 'Electricians', 5, 'subcat-electricians.jpeg', 1),
(27, 'Plumbers', 5, 'subcat-plumbers.jpg', 1),
(28, 'Carpenters', 5, 'subcat-carpenters.jpg', 1),
(153, 'Haircut Packages', 11, NULL, NULL),
(154, 'Haircut for men', 11, NULL, NULL),
(155, 'Kids Haircut', 11, NULL, NULL),
(159, 'Stress- Relief', 12, NULL, NULL),
(160, 'Body & Muscle Pain- Relief', 12, NULL, NULL),
(161, 'Detoxify', 12, NULL, NULL),
(162, 'Ayurvedic Healing', 12, NULL, NULL),
(163, 'Add- ons', 12, NULL, NULL),
(164, 'Stress- Relief', 13, NULL, NULL),
(165, 'Body and Muscle Pain-Relief', 13, NULL, NULL),
(166, 'Detoxify', 13, NULL, NULL),
(167, 'Add- ons', 13, NULL, NULL),
(168, 'Roll-On Waxing', 9, NULL, NULL),
(169, 'RICA Waxing', 9, NULL, NULL),
(170, 'Honey Waxing', 9, NULL, NULL),
(171, 'Facial, Clenup and Bleach', 9, NULL, NULL),
(172, 'Pedicure and Manicure', 9, NULL, NULL),
(173, 'Hair Care', 9, NULL, NULL),
(174, 'Threading', 9, NULL, NULL),
(175, 'Shave, beard and moustache', 11, NULL, NULL),
(176, 'Head and Soulder Massage', 11, NULL, NULL),
(177, 'Facials', 11, NULL, NULL),
(178, 'Manicure and Pedicure', 11, NULL, NULL),
(179, 'Hair color', 11, NULL, NULL),
(180, 'AC Servicing', 14, NULL, NULL),
(181, 'AC not cooling / Repair', 14, NULL, NULL),
(182, 'AC Installation / Uninstallation', 14, NULL, NULL),
(193, 'Bathroom Deep Cleaning', 23, NULL, NULL),
(194, 'Sofa Cleaning', 23, NULL, NULL),
(195, 'Carpet Cleaning', 23, NULL, NULL),
(196, 'Kitchen Deep Cleaning', 23, NULL, NULL),
(197, 'Small / Hatchback', 25, NULL, NULL),
(198, 'Sedan', 25, NULL, NULL),
(199, 'Premium Sedan', 28, NULL, NULL),
(200, 'Sub-Compact SUV', 25, NULL, NULL),
(201, 'SUV/MUV', 25, NULL, NULL),
(202, 'Luxury', 25, NULL, NULL),
(203, '1 BHK', 24, NULL, NULL),
(204, '2 BHK', 24, NULL, NULL),
(205, '3 BHK', 24, NULL, NULL),
(206, '4 BHK', 24, NULL, NULL),
(207, '5 BHK', 24, NULL, NULL),
(208, 'Villa', 24, NULL, NULL),
(209, 'Servicing', 15, NULL, NULL),
(210, 'Repair', 15, NULL, NULL),
(211, 'Installation / Fitting', 15, NULL, NULL),
(212, 'Repair / Service / other issue', 19, NULL, NULL),
(213, 'Service / Repair', 17, NULL, NULL),
(214, 'Compressor/Cooling issue', 17, NULL, NULL),
(215, 'Gas Filling', 17, NULL, NULL),
(216, 'Other issue', 17, NULL, NULL),
(217, 'Repair / Service', 16, NULL, NULL),
(218, 'Installation / Uninstallation', 16, NULL, NULL),
(219, 'Water Leakage', 16, NULL, NULL),
(220, 'Other issue', 16, NULL, NULL),
(221, 'Repair', 18, NULL, NULL),
(223, 'Installation / Fitting', 18, NULL, NULL),
(224, 'Servicing / Filter change', 18, NULL, NULL),
(225, 'Other Issue', 18, NULL, NULL),
(226, 'Switch and Socket', 26, NULL, NULL),
(227, 'Fan', 26, NULL, NULL),
(228, 'Light', 26, NULL, NULL),
(229, 'Chandelier', 26, NULL, NULL),
(230, 'MCB and Fuse', 26, NULL, NULL),
(231, 'Inverter & stabilizer', 26, NULL, NULL),
(232, 'Appliance', 26, NULL, NULL),
(233, 'wiring', 26, NULL, NULL),
(234, 'Door Bell', 26, NULL, NULL),
(235, 'Drill and Hang', 26, NULL, NULL),
(236, 'Room Heater', 26, NULL, NULL),
(237, 'Other', 26, NULL, NULL),
(238, 'Basin & Sink', 27, NULL, NULL),
(239, 'Bath Fitting', 27, NULL, NULL),
(240, 'Blockage', 27, NULL, NULL),
(241, 'Tap & Mixer', 27, NULL, NULL),
(242, 'Toilet', 27, NULL, NULL),
(243, 'Water Tank', 27, NULL, NULL),
(244, 'Motor', 27, NULL, NULL),
(245, 'Minor Installation', 27, NULL, NULL),
(246, 'other', 27, NULL, NULL),
(247, 'Balcony', 28, NULL, NULL),
(248, 'Bed', 28, NULL, NULL),
(249, 'Cupboard & Drawer', 28, NULL, NULL),
(250, 'Door', 28, NULL, NULL),
(251, 'Drill & Hang', 28, NULL, NULL),
(252, 'Furniture Assambly', 28, NULL, NULL),
(253, 'Furniture Repair', 28, NULL, NULL),
(254, 'TV', 28, NULL, NULL),
(255, 'Window & Curtain', 28, NULL, NULL),
(256, 'Wooden Flooring Repair', 28, NULL, NULL),
(257, 'Other', 28, NULL, NULL),
(258, 'Repair', 20, NULL, NULL),
(259, 'Installation', 20, NULL, NULL),
(260, 'Uninstallation', 20, NULL, NULL),
(261, 'Makeup & hairstyling Packages', 10, NULL, NULL),
(262, 'Only Makeup', 10, NULL, NULL),
(263, 'Only Hairstyling', 10, NULL, NULL),
(264, 'For Male (single)', 29, NULL, NULL),
(265, 'For Female (single)', 29, NULL, NULL),
(266, 'For couple', 29, NULL, NULL),
(267, 'For Group', 29, NULL, NULL),
(268, 'For Male (single)', 30, NULL, NULL),
(269, 'For Female (single)', 30, NULL, NULL),
(270, 'For Couple', 30, NULL, NULL),
(271, 'For Group', 30, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `cityid` int(11) NOT NULL,
  `city_name` varchar(20) NOT NULL,
  `stateid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`cityid`, `city_name`, `stateid`) VALUES
(1, 'Surat', 1);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `countryid` int(11) NOT NULL,
  `country_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`countryid`, `country_name`) VALUES
(1, 'India');

-- --------------------------------------------------------

--
-- Table structure for table `coupans`
--

CREATE TABLE `coupans` (
  `cpnid` int(11) NOT NULL,
  `cpn_code` varchar(20) NOT NULL,
  `cpn_type` tinyint(1) NOT NULL,
  `discount` int(4) NOT NULL,
  `description` varchar(200) NOT NULL,
  `valid_till` date NOT NULL,
  `applicable_for` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coupans`
--

INSERT INTO `coupans` (`cpnid`, `cpn_code`, `cpn_type`, `discount`, `description`, `valid_till`, `applicable_for`, `quantity`, `status`) VALUES
(17, 'NEW50', 0, 50, 'Get 50 % discount on order', '2020-07-30', 0, 5, 1),
(20, 'FIRST50', 1, 50, 'Get flat 50rs discount on order', '2020-06-27', 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `nid` int(11) NOT NULL,
  `description` varchar(300) NOT NULL,
  `from` varchar(300) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `oid` int(11) NOT NULL,
  `order_amount` int(6) NOT NULL,
  `order_date` datetime NOT NULL,
  `service_date` date NOT NULL,
  `discount` int(11) NOT NULL,
  `order_status` tinyint(1) NOT NULL,
  `final_price` int(6) NOT NULL,
  `payment_status` varchar(10) NOT NULL,
  `method` varchar(10) NOT NULL,
  `txnid` varchar(100) NOT NULL,
  `uid` int(11) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `contact` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `cpnid` int(11) DEFAULT NULL,
  `staffid` int(11) DEFAULT NULL,
  `delivery_date` datetime DEFAULT NULL,
  `reason` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`oid`, `order_amount`, `order_date`, `service_date`, `discount`, `order_status`, `final_price`, `payment_status`, `method`, `txnid`, `uid`, `uname`, `contact`, `email`, `address`, `cpnid`, `staffid`, `delivery_date`, `reason`) VALUES
(42, 698, '2020-04-21 07:12:30', '2020-04-20', 0, 1, 698, 'paid', 'card', '4d12719b24123401b80c', 19, 'jadu sheladiya', '9638288636', 'jadu@gmail.com', '120-121 varma hospital, piyush point,<br>  G H board,<br> Pandesara,<br> Surat,<br> Gujrat - 394221', NULL, 5, NULL, NULL),
(43, 1347, '2020-06-11 14:00:37', '2020-06-22', 0, 2, 1347, 'paid', 'card', '1af5efe762584842bb02', 19, 'jadu', '9638288636', 'jadu@gmail.com', 'piyush point,<br>  G H board,<br> Pandesara,<br> Surat,<br> Gujrat - 394221', NULL, 6, '2020-06-01 02:53:20', NULL),
(44, 1546, '2020-04-22 14:37:26', '2020-05-22', 0, -1, 1824, 'paid', 'card', '199ad7ee196da9cd7db3', 19, 'jadu', '9638288636', 'jadu@gmail.com', 'piyush point,<br>  G H board,<br> Pandesara,<br> Surat,<br> Gujrat - 394221', NULL, 5, NULL, 'late delivery'),
(46, 1097, '2020-05-23 15:23:55', '2020-05-23', 0, -1, 1294, 'paid', 'card', '45161fc26a9d58d11e7e', 17, 'Shivam Tiwari', '9638288636', 'st050647@gmail.com', '675, Housing Pandesara,<br>  G H board,<br> Pandesara,<br> Surat,<br> Gujrat - 394221', NULL, 5, NULL, 'Some reason'),
(47, 698, '2020-06-04 13:34:20', '2020-06-04', 50, -1, 774, 'paid', 'card', '04aaf6750412cad901a0', 44, 'Bbt Shivam', '1234567890', 'bbtshivam@gmail.com', '121 verma hospital , sai baba -2,<br>  GH Board ,<br> Pandesara,<br> ,<br> Gujrat - 394221', 20, 6, NULL, 'some reason'),
(48, 798, '2020-06-04 15:45:42', '2020-06-04', 0, -1, 942, 'paid', 'wallet', '', 44, 'Bbt Shivam', '2121212121', 'bbtshivam@gmail.com', '121 verma hospital , sai baba -2,<br>  GH Board ,<br> Pandesara,<br> ,<br> Gujrat - 394221', NULL, 5, NULL, 'Too late for service delivery'),
(49, 1796, '2020-06-08 13:50:28', '2020-06-08', 0, -1, 2119, 'paid', 'card', 'df4dd1e227f3900eb37d', 44, 'Bbt Shivam', '9638288636', 'bbtshivam@gmail.com', '121 verma hospital , sai baba -2,<br>  GH Board ,<br> Pandesara,<br> ,<br> Gujrat - 394221', NULL, NULL, NULL, 'Mistake order'),
(50, 498, '2020-06-10 08:25:35', '2020-06-10', 249, 2, 339, 'paid', 'card', '2ebd67361cfd9a292724', 44, 'Bbt Shivam', '1234567890', 'bbtshivam@gmail.com', '121 verma hospital , sai baba -2,<br>  GH Board ,<br> Pandesara,<br> ,<br> Gujrat - 394221', 17, 5, NULL, NULL),
(51, 249, '2020-06-10 12:07:01', '2020-06-10', 0, 2, 294, 'paid', 'card', '8304ddbc8e6bccc983bb', 44, 'Bbt Shivam', '3216549870', 'bbtshivam@gmail.com', '121 verma hospital , sai baba -2,<br>  GH Board ,<br> Pandesara,<br> ,<br> Gujrat - 394221', NULL, 6, NULL, NULL),
(52, 998, '2020-06-11 06:35:45', '2020-06-11', 499, 1, 679, 'paid', 'wallet', '', 17, 'Shivam Tiwari', '9638288636', 'st050647@gmail.com', '675, Housing Pandesara,<br>  G H board,<br> Pandesara,<br> ,<br> Gujrat - 394221', 17, 6, NULL, NULL),
(54, 799, '2020-06-30 18:23:21', '2020-06-30', 0, -1, 943, 'paid', 'card', 'a3becb11370afd1f40d2', 43, 'Aman', '8987216598', 'sth4131@gmail.com', '675 gopalnager,<br>  Gandhi Park Road,<br> Pandesara,<br> ,<br>  - 394221', NULL, NULL, NULL, 'not needed'),
(55, 1349, '2020-06-30 18:25:43', '2020-06-30', 0, 0, 1592, 'paid', 'card', 'f4d024d76440bc53ec9f', 43, 'Game hi Game', '9876543210', 'sth4131@gmail.com', '675 gopalnager,<br>  Gandhi Park Road,<br> Pandesara,<br> ,<br>  - 394221', NULL, NULL, NULL, NULL),
(56, 499, '2020-06-30 18:29:21', '2020-06-30', 0, -1, 589, 'paid', 'card', 'ee29d3af70090f8a3d6b', 43, 'Aman', '9865320214', 'sth4131@gmail.com', '120 karmayogi 2,<br>  GH Board,<br> Pandesara,<br> ,<br>  - 394221', NULL, NULL, NULL, 'hgnxhf'),
(57, 599, '2020-07-01 13:16:40', '2020-07-01', 0, 2, 707, 'paid', 'card', '3ed854e21cf3ca363e24', 43, 'Shivam Bhai', '9876543210', 'sth4131@gmail.com', '120 Karmayogi 2,<br>  GH Board,<br> Pandesara,<br> ,<br>  - 394221', NULL, 11, NULL, NULL),
(58, 499, '2020-07-01 13:28:32', '2020-07-01', 0, -1, 589, 'paid', 'card', 'aec358d4e1c8018bc455', 43, 'Shivam Bhai', '9876543210', 'sth4131@gmail.com', '210 Karmayogi 2,<br>  GHB,<br> Pandesara,<br> Surat,<br> Gujrat - 394221', NULL, NULL, NULL, 'Found affordable price by another provider');

-- --------------------------------------------------------

--
-- Table structure for table `order_dtls`
--

CREATE TABLE `order_dtls` (
  `odtlsid` int(11) NOT NULL,
  `oid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `price` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_dtls`
--

INSERT INTO `order_dtls` (`odtlsid`, `oid`, `sid`, `price`) VALUES
(44, 42, 60, 299),
(45, 42, 61, 399),
(46, 43, 58, 399),
(47, 43, 75, 699),
(48, 43, 80, 249),
(49, 44, 58, 399),
(50, 44, 64, 399),
(51, 44, 62, 549),
(52, 44, 82, 199),
(55, 46, 61, 399),
(56, 46, 59, 399),
(57, 46, 60, 299),
(58, 47, 60, 299),
(59, 47, 61, 399),
(60, 48, 58, 399),
(61, 48, 59, 399),
(62, 49, 77, 849),
(63, 49, 81, 149),
(64, 49, 84, 299),
(65, 49, 85, 499),
(66, 50, 94, 249),
(67, 50, 78, 249),
(68, 51, 94, 249),
(69, 52, 80, 249),
(70, 52, 76, 749),
(73, 54, 103, 799),
(74, 55, 106, 1349),
(75, 56, 111, 499),
(76, 57, 125, 599),
(77, 58, 111, 499);

-- --------------------------------------------------------

--
-- Table structure for table `provider`
--

CREATE TABLE `provider` (
  `pid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `shop_name` varchar(100) NOT NULL,
  `shop_contact` varchar(12) NOT NULL,
  `image` varchar(50) NOT NULL,
  `gstin` varchar(14) DEFAULT NULL,
  `p_wallet` varchar(10) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `scategory` tinyint(1) DEFAULT 0,
  `reason` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `provider`
--

INSERT INTO `provider` (`pid`, `uid`, `cid`, `shop_name`, `shop_contact`, `image`, `gstin`, `p_wallet`, `status`, `scategory`, `reason`) VALUES
(25, 17, 11, 'BBT Salon Service', '9638288636', 'sp17bbthMb.jpg', '', '0', 1, 1, NULL),
(42, 19, 9, 'Beauty Salon', '9877962154', 'sp19beautyZJ9.jpg', '', '0', 1, 1, NULL),
(43, 20, 11, 'Mahaveer Men\'s Salon', '9878563210', 'sp20mahaveer3fg.jpg', '', '0', 1, 1, NULL),
(44, 25, 12, 'O2 SPA', '7995603652', 'sp25o2bkO.jpg', '', '0', 1, 1, NULL),
(45, 27, 13, 'Cloud Thai SPA', '8965458720', 'sp27cloudrfm.jpg', '', '0', 1, 1, NULL),
(46, 26, 3, 'Sunny Electrical Service and Repair', '7894563210', 'sp26sunnybyH.jpg', '', '707', 1, 0, NULL),
(47, 28, 23, 'Kishan Home Cleaning', '9865321470', 'sp28kishanVrG.jpg', '', '0', 1, 1, NULL),
(48, 29, 24, 'Nitin Pest Control', '6987452136', 'sp29nitinzji.jpg', '', '0', 1, 1, NULL),
(49, 30, 25, 'Rajni Car Service', '8520147896', 'sp30rajniqtj.jpg', '', '0', 1, 1, NULL),
(50, 31, 26, 'Rahul Electrical', '8987216598', 'sp31rahulPcA.jpg', '', '0', 1, 1, NULL),
(51, 38, 9, 'Arti Beauty Parlor', '7894563210', 'sp38artiCRL.jpg', '', '0', 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pr_payment`
--

CREATE TABLE `pr_payment` (
  `pmtid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `trnsid` varchar(50) NOT NULL,
  `amount` int(15) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `p_staff`
--

CREATE TABLE `p_staff` (
  `staffid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `contact` varchar(12) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `image` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `p_staff`
--

INSERT INTO `p_staff` (`staffid`, `pid`, `code`, `name`, `contact`, `status`, `image`) VALUES
(5, 25, 'XfqZe', 'Dhansukh Shukla', '9638288631', 1, 'ss25-XfqZe.jpeg'),
(6, 25, 'AIoYf', 'Mayank bhai sheladiya', '6549873210', 1, 'ss25-AIoYf.jpeg'),
(7, 42, 'KELcY', 'Jadu Jadu', '3216549870', 0, 'ss42-KELcY.jpg'),
(8, 43, 'UH68W', 'Bhagat Singh', '8987988798', 0, 'ss43-UH68W.jpg'),
(9, 44, '8ghO0', 'Aman Shukla', '9878567898', 0, 'ss44-8ghO0.jpg'),
(10, 45, '7Wqao', 'Dhara Sonar', '6549879910', 0, 'ss45-7Wqao.jpg'),
(11, 46, 'm3zZn', 'Sunny Shukla', '7865215498', 0, 'ss46-m3zZn.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `rid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `oid` int(11) NOT NULL,
  `ratings` int(1) NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`rid`, `uid`, `pid`, `oid`, `ratings`, `description`, `date`) VALUES
(14, 17, 25, 47, 1, 'late delivery', '2020-06-09'),
(32, 28, 47, 56, 2, 'ooooo', '2020-07-01'),
(35, 17, 25, 52, 1, 'poor', '2020-07-01');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `sid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `sname` varchar(50) NOT NULL,
  `mrp` int(10) NOT NULL,
  `price` int(5) NOT NULL,
  `s_status` tinyint(1) NOT NULL,
  `sdescription` varchar(400) NOT NULL,
  `simage` varchar(100) NOT NULL,
  `time` varchar(10) DEFAULT '-',
  `cityid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`sid`, `cid`, `pid`, `sname`, `mrp`, `price`, `s_status`, `sdescription`, `simage`, `time`, `cityid`) VALUES
(58, 153, 25, 'Hair Cut + Shave/Moustache Trimming', 541, 399, 0, 'Shave / Beard Trim - Clean Shave / Moustache Grooming </br>\r\nHAIRCUT -  Hair Cut', 'ser25-SPZ.jpg', '53', 1),
(59, 153, 25, 'Hair Cut + Beard Styling', 564, 399, 0, 'SHAVE / BEARD TRIM - Beard Trim & Styling </br>\r\nHAIRCUT - HAIR Cut', 'ser25-DFU.jpg', '58', 1),
(60, 153, 25, 'Hair Cut + 10 min Head Massage', 541, 299, 0, 'MASSAGE - 10min Head Massage </br>\r\nHAIRCUT - Hair Cut', 'ser25-Isk.jpg', '43', 1),
(61, 153, 25, 'Hair Cut + 20 min Massage', 399, 399, 0, 'MASSAGE - 20 min Head Massage </br>\r\nHAIRCUT - Hair Cut', 'ser25-cCp.jpg', '53', 1),
(62, 153, 25, 'Haircut + Shave + 20 min Massage', 549, 549, 0, 'SHAVE / BEARD TRIM - Clean Shave / Moustache Grooming </br>\r\nMASSAGE - 20  min Head Massage </br>\r\nHAIRCUT - Hair Cut ', 'ser25-81m.jpg', '73', 1),
(63, 153, 25, 'Hair Cut + Hair Color Application', 689, 449, 1, 'HAIRCUT - Hair Cut</br>\r\nHAIR COLOUR - Hair Color', 'ser25-Dhp.jpg', '63', 1),
(64, 153, 25, 'HAIR CUT + FACE DETAN', 564, 399, 0, 'FACE HAIR - Face Detan Pack </br>\r\nHAIRCUT - Hair cut', 'ser25-CvJ.jpg', '53', 1),
(72, 153, 25, 'Hair Cut + Face Cleanup', 1064, 749, 0, 'FACE CARE - Charcoal Face Cleanup ( The Man Company )<br />HAIRCUT - Hair Cut', 'ser25-hiP.jpg', '73', 1),
(73, 153, 25, 'Hair Cut + Facial', 1814, 1249, 0, 'FACE CARE - Charcoal Facial ( The Man Company )<br />HAIRCUT - Hair Cut', 'ser25-8TX.jpg', '98', 1),
(74, 153, 25, 'Haircut + Shave + Detan', 763, 549, 0, 'FACE CARE - Face Detan Pack<br />SHAVE / BEARD TRIM - Clean Shave / Moustache Grooming<br />HAIRCUT - Hair Cut', 'ser25-Srj.jpg', '73', 1),
(75, 153, 25, 'The Royal Shave', 948, 699, 0, 'FACE CARE - Charcoal Face Cleanup ( The Man Company )<br />SHAVE / BEARD TRIM - Clean Shave / Moustache Grooming', 'ser25-fUi.jpg', '60', 1),
(76, 153, 25, 'Haircut + Pedicure', 1014, 749, 0, 'HAIRCUT - Hair Cut<br />HANDS & FEET CARE - Detan Pedicure', 'ser25-i0K.jpg', '103', 1),
(77, 153, 25, 'Father & Chield Package', 1000, 849, 0, 'MASSAGE - 20 min Head Massage, 20 min Kid\'s Head<br />HAIRCUT - Hair cut, Kid\'s Haircut', 'ser25-qBx.jpg', '113', 1),
(78, 154, 25, 'Hair Cut', 315, 249, 0, '1 person haircut', 'ser25-ea5.jpg', '33', 1),
(79, 154, 25, 'Head Shave', 345, 249, 0, '1 person Head Shave', 'ser25-qh1.jpg', '33', 1),
(80, 155, 25, 'Kid\'s Haircut (2-12 Years)', 436, 249, 0, 'Hair cut for kid', 'ser25-fiP.jpg', '40', 1),
(81, 175, 25, 'Clean Shave / Moustache Grooming', 199, 149, 0, '', 'ser25-cGP.jpg', '20', 1),
(82, 175, 25, 'Beard Trimming & Styling', 249, 199, 0, '', 'ser25-KZy.jpg', '25', 1),
(83, 176, 25, 'Head Massage (10 min)', 199, 99, 0, '', 'ser25-HsY.jpg', '10', 1),
(84, 176, 25, 'Head Massage (20 min)', 299, 299, 0, '', 'ser25-pIi.jpg', '20', 1),
(85, 176, 25, 'Head, Neck & Soulder Massage', 599, 499, 0, '', 'ser25-75v.jpg', '40', 1),
(86, 177, 25, 'Face Detan pack', 249, 199, 0, '', 'ser25-AML.jpg', '20', 1),
(87, 177, 25, 'Charcoal Face Clean Up', 749, 599, 0, 'The Man Company Cleanup', 'ser25-PEl.jpg', '40', 1),
(88, 177, 25, 'Charcoal Facial', 1499, 1199, 0, 'Tha Man Comapany Facial', 'ser25-BXm.jpg', '65', 1),
(89, 178, 25, 'Detan Manicure', 629, 499, 0, 'Sara by O3+', 'ser25-InS.jpg', '55', 1),
(90, 178, 25, 'Detan Pedicure', 699, 599, 0, 'Sara by O3+', 'ser25-aO8.jpg', '70', 1),
(91, 178, 25, 'Hands Detan Pack', 249, 199, 0, '', 'ser25-1mQ.jpg', '25', 1),
(92, 178, 25, 'Feet Detan Pack', 249, 199, 0, '', 'ser25-xOs.jpg', '25', 1),
(93, 178, 25, 'Cut & File Nails (Hands + Feet)', 199, 149, 0, '', 'ser25-iTk.jpg', '20', 1),
(94, 179, 25, 'Hair Color Application', 689, 249, 0, '', 'ser25-EMJ.jpg', '63', 1),
(97, 226, 50, 'AC Switchbox Installation', 319, 319, 0, '', 'ser50-mzj.jpg', '24', 1),
(98, 226, 50, 'Switchboard Installation', 249, 249, 0, '', 'ser50-xqO.jpg', '24.9', 1),
(99, 227, 50, 'Ceiling Fan Regulator Replacement', 79, 79, 0, '', 'ser50-qxn.jpg', '15', 1),
(100, 227, 50, 'Fan Installation', 399, 419, 0, '', 'ser50-Ohr.jpg', '24', 1),
(101, 227, 50, 'Fan Repair (Noise Issue, Speed Issue)', 349, 249, 0, '', 'ser50-p7g.jpg', '24.9', 1),
(102, 197, 49, 'Essential Clean-Up', 650, 399, 0, 'Exterior Body Shapoo<br />Interior Vacuum and Dashboard Polish', 'ser49-MyA.jpg', '60', 1),
(103, 197, 49, 'Full Interior Clean-up', 1000, 799, 0, 'Full Interior Vacuum Cleaning<br />Shapooing of seats, floor mats<br />Interior roof shampooing<br />Side doors cleaning<br />Interior dashboard clean and polish<br />AV vents dry dusting ', 'ser49-YWR.jpg', '120', 1),
(104, 198, 49, 'Essential Clean-Up', 450, 399, 0, 'Exterior Body Shapoo<br />Interior Vacuum and Dashboard Polish', 'ser49-mgh.jpg', '80', 1),
(105, 198, 49, 'Full Interior Clean-up', 1200, 899, 0, 'Full Interior Vacuum Cleaning<br />Shapooing of seats, floor mats<br />Interior roof shampooing<br />Side doors cleaning<br />Interior dashboard clean and polish<br />AV vents dry dusting', 'ser49-fwm.jpg', '130', 1),
(106, 203, 48, 'Cockroach and Ant -control- 2 Visits', 2400, 1349, 0, '30 day service gurantee included<br />Exclusive 2-steps process: targets both grown cockroaches & eggs that hatsh in 15 days', 'ser48-Fd4.png', '60', 1),
(107, 204, 48, 'Cockroach and Ant -control- 2 Visits', 2500, 1360, 0, '30 day service gurantee included<br />Exclusive 2-steps process: targets both grown cockroaches & eggs that hatsh in 15 days', 'ser48-jfF.png', '60', 1),
(108, 205, 48, 'Cockroach and Ant -control- 2 Visits', 2800, 1449, 0, '30 day service gurantee included<br />Exclusive 2-steps process: targets both grown cockroaches & eggs that hatsh in 15 days', 'ser48-xaU.png', '60', 1),
(109, 206, 48, 'Cockroach and Ant -control- 2 Visits', 3000, 1549, 0, '30 day service gurantee included<br />Exclusive 2-steps process: targets both grown cockroaches & eggs that hatsh in 15 days', 'ser48-2mL.png', '90', 1),
(110, 207, 48, 'Cockroach and Ant -control- 2 Visits', 4000, 1649, 0, '30 day service gurantee included<br />Exclusive 2-steps process: targets both grown cockroaches & eggs that hatsh in 15 days', 'ser48-dtN.png', '90', 1),
(111, 193, 47, '1 Bathroom', 899, 499, 0, 'Floor and Wall tiles<br />Metalic Fixtures: Taps, Faucet, Shower head<br />Toilet and Wash Besin<br />Exaust fan, Geyser, Mirror, Door, Window', 'ser47-ro0.jpg', '90', 1),
(112, 193, 47, '2 Bathroom', 1299, 799, 0, 'Floor and Wall tiles<br />Metalic Fixtures: Taps, Faucet, Shower head<br />Toilet and Wash Besin<br />Exaust fan, Geyser, Mirror, Door, Window', 'ser47-MYl.jpg', '120', 1),
(113, 168, 42, 'Wax and Groom | Roll-On Wax', 1174, 599, 0, 'Low-Contact Waxing: 100% hygienic, single-use cartridge | Full arms and Full legs<br />Low-Contact threading: beautician places the thread on a thick cotton padding around her neck (or mouth)', 'ser42-dwS.jpg', '65', 1),
(114, 169, 42, 'Wax and Glow | RICA', 1525, 899, 0, 'Waxing - Full arms wax (RICA) + Underarms (RICA peel-off), Full legs wax (RICA)<br />Low-Contact Threading - Eyebrows Threading, Upper Lip Threading', 'ser42-Qq0.jpg', '70', 1),
(115, 169, 42, 'Wax and Glow | Premium Roll-On Wax', 1699, 899, 0, 'Low-Contact Threading - Eyebrows Threading, Upper Lip Threading<br />Roll-On Wax - Premium RICA Roll-On (Full Legs + Full Arms) and Peel-off Underarms', 'ser42-YUI.jpg', '65', 1),
(116, 154, 43, 'Hair Cut + Hair Color Application', 500, 400, 0, 'HAIRCUT - Hair Cut<br />HAIR COLOUR - Hair Color', 'ser43-Tbe.jpg', '63', 1),
(117, 154, 43, 'HAIR CUT + FACE DETAN', 449, 399, 0, 'FACE HAIR - Face Detan Pack<br />HAIRCUT - Hair cut', 'ser43-aFM.jpg', '53', 1),
(118, 154, 43, 'Hair Cut + Face Cleanup', 899, 749, 0, 'FACE CARE - Charcoal Face Cleanup ( The Man Company )<br />HAIRCUT - Hair Cut', 'ser43-fP6.jpg', '73', 1),
(119, 155, 43, 'Kid\'s Haircut (2-12 Years)', 300, 249, 0, 'Hair cut for kid', 'ser43-7Kj.jpg', '40', 1),
(120, 159, 44, 'Head Neck and Soulder Therapy', 799, 499, 0, '20 Min Head Therapy<br />20 Min Neck and Soulder Therapy<br />Our Therapist carries essential oils', 'ser44-za6.jpg', '60', 1),
(121, 159, 44, 'Head Neck Soulder and Foot', 899, 699, 0, '30 Min Head and Shoulder Therapy <br />20 min Foot Therapy', 'ser44-iwn.jpg', '50', 1),
(122, 165, 45, 'Pain Relief Therapy', 1799, 1399, 0, 'Pain Relief Therapy <br />High Pressure intensity', 'ser45-qf2.jpg', '60', 1),
(123, 164, 45, 'Stress Relief Therapy', 1499, 1199, 0, 'Relaxes Muscles<br />Improves Blood circulation<br />Detoxifies body', 'ser45-ePo.jpg', '60', 1),
(124, 167, 45, 'Head - Oil Therapy', 499, 299, 0, 'Revitalizes scalp', 'ser45-FXZ.jpg', '20', 1),
(125, 180, 46, 'Split AC Service', 699, 599, 0, '', 'ser46-DpT.jpg', '-', 1),
(126, 180, 46, 'Window AC Service', 599, 499, 0, '', 'ser46-XBL.jpg', '-', 1),
(127, 181, 46, 'Window AC Repair + inspection charge', 249, 249, 0, 'The amount is only inspection charge <br />Repair Cost is provided after inspection.<br />Spare part(s) cost extra.', 'ser46-Oae.jpg', '-', 1),
(130, 181, 46, 'Split AC Repair', 249, 249, 0, 'The amount is only inspection charge<br />Repair Cost is provided after inspection.<br />Spare part(s) cost extra.	', 'ser46-unr.jpg', '-', 1),
(131, 209, 46, 'Geyser Service', 699, 599, 0, '', 'ser46-bTj.png', '-', 1),
(132, 217, 46, 'Top Load Descaling', 449, 395, 0, '', 'ser46-zBQ.jpg', '30', 1),
(133, 213, 46, 'Refrigerator Repair', 300, 249, 0, 'The amount is only inspection charge.<br />Repair Cost is provided after inspection.<br />Spare part(s) cost extra.	', 'ser46-3Gy.jpg', '-', 1);

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `stateid` int(11) NOT NULL,
  `state_name` varchar(20) NOT NULL,
  `countryid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`stateid`, `state_name`, `countryid`) VALUES
(1, 'Gujrat', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `email` varchar(35) NOT NULL,
  `password` varchar(33) NOT NULL,
  `dob` date DEFAULT NULL,
  `contact` varchar(12) DEFAULT NULL,
  `gender` varchar(6) NOT NULL,
  `date` datetime DEFAULT NULL,
  `wallet` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `name`, `email`, `password`, `dob`, `contact`, `gender`, `date`, `wallet`) VALUES
(17, 'Shivam Tiwari', 'st050647@gmail.com', '3ae9d8799d1bb5e201e5704293bb54ef', '2000-12-05', '9638288636', '', '2019-11-04 08:27:27', 615),
(19, 'jadu', 'jadu@gmail.com', 'd1ff5cbd672ef29289975a396c62848b', '2000-03-23', '9638288636', '', '2019-04-16 07:28:44', 0),
(20, 'Mayank Sheladiya', 'bhagat@gmail.com', '18427a4a7f0aaf3f78ec13c5dc121894', '2020-03-23', '0', '', '2020-01-23 18:22:33', 0),
(23, 'Himani Vaghasiya', 'himanivaghasiya4737@gmail.com', '', NULL, NULL, '', '2019-11-04 07:16:19', 0),
(24, 'jinal', 'jinalsheladiya422000@gmail.com', 'b1cf53109ed89daf71a33119f4a156b9', '0000-00-00', NULL, '', '2019-12-17 15:38:21', 0),
(25, 'aman', 'aman@gmail.com', 'ccda1683d8c97f8f2dff2ea7d649b42c', '1999-12-09', NULL, '', '2020-04-01 20:52:22', 0),
(26, 'sunny', 'sunny@gmail.com', '533c5ba8368075db8f6ef201546bd71a', '2000-04-05', NULL, '', '2019-08-06 14:28:44', 0),
(27, 'Dhara', 'dhara@gmail.com', '76040f7cb1b91e45c9a83b5e57846434', '2000-04-16', NULL, '', '2019-07-07 18:38:51', 0),
(28, 'Kishan', 'kishan@gmail.com', 'b1634c02812896b87fff3d56f89e36af', '0000-00-00', NULL, '', '2019-07-02 16:23:44', 0),
(29, 'Nitin', 'nitin@gmail.com', 'b585c4415b1fe50f2c31fa1698b271b7', '0000-00-00', NULL, '', '2019-08-01 14:25:43', 0),
(30, 'rajni', 'rajni@gmail.com', '62812798c3d15a4075396274dd0093b0', '0000-00-00', NULL, '', '2020-04-03 20:41:52', 0),
(31, 'Rahul', 'rahul@gmail.com', '439ed537979d8e831561964dbbbd7413', '0000-00-00', NULL, '', '2019-07-31 09:28:13', 0),
(32, 'Urvisha', 'urvisha@gmail.com', '0ba3167af711a3228c351c3568da9e7e', '0000-00-00', NULL, '', '2019-09-22 13:28:38', 0),
(33, 'Naman', 'naman@gmail.com', '8aa1ef9afbb2e0799af4c96103a078e1', '0000-00-00', NULL, '', '2019-12-28 17:41:19', 0),
(34, 'Jaydeep', 'jaydeep@gmail.com', '60c3822e2d564c7baeb232164250c9ce', '0000-00-00', NULL, '', '2019-11-06 16:41:40', 0),
(35, 'Vikash', 'vikash@gmail.com', 'f1d7405cf06be812e5d2f9d5145a8dc7', '0000-00-00', NULL, '', '2019-06-06 20:51:34', 0),
(36, 'Devika', 'devika@gmail.com', '837bb028089842e1ca04a3c85829cdea', '0000-00-00', NULL, '', '2019-07-31 08:32:43', 0),
(37, 'Anchal', 'anchal@gmail.com', '55c630955b288d69baf846ab850be5d3', '0000-00-00', NULL, '', '2019-08-14 11:35:22', 0),
(38, 'Arti', 'arti@gmail.com', '445365ad804c1afe78ad5a5f3bd1fa83', '0000-00-00', NULL, '', '2019-09-04 14:38:40', 0),
(43, 'Game hi Game', 'sth4131@gmail.com', '3ae9d8799d1bb5e201e5704293bb54ef', '0000-00-00', NULL, '', '2020-06-03 19:44:17', 943),
(44, 'Bbt Shivam', 'bbtshivam@gmail.com', '', '2002-02-06', '9638288636', '', '2020-06-12 19:44:26', 942);

-- --------------------------------------------------------

--
-- Table structure for table `user_address`
--

CREATE TABLE `user_address` (
  `addrid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `cityid` int(11) DEFAULT NULL,
  `address` text NOT NULL,
  `locality` varchar(100) NOT NULL,
  `landmark` varchar(100) NOT NULL,
  `pincode` int(6) NOT NULL,
  `addline` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_address`
--

INSERT INTO `user_address` (`addrid`, `uid`, `cityid`, `address`, `locality`, `landmark`, `pincode`, `addline`) VALUES
(2, 17, 1, '675, Housing Pandesara', 'G H board', 'Pandesara', 394221, 0),
(3, 19, 1, 'piyush point', 'G H board', 'Pandesara', 394221, 0),
(10, 20, 1, '121 Sarita socity ', 'Baiya nager', 'Punagam', 392451, 0),
(11, 20, 1, 'Baiya nager\r\nPunagam', 'Surat', 'Baiya nager', 392451, 0),
(12, 24, 1, 'Baiya nager\r\nPunagam', 'Baiya nager', 'Punagam', 392451, 0),
(14, 17, 1, '675 gopalnager', ' G housing board', 'Pandesara', 394221, 1),
(22, 25, 1, '120-121, verma hospital', 'Sai baba nager, G H Board', 'Pansesra', 394221, 1),
(24, 25, 1, '119, saibaba nager', 'gh board', 'pandesara', 394221, 0),
(25, 26, 1, '465, gopal nager', 'G H board', 'Pandesara', 394221, 1),
(28, 29, 1, '201, first floor, city center', 'Sociyo circle', 'Pandesara', 394221, 1),
(29, 27, 1, '102, 1st floor, Rahul Raj Mall', 'Dumas Road', 'Piplod', 395007, 1),
(36, 44, 1, '121 verma hospital , sai baba -2', 'GH Board ', 'Pandesara', 394221, 0),
(37, 44, 1, '121 verma hospital , sai baba -2', 'GH Board ', 'Pandesara', 394221, 0),
(38, 38, 1, '120, radhe complex', 'Punagam', 'Saroli', 321654, 1),
(39, 44, 1, '457, Bhakti nager, bamroli road', 'Kailash Chowkdi', 'Pandesara', 394221, 1),
(40, 35, 1, '127, regent plaza, ', 'navagaam', 'dindoli', 398561, 1),
(42, 19, 1, '121 gopinager', 'Kailash Chowkdi', 'Pandesara', 394221, 1),
(43, 20, 1, '657 Vinayak Nager', 'Kailash Chowkdi', 'Pandesara', 394221, 1),
(44, 25, 1, '120 Ishwarnager ', 'Bamroli road', 'G H Board', 394221, 1),
(45, 27, 1, '120 Rahul Raj Mall', 'Near IBC', 'Pipod', 395120, 1),
(46, 26, 1, '121 Ajad Nager ', 'Lambe Hanuman Road', 'Varacha', 395420, 1),
(47, 28, 1, '420 Limino Square', 'Gandhi Park Road', 'Sarthana', 365248, 1),
(48, 29, 1, '410 Ragheer Sociaty', 'AAi Mata CHowk', 'Parvat Patiya', 395478, 1),
(49, 30, 1, '\r\n1st Flour , Jhola Complex', 'Airoplane Circle', 'Athva Gate', 397542, 1),
(50, 31, 1, '960 Sai BABA Sociaty', 'G H BOARD', 'Pandesara', 394221, 1),
(51, 38, 1, 'Lambe Hanuman Road\r\nVaracha', 'Lambe Hanuman Road', 'Varacha', 395420, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_inquiry`
--

CREATE TABLE `user_inquiry` (
  `inqid` int(11) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` varchar(500) NOT NULL,
  `reply` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_inquiry`
--

INSERT INTO `user_inquiry` (`inqid`, `fname`, `lname`, `email`, `subject`, `message`, `reply`) VALUES
(2, 'jihug', 'jhbg', 'abgf@gmaol.com', 'jhbg', 'asdfdascvdsvdsvdsvdsvdsvdsvdsv dsvds vdsv dsvdsvdsvdsvdsvf', 1),
(3, 'Shivam', 'Tiwari', 'bbtgameplot@gmail.com', 'kuch batao', 'ahbcdfdasvfvd\r\nfbvdfes\r\nbds\r\nbd\r\ngfbdgfsbdfs\r\nbdfsbdf\r\nb', 1),
(4, 'Mayank ', 'Sheladiya', 'mayank@gmail.com', 'Information related to business', 'How i can start My business with serveathome', 0),
(5, 'Arti ', 'kanani', 'sth4131@gmail.com', 'Add services ', 'How to add services', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_dtls`
--
ALTER TABLE `bank_dtls`
  ADD PRIMARY KEY (`bid`),
  ADD KEY `pid` (`pid`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cid`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`cityid`),
  ADD KEY `stateid` (`stateid`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`countryid`);

--
-- Indexes for table `coupans`
--
ALTER TABLE `coupans`
  ADD PRIMARY KEY (`cpnid`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`nid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`oid`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `order_dtls`
--
ALTER TABLE `order_dtls`
  ADD PRIMARY KEY (`odtlsid`),
  ADD KEY `oid` (`oid`),
  ADD KEY `sid` (`sid`);

--
-- Indexes for table `provider`
--
ALTER TABLE `provider`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `uid` (`uid`),
  ADD KEY `cid` (`cid`);

--
-- Indexes for table `pr_payment`
--
ALTER TABLE `pr_payment`
  ADD PRIMARY KEY (`pmtid`),
  ADD UNIQUE KEY `trnsid` (`trnsid`),
  ADD KEY `pid` (`pid`);

--
-- Indexes for table `p_staff`
--
ALTER TABLE `p_staff`
  ADD PRIMARY KEY (`staffid`),
  ADD KEY `pid` (`pid`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`rid`),
  ADD KEY `pid` (`pid`),
  ADD KEY `uid` (`uid`),
  ADD KEY `oid` (`oid`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`sid`),
  ADD KEY `cid` (`cid`),
  ADD KEY `pid` (`pid`),
  ADD KEY `cityid` (`cityid`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`stateid`),
  ADD KEY `countryid` (`countryid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `user_address`
--
ALTER TABLE `user_address`
  ADD PRIMARY KEY (`addrid`),
  ADD KEY `uid` (`uid`),
  ADD KEY `cid` (`cityid`);

--
-- Indexes for table `user_inquiry`
--
ALTER TABLE `user_inquiry`
  ADD PRIMARY KEY (`inqid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bank_dtls`
--
ALTER TABLE `bank_dtls`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=273;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `cityid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `countryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `coupans`
--
ALTER TABLE `coupans`
  MODIFY `cpnid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `nid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `order_dtls`
--
ALTER TABLE `order_dtls`
  MODIFY `odtlsid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `provider`
--
ALTER TABLE `provider`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `pr_payment`
--
ALTER TABLE `pr_payment`
  MODIFY `pmtid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `p_staff`
--
ALTER TABLE `p_staff`
  MODIFY `staffid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `stateid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `user_address`
--
ALTER TABLE `user_address`
  MODIFY `addrid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `user_inquiry`
--
ALTER TABLE `user_inquiry`
  MODIFY `inqid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bank_dtls`
--
ALTER TABLE `bank_dtls`
  ADD CONSTRAINT `bank_dtls_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `provider` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `city_ibfk_1` FOREIGN KEY (`stateid`) REFERENCES `state` (`stateid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_dtls`
--
ALTER TABLE `order_dtls`
  ADD CONSTRAINT `order_dtls_ibfk_1` FOREIGN KEY (`oid`) REFERENCES `orders` (`oid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_dtls_ibfk_2` FOREIGN KEY (`sid`) REFERENCES `services` (`sid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `provider`
--
ALTER TABLE `provider`
  ADD CONSTRAINT `provider_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `provider_ibfk_2` FOREIGN KEY (`cid`) REFERENCES `category` (`cid`) ON UPDATE CASCADE;

--
-- Constraints for table `pr_payment`
--
ALTER TABLE `pr_payment`
  ADD CONSTRAINT `pr_payment_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `provider` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `p_staff`
--
ALTER TABLE `p_staff`
  ADD CONSTRAINT `p_staff_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `provider` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `provider` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `review_ibfk_3` FOREIGN KEY (`oid`) REFERENCES `orders` (`oid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `category` (`cid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `services_ibfk_2` FOREIGN KEY (`pid`) REFERENCES `provider` (`pid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `services_ibfk_3` FOREIGN KEY (`cityid`) REFERENCES `city` (`cityid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `state`
--
ALTER TABLE `state`
  ADD CONSTRAINT `state_ibfk_1` FOREIGN KEY (`countryid`) REFERENCES `country` (`countryid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_address`
--
ALTER TABLE `user_address`
  ADD CONSTRAINT `user_address_ibfk_2` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_address_ibfk_3` FOREIGN KEY (`cityid`) REFERENCES `city` (`cityid`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
