-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2020 at 11:39 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agrocraft`
--

-- --------------------------------------------------------

--
-- Table structure for table `buyerregistration`
--

CREATE TABLE `buyerregistration` (
  `buyer_id` int(255) NOT NULL,
  `buyer_name` varchar(30) NOT NULL,
  `buyer_phone` bigint(10) NOT NULL,
  `buyer_addr` text NOT NULL,
  `buyer_comp` varchar(100) NOT NULL,
  `buyer_license` varchar(100) NOT NULL,
  `buyer_bank` int(16) NOT NULL,
  `buyer_pan` varchar(10) NOT NULL,
  `buyer_mail` varchar(20) NOT NULL,
  `buyer_username` varchar(20) NOT NULL,
  `buyer_password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buyerregistration`
--

INSERT INTO `buyerregistration` (`buyer_id`, `buyer_name`, `buyer_phone`, `buyer_addr`, `buyer_comp`, `buyer_license`, `buyer_bank`, `buyer_pan`, `buyer_mail`, `buyer_username`, `buyer_password`) VALUES
(15, 'Abhishek', 1234567890, ' Raj Uday 234', 'Elysian.org', '02082000', 2147483647, '1234567890', 'abhi@hmil.com', 'admin', 'm8bf5+Y='),
(16, 'Arpit', 7666610976, 'Bhat Mansion', 'Mafia Pvt Ltd', '99', 12345, '987', 'abcd@gmail.com', 'redhawk', 'm9HW6O8B'),
(17, 'calista', 2589631472, '4/2,rose building .wadala', 'apple', 'w3566908', 8947, '2436467897', 'rose21@gmail.com', 'melissa', 'nM7d+e0b41E='),
(18, 'Lokesh', 9029788504, 'SEC -13 , PALM BEACH ROAD', '', 'MAHARASHTRA', 0, '1234567890', 'abhi@hmil.com', 'lokesh', 'yw==');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `product_id` int(255) NOT NULL,
  `phonenumber` bigint(10) NOT NULL,
  `qty` int(10) NOT NULL DEFAULT 1,
  `subtotal` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`product_id`, `phonenumber`, `qty`, `subtotal`) VALUES
(21, 1234567890, 1, 0),
(1, 1234567890, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Crops'),
(2, 'Vegetables'),
(3, 'Fruits');

-- --------------------------------------------------------

--
-- Table structure for table `farmerregistration`
--

CREATE TABLE `farmerregistration` (
  `farmer_id` int(255) NOT NULL,
  `farmer_name` varchar(255) NOT NULL,
  `farmer_phone` bigint(10) NOT NULL,
  `farmer_address` text NOT NULL,
  `farmer_state` varchar(50) NOT NULL,
  `farmer_district` varchar(50) NOT NULL,
  `farmer_pan` varchar(10) NOT NULL,
  `farmer_bank` int(16) NOT NULL,
  `farmer_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `farmerregistration`
--

INSERT INTO `farmerregistration` (`farmer_id`, `farmer_name`, `farmer_phone`, `farmer_address`, `farmer_state`, `farmer_district`, `farmer_pan`, `farmer_bank`, `farmer_password`) VALUES
(1, 'Abhishek', 8169193101, 'Mars', 'MAHARASHTRA', 'Thane', '1234567890', 2147483647, 'm8bf5+Y='),
(3, 'omkar', 8169193102, 'SEC -13 , PALM BEACH ROAD', 'KERALA', 'Alappuzha', '123ABC', 45745425, 'nMPb4g=='),
(4, 'Ram', 8169193103, 'Moon', 'MahaRASHTRA', 'Nagpur', '123ABC', 211324654, 'm8bf5+Y='),

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  `qty` int(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `delivery` varchar(10) NOT NULL,
  `phonenumber` bigint(10) NOT NULL,
  `total` int(10) NOT NULL,
  `payment` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `product_id`, `qty`, `address`, `delivery`, `phonenumber`, `total`, `payment`) VALUES
