-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mer. 17 juin 2020 à 19:28
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `skills-management_project`
--

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(50) CHARACTER SET latin1 NOT NULL,
  `username` varchar(190) NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 NOT NULL,
  `created at` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `created at`) VALUES
(427, 'test@test', 'sdf', '$2y$10$.ulenlZvaYd1uEfYOEI3KuMBwAND/HLpROoG/hwT/MLHIIdLiPmFG', '2020-06-09 03:50:25.047825'),
(428, 'hassan@h', 'fahad_altaie', '$2y$10$1lNTYQhLsfof7sod5fBi7eS0f1YkKCXBAgK4RW2mPuPDQOMhmesge', '2020-06-09 03:51:37.598639'),
(429, 'test@test.fr', 'test', '$2y$10$Cw5rKZ4mcH/K/lAo/EYz/OOrvAE07ECgt.8YW8ejBEpS5HXQjS1xW', '2020-06-09 15:03:24.989561'),
(431, 'chowee2@gmail.com', 'Claude', '$2y$10$Drgu1Kh6I/6e9KKt.Y6tuOj4Rtp4WPendLYkjo7bAczcsZX20u0jK', '2020-06-09 16:51:32.181685');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`email`),
  ADD KEY `password` (`password`),
  ADD KEY `snake` (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=432;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
