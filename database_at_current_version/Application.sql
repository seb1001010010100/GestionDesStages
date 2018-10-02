-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 02 Octobre 2018 à 23:15
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

--
-- Contenu de la table `client_types`
--

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `companies`
--

INSERT INTO `companies` (`id`, `name`, `adress`, `city`, `province`, `establishment_id`, `email`, `phone`, `created`, `modified`) VALUES
(5, 'copmganie_test', '1234', NULL, NULL, 1, '1@r.com', NULL, '0000-00-00', '0000-00-00'),
(7, 'Crayon', '1234', '', '', 1, '1@h.com', NULL, '2018-09-26', '2018-09-26');

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

--
-- Contenu de la table `establishments`
--

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

--
-- Contenu de la table `genders`
--

INSERT INTO `genders` (`id`, `categorie`, `created`, `modified`) VALUES
(1, 'Madame', '0000-00-00', '0000-00-00'),
(2, 'Madame, Monsieur', '0000-00-00', '0000-00-00'),
(3, 'Mesdames', '0000-00-00', '0000-00-00'),
(4, 'Mesdames, Monsieur', '0000-00-00', '0000-00-00'),
(5, 'Monsieur', '0000-00-00', '0000-00-00'),
(6, 'Messieurs', '0000-00-00', '0000-00-00'),
(7, 'Madame, Messieurs', '0000-00-00', '0000-00-00'),
(8, 'Mesdames, Messieurs', '0000-00-00', '0000-00-00');

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
  `clientType_id` int(11) NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `internships`
--

INSERT INTO `internships` (`id`, `company_id`, `session_id`, `ownerStatus_id`, `region_id`, `clientType_id`, `name`, `task`, `precision_facility`, `precision_task`, `adress`, `city`, `province`, `postal_code`, `phone`, `fax`, `email`, `created`, `modified`) VALUES
(1, 5, 1, 2, 1, 1, 'Nom', 'Task', 'Precision', 'PrecionT', '1234', 'tr', 're', '555555', 2147483647, 2147483647, 'r@s.com', '2018-09-26', '2018-09-26');

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

--
-- Contenu de la table `missions`
--

INSERT INTO `missions` (`id`, `name`, `created`, `modified`) VALUES
(3, 'UTRF', 0, 0),
(4, 'Soins de clientèle hébergée et hôpital de jour', 0, 0),
(5, 'Soins de clientèle hébergée et externe', 0, 0),
(6, 'Soins de clientèle externe, hospitalisée et hébergée, rééducation et renforcement au travail', 0, 0),
(7, 'Soins de clientèle externe', 0, 0),
(8, 'Soins clientèle hospitalisée', 0, 0),
(9, 'Soins clientèle hébergée, soins de clientèle en convalescence', 0, 0),
(10, 'Soins clientèle hébergée et hospitalisée', 0, 0),
(11, 'Soins clientèle hébergée et externe', 0, 0),
(12, 'Soins clientèle hébergée', 0, 0),
(13, 'Soins clientèle hébergé et possibilité de Centre de jour', 0, 0),
(14, 'Soins clientèle externe, rééducation au travail', 0, 0),
(15, 'Soins clientèle externe et interne', 0, 0),
(16, 'Soins clientèle externe et hospitalisée', 0, 0),
(17, 'Soins clientèle externe et hébergée', 0, 0),
(18, 'Soins clientèle externe et à domicile', 0, 0),
(19, 'Soins clientèle externe', 0, 0),
(20, 'Soins clientèle à domicile et en hébergement, Centre de jour', 0, 0),
(21, 'Soins clientèle à domicile et clientèle externe', 0, 0),
(22, 'Soins clientèle à domicile', 0, 0),
(23, 'Recherche clinique', 0, 0),
(24, 'Hôpital de jour', 0, 0),
(25, 'Centre de jour, soins de clientèle hébergée', 0, 0),
(26, 'Centre de jour et soins à domicile', 0, 0),
(27, 'Centre de jour et hôpital de jour', 0, 0),
(28, 'Centre de jour', 0, 0),
(29, 'CDJ et soins clientèle hébergée', 0, 0);

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

--
-- Contenu de la table `ownership_statuses`
--

INSERT INTO `ownership_statuses` (`id`, `type`, `created`, `modified`) VALUES
(0, 'Partenariat public/privé', '0000-00-00', '0000-00-00'),
(1, 'Public', '0000-00-00', '0000-00-00'),
(2, 'Privé', '0000-00-00', '0000-00-00'),
(3, 'Conventionné', '0000-00-00', '0000-00-00');

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

--
-- Contenu de la table `regions`
--

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `sessions`
--

INSERT INTO `sessions` (`id`, `year`, `season`, `active`, `created`, `modified`) VALUES
(1, '2018', 'Automne', 1, '2018-09-26', '2018-09-26');

-- --------------------------------------------------------

--
-- Structure de la table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `phone_sms` char(13) COLLATE utf8_unicode_ci DEFAULT NULL,
  `more_info` text COLLATE utf8_unicode_ci,
  `notes` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created` date NOT NULL,
  `modified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `created`, `modified`) VALUES
(1, 'test', '$2y$10$ONneUhzLKfpWoiKMeFi0au7/wxcqV/6CyTsAzCAWDF.XkdWqGMkRm', 'student', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'test2', '1234', 'administrator', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'test2@e.com', '1234', 'administrator', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `administrators`
--
ALTER TABLE `administrators`
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
  ADD KEY `ownerStatus_id` (`ownerStatus_id`),
  ADD KEY `clientType_id` (`clientType_id`);

--
-- Index pour la table `missions`
--
ALTER TABLE `missions`
  ADD PRIMARY KEY (`id`);

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
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `administrators`
--
ALTER TABLE `administrators`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `internships`
--
ALTER TABLE `internships`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `missions`
--
ALTER TABLE `missions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT pour la table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Contraintes pour les tables exportées
--

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
  ADD CONSTRAINT `internships_ibfk_3` FOREIGN KEY (`clientType_id`) REFERENCES `client_types` (`id`),
  ADD CONSTRAINT `internships_sessions_fk` FOREIGN KEY (`session_id`) REFERENCES `sessions` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
