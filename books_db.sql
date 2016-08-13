-- phpMyAdmin SQL Dump
-- version 4.6.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Czas generowania: 13 Sie 2016, 14:02
-- Wersja serwera: 5.5.49-0ubuntu0.14.04.1
-- Wersja PHP: 5.5.9-1ubuntu4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `books_db`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Books`
--

CREATE TABLE `Books` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `author` varchar(40) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `Books`
--

INSERT INTO `Books` (`id`, `name`, `author`, `description`) VALUES
(4, 'Old Book', 'Old Author', 'Very very old book, reaaaaally old'),
(7, 'Book of books', 'Gordon Bookie', 'Gordon\'s new and already famous bestseller'),
(8, 'Philosopher\'s guide', 'Hannah Arendt', 'Hannah\'s book shows different parts of contemporal mind philosophies and unravels sources of \'DASEIN\' thinking.'),
(20, 'A book', 'U.N.Owen', 'Shady book, not recomended for faint-hearted'),
(23, 'book', 'Owen', 'Shady book, not recomended for faint-hearted'),
(30, 'New Book three', 'Myself', 'Rodian comes into a bar...'),
(40, 'modern book', 'Modern author', 'Lorem ipsum dolor sit amet nihil novi void pescorum varum eternum macuere'),
(45, 'Yet another book', 'Byanother Autor', 'jafnlarhfluiashfidhflquilfi fdjkake,fbuiewqbfuiaf sda fdsibfuiabfuileabfuia n auiflrukdbflaiusdbfcvayuarbkfadsb,jv fj avufabldzjvb,dsajf sdvfg keb'),
(50, 'Time and space and I', 'E.T. London', 'A book about time and space and humanity...'),
(52, 'Quakers Book', 'First Quaker Holmes', 'Book by one of the foremost representatives of the quaker order.');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `Books`
--
ALTER TABLE `Books`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `Books`
--
ALTER TABLE `Books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
