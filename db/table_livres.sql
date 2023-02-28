-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 07 fév. 2023 à 16:08
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
-- Structure de la table `livres`
--

CREATE TABLE `livres` (
  `Id` int(11) NOT NULL,
  `ISBN` varchar(15) NOT NULL,
  `Titre` varchar(50) NOT NULL,
  `Theme` varchar(50) NOT NULL,
  `Nb_pages` varchar(50) NOT NULL,
  `Format` varchar(50) NOT NULL,
  `Nom_auteur` varchar(50) NOT NULL,
  `Prenom_auteur` varchar(50) NOT NULL,
  `Editeur` varchar(50) NOT NULL,
  `Annee_edition` varchar(50) NOT NULL,
  `Prix` decimal(6,2) NOT NULL,
  `Langue` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `livres`
--

INSERT INTO `livres` (`Id`, `ISBN`, `Titre`, `Theme`, `Nb_pages`, `Format`, `Nom_auteur`, `Prenom_auteur`, `Editeur`, `Annee_edition`, `Prix`, `Langue`) VALUES
(1, '9791033912910', 'Au coeur du Kremlin : des tsars rouges à Poutine', 'Géopolitique', '120', 'Livre poche', 'Fédorovski', 'Vladimir', 'HarperCollins', '2022', '19.00', 'Français'),
(4, '2266182226', 'L\'enlèvement de l\'obélisque', 'Roman', '173', 'Poche', 'Boulle', 'Pierre', 'Pocket', '2009', '3.00', 'Français'),
(5, '2266283022', 'La planète des singes', 'Science fiction', '195', 'Poche', 'Boulle', 'Pierre', 'Pocket', '2017', '5.00', 'Français'),
(6, '9791034738039', 'Le bestiaire du crépuscule', 'Fantastique', '1118', '24cm x 31xm', 'Schmitt', 'Daria', 'Dupuis', '2022', '22.00', 'Français'),
(7, '9782752905536', 'Martin Eden', 'Autobiographie', '456', '13cm x 19cm', 'London', 'Jack', 'Libretto', '2010', '10.00', 'Français'),
(34, 'test', 'test', 'test', '12', 'test', 'test', 'test', 'test', 'test', '12.00', 'test'),
(38, '&', 'Jordane il met des jordans', 'Je serre', 'test', 'Blancbec', 'alex', 'Soilah', 'test', 'i!tituituitgiu', '135.00', 'test'),
(39, 'alex', 'Jordane il met des jordans', 'Je serre', 'alexis', 'Blancbec', 'alex', 'soilah', 'test', '2023', '120.00', 'Français');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `livres`
--
ALTER TABLE `livres`
  ADD PRIMARY KEY (`Id`) USING BTREE,
  ADD KEY `Titre` (`Titre`) USING BTREE,
  ADD KEY `Theme` (`Theme`,`Nom_auteur`,`Prenom_auteur`,`Editeur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `livres`
--
ALTER TABLE `livres`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
