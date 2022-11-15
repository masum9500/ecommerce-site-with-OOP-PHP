-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2022 at 03:28 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `adminEmail` varchar(255) NOT NULL,
  `adminPass` varchar(32) NOT NULL,
  `level` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `adminName`, `adminUser`, `adminEmail`, `adminPass`, `level`) VALUES
(1, 'Masum Billah', 'admin', 'masumbillah7286@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brandId` int(11) NOT NULL,
  `brandName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brandId`, `brandName`) VALUES
(1, 'Iphone'),
(2, 'Samsung'),
(3, 'Acer'),
(4, 'Canon');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cartId` int(11) NOT NULL,
  `sId` varchar(255) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`cartId`, `sId`, `productId`, `productName`, `price`, `quantity`, `image`) VALUES
(2, '2f1sc981j21rdp3a0gimq81l2j', 9, 'ACER', 428.02, 2, 'upload/3d7995416e.jpg'),
(9, '0cvgr12qdfna1dc44ubri6h21u', 8, 'SAMSUNG', 621.75, 1, 'upload/ce6bf3b995.jpg'),
(15, 'kj3m01k5f295lmc4jlgsjlsh55', 6, 'Iphone', 505.22, 2, 'upload/ff5307bc98.png'),
(16, 'kj3m01k5f295lmc4jlgsjlsh55', 8, 'SAMSUNG', 621.75, 1, 'upload/ce6bf3b995.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `catId` int(11) NOT NULL,
  `catName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`catId`, `catName`) VALUES
(2, 'Mobile Phones'),
(3, 'Desktop'),
(4, 'Laptop'),
(5, 'Accessories'),
(6, 'Software'),
(7, 'Sports &amp; Fitness'),
(8, 'Footwear'),
(9, 'Jewellery'),
(10, 'Home Decor & Kitchen');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL,
  `zip` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `name`, `address`, `city`, `country`, `zip`, `phone`, `email`, `pass`) VALUES
(1, 'Hamid Khan', '105/2,Puraton chowdhury para cumilla', 'Cumilla', 'Bangladesh', '3500', '01521380914', 'masumbillah150082@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `catId` int(11) NOT NULL,
  `brandId` int(11) NOT NULL,
  `body` text NOT NULL,
  `price` float(10,3) NOT NULL,
  `image` varchar(255) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`productId`, `productName`, `catId`, `brandId`, `body`, `price`, `image`, `type`) VALUES
(6, 'Iphone', 2, 1, '<p>Lorem ipsum dolor sit amet sed do eiusmod.Lorem ipsum dolor sit amet sed do eiusmod.Lorem ipsum dolor sit amet sed do eiusmod.Lorem ipsum dolor sit amet sed do eiusmod.Lorem ipsum dolor sit amet sed do eiusmod.Lorem ipsum dolor sit amet sed do eiusmod.Lorem ipsum dolor sit amet sed do eiusmod.</p>\r\n<p>Lorem ipsum dolor sit amet sed do eiusmod.Lorem ipsum dolor sit amet sed do eiusmod.Lorem ipsum dolor sit amet sed do eiusmod.Lorem ipsum dolor sit amet sed do eiusmod.Lorem ipsum dolor sit amet sed do eiusmod.Lorem ipsum dolor sit amet sed do eiusmod.Lorem ipsum dolor sit amet sed do eiusmod.</p>\r\n<p>Lorem ipsum dolor sit amet sed do eiusmod.Lorem ipsum dolor sit amet sed do eiusmod.Lorem ipsum dolor sit amet sed do eiusmod.Lorem ipsum dolor sit amet sed do eiusmod.Lorem ipsum dolor sit amet sed do eiusmod.Lorem ipsum dolor sit amet sed do eiusmod.Lorem ipsum dolor sit amet sed do eiusmod.</p>', 505.220, 'upload/ff5307bc98.png', 0),
(8, 'SAMSUNG', 10, 2, '<p><span>Lorem ipsum dolor sit amet, sed do eiusmod&nbsp;<span>Lorem ipsum dolor sit amet, sed do eiusmod.<span>Lorem ipsum dolor sit amet, sed do eiusmod&nbsp;<span>Lorem ipsum dolor sit amet, sed do eiusmod.</span><span>Lorem ipsum dolor sit amet, sed do eiusmod&nbsp;<span>Lorem ipsum dolor sit amet, sed do eiusmod.Lorem ipsum dolor sit amet, sed do eiusmod&nbsp;Lorem ipsum dolor sit amet, sed do eiusmod.Lorem ipsum dolor sit amet, sed do eiusmod&nbsp;Lorem ipsum dolor sit amet, sed do eiusmod.Lorem ipsum dolor sit amet, sed do eiusmod&nbsp;Lorem ipsum dolor sit amet, sed do eiusmod.</span></span></span></span></span></p>\r\n<p><span><span><span><span><span>Lorem ipsum dolor sit amet, sed do eiusmod&nbsp;Lorem ipsum dolor sit amet, sed do eiusmod.Lorem ipsum dolor sit amet, sed do eiusmod&nbsp;Lorem ipsum dolor sit amet, sed do eiusmod.Lorem ipsum dolor sit amet, sed do eiusmod&nbsp;Lorem ipsum dolor sit amet, sed do eiusmod.</span></span></span></span></span></p>', 621.750, 'upload/ce6bf3b995.jpg', 0),
(9, 'ACER', 3, 3, '<p><span>Lorem ipsum dolor sit amet, sed do eiusmod.</span><span>Lorem ipsum dolor sit amet, sed do eiusmod.</span><span>Lorem ipsum dolor sit amet, sed do eiusmod.</span><span>Lorem ipsum dolor sit amet, sed do eiusmod.</span><span>Lorem ipsum dolor sit amet, sed do eiusmod.</span><span>Lorem ipsum dolor sit amet, sed do eiusmod.</span></p>\r\n<p><span>Lorem ipsum dolor sit amet, sed do eiusmod.Lorem ipsum dolor sit amet, sed do eiusmod.Lorem ipsum dolor sit amet, sed do eiusmod.Lorem ipsum dolor sit amet, sed do eiusmod.Lorem ipsum dolor sit amet, sed do eiusmod.Lorem ipsum dolor sit amet, sed do eiusmod.</span></p>', 428.020, 'upload/3d7995416e.jpg', 0),
(10, 'ACER', 10, 3, '<p><span>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content.</span><span>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content.</span></p>\r\n<p><span>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content.</span><span>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content.</span></p>', 457.880, 'upload/d5ee6ca076.jpg', 0),
(11, 'CANON', 5, 4, '<p><span>Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.&nbsp;</span></p>\r\n<p><span>Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.&nbsp;</span></p>\r\n<p><span>Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.&nbsp;</span></p>', 300.000, 'upload/0a8e71aee4.png', 1),
(12, 'Laptop Samsung Feature', 8, 1, '<p><span>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is available.</span><span>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is available.</span></p>\r\n<p><span>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is available.</span><span>In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is available.</span></p>', 300.000, 'upload/302b68686c.jpg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brandId`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cartId`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`catId`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`productId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brandId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
