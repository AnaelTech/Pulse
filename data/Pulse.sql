-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : dim. 14 avr. 2024 à 12:47
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `Pulse`
--

-- --------------------------------------------------------

--
-- Structure de la table `friendships`
--

CREATE TABLE `friendships` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `friend_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `friendships`
--

INSERT INTO `friendships` (`id`, `user_id`, `friend_id`) VALUES
(1, 9, 7),
(2, 9, 2),
(3, 9, 10),
(4, 9, 8),
(5, 11, 9),
(6, 11, 2),
(7, 9, 11),
(8, 9, 1);

-- --------------------------------------------------------

--
-- Structure de la table `Posts`
--

CREATE TABLE `Posts` (
  `id_post` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_content` text NOT NULL,
  `post_date` datetime DEFAULT NULL,
  `post_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Posts`
--

INSERT INTO `Posts` (`id_post`, `user_id`, `post_content`, `post_date`, `post_image`) VALUES
(1, 9, 'Hello World ', NULL, 'a white intelligent_TKEtj5nLNyYrfVJXiTtSaOAao.jpg'),
(2, 9, 'Mon deuxième test de post', NULL, 'A realistic software developer. He is recruiting o_XQGtJDLzf5uci3mi3YcUMgrez.jpg'),
(4, 10, 'Test si ça s\'affiche 😊', NULL, 'A realistic software developer. He is recruiting o_eqgUbLTpsBdEcif3fvkySZPwN.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `Users`
--

CREATE TABLE `Users` (
  `id_user` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Users`
--

INSERT INTO `Users` (`id_user`, `user_name`, `user_lastname`, `user_email`, `user_password`, `user_picture`) VALUES
(1, 'test', 'test', 'dev@dev.net', '$2y$10$eRKAifXFRk/2e4dMymeSu.2mOVgs8KrUs7OI7M0OTsuYYZ1t5d2x.', NULL),
(2, 'monica', 'st', 'monica@email.net', '$2y$10$iZvseH9.2QKEzz2NMJtowOG5jQpufVeM/dWolqO3wIn2PRvXjGcTa', NULL),
(7, 'test2', 'test22', 'test2@email.net', '$2y$10$xXbdxRHlx0hNVk2uaB5YPOq/3/VB6FapSdJ1DtC1.IRKlsSTBooMK', NULL),
(8, 'admin', 'admin', 'admin@admin.net', '$2y$10$l4SWyW40OYIXCaLyvQB6vuYRWq0Bc6BDXnVd3sdA/ybsuUm2rjN3O', NULL),
(9, 'test', 'test', 'test@test.net', '$2y$10$YlZ9l.fuSVeqo.2sGAzGf.l5rA/JVQMse8f8NjPnxP.ZeYZQUXjS2', 'Movie Poster_Hls8DLJJWIfW5OKmPnIbys8ZI.jpg'),
(10, 'Philippe', 'LePremier', 'jaimelespates@hotmail.fr', '$2y$10$Vk8RZFhfzdye2jH6XPNpi.WxfGRWvg.qhfOGthIbIxyBG2Eix1Rq6', NULL),
(11, 'Gotaga', 'Goat', 'gotaga@gotaga.com', '$2y$10$lCFDOLT8g5hOfyAJ.5GvBOEiwH7981F5OFcWKYGpkOKbff4oLlkni', 'm8Gota_Ji8NNPk7BqX7QnmAwkeYe1ow2.jpeg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `friendships`
--
ALTER TABLE `friendships`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `friend_id` (`friend_id`);

--
-- Index pour la table `Posts`
--
ALTER TABLE `Posts`
  ADD PRIMARY KEY (`id_post`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `friendships`
--
ALTER TABLE `friendships`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `Posts`
--
ALTER TABLE `Posts`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `Users`
--
ALTER TABLE `Users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `friendships`
--
ALTER TABLE `friendships`
  ADD CONSTRAINT `friendships_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `Users` (`id_user`),
  ADD CONSTRAINT `friendships_ibfk_2` FOREIGN KEY (`friend_id`) REFERENCES `Users` (`id_user`);

--
-- Contraintes pour la table `Posts`
--
ALTER TABLE `Posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `Users` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
