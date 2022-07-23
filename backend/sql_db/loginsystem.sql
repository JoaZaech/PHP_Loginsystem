-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 23. Jul 2022 um 17:30
-- Server-Version: 10.4.17-MariaDB
-- PHP-Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `loginsystem`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `benutzer`
--

CREATE TABLE `benutzer` (
  `PKBenutzer` int(11) NOT NULL,
  `Vorname` varchar(50) NOT NULL,
  `Nachname` varchar(50) NOT NULL,
  `Strasse` varchar(95) NOT NULL,
  `Hausnummer` varchar(5) NOT NULL,
  `Stadt` varchar(35) NOT NULL,
  `PLZ` int(5) NOT NULL,
  `Email` varchar(62) NOT NULL,
  `Passwort` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `benutzer`
--
ALTER TABLE `benutzer`
  ADD PRIMARY KEY (`PKBenutzer`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `benutzer`
--
ALTER TABLE `benutzer`
  MODIFY `PKBenutzer` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
