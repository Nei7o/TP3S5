-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 06 Novembre 2014 à 20:30
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `mafia_organised_crime`
--

-- --------------------------------------------------------

--
-- Structure de la table `families`
--

CREATE TABLE IF NOT EXISTS `families` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mafia_id` int(11) NOT NULL DEFAULT '1',
  `name` varchar(20) COLLATE utf8_bin NOT NULL,
  `years_active` varchar(9) COLLATE utf8_bin NOT NULL,
  `territory` text COLLATE utf8_bin NOT NULL,
  `membership` int(11) NOT NULL DEFAULT '0',
  `criminal_activities` text COLLATE utf8_bin NOT NULL,
  `logo` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `Mafia_ID` (`mafia_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Structure de la table `mafias`
--

CREATE TABLE IF NOT EXISTS `mafias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `date_of_origin` date NOT NULL,
  `membership` int(11) NOT NULL DEFAULT '0',
  `activities` text COLLATE utf8_bin NOT NULL,
  `customs` varchar(300) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=15 ;

-- --------------------------------------------------------

--
-- Structure de la table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `family_id` int(11) NOT NULL DEFAULT '1',
  `family_name` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `name` varchar(20) COLLATE utf8_bin NOT NULL,
  `date_joined_clan` date NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `date_deceased` date DEFAULT NULL,
  `gender` varchar(5) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `age` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Clan_Number` (`family_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Structure de la table `members_skills`
--

CREATE TABLE IF NOT EXISTS `members_skills` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `skill_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_member` (`member_id`),
  KEY `id_skill` (`skill_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Structure de la table `skills`
--

CREATE TABLE IF NOT EXISTS `skills` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Contenu de la table `skills`
--

INSERT INTO `skills` (`id`, `name`, `description`) VALUES
(1, 'Hand-to-hand fighter', 'Very usefull in close combat'),
(2, 'Crossbow expert', 'A little old, but so stealthy');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  `rank` varchar(40) COLLATE utf8_bin NOT NULL DEFAULT 'super-utilisateur',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=5 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `rank`) VALUES
(1, 'test', 'test', 'test@test.com', ''),
(2, 'admin', 'f9d710faf9c1c7356bfc34b3c62a2463ee2b6a29', 'admin@test.com', 'admin'),
(3, 'author', '98685a068145b4b72b1e18d3b9dcba608c47afef', 'author@test.com', 'super-utilisateur'),
(4, 'author2', '98685a068145b4b72b1e18d3b9dcba608c47afef', 'author2@test.com', 'super-utilisateur');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `families`
--
ALTER TABLE `families`
  ADD CONSTRAINT `families_ibfk_3` FOREIGN KEY (`mafia_id`) REFERENCES `mafias` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `families_ibfk_2` FOREIGN KEY (`Mafia_ID`) REFERENCES `mafias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `mafias`
--
ALTER TABLE `mafias`
  ADD CONSTRAINT `mafias_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `members_ibfk_4` FOREIGN KEY (`family_id`) REFERENCES `families` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Contraintes pour la table `members_skills`
--
ALTER TABLE `members_skills`
  ADD CONSTRAINT `members_skills_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `members_skills_ibfk_2` FOREIGN KEY (`skill_id`) REFERENCES `skills` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
