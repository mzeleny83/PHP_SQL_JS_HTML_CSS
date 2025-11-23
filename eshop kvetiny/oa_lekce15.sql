-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Úte 18. lis 2025, 17:47
-- Verze serveru: 10.4.32-MariaDB
-- Verze PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `oa_lekce15`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `dodej`
--

CREATE TABLE `dodej` (
  `id` int(11) NOT NULL,
  `idkvetiny` int(11) NOT NULL,
  `mnozstvi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_czech_ci;

--
-- Vypisuji data pro tabulku `dodej`
--

INSERT INTO `dodej` (`id`, `idkvetiny`, `mnozstvi`) VALUES
(1, 1, 20),
(2, 2, 50),
(3, 4, 100);

-- --------------------------------------------------------

--
-- Struktura tabulky `kvetiny`
--

CREATE TABLE `kvetiny` (
  `id` int(11) NOT NULL,
  `aktivni` tinyint(1) NOT NULL,
  `nazev` varchar(100) NOT NULL,
  `cena` int(11) NOT NULL,
  `mnozstvi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_czech_ci;

--
-- Vypisuji data pro tabulku `kvetiny`
--

INSERT INTO `kvetiny` (`id`, `aktivni`, `nazev`, `cena`, `mnozstvi`) VALUES
(1, 1, 'Sedmikraska', 100, 20),
(2, 1, 'Kosatec', 70, 70),
(3, 0, 'tulipán', 500, 10),
(4, 1, 'Sněženky', 40, 100);

-- --------------------------------------------------------

--
-- Struktura tabulky `vydej`
--

CREATE TABLE `vydej` (
  `id` int(11) NOT NULL,
  `idkvetiny` int(11) NOT NULL,
  `mnozstvi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_czech_ci;

--
-- Vypisuji data pro tabulku `vydej`
--

INSERT INTO `vydej` (`id`, `idkvetiny`, `mnozstvi`) VALUES
(1, 1, 5),
(2, 2, 40),
(3, 4, 40);

--
-- Indexy pro exportované tabulky
--

--
-- Indexy pro tabulku `dodej`
--
ALTER TABLE `dodej`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_dodej_kvetiny` (`idkvetiny`);

--
-- Indexy pro tabulku `kvetiny`
--
ALTER TABLE `kvetiny`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pro tabulku `vydej`
--
ALTER TABLE `vydej`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_vydej_kvetiny` (`idkvetiny`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `dodej`
--
ALTER TABLE `dodej`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pro tabulku `kvetiny`
--
ALTER TABLE `kvetiny`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pro tabulku `vydej`
--
ALTER TABLE `vydej`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Omezení pro exportované tabulky
--

--
-- Omezení pro tabulku `dodej`
--
ALTER TABLE `dodej`
  ADD CONSTRAINT `FK_dodej_kvetiny` FOREIGN KEY (`idkvetiny`) REFERENCES `kvetiny` (`id`);

--
-- Omezení pro tabulku `vydej`
--
ALTER TABLE `vydej`
  ADD CONSTRAINT `FK_vydej_kvetiny` FOREIGN KEY (`idkvetiny`) REFERENCES `kvetiny` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
