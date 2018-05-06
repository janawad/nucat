-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: May 21, 2016 at 06:36 AM
-- Server version: 5.5.44-37.3
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `emefocus_nuc`
--

-- --------------------------------------------------------

--
-- Table structure for table `buyers`
--

CREATE TABLE IF NOT EXISTS `buyers` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `buyer_name` varchar(100) NOT NULL,
  `business_name` varchar(100) NOT NULL,
  `address` blob NOT NULL,
  `tin` varchar(100) NOT NULL,
  `pan` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `office` varchar(20) NOT NULL,
  `year_of_inception` varchar(10) NOT NULL,
  `categories` blob NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL,
  `reg_date` datetime NOT NULL,
  `activation_date` datetime NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `updated_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `buyers`
--

INSERT INTO `buyers` (`id`, `buyer_name`, `business_name`, `address`, `tin`, `pan`, `phone`, `mobile`, `office`, `year_of_inception`, `categories`, `email`, `password`, `status`, `reg_date`, `activation_date`, `updated_by`, `updated_on`) VALUES
(1, 'srini buyer', 'EMEfocus', 0x42616e67616c6f7265, 'A123', 'B123', '8121627811', '9035761122', '', '2000', 0x737364662c2064736b666a736466, 'seenu619@gmail.com', 'fd6aa68700a195cc205cf07ed38d1702', '1', '2016-02-17 23:41:56', '2016-02-19 23:19:27', 'admin', '2016-02-19 23:19:27'),
(2, 'dawood', 'dawood', 0x6461776f6f64, 'dawood', 'dawood', '', '8884362160', '1111111', '2015', 0x6b6a686766647368, 'mohammed.dawood24@gmail.com', 'fd6aa68700a195cc205cf07ed38d1702', '3', '2016-03-03 11:36:00', '0000-00-00 00:00:00', 'admin', '2016-03-17 22:15:56'),
(3, 'vikas11', 'dfgndfbg', 0x64666e726e2c64666e672c6e71, '846582326', '856322558', '', '9886899159', '852369741', '2015', 0x736869727473, 'VIKAS11CHOPRA@GMAIL.COM', 'fd6aa68700a195cc205cf07ed38d1702', '3', '2016-03-11 19:23:06', '0000-00-00 00:00:00', 'admin', '2016-03-17 22:15:52'),
(4, 'Prakash', 'Premdeep', 0x4c616c206275696c64696e672042616e67616c6f7265, '1234567890', '1111111111', '', '9900960591', '08022259727', '1996', 0x416c6c, 'prakashjainmail@gmail.com', 'fd6aa68700a195cc205cf07ed38d1702', '1', '2016-03-16 12:39:19', '2016-03-16 12:46:37', 'admin', '2016-03-16 12:46:37'),
(5, 'vikas11', 'CHOPRAEXPORTS', 0x564953444a4e44464a4b474e444b464e47, '12368522', '255d5gf5sdf', '', '9343598844', '08022257957', '2015', 0x736869727473, 'vikas11chopra@hotmail.com', 'fd6aa68700a195cc205cf07ed38d1702', '1', '2016-03-17 19:20:16', '2016-03-17 22:15:45', 'admin', '2016-03-17 22:15:45');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(100) NOT NULL,
  `parent_category_id` varchar(100) NOT NULL,
  `status` int(10) NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `updated_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `parent_category_id`, `status`, `updated_by`, `updated_on`) VALUES
