-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Ven 06 Novembre 2020 à 08:41
-- Version du serveur :  5.7.11
-- Version de PHP :  7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `db_ski`
--

-- --------------------------------------------------------

--
-- Structure de la table `t_station`
--

CREATE TABLE `t_station` (
  `idStation` int(11) NOT NULL,
  `staName` varchar(20) NOT NULL,
  `staSlogan` varchar(100) NOT NULL,
  `staText` text NOT NULL,
  `staPathImage` varchar(50) NOT NULL,
  `staLink` varchar(100) NOT NULL,
  `staFacebook` tinyint(1) NOT NULL,
  `staTwitter` tinyint(1) NOT NULL,
  `staInstagram` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `t_station`
--

INSERT INTO `t_station` (`idStation`, `staName`, `staSlogan`, `staText`, `staPathImage`, `staLink`, `staFacebook`, `staTwitter`, `staInstagram`) VALUES
(1, 'Courchevel', 'Viens skier et bronzé !', 'De la neige toute l\'année et une bonne ambiance assurée. Du plaisir garanti à un moindre coût.\r\n', 'courchevel.jpg', 'https://www.courchevel.com/fr', 1, 1, 0),
(2, 'Portes du Soleil', 'De la glisse pour tous !', 'Le plaisir du ski pour tout âge et niveau vous attend au Portes du Soleil. ', 'skiing.jpg', 'https://www.portesdusoleil.com/', 1, 1, 1),
(3, 'Vallée de Joux', 'A fond la forme ...', 'Des pistes qui s\'étendent sur des kilomètres et des paysages magnifiques et panoramiques, venez nombreux faire du ski de fond.', 'cross-country.jpg', 'www.myvalleedejoux.ch', 0, 0, 1),
(4, 'Matterhorn glacier', 'La plus haute station d\'Europe', 'Venir gravir des sommets et vous faire plaisir en descente.', 'gondola.jpg', 'www.matterhornparadise.ch', 1, 1, 1),
(5, 'Leysin', 'L\'hiver arrive à Leysin !', 'Pistes, soleils, bonne ambiance, on vous attend nombreux !', 'mountains.jpg', 'https://www.tele-leysin-mosses.ch/', 1, 1, 1),
(6, 'Grimentz-Zinal', 'Prend la benne et viens sur les pistes !', 'Plus de 115km de pistes et un pique à 2900m vous fera vibrer sur vos lattes.', 'skiing-sky.jpg', 'https://www.valdanniviers.ch', 1, 0, 0),
(7, 'Crans Montana', 'T\'es toujours à Crans quand tu skies ;-)', 'Venez découvrir des pistes mythiques et des remontées d\'enfer. ', 'ski-lift.jpg', 'https://www.crans-montana.ch/', 1, 0, 1),
(8, 'Moléson', 'Du Moléson, on y voit ma maison', 'Une montagne de loisir, ski, rando, peau de phoque, vous pourrez tout faire et tout tester .', 'ski-run.jpg', 'https://www.moleson.ch/', 1, 1, 1),
(9, 'Charmey', 'Charmey.ch à l\'état pur', 'Station au cœur des Alpes fribourgeoises, Charmey vous propose de nombreuses activités estivales. La montagne de Vounetz est le terrain de jeu idéal pour une activité en famille, une sortie entre amis ou une virée en solitaire.', 'snow.jpg', 'https://www.charmey.ch/', 0, 0, 0),
(10, '', 'Les Diablerets', 'Enchaîner les pistes, se prélasser sur les terrasses des restaurants d’altitude, respirer le grand air au milieu de paysages grandioses … vous n’avez pas envie que ça s’arrête alors prolongez les plaisirs de la montagne!', 'snow-tree.jpg', 'https://www.villars-diablerets.ch/fr/', 0, 1, 0),
(11, 'Les Rasses', 'Du plaisir à côté de chez soi', 'Ski, ski de fond, raquettes, randonnées, vous pourrez vous faire plaisir en venant chez  nous.', 'vorarlberg.jpg', 'http://www.ski-vaud.ch/web/', 1, 0, 0),
(12, 'Les Paccots', 'Tous en famille', 'La station propose de nombreuses activités : une école de ski avec un jardin des neiges et des descentes aux flambeaux.', 'winter.jpg', 'http://www.station-les-paccots.ch/', 1, 1, 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `t_station`
--
ALTER TABLE `t_station`
  ADD PRIMARY KEY (`idStation`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `t_station`
--
ALTER TABLE `t_station`
  MODIFY `idStation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
