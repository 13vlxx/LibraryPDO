-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 21 fév. 2023 à 16:06
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bd_livres`
--

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--

CREATE TABLE `fournisseur` (
  `Id_fournisseur` int(11) NOT NULL,
  `code_fournisseur` varchar(50) NOT NULL,
  `raison_sociale` varchar(50) NOT NULL,
  `rue_fournisseur` varchar(100) NOT NULL,
  `code_postal` varchar(50) NOT NULL,
  `localite` varchar(100) NOT NULL,
  `pays` varchar(100) NOT NULL,
  `tel_fournisseur` varchar(50) NOT NULL,
  `url_fournisseur` varchar(100) NOT NULL,
  `email_fournisseur` varchar(100) NOT NULL,
  `fax_fournisseur` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `fournisseur`
--

INSERT INTO `fournisseur` (`Id_fournisseur`, `code_fournisseur`, `raison_sociale`, `rue_fournisseur`, `code_postal`, `localite`, `pays`, `tel_fournisseur`, `url_fournisseur`, `email_fournisseur`, `fax_fournisseur`) VALUES
(1, '135', 'Celibataire', 'Rue du celibat', '13892', 'Celibo', 'Celioa', '8328848964', 'no', 'celibat@gmail.com', '02392'),
(2, '200', 'Marié', 'Marié', '19371', 'Marions', 'Maria', '81461931831', 'non', 'marie@marie.com', 'non');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  ADD PRIMARY KEY (`Id_fournisseur`) USING BTREE,
  ADD KEY `code_fournisseur` (`code_fournisseur`) USING BTREE,
  ADD KEY `raison_sociale` (`raison_sociale`) USING BTREE,
  ADD KEY `code_postal` (`code_postal`) USING BTREE,
  ADD KEY `localite` (`localite`) USING BTREE;

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  MODIFY `Id_fournisseur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
