-- phpMyAdmin SQL Dump
-- version 4.0.6deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 07, 2014 at 01:20 PM
-- Server version: 5.5.35-0ubuntu0.13.10.2
-- PHP Version: 5.5.3-1ubuntu2.2

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

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `item_nm` varchar(100) NOT NULL,
  `pic_loc` varchar(100) NOT NULL,
  `user_nm` varchar(100) NOT NULL,
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `quantity` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  `item_condition` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `type` varchar(10) NOT NULL,
  `promotion_amnt` int(11) NOT NULL,
  `category` varchar(100) NOT NULL,
  `last_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_nm`, `pic_loc`, `user_nm`, `item_id`, `quantity`, `cost`, `item_condition`, `description`, `timestamp`, `type`, `promotion_amnt`, `category`, `last_date`) VALUES
('how are u', 'dsfs', 'sdjfhas', 1, 1, 1, 'sdgad', 'gsaddgsad', '2014-04-02 11:10:02', 'sgdas', 111, 'sadfsa', '0000-00-00 00:00:00'),
('how are u', 'dsfs', 'sdjfhas', 2, 1, 1, 'sdgad', 'gsaddgsad', '2014-04-02 11:10:11', 'sgdas', 111, 'sadfsa', '0000-00-00 00:00:00'),
('how are u', 'dsfs', 'sdjfhas', 3, 1, 1, 'sdgad', 'gsaddgsad', '2014-04-02 11:10:17', 'sgdas', 111, 'sadfsa', '0000-00-00 00:00:00'),
('how are u', 'dsfs', 'sdjfhas', 4, 1, 1, 'sdgad', 'gsaddgsad', '2014-04-02 11:10:22', 'sgdas', 111, 'sadfsa', '0000-00-00 00:00:00');

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
  `order_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
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
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_nm` varchar(100) NOT NULL,
  `pass` varchar(500) NOT NULL,
  `credit` int(11) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`user_nm`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `watch_list`
--

CREATE TABLE IF NOT EXISTS `watch_list` (
  `user_nm` varchar(100) NOT NULL,
  `item_id` int(11) NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wish_list`
--

CREATE TABLE IF NOT EXISTS `wish_list` (
  `item_nm` varchar(100) NOT NULL,
  `user_nm` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `item_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
