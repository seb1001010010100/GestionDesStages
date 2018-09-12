-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mer 12 Septembre 2018 à 18:32
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
  `phone` int(9) DEFAULT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `internships`
--

CREATE TABLE IF NOT EXISTS `internships` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `session_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adress` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `province` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postal_code` char(6) COLLATE utf8_unicode_ci DEFAULT NULL,
  `administrative_region` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `id` int(9) NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `phone_sms` int(10) DEFAULT NULL,
  `more_info` text COLLATE utf8_unicode_ci,
  `notes` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created` date NOT NULL,
  `modified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `id` int(11) NOT NULL,
  `year` char(4) NOT NULL,
  `season` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created` date NOT NULL,
  `modified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `establishments`
--

CREATE TABLE IF NOT EXISTS `establishments` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `establishments` (type) values 
(`Centre de réadaptation`),
(`Centre hospitalier`),
(`Centre hospitalier et d'hébergement pour vétérans`),
(`Centre hospitalier psychiatrique`),
(`CHSLD`),
(`CHSLD et CLSC`),
(`CHSLD pour religieuses`),
(`Clinique privée`),
(`Clinique publique`),
(`CLSC`),
(`UTRF`);

-- --------------------------------------------------------

--
-- Structure de la table `client_type`
--

CREATE TABLE IF NOT EXISTS `client_types` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `client_type` (type) values 
(`Neurologie, pédiatrie poss d'ortho/rhumato`),
(`Ortho/rhumato`),
(`Ortho/rhumato et perte d'autonomie`),
(`orthopédie/rhumatologie`),
(`orthopédie/rhumatologie principalement`),
(`orthopédie/rhumatologie, Perte d'Autonomie`),
(`Perte autonomie fonctionnelle`),
(`Perte d'autonomie`),
(`Perte d'autonomie et ortho/rhumato`),
(`Perte d'autonomie un peu de neuro et d'ortho`),
(`Perte d'autonomie, cardiorespiratoire, palliatif`),
(`Perte d'autonomie, neuro et quelques cas ortho`),
(`Perte d'autonomie, neurologie (cas séquélaires et évolutifs)`),
(`Perte d'autonomie, ortho, cardio, neuro`),
(`Perte d'autonomie, ortho/rhumato`),
(`Perte d'autonomie, ortho/rhumato, cardiorespiratoire`),
(`Perte d'autonomie, orthopédie/rhumato, neuro`),
(`Perte d'autonomie, Orthopédie/rhumatologie`),
(`Perte d'autonomie, orthopédie/rhumatologie, neuro`),
(`Perte d'autonomie, orthopédie/rhumatologie, neuro, cardiorespiratoire`),
(`Principalement ortho/rhumato, un peu de perte d'autonomie`);

-- type de milieu
CREATE TABLE IF NOT EXISTS `ownership_statuses` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `ownership_status` (type) values 
(`Public`),
(`Privé`),
(`Conventionné`);

CREATE TABLE IF NOT EXISTS `genders` (
  `id` int(11) NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `gender` (type) values 
(`Madame`),
(`Madame, Monsieur`),
(`Mesdames`),
(`Mesdames, Monsieur`),
(`Monsieur`),
(`Messieurs`),
(`Madame, Messieurs`),
(`Mesdames, Messieurs`);


CREATE TABLE IF NOT EXISTS `regions` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `regions` (name) VALUES
(`Bas Saint-Laurent`),
(`Saguenay - Lac-Saint-Jean`),
(`Capitale Nationale`),
(`Mauricie`),
(`Estrie`),
(`Montréal`),
(`Outaouais`),
(`Abitibi-Témiscamingue`),
(`Côte-Nord`),
(`Nord-du-Québec`),
(`Gaspésie-Iles-de-la-Madeleine`),
(`Chaudières-Appalaches`),
(`Laval`),
(`Lanaudière`),
(`Laurentides`),
(`Montérégie`),
(`Centre-du-Québec`);

--
-- Declaration primary key
--
ALTER TABLE `administrators`
  ADD PRIMARY KEY (`id`);
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);
--
ALTER TABLE `internships`
  ADD PRIMARY KEY (`id`);
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);
--
ALTER TABLE `sessions`
	ADD PRIMARY KEY (`id`);
--
ALTER TABLE `establishments`
	ADD PRIMARY KEY (`id`);	
  --
ALTER TABLE `client_type`
  ADD PRIMARY KEY (`id`); 
  --
ALTER TABLE `ownership_status`
  ADD PRIMARY KEY (`id`); 
  --
ALTER TABLE `gender`
  ADD PRIMARY KEY (`id`); 
  --
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`); 
  
--
-- MODIF table `administrators`
-- AUTO_INCREMENT pour la table `administrators`
--
ALTER TABLE `administrators`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
  
--
-- MODIF table `companies`
-- AUTO_INCREMENT pour la table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
-- Contraintes pour la table `companies`
ALTER TABLE `companies`
	ADD CONSTRAINT `companies_establishments_fk` FOREIGN KEY (`establishment_id`) REFERENCES `establishments` (`id`);
  
--
-- MODIF table `sessions`
-- AUTO_INCREMENT pour la table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- MODIF table `Interships`
-- Contrainte pour la table `Interships`
--
ALTER TABLE `internships`
	ADD CONSTRAINT `internships_companies_fk` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`);

--
-- MODIF table `sessions`
-- Contraintes pour la table `sessions`
--
ALTER TABLE `internships`
	MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
-- Déclaration des contraintes pour la table `sessions`
ALTER TABLE `internships`
	ADD CONSTRAINT `internships_sessions_fk` FOREIGN KEY (`session_id`) REFERENCES `sessions` (`id`);
  
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
