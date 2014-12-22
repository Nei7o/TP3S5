-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 22 Décembre 2014 à 09:52
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
-- Structure de la table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Contenu de la table `countries`
--

INSERT INTO `countries` (`id`, `name`) VALUES
(1, 'United States'),
(2, 'Canada');

-- --------------------------------------------------------

--
-- Structure de la table `families`
--

CREATE TABLE IF NOT EXISTS `families` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mafia_id` int(11) NOT NULL DEFAULT '1',
  `name` varchar(20) COLLATE utf8_bin NOT NULL,
  `years_active` varchar(9) COLLATE utf8_bin NOT NULL,
  `country_id` varchar(255) COLLATE utf8_bin NOT NULL,
  `state_id` varchar(255) COLLATE utf8_bin NOT NULL,
  `membership` int(11) NOT NULL DEFAULT '0',
  `criminal_activities` varchar(255) COLLATE utf8_bin NOT NULL,
  `logo` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `Mafia_ID` (`mafia_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=14 ;

--
-- Contenu de la table `families`
--

INSERT INTO `families` (`id`, `mafia_id`, `name`, `years_active`, `country_id`, `state_id`, `membership`, `criminal_activities`, `logo`) VALUES
(11, 1, 'Family1', '1990-2011', '1', '1', 0, 'test', '11.jpg'),
(12, 1, 'Family2', '1990-2011', '1', '1', 0, 'Test2', '12.jpg'),
(13, 1, 'Famil3', '1990-2011', '1', '1', 0, 'testtestestestest', '13.jpg');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Contenu de la table `mafias`
--

INSERT INTO `mafias` (`id`, `id_user`, `name`, `date_of_origin`, `membership`, `activities`, `customs`) VALUES
(1, 5, 'Test', '2014-12-20', 13, 'test', 'test');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

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
-- Structure de la table `states`
--

CREATE TABLE IF NOT EXISTS `states` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `country_id` int(10) unsigned DEFAULT NULL,
  `name` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=62 ;

--
-- Contenu de la table `states`
--

INSERT INTO `states` (`id`, `country_id`, `name`) VALUES
(1, 1, 'Alabama'),
(2, 1, 'Alaska'),
(3, 1, 'Arizona'),
(4, 1, 'Arkansas'),
(5, 1, 'California'),
(6, 1, 'Colorado'),
(7, 1, 'Connecticut'),
(8, 1, 'Delaware'),
(9, 1, 'Florida'),
(10, 1, 'Georgia'),
(11, 1, 'Hawaii'),
(12, 1, 'Idaho'),
(13, 1, 'Illinois'),
(14, 1, 'Indiana'),
(15, 1, 'Iowa'),
(16, 1, 'Kansas'),
(17, 1, 'Kentucky'),
(18, 1, 'Louisiana'),
(19, 1, 'Maine'),
(20, 1, 'Maryland'),
(21, 1, 'Massachusetts'),
(22, 1, 'Michigan'),
(23, 1, 'Minnesota'),
(24, 1, 'Mississippi'),
(25, 1, 'Missouri'),
(26, 1, 'Montana'),
(27, 1, 'Nebraska'),
(28, 1, 'Nevada'),
(29, 1, 'New Hampshire'),
(30, 1, 'New Jersey'),
(31, 1, 'New Mexico'),
(32, 1, 'New Mexico'),
(33, 1, 'New York'),
(34, 1, 'North Carolina'),
(35, 1, 'North Dakota'),
(36, 1, 'Ohio'),
(37, 1, 'Oklahoma'),
(38, 1, 'Oregon'),
(39, 1, 'Pennsylvavia'),
(40, 1, 'Rhode Island'),
(41, 1, 'South Carolina'),
(42, 1, 'South Dakota'),
(43, 1, 'Tennesse'),
(44, 1, 'Texas'),
(45, 1, 'Utah'),
(46, 1, 'Vermont'),
(47, 1, 'Virginia'),
(48, 1, 'Washington'),
(49, 1, 'West Virginia'),
(50, 1, 'Wisconsin'),
(51, 1, 'Wyoming'),
(52, 2, 'Ontario'),
(53, 2, 'Quebec'),
(54, 2, 'Nova Scotia'),
(55, 2, 'New Brunswick'),
(56, 2, 'Manitoba'),
(57, 2, 'British Colombia'),
(58, 2, 'Prince Edward Island'),
(59, 2, 'Saskatchwan'),
(60, 2, 'Alberta'),
(61, 2, 'Newfoundland and Labrador');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  `rank` varchar(40) COLLATE utf8_bin NOT NULL DEFAULT 'normal',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=17 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `rank`) VALUES
(1, 'test', 'test', 'test@test.com', ''),
(3, 'author', '98685a068145b4b72b1e18d3b9dcba608c47afef', 'author@test.com', 'super-utilisateur'),
(4, 'author2', '98685a068145b4b72b1e18d3b9dcba608c47afef', 'author2@test.com', 'super-utilisateur'),
(5, 'admin', '504a8aa44a3350c1e43242b48e313db68de9bfcb', 'admin@moc.com', 'admin'),
(15, 'damiendes', 'd07cbc3e701a5edf70b9ac9271ff61c14061a7b4', 'damiendes@msn.com', 'super-utilisateur'),
(16, 'damiendes21', 'd07cbc3e701a5edf70b9ac9271ff61c14061a7b4', 'damiendes@msn.com', 'normal');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `families`
--
ALTER TABLE `families`
  ADD CONSTRAINT `families_ibfk_2` FOREIGN KEY (`Mafia_ID`) REFERENCES `mafias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `families_ibfk_3` FOREIGN KEY (`mafia_id`) REFERENCES `mafias` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

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
