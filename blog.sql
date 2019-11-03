-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Czas generowania: 03 Lis 2019, 20:07
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
-- Struktura tabeli dla tabeli `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `comment_login` varchar(25) COLLATE utf8_polish_ci NOT NULL,
  `post_id` int(11) NOT NULL,
  `comment_date` datetime NOT NULL,
  `comment_text` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`comment_id`),
  UNIQUE KEY `comment_id` (`comment_id`),
  KEY `post_id` (`post_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_login`, `post_id`, `comment_date`, `comment_text`) VALUES
(4, 'armand', 23, '2019-11-03 19:36:52', 'Komentarz testowy'),
(3, 'armand', 23, '2019-11-03 19:36:40', 'test'),
(5, 'armand', 23, '2019-11-03 19:37:22', 'No nareszcie dziaÅ‚ajÄ… xD');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(25) COLLATE utf8_polish_ci NOT NULL,
  `title` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `content` varchar(1000) COLLATE utf8_polish_ci NOT NULL,
  `post_date` datetime NOT NULL,
  PRIMARY KEY (`post_id`),
  UNIQUE KEY `post_id` (`post_id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `posts`
--

INSERT INTO `posts` (`post_id`, `login`, `title`, `content`, `post_date`) VALUES
(19, 'armand', 'Post1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In consequat nibh massa, id eleifend mi euismod sit amet. Vestibulum id massa nunc. Vivamus cursus semper tellus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Phasellus hendrerit nunc vitae orci blandit, non dignissim risus volutpat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pellentesque scelerisque elementum. Praesent id turpis sit amet lacus blandit hendrerit.', '2019-11-03 11:55:23'),
(20, 'armand', 'Post2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In consequat nibh massa, id eleifend mi euismod sit amet. Vestibulum id massa nunc. Vivamus cursus semper tellus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Phasellus hendrerit nunc vitae orci blandit, non dignissim risus volutpat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pellentesque scelerisque elementum. Praesent id turpis sit amet lacus blandit hendrerit.', '2019-11-03 11:55:29');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `user_date` datetime NOT NULL,
  `privilege` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`user_id`, `login`, `password`, `email`, `user_date`, `privilege`) VALUES
(4, 'armand', '$2y$10$zNfSERUfS64oJ/F6604A3.J1t4ZTeYO/SmxtI2KebCQiz2eg8PLre', 'armand@gmail.com', '2019-11-01 23:33:05', 1),
(5, 'user1', '$2y$10$L1xKhOKXvQYW0hcsTYQb0eITmHNzfKHOqaIw8fG34VkBgX3N.x.kC', 'user1@gmail.com', '2019-11-03 10:13:48', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
