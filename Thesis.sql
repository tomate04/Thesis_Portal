-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 19. Dez 2022 um 10:36
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
  `User_ID` int(11) NOT NULL,
  `Status` varchar(200) DEFAULT NULL,
  `Prof_Email` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `abschlussarbeit`
--

INSERT INTO `abschlussarbeit` (`ThesisID`, `Titel`, `Fachbereich`, `User_ID`, `Status`, `Prof_Email`) VALUES
(1, 'SQL', 'Fachbereich 5', 15, 'Angefragt', 'asda@adgsdg.de'),
(7, 'fsdag', 'jhg', 25, 'Angefragt', '123124'),
(8, 'dsfhs', 'kjgkh', 25, 'Angefragt', 'egwger'),
(9, 'asdasddsa', 'dgfgfdfdg', 15, 'Angefragt', 'till.albert@hs-flensburg.de'),
(10, 'BPM', 'Fachbereich 5', 15, 'In Bearbeitung', 'till.albert@hs-flensburg.de'),
(11, 'SQL MIT KP', 'Fachbereich 5', 15, 'Angefragt', 'till.albert@hs-flensburg.de'),
(12, 'sdfasdf', 'gasdgasd', 15, 'Angefragt', 'Prof. Dr. rer. pol., MBA Thorsten Kümper');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `anfragen`
--

CREATE TABLE `anfragen` (
  `AnfrageID` int(11) NOT NULL,
  `Thema` varchar(300) NOT NULL,
  `Status` varchar(100) NOT NULL,
  `id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `anfragen`
--

INSERT INTO `anfragen` (`AnfrageID`, `Thema`, `Status`, `id`) VALUES
(35, 'Bitcoin', 'Angefragt', NULL),
(36, 'Cloud', 'Angefragt', NULL),
(37, 'SQL', 'Angefragt', NULL),
(38, 'SQL', 'Angefragt', 16);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `vorname` varchar(250) DEFAULT NULL,
  `nachname` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`, `vorname`, `nachname`) VALUES
(15, 'felix.bloch@stud.hs-flensburg.de', '111111', '2022-11-26 14:04:13', NULL, NULL),
(16, 'till.albert@hs-flensburg.de', '111111', '2022-11-26 14:04:29', NULL, NULL),
(20, 'felix.albert@hs-flensburg.de', '111111', '2022-11-26 14:13:18', NULL, NULL),
(21, 'till.albesrt@hs-flensburg.de', 'aaaaaa', '2022-11-27 11:27:49', NULL, NULL),
(22, 'till.albasdert@hs-flensburg.de', '123456', '2022-11-27 13:22:20', NULL, NULL),
(23, 'felix.blocaah@stud.hs-flensburg.de', '111111', '2022-11-28 22:09:58', 'Vorname', 'Nachname'),
(25, 'felix.baloch@stud.hs-flensburg.de', '111111', '2022-11-28 22:13:22', 'Felix', 'Bloch'),
(26, 'max.baloch@stud.hs-flensburg.de', '111111', '2022-12-05 14:19:19', 'max', 'bloch'),
(27, 'felix.balocdh@stud.hs-flensburg.de', '111111', '2022-12-05 14:21:14', 'Felix', 'Bloch');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `abschlussarbeit`
--
ALTER TABLE `abschlussarbeit`
  ADD PRIMARY KEY (`ThesisID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indizes für die Tabelle `anfragen`
--
ALTER TABLE `anfragen`
  ADD PRIMARY KEY (`AnfrageID`),
  ADD KEY `id` (`id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `User_id` (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `abschlussarbeit`
--
ALTER TABLE `abschlussarbeit`
  MODIFY `ThesisID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT für Tabelle `anfragen`
--
ALTER TABLE `anfragen`
  MODIFY `AnfrageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `abschlussarbeit`
--
ALTER TABLE `abschlussarbeit`
  ADD CONSTRAINT `abschlussarbeit_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `users` (`id`);

--
-- Constraints der Tabelle `anfragen`
--
ALTER TABLE `anfragen`
  ADD CONSTRAINT `anfragen_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
