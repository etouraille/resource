-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Lun 20 Octobre 2014 à 10:39
-- Version du serveur: 5.5.37-0ubuntu0.14.04.1
-- Version de PHP: 5.5.9-1ubuntu4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `resource`
--

DELIMITER $$
--
-- Fonctions
--
DROP FUNCTION IF EXISTS `DISTANCE`$$
CREATE DEFINER=`root`@`localhost` FUNCTION `DISTANCE`(lat1 DOUBLE, lng1 DOUBLE, lat2 DOUBLE, lng2 DOUBLE) RETURNS double
BEGIN
    DECLARE rlo1 DOUBLE;
    DECLARE rla1 DOUBLE;
    DECLARE rlo2 DOUBLE;
    DECLARE rla2 DOUBLE;
    DECLARE dlo DOUBLE;
    DECLARE dla DOUBLE;
    DECLARE a DOUBLE;
    
    SET rlo1 = RADIANS(lng1);
    SET rla1 = RADIANS(lat1);
    SET rlo2 = RADIANS(lng2);
    SET rla2 = RADIANS(lat2);
    SET dlo = (rlo2 - rlo1) / 2;
    SET dla = (rla2 - rla1) / 2;
    SET a = SIN(dla) * SIN(dla) + COS(rla1) * COS(rla2) * SIN(dlo) * SIN(dlo);
    RETURN (6378137 * 2 * ATAN2(SQRT(a), SQRT(1 - a)));
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `me`
--

DROP TABLE IF EXISTS `me`;
CREATE TABLE IF NOT EXISTS `me` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(245) NOT NULL,
  `pass` varchar(245) NOT NULL,
  `email` varchar(245) NOT NULL,
  `address` varchar(255) NOT NULL,
  `lat` decimal(15,7) NOT NULL,
  `long` decimal(15,7) NOT NULL,
  `description` varchar(255) NOT NULL,
  `tel` varchar(30) NOT NULL,
  `activated` varchar(255) NOT NULL,
  `firstName` varchar(123) NOT NULL,
  `lastName` varchar(123) NOT NULL,
  `company` varchar(246) NOT NULL,
  `companyType` int(1) NOT NULL,
  `addressWithNoCity` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `lastVisit` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Contenu de la table `me`
--

INSERT INTO `me` (`id`, `pseudo`, `pass`, `email`, `address`, `lat`, `long`, `description`, `tel`, `activated`, `firstName`, `lastName`, `company`, `companyType`, `addressWithNoCity`, `city`, `zipcode`, `country`, `lastVisit`) VALUES
(13, '', '3ed5ecc14e321c8042b3cffe338f6ffb', 'edouard.touraille@gmail.com', '', 0.0000000, 0.0000000, '', '', '', '', '', '', 0, '', '', '', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `resource`
--

DROP TABLE IF EXISTS `resource`;
CREATE TABLE IF NOT EXISTS `resource` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 NOT NULL,
  `idResourceType` int(11) NOT NULL,
  `lat` float NOT NULL,
  `lng` float NOT NULL,
  `idMe` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `resource-type`
--

DROP TABLE IF EXISTS `resource-type`;
CREATE TABLE IF NOT EXISTS `resource-type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `idMe` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `resource-type`
--

INSERT INTO `resource-type` (`id`, `name`, `idMe`) VALUES
(1, 'toto', 13);

-- --------------------------------------------------------

--
-- Structure de la table `token`
--

DROP TABLE IF EXISTS `token`;
CREATE TABLE IF NOT EXISTS `token` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idMe` int(11) NOT NULL,
  `value` varchar(255) CHARACTER SET utf8 NOT NULL,
  `creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `duration` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `token`
--

INSERT INTO `token` (`id`, `idMe`, `value`, `creation`, `duration`) VALUES
(1, 13, '85cf9dd1b0cbeae913852fdc304c4458', '2014-10-18 12:42:33', 31449600);

-- --------------------------------------------------------

--
-- Structure de la table `validation-resource`
--

DROP TABLE IF EXISTS `validation-resource`;
CREATE TABLE IF NOT EXISTS `validation-resource` (
  `idMe` int(11) NOT NULL,
  `idResource` int(11) NOT NULL,
  `valid` smallint(1) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;