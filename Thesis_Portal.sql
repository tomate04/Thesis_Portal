-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 23. Dez 2022 um 15:26
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
  `Prof_Email` varchar(200) DEFAULT NULL,
  `Abstract` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `abschlussarbeit`
--

INSERT INTO `abschlussarbeit` (`ThesisID`, `Titel`, `Fachbereich`, `User_ID`, `Status`, `Prof_Email`, `Abstract`) VALUES
(1, 'Die Entwicklung der KI in der Zukunft', 'Fachbereich 4', 15, 'In Bearbeitung', 'till.albert@hs-flensburg.de', 'ünstliche Intelligenz (KI), auch artifizielle Intelligenz (AI bzw. A. I.), englisch artificial intelligence, ist ein Teilgebiet der Informatik, das sich mit der Automatisierung intelligenten Verhaltens und dem maschinellen Lernen befasst. Der Begriff ist schwierig zu definieren, da es bereits an ein'),
(10, 'BPM', 'Fachbereich 4', 15, 'In Bearbeitung', 'till.albert@hs-flensburg.de', ''),
(13, '', '', 25, 'In Bearbeitung', 'till.albert@hs-flensburg.de', ''),
(14, 'SQL', 'Fachbereich 4', 25, 'Abgelehnt', 'till.albert@hs-flensburg.de', ''),
(15, 'Netzwerke', 'Fachbereich 4', 20, 'Angefragt', 'jan.gerken@hs-flensburg.de', 'Als Netze oder Netzwerke (englisch net oder englisch network) werden interdisziplinär Systeme bezeichnet, deren zugrundeliegende Struktur sich mathematisch als Graph modellieren lässt und die über Mechanismen zu ihrer Selbstorganisation verfügen. Der Graph besteht aus einer Menge von Elementen (Knot'),
(17, 'Rechnungswesen ', 'Fachbereich 4', 25, 'Angefragt', 'thorsten.kuemper@hs-flensburg.de', 'Das Rechnungswesen (RW oder auch REWE) oder (seltener) Unternehmensrechnung ist ein Teilgebiet der Betriebswirtschaftslehre und dient der systematischen Erfassung, Überwachung und informatorischen Verdichtung der durch den betrieblichen Leistungsprozess entstehenden Geld- und Leistungsströme.'),
(18, 'Schiffsbau', 'Fachbereich 1', 26, 'Angefragt', 'ulrich.welland@hs-flensburg.de', 'Der Schiffbau findet in spezialisierten Betrieben, den Werften, statt. Dort werden die Einzelteile aus Stahl- bzw. Leichtmetallblech und Profilen ausgeschnitten. Im Stahlschiffbau sind Hollandprofile (nach EN 10067: Wulstprofil/Bulbprofile) gebräuchlich, dies sind Rechteckprofile mit einem ähnlich g'),
(20, 'Windkraft', 'Fachbereich 2', 20, 'Angefragt', 'lasse.tausch-nebel@hs-flensburg.de', 'Eine Windkraftanlage (Abk.: WKA) oder Windenergieanlage (Abk.: WEA) wandelt die Bewegungsenergie des Windes in elektrische Energie um und speist sie in ein Stromnetz ein. Umgangssprachlich werden auch die Bezeichnungen Windkraftwerk oder einfach nur Windrad verwendet. Windkraftanlagen sind heute mit'),
(21, 'asd', 'hgfh', 15, 'Angefragt', 'jan.gerken@hs-flensburg.de', '');

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
  MODIFY `ThesisID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
