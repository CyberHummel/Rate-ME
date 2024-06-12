-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 12. Jun 2024 um 00:44
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
  `post_date` date NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `post_ID` int(11) NOT NULL,
  `post_rating` int(120) NOT NULL,
  `post_views` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `post`
--

INSERT INTO `post` (`post_date`, `post_ID`, `post_rating`, `post_views`) VALUES
('2024-06-11', 1, 100, 0),
('2024-06-11', 2, 0, 0),
('2024-06-11', 3, 0, 0),
('2024-06-11', 4, 0, 0),
('2024-06-11', 5, 0, 0),
('2024-06-11', 6, 0, 0),
('2024-06-11', 7, 0, 0),
('2024-06-11', 8, 0, 0),
('2024-06-11', 9, 0, 0),
('2024-06-11', 10, 0, 0),
('2024-06-12', 13, 0, 0);

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
(10, 'Erster Post', 'Hallo Welt! Dies ist der erste Test-Post.', ''),
(11, 'Zweiter Post', 'Heute ist ein schöner Tag.', ''),
(12, 'Dritter Post', 'Ein bisschen Spaß muss sein!', ''),
(13, 'Vierter Post', 'Langeweile? Nicht mit uns!', ''),
(14, 'Fünfter Post', 'Das Leben ist schön!', ''),
(15, 'Sechster Post', 'Auf zu neuen Abenteuern!', ''),
(16, 'Siebter Post', 'Guten Morgen, Welt!', ''),
(17, 'Achter Post', 'Ein Lächeln am Morgen vertreibt Kummer und Sorgen.', ''),
(18, 'Neunter Post', 'Carpe Diem!', ''),
(19, 'Zehnter Post', 'Träume nicht dein Leben, sondern lebe deinen Traum.', ''),
(20, '1', '1', '');

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
(1, 10),
(2, 11),
(3, 12),
(4, 13),
(5, 14),
(6, 15),
(7, 16),
(8, 17),
(9, 18),
(10, 19),
(13, 20);

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
('Maximus', 'der Große', 'maximusDerGroße', 'maximus@example.com', 0, 'pass123', 3, '2024-06-11'),
('Anna', 'Schmidt', 'annaDasSchnidchen', 'anna.schmidt@example.com', 0, 'password456', 4, '2024-06-11'),
('Tom', 'Meier', 'tomHatEier', 'tom.meier@example.com', 0, 'password789', 5, '2024-06-11'),
('Lena', 'Müller', 'beiLenaMuellerts', 'lena.mueller@example.com', 0, 'passwordabc', 6, '2024-06-11'),
('David', 'Schulz', 'davidSchulzMachtSyncro', 'david.schulz@example.com', 0, 'passworddef', 7, '2024-06-11'),
('Maximus', 'Nolte', '1', '1@1', 100, '1', 8, '2024-06-11');

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

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user_posts`
--

CREATE TABLE `user_posts` (
  `user_id` int(11) NOT NULL,
  `post_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `user_posts`
--

INSERT INTO `user_posts` (`user_id`, `post_ID`) VALUES
(3, 1),
(3, 2),
(4, 3),
(4, 4),
(5, 5),
(5, 6),
(6, 7),
(6, 8),
(7, 9),
(7, 10);

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
-- Indizes für die Tabelle `post_ids`
--
ALTER TABLE `post_ids`
  ADD PRIMARY KEY (`post_ID`,`post_content_ID`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indizes für die Tabelle `user_friend`
--
ALTER TABLE `user_friend`
  ADD PRIMARY KEY (`user_1_ID`,`user_2_ID`);

--
-- Indizes für die Tabelle `user_posts`
--
ALTER TABLE `user_posts`
  ADD PRIMARY KEY (`user_id`,`post_ID`),
  ADD KEY `post_ID` (`post_ID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `post`
--
ALTER TABLE `post`
  MODIFY `post_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT für Tabelle `post_content`
--
ALTER TABLE `post_content`
  MODIFY `post_content_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `user_posts`
--
ALTER TABLE `user_posts`
  ADD CONSTRAINT `user_posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_posts_ibfk_2` FOREIGN KEY (`post_ID`) REFERENCES `post` (`post_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
