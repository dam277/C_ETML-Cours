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
-- Base de données :  `db_biscuit`
--

-- --------------------------------------------------------

--
-- Structure de la table `t_station`
--

CREATE TABLE `t_biscuit` (
  `idBiscuit` int(11) NOT NULL,
  `bisName` varchar(50) NOT NULL,
  `bisText` text NOT NULL,
  `bisPathImage` varchar(50) NOT NULL,
  `bisSource` varchar(100) NOT NULL,
  `bisLink` varchar(100) NOT NULL,
  `bisMilk` tinyint(1) NOT NULL,
  `bisEgg` tinyint(1) NOT NULL,
  `bisFlour` tinyint(1) NOT NULL,
  `bisSugar` tinyint(1) NOT NULL,
  `bisButter` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `t_station`
--

INSERT INTO `t_biscuit` (`idBiscuit`, `bisName`, `bisText`, `bisPathImage`,`bisSource`, `bisLink`, `bisMilk`, `bisEgg`, `bisFlour`, `bisSugar`, `bisButter`) VALUES
(1, 'Cookies américains', 'Qui n\'aime pas les cookies au chocolat?', 'cookie.jpg','swissmilk', 'https://www.swissmilk.ch/fr/recettes-idees/recettes/RB_KAF2002_12_A/cookies-americains-cookies-aux-pepites-de-chocolat/', 0, 1, 1, 1, 1),
(2, 'Bâtonnets aux noisettes', 'Des bâtonnets aux noisettes faits maison, on n\'en voit pas souvent.','swissmilk', 'noisette.jpg', 'https://www.swissmilk.ch/fr/recettes-idees/recettes/RB_KAF2002_11_A/batonnets-aux-noisettes/', 1, 1, 1, 1, 1),
(3, 'Etoiles à la cannelle', 'Étoiles à la cannelle, savoureux biscuits de Noël!', 'etoilecannelle.jpg','swissmilk', 'https://www.swissmilk.ch/fr/recettes-idees/recettes/LM_div_1112_01/etoiles-a-la-cannelle/?collection=97134&index=5',0, 1, 0, 1, 0),
(4, 'Miroirs', 'Avec les milanais et les brunsli, les miroirs font partie des biscuits de Noël préférés.','swissmilk', 'miroirs.jpg', 'https://www.swissmilk.ch/fr/recettes-idees/recettes/RB_KAF2002_27/miroirs/?collection=97134&index=1', 0, 1, 1, 1, 1),
(5, 'Milanais', 'Le milanais est la star des biscuits de Noël.', 'milanais.jpg', 'swissmilk', 'https://www.swissmilk.ch/fr/recettes-idees/recettes/LM199906_47_MEN906B046C/milanais/?collection=97134&index=2', 0, 1, 1, 1, 1),
(6, 'Sablés', 'Biscuits de Noël incontournables comme les milanais ou les brunsli, les sablés sont rapides à faire.', 'sable.jpg','swissmilk', 'https://www.swissmilk.ch/fr/recettes-idees/recettes/RB_KAF2002_07_B/sables/?collection=97134&index=4', 0, 0, 1, 1, 1),
(7, 'Biscuits aux marrons', 'Biscuits sucrés d’automne: avec cette recette, vous réaliserez 60 petits biscuits à la châtaigne rehaussés d’un trait de kirsch.', 'marrons.jpg','swissmilk', 'https://www.swissmilk.ch/fr/recettes-idees/recettes/LM200512_36_B/biscuits-aux-marrons/', 0, 1, 0, 1, 0),
(8, 'Brownies', 'Les brownies, ces gâteaux au chocolat fondant, mettent l\'eau à toutes les bouches.', 'brownie.jpg', 'swissmilk','https://www.swissmilk.ch/fr/recettes-idees/recettes/LM201511_9/brownies/', 0, 1, 1, 1, 1),
(9, 'Biberli appenzellois', 'Vous le reconnaissez, ce petit pain d\'épices fourré aux amandes?', 'biberli.jpg', 'swissmilk','https://www.swissmilk.ch/fr/recettes-idees/recettes/HWL_CHKL2003_02/biberli-appenzellois/', 1, 1, 1, 1, 0);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `t_station`
--
ALTER TABLE `t_biscuit`
  ADD PRIMARY KEY (`idBiscuit`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `t_station`
--
ALTER TABLE `t_biscuit`
  MODIFY `idBiscuit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
