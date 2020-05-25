-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 25 Maj 2020, 13:22
-- Wersja serwera: 10.4.11-MariaDB
-- Wersja PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `atlas`
--
CREATE DATABASE IF NOT EXISTS `atlas` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `atlas`;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `categories`
--

INSERT INTO `categories` (`id`, `category`) VALUES
(1, 'Workowce'),
(2, 'Podstawczaki'),
(3, 'Chromisty'),
(4, 'Skoczkowce'),
(5, 'Kłębiakowe'),
(6, 'Sprzężniaki'),
(7, 'Inne');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `edibility`
--

CREATE TABLE `edibility` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `edibility_status` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `edibility`
--

INSERT INTO `edibility` (`id`, `edibility_status`) VALUES
(1, 'Trujący'),
(2, 'Jadalny na ciepło'),
(3, 'Jadalny na zimno');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `mushrooms`
--

CREATE TABLE `mushrooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mushroom` varchar(24) NOT NULL,
  `description` text NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `edibility_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `main_photo` varchar(128) NOT NULL,
  `photo_1` varchar(128) NOT NULL,
  `photo_2` varchar(128) NOT NULL,
  `photo_3` varchar(128) NOT NULL,
  `photo_4` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `mushrooms`
--

INSERT INTO `mushrooms` (`id`, `mushroom`, `description`, `category_id`, `edibility_id`, `user_id`, `main_photo`, `photo_1`, `photo_2`, `photo_3`, `photo_4`) VALUES
(1, 'Pieczarka', 'Taki grzybek jadalny. Biały.', 2, 3, 2, 'images/1/main.jpg', 'images/1/1.jpg', 'images/1/2.jpg', 'images/1/3.jpg', ''),
(2, 'Borowik', 'Brązowy jadalny grzyb, często używany w ludowej kuchni polskiej.', 2, 2, 10, 'images/2/main.jpg', 'images/2/1.jpg', 'images/2/2.jpg', '', '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(24) NOT NULL DEFAULT 'UNIQUE',
  `email` varchar(50) NOT NULL,
  `password` varchar(56) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'AndrzejD1', 'andrzej1@gmail.com', 'jaroslaw'),
(2, 'AndrzejD1', 'andrzej1@gmail.com', 'jaroslaw'),
(3, 'jaro123', 'jaroslaw@wp.pl', 'zimnylech'),
(4, 'beatka2000', 'becia23@gmail.com', 'jaro'),
(5, 'matmor', 'moraw@asd.pl', 'jarek'),
(6, 'mat1', 'matmat@o2.pl', '1234'),
(7, 'amt2', 'mat2@gmail.com', 'mat'),
(8, 'mat3', 'mat@mat.mat', 'mat'),
(9, 'mat4', 'mat@mat.mat', 'mat'),
(10, 'MarcinProkop', 'Mprok@wellmann.pl', 'dorotkawe'),
(11, 'DorotkaW', 'prokop@wellmann.pl', 'prokopwel'),
(12, 'Kurka1', 'kurka1@wp.pl', 'rudyrydz');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indeksy dla tabeli `edibility`
--
ALTER TABLE `edibility`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indeksy dla tabeli `mushrooms`
--
ALTER TABLE `mushrooms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `edibility_id` (`edibility_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT dla tabeli `edibility`
--
ALTER TABLE `edibility`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `mushrooms`
--
ALTER TABLE `mushrooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `mushrooms`
--
ALTER TABLE `mushrooms`
  ADD CONSTRAINT `mushrooms_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `mushrooms_ibfk_2` FOREIGN KEY (`edibility_id`) REFERENCES `edibility` (`id`),
  ADD CONSTRAINT `mushrooms_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
