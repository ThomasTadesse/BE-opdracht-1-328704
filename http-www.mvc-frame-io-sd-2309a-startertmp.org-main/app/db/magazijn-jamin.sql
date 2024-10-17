-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 17, 2024 at 09:49 AM
-- Server version: 9.0.1
-- PHP Version: 8.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `magazijn-jamin`
--

-- --------------------------------------------------------

--
-- Table structure for table `allergeen`
--

DROP TABLE IF EXISTS `allergeen`;
CREATE TABLE IF NOT EXISTS `allergeen` (
  `Id` int NOT NULL,
  `Naam` varchar(255) NOT NULL,
  `Omschrijving` text,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `allergeen`
--

INSERT INTO `allergeen` (`Id`, `Naam`, `Omschrijving`) VALUES
(1, 'Gluten', 'Dit product bevat gluten'),
(2, 'Gelatine', 'Dit product bevat gelatine'),
(3, 'AZO-Kleurstof', 'Dit product bevat AZO-kleurstoffen'),
(4, 'Lactose', 'Dit product bevat lactose'),
(5, 'Soja', 'Dit product bevat soja');

-- --------------------------------------------------------

--
-- Table structure for table `leverancier`
--

DROP TABLE IF EXISTS `leverancier`;
CREATE TABLE IF NOT EXISTS `leverancier` (
  `Id` int NOT NULL,
  `Naam` varchar(255) NOT NULL,
  `ContactPersoon` varchar(255) DEFAULT NULL,
  `LeverancierNummer` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `leverancier`
--

INSERT INTO `leverancier` (`Id`, `Naam`, `ContactPersoon`, `LeverancierNummer`) VALUES
(1, 'Venco', 'Bert van Linge', 'L1029384719'),
(2, 'Astra Sweets', 'Jasper del Monte', 'L1029284315'),
(3, 'Haribo', 'Sven Stalman', 'L1029324748'),
(4, 'Basset', 'Joyce Stelterberg', 'L1023845773'),
(5, 'De Bron', 'Remco Veenstra', 'L1023857736');

-- --------------------------------------------------------

--
-- Table structure for table `magazijn`
--

DROP TABLE IF EXISTS `magazijn`;
CREATE TABLE IF NOT EXISTS `magazijn` (
  `Id` int NOT NULL,
  `ProductId` int DEFAULT NULL,
  `VerpakkingsEenheid` decimal(5,2) DEFAULT NULL,
  `AantalAanwezig` int DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `ProductId` (`ProductId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `magazijn`
--

INSERT INTO `magazijn` (`Id`, `ProductId`, `VerpakkingsEenheid`, `AantalAanwezig`) VALUES
(1, 1, '5.00', 453),
(2, 2, '2.50', 400),
(3, 3, '5.00', 1),
(4, 4, '1.00', 800),
(5, 5, '3.00', 234),
(6, 6, '2.00', 345),
(7, 7, '1.00', 795),
(8, 8, '10.00', 233),
(9, 9, '2.50', 123),
(10, 10, '3.00', NULL),
(11, 11, '2.00', 367),
(12, 12, '1.00', 467),
(13, 13, '5.00', 20);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `Id` int NOT NULL,
  `Naam` varchar(255) NOT NULL,
  `Barcode` varchar(13) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Id`, `Naam`, `Barcode`) VALUES
(1, 'Mintnopjes', '8719587231278'),
(2, 'Schoolkrijt', '8719587326713'),
(3, 'Honingdrop', '8719587327836'),
(4, 'Zure Beren', '8719587321441'),
(5, 'Cola Flesjes', '8719587321237'),
(6, 'Turtles', '8719587322245'),
(7, 'Witte Muizen', '8719587328256'),
(8, 'Reuzen Slangen', '8719587325641'),
(9, 'Zoute Rijen', '8719587322739'),
(10, 'Winegums', '8719587327527'),
(11, 'Drop Munten', '8719587322345'),
(12, 'Kruis Drop', '8719587322265'),
(13, 'Zoute Ruitjes', '8719587323256');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
