-- phpMyAdmin SQL Dump
-- version 4.0.6deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 14, 2014 at 07:54 AM
-- Server version: 5.5.35-0ubuntu0.13.10.2
-- PHP Version: 5.5.3-1ubuntu2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `online_trading`
--

-- --------------------------------------------------------

--
-- Table structure for table `auction_bidder`
--

CREATE TABLE IF NOT EXISTS `auction_bidder` (
  `user_nm` varchar(100) NOT NULL,
  `item_id` int(11) NOT NULL,
  `bid` int(11) NOT NULL,
  `bid_id` varchar(150) NOT NULL,
  PRIMARY KEY (`bid_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bulk_order`
--

CREATE TABLE IF NOT EXISTS `bulk_order` (
  `user_nm` varchar(100) NOT NULL DEFAULT 'user',
  `qty` int(11) NOT NULL DEFAULT '0',
  `item_id` int(11) NOT NULL DEFAULT '0',
  `txn_id` int(11) NOT NULL DEFAULT '0',
  `order_id` varchar(50) NOT NULL DEFAULT '123',
  `order_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `delivery_time` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `status` varchar(25) NOT NULL DEFAULT 'NO',
  `cost` int(11) NOT NULL DEFAULT '0',
  `shipping_address` varchar(500) NOT NULL DEFAULT '0',
  `mobile_no` int(10) NOT NULL DEFAULT '0',
  `item_name` varchar(256) NOT NULL DEFAULT 'item',
  `email_id` varchar(100) NOT NULL DEFAULT 'email',
  UNIQUE KEY `item_id` (`item_id`,`txn_id`,`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bulk_order`
--

INSERT INTO `bulk_order` (`user_nm`, `qty`, `item_id`, `txn_id`, `order_id`, `order_time`, `delivery_time`, `status`, `cost`, `shipping_address`, `mobile_no`, `item_name`, `email_id`) VALUES
('user', 0, 0, 0, '123', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NO', 50, '0', 0, 'cellphone', 'email');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `user_nm` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`user_nm`, `qty`, `item_id`) VALUES
('ayantika', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `categories_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categories_name`) VALUES
('Electronics'),
('Electronics:Fan'),
('Mobile'),
('Laptop'),
('testing'),
('testing:test');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `item_nm` varchar(100) NOT NULL,
  `pic_loc` varchar(100) DEFAULT NULL,
  `user_nm` varchar(100) DEFAULT NULL,
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `quantity` int(11) DEFAULT NULL,
  `cost` int(11) NOT NULL,
  `item_condition` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `type` varchar(10) DEFAULT NULL,
  `promotion_amnt` int(11) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `last_date` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `author_nm` varchar(500) DEFAULT NULL,
  `genre` varchar(500) DEFAULT NULL,
  `brand` varchar(100) DEFAULT NULL,
  `model` varchar(250) DEFAULT NULL,
  `sale_type` varchar(50) DEFAULT NULL,
  `start_date` timestamp NULL DEFAULT NULL,
  `delivery_type` varchar(100) NOT NULL DEFAULT 'normal',
  `tax` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_nm`, `pic_loc`, `user_nm`, `item_id`, `quantity`, `cost`, `item_condition`, `description`, `timestamp`, `type`, `promotion_amnt`, `category`, `last_date`, `author_nm`, `genre`, `brand`, `model`, `sale_type`, `start_date`, `delivery_type`, `tax`) VALUES
('Tulip Bouquet', 'just tulips.jpeg', 'sdjfhas', 1, 15, 111, 'New', 'gsaddgsad', '2014-04-14 07:34:56', 'sgdas', 111, 'sadfsa', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, 'instant', 12),
('card', 'btrfly.jpg', 'sdjfhas', 2, 56, 185, 'New', 'gsaddgsad', '2014-04-14 05:49:58', 'sgdas', 111, 'sadfsa', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, 'normal', 13),
('cart uml', 'cart.png', 'sdjfhas', 3, 424, 1000, 'New', 'gsaddgsad', '2014-04-14 05:34:23', 'sgdas', 111, 'sadfsa', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, 'normal', 5),
('how are u', 'btrfly.jpg', 'sdjfhas', 4, 95, 1885, 'Old', 'gsaddgsad', '2014-04-14 06:21:20', 'sgdas', 111, 'sadfsa', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, 'normal', 10),
('bla-bla', 'cart.png', 'khilhg', 5, 44, 55555, 'New', 'jllllllllllllllll', '2014-04-14 06:15:53', '', 444, '', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, 'instant', 5),
('fkjlsa', '6.jpg', NULL, 23, 21, 42, 'fdsakjl', 'description:f;lkjds;category:electronics;type:Mobile;brand:kdgsjh;name:fkjlsa;mrp:42;base_price:123;close_date:2014-04-02 12:35:37;model:dkgsal;', '2014-04-14 07:06:49', 'Mobile', NULL, 'electronics', '2014-04-02 07:05:37', NULL, NULL, NULL, NULL, 'auction', NULL, 'normal', 0);

-- --------------------------------------------------------

--
-- Table structure for table `old_bulk_orders`
--

CREATE TABLE IF NOT EXISTS `old_bulk_orders` (
  `user_nm` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `txn_id` int(11) NOT NULL,
  `order_id` varchar(50) NOT NULL,
  `order_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `delivery_time` timestamp NULL DEFAULT NULL,
  `status` varchar(25) NOT NULL DEFAULT 'NO',
  `cost` int(11) NOT NULL DEFAULT '0',
  `shipping_address` varchar(500) NOT NULL,
  `mobile_no` int(10) NOT NULL,
  `item_name` varchar(256) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  UNIQUE KEY `item_id` (`item_id`,`txn_id`,`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `old_bulk_orders`
--

INSERT INTO `old_bulk_orders` (`user_nm`, `qty`, `item_id`, `txn_id`, `order_id`, `order_time`, `delivery_time`, `status`, `cost`, `shipping_address`, `mobile_no`, `item_name`, `email_id`) VALUES
('userdcvds', 0, 0, 0, '123', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NO', 1520, 'dfv', 0, 'item', 'email'),
('456', 1, 1, 12, '32', '2014-04-29 18:30:00', '0000-00-00 00:00:00', 'NO', 459, '123', 456123789, 'de', 'rf'),
('lily', 4, 5, 7, '7', '2014-04-12 21:01:27', NULL, 'NO', 1000, 'subu iitg', 2143243454, 'scirt', 'sdgdfgcxv'),
('raja.kumar', 2, 13, 14, '14', '2014-04-02 20:04:00', NULL, 'NO', 760, 'dihing iitg ', 2147483647, 'sw12678  toshiba', 'rajacseiitg@gmail.com'),
('sanigrahi.sashwatha', 3, 15, 16, '16', '2014-04-01 17:05:00', NULL, 'NO', 10567, 'iitg ', 2147483647, 'gtksba,lhs', 'satsljk@shlk.com'),
('user123', 12, 34, 456, '789', '2014-04-29 18:30:00', '2014-04-16 04:30:00', 'NO', 1500, 'fdgggs dfgs', 789456123, 'ddv', 'emaildfddf'),
('pintu.kumar', 1, 238, 11, '12', '2014-04-03 21:20:50', NULL, 'NO', 560, 'dihing iitg room no. 258', 2147483647, 'kleignberg and tardos', 'pintukumar0702@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `user_nm` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `txn_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` varchar(50) NOT NULL,
  `order_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `delivery_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` varchar(25) NOT NULL,
  `address` varchar(200) NOT NULL,
  `delivery_type` varchar(100) NOT NULL,
  PRIMARY KEY (`txn_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=80 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`user_nm`, `qty`, `item_id`, `txn_id`, `order_id`, `order_time`, `delivery_time`, `status`, `address`, `delivery_type`) VALUES
('ayantika', 1, 1, 1, '20140413BB28', '2013-08-06 03:06:58', '2014-04-14 07:00:00', 'Delivered', '', ''),
('ayantika', 1, 1, 3, '201404137DDB', '2013-10-26 03:06:58', '2014-04-14 07:00:00', 'Delivered', '', ''),
('ayantika', 1, 1, 5, '20140413093D', '2013-11-30 03:06:58', '2014-04-14 07:00:00', 'Delivered', '', ''),
('ayantika', 1, 1, 7, '20140413D51E', '2014-04-14 03:06:58', '2014-04-14 07:00:00', 'Delivered', '', ''),
('ayantika', 1, 1, 9, '2014041377FF', '2014-04-14 03:06:58', '2014-04-14 07:00:00', 'Delivered', '', ''),
('ayantika', 1, 1, 11, '2014041369A9', '2014-04-14 03:06:58', '2014-04-14 07:00:00', 'Delivered', 'C-102,Subansiri,\r\nIIT Guwahati,\r\nGuwahati-781039,\r\nAssam', 'instant'),
('ayantika', 1, 1, 13, '201404136E48', '2014-04-14 03:06:58', '2014-04-14 07:00:00', 'Delivered', 'dfx xzc,sdcdzs', 'instant'),
('ayantika', 1, 1, 15, '20140413B779', '2014-04-14 03:06:58', '2014-04-14 07:00:00', 'Delivered', 'gfcmnbm hjbmn,,gjkn,m,.m,.yyy', 'instant'),
('ayantika', 1, 1, 17, '201404137B5D', '2014-04-14 03:06:58', '2014-04-14 07:00:00', 'Delivered', 'gfcmnbm hjbmn,,gjkn,m,.m,.yyy', 'instant'),
('ayantika', 1, 1, 19, '201404134AD9', '2014-04-14 03:06:58', '2014-04-14 07:00:00', 'Delivered', 'gfcmnbm hjbmn,,gjkn,m,.m,.yyy', 'instant'),
('ayantika', 1, 1, 21, '20140413E2F3', '2014-04-14 03:06:58', '2014-04-14 07:00:00', 'Delivered', 'gfcmnbm hjbmn,,gjkn,m,.m,.yyy', 'instant'),
('ayantika', 1, 1, 23, '201404136350', '2014-04-14 03:06:58', '2014-04-14 07:00:00', 'Delivered', 'gfcmnbm hjbmn,,gjkn,m,.m,.yyy', 'instant'),
('ayantika', 1, 1, 25, '20140413E1D3', '2014-04-14 03:06:58', '2014-04-14 07:00:00', 'Delivered', 'gfcmnbm hjbmn,,gjkn,m,.m,.yyy', 'instant'),
('ayantika', 1, 1, 37, '2014041410C1', '2014-04-14 03:06:58', '2014-04-14 07:00:00', 'Delivered', 'gfcmnbm hjbmn,,gjkn,m,.m,.yyy', 'instant'),
('ayantika', 1, 1, 39, '20140414F387', '2014-04-14 03:06:58', '2014-04-14 07:00:00', 'Delivered', 'gfcmnbm hjbmn,,gjkn,m,.m,.yyy', 'instant'),
('ayantika', 1, 1, 43, '201404143483', '2014-04-14 03:06:58', '2014-04-14 07:00:00', 'Delivered', 'gfcmnbm hjbmn,,gjkn,m,.m,.yyy', 'instant'),
('ayantika', 1, 1, 45, '20140414B745', '2014-04-14 03:06:58', '2014-04-14 07:00:00', 'Delivered', 'gfcmnbm hjbmn,,gjkn,m,.m,.yyy', 'instant'),
('ayantika', 1, 1, 47, '2014041442BD', '2014-04-14 03:06:58', '2014-04-14 07:00:00', 'Delivered', 'gfcmnbm hjbmn,,gjkn,m,.m,.yyy', 'instant'),
('ayantika', 1, 1, 49, '201404140EC2', '2014-04-14 03:06:58', '2014-04-14 07:00:00', 'Delivered', 'gfcmnbm hjbmn,,gjkn,m,.m,.yyy', 'instant'),
('ayantika', 1, 1, 52, '20140414C664', '2014-04-14 03:06:58', '2014-04-14 07:00:00', 'Delivered', 'gfcmnbm hjbmn,,gjkn,m,.m,.yyy', 'instant'),
('ayantika', 2, 1, 54, '201404144532', '2014-04-14 03:06:58', '2014-04-14 07:00:00', 'Delivered', 'efseed sddffd eeffdsdf', 'instant'),
('ayantika', 1, 1, 55, '2014041493FD', '2014-04-14 03:06:58', '2014-04-14 07:00:00', 'Delivered', 'efseed sddffd eeffdsdf', 'instant'),
('ayantika', 1, 1, 56, '2014041482E8', '2014-04-14 03:06:58', '2014-04-14 07:00:00', 'Delivered', 'efseed sddffd eeffdsdf', 'instant'),
('ayantika', 0, 0, 57, '2014041418CE', '2014-04-14 03:11:34', '0000-00-00 00:00:00', 'Not Delivered', 'efseed sddffd eeffdsdf', ''),
('ayantika', 1, 2, 58, '2014041418CE', '2014-04-14 03:11:34', '0000-00-00 00:00:00', 'Not Delivered', 'efseed sddffd eeffdsdf', 'normal'),
('ayantika', 1, 1, 59, '201404144991', '2014-04-14 03:15:29', '0000-00-00 00:00:00', 'Not Delivered', 'efseed sddffd eeffdsdf', 'instant'),
('ayantika', 0, 0, 60, '20140414CE48', '2014-04-14 03:20:45', '0000-00-00 00:00:00', 'Not Delivered', 'efseed sddffd eeffdsdf', ''),
('ayantika', 1, 2, 61, '20140414CE48', '2014-04-14 03:20:45', '0000-00-00 00:00:00', 'Not Delivered', 'efseed sddffd eeffdsdf', 'normal'),
('ayantika', 1, 1, 62, '201404149903', '2014-04-14 03:24:46', '0000-00-00 00:00:00', 'Not Delivered', 'efseed sddffd eeffdsdf', 'instant'),
('ayantika', 0, 0, 63, '2014041444D2', '2014-04-14 03:34:07', '0000-00-00 00:00:00', 'Not Delivered', 'efseed sddffd eeffdsdf', ''),
('ayantika', 1, 2, 64, '20140414E005', '2014-04-14 03:34:08', '0000-00-00 00:00:00', 'Not Delivered', 'efseed sddffd eeffdsdf', 'normal'),
('ayantika', 1, 2, 65, '20140414CBF4', '2014-04-14 03:39:07', '0000-00-00 00:00:00', 'Not Delivered', 'efseed sddffd eeffdsdf', ''),
('ayantika', 1, 2, 66, '20140414D188', '2014-04-14 03:40:54', '0000-00-00 00:00:00', 'Not Delivered', 'efseed sddffd eeffdsdf', ''),
('ayantika', 1, 2, 67, '20140414E37B', '2014-04-14 03:41:45', '0000-00-00 00:00:00', 'Not Delivered', 'efseed sddffd eeffdsdf', ''),
('ayantika', 1, 1, 68, '201404142B96', '2014-04-14 03:56:54', '0000-00-00 00:00:00', 'Not Delivered', 'efseed sddffd eeffdsdf', 'instant'),
('ayantika', 5, 1, 69, '20140414F628', '2014-04-14 04:11:21', '0000-00-00 00:00:00', 'Not Delivered', 'efseed sddffd eeffdsdf', 'normal'),
('ayantika', 3, 2, 70, '20140414A7C9', '2014-04-14 04:12:45', '0000-00-00 00:00:00', 'Not Delivered', 'C/O: Aya kit<br>jnpij, ihpiyu.v,.j;vofu', 'normal'),
('ayantika', 3, 1, 71, '201404148B72', '2014-04-14 04:17:21', '0000-00-00 00:00:00', 'Not Delivered', 'efseed sddffd eeffdsdf', 'normal'),
('ayantika', 4, 2, 72, '201404146806', '2014-04-14 04:41:40', '0000-00-00 00:00:00', 'Not Delivered', 'efseed sddffd eeffdsdf', 'normal'),
('ayantika', 6, 3, 73, '201404146806', '2014-04-14 04:41:40', '0000-00-00 00:00:00', 'Not Delivered', 'efseed sddffd eeffdsdf', 'normal'),
('ayantika', 8, 4, 74, '201404146806', '2014-04-14 04:41:40', '0000-00-00 00:00:00', 'Not Delivered', 'efseed sddffd eeffdsdf', 'normal'),
('ayantika', 1, 1, 75, '20140414A617', '2014-04-14 04:52:53', '0000-00-00 00:00:00', 'Not Delivered', 'efseed sddffd eeffdsdf', 'instant'),
('ayantika', 2, 3, 76, '20140414DF39', '2014-04-14 05:34:23', '0000-00-00 00:00:00', 'Not Delivered', 'efseed sddffd eeffdsdf', 'normal'),
('ayantika', 6, 2, 77, '201404149891', '2014-04-14 05:49:58', '0000-00-00 00:00:00', 'Not Delivered', 'efseed sddffd eeffdsdf', 'normal'),
('ayantika', 1, 5, 78, '201404141975', '2014-04-14 06:15:53', '0000-00-00 00:00:00', 'Not Delivered', 'efseed sddffd eeffdsdf', 'instant'),
('ayantika', 10, 4, 79, '20140414174B', '2014-04-14 06:21:20', '0000-00-00 00:00:00', 'Not Delivered', 'efseed sddffd eeffdsdf', 'normal');

-- --------------------------------------------------------

--
-- Table structure for table `saved_list`
--

CREATE TABLE IF NOT EXISTS `saved_list` (
  `user_nm` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `search_history`
--

CREATE TABLE IF NOT EXISTS `search_history` (
  `user_nm` varchar(100) NOT NULL,
  `search_text` varchar(200) NOT NULL,
  `search_id` int(11) NOT NULL AUTO_INCREMENT,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `num_reps` int(11) NOT NULL,
  PRIMARY KEY (`search_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `search_history`
--

INSERT INTO `search_history` (`user_nm`, `search_text`, `search_id`, `timestamp`, `num_reps`) VALUES
('shubham', 'hello how are u', 16, '2014-04-01 08:28:43', 5),
('shubham', 'hello', 17, '2014-04-01 08:36:26', 3),
('swapnil', 'hello how do u do', 18, '2014-04-01 08:36:58', 2);

-- --------------------------------------------------------

--
-- Table structure for table `search_index`
--

CREATE TABLE IF NOT EXISTS `search_index` (
  `search_term` varchar(20) NOT NULL,
  `item_id` int(11) NOT NULL,
  `rep_name` int(11) NOT NULL DEFAULT '0',
  `rep_category` int(11) NOT NULL DEFAULT '0',
  `rep_description` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`search_term`,`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `search_index`
--

INSERT INTO `search_index` (`search_term`, `item_id`, `rep_name`, `rep_category`, `rep_description`) VALUES
('gdsa', 1, 0, 1, 1),
('go', 1, 0, 0, 1),
('hello', 1, 1, 0, 1),
('hello', 2, 1, 0, 0),
('hello', 3, 1, 0, 0),
('hello', 4, 1, 0, 0),
('hello', 5, 6, 0, 0),
('hello', 6, 1, 0, 0),
('rain', 1, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `shipment_requirements`
--

CREATE TABLE IF NOT EXISTS `shipment_requirements` (
  `id` int(11) NOT NULL DEFAULT '0',
  `min_cost` int(11) NOT NULL DEFAULT '0',
  `min_items` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipment_requirements`
--

INSERT INTO `shipment_requirements` (`id`, `min_cost`, `min_items`) VALUES
(0, 6, 79);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_nm` varchar(100) NOT NULL,
  `pass` varchar(500) NOT NULL,
  `credit` int(11) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `name` text,
  PRIMARY KEY (`user_nm`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_nm`, `pass`, `credit`, `address`, `phone`, `email`, `name`) VALUES
('paraggangil', '0e2b6d67bf66999592c5feef8df1c02237bc9f43', 0, 'Siang Hostel', 9706876687, 'paraggangil@gmail.com', 'Parag Gangil'),
('s.rishi', 'ad3bf4b4b2de3976e49c6a774a361fcce46335f0', 0, 'Hostel', 9864278581, 'rishi@asd.com', 'Rishi Sharma'),
('shubahm', 'abcd', 999999999, 'dskla;jflks', 2318392891, 'jdklsaj', 'shubham'),
('shubham', 'abcd', 2147483647, 'dskla;jflks', 2318392891, 'jdklsaj', 'shubham'),
('vishwa', '0e2b6d67bf66999592c5feef8df1c02237bc9f43', 0, 'Siang Hostel', 9864512378, 'vangala@iitg.ernet.in', 'Vishwadeep');

-- --------------------------------------------------------

--
-- Table structure for table `vendor's database`
--

CREATE TABLE IF NOT EXISTS `vendor's database` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `Threshold` int(11) NOT NULL DEFAULT '0',
  `cost` int(11) NOT NULL DEFAULT '0',
  `discount` int(11) NOT NULL DEFAULT '0',
  `no_of_orders` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='This is the table for vendors.' AUTO_INCREMENT=19 ;

--
-- Dumping data for table `vendor's database`
--

INSERT INTO `vendor's database` (`id`, `name`, `Threshold`, `cost`, `discount`, `no_of_orders`) VALUES
(0, 'cellphone', 2, 50, 45, 0),
(2, 'cap', 3, 30, 0, 0),
(5, 'games', 50, 3000, 15, 0),
(6, 'shirt', 100, 1000, 10, 0),
(7, 'book', 56, 100, 50, 0),
(8, 'bag', 5, 989, 10, 0),
(11, 'go', 90, 9089, 45, 0),
(12, 'red', 5, 4, 6, 0),
(13, 'green', 56, 56, 4, 0),
(14, 'blue', 45, 45, 45, 0);

-- --------------------------------------------------------

--
-- Table structure for table `vendor's details`
--

CREATE TABLE IF NOT EXISTS `vendor's details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL DEFAULT 'user_name',
  `password` varchar(50) NOT NULL DEFAULT 'user_password',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='This is the table which contains the  details of vendors.' AUTO_INCREMENT=3 ;

--
-- Dumping data for table `vendor's details`
--

INSERT INTO `vendor's details` (`id`, `username`, `password`) VALUES
(0, 'user0', 'pass0'),
(1, 'user1', 'pass1'),
(2, 'user2', 'pass2');

-- --------------------------------------------------------

--
-- Table structure for table `watch_list`
--

CREATE TABLE IF NOT EXISTS `watch_list` (
  `user_nm` varchar(100) NOT NULL,
  `item_id` int(11) NOT NULL,
  PRIMARY KEY (`user_nm`,`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wish_list`
--

CREATE TABLE IF NOT EXISTS `wish_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_nm` varchar(100) NOT NULL,
  `user_nm` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `item_id` int(11) DEFAULT NULL,
  `Tags` longtext,
  `availability` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `wish_list`
--

INSERT INTO `wish_list` (`id`, `item_nm`, `user_nm`, `category`, `item_id`, `Tags`, `availability`) VALUES
(3, 'Bicycle', 's.rishi', 'Electronics', NULL, 'asas;d;asa;sd;asd;as;dasd;', 'not'),
(4, 'asrasrasdfa', 's.rishi', 'Electronics', NULL, '3', 'not');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
