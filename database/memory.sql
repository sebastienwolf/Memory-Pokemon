-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : jeu. 07 avr. 2022 à 18:25
-- Version du serveur :  8.0.28-0ubuntu0.20.04.3
-- Version de PHP : 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :
--

-- --------------------------------------------------------

--
-- Structure de la table `cards`
--

CREATE TABLE `cards` (
  `id` int UNSIGNED NOT NULL,
  `pathFile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `cards`
--

INSERT INTO `cards` (`id`, `pathFile`) VALUES
(1, './upload/pikachu.png'),
(2, './upload/carapuce.png'),
(3, './upload/evoli.png'),
(4, './upload/bulbizare.png'),
(5, './upload/salameche.png'),
(6, './upload/sablette.png');

-- --------------------------------------------------------

--
-- Structure de la table `game`
--

CREATE TABLE `game` (
  `id` int UNSIGNED NOT NULL,
  `score` float NOT NULL,
  `id_Users` int UNSIGNED NOT NULL,
  `dateSend` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `game`
--

INSERT INTO `game` (`id`, `score`, `id_Users`, `dateSend`) VALUES
(1, 14, 1, '2022-04-06 22:37:24'),
(2, 9, 1, '2022-04-06 22:40:49'),
(3, 11, 1, '2022-04-06 22:48:32'),
(4, 12, 1, '2022-04-06 23:21:46'),
(5, 11, 1, '2022-04-06 23:22:14'),
(6, 11, 2, '2022-04-07 09:22:28'),
(7, 10, 2, '2022-04-07 09:54:07'),
(8, 10, 2, '2022-04-07 09:54:49'),
(9, 9, 2, '2022-04-07 09:55:28'),
(10, 19, 2, '2022-04-07 09:55:52'),
(11, 9, 2, '2022-04-07 09:57:09'),
(12, 12, 2, '2022-04-07 09:57:31'),
(13, 11, 2, '2022-04-07 09:57:51'),
(14, 11, 2, '2022-04-07 09:59:49'),
(15, 18, 1, '2022-04-07 13:59:47'),
(16, 11, 1, '2022-04-07 14:01:06'),
(17, 18, 1, '2022-04-07 14:02:00'),
(18, 11, 1, '2022-04-07 17:47:42'),
(19, 15, 1, '2022-04-07 18:09:02'),
(20, 12, 1, '2022-04-07 18:12:06'),
(21, 13, 1, '2022-04-07 18:12:59'),
(22, 13, 1, '2022-04-07 18:17:00'),
(23, 10, 1, '2022-04-07 18:17:36');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `idUsers` int UNSIGNED NOT NULL,
  `pseudo` varchar(75) NOT NULL,
  `pwd` varchar(255) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`idUsers`, `pseudo`, `pwd`) VALUES
(1, 'seb', '$2y$12$FKA/o6eF6gzc0P456TKT1.CK.pBvs316YR8fBKnveh9F5YftqX3gm'),
(2, 'elena', '$2y$12$rusyRpmowCKQAlTt8GEUB.Fm..ncL8twn5NKHnBCt.riTnvS25MmC');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_gameUsers` (`id_Users`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUsers`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `cards`
--
ALTER TABLE `cards`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `game`
--
ALTER TABLE `game`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `idUsers` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `game`
--
ALTER TABLE `game`
  ADD CONSTRAINT `fk_gameUsers` FOREIGN KEY (`id_Users`) REFERENCES `users` (`idUsers`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
