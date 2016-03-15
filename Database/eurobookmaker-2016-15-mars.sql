-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mar 15 Mars 2016 à 12:56
-- Version du serveur: 5.5.47-0ubuntu0.14.04.1
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
  `win` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `match_id` (`match_id`),
  KEY `winindex` (`win`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `euro_bet`
--

INSERT INTO `euro_bet` (`id`, `username`, `match_id`, `win`) VALUES
(5, 'test', 1, 1),
(6, 'test', 2, 25),
(7, 'test', 4, 25),
(8, 'Grissouris', 1, 2),
(9, 'Grissouris', 12, 21),
(10, 'Grissouris', 27, 25);

-- --------------------------------------------------------

--
-- Structure de la table `euro_namematch`
--

CREATE TABLE IF NOT EXISTS `euro_namematch` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `id_match` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Contenu de la table `euro_namematch`
--

INSERT INTO `euro_namematch` (`id`, `name`, `id_match`) VALUES
(1, '8ème 1', 37),
(2, '8ème 2', 38),
(3, '8ème 3', 39),
(4, '8ème 4', 40),
(5, '8ème 5', 41),
(6, '8ème 6', 42),
(7, '8ème 7', 43),
(8, '8ème 8', 44),
(9, '1/4 1', 45),
(10, '1/4 2', 46),
(11, '1/4 3', 47),
(12, '1/4 4', 48),
(13, '1/2 1', 49),
(14, '1/2 2', 50),
(15, 'Finale', 51);

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
  `tempname1` varchar(100) DEFAULT NULL,
  `tempname2` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `team1` (`team1`),
  KEY `team2` (`team2`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=52 ;

--
-- Contenu de la table `euro_schedule`
--

INSERT INTO `euro_schedule` (`id`, `team1`, `team2`, `group`, `team1result`, `team2result`, `overtime`, `team1penalty`, `team2penalty`, `available`, `date`, `tempname1`, `tempname2`) VALUES
(1, 1, 2, 'A', 2, 3, 0, NULL, NULL, 0, '2016-06-10 21:00:00', NULL, NULL),
(2, 3, 4, 'A', NULL, NULL, 0, NULL, NULL, 1, '2016-06-11 15:00:00', NULL, NULL),
(3, 7, 8, 'B', NULL, NULL, 0, NULL, NULL, 1, '2016-06-11 18:00:00', NULL, NULL),
(4, 5, 6, 'B', NULL, NULL, 0, NULL, NULL, 1, '2016-06-11 21:00:00', NULL, NULL),
(5, 15, 16, 'D', NULL, NULL, 0, NULL, NULL, 1, '2016-06-12 15:00:00', NULL, NULL),
(6, 11, 12, 'C', NULL, NULL, 0, NULL, NULL, 1, '2016-06-12 18:00:00', NULL, NULL),
(7, 9, 10, 'C', NULL, NULL, 0, NULL, NULL, 1, '2016-06-12 21:00:00', NULL, NULL),
(8, 13, 14, 'D', NULL, NULL, 0, NULL, NULL, 1, '2016-06-13 15:00:00', NULL, NULL),
(9, 19, 20, 'E', NULL, NULL, 0, NULL, NULL, 1, '2016-06-13 18:00:00', NULL, NULL),
(10, 17, 18, 'E', NULL, NULL, 0, NULL, NULL, 1, '2016-06-13 21:00:00', NULL, NULL),
(11, 23, 24, 'F', NULL, NULL, 0, NULL, NULL, 1, '2016-06-14 18:00:00', NULL, NULL),
(12, 21, 22, 'F', 1, 3, 0, NULL, NULL, 0, '2016-06-14 21:00:00', NULL, NULL),
(13, 6, 8, 'B', NULL, NULL, 0, NULL, NULL, 1, '2016-06-15 15:00:00', NULL, NULL),
(14, 2, 4, 'A', NULL, NULL, 0, NULL, NULL, 1, '2016-06-15 18:00:00', NULL, NULL),
(15, 1, 3, 'A', NULL, NULL, 0, NULL, NULL, 1, '2016-06-15 21:00:00', NULL, NULL),
(16, 5, 7, 'B', NULL, NULL, 0, NULL, NULL, 1, '2016-06-16 15:00:00', NULL, NULL),
(17, 10, 12, 'C', NULL, NULL, 0, NULL, NULL, 1, '2016-06-16 18:00:00', NULL, NULL),
(18, 9, 11, 'C', NULL, NULL, 0, NULL, NULL, 1, '2016-06-16 21:00:00', NULL, NULL),
(19, 18, 20, 'E', NULL, NULL, 0, NULL, NULL, 1, '2016-06-17 15:00:00', NULL, NULL),
(20, 14, 16, 'D', NULL, NULL, 0, NULL, NULL, 1, '2016-06-17 18:00:00', NULL, NULL),
(21, 13, 15, 'D', NULL, NULL, 0, NULL, NULL, 1, '2016-06-17 21:00:00', NULL, NULL),
(22, 17, 19, 'E', NULL, NULL, 0, NULL, NULL, 1, '2016-06-18 15:00:00', NULL, NULL),
(23, 22, 24, 'F', NULL, NULL, 0, NULL, NULL, 1, '2016-06-18 18:00:00', NULL, NULL),
(24, 21, 23, 'F', NULL, NULL, 0, NULL, NULL, 1, '2016-06-18 21:00:00', NULL, NULL),
(25, 4, 1, 'A', NULL, NULL, 0, NULL, NULL, 1, '2016-06-19 21:00:00', NULL, NULL),
(26, 2, 3, 'A', NULL, NULL, 0, NULL, NULL, 1, '2016-06-19 21:00:00', NULL, NULL),
(27, 8, 5, 'B', 2, 2, 0, NULL, NULL, 0, '2016-06-20 21:00:00', NULL, NULL),
(28, 6, 7, 'B', NULL, NULL, 0, NULL, NULL, 1, '2016-06-20 21:00:00', NULL, NULL),
(29, 12, 9, 'C', NULL, NULL, 0, NULL, NULL, 1, '2016-06-21 18:00:00', NULL, NULL),
(30, 10, 11, 'C', NULL, NULL, 0, NULL, NULL, 1, '2016-06-21 18:00:00', NULL, NULL),
(31, 16, 13, 'D', NULL, NULL, 0, NULL, NULL, 1, '2016-06-21 21:00:00', NULL, NULL),
(32, 14, 15, 'D', NULL, NULL, 0, NULL, NULL, 1, '2016-06-21 21:00:00', NULL, NULL),
(33, 24, 21, 'F', NULL, NULL, 0, NULL, NULL, 1, '2016-06-22 18:00:00', NULL, NULL),
(34, 22, 23, 'F', NULL, NULL, 0, NULL, NULL, 1, '2016-06-22 18:00:00', NULL, NULL),
(35, 20, 17, 'E', NULL, NULL, 0, NULL, NULL, 1, '2016-06-22 21:00:00', NULL, NULL),
(36, 18, 19, 'E', NULL, NULL, 0, NULL, NULL, 1, '2016-06-22 21:00:00', NULL, NULL),
(37, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, 1, '2016-06-25 15:00:00', '2ème Gr A', '2ème Gr C'),
(38, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, 1, '2016-06-25 21:00:00', '1er Gr D', '2ème Gr B, E ou F'),
(39, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, 1, '2016-06-25 18:00:00', '1er Gr B', '3ème Gr A, C ou D'),
(40, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, 1, '2016-06-26 21:00:00', '1er Gr F', '2ème Gr E'),
(41, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, 1, '2016-06-26 18:00:00', '1er Gr C', '3ème Gr A, B ou F'),
(42, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, 1, '2016-06-27 18:00:00', '1er Gr E', '2ème Gr D'),
(43, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, 1, '2016-06-26 15:00:00', '1er Gr A', '3ème Gr C, D ou E'),
(44, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, 1, '2016-06-27 21:00:00', '2ème Gr B', '2ème Gr F'),
(45, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, 1, '2016-06-30 21:00:00', 'Gagnant 8ème 1', 'Gagnant 8ème 2'),
(46, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, 1, '2016-07-01 21:00:00', 'Gagnant 8ème 3', 'Gagnant 8ème 4'),
(47, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, 1, '2016-07-02 21:00:00', 'Gagnant 8ème 5', 'Gagnant 8ème 6'),
(48, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, 1, '2016-07-03 21:00:00', 'Gagnant 8ème 7', 'Gagnant 8ème 8'),
(49, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, 1, '2016-07-06 21:00:00', 'Gagnant 1/4 1', 'Gagnant 1/4 2'),
(50, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, 1, '2016-07-07 21:00:00', 'Gagnant 1/4 3', 'Gagnant 1/4 4'),
(51, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, 1, '2016-07-10 21:00:00', 'Gagnant 1/2 1', 'Gagnant 1/2 2');

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
(2, 'Roumanie', 'ROU', 'images/flags/roumanie.png', 'Ciprian Marica', 'A', 'non qualifié', 'Angel Iordanescu', 0),
(3, 'Albanie', 'ALB', 'images/flags/albanie.png', 'Lorik Cana', 'A', 'non qualifié', 'Gianni De Biasi', 0),
(4, 'Suisse', 'SUI', 'images/flags/suisse.png', 'Xherdan Shaqiri', 'A', 'non qualifié', 'Vladimir Petkovic', 0),
(5, 'Angleterre', 'ANG', 'images/flags/angleterre.png', 'Wayne Rooney', 'B', '1/4 finale', 'Roy Hodgson', 0),
(6, 'Russie', 'RUS', 'images/flags/russie.png', 'Aleksandr Kerzhakov', 'B', 'Groupes', 'Leonid Slutski', 0),
(7, 'Pays de Galles', 'PGA', 'images/flags/pgalles.png', 'Gareth Bale', 'B', 'non qualifié', 'Chris Coleman', 0),
(8, 'Slovaquie', 'SLO', 'images/flags/slovaquie.png', 'Marek Hamsik', 'B', 'non qualifié', 'Jan Kozak', 0),
(9, 'Allemagne', 'ALL', 'images/flags/allemagne.png', 'Lukas Podolski', 'C', '1/2 finale', 'Joachim Löw', 0),
(10, 'Ukraine', 'UKR', 'images/flags/ukraine.png', 'Andriy Yarmolenko', 'C', 'Groupes', 'Mikhail Fomenko', 0),
(11, 'Pologne', 'POL', 'images/flags/pologne.png', 'Robert Lewandowski', 'C', 'Groupes', 'Adam Nawalka', 0),
(12, 'Irlande du Nord', 'IRN', 'images/flags/irlnord.png', 'Steven Davis', 'C', 'non qualifié', 'Michaël O''Neill', 0),
(13, 'Espagne', 'ESP', 'images/flags/espagne.png', 'David Silva', 'D', 'Vainqueur', 'Vicente Del Bosque', 0),
(14, 'République Tchèque', 'RTC', 'images/flags/rtcheque.png', 'Tomas Rosicky', 'D', '1/4 finale', 'Pavel Vrba', 0),
(15, 'Turquie', 'TUR', 'images/flags/turquie.png', 'Arda Turan', 'D', 'non qualifié', 'Fatih Terim', 0),
(16, 'Croatie', 'CRO', 'images/flags/croatie.png', 'Luka Modric', 'D', 'Groupes', 'Ante Cacic', 0),
(17, 'Belgique', 'BEL', 'images/flags/belgique.png', 'Marouane Fellaini', 'E', 'non qualifié', 'Marc Wilmots', 0),
(18, 'Italie', 'ITA', 'images/flags/italie.png', 'Gianluigi Buffon', 'E', 'finaliste', 'Antonio Conte', 0),
(19, 'République d''Irlande', 'IRL', 'images/flags/irlande.png', 'Robbie Keane', 'E', 'Groupes', 'Martin O''Neill', 0),
(20, 'Suède', 'SUE', 'images/flags/suede.png', 'Zlatan Ibrahimovic', 'E', 'Groupes', 'Erik Hamren', 0),
(21, 'Portugal', 'POR', 'images/flags/portugal.png', 'Christiano Ronaldo', 'F', '1/2 finale', 'Fernando Santos', 0),
(22, 'Islande', 'ISL', 'images/flags/islande.png', 'Eidur Gudjohnsen', 'F', 'non qualifié', 'Lars Lagerback', 0),
(23, 'Autriche', 'AUT', 'images/flags/autriche.png', 'Marc Janko', 'F', 'non qualifié', 'Marcel Koller', 0),
(24, 'Hongrie', 'HON', 'images/flags/hongrie.png', 'Zoltan Gera', 'F', 'non qualifié', 'Bernd Storck', 0);

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
(2, 'Grissouris', 'Angleterre', 'Allemagne', 'France', 'Espagne');

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
('Grissouris', '21752033819b7b98bb69d8f582585655', 0, 1, 1),
('Laurene', '098f6bcd4621d373cade4e832627b4f6', 0, 0, 1),
('Martine', '21752033819b7b98bb69d8f582585655', 1, 0, 1),
('test', '098f6bcd4621d373cade4e832627b4f6', 0, 0, 1);

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
