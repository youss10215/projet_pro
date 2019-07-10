-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 10 juil. 2019 à 10:26
-- Version du serveur :  5.7.26
-- Version de PHP :  7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `meuble`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id_categorie` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `nom`) VALUES
(1, 'Réalisations avant/après'),
(2, 'Meuble sur mesure'),
(3, 'Mes créations');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id_commande` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_user` int(10) UNSIGNED DEFAULT NULL,
  `date_commande` datetime DEFAULT NULL,
  `total` decimal(8,2) DEFAULT NULL,
  PRIMARY KEY (`id_commande`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ligne`
--

DROP TABLE IF EXISTS `ligne`;
CREATE TABLE IF NOT EXISTS `ligne` (
  `id_ligne` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_commande` int(10) UNSIGNED DEFAULT NULL,
  `id_produit` int(10) UNSIGNED DEFAULT NULL,
  `quantite` smallint(2) DEFAULT NULL,
  `prix` decimal(6,2) DEFAULT NULL,
  PRIMARY KEY (`id_ligne`),
  KEY `id_commande` (`id_commande`),
  KEY `id_produit` (`id_produit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id_produit` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_categorie` int(10) UNSIGNED DEFAULT NULL,
  `nom` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `couleur` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dimension` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ref` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prix` decimal(6,2) DEFAULT NULL,
  `stock` smallint(2) DEFAULT NULL,
  PRIMARY KEY (`id_produit`),
  KEY `id_categorie` (`id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id_produit`, `id_categorie`, `nom`, `couleur`, `dimension`, `ref`, `prix`, `stock`) VALUES
(1, 1, 'Commode', 'noir', '120 x 180 x 60', 'COM', '249.49', 2),
(2, 3, 'Table basse', 'marron', '50 x 120 x 60', 'TBM', '149.99', 1),
(3, 3, 'Fauteuil', 'Jaune de damas', '150 x 40', 'FAU', '499.99', 4),
(4, 1, 'Meuble TV', 'Bois', '60 x 190 x 50', 'MTV', '339.99', 1),
(5, 3, 'Lampe de chevet', 'Laiton', '30 X10', 'LACH', '49.99', 8),
(6, 1, 'Canapé', 'Bleu des mers du sud', '120 x 200 x 70', 'CANA', '599.99', 1),
(7, 2, 'Meuble haut cuisine', 'Noir', '60 X 60 X 40', 'MBHCA', '79.99', 3),
(8, 2, 'Bureau', 'Bois', '1230 X 60 40', 'BUR', '150.00', 4),
(9, 2, 'Lit', 'Brun', '200 X 180 X 90', 'LIT', '400.00', 2),
(10, 1, 'Bougeoir', 'Gris anthracite', '30 X10', 'BOU', '50.00', 10),
(11, 1, 'Guéridon', 'Merisier', '120 x 40 x 40 ', 'GUED', '309.00', 3),
(12, 2, 'Banc', 'Blanc', '50 x 100 X 40', 'BAN', '109.90', 2),
(13, 2, 'Bnaquette', 'Emeraude', '80 X 140 40', 'BANQ', '219.90', 1),
(14, 3, 'Chauffeuse', 'Turquoise', '120 x 60 x 40', 'CHAUF', '199.90', 1);

-- --------------------------------------------------------

--
-- Structure de la table `session`
--

DROP TABLE IF EXISTS `session`;
CREATE TABLE IF NOT EXISTS `session` (
  `sid` char(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` mediumtext COLLATE utf8mb4_unicode_ci,
  `date_maj` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `session`
--

INSERT INTO `session` (`sid`, `data`, `date_maj`) VALUES
('30m81v19jjf52jdqllmtpm2oel', 'id_user|s:2:\"50\";', '2019-07-04 16:32:24'),
('5hk13q4a5i9r6i641cn8pjd66b', '', '2019-07-05 17:06:35'),
('7f2mgl2m7895ogdiub26f12od1', '', '2019-07-10 09:55:25'),
('8ktj5rd3424ib4suve296qkpk5', 'id_user|s:2:\"53\";', '2019-07-09 16:37:49'),
('drikdunav87cldbl0q07l8ivt1', 'id_user|s:2:\"51\";', '2019-07-03 13:34:38'),
('j3ari6qk4vnevfmi4tc8jq9gch', '', '2019-07-08 17:00:51'),
('qv0jmkh1qn5r2370i9d33c8cgi', '', '2019-07-10 12:25:12'),
('u4ed7f7bpmnv5sv9k0qv2d7vlk', 'id_produit|a:1:{i:7;a:2:{i:0;O:7:\"Produit\":9:{s:10:\"id_produit\";s:1:\"7\";s:12:\"id_categorie\";s:1:\"2\";s:3:\"nom\";s:19:\"Meuble haut cuisine\";s:7:\"couleur\";s:19:\"Bleu des mer du sud\";s:9:\"dimension\";s:12:\"60 X 60 X 40\";s:3:\"ref\";s:5:\"MBHCA\";s:4:\"prix\";s:5:\"79.99\";s:5:\"stock\";s:1:\"3\";s:18:\"\0Produit\0categorie\";N;}i:1;i:1;}}', '2019-07-03 16:57:21');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `log` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `mdp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `nom` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prenom` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `log`, `mdp`, `nom`, `prenom`, `telephone`, `admin`) VALUES
(50, 'youss', '$2y$10$RYvJQVo0sLK81vE7yhIV5OF8FQ1dq/Pe.crLcrPQHNlE4mhoUodzW', 'Ettaieb', 'Youcef', '0626843783', 1),
(51, 'yo@yo', '$2y$10$XzuX7gdm/w7NiHsPgCRV6erFRxBmQIymo0WWtjTwrIxuaCmvSXHSm', 'yo', 'yo', 'yo', 0),
(52, 'pat@yahoo.fr', '$2y$10$8yRdBCRsM4cdmHOGbskDpOi3L6lh9XjDq3J7WW8qKITgMGht52aru', 'patrick', 'patrick', '0101010101', 0),
(53, 'no@no', '$2y$10$B/Mfpjdm7pAQpKCZUzmTP.0vPZkh/61/5E0LcBD9v3.wHVKRnOTwW', 'no', 'no', '0101010101', 0),
(54, 'no@no', '$2y$10$C/RmrME0S6AdoHt9MnT5H.YkRdIxhiDS./4SRZbs99rvBL8YFUITS', 'no', 'no', '0101010101', 0);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Contraintes pour la table `ligne`
--
ALTER TABLE `ligne`
  ADD CONSTRAINT `ligne_ibfk_1` FOREIGN KEY (`id_commande`) REFERENCES `commande` (`id_commande`),
  ADD CONSTRAINT `ligne_ibfk_2` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id_produit`);

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id_categorie`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
