-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 19 Paź 2021, 03:07
-- Wersja serwera: 10.4.18-MariaDB
-- Wersja PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `kino_gawel`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `filmy`
--

CREATE TABLE `filmy` (
  `id_film` int(11) NOT NULL,
  `tytul` varchar(100) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `opis` varchar(1000) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_roman_ci;

--
-- Zrzut danych tabeli `filmy`
--

INSERT INTO `filmy` (`id_film`, `tytul`, `opis`) VALUES
(1, 'Nie czas umierać', 'Na prośbę swojego starego przyjaciela, Felixa Leitera z CIA, James Bond bierze udział w misji odbicia porwanego naukowca. Trop prowadzi do niebezpiecznego złoczyńcy.'),
(2, 'AINBO - STRAŻNICZKA AMAZONII', 'Ainbo postanawia bronić swych ludzi i dziewiczą przyrodę rodzimej Amazonii z pomocą przyjaciół i odrobiny magii!'),
(3, 'Najmro. Kocha, kradnie, szanuje', 'Zdzisław Najmrodzki, znany całej Polsce jako "król złodziei", poznaje kobietę, dla której chce zmienić swoje dotychczasowe życie.'),
(4, 'Teściowie', 'Szalona opowieść o tym, co się może wydarzyć, gdy puszczają nerwy. To film o konfrontacji dwóch światów, która doprowadzi do łez nie tylko bywalców wesel.'),
(5, 'Jak rozmawiać z psem', 'W wyniku eksperymentu, nastoletni naukowiec nawiązuje kontakt telepatyczny ze swoim psem.');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `oferta`
--

CREATE TABLE `oferta` (
  `id_oferta` int(11) NOT NULL,
  `id_film` int(11) NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_roman_ci;

--
-- Zrzut danych tabeli `oferta`
--

INSERT INTO `oferta` (`id_oferta`, `id_film`, `data`) VALUES
(1, 1, '2021-10-21 12:00:00'),
(2, 1, '2021-10-22 15:00:00'),
(3, 1, '2021-10-23 18:00:00'),
(4, 2, '2021-10-21 15:00:00'),
(5, 2, '2021-10-22 18:00:00'),
(6, 2, '2021-10-23 12:00:00'),
(7, 3, '2021-10-21 18:00:00'),
(8, 3, '2021-10-22 12:00:00'),
(9, 3, '2021-10-23 15:00:00'),
(10, 4, '2021-10-24 12:00:00'),
(11, 4, '2021-10-25 15:00:00'),
(12, 4, '2021-10-26 18:00:00'),
(13, 5, '2021-10-24 15:00:00'),
(14, 5, '2021-10-25 18:00:00'),
(15, 5, '2021-10-26 12:00:00');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rezerwacje`
--

CREATE TABLE `rezerwacje` (
  `id_rezerwacje` int(11) NOT NULL,
  `id_oferta` int(11) NOT NULL,
  `id_uzytkownik` int(11) NOT NULL,
  `miejsce` varchar(11) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_roman_ci;

--
-- Zrzut danych tabeli `reservations`
--

INSERT INTO `rezerwacje` (`id_rezerwacje`, `id_oferta`, `id_uzytkownik`, `miejsce`) VALUES
(1, 1, 29, '1-19'),
(6, 1, 29, '1-1'),
(7, 1, 29, '1-2'),
(8, 1, 29, '1-3'),
(9, 1, 29, '1-4'),
(10, 1, 29, '1-5'),
(11, 1, 29, '2-2'),
(12, 1, 29, '2-3'),
(13, 1, 29, '2-4'),
(14, 1, 29, '2-5'),
(15, 4, 29, '1-3'),
(16, 4, 29, '1-4'),
(17, 4, 29, '1-5'),
(18, 7, 29, '1-1'),
(19, 7, 29, '1-2'),
(20, 7, 29, '1-3'),
(21, 10, 29, '4-12'),
(22, 10, 29, '4-13'),
(23, 10, 29, '4-14'),
(24, 1, 29, '1-10'),
(25, 1, 29, '1-11'),
(26, 1, 29, '1-12'),
(27, 4, 29, '1-9'),
(28, 4, 29, '1-10'),
(29, 4, 29, '1-19'),
(30, 4, 29, '1-20'),
(31, 8, 29, '1-13'),
(32, 8, 29, '1-14'),
(33, 8, 29, '1-15'),
(34, 8, 29, '1-10'),
(35, 8, 29, '2-9'),
(36, 8, 29, '2-10'),
(37, 4, 29, '1-13'),
(38, 4, 29, '1-14'),
(39, 4, 29, '1-15'),
(40, 4, 29, '1-16'),
(41, 4, 29, '2-15'),
(42, 4, 29, '2-16'),
(43, 4, 29, '15-18'),
(44, 4, 29, '15-19'),
(45, 4, 29, '15-20'),
(46, 9, 29, '11-14'),
(47, 9, 29, '11-15'),
(48, 9, 29, '12-14'),
(49, 9, 29, '12-15'),
(50, 4, 29, '1-1'),
(51, 4, 29, '1-2'),
(52, 1, 29, '15-19'),
(53, 1, 29, '15-20'),
(54, 1, 29, '14-19'),
(55, 1, 29, '14-20'),
(56, 2, 29, '1-1'),
(57, 2, 29, '1-2'),
(58, 7, 29, '15-19'),
(59, 7, 29, '15-20'),
(60, 9, 29, '1-18'),
(61, 9, 29, '1-19'),
(62, 9, 29, '1-20'),
(63, 4, 29, '15-1'),
(64, 4, 29, '15-2');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id` int(11) NOT NULL,
  `login` varchar(50) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `haslo` varchar(100) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `telefon` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_roman_ci;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id`, `login`, `haslo`, `telefon`) VALUES
(25, 'my', '$2y$10$uhjxCRmpGmeP82TXQ46QpOjiEbqNDuFVNSYDRRpCua6pWaVIQdUQm', 342342342),
(26, 'oooo', '$2y$10$eLDZDav2fSeKHb1OXxM4EuEkEiH89E8Ga5xMF8dKX9UICQoQ0GIzC', 213213213),
(27, 'qq', '$2y$10$4kaBj0qmBbqvR54Z.eXcQuhcq6F9t2hsnTpPUyIV2F2g8qGd6c6Pu', 123213123),
(28, 'kkkk', '$2y$10$jk0WFZNqU8bKI6C9iskqFuCqPtALTWIJ8UUmDq/R/Df7qwfowuVdi', 135435435),
(29, 'gt', '$2y$10$7RSkSL/bhXlfq8JpIpa.EuK/a5guFKce8XX48tbJ9YjXT45V.VnWu', 434354354);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `filmy`
--
ALTER TABLE `filmy`
  ADD PRIMARY KEY (`id_film`);

--
-- Indeksy dla tabeli `oferta`
--
ALTER TABLE `oferta`
  ADD PRIMARY KEY (`id_oferta`),
  ADD KEY `id_film` (`id_film`);

--
-- Indeksy dla tabeli `rezerwacje`
--
ALTER TABLE `rezerwacje`
  ADD PRIMARY KEY (`id_rezerwacje`),
  ADD KEY `id_uzytkownik` (`id_uzytkownik`),
  ADD KEY `id_oferta` (`id_oferta`);

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `filmy`
--
ALTER TABLE `filmy`
  MODIFY `id_film` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `oferta`
--
ALTER TABLE `oferta`
  MODIFY `id_oferta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT dla tabeli `rezerwacje`
--
ALTER TABLE `rezerwacje`
  MODIFY `id_rezerwacje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