(1, 'Mens', '0', 1, 'admin', '2016-03-01 17:25:00'),
(2, 'shirts', '1', 1, 'admin', '2016-03-01 15:10:06'),
(3, 'formals', '2', 1, 'admin', '2016-03-01 15:10:22'),
(4, 'Womens', '0', 1, 'admin', '2016-03-01 15:31:39'),
(6, 'Tshirts', '1', 1, 'admin', '2016-03-01 18:08:41'),
(8, 'TOPS', '4', 1, 'admin', '2016-03-02 17:22:43'),
(9, 'T.SHIRTS', '4', 1, 'admin', '2016-03-02 17:23:27'),
(10, 'Boys', '0', 1, 'admin', '2016-03-02 17:25:16'),
(11, 'Shirts', '10', 1, 'admin', '2016-03-02 17:25:42'),
(12, 'Pants', '10', 1, 'admin', '2016-03-02 17:25:54'),
(13, 'T- Shirts', '10', 1, 'admin', '2016-03-02 17:26:05'),
(14, 'Inner Wear', '10', 1, 'admin', '2016-03-02 17:26:17'),
(15, 'Ethnic Wear', '10', 1, 'admin', '2016-03-02 17:26:29'),
(16, 'Suits & Blazers', '10', 1, 'admin', '2016-03-02 17:26:43'),
(17, 'Leggings', '4', 1, 'admin', '2016-03-02 17:27:29'),
(18, 'Salwar', '4', 1, 'admin', '2016-03-02 17:27:40'),
(19, 'Night Wear', '4', 1, 'admin', '2016-03-02 17:27:49'),
(20, 'Lingerie', '4', 1, 'admin', '2016-03-02 17:28:02'),
(21, 'Bra', '20', 1, 'admin', '2016-03-02 17:28:24'),
(22, 'Panties', '20', 1, 'admin', '2016-03-02 17:28:38'),
(23, 'Sports Wear', '4', 1, 'admin', '2016-03-02 17:28:55'),
(24, 'kurtis', '4', 1, 'admin', '2016-03-02 17:29:05'),
(25, 'Briefs', '14', 1, 'admin', '2016-03-02 17:29:41'),
(26, 'Vests', '14', 1, 'admin', '2016-03-02 17:29:56'),
(27, 'Girls', '0', 1, 'admin', '2016-03-02 17:30:12'),
(28, 'Tops', '27', 1, 'admin', '2016-03-02 17:30:28'),
(29, 'Pants', '27', 1, 'admin', '2016-03-02 17:30:46'),
(30, 'Pants', '27', 1, 'admin', '2016-03-02 17:30:48'),
(31, 'Jeans', '27', 1, 'admin', '2016-03-02 17:31:06'),
(32, 'Leggings', '27', 1, 'admin', '2016-03-02 17:31:15'),
(33, 'Skirts', '27', 1, 'admin', '2016-03-02 17:31:23'),
(34, 'Frocks', '27', 1, 'admin', '2016-03-02 17:31:32'),
(35, 'Winter Wear', '27', 1, 'admin', '2016-03-02 17:31:40'),
(36, 'kurtis', '27', 1, 'admin', '2016-03-02 17:31:47'),
(37, 'Infants', '0', 1, 'admin', '2016-03-02 17:31:57'),
(38, 'Baba Suits', '37', 1, 'admin', '2016-03-02 17:32:11'),
(39, 'Pants', '1', 1, 'admin', '2016-03-02 18:40:19'),
(40, 'Ethnic Wear', '1', 1, 'admin', '2016-03-02 18:41:53'),
(42, 'NIGHT WEAR', '1', 1, 'admin', '2016-03-02 18:44:30'),
(43, 'Inner Wear', '1', 0, 'admin', '2016-03-16 10:45:53'),
(44, 'Vests', '1', 1, 'admin', '2016-03-02 18:45:26'),
(45, 'Briefs', '1', 1, 'admin', '2016-03-02 18:45:39'),
(46, 'Sports Wear', '1', 1, 'admin', '2016-03-02 18:46:03'),
(47, 'Track Suits', '46', 1, 'admin', '2016-03-02 18:46:53'),
(48, 'Track Pants', '46', 1, 'admin', '2016-03-02 18:47:35'),
(49, '22', '45', 1, 'admin', '2016-03-03 16:25:15'),
(50, 'Jeans', '4', 1, 'admin', '2016-04-08 23:12:08');

