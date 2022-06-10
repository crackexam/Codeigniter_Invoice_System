-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2020 at 11:32 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `promotionalwears_invoice`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_all_products`
--

CREATE TABLE `tbl_all_products` (
  `product_name` varchar(150) NOT NULL,
  `product_id` varchar(100) DEFAULT NULL,
  `product_model` varchar(100) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_all_products`
--

INSERT INTO `tbl_all_products` (`product_name`, `product_id`, `product_model`, `id`) VALUES
('Round Promotional Badges', '4108', 'PB0001', 1),
('Front Opening Hospital Gown', '2905', 'HC02', 2),
('Elegant Wooden Plaque with Box', '78', 'PHIt3514', 3),
('Coat Badge', '4102', 'PHI7016', 4),
('New Solar Bag', '3450', 'PW07', 5),
('Plastic Made Table Clock', '4114', 'P3S15', 6),
('Designer Acrylic Trophy', '103', 'PHI1070', 7),
('Best Design Men Necktie', '2440', 'P3S162', 8),
('Formal Necktie         ', '3513', 'P3148', 9),
('Cricket Batsman Trophy', '123', 'PHIR03', 10),
('Chain Wrist Watch', '3394', 'P3S141', 11),
('Custom Leather Wrist Watch', '3397', 'PW152', 12),
('Notebook with 5000 mAh Power Bank', '5672', 'PD111', 13),
('A Daimond Pen', '3487', 'PIDF7080', 14),
('Exclusive Wrist Watch', '3390', 'P3S144', 15),
('Personalized Stainless Steel Wrist Watch ', '5665', 'P3S147', 16),
('Golden Wrist Watch', '3391', 'PW147', 17),
('Promotional Wrist Watch', '3393', 'P3S139', 18);
-- --------------------------------------------------------

--
-- Table structure for table `tbl_client`
--

