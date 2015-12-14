-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Lun 14 Décembre 2015 à 19:41
-- Version du serveur: 5.5.46-0ubuntu0.14.04.2
-- Version de PHP: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `stadium_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=65 ;

--
-- Contenu de la table `euro_schedule`
--

INSERT INTO `euro_schedule` (`id`, `team1`, `team2`, `group`, `team1result`, `team2result`, `overtime`, `team1penalty`, `team2penalty`, `available`, `date`, `stadium_id`) VALUES
(1, 'Brésil', 'Croatie', 'A', 3, 1, 0, NULL, NULL, 0, '2014-06-12 22:00:00', 12),
(2, 'Mexique', 'Cameroun', 'A', 1, 0, 0, NULL, NULL, 0, '2014-06-13 18:00:00', 7),
(3, 'Espagne', 'Pays-Bas', 'B', 1, 5, 0, NULL, NULL, 0, '2014-06-13 21:00:00', 11),
(4, 'Chili', 'Australie', 'B', 3, 1, 0, NULL, NULL, 0, '2014-06-14 00:00:00', 3),
(5, 'Colombie', 'Grèce', 'C', 3, 0, 0, NULL, NULL, 0, '2014-06-14 18:00:00', 1),
(6, 'C. Ivoire', 'Japon', 'C', 2, 1, 0, NULL, NULL, 0, '2014-06-15 03:00:00', 9),
(7, 'Uruguay', 'C. Rica', 'D', 1, 3, 0, NULL, NULL, 0, '2014-06-14 21:00:00', 5),
(8, 'Angleterre', 'Italie', 'D', 1, 2, 0, NULL, NULL, 0, '2014-06-15 00:00:00', 6),
(9, 'Suisse', 'Equateur', 'E', 2, 1, 0, NULL, NULL, 0, '2014-06-15 18:00:00', 2),
(10, 'France', 'Honduras', 'E', 3, 0, 0, NULL, NULL, 0, '2014-06-15 21:00:00', 8),
(11, 'Argentine', 'Bosnie', 'F', 2, 1, 0, NULL, NULL, 0, '2014-06-16 00:00:00', 10),
(12, 'Iran', 'Nigeria', 'F', 0, 0, 0, NULL, NULL, 0, '2014-06-16 21:00:00', 4),
(13, 'Allemagne', 'Portugal', 'G', 4, 0, 0, NULL, NULL, 0, '2014-06-16 18:00:00', 11),
(14, 'Ghana', 'Etats-Unis', 'G', 1, 2, 0, NULL, NULL, 0, '2014-06-17 00:00:00', 7),
(15, 'Belgique', 'Algérie', 'H', 2, 1, 0, NULL, NULL, 0, '2014-06-17 18:00:00', 1),
(16, 'Russie', 'Corée', 'H', 1, 1, 0, NULL, NULL, 0, '2014-06-18 00:00:00', 3),
(17, 'Brésil', 'Mexique', 'A', 0, 0, 0, NULL, NULL, 0, '2014-06-17 21:00:00', 5),
(18, 'Cameroun', 'Croatie', 'A', 0, 4, 0, NULL, NULL, 0, '2014-06-19 00:00:00', 6),
(19, 'Australie', 'Pays-Bas', 'B', 2, 3, 0, NULL, NULL, 0, '2014-06-18 18:00:00', 8),
(20, 'Espagne', 'Chili', 'B', 0, 2, 0, NULL, NULL, 0, '2014-06-18 21:00:00', 10),
(21, 'Colombie', 'C. Ivoire', 'C', 2, 1, 0, NULL, NULL, 0, '2014-06-19 18:00:00', 2),
(22, 'Japon', 'Grèce', 'C', 0, 0, 0, NULL, NULL, 0, '2014-06-20 00:00:00', 7),
(23, 'Uruguay', 'Angleterre', 'D', 2, 1, 0, NULL, NULL, 0, '2014-06-19 21:00:00', 12),
(24, 'Italie', 'C. Rica', 'D', 0, 1, 0, NULL, NULL, 0, '2014-06-20 18:00:00', 9),
(25, 'Suisse', 'France', 'E', 2, 5, 0, NULL, NULL, 0, '2014-06-20 21:00:00', 11),
(26, 'Honduras', 'Equateur', 'E', 1, 2, 0, NULL, NULL, 0, '2014-06-21 00:00:00', 4),
(27, 'Argentine', 'Iran', 'F', 1, 0, 0, NULL, NULL, 0, '2014-06-21 18:00:00', 1),
(28, 'Nigeria', 'Bosnie', 'F', 1, 0, 0, NULL, NULL, 0, '2014-06-22 00:00:00', 3),
(29, 'Allemagne', 'Ghana', 'G', 2, 2, 0, NULL, NULL, 0, '2014-06-21 21:00:00', 5),
(30, 'Etats-Unis', 'Portugal', 'G', 2, 2, 0, NULL, NULL, 0, '2014-06-23 00:00:00', 6),
(31, 'Belgique', 'Russie', 'H', 1, 0, 0, NULL, NULL, 0, '2014-06-22 18:00:00', 10),
(32, 'Corée', 'Algérie', 'H', 2, 4, 0, NULL, NULL, 0, '2014-06-22 21:00:00', 8),
(33, 'Cameroun', 'Brésil', 'A', 1, 4, 0, NULL, NULL, 0, '2014-06-23 22:00:00', 2),
(34, 'Croatie', 'Mexique', 'A', 1, 3, 0, NULL, NULL, 0, '2014-06-23 22:00:00', 9),
(35, 'Australie', 'Espagne', 'B', 0, 3, 0, NULL, NULL, 0, '2014-06-23 18:00:00', 4),
(36, 'Pays-Bas', 'Chili', 'B', 2, 0, 0, NULL, NULL, 0, '2014-06-23 18:00:00', 12),
(37, 'Japon', 'Colombie', 'C', 1, 4, 0, NULL, NULL, 0, '2014-06-24 22:00:00', 3),
(38, 'Grèce', 'C. Ivoire', 'C', 2, 1, 0, NULL, NULL, 0, '2014-06-24 22:00:00', 5),
(39, 'C. Rica', 'Angleterre', 'D', 0, 0, 0, NULL, NULL, 0, '2014-06-24 18:00:00', 1),
(40, 'Italie', 'Uruguay', 'D', 0, 1, 0, NULL, NULL, 0, '2014-06-24 18:00:00', 7),
(41, 'Honduras', 'Suisse', 'E', 0, 3, 0, NULL, NULL, 0, '2014-06-25 22:00:00', 6),
(42, 'Equateur', 'France', 'E', 0, 0, 0, NULL, NULL, 0, '2014-06-25 22:00:00', 10),
(43, 'Bosnie', 'Iran', 'F', 3, 1, 0, NULL, NULL, 0, '2014-06-25 18:00:00', 11),
(44, 'Nigeria', 'Argentine', 'F', 2, 3, 0, NULL, NULL, 0, '2014-06-25 18:00:00', 8),
(45, 'Etats-Unis', 'Allemagne', 'G', 0, 1, 0, NULL, NULL, 0, '2014-06-26 18:00:00', 9),
(46, 'Portugal', 'Ghana', 'G', 2, 1, 0, NULL, NULL, 0, '2014-06-26 18:00:00', 2),
(47, 'Algérie', 'Russie', 'H', 1, 1, 0, NULL, NULL, 0, '2014-06-26 22:00:00', 4),
(48, 'Corée', 'Belgique', 'H', 0, 1, 0, NULL, NULL, 0, '2014-06-26 22:00:00', 12),
(49, 'Brésil', 'Chili', NULL, NULL, NULL, 0, NULL, NULL, 1, '2014-06-28 18:00:00', 1),
(50, 'Colombie', 'Uruguay', NULL, NULL, NULL, 0, NULL, NULL, 1, '2014-06-28 22:00:00', 10),
(51, 'Pays-Bas', 'Mexique', NULL, NULL, NULL, 0, NULL, NULL, 1, '2014-06-29 18:00:00', 5),
(52, 'C. Rica', 'Grèce', NULL, NULL, NULL, 0, NULL, NULL, 1, '2014-06-29 22:00:00', 9),
(53, 'France', 'Nigeria', NULL, NULL, NULL, 0, NULL, NULL, 1, '2014-06-30 18:00:00', 2),
(54, 'Allemagne', 'Algérie', NULL, NULL, NULL, 0, NULL, NULL, 1, '2014-06-30 22:00:00', 8),
(55, 'Argentine', 'Suisse', NULL, NULL, NULL, 0, NULL, NULL, 1, '2014-07-01 18:00:00', 12),
(56, 'Belgique', 'Etats-Unis', NULL, NULL, NULL, 0, NULL, NULL, 1, '2014-07-01 22:00:00', 11),
(57, 'Vainqueur 8ème 1', 'Vainqueur 8ème 3', NULL, NULL, NULL, 0, NULL, NULL, 0, '2014-07-04 22:00:00', 5),
(58, 'Vainqueur 8ème 2', 'Vainqueur 8ème 4', NULL, NULL, NULL, 0, NULL, NULL, 0, '2014-07-04 18:00:00', 10),
(59, 'Vainqueur 8ème 5', 'Vainqueur 8ème 7', NULL, NULL, NULL, 0, NULL, NULL, 0, '2014-07-05 22:00:00', 11),
(60, 'Vainqueur 8ème 6', 'Vainqueur 8ème 8', NULL, NULL, NULL, 0, NULL, NULL, 0, '2014-07-05 18:00:00', 2),
(61, 'Vainqueur quart 1', 'Vainqueur quart 3', NULL, NULL, NULL, 0, NULL, NULL, 0, '2014-07-08 22:00:00', 1),
(62, 'Vainqueur quart 2', 'Vainqueur quart 4', NULL, NULL, NULL, 0, NULL, NULL, 0, '2014-07-09 22:00:00', 12),
(63, 'Perdant demie 1', 'Perdant demie 2', NULL, NULL, NULL, 0, NULL, NULL, 0, '2014-07-12 22:00:00', 2),
(64, 'Vainqueur demie 1', 'Vainqueur demie 2', NULL, NULL, NULL, 0, NULL, NULL, 0, '2014-07-13 21:00:00', 10);

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
('Martine', '2be067b0de372807dc5e88c44897279e', 1, 0, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
