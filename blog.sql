-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Czas generowania: 03 Lis 2019, 21:04
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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_login`, `post_id`, `comment_date`, `comment_text`) VALUES
(1, 'armand', 2, '2019-11-03 20:28:40', 'Lorem ipsum 1'),
(2, 'armand', 2, '2019-11-03 20:28:44', 'Lorem ipsum 2');

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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `posts`
--

INSERT INTO `posts` (`post_id`, `login`, `title`, `content`, `post_date`) VALUES
(1, 'armand', 'Lorem ipsum ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed et luctus risus, sed auctor dui. Ut et nulla erat. Nam egestas leo nec neque varius, tincidunt imperdiet lacus pulvinar. Curabitur vitae ligula et mi porttitor fermentum eget vel ipsum. Donec eu mattis ante. Nulla iaculis congue nulla ut maximus. Quisque dictum ipsum nisl, vel commodo est scelerisque sed. Fusce tristique ex vitae metus lobortis, sed iaculis dui ullamcorper. Duis a diam id ante convallis auctor ac sit amet nunc. Nulla quam mauris, ullamcorper non lectus at, eleifend feugiat massa.', '2019-11-03 20:27:52'),
(2, 'armand', 'Suspendisse potenti', 'Suspendisse potenti. Integer dictum risus vel auctor posuere. Mauris condimentum ligula sed nunc congue porttitor. Nullam id scelerisque elit. Aliquam placerat enim sed pretium congue. Maecenas ultrices elementum nulla sed blandit. Integer feugiat a justo eu elementum. Integer euismod pretium aliquam. Etiam condimentum nisi eu magna lacinia, at sollicitudin nisl tincidunt.', '2019-11-03 20:28:07');

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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`user_id`, `login`, `password`, `email`, `user_date`, `privilege`) VALUES
(1, 'armand', '$2y$10$AuVpu21.xY4FEJ342WP5muoFQMhwN9Kl6NySotFsLOZHKhXGgbo/m', 'armand@gmail.com', '2019-11-03 20:32:59', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
