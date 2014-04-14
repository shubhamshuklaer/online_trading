-- phpMyAdmin SQL Dump
-- version 4.0.6deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 14, 2014 at 06:20 AM
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
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `user_nm` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_nm`, `pic_loc`, `user_nm`, `item_id`, `quantity`, `cost`, `item_condition`, `description`, `timestamp`, `type`, `promotion_amnt`, `category`, `last_date`, `author_nm`, `genre`, `brand`, `model`, `sale_type`, `start_date`) VALUES
('how are u', 'dsfs', 'sdjfhas', 1, 1, 1, 'sdgad', 'gsaddgsad', '2014-04-02 11:10:02', 'sgdas', 111, 'sadfsa', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL),
('how are u', 'dsfs', 'sdjfhas', 2, 1, 1, 'sdgad', 'gsaddgsad', '2014-04-02 11:10:11', 'sgdas', 111, 'sadfsa', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL),
('how are u', 'dsfs', 'sdjfhas', 3, 1, 1, 'sdgad', 'gsaddgsad', '2014-04-02 11:10:17', 'sgdas', 111, 'sadfsa', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL),
('how are u', 'dsfs', 'sdjfhas', 4, 1, 1, 'sdgad', 'gsaddgsad', '2014-04-02 11:10:22', 'sgdas', 111, 'sadfsa', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL),
('dsa', NULL, NULL, 5, NULL, 31, 'cx', 'dsa', '2014-04-09 17:00:03', NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL),
('dsa', NULL, NULL, 6, NULL, 0, 'z', 'z', '2014-04-10 06:00:45', NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL),
('n', NULL, NULL, 7, NULL, 0, 'n', 'n', '2014-04-10 06:01:42', NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL),
('m', NULL, NULL, 8, NULL, 0, 'm', 'm', '2014-04-10 06:02:08', NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL),
('l', NULL, NULL, 9, NULL, 0, 'l', 'l', '2014-04-10 06:02:34', NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL),
('j', NULL, NULL, 10, NULL, 0, 'j', 'j', '2014-04-10 06:03:13', NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL),
('q', NULL, NULL, 11, NULL, 0, 'q', 'q', '2014-04-10 06:03:48', NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL),
('2', NULL, NULL, 12, NULL, 2, '2', '2', '2014-04-10 06:04:17', NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL),
('mobile', NULL, NULL, 13, NULL, 32, '32', '23', '2014-04-10 06:50:31', NULL, NULL, NULL, '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL),
('test', NULL, NULL, 14, 23, 23, '32', '23', '2014-04-10 10:06:44', 'Mobile', NULL, 'electronics', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL),
('fiction', NULL, NULL, 15, NULL, 0, 'fiction', 'fiction', '2014-04-10 10:31:22', NULL, NULL, 'books', '0000-00-00 00:00:00', 'fiction', 'fiction', NULL, NULL, NULL, NULL),
('kitchen', NULL, NULL, 16, NULL, 0, 'jhkj', 'nkhj', '2014-04-10 10:52:41', 'Mobile', NULL, 'appliances', '0000-00-00 00:00:00', NULL, NULL, 'hksahkh', 'khkj', NULL, NULL),
('12', NULL, NULL, 17, NULL, 21, '21', '21', '2014-04-10 13:33:48', 'Pens', NULL, 'appliances', '0000-00-00 00:00:00', NULL, NULL, '21', '21', NULL, NULL),
('shubhakar', NULL, NULL, 18, 0, 0, 'hihi', 'hi', '2014-04-11 14:24:14', 'Mobile', NULL, 'electronics', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, 'auction', NULL),
('', NULL, NULL, 19, 0, 0, '', '', '2014-04-11 14:33:10', '', NULL, 'electronics', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, 'auction', NULL),
('1', NULL, NULL, 20, 1, 1, '11', '1', '2014-04-12 10:00:00', 'Mobile', NULL, 'electronics', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, 'auction', NULL),
('1', NULL, NULL, 21, 1, 1, '11', '1', '2014-04-12 10:00:13', 'Mobile', NULL, 'electronics', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, 'auction', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `user_nm` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `txn_id` int(11) NOT NULL,
  `order_id` varchar(50) NOT NULL,
  `order_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `delivery_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` varchar(25) NOT NULL,
  PRIMARY KEY (`order_id`)
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
('vishwa', '0e2b6d67bf66999592c5feef8df1c02237bc9f43', 0, 'Siang Hostel', 9864512378, 'vangala@iitg.ernet.in', 'Vishwadeep');

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