-- --------------------------------------------------------

--
-- Table structure for table `products_cart`
--

CREATE TABLE IF NOT EXISTS `products_cart` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `product_id` varchar(50) NOT NULL,
  `price_id` varchar(50) NOT NULL,
  `buyer_id` varchar(50) NOT NULL,
  `status` int(10) NOT NULL,
  `updated_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `products_cart`
--

INSERT INTO `products_cart` (`id`, `product_id`, `price_id`, `buyer_id`, `status`, `updated_on`) VALUES
(9, '6', '7', '1', 0, '2016-04-15 19:01:00'),
(15, '1', '2', '1', 0, '2016-05-11 11:57:15'),
(16, '1', '1', '1', 1, '2016-05-11 12:04:45'),
(17, '3', '4', '4', 1, '2016-05-13 22:56:33');

-- --------------------------------------------------------

--
-- Table structure for table `products_cart_final`
--

CREATE TABLE IF NOT EXISTS `products_cart_final` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `cart_id` varchar(100) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `status` int(10) NOT NULL,
  `updated_on` datetime NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `products_cart_final`
--

INSERT INTO `products_cart_final` (`id`, `cart_id`, `quantity`, `status`, `updated_on`, `updated_by`) VALUES
(1, '1', '1', 1, '2016-04-11 16:46:07', 'srini buyer'),
(2, '4', '24', 1, '2016-04-14 17:20:56', 'srini buyer'),
(3, '3', '24', 1, '2016-04-14 17:26:32', 'srini buyer'),
(4, '4', '24', 1, '2016-04-14 17:26:32', 'srini buyer'),
(6, '6', '12', 1, '2016-04-14 17:33:22', 'srini buyer'),
(7, '7', '18', 1, '2016-04-14 17:33:22', 'srini buyer'),
(10, '8', '8', 1, '2016-04-14 17:34:12', 'srini buyer'),
(11, '10', '1', 1, '2016-04-18 13:13:55', 'srini buyer'),
(12, '12', '5', 1, '2016-05-10 11:56:53', 'srini buyer'),
(14, '16', '2', 1, '2016-05-11 12:15:34', 'srini buyer'),
(15, '16', '2', 1, '2016-05-11 12:17:40', 'srini buyer');

-- --------------------------------------------------------

--
-- Table structure for table `products_details`
--

CREATE TABLE IF NOT EXISTS `products_details` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `category` varchar(100) NOT NULL,
  `parent_category` int(50) NOT NULL,
  `sub_colors` varchar(100) NOT NULL,
  `brand_name` varchar(100) NOT NULL,
  `size_from` varchar(100) NOT NULL,
  `size_to` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `product_id` varchar(100) NOT NULL,
  `product_fit` varchar(100) NOT NULL,
  `fabric` varchar(100) NOT NULL,
  `colors` varchar(100) NOT NULL,
  `sales_packages` varchar(100) NOT NULL,
  `style` varchar(100) NOT NULL,
  `inventory` varchar(100) NOT NULL,
  `availability` varchar(100) NOT NULL,
  `description` blob NOT NULL,
  `vendor_id` varchar(100) NOT NULL,
  `image_name` varchar(100) NOT NULL,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `products_details`
--

INSERT INTO `products_details` (`id`, `category`, `parent_category`, `sub_colors`, `brand_name`, `size_from`, `size_to`, `price`, `product_id`, `product_fit`, `fabric`, `colors`, `sales_packages`, `style`, `inventory`, `availability`, `description`, `vendor_id`, `image_name`, `status`) VALUES
(1, '2', 1, 'greean', 'PUMA', '', '', '', '11111', '111111111', '111111', 'Blue', '12', 'style', '10', 'Available', 0x4e6577207368697274732077697468204e65772064657369676e73, '1', '', 1),
(2, '6', 1, 'greean', 'PUMA', '', '', '', '11111', '111111111', '111111', 'Blue', '12', 'style', '10', 'Available', 0x4e6577207368697274732077697468204e65772064657369676e73, '1', '', 1),
(3, '2', 1, 'White', 'Prak', '', '', '', 'Prak123', 'Slim', 'Cotton', 'White', '3', 'Solids', '30', 'Available', 0x57686974652073686972747320736c696d20666974, '5', '', 1),
(4, '2', 1, 'Reddish pink', 'Prak', '', '', '', 'Prak124', 'Slim', 'Cotton', 'Pink', '4', 'Solids', '40', 'Available', 0x52656420636f74746f6e20736869727473, '5', '', 1),
(5, '6', 1, 'Zed black', 'Prak', '', '', '', 'Prak125', 'Regular', 'Cotton', 'Black', '3', 'Crew neck', '30', 'Available', 0x4261746d616e2074736869727473207075726520636f74746f6e, '5', '', 1),
(6, '2', 1, 'SKY BLUE', 'CHECK', '', '', '', 'CHECK001', 'REGULAR', 'COTTON', 'Blue', '36', '24', '24', 'Available', 0x4a4446474a4446484a44464847, '2', '', 1),
(7, '24', 4, 'KAS', 'ZARA', '', '', '', 'ZARA1', 'M', 'COTTON', 'Pink', '4', 'SLIM', '36', 'Available', 0x4849554849455248474f4552505752504f57454c4b46484f, '5', '', 1),
(8, '8', 4, 'DARK GRAY', 'VIKA', '', '', '', 'VIKA111', 'REGULAR', 'COTTON', 'Gray', '5', 'FULL SLEEVE', '25', 'Available', 0x524547554c415220544f505320464f522043415355414c2057454152, '2', '', 1),
(9, '45', 1, '', 'Polo', '', '', '', '123456', 'hytf', 'vgfcvbj', 'White', '10', 'hjkn', '60', 'Available', 0x73646667686a6b6c6c6b6a686766, '1', '', 2),
(10, '40', 1, '', 'Polo', '', '', '', '123456', 'hytf', 'vgfcvbj', 'White', '10', 'hjkn', '60', 'Available', 0x73646667686a6b6c6c6b6a686766, '1', '', 2),
(11, '40', 1, '', 'Polo', '', '', '', '123456', 'hytf', 'vgfcvbj', 'White', '10', 'hjkn', '60', 'Available', 0x73646667686a6b6c6c6b6a686766, '1', '', 2),
(12, '45', 1, '', 'Polo', '', '', '', '123456', 'asdfghj', 'qwedfghj', 'Blue', '11', 'qwd', '110', 'Available', 0x61736466672c686766647361, '1', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `products_images`
--

CREATE TABLE IF NOT EXISTS `products_images` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `product_id` int(10) NOT NULL,
  `image_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `products_images`
