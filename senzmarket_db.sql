-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2022 at 02:00 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `senzmarket_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `advertisement`
--

CREATE TABLE `advertisement` (
  `ad_id` int(255) NOT NULL,
  `ad_companyname` varchar(255) NOT NULL,
  `ad_email` varchar(255) NOT NULL,
  `ad_image` varchar(500) NOT NULL,
  `ad_stdate` date NOT NULL,
  `ad_eddate` date NOT NULL,
  `ad_status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `advertisement`
--

INSERT INTO `advertisement` (`ad_id`, `ad_companyname`, `ad_email`, `ad_image`, `ad_stdate`, `ad_eddate`, `ad_status`) VALUES
(4, 'PSR', 'shaanramp@gmail.com', 'IMG-60900ce1138331.90632066.jpg', '2021-04-06', '2021-04-29', 1),
(5, 'CMC', 'creancycool@gmail.com', 'IMG-60900cf00cbe17.76287858.jpg', '2021-05-08', '2021-05-14', 1),
(6, 'PSR', 'shaanramp@gmail.com', 'IMG-608fe8a60f8a60.43250751.jpg', '2021-04-26', '2021-04-29', 1),
(8, 'PSR', 'shaanramp@gmail.com', 'IMG-60900d0ea04306.19640189.jpg', '2021-05-05', '2021-05-07', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(45) NOT NULL,
  `category_img` varchar(500) NOT NULL,
  `category_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_img`, `category_status`) VALUES
