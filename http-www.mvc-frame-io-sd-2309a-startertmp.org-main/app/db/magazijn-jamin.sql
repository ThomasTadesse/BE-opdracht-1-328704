-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 17, 2024 at 10:44 AM
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
  `Id` int NOT NULL AUTO_INCREMENT,
  `Naam` varchar(255) NOT NULL,
  `Omschrijving` varchar(255) NOT NULL,
  `IsActief` bit(1) DEFAULT b'1',
  `Opmerking` varchar(255) DEFAULT NULL,
  `DatumAangemaakt` datetime DEFAULT CURRENT_TIMESTAMP,
  `DatumGewijzigd` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `allergeen`
--

INSERT INTO `allergeen` (`Id`, `Naam`, `Omschrijving`, `IsActief`, `Opmerking`, `DatumAangemaakt`, `DatumGewijzigd`) VALUES
(1, 'Gluten', 'Dit product bevat gluten', b'1', NULL, '2024-10-17 12:44:25', '2024-10-17 12:44:25'),
(2, 'Gelatine', 'Dit product bevat gelatine', b'1', NULL, '2024-10-17 12:44:25', '2024-10-17 12:44:25'),
(3, 'AZO-Kleurstof', 'Dit product bevat AZO-kleurstoffen', b'1', NULL, '2024-10-17 12:44:25', '2024-10-17 12:44:25'),
(4, 'Lactose', 'Dit product bevat lactose', b'1', NULL, '2024-10-17 12:44:25', '2024-10-17 12:44:25'),
(5, 'Soja', 'Dit product bevat soja', b'1', NULL, '2024-10-17 12:44:25', '2024-10-17 12:44:25');

-- --------------------------------------------------------

--
-- Table structure for table `leverancier`
--

