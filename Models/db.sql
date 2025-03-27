-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 20 déc. 2023 à 13:05
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `u969722060_famileasy`
--

-- --------------------------------------------------------

--
-- Structure de la table `dashboard`
--

CREATE TABLE `dashboard` (
  `idDashBoard` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `UseridUser` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Déchargement des données de la table `dashboard`
--

INSERT INTO `dashboard` (`idDashBoard`, `username`, `UseridUser`) VALUES
(41, 'cc', 50),
(42, 'ccd', 51),
(43, 'ccdaz\'s dashboard', 52),
(44, 'ccdaz2', 53);

-- --------------------------------------------------------

--
-- Structure de la table `login`
--

CREATE TABLE `login` (
  `idLogin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `Hash` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Déchargement des données de la table `login`
--

INSERT INTO `login` (`idLogin`, `username`, `Hash`) VALUES
(83, 'cc', '0b8d2889977f51b5d424f841904c17a87e3d5e70d99a3e63fecf52ba3e529904'),
(84, 'ccd', '0b8d2889977f51b5d424f841904c17a87e3d5e70d99a3e63fecf52ba3e529904'),
(85, 'ccdaz', '0b8d2889977f51b5d424f841904c17a87e3d5e70d99a3e63fecf52ba3e529904'),
(86, 'ccdaz2', '0b8d2889977f51b5d424f841904c17a87e3d5e70d99a3e63fecf52ba3e529904');

-- --------------------------------------------------------

--
-- Structure de la table `myhome`
--

CREATE TABLE `myhome` (
  `idMyHome` int(11) NOT NULL,
  `codeMyHome` varchar(64) NOT NULL,
  `nameMyHome` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Déchargement des données de la table `myhome`
--

INSERT INTO `myhome` (`idMyHome`, `codeMyHome`, `nameMyHome`) VALUES
(1, '', 'ccFame');

-- --------------------------------------------------------

--
-- Structure de la table `task`
--

CREATE TABLE `task` (
  `idTask` int(11) NOT NULL,
  `Date` date DEFAULT NULL,
  `Duration` int(11) DEFAULT NULL,
  `Name` varchar(40) DEFAULT NULL,
  `DashBoardidDashBoard` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `task`
--

INSERT INTO `task` (`idTask`, `Date`, `Duration`, `Name`, `DashBoardidDashBoard`) VALUES
(5, '2023-11-22', 3, 'Dishes', 41),
(6, '2023-11-22', 11, 'DIY', 41),
(7, '2023-07-06', 4, 'Cleaning', 41),
(8, '2023-09-07', 9, 'Shopping', 41),
(9, '2023-11-25', 14, 'Cooking', 41),
(10, '2023-11-22', 9, 'Dishes', 41),
(11, '2023-11-07', 15, 'Laundry', 41),
(12, '2023-08-24', 23, 'ChildsPlay', 41),
(13, '2023-10-12', 6, 'ChildrensJourney', 41),
(14, '2023-09-20', 10, 'ParentJourney', 41),
(15, '2023-06-09', 18, 'ParentCare', 41),
(16, '2023-09-14', 11, 'Administrative', 41),
(17, '2023-08-10', 7, 'PetCare', 41),
(18, '2023-04-06', 5, 'Gardening', 41),
(19, '2023-10-31', 12, 'DIY', 41),
(20, '2023-10-31', 12, 'DIY', 41),
(21, '2023-11-08', 3, 'HouseholdManagement', 41),
(22, '2023-10-11', 7, 'Cleaning', 41),
(23, '2023-11-22', 5, 'DIY', 41),
(24, '2023-01-12', 13, 'ParentCare', 41),
(25, '2023-01-05', 13, 'ParentCare', 41),
(26, '2022-12-01', 13, 'Dishes', 41);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `idUsers` int(11) NOT NULL,
  `LastName` varchar(60) DEFAULT NULL,
  `FirstName` varchar(40) DEFAULT NULL,
  `Gender` varchar(20) DEFAULT NULL,
  `BirthDate` date DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `FamilyPlace` varchar(1000) DEFAULT NULL,
  `LoginidLogin` int(11) DEFAULT NULL,
  `DashBoardidDashBoard` int(11) DEFAULT NULL,
  `MyHomeIdMyHome` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`idUsers`, `LastName`, `FirstName`, `Gender`, `BirthDate`, `Email`, `FamilyPlace`, `LoginidLogin`, `DashBoardidDashBoard`, `MyHomeIdMyHome`) VALUES
(50, 'cc', 'cc', 'man', '2023-01-01', 'c@gmail.com', 'parent', 83, 41, 1),
(51, 'cc', 'cc', 'man', '2023-01-01', 'cd@gmail.com', 'parent', 84, 42, NULL),
(52, 'dd', 'dd', 'man', '2023-01-01', 'cddd@gmail.com', 'child', 85, 43, NULL),
(53, 'c', 'rgr', 'man', '2023-01-01', 'cce23@gmail.com', 'child', 86, 44, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `dashboard`
--
ALTER TABLE `dashboard`
  ADD PRIMARY KEY (`idDashBoard`),
  ADD KEY `UseridUser` (`UseridUser`);

--
-- Index pour la table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`idLogin`),
  ADD UNIQUE KEY `id` (`username`);

--
-- Index pour la table `myhome`
--
ALTER TABLE `myhome`
  ADD PRIMARY KEY (`idMyHome`),
  ADD UNIQUE KEY `codeMyHome` (`codeMyHome`);

--
-- Index pour la table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`idTask`),
  ADD KEY `fk_DashBoardidDashBoard` (`DashBoardidDashBoard`) USING BTREE;

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUsers`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD KEY `fk_LoginidLogin` (`LoginidLogin`),
  ADD KEY `fk_DashBoardidDashBoard` (`DashBoardidDashBoard`) USING BTREE,
  ADD KEY `fk_MyHomeIdMyHome` (`MyHomeIdMyHome`) USING BTREE;

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `dashboard`
--
ALTER TABLE `dashboard`
  MODIFY `idDashBoard` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT pour la table `login`
--
ALTER TABLE `login`
  MODIFY `idLogin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT pour la table `myhome`
--
ALTER TABLE `myhome`
  MODIFY `idMyHome` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `task`
--
ALTER TABLE `task`
  MODIFY `idTask` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `idUsers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `dashboard`
--
ALTER TABLE `dashboard`
  ADD CONSTRAINT `UseridUser` FOREIGN KEY (`UseridUser`) REFERENCES `users` (`idUsers`);

--
-- Contraintes pour la table `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `task_ibfk_1` FOREIGN KEY (`DashBoardidDashBoard`) REFERENCES `dashboard` (`idDashBoard`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`LoginidLogin`) REFERENCES `login` (`idLogin`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`DashBoardidDashBoard`) REFERENCES `dashboard` (`idDashBoard`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_3` FOREIGN KEY (`MyHomeIdMyHome`) REFERENCES `myhome` (`idMyHome`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
