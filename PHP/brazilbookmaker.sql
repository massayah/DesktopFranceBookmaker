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
-- Base de données: `brazilbookmaker`
--

-- --------------------------------------------------------

--
-- Structure de la table `brazil_bet`
--

CREATE TABLE IF NOT EXISTS `brazil_bet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(500) NOT NULL,
  `match_id` int(11) NOT NULL,
  `win` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `brazil_bet`
--

INSERT INTO `brazil_bet` (`id`, `username`, `match_id`, `win`) VALUES
(1, 'Martine', 1, 'Nul'),
(2, 'Toto', 1, 'Nul'),
(3, 'Toto', 2, 'Mexique'),
(4, 'Toto', 14, 'Iran'),
(5, 'test', 1, 'Brésil');

-- --------------------------------------------------------

--
-- Structure de la table `brazil_player`
--

CREATE TABLE IF NOT EXISTS `brazil_player` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `team_id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `poste` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `brazil_previouswinners`
--

CREATE TABLE IF NOT EXISTS `brazil_previouswinners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `year` int(11) NOT NULL,
  `winner` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Contenu de la table `brazil_previouswinners`
--

INSERT INTO `brazil_previouswinners` (`id`, `year`, `winner`) VALUES
(1, 1930, 'Uruguay'),
(2, 1934, 'Italie'),
(3, 1938, 'Italie'),
(4, 1950, 'Uruguay'),
(5, 1954, 'Allemagne'),
(6, 1958, 'Brésil'),
(7, 1962, 'Brésil'),
(8, 1966, 'Angleterre'),
(9, 1970, 'Brésil'),
(10, 1974, 'Allemagne'),
(11, 1978, 'Argentine'),
(12, 1982, 'Italie'),
(13, 1986, 'Argentine'),
(14, 1990, 'Allemagne'),
(15, 1994, 'Brésil'),
(16, 1998, 'France'),
(17, 2002, 'Brésil'),
(18, 2006, 'Italie'),
(19, 2010, 'Espagne');

-- --------------------------------------------------------

--
-- Structure de la table `brazil_schedule`
--

CREATE TABLE IF NOT EXISTS `brazil_schedule` (
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
-- Contenu de la table `brazil_schedule`
--

INSERT INTO `brazil_schedule` (`id`, `team1`, `team2`, `group`, `team1result`, `team2result`, `overtime`, `team1penalty`, `team2penalty`, `available`, `date`) VALUES
(1, 'Brésil', 'Croatie', 'A', NULL, NULL, 0, NULL, NULL, 1, '2014-06-12 22:00:00'),
(2, 'Mexique', 'Cameroun', 'A', NULL, NULL, 0, NULL, NULL, 1, '2014-06-13 18:00:00'),
(3, 'Espagne', 'Pays-Bas', 'B', NULL, NULL, 0, NULL, NULL, 1, '2014-06-13 16:00:00'),
(4, 'Chili', 'Australie', 'B', NULL, NULL, 0, NULL, NULL, 1, '2014-06-14 00:00:00'),
(5, 'Colombie', 'Grèce', 'C', NULL, NULL, 0, NULL, NULL, 1, '2014-06-14 18:00:00'),
(6, 'C. Ivoire', 'Japon', 'C', NULL, NULL, 0, NULL, NULL, 1, '2014-06-15 03:00:00'),
(7, 'Uruguay', 'C. Rica', 'D', NULL, NULL, 0, NULL, NULL, 1, '2014-06-14 21:00:00'),
(8, 'Angleterre', 'Italie', 'D', NULL, NULL, 0, NULL, NULL, 1, '2014-06-15 00:00:00'),
(9, 'Suisse', 'Equateur', 'E', NULL, NULL, 0, NULL, NULL, 1, '2014-06-15 18:00:00'),
(10, 'France', 'Honduras', 'E', NULL, NULL, 0, NULL, NULL, 1, '2014-06-15 21:00:00'),
(11, 'Argentine', 'Bosnie', 'F', NULL, NULL, 0, NULL, NULL, 1, '2014-06-16 00:00:00'),
(12, 'Iran', 'Nigeria', 'F', NULL, NULL, 0, NULL, NULL, 1, '2014-06-16 21:00:00'),
(13, 'Allemagne', 'Portugal', 'G', NULL, NULL, 0, NULL, NULL, 1, '2014-06-16 18:00:00'),
(14, 'Ghana', 'Etats-Unis', 'G', NULL, NULL, 0, NULL, NULL, 1, '2014-06-17 00:00:00'),
(15, 'Belgique', 'Algérie', 'H', NULL, NULL, 0, NULL, NULL, 1, '2014-06-17 18:00:00'),
(16, 'Russie', 'Corée', 'H', NULL, NULL, 0, NULL, NULL, 1, '2014-06-18 00:00:00'),
(17, 'Brésil', 'Mexique', 'A', NULL, NULL, 0, NULL, NULL, 1, '2014-06-17 21:00:00'),
(18, 'Cameroun', 'Croatie', 'A', NULL, NULL, 0, NULL, NULL, 1, '2014-06-19 00:00:00'),
(19, 'Australie', 'Pays-Bas', 'B', NULL, NULL, 0, NULL, NULL, 1, '2014-06-18 18:00:00'),
(20, 'Espagne', 'Chili', 'B', NULL, NULL, 0, NULL, NULL, 1, '2014-06-18 21:00:00'),
(21, 'Colombie', 'C. Ivoire', 'C', NULL, NULL, 0, NULL, NULL, 1, '2014-06-19 18:00:00'),
(22, 'Japon', 'Grèce', 'C', NULL, NULL, 0, NULL, NULL, 1, '2014-06-20 00:00:00'),
(23, 'Uruguay', 'Angleterre', 'D', NULL, NULL, 0, NULL, NULL, 1, '2014-06-19 21:00:00'),
(24, 'Italie', 'C. Rica', 'D', NULL, NULL, 0, NULL, NULL, 1, '2014-06-20 18:00:00'),
(25, 'Suisse', 'France', 'E', NULL, NULL, 0, NULL, NULL, 1, '2014-06-20 21:00:00'),
(26, 'Honduras', 'Equateur', 'E', NULL, NULL, 0, NULL, NULL, 1, '2014-06-21 00:00:00'),
(27, 'Argentine', 'Iran', 'F', NULL, NULL, 0, NULL, NULL, 1, '2014-06-21 18:00:00'),
(28, 'Nigeria', 'Bosnie', 'F', NULL, NULL, 0, NULL, NULL, 1, '2014-06-22 00:00:00'),
(29, 'Allemagne', 'Ghana', 'G', NULL, NULL, 0, NULL, NULL, 1, '2014-06-21 21:00:00'),
(30, 'Etats-Unis', 'Portugal', 'G', NULL, NULL, 0, NULL, NULL, 1, '2014-06-23 00:00:00'),
(31, 'Belgique', 'Russie', 'H', NULL, NULL, 0, NULL, NULL, 1, '2014-06-22 18:00:00'),
(32, 'Corée', 'Algérie', 'H', NULL, NULL, 0, NULL, NULL, 1, '2014-06-22 21:00:00'),
(33, 'Cameroun', 'Brésil', 'A', NULL, NULL, 0, NULL, NULL, 1, '2014-06-23 22:00:00'),
(34, 'Croatie', 'Mexique', 'A', NULL, NULL, 0, NULL, NULL, 1, '2014-06-23 22:00:00'),
(35, 'Australie', 'Espagne', 'B', NULL, NULL, 0, NULL, NULL, 1, '2014-06-23 18:00:00'),
(36, 'Pays-Bas', 'Chili', 'B', NULL, NULL, 0, NULL, NULL, 1, '2014-06-23 18:00:00'),
(37, 'Japon', 'Colombie', 'C', NULL, NULL, 0, NULL, NULL, 1, '2014-06-24 22:00:00'),
(38, 'Grèce', 'C. Ivoire', 'C', NULL, NULL, 0, NULL, NULL, 1, '2014-06-24 22:00:00'),
(39, 'C. Rica', 'Angleterre', 'D', NULL, NULL, 0, NULL, NULL, 1, '2014-06-24 18:00:00'),
(40, 'Italie', 'Uruguay', 'D', NULL, NULL, 0, NULL, NULL, 1, '2014-06-24 18:00:00'),
(41, 'Honduras', 'Suisse', 'E', NULL, NULL, 0, NULL, NULL, 1, '2014-06-25 22:00:00'),
(42, 'Equateur', 'France', 'E', NULL, NULL, 0, NULL, NULL, 1, '2014-06-25 22:00:00'),
(43, 'Bosnie', 'Iran', 'F', NULL, NULL, 0, NULL, NULL, 1, '2014-06-25 18:00:00'),
(44, 'Nigeria', 'Argentine', 'F', NULL, NULL, 0, NULL, NULL, 1, '2014-06-25 18:00:00'),
(45, 'Etats-Unis', 'Allemagne', 'G', NULL, NULL, 0, NULL, NULL, 1, '2014-06-26 18:00:00'),
(46, 'Portugal', 'Ghana', 'G', NULL, NULL, 0, NULL, NULL, 1, '2014-06-26 18:00:00'),
(47, 'Algérie', 'Russie', 'H', NULL, NULL, 0, NULL, NULL, 1, '2014-06-26 22:00:00'),
(48, 'Corée', 'Belgique', 'H', NULL, NULL, 0, NULL, NULL, 1, '2014-06-26 22:00:00'),
(49, '1er groupe A', '2ème groupe B', NULL, NULL, NULL, 0, NULL, NULL, 0, '2014-06-28 18:00:00'),
(50, '1er groupe C', '2ème groupe D', NULL, NULL, NULL, 0, NULL, NULL, 1, '2014-06-28 22:00:00'),
(51, '1er groupe B', '2ème groupe A', NULL, NULL, NULL, 0, NULL, NULL, 1, '2014-06-29 18:00:00'),
(52, '1er groupe D', '2ème groupe C', NULL, NULL, NULL, 0, NULL, NULL, 1, '2014-06-29 22:00:00'),
(53, '1er groupe E', '2ème groupe F', NULL, NULL, NULL, 0, NULL, NULL, 1, '2014-06-30 18:00:00'),
(54, '1er groupe G', '2ème groupe H', NULL, NULL, NULL, 0, NULL, NULL, 1, '2014-06-30 22:00:00'),
(55, '1er groupe F', '2ème groupe E', NULL, NULL, NULL, 0, NULL, NULL, 1, '2014-07-01 18:00:00'),
(56, '1er groupe H', '2ème groupe G', NULL, NULL, NULL, 0, NULL, NULL, 1, '2014-07-01 22:00:00'),
(57, 'Vainqueur 8ème 1', 'Vainqueur 8ème 3', NULL, NULL, NULL, 0, NULL, NULL, 1, '2014-07-04 22:00:00'),
(58, 'Vainqueur 8ème 2', 'Vainqueur 8ème 4', NULL, NULL, NULL, 0, NULL, NULL, 1, '2014-07-04 18:00:00'),
(59, 'Vainqueur 8ème 5', 'Vainqueur 8ème 7', NULL, NULL, NULL, 0, NULL, NULL, 1, '2014-07-05 22:00:00'),
(60, 'Vainqueur 8ème 6', 'Vainqueur 8ème 8', NULL, NULL, NULL, 0, NULL, NULL, 1, '2014-07-05 18:00:00'),
(61, 'Vainqueur quart 1', 'Vainqueur quart 3', NULL, NULL, NULL, 0, NULL, NULL, 1, '2014-07-08 22:00:00'),
(62, 'Vainqueur quart 2', 'Vainqueur quart 4', NULL, NULL, NULL, 0, NULL, NULL, 1, '2014-07-09 22:00:00'),
(63, 'Perdant demie 1', 'Perdant demie 2', NULL, NULL, NULL, 0, NULL, NULL, 1, '2014-07-12 22:00:00'),
(64, 'Vainqueur demie 1', 'Vainqueur demie 2', NULL, NULL, NULL, 0, NULL, NULL, 1, '2014-07-13 21:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `brazil_team`
--

CREATE TABLE IF NOT EXISTS `brazil_team` (
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
-- Contenu de la table `brazil_team`
--

INSERT INTO `brazil_team` (`id`, `name`, `flag`, `successrate`, `group`, `previous`, `coach`, `points`) VALUES
(1, 'Brésil', 'images/flags/Brazil.png', '', 'A', 'Quarts de finale', 'Luiz Felipe Scolari', 0),
(2, 'Croatie', 'images/flags/Croatia.png', '', 'A', 'Non qualifié', 'Niko Kovac', 0),
(3, 'Cameroun', 'images/flags/Cameroon.png', '', 'A', 'Premier tour', 'Volker Finke', 0),
(4, 'Mexique', 'images/flags/Mexico.png', '', 'A', 'Huitièmes de finale', 'Miguel Herrera', 0),
(5, 'Espagne', 'images/flags/Spain.png', '', 'B', 'Champion', 'Vicente Del Bosque', 0),
(6, 'Pays-Bas', 'images/flags/Netherlands.png', '', 'B', 'Finaliste', 'Louis Van Gaal', 0),
(7, 'Chili', 'images/flags/Chile.png', '', 'B', 'Huitièmes de finale', 'Jorge Sampaoli', 0),
(8, 'Australie', 'images/flags/Australia.png', '', 'B', 'Non qualifié', 'Ange Postecoglou', 0),
(9, 'Colombie', 'images/flags/Colombia.png', '', 'C', 'Non qualifié', 'José Pekerman', 0),
(10, 'Grèce', 'images/flags/Greece.png', '', 'C', 'Premier tour', 'Fernando Santos', 0),
(11, 'C. Ivoire', 'images/flags/CoteIvoire.png', '', 'C', 'Premier tour', 'Sabri Lamouchi', 0),
(12, 'Japon', 'images/flags/Japan.png', '', 'C', 'Huitièmes de finale', 'Alberto Zaccheroni', 0),
(13, 'Uruguay', 'images/flags/Uruguay.png', '', 'D', 'Demi-finales', 'Oscar Washington Tabarez', 0),
(14, 'C. Rica', 'images/flags/CostaRica.png', '', 'D', 'Non qualifié', 'Jorge Luis Pinto', 0),
(15, 'Angleterre', 'images/flags/England.png', '', 'D', 'Huitièmes de finale', 'Roy Hodgson', 0),
(16, 'Italie', 'images/flags/Italy.png', '', 'D', 'Premier tour', 'Claudio Cesare Prandelli', 0),
(17, 'Suisse', 'images/flags/Switzerland.png', '', 'E', 'Premier tour', 'Ottmar Hitzfeld', 0),
(18, 'Equateur', 'images/flags/Ecuador.png', '', 'E', 'Non qualifié', 'Reynaldo Rueda', 0),
(19, 'France', 'images/flags/France.png', '', 'E', 'Premier tour', 'Dider Deschamps', 0),
(20, 'Honduras', 'images/flags/Honduras.png', '', 'E', 'Premier tour', 'Luis Fernando Suárez', 0),
(21, 'Argentine', 'images/flags/Argentina.png', '', 'F', 'Quarts de finale', 'Alejandro Sabella', 0),
(22, 'Bosnie', 'images/flags/Bosnia.png', '', 'F', 'Non qualifié', 'Safet Susic', 0),
(23, 'Iran', 'images/flags/Iran.png', '', 'F', 'Non qualifié', 'Mohammad Maleyikohan', 0),
(24, 'Nigeria', 'images/flags/Nigeria.png', '', 'F', 'Premier tour', 'Stephen Keshi', 0),
(25, 'Allemagne', 'images/flags/Germany.png', '', 'G', 'Demi-finales', 'Joachim Löw', 0),
(26, 'Portugal', 'images/flags/Portugal.png', '', 'G', 'Huitièmes de finale', 'Paulo Bento', 0),
(27, 'Ghana', 'images/flags/Ghana.png', '', 'G', 'Quarts de finale', 'James Kwesi Appiah', 0),
(28, 'Etats-Unis', 'images/flags/USA.png', '', 'G', 'Huitièmes de finale', 'Jürgen Klinsmann', -3),
(29, 'Belgique', 'images/flags/Belgium.png', '', 'H', 'Non qualifié', 'Marc Wilmots', 0),
(30, 'Algérie', 'images/flags/Algeria.png', '', 'H', 'Premier tour', 'Vahid Halilhodzic', 6),
(31, 'Russie', 'images/flags/Russia.png', '', 'H', 'Non qualifié', 'Fabio Capello', 0),
(32, 'Corée', 'images/flags/Korea.png', '', 'H', 'Huitièmes de finale', 'Kwang-rae Cho', 0);

-- --------------------------------------------------------

--
-- Structure de la table `brazil_top`
--

CREATE TABLE IF NOT EXISTS `brazil_top` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `team1` varchar(50) NOT NULL,
  `team2` varchar(50) CHARACTER SET utf16 NOT NULL,
  `team3` varchar(50) NOT NULL,
  `team4` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `brazil_top`
--

INSERT INTO `brazil_top` (`id`, `username`, `team1`, `team2`, `team3`, `team4`) VALUES
(1, 'Martine', ' Uruguay', ' Angleterre', ' Italie', ' Belgique'),
(2, 'Toto', ' Brésil', ' Espagne', ' Argentine', ' France'),
(3, 'Tonton', ' Colombie', ' Chili', ' Argentine', ' Portugal'),
(4, 'Essai', ' Uruguay', ' C. Ivoire', ' Espagne', ' Suisse');

-- --------------------------------------------------------

--
-- Structure de la table `brazil_user`
--

CREATE TABLE IF NOT EXISTS `brazil_user` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `isadmin` tinyint(1) NOT NULL,
  `points` int(11) NOT NULL,
  `team` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `brazil_user`
--

INSERT INTO `brazil_user` (`username`, `password`, `isadmin`, `points`, `team`) VALUES
('lauadmin', '9b924213b479c6f23cd2ae083d71ee86', 1, 0, 0),
('Martine', '21752033819b7b98bb69d8f582585655', 1, 0, 0),
('test', '098f6bcd4621d373cade4e832627b4f6', 0, 0, 2),
('Tonton', '142d50fa53b9002b5dd9357b48aa6cfe', 0, 0, 2),
('Toto', '4d8fc38123455b12879a07703234bda2', 0, 0, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