(1, 17, 2, '69 India Earth', 'Courier', 7666610976, 60, 'cod'),
(31, 25, 1, ' Raj Uday 234', 'Courier', 1234567890, 80, 'paytm'),
(32, 29, 2, ' Raj Uday 234', 'Courier', 1234567890, 100, 'paytm'),
(33, 27, 1, ' Raj Uday 234', 'Farmer', 1234567890, 200, 'paytm'),
(34, 17, 1, ' Raj Uday 234', 'Courier', 1234567890, 30, 'paytm'),
(35, 23, 2, 'Bhat Mansion', 'Farmer', 7666610976, 112, 'cod');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(100) NOT NULL,
  `farmer_fk` int(255) NOT NULL,
  `product_title` varchar(100) NOT NULL,
  `product_cat` varchar(100) NOT NULL,
  `product_type` varchar(100) NOT NULL,
  `product_expiry` varchar(25) NOT NULL,
  `product_image` text NOT NULL,
  `product_stock` int(100) NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_desc` text NOT NULL,
  `product_keywords` text NOT NULL,
  `product_delivery` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `farmer_fk`, `product_title`, `product_cat`, `product_type`, `product_expiry`, `product_image`, `product_stock`, `product_price`, `product_desc`, `product_keywords`, `product_delivery`) VALUES
(1, 1, 'Ramlal Potato', '2', 'Potato', '', 'Potato.webp', 1000, 12, 'Best Quality product guarented 100 percent', 'potato', 'yes'),
(3, 1, 'Ramlal Tomato', '2', 'Tomato', '', 'Tomato.jpg', 500, 5, 'Best Quality toamato assured', 'tomato , best quality tomato , Ramlal Tomato', 'no'),
(17, 3, 'Shivneri Bananas', '3', 'Bananas', '', 'Bananas.jpg', 250, 30, 'Best Quality Bananas', 'banana, shivneri ,', 'yes'),
(18, 3, 'Ram Rice', '1', 'Rice', '', 'Rice.jpg', 1500, 2, 'waqd', 'best rice', 'yes'),
(19, 1, 'Ansh Carrot', '2', 'Carrot', '', 'Carrot.jpg', 1250, 56, 'Big fat juicy best quality carrots assured', 'carrot,best carrot', 'yes'),
(21, 1, 'Abhi Maize', '1', 'Maize', '', 'Maize.jpg', 750, 99, 'Seeds Import from australia , grown with love', 'Maize,best Maize', 'yes'),
(22, 3, 'Calista Coconut', '1', 'Coconut', '', 'Coconut.jpg', 450, 12, 'Better than others', 'Coconut,best Coconut', 'no'),
(23, 1, 'Arpit Grapes', '3', 'Grapes', '', 'Green Grapes.jpg', 4560, 56, 'Best Grapes you will ever find', 'grapes,green grapes,best grapes', 'yes'),
(24, 1, 'Arpit Apples', '3', 'Apple', '', 'Apple.jpg', 1500, 101, 'Best Apples grown in Kashmir and handled with love and care', 'apples,apple,best apple', 'no'),
(25, 1, 'Ramlal Wheat', '1', 'Wheat', '', 'Wheat.jpg', 2000, 80, 'Thin , Fragrant wheat grains grown with love', 'wheat,best quality wheat,best wheat', 'no'),
(26, 3, 'Ansh Coffee', '1', 'Coffee', '', '', 1500, 500, 'Best  Quality Coffee grown in Assam', 'coffee,best coffee', 'no'),
(27, 3, 'Arpit Alphonso Mango', '3', 'Mango', '', 'Mango.jpg', 2000, 200, 'Grown with love in Ratnagiri', 'mango,alponso mango,best mango', 'yes'),
(28, 1, 'Ansh Custard Apple', '3', 'Custard Apple', '', 'custartapple.cms', 500, 45, 'Custard Apple so tasty ,to die for', 'Custard Apple,custart apple, apple, best custard apple', 'yes'),
(29, 3, 'Omkar Cabbage', '2', 'Cabbage', '', 'Cabbage.jpg', 1500, 50, 'Best Quality Cabbage', 'cabbage, best Cabbage', 'yes'),
(30, 1, 'Ansh Onion', '2', 'Onion', '', 'Onion.jpg', 1500, 65, 'Grown with love', 'Onion,best onion', 'no'),
(31, 1, 'Abhi Strawberry', '3', 'Strawberry', '', 'strawberry.jpg', 100, 25, 'Best Strawberrys all over India ', 'Strawberry,best strawberry', 'yes'),

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buyerregistration`
--
ALTER TABLE `buyerregistration`
  ADD PRIMARY KEY (`buyer_id`),
  ADD UNIQUE KEY `buyer_username` (`buyer_username`),
  ADD UNIQUE KEY `buyer_phone` (`buyer_phone`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `farmerregistration`
--
ALTER TABLE `farmerregistration`
  ADD UNIQUE KEY `farmer_id` (`farmer_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `phonenumber` (`phonenumber`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `farmer_fk` (`farmer_fk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buyerregistration`
--
ALTER TABLE `buyerregistration`
  MODIFY `buyer_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `farmerregistration`
--
ALTER TABLE `farmerregistration`
  MODIFY `farmer_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
