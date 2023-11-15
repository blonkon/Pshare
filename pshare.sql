-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3310
-- Généré le : mar. 14 nov. 2023 à 02:01
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
-- Base de données : `pshare`
--

-- --------------------------------------------------------

--
-- Structure de la table `deletemessage`
--

CREATE TABLE `deletemessage` (
  `id` int(11) NOT NULL,
  `message_id` int(11) NOT NULL,
  `sender` int(11) NOT NULL,
  `recever` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `num_mes` int(11) NOT NULL,
  `sender` int(11) NOT NULL,
  `contenu` text NOT NULL,
  `date` datetime NOT NULL,
  `recever` int(11) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`num_mes`, `sender`, `contenu`, `date`, `recever`, `deleted`) VALUES
(1, 1, 'test', '2023-11-07 00:00:00', 2, 0),
(2, 2, 'test2', '2023-11-08 00:00:00', 1, 0),
(3, 1, 'un malien americain', '2023-11-01 00:00:00', 3, 0),
(4, 5, 'Cv fomba', '2023-11-10 07:17:00', 1, 0),
(5, 1, 'cv bro et toi ', '2023-11-10 00:00:00', 5, 0),
(6, 5, 'Sinon ca fait un bail heinSinon ca fait un bail heinSinon ca fait un bail heinSinon ca fait un bail heinSinon ca fait un bail heinSinon ca fait un bail heinSinon ca fait un bail heinSinon ca fait un bail heinSinon ca fait un bail heinSinon ca fait un bail heinSinon ca fait un bail heinSinon ca fait un bail heinSinon ca fait un bail heinSinon ca fait un bail heinSinon ca fait un bail heincdddcSinon ca fait un bail heindsdsSinon ca fait un bail heindsdsddsSinon ca fait un bail heindsdsdsssssssssssssssssSinon ca fait un bail hein', '2023-11-10 11:41:06', 1, 0),
(7, 3, 'EEEH guy', '2023-11-10 12:42:08', 5, 0),
(8, 1, 'test test ', '2023-11-10 15:24:42', 5, 0),
(9, 1, 'lonpo', '2023-11-10 19:19:18', 5, 0),
(10, 1, 'guindo', '2023-11-10 19:20:15', 5, 0),
(11, 1, 'aziz', '2023-11-10 19:20:40', 2, 0),
(12, 5, 'wai djo', '2023-11-10 19:53:51', 1, 0),
(13, 1, 'quoi de neuf bro', '2023-11-10 19:56:13', 5, 0),
(14, 1, 'bon faisons un test djo***', '2023-11-10 19:57:39', 5, 0),
(15, 5, 'un autre malien americain', '2023-11-10 19:58:06', 1, 0),
(16, 5, 'test', '2023-11-11 14:43:24', 1, 0),
(24, 5, 'salut', '2023-11-11 15:23:42', 1, 0),
(26, 5, 'xxx', '2023-11-11 15:40:15', 1, 0),
(27, 5, 'ZZZ', '2023-11-11 15:44:08', 1, 0),
(28, 1, 'et toi bro', '2023-11-11 15:46:26', 5, 0),
(29, 5, 'wai mon gaz', '2023-11-11 15:46:40', 1, 0),
(30, 1, 'ca fait un bail hien', '2023-11-11 15:46:52', 5, 0),
(31, 5, 'depuis quand', '2023-11-11 15:47:03', 1, 0),
(32, 1, 'je pensais pas trop que ca allait marche mais Dieu merci ca va ', '2023-11-11 15:47:43', 5, 0),
(33, 5, 'et de ton cote ?', '2023-11-11 15:48:06', 1, 0),
(34, 1, 'ca va alhamdoullilah', '2023-11-11 15:48:24', 5, 0),
(35, 5, 'sinon bro les news', '2023-11-11 15:48:57', 1, 0),
(36, 5, 'et djo', '2023-11-11 15:49:03', 1, 0),
(37, 1, 'quel News ?', '2023-11-11 15:56:51', 5, 0),
(38, 1, 'xxxxxxxxxx', '2023-11-11 17:41:53', 5, 0),
(39, 1, 'xxxxxxx', '2023-11-11 17:42:02', 5, 0),
(40, 1, 'hehehe', '2023-11-11 17:42:26', 5, 0),
(41, 5, 'test', '2023-11-11 17:43:57', 1, 0),
(46, 1, 'et toi aussi', '2023-11-11 17:55:37', 5, 0),
(47, 1, 'ta dis quoi', '2023-11-11 17:56:07', 5, 0),
(49, 1, 'test1', '2023-11-11 17:57:06', 5, 0),
(50, 1, 'test2', '2023-11-11 17:57:10', 5, 0),
(51, 1, 'test3', '2023-11-11 17:57:14', 5, 0),
(52, 1, 'test4', '2023-11-11 18:04:12', 5, 0),
(53, 1, 'test5', '2023-11-11 18:04:22', 5, 0),
(56, 1, 'tu sais de quoi parle ton bro', '2023-11-11 18:07:42', 3, 0),
(57, 5, 'message supprime', '2023-11-11 18:12:58', 3, 1),
(59, 3, 'djo ca faisait un bail et les affaires ?', '2023-11-11 18:15:25', 5, 0),
(62, 3, 'message supprime', '2023-11-11 18:36:53', 5, 1),
(82, 3, 'cv', '2023-11-13 15:19:20', 1, 0),
(112, 3, 'message supprime', '2023-11-13 21:48:32', 5, 1),
(114, 5, 'message supprime', '2023-11-13 22:29:21', 3, 1),
(115, 5, 'gwaka gwaka', '2023-11-13 22:29:27', 3, 0),
(116, 5, 'cc dramee', '2023-11-13 23:48:46', 3, 0),
(117, 5, 'cc broooo', '2023-11-14 00:06:34', 3, 0),
(118, 5, 'et toi', '2023-11-14 00:06:43', 3, 0),
(119, 5, 'sais pas', '2023-11-14 00:06:55', 3, 0),
(120, 5, 'cc bro', '2023-11-14 00:09:08', 3, 0),
(121, 3, 'cc', '2023-11-14 00:09:25', 5, 0),
(122, 3, 'ca fait un bail', '2023-11-14 00:09:39', 5, 0),
(123, 5, '', '2023-11-14 00:10:16', 3, 0);