--

INSERT INTO `products_images` (`id`, `product_id`, `image_name`) VALUES
(1, 1, 'icon.png'),
(2, 1, 'images1.jpeg'),
(5, 3, '22:15:20IMG_1460565427415.jpeg'),
(6, 4, '22:18:37IMG_1460565537635.jpeg'),
(8, 5, '22:25:43IMG_1460565680458.jpeg'),
(9, 6, '17:08:246.jpg'),
(10, 6, '17:08:2494d7608b0b8b21cf2ceaeea33025d6b1c.jpg'),
(11, 6, '17:08:24basics-red-checkered-men-shirt-12bsh28029.jpg'),
(12, 8, '11:41:3871-Lole-Women-s-Fancy-Round-Neck-Tank-Top-1.jpg'),
(13, 8, '11:41:392015-plus-size-font-b-women-s-b-font-clothing-half-sleeve-100-cotton-loose-shirt.jpg'),
(14, 8, '11:41:39c21ee78742b4313927f4bba813bcb35f_(1).jpg'),
(15, 10, '11:29:171.jpg'),
(16, 10, '11:29:17alumni.png'),
(17, 10, '11:29:17bms4.jpg'),
(18, 11, '11:29:341.jpg'),
(19, 11, '11:29:34alumni.png'),
(20, 11, '11:29:34bms4.jpg'),
(21, 12, '11:31:431.jpg'),
(22, 2, '11:45:51aa.png');

