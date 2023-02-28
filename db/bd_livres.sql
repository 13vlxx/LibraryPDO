-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 28 fév. 2023 à 13:53
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
(2, '200', 'Marié', 'Marié', '19371', 'Marions', 'Maria', '81461931831', 'non', 'marie@marie.com', 'non'),
(3, '200', 'Celibataire', 'Rue du celibat', '19371', 'Celibo', 'Celioa', '8328848964', 'no', 'azerty@azerty.azerty', '02392'),
(4, '135', 'Celibataire', 'Rue du celibat', '19371', 'Celibo', 'Celioa', '8328848964', 'no', 'azerty@azerty.azerty', '02392'),
(5, '200', 'Celibataire', 'Rue du celibat', '19371', 'Celibo', 'Celioa', '8328848964', 'no', 'azerty@azerty.azerty', '024242'),
(6, '135', 'Ahmed', 'Rue du celibat', '19371', 'Marions', 'Celioa', '8328848964', 'no', 'azerty@azerty.azerty', '02392'),
(7, '135', 'SDF', 'sans rue', '13700', 'Marignane', 'France', '8197389173', 'no', 'no', 'no'),
(8, 'fournisseur', 'du', '193', '13413', 'Marseille', 'France', '8328848964', 'no', 'alexmonac13@gmail.com', '02392');

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
(34, 'test', 'test', 'test', '12', 'test', 'test', 'test', 'test', 'test', '12.00', 'jordan'),
(42, 'Alex', 'Alex', 'Alex', '135', 'Alex', 'Alex', 'Alex', 'Alex', '1350', '135.00', 'alex'),
(45, 'alex', 'est', 'un', 'gros', 'beau', 'Ahmed', 'Yahaha', 'mere', 'du', '135.00', 'Françaisd');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `mail`, `password`) VALUES
(2, 'Yahaha', 'Soilah', 'soilah13@gmail.com', 'soilah13'),
(8, 'test', 'test', 'test@test', 'azerty'),
(9, 'Babdor', 'Jordan', 'jordan@gmail.com', 'azerty'),
(10, 'Bismillah', 'Al rahman al rahim', '', ''),
(12, 'test', 'alex', 'dqsdqdq@gmail.com', 'azerty'),
(13, 'Ahmed', 'Yahaha', 'azerty@azerty.azerty', 'azerty');

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
-- Index pour la table `livres`
--
ALTER TABLE `livres`
  ADD PRIMARY KEY (`Id`) USING BTREE,
  ADD KEY `Titre` (`Titre`) USING BTREE,
  ADD KEY `Theme` (`Theme`,`Nom_auteur`,`Prenom_auteur`,`Editeur`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `mail` (`mail`) USING BTREE;

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  MODIFY `Id_fournisseur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `livres`
--
ALTER TABLE `livres`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
