-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3310
-- Généré le : sam. 11 nov. 2023 à 19:38
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
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `num_mes` int(11) NOT NULL,
  `sender` int(11) NOT NULL,
  `contenu` text NOT NULL,
  `date` datetime NOT NULL,
  `recever` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`num_mes`, `sender`, `contenu`, `date`, `recever`) VALUES
(1, 1, 'test', '2023-11-07 00:00:00', 2),
(2, 2, 'test2', '2023-11-08 00:00:00', 1),
(3, 1, 'un malien americain', '2023-11-01 00:00:00', 3),
(4, 5, 'Cv fomba', '2023-11-10 07:17:00', 1),
(5, 1, 'cv bro et toi ', '2023-11-10 00:00:00', 5),
(6, 5, 'Sinon ca fait un bail heinSinon ca fait un bail heinSinon ca fait un bail heinSinon ca fait un bail heinSinon ca fait un bail heinSinon ca fait un bail heinSinon ca fait un bail heinSinon ca fait un bail heinSinon ca fait un bail heinSinon ca fait un bail heinSinon ca fait un bail heinSinon ca fait un bail heinSinon ca fait un bail heinSinon ca fait un bail heinSinon ca fait un bail heincdddcSinon ca fait un bail heindsdsSinon ca fait un bail heindsdsddsSinon ca fait un bail heindsdsdsssssssssssssssssSinon ca fait un bail hein', '2023-11-10 11:41:06', 1),
(7, 3, 'EEEH guy', '2023-11-10 12:42:08', 5),
(8, 1, 'test test ', '2023-11-10 15:24:42', 5),
(9, 1, 'lonpo', '2023-11-10 19:19:18', 5),
(10, 1, 'guindo', '2023-11-10 19:20:15', 5),
(11, 1, 'aziz', '2023-11-10 19:20:40', 2),
(12, 5, 'wai djo', '2023-11-10 19:53:51', 1),
(13, 1, 'quoi de neuf bro', '2023-11-10 19:56:13', 5),
(14, 1, 'bon faisons un test djo***', '2023-11-10 19:57:39', 5),
(15, 5, 'un autre malien americain', '2023-11-10 19:58:06', 1),
(16, 5, 'test', '2023-11-11 14:43:24', 1),
(24, 5, 'salut', '2023-11-11 15:23:42', 1),
(26, 5, 'xxx', '2023-11-11 15:40:15', 1),
(27, 5, 'ZZZ', '2023-11-11 15:44:08', 1),
(28, 1, 'et toi bro', '2023-11-11 15:46:26', 5),
(29, 5, 'wai mon gaz', '2023-11-11 15:46:40', 1),
(30, 1, 'ca fait un bail hien', '2023-11-11 15:46:52', 5),
(31, 5, 'depuis quand', '2023-11-11 15:47:03', 1),
(32, 1, 'je pensais pas trop que ca allait marche mais Dieu merci ca va ', '2023-11-11 15:47:43', 5),
(33, 5, 'et de ton cote ?', '2023-11-11 15:48:06', 1),
(34, 1, 'ca va alhamdoullilah', '2023-11-11 15:48:24', 5),
(35, 5, 'sinon bro les news', '2023-11-11 15:48:57', 1),
(36, 5, 'et djo', '2023-11-11 15:49:03', 1),
(37, 1, 'quel News ?', '2023-11-11 15:56:51', 5),
(38, 1, 'xxxxxxxxxx', '2023-11-11 17:41:53', 5),
(39, 1, 'xxxxxxx', '2023-11-11 17:42:02', 5),
(40, 1, 'hehehe', '2023-11-11 17:42:26', 5),
(41, 5, 'test', '2023-11-11 17:43:57', 1),
(42, 5, 'c\'etait quoi letest', '2023-11-11 17:46:35', 1),
(43, 5, 'c\'etait quoi letest', '2023-11-11 17:46:42', 1),
(44, 5, 'c\'etait quoi letest', '2023-11-11 17:47:15', 1),
(45, 5, 'un autre truc', '2023-11-11 17:55:21', 1),
(46, 1, 'et toi aussi', '2023-11-11 17:55:37', 5),
(47, 1, 'ta dis quoi', '2023-11-11 17:56:07', 5),
(48, 5, 'desole j\'ai arreter ', '2023-11-11 17:56:43', 1),
(49, 1, 'test1', '2023-11-11 17:57:06', 5),
(50, 1, 'test2', '2023-11-11 17:57:10', 5),
(51, 1, 'test3', '2023-11-11 17:57:14', 5),
(52, 1, 'test4', '2023-11-11 18:04:12', 5),
(53, 1, 'test5', '2023-11-11 18:04:22', 5),
(54, 1, 'test6', '2023-11-11 18:04:27', 5),
(55, 1, 'un autre malien americain', '2023-11-11 18:06:37', 5),
(56, 1, 'tu sais de quoi parle ton bro', '2023-11-11 18:07:42', 3),
(57, 5, 'wai bro', '2023-11-11 18:12:58', 3),
(58, 5, 'fadiga', '2023-11-11 18:13:31', 1),
(59, 3, 'djo ca faisait un bail et les affaires ?', '2023-11-11 18:15:25', 5),
(60, 5, 'alhamdoulliah on remercie le bo Dieu', '2023-11-11 18:15:49', 3),
(61, 5, 'juste un test', '2023-11-11 18:36:43', 3),
(62, 3, 'ok le test est bon', '2023-11-11 18:36:53', 5);

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
(32, 1, 56, 3),
(34, 5, 58, 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `num_mes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT pour la table `newmessage`
--
ALTER TABLE `newmessage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

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
