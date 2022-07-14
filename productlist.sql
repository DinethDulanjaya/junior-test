-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2022 at 08:01 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `productlist`
--

-- --------------------------------------------------------

--
-- Table structure for table `productitems`
--

CREATE TABLE `productitems` (
  `sku` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` float NOT NULL,
  `type` varchar(20) NOT NULL,
  `attribute` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productitems`
--

INSERT INTO `productitems` (`sku`, `name`, `price`, `type`, `attribute`) VALUES
('JVC200131', 'Acme DISC', 100, 'dvd', '750 MB'),
('TR120555', 'Chair', 40, 'furniture', '45 cm x 15 cm x 24 cm'),
('GGWP0007', 'War and Peace', 20.00, 'book', '2KG');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
