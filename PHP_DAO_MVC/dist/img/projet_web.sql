-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 30 mai 2022 à 14:15
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet_web`
--

-- --------------------------------------------------------

--
-- Structure de la table `absence`
--

CREATE TABLE `absence` (
  `CodeABS` int(11) NOT NULL,
  `HeureABS` varchar(50) NOT NULL,
  `CodeCA` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `annee_scolaire`
--

CREATE TABLE `annee_scolaire` (
  `CodeAnneeSc` varchar(50) NOT NULL,
  `LibelleAnneeSc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `appartenir`
--

CREATE TABLE `appartenir` (
  `CodeET` varchar(50) NOT NULL,
  `CodeCLS` varchar(50) NOT NULL,
  `CodeAnneeSc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `bulletin`
--

CREATE TABLE `bulletin` (
  `CodeBLT` varchar(50) NOT NULL,
  `LibelleBLT` varchar(50) NOT NULL,
  `CodeET` varchar(50) NOT NULL,
  `CodeDE` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `cahier_appel`
--

CREATE TABLE `cahier_appel` (
  `CodeCA` varchar(50) NOT NULL,
  `LibelleCA` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `cahier_texte`
--

CREATE TABLE `cahier_texte` (
  `CodeCT` varchar(50) NOT NULL,
  `LibelleCT` varchar(50) NOT NULL,
  `CodeDE` varchar(50) NOT NULL,
  `CodeDGE` varchar(50) NOT NULL,
  `CodeINSP` varchar(50) NOT NULL,
  `CodeCLS` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

CREATE TABLE `classe` (
  `CodeCLS` varchar(50) NOT NULL,
  `LibelleCLS` varchar(50) NOT NULL,
  `NombreElvCLS` int(11) NOT NULL,
  `CodeFil` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `corriger`
--

CREATE TABLE `corriger` (
  `CodeProf` varchar(50) NOT NULL,
  `CodeRPT` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `cycle`
--

CREATE TABLE `cycle` (
  `CodeCy` int(11) NOT NULL,
  `LibelleCy` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `diplome`
--

CREATE TABLE `diplome` (
  `CodeDPLM` varchar(50) NOT NULL,
  `LibelleDPLM` varchar(50) NOT NULL,
  `Statut` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `directeur_ecole`
--

CREATE TABLE `directeur_ecole` (
  `CodeDGE` varchar(50) NOT NULL,
  `NomDGE` varchar(50) NOT NULL,
  `PrenomDGE` varchar(50) NOT NULL,
  `TelDGE` varchar(50) NOT NULL,
  `EmailDGE` varchar(50) NOT NULL,
  `LoginDGE` varchar(50) NOT NULL,
  `PswdDGE` varchar(50) NOT NULL,
  `CodeEcole` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `directeur_etude`
--

CREATE TABLE `directeur_etude` (
  `CodeDE` varchar(50) NOT NULL,
  `NomDE` varchar(50) NOT NULL,
  `PrenomDE` varchar(50) NOT NULL,
  `TelDE` varchar(50) NOT NULL,
  `EmailDE` varchar(50) NOT NULL,
  `LoginDE` varchar(50) NOT NULL,
  `PswdDE` varchar(50) NOT NULL,
  `CodeCy` int(11) NOT NULL,
  `CodeFil` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `diriger`
--

CREATE TABLE `diriger` (
  `CodeDE` varchar(50) NOT NULL,
  `CodeFIl` varchar(50) NOT NULL,
  `CodeCY` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `donner`
--

CREATE TABLE `donner` (
  `CodeET` varchar(50) NOT NULL,
  `CodeProf` varchar(50) NOT NULL,
  `CodeABS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `ecole`
--

CREATE TABLE `ecole` (
  `CodeEcole` int(11) NOT NULL,
  `LibelleEcole` varchar(50) NOT NULL,
  `LocEcole` varchar(50) NOT NULL,
  `CodeDGE` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `enseigner`
--

CREATE TABLE `enseigner` (
  `CodeProf` varchar(50) NOT NULL,
  `CodeMAT` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `CodeET` varchar(50) NOT NULL,
  `MatriculeET` varchar(50) NOT NULL,
  `PswdET` varchar(50) NOT NULL,
  `NomET` varchar(50) NOT NULL,
  `PrenomET` varchar(50) NOT NULL,
  `Photo` varchar(50) NOT NULL,
  `NumeroParent` varchar(20) NOT NULL,
  `NumeroTuteur` varchar(20) NOT NULL,
  `EmailET` varchar(50) NOT NULL,
  `LoginET` varchar(50) NOT NULL,
  `CodeCLS` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `faire`
--

CREATE TABLE `faire` (
  `CodeET` varchar(50) NOT NULL,
  `CodeSTN` varchar(50) NOT NULL,
  `CodeRPT` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `filiere`
--

CREATE TABLE `filiere` (
  `CodeFil` varchar(50) NOT NULL,
  `LibelleFil` varchar(50) NOT NULL,
  `CodeEcole` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `inspecter`
--

CREATE TABLE `inspecter` (
  `CodeINSP` varchar(50) NOT NULL,
  `CodeCLS` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `inspecteur`
--

CREATE TABLE `inspecteur` (
  `CodeINSP` varchar(50) NOT NULL,
  `NomINSP` varchar(50) NOT NULL,
  `PrenomINSP` varchar(50) NOT NULL,
  `TelINSP` varchar(50) NOT NULL,
  `EmailINSP` varchar(50) NOT NULL,
  `LoginInsp` varchar(50) NOT NULL,
  `PswdINSP` varchar(50) NOT NULL,
  `CodeFil` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `matiere`
--

CREATE TABLE `matiere` (
  `CodeMAT` int(11) NOT NULL,
  `LibelleMAT` varchar(50) NOT NULL,
  `CoeffMAT` float NOT NULL,
  `VolumeMAT` varchar(50) NOT NULL,
  `CodeUE` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

CREATE TABLE `note` (
  `CodeNTE` varchar(50) NOT NULL,
  `DescriptionNTE` varchar(50) NOT NULL,
  `CoefficientNTE` float NOT NULL,
  `CodeSMTRE` varchar(50) NOT NULL,
  `CodeET` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `octroyer`
--

CREATE TABLE `octroyer` (
  `CodeET` varchar(50) NOT NULL,
  `CodeDPLM` varchar(50) NOT NULL,
  `CodeEcole` int(11) NOT NULL,
  `DateDPLM` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `professeur`
--

CREATE TABLE `professeur` (
  `CodeProf` varchar(50) NOT NULL,
  `NomProf` varchar(50) NOT NULL,
  `PrenomProf` varchar(50) NOT NULL,
  `TelProf` varchar(50) NOT NULL,
  `EmailProf` varchar(50) NOT NULL,
  `LoginProf` varchar(50) NOT NULL,
  `PswdProf` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `projet`
--

CREATE TABLE `projet` (
  `CodeSTN` varchar(50) NOT NULL,
  `LibelleSTN` varchar(50) NOT NULL,
  `CoeffSTN` float NOT NULL,
  `NoteSTN` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `rapport`
--

CREATE TABLE `rapport` (
  `CodeRPT` varchar(50) NOT NULL,
  `DescriptionRPT` varchar(50) NOT NULL,
  `TypeRT` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `seance`
--

CREATE TABLE `seance` (
  `CodeSC` int(11) NOT NULL,
  `VolumeSC` varchar(50) NOT NULL,
  `TypeSC` varchar(50) NOT NULL,
  `PieceJointeSC` varchar(50) NOT NULL,
  `DetailSC` text NOT NULL,
  `CodeCT` varchar(50) NOT NULL,
  `CodeMAT` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `semestre`
--

CREATE TABLE `semestre` (
  `CodeSMTRE` varchar(50) NOT NULL,
  `LibelleSMTRE` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `suivre`
--

CREATE TABLE `suivre` (
  `CodeET` varchar(50) NOT NULL,
  `CodeSC` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `ue`
--

CREATE TABLE `ue` (
  `CodeUE` varchar(50) NOT NULL,
  `DescriptionUE` varchar(50) NOT NULL,
  `CoeffUE` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `absence`
--
ALTER TABLE `absence`
  ADD PRIMARY KEY (`CodeABS`),
  ADD KEY `CodeCA` (`CodeCA`);

--
-- Index pour la table `annee_scolaire`
--
ALTER TABLE `annee_scolaire`
  ADD PRIMARY KEY (`CodeAnneeSc`);

--
-- Index pour la table `appartenir`
--
ALTER TABLE `appartenir`
  ADD KEY `CodeET` (`CodeET`),
  ADD KEY `CodeCLS` (`CodeCLS`),
  ADD KEY `CodeAnneeSc` (`CodeAnneeSc`);

--
-- Index pour la table `bulletin`
--
ALTER TABLE `bulletin`
  ADD PRIMARY KEY (`CodeBLT`),
  ADD KEY `CodeET` (`CodeET`),
  ADD KEY `CodeDE` (`CodeDE`);

--
-- Index pour la table `cahier_appel`
--
ALTER TABLE `cahier_appel`
  ADD PRIMARY KEY (`CodeCA`);

--
-- Index pour la table `cahier_texte`
--
ALTER TABLE `cahier_texte`
  ADD PRIMARY KEY (`CodeCT`),
  ADD KEY `CodeDE` (`CodeDE`),
  ADD KEY `CodeDGE` (`CodeDGE`),
  ADD KEY `CodeINSP` (`CodeINSP`),
  ADD KEY `CodeCLS` (`CodeCLS`);

--
-- Index pour la table `classe`
--
ALTER TABLE `classe`
  ADD PRIMARY KEY (`CodeCLS`),
  ADD KEY `CodeFil` (`CodeFil`);

--
-- Index pour la table `corriger`
--
ALTER TABLE `corriger`
  ADD PRIMARY KEY (`CodeProf`,`CodeRPT`),
  ADD KEY `CodeRPT` (`CodeRPT`);

--
-- Index pour la table `cycle`
--
ALTER TABLE `cycle`
  ADD PRIMARY KEY (`CodeCy`);

--
-- Index pour la table `diplome`
--
ALTER TABLE `diplome`
  ADD PRIMARY KEY (`CodeDPLM`);

--
-- Index pour la table `directeur_ecole`
--
ALTER TABLE `directeur_ecole`
  ADD PRIMARY KEY (`CodeDGE`),
  ADD KEY `CodeEcole` (`CodeEcole`);

--
-- Index pour la table `directeur_etude`
--
ALTER TABLE `directeur_etude`
  ADD PRIMARY KEY (`CodeDE`),
  ADD KEY `CodeCy` (`CodeCy`),
  ADD KEY `CodeFil` (`CodeFil`);

--
-- Index pour la table `diriger`
--
ALTER TABLE `diriger`
  ADD KEY `CodeDE` (`CodeDE`),
  ADD KEY `CodeFIl` (`CodeFIl`),
  ADD KEY `CodeCY` (`CodeCY`);

--
-- Index pour la table `donner`
--
ALTER TABLE `donner`
  ADD KEY `CodeABS` (`CodeABS`),
  ADD KEY `CodeET` (`CodeET`),
  ADD KEY `CodeProf` (`CodeProf`);

--
-- Index pour la table `ecole`
--
ALTER TABLE `ecole`
  ADD PRIMARY KEY (`CodeEcole`),
  ADD KEY `CodeDGE` (`CodeDGE`);

--
-- Index pour la table `enseigner`
--
ALTER TABLE `enseigner`
  ADD KEY `CodeProf` (`CodeProf`),
  ADD KEY `CodeMAT` (`CodeMAT`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`CodeET`),
  ADD KEY `CodeCLS` (`CodeCLS`);

--
-- Index pour la table `faire`
--
ALTER TABLE `faire`
  ADD PRIMARY KEY (`CodeET`,`CodeSTN`,`CodeRPT`),
  ADD KEY `CodeRPT` (`CodeRPT`),
  ADD KEY `CodeSTN` (`CodeSTN`);

--
-- Index pour la table `filiere`
--
ALTER TABLE `filiere`
  ADD PRIMARY KEY (`CodeFil`),
  ADD KEY `CodeEcole` (`CodeEcole`);

--
-- Index pour la table `inspecter`
--
ALTER TABLE `inspecter`
  ADD KEY `CodeINSP` (`CodeINSP`),
  ADD KEY `CodeCLS` (`CodeCLS`);

--
-- Index pour la table `inspecteur`
--
ALTER TABLE `inspecteur`
  ADD PRIMARY KEY (`CodeINSP`),
  ADD KEY `CodeFil` (`CodeFil`);

--
-- Index pour la table `matiere`
--
ALTER TABLE `matiere`
  ADD PRIMARY KEY (`CodeMAT`),
  ADD KEY `CodeUE` (`CodeUE`);

--
-- Index pour la table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`CodeNTE`),
  ADD KEY `CodeSMTRE` (`CodeSMTRE`),
  ADD KEY `CodeET` (`CodeET`);

--
-- Index pour la table `octroyer`
--
ALTER TABLE `octroyer`
  ADD KEY `CodeET` (`CodeET`),
  ADD KEY `CodeDPLM` (`CodeDPLM`),
  ADD KEY `CodeEcole` (`CodeEcole`);

--
-- Index pour la table `professeur`
--
ALTER TABLE `professeur`
  ADD PRIMARY KEY (`CodeProf`);

--
-- Index pour la table `projet`
--
ALTER TABLE `projet`
  ADD PRIMARY KEY (`CodeSTN`);

--
-- Index pour la table `rapport`
--
ALTER TABLE `rapport`
  ADD PRIMARY KEY (`CodeRPT`);

--
-- Index pour la table `seance`
--
ALTER TABLE `seance`
  ADD PRIMARY KEY (`CodeSC`),
  ADD KEY `CodeCT` (`CodeCT`),
  ADD KEY `CodeMAT` (`CodeMAT`);

--
-- Index pour la table `semestre`
--
ALTER TABLE `semestre`
  ADD PRIMARY KEY (`CodeSMTRE`);

--
-- Index pour la table `suivre`
--
ALTER TABLE `suivre`
  ADD KEY `CodeET` (`CodeET`),
  ADD KEY `CodeSC` (`CodeSC`);

--
-- Index pour la table `ue`
--
ALTER TABLE `ue`
  ADD PRIMARY KEY (`CodeUE`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `absence`
--
ALTER TABLE `absence`
  MODIFY `CodeABS` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `absence`
--
ALTER TABLE `absence`
  ADD CONSTRAINT `absence_ibfk_1` FOREIGN KEY (`CodeCA`) REFERENCES `cahier_appel` (`CodeCA`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `appartenir`
--
ALTER TABLE `appartenir`
  ADD CONSTRAINT `appartenir_ibfk_1` FOREIGN KEY (`CodeET`) REFERENCES `etudiant` (`CodeET`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appartenir_ibfk_2` FOREIGN KEY (`CodeCLS`) REFERENCES `classe` (`CodeCLS`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appartenir_ibfk_3` FOREIGN KEY (`CodeAnneeSc`) REFERENCES `annee_scolaire` (`CodeAnneeSc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `bulletin`
--
ALTER TABLE `bulletin`
  ADD CONSTRAINT `bulletin_ibfk_1` FOREIGN KEY (`CodeET`) REFERENCES `etudiant` (`CodeET`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bulletin_ibfk_2` FOREIGN KEY (`CodeDE`) REFERENCES `directeur_etude` (`CodeDE`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `cahier_texte`
--
ALTER TABLE `cahier_texte`
  ADD CONSTRAINT `cahier_texte_ibfk_1` FOREIGN KEY (`CodeDE`) REFERENCES `directeur_etude` (`CodeDE`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cahier_texte_ibfk_2` FOREIGN KEY (`CodeDGE`) REFERENCES `directeur_ecole` (`CodeDGE`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cahier_texte_ibfk_3` FOREIGN KEY (`CodeINSP`) REFERENCES `inspecteur` (`CodeINSP`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cahier_texte_ibfk_4` FOREIGN KEY (`CodeCLS`) REFERENCES `classe` (`CodeCLS`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `classe`
--
ALTER TABLE `classe`
  ADD CONSTRAINT `classe_ibfk_1` FOREIGN KEY (`CodeFil`) REFERENCES `filiere` (`CodeFil`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `corriger`
--
ALTER TABLE `corriger`
  ADD CONSTRAINT `corriger_ibfk_1` FOREIGN KEY (`CodeProf`) REFERENCES `professeur` (`CodeProf`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `corriger_ibfk_2` FOREIGN KEY (`CodeRPT`) REFERENCES `rapport` (`CodeRPT`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `directeur_ecole`
--
ALTER TABLE `directeur_ecole`
  ADD CONSTRAINT `directeur_ecole_ibfk_1` FOREIGN KEY (`CodeEcole`) REFERENCES `ecole` (`CodeEcole`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `directeur_etude`
--
ALTER TABLE `directeur_etude`
  ADD CONSTRAINT `directeur_etude_ibfk_1` FOREIGN KEY (`CodeCy`) REFERENCES `cycle` (`CodeCy`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `directeur_etude_ibfk_2` FOREIGN KEY (`CodeFil`) REFERENCES `filiere` (`CodeFil`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `diriger`
--
ALTER TABLE `diriger`
  ADD CONSTRAINT `diriger_ibfk_1` FOREIGN KEY (`CodeDE`) REFERENCES `directeur_etude` (`CodeDE`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `diriger_ibfk_2` FOREIGN KEY (`CodeFIl`) REFERENCES `filiere` (`CodeFil`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `diriger_ibfk_3` FOREIGN KEY (`CodeCY`) REFERENCES `cycle` (`CodeCy`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `donner`
--
ALTER TABLE `donner`
  ADD CONSTRAINT `donner_ibfk_1` FOREIGN KEY (`CodeABS`) REFERENCES `absence` (`CodeABS`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `donner_ibfk_2` FOREIGN KEY (`CodeET`) REFERENCES `etudiant` (`CodeET`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `donner_ibfk_3` FOREIGN KEY (`CodeProf`) REFERENCES `professeur` (`CodeProf`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `ecole`
--
ALTER TABLE `ecole`
  ADD CONSTRAINT `ecole_ibfk_1` FOREIGN KEY (`CodeDGE`) REFERENCES `directeur_ecole` (`CodeDGE`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `enseigner`
--
ALTER TABLE `enseigner`
  ADD CONSTRAINT `enseigner_ibfk_1` FOREIGN KEY (`CodeProf`) REFERENCES `professeur` (`CodeProf`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `enseigner_ibfk_2` FOREIGN KEY (`CodeMAT`) REFERENCES `matiere` (`CodeMAT`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD CONSTRAINT `etudiant_ibfk_1` FOREIGN KEY (`CodeCLS`) REFERENCES `classe` (`CodeCLS`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `faire`
--
ALTER TABLE `faire`
  ADD CONSTRAINT `faire_ibfk_1` FOREIGN KEY (`CodeET`) REFERENCES `etudiant` (`CodeET`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `faire_ibfk_2` FOREIGN KEY (`CodeRPT`) REFERENCES `rapport` (`CodeRPT`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `faire_ibfk_3` FOREIGN KEY (`CodeSTN`) REFERENCES `projet` (`CodeSTN`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `filiere`
--
ALTER TABLE `filiere`
  ADD CONSTRAINT `filiere_ibfk_1` FOREIGN KEY (`CodeEcole`) REFERENCES `ecole` (`CodeEcole`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `inspecter`
--
ALTER TABLE `inspecter`
  ADD CONSTRAINT `inspecter_ibfk_1` FOREIGN KEY (`CodeINSP`) REFERENCES `inspecteur` (`CodeINSP`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inspecter_ibfk_2` FOREIGN KEY (`CodeCLS`) REFERENCES `classe` (`CodeCLS`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `inspecteur`
--
ALTER TABLE `inspecteur`
  ADD CONSTRAINT `inspecteur_ibfk_1` FOREIGN KEY (`CodeFil`) REFERENCES `filiere` (`CodeFil`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `matiere`
--
ALTER TABLE `matiere`
  ADD CONSTRAINT `matiere_ibfk_1` FOREIGN KEY (`CodeUE`) REFERENCES `ue` (`CodeUE`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `note`
--
ALTER TABLE `note`
  ADD CONSTRAINT `note_ibfk_1` FOREIGN KEY (`CodeSMTRE`) REFERENCES `semestre` (`CodeSMTRE`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `note_ibfk_2` FOREIGN KEY (`CodeET`) REFERENCES `etudiant` (`CodeET`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `octroyer`
--
ALTER TABLE `octroyer`
  ADD CONSTRAINT `octroyer_ibfk_1` FOREIGN KEY (`CodeET`) REFERENCES `etudiant` (`CodeET`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `octroyer_ibfk_2` FOREIGN KEY (`CodeDPLM`) REFERENCES `diplome` (`CodeDPLM`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `octroyer_ibfk_3` FOREIGN KEY (`CodeEcole`) REFERENCES `ecole` (`CodeEcole`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `seance`
--
ALTER TABLE `seance`
  ADD CONSTRAINT `seance_ibfk_1` FOREIGN KEY (`CodeCT`) REFERENCES `cahier_texte` (`CodeCT`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `seance_ibfk_2` FOREIGN KEY (`CodeMAT`) REFERENCES `matiere` (`CodeMAT`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `suivre`
--
ALTER TABLE `suivre`
  ADD CONSTRAINT `suivre_ibfk_1` FOREIGN KEY (`CodeET`) REFERENCES `etudiant` (`CodeET`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `suivre_ibfk_2` FOREIGN KEY (`CodeSC`) REFERENCES `seance` (`CodeSC`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
