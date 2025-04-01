-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 01, 2025 at 05:04 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sae3_soupape`
--

-- --------------------------------------------------------

--
-- Table structure for table `dashboard`
--

CREATE TABLE `dashboard` (
  `idDashBoard` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `UseridUser` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `dashboard`
--

INSERT INTO `dashboard` (`idDashBoard`, `username`, `UseridUser`) VALUES
(41, 'cc', 50),
(42, 'ccd', 51),
(43, 'ccdaz\'s dashboard', 52),
(44, 'ccdaz2', 53),
(46, 'aaaa', 55);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `idLogin` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `hash` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`idLogin`, `username`, `hash`) VALUES
(83, 'cc', '0b8d2889977f51b5d424f841904c17a87e3d5e70d99a3e63fecf52ba3e529904'),
(84, 'ccd', '0b8d2889977f51b5d424f841904c17a87e3d5e70d99a3e63fecf52ba3e529904'),
(85, 'ccdaz', '0b8d2889977f51b5d424f841904c17a87e3d5e70d99a3e63fecf52ba3e529904'),
(86, 'ccdaz2', '0b8d2889977f51b5d424f841904c17a87e3d5e70d99a3e63fecf52ba3e529904'),
(88, 'aaaa', '0b8d2889977f51b5d424f841904c17a87e3d5e70d99a3e63fecf52ba3e529904');

-- --------------------------------------------------------

--
-- Table structure for table `myhome`
--

CREATE TABLE `myhome` (
  `idMyHome` int(11) NOT NULL,
  `codeMyHome` varchar(64) NOT NULL,
  `nameMyHome` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `myhome`
--

INSERT INTO `myhome` (`idMyHome`, `codeMyHome`, `nameMyHome`) VALUES
(1, '', 'ccFame'),
(2, 'caca', 'maisonCaca');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `idTask` int(11) NOT NULL,
  `Date` date DEFAULT NULL,
  `Duration` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `DashBoardidDashBoard` int(11) DEFAULT NULL,
  `date_added` date DEFAULT NULL,
  `id_dash_board` bigint(20) DEFAULT NULL,
  `name_task` varchar(255) DEFAULT NULL,
  `monetary_value` decimal(38,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`idTask`, `Date`, `Duration`, `name`, `DashBoardidDashBoard`, `date_added`, `id_dash_board`, `name_task`, `monetary_value`) VALUES
(5, '2023-11-22', 3, 'Dishes', 41, NULL, NULL, NULL, NULL),
(6, '2023-11-22', 11, 'DIY', 41, NULL, NULL, NULL, NULL),
(7, '2023-07-06', 4, 'Cleaning', 41, NULL, NULL, NULL, NULL),
(8, '2023-09-07', 9, 'Shopping', 41, NULL, NULL, NULL, NULL),
(9, '2023-11-25', 14, 'Cooking', 41, NULL, NULL, NULL, NULL),
(10, '2023-11-22', 9, 'Dishes', 41, NULL, NULL, NULL, NULL),
(11, '2023-11-07', 15, 'Laundry', 41, NULL, NULL, NULL, NULL),
(12, '2023-08-24', 23, 'ChildsPlay', 41, NULL, NULL, NULL, NULL),
(13, '2023-10-12', 6, 'ChildrensJourney', 41, NULL, NULL, NULL, NULL),
(14, '2023-09-20', 10, 'ParentJourney', 41, NULL, NULL, NULL, NULL),
(15, '2023-06-09', 18, 'ParentCare', 41, NULL, NULL, NULL, NULL),
(16, '2023-09-14', 11, 'Administrative', 41, NULL, NULL, NULL, NULL),
(17, '2023-08-10', 7, 'PetCare', 41, NULL, NULL, NULL, NULL),
(18, '2023-04-06', 5, 'Gardening', 41, NULL, NULL, NULL, NULL),
(19, '2023-10-31', 12, 'DIY', 41, NULL, NULL, NULL, NULL),
(20, '2023-10-31', 12, 'DIY', 41, NULL, NULL, NULL, NULL),
(21, '2023-11-08', 3, 'HouseholdManagement', 41, NULL, NULL, NULL, NULL),
(22, '2023-10-11', 7, 'Cleaning', 41, NULL, NULL, NULL, NULL),
(23, '2023-11-22', 5, 'DIY', 41, NULL, NULL, NULL, NULL),
(24, '2023-01-12', 13, 'ParentCare', 41, NULL, NULL, NULL, NULL),
(25, '2023-01-05', 13, 'ParentCare', 41, NULL, NULL, NULL, NULL),
(26, '2022-12-01', 13, 'Dishes', 41, NULL, NULL, NULL, NULL),
(27, '2025-04-01', 0, 'Cleaning', 46, NULL, NULL, NULL, NULL),
(28, '2025-04-01', 4, 'Cooking', 46, NULL, NULL, NULL, NULL),
(29, '2025-04-01', 3, 'Cleaning', 46, NULL, NULL, NULL, NULL),
(30, '2025-04-01', 2, 'Trajets des parents', 46, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `idUsers` int(11) NOT NULL,
  `LastName` varchar(60) DEFAULT NULL,
  `FirstName` varchar(40) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `BirthDate` date DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `FamilyPlace` varchar(1000) DEFAULT NULL,
  `LoginidLogin` int(11) DEFAULT NULL,
  `DashBoardidDashBoard` int(11) DEFAULT NULL,
  `MyHomeIdMyHome` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idUsers`, `LastName`, `FirstName`, `gender`, `BirthDate`, `email`, `FamilyPlace`, `LoginidLogin`, `DashBoardidDashBoard`, `MyHomeIdMyHome`) VALUES
