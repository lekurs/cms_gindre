-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 21 sep. 2018 à 17:55
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `cms_gindre`
--

-- --------------------------------------------------------

--
-- Structure de la table `cms_gindre_contact`
--

DROP TABLE IF EXISTS `cms_gindre_contact`;
CREATE TABLE IF NOT EXISTS `cms_gindre_contact` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:uuid)',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_one` int(11) DEFAULT NULL,
  `phone_mobile` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `main` tinyint(1) DEFAULT NULL,
  `role_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '(DC2Type:uuid)',
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '(DC2Type:uuid)',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_DFEAE8B6989D9B62` (`slug`),
  UNIQUE KEY `UNIQ_DFEAE8B61D358679` (`phone_one`),
  UNIQUE KEY `UNIQ_DFEAE8B6C1E280EF` (`phone_mobile`),
  UNIQUE KEY `UNIQ_DFEAE8B6E7927C74` (`email`),
  KEY `IDX_DFEAE8B6D60322AC` (`role_id`),
  KEY `IDX_DFEAE8B64D16C4DD` (`shop_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `cms_gindre_contact`
--

INSERT INTO `cms_gindre_contact` (`id`, `name`, `last_name`, `phone_one`, `phone_mobile`, `email`, `main`, `role_id`, `slug`, `shop_id`) VALUES
('a936f58d-ffd5-4c35-90a4-5df0c9fea36d', 'gindre', 'maxime', NULL, 670061107, 'test@test.com', 1, '546d7470-ff50-4745-ae4d-cff7a5280413', 'gindre-maxime', 'fa6e242c-121a-4028-a0c4-1f3bdacf1d90');

-- --------------------------------------------------------

--
-- Structure de la table `cms_gindre_contact_type`
--

DROP TABLE IF EXISTS `cms_gindre_contact_type`;
CREATE TABLE IF NOT EXISTS `cms_gindre_contact_type` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:uuid)',
  `type` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_FF623FF78CDE5729` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `cms_gindre_contact_type`
--

INSERT INTO `cms_gindre_contact_type` (`id`, `type`) VALUES
('1c96ab73-c18a-4db6-afe8-62bf0dcb6e3d', 'Mail'),
('26d261d1-c96d-4b3e-9b27-1b8756b73e8a', 'Téléphone');

-- --------------------------------------------------------

--
-- Structure de la table `cms_gindre_message`
--

DROP TABLE IF EXISTS `cms_gindre_message`;
CREATE TABLE IF NOT EXISTS `cms_gindre_message` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:uuid)',
  `contact_type_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '(DC2Type:uuid)',
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_contact` date NOT NULL,
  `shop_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '(DC2Type:uuid)',
  PRIMARY KEY (`id`),
  KEY `IDX_25353EF15F63AD12` (`contact_type_id`),
  KEY `IDX_25353EF14D16C4DD` (`shop_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `cms_gindre_order`
--

