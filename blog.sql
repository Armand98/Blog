-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Czas generowania: 09 Lis 2019, 21:54
-- Wersja serwera: 5.7.26
-- Wersja PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `blog`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(25) COLLATE utf8_polish_ci NOT NULL,
  `post_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `text` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `type` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `comment_id` (`id`),
  KEY `post_id` (`post_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `comment`
--

INSERT INTO `comment` (`id`, `login`, `post_id`, `date`, `text`, `type`) VALUES
(1, 'Armand', 1, '2019-11-09 20:52:00', 'Komentarz testowy', 1),
(2, 'Anonymous', 1, '2019-11-09 21:34:01', '123', 1),
(3, 'Anonymous', 1, '2019-11-09 21:35:55', 'test', 1),
(4, 'Anonymous', 1, '2019-11-09 21:39:45', '123456789', 1),
(6, 'Anonymous', 1, '2019-11-09 21:46:06', '54564564564654', 1),
(7, 'Anonymous', 1, '2019-11-09 21:46:28', 'love', 1),
(8, 'Armand', 1, '2019-11-09 21:51:16', 'looowe', 1),
(9, 'Armand', 1, '2019-11-09 21:52:56', '123', 2),
(10, 'Armand', 1, '2019-11-09 21:53:11', '321', 3);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(25) COLLATE utf8_polish_ci NOT NULL,
  `title` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `content` longtext COLLATE utf8_polish_ci NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `post_id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `post`
--

INSERT INTO `post` (`id`, `login`, `title`, `content`, `date`) VALUES
(1, 'Armand', 'test1', '<p>test11111<br></p>', '2019-11-09 18:18:52');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `puzzle`
--

DROP TABLE IF EXISTS `puzzle`;
CREATE TABLE IF NOT EXISTS `puzzle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(25) COLLATE utf8_polish_ci NOT NULL,
  `title` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `content` longtext COLLATE utf8_polish_ci NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `post_id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `puzzle`
--

INSERT INTO `puzzle` (`id`, `login`, `title`, `content`, `date`) VALUES
(1, 'Armand', 'Zagadka1', '<p>Zagadka1<br></p>', '2019-11-09 19:35:54');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `quote`
--

DROP TABLE IF EXISTS `quote`;
CREATE TABLE IF NOT EXISTS `quote` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(25) COLLATE utf8_polish_ci NOT NULL,
  `title` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `content` longtext COLLATE utf8_polish_ci NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `post_id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `quote`
--

INSERT INTO `quote` (`id`, `login`, `title`, `content`, `date`) VALUES
(1, 'Armand', 'cytat1', '<p>cytat1<br></p>', '2019-11-09 19:36:07');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `date` datetime NOT NULL,
  `privilege` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`user_id`, `login`, `password`, `email`, `date`, `privilege`) VALUES
(1, 'Armand', '$2y$10$AuVpu21.xY4FEJ342WP5muoFQMhwN9Kl6NySotFsLOZHKhXGgbo/m', 'armand@gmail.com', '2019-11-03 20:32:59', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
