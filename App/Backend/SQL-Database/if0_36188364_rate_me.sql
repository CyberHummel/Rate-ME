-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 10. Jun 2024 um 18:13
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
  `post_views` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `post`
--

INSERT INTO `post` (`post_date`, `post_ID`, `post_rating`, `post_views`) VALUES
('2024-06-10', 10, 0, 0),
('2024-06-10', 11, 0, 0),
('2024-06-10', 12, 0, 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `post_content`
--

CREATE TABLE `post_content` (
  `post_content_ID` int(11) NOT NULL,
  `post_content_headline` varchar(20) NOT NULL,
  `post_content_description` text NOT NULL,
  `post_content_image` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `post_content`
--

INSERT INTO `post_content` (`post_content_ID`, `post_content_headline`, `post_content_description`, `post_content_image`) VALUES
(9, 'Test ', 'sad', ''),
(10, 'Test ', 'sad', ''),
(11, 'Test', 'asdasd', '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `post_ids`
--

CREATE TABLE `post_ids` (
  `post_ID` int(11) NOT NULL,
  `post_content_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `post_ids`
--

INSERT INTO `post_ids` (`post_ID`, `post_content_ID`) VALUES
(10, 9),
(11, 10),
(12, 11);

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
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`user_pre_name`, `user_sur_name`, `user_username`, `user_email`, `user_rating`, `user_password`, `user_id`, `user_join_date`) VALUES
('asdasd', 'asdasd', 'asdasd', 'asdasd@sadsdasd', 0, '$2y$10$YeocXVRnRyuaK', 1, '2024-06-09'),
('asdasd', 'sadasdasd', 'derMarius', 'asdasdas@sdasd', 0, '1', 2, '2024-06-09');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user_friend`
--

CREATE TABLE `user_friend` (
  `user_1_ID` int(11) NOT NULL,
  `user_2_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `user_friend`
--

INSERT INTO `user_friend` (`user_1_ID`, `user_2_ID`) VALUES
(1, 2);

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
  ADD PRIMARY KEY (`post_content_ID`);

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
  MODIFY `post_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT für Tabelle `post_content`
--
ALTER TABLE `post_content`
  MODIFY `post_content_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
