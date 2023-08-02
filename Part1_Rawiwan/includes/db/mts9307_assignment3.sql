-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 12, 2023 at 11:39 AM
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
-- Database: `mts9307_assignment3`
--

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

DROP TABLE IF EXISTS `cars`;
CREATE TABLE IF NOT EXISTS `cars` (
  `carId` int NOT NULL AUTO_INCREMENT,
  `plate` varchar(20) DEFAULT NULL,
  `brand` varchar(50) DEFAULT NULL,
  `model` varchar(20) DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL,
  `status` int DEFAULT '0',
  `cost` float DEFAULT NULL,
  `images` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`carId`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`carId`, `plate`, `brand`, `model`, `type`, `status`, `cost`, `images`) VALUES
(1, 'POK15', 'MG ', 'MG3 Core', 'SUV', 1, 44.69, 'https://static.europcar.com/carvisuals/450x300/42094_GWY_R.png?app=1.0.0'),
(2, 'CGY7O', 'FORD ', 'PUMA', 'SUV', 1, 49.62, 'https://static.europcar.com/carvisuals/450x300/49706_GWY_R.png?app=1.0.0'),
(3, 'WTY78', 'TOYOTA', 'C-HR compact', 'SUV', 1, 63.16, 'https://static.europcar.com/carvisuals/450x300/51291_GWY_R.png?app=1.0.0'),
(4, 'RET44', 'MG ', 'ZS EXCITE', 'SUV', 1, 75, 'https://static.europcar.com/carvisuals/450x300/49125_GWY_R.png?app=1.0.0'),
(5, 'XX123QW', 'RENAULT ', 'koleos', 'SUV', 1, 84.66, 'https://static.europcar.com/carvisuals/450x300/42428_GWY_R.png?app=1.0.0'),
(6, 'QTR11', 'FORD RANGER', 'WILDTRAK', 'UTE', 1, 138.55, 'https://static.europcar.com/carvisuals/450x300/46255_GWY_R.png?app=1.0.0'),
(18, 'TRY4P', 'KIA ', 'CARNIVAL', 'VAN', 1, 147.38, 'https://static.europcar.com/carvisuals/450x300/19765_GWY_R.png?app=1.0.0'),
(19, 'YUI78', 'FORD ', 'FORD TRANSIT', 'VAN', 1, 187.52, 'https://static.europcar.com/carvisuals/450x300/16611_GWY_R.png?app=1.0.0');

-- --------------------------------------------------------

--
-- Table structure for table `rent_transaction`
--

DROP TABLE IF EXISTS `rent_transaction`;
CREATE TABLE IF NOT EXISTS `rent_transaction` (
  `id` int NOT NULL AUTO_INCREMENT,
  `carId` int DEFAULT NULL,
  `userId` int DEFAULT NULL,
  `totalDay` int DEFAULT NULL,
  `price` float DEFAULT NULL,
  `isReturn` tinyint(1) DEFAULT '0',
  `totalPrice` float DEFAULT NULL,
  `startDate` date DEFAULT NULL,
  `estReturnDate` date DEFAULT NULL,
  `createDate` date DEFAULT NULL,
  `returnDate` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `rent_transaction`
--

INSERT INTO `rent_transaction` (`id`, `carId`, `userId`, `totalDay`, `price`, `isReturn`, `totalPrice`, `startDate`, `estReturnDate`, `createDate`, `returnDate`) VALUES
(1, 1, 16, 1, 44.69, 1, 44.69, '2023-07-11', '2023-07-12', '2023-07-12', '2023-07-12'),
(2, 1, 16, 1, 44.69, 0, 44.69, '2023-07-11', '2023-07-12', '2023-07-12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userId` int NOT NULL AUTO_INCREMENT,
  `firstName` varchar(30) DEFAULT NULL,
  `lastName` varchar(30) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `levelId` int NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `firstName`, `lastName`, `phone`, `email`, `levelId`, `password`) VALUES
(1, 'Rawiwan', 'Yamsumrual', '0431013275', 'rawiwanysr@outlook.com', 1, '9f57b1f70331931932861f9fffb449fd'),
(2, 'Claudie', 'White ', '0487555124', 'cc@outlook.com', 1, '9f57b1f70331931932861f9fffb449fd'),
(3, 'David ', 'Wright', '0458777999', 'david@outlook.com', 2, '9f57b1f70331931932861f9fffb449fd');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
