-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mer 30 Décembre 2015 à 11:29
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
  PRIMARY KEY (`id`),
  KEY `match_id` (`match_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `euro_bet`
--

INSERT INTO `euro_bet` (`id`, `username`, `match_id`, `win`) VALUES
(1, 'Grissouris', 14, 'Suisse'),
(2, 'Grissouris', 2, 'Suisse'),
(3, 'Grissouris', 1, 'France');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=52 ;

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
(36, 18, 19, 'E', NULL, NULL, 0, NULL, NULL, 1, '2016-06-22 21:00:00'),
(37, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, 1, '2016-06-25 15:00:00'),
(38, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, 1, '2016-06-25 21:00:00'),
(39, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, 1, '2016-06-25 18:00:00'),
(40, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, 1, '2016-06-26 21:00:00'),
(41, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, 1, '2016-06-26 18:00:00'),
(42, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, 1, '2016-06-27 18:00:00'),
(43, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, 1, '2016-06-26 15:00:00'),
(44, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, 1, '2016-06-27 21:00:00'),
(45, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, 1, '2016-06-30 21:00:00'),
(46, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, 1, '2016-07-01 21:00:00'),
(47, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, 1, '2016-07-02 21:00:00'),
(48, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, 1, '2016-07-03 21:00:00'),
(49, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, 1, '2016-07-06 21:00:00'),
(50, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, 1, '2016-07-07 21:00:00'),
(51, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, 1, '2016-07-10 21:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `euro_team`
--

CREATE TABLE IF NOT EXISTS `euro_team` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `smallname` varchar(3) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `flag` varchar(500) NOT NULL,
  `starplayer` varchar(30) NOT NULL,
  `group` varchar(1) NOT NULL,
  `previous` varchar(500) NOT NULL,
  `coach` varchar(500) NOT NULL,
  `points` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `euro_team`
--

INSERT INTO `euro_team` (`id`, `name`, `smallname`, `flag`, `starplayer`, `group`, `previous`, `coach`, `points`) VALUES
(1, 'France', 'FRA', 'images/flags/france.png', 'Hugo Lloris', 'A', '1/4 finale', 'Didier Deschamps', 0),
(2, 'Roumanie', 'ROU', 'images/flags/roumanie.png', 'Adrian Mutu', 'A', 'non qualifié', 'Angel Iordanescu', 0),
(3, 'Albanie', 'ALB', 'images/flags/albanie.png', 'Edmond Kapilani', 'A', 'non qualifié', 'Gianni De Biasi', 0),
(4, 'Suisse', 'SUI', 'images/flags/suisse.png', 'Xherdan Shaqiri', 'A', 'non qualifié', 'Vladimir Petkovic', 0),
(5, 'Angleterre', 'ANG', 'images/flags/angleterre.png', 'Wayne Rooney', 'B', '1/4 finale', 'Roy Hodgson', 0),
(6, 'Russie', 'RUS', 'images/flags/russie.png', 'Roman Pavlyuchenko', 'B', 'Groupes', 'Leonid Slutski', 0),
(7, 'Pays de Galles', 'PGA', 'images/flags/pgalles.png', 'Gareth Bale', 'B', 'non qualifié', 'Chris Coleman', 0),
(8, 'Slovaquie', 'SLO', 'images/flags/slovaquie.png', 'Miroslav Karhan', 'B', 'non qualifié', 'Jan Kozak', 0),
(9, 'Allemagne', 'ALL', 'images/flags/allemagne.png', 'Thomas Muller', 'C', '1/2 finale', 'Joachim Löw', 0),
(10, 'Ukraine', 'UKR', 'images/flags/ukraine.png', 'Andriy Shevchenko', 'C', 'Groupes', 'Mikhail Fomenko', 0),
(11, 'Pologne', 'POL', 'images/flags/pologne.png', 'Robert Lewandowski', 'C', 'Groupes', 'Adam Nawalka', 0),
(12, 'Irlande du Nord', 'IRN', 'images/flags/irlnord.png', 'Steven Davis', 'C', 'non qualifié', 'Michaël O''Neill', 0),
(13, 'Espagne', 'ESP', 'images/flags/espagne.png', 'Iker Casillas', 'D', 'Vainqueur', 'Vicente Del Bosque', 0),
(14, 'République Tchèque', 'RTC', 'images/flags/rtcheque.png', 'Jan Koller', 'D', '1/4 finale', 'Pavel Vrba', 0),
(15, 'Turquie', 'TUR', 'images/flags/turquie.png', 'Hakan Sukur', 'D', 'non qualifié', 'Fatih Terim', 0),
(16, 'Croatie', 'CRO', 'images/flags/croatie.png', 'Davor Suker', 'D', 'Groupes', 'Ante Cacic', 0),
(17, 'Belgique', 'BEL', 'images/flags/belgique.png', 'Eden Hazard', 'E', 'non qualifié', 'Marc Wilmots', 0),
(18, 'Italie', 'ITA', 'images/flags/italie.png', 'Gianluigi Buffon', 'E', 'finaliste', 'Antonio Conte', 0),
(19, 'République d''Irlande', 'IRL', 'images/flags/irlande.png', 'Robbie Keane', 'E', 'Groupes', 'Martin O''Neill', 0),
(20, 'Suède', 'SUE', 'images/flags/suede.png', 'Zlatan Ibrahimovic', 'E', 'Groupes', 'Erik Hamren', 0),
(21, 'Portugal', 'POR', 'images/flags/portugal.png', 'Christiano Ronaldo', 'F', '1/2 finale', 'Fernando Santos', 0),
(22, 'Islande', 'ISL', 'images/flags/islande.png', 'Eidur Gudjohnsen', 'F', 'non qualifié', 'Lars Lagerback', 0),
(23, 'Autriche', 'AUT', 'images/flags/autriche.png', 'Toni Polster', 'F', 'non qualifié', 'Marcel Koller', 0),
(24, 'Hongrie', 'HON', 'images/flags/hongrie.png', 'Zoltan Gera', 'F', 'non qualifié', 'Bernd Storck', 0);

-- --------------------------------------------------------

--
-- Structure de la table `euro_temporaryteamname`
--

CREATE TABLE IF NOT EXISTS `euro_temporaryteamname` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `id_match` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Contenu de la table `euro_temporaryteamname`
--

INSERT INTO `euro_temporaryteamname` (`id`, `name`, `id_match`) VALUES
(1, 'Deuxième du groupe A', 37),
(2, 'Deuxième du groupe C', 37),
(3, 'Premier du groupe D', 38),
(4, 'Troisième du groupe B, E ou F', 38),
(5, 'Premier du groupe B', 39),
(6, 'Troisième du groupe A, C ou D', 39),
(7, 'Premier du groupe F', 40),
(8, 'Deuxième du groupe E', 40),
(9, 'Premier du groupe C', 41),
(10, 'Troisième du groupe A, B ou F', 41),
(11, 'Premier du groupe E', 42),
(12, 'Deuxième du groupe D', 42),
(13, 'Premier du groupe A', 43),
(14, 'Troisième du groupe C, D ou E', 43),
(15, 'Deuxième du groupe B', 44),
(16, 'Deuxième du groupe F', 44),
(17, 'Vainqueur du huitième de finale 1', 45),
(18, 'Vainqueur du huitième de finale 2', 45),
(19, 'Vainqueur du huitième de finale 3', 46),
(20, 'Vainqueur du huitième de finale 4', 46),
(21, 'Vainqueur du huitième de finale 5', 47),
(22, 'Vainqueur du huitième de finale 6', 47),
(23, 'Vainqueur du huitième de finale 7', 48),
(24, 'Vainqueur du huitième de finale 8', 48),
(25, 'Vainqueur du quart de finale 1', 49),
(26, 'Vainqueur du quart de finale 2', 49),
(27, 'Vainqueur du quart de finale 3', 50),
(28, 'Vainqueur du quart de finale 4', 50),
(29, 'Vainqueur de la demi-finale 1', 51),
(30, 'Vainqueur de la demi-finale 2', 51);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `euro_top`
--

INSERT INTO `euro_top` (`id`, `username`, `team1`, `team2`, `team3`, `team4`) VALUES
(1, 'Laurene', 'France', 'Espagne', 'Angleterre', 'Allemagne'),
(2, 'Grissouris', 'France', 'Angleterre', 'Espagne', 'Allemagne');

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

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `euro_bet`
--
ALTER TABLE `euro_bet`
  ADD CONSTRAINT `euro_bet_ibfk_1` FOREIGN KEY (`match_id`) REFERENCES `euro_schedule` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
