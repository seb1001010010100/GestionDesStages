-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mer 19 Septembre 2018 à 20:04
-- Version du serveur :  5.6.37
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `Application`
--

/*

TABLES:
 - administrators
 - client_types
 - companies
 - establishments
 - genders
 - internships
 - missions
 - ownership_statuses
 - regions
 - sessions
 - students
 - users

 - internship_clienttype_xrefs
 - internship_mission_xrefs

*/

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS users (
    id INT(11) NOT NULL,
    username VARCHAR(50),
    password VARCHAR(255),
    role VARCHAR(20),
    created DATE NOT NULL,
    modified DATE NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `administrators`
--

CREATE TABLE IF NOT EXISTS `administrators` (
  `id` int(11) NOT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `place` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adress` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `province` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postal_code` char(6) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` int(10) DEFAULT NULL,
  `position` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cell` int(10) DEFAULT NULL,
  `fax` int(10) DEFAULT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `client_types`
--

CREATE TABLE IF NOT EXISTS `client_types` (
  `id` int(11) NOT NULL,
  `type` varchar(255) CHARACTER SET utf8 NOT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `internship_clienttype_xrefs`
--

CREATE TABLE IF NOT EXISTS `internship_clienttype_xrefs` (
  `id` int(11) NOT NULL,
  `internship_id` int(11) NOT NULL,
  `clienttype_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `internship_mission_xrefs`
--

CREATE TABLE IF NOT EXISTS `internship_mission_xrefs` (
  `id` int(11) NOT NULL,
  `internship_id` int(11) NOT NULL,
  `mission_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `companies`
--

CREATE TABLE IF NOT EXISTS `companies` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adress` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `province` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `establishment_id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` int(10) DEFAULT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `establishments`
--

CREATE TABLE IF NOT EXISTS `establishments` (
  `id` int(11) NOT NULL,
  `type` varchar(255) CHARACTER SET utf8 NOT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `genders`
--

CREATE TABLE IF NOT EXISTS `genders` (
  `id` int(11) NOT NULL,
  `categorie` varchar(255) CHARACTER SET utf8 NOT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `missions`
--

CREATE TABLE IF NOT EXISTS `missions` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `internships`
--

CREATE TABLE IF NOT EXISTS `internships` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `session_id` int(11) NOT NULL,
  `ownerStatus_id` int(11) NOT NULL,
  `region_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `task` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `precision_facility` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `precision_task` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adress` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `province` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postal_code` char(6) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` int(10) NOT NULL,
  `fax` int(10) DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ownership_statuses`
--

CREATE TABLE IF NOT EXISTS `ownership_statuses` (
  `id` int(11) NOT NULL,
  `type` varchar(255) CHARACTER SET utf8 NOT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `regions`
--

CREATE TABLE IF NOT EXISTS `regions` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `id` int(11) NOT NULL,
  `year` char(4) COLLATE utf8_unicode_ci NOT NULL,
  `season` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created` date NOT NULL,
  `modified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone_sms` char(13) COLLATE utf8_unicode_ci DEFAULT NULL,
  `more_info` text COLLATE utf8_unicode_ci,
  `notes` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created` date NOT NULL,
  `modified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Index pour la table `administrators`
--
ALTER TABLE `administrators`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);
--
-- Index pour la table `client_types`
--
ALTER TABLE `client_types`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `companies_establishments_fk` (`establishment_id`);

--
-- Index pour la table `establishments`
--
ALTER TABLE `establishments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `genders`
--
ALTER TABLE `genders`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `internships`
--
ALTER TABLE `internships`
  ADD PRIMARY KEY (`id`),
  ADD KEY `internships_companies_fk` (`company_id`),
  ADD KEY `session_id` (`session_id`),
  ADD KEY `session_id_2` (`session_id`),
  ADD KEY `region_id` (`region_id`),
  ADD KEY `ownerStatus_id` (`ownerStatus_id`);

--
-- Index pour la table `ownership_statuses`
--
ALTER TABLE `ownership_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- Index pour la table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `missions`
--
ALTER TABLE `missions`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `internship_clienttype_xrefs`
  ADD PRIMARY KEY (`id`),
  ADD KEY (`internship_id`),
  ADD KEY (`clienttype_id`);

ALTER TABLE `internship_mission_xrefs`
  ADD PRIMARY KEY (`id`),
  ADD KEY (`internship_id`),
  ADD KEY (`mission_id`);
--
-- AUTO_INCREMENT pour la table `administrators`
--
ALTER TABLE `administrators`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `internships`
--
ALTER TABLE `internships`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--
ALTER TABLE `missions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `internship_clienttype_xrefs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `internship_mission_xrefs`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour la table `companies`
--
ALTER TABLE `companies`
  ADD CONSTRAINT `companies_establishments_fk` FOREIGN KEY (`establishment_id`) REFERENCES `establishments` (`id`);

--
-- Contraintes pour la table `internships`
--
ALTER TABLE `internships`
  ADD CONSTRAINT `internships_companies_fk` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`),
  ADD CONSTRAINT `internships_ibfk_1` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`),
  ADD CONSTRAINT `internships_ibfk_2` FOREIGN KEY (`ownerStatus_id`) REFERENCES `ownership_statuses` (`id`),
  ADD CONSTRAINT `internships_sessions_fk` FOREIGN KEY (`session_id`) REFERENCES `sessions` (`id`);

ALTER TABLE `internship_clienttype_xrefs`
  ADD CONSTRAINT `internClient_xref_fk` FOREIGN KEY (`internship_id`) REFERENCES `internships` (`id`),
  ADD CONSTRAINT `client_xref_fk` FOREIGN KEY (`clienttype_id`) REFERENCES `client_types` (`id`);

ALTER TABLE `internship_mission_xrefs`
  ADD CONSTRAINT `internMission_xref_fk` FOREIGN KEY (`internship_id`) REFERENCES `internships` (`id`),
  ADD CONSTRAINT `mission_xref_fk` FOREIGN KEY (`mission_id`) REFERENCES `missions` (`id`);


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


INSERT INTO `establishments` (`id`, `type`, `created`, `modified`) VALUES
(1, 'Centre de réadaptation', '0000-00-00', '0000-00-00'),
(2, 'Centre hospitalier', '0000-00-00', '0000-00-00'),
(3, 'Centre hospitalier et d''hébergement pour vétérans', '0000-00-00', '0000-00-00'),
(4, 'Centre hospitalier psychiatrique', '0000-00-00', '0000-00-00'),
(5, 'CHSLD', '0000-00-00', '0000-00-00'),
(6, 'CHSLD et CLSC', '0000-00-00', '0000-00-00'),
(7, 'CHSLD pour religieuses', '0000-00-00', '0000-00-00'),
(8, 'Clinique privée', '0000-00-00', '0000-00-00'),
(9, 'Clinique publique', '0000-00-00', '0000-00-00'),
(10, 'CLSC', '0000-00-00', '0000-00-00'),
(11, 'UTRF', '0000-00-00', '0000-00-00');

INSERT INTO `client_types` (`id`, `type`, `created`, `modified`) VALUES
(1, 'Neurologie, pédiatrie poss d''ortho/rhumato', '0000-00-00', '0000-00-00'),
(2, 'Ortho/rhumato', '0000-00-00', '0000-00-00'),
(3, 'Ortho/rhumato et perte d''autonomie', '0000-00-00', '0000-00-00'),
(4, 'orthopédie/rhumatologie', '0000-00-00', '0000-00-00'),
(5, 'orthopédie/rhumatologie principalement', '0000-00-00', '0000-00-00'),
(6, 'orthopédie/rhumatologie, Perte d''Autonomie', '0000-00-00', '0000-00-00'),
(7, 'Perte autonomie fonctionnelle', '0000-00-00', '0000-00-00'),
(8, 'Perte d''autonomie', '0000-00-00', '0000-00-00'),
(9, 'Perte d''autonomie et ortho/rhumato', '0000-00-00', '0000-00-00'),
(10, 'Perte d''autonomie un peu de neuro et d''ortho', '0000-00-00', '0000-00-00'),
(11, 'Perte d''autonomie, cardiorespiratoire, palliatif', '0000-00-00', '0000-00-00'),
(12, 'Perte d''autonomie, neuro et quelques cas ortho', '0000-00-00', '0000-00-00'),
(13, 'Perte d''autonomie, neurologie (cas séquélaires et évolutifs)', '0000-00-00', '0000-00-00'),
(14, 'Perte d''autonomie, ortho, cardio, neuro', '0000-00-00', '0000-00-00'),
(15, 'Perte d''autonomie, ortho/rhumato', '0000-00-00', '0000-00-00'),
(16, 'Perte d''autonomie, ortho/rhumato, cardiorespiratoire', '0000-00-00', '0000-00-00'),
(17, 'Perte d''autonomie, orthopédie/rhumato, neuro', '0000-00-00', '0000-00-00'),
(18, 'Perte d''autonomie, Orthopédie/rhumatologie', '0000-00-00', '0000-00-00'),
(19, 'Perte d''autonomie, orthopédie/rhumatologie, neuro', '0000-00-00', '0000-00-00'),
(20, 'Perte d''autonomie, orthopédie/rhumatologie, neuro, cardiorespiratoire', '0000-00-00', '0000-00-00'),
(21, 'Principalement ortho/rhumato, un peu de perte d''autonomie', '0000-00-00', '0000-00-00');

INSERT INTO `genders` (`id`, `categorie`, `created`, `modified`) VALUES
(1, 'Madame', '0000-00-00', '0000-00-00'),
(2, 'Madame, Monsieur', '0000-00-00', '0000-00-00'),
(3, 'Mesdames', '0000-00-00', '0000-00-00'),
(4, 'Mesdames, Monsieur', '0000-00-00', '0000-00-00'),
(5, 'Monsieur', '0000-00-00', '0000-00-00'),
(6, 'Messieurs', '0000-00-00', '0000-00-00'),
(7, 'Madame, Messieurs', '0000-00-00', '0000-00-00'),
(8, 'Mesdames, Messieurs', '0000-00-00', '0000-00-00');

INSERT INTO `missions` (`id`, `name`, `created`, `modified`) VALUES
(1, 'UTRF', 0, 0),
(2, 'Soins de clientèle hébergée et hôpital de jour', 0, 0),
(3, 'Soins de clientèle hébergée et externe', 0, 0),
(4, 'Soins de clientèle externe, hospitalisée et hébergée, rééducation et renforcement au travail', 0, 0),
(5, 'Soins de clientèle externe', 0, 0),
(6, 'Soins clientèle hospitalisée', 0, 0),
(7, 'Soins clientèle hébergée, soins de clientèle en convalescence', 0, 0),
(8, 'Soins clientèle hébergée et hospitalisée', 0, 0),
(9, 'Soins clientèle hébergée et externe', 0, 0),
(10, 'Soins clientèle hébergée', 0, 0),
(11, 'Soins clientèle hébergé et possibilité de Centre de jour', 0, 0),
(12, 'Soins clientèle externe, rééducation au travail', 0, 0),
(13, 'Soins clientèle externe et interne', 0, 0),
(14, 'Soins clientèle externe et hospitalisée', 0, 0),
(15, 'Soins clientèle externe et hébergée', 0, 0),
(16, 'Soins clientèle externe et à domicile', 0, 0),
(17, 'Soins clientèle externe', 0, 0),
(18, 'Soins clientèle à domicile et en hébergement, Centre de jour', 0, 0),
(19, 'Soins clientèle à domicile et clientèle externe', 0, 0),
(20, 'Soins clientèle à domicile', 0, 0),
(21, 'Recherche clinique', 0, 0),
(22, 'Hôpital de jour', 0, 0),
(23, 'Centre de jour, soins de clientèle hébergée', 0, 0),
(24, 'Centre de jour et soins à domicile', 0, 0),
(25, 'Centre de jour et hôpital de jour', 0, 0),
(26, 'Centre de jour', 0, 0),
(27, 'CDJ et soins clientèle hébergée', 0, 0);

INSERT INTO `ownership_statuses` (`id`, `type`, `created`, `modified`) VALUES
(1, 'Partenariat public/privé', '0000-00-00', '0000-00-00'),
(2, 'Public', '0000-00-00', '0000-00-00'),
(3, 'Privé', '0000-00-00', '0000-00-00'),
(4, 'Conventionné', '0000-00-00', '0000-00-00');

INSERT INTO `regions` (`id`, `name`, `created`, `modified`) VALUES
(1, 'Bas Saint-Laurent', '0000-00-00', '0000-00-00'),
(2, 'Saguenay - Lac-Saint-Jean', '0000-00-00', '0000-00-00'),
(3, 'Capitale Nationale', '0000-00-00', '0000-00-00'),
(4, 'Mauricie', '0000-00-00', '0000-00-00'),
(5, 'Estrie', '0000-00-00', '0000-00-00'),
(6, 'Montréal', '0000-00-00', '0000-00-00'),
(7, 'Outaouais', '0000-00-00', '0000-00-00'),
(8, 'Abitibi-Témiscamingue', '0000-00-00', '0000-00-00'),
(9, 'Côte-Nord', '0000-00-00', '0000-00-00'),
(10, 'Nord-du-Québec', '0000-00-00', '0000-00-00'),
(11, 'Gaspésie-Iles-de-la-Madeleine', '0000-00-00', '0000-00-00'),
(12, 'Chaudières-Appalaches', '0000-00-00', '0000-00-00'),
(13, 'Laval', '0000-00-00', '0000-00-00'),
(14, 'Lanaudière', '0000-00-00', '0000-00-00'),
(15, 'Laurentides', '0000-00-00', '0000-00-00'),
(16, 'Montérégie', '0000-00-00', '0000-00-00'),
(17, 'Centre-du-Québec', '0000-00-00', '0000-00-00');

INSERT INTO `sessions` (`year`, `season`, `active`, `created`, `modified`) 
  VALUES ('2018', 'Automne', '1', '2018-09-29', '2018-09-29');

INSERT INTO `companies` (`name`, `adress`, `city`, `province`, `establishment_id`, `email`, `phone`, `created`, `modified`) 
  VALUES ('google', 'ca', 'silicone', 'flower', '1', 'c@c.ca', '1231231234', '2018-09-29', '2018-09-29');

INSERT INTO `internships` (`company_id`, `session_id`, `ownerStatus_id`, `region_id`, `name`, `task`, `precision_facility`, `precision_task`, `adress`, `city`, `province`, `postal_code`, `phone`, `fax`, `email`, `created`, `modified`) 
  VALUES ('1', '1', '1', '8', 'Dev web', 'écrire dans des fichier .php', 'what?', ':(', '123', 'Laval', 'Quebec', '1h1h1h', '1234567891', '789456123', 'yeah@gmail.com', '2018-09-29', '2018-09-29');

INSERT INTO `internship_clienttype_xrefs` (`internship_id`, `clienttype_id`) VALUES 
  ('1', '1'),
  ('1', '3'),
  ('1', '4');

INSERT INTO `internship_mission_xrefs` (`internship_id`, `mission_id`) VALUES 
  ('1', '1'),
  ('1', '2'),
  ('1', '3'),
  ('1', '4');

INSERT INTO `administrators` (`gender`, `first_name`, `last_name`, `title`, `place`, `adress`, `city`, `province`, `postal_code`, `email`, `phone`, `position`, `cell`, `fax`, `created`, `modified`) 
  VALUES ('what?', 'Susumu', 'Hirasawa', 'Admin in charge', NULL, NULL, NULL, NULL, NULL, 'a@a.ca', NULL, NULL, NULL, NULL, '2018-09-29', '2018-09-29');

INSERT INTO `students` (`first_name`, `last_name`, `email`, `password`, `phone_sms`, `more_info`, `notes`, `active`, `created`, `modified`) 
  VALUES ('Archy', 'Marshall', 's@s.ca', 'lol?', NULL, NULL, NULL, '1', '2018-09-29', '2018-09-29');

-- all of the passwords are 123
INSERT INTO users (username, password, role, created, modified) VALUES 
  ('s@s.ca', '$2y$10$ONneUhzLKfpWoiKMeFi0au7/wxcqV/6CyTsAzCAWDF.XkdWqGMkRm', 'student', '2018-09-29', '2018-09-29');
INSERT INTO users (username, password, role, created, modified) VALUES 
  ('a@a.ca', '$2y$10$ONneUhzLKfpWoiKMeFi0au7/wxcqV/6CyTsAzCAWDF.XkdWqGMkRm', 'administrator', '2018-09-29', '2018-09-29');
INSERT INTO users (username, password, role, created, modified) VALUES 
  ('c@c.ca', '$2y$10$ONneUhzLKfpWoiKMeFi0au7/wxcqV/6CyTsAzCAWDF.XkdWqGMkRm', 'company', '2018-09-29', '2018-09-29');

