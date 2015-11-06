-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le : Dim 26 Janvier 2014 à 22:46
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--


--
-- Structure de la table `euro_previouswinners`
--

CREATE TABLE IF NOT EXISTS `euro_previouswinners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `year` int(11) NOT NULL,
  `winner` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

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
(13, 2008, 'Espagne');

-- --------------------------------------------------------

--
-- Structure de la table `euro_schedule`
--

CREATE TABLE IF NOT EXISTS `euro_schedule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `team1` varchar(50) NOT NULL,
  `team2` varchar(50) NOT NULL,
  `group` varchar(1) DEFAULT NULL,
  `team1result` int(11) DEFAULT NULL,
  `team2result` int(11) DEFAULT NULL,
  `overtime` tinyint(1) NOT NULL DEFAULT '0',
  `team1penalty` int(11) DEFAULT NULL,
  `team2penalty` int(11) DEFAULT NULL,
  `available` tinyint(1) NOT NULL DEFAULT '1',
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=65 ;

--

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
