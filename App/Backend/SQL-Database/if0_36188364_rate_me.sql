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
  `post_views` int(11) NOT NULL,
  PRIMARY KEY (`post_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `post`
--

-- Neue Test-Posts einfügen
INSERT INTO `post` (`post_ID`, `post_date`, `post_rating`, `post_views`) VALUES
(1, '2024-06-11', 0, 0),
(2, '2024-06-11', 0, 0),
(3, '2024-06-11', 0, 0),
(4, '2024-06-11', 0, 0),
(5, '2024-06-11', 0, 0),
(6, '2024-06-11', 0, 0),
(7, '2024-06-11', 0, 0),
(8, '2024-06-11', 0, 0),
(9, '2024-06-11', 0, 0),
(10, '2024-06-11', 0, 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `post_content`
--

CREATE TABLE `post_content` (
  `post_content_ID` int(11) NOT NULL,
  `post_content_headline` varchar(20) NOT NULL,
  `post_content_description` text NOT NULL,
  `post_content_image` blob NOT NULL,
  PRIMARY KEY (`post_content_ID`)
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
(19, 'Zehnter Post', 'Träume nicht dein Leben, sondern lebe deinen Traum.', '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `post_ids`
--

CREATE TABLE `post_ids` (
  `post_ID` int(11) NOT NULL,
  `post_content_ID` int(11) NOT NULL,
  PRIMARY KEY (`post_ID`, `post_content_ID`)
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
(10, 19);

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
  `user_join_date` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `user`
--

-- Neue Test-Benutzer einfügen
INSERT INTO `user` (`user_pre_name`, `user_sur_name`, `user_username`, `user_email`, `user_rating`, `user_password`, `user_id`, `user_join_date`) VALUES
('Maximus', 'der Große', 'maximusDerGroße', 'maximus@example.com', 0, 'pass123', 3, '2024-06-11'),
('Anna', 'Schmidt', 'annaDasSchnidchen', 'anna.schmidt@example.com', 0, 'password456', 4, '2024-06-11'),
('Tom', 'Meier', 'tomHatEier', 'tom.meier@example.com', 0, 'password789', 5, '2024-06-11'),
('Lena', 'Müller', 'beiLenaMuellerts', 'lena.mueller@example.com', 0, 'passwordabc', 6, '2024-06-11'),
('David', 'Schulz', 'davidSchulzMachtSyncro', 'david.schulz@example.com', 0, 'passworddef', 7, '2024-06-11');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user_friend`
--

CREATE TABLE `user_friend` (
  `user_1_ID` int(11) NOT NULL,
  `user_2_ID` int(11) NOT NULL,
  PRIMARY KEY (`user_1_ID`, `user_2_ID`)
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
  `post_ID` int(11) NOT NULL,
  PRIMARY KEY (`user_id`, `post_ID`),
  FOREIGN KEY (`user_id`) REFERENCES `user`(`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`post_ID`) REFERENCES `post`(`post_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `user_posts`
--

INSERT INTO `user_posts` (`user_id`, `post_ID`) VALUES
(3, 1),  -- Maximus der Große
(3, 2),
(4, 3),  -- Anna Schmidt
(4, 4),
(5, 5),  -- Tom Meier
(5, 6),
(6, 7),  -- Lena Müller
(6, 8),
(7, 9),  -- David Schulz
(7, 10);

--
-- Tabellenstruktur für Tabelle post_likes
--
    CREATE TABLE `post_likes` (
  `like_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `post_ID` int(11) NOT NULL,
  `like_type` enum('like','dislike') NOT NULL,
  PRIMARY KEY (`like_id`),
  UNIQUE KEY `unique_like` (`user_id`,`post_ID`),
  FOREIGN KEY (`user_id`) REFERENCES `user`(`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`post_ID`) REFERENCES `post`(`post_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
--
-- für likes
--
    ALTER TABLE `post` 
  ADD COLUMN `post_likes` INT NOT NULL DEFAULT 0,
  ADD COLUMN `post_dislikes` INT NOT NULL DEFAULT 0;
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
