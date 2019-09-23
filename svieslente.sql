-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 2019 m. Rgs 23 d. 20:59
-- Server version: 5.7.24
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `svieslente`
--

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `eile`
--

DROP TABLE IF EXISTS `eile`;
CREATE TABLE IF NOT EXISTS `eile` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `vardas` varchar(255) NOT NULL,
  `bukle` int(10) NOT NULL DEFAULT '0',
  `priemimo_laikas` int(10) NOT NULL DEFAULT '0',
  `atleidimo_laikas` int(10) NOT NULL DEFAULT '0',
  `kodas` varchar(10) NOT NULL DEFAULT '0000000000',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;

--
-- Sukurta duomenų kopija lentelei `eile`
--

INSERT INTO `eile` (`ID`, `vardas`, `bukle`, `priemimo_laikas`, `atleidimo_laikas`, `kodas`) VALUES
(32, 'Antanas', 2, 1569269303, 1569269357, '0'),
(33, 'Rapolas', 2, 1569269358, 1569269361, '0'),
(34, 'Klebonas', 2, 1569269382, 1569269385, '0'),
(35, 'Donkratas', 2, 1569269387, 1569269388, '0'),
(36, 'Klebonas', 2, 1569269684, 1569269688, '0000000000'),
(37, 'Antanas', 2, 1569269998, 1569269999, '0000000000'),
(38, 'Justelis', 2, 1569270000, 1569270001, '0000000000'),
(39, 'Klebonas', 2, 1569270002, 1569270003, '0000000000'),
(40, 'Mantas', 2, 1569270003, 1569270004, '0000000000'),
(41, 'Antanas', 2, 1569270324, 1569270331, '0000000000'),
(42, 'Antanas', 1, 1569270355, 0, '0000000000'),
(43, 'Mantas', 0, 0, 0, '0000000000'),
(44, 'Klebonas', 0, 0, 0, '0000000000'),
(45, 'Justelenas', 0, 0, 0, '5160460413'),
(46, 'Antanis', 0, 0, 0, '1860160833');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