DROP TABLE IF EXISTS `cms_gindre_order`;
CREATE TABLE IF NOT EXISTS `cms_gindre_order` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:uuid)',
  `shop_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '(DC2Type:uuid)',
  `date_order` date NOT NULL,
  `product_type_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '(DC2Type:uuid)',
  PRIMARY KEY (`id`),
  KEY `IDX_BA2CD34C4D16C4DD` (`shop_id`),
  KEY `IDX_BA2CD34C14959723` (`product_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `cms_gindre_product_type`
--

DROP TABLE IF EXISTS `cms_gindre_product_type`;
CREATE TABLE IF NOT EXISTS `cms_gindre_product_type` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:uuid)',
  `product` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_5A759FA9D34A04AD` (`product`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `cms_gindre_product_type`
--

INSERT INTO `cms_gindre_product_type` (`id`, `product`) VALUES
('42d3f05e-9625-4d4f-994c-860b0233b464', 'Corps et visage'),
('c1519b89-73ad-444e-93c6-2cba8eb9f124', 'Visage');

-- --------------------------------------------------------

--
-- Structure de la table `cms_gindre_region`
--

DROP TABLE IF EXISTS `cms_gindre_region`;
CREATE TABLE IF NOT EXISTS `cms_gindre_region` (
  `id` int(11) NOT NULL,
  `dept` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `region` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `cms_gindre_region`
--

INSERT INTO `cms_gindre_region` (`id`, `dept`, `region`, `zip`) VALUES
(1, 'Bas-Rhin', 'Alsace', 67),
(2, 'Haut-Rhin', 'Alsace', 68),
(3, 'Dordogne', 'Aquitaine', 24),
(4, 'Gironde', 'Aquitaine', 33),
(5, 'Landes', 'Aquitaine', 40),
(6, 'Lot-et-Garonne', 'Aquitaine', 47),
(7, 'Pyrénées-Atlantiques', 'Aquitaine', 64),
(8, 'Allier', 'Auvergne', 3),
(9, 'Cantal', 'Auvergne', 15),
(10, 'Haute-Loire', 'Auvergne', 43),
(11, 'Puy-de-Dôme', 'Auvergne', 63),
(12, 'Calvados', 'Basse-Normandie', 14),
(13, 'Orne', 'Basse-Normandie', 61),
(14, 'Côte d\'Or', 'Bourgogne', 21),
(15, 'Nièvre', 'Bourgogne', 58),
(16, 'Saône-et-Loire', 'Bourgogne', 71),
(17, 'Yonne', 'Bourgogne', 89),
(18, 'Côtes d\'Armor', 'Bretagne', 22),
(19, 'Finistère', 'Bretagne', 29),
(20, 'Ille-et-Vilaine', 'Bretagne', 35),
(21, 'Morbihan', 'Bretagne', 56),
(22, 'Cher', 'Centre', 18),
(23, 'Eure-et-Loir', 'Centre', 28),
(24, 'Indre', 'Centre', 36),
(25, 'Indre-et-Loire', 'Centre', 37),
(26, 'Loiret', 'Centre', 45),
(27, 'Loir-et-Cher', 'Centre', 41),
(28, 'Ardennes', 'Champagne', 8),
(29, 'Aube', 'Champagne', 10),
(30, 'Haute-Marne', 'Champagne', 52),
(31, 'Marne', 'Champagne', 51),
(32, 'Corse du Sud', 'Corse', 2),
(33, 'Haute-Corse', 'Corse', 2),
(34, 'Doubs', 'Franche-Comté', 25),
(35, 'Haute-Saône', 'Franche-Comté', 70),
(36, 'Jura', 'Franche-Comté', 39),
(37, 'Territoire-de-Belfort', 'Franche-Comté', 90),
(38, 'Eure', 'Haute-Normandie', 27),
(39, 'Seine-Maritime', 'Haute-Normandie', 76),
(40, 'Essonne', 'Ile-de-France', 91),
(41, 'Hauts-de-Seine', 'Ile-de-France', 92),
(42, 'Paris', 'Ile-de-France', 75),
(43, 'Seine-et-Marne', 'Ile-de-France', 77),
(44, 'Seine-St-Denis', 'Ile-de-France', 93),
(45, 'Val-de-Marne', 'Ile-de-France', 94),
(46, 'Val-d\'Oise', 'Ile-de-France', 95),
(47, 'Yvelines', 'Ile-de-France', 78),
(48, 'Aude', 'Languedoc', 11),
(49, 'Gard', 'Languedoc', 30),
(50, 'Hérault', 'Languedoc', 34),
(51, 'Lozère', 'Languedoc', 48),
(52, 'Pyrénées-Orientales', 'Languedoc', 66),
(53, 'Corrèze', 'Limousin', 19),
(54, 'Creuse', 'Limousin', 23),
(55, 'Haute-Vienne', 'Limousin', 87),
(56, 'Meurthe-et-Moselle', 'Lorraine', 54),
(57, 'Meuse', 'Lorraine', 55),
(58, 'Moselle', 'Lorraine', 57),
(59, 'Vosges', 'Lorraine', 88),
(60, 'Ariège', 'Midi-Pyrénées', 9),
(61, 'Aveyron', 'Midi-Pyrénées', 12),
(62, 'Gers', 'Midi-Pyrénées', 32),
(63, 'Haute-Garonne', 'Midi-Pyrénées', 31),
(64, 'Hautes-Pyrénées', 'Midi-Pyrénées', 65),
(65, 'Lot', 'Midi-Pyrénées', 46),
(66, 'Tarn', 'Midi-Pyrénées', 81),
(67, 'Tarn-et-Garonne', 'Midi-Pyrénées', 82),
(68, 'Nord', 'Nord', 59),
(69, 'Pas-de-Calais', 'Nord', 62),
(70, 'Manche', 'Normandie', 50),
(71, 'Loire-Atlantique', 'Pays-de-la-Loire', 44),
(72, 'Maine-et-Loire', 'Pays-de-la-Loire', 49),
(73, 'Mayenne', 'Pays-de-la-Loire', 53),
(74, 'Sarthe', 'Pays-de-la-Loire', 72),
(75, 'Vendée', 'Pays-de-la-Loire', 85),
(76, 'Aisne', 'Picardie', 2),
(77, 'Oise', 'Picardie', 60),
(78, 'Somme', 'Picardie', 80),
(79, 'Charente', 'Poitou-Charente', 16),
(80, 'Charente Maritime', 'Poitou-Charente', 17),
(81, 'Deux-Sèvres', 'Poitou-Charente', 79),
(82, 'Vienne', 'Poitou-Charente', 86),
(83, 'Alpes de Haute-Provence', 'Provence-Alpes-Côte d\'Azur', 4),
(84, 'Alpes-Maritimes', 'Provence-Alpes-Côte d\'Azur', 6),
(85, 'Bouches du Rhône', 'Provence-Alpes-Côte d\'Azur', 13),
(86, 'Hautes-Alpes', 'Provence-Alpes-Côte d\'Azur', 5),
(87, 'Var', 'Provence-Alpes-Côte d\'Azur', 83),
(88, 'Vaucluse', 'Provence-Alpes-Côte d\'Azur', 84),
(89, 'Ain', 'Rhône-Alpes', 1),
(90, 'Ardèche', 'Rhône-Alpes', 7),
(91, 'Drôme', 'Rhône-Alpes', 26),
(92, 'Haute-Savoie', 'Rhône-Alpes', 74),
(93, 'Isère', 'Rhône-Alpes', 38),
(94, 'Loire', 'Rhône-Alpes', 42),
(95, 'Rhône', 'Rhône-Alpes', 69),
(96, 'Savoie', 'Rhône-Alpes', 73);

-- --------------------------------------------------------

--
-- Structure de la table `cms_gindre_role`
--

DROP TABLE IF EXISTS `cms_gindre_role`;
CREATE TABLE IF NOT EXISTS `cms_gindre_role` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:uuid)',
  `role` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `cms_gindre_role`
--

INSERT INTO `cms_gindre_role` (`id`, `role`) VALUES
('34833532-b8bc-400b-8f2d-14aaee366ce9', 'Spa Manager'),
('546d7470-ff50-4745-ae4d-cff7a5280413', 'Gérant');

-- --------------------------------------------------------

--
-- Structure de la table `cms_gindre_shop`
--

DROP TABLE IF EXISTS `cms_gindre_shop`;
CREATE TABLE IF NOT EXISTS `cms_gindre_shop` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:uuid)',
  `region_id` int(11) DEFAULT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip` int(11) NOT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_76D8CA01989D9B62` (`slug`),
  UNIQUE KEY `UNIQ_76D8CA0196901F54` (`number`),
  KEY `IDX_76D8CA0198260155` (`region_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `cms_gindre_shop`
--

INSERT INTO `cms_gindre_shop` (`id`, `region_id`, `name`, `address`, `zip`, `city`, `number`, `slug`) VALUES
('fa6e242c-121a-4028-a0c4-1f3bdacf1d90', 40, 'test', 'test', 78150, 'Le Chesnay', NULL, 'test');

-- --------------------------------------------------------

--
-- Structure de la table `migration_versions`
--

DROP TABLE IF EXISTS `migration_versions`;
CREATE TABLE IF NOT EXISTS `migration_versions` (
  `version` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `migration_versions`
--

INSERT INTO `migration_versions` (`version`) VALUES
('20180920160818'),
('20180921070337'),
('20180921070603'),
('20180921070849'),
('20180921071718'),
('20180921072217'),
('20180921072438'),
('20180921085952'),
('20180921090441'),
('20180921090543'),
('20180921114459'),
('20180921131122'),
('20180921134026');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `cms_gindre_contact`
--
ALTER TABLE `cms_gindre_contact`
  ADD CONSTRAINT `FK_DFEAE8B64D16C4DD` FOREIGN KEY (`shop_id`) REFERENCES `cms_gindre_shop` (`id`),
  ADD CONSTRAINT `FK_DFEAE8B6D60322AC` FOREIGN KEY (`role_id`) REFERENCES `cms_gindre_role` (`id`);

--
-- Contraintes pour la table `cms_gindre_message`
--
ALTER TABLE `cms_gindre_message`
  ADD CONSTRAINT `FK_25353EF14D16C4DD` FOREIGN KEY (`shop_id`) REFERENCES `cms_gindre_shop` (`id`),
  ADD CONSTRAINT `FK_25353EF15F63AD12` FOREIGN KEY (`contact_type_id`) REFERENCES `cms_gindre_contact_type` (`id`);

--
-- Contraintes pour la table `cms_gindre_order`
--
ALTER TABLE `cms_gindre_order`
  ADD CONSTRAINT `FK_BA2CD34C14959723` FOREIGN KEY (`product_type_id`) REFERENCES `cms_gindre_product_type` (`id`),
  ADD CONSTRAINT `FK_BA2CD34C4D16C4DD` FOREIGN KEY (`shop_id`) REFERENCES `cms_gindre_shop` (`id`);

--
-- Contraintes pour la table `cms_gindre_shop`
--
ALTER TABLE `cms_gindre_shop`
  ADD CONSTRAINT `FK_76D8CA0198260155` FOREIGN KEY (`region_id`) REFERENCES `cms_gindre_region` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
