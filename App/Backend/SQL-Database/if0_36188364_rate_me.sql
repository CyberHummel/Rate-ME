-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 06. Jun 2024 um 14:42
-- Server-Version: 10.4.32-MariaDB
-- PHP-Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `if0_36188364_rate_me`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `post`
--

CREATE TABLE `post` (
  `post_date` date NOT NULL DEFAULT current_timestamp(),
  `post_ID` int(11) NOT NULL,
  `post_rating` int(120) NOT NULL,
  `post_views` int(11) NOT NULL,
  `post_content_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `post`
--

INSERT INTO `post` (`post_date`, `post_ID`, `post_rating`, `post_views`, `post_content_ID`) VALUES
('2024-06-06', 1, 60, 2344, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `post_content`
--

CREATE TABLE `post_content` (
  `post_ID` int(11) NOT NULL,
  `post_content_ID` int(11) NOT NULL,
  `post_content_headline` varchar(20) NOT NULL,
  `post_content_description` text NOT NULL,
  `post_content_image` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `post_content`
--

INSERT INTO `post_content` (`post_ID`, `post_content_ID`, `post_content_headline`, `post_content_description`, `post_content_image`) VALUES
(1, 1, 'Hello', 'Ayo Ayo', '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `user_pre_name` varchar(20) NOT NULL,
  `user_sur_name` varchar(20) NOT NULL,
  `user_username` varchar(40) NOT NULL,
  `user_email` varchar(120) NOT NULL,
  `user_rating` int(120) NOT NULL,
  `user_password` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_join_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_ID`);

--
-- Indizes für die Tabelle `post_content`
--
ALTER TABLE `post_content`
  ADD PRIMARY KEY (`post_content_ID`),
  ADD KEY `post_ID` (`post_ID`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `post`
--
ALTER TABLE `post`
  MODIFY `post_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `post_content`
--
ALTER TABLE `post_content`
  MODIFY `post_content_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `post_content`
--
ALTER TABLE `post_content`
  ADD CONSTRAINT `post_ID` FOREIGN KEY (`post_ID`) REFERENCES `post` (`post_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
