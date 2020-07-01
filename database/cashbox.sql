-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Erstellungszeit: 01. Jul 2020 um 23:15
-- Server-Version: 5.7.26
-- PHP-Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Datenbank: `cashbox`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `category` int(11) NOT NULL,
  `price` decimal(4,2) NOT NULL,
  `discount` decimal(4,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `product`
--

INSERT INTO `product` (`id`, `name`, `category`, `price`, `discount`) VALUES
(1, 'Weizenmischbrot (250g)', 1, '1.20', NULL),
(2, 'Weizenmischbrot (500g)', 1, '1.85', NULL),
(3, 'Roggen-Mischbrot (250g)', 1, '1.20', NULL),
(4, 'Roggen-Mischbrot (500g)', 1, '1.85', NULL),
(5, 'Gutsherrenbrot (500g)', 1, '1.90', NULL),
(6, 'Gutsherrenbrot (1000g)', 1, '2.90', NULL),
(7, 'Kosakenbrot (750g)', 1, '2.80', NULL),
(8, 'Holzluckenbrot (750g)', 1, '2.60', NULL),
(9, 'Rheinländer (750g)', 1, '2.70', NULL),
(10, 'Kraftkorn (500g)', 1, '2.10', NULL),
(11, 'Milchbrötchen', 2, '0.55', NULL),
(12, 'Sesamweck', 2, '0.45', NULL),
(13, 'Kernige Franzose', 2, '0.60', NULL),
(14, 'Laugenstangen', 2, '0.65', NULL),
(15, 'Laugenbrezeln', 2, '0.65', NULL),
(16, 'Puddingknoten', 3, '1.05', NULL),
(17, 'Schockoschnecke', 3, '1.05', NULL),
(18, 'Einback', 3, '0.85', NULL),
(19, 'Schockobrötchen', 3, '0.90', NULL),
(20, 'Rosinenbrötchen', 3, '0.90', NULL),
(21, 'Plunder-Nußstange', 3, '1.15', NULL),
(22, 'Plunder-Pudding', 3, '1.15', NULL),
(23, 'Plunder-Kirschtasche', 3, '1.10', NULL),
(24, 'Plunder-Apfeltasche', 3, '1.10', NULL),
(25, 'Crossaint', 3, '1.10', NULL),
(26, 'Nougat-Crossaint', 3, '1.15', NULL),
(27, 'Butter-Hefekranz', 4, '9.10', NULL),
(28, 'Butter-Zopf o.G. klein', 4, '2.45', NULL),
(29, 'Butter-Zopf o.G. groß', 4, '4.55', NULL),
(30, 'Nuss-Zopf', 4, '5.58', NULL),
(31, 'Marzipan-Zopf', 4, '5.58', NULL),
(32, 'Käsekuchen', 4, '6.10', NULL),
(33, 'Schockokuchen', 4, '7.10', NULL),
(34, 'Kaffee to-go (klein)', 5, '1.05', NULL),
(35, 'Kaffee to-go (groß)', 5, '1.25', NULL),
(36, 'Tee to-go (klein)', 5, '0.85', NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `productcategory`
--

CREATE TABLE `productcategory` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `productcategory`
--

INSERT INTO `productcategory` (`id`, `name`) VALUES
(1, 'Brot'),
(2, 'Weck'),
(3, 'Stückchen'),
(4, 'Kuchen'),
(5, 'Getränke');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `firstname` varchar(40) NOT NULL,
  `lastname` varchar(40) NOT NULL,
  `password` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`id`, `username`, `firstname`, `lastname`, `password`) VALUES
(1, 'admin1', 'Cedrick', 'Candia', 'admin123'),
(2, 'admin2', 'Jeremy', 'Fuchs', 'admin123'),
(3, 'Max1998', 'Max', 'Muster', 'Max1998');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `productcategory`
--
ALTER TABLE `productcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT für Tabelle `productcategory`
--
ALTER TABLE `productcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
