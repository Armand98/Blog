-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Czas generowania: 12 Gru 2019, 11:50
-- Wersja serwera: 10.3.16-MariaDB
-- Wersja PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `id11462941_blog`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `login` varchar(25) COLLATE utf8_polish_ci NOT NULL,
  `post_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `text` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `type` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `login` varchar(25) COLLATE utf8_polish_ci NOT NULL,
  `title` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `content` longtext COLLATE utf8_polish_ci NOT NULL,
  `date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `post`
--

INSERT INTO `post` (`id`, `login`, `title`, `content`, `date`) VALUES
(1, 'Armand', 'Pianino', '<p class=\"MsoNormal\" align=\"center\" style=\"text-align:center\"><span style=\"font-size:14.0pt;mso-bidi-font-size:11.0pt;line-height:115%;font-family:\r\n&quot;Cambria&quot;,&quot;serif&quot;;mso-ascii-theme-font:major-latin;mso-hansi-theme-font:major-latin\">W\r\nstarym pianinie po babci Marcie,<br>\r\nŚpią małe nutki i śnią uparcie,<br>\r\nO pięknych walcach, rzewnych sonatach,<br>\r\nO swej świetności w minionych latach.<o:p></o:p></span></p><p class=\"MsoNormal\" align=\"center\" style=\"text-align:center\"><span style=\"font-size:14.0pt;mso-bidi-font-size:11.0pt;line-height:115%;font-family:\r\n&quot;Cambria&quot;,&quot;serif&quot;;mso-ascii-theme-font:major-latin;mso-hansi-theme-font:major-latin\">Tęsknią\r\ndo niezrównanych dzieł Fryderyka,<br>\r\nA stary zegar tyka i tyka.<br>\r\nTak sobie cicho nutki siedziały,<br>\r\nAż przyszedł dzień koncertu i chwały!<o:p></o:p></span></p><p class=\"MsoNormal\" align=\"center\" style=\"text-align:center\"><span style=\"font-size:14.0pt;mso-bidi-font-size:11.0pt;line-height:115%;font-family:\r\n&quot;Cambria&quot;,&quot;serif&quot;;mso-ascii-theme-font:major-latin;mso-hansi-theme-font:major-latin\">Mazurek\r\nzabrzmiał na starych klawiszach,<br>\r\n„Polonez AS-dur” i pękła cisza!<br>\r\nI „Dla Elizy” wątek się snuje,<br>\r\nZdolny pianista improwizuje.<o:p></o:p></span></p><p class=\"MsoNormal\" align=\"center\" style=\"text-align:center\"><span style=\"font-size:14.0pt;mso-bidi-font-size:11.0pt;line-height:115%;font-family:\r\n&quot;Cambria&quot;,&quot;serif&quot;;mso-ascii-theme-font:major-latin;mso-hansi-theme-font:major-latin\">Stare\r\npianino nagle odżyło,<br>\r\nMarzenie nutek się wreszcie spełniło.<br>\r\nTu „Marsz Turecki”, tam „Serenada”,<br>\r\nMozart i Schubert – ich pełna władza.<o:p></o:p></span></p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\" align=\"center\" style=\"text-align:center\"><span style=\"font-size:14.0pt;mso-bidi-font-size:11.0pt;line-height:115%;font-family:\r\n&quot;Cambria&quot;,&quot;serif&quot;;mso-ascii-theme-font:major-latin;mso-hansi-theme-font:major-latin\">Takie\r\nsą piękne muzyki dźwięki,<br>\r\nKompozytorów natchnienia wdzięki.<br>\r\nI nie potrzeba dowodu fizyka,<br>\r\nBy zauważyć jak życie odmienia muzyka!<o:p></o:p></span></p>', '2019-11-09 22:50:11'),
(11, 'NieWidzePowodu', 'Światło ', '<p><span id=\"docs-internal-guid-12ae5ab4-7fff-492f-fd53-4485af6f75fc\"></span></p><p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\"><span id=\"docs-internal-guid-f3f77260-7fff-6717-a495-cf74212f13f3\" style=\"\"><span style=\"font-size: 11pt; background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline;\"><b>Światło </b></span></span></span></p><p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\"><span style=\"font-size: 11pt; font-family: Arial; color: rgb(0, 0, 0); background-color: transparent; font-style: normal; font-variant: normal; text-decoration: none; vertical-align: baseline; white-space: pre-wrap;\"><span id=\"docs-internal-guid-f3f77260-7fff-6717-a495-cf74212f13f3\" style=\"\"><span style=\"font-size: 11pt; background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline;\"><b><br></b></span></span></span></p><p dir=\"ltr\" style=\"line-height:1.38;margin-top:0pt;margin-bottom:0pt;\"><span style=\"font-size:11pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Dwa nagie światła wsród nocy leków. </span><span style=\"font-size:11pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\"><br></span><span style=\"font-size:11pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Nie mają zródła. NIe mają celu.</span><span style=\"font-size:11pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\"><br></span><span style=\"font-size:11pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Tylko straszą,suma fotonów kręgu. </span><span style=\"font-size:11pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\"><br></span><span style=\"font-size:11pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Światło źródłem lęku, nie Perun.</span><span style=\"font-size:11pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\"><br></span><span style=\"font-size:11pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">W ciemności ma swój początek, </span><span style=\"font-size:11pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\"><br></span><span style=\"font-size:11pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">nie źródło. Odbija się od ścian czerni. </span><span style=\"font-size:11pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\"><br></span><span style=\"font-size:11pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">W uścisku pustki, braku, ciszy. </span><span style=\"font-size:11pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\"><br></span><span style=\"font-size:11pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">Nie czeka celu, wypatruje śmierci, </span><span style=\"font-size:11pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\"><br></span><span style=\"font-size:11pt;font-family:Arial;color:#000000;background-color:transparent;font-weight:400;font-style:normal;font-variant:normal;text-decoration:none;vertical-align:baseline;white-space:pre;white-space:pre-wrap;\">na klatkach fotograficznej kliszy.</span></p>', '2019-11-11 22:55:14'),
(14, 'AlRumi', '-', '<p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 10px; border: 0px; outline: 0px; font-size: 13px; vertical-align: baseline; background: transparent; line-height: 18px; color: rgb(85, 85, 85); text-shadow: rgb(255, 255, 255) 1px 1px 1px; font-family: Helvetica, Arial, sans-serif;\"><em style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent;\">Żyłem na skraju szaleństwa,</em></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 10px; border: 0px; outline: 0px; font-size: 13px; vertical-align: baseline; background: transparent; line-height: 18px; color: rgb(85, 85, 85); text-shadow: rgb(255, 255, 255) 1px 1px 1px; font-family: Helvetica, Arial, sans-serif;\"><em style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent;\">Chciałem wiedzieć dlaczego.</em></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 10px; border: 0px; outline: 0px; font-size: 13px; vertical-align: baseline; background: transparent; line-height: 18px; color: rgb(85, 85, 85); text-shadow: rgb(255, 255, 255) 1px 1px 1px; font-family: Helvetica, Arial, sans-serif;\"><em style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent;\">Pukałem w drzwi, pukałem w drzwi.</em></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 10px; border: 0px; outline: 0px; font-size: 13px; vertical-align: baseline; background: transparent; line-height: 18px; color: rgb(85, 85, 85); text-shadow: rgb(255, 255, 255) 1px 1px 1px; font-family: Helvetica, Arial, sans-serif;\"><em style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent;\">Drzwi się otwarły,</em></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 10px; border: 0px; outline: 0px; font-size: 13px; vertical-align: baseline; background: transparent; line-height: 18px; color: rgb(85, 85, 85); text-shadow: rgb(255, 255, 255) 1px 1px 1px; font-family: Helvetica, Arial, sans-serif;\"><em style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent;\">I cóż się okazało?</em></p><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 10px; border: 0px; outline: 0px; font-size: 13px; vertical-align: baseline; background: transparent; line-height: 18px; color: rgb(85, 85, 85); text-shadow: rgb(255, 255, 255) 1px 1px 1px; font-family: Helvetica, Arial, sans-serif;\"><em style=\"margin: 0px; padding: 0px; border: 0px; outline: 0px; vertical-align: baseline; background: transparent;\">Pukałem od wewnątrz.</em></p>', '2019-11-13 21:28:15'),
(15, 'Lordkuborn23', 'Nic', '<div style=\"text-align: left;\">Przestrzeń, wypełniona nicością, jak pusta kartka papieru.&nbsp;</div><div>Martwy ocean bez dna i horyzontu.Tonę.&nbsp;</div><div>Cisza. Słychać tylko szum.&nbsp;</div><div>Nie ma mnie, jestem. W tej nicości jestem niczym, jestem nicością.&nbsp;</div><div>Gdzie jestem? Nigdzie, wszędzie.&nbsp;</div><div>Jestem sam. Samotność. Zbliża się, stoi w miejscu.&nbsp;</div><div>Nie ma początku, nie ma końca. Jest teraz. Zawsze było i będzie.&nbsp;</div><div>Boję się. Czego się boję? Niczego.</div>', '2019-11-18 15:22:31');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `puzzle`
--