(6, 'Vegetables', 'IMG-60900928a5c627.54033807.jpg', NULL),
(7, 'Fruits', 'IMG-60900931a31dd5.81117923.jpg', NULL),
(40, 'Processed Foods', 'IMG-6090093ab084c9.06455005.jpg', NULL),
(43, 'Tubers & Yams', 'IMG-6090094ba867d4.47470659.jpg', NULL),
(45, 'Plantation Crops', 'IMG-6013b967caa9b2.91287306.jpg', NULL),
(46, 'Mushroom', 'IMG-6079bb099888c8.18391968.jpg', NULL),
(47, 'Medicinal', 'IMG-60900961c11df5.34712594.jpg', NULL),
(48, 'Spice', 'IMG-613f5bf4306075.15404240.png', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_uname` varchar(255) NOT NULL,
  `customer_fname` varchar(100) NOT NULL,
  `customer_lname` varchar(100) NOT NULL,
  `customer_dob` date NOT NULL,
  `customer_address` varchar(455) NOT NULL,
  `customer_gender` varchar(11) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_nic` varchar(20) NOT NULL,
  `customer_cno1` int(11) NOT NULL,
  `customer_cno2` int(11) NOT NULL,
  `customer-img` varchar(500) NOT NULL,
  `customer_status` int(11) NOT NULL DEFAULT '1',
  `customer_reg_date` datetime NOT NULL,
  `customer_last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `customer_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_uname`, `customer_fname`, `customer_lname`, `customer_dob`, `customer_address`, `customer_gender`, `customer_email`, `customer_nic`, `customer_cno1`, `customer_cno2`, `customer-img`, `customer_status`, `customer_reg_date`, `customer_last_update`, `customer_password`) VALUES
(1, 'Pradeep', 'Pradeepshaan', 'Ramdas', '2021-04-24', 'No.658/5A Old Post Office Rd, Mahabage, Ragama', 'male', 'creancy@gmail.com', '981292367V', 771406699, 769614021, '', 1, '0000-00-00 00:00:00', '2021-05-03 16:46:20', ''),
(10, 'Malisha', 'Malisha Creancy', 'Pradeepshaan', '1998-04-02', 'No.658/5A Old Post Office Rd, Mahabage, Ragama', 'female', 'malisha@gmail.com', '985934371V', 771406699, 769614021, '', 1, '0000-00-00 00:00:00', '2021-05-03 16:46:05', 'da39a3ee5e6b4b0d3255bfef95601890afd80709'),
(11, 'Pradeepshaan', 'Pradeepshaan', 'Ramdas', '1998-05-08', 'No.658/5A Old Post Office Rd, Mahabage, Ragama', 'male', 'shaanramp@gmail.com', '981292367V', 771406699, 769614021, '', 1, '0000-00-00 00:00:00', '2021-05-03 16:46:10', 'da39a3ee5e6b4b0d3255bfef95601890afd80709'),
(17, 'Pradeepshaan', '', '', '0000-00-00', '', '', 'shaanramp@gmail.com', '', 0, 0, '', 1, '0000-00-00 00:00:00', '2021-05-04 02:42:34', 'f1191008e7f0422a574c825aca2d137913d4c672'),
(18, 'Pradeepshaan', '', '', '0000-00-00', '', '', 'shaanramp@gmail.com', '', 0, 0, '', 1, '0000-00-00 00:00:00', '2021-08-23 10:42:24', 'f1191008e7f0422a574c825aca2d137913d4c672'),
(19, 'Pradeepshaan', '', '', '0000-00-00', '', '', 'shaanramp@gmail.com', '', 0, 0, '', 1, '0000-00-00 00:00:00', '2021-08-23 10:42:54', '8cb2237d0679ca88db6464eac60da96345513964');

-- --------------------------------------------------------

--
-- Table structure for table `customer_login`
--

CREATE TABLE `customer_login` (
  `login_id` int(11) NOT NULL,
  `login_username` varchar(100) NOT NULL,
  `login_password` varchar(15) NOT NULL,
  `login_status` int(11) NOT NULL DEFAULT '1',
  `role_name` varchar(100) NOT NULL,
  `customer_customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `deal`
--

CREATE TABLE `deal` (
  `deal_id` int(11) NOT NULL,
  `deal_topic` varchar(255) NOT NULL,
  `deal_quote` varchar(500) NOT NULL,
  `deal_img` varchar(500) NOT NULL,
  `deal_status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `deal`
--

INSERT INTO `deal` (`deal_id`, `deal_topic`, `deal_quote`, `deal_img`, `deal_status`) VALUES
(3, 'Get Good Deals', 'An apple is an edible fruit produced by an apple tree. Apple trees are cultivated worldwide and are the most widely grown species in the genus Malus. The tree originated in Central Asia, where its wild ancestor, Malus sieversii, is still found today.\r\n', 'IMG-608fefa4432124.55854533.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `delivery_id` int(11) NOT NULL,
  `delivery_date` date NOT NULL,
  `delivery_receive_date` date DEFAULT NULL,
  `delivery_status` int(11) NOT NULL DEFAULT '1',
  `delivery_vehicle_no` varchar(45) DEFAULT NULL,
  `payment_payment_id` int(11) NOT NULL,
  `customer_customer_id` int(11) NOT NULL,
  `user_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `login_id` int(11) NOT NULL,
  `login_username` varchar(100) NOT NULL,
  `login_password` varchar(100) NOT NULL,
  `login_status` int(11) NOT NULL DEFAULT '1',
  `user_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `module_id` int(11) NOT NULL,
  `module_name` varchar(100) NOT NULL,
  `module_img` varchar(100) NOT NULL,
  `module_url` varchar(100) NOT NULL,
  `module_status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notification_id` int(11) NOT NULL,
  `notification_date` date NOT NULL,
  `notification_content` varchar(500) DEFAULT NULL,
  `notification_status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `order_total_price` decimal(10,2) NOT NULL,
  `order_discount` int(11) NOT NULL,
  `order_discount_price` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `order_status` int(11) NOT NULL DEFAULT '1',
  `customer_customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `payment_total_price` decimal(10,2) NOT NULL,
  `payment_type` varchar(45) NOT NULL,
  `payment_date` datetime NOT NULL,
  `payment_status` int(11) NOT NULL DEFAULT '1',
  `customer_customer_id` int(11) NOT NULL,
  `order_order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(500) NOT NULL,
  `product_description` varchar(1000) NOT NULL,
  `product_img` varchar(500) NOT NULL,
  `product_location` varchar(255) NOT NULL,
  `product_price` int(255) NOT NULL,
  `product_price_updated` int(255) NOT NULL,
  `product_status` int(11) NOT NULL DEFAULT '1',
  `category_category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_description`, `product_img`, `product_location`, `product_price`, `product_price_updated`, `product_status`, `category_category_id`) VALUES
(7, 'Peache', 'An apple is an edible fruit produced by an apple tree. Apple trees are cultivated worldwide and are the most widely grown species in the genus Malus. The tree originated in Central Asia, where its wild ancestor, Malus sieversii, is still found today.', 'IMG-60900a51659583.88095698.jpg', 'Colombo', 200, 100, 1, 7),
(8, 'Mango', 'An apple is an edible fruit produced by an apple tree. Apple trees are cultivated worldwide and are the most widely grown species in the genus Malus. The tree originated in Central Asia, where its wild ancestor, Malus sieversii, is still found today.', 'IMG-608e3a1db19240.93627379.jpg', 'Wattala', 300, 700, 1, 7),
(12, 'Coconut', 'An apple is an edible fruit produced by an apple tree. Apple trees are cultivated worldwide and are the most widely grown species in the genus Malus. The tree originated in Central Asia, where its wild ancestor, Malus sieversii, is still found today.', 'IMG-608e3a316d28a1.96827257.jpg', 'America', 15, 189, 1, 46),
(13, 'pineapple', 'An apple is an edible fruit produced by an apple tree. Apple trees are cultivated worldwide and are the most widely grown species in the genus Malus. The tree originated in Central Asia, where its wild ancestor, Malus sieversii, is still found today.', 'IMG-6013ba1e9f7918.33417493.jpg', 'Kandana', 85, 896, 1, 6),
(16, 'Blueberry', 'An apple is an edible fruit produced by an apple tree. Apple trees are cultivated worldwide and are the most widely grown species in the genus Malus. The tree originated in Central Asia, where its wild ancestor, Malus sieversii, is still found today.', 'IMG-6086c16d5dcdb6.59959139.jpg', 'Ragama', 90, 234, 1, 6),
(17, 'Mullberry', 'An apple is an edible fruit produced by an apple tree. Apple trees are cultivated worldwide and are the most widely grown species in the genus Malus. The tree originated in Central Asia, where its wild ancestor, Malus sieversii, is still found today.', 'IMG-608ce20d103d47.40414609.jpg', 'Bambalapitiya', 800, 609, 1, 40),
(19, 'Potato', 'An apple is an edible fruit produced by an apple tree. Apple trees are cultivated worldwide and are the most widely grown species in the genus Malus. The tree originated in Central Asia, where its wild ancestor, Malus sieversii, is still found today.', 'IMG-6090b54c5ecb65.35154710.jpg', 'Nuwaraeliya', 200, 200, 1, 43),
(20, 'Coconut', 'An apple is an edible fruit produced by an apple tree. Apple trees are cultivated worldwide and are the most widely grown species in the genus Malus. The tree originated in Central Asia, where its wild ancestor, Malus sieversii, is still found today.', 'IMG-6090b56e693793.85219781.jpg', 'Matara', 200, 0, 1, 45),
(21, 'Nivithi', 'An apple is an edible fruit produced by an apple tree. Apple trees are cultivated worldwide and are the most widely grown species in the genus Malus. The tree originated in Central Asia, where its wild ancestor, Malus sieversii, is still found today.', 'IMG-6090b597b5f9c5.37514184.jpg', 'Kandy', 100, 0, 1, 47);

-- --------------------------------------------------------

--
-- Table structure for table `product_deals`
--

CREATE TABLE `product_deals` (
  `product_deal_id` int(11) NOT NULL,
  `product-deal_topic` varchar(255) NOT NULL,
  `product_deal_quote` varchar(500) NOT NULL,
  `product_deal_img` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(100) NOT NULL,
  `role_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`, `role_status`) VALUES
(1, 'Admin', 0),
(2, 'owner', 0),
(3, 'Manager', 0);

-- --------------------------------------------------------

--
-- Table structure for table `role_has_module`
--

CREATE TABLE `role_has_module` (
  `role_role_id` int(11) NOT NULL,
  `module_module_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `seller_id` int(255) NOT NULL,
  `seller_name` varchar(255) NOT NULL,
  `seller_product_name` varchar(255) NOT NULL,
  `seller_product_qty` int(255) NOT NULL,
  `seller_price` int(255) NOT NULL,
  `seller_market_price` int(255) NOT NULL,
  `seller_product_des` varchar(255) NOT NULL,
  `seller_product_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `seller_product_exp` date NOT NULL,
  `seller_status` int(11) NOT NULL DEFAULT '1',
  `category_category_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`seller_id`, `seller_name`, `seller_product_name`, `seller_product_qty`, `seller_price`, `seller_market_price`, `seller_product_des`, `seller_product_reg`, `seller_product_exp`, `seller_status`, `category_category_id`) VALUES
(12, 'Malisha', 'Carrot', 3, 300, 100, 'An apple is an edible fruit produced by an apple tree. Apple trees are cultivated worldwide and are the most widely grown species in the genus Malus.', '2021-05-04 05:26:41', '2021-05-22', 0, 6),
(13, 'Malisha', 'Carrot', 2, 400, 100, 'An apple is an edible fruit produced by an apple tree. Apple trees are cultivated worldwide and are the most widely grown species in the genus Malus.', '2021-05-04 05:26:45', '2021-05-22', 0, 6),
(14, 'Pradeepshaan', 'Apple', 3, 90, 100, 'An apple is an edible fruit produced by an apple tree. Apple trees are cultivated worldwide and are the most widely grown species in the genus Malus.', '2021-05-04 05:26:49', '2021-05-28', 0, 7),
(15, 'Pradeep', 'Apple', 2, 80, 100, 'An apple is an edible fruit produced by an apple tree. Apple trees are cultivated worldwide and are the most widely grown species in the genus Malus.', '2021-05-04 05:26:58', '2021-05-29', 0, 7),
(16, 'Pradeep', 'Carrot', 5, 100, 100, 'An apple is an edible fruit produced by an apple tree. Apple trees are cultivated worldwide and are the most widely grown species in the genus Malus.', '2021-05-04 05:26:18', '2021-05-14', 0, 6),
(17, 'Shaan', 'Orange', 10, 200, 100, 'An apple is an edible fruit produced by an apple tree. Apple trees are cultivated worldwide and are the most widely grown species in the genus Malus.', '2021-05-04 05:26:14', '2021-05-14', 0, 7);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `stock_id` int(11) NOT NULL,
  `stock_reg_date` date NOT NULL,
  `stock_expire_date` date NOT NULL,
  `stock_quantity` int(255) NOT NULL,
  `receive_stock_count` int(11) NOT NULL,
  `current_stock_count` int(11) NOT NULL,
  `stock_status` int(11) NOT NULL DEFAULT '1',
  `cost_per_unit` decimal(10,2) NOT NULL,
  `category_category_id` int(11) NOT NULL,
  `supplier_supplier_id` int(11) NOT NULL,
  `product_product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`stock_id`, `stock_reg_date`, `stock_expire_date`, `stock_quantity`, `receive_stock_count`, `current_stock_count`, `stock_status`, `cost_per_unit`, `category_category_id`, `supplier_supplier_id`, `product_product_id`) VALUES
(2, '2021-05-08', '2021-05-26', 6, 1, 0, 1, '0.00', 6, 1, 7),
(4, '2021-06-07', '2021-06-04', 4, 0, 0, 1, '0.00', 6, 2, 8);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL,
  `supplier_uname` varchar(255) NOT NULL,
  `supplier_fname` varchar(100) NOT NULL,
  `supplier_lname` varchar(100) NOT NULL,
  `supplier_company` varchar(100) DEFAULT NULL,
  `supplier_email` varchar(100) NOT NULL,
  `supplier_cno1` int(11) NOT NULL,
  `supplier_cno2` int(11) DEFAULT NULL,
  `supplier_address` varchar(45) NOT NULL,
  `supplier_status` int(11) NOT NULL DEFAULT '1',
  `supplier_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `supplier_uname`, `supplier_fname`, `supplier_lname`, `supplier_company`, `supplier_email`, `supplier_cno1`, `supplier_cno2`, `supplier_address`, `supplier_status`, `supplier_password`) VALUES
(1, 'Creancy', 'Malisha', '', 'PSR', 'shaanra12@gmail.com', 77146778, 116787288, 'No. Mahabage, Ragama', 1, ''),
(2, 'Pradeep', 'Pradeep', '', 'CMC', 'shaacrean@gmail.com', 73979033, 763875553, 'No.11 Kandana Ragam', 1, ''),
(9, 'Pradeepshaan', 'Ramdas', '', 'PSR & Co', 'shaanramp@gmail.com', 771406699, 769614021, 'No.658/5A Old Post Office Rd, Mahabage, Ragam', 1, ''),
(13, 'Pradeepshaan', '', '', 'Ramdas', 'shaanramp@gmail.com', 771406699, 769614021, 'No.658/5A Old Post Office Rd, Mahabage, Ragam', 1, 'f1191008e7f0422a574c825aca2d137913d4c672'),
(14, '', '', '', '', 'shaanramp@gmail.com', 0, 0, '', 1, '7110eda4d09e062aa5e4a390b0a572ac0d2c0220');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_fname` varchar(100) NOT NULL,
  `user_lname` varchar(100) NOT NULL,
  `user_dob` date NOT NULL,
  `user_address` varchar(500) NOT NULL,
  `user_gender` varchar(20) NOT NULL,
  `user_nic` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(100) DEFAULT NULL,
  `user_cno1` varchar(20) NOT NULL,
  `user_cno2` varchar(20) NOT NULL,
  `user_img` varchar(500) NOT NULL DEFAULT 'IMG-6097c453cec5e1.36388049.jpg',
  `user_country` varchar(255) NOT NULL,
  `user_language` varchar(255) NOT NULL,
  `user_reg_date` datetime NOT NULL,
  `user_status` int(11) NOT NULL DEFAULT '1',
  `role_role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_fname`, `user_lname`, `user_dob`, `user_address`, `user_gender`, `user_nic`, `user_email`, `user_password`, `user_cno1`, `user_cno2`, `user_img`, `user_country`, `user_language`, `user_reg_date`, `user_status`, `role_role_id`) VALUES
