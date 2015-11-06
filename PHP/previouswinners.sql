-- phpMyAdmin SQL Dump
-- version 4.1.9
-- http://www.phpmyadmin.net
--
-- Client :  mysql51-60.perso
-- Généré le :  Sam 19 Juillet 2014 à 01:33
-- Version du serveur :  5.1.73-1.1+squeeze+build0+1-log
-- Version de PHP :  5.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `assayahjoel`
--

-- --------------------------------------------------------

--
-- Structure de la table `previouswinners`
--

CREATE TABLE IF NOT EXISTS `previouswinners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `year` int(11) NOT NULL,
  `winner` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Contenu de la table `previouswinners`
--

INSERT INTO `previouswinners` (`id`, `year`, `winner`) VALUES
(1, 1960, 'Russie'),
(2, 1964, 'Espagne'),
(3, 1968, 'Italie'),
(4, 1972, 'Allemagne'),
(5, 1976, 'Rep Tchèque'),
(6, 1980, 'Allemagne'),
(7, 1984, 'France'),
(8, 1988, 'Pays-Bas'),
(9, 1992, 'Danemark'),
(10, 1996, 'Allemagne'),
(11, 2000, 'France'),
(12, 2004, 'Grèce'),
(13, 2008, 'Espagne');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