CREATE TABLE `puzzle` (
  `id` int(11) NOT NULL,
  `login` varchar(25) COLLATE utf8_polish_ci NOT NULL,
  `title` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `content` longtext COLLATE utf8_polish_ci NOT NULL,
  `date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `puzzle`
--

INSERT INTO `puzzle` (`id`, `login`, `title`, `content`, `date`) VALUES
(1, 'Armand', 'Pan Lusterko', '<p><span style=\"font-size:11.0pt;line-height:115%;\r\nfont-family:&quot;Calibri&quot;,&quot;sans-serif&quot;;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:\r\nCalibri;mso-fareast-theme-font:minor-latin;mso-hansi-theme-font:minor-latin;\r\nmso-bidi-font-family:&quot;Times New Roman&quot;;mso-bidi-theme-font:minor-bidi;\r\nmso-ansi-language:PL;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\"><i><span style=\"font-size: 18px;\">Ma\r\nmnie każdy, lecz nie każdy lubi – potrafisz uwierzyć?</span><br><span style=\"font-size: 18px;\">\r\nMożesz mnie dotknąć, zobaczyć, lecz nie zdołasz uderzyć.</span><br><span style=\"font-size: 18px;\">\r\nBawię dziecko, przygnębiam starca, cieszę dziewczę urocze.</span><br><span style=\"font-size: 18px;\">\r\nKiedy płaczesz – ja szlocham, gdy się śmiejesz – i ja chichocze.</span></i></span></p><p><span style=\"font-size:11.0pt;line-height:115%;\r\nfont-family:&quot;Calibri&quot;,&quot;sans-serif&quot;;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:\r\nCalibri;mso-fareast-theme-font:minor-latin;mso-hansi-theme-font:minor-latin;\r\nmso-bidi-font-family:&quot;Times New Roman&quot;;mso-bidi-theme-font:minor-bidi;\r\nmso-ansi-language:PL;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\"><i><span style=\"font-size: 18px;\">Czym jestem?</span></i><!--[endif]--></span></p>', '2019-11-09 22:51:53'),
(3, 'Armand', '-', '<p><span style=\"font-size:11.0pt;line-height:115%;\r\nfont-family:&quot;Calibri&quot;,&quot;sans-serif&quot;;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:\r\nCalibri;mso-fareast-theme-font:minor-latin;mso-hansi-theme-font:minor-latin;\r\nmso-bidi-font-family:&quot;Times New Roman&quot;;mso-bidi-theme-font:minor-bidi;\r\nmso-ansi-language:PL;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\"><i><span style=\"font-size: 18px;\">Przybieram\r\nróżne kształty i kolory, jak Ty również oddycham.</span><br><span style=\"font-size: 18px;\">\r\nMożna mnie poczuć, lecz nikt o zdrowych zmysłach mnie nie dotyka.</span><br><span style=\"font-size: 18px;\">\r\nCieszę oko i daję nadzieję.</span><br><span style=\"font-size: 18px;\">\r\nGdy słońce zajdzie, to ja na świecie widnieję.</span></i></span></p><p><span style=\"font-size:11.0pt;line-height:115%;\r\nfont-family:&quot;Calibri&quot;,&quot;sans-serif&quot;;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:\r\nCalibri;mso-fareast-theme-font:minor-latin;mso-hansi-theme-font:minor-latin;\r\nmso-bidi-font-family:&quot;Times New Roman&quot;;mso-bidi-theme-font:minor-bidi;\r\nmso-ansi-language:PL;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\"><i><span style=\"font-size: 18px;\">Czym jestem?</span><br></i>\r\n<!--[if !supportLineBreakNewLine]--><br>\r\n<!--[endif]--></span></p>', '2019-11-13 22:08:39'),
(4, 'Armand', '-', '<p><span style=\"font-size:11.0pt;line-height:115%;\r\nfont-family:&quot;Calibri&quot;,&quot;sans-serif&quot;;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:\r\nCalibri;mso-fareast-theme-font:minor-latin;mso-hansi-theme-font:minor-latin;\r\nmso-bidi-font-family:&quot;Times New Roman&quot;;mso-bidi-theme-font:minor-bidi;\r\nmso-ansi-language:PL;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\"><i><span style=\"font-size: 18px;\">Jeśli\r\nmasz mnie w ręku, to szybko z niej znikam.</span><br><span style=\"font-size: 18px;\">\r\nNie starzeję się, przeżyłem wieki i niejednego człowieka.</span><br><span style=\"font-size: 18px;\">\r\nRzec można, iż jestem wieczny.</span><br><span style=\"font-size: 18px;\">\r\nNawet jeśli mnie stracisz ja wciąż w czyichś rękach będę bezpieczny.</span></i></span></p><p><span style=\"font-size:11.0pt;line-height:115%;\r\nfont-family:&quot;Calibri&quot;,&quot;sans-serif&quot;;mso-ascii-theme-font:minor-latin;mso-fareast-font-family:\r\nCalibri;mso-fareast-theme-font:minor-latin;mso-hansi-theme-font:minor-latin;\r\nmso-bidi-font-family:&quot;Times New Roman&quot;;mso-bidi-theme-font:minor-bidi;\r\nmso-ansi-language:PL;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\"><i><span style=\"font-size: 18px;\">Czym jestem?</span><br></i>\r\n<!--[if !supportLineBreakNewLine]--><br>\r\n<!--[endif]--></span></p>', '2019-11-13 22:10:18');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `quote`
--

CREATE TABLE `quote` (
  `id` int(11) NOT NULL,
  `login` varchar(25) COLLATE utf8_polish_ci NOT NULL,
  `title` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `content` longtext COLLATE utf8_polish_ci NOT NULL,
  `date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `quote`
--

INSERT INTO `quote` (`id`, `login`, `title`, `content`, `date`) VALUES
(1, 'Armand', 'Arthur Schopenhauer', '<p><i><span style=\"color: rgb(33, 37, 41); font-family: Lora, serif;\"><span style=\"font-size: 18px;\">\"Bardzo mało ludzi umie myśleć, ale jakiś pogląd chce mieć każdy.</span><br></span><span style=\"color: rgb(33, 37, 41); font-family: Lora, serif; font-size: 1rem;\"><span style=\"font-size: 18px;\">I cóż pozostaje innego, jak przejąć gotowy pogląd od innych, </span><br><span style=\"font-size: 18px;\">zamiast wypracować go samemu?\"</span></span></i></p>', '2019-11-09 22:54:05'),
(3, 'Lordkuborn23', 'Błąd', '<p><i>Błąd popełniony więcej niż jeden raz staje się decyzją</i></p>', '2019-11-10 11:00:46'),
(4, 'Lordkuborn23', 'Blade Runner', '<p>\"<i>Wszystkie te chwile zagubią się z czasem jak łzy w deszczu\"</i></p>', '2019-11-13 08:55:09'),
(5, 'AlRumi', 'Andrzej Sapkowski - Chrzest ognia', '<p><span style=\"color: rgb(33, 37, 41); font-family: Lora, serif;\">– Na moim sihillu – warknął Zoltan, obnażając miecz – wyryte jest starodawnymi krasnoludzkimi runami prastare krasnoludzkie zaklęcie. Niech no jeno który ghul zbliży się na długość klingi, popamięta mnie. O, popatrzcie. – Ha – zaciekawił się Jaskier, który właśnie zbliżył się do nich. – Więc to są te słynne tajne runy krasnoludów? Co głosi ten napis? – „Na pohybel skurwysynom!”</span><br></p>', '2019-11-13 21:56:56'),
(7, 'AlRumi', 'Grucha - Chłopaki nie płaczą', '<p><em style=\"margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 13px; line-height: inherit; font-family: Arial, &quot;Liberation Sans&quot;, &quot;Droid Sans&quot;, Tahoma, &quot;Lucida Sans&quot;, &quot;Lucida Sans Unicode&quot;, &quot;Lucida Grande&quot;, &quot;Trebuchet MS&quot;, Verdana, Helvetica, sans-serif; vertical-align: baseline; color: rgb(44, 62, 80);\">Może i ten sweter jest wieśniacki, ale taki właśnie ma być, bo mnie, w przeciwieństwie do ciebie, gówno obchodzi, co myśli o mnie facet, którego mam rozwalić. Nie uważam też, żeby to, kurwa, miało jakiekolwiek znaczenie, czy się kogoś rozwala z klasą, czy bez. A poza tym nie wierzę w aniołków, re... inkarnację, podwodne cywilizacje ani Świętego Mikołaja. Wiem natomiast jedno, że każdy facet, jak się do niego strzela z odległości kilku centymetrów, może ci zabryzgać marynarkę za trzy tysiące baksów. A historii tego swetra i tak byś nie zrozumiał.</em><br></p>', '2019-11-13 21:58:17');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `login` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `date` datetime NOT NULL,
  `privilege` int(2) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`user_id`, `login`, `password`, `email`, `date`, `privilege`) VALUES
