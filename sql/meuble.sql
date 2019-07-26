-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 26 juil. 2019 à 14:18
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
(1, 'Réalisations avant-après'),
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
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id_produit`, `id_categorie`, `nom`, `couleur`, `dimension`, `ref`, `prix`, `stock`) VALUES
(1, 1, 'Commode', 'noir', '120 x 180 x 60', '6147147', '249.49', 2),
(2, 2, 'Table basse', 'Beige', '50 x 120 x 60', '6141414', '149.99', 1),
(3, 3, 'Fauteuil', 'Bordeaux', '150 x 40', '6753951', '499.99', 4),
(4, 1, 'Meuble TV', 'Bois', '60 x 190 x 50', '6112366', '339.99', 1),
(5, 3, 'Lampe de chevet', 'Métal', '30 X 10', '6258964', '49.99', 8),
(6, 1, 'Canapé', 'Bleu des mers du sud', '120 x 200 x 70', '6669321', '599.99', 1),
(7, 2, 'Meuble suspendu', 'Bois', '60 X 60 X 40', '6753756', '79.99', 3),
(8, 2, 'Bureau', 'Bois', '1230 X 60 40', '6487259', '150.00', 4),
(9, 2, 'Lit', 'Brun', '200 X 180 X 90', '6131954', '400.00', 2),
(10, 3, 'Cadre', 'Blanc', '30 X10', '6767915', '50.00', 10),
(11, 1, 'Guéridon', 'Merisier', '120 x 40 x 40 ', '6314525', '309.00', 3),
(12, 2, 'Banc', 'Blanc', '50 x 100 X 40', '6145632', '109.90', 2),
(13, 2, 'Banquette', 'Emeraude', '80 X 140 X 40', '6258963', '219.90', 1),
(14, 3, 'Chauffeuse', 'Turquoise', '120 x 60 x 40', '6396354', '199.90', 1),
(15, 3, 'Console', 'Noir', '120 x 90 x 40', '6598541', '359.90', 2),
(16, 3, 'Commode', 'Noyer', '90 X 50 X 40', '6198368', '405.90', 3),
(17, 3, 'Horloge', 'Multicolore', '80', '6412399', '99.90', 5),
(18, 3, 'Tabouret', 'Blanc', '130 X 40', '6549871', '159.90', 10),
(19, 1, 'Vaisselier', 'Chêne', '150 x 80 X 40', '631496', '549.90', 1),
(20, 3, 'Buffet', 'Naturel', '160 X 80 X 50', '6279865', '699.99', 1),
(21, 2, 'Panier', 'Naturel Bleu', '35 X 38', '6274951', '49.90', 8),
(22, 2, 'Fauteuil de table', 'Vert', '40 X 48 X 45', '6868975', '219.90', 4),
(23, 2, 'Bibliothéque', 'Bois', '60 X 175 X 40', '6622489', '599.99', 1),
(24, 1, 'Table pliante', 'Eucalyptus', '60 X 74 X 60', '6321988', '99.99', 1),
(25, 1, 'Fauteuil', 'Multicolore', '68 X 81 X 78', '6469782', '129.90', 1),
(26, 1, 'Banquette', 'Ocre', '132 X 81 X 78', '6555878', '499.90', 1),
(27, 1, 'Coffre', 'Noir', '100 X 50 X 40', '66698312', '199.99', 1);

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
('pus2a3kr8ihgq8iusrgimd7kgr', 'log|s:4:\"nary\";mdp|s:4:\"nary\";id_user|s:2:\"64\";total|s:5:\"199.9\";', '2019-07-26 16:09:59');

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
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `log`, `mdp`, `nom`, `prenom`, `telephone`, `admin`) VALUES
(50, 'youss', '$2y$10$RYvJQVo0sLK81vE7yhIV5OF8FQ1dq/Pe.crLcrPQHNlE4mhoUodzW', 'Ettaieb', 'Youcef', '0626843783', 1),
(51, 'yo@yo', '$2y$10$XzuX7gdm/w7NiHsPgCRV6erFRxBmQIymo0WWtjTwrIxuaCmvSXHSm', 'yo', 'yo', 'yo', 0),
(52, 'pat@yahoo.fr', '$2y$10$8yRdBCRsM4cdmHOGbskDpOi3L6lh9XjDq3J7WW8qKITgMGht52aru', 'patrick', 'patrick', '0101010101', 0),
(53, 'no@no', '$2y$10$B/Mfpjdm7pAQpKCZUzmTP.0vPZkh/61/5E0LcBD9v3.wHVKRnOTwW', 'no', 'no', '0101010101', 0),
(54, 'no@no', '$2y$10$C/RmrME0S6AdoHt9MnT5H.YkRdIxhiDS./4SRZbs99rvBL8YFUITS', 'no', 'no', '0101010101', 0),
(55, 'pat@ki.fr', '$2y$10$93iwc8CpozR2sc6tY7V7kOixnqGi/OMkdd478l42HMOP.qpW3Nb2a', 'Miroir', 'test', '0101010101', 0),
(56, 'paul@paul.fr', '$2y$10$xeBp9kt4x0nUhXXfT5NtNO1e9H97/H6.PcnyEWuc7uyxP1ZJNHWEq', 'paul', 'paul', '0101010101', 0),
(57, 'yo@yo', '$2y$10$WXp3S05wzgSyut1ed2U2D.kefDahXzE/Gx2PoaePwM.uqPYz2DnEC', 'paul', 'paul', 'paul', 0),
(58, 'yo@yo', '$2y$10$y4DGthOIS7EuAWgeVnv88e9F9BFv1In06YIoMR4v9LKcVQHvZDD9W', 'patrick', 'patrick', 'patrick', 0),
(59, 'paul@gmail.com', '$2y$10$J.x9jnWqI1TqmptsBOsr9.3tMKShdO2EmdGDByOlcChS15wZsf/Y6', 'Paul', 'Paul', '0102030405', 0),
(60, 'youss@yahoo.fr', '$2y$10$Y7a5K1IjiadOKDE11nVVGeQP.1AK351bFGB85BM7s7D38YubmKwGm', 'paul', 'paul', 'paul', 0),
(61, 'ma@ma', '$2y$10$rid7X/iWPxepZOS.Z4kknuQnF9mTx3dEpcIVlGAz8nH0Ht5uokLP6', 'Faroid', 'Marie Antoinette  Mr', 'Marie antaoinette  j', 0),
(62, 'pou@gmail.fr', '$2y$10$l3m6MCyKPRWVEwfSyddCWuHPFn.8NOmPqTqS2Mem5oKmCTbKvJSyC', 'youss', 'patrick', 'paul', 0),
(63, 'paul1@paul.fr', '$2y$10$ZdSIGgM4L.jAh/P1uTa0zOkWGuJv4kyhLUPVAupGNxSkPM8LZ/ADC', 'Paul', 'Paul', 'Paul', 0),
(64, 'nary@cc.fr', '$2y$10$dU1BC8dxVbVXiNPKFJidAuMJqYZsP1pxIvcFVAYOEs3nPtJl.X/QO', 'Nary', 'Randria', '0606060606', 0);

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