-- --------------------------------------------------------

--
-- Structure de la table `newmessage`
--

CREATE TABLE `newmessage` (
  `id` int(11) NOT NULL,
  `sender` int(11) NOT NULL,
  `message_id` int(11) NOT NULL,
  `recever` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `projet`
--

CREATE TABLE `projet` (
  `idd_pt` int(11) NOT NULL,
  `num_users` int(11) DEFAULT NULL,
  `nom_pt` varchar(25) NOT NULL,
  `domaine` varchar(25) NOT NULL,
  `statut` enum('actif','clos') DEFAULT NULL,
  `description` text NOT NULL,
  `cahier` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `projet`
--

INSERT INTO `projet` (`idd_pt`, `num_users`, `nom_pt`, `domaine`, `statut`, `description`, `cahier`) VALUES
(1, 2, 'kalanko', 'Informatique', 'actif', 'Ceci est un projet visant a hghfjklrgjr\r\nrfghjkrlfgkjhnr,f;g\r\nedjfkglmlrkjnf,g;lk,nf,vrlfkje', 'kalanko.pdf'),
(2, 1, 'Big data', 'Informatique', 'actif', 'zerufiorlkefjkkkkkkkkkkkl$\r\ner la mesure de la ejkekrjvfn,fkrvjekl;,efr\r\nevkjkfelf', 'bigdata.pdf');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `num_users` int(11) NOT NULL,
  `nom_complet` varchar(65) NOT NULL,
  `email_user` varchar(30) NOT NULL,
  `mdp_user` varchar(25) NOT NULL,
  `competence` enum('Java','Python','Ajax','Angular','Node JS','C++','Django','Flutter') DEFAULT NULL,
  `niveau` enum('Licence','Master','Doctorat') DEFAULT NULL,
  `img` varchar(25) NOT NULL,
  `cv` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`num_users`, `nom_complet`, `email_user`, `mdp_user`, `competence`, `niveau`, `img`, `cv`) VALUES
(1, 'Daouda Fomba', 'fomba@gmail.com', 'daouda', 'Flutter', 'Doctorat', '2.jpg', 'cvKoro.pdf'),
(2, 'ENI-ABT', 'eniabt@gmail.com', 'eni', 'Ajax', 'Licence', 'centre d emission.jpg', 'Néant'),
(3, 'Oumar Dramé', 'oumar@gmail.com', 'oumar', 'Python', 'Master', 'test.png', 'evtsJavaScript.pdf'),
(5, 'Diakite', 'lonpo@gmail.com', 'azerty', 'Ajax', 'Master', 'lonpo.jpg', 'insert.png');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `deletemessage`
--
ALTER TABLE `deletemessage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tesd` (`message_id`),
  ADD KEY `tesa` (`recever`),
  ADD KEY `tesv` (`sender`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`num_mes`),
  ADD KEY `num_users` (`sender`),
  ADD KEY `message_ibfk_2` (`recever`);

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
-- AUTO_INCREMENT pour la table `deletemessage`
--
ALTER TABLE `deletemessage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `num_mes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT pour la table `newmessage`
--
ALTER TABLE `newmessage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT pour la table `projet`
--
ALTER TABLE `projet`
  MODIFY `idd_pt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `num_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `deletemessage`
--
ALTER TABLE `deletemessage`
  ADD CONSTRAINT `tesa` FOREIGN KEY (`recever`) REFERENCES `users` (`num_users`),
  ADD CONSTRAINT `tesd` FOREIGN KEY (`message_id`) REFERENCES `message` (`num_mes`),
  ADD CONSTRAINT `tesv` FOREIGN KEY (`sender`) REFERENCES `users` (`num_users`);

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`sender`) REFERENCES `users` (`num_users`),
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`recever`) REFERENCES `users` (`num_users`);

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
