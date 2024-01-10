-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 10, 2024 at 11:31 AM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projetpw`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `categorie_id` int NOT NULL AUTO_INCREMENT,
  `nom_categorie` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `code_raccourci` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  PRIMARY KEY (`categorie_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categorie_id`, `nom_categorie`, `code_raccourci`) VALUES
(1, 'moins de 12 ans', 'M13'),
(4, 'moins de 10 ans', 'M10'),
(10, '22222', 'aaa'),
(9, 'Moins de 30 ans', 'M230');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `contact_id` int NOT NULL AUTO_INCREMENT,
  `nom_contact` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `prenom_contact` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`contact_id`, `nom_contact`, `prenom_contact`, `email`, `telephone`) VALUES
(1, 'KONE', 'Largaton', 'kone@mail.com', '0707070707'),
(5, 'salma', 'bouchra', 'largaton.kone20@inphb.ci', '+33223236327');

-- --------------------------------------------------------

--
-- Table structure for table `educateurs`
--

DROP TABLE IF EXISTS `educateurs`;
CREATE TABLE IF NOT EXISTS `educateurs` (
  `educateur_id` int NOT NULL AUTO_INCREMENT,
  `licencie_id` int NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mot_de_passe` varchar(100) DEFAULT NULL,
  `est_administrateur` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`educateur_id`),
  KEY `id_licencie` (`licencie_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `educateurs`
--

INSERT INTO `educateurs` (`educateur_id`, `licencie_id`, `email`, `mot_de_passe`, `est_administrateur`) VALUES
(3, 1, 'kone@mail.com', '$2y$10$TukGZY1JpCl8.nNrkUFAtOCdVmRIjXnbxjbaAOgkilkPQ.5j3FaK6', 1),
(2, 4, 'sciences-scol@univ-rennes.fr', '$2y$10$h2XpxFzErkwlQRMWB1UYNOBTng1jkXQN1E/fkCtR.oqS.8D2YGuja', 1),
(4, 1, 'll@mail.com', '$2y$10$Uh5L6G9e7AWRsyIkVMZnKu3kfWRrDEAVl6UbVadKhA.e/JGZfVD3a', 0);

-- --------------------------------------------------------

--
-- Table structure for table `licencies`
--

DROP TABLE IF EXISTS `licencies`;
CREATE TABLE IF NOT EXISTS `licencies` (
  `licencie_id` int NOT NULL AUTO_INCREMENT,
  `numero_licencie` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `categorie_id` int NOT NULL,
  `contact_id` int NOT NULL,
  PRIMARY KEY (`licencie_id`),
  UNIQUE KEY `numero_licence` (`numero_licencie`),
  KEY `id_categorie` (`categorie_id`),
  KEY `id_contact` (`contact_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `licencies`
--

INSERT INTO `licencies` (`licencie_id`, `numero_licencie`, `nom`, `prenom`, `categorie_id`, `contact_id`) VALUES
(1, '12342', 'salma', 'bouchra', 1, 1),
(4, 'aaaa', 'Cisséa', 'Oumara', 4, 5);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
