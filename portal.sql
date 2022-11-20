-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 20. Nov 2022 um 13:09
-- Server-Version: 10.4.25-MariaDB
-- PHP-Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `portal`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `abschlussarbeit`
--

CREATE TABLE `abschlussarbeit` (
  `ThesisID` int(11) NOT NULL,
  `Titel` varchar(300) NOT NULL,
  `Fachbereich` varchar(50) NOT NULL,
  `Professor` varchar(100) NOT NULL,
  `Firma` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `abschlussarbeit`
--

INSERT INTO `abschlussarbeit` (`ThesisID`, `Titel`, `Fachbereich`, `Professor`, `Firma`) VALUES
(1, 'Bio basierte Kunststoffe', 'Fachbereich 5', '', ''),
(2, 'lara ist sehr nett heute ', 'Genie', '', ''),
(3, 'Test', 'Fachbereich 1', 'Kai Peters', 'SAP');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'felix', '$2y$10$Ct4VWP10Nazy.oXPnv3OnOhFdO.LduFEd47eDvJAtA.O45NX4mAIO', '2022-11-11 18:48:28'),
(2, 'asdasd', '$2y$10$HA5XraY9tYAeGxVkoMlLZuV/cjh3FlOxETMwH0HB/qIjlNzRmV/xm', '2022-11-11 18:51:04'),
(3, 'felixbloch', '$2y$10$WDjhpd.VRpEiY3YshtUORegKs/RJN4g6T7GJqEKRvbnkv3IIPfmei', '2022-11-11 20:05:22');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `abschlussarbeit`
--
ALTER TABLE `abschlussarbeit`
  ADD PRIMARY KEY (`ThesisID`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `abschlussarbeit`
--
ALTER TABLE `abschlussarbeit`
  MODIFY `ThesisID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