DROP TABLE IF EXISTS `leverancier`;
CREATE TABLE IF NOT EXISTS `leverancier` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Naam` varchar(255) NOT NULL,
  `ContactPersoon` varchar(255) DEFAULT NULL,
  `LeverancierNummer` varchar(50) DEFAULT NULL,
  `IsActief` bit(1) DEFAULT b'1',
  `Opmerking` varchar(255) DEFAULT NULL,
  `DatumAangemaakt` datetime DEFAULT CURRENT_TIMESTAMP,
  `DatumGewijzigd` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `leverancier`
--

INSERT INTO `leverancier` (`Id`, `Naam`, `ContactPersoon`, `LeverancierNummer`, `IsActief`, `Opmerking`, `DatumAangemaakt`, `DatumGewijzigd`) VALUES
(1, 'Venco', 'Bert van Linge', 'L1029384719', b'1', NULL, '2024-10-17 12:44:25', '2024-10-17 12:44:25'),
(2, 'Astra Sweets', 'Jasper del Monte', 'L1029284315', b'1', NULL, '2024-10-17 12:44:25', '2024-10-17 12:44:25'),
(3, 'Haribo', 'Sven Stalman', 'L1029324748', b'1', NULL, '2024-10-17 12:44:25', '2024-10-17 12:44:25'),
(4, 'Basset', 'Joyce Stelterberg', 'L1023845773', b'1', NULL, '2024-10-17 12:44:25', '2024-10-17 12:44:25'),
(5, 'De Bron', 'Remco Veenstra', 'L1023857736', b'1', NULL, '2024-10-17 12:44:25', '2024-10-17 12:44:25');

-- --------------------------------------------------------

--
-- Table structure for table `magazijn`
--

DROP TABLE IF EXISTS `magazijn`;
CREATE TABLE IF NOT EXISTS `magazijn` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `ProductId` int DEFAULT NULL,
  `VerpakkingsEenheid` decimal(5,2) DEFAULT NULL,
  `AantalAanwezig` int DEFAULT NULL,
  `IsActief` bit(1) DEFAULT b'1',
  `Opmerking` varchar(255) DEFAULT NULL,
  `DatumAangemaakt` datetime DEFAULT CURRENT_TIMESTAMP,
  `DatumGewijzigd` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id`),
  KEY `ProductId` (`ProductId`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `magazijn`
--

INSERT INTO `magazijn` (`Id`, `ProductId`, `VerpakkingsEenheid`, `AantalAanwezig`, `IsActief`, `Opmerking`, `DatumAangemaakt`, `DatumGewijzigd`) VALUES
(1, 1, '5.00', 453, b'1', NULL, '2024-10-17 12:44:25', '2024-10-17 12:44:25'),
(2, 2, '2.50', 400, b'1', NULL, '2024-10-17 12:44:25', '2024-10-17 12:44:25'),
(3, 3, '5.00', 1, b'1', NULL, '2024-10-17 12:44:25', '2024-10-17 12:44:25'),
(4, 4, '1.00', 800, b'1', NULL, '2024-10-17 12:44:25', '2024-10-17 12:44:25'),
(5, 5, '3.00', 234, b'1', NULL, '2024-10-17 12:44:25', '2024-10-17 12:44:25'),
(6, 6, '2.00', 345, b'1', NULL, '2024-10-17 12:44:25', '2024-10-17 12:44:25'),
(7, 7, '1.00', 795, b'1', NULL, '2024-10-17 12:44:25', '2024-10-17 12:44:25'),
(8, 8, '10.00', 233, b'1', NULL, '2024-10-17 12:44:25', '2024-10-17 12:44:25'),
(9, 9, '2.50', 123, b'1', NULL, '2024-10-17 12:44:25', '2024-10-17 12:44:25'),
(10, 10, '3.00', NULL, b'1', NULL, '2024-10-17 12:44:25', '2024-10-17 12:44:25'),
(11, 11, '2.00', 367, b'1', NULL, '2024-10-17 12:44:25', '2024-10-17 12:44:25'),
(12, 12, '1.00', 467, b'1', NULL, '2024-10-17 12:44:25', '2024-10-17 12:44:25'),
(13, 13, '5.00', 20, b'1', NULL, '2024-10-17 12:44:25', '2024-10-17 12:44:25');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Naam` varchar(255) NOT NULL,
  `Barcode` varchar(13) NOT NULL,
  `IsActief` bit(1) DEFAULT b'1',
  `Opmerking` varchar(255) DEFAULT NULL,
  `DatumAangemaakt` datetime DEFAULT CURRENT_TIMESTAMP,
  `DatumGewijzigd` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Verpakkingseenheid` decimal(5,2) DEFAULT NULL,
  `AantalAanwezig` int DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Id`, `Naam`, `Barcode`, `IsActief`, `Opmerking`, `DatumAangemaakt`, `DatumGewijzigd`, `Verpakkingseenheid`, `AantalAanwezig`) VALUES
(1, 'Mintnopjes', '8719587231278', b'1', NULL, '2024-10-17 12:44:25', '2024-10-17 12:44:25', NULL, NULL),
(2, 'Schoolkrijt', '8719587326713', b'1', NULL, '2024-10-17 12:44:25', '2024-10-17 12:44:25', NULL, NULL),
(3, 'Honingdrop', '8719587327836', b'1', NULL, '2024-10-17 12:44:25', '2024-10-17 12:44:25', NULL, NULL),
(4, 'Zure Beren', '8719587321441', b'1', NULL, '2024-10-17 12:44:25', '2024-10-17 12:44:25', NULL, NULL),
(5, 'Cola Flesjes', '8719587321237', b'1', NULL, '2024-10-17 12:44:25', '2024-10-17 12:44:25', NULL, NULL),
(6, 'Turtles', '8719587322245', b'1', NULL, '2024-10-17 12:44:25', '2024-10-17 12:44:25', NULL, NULL),
(7, 'Witte Muizen', '8719587328256', b'1', NULL, '2024-10-17 12:44:25', '2024-10-17 12:44:25', NULL, NULL),
(8, 'Reuzen Slangen', '8719587325641', b'1', NULL, '2024-10-17 12:44:25', '2024-10-17 12:44:25', NULL, NULL),
(9, 'Zoute Rijen', '8719587322739', b'1', NULL, '2024-10-17 12:44:25', '2024-10-17 12:44:25', NULL, NULL),
(10, 'Winegums', '8719587327527', b'1', NULL, '2024-10-17 12:44:25', '2024-10-17 12:44:25', NULL, NULL),
(11, 'Drop Munten', '8719587322345', b'1', NULL, '2024-10-17 12:44:25', '2024-10-17 12:44:25', NULL, NULL),
(12, 'Kruis Drop', '8719587322265', b'1', NULL, '2024-10-17 12:44:25', '2024-10-17 12:44:25', NULL, NULL),
(13, 'Zoute Ruitjes', '8719587323256', b'1', NULL, '2024-10-17 12:44:25', '2024-10-17 12:44:25', NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
