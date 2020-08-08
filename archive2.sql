-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 02 avr. 2020 à 15:26
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP :  7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `archive2`
--

-- --------------------------------------------------------

--
-- Structure de la table `affecter2`
--

CREATE TABLE `affecter2` (
  `id_affecter` int(255) NOT NULL,
  `id_personne` int(11) NOT NULL,
  `id_zone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `affecter2`
--

INSERT INTO `affecter2` (`id_affecter`, `id_personne`, `id_zone`) VALUES
(2, 2, 2),
(26, 1, 3),
(27, 1, 2),
(29, 11, 1),
(30, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `document`
--

CREATE TABLE `document` (
  `id_document` int(11) NOT NULL,
  `nomDocument` varchar(50) NOT NULL,
  `id_etagere` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `document`
--

INSERT INTO `document` (`id_document`, `nomDocument`, `id_etagere`) VALUES
(1, 'barbarossa', 1),
(2, 'midway', 2),
(3, 'kasserine', 3),
(4, 'blabla', 1),
(15, 'karkov', 1),
(16, 'el alamein', 3),
(17, 'el alamein', 3),
(18, 'bob', 2),
(19, 'bob', 1),
(20, 'peleliu', 1),
(21, 'peleliu', 1),
(22, 'ccccc', 3),
(23, 'bob', 3),
(24, 'ddddd', 3),
(25, 'bataille de nassau', 5),
(26, 'bataille de nassau', 5),
(27, 'baba yaga', 4),
(28, 'offensive', 7);

-- --------------------------------------------------------

--
-- Structure de la table `etagere`
--

CREATE TABLE `etagere` (
  `id_etagere` int(11) NOT NULL,
  `nomEtagere` varchar(200) NOT NULL,
  `id_zone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `etagere`
--

INSERT INTO `etagere` (`id_etagere`, `nomEtagere`, `id_zone`) VALUES
(1, '1941-est', 1),
(2, '1942-pacifique', 2),
(3, '1943-afrique', 3),
(4, 'new', 3),
(5, 'piraterie', 5),
(6, 'raid', 5),
(7, '1942-phillipines', 1);

-- --------------------------------------------------------

--
-- Structure de la table `lieustockage`
--

CREATE TABLE `lieustockage` (
  `id_stockage` int(11) NOT NULL,
  `nomStockage` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `lieustockage`
--

INSERT INTO `lieustockage` (`id_stockage`, `nomStockage`) VALUES
(1, 'alpha');

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

CREATE TABLE `personne` (
  `id_personne` int(11) NOT NULL,
  `nomPersonne` varchar(200) NOT NULL,
  `prenomPersonne` varchar(200) NOT NULL,
  `adresse` varchar(200) NOT NULL,
  `mail` varchar(200) NOT NULL,
  `telephone` varchar(200) NOT NULL,
  `pseudo` varchar(255) DEFAULT NULL,
  `mdp` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `personne`
--

INSERT INTO `personne` (`id_personne`, `nomPersonne`, `prenomPersonne`, `adresse`, `mail`, `telephone`, `pseudo`, `mdp`) VALUES
(1, 'brownss', 'jason', '1 rue du nflss', 'jbrown@mail.fr', '01 23 58 69 97', NULL, NULL),
(2, 'petitss', 'romain', '4 rue du rugbys', 'rpetit1234@mail.fr', '04 45 62 32 57', NULL, NULL),
(11, 'fff', 'romain', '24 Avenue du Général Margueritte', 'rpetit@mail.fr', '02 89 56 23 47', NULL, NULL),
(15, 'george', 'bob', '24 Avenue du Général Margueritte', 'george@mail.net', '02 89 56 23 48', NULL, NULL),
(16, 'bob', 'bobby', '24 Avenue du Général Margueritte', 'bob@mail.fr', '02 36 65 85 96', NULL, NULL),
(17, 'gegege', 'cferf', 'fqqrfqrsgf', 'rfsqqrsf', 'frsqfrsqfq', NULL, NULL),
(21, 'ANTOINE', 'jérémy', '24 Avenue du Général Margueritte', 'sunjianàlive.fr', '06 60 29 91 24', 'sunjian', '$2y$10$EIFBXxbaaFJYDSf1aLybB.lMzThlydJO0XlFTzSmeJKsgNwEiTi4a'),
(22, 'flint', 'james', 'nassau', 'flint@mail.net', '01 00 23 54 78', 'flifli', '$2y$10$/0GFCydF9jvo63dk2SErZ.z3vlDuAL.DqHb4iX1uhOF450aG1biBO');

-- --------------------------------------------------------

--
-- Structure de la table `traiter2`
--

CREATE TABLE `traiter2` (
  `id` int(11) NOT NULL,
  `id_personne` int(255) NOT NULL,
  `id_document` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `traiter2`
--

INSERT INTO `traiter2` (`id`, `id_personne`, `id_document`) VALUES
(5, 1, 1),
(6, 1, 15),
(8, 1, 4),
(10, 1, 22),
(12, 1, 15);

-- --------------------------------------------------------

--
-- Structure de la table `zone`
--

CREATE TABLE `zone` (
  `id_zone` int(255) NOT NULL,
  `nomZone` varchar(200) NOT NULL,
  `id_stockage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `zone`
--

INSERT INTO `zone` (`id_zone`, `nomZone`, `id_stockage`) VALUES
(1, 'front de l\'est', 1),
(2, 'pacifique', 1),
(3, 'afrique', 1),
(4, 'gor', 1),
(5, 'pirates', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `affecter2`
--
ALTER TABLE `affecter2`
  ADD PRIMARY KEY (`id_affecter`),
  ADD KEY `id_personne` (`id_personne`) USING BTREE,
  ADD KEY `id_zone` (`id_zone`) USING BTREE;

--
-- Index pour la table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`id_document`),
  ADD KEY `document_etagere_FK` (`id_etagere`);

--
-- Index pour la table `etagere`
--
ALTER TABLE `etagere`
  ADD PRIMARY KEY (`id_etagere`),
  ADD KEY `etagere_zone_FK` (`id_zone`);

--
-- Index pour la table `lieustockage`
--
ALTER TABLE `lieustockage`
  ADD PRIMARY KEY (`id_stockage`);

--
-- Index pour la table `personne`
--
ALTER TABLE `personne`
  ADD PRIMARY KEY (`id_personne`);

--
-- Index pour la table `traiter2`
--
ALTER TABLE `traiter2`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_personne` (`id_personne`),
  ADD KEY `id_document` (`id_document`) USING BTREE;

--
-- Index pour la table `zone`
--
ALTER TABLE `zone`
  ADD PRIMARY KEY (`id_zone`),
  ADD KEY `zone_lieuStockage_FK` (`id_stockage`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `affecter2`
--
ALTER TABLE `affecter2`
  MODIFY `id_affecter` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `document`
--
ALTER TABLE `document`
  MODIFY `id_document` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pour la table `etagere`
--
ALTER TABLE `etagere`
  MODIFY `id_etagere` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `lieustockage`
--
ALTER TABLE `lieustockage`
  MODIFY `id_stockage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `personne`
--
ALTER TABLE `personne`
  MODIFY `id_personne` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `traiter2`
--
ALTER TABLE `traiter2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `zone`
--
ALTER TABLE `zone`
  MODIFY `id_zone` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `affecter2`
--
ALTER TABLE `affecter2`
  ADD CONSTRAINT `affecter2_ibfk_1` FOREIGN KEY (`id_personne`) REFERENCES `personne` (`id_personne`),
  ADD CONSTRAINT `affecter2_ibfk_2` FOREIGN KEY (`id_zone`) REFERENCES `zone` (`id_zone`);

--
-- Contraintes pour la table `document`
--
ALTER TABLE `document`
  ADD CONSTRAINT `document_etagere_FK` FOREIGN KEY (`id_etagere`) REFERENCES `etagere` (`id_etagere`);

--
-- Contraintes pour la table `etagere`
--
ALTER TABLE `etagere`
  ADD CONSTRAINT `etagere_zone_FK` FOREIGN KEY (`id_zone`) REFERENCES `zone` (`id_zone`);

--
-- Contraintes pour la table `traiter2`
--
ALTER TABLE `traiter2`
  ADD CONSTRAINT `traiter2_ibfk_1` FOREIGN KEY (`id_personne`) REFERENCES `personne` (`id_personne`),
  ADD CONSTRAINT `traiter2_ibfk_2` FOREIGN KEY (`id_document`) REFERENCES `document` (`id_document`);

--
-- Contraintes pour la table `zone`
--
ALTER TABLE `zone`
  ADD CONSTRAINT `zone_lieuStockage_FK` FOREIGN KEY (`id_stockage`) REFERENCES `lieustockage` (`id_stockage`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