CREATE TABLE `tbl_client` (
  `client_id` int(11) NOT NULL,
  `client_name` varchar(100) NOT NULL,
  `client_company` varchar(255) NOT NULL,
  `client_address` varchar(500) NOT NULL,
  `client_email` varchar(100) NOT NULL,
  `pincode` varchar(10) NOT NULL,
  `state_name` varchar(50) NOT NULL,
  `client_gst` varchar(100) NOT NULL,
  `client_mobile` varchar(20) NOT NULL,
  `client_createdDate` datetime NOT NULL,
  `client_updateDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_client`
--

INSERT INTO `tbl_client` (`client_id`, `client_name`, `client_company`, `client_address`, `client_email`, `pincode`, `state_name`, `client_gst`, `client_mobile`, `client_createdDate`, `client_updateDate`) VALUES
(1, 'Vikas Kumar', 'Hcl pvt ltd', 'H130 Okhla Industrial Area Phase II, Delhi', 'vksvks848@gmail.com', '110089', 'Delhi', '', '9758945787', '2018-04-04 08:55:02', '2020-03-20 06:37:01'),
(2, 'Rajan', 'Uniformtailor', 'Peeraghari', '', 'N/A', 'UP', 'TE78L87', '7895621458', '2018-04-04 09:32:42', '2018-04-14 07:12:38'),
(3, 'Asif', 'Godesigny', 'narela', '', 'N/A', 'Delhi', '07AA7845GHT41', '7845962312', '2018-04-05 07:58:14', '2018-04-14 12:14:57'),
(4, 'Tesghvctsy', 'hdsnyucegyfu', 'hjdufihrthgei', 'hfyngyrg@uiherfuyrhngyuty.disufhygg', '111111', 'Andra Pradesh', '', '47474784555', '2020-01-29 11:22:19', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_client_address`
--

CREATE TABLE `tbl_client_address` (
  `id` int(10) NOT NULL,
  `client_id` int(10) NOT NULL,
  `m_client_address` varchar(500) NOT NULL,
  `m_client_state` varchar(50) NOT NULL,
  `m_client_pincode` varchar(10) NOT NULL,
  `is_Default` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_client_address`
--

INSERT INTO `tbl_client_address` (`id`, `client_id`, `m_client_address`, `m_client_state`, `m_client_pincode`, `is_Default`) VALUES
(1, 1, 'Vill+Post Khitaura Tehsil Bilsi Distric Budaun', 'Uttar Pradesh', '243633', 0),
(2, 1, 'Vill+Post Khitaura New Tehsil Bilsi Distric Budaun', 'Uttar Pradesh', '243633', 0),
(3, 2, 'Texgsdvcgbdmhkyj', 'Goa', '147852', 0),
(4, 3, 'dsbberb', 'Delhi', '110022', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_company`
--

CREATE TABLE `tbl_company` (
  `company_id` int(10) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_email` varchar(255) NOT NULL,
  `company_address` varchar(1000) NOT NULL,
  `company_gst` varchar(255) NOT NULL,
  `company_contact` varchar(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `account_holder` varchar(255) NOT NULL,
  `account_number` varchar(255) NOT NULL,
  `ifsc_code` varchar(255) NOT NULL,
  `company_logo` varchar(255) NOT NULL,
  `client_createdDate` datetime NOT NULL,
  `client_updateDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_company`
--

INSERT INTO `tbl_company` (`company_id`, `company_name`, `company_email`, `company_address`, `company_gst`, `company_contact`, `bank_name`, `account_holder`, `account_number`, `ifsc_code`, `company_logo`, `client_createdDate`, `client_updateDate`) VALUES
(1, 'company1', 'info@company1.com', 'Delhi', '07AAFPK67ARFVFG', '9210034313', 'Bank Name', 'company1', '0622002QWDCFRRT', 'IFSCCODE001', 'logo1.jpg', '2018-04-04 13:25:49', '2018-04-14 12:09:15'),
(2, 'Company2', 'info@company2.in', 'Delhi', 'QWE7AAFPK67ARFVFG', '9210034313', 'Bank Name', 'company1', '0622002QWDCFR', 'IFSCCODE002', 'logo2.png', '2018-04-05 07:42:19', '2018-04-05 14:29:51');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_courier`
--

CREATE TABLE `tbl_courier` (
  `courier_id` bigint(20) NOT NULL,
  `vendor_id` bigint(20) NOT NULL,
  `courier_name` varchar(20) NOT NULL,
  `courier_createDate` datetime NOT NULL,
  `courier_updateDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_courier`
--

INSERT INTO `tbl_courier` (`courier_id`, `vendor_id`, `courier_name`, `courier_createDate`, `courier_updateDate`) VALUES
(1, 1, 'FedEx', '2019-11-08 13:21:06', '0000-00-00 00:00:00'),
(2, 1, 'DTDC Courier', '2019-11-08 13:21:25', '2019-11-08 13:55:11'),
(4, 2, 'TrackOn', '2019-11-08 13:22:30', '0000-00-00 00:00:00'),
(5, 2, 'Akash Ganga', '2019-11-08 13:22:42', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_invoice`
--

CREATE TABLE `tbl_invoice` (
  `invoice_id` int(11) NOT NULL,
  `invoice_number` varchar(20) NOT NULL,
  `company_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `invoice_subtotal` varchar(50) NOT NULL,
  `amount_paid` varchar(50) NOT NULL,
  `amount_due` varchar(50) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `shipping_cost` varchar(255) NOT NULL,
  `invoice_createDate` datetime NOT NULL,
  `invoice_updateDate` datetime NOT NULL,
  `doctype` varchar(20) NOT NULL,
  `spl_msg` varchar(500) NOT NULL,
  `address_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_invoice`
--

INSERT INTO `tbl_invoice` (`invoice_id`, `invoice_number`, `company_id`, `client_id`, `invoice_subtotal`, `amount_paid`, `amount_due`, `payment_mode`, `shipping_cost`, `invoice_createDate`, `invoice_updateDate`, `doctype`, `spl_msg`, `address_id`) VALUES
(12, 'IN2018001', 1, 1, '10000', '0', '10000', 'Online Bank Transfer', '100', '2018-05-10 10:22:16', '0000-00-00 00:00:00', 'Invoice', '', 0),
(13, 'PI2018001', 2, 2, '6809.3', '0', '6809.3', 'Cheque', '400', '2018-05-10 10:29:31', '2018-05-10 10:45:05', 'Performa Invoice', '', 0),
(14, 'IN2018002', 2, 2, '6809.3', '0', '6809.3', 'Cheque', '400', '2018-05-10 10:48:35', '0000-00-00 00:00:00', 'Invoice', '', 0),
(15, 'PI2018002', 1, 4, '40822.5', '0', '40822.50', 'Online Bank Transfer', '1500', '2018-05-15 09:27:31', '2018-05-15 09:33:08', 'Performa Invoice', '', 0),
(179, 'PI2020006', 1, 1, '59100', '0', '59100', '0', '100', '2020-08-11 08:05:14', '2020-08-11 10:32:40', 'Performa Invoice', 'tr', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_invoiceproduct`
--

CREATE TABLE `tbl_invoiceproduct` (
  `invoice_product_id` int(11) NOT NULL,
  `invoice_id` varchar(20) NOT NULL,
  `product_id` int(111) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `gst_tax_amount` varchar(11) NOT NULL,
  `discount_rate` varchar(11) NOT NULL,
  `discount_amount` varchar(11) NOT NULL,
  `pro_total_amount` varchar(11) NOT NULL,
  `net_amount` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_invoiceproduct`
--

INSERT INTO `tbl_invoiceproduct` (`invoice_product_id`, `invoice_id`, `product_id`, `product_quantity`, `gst_tax_amount`, `discount_rate`, `discount_amount`, `pro_total_amount`, `net_amount`) VALUES
(62, 'PI2018005', 12, 3, '47.85', '0', '0.00', '957.00', '1004.85'),
(63, 'PI2018006', 12, 3, '47.85', '0', '0.00', '957.00', '1004.85'),
(64, 'PI2018007', 13, 1500, '63000.00', '0', '0.00', '525000.00', '588000.00'),
(65, 'PI2018008', 14, 1, '1008.00', '0', '0.00', '8400.00', '9408.00'),
(68, 'PI2018009', 15, 1, '50.00', '0', '0.00', '1000.00', '1050.00'),
(386, 'PI2019013', 179, 3, '539.64', '0', '0.00', '4497.00', '5036.64');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_invoice_product_new`
--

CREATE TABLE `tbl_invoice_product_new` (
  `id` bigint(10) NOT NULL,
  `invoice_id` varchar(20) NOT NULL,
  `product_name` varchar(150) NOT NULL,
  `product_price` float NOT NULL,
  `product_gst` float NOT NULL,
  `product_qty` int(10) NOT NULL,
  `pro_cal_gst_amount` float NOT NULL,
  `pro_disc_rate` float NOT NULL,
  `pro_disc_amount` float NOT NULL,
  `amount` float NOT NULL,
  `net_payable_product_amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_invoice_product_new`
--

INSERT INTO `tbl_invoice_product_new` (`id`, `invoice_id`, `product_name`, `product_price`, `product_gst`, `product_qty`, `pro_cal_gst_amount`, `pro_disc_rate`, `pro_disc_amount`, `amount`, `net_payable_product_amount`) VALUES
(2, 'PI2020003', 'Metal USB Pen Drive 8GB', 499, 18, 100, 8982, 0, 0, 49900, 58882),
(8, 'PI2020004', 'Designer Acrylic Trophy', 500, 18, 100, 9000, 0, 0, 50000, 59000),
(9, 'PI2020005', 'Pen Drive New 8GB', 159, 18, 100, 2862, 0, 0, 15900, 18762),
(11, 'PI2020006', 'Cap Royal Blue', 100, 18, 500, 9000, 0, 0, 50000, 59000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_last_login`
--

CREATE TABLE `tbl_last_login` (
  `id` bigint(20) NOT NULL,
  `userId` bigint(20) NOT NULL,
  `sessionData` varchar(2048) NOT NULL,
  `machineIp` varchar(1024) NOT NULL,
  `userAgent` varchar(128) NOT NULL,
  `agentString` varchar(1024) NOT NULL,
  `platform` varchar(128) NOT NULL,
  `createdDtm` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_last_login`
--

INSERT INTO `tbl_last_login` (`id`, `userId`, `sessionData`, `machineIp`, `userAgent`, `agentString`, `platform`, `createdDtm`) VALUES
(1, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 65.0.3325.181', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36', 'Windows 7', '2018-04-04 11:31:23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_hsn` varchar(100) NOT NULL,
  `product_gst` varchar(100) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `product_createdDate` datetime NOT NULL,
  `product_updateDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`product_id`, `product_name`, `product_hsn`, `product_gst`, `product_price`, `product_createdDate`, `product_updateDate`) VALUES
(1, 'Embroidered Polo Dri Mesh T-shirt White', '61099010', '5', '319', '2018-04-05 11:00:29', '2018-04-14 12:03:31'),
(2, 'Golf Cap', '70021458', '18', '199', '2018-04-07 11:01:47', '2018-04-14 12:04:11'),
(3, 'Acrylic Trophy', '89560125', '28', '799', '2018-04-07 11:07:37', '2018-04-24 11:12:45'),
(4, 'Mouse Pad', '12032457', '5', '99', '2018-04-11 09:30:13', '2018-04-14 08:21:53'),
(5, 'Fountain Lamy Pen', '12457896', '12', '599', '2018-04-11 09:36:20', '0000-00-00 00:00:00'),
(6, 'Plastic Ball Pen', '01287230', '18', '9', '2018-04-14 10:39:11', '2018-04-14 12:08:30'),
(7, 'Trouser', '6103', '5', '799', '2018-05-15 08:53:17', '0000-00-00 00:00:00'),
(8, 'Formal Shirt', '6105', '5', '699', '2018-05-15 08:53:37', '2018-05-15 09:24:55'),
(9, 'Waistcoat', '6110', '5', '699', '2018-05-15 08:54:20', '0000-00-00 00:00:00'),
(10, 'Housekeeping Uniform', '6103', '5', '1199', '2018-05-15 09:01:01', '2018-05-15 09:14:58'),
(11, 'Bow Tie', '6215', '5', '159', '2018-05-15 09:42:27', '0000-00-00 00:00:00'),
(12, 'Dri Fit Polo', '6109', '5', '319', '2018-05-22 06:42:52', '0000-00-00 00:00:00'),
(13, 'Lunch Box Khana Pani', '3926', '12', '350', '2018-05-26 12:39:37', '0000-00-00 00:00:00'),
(14, 'Gujrat Trophy', '83062120', '12', '8400', '2018-06-07 07:49:45', '0000-00-00 00:00:00'),
(15, 'Apron', '42034010', '5', '1000', '2018-06-08 06:24:02', '2018-06-08 06:25:22'),
(16, 'Round Neck Dri Fit Australian Yellow', '6109', '5', '499', '2018-06-12 09:24:31', '0000-00-00 00:00:00'),
(17, 'Steel Bottle', '732399', '12', '180', '2018-06-13 10:28:32', '0000-00-00 00:00:00'),
(18, 'Customized Printed Playing Card', '95044000', '18', '329', '2018-06-16 13:50:37', '0000-00-00 00:00:00'),
(19, 'Custom Printed Playing Card', '95044000', '18', '378', '2018-06-16 13:56:12', '0000-00-00 00:00:00'),
(20, 'Mens Shirt Black', '6025', '5', '650', '2018-06-26 07:22:08', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reset_password`
--

CREATE TABLE `tbl_reset_password` (
  `id` bigint(20) NOT NULL,
  `email` varchar(128) NOT NULL,
  `activation_id` varchar(32) NOT NULL,
  `agent` varchar(512) NOT NULL,
  `client_ip` varchar(32) NOT NULL,
  `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
  `createdBy` bigint(20) NOT NULL DEFAULT '1',
  `createdDtm` datetime NOT NULL,
  `updatedBy` bigint(20) DEFAULT NULL,
  `updatedDtm` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_reset_password`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_roles`
--

CREATE TABLE `tbl_roles` (
  `roleId` tinyint(4) NOT NULL COMMENT 'role id',
  `role` varchar(50) NOT NULL COMMENT 'role text'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_roles`
--

INSERT INTO `tbl_roles` (`roleId`, `role`) VALUES
(1, 'System Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shipdetail`
--

CREATE TABLE `tbl_shipdetail` (
  `shipping_id` bigint(20) NOT NULL,
  `performa_number` varchar(20) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `customer_address` varchar(200) NOT NULL,
  `customer_state` varchar(50) NOT NULL,
  `customer_pincode` varchar(10) NOT NULL,
  `customer_gst` varchar(20) NOT NULL,
  `customer_contact` varchar(15) NOT NULL,
  `vendor` int(5) NOT NULL,
  `ship_mode` varchar(10) NOT NULL,
  `courier` int(5) NOT NULL,
  `pLength` varchar(10) NOT NULL,
  `pWidth` varchar(10) NOT NULL,
  `pHeight` varchar(10) NOT NULL,
  `actual_weight` varchar(10) NOT NULL,
  `volumetric_weight` varchar(10) NOT NULL,
  `tracking_no` varchar(20) NOT NULL,
  `pickup_date` date NOT NULL,
  `commit_date` date NOT NULL,
  `recieving_date` date NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_shipdetail`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `userId` int(11) NOT NULL,
  `email` varchar(128) NOT NULL COMMENT 'login email',
  `password` varchar(128) NOT NULL COMMENT 'hashed login password',
  `name` varchar(128) DEFAULT NULL COMMENT 'full name of user',
  `mobile` varchar(20) DEFAULT NULL,
  `roleId` tinyint(4) NOT NULL,
  `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
  `createdBy` int(11) NOT NULL,
  `createdDtm` datetime NOT NULL,
  `updatedBy` int(11) DEFAULT NULL,
  `updatedDtm` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`userId`, `email`, `password`, `name`, `mobile`, `roleId`, `isDeleted`, `createdBy`, `createdDtm`, `updatedBy`, `updatedDtm`) VALUES
(1, 'admin@gmail.com', '$2y$10$OheKhUKtiTBCGigJPIyCHubXWTRnnL9VPrlu2cq6WBVTem/TbHOrW', 'System Administrator', '9890098900', 1, 0, 0, '2015-07-01 18:56:49', 1, '2018-04-24 06:10:33');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vendor`
--

CREATE TABLE `tbl_vendor` (
  `vendor_id` bigint(20) NOT NULL,
  `vendor_name` varchar(50) NOT NULL,
  `vendor_contact` varchar(20) NOT NULL,
  `vendor_address` varchar(200) NOT NULL,
  `vendor_gst` varchar(50) NOT NULL,
  `vendor_createDate` datetime NOT NULL,
  `vendor_updateDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_vendor`
--

INSERT INTO `tbl_vendor` (`vendor_id`, `vendor_name`, `vendor_contact`, `vendor_address`, `vendor_gst`, `vendor_createDate`, `vendor_updateDate`) VALUES
(1, 'Vikas Kumar Sharma', '9720305912', 'Ishwar Colony Bawana', 'saccsac12', '2019-11-08 11:56:56', '2019-11-09 09:40:28'),
(2, 'Lalit Yadav', '8745123569', 'Shalimar Garden', '', '2019-11-08 13:22:14', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `last_activity_idx` (`last_activity`);

--
-- Indexes for table `tbl_all_products`
--
ALTER TABLE `tbl_all_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_client`
--
ALTER TABLE `tbl_client`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `tbl_client_address`
--
ALTER TABLE `tbl_client_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_company`
--
ALTER TABLE `tbl_company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `tbl_courier`
--
ALTER TABLE `tbl_courier`
  ADD PRIMARY KEY (`courier_id`);

--
-- Indexes for table `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
  ADD PRIMARY KEY (`invoice_id`),
  ADD UNIQUE KEY `invoice_number` (`invoice_number`);

--
-- Indexes for table `tbl_invoiceproduct`
--
ALTER TABLE `tbl_invoiceproduct`
  ADD PRIMARY KEY (`invoice_product_id`);

--
-- Indexes for table `tbl_invoice_product_new`
--
ALTER TABLE `tbl_invoice_product_new`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_last_login`
--
ALTER TABLE `tbl_last_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_reset_password`
--
ALTER TABLE `tbl_reset_password`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  ADD PRIMARY KEY (`roleId`);

--
-- Indexes for table `tbl_shipdetail`
--
ALTER TABLE `tbl_shipdetail`
  ADD PRIMARY KEY (`shipping_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `tbl_vendor`
--
ALTER TABLE `tbl_vendor`
  ADD PRIMARY KEY (`vendor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_all_products`
--
ALTER TABLE `tbl_all_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3221;

--
-- AUTO_INCREMENT for table `tbl_client`
--
ALTER TABLE `tbl_client`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT for table `tbl_client_address`
--
ALTER TABLE `tbl_client_address`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_company`
--
ALTER TABLE `tbl_company`
  MODIFY `company_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_courier`
--
ALTER TABLE `tbl_courier`
  MODIFY `courier_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;

--
-- AUTO_INCREMENT for table `tbl_invoiceproduct`
--
ALTER TABLE `tbl_invoiceproduct`
  MODIFY `invoice_product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=503;

--
-- AUTO_INCREMENT for table `tbl_invoice_product_new`
--
ALTER TABLE `tbl_invoice_product_new`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_last_login`
--
ALTER TABLE `tbl_last_login`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=306;

--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;

--
-- AUTO_INCREMENT for table `tbl_reset_password`
--
ALTER TABLE `tbl_reset_password`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  MODIFY `roleId` tinyint(4) NOT NULL AUTO_INCREMENT COMMENT 'role id', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_shipdetail`
--
ALTER TABLE `tbl_shipdetail`
  MODIFY `shipping_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_vendor`
--
ALTER TABLE `tbl_vendor`
  MODIFY `vendor_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
