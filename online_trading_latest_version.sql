-- phpMyAdmin SQL Dump
-- version 4.0.6deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 17, 2014 at 10:48 AM
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

--
-- Dumping data for table `auction_bidder`
--

INSERT INTO `auction_bidder` (`user_nm`, `item_id`, `bid`, `bid_id`) VALUES
('default', 59, 0, '');

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
('mxuGSd81tm', 1, 1),
('HH5L23yqDR', 1, 45),
('JchLauS0i8', 1, 52),
('s.rishi', 1, 54),
('9pKCRaKmUf', 1, 60);

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
  `user_nm` varchar(100) NOT NULL,
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `quantity` int(11) NOT NULL DEFAULT '1',
  `cost` int(11) NOT NULL,
  `item_condition` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `type` varchar(10) NOT NULL DEFAULT 'sale',
  `promotion_amnt` int(11) NOT NULL DEFAULT '0',
  `category` varchar(100) NOT NULL,
  `last_date` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `author_nm` varchar(500) DEFAULT NULL,
  `genre` varchar(500) DEFAULT NULL,
  `brand` varchar(100) DEFAULT NULL,
  `model` varchar(250) DEFAULT NULL,
  `sale_type` varchar(50) DEFAULT NULL,
  `start_date` timestamp NULL DEFAULT NULL,
  `delivery_type` varchar(100) NOT NULL DEFAULT 'normal',
  `tax` int(11) NOT NULL DEFAULT '0',
  `base_price` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=73 ;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_nm`, `pic_loc`, `user_nm`, `item_id`, `quantity`, `cost`, `item_condition`, `description`, `timestamp`, `type`, `promotion_amnt`, `category`, `last_date`, `author_nm`, `genre`, `brand`, `model`, `sale_type`, `start_date`, `delivery_type`, `tax`, `base_price`) VALUES
('Tulip Bouquet', 'abc.jpeg', 's.rishi', 1, 11, 111, 'New', 'gsaddgsad', '2014-04-17 10:15:34', 'sale', 11, 'Electronics:Mobile', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, 'instant', 12, NULL),
('card', 'btrfly.jpg', 's.rishi', 2, 12, 185, 'New', 'gsaddgsad', '2014-04-14 13:25:28', 'sale', 97, 'Electronics', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, 'normal', 13, NULL),
('cart uml', 'cart.png', 's.rishi', 3, 12, 1000, 'New', 'gsaddgsad', '2014-04-14 13:26:26', 'auction', 98, 'Electronics', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, 'normal', 5, NULL),
('bla-bla', 'abc.jpg', 's.rishi', 5, 12, 55555, 'New', 'jllllllllllllllll', '2014-04-14 13:20:12', 'auction', 422, 'auction', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, 'instant', 5, NULL),
('Harry Potter 1', '6.jpg', 's.rishi', 40, 12, 800, 'New', 'Must read book !', '2014-04-14 13:35:45', 'auction', 12, 'books:', '0000-00-00 00:00:00', 'J.K.Rowling', 'fiction', NULL, NULL, 'sale', NULL, 'normal', 0, NULL),
('fan', '42.jpg', 's.rishi', 42, 12, 2000, 'new', 'my name is khan ', '2014-04-17 07:29:42', 'sale', 2085, 'electronics:Others', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, 'sale', NULL, 'normal', 0, NULL),
('uiiooo', '43.jpg', 's.rishi', 43, 12, 8, '8', 'description:988;category:electronics:Laptops and gadgets;type:auction;brand:iu;name:uiiooo;mrp:8;base_price:989;close_date:2014-04-14 17:22:40;model:oio', '2014-04-14 13:35:53', 'auction', 12, 'electronics:Laptops and gadgets', '2014-04-14 11:52:40', NULL, NULL, NULL, NULL, 'auction', NULL, 'normal', 0, NULL),
('Alienware m17x', '44.jpg', 's.rishi', 44, 12, 154000, 'Brand new', 'description:nice gaming laptop;category:electronics:Laptops and gadgets;type:auction;brand:Dell;name:Alienware m17x;mrp:154000;base_price:140000;close_date:2014-04-16 17:22:40;model:m17x', '2014-04-14 13:35:56', 'auction', 323, 'electronics:Laptops and gadgets', '2014-04-16 11:52:40', NULL, NULL, NULL, NULL, 'auction', NULL, 'normal', 0, NULL),
('Introduction to Algorithms', '45.jpg', 's.rishi', 45, 12, 699, 'Good ', 'bought about 4 months..... but its fine with no damage.', '2014-04-17 09:26:07', 'sale', 0, 'books:', '0000-00-00 00:00:00', 'Cormen', 'Others', NULL, NULL, 'sale', NULL, 'normal', 0, NULL),
('Electric kettle/Water heater', '46.jpg', 's.rishi', 46, 12, 1745, '6 months Used', 'description:Tea maker ;category:appliances:Home;type:auction;brand:Prestige;name:Electric kettle/Water heater;mrp:1745;base_price:1000;close_date:19/04/2014 17:18:34;model:PKSS 1.0', '2014-04-17 07:29:42', 'auction', 3185, 'appliances:Home', '0000-00-00 00:00:00', NULL, NULL, 'Prestige', 'PKSS 1.0', 'auction', NULL, 'normal', 0, NULL),
('Alienware m17x', '47.jpg', 's.rishi', 47, 12, 154000, 'Brand new', 'description:nice gaming laptop;category:electronics:Laptops and gadgets;type:auction;brand:Dell;name:Alienware m17x;mrp:154000;base_price:140000;close_date:2014-04-16 17:22:40;model:m17x', '2014-04-14 13:36:05', 'auction', 323, 'electronics:Laptops and gadgets', '2014-04-16 11:52:40', NULL, NULL, NULL, NULL, 'auction', NULL, 'normal', 0, NULL),
('Alienware m17x', '48.jpg', 's.rishi', 48, 12, 154000, 'Brand new', 'description:nice gaming laptop;category:electronics:Laptops and gadgets;type:auction;brand:Dell;name:Alienware m17x;mrp:154000;base_price:140000;close_date:2014-04-16 17:22:40;model:m17x', '2014-04-14 13:36:07', 'auction', 23, 'electronics:Laptops and gadgets', '2014-04-16 11:52:40', NULL, NULL, NULL, NULL, 'auction', NULL, 'normal', 0, NULL),
('The master of the game', '49.jpg', 's.rishi', 49, 12, 500, 'Good', 'description: Very good book;category:books:fiction;type:auction;author:sidney sheldon;name:The master of the game;mrp:500;base_price:400;close_date:18/04/2014 17:19:56', '2014-04-17 06:35:00', '', 0, 'books:fiction', '0000-00-00 00:00:00', 'sidney sheldon', 'fiction', NULL, NULL, 'auction', NULL, 'normal', 0, NULL),
('Apple MD760HN/A MacBook Air (4th Gen Ci5/ 4GB/ 128GB Flash/ Mac OS X Mountain Lion)', '50.jpg', 's.rishi', 50, 12, 60000, 'Old', 'description:\r\n\r\n    Long Lasting Battery Life\r\n    Delivers Smart Multi Tasks\r\n    LED Backlit Glossy Widescreen\r\n    Ultra-fast Data Processing\r\n    Comes with Twice the Capacity\r\n    Wireless Performance upto 3x Faster\r\n\r\n;category:electronics:Laptops and gadgets;type:auction;brand:Apple;name:Apple MD760HN/A MacBook Air (4th Gen Ci5/ 4GB/ 128GB Flash/ Mac OS X Mountain Lion);mrp:60000;base_price:55000;close_date:2014-04-26 17:18:51;model:MD760HN/A', '2014-04-14 13:36:12', 'auction', 1231, 'electronics:Laptops and gadgets', '2014-04-26 11:48:51', NULL, NULL, NULL, NULL, 'auction', NULL, 'normal', 0, NULL),
('the doomsday conspiracy', '51.jpg', 's.rishi', 51, 12, 400, 'Good', '', '2014-04-14 13:36:18', '', 213, 'books:', '0000-00-00 00:00:00', 'sidney sheldon', 'fiction', NULL, NULL, 'sale', NULL, 'normal', 0, NULL),
('Samsung Galaxy S4 I9500 ', '52.jpg', 's.rishi', 52, 12, 28000, 'New', ' \r\n\r\n    Smart Pause\r\n    Smart Scroll\r\n    Air View or Air Gesture\r\n    Group Play: Music Sharing\r\n    Optical Reading\r\n    ChatON: Dual Video Call\r\n    Dual Shot\r\n    Slimmer Yet Stronger\r\n    Recording\r\n    S Translater\r\n    Samsung WatchON\r\n\r\n', '2014-04-14 13:36:20', 'sale', 213, 'Electronics:Mobile', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, 'sale', NULL, 'normal', 0, NULL),
('Recron certified joy pillows', '53.jpg', 's.rishi', 53, 12, 519, '1 year used', 'description:cushion in usable condition;category:appliances:Home;type:auction;brand:Recron;name:Recron certified joy pillows;mrp:519;base_price:100;close_date:17/04/2014 17:24:05;model:none', '2014-04-14 13:36:23', 'auction', 213, 'appliances:Home', '0000-00-00 00:00:00', NULL, NULL, 'Recron', 'none', 'auction', NULL, 'normal', 0, NULL),
('Mage''s Blood: The Montide Quartet', '54.jpg', 's.rishi', 54, 12, 280, 'Old', ' Most of the time the Moontide Bridge lies deep below the sea, but every 12 years the tides sink and the bridge is revealed, its gates open for trade.\r\n\r\nThe Magi are hell-bent on ruling this new world, and for the last two Moontides they have led armies across the bridge on ''crusades'' of conquest. Now the third Moontide is almost here and, this time, the people of the East are ready for a fight ... but it is three seemingly ordinary people that will decide the fate of the world.', '2014-04-16 11:06:34', 'sale', 30, 'books:', '0000-00-00 00:00:00', ' David Hair', 'fiction', NULL, NULL, 'sale', NULL, 'normal', 0, NULL),
('Inferno ', '55.jpg', 's.rishi', 55, 12, 450, 'Old', 'description:nferno is a bestselling thriller centred on the popular fictional symbologist, Robert Langdon, who is in the hospital after suffering a bullet injury. He finds a mysterious cylinder in his jacket, and an assassin who seems to be following him.;category:books:fiction;type:auction;author:Dan Brown;name:Inferno ;mrp:450;base_price:300;close_date:08/05/2014 17:30:39', '2014-04-17 07:29:41', 'sale', 4486, 'books:fiction', '0000-00-00 00:00:00', 'Dan Brown', 'fiction', NULL, NULL, 'auction', NULL, 'normal', 0, NULL),
('shubhakar', '56.jpg', 's.rishi', 56, 12, 123, 'old', 'description:bshbfsbjszcbzocbaskcnaskjfbcsakd;category:electronics:Mobile;type:auction;brand:swapnil;name:shubhakar;mrp:123;base_price:50;close_date:2014-04-19 17:31:58;model:soham', '2014-04-17 04:44:48', 'auction', 53, 'Electronics:Mobile', '2014-04-19 12:01:58', NULL, NULL, NULL, NULL, 'auction', NULL, 'normal', 0, NULL),
('Philips FC6130/01 Hand-held Vacuum Cleaner ', '57.jpg', 's.rishi', 57, 12, 2655, 'Old', 'description:\r\n\r\n    Handheld Vacuum Cleaner\r\n    0.4 L Dust Capacity\r\n    3 Filteration Layers\r\n    900 W Motor Power\r\n    7 m Cord\r\n    150 W Suction Power\r\n    HEPA Filter\r\n\r\n;category:appliances:Home;type:auction;brand:Philips;name:Philips FC6130/01 Hand-held Vacuum Cleaner ;mrp:2655;base_price:1700;close_date:15/05/2014 17:33:11;model:FC6130/01', '2014-04-17 07:06:09', 'auction', 537, 'appliances:Home', '0000-00-00 00:00:00', NULL, NULL, 'Philips', 'FC6130/01', 'auction', NULL, 'normal', 0, NULL),
('test', 'abc.jpg', 's.rishi', 58, 12, 123, 'fdlsa', 'dsal;', '2014-04-14 13:20:12', 'sale', 123, 'Electronics', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, 'normal', 0, NULL),
('IOIOIO', '59.jpg', 's.rishi', 59, 1, 89, '89', 'description:8;category:electronics:Mobile;type:auction;brand:klk;name:IOIOIO;mrp:89;base_price:9889;close_date:2014-04-14 17:45:57;model:989', '2014-04-17 10:46:30', 'auction', 8, 'Electronics:Mobile', '2014-04-14 12:15:57', NULL, NULL, NULL, NULL, 'auction', NULL, 'normal', 0, NULL),
('Samsung galaxy S duos', '60.jpg', '', 60, 2, 8699, 'Brand new', ' white mobile', '2014-04-17 09:43:55', 'sale', 395, 'Electronics:Mobile', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, 'sale', NULL, 'normal', 0, NULL),
('Samsung galaxy S duos', '61.jpg', '', 61, 2, 8699, 'Brand new', ' white mobile', '2014-04-17 04:37:56', 'sale', 0, 'Electronics:Mobile', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, 'sale', NULL, 'normal', 0, NULL),
('Samsung galaxy S duos mobile', '62.jpg', '', 62, 2, 8699, 'Brand new', ' white mobile', '2014-04-17 09:43:55', 'sale', 316, 'Electronics:Mobile', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, 'sale', NULL, 'normal', 0, NULL),
('Samsung Galaxy Star Pro S7262', '63.jpg', '', 63, 1, 5499, 'Brand new', 'mobile', '2014-04-14 13:44:59', 'sale', 0, 'Electronics:Mobile', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, 'sale', NULL, 'normal', 0, NULL),
('Samsung Galaxy S4 I9500', '64.jpg', '', 64, 4, 27399, 'Brand new', 'Colour - Black mist', '2014-04-17 07:16:10', 'sale', 338, 'Electronics:Mobile', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, 'sale', NULL, 'normal', 0, NULL),
('Samsung Galaxy S4 I9500', '65.jpg', '', 65, 4, 27399, 'Brand new', 'Colour - Black mist, mobile', '2014-04-17 04:41:17', 'auction', 0, 'Electronics:Test', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, 'sale', NULL, 'normal', 0, NULL),
('BAJAJ VACCO Go-Ezzee Roti Maker', '66.jpg', '', 66, 11, 1782, '4 months Used', 'description:Colour - Black;category:appliances:kitchen;type:auction;brand:Bajaj;name:BAJAJ VACCO Go-Ezzee Roti Maker;mrp:1782;base_price:1200;close_date:23/04/2014 19:01:16;model:GO-EZZEE C-01', '2014-04-14 13:39:52', 'auction', 0, 'appliances:kitchen', '0000-00-00 00:00:00', NULL, NULL, 'Bajaj', 'GO-EZZEE C-01', 'auction', NULL, 'normal', 0, NULL),
('Magic Surya Magic Roti Maker', '67.jpg', '', 67, 0, 1099, 'Brand new', 'description:Colour - Black,White;category:appliances:kitchen;type:auction;brand:Surya;name:Magic Surya Magic Roti Maker;mrp:1099;base_price:1000;close_date:26/04/2014 19:01:16;model:C-07', '2014-04-14 13:38:26', 'auction', 0, 'appliances:kitchen', '0000-00-00 00:00:00', NULL, NULL, 'Surya', 'C-07', 'auction', NULL, 'normal', 0, NULL),
('gl3025 !#@%?@@ i3 lsa', '68.jpg', '', 68, 32, 32413, 'dslak', 'lsdkgla ', '2014-04-15 04:17:53', 'sale', 0, 'electronics:Mobile', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, 'sale', NULL, 'normal', 0, NULL),
('gkls      sdgd                    gsdaas', '69.jpg', '', 69, 32, 32413, 'dslak', 'lsdkgla ', '2014-04-15 04:23:18', 'sale', 0, 'electronics:Mobile', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, 'sale', NULL, 'normal', 0, NULL),
('!@%$#^^@^%!#', '70.jpg', '', 70, 32, 32413, 'dslak', 'lsdkgla ', '2014-04-15 04:24:41', 'sale', 0, 'electronics:Mobile', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, 'sale', NULL, 'normal', 0, NULL),
('%', '71.jpg', '', 71, 32, 32413, 'dslak', 'lsdkgla ', '2014-04-15 04:25:27', 'sale', 0, 'electronics:Mobile', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, 'sale', NULL, 'normal', 0, NULL),
('love', '72.jpg', '', 72, 1, 123, 'new', 'description:romance;category:books:romance;type:auction;author:lover;name:love;mrp:123;base_price:250;close_date:01/04/2014 17:05:33', '2014-04-16 11:43:57', 'sale', 0, 'books:romance', '0000-00-00 00:00:00', 'lover', 'romance', NULL, NULL, 'auction', NULL, 'normal', 0, NULL);

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
('user', 0, 15, 0, '123', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'NO', 424, '0', 0, 'gjadsh', 'email'),
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=87 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`user_nm`, `qty`, `item_id`, `txn_id`, `order_id`, `order_time`, `delivery_time`, `status`, `address`, `delivery_type`) VALUES
('ayantika', 0, 0, 57, '2014041418CE', '2014-04-14 03:11:34', '0000-00-00 00:00:00', 'Not Delivered', 'efseed sddffd eeffdsdf', ''),
('ayantika', 1, 2, 58, '2014041418CE', '2014-04-14 03:11:34', '2014-04-13 18:30:00', 'Delivered', 'efseed sddffd eeffdsdf', 'normal'),
('ayantika', 0, 0, 60, '20140414CE48', '2014-04-14 03:20:45', '0000-00-00 00:00:00', 'Not Delivered', 'efseed sddffd eeffdsdf', ''),
('ayantika', 1, 2, 61, '20140414CE48', '2014-04-14 03:20:45', '2014-04-13 18:30:00', 'Delivered', 'efseed sddffd eeffdsdf', 'normal'),
('ayantika', 0, 0, 63, '2014041444D2', '2014-04-14 03:34:07', '0000-00-00 00:00:00', 'Not Delivered', 'efseed sddffd eeffdsdf', ''),
('ayantika', 1, 2, 64, '20140414E005', '2014-04-14 03:34:08', '2014-04-13 18:30:00', 'Delivered', 'efseed sddffd eeffdsdf', 'normal'),
('ayantika', 1, 2, 65, '20140414CBF4', '2014-04-14 03:39:07', '2014-04-13 18:30:00', 'Delivered', 'efseed sddffd eeffdsdf', ''),
('ayantika', 1, 2, 66, '20140414D188', '2014-04-14 03:40:54', '2014-04-13 18:30:00', 'Delivered', 'efseed sddffd eeffdsdf', ''),
('ayantika', 1, 2, 67, '20140414E37B', '2014-04-14 03:41:45', '2014-04-13 18:30:00', 'Delivered', 'efseed sddffd eeffdsdf', ''),
('ayantika', 3, 2, 70, '20140414A7C9', '2014-04-14 04:12:45', '2014-04-13 18:30:00', 'Delivered', 'C/O: Aya kit<br>jnpij, ihpiyu.v,.j;vofu', 'normal'),
('ayantika', 4, 2, 72, '201404146806', '2014-04-14 04:41:40', '2014-04-13 18:30:00', 'Delivered', 'efseed sddffd eeffdsdf', 'normal'),
('ayantika', 6, 3, 73, '201404146806', '2014-04-14 04:41:40', '0000-00-00 00:00:00', 'Not Delivered', 'efseed sddffd eeffdsdf', 'normal'),
('ayantika', 8, 4, 74, '201404146806', '2014-04-14 04:41:40', '0000-00-00 00:00:00', 'Not Delivered', 'efseed sddffd eeffdsdf', 'normal'),
('ayantika', 2, 3, 76, '20140414DF39', '2014-04-14 05:34:23', '0000-00-00 00:00:00', 'Not Delivered', 'efseed sddffd eeffdsdf', 'normal'),
('ayantika', 6, 2, 77, '201404149891', '2014-04-14 05:49:58', '2014-04-13 18:30:00', 'Delivered', 'efseed sddffd eeffdsdf', 'normal'),
('ayantika', 1, 5, 78, '201404141975', '2014-04-14 06:15:53', '0000-00-00 00:00:00', 'Not Delivered', 'efseed sddffd eeffdsdf', 'instant'),
('ayantika', 10, 4, 79, '20140414174B', '2014-04-14 06:21:20', '0000-00-00 00:00:00', 'Not Delivered', 'efseed sddffd eeffdsdf', 'normal'),
('ayantika', 3, 4, 80, '20140414B278', '2014-04-14 08:27:53', '0000-00-00 00:00:00', 'Not Delivered', 'dskla;jflks', 'normal'),
('ayantika', 2, 3, 81, '20140414ADE6', '2014-04-14 08:28:13', '0000-00-00 00:00:00', 'Not Delivered', 'dskla;jflks', 'normal'),
('ayantika', 2, 2, 83, '20140414997B', '2014-04-14 11:28:22', '2014-04-13 18:30:00', 'Delivered', 'dskla;jflks', 'normal'),
('ayantika', 1, 2, 85, '201404146C4D', '2014-04-14 12:27:30', '2014-04-13 18:30:00', 'Delivered', 'C/O: hunlk lkjlk<br>khlug.jg', 'normal'),
('parag', 1, 1, 86, '201404179073', '2014-04-17 07:10:18', '0000-00-00 00:00:00', 'Not Delivered', 'shhfjhsdfu ihsdf8s9 df', 'instant');

-- --------------------------------------------------------

--
-- Table structure for table `saved_list`
--

CREATE TABLE IF NOT EXISTS `saved_list` (
  `user_nm` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `saved_list`
--

INSERT INTO `saved_list` (`user_nm`, `qty`, `item_id`) VALUES
('ayantika', 0, 1),
('ayantika', 0, 59),
('ayantika', 0, 72);

-- --------------------------------------------------------

--
-- Table structure for table `search_history`
--

CREATE TABLE IF NOT EXISTS `search_history` (
  `user_nm` varchar(100) NOT NULL,
  `search_text` varchar(200) NOT NULL,
  `search_id` int(11) NOT NULL AUTO_INCREMENT,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `num_reps` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`search_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=82 ;

