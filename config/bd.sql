-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 25 déc. 2023 à 11:59
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
-- Base de données : `bd`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `categorie_id` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `code_raccourci` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`categorie_id`, `nom`, `code_raccourci`) VALUES
(1, 'Moins de 12 ans', 'M12'),
(2, 'Moins de 18 ans', 'M18');

-- --------------------------------------------------------

--
-- Structure de la table `contacts`
--

CREATE TABLE `contacts` (
  `contact_id` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `tel` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `contacts`
--

INSERT INTO `contacts` (`contact_id`, `nom`, `prenom`, `email`, `tel`) VALUES
(1, 'BOUCHRA', 'Salma', 'salma@test.com', '123456789'),
(2, 'KONE', 'Cyril', 'cyril@test.com', '987654321');

-- --------------------------------------------------------

--
-- Structure de la table `educateurs`
--

CREATE TABLE `educateurs` (
  `educateur_id` int(11) NOT NULL,
  `numero_licence` varchar(20) DEFAULT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `contact_id` int(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `est_administrateur` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `educateurs`
--

INSERT INTO `educateurs` (`educateur_id`, `numero_licence`, `nom`, `prenom`, `contact_id`, `email`, `password`, `est_administrateur`) VALUES
(1, 'EDU001', 'Garcia', 'Pierre', 1, 'pierre@example.com', 'motdepasse123', 1),
(2, 'EDU002', 'Leroy', 'Emma', 2, 'emma@example.com', 'test123', 0);

-- --------------------------------------------------------

--
-- Structure de la table `licencies`
--

CREATE TABLE `licencies` (
  `licencie_id` int(11) NOT NULL,
  `numero_licence` varchar(20) DEFAULT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `contact_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `licencies`
--

INSERT INTO `licencies` (`licencie_id`, `numero_licence`, `nom`, `prenom`, `contact_id`) VALUES
(1, 'LIC001', 'Dupont', 'Jean', 1),
(2, 'LIC002', 'Martin', 'Sophie', 2);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categorie_id`);

--
-- Index pour la table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`contact_id`);

--
-- Index pour la table `educateurs`
--
ALTER TABLE `educateurs`
  ADD PRIMARY KEY (`educateur_id`),
  ADD UNIQUE KEY `numero_licence` (`numero_licence`),
  ADD KEY `contact_id` (`contact_id`);

--
-- Index pour la table `licencies`
--
ALTER TABLE `licencies`
  ADD PRIMARY KEY (`licencie_id`),
  ADD UNIQUE KEY `numero_licence` (`numero_licence`),
  ADD KEY `contact_id` (`contact_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `categorie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `educateurs`
--
ALTER TABLE `educateurs`
  MODIFY `educateur_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `licencies`
--
ALTER TABLE `licencies`
  MODIFY `licencie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `educateurs`
--
ALTER TABLE `educateurs`
  ADD CONSTRAINT `educateurs_ibfk_1` FOREIGN KEY (`contact_id`) REFERENCES `contacts` (`contact_id`);

--
-- Contraintes pour la table `licencies`
--
ALTER TABLE `licencies`
  ADD CONSTRAINT `licencies_ibfk_1` FOREIGN KEY (`contact_id`) REFERENCES `contacts` (`contact_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
