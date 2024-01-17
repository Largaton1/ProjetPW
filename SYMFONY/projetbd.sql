-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 17, 2024 at 02:04 PM
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
-- Database: `projetbd`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_raccourci` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`id`, `nom`, `code_raccourci`) VALUES
(1, 'Moins de 12 ans', 'M12');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero_tel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `nom`, `prenom`, `email`, `numero_tel`) VALUES
(1, 'kone', 'Largaton', 'lar@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `educateur`
--

DROP TABLE IF EXISTS `educateur`;
CREATE TABLE IF NOT EXISTS `educateur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `est_administrateur` tinyint(1) NOT NULL,
  `mot_de_passe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_763C0122E7927C74` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `licencie`
--

DROP TABLE IF EXISTS `licencie`;
CREATE TABLE IF NOT EXISTS `licencie` (
  `id` int NOT NULL AUTO_INCREMENT,
  `numero_licence` int NOT NULL,
  `categorie_id` int DEFAULT NULL,
  `contact_id` int DEFAULT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_3B755612BCF5E72D` (`categorie_id`),
  KEY `IDX_3B755612E7A1254A` (`contact_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `licencie`
--

INSERT INTO `licencie` (`id`, `numero_licence`, `categorie_id`, `contact_id`, `nom`, `prenom`) VALUES
(1, 12345, 1, 1, 'KONE', 'Largaton');

-- --------------------------------------------------------

--
-- Table structure for table `mail_contact`
--

DROP TABLE IF EXISTS `mail_contact`;
CREATE TABLE IF NOT EXISTS `mail_contact` (
  `id` int NOT NULL AUTO_INCREMENT,
  `expediteur_id` int NOT NULL,
  `date_envoi` datetime NOT NULL,
  `objet` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_96DF675710335F61` (`expediteur_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mail_educateur`
--

DROP TABLE IF EXISTS `mail_educateur`;
CREATE TABLE IF NOT EXISTS `mail_educateur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `expediteur_id` int DEFAULT NULL,
  `date_envoi` datetime NOT NULL,
  `objet` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_EE61F4110335F61` (`expediteur_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mail_educateur_contact`
--

DROP TABLE IF EXISTS `mail_educateur_contact`;
CREATE TABLE IF NOT EXISTS `mail_educateur_contact` (
  `mail_contact_id` int NOT NULL,
  `contact_id` int NOT NULL,
  PRIMARY KEY (`mail_contact_id`,`contact_id`),
  KEY `IDX_33A66FEF3362CFB6` (`mail_contact_id`),
  KEY `IDX_33A66FEFE7A1254A` (`contact_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mail_educateur_educateur`
--

DROP TABLE IF EXISTS `mail_educateur_educateur`;
CREATE TABLE IF NOT EXISTS `mail_educateur_educateur` (
  `mail_educateur_id` int NOT NULL,
  `educateur_id` int NOT NULL,
  PRIMARY KEY (`mail_educateur_id`,`educateur_id`),
  KEY `IDX_2C2116BA932A6B1A` (`mail_educateur_id`),
  KEY `IDX_2C2116BA6BFC1A0E` (`educateur_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messenger_messages`
--

DROP TABLE IF EXISTS `messenger_messages`;
CREATE TABLE IF NOT EXISTS `messenger_messages` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `available_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `delivered_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`id`),
  KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  KEY `IDX_75EA56E016BA31DB` (`delivered_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `licencie`
--
ALTER TABLE `licencie`
  ADD CONSTRAINT `FK_3B755612BCF5E72D` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`id`),
  ADD CONSTRAINT `FK_3B755612E7A1254A` FOREIGN KEY (`contact_id`) REFERENCES `contact` (`id`);

--
-- Constraints for table `mail_contact`
--
ALTER TABLE `mail_contact`
  ADD CONSTRAINT `FK_96DF675710335F61` FOREIGN KEY (`expediteur_id`) REFERENCES `educateur` (`id`);

--
-- Constraints for table `mail_educateur`
--
ALTER TABLE `mail_educateur`
  ADD CONSTRAINT `FK_EE61F4110335F61` FOREIGN KEY (`expediteur_id`) REFERENCES `educateur` (`id`);

--
-- Constraints for table `mail_educateur_contact`
--
ALTER TABLE `mail_educateur_contact`
  ADD CONSTRAINT `FK_33A66FEF3362CFB6` FOREIGN KEY (`mail_contact_id`) REFERENCES `mail_contact` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_33A66FEFE7A1254A` FOREIGN KEY (`contact_id`) REFERENCES `contact` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `mail_educateur_educateur`
--
ALTER TABLE `mail_educateur_educateur`
  ADD CONSTRAINT `FK_2C2116BA6BFC1A0E` FOREIGN KEY (`educateur_id`) REFERENCES `educateur` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_2C2116BA932A6B1A` FOREIGN KEY (`mail_educateur_id`) REFERENCES `mail_educateur` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