--
-- Dumping data for table `search_history`
--

INSERT INTO `search_history` (`user_nm`, `search_text`, `search_id`, `timestamp`, `num_reps`) VALUES
('shubham', 'hello how are u', 16, '2014-04-01 08:28:43', 5),
('shubham', 'hello', 17, '2014-04-01 08:36:26', 3),
('swapnil', 'hello how do u do', 18, '2014-04-01 08:36:58', 2),
('s.rishi', 'how are you', 26, '2014-04-16 08:57:26', 2),
('s.rishi', 'how are you hello', 27, '2014-04-16 08:57:39', 1),
('s.rishi', 'hell', 28, '2014-04-16 09:10:28', 5),
('s.rishi', 'algorithm', 29, '2014-04-16 09:52:58', 9),
('s.rishi', 'mobile', 30, '2014-04-16 09:53:12', 14),
('s.rishi', 'how', 31, '2014-04-16 10:00:14', 1),
('s.rishi', 'inferno', 32, '2014-04-16 09:55:17', 1),
('s.rishi', 'hello', 33, '2014-04-16 10:14:35', 5),
('default', 'hello', 36, '2014-04-17 07:57:25', 25),
('default', 'algorithm', 37, '2014-04-17 07:13:31', 7),
('default', 'hell', 38, '2014-04-16 11:06:34', 8),
('shubahm', 'love', 39, '2014-04-16 11:44:03', 6),
('shubahm', 'l', 40, '2014-04-16 11:38:26', 1),
('shubahm', 'lo', 41, '2014-04-16 11:38:31', 1),
('shubahm', 'lov', 42, '2014-04-16 11:38:35', 1),
('shubahm', 'description', 43, '2014-04-16 11:38:47', 1),
('shubahm', 'des', 44, '2014-04-16 11:38:51', 1),
('shubahm', 'algorithm', 45, '2014-04-16 11:39:36', 1),
('default', 'mobile', 46, '2014-04-17 04:44:38', 107),
('default', 'mojile', 47, '2014-04-16 16:05:36', 1),
('default', 'mobil', 48, '2014-04-17 04:44:29', 2),
('default', 'mobi', 49, '2014-04-17 04:37:56', 1),
('default', 'mob', 50, '2014-04-17 04:42:06', 4),
('default', 'samsung', 51, '2014-04-17 04:42:48', 1),
('default', 'book', 52, '2014-04-17 10:15:34', 27),
('default', 'algorit', 53, '2014-04-17 04:44:20', 1),
('default', 'algor', 54, '2014-04-17 04:44:22', 1),
('default', 'algo', 55, '2014-04-17 07:51:53', 3),
('default', 'modile', 56, '2014-04-17 04:44:35', 1),
('default', 'shubh', 57, '2014-04-17 04:44:48', 1),
('default', 'booket', 58, '2014-04-17 04:47:05', 2),
('s.rishi', 'book', 59, '2014-04-17 06:45:21', 38),
('parag', 'book', 60, '2014-04-17 09:28:32', 6),
('parag', 'algo', 61, '2014-04-17 09:28:48', 4),
('parag', 'dust', 62, '2014-04-17 07:06:09', 1),
('parag', 'tulip', 63, '2014-04-17 09:25:57', 2),
('NrK9ab0vNq', 'samsung', 64, '2014-04-17 07:15:21', 1),
('JchLauS0i8', 'samsung', 65, '2014-04-17 07:16:10', 1),
('parag', 'love', 66, '2014-04-17 09:40:07', 2),
('default', 'love', 67, '2014-04-17 07:23:45', 2),
('default', 'test', 68, '2014-04-17 07:24:42', 1),
('default', 'ioio', 69, '2014-04-17 07:44:22', 5),
('parag', 'ioio', 70, '2014-04-17 07:25:47', 1),
('parag', 'ioi', 71, '2014-04-17 10:08:33', 14),
('parag', 'hello', 72, '2014-04-17 07:33:11', 1),
('parag', '$#@!\\%#42134', 73, '2014-04-17 07:33:23', 1),
('parag', ''' OR 1=1;--', 74, '2014-04-17 07:34:13', 1),
('default', 'tulip', 75, '2014-04-17 07:53:22', 1),
('aAICRCjR6I', 'algo', 76, '2014-04-17 09:24:28', 1),
('parag', 'parag', 77, '2014-04-17 09:25:53', 1),
('parag', 'mob', 78, '2014-04-17 09:43:55', 1),
('default', 'io', 79, '2014-04-17 10:15:30', 1),
('mxuGSd81tm', 'algo', 80, '2014-04-17 10:24:08', 1),
('iWt38X6FQc', 'ioio', 81, '2014-04-17 10:46:30', 8);

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
  `clicks` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`search_term`,`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `search_index`
--

INSERT INTO `search_index` (`search_term`, `item_id`, `rep_name`, `rep_category`, `rep_description`, `clicks`) VALUES
('!#@%?@@', 68, 1, 0, 0, 0),
('!@%$#^^@^%!#', 70, 1, 0, 0, 0),
('%', 71, 1, 0, 0, 0),
('-', 64, 0, 0, 1, 0),
('-', 65, 0, 0, 1, 0),
('-', 66, 0, 0, 1, 0),
('-', 67, 0, 0, 1, 0),
('128gb', 50, 1, 0, 0, 0),
('about', 45, 0, 0, 1, 0),
('across', 54, 0, 0, 1, 0),
('after', 55, 0, 0, 1, 0),
('algorithm', 41, 1, 0, 0, 0),
('algorithm', 45, 1, 0, 0, 2),
('alienwar', 44, 1, 0, 0, 0),
('alienwar', 47, 1, 0, 0, 0),
('alienwar', 48, 1, 0, 0, 0),
('almost', 54, 0, 0, 1, 0),
('appl', 50, 1, 0, 0, 0),
('assassin', 55, 0, 0, 1, 0),
('backlit', 50, 0, 0, 1, 0),
('bajaj', 66, 1, 0, 0, 0),
('batteri', 50, 0, 0, 1, 0),
('below', 54, 0, 0, 1, 0),
('bestsel', 55, 0, 0, 1, 0),
('black', 64, 0, 0, 1, 0),
('black', 65, 0, 0, 1, 0),
('black', 66, 0, 0, 1, 0),
('blackwhit', 67, 0, 0, 1, 0),
('blood:', 54, 1, 0, 0, 0),
('book', 1, 1, 0, 1, 13),
('book', 49, 0, 0, 1, 0),
('book.', 41, 0, 0, 1, 0),
('bought', 45, 0, 0, 1, 0),
('bridg', 54, 0, 0, 3, 0),
('bullet', 55, 0, 0, 1, 0),
('call', 52, 0, 0, 1, 0),
('capac', 50, 0, 0, 1, 0),
('capac', 57, 0, 0, 1, 0),
('card', 3, 1, 0, 0, 0),
('cart', 2, 1, 0, 0, 0),
('centr', 55, 0, 0, 1, 0),
('certifi', 53, 1, 0, 0, 0),
('chaton:', 52, 0, 0, 1, 0),
('cleaner', 57, 1, 0, 1, 0),
('colour', 64, 0, 0, 1, 0),
('colour', 65, 0, 0, 1, 0),
('colour', 66, 0, 0, 1, 0),
('colour', 67, 0, 0, 1, 0),
('come', 50, 0, 0, 1, 0),
('condit', 53, 0, 0, 1, 0),
('conquest.', 54, 0, 0, 1, 0),
('conspiraci', 51, 1, 0, 0, 0),
('cord', 57, 0, 0, 1, 0),
('crusad', 54, 0, 0, 1, 0),
('cushion', 53, 0, 0, 1, 0),
('cylind', 55, 0, 0, 1, 0),
('damage.', 45, 0, 0, 1, 0),
('data', 50, 0, 0, 1, 0),
('decid', 54, 0, 0, 1, 0),
('deep', 54, 0, 0, 1, 0),
('deliv', 50, 0, 0, 1, 0),
('descriptionromanceca', 72, 0, 0, 1, 0),
('doomsday', 51, 1, 0, 0, 0),
('dual', 52, 0, 0, 2, 0),
('duo', 60, 1, 0, 0, 0),
('duo', 61, 1, 0, 0, 0),
('duo', 62, 1, 0, 0, 0),
('dust', 57, 0, 0, 1, 0),
('east', 54, 0, 0, 1, 0),
('electr', 46, 1, 0, 0, 0),
('everi', 54, 0, 0, 1, 0),
('ezze', 66, 1, 0, 0, 0),
('faster', 50, 0, 0, 1, 0),
('fate', 54, 0, 0, 1, 0),
('fc6130', 57, 1, 0, 0, 0),
('fiction', 55, 0, 0, 1, 0),
('fight', 54, 0, 0, 1, 0),
('filter', 57, 0, 0, 2, 0),
('find', 55, 0, 0, 1, 0),
('fine', 45, 0, 0, 1, 0),
('flash/', 50, 1, 0, 0, 0),
('follow', 55, 0, 0, 1, 0),
('galaxi', 52, 1, 0, 0, 0),
('galaxi', 60, 1, 0, 0, 0),
('galaxi', 61, 1, 0, 0, 0),
('galaxi', 62, 1, 0, 0, 0),
('galaxi', 63, 1, 0, 0, 0),
('galaxi', 64, 1, 0, 0, 0),
('galaxi', 65, 1, 0, 0, 0),
('game', 44, 0, 0, 1, 0),
('game', 47, 0, 0, 1, 0),
('game', 48, 0, 0, 1, 0),
('game', 49, 1, 0, 0, 0),
('gate', 54, 0, 0, 1, 0),
('gestur', 52, 0, 0, 1, 0),
('gkls', 69, 1, 0, 0, 0),
('gl3025', 68, 1, 0, 0, 0),
('glossi', 50, 0, 0, 1, 0),
('good', 41, 0, 0, 1, 0),
('good', 49, 0, 0, 1, 0),
('group', 52, 0, 0, 1, 0),
('gsdaa', 69, 1, 0, 0, 0),
('handheld', 57, 1, 0, 1, 0),
('harri', 40, 1, 0, 0, 0),
('have', 54, 0, 0, 1, 0),
('heater', 46, 1, 0, 0, 0),
('hellbent', 54, 0, 0, 1, 0),
('hepa', 57, 0, 0, 1, 0),
('here', 54, 0, 0, 1, 0),
('hospit', 55, 0, 0, 1, 0),
('i9500', 52, 1, 0, 0, 0),
('i9500', 64, 1, 0, 0, 0),
('i9500', 65, 1, 0, 0, 0),
('inferno', 55, 1, 0, 0, 0),
('injury.', 55, 0, 0, 1, 0),
('introduct', 41, 1, 0, 0, 0),
('introduct', 45, 1, 0, 0, 0),
('ioioio', 59, 1, 0, 0, 0),
('jacket,', 55, 0, 0, 1, 0),
('kettlewat', 46, 1, 0, 0, 0),
('khan', 42, 0, 0, 1, 0),
('langdon,', 55, 0, 0, 1, 0),
('laptop', 44, 0, 0, 1, 0),
('laptop', 47, 0, 0, 1, 0),
('laptop', 48, 0, 0, 1, 0),
('last', 50, 0, 0, 1, 0),
('last', 54, 0, 0, 1, 0),
('layer', 57, 0, 0, 1, 0),
('lie', 54, 0, 0, 1, 0),
('life', 50, 0, 0, 1, 0),
('lion)', 50, 1, 0, 0, 0),
('long', 50, 0, 0, 1, 0),
('love', 72, 1, 0, 0, 3),
('lsdkgla', 68, 0, 0, 1, 0),
('lsdkgla', 69, 0, 0, 1, 0),
('lsdkgla', 70, 0, 0, 1, 0),
('lsdkgla', 71, 0, 0, 1, 0),
('m17x', 44, 1, 0, 0, 0),
('m17x', 47, 1, 0, 0, 0),
('m17x', 48, 1, 0, 0, 0),
('macbook', 50, 1, 0, 0, 0),
('mage', 54, 1, 0, 0, 0),
('magi', 54, 0, 0, 1, 0),
('magic', 67, 2, 0, 0, 0),
('maker', 46, 0, 0, 1, 0),
('maker', 66, 1, 0, 0, 0),
('maker', 67, 1, 0, 0, 0),
('master', 49, 1, 0, 0, 0),
('md760hn', 50, 1, 0, 0, 0),
('mist', 64, 0, 0, 1, 0),
('mist,', 65, 0, 0, 1, 0),
('mobil', 60, 0, 0, 1, 0),
('mobil', 61, 0, 0, 1, 0),
('mobil', 62, 1, 0, 1, 0),
('mobil', 63, 0, 0, 1, 0),
('mobil', 65, 0, 0, 1, 0),
('months.....', 45, 0, 0, 1, 0),
('montid', 54, 1, 0, 0, 0),
('moontid', 54, 0, 0, 3, 0),
('most', 54, 0, 0, 1, 0),
('motor', 57, 0, 0, 1, 0),
('mountain', 50, 1, 0, 0, 0),
('multi', 50, 0, 0, 1, 0),
('music', 52, 0, 0, 1, 0),
('must', 40, 0, 0, 1, 0),
('mysteri', 55, 0, 0, 1, 0),
('name', 42, 0, 0, 1, 0),
('nferno', 55, 0, 0, 1, 0),
('nice', 44, 0, 0, 1, 0),
('nice', 47, 0, 0, 1, 0),
('nice', 48, 0, 0, 1, 0),
('open', 54, 0, 0, 1, 0),
('optic', 52, 0, 0, 1, 0),
('ordinari', 54, 0, 0, 1, 0),
('paus', 52, 0, 0, 1, 0),
('peopl', 54, 0, 0, 2, 0),
('perform', 50, 0, 0, 1, 0),
('philip', 57, 1, 0, 0, 0),
('pillow', 53, 1, 0, 0, 0),
('play:', 52, 0, 0, 1, 0),
('popular', 55, 0, 0, 1, 0),
('potter', 40, 1, 0, 0, 0),
('power', 57, 0, 0, 2, 0),
('process', 50, 0, 0, 1, 0),
('quartet', 54, 1, 0, 0, 0),
('read', 40, 0, 0, 1, 0),
('read', 52, 0, 0, 1, 0),
('readi', 54, 0, 0, 1, 0),
('record', 52, 0, 0, 1, 0),
('recron', 53, 1, 0, 0, 0),
('revealed,', 54, 0, 0, 1, 0),
('robert', 55, 0, 0, 1, 0),
('roti', 66, 1, 0, 0, 0),
('roti', 67, 1, 0, 0, 0),
('rule', 54, 0, 0, 1, 0),
('s7262', 63, 1, 0, 0, 0),
('samsung', 52, 1, 0, 1, 1),
('samsung', 60, 1, 0, 0, 1),
('samsung', 61, 1, 0, 0, 0),
('samsung', 62, 1, 0, 0, 0),
('samsung', 63, 1, 0, 0, 0),
('samsung', 64, 1, 0, 0, 0),
('samsung', 65, 1, 0, 0, 0),
('scroll', 52, 0, 0, 1, 0),
('sdgd', 69, 1, 0, 0, 0),
('seem', 54, 0, 0, 1, 0),
('seem', 55, 0, 0, 1, 0),
('share', 52, 0, 0, 1, 0),
('shot', 52, 0, 0, 1, 0),
('shubhakar', 56, 1, 0, 0, 0),
('sink', 54, 0, 0, 1, 0),
('slimmer', 52, 0, 0, 1, 0),
('smart', 50, 0, 0, 1, 0),
('smart', 52, 0, 0, 2, 0),
('star', 63, 1, 0, 0, 0),
('stronger', 52, 0, 0, 1, 0),
('suction', 57, 0, 0, 1, 0),
('suffer', 55, 0, 0, 1, 0),
('surya', 67, 1, 0, 0, 0),
('symbologist,', 55, 0, 0, 1, 0),
('task', 50, 0, 0, 1, 0),
('that', 54, 0, 0, 1, 0),
('they', 54, 0, 0, 1, 0),
('third', 54, 0, 0, 1, 0),
('this', 54, 0, 0, 2, 0),
('three', 54, 0, 0, 1, 0),
('thriller', 55, 0, 0, 1, 0),
('tide', 54, 0, 0, 1, 0),
('time', 54, 0, 0, 1, 0),
('time,', 54, 0, 0, 1, 0),
('trade.', 54, 0, 0, 1, 0),
('translat', 52, 0, 0, 1, 0),
('tulip', 1, 1, 0, 0, 3),
('twice', 50, 0, 0, 1, 0),
('uiiooo', 43, 1, 0, 0, 0),
('ultrafast', 50, 0, 0, 1, 0),
('uml', 3, 1, 0, 0, 0),
('upto', 50, 0, 0, 1, 0),
('usabl', 53, 0, 0, 1, 0),
('vacco', 66, 1, 0, 0, 0),
('vacuum', 57, 1, 0, 1, 0),
('veri', 41, 0, 0, 1, 0),
('veri', 49, 0, 0, 1, 0),
('video', 52, 0, 0, 1, 0),
('view', 52, 0, 0, 1, 0),
('watchon', 52, 0, 0, 1, 0),
('white', 60, 0, 0, 1, 0),
('white', 61, 0, 0, 1, 0),
('white', 62, 0, 0, 1, 0),
('widescreen', 50, 0, 0, 1, 0),
('will', 54, 0, 0, 1, 0),
('wireless', 50, 0, 0, 1, 0),
('with', 45, 0, 0, 1, 0),
('with', 50, 0, 0, 1, 0),
('world,', 54, 0, 0, 1, 0),
('world.', 54, 0, 0, 1, 0),
('year', 54, 0, 0, 1, 0);

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
('a.bachhan', 'd7621bb97488ef9d896bed3fe99927472001ebdc', 0, 'dhachkatola', 9999999999, 'a.bachhan@gmail.com', 'amitabh'),
('ayantika', 'abcd', 999991580, 'C/O: hunlk lkjlk<br>khlug.jg', 1234567890, 'jdklsaj', 'shubham'),
('default', '7505d64a54e061b7acd54ccd58b49dc43500b635', 0, 'default', 3421344444, 'default@gmail.com', 'default'),
('g.parag', 'fe291da6ccb1481acddabf5ea402fd11c2021b10', 0, 'siang hostel , IIT Guwahati', 9706876687, 'g.parag@iitg.ernet.in', 'parag gangil'),
('kilvish', 'a5cec7af5f7aab769cf0d4aa440e01c7bfc371b2', 0, '2nd year b.tech lab', 0, 'pappucantdancesala@bollywood.com', 'i am here'),
('parag', 'fe291da6ccb1481acddabf5ea402fd11c2021b10', 32030, 'shhfjhsdfu ihsdf8s9 df', 9898989898, 'afpjaij@gmail.com', 'parag Gangil'),
('paraggangil', '0e2b6d67bf66999592c5feef8df1c02237bc9f43', 0, 'Siang Hostel', 9706876687, 'paraggangil@gmail.com', 'Parag Gangil'),
('pintu.kumar', 'bbc19b56b0fbf9722ffab937c96811cfccdba2da', 0, 'dihing hostel room no.258 iitg', 7896364534, 'pintukumar0702@gmail.com', 'pintu kumar'),
('praveen', '36885948e397ac14e55de8f717828d59fbf6dae6', 0, 'IITG', 9876543210, 'praveen@gmail.com', 'Praveen Kumar'),
('praveen_1', '36885948e397ac14e55de8f717828d59fbf6dae6', 0, 'IITG', 9876543210, 'praveen@gmail.com', 'Praveen Kumar'),
('ranbeer', 'e34b6d45a997198d3012b5e71090dd4478b8aedb', 0, 'manali', 9888888888, 'ranbeer@gmail.com', 'ranbeer'),
('s.rishi', '3b6beb51e76816e632a40d440eab0097', 0, 'Hostel', 9864278581, 'rishi@asd.com', 'Rishi Sharma'),
('Sathwik_Sai', '761de5d71ae471cc0e5d9b66c6a1901c031f0f00', 0, 'A-311,Barak Hostel,IIT Guwahati', 7896375017, 'sathwiksa007@gmail.com', 'Sathwik Sai '),
('shubhakar', '04ddfae7e26a5b92ed0396822de69d61b920586d', 0, 'room no:A-334,Barak Hostel', 8473894767, 'shubhakar001@gmail.com', 'Shubhakar Reddy'),
('shubham', 'abcd', 2147483647, 'dskla;jflks', 2318392891, 'jdklsaj', 'shubham'),
('vishwa', '0e2b6d67bf66999592c5feef8df1c02237bc9f43', 0, 'Siang Hostel', 9864512378, 'vangala@iitg.ernet.in', 'Vishwadeep'),
('vrinda', 'ce53e81aa53a6d690bdb5aa5e19e98c173b49a9e', 0, 'Subansiri,IIT Guwahati', 1234567890, 'vrindakochar@gmail.com', 'Vrinda Kochar');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='This is the table for vendors.' AUTO_INCREMENT=16 ;

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
(15, 'gjadsh', 42, 424, 32134, 0);

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
-- Table structure for table `vouchers`
--

CREATE TABLE IF NOT EXISTS `vouchers` (
  `voucher` varchar(50) NOT NULL,
  `amount` int(10) NOT NULL,
  `available` int(2) NOT NULL,
  PRIMARY KEY (`voucher`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vouchers`
--

INSERT INTO `vouchers` (`voucher`, `amount`, `available`) VALUES
('abcdefabcdefabcdea', 50, 1),
('abcdefabcdefabcdeb', 50, 1),
('abcdefabcdefabcdec', 100, 1),
('abcdefabcdefabcded', 100, 0),
('abcdefabcdefabcdee', 100, 1),
('abcdefabcdefabcdef', 100, 1),
('abcdefabcdefabcdeg', 100, 1),
('abcdefabcdefabcdeh', 100, 1),
('abcdefabcdefabcdei', 100, 0),
('abcdefabcdefabcdej', 100, 1),
('abcdefabcdefabcdek', 100, 1),
('abcdefabcdefabcdel', 100, 1),
('abcdefabcdefabcdem', 100, 1),
('abcdefabcdefabcden', 100, 1);

-- --------------------------------------------------------

--
-- Table structure for table `watch_list`
--

CREATE TABLE IF NOT EXISTS `watch_list` (
  `user_nm` varchar(100) NOT NULL,
  `item_id` int(11) NOT NULL,
  PRIMARY KEY (`user_nm`,`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `watch_list`
--

INSERT INTO `watch_list` (`user_nm`, `item_id`) VALUES
('ayantika', 1),
('default', 59),
('s.rishi', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `wish_list`
--

INSERT INTO `wish_list` (`id`, `item_nm`, `user_nm`, `category`, `item_id`, `Tags`, `availability`) VALUES
(3, 'Bicycle', 's.rishi', 'Electronics', NULL, 'asas;d;asa;sd;asd;as;dasd;', 'not'),
(4, 'asrasrasdfa', 's.rishi', 'Electronics', NULL, '3', 'not'),
(5, 'Bicycle', 'parag', 'Electronics', NULL, '', 'not');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
