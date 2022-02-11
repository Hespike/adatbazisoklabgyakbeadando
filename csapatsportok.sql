-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2021. Dec 11. 11:56
-- Kiszolgáló verziója: 10.4.21-MariaDB
-- PHP verzió: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `csapatsportok`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `csapat`
--

CREATE TABLE `csapat` (
  `csnev` varchar(30) COLLATE utf8_hungarian_ci NOT NULL,
  `cim` varchar(30) COLLATE utf8_hungarian_ci NOT NULL,
  `telefon` int(10) NOT NULL,
  `alapitaseve` int(4) NOT NULL,
  `liganev` varchar(30) COLLATE utf8_hungarian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `csapat`
--

INSERT INTO `csapat` (`csnev`, `cim`, `telefon`, `alapitaseve`, `liganev`) VALUES
('A. Madrid', 'Madrid Puskás utca 14.', 2312311, 1943, 'LaLiga'),
('AC Milan', 'Szerkesztett utca 14', 5321, 1920, 'Seria A'),
('AS Roma', 'Római körút 4.', 213121, 1964, 'Seria A'),
('Barcelona', 'Barcelona Street 16.', 6304564, 1933, 'LaLiga'),
('Bologna', 'Bologna utca 23.', 3852934, 1930, 'Seria A'),
('Chelsea', 'London Main Road 14.', 1238912, 1930, 'Premier League'),
('Fradi', 'Budapest', 45236, 1943, 'NB1'),
('Hercegszántó', 'Hercegszántói Rét 3.', 123123, 1933, 'Megye 1'),
('Inter Milan', 'Milánó utca 16.', 5234234, 1992, 'Seria A'),
('Lille', 'Lille Bonjour utca 43.', 892189213, 1923, 'LaLiga'),
('Man. City', 'Manchester Road 3.', 12389123, 1922, 'Premier League'),
('Man. Utd.', 'Manchester Road 3.', 1238123, 1922, 'Premier League'),
('Mátételke', 'Mátételke Fő tér 8.', 2139832, 2021, 'Megye 1'),
('PSG', 'Párizs 14.', 2318231, 1923, 'Ligue 1'),
('Real Madrid', 'Madrid Puskás utca 15.', 392929292, 1843, 'LaLiga'),
('Tataháza', 'Tataháza Széchenyi utca 3.', 520304, 1994, 'Megye 1'),
('Villareal', 'Katalónia utca 33.', 53243, 1950, 'LaLiga');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `liga`
--

CREATE TABLE `liga` (
  `liganev` varchar(30) COLLATE utf8_hungarian_ci NOT NULL,
  `orszag` varchar(30) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `liga`
--

INSERT INTO `liga` (`liganev`, `orszag`) VALUES
('Brazilian First League', 'Brazília'),
('Bundesliga', 'Németország'),
('Bundesliga 2', 'Németország'),
('Championship', 'Anglia'),
('LaLiga', 'Spanyolország'),
('Ligue 1', 'Franciaország'),
('Ligue 2', 'Franciaország'),
('Ligue 3', 'Franciaország'),
('Megye 1', 'Magyarország'),
('Megye 2', 'Magyarország'),
('NB1', 'Magyarország'),
('NB2', 'Magyarország'),
('NB3', 'Magyarország'),
('Premier League', 'Anglia'),
('Seria A', 'Olaszorszag'),
('Seria B', 'Olaszország'),
('Seria C', 'Olaszország'),
('Seria D', 'Olaszország');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `meccs`
--

CREATE TABLE `meccs` (
  `meccsid` int(20) NOT NULL,
  `helyszin` varchar(30) COLLATE utf8_hungarian_ci NOT NULL,
  `datum` varchar(30) COLLATE utf8_hungarian_ci NOT NULL,
  `mennyivelnyert` int(5) NOT NULL,
  `csnev` varchar(30) COLLATE utf8_hungarian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `meccs`
--

INSERT INTO `meccs` (`meccsid`, `helyszin`, `datum`, `mennyivelnyert`, `csnev`) VALUES
(0, 'Párizs', '2021-12-09', 3, 'AC Milan'),
(1, 'Budapest', '2021-12-09', 7, 'Fradi'),
(2, 'Párizs', '2021-12-09', 3, 'Barcelona'),
(3, 'Madrid', '2021-12-09', 14, 'Real Madrid'),
(4, 'Tataháza', '2021-12-09', 32, 'Mátételke'),
(5, 'London', '2021-12-09', 5, 'A. Madrid'),
(6, 'Moszkva', '2021-12-09', 6, 'AC Milan'),
(7, 'Narnia', '2021-12-09', 2, 'Tataháza'),
(8, 'Zalaegerszeg', '2021-12-09', 6, 'AC Milan'),
(9, 'Párizs', '2021-12-10', 65, 'PSG'),
(10, 'Párizs', '2021-12-10', 2, 'Real Madrid'),
(11, 'Belgrád', '2021-12-10', 16, 'AC Milan'),
(12, 'London', '2021-12-10', 2, 'Chelsea'),
(13, 'Barcelona', '2021.08.12', 1, 'Barcelona'),
(14, 'London', '2021-12-10', 1, 'Chelsea'),
(15, 'Milánó', '2021.11.09.', 4, 'AC Milan'),
(16, 'La Mancha', '2021-12-10', 3, 'Villareal');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `sportolo`
--

CREATE TABLE `sportolo` (
  `szigszam` int(30) NOT NULL,
  `szuldatum` varchar(30) COLLATE utf8_hungarian_ci NOT NULL,
  `nev` varchar(30) COLLATE utf8_hungarian_ci NOT NULL,
  `poszt` varchar(30) COLLATE utf8_hungarian_ci NOT NULL,
  `golok` int(10) NOT NULL,
  `csnev` varchar(30) COLLATE utf8_hungarian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `sportolo`
--

INSERT INTO `sportolo` (`szigszam`, `szuldatum`, `nev`, `poszt`, `golok`, `csnev`) VALUES
(2139, '1971-09-15', 'Ronaldo', 'Csatár', 3, 'Inter MIlan'),
(25436, '1960-09-01', 'Diego Costa', 'Csatár', 34, 'AC Milan'),
(123123, '1991-09-11', 'Kiss Béla', 'Védő', 10, 'AC Milan'),
(123932, '1967-01-01', 'Gavi', 'Középpályás', 23, 'Barcelona'),
(1231231, '1900-01-01', 'Kiss Aladár', 'Középályás', 43, 'Chelsea'),
(1343564, '2007-08-11', 'Cristiano Ronaldo', 'Csatár', 433, 'Real Madrid'),
(1478292, '1906-01-01', 'Lorenzo Von Matterhorn', 'Védő', 1, 'AS Roma'),
(2311232, '1911-01-01', 'Neymar', 'Középpályás', 3, 'Mátételke'),
(6452343, '1992.08.13', 'Kiss József', 'Kapus', 0, 'AC Milan'),
(12332154, '1966-08-22', 'Ronaldinho', 'Csatár', 392, 'Mátételke'),
(23112354, '1984-07-01', 'Lionel Messi', 'Középpályás', 433, 'Barcelona'),
(32112313, '1971-07-01', 'Hercegszántói BÉla', 'Középpályás', 2, 'Hercegszántó'),
(312542131, '1993-01-01', 'Puskás Ferenc', 'Csatár', 1034, 'Real Madrid'),
(1233215212, '1993-09-22', 'Kroos', 'Középpályás', 4, 'Barcelona'),
(1233215213, '1993-07-12', 'Pelé', 'Csatár', 938, 'Tataháza'),
(2147483647, '1959-01-01', 'Totti', 'Középpályás', 231, 'AS Roma');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `csapat`
--
ALTER TABLE `csapat`
  ADD PRIMARY KEY (`csnev`),
  ADD KEY `liganev` (`liganev`),
  ADD KEY `csnev` (`csnev`);

--
-- A tábla indexei `liga`
--
ALTER TABLE `liga`
  ADD PRIMARY KEY (`liganev`);

--
-- A tábla indexei `meccs`
--
ALTER TABLE `meccs`
  ADD PRIMARY KEY (`meccsid`),
  ADD KEY `meccsid` (`meccsid`),
  ADD KEY `csnev` (`csnev`);

--
-- A tábla indexei `sportolo`
--
ALTER TABLE `sportolo`
  ADD PRIMARY KEY (`szigszam`),
  ADD KEY `csnev` (`csnev`),
  ADD KEY `szigszam` (`szigszam`);

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `csapat`
--
ALTER TABLE `csapat`
  ADD CONSTRAINT `csapat_ibfk_1` FOREIGN KEY (`liganev`) REFERENCES `liga` (`liganev`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Megkötések a táblához `meccs`
--
ALTER TABLE `meccs`
  ADD CONSTRAINT `meccs_ibfk_1` FOREIGN KEY (`csnev`) REFERENCES `csapat` (`csnev`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Megkötések a táblához `sportolo`
--
ALTER TABLE `sportolo`
  ADD CONSTRAINT `sportolo_ibfk_1` FOREIGN KEY (`csnev`) REFERENCES `csapat` (`csnev`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
