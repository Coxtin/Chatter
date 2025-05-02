-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 26, 2025 at 07:45 PM
-- Server version: 8.0.31
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chatter`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `ID_contact` int NOT NULL,
  `ID_utilizator_contact` int NOT NULL,
  `ID_utilizator_prieten` int NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `grup`
--

CREATE TABLE `grup` (
  `ID_grup` int NOT NULL,
  `nume` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `descriere` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `imagine` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `data_creare` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `grup_membru`
--

CREATE TABLE `grup_membru` (
  `ID_grup_utilizator` int NOT NULL,
  `ID_grup_aferent` int NOT NULL,
  `rol` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `data_alaturare` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mesaj`
--

CREATE TABLE `mesaj` (
  `ID_mesaj` int NOT NULL,
  `ID_emitator` int NOT NULL,
  `ID_receptor` int NOT NULL,
  `tip_mesaj` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mesaj` text COLLATE utf8mb4_general_ci,
  `status_mesaj` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `data_trimitere` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `poze_utilizatori`
--

CREATE TABLE `poze_utilizatori` (
  `ID_poza` int NOT NULL,
  `ID_utilizator` int NOT NULL,
  `nume_imagine` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `data_poza` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `activ` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `utilizatori`
--

CREATE TABLE `utilizatori` (
  `ID_utilizator` int NOT NULL,
  `nume_utilizator` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `prenume_utilizator` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `sex_utilizator` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ziNastere_utilizator` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `username_utilizator` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email_utilizator` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `parola_utilizator` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `descriere_utilizator` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `data_creare` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `utilizatori`
--

INSERT INTO `utilizatori` (`ID_utilizator`, `nume_utilizator`, `prenume_utilizator`, `sex_utilizator`, `ziNastere_utilizator`, `username_utilizator`, `email_utilizator`, `parola_utilizator`, `descriere_utilizator`, `data_creare`) VALUES
(1, 'Costin', 'Oltean', 'Masculin', '2011-06-01', 'Cox', 'costinpetrut.oltean@ulbsibiu.ro', '$2y$10$bZhFU8PyIXu3.uzHSvOoV.HDgJkT47XT7pLcW/ohmHnOzXEO7ktbO', NULL, '2025-01-23 08:50:08'),
(2, 'Radu', 'Boricean', 'Masculin', '2009-06-11', 'radu_', 'salut@ceva.com', '$2y$10$SwCI07XsEFqNViet9XX4j.rIYok.7cHFZiCeiUj0sLYGcswv4u7/6', NULL, '2025-01-25 11:57:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`ID_contact`),
  ADD KEY `ID_utilizator_contact` (`ID_utilizator_contact`),
  ADD KEY `ID_utilizator_prieten` (`ID_utilizator_prieten`);

--
-- Indexes for table `grup`
--
ALTER TABLE `grup`
  ADD PRIMARY KEY (`ID_grup`);

--
-- Indexes for table `grup_membru`
--
ALTER TABLE `grup_membru`
  ADD KEY `ID_grup_utilizator` (`ID_grup_utilizator`),
  ADD KEY `ID_grup_aferent` (`ID_grup_aferent`);

--
-- Indexes for table `mesaj`
--
ALTER TABLE `mesaj`
  ADD PRIMARY KEY (`ID_mesaj`),
  ADD KEY `ID_emitator` (`ID_emitator`),
  ADD KEY `ID_receptor` (`ID_receptor`);

--
-- Indexes for table `poze_utilizatori`
--
ALTER TABLE `poze_utilizatori`
  ADD PRIMARY KEY (`ID_poza`),
  ADD KEY `ID_utilizator` (`ID_utilizator`);

--
-- Indexes for table `utilizatori`
--
ALTER TABLE `utilizatori`
  ADD PRIMARY KEY (`ID_utilizator`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `ID_contact` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grup`
--
ALTER TABLE `grup`
  MODIFY `ID_grup` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mesaj`
--
ALTER TABLE `mesaj`
  MODIFY `ID_mesaj` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `poze_utilizatori`
--
ALTER TABLE `poze_utilizatori`
  MODIFY `ID_poza` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `utilizatori`
--
ALTER TABLE `utilizatori`
  MODIFY `ID_utilizator` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `contact_ibfk_1` FOREIGN KEY (`ID_utilizator_contact`) REFERENCES `utilizatori` (`ID_utilizator`),
  ADD CONSTRAINT `contact_ibfk_2` FOREIGN KEY (`ID_utilizator_prieten`) REFERENCES `utilizatori` (`ID_utilizator`);

--
-- Constraints for table `grup_membru`
--
ALTER TABLE `grup_membru`
  ADD CONSTRAINT `grup_membru_ibfk_1` FOREIGN KEY (`ID_grup_utilizator`) REFERENCES `utilizatori` (`ID_utilizator`),
  ADD CONSTRAINT `grup_membru_ibfk_2` FOREIGN KEY (`ID_grup_aferent`) REFERENCES `grup` (`ID_grup`);

--
-- Constraints for table `mesaj`
--
ALTER TABLE `mesaj`
  ADD CONSTRAINT `mesaj_ibfk_1` FOREIGN KEY (`ID_emitator`) REFERENCES `utilizatori` (`ID_utilizator`);

--
-- Constraints for table `poze_utilizatori`
--
ALTER TABLE `poze_utilizatori`
  ADD CONSTRAINT `poze_utilizatori_ibfk_1` FOREIGN KEY (`ID_utilizator`) REFERENCES `utilizatori` (`ID_utilizator`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
