-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 05 Décembre 2017 à 09:06
-- Version du serveur :  5.7.20-0ubuntu0.16.04.1
-- Version de PHP :  7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `evaluation3`
--

-- --------------------------------------------------------

--
-- Structure de la table `books`
--

CREATE TABLE `books` (
  `id_book` int(10) UNSIGNED NOT NULL,
  `title` varchar(50) NOT NULL,
  `author` varchar(50) NOT NULL,
  `release_date` int(4) UNSIGNED NOT NULL,
  `category` varchar(25) NOT NULL,
  `summary` text,
  `disponibility` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `books`
--

INSERT INTO `books` (`id_book`, `title`, `author`, `release_date`, `category`, `summary`, `disponibility`) VALUES
(1, 'Test', 'Pas Moi', 1900, 'Drama', 'Le résumé', 1),
(2, 'Bouquin2', 'Le Retour', 2000, 'Adventure', 'LE résumé', 1),
(3, 'Livre moisi', 'Toujours Pasmoi', 2002, 'Romance', 'Livre tout pourri', 1),
(4, 'Livre moisi 2', 'Toujours Pasmoi', 2003, 'Romance', 'La suite du précédent', 1);

-- --------------------------------------------------------

--
-- Structure de la table `history`
--

CREATE TABLE `history` (
  `id_history` int(10) UNSIGNED NOT NULL,
  `id_book` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `rent_date` date NOT NULL,
  `return_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `history`
--

INSERT INTO `history` (`id_history`, `id_book`, `id_user`, `rent_date`, `return_date`) VALUES
(1, 1, 3, '2017-11-30', '2017-11-30'),
(2, 1, 3, '2017-11-30', '2017-11-30'),
(3, 1, 3, '2017-11-30', '2017-11-30'),
(4, 1, 1, '2017-11-30', '2017-11-30');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_user` int(10) UNSIGNED NOT NULL,
  `user_fname` varchar(50) NOT NULL,
  `user_lname` varchar(50) NOT NULL,
  `user_ident` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id_user`, `user_fname`, `user_lname`, `user_ident`) VALUES
(1, 'Test', 'User', 'TU291117WE'),
(3, 'Janklod', 'Test', 'JK');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id_book`);

--
-- Index pour la table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id_history`),
  ADD KEY `id_book` (`id_book`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `user_ident` (`user_ident`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `books`
--
ALTER TABLE `books`
  MODIFY `id_book` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `history`
--
ALTER TABLE `history`
  MODIFY `id_history` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `history_ibfk_1` FOREIGN KEY (`id_book`) REFERENCES `books` (`id_book`) ON DELETE CASCADE,
  ADD CONSTRAINT `history_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
