-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 17, 2014 at 03:45 PM
-- Server version: 5.6.16
-- PHP Version: 5.4.16

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
-- Table structure for table `bulk_order`
--

CREATE TABLE IF NOT EXISTS `bulk_order` (
  `user_nm` varchar(100) NOT NULL DEFAULT 'user',
  `qty` int(11) NOT NULL DEFAULT '0',
  `item_id` int(16) NOT NULL DEFAULT '0',
  `txn_id` int(16) NOT NULL DEFAULT '0',
  `order_id` bigint(16) NOT NULL DEFAULT '0',
  `order_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `delivery_time` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `status` varchar(25) NOT NULL DEFAULT 'NO',
  `cost` int(11) NOT NULL DEFAULT '0',
  `shipping_address` varchar(500) NOT NULL DEFAULT 'safsdg',
  `mobile_no` bigint(11) NOT NULL DEFAULT '7894561230',
  `item_name` varchar(256) NOT NULL DEFAULT 'item1',
  `email_id` varchar(100) NOT NULL DEFAULT 'stven@iweit.com',
  `vendor_name` varchar(200) NOT NULL DEFAULT 'vendor',
  UNIQUE KEY `item_id` (`item_id`,`txn_id`,`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bulk_order`
--

INSERT INTO `bulk_order` (`user_nm`, `qty`, `item_id`, `txn_id`, `order_id`, `order_time`, `delivery_time`, `status`, `cost`, `shipping_address`, `mobile_no`, `item_name`, `email_id`, `vendor_name`) VALUES
('test', 0, 0, 1, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NO', 0, 'safsdg', 7894561230, 'item1', 'stven@iweit.com', 'vendor'),
('rocks', 4, 1, 1, 1, '2014-04-12 10:47:20', NULL, 'NO', 1000, 'dihing iitg', 2133243454, 'shirt', 'vsdhvsgasd a', 'vendor'),
('pintukumar', 5, 2, 0, 1557534, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NO', 150, 'wcerg', 2147483647, 'cap', 'qkonwcr@wxc.com', 'vendor'),
('pintukumar', 5, 2, 0, 11562534, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NO', 150, 'wcerg', 2147483647, 'cap', 'qkonwcr@wxc.com', 'vendor'),
('pintukumar', 5, 2, 0, 21452534, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NO', 150, 'wcerg', 2147483647, 'cap', 'qkonwcr@wxc.com', 'vendor'),
('pintukumar', 5, 2, 0, 31231534, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NO', 150, 'wcerg', 2147483647, 'cap', 'qkonwcr@wxc.com', 'vendor'),
('pintu.kumar', 5, 5, 0, 12047534, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NO', 500, 'dihing iitg', 2147483647, 'book', 'pintukumar0702@gmail.com', 'vendor'),
('pintukumar', 5, 5, 0, 13778534, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NO', 500, 'wcerg', 2147483647, 'book', 'qkonwcr@wxc.com', 'vendor'),
('test', 7, 5, 1, 2, '2014-04-17 10:14:12', '0000-00-00 00:00:00', 'NO', 21000, 'dsffa sf ', 9876543210, 'games', 'ppij@ldsl.com', 'user0'),
('a.akash', 4, 6, 7, 7, '2014-04-12 14:20:00', NULL, 'NO', 1450, 'dihing room no. 147', 2147483647, 'theory book', 'rajnibaba22@gmail.com', 'vendor'),
('r.abhinav', 2, 45, 9, 10, '2014-04-11 15:23:03', NULL, 'NO', 570, 'kameng A137', 2147483647, 'ls323 chip', 'r.abhinav@iitg.ernet.in', 'vendor'),
('v.vishnu', 3, 4554, 8, 12, '2014-04-13 06:40:00', NULL, 'NO', 1022, 'siang room no.453', 2147483647, ' trouser', 'tyush@myush.com', 'vendor');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
