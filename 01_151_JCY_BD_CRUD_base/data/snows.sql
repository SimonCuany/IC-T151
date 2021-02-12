-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 26 août 2020 à 06:31
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `snows`
--

-- --------------------------------------------------------

--
-- Structure de la table `snows`
--

DROP TABLE IF EXISTS `snows`;
CREATE TABLE IF NOT EXISTS `snows` (
  `idSnow` varchar(10) NOT NULL,
  `Marque` varchar(20) DEFAULT NULL,
  `Boots` varchar(20) DEFAULT NULL,
  `Type` varchar(20) DEFAULT NULL,
  `Disponibilite` int(4) DEFAULT NULL,
  PRIMARY KEY (`idSnow`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `snows`
--

INSERT INTO `snows` (`idSnow`, `Marque`, `Boots`, `Type`, `Disponibilite`) VALUES
('B126', 'Burton', 'Goofy', 'Alpin', 2),
('N766', 'Niedecker', 'Regular', 'Curved', 24),
('B249', 'Burton', 'Regular', 'Alpin', 11),
('R226', 'RipCurl', 'Goofy', 'Curved', 122),
('E461', 'Elan', 'Regular', 'Alpin', 33),
('A552', 'RipCurl', 'Goofy', 'Curved', 54);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
