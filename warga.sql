-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 09, 2024 at 07:39 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `warga`
--

-- --------------------------------------------------------

--
-- Table structure for table `domisili`
--

CREATE TABLE `domisili` (
  `Id` int NOT NULL,
  `userId` int DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `sesuaiKTP` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `domisili`
--

INSERT INTO `domisili` (`Id`, `userId`, `alamat`, `sesuaiKTP`) VALUES
(6, 10505199, 'Jln. Tugu Indah I No.1A', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lainnya`
--

CREATE TABLE `lainnya` (
  `Id` int NOT NULL,
  `userId` int DEFAULT NULL,
  `pendidikanTerakhir` varchar(20) DEFAULT NULL,
  `pekerjaan` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `lainnya`
--

INSERT INTO `lainnya` (`Id`, `userId`, `pendidikanTerakhir`, `pekerjaan`) VALUES
(6, 10505199, 'perguruanTinggi', 'tidak');

-- --------------------------------------------------------

--
-- Table structure for table `orang`
--

CREATE TABLE `orang` (
  `Id` int NOT NULL,
  `userId` int DEFAULT NULL,
  `namaLengkap` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `tanggalLahir` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `tempatLahir` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orang`
--

INSERT INTO `orang` (`Id`, `userId`, `namaLengkap`, `tanggalLahir`, `tempatLahir`) VALUES
(6, 10505199, 'Kristovel Adi Sucipto', '05-05-1998', 'JAKARTA');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `domisili`
--
ALTER TABLE `domisili`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `userId` (`userId`),
  ADD UNIQUE KEY `userId_2` (`userId`),
  ADD UNIQUE KEY `userId_3` (`userId`);

--
-- Indexes for table `lainnya`
--
ALTER TABLE `lainnya`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `userId` (`userId`),
  ADD UNIQUE KEY `userId_2` (`userId`),
  ADD UNIQUE KEY `userId_3` (`userId`);

--
-- Indexes for table `orang`
--
ALTER TABLE `orang`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `userId` (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `domisili`
--
ALTER TABLE `domisili`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `lainnya`
--
ALTER TABLE `lainnya`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orang`
--
ALTER TABLE `orang`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `domisili`
--
ALTER TABLE `domisili`
  ADD CONSTRAINT `FK_OrangDomisili` FOREIGN KEY (`userId`) REFERENCES `orang` (`userId`) ON DELETE CASCADE;

--
-- Constraints for table `lainnya`
--
ALTER TABLE `lainnya`
  ADD CONSTRAINT `FK_OrangLainnya` FOREIGN KEY (`userId`) REFERENCES `orang` (`userId`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
