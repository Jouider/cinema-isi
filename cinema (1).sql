-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 06 mars 2024 à 20:28
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `cinema`
--

-- --------------------------------------------------------

--
-- Structure de la table `film`
--

CREATE TABLE `film` (
  `id_film` int(11) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `duree` time DEFAULT NULL,
  `date_sortie` date DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `min_age` int(11) NOT NULL DEFAULT 12,
  `image` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `film`
--

INSERT INTO `film` (`id_film`, `titre`, `duree`, `date_sortie`, `description`, `min_age`, `image`) VALUES
(1, 'Upgraded', '01:44:00', '2024-02-09', 'Le film suit Ana, une stagiaire en art en herbe qui est invitée à un voyage de travail de dernière minute à Londres par son super patron, et qui rencontre le beau et riche William dans l\'avion.', 18, 'Upgraded.jpg'),
(2, 'American Fiction', '01:57:00', '2023-09-08', 'Un romancier qui en a assez que l\'establishment profite des divertissements \"noirs\" utilise un nom de plume pour écrire un livre qui le propulse au cœur de l\'hypocrisie et de la folie qu\'il prétend mépriser.', 18, 'American_Fiction.jpg'),
(3, 'Saltburn', '02:11:00', '2023-11-17', 'Un étudiant de l\'Université d\'Oxford se retrouve entraîné dans le monde d\'un charmant et aristocratique camarade de classe, qui l\'invite dans la vaste propriété de sa famille excentrique pour un été qui ne sera jamais oublié.', 18, 'Saltburn.jpg'),
(4, 'Once Upon a Time... in Hollywood', '02:41:00', '2019-07-26', 'Un acteur de télé has-been et sa doublure se lancent dans une odyssée pour se faire un nom dans l\'industrie cinématographique lors des meurtres de Charles Manson en 1969 à Los Angeles.\r\n\r\n', 18, 'Hollywood.jpg'),
(14, 'titre1', '00:00:00', '0000-00-00', '', 12, ''),
(15, 'titre4', '00:00:00', '0000-00-00', '', 12, '');

-- --------------------------------------------------------

--
-- Structure de la table `genre`
--

CREATE TABLE `genre` (
  `id_genre` int(11) NOT NULL,
  `libelle` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `genre`
--

INSERT INTO `genre` (`id_genre`, `libelle`) VALUES
(1, 'Action'),
(2, 'Aventure'),
(3, 'Comédie'),
(13, 'Dessin animé'),
(12, 'Documentaire'),
(5, 'Drame'),
(6, 'Fantastique'),
(7, 'Guerre'),
(9, 'Horreur'),
(8, 'Policier'),
(14, 'Romantique'),
(11, 'Science-fiction'),
(15, 'Thriller'),
(10, 'Western');

-- --------------------------------------------------------

--
-- Structure de la table `genre_film`
--

CREATE TABLE `genre_film` (
  `id_film` int(11) NOT NULL,
  `id_genre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `genre_film`
--

INSERT INTO `genre_film` (`id_film`, `id_genre`) VALUES
(1, 3),
(1, 14),
(2, 3),
(2, 5),
(3, 3),
(3, 5),
(3, 15),
(4, 3),
(4, 5),
(14, 6),
(15, 1),
(15, 2);

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

CREATE TABLE `salle` (
  `id_salle` int(11) NOT NULL,
  `libelle` varchar(50) NOT NULL,
  `capacite` int(11) DEFAULT NULL,
  `disponibilite` varchar(50) NOT NULL DEFAULT 'disponible'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `salle`
--

INSERT INTO `salle` (`id_salle`, `libelle`, `capacite`, `disponibilite`) VALUES
(1, 'salle 1', 100, 'disponible'),
(2, 'salle 2', 150, 'indisponible'),
(3, 'salle 3', 100, 'indisponible'),
(4, 'salle 4', 200, 'disponible'),
(5, 'salle 5', 250, 'disponible'),
(6, 'salle 6', 200, 'disponible');

-- --------------------------------------------------------

--
-- Structure de la table `seance`
--

CREATE TABLE `seance` (
  `id_seance` int(11) NOT NULL,
  `date_seance` date NOT NULL,
  `horaire` time NOT NULL,
  `id_salle` int(11) NOT NULL,
  `id_film` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `seance`
--

INSERT INTO `seance` (`id_seance`, `date_seance`, `horaire`, `id_salle`, `id_film`) VALUES
(1, '2024-03-05', '10:00:00', 1, 4),
(2, '2024-03-06', '13:00:00', 1, 1),
(3, '2024-03-05', '16:00:00', 2, 2),
(4, '2024-03-06', '19:00:00', 2, 3),
(5, '2024-03-07', '10:00:00', 1, 3),
(6, '2024-03-08', '19:00:00', 5, 2),
(7, '2024-03-09', '16:00:00', 6, 4);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id_film`),
  ADD UNIQUE KEY `titre` (`titre`);

--
-- Index pour la table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id_genre`),
  ADD UNIQUE KEY `libelle` (`libelle`);

--
-- Index pour la table `genre_film`
--
ALTER TABLE `genre_film`
  ADD PRIMARY KEY (`id_film`,`id_genre`),
  ADD KEY `fk_id_genre` (`id_genre`);

--
-- Index pour la table `salle`
--
ALTER TABLE `salle`
  ADD PRIMARY KEY (`id_salle`),
  ADD UNIQUE KEY `libelle` (`libelle`);

--
-- Index pour la table `seance`
--
ALTER TABLE `seance`
  ADD PRIMARY KEY (`id_seance`),
  ADD UNIQUE KEY `date_horaire_salle` (`date_seance`,`horaire`,`id_salle`) USING BTREE,
  ADD KEY `fk_id_salle` (`id_salle`),
  ADD KEY `fk_id_film_seance` (`id_film`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `film`
--
ALTER TABLE `film`
  MODIFY `id_film` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `genre`
--
ALTER TABLE `genre`
  MODIFY `id_genre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `salle`
--
ALTER TABLE `salle`
  MODIFY `id_salle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `seance`
--
ALTER TABLE `seance`
  MODIFY `id_seance` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `genre_film`
--
ALTER TABLE `genre_film`
  ADD CONSTRAINT `fk_id_film` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_genre` FOREIGN KEY (`id_genre`) REFERENCES `genre` (`id_genre`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `seance`
--
ALTER TABLE `seance`
  ADD CONSTRAINT `fk_id_film_seance` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_salle` FOREIGN KEY (`id_salle`) REFERENCES `salle` (`id_salle`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
