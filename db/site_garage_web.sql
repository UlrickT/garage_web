-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 24 juil. 2024 à 01:58
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `site_garage_web`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `username` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id_user`, `username`, `password`) VALUES
(1, 'user', 'user');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id_mail` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(48) COLLATE utf8mb4_general_ci NOT NULL,
  `prenom` varchar(48) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `message` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_mail`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id_mail`, `nom`, `prenom`, `email`, `message`) VALUES
(1, 'TUAMASAGA', 'Ulrick', 'ulrick.tuamasaga@gmail.com', 'Bonjour'),
(2, 'TUAMASAGA', 'Ulrick', 'ulrick.tuamasaga@gmail.com', 'Bonjour, au revoir!'),
(3, 'TUAMASAGA', 'Ulrick', 'ulrick.tuamasaga@gmail.com', 'Au revoir'),
(4, '&#60;p&#62;Bonjour&#60;/p&#62;', '&#60;p&#62;Bonjour&#60;/p&#62;', 'ulrick.tuamasaga@gmail.com', '&#60;p&#62;Bonjour&#60;/p&#62;'),
(5, 'TUAMASAGA', 'Ulrick', 'ulrick.tuamasaga@gmail.com', 'Bonjour');

-- --------------------------------------------------------

--
-- Structure de la table `upload`
--

DROP TABLE IF EXISTS `upload`;
CREATE TABLE IF NOT EXISTS `upload` (
  `id_image` int NOT NULL AUTO_INCREMENT,
  `image` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_image`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `upload`
--

INSERT INTO `upload` (`id_image`, `image`) VALUES
(1, '669dc62b48e6c.jpg'),
(2, '669dd26fefb5a.jpeg');

-- --------------------------------------------------------

--
-- Structure de la table `voiture`
--

DROP TABLE IF EXISTS `voiture`;
CREATE TABLE IF NOT EXISTS `voiture` (
  `id_voiture` int NOT NULL AUTO_INCREMENT,
  `marque_voiture` varchar(24) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `modele_voiture` char(24) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `carb_voiture` varchar(24) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `couleur_voiture` varchar(24) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `num_immat` varchar(8) COLLATE utf8mb4_general_ci NOT NULL,
  `prix_voiture` int NOT NULL,
  `km_voiture` int NOT NULL,
  `date_prem_circu` date NOT NULL,
  `date_rentree_garage` date NOT NULL,
  `nb_chev_fisc` int NOT NULL,
  `description` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_voiture`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `voiture`
--

INSERT INTO `voiture` (`id_voiture`, `marque_voiture`, `modele_voiture`, `carb_voiture`, `couleur_voiture`, `num_immat`, `prix_voiture`, `km_voiture`, `date_prem_circu`, `date_rentree_garage`, `nb_chev_fisc`, `description`) VALUES
(1, 'Toyota', 'Yaris', 'Essence', 'rouge                ', '220330NC', 2500000, 277, '2015-02-10', '2023-03-30', 200, 'Toyota Yaris de couleur rouge'),
(2, 'Peugeot', '3008', 'Diesel', 'bleu', '400500NC', 4600000, 145, '2020-08-02', '2024-05-22', 339, 'Peugeot 3008');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
