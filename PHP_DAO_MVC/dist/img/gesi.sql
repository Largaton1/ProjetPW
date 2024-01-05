-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 30 mai 2022 à 20:23
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gesi`
--

-- --------------------------------------------------------

--
-- Structure de la table `absence`
--

DROP TABLE IF EXISTS `absence`;
CREATE TABLE IF NOT EXISTS `absence` (
  `CodeAbs` int(20) NOT NULL AUTO_INCREMENT,
  `HeureAbs` varchar(30) NOT NULL,
  PRIMARY KEY (`CodeAbs`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `annee scolaire`
--

DROP TABLE IF EXISTS `annee scolaire`;
CREATE TABLE IF NOT EXISTS `annee scolaire` (
  `Code AnSc` int(20) NOT NULL AUTO_INCREMENT,
  `LibelleAnSc` varchar(15) NOT NULL,
  PRIMARY KEY (`Code AnSc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `appartenir`
--

DROP TABLE IF EXISTS `appartenir`;
CREATE TABLE IF NOT EXISTS `appartenir` (
  `CodeET` int(20) NOT NULL,
  `CodeCLS` int(20) NOT NULL,
  `CodeAnSc` int(20) NOT NULL,
  KEY `CodeET` (`CodeET`,`CodeCLS`,`CodeAnSc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `bulletin`
--

DROP TABLE IF EXISTS `bulletin`;
CREATE TABLE IF NOT EXISTS `bulletin` (
  `CodeBLT` int(20) NOT NULL AUTO_INCREMENT,
  `LibelleBLT` varchar(20) NOT NULL,
  `CodeDe` int(20) NOT NULL,
  `CodeET` int(20) NOT NULL,
  PRIMARY KEY (`CodeBLT`),
  KEY `CodeDe` (`CodeDe`,`CodeET`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `cahier d'appel`
--

DROP TABLE IF EXISTS `cahier d'appel`;
CREATE TABLE IF NOT EXISTS `cahier d'appel` (
  `CodeCA` int(20) NOT NULL AUTO_INCREMENT,
  `LibelleCA` varchar(15) NOT NULL,
  PRIMARY KEY (`CodeCA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `cahier_texte`
--

DROP TABLE IF EXISTS `cahier_texte`;
CREATE TABLE IF NOT EXISTS `cahier_texte` (
  `CodeCT` int(20) NOT NULL AUTO_INCREMENT,
  `LibelleCT` varchar(15) NOT NULL,
  `CodeDe` int(20) NOT NULL,
  `CodeDGE` int(20) NOT NULL,
  `CodeCLS` int(20) NOT NULL,
  `CodeInsp` int(20) NOT NULL,
  PRIMARY KEY (`CodeCT`),
  KEY `CodeDe` (`CodeDe`,`CodeDGE`,`CodeCLS`,`CodeInsp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

DROP TABLE IF EXISTS `classe`;
CREATE TABLE IF NOT EXISTS `classe` (
  `CodeCLS` int(20) NOT NULL AUTO_INCREMENT,
  `LibelleCLS` varchar(30) NOT NULL,
  `NombreEleveCLS` varchar(50) NOT NULL,
  `CodeFIL` int(20) NOT NULL,
  PRIMARY KEY (`CodeCLS`),
  KEY `CodeFIL` (`CodeFIL`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `corriger`
--

DROP TABLE IF EXISTS `corriger`;
CREATE TABLE IF NOT EXISTS `corriger` (
  `CodeProf` int(20) NOT NULL,
  `CodeRPT` int(20) NOT NULL,
  KEY `CodeProf` (`CodeProf`,`CodeRPT`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `cycles`
--

DROP TABLE IF EXISTS `cycles`;
CREATE TABLE IF NOT EXISTS `cycles` (
  `CodeCY` int(20) NOT NULL AUTO_INCREMENT,
  `LibelleCY` varchar(15) NOT NULL,
  PRIMARY KEY (`CodeCY`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `de`
--

DROP TABLE IF EXISTS `de`;
CREATE TABLE IF NOT EXISTS `de` (
  `CodeDe` int(20) NOT NULL AUTO_INCREMENT,
  `NomDe` varchar(15) NOT NULL,
  `PrenomDe` varchar(15) NOT NULL,
  `TelDe` varchar(15) NOT NULL,
  `EmailDe` varchar(15) NOT NULL,
  `LoginDe` varchar(15) NOT NULL,
  `PaswdDe` varchar(15) NOT NULL,
  PRIMARY KEY (`CodeDe`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `dge`
--

DROP TABLE IF EXISTS `dge`;
CREATE TABLE IF NOT EXISTS `dge` (
  `CodeDGE` int(20) NOT NULL AUTO_INCREMENT,
  `NomDGE` varchar(15) NOT NULL,
  `PrenomDGE` varchar(15) NOT NULL,
  `TelDGE` varchar(15) NOT NULL,
  `EmailDGE` varchar(15) NOT NULL,
  `LoginDGE` varchar(15) NOT NULL,
  `PaswdDGE` varchar(15) NOT NULL,
  PRIMARY KEY (`CodeDGE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `diplome`
--

DROP TABLE IF EXISTS `diplome`;
CREATE TABLE IF NOT EXISTS `diplome` (
  `CodeDPLM` int(20) NOT NULL AUTO_INCREMENT,
  `LibelleDPLM` varchar(15) NOT NULL,
  `Statut` tinyint(1) NOT NULL,
  PRIMARY KEY (`CodeDPLM`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `diriger`
--

DROP TABLE IF EXISTS `diriger`;
CREATE TABLE IF NOT EXISTS `diriger` (
  `CodeDe` int(20) NOT NULL,
  `CodeFIL` int(20) NOT NULL,
  `CodeCY` int(20) NOT NULL,
  KEY `CodeDe` (`CodeDe`,`CodeFIL`,`CodeCY`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `donner`
--

DROP TABLE IF EXISTS `donner`;
CREATE TABLE IF NOT EXISTS `donner` (
  `CodeET` int(20) NOT NULL,
  `CodeProf` int(20) NOT NULL,
  `CodeAbs` int(20) NOT NULL,
  KEY `CodeET` (`CodeET`,`CodeProf`,`CodeAbs`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `ecole`
--

DROP TABLE IF EXISTS `ecole`;
CREATE TABLE IF NOT EXISTS `ecole` (
  `CodeEcole` int(20) NOT NULL AUTO_INCREMENT,
  `LibelleEcole` varchar(15) NOT NULL,
  `LocEcole` varchar(15) NOT NULL,
  `CodeDGE` int(20) NOT NULL,
  PRIMARY KEY (`CodeEcole`),
  KEY `CodeDGE` (`CodeDGE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `enseigner`
--

DROP TABLE IF EXISTS `enseigner`;
CREATE TABLE IF NOT EXISTS `enseigner` (
  `CodeProf` int(20) NOT NULL,
  `CodeMAT` int(20) NOT NULL,
  KEY `CodeProf` (`CodeProf`,`CodeMAT`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

DROP TABLE IF EXISTS `etudiant`;
CREATE TABLE IF NOT EXISTS `etudiant` (
  `CodeET` int(20) NOT NULL AUTO_INCREMENT,
  `MatriculeET` varchar(20) NOT NULL,
  `PaswdET` varchar(20) NOT NULL,
  `NomET` varchar(20) NOT NULL,
  `PrenomET` varchar(20) NOT NULL,
  `Photo` varchar(5) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `NumeroParent` varchar(15) NOT NULL,
  `NumeroTuteur` varchar(15) NOT NULL,
  `EmailET` varchar(20) NOT NULL,
  `LoginET` varchar(20) NOT NULL,
  PRIMARY KEY (`CodeET`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `faire`
--

DROP TABLE IF EXISTS `faire`;
CREATE TABLE IF NOT EXISTS `faire` (
  `CodeET` int(20) NOT NULL,
  `CodePRO` int(20) NOT NULL,
  `CodeRPT` int(20) NOT NULL,
  KEY `CodeET` (`CodeET`,`CodePRO`,`CodeRPT`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `filiere`
--

DROP TABLE IF EXISTS `filiere`;
CREATE TABLE IF NOT EXISTS `filiere` (
  `CodeFIL` int(20) NOT NULL AUTO_INCREMENT,
  `LibelleFIL` varchar(15) NOT NULL,
  `CodeEcole` int(20) NOT NULL,
  PRIMARY KEY (`CodeFIL`),
  KEY `CodeEcole` (`CodeEcole`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `inspecter`
--

DROP TABLE IF EXISTS `inspecter`;
CREATE TABLE IF NOT EXISTS `inspecter` (
  `CodeInsp` int(20) NOT NULL,
  `CodeCLS` int(20) NOT NULL,
  KEY `CodeInsp` (`CodeInsp`,`CodeCLS`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `inspecteur`
--

DROP TABLE IF EXISTS `inspecteur`;
CREATE TABLE IF NOT EXISTS `inspecteur` (
  `CodeInsp` int(20) NOT NULL AUTO_INCREMENT,
  `NomInsp` varchar(15) NOT NULL,
  `PrenomInsp` varchar(15) NOT NULL,
  `TelInsp` varchar(15) NOT NULL,
  `EmailInsp` varchar(15) NOT NULL,
  `LoginInsp` varchar(15) NOT NULL,
  `PaswdInsp` varchar(15) NOT NULL,
  PRIMARY KEY (`CodeInsp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `matiere`
--

DROP TABLE IF EXISTS `matiere`;
CREATE TABLE IF NOT EXISTS `matiere` (
  `CodeMAT` int(20) NOT NULL AUTO_INCREMENT,
  `LibelleMAT` varchar(15) NOT NULL,
  `CoeffMAT` varchar(15) NOT NULL,
  `VolumeMAT` varchar(15) NOT NULL,
  PRIMARY KEY (`CodeMAT`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

DROP TABLE IF EXISTS `note`;
CREATE TABLE IF NOT EXISTS `note` (
  `CodeNTE` int(20) NOT NULL AUTO_INCREMENT,
  `DescriptionNTE` varchar(25) NOT NULL,
  `CoefficientNTE` varchar(15) NOT NULL,
  `CodeSMSTRE` int(20) NOT NULL,
  `CodeET` int(20) NOT NULL,
  PRIMARY KEY (`CodeNTE`),
  KEY `CodeNTE` (`CodeNTE`,`CodeET`),
  KEY `CodeSMSTRE` (`CodeSMSTRE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `octroyer`
--

DROP TABLE IF EXISTS `octroyer`;
CREATE TABLE IF NOT EXISTS `octroyer` (
  `CodeET` int(20) NOT NULL,
  `CodeDPLM` int(20) NOT NULL,
  `CodeEcole` int(20) NOT NULL,
  `DateDPLM` date NOT NULL,
  KEY `CodeET` (`CodeET`,`CodeDPLM`,`CodeEcole`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `professeur`
--

DROP TABLE IF EXISTS `professeur`;
CREATE TABLE IF NOT EXISTS `professeur` (
  `CodeProf` int(20) NOT NULL AUTO_INCREMENT,
  `NomProf` varchar(20) NOT NULL,
  `PrenomProf` varchar(20) NOT NULL,
  `TelProf` varchar(20) NOT NULL,
  `EmailProf` varchar(15) NOT NULL,
  `LoginProf` varchar(10) NOT NULL,
  `PaswdProf` varchar(20) NOT NULL,
  PRIMARY KEY (`CodeProf`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `projet`
--

DROP TABLE IF EXISTS `projet`;
CREATE TABLE IF NOT EXISTS `projet` (
  `CodePRO` int(20) NOT NULL AUTO_INCREMENT,
  `LibellePRO` varchar(15) NOT NULL,
  `CoefficientPRO` varchar(15) NOT NULL,
  `NotePRO` varchar(20) NOT NULL,
  PRIMARY KEY (`CodePRO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `rapport`
--

DROP TABLE IF EXISTS `rapport`;
CREATE TABLE IF NOT EXISTS `rapport` (
  `CodeRPT` int(20) NOT NULL AUTO_INCREMENT,
  `DescrptionRPT` varchar(15) NOT NULL,
  `TypeRPT` varchar(15) NOT NULL,
  PRIMARY KEY (`CodeRPT`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `seance`
--

DROP TABLE IF EXISTS `seance`;
CREATE TABLE IF NOT EXISTS `seance` (
  `CodeSC` int(20) NOT NULL AUTO_INCREMENT,
  `VolumeSC` varchar(20) NOT NULL,
  `TypeSC` varchar(15) NOT NULL,
  `PieceJointeSC` varchar(15) NOT NULL,
  `DetailSC` varchar(15) NOT NULL,
  `CodeCT` int(20) NOT NULL,
  `CodeMAT` int(20) NOT NULL,
  PRIMARY KEY (`CodeSC`),
  KEY `CodeCT` (`CodeCT`,`CodeMAT`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `semestre`
--

DROP TABLE IF EXISTS `semestre`;
CREATE TABLE IF NOT EXISTS `semestre` (
  `CodeSMSTRE` int(20) NOT NULL AUTO_INCREMENT,
  `LibelleSMSTRE` varchar(20) NOT NULL,
  PRIMARY KEY (`CodeSMSTRE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `suivre`
--

DROP TABLE IF EXISTS `suivre`;
CREATE TABLE IF NOT EXISTS `suivre` (
  `CodeET` int(20) NOT NULL,
  KEY `CodeET` (`CodeET`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `ue`
--

DROP TABLE IF EXISTS `ue`;
CREATE TABLE IF NOT EXISTS `ue` (
  `CodeUE` int(20) NOT NULL AUTO_INCREMENT,
  `DescriptionUE` varchar(15) NOT NULL,
  `CoefficientUE` varchar(15) NOT NULL,
  PRIMARY KEY (`CodeUE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
