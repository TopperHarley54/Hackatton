-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 18 Mars 2016 à 23:02
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `hackathon`
--

-- --------------------------------------------------------

--
-- Structure de la table `alerte`
--

CREATE TABLE IF NOT EXISTS `alerte` (
  `id_alerte` int(10) NOT NULL AUTO_INCREMENT,
  `lat` varchar(20) NOT NULL,
  `lng` varchar(20) NOT NULL,
  `type` varchar(50) NOT NULL,
  `commentaire` varchar(255) NOT NULL,
  `nbValide` int(10) NOT NULL DEFAULT '0',
  `nbRefus` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_alerte`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
