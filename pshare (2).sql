-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3310
-- Généré le : sam. 18 nov. 2023 à 14:51
-- Version du serveur : 10.4.20-MariaDB
-- Version de PHP : 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `pshare`
--

-- --------------------------------------------------------

--
-- Structure de la table `avoir_competence`
--

CREATE TABLE `avoir_competence` (
  `num_users` int(11) NOT NULL,
  `id_comp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `avoir_competence`
--

INSERT INTO `avoir_competence` (`num_users`, `id_comp`) VALUES
(1, 1),
(1, 2),
(7, 7);

-- --------------------------------------------------------

--
-- Structure de la table `competence`
--

CREATE TABLE `competence` (
  `id_comp` int(11) NOT NULL,
  `nom_comp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `competence`
--

INSERT INTO `competence` (`id_comp`, `nom_comp`) VALUES
(1, 'PHP'),
(2, 'Python'),
(3, 'Java'),
(4, 'C++'),
(5, 'Ajax'),
(6, 'Angular'),
(7, 'Node js');

-- --------------------------------------------------------

--
-- Structure de la table `competences_requises`
--

CREATE TABLE `competences_requises` (
  `idd_pt` int(11) NOT NULL,
  `id_comp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `competences_requises`
--

INSERT INTO `competences_requises` (`idd_pt`, `id_comp`) VALUES
(1, 3),
(1, 2),
(3, 2),
(2, 6),
(5, 2),
(5, 2),
(5, 2),
(5, 2),
(5, 2),
(5, 2),
(14, 2);

-- --------------------------------------------------------

--
-- Structure de la table `deletemessage`
--

CREATE TABLE `deletemessage` (
  `id` int(11) NOT NULL,
  `sender` int(11) NOT NULL,
  `message_id` int(11) NOT NULL,
  `recever` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `num_mes` int(11) NOT NULL,
  `sender` int(11) NOT NULL,
  `contenu` text NOT NULL,
  `date` date NOT NULL,
  `recever` int(11) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`num_mes`, `sender`, `contenu`, `date`, `recever`, `deleted`) VALUES
(4, 4, 'cv fomba', '2023-11-18', 1, 0),
(5, 4, 'salut bro', '2023-11-18', 3, 0),
(6, 4, 'guy', '2023-11-18', 1, 0),
(7, 4, 'lonpo', '2023-11-18', 1, 0),
(8, 4, 'ho', '2023-11-18', 3, 0),
(9, 4, 'ho', '2023-11-18', 3, 0),
(10, 4, 'ca meme pas vrai', '2023-11-18', 3, 0),
(11, 4, 'lonpo', '2023-11-18', 3, 0),
(12, 4, 'c\'est quoi le new', '2023-11-18', 1, 0),
(13, 4, 'aziz', '2023-11-18', 1, 0),
(14, 4, 'hey', '2023-11-18', 3, 0),
(15, 4, 'test', '2023-11-18', 1, 0),
(16, 4, 'another malien americain ', '2023-11-18', 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `newmessage`
--

CREATE TABLE `newmessage` (
  `id` int(11) NOT NULL,
  `sender` int(11) NOT NULL,
  `message_id` int(11) NOT NULL,
  `recever` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `newmessage`
--

INSERT INTO `newmessage` (`id`, `sender`, `message_id`, `recever`) VALUES
(1, 4, 15, 1),
(2, 4, 16, 1);

-- --------------------------------------------------------

--
-- Structure de la table `projet`
--

CREATE TABLE `projet` (
  `idd_pt` int(11) NOT NULL,
  `num_users` int(11) DEFAULT NULL,
  `nom_pt` varchar(25) NOT NULL,
  `statut` enum('actif','clos') DEFAULT NULL,
  `description` text NOT NULL,
  `cahier` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `projet`
--

INSERT INTO `projet` (`idd_pt`, `num_users`, `nom_pt`, `statut`, `description`, `cahier`) VALUES
(1, 1, 'Kalanso', 'clos', 'ghjkbgjhjkgbgjkvbjgkfjhgkjlbddddddddddddddkjhbtjn,kvdmllllllllllllmirut', 'cvKoro.pdf'),
(2, 3, 'SotramaPay', 'actif', 'ghjfkhfjvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvkkkkkkfkyrgbvnrjhrnkkkkkkkrjhggggggggfghjfkhfjvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv...ghjfkhfjvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv...ghjfkhfjvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv...ghjfkhfjvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv...ghjfkhfjvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv...ghjfkhfjvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv...ghjfkhfjvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv...ghjfkhfjvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv...ghjfkhfjvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv...ghjfkhfjvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv...', 'cvKoro.pdf'),
(3, 3, 'Sonko', 'actif', 'hejkrfjhgtyujhcvguyijfchvyjunvuuuuuuuufiiiiiiiiifhjklloiuygbnkjhghjkjhjkfj', '11671724_02.pdf'),
(4, 4, 'Lonpo', 'actif', 'Fombase', '7.convertisseur_statique.'),
(5, 4, 'FOMBASE', 'actif', 'ICI on test l\'ajout des competences requise', '7.convertisseur_statique.'),
(6, 4, 'FOMBASE', 'actif', 'ICI on test l\'ajout des competences requise', '7.convertisseur_statique.'),
(7, 4, 'FOMBASE', 'actif', 'ICI on test l\'ajout des competences requise', '7.convertisseur_statique.'),
(8, 4, 'FOMBASE', 'actif', 'ICI on test l\'ajout des competences requise', '7.convertisseur_statique.'),
(9, 4, 'FOMBASE', 'actif', 'ICI on test l\'ajout des competences requise', '7.convertisseur_statique.'),
(10, 4, 'a', 'actif', 'ezezezeze', '7.convertisseur_statique.'),
(11, 4, 'a', 'actif', 'ezezezeze', '7.convertisseur_statique.'),
(12, 4, 'a', 'actif', 'ezezezeze', '7.convertisseur_statique.'),
(13, 4, 'fghjk', 'actif', 'fghjkl', '7.convertisseur_statique.'),
(14, 4, 'fghjk', 'actif', 'fghjkl', '7.convertisseur_statique.');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `num_users` int(11) NOT NULL,
  `type` varchar(30) NOT NULL,
  `nom_complet` varchar(65) NOT NULL,
  `email_user` varchar(30) NOT NULL,
  `mdp_user` varchar(25) NOT NULL,
  `niveau` enum('Licence','Master','Doctorat') DEFAULT NULL,
  `img` varchar(25) NOT NULL,
  `cv` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`num_users`, `type`, `nom_complet`, `email_user`, `mdp_user`, `niveau`, `img`, `cv`) VALUES
(1, 'individuel', 'Daouda Fomba', 'fombadaouda72@gmail.com', 'daouda', 'Master', 'tofretouche 3.jpg', 'Contrôle_parental_élève.p'),
(3, 'commun', 'ENI-ABT', 'eniabt@gmail.com', 'eni', '', 'EMPLOI du TEMPS.jpg', ''),
(4, 'commun', 'Askia', 'askia@gmail.com', 'askia', '', 'centre d emission.jpg', ''),
(7, 'individuel', 'Ali Touré', 'ali@gmail.com', 'ali', 'Master', 'centre d emission.jpg', '11671724_02.pdf'),
(9, 'commun', 'Lycee Prosper Kamara', 'prosper@gmail.com', 'prosper', '', 'Body3.jpg', '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `avoir_competence`
--
ALTER TABLE `avoir_competence`
  ADD KEY `user_comp` (`num_users`),
  ADD KEY `comp_comp` (`id_comp`);

--
-- Index pour la table `competence`
--
ALTER TABLE `competence`
  ADD PRIMARY KEY (`id_comp`);

--
-- Index pour la table `competences_requises`
--
ALTER TABLE `competences_requises`
  ADD KEY `proj_comp` (`idd_pt`),
  ADD KEY `cnec_comp` (`id_comp`);

--
-- Index pour la table `deletemessage`
--
ALTER TABLE `deletemessage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mm` (`message_id`),
  ADD KEY `message_ibfk_2` (`recever`),
  ADD KEY `message_ibfk` (`sender`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`num_mes`),
  ADD KEY `send` (`sender`),
  ADD KEY `recev` (`recever`);

--
-- Index pour la table `newmessage`
--
ALTER TABLE `newmessage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `test1` (`message_id`),
  ADD KEY `test2` (`recever`),
  ADD KEY `test3` (`sender`);

--
-- Index pour la table `projet`
--
ALTER TABLE `projet`
  ADD PRIMARY KEY (`idd_pt`),
  ADD KEY `num_users` (`num_users`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`num_users`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `competence`
--
ALTER TABLE `competence`
  MODIFY `id_comp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `deletemessage`
--
ALTER TABLE `deletemessage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `num_mes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `newmessage`
--
ALTER TABLE `newmessage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `projet`
--
ALTER TABLE `projet`
  MODIFY `idd_pt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `num_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `avoir_competence`
--
ALTER TABLE `avoir_competence`
  ADD CONSTRAINT `comp_comp` FOREIGN KEY (`id_comp`) REFERENCES `competence` (`id_comp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_comp` FOREIGN KEY (`num_users`) REFERENCES `users` (`num_users`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `competences_requises`
--
ALTER TABLE `competences_requises`
  ADD CONSTRAINT `cnec_comp` FOREIGN KEY (`id_comp`) REFERENCES `competence` (`id_comp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `proj_comp` FOREIGN KEY (`idd_pt`) REFERENCES `projet` (`idd_pt`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `deletemessage`
--
ALTER TABLE `deletemessage`
  ADD CONSTRAINT `message_ibfk` FOREIGN KEY (`sender`) REFERENCES `users` (`num_users`),
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`recever`) REFERENCES `users` (`num_users`),
  ADD CONSTRAINT `mm` FOREIGN KEY (`message_id`) REFERENCES `message` (`num_mes`);

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `recev` FOREIGN KEY (`recever`) REFERENCES `users` (`num_users`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `send` FOREIGN KEY (`sender`) REFERENCES `users` (`num_users`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `newmessage`
--
ALTER TABLE `newmessage`
  ADD CONSTRAINT `test1` FOREIGN KEY (`message_id`) REFERENCES `message` (`num_mes`),
  ADD CONSTRAINT `test2` FOREIGN KEY (`recever`) REFERENCES `users` (`num_users`),
  ADD CONSTRAINT `test3` FOREIGN KEY (`sender`) REFERENCES `users` (`num_users`);

--
-- Contraintes pour la table `projet`
--
ALTER TABLE `projet`
  ADD CONSTRAINT `projet_ibfk_1` FOREIGN KEY (`num_users`) REFERENCES `users` (`num_users`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
