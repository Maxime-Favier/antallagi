-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 29 Août 2017 à 12:47
-- Version du serveur :  5.5.57-0+deb8u1
-- Version de PHP :  5.6.30-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `antallagi`
--

-- --------------------------------------------------------

--
-- Structure de la table `correcteur`
--

CREATE TABLE IF NOT EXISTS `correcteur` (
`num` int(11) NOT NULL,
  `pseudo` text NOT NULL,
  `id` text NOT NULL,
  `mdp` text NOT NULL,
  `reputation` int(11) NOT NULL,
  `language` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `correcteur`
--

INSERT INTO `correcteur` (`num`, `pseudo`, `id`, `mdp`, `reputation`, `language`) VALUES
(1, 'goupil', 'trash@gmail.com', 'b1b52f8c460e26116ef10ec1f3a707c99428a9f8', 10, 'anglais');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `correcteur`
--
ALTER TABLE `correcteur`
 ADD PRIMARY KEY (`num`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `correcteur`
--
ALTER TABLE `correcteur`
MODIFY `num` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
