-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 14, 2025 at 02:44 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `additems`
--

DROP TABLE IF EXISTS `additems`;
CREATE TABLE IF NOT EXISTS `additems` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tech` varchar(30) NOT NULL,
  `color` varchar(15) NOT NULL,
  `playlevel` varchar(20) NOT NULL,
  `size` varchar(20) NOT NULL,
  `quality` varchar(20) NOT NULL,
  `price` int NOT NULL,
  `image` varchar(300) NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `category` varchar(20) NOT NULL,
  `stocks` int NOT NULL DEFAULT '20',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `additems`
--

INSERT INTO `additems` (`id`, `name`, `tech`, `color`, `playlevel`, `size`, `quality`, `price`, `image`, `status`, `category`, `stocks`) VALUES
(35, 'puma', 'cotton', 'white & Dark Gr', 'intermediate', '200-300', '3 star', 200, '6f0b30abebcd3fc8abb458a649b9fb55_a1e17ffa70806ca3872.jpg', 1, '3', 6),
(34, 'addidas', 'fiber', 'white and red', 'intermediate', '200', '5 star', 2000, '79f3f7043ab1b40d3f992af2d978c6bb_968f6eb73b5.jpg', 2, '6', 5),
(29, 'MRF', 'woods', 'wood color', 'intermediate', '34', '5 star', 2000, '1c5f4c7f50afbc70920de51166132582_5e0ec7c5264d0.jpg', 1, '4', 1),
(30, 'Nike', 'cotten', 'dark blue', 'profectional', '230', '5 star', 300, '4d471b317b95b07c3e6c1bb7c94ba095_8d5734d370212b.jpg', 1, '3', 9),
(31, 'Addidas', 'cotton', 'vilot', 'beginner', '200', '5 star', 3500, '2cec69726602c99c479cabdc9e87f117_169dd00d6598fb550c.jpg', 1, '3', 2);

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

DROP TABLE IF EXISTS `booking`;
CREATE TABLE IF NOT EXISTS `booking` (
  `id` int NOT NULL AUTO_INCREMENT,
  `bname` varchar(25) NOT NULL,
  `address` varchar(40) NOT NULL,
  `location` varchar(30) NOT NULL,
  `pincode` int NOT NULL,
  `itemname` varchar(25) NOT NULL,
  `price` int NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=130 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `bname`, `address`, `location`, `pincode`, `itemname`, `price`, `date`) VALUES
(129, 'robieee', 'coondiyanikal', 'fyyryu', 853, 'MRF', 2000, '2025-10-12'),
(128, 'robieee', 'coondiyanikal', 'ghdhsf', 5343, 'Nike', 300, '2025-10-12'),
(119, 'ajith', 'thakkudus', 'robin', 2312, 'Addidas', 3500, '2025-09-05');

-- --------------------------------------------------------

--
-- Table structure for table `buyhistory`
--

DROP TABLE IF EXISTS `buyhistory`;
CREATE TABLE IF NOT EXISTS `buyhistory` (
  `id` int NOT NULL AUTO_INCREMENT,
  `item_name` varchar(30) NOT NULL,
  `total_price` int NOT NULL,
  `quantity` int NOT NULL,
  `cust_name` varchar(30) NOT NULL,
  `location` varchar(50) NOT NULL,
  `phone` int NOT NULL,
  `pincode` int NOT NULL,
  `date` date NOT NULL,
  `book_id` int NOT NULL,
  `pay_id` int NOT NULL,
  `item_image` varchar(500) NOT NULL,
  `order_status` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `buyhistory`
--

INSERT INTO `buyhistory` (`id`, `item_name`, `total_price`, `quantity`, `cust_name`, `location`, `phone`, `pincode`, `date`, `book_id`, `pay_id`, `item_image`, `order_status`) VALUES
(25, 'Nike', 300, 1, 'master', 'ghdhsf', 21474836, 5343, '2025-10-12', 128, 75, '4d471b317b95b07c3e6c1bb7c94ba095_8d5734d370212b.jpg', ''),
(26, 'MRF', 2000, 1, 'master', 'fyyryu', 21474836, 853, '2025-10-12', 129, 76, '1c5f4c7f50afbc70920de51166132582_5e0ec7c5264d0.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `price` int NOT NULL,
  `image` varchar(300) NOT NULL,
  `item_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=207 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `cid` int NOT NULL AUTO_INCREMENT,
  `categoryname` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cid`, `categoryname`, `status`) VALUES
(3, 'jersy', 1),
(4, 'cricket bat', 1),
(5, 'badminton rackect', 1),
(6, 'football', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `order_id` varchar(50) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `status` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'PENDING',
  PRIMARY KEY (`id`),
  UNIQUE KEY `order_id` (`order_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `id` int NOT NULL AUTO_INCREMENT,
  `holdername` varchar(20) NOT NULL,
  `cardnumber` int NOT NULL,
  `price` int NOT NULL,
  `cvv` int NOT NULL,
  `username` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cardnumber` (`cardnumber`),
  UNIQUE KEY `holdername` (`holdername`)
) ENGINE=MyISAM AUTO_INCREMENT=77 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `holdername`, `cardnumber`, `price`, `cvv`, `username`) VALUES
(76, 'uhjdgf', 78675832, 2000, 3532, 'master'),
(75, 'robin', 2147483647, 300, 7858, 'master'),
(66, '7873582', 7342873, 3500, 3112, 'ajith');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

DROP TABLE IF EXISTS `register`;
CREATE TABLE IF NOT EXISTS `register` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL,
  `email` varchar(20) NOT NULL,
  `phonenumber` int NOT NULL,
  `address` varchar(40) NOT NULL,
  `password` varchar(20) NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `gender` varchar(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `username`, `email`, `phonenumber`, `address`, `password`, `status`, `gender`, `name`) VALUES
(32, 'bonny', 'nbsfna@ksbdbg', 3123255, 'jzbsfvna', '123', 3, '', ''),
(33, 'robin', 'nbsfna@ksbdbg', 3123255, 'jzbsfvna', '123', 3, '', 'robin'),
(34, 'master', 'robincd@gmail.in', 21474836, 'coondiyanikal', '123', 2, 'male', 'robieee'),
(36, 'ajith', 'aji2003@gmail.com', 2147483647, 'thakkudus', '123', 2, 'male', 'ajith');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
