-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 21 avr. 2023 à 16:02
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
-- Base de données : `mymedical`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `numPro` int(11) NOT NULL,
  `Id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`numPro`, `Id_utilisateur`) VALUES
(54654345, 78);

-- --------------------------------------------------------

--
-- Structure de la table `declaration`
--

CREATE TABLE `declaration` (
  `id_declaration` int(11) NOT NULL,
  `date_declaration` datetime NOT NULL,
  `id_patient` int(11) NOT NULL,
  `est_traitee` tinyint(1) NOT NULL,
  `autres` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `declaration_symptomes`
--

CREATE TABLE `declaration_symptomes` (
  `Id_declaration` int(11) NOT NULL,
  `Id_symptome` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `diagnostic`
--

CREATE TABLE `diagnostic` (
  `Id_diagnostic` int(11) NOT NULL,
  `reponse_declaration` varchar(55) DEFAULT '',
  `date_reponse` datetime DEFAULT NULL,
  `Id_declaration` int(11) NOT NULL,
  `Id_medecin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `medecin`
--

CREATE TABLE `medecin` (
  `numPro` int(11) NOT NULL,
  `Id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `medecin`
--

INSERT INTO `medecin` (`numPro`, `Id_utilisateur`) VALUES
(9876543, 77);

-- --------------------------------------------------------

--
-- Structure de la table `patients`
--

CREATE TABLE `patients` (
  `numSecu` int(11) NOT NULL,
  `Id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `patients`
--

INSERT INTO `patients` (`numSecu`, `Id_utilisateur`) VALUES
(12345, 76);

-- --------------------------------------------------------

--
-- Structure de la table `symptomes_type`
--

CREATE TABLE `symptomes_type` (
  `Id_symptome` int(11) NOT NULL,
  `nom_symptome` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `symptomes_type`
--

INSERT INTO `symptomes_type` (`Id_symptome`, `nom_symptome`) VALUES
(60, 'Diarhée'),
(52, 'Fièvre'),
(69, 'nausée'),
(46, 'Toux');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `Id_utilisateur` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mot_de_passe` varchar(100) NOT NULL,
  `role` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `genre` varchar(50) NOT NULL,
  `date_de_naissance` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`Id_utilisateur`, `email`, `mot_de_passe`, `role`, `prenom`, `nom`, `genre`, `date_de_naissance`) VALUES
(76, 'patient@patient.fr', 'seImgvF1YmjUg', 'patient', 'patient', 'patient', 'homme', '2023-04-10'),
(77, 'medecin@medecin.fr', 'seUh0ufcN/jkM', 'medecin', 'medecin', 'medecin', 'homme', '2023-04-04'),
(78, 'admin@admin.fr', 'sefL3MSA2sN5s', 'admin', 'admin', 'admin', 'homme', '2023-04-03');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`numPro`),
  ADD UNIQUE KEY `Id_utilisateur` (`Id_utilisateur`);

--
-- Index pour la table `declaration`
--
ALTER TABLE `declaration`
  ADD PRIMARY KEY (`id_declaration`),
  ADD KEY `id_patient` (`id_patient`);

--
-- Index pour la table `declaration_symptomes`
--
ALTER TABLE `declaration_symptomes`
  ADD KEY `Id_declaration` (`Id_declaration`),
  ADD KEY `Id_symptome` (`Id_symptome`);

--
-- Index pour la table `diagnostic`
--
ALTER TABLE `diagnostic`
  ADD PRIMARY KEY (`Id_diagnostic`),
  ADD UNIQUE KEY `Id_declaration` (`Id_declaration`),
  ADD KEY `Id_medecin` (`Id_medecin`);

--
-- Index pour la table `medecin`
--
ALTER TABLE `medecin`
  ADD PRIMARY KEY (`numPro`) USING BTREE,
  ADD UNIQUE KEY `Id_utilisateur` (`Id_utilisateur`);

--
-- Index pour la table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`numSecu`),
  ADD KEY `Id_utilisateur` (`Id_utilisateur`) USING BTREE;

--
-- Index pour la table `symptomes_type`
--
ALTER TABLE `symptomes_type`
  ADD PRIMARY KEY (`Id_symptome`),
  ADD UNIQUE KEY `nom_symptome` (`nom_symptome`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`Id_utilisateur`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `declaration`
--
ALTER TABLE `declaration`
  MODIFY `id_declaration` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT pour la table `diagnostic`
--
ALTER TABLE `diagnostic`
  MODIFY `Id_diagnostic` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `symptomes_type`
--
ALTER TABLE `symptomes_type`
  MODIFY `Id_symptome` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `Id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`Id_utilisateur`) REFERENCES `utilisateur` (`Id_utilisateur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `declaration`
--
ALTER TABLE `declaration`
  ADD CONSTRAINT `declaration_ibfk_2` FOREIGN KEY (`id_patient`) REFERENCES `patients` (`Id_utilisateur`);

--
-- Contraintes pour la table `declaration_symptomes`
--
ALTER TABLE `declaration_symptomes`
  ADD CONSTRAINT `declaration_symptomes_ibfk_1` FOREIGN KEY (`Id_declaration`) REFERENCES `declaration` (`id_declaration`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `declaration_symptomes_ibfk_2` FOREIGN KEY (`Id_symptome`) REFERENCES `symptomes_type` (`Id_symptome`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `diagnostic`
--
ALTER TABLE `diagnostic`
  ADD CONSTRAINT `diagnostic_ibfk_1` FOREIGN KEY (`Id_declaration`) REFERENCES `declaration` (`id_declaration`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `diagnostic_ibfk_2` FOREIGN KEY (`Id_medecin`) REFERENCES `medecin` (`Id_utilisateur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `medecin`
--
ALTER TABLE `medecin`
  ADD CONSTRAINT `medecin_ibfk_1` FOREIGN KEY (`Id_utilisateur`) REFERENCES `utilisateur` (`Id_utilisateur`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `patients`
--
ALTER TABLE `patients`
  ADD CONSTRAINT `patients_ibfk_1` FOREIGN KEY (`Id_utilisateur`) REFERENCES `utilisateur` (`Id_utilisateur`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