(1, 'Pradeepshaan', 'Pradeepshaan', 'Ramdas', '1998-05-08', 'No.658/5A Old Post Office Rd, Mahabage, Ragama', 'female', '981292367V', 'shaanramp@gmail.com', '12345', '0771406698', '0769614021', 'IMG-6097c8343bc221.03740416.jpg', 'Srilanka', 'English', '0000-00-00 00:00:00', 1, 2),
(2, 'Malisha Creancy', 'Malisha ', 'Creancy', '1998-04-02', 'No.658/5A Old Post Office Rd, Mahabage, Ragama', 'female', '985934371V', 'creancycool@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '0769614021', '0771406699', 'IMG-6097c993a297f1.65592548.jpg', 'Srilanka', 'English', '0000-00-00 00:00:00', 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advertisement`
--
ALTER TABLE `advertisement`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_login`
--
ALTER TABLE `customer_login`
  ADD PRIMARY KEY (`login_id`),
  ADD KEY `fk_customer_login_customer1` (`customer_customer_id`);

--
-- Indexes for table `deal`
--
ALTER TABLE `deal`
  ADD PRIMARY KEY (`deal_id`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`delivery_id`),
  ADD KEY `fk_delivery_payment1` (`payment_payment_id`),
  ADD KEY `fk_delivery_customer1` (`customer_customer_id`),
  ADD KEY `fk_delivery_user1` (`user_user_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`login_id`),
  ADD KEY `fk_login_user1` (`user_user_id`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`module_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `fk_order_customer1` (`customer_customer_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `fk_payment_customer1` (`customer_customer_id`),
  ADD KEY `fk_payment_order1` (`order_order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `fk_product_category1` (`category_category_id`);

--
-- Indexes for table `product_deals`
--
ALTER TABLE `product_deals`
  ADD PRIMARY KEY (`product_deal_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `role_has_module`
--
ALTER TABLE `role_has_module`
  ADD PRIMARY KEY (`role_role_id`,`module_module_id`),
  ADD KEY `fk_role_has_module_module1` (`module_module_id`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`seller_id`),
  ADD KEY `category_category_id1` (`category_category_id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`stock_id`),
  ADD KEY `fk_stock_category1` (`category_category_id`),
  ADD KEY `fk_stock_supplier1` (`supplier_supplier_id`),
  ADD KEY `fk_stock_product1` (`product_product_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `fk_user_role1` (`role_role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advertisement`
--
ALTER TABLE `advertisement`
  MODIFY `ad_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `customer_login`
--
ALTER TABLE `customer_login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deal`
--
ALTER TABLE `deal`
  MODIFY `deal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `delivery_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
  MODIFY `module_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `product_deals`
--
ALTER TABLE `product_deals`
  MODIFY `product_deal_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `seller_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer_login`
--
ALTER TABLE `customer_login`
  ADD CONSTRAINT `fk_customer_login_customer1` FOREIGN KEY (`customer_customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `delivery`
--
ALTER TABLE `delivery`
  ADD CONSTRAINT `fk_delivery_customer1` FOREIGN KEY (`customer_customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_delivery_payment1` FOREIGN KEY (`payment_payment_id`) REFERENCES `payment` (`payment_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_delivery_user1` FOREIGN KEY (`user_user_id`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `fk_login_user1` FOREIGN KEY (`user_user_id`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `fk_order_customer1` FOREIGN KEY (`customer_customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `fk_payment_customer1` FOREIGN KEY (`customer_customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_payment_order1` FOREIGN KEY (`order_order_id`) REFERENCES `order` (`order_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_product_category1` FOREIGN KEY (`category_category_id`) REFERENCES `category` (`category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `role_has_module`
--
ALTER TABLE `role_has_module`
  ADD CONSTRAINT `fk_role_has_module_module1` FOREIGN KEY (`module_module_id`) REFERENCES `module` (`module_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_role_has_module_role1` FOREIGN KEY (`role_role_id`) REFERENCES `role` (`role_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `fk_stock_category1` FOREIGN KEY (`category_category_id`) REFERENCES `category` (`category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_stock_product1` FOREIGN KEY (`product_product_id`) REFERENCES `product` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_stock_supplier1` FOREIGN KEY (`supplier_supplier_id`) REFERENCES `supplier` (`supplier_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_role1` FOREIGN KEY (`role_role_id`) REFERENCES `role` (`role_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