(50, 'cc', 'cc', 'man', '2023-01-01', 'c@gmail.com', 'parent', 83, 41, 1),
(51, 'cc', 'cc', 'man', '2023-01-01', 'cd@gmail.com', 'parent', 84, 42, NULL),
(52, 'dd', 'dd', 'man', '2023-01-01', 'cddd@gmail.com', 'child', 85, 43, NULL),
(53, 'c', 'rgr', 'man', '2023-01-01', 'cce23@gmail.com', 'child', 86, 44, NULL),
(55, 'aaaa', 'aaaa', 'woman', '1984-01-01', 'aaaa@gmail.com', 'child', 88, 46, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dashboard`
--
ALTER TABLE `dashboard`
  ADD PRIMARY KEY (`idDashBoard`),
  ADD KEY `UseridUser` (`UseridUser`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`idLogin`),
  ADD UNIQUE KEY `id` (`username`);

--
-- Indexes for table `myhome`
--
ALTER TABLE `myhome`
  ADD PRIMARY KEY (`idMyHome`),
  ADD UNIQUE KEY `codeMyHome` (`codeMyHome`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`idTask`),
  ADD KEY `fk_DashBoardidDashBoard` (`DashBoardidDashBoard`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUsers`),
  ADD UNIQUE KEY `Email` (`email`),
  ADD KEY `fk_LoginidLogin` (`LoginidLogin`),
  ADD KEY `fk_DashBoardidDashBoard` (`DashBoardidDashBoard`) USING BTREE,
  ADD KEY `fk_MyHomeIdMyHome` (`MyHomeIdMyHome`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dashboard`
--
ALTER TABLE `dashboard`
  MODIFY `idDashBoard` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `idLogin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `myhome`
--
ALTER TABLE `myhome`
  MODIFY `idMyHome` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `idTask` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idUsers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dashboard`
--
ALTER TABLE `dashboard`
  ADD CONSTRAINT `UseridUser` FOREIGN KEY (`UseridUser`) REFERENCES `users` (`idUsers`);

--
-- Constraints for table `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `task_ibfk_1` FOREIGN KEY (`DashBoardidDashBoard`) REFERENCES `dashboard` (`idDashBoard`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`LoginidLogin`) REFERENCES `login` (`idLogin`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`DashBoardidDashBoard`) REFERENCES `dashboard` (`idDashBoard`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_3` FOREIGN KEY (`MyHomeIdMyHome`) REFERENCES `myhome` (`idMyHome`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
