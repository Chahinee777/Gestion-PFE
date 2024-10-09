-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2024 at 02:58 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gestionpfe`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(10) NOT NULL,
  `NomAdmin` varchar(120) DEFAULT NULL,
  `NomUtilisateur` varchar(120) DEFAULT NULL,
  `NumeroMobile` bigint(10) DEFAULT NULL,
  `Courriel` varchar(200) DEFAULT NULL,
  `MotDePasse` varchar(200) DEFAULT NULL,
  `DateEnregistrementAdmin` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `NomAdmin`, `NomUtilisateur`, `NumeroMobile`, `Courriel`, `MotDePasse`, `DateEnregistrementAdmin`) VALUES
(1, 'Admin', 'admin', 8979555558, 'admin@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2019-10-11 03:36:52');

-- --------------------------------------------------------

--
-- Table structure for table `tblclass`
--

CREATE TABLE `tblclass` (
  `ID` int(5) NOT NULL,
  `NomClasse` varchar(50) DEFAULT NULL,
  `Section` varchar(20) DEFAULT NULL,
  `DateCreation` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblclass`
--

INSERT INTO `tblclass` (`ID`, `NomClasse`, `Section`, `DateCreation`) VALUES
(1, 'DSI1', 'TI', '2024-02-27 18:59:36'),
(2, 'DSI2', 'TI', '2024-02-27 18:59:36'),
(3, 'DSI3', 'TI', '2024-02-27 18:59:51');

-- --------------------------------------------------------

--
-- Table structure for table `tblenseignant`
--

