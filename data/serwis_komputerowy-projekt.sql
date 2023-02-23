-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Czas generowania: 23 Lut 2023, 19:03
-- Wersja serwera: 10.5.18-MariaDB-cll-lve
-- Wersja PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `zset_wojcik`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `czesci`
--

CREATE TABLE `czesci` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(32) NOT NULL,
  `cena` float NOT NULL,
  `ilosc` int(11) NOT NULL,
  `id_producenta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klienci`
--

CREATE TABLE `klienci` (
  `ID` int(11) NOT NULL,
  `imie` varchar(32) NOT NULL,
  `nazwisko` varchar(32) NOT NULL,
  `mail` varchar(48) DEFAULT NULL,
  `miasto` varchar(32) NOT NULL,
  `adres` varchar(64) NOT NULL,
  `telefon` int(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `logowanie`
--

CREATE TABLE `logowanie` (
  `id_konta` int(11) NOT NULL,
  `login` varchar(32) NOT NULL,
  `hasło` varchar(32) NOT NULL,
  `id_klienta` int(11) DEFAULT NULL,
  `id_pracownika` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pracownicy`
--

CREATE TABLE `pracownicy` (
  `PESEL` varchar(11) NOT NULL,
  `imie` varchar(32) NOT NULL,
  `nazwisko` varchar(32) NOT NULL,
  `mail` varchar(48) DEFAULT NULL,
  `miasto` varchar(32) NOT NULL,
  `adres` varchar(64) NOT NULL,
  `telefon` int(9) DEFAULT NULL,
  `posada` varchar(32) NOT NULL,
  `wyplata` float DEFAULT NULL,
  `premia` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `producenci`
--

CREATE TABLE `producenci` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `reklamacje`
--

CREATE TABLE `reklamacje` (
  `id` int(11) NOT NULL,
  `id_zamowienia` int(11) NOT NULL,
  `data_zlozenia` date NOT NULL,
  `opis` text NOT NULL,
  `czy_przyjeta` tinyint(1) NOT NULL,
  `data_przeslania` date DEFAULT NULL,
  `data_zwrotu` date DEFAULT NULL,
  `id_pracownika` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uslugi`
--

CREATE TABLE `uslugi` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(32) DEFAULT NULL,
  `cena` int(11) NOT NULL,
  `id_czesci` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `uslugi`
--

INSERT INTO `uslugi` (`id`, `nazwa`, `cena`, `id_czesci`) VALUES
(1, 'Instalacja systemu operacyjnego', 100, NULL),
(2, 'Usuwanie wirusów', 50, NULL),
(3, 'Naprawa zasilacza', 80, NULL),
(4, 'Wymiana karty graficznej', 120, NULL),
(5, 'Naprawa dysku twardego', 150, NULL),
(6, 'Czyszczenie komputera', 30, NULL),
(7, 'Odzyskiwanie danych', 200, NULL),
(8, 'Instalacja antywirusa', 40, NULL),
(9, 'Naprawa zasilania', 60, NULL),
(10, 'Aktualizacja sterowników', 50, NULL),
(11, 'Usuwanie programów szpiegujących', 60, NULL),
(12, 'Optymalizacja systemu', 80, NULL),
(13, 'Naprawa klawiatury', 40, NULL),
(14, 'Zakup i instalacja nowego sprzęt', 100, NULL),
(15, 'Konserwacja systemu', 50, NULL),
(16, 'Ustawianie sieci', 90, NULL),
(17, 'Naprawa systemu operacyjnego', 70, NULL),
(18, 'Naprawa płyty głównej', 120, NULL),
(19, 'Odzyskiwanie haseł', 100, NULL),
(20, 'Naprawa monitora', 90, NULL),
(21, 'Instalacja oprogramowania', 60, NULL),
(22, 'Usuwanie niepotrzebnych plików', 30, NULL),
(23, 'Naprawa przycisków', 50, NULL),
(24, 'Usuwanie reklam', 40, NULL),
(25, 'Naprawa złącza USB', 60, NULL),
(26, 'Ustawianie antywirusa', 50, NULL),
(27, 'Naprawa procesora', 100, NULL),
(28, 'Czyszczenie klawiatury', 20, NULL),
(29, 'Naprawa pamięci RAM', 80, NULL),
(30, 'Naprawa gniazda ładowania', 70, NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zamowienia`
--

CREATE TABLE `zamowienia` (
  `id` int(11) NOT NULL,
  `id_klienta` int(11) NOT NULL,
  `id_uslugi` int(11) NOT NULL,
  `data_zlozenia` date NOT NULL,
  `czy_wykonano` tinyint(1) NOT NULL,
  `id_pracownika` varchar(11) DEFAULT NULL,
  `data_wykonania` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `czesci`
--
ALTER TABLE `czesci`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_producenta` (`id_producenta`);

--
-- Indeksy dla tabeli `klienci`
--
ALTER TABLE `klienci`
  ADD PRIMARY KEY (`ID`);

--
-- Indeksy dla tabeli `logowanie`
--
ALTER TABLE `logowanie`
  ADD PRIMARY KEY (`id_konta`),
  ADD KEY `id_pracownika/klienta` (`id_klienta`),
  ADD KEY `id_pracownika` (`id_pracownika`);

--
-- Indeksy dla tabeli `pracownicy`
--
ALTER TABLE `pracownicy`
  ADD PRIMARY KEY (`PESEL`);

--
-- Indeksy dla tabeli `producenci`
--
ALTER TABLE `producenci`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `reklamacje`
--
ALTER TABLE `reklamacje`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_zamowienia` (`id_zamowienia`),
  ADD KEY `id_pracownika` (`id_pracownika`);

--
-- Indeksy dla tabeli `uslugi`
--
ALTER TABLE `uslugi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_czesci` (`id_czesci`);

--
-- Indeksy dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_klienta` (`id_klienta`),
  ADD KEY `id_uslugi` (`id_uslugi`),
  ADD KEY `id_pracownika` (`id_pracownika`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `klienci`
--
ALTER TABLE `klienci`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `logowanie`
--
ALTER TABLE `logowanie`
  MODIFY `id_konta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `producenci`
--
ALTER TABLE `producenci`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `reklamacje`
--
ALTER TABLE `reklamacje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `czesci`
--
ALTER TABLE `czesci`
  ADD CONSTRAINT `czesci_ibfk_1` FOREIGN KEY (`id_producenta`) REFERENCES `producenci` (`id`);

--
-- Ograniczenia dla tabeli `logowanie`
--
ALTER TABLE `logowanie`
  ADD CONSTRAINT `logowanie_ibfk_1` FOREIGN KEY (`id_klienta`) REFERENCES `klienci` (`ID`),
  ADD CONSTRAINT `logowanie_ibfk_2` FOREIGN KEY (`id_pracownika`) REFERENCES `pracownicy` (`PESEL`);

--
-- Ograniczenia dla tabeli `reklamacje`
--
ALTER TABLE `reklamacje`
  ADD CONSTRAINT `reklamacje_ibfk_1` FOREIGN KEY (`id_zamowienia`) REFERENCES `zamowienia` (`id`),
  ADD CONSTRAINT `reklamacje_ibfk_2` FOREIGN KEY (`id_pracownika`) REFERENCES `pracownicy` (`PESEL`);

--
-- Ograniczenia dla tabeli `uslugi`
--
ALTER TABLE `uslugi`
  ADD CONSTRAINT `uslugi_ibfk_1` FOREIGN KEY (`id_czesci`) REFERENCES `czesci` (`id`);

--
-- Ograniczenia dla tabeli `zamowienia`
--
ALTER TABLE `zamowienia`
  ADD CONSTRAINT `zamowienia_ibfk_1` FOREIGN KEY (`id_klienta`) REFERENCES `klienci` (`ID`),
  ADD CONSTRAINT `zamowienia_ibfk_2` FOREIGN KEY (`id_uslugi`) REFERENCES `uslugi` (`id`),
  ADD CONSTRAINT `zamowienia_ibfk_3` FOREIGN KEY (`id_pracownika`) REFERENCES `pracownicy` (`PESEL`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
