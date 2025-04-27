-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : dim. 27 avr. 2025 à 01:09
-- Version du serveur : 8.4.3
-- Version de PHP : 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `catalogue_livres`
--

-- --------------------------------------------------------

--
-- Structure de la table `disponible`
--

CREATE TABLE `disponible` (
  `id` int NOT NULL,
  `titre` varchar(255) NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `date_de_sortie` date NOT NULL,
  `disponible` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `disponible`
--

INSERT INTO `disponible` (`id`, `titre`, `auteur`, `date_de_sortie`, `disponible`) VALUES
(3, 'L\'Alchimiste', 'Paulo Coelho', '1988-05-01', 0),
(4, 'La Vérité sur l\'Affaire Harry Quebert', 'Joël Dicker', '2012-09-19', 1),
(11, 'Le Petit Price', 'Antoine de Saint Exupéry', '2025-07-03', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `disponible`
--
ALTER TABLE `disponible`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `disponible`
--
ALTER TABLE `disponible`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
