-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Stř 21. úno 2024, 10:05
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
-- Databáze: `oa__kuryrni_sluzba`
--
CREATE DATABASE IF NOT EXISTS `oa__kuryrni_sluzba` DEFAULT CHARACTER SET utf8 COLLATE utf8_czech_ci;
USE `oa__kuryrni_sluzba`;

-- --------------------------------------------------------

--
-- Struktura tabulky `adresy_mista`
--

CREATE TABLE `adresy_mista` (
  `Id` int(11) NOT NULL,
  `Adresa` varchar(200) NOT NULL,
  `Rozloha_m2` int(11) DEFAULT NULL,
  `Typ` enum('podaci_misto','sklad') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci COMMENT='Adresy prodejen=podacích míst, skladu=depa atd.';

--
-- Vypisuji data pro tabulku `adresy_mista`
--

INSERT INTO `adresy_mista` (`Id`, `Adresa`, `Rozloha_m2`, `Typ`) VALUES
(1, 'Lesní 19', 20, 'sklad'),
(2, 'Staňkova 61', 150, 'sklad'),
(3, 'Vodní 55', 82, 'sklad'),
(4, 'Lesní 415', 20, 'podaci_misto'),
(5, 'Polenská 05', 10, 'podaci_misto'),
(6, 'U lípy 65', 150, 'sklad'),
(7, 'Lázeňská 112', 14, 'podaci_misto'),
(8, 'U dubu 54', 8, 'podaci_misto'),
(9, 'Klausova 16', 11, 'podaci_misto'),
(10, 'Třešňové dvory', 46, 'sklad');

-- --------------------------------------------------------

--
-- Struktura tabulky `kontakty`
--

CREATE TABLE `kontakty` (
  `Id` int(11) NOT NULL,
  `Prijmeni` varchar(80) NOT NULL,
  `Jmeno` varchar(80) NOT NULL,
  `Titul` varchar(14) NOT NULL,
  `Telefon` int(11) NOT NULL,
  `Email` varchar(80) NOT NULL,
  `Adresa` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci COMMENT='Kontakty na příjemce i odesílatele';

--
-- Vypisuji data pro tabulku `kontakty`
--

INSERT INTO `kontakty` (`Id`, `Prijmeni`, `Jmeno`, `Titul`, `Telefon`, `Email`, `Adresa`) VALUES
(1, 'Kostička', 'Kryštof', '', 154946521, 'kosticka@gmail.com', 'U dubu 159, Praha'),
(2, 'Poláková', 'Simona', '', 945612547, 'polakovasim@seznam.cz', 'Zdravotní 14, Olomouc'),
(3, 'Kolář', 'David', '', 545129874, 'david.kolar@seznam.cz', 'Jezdecká 119, Praha'),
(4, 'Valenta', 'Lubomír', '', 985451547, 'lubis@gmail.com', 'Ledová 94, Brno'),
(5, 'Komenská', 'Lucie', '', 441246459, 'luciakom@gmail.com', 'Skalní 15, Humpolec'),
(6, 'Šedivý', 'Erik', '', 456652241, 'erik.sedivy@seznam.cz', 'Luční 51, Znojmo'),
(7, 'Kobylka', 'Ladislav', '', 612487946, 'lada.Kob@centrum.cz', 'Statkářova 44, Praha'),
(8, 'Dráp', 'Jan', '', 787653459, 'honzadrapek@email.cz', 'Farářova 64, Liberec'),
(9, 'Drábková', 'Viktorie', '', 323648741, 'viki.drab@gmail.com', 'Silniční 354, Jihlava'),
(10, 'Polenská', 'Daniela', '', 329874541, 'danca.poli@centrum.cz', 'Vertikální 87, Ostrava');

-- --------------------------------------------------------

--
-- Struktura tabulky `prepravci`
--

CREATE TABLE `prepravci` (
  `Id` int(11) NOT NULL,
  `Prijmeni` varchar(80) NOT NULL,
  `Jmeno` varchar(80) NOT NULL,
  `Titul` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `prepravci`
--

INSERT INTO `prepravci` (`Id`, `Prijmeni`, `Jmeno`, `Titul`) VALUES
(1, 'Lipský', 'Dominik', ''),
(2, 'Veselá', 'Andrea', 'Mgr.'),
(3, 'Zelený', 'Simon', ''),
(4, 'Novák', 'Aleš', ''),
(5, 'Novotná', 'Denisa', ''),
(6, 'Lupen', 'Filip', ''),
(7, 'Ostrý', 'Vladimír', ''),
(8, 'Jankovský', 'Martin', ''),
(9, 'Berský', 'Pavel', ''),
(10, 'Fialková', 'Lucie', '');

-- --------------------------------------------------------

--
-- Struktura tabulky `ukony`
--

CREATE TABLE `ukony` (
  `Id` int(11) NOT NULL,
  `Typ` enum('prevoz','dorucovani','dorucen','nalozeni','uskladneni') NOT NULL,
  `Stav` enum('ceka','aktivni','hotovy','zrusen') NOT NULL,
  `Datum_zahajeni` date NOT NULL,
  `Z_adresy` int(11) DEFAULT NULL,
  `Do_adresy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci COMMENT='Jednotlivé úkony, které je třeba vykonat pro doručení balíku';

--
-- Vypisuji data pro tabulku `ukony`
--

INSERT INTO `ukony` (`Id`, `Typ`, `Stav`, `Datum_zahajeni`, `Z_adresy`, `Do_adresy`) VALUES
(1, 'dorucovani', 'hotovy', '2024-02-03', 4, 2),
(2, 'nalozeni', 'ceka', '2024-02-01', 2, 1),
(3, 'dorucovani', 'aktivni', '2024-02-02', 8, 5),
(4, 'uskladneni', 'hotovy', '2024-02-02', 1, 9),
(5, 'dorucen', 'hotovy', '2023-02-03', 6, 4),
(6, 'dorucovani', 'aktivni', '2024-02-03', 7, 5),
(7, 'prevoz', 'aktivni', '2022-02-01', 1, 8),
(8, 'prevoz', 'aktivni', '2024-02-01', 6, 9),
(9, 'nalozeni', 'aktivni', '2022-02-02', 4, 10),
(10, 'uskladneni', 'hotovy', '2024-02-02', 9, 10);

-- --------------------------------------------------------

--
-- Struktura tabulky `zasilka`
--

CREATE TABLE `zasilka` (
  `Id` int(11) NOT NULL,
  `Hmotnost` float NOT NULL,
  `Odesilatel` int(11) NOT NULL,
  `Prijemce` int(11) NOT NULL,
  `Podaci_misto` int(11) NOT NULL,
  `Dobirka` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `zasilka`
--

INSERT INTO `zasilka` (`Id`, `Hmotnost`, `Odesilatel`, `Prijemce`, `Podaci_misto`, `Dobirka`) VALUES
(1, 0.3, 3, 1, 1, 199),
(2, 0.4, 1, 1, 4, 799),
(3, 0.7, 1, 1, 1, 299),
(4, 4.4, 4, 7, 5, 2699),
(5, 2.1, 5, 1, 1, 12999),
(6, 0.4, 1, 1, 1, 59),
(7, 40.9, 9, 4, 1, 38499),
(8, 1.6, 2, 2, 4, 559),
(9, 0.4, 6, 1, 2, 1349),
(10, 5.3, 1, 1, 4, 7899);

-- --------------------------------------------------------

--
-- Struktura tabulky `zasilka_ukony`
--

CREATE TABLE `zasilka_ukony` (
  `Id` int(11) NOT NULL,
  `Zas_id` int(11) NOT NULL,
  `Ukon_id` int(11) NOT NULL,
  `Prepravce` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci COMMENT='Tabulka propojující úkony, zásilku a přepravce';

--
-- Vypisuji data pro tabulku `zasilka_ukony`
--

INSERT INTO `zasilka_ukony` (`Id`, `Zas_id`, `Ukon_id`, `Prepravce`) VALUES
(1, 4, 5, 1),
(2, 2, 2, 4),
(3, 6, 4, 8),
(4, 10, 7, 10),
(5, 7, 2, 2),
(6, 8, 2, 4),
(7, 3, 3, 7),
(8, 1, 5, 1),
(9, 5, 2, 8),
(10, 9, 8, 6);

--
-- Indexy pro exportované tabulky
--

--
-- Indexy pro tabulku `adresy_mista`
--
ALTER TABLE `adresy_mista`
  ADD PRIMARY KEY (`Id`);

--
-- Indexy pro tabulku `kontakty`
--
ALTER TABLE `kontakty`
  ADD PRIMARY KEY (`Id`);

--
-- Indexy pro tabulku `prepravci`
--
ALTER TABLE `prepravci`
  ADD PRIMARY KEY (`Id`);

--
-- Indexy pro tabulku `ukony`
--
ALTER TABLE `ukony`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Z_adresy` (`Z_adresy`),
  ADD KEY `Do_adresy` (`Do_adresy`);

--
-- Indexy pro tabulku `zasilka`
--
ALTER TABLE `zasilka`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Odesilatel` (`Odesilatel`),
  ADD KEY `Prijemce` (`Prijemce`),
  ADD KEY `Podaci_misto` (`Podaci_misto`);

--
-- Indexy pro tabulku `zasilka_ukony`
--
ALTER TABLE `zasilka_ukony`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Prepravce` (`Prepravce`),
  ADD KEY `Ukon_id` (`Ukon_id`),
  ADD KEY `Zas_id` (`Zas_id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `adresy_mista`
--
ALTER TABLE `adresy_mista`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pro tabulku `kontakty`
--
ALTER TABLE `kontakty`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pro tabulku `prepravci`
--
ALTER TABLE `prepravci`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pro tabulku `ukony`
--
ALTER TABLE `ukony`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pro tabulku `zasilka`
--
ALTER TABLE `zasilka`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pro tabulku `zasilka_ukony`
--
ALTER TABLE `zasilka_ukony`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Omezení pro exportované tabulky
--

--
-- Omezení pro tabulku `ukony`
--
ALTER TABLE `ukony`
  ADD CONSTRAINT `ukony_ibfk_1` FOREIGN KEY (`Z_adresy`) REFERENCES `adresy_mista` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ukony_ibfk_2` FOREIGN KEY (`Do_adresy`) REFERENCES `adresy_mista` (`Id`);

--
-- Omezení pro tabulku `zasilka`
--
ALTER TABLE `zasilka`
  ADD CONSTRAINT `zasilka_ibfk_1` FOREIGN KEY (`Odesilatel`) REFERENCES `kontakty` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `zasilka_ibfk_2` FOREIGN KEY (`Prijemce`) REFERENCES `kontakty` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `zasilka_ibfk_3` FOREIGN KEY (`Podaci_misto`) REFERENCES `adresy_mista` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Omezení pro tabulku `zasilka_ukony`
--
ALTER TABLE `zasilka_ukony`
  ADD CONSTRAINT `zasilka_ukony_ibfk_1` FOREIGN KEY (`Prepravce`) REFERENCES `prepravci` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `zasilka_ukony_ibfk_2` FOREIGN KEY (`Ukon_id`) REFERENCES `ukony` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `zasilka_ukony_ibfk_3` FOREIGN KEY (`Zas_id`) REFERENCES `zasilka` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
