-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Erstellungszeit: 07. Dez 2021 um 21:47
-- Server-Version: 10.4.21-MariaDB
-- PHP-Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `studium`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `lehrveranstaltungen`
--

CREATE TABLE `lehrveranstaltungen` (
  `name` varchar(20) NOT NULL,
  `typ` varchar(20) NOT NULL,
  `dozent` varchar(20) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `sws` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `lehrveranstaltungen`
--

INSERT INTO `lehrveranstaltungen` (`name`, `typ`, `dozent`, `semester`, `sws`) VALUES
('WebTech', 'SU', 'Fuchs-Kittowski', 'WiSe2021', 2),
('WebTech', 'Ü', 'Fuchs-Kittowski', 'WiSe2021', 2),
('PUIG', 'P', 'Pohle', 'WiSe2021', 3),
('Modellierung', 'SU', 'Fuchs-Kittowski', 'SoSe2020', 4);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