-- --------------------------------------------------------

--
-- Table structure for table `products_reviews`
--

CREATE TABLE IF NOT EXISTS `products_reviews` (
  `product_id` int(10) NOT NULL,
  `price_id` int(10) NOT NULL,
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `review_product` varchar(100) NOT NULL,
  `staring` int(10) NOT NULL,
  `updated_by` varchar(50) NOT NULL,
  `updated_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `products_reviews`
--

INSERT INTO `products_reviews` (`product_id`, `price_id`, `id`, `review_product`, `staring`, `updated_by`, `updated_on`) VALUES
(4, 5, 1, 'Nice Shirt', 0, 'srini buyer', '2016-04-14 16:43:54'),
(4, 5, 2, 'Good After Sales Service And Prompt Reply ', 0, 'srini buyer', '2016-04-14 17:19:42'),
(4, 5, 3, 'Dddddd', 0, 'srini buyer', '2016-04-18 13:13:03'),
(8, 8, 4, 'NYC VISCOSE TOPS', 0, 'srini buyer', '2016-05-10 11:52:26');

-- --------------------------------------------------------

--
-- Table structure for table `product_prices`
--

CREATE TABLE IF NOT EXISTS `product_prices` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `product_id` varchar(100) NOT NULL,
  `sizes_from` varchar(100) NOT NULL,
  `sizes_to` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `product_prices`
--

INSERT INTO `product_prices` (`id`, `product_id`, `sizes_from`, `sizes_to`, `price`) VALUES
(1, '1', '5', '7', '5000'),
(2, '1', '8', '10', '5500'),
(3, '1', '11', '14', '6000'),
(4, '3', '12', '13', '325'),
(5, '4', '12', '14', '350'),
(6, '5', '15', '17', '150'),
(7, '6', '5', '8', '395'),
(8, '8', '20', '24', '250'),
(9, '8', '20', '24', '250'),
(10, '2', '16', '17', '500');

-- --------------------------------------------------------

--
-- Table structure for table `product_size`
--

CREATE TABLE IF NOT EXISTS `product_size` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `category_id` int(10) NOT NULL,
  `sizes` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=119 ;

--
-- Dumping data for table `product_size`
--

INSERT INTO `product_size` (`id`, `category_id`, `sizes`) VALUES
(1, 49, '21'),
(2, 49, '22'),
(3, 49, '23'),
(4, 49, '25'),
(5, 2, '38'),
(6, 2, '40'),
(7, 2, '42'),
(8, 2, '44'),
(9, 2, '46'),
(10, 2, '48'),
(11, 2, 'L'),
(12, 2, 'M'),
(13, 2, 'XL'),
(14, 2, 'XXL'),
(15, 6, 'S'),
(16, 6, 'M'),
(17, 6, 'L'),
(18, 6, 'Xl'),
(19, 6, 'XXL'),
(20, 8, 'S'),
(21, 8, ' M'),
(22, 8, ' L'),
(23, 8, ' XL'),
(24, 8, ' XXL'),
(25, 8, ' FREE'),
(26, 15, '0'),
(27, 15, '1'),
(28, 15, '2'),
(29, 15, '3'),
(30, 15, '4'),
(31, 15, '5'),
(32, 15, '6'),
(33, 15, '7'),
(34, 15, '8'),
(35, 15, '9'),
(36, 15, '10'),
(37, 15, '11'),
(38, 15, '12'),
(39, 15, '13'),
(40, 15, '14'),
(41, 15, '15'),
(42, 15, '16'),
(43, 40, '36'),
(44, 40, '38'),
(45, 40, '40'),
(46, 40, '42'),
(47, 40, '44'),
(48, 40, '46'),
(49, 40, 'S'),
(50, 40, 'M'),
(51, 40, 'L'),
(52, 40, 'XL'),
(53, 40, 'XXL'),
(54, 3, '36'),
(55, 3, '38'),
(56, 3, '40'),
(57, 3, '42'),
(58, 3, '44'),
(59, 3, '46'),
(60, 3, 'S'),
(61, 3, 'M'),
(62, 3, 'L'),
(63, 3, 'XL'),
(64, 3, 'XXL'),
(65, 34, '16'),
(66, 34, '18'),
(67, 34, '20'),
(68, 34, '22'),
(69, 34, '24'),
(70, 34, '26'),
(71, 34, '28'),
(72, 34, '30'),
(73, 34, '32'),
(74, 34, '34'),
(75, 34, '36'),
(76, 34, ''),
(77, 31, '16'),
(78, 31, '18'),
(79, 31, '20'),
(80, 31, '22'),
(81, 31, '24'),
(82, 31, '26'),
(83, 31, '28'),
(84, 31, '30'),
(85, 31, '32'),
(86, 31, '34'),
(87, 31, '36'),
(88, 31, '38'),
(89, 31, '40'),
(90, 50, '28'),
(91, 50, '30'),
(92, 50, '32'),
(93, 50, '34'),
(94, 50, '36'),
(95, 50, '38'),
(96, 50, '40'),
(97, 50, '42'),
(98, 36, 'S'),
(99, 36, 'M'),
(100, 36, 'L'),
(101, 36, 'XL'),
(102, 36, 'XXL'),
(103, 36, '22'),
(104, 36, '24'),
(105, 36, '26'),
(106, 36, '28'),
(107, 36, '30'),
(108, 36, '32'),
(109, 36, '34'),
(110, 36, '36'),
(111, 36, '38'),
(112, 36, '40'),
(113, 24, 'S'),
(114, 24, 'M'),
(115, 24, 'L'),
(116, 24, 'XL'),
(117, 24, 'XXL'),
(118, 24, 'XXXL');

-- --------------------------------------------------------

--
-- Table structure for table `sadmin`
--

CREATE TABLE IF NOT EXISTS `sadmin` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `sadmin`
--

INSERT INTO `sadmin` (`id`, `username`, `password`) VALUES
(1, 'admin', '9a618248b64db62d15b300a07b00580b');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE IF NOT EXISTS `vendors` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `vendor_name` varchar(100) NOT NULL,
  `business_name` varchar(100) NOT NULL,
  `address` blob NOT NULL,
  `tin` varchar(100) NOT NULL,
  `pan` varchar(100) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `office` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL,
  `reg_date` datetime NOT NULL,
  `activation_date` datetime NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `updated_on` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `vendor_name`, `business_name`, `address`, `tin`, `pan`, `brand`, `phone`, `mobile`, `office`, `email`, `password`, `status`, `reg_date`, `activation_date`, `updated_by`, `updated_on`) VALUES
(1, 'Srinivas', 'EMEfocus', 0x42616e67616c6f7265, 'A123', 'B123', 'SOFTWARE', '', '9035761122', '', 'srini@gmail.com', 'fd6aa68700a195cc205cf07ed38d1702', '1', '2016-02-25 16:17:30', '2016-03-18 16:33:55', 'admin', '2016-03-18 16:33:55'),
(2, 'Srinivas', 'EMEfocus', 0x42616e67616c6f7265, 'A123', 'B123', 'SOFTWARE', '', '9035761133', '', 'seenu619@gmail.com', 'fd6aa68700a195cc205cf07ed38d1702', '1', '2016-02-22 07:30:13', '2016-03-18 16:34:00', 'admin', '2016-03-18 16:34:00'),
(3, 'rahul', 'JJJ', 0x58595a, '6780', '789', 'Adidas', '', '9844142007', '42017044', 'rahuldante31@gmail.com', 'fd6aa68700a195cc205cf07ed38d1702', '0', '2016-03-02 19:07:18', '2016-03-18 16:34:07', 'admin', '2016-03-18 16:34:07'),
(4, 'VIKAS', 'CHOPRAEXPORTS', 0x564953444a4e44464a4b474e444b464e47, '12368522', '326SD65DF', 'SANSKRITI', '', '9886899159', '08022257957', 'VIKAS11CHOPRA@GMAIL.COM', 'fd6aa68700a195cc205cf07ed38d1702', '1', '2016-03-02 19:39:12', '2016-03-03 15:41:27', 'admin', '2016-03-03 15:41:27'),
(5, 'PRAKASH', 'PREMDEEP', 0x564953444a4e44464a4b474e444b464e47, '12368522', '2D25SDD2', 'SANSKRITI', '', '9900960591', '08022257957', 'prakashjainmail@gmail.com', 'fd6aa68700a195cc205cf07ed38d1702', '1', '2016-03-02 19:47:21', '2016-03-03 15:41:35', 'admin', '2016-03-03 15:41:35'),
(6, 'JJJ', 'hji', 0x6a6969, '8900', '9876', 'oiuyt', '', '1234567890', '08042017088', 'rahul@jjjitech.com', 'fd6aa68700a195cc205cf07ed38d1702', '3', '2016-03-02 19:47:29', '0000-00-00 00:00:00', 'admin', '2016-03-17 18:37:13'),
(7, 'jjjitech', 'fashion', 0x717765, '1234567', '1234567', 'luxury', '', '9900093765', '08042017088', 'naveen@jjjitech.com', 'fd6aa68700a195cc205cf07ed38d1702', '3', '2016-03-02 19:52:27', '0000-00-00 00:00:00', 'admin', '2016-03-17 18:37:09'),
(8, 'sudarsan', 'emefocus', 0x6a6179616e61676172, '123456', '321654987', 'ttttttttt', '', '8892771289', '123456', 'msudha626@gmail.com', 'fd6aa68700a195cc205cf07ed38d1702', '3', '2016-03-03 10:34:28', '0000-00-00 00:00:00', 'admin', '2016-03-03 15:41:57'),
(10, 'sudarsan', 'emefocus', 0x73737373, 'sss', 'sssss', 'sssss', '', '8884362160', '123456', 'mohammed.dawood@gmail.com', 'fd6aa68700a195cc205cf07ed38d1702', '3', '2016-03-03 11:18:47', '0000-00-00 00:00:00', 'admin', '2016-03-03 15:41:46'),
(15, 'dawood', 'dawood', 0x6461776f6f64, 'dawood', 'dawood', 'dawood', '', '8884362160', '123456', 'mohammed.dawood24@gmail.com', 'fd6aa68700a195cc205cf07ed38d1702', '3', '2016-03-03 12:09:44', '0000-00-00 00:00:00', 'admin', '2016-03-17 18:37:06'),
(16, 'JJJ', 'JJJ', 0x4a4a4a, 'JJJ', 'JJJ', 'JJJ', '', '1234567890', '123456', 'jjjitech@gmail.com', 'fd6aa68700a195cc205cf07ed38d1702', '0', '2016-03-03 12:59:29', '2016-03-18 16:34:19', 'admin', '2016-03-18 16:34:19'),
(17, 'vikas', 'CHOPRAEXPORTS', 0x76696b6473667673666d, '86652255', '85236559', 'd,fnfn', '', '9343598844', '08022257957', 'VIKAS11CHOPRA@hotmail.COM', 'fd6aa68700a195cc205cf07ed38d1702', '3', '2016-03-11 19:21:33', '0000-00-00 00:00:00', 'admin', '2016-03-17 18:37:02');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