(1, 'Armand', '$2y$10$AuVpu21.xY4FEJ342WP5muoFQMhwN9Kl6NySotFsLOZHKhXGgbo/m', 'armand@gmail.com', '2019-11-03 20:32:59', 1),
(4, 'Lordkuborn23', '$2y$10$4xr8DPrra5VuUvD2dFyL7.oikvq.u/9iAlxrCv9/0kFUvR0ANM8aq', 'spiderkuba8@gmail.com', '2019-11-10 10:14:36', 0),
(8, 'dupa', '$2y$10$XNY683XxRboi5Ng8TTXDI.mfWV7uL1SEygWODR5NHHByNb8dD77ey', 'iqi98416@bcaoo.com', '2019-11-13 21:20:23', 0),
(7, 'KolegaTenOdPsaArmand', '$2y$10$M6uHRPE9fDCtF5Jgo5Tzeu4yMqiYO83GhHjoImFUFEte1FLOXQbHa', 'mateusz.pawel.kula@gmail.com', '2019-11-13 21:18:19', 0),
(6, 'NieWidzePowodu', '$2y$10$je7xjvUfsKVweaoBOE.CD.Nqrl8L3Y1E4CkY3HnMNv7yUwNcErHIm', 'poposmar8@gmail.com', '2019-11-11 22:54:04', 0),
(9, 'DupaDupa', '$2y$10$jTcwombWACcy9XKo9WeMHOtdmBY6movGIrIMNKqmEFOoBqH8gGtZy', 'xqc94172@eveav.com', '2019-11-13 21:22:08', 0),
(10, 'AlRumi', '$2y$10$bP55wE5H4l69Q59tPAEKp.nfZUSjTx0QV3aFxJzUOHEAlZtULNHwK', 'xee08128@eveav.com', '2019-11-13 21:24:20', 0);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `comment_id` (`id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indeksy dla tabeli `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `post_id` (`id`);

--
-- Indeksy dla tabeli `puzzle`
--
ALTER TABLE `puzzle`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `post_id` (`id`);

--
-- Indeksy dla tabeli `quote`
--
ALTER TABLE `quote`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `post_id` (`id`);

--
-- Indeksy dla tabeli `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT dla tabel zrzutów
--

--
-- AUTO_INCREMENT dla tabeli `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT dla tabeli `puzzle`
--
ALTER TABLE `puzzle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `quote`
--
ALTER TABLE `quote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT dla tabeli `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
