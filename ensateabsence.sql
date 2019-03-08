-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 07, 2018 at 07:44 AM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ensateabsence`
--

-- --------------------------------------------------------

--
-- Table structure for table `absence`
--

DROP TABLE IF EXISTS `absence`;
CREATE TABLE IF NOT EXISTS `absence` (
  `Num` int(20) NOT NULL AUTO_INCREMENT,
  `CNE` varchar(20) NOT NULL,
  `SOM` varchar(50) NOT NULL,
  `Module` varchar(50) NOT NULL,
  `TypeC` varchar(50) NOT NULL,
  `Date` date NOT NULL,
  `Crenau` varchar(50) NOT NULL,
  `TypeA` varchar(50) NOT NULL,
  PRIMARY KEY (`Num`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `absence`
--

INSERT INTO `absence` (`Num`, `CNE`, `SOM`, `Module`, `TypeC`, `Date`, `Crenau`, `TypeA`) VALUES
(1, '1111111111', '22222', 'Programmation WEB', 'TP', '2018-06-04', '8h-10h', 'NJ'),
(2, '1311784225', '1111111111', 'Programmation WEB', 'TP', '2018-06-07', '8h-10h', 'NJ');

-- --------------------------------------------------------

--
-- Table structure for table `absence_s3`
--

DROP TABLE IF EXISTS `absence_s3`;
CREATE TABLE IF NOT EXISTS `absence_s3` (
  `Num` int(20) NOT NULL AUTO_INCREMENT,
  `CNE` varchar(20) NOT NULL,
  `SOM` varchar(50) NOT NULL,
  `Module` varchar(50) NOT NULL,
  `TypeC` varchar(50) NOT NULL,
  `Date` date NOT NULL,
  `Crenau` varchar(50) NOT NULL,
  `TypeA` varchar(50) NOT NULL,
  PRIMARY KEY (`Num`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `absence_s3`
--

INSERT INTO `absence_s3` (`Num`, `CNE`, `SOM`, `Module`, `TypeC`, `Date`, `Crenau`, `TypeA`) VALUES
(1, '1111111111', '1111111', 'Programmation WEB', 'TP', '2017-05-25', '8h-10h', 'J'),
(2, '1111111111', '1111111', 'Langages et compilation', 'TP', '2017-05-25', '10h-12h', 'NJ'),
(3, '1111111111', '1111111', 'C avancé', 'TP', '2017-05-25', '8h-10h', 'NJ'),
(4, '1111111111', '1111111', 'Programmation WEB', 'TP', '2017-05-25', '15h-17h', 'NJ'),
(5, '1111111111', '1111111', 'Programmation WEB', 'Exposé', '2017-05-25', '8h-10h', 'NJ');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `Nom` varchar(100) NOT NULL,
  `Prénom` varchar(100) NOT NULL,
  `Login` varchar(100) NOT NULL,
  `Pass` varchar(100) NOT NULL,
  PRIMARY KEY (`Login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Nom`, `Prénom`, `Login`, `Pass`) VALUES
('Admin', 'Num 2', 'ensaté2', '22222222'),
('Admin', 'Num 1', 'majd', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

DROP TABLE IF EXISTS `module`;
CREATE TABLE IF NOT EXISTS `module` (
  `Num` int(20) NOT NULL AUTO_INCREMENT,
  `Module` varchar(100) NOT NULL,
  PRIMARY KEY (`Num`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`Num`, `Module`) VALUES
(1, 'Programmation WEB'),
(2, 'C avancé'),
(3, 'Langages et compilation'),
(4, 'Systèmes Exploitation et Unix'),
(5, 'Architecture des ordinateurs et Assembleur'),
(6, 'Électronique numérique');

-- --------------------------------------------------------

--
-- Table structure for table `prof`
--

DROP TABLE IF EXISTS `prof`;
CREATE TABLE IF NOT EXISTS `prof` (
  `Num` int(20) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(30) NOT NULL,
  `Prénom` varchar(30) NOT NULL,
  `SOM` varchar(30) NOT NULL,
  `Pass` varchar(30) NOT NULL,
  `Sexe` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Telephone` varchar(30) NOT NULL,
  PRIMARY KEY (`Num`),
  UNIQUE KEY `SOM` (`SOM`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prof`
--

INSERT INTO `prof` (`Num`, `Nom`, `Prénom`, `SOM`, `Pass`, `Sexe`, `Email`, `Telephone`) VALUES
(1, '1', 'Prof', '22222', '123456', 'M', 'XXXXXXXXXX', 'XXXXXX'),
(10, 'EL YOUNOUSSI', 'Yacine', '1111111111', 'yacine', 'M', 'xxxxxxx', 'xxxxxxxx'),
(11, 'EL FOUKI', 'MOHAMED', '3333333333', 'mohamed', 'M', 'xxxxxxxx', 'xxxxxxxx'),
(12, 'EL BOUHDIDI', 'JABER', '4444444444', 'jaber', 'M', 'xxxxxxxx', 'xxxxxxxx'),
(15, 'EL BOUHDIDI', 'JABER', '4444444445', 'jaber', 'M', 'xxxxxxxx', 'xxxxxxxx'),
(16, 'ZAKRITI', 'ALIA', '55555555555', 'alia', 'F', 'xxxxxxxx', 'xxxxxxxx'),
(18, 'ZAKRITI', 'ALIA', '55555555556', 'alia', 'F', 'xxxxxxxx', 'xxxxxxxx');

-- --------------------------------------------------------

--
-- Table structure for table `étudiant`
--

DROP TABLE IF EXISTS `étudiant`;
CREATE TABLE IF NOT EXISTS `étudiant` (
  `Num` int(20) NOT NULL AUTO_INCREMENT,
  `Prénom` varchar(100) NOT NULL,
  `Nom` varchar(100) NOT NULL,
  `CNE` varchar(100) NOT NULL,
  `CIN` varchar(100) NOT NULL,
  `Pass` varchar(100) NOT NULL,
  `Date` date NOT NULL,
  `Lieu` varchar(100) NOT NULL,
  `Sexe` varchar(100) NOT NULL,
  `Adresse` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Téléphone` varchar(100) NOT NULL,
  `AbsGNJ` int(20) DEFAULT NULL,
  `AbsGJ` int(20) DEFAULT NULL,
  `AbsG` int(20) DEFAULT NULL,
  PRIMARY KEY (`Num`),
  UNIQUE KEY `CNE` (`CNE`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `étudiant`
--

INSERT INTO `étudiant` (`Num`, `Prénom`, `Nom`, `CNE`, `CIN`, `Pass`, `Date`, `Lieu`, `Sexe`, `Adresse`, `Email`, `Téléphone`, `AbsGNJ`, `AbsGJ`, `AbsG`) VALUES
(1, 'Etudiant', '1', '1111111111', 'XXXXXX', '123456', '1999-12-13', 'XXXXX', 'M', 'XXXXXXXXXXXXXX', 'XXXXXXXXXXXXX', 'XXXXXXXXXX', 1, 0, 1),
(3, 'TARIK', 'BOUKOYEN', '12456789', 'DG34245', 'tarik', '1997-03-04', 'tanger', 'M', 'xxxxxxxxxx', 'xxxxxxxxxx', 'xxxxxxxxxx', NULL, NULL, NULL),
(4, 'HASNAE', 'GUISI', '12457889', 'CD35645', 'hasnae', '1997-03-31', 'fes', 'M', 'xxxxxxxxxx', 'xxxxxxxxxx', 'xxxxxxxxxx', NULL, NULL, NULL),
(5, 'SBIHI', 'HICHAM', '12454389', 'JK35645', 'hicham', '1997-04-12', 'rabat', 'M', 'xxxxxxxxxx', 'xxxxxxxxxx', 'xxxxxxxxxx', NULL, NULL, NULL),
(6, 'WAIL', 'EL YOUSFI', '12454365', 'JK35654', 'wail', '1997-04-12', 'tetouan', 'M', 'xxxxxxxxxx', 'xxxxxxxxxx', 'xxxxxxxxxx', NULL, NULL, NULL),
(7, 'SALIM', 'EL AZHARI', '12454378', 'JK35344', 'salim', '1997-04-05', 'rabat', 'M', 'xxxxxxxxxx', 'xxxxxxxxxx', 'xxxxxxxxxx', NULL, NULL, NULL),
(8, 'MAJD', 'CHAGROUFI', '1311784225', 'CD280279', 'majd', '1995-04-07', 'fes', 'M', 'xxxxxxxxxx', 'xxxxxxxxxx', 'xxxxxxxxxx', 1, NULL, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