CREATE TABLE `tblenseignant` (
  `ID` int(10) NOT NULL,
  `NomEnseignant` varchar(200) DEFAULT NULL,
  `CourrielEnseignant` varchar(200) DEFAULT NULL,
  `ClasseEnseignant` varchar(100) DEFAULT NULL,
  `Sexe` varchar(50) DEFAULT NULL,
  `DateDeNaissance` date DEFAULT NULL,
  `IDEnseignant` varchar(200) DEFAULT NULL,
  `NumeroContact` bigint(10) DEFAULT NULL,
  `NumeroAlternatif` bigint(10) DEFAULT NULL,
  `Adresse` mediumtext DEFAULT NULL,
  `NomUtilisateur` varchar(200) DEFAULT NULL,
  `MotDePasse` varchar(200) DEFAULT NULL,
  `Image` varchar(200) DEFAULT NULL,
  `DateAdmission` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblenseignant`
--

INSERT INTO `tblenseignant` (`ID`, `NomEnseignant`, `CourrielEnseignant`, `ClasseEnseignant`, `Sexe`, `DateDeNaissance`, `IDEnseignant`, `NumeroContact`, `NumeroAlternatif`, `Adresse`, `NomUtilisateur`, `MotDePasse`, `Image`, `DateAdmission`) VALUES
(2, 'Chahine Aouled Amor', 'chahine@gmail.com', '3', 'Male', '2024-03-10', 'chahinee77', 53168665, 12345678, 'medina', 'chahinee77', 'e61e7de603852182385da5e907b4b232', '4974cc3433dc04aed80a6e069d7b17cb1710105242.jpg', '2024-03-10 21:14:02');

-- --------------------------------------------------------

--
-- Table structure for table `tbletudiant`
--

CREATE TABLE `tbletudiant` (
  `ID` int(10) NOT NULL,
  `NomEtudiant` varchar(200) DEFAULT NULL,
  `CourrielEtudiant` varchar(200) DEFAULT NULL,
  `ClasseEtudiant` varchar(100) DEFAULT NULL,
  `Sexe` varchar(50) DEFAULT NULL,
  `DateDeNaissance` date DEFAULT NULL,
  `IDEtudiant` varchar(200) DEFAULT NULL,
  `NumeroContact` bigint(10) DEFAULT NULL,
  `NumeroAlternatif` bigint(10) DEFAULT NULL,
  `Adresse` mediumtext DEFAULT NULL,
  `NomUtilisateur` varchar(200) DEFAULT NULL,
  `MotDePasse` varchar(200) DEFAULT NULL,
  `Image` varchar(200) DEFAULT NULL,
  `DateAdmission` timestamp NULL DEFAULT current_timestamp(),
  `CIN` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbletudiant`
--

INSERT INTO `tbletudiant` (`ID`, `NomEtudiant`, `CourrielEtudiant`, `ClasseEtudiant`, `Sexe`, `DateDeNaissance`, `IDEtudiant`, `NumeroContact`, `NumeroAlternatif`, `Adresse`, `NomUtilisateur`, `MotDePasse`, `Image`, `DateAdmission`, `CIN`) VALUES
(6, NULL, 'acgamer35ca@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$/F3PHXPx9Zz00LZuaAu9DeO5HwkyUxg04Dym.DEcyqgjmLIWJ9g7e', NULL, '2024-03-10 21:39:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblfiche`
--

CREATE TABLE `tblfiche` (
  `ID` int(11) NOT NULL,
  `etudiant1` varchar(255) NOT NULL,
  `etudiant2` varchar(255) NOT NULL,
  `email_etudiant1` varchar(255) NOT NULL,
  `email_etudiant2` varchar(255) NOT NULL,
  `titre_projet` varchar(255) NOT NULL,
  `encadreur_iset` varchar(255) NOT NULL,
  `nom_entreprise` varchar(255) NOT NULL,
  `encadreur_entreprise` varchar(255) NOT NULL,
  `date_creation` timestamp NOT NULL DEFAULT current_timestamp(),
  `classe_etudiant1` varchar(255) DEFAULT NULL,
  `classe_etudiant2` varchar(255) DEFAULT NULL,
  `sujet` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblfiche`
--

INSERT INTO `tblfiche` (`ID`, `etudiant1`, `etudiant2`, `email_etudiant1`, `email_etudiant2`, `titre_projet`, `encadreur_iset`, `nom_entreprise`, `encadreur_entreprise`, `date_creation`, `classe_etudiant1`, `classe_etudiant2`, `sujet`) VALUES
(0, 'Chahine', 'Melliti', 'Chahine@hhh', 'Melliti@xd', '', 'Hmed', 'Alin', 'foulen', '2024-03-11 15:05:13', NULL, NULL, 'haallalallaala');

-- --------------------------------------------------------

--
-- Table structure for table `tblnotice`
--

CREATE TABLE `tblnotice` (
  `ID` int(5) NOT NULL,
  `TitreAvis` mediumtext DEFAULT NULL,
  `IdClasse` int(10) DEFAULT NULL,
  `MessageAvis` mediumtext DEFAULT NULL,
  `DateCreation` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblnotice`
--

INSERT INTO `tblnotice` (`ID`, `TitreAvis`, `IdClasse`, `MessageAvis`, `DateCreation`) VALUES
(0, 'Test', 1, 'Hello', '2024-03-10 20:58:20');

-- --------------------------------------------------------

--
-- Table structure for table `tblpage`
--

CREATE TABLE `tblpage` (
  `ID` int(10) NOT NULL,
  `TypePage` varchar(200) DEFAULT NULL,
  `TitrePage` mediumtext DEFAULT NULL,
  `DescriptionPage` mediumtext DEFAULT NULL,
  `Courriel` varchar(200) DEFAULT NULL,
  `NumeroMobile` bigint(10) DEFAULT NULL,
  `DateMiseAJour` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblpage`
--

INSERT INTO `tblpage` (`ID`, `TypePage`, `TitrePage`, `DescriptionPage`, `Courriel`, `NumeroMobile`, `DateMiseAJour`) VALUES
(1, 'aboutus', 'À propos de nous', '<div style=\"text-align: start;\"><font color=\"#4d5156\" face=\"arial, sans-serif\"><span style=\"font-size: 14px;\">L\'ISET de Radès est un établissement d\'enseignement supérieur qui propose des formations de qualité dans des domaines tels que l\'informatique, l\'électronique, le génie mécanique, le génie électrique, et bien d\'autres encore. Il vise à fournir à ses étudiants les compétences nécessaires pour réussir dans le monde professionnel, en mettant l\'accent sur la pratique et l\'application des connaissances théoriques. De plus, l\'ISET de Radès participe activement à la recherche appliquée et au développement technologique, contribuant ainsi à l\'avancement de divers secteurs industriels en Tunisie et au-delà.</span></font><br></div>', NULL, NULL, NULL),
(2, 'contactus', 'Contacter Nous', '<span style=\"color: rgb(32, 33, 36); font-family: arial, sans-serif; font-size: 14px;\">L\' ISET de Radès, Av. de France, Radès</span><br>', 'directeur.iset.rades@gmail.com', 71460100, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblpublicnotice`
--

CREATE TABLE `tblpublicnotice` (
  `ID` int(5) NOT NULL,
  `TitreAvisPublic` varchar(200) DEFAULT NULL,
  `MessageAvisPublic` mediumtext DEFAULT NULL,
  `DateCreation` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblenseignant`
--
ALTER TABLE `tblenseignant`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbletudiant`
--
ALTER TABLE `tbletudiant`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblenseignant`
--
ALTER TABLE `tblenseignant`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbletudiant`
--
ALTER TABLE `tbletudiant`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
