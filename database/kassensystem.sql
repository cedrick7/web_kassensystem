-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Erstellungszeit: 30. Jun 2020 um 10:55
-- Server-Version: 5.7.26
-- PHP-Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Datenbank: `kassensystem`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Benutzerkonten`
--

CREATE TABLE `Benutzerkonten` (
  `ID` int(5) NOT NULL,
  `username` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `Benutzerkonten`
--

INSERT INTO `Benutzerkonten` (`ID`, `username`, `firstname`, `lastname`, `password`) VALUES
(1, 'admin1', 'Cedrick', 'Candia', 'admin123'),
(2, 'admin2', 'Jeremy', 'Fuchs', 'admin123'),
(3, 'Max1998', 'Max', 'Muster', 'Max1998');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Produkte`
--

CREATE TABLE `Produkte` (
  `ID` int(5) NOT NULL,
  `Produktname` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Produktkategorie` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Preis` decimal(4,2) NOT NULL,
  `Rabatt` decimal(4,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `Produkte`
--

INSERT INTO `Produkte` (`ID`, `Produktname`, `Produktkategorie`, `Preis`, `Rabatt`) VALUES
(1, 'Weizenmischbrot (250g)', 'Brot', '1.20', NULL),
(2, 'Weizenmischbrot (500g)', 'Brot', '1.85', NULL),
(3, 'Roggen-Mischbrot (250g)', 'Brot', '1.20', NULL),
(4, 'Roggen-Mischbrot (500g)', 'Brot', '1.85', NULL),
(5, 'Gutsherrenbrot (500g)', 'Brot', '1.90', NULL),
(6, 'Gutsherrenbrot (1000g)', 'Brot', '2.90', NULL),
(7, 'Kosakenbrot (750g)', 'Brot', '2.80', NULL),
(8, 'Holzluckenbrot (750g)', 'Brot', '2.60', NULL),
(9, 'Rheinländer (750g)', 'Brot', '2.70', NULL),
(10, 'Kraftkorn (500g)', 'Brot', '2.10', NULL),
(11, 'Milchbrötchen', 'Weck', '0.55', NULL),
(12, 'Sesamweck', 'Weck', '0.45', NULL),
(13, 'Kernige Franzose', 'Weck', '0.60', NULL),
(14, 'Laugenstangen', 'Weck', '0.65', NULL),
(15, 'Laugenbrezeln', 'Weck', '0.65', NULL),
(16, 'Puddingknoten', 'Stückchen', '1.05', NULL),
(17, 'Schockoschnecke', 'Stückchen', '1.05', NULL),
(18, 'Einback', 'Stückchen', '0.85', NULL),
(19, 'Schockobrötchen', 'Stückchen', '0.90', NULL),
(20, 'Rosinenbrötchen', 'Stückchen', '0.90', NULL),
(21, 'Plunder-Nußstange', 'Stückchen', '1.15', NULL),
(22, 'Plunder-Pudding', 'Stückchen', '1.15', NULL),
(23, 'Plunder-Kirschtasche', 'Stückchen', '1.10', NULL),
(24, 'Plunder-Apfeltasche', 'Stückchen', '1.10', NULL),
(25, 'Crossaint', 'Stückchen', '1.10', NULL),
(26, 'Nougat-Crossaint', 'Stückchen', '1.15', NULL),
(27, 'Butter-Hefekranz', 'Kuchen', '9.10', NULL),
(28, 'Butter-Zopf o.G. klein', 'Kuchen', '2.45', NULL),
(29, 'Butter-Zopf o.G. groß', 'Kuchen', '4.55', NULL),
(30, 'Nuss-Zopf', 'Kuchen', '5.58', NULL),
(31, 'Marzipan-Zopf', 'Kuchen', '5.58', NULL),
(32, 'Käsekuchen', 'Kuchen', '6.10', NULL),
(33, 'Schockokuchen', 'Kuchen', '7.10', NULL),
(34, 'Kaffee to-go (klein)', 'Getränke', '1.05', NULL),
(35, 'Kaffee to-go (groß)', 'Getränke', '1.25', NULL),
(36, 'Tee to-go (klein)', 'Getränke', '0.85', NULL);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `Benutzerkonten`
--
ALTER TABLE `Benutzerkonten`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `Produkte`
--
ALTER TABLE `Produkte`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `Benutzerkonten`
--
ALTER TABLE `Benutzerkonten`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `Produkte`
--
ALTER TABLE `Produkte`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
