-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le : Sam 19 Décembre 2015 à 23:29
-- Version du serveur: 5.5.16
-- Version de PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `eurobookmaker`
--

-- --------------------------------------------------------

--
-- Structure de la table `euro_bet`
--

CREATE TABLE IF NOT EXISTS `euro_bet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(500) NOT NULL,
  `match_id` int(11) NOT NULL,
  `win` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `euro_previouswinners`
--

CREATE TABLE IF NOT EXISTS `euro_previouswinners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `year` int(11) NOT NULL,
  `winner` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Contenu de la table `euro_previouswinners`
--

INSERT INTO `euro_previouswinners` (`id`, `year`, `winner`) VALUES
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
(13, 2008, 'Espagne'),
(14, 2012, 'Espagne');

-- --------------------------------------------------------

--
-- Structure de la table `euro_schedule`
--

CREATE TABLE IF NOT EXISTS `euro_schedule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `team1` int(11) NOT NULL,
  `team2` int(11) NOT NULL,
  `group` varchar(1) DEFAULT NULL,
  `team1result` int(11) DEFAULT NULL,
  `team2result` int(11) DEFAULT NULL,
  `overtime` tinyint(1) NOT NULL DEFAULT '0',
  `team1penalty` int(11) DEFAULT NULL,
  `team2penalty` int(11) DEFAULT NULL,
  `available` tinyint(1) NOT NULL DEFAULT '1',
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `team1` (`team1`),
  KEY `team2` (`team2`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=72 ;

--
-- Contenu de la table `euro_schedule`
--

INSERT INTO `euro_schedule` (`id`, `team1`, `team2`, `group`, `team1result`, `team2result`, `overtime`, `team1penalty`, `team2penalty`, `available`, `date`) VALUES
(1, 1, 2, 'A', NULL, NULL, 0, NULL, NULL, 1, '2016-06-10 21:00:00'),
(2, 3, 4, 'A', NULL, NULL, 0, NULL, NULL, 1, '2016-06-11 15:00:00'),
(3, 7, 8, 'B', NULL, NULL, 0, NULL, NULL, 1, '2016-06-11 18:00:00'),
(4, 5, 6, 'B', NULL, NULL, 0, NULL, NULL, 1, '2016-06-11 21:00:00'),
(5, 15, 16, 'D', NULL, NULL, 0, NULL, NULL, 1, '2016-06-12 15:00:00'),
(6, 11, 12, 'C', NULL, NULL, 0, NULL, NULL, 1, '2016-06-12 18:00:00'),
(7, 9, 10, 'C', NULL, NULL, 0, NULL, NULL, 1, '2016-06-12 21:00:00'),
(8, 13, 14, 'D', NULL, NULL, 0, NULL, NULL, 1, '2016-06-13 15:00:00'),
(9, 19, 20, 'E', NULL, NULL, 0, NULL, NULL, 1, '2016-06-13 18:00:00'),
(10, 17, 18, 'E', NULL, NULL, 0, NULL, NULL, 1, '2016-06-13 21:00:00'),
(11, 23, 24, 'F', NULL, NULL, 0, NULL, NULL, 1, '2016-06-14 18:00:00'),
(12, 21, 22, 'F', NULL, NULL, 0, NULL, NULL, 1, '2016-06-14 21:00:00'),
(13, 6, 8, 'B', NULL, NULL, 0, NULL, NULL, 1, '2016-06-15 15:00:00'),
(14, 2, 4, 'A', NULL, NULL, 0, NULL, NULL, 1, '2016-06-15 18:00:00'),
(15, 1, 3, 'A', NULL, NULL, 0, NULL, NULL, 1, '2016-06-15 21:00:00'),
(16, 5, 7, 'B', NULL, NULL, 0, NULL, NULL, 1, '2016-06-16 15:00:00'),
(17, 10, 12, 'C', NULL, NULL, 0, NULL, NULL, 1, '2016-06-16 18:00:00'),
(18, 9, 11, 'C', NULL, NULL, 0, NULL, NULL, 1, '2016-06-16 21:00:00'),
(19, 18, 20, 'E', NULL, NULL, 0, NULL, NULL, 1, '2016-06-17 15:00:00'),
(20, 14, 16, 'D', NULL, NULL, 0, NULL, NULL, 1, '2016-06-17 18:00:00'),
(21, 13, 15, 'D', NULL, NULL, 0, NULL, NULL, 1, '2016-06-17 21:00:00'),
(22, 17, 19, 'E', NULL, NULL, 0, NULL, NULL, 1, '2016-06-18 15:00:00'),
(23, 22, 24, 'F', NULL, NULL, 0, NULL, NULL, 1, '2016-06-18 18:00:00'),
(24, 21, 23, 'F', NULL, NULL, 0, NULL, NULL, 1, '2016-06-18 21:00:00'),
(25, 4, 1, 'A', NULL, NULL, 0, NULL, NULL, 1, '2016-06-19 21:00:00'),
(26, 2, 3, 'A', NULL, NULL, 0, NULL, NULL, 1, '2016-06-19 21:00:00'),
(27, 8, 5, 'B', NULL, NULL, 0, NULL, NULL, 1, '2016-06-20 21:00:00'),
(28, 6, 7, 'B', NULL, NULL, 0, NULL, NULL, 1, '2016-06-20 21:00:00'),
(29, 12, 9, 'C', NULL, NULL, 0, NULL, NULL, 1, '2016-06-21 18:00:00'),
(30, 10, 11, 'C', NULL, NULL, 0, NULL, NULL, 1, '2016-06-21 18:00:00'),
(31, 16, 13, 'D', NULL, NULL, 0, NULL, NULL, 1, '2016-06-21 21:00:00'),
(32, 14, 15, 'D', NULL, NULL, 0, NULL, NULL, 1, '2016-06-21 21:00:00'),
(33, 24, 21, 'F', NULL, NULL, 0, NULL, NULL, 1, '2016-06-22 18:00:00'),
(34, 22, 23, 'F', NULL, NULL, 0, NULL, NULL, 1, '2016-06-22 18:00:00'),
(35, 20, 17, 'E', NULL, NULL, 0, NULL, NULL, 1, '2016-06-22 21:00:00'),
(36, 18, 19, 'E', NULL, NULL, 0, NULL, NULL, 1, '2016-06-22 21:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `euro_team`
--

CREATE TABLE IF NOT EXISTS `euro_team` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `flag` varchar(500) NOT NULL,
  `successrate` varchar(5) NOT NULL,
  `group` varchar(1) NOT NULL,
  `previous` varchar(500) NOT NULL,
  `coach` varchar(500) NOT NULL,
  `points` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `euro_team`
--

INSERT INTO `euro_team` (`id`, `name`, `flag`, `successrate`, `group`, `previous`, `coach`, `points`) VALUES
(1, 'France', 'images/flags/france.png', '', 'A', '', 'Didier Deschamps', 0),
(2, 'Roumanie', 'images/flags/roumanie.png', '', 'A', '', '', 0),
(3, 'Albanie', 'images/flags/albanie.png', '', 'A', '', '', 0),
(4, 'Suisse', 'images/flags/suisse.png', '', 'A', '', '', 0),
(5, 'Angleterre', 'images/flags/angleterre.png', '', 'B', '', '', 0),
(6, 'Russie', 'images/flags/russie.png', '', 'B', '', '', 0),
(7, 'Pays de Galles', 'images/flags/pgalles.png', '', 'B', '', '', 0),
(8, 'Slovaquie', 'images/flags/slovaquie.png', '', 'B', '', '', 0),
(9, 'Allemagne', 'images/flags/allemagne.png', '', 'C', '', '', 0),
(10, 'Ukraine', 'images/flags/ukraine.png', '', 'C', '', '', 0),
(11, 'Pologne', 'images/flags/pologne.png', '', 'C', '', '', 0),
(12, 'Irlande du Nord', 'images/flags/irlnord.png', '', 'C', '', '', 0),
(13, 'Espagne', 'images/flags/espagne.png', '', 'D', '', '', 0),
(14, 'République Tchèque', 'images/flags/rtcheque.png', '', 'D', '', '', 0),
(15, 'Turquie', 'images/flags/turquie.png', '', 'D', '', '', 0),
(16, 'Croatie', 'images/flags/croatie.png', '', 'D', '', '', 0),
(17, 'Belgique', 'images/flags/belgique.png', '', 'E', '', '', 0),
(18, 'Italie', 'images/flags/italie.png', '', 'E', '', '', 0),
(19, 'République d''Irlande', 'images/flags/irlande.png', '', 'E', '', '', 0),
(20, 'Suède', 'images/flags/suede.png', '', 'E', '', '', 0),
(21, 'Portugal', 'images/flags/portugal.png', '', 'F', '', '', 0),
(22, 'Islande', 'images/flags/islande.png', '', 'F', '', '', 0),
(23, 'Autriche', 'images/flags/autriche.png', '', 'F', '', '', 0),
(24, 'Hongrie', 'images/flags/hongrie.png', '', 'F', '', '', 0);

-- --------------------------------------------------------

--
-- Structure de la table `euro_top`
--

CREATE TABLE IF NOT EXISTS `euro_top` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `team1` varchar(50) NOT NULL,
  `team2` varchar(50) CHARACTER SET utf16 NOT NULL,
  `team3` varchar(50) NOT NULL,
  `team4` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `euro_user`
--

CREATE TABLE IF NOT EXISTS `euro_user` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `isadmin` tinyint(1) NOT NULL,
  `points` int(11) NOT NULL,
  `team` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `euro_user`
--

INSERT INTO `euro_user` (`username`, `password`, `isadmin`, `points`, `team`) VALUES
('Grissouris', '21752033819b7b98bb69d8f582585655', 0, 0, 1),
('Laurene', '098f6bcd4621d373cade4e832627b4f6', 0, 0, 1),
('Martine', '2be067b0de372807dc5e88c44897279e', 1, 0, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
