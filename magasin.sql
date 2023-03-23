-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 03 Juin 2021 à 21:40
-- Version du serveur :  5.5.39
-- Version de PHP :  5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `magasin`
--

-- --------------------------------------------------------

--
-- Structure de la table `affecter`
--

CREATE TABLE IF NOT EXISTS `affecter` (
`Id` int(11) NOT NULL,
  `Quantite` int(11) DEFAULT NULL,
  `Utilisateur` varchar(255) DEFAULT NULL,
  `NumEtage` varchar(255) DEFAULT NULL,
  `nomType` varchar(255) DEFAULT NULL,
  `Designation` varchar(255) DEFAULT NULL,
  `marque` varchar(255) DEFAULT NULL,
  `DateDemande` date DEFAULT NULL,
  `QuantiteEnv` int(255) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Contenu de la table `affecter`
--

INSERT INTO `affecter` (`Id`, `Quantite`, `Utilisateur`, `NumEtage`, `nomType`, `Designation`, `marque`, `DateDemande`, `QuantiteEnv`) VALUES
(32, 2, 'user2', '', '', 'pc', 'asus', NULL, 2),
(33, 1, 'user1', '', '', 'pc', 'asus', NULL, 1),
(35, 33, 'user2', '', '', 'table', 'bureau', '2021-05-05', 2),
(37, 11, 'user1', '', '', 'pc', 'hp', '2021-05-05', 1),
(40, 2, 'user2', '', '', 'pc', 'hp', '2021-05-05', 2),
(41, 2, 'user1', '', '', 'pc', 'asus', '2021-05-28', 1),
(44, 2, 'user2', '', '', 'ordinateur', 'asus', '2021-05-11', 2);

-- --------------------------------------------------------

--
-- Structure de la table `demande`
--

CREATE TABLE IF NOT EXISTS `demande` (
`ID` int(11) NOT NULL,
  `Utilisateur` varchar(255) DEFAULT NULL,
  `NumEtage` varchar(255) DEFAULT NULL,
  `nomType` varchar(255) DEFAULT NULL,
  `Designation` varchar(255) DEFAULT NULL,
  `marque` varchar(255) DEFAULT NULL,
  `DateDemande` date DEFAULT NULL,
  `msg` varchar(255) DEFAULT NULL,
  `msg_rep` varchar(255) DEFAULT NULL,
  `Quantite` int(11) DEFAULT NULL,
  `QuantiteEnv` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Contenu de la table `demande`
--

INSERT INTO `demande` (`ID`, `Utilisateur`, `NumEtage`, `nomType`, `Designation`, `marque`, `DateDemande`, `msg`, `msg_rep`, `Quantite`, `QuantiteEnv`) VALUES
(32, 'user2', '2', 'Autre', 'ordinateur', 'asus', '0000-00-00', ' m2', 'OK', 2, 2),
(33, 'user1', '1', 'bureautique', 'pc', 'asus', '2021-05-05', ' m1', 'ok', 1, 1),
(37, 'user1', '2', 'informatique', 'pc', 'hp', '2021-05-05', ' Pc hp', 'ok', 11, 1),
(38, 'user2', '3', 'bureautique', NULL, NULL, '2021-05-08', ' PC ASUS', 'D''accord user2', 33333333, NULL),
(39, 'user1', '0', 'Autre', NULL, NULL, '2021-05-08', 'ssi admin bghiiit 10 dyal baqiyat d lawra9 itoob 3liiiik', 'Non', 10, NULL),
(42, 'user1', '2', 'bureautique', 'table', 'bureau', '2021-05-28', 'je voudrais une table bureau ', 'd''accord user1', 4, 4),
(43, 'user1', '1', 'informatique', 'pc', 'asus', '2021-06-30', NULL, NULL, NULL, NULL),
(44, 'user2', '2', 'informatique', 'ordinateur', 'asus', '2021-05-11', ' AAA', 'OK', 2, 2),
(45, 'user2', '2', 'Autre', NULL, NULL, '2021-05-10', ' BBB', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `materiel`
--

CREATE TABLE IF NOT EXISTS `materiel` (
`IdMateriel` int(4) NOT NULL,
  `NumInventaire` varchar(11) DEFAULT NULL,
  `Utilisateur` varchar(254) DEFAULT NULL,
  `Fournisseur` varchar(254) DEFAULT NULL,
  `Etat` varchar(254) DEFAULT NULL,
  `Photo` varchar(254) DEFAULT NULL,
  `marque` varchar(255) DEFAULT NULL,
  `nomType` varchar(255) DEFAULT NULL,
  `Designation` varchar(255) DEFAULT NULL,
  `DateInstallation` date DEFAULT NULL,
  `DebutDateAffectation` date DEFAULT NULL,
  `NumEtage` varchar(255) DEFAULT NULL,
  `Quantite` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Contenu de la table `materiel`
--

INSERT INTO `materiel` (`IdMateriel`, `NumInventaire`, `Utilisateur`, `Fournisseur`, `Etat`, `Photo`, `marque`, `nomType`, `Designation`, `DateInstallation`, `DebutDateAffectation`, `NumEtage`, `Quantite`) VALUES
(1, '22/2021', 'ziza', 'zizo', 'en_marche', 'tblb.jpg', 'asus', 'informatique', 'pc', '2021-05-24', '2021-05-25', '1', 1),
(2, '22/2021', 'zizi', 'zzz', 'en_marche', 'pchp.jpg', 'asus', 'informatique', 'ordinateur', '2021-05-24', '2021-05-25', '1', 4),
(3, '22/2021', 'zizi', 'zzz', 'en_marche', 'pchp.jpg', 'asus', 'informatique', 'ordinateur', '2021-05-24', '2021-05-25', '1', 4),
(4, '22/2021', 'zaza', 'sssss', 'en_marche', 'tblb.jpg', 'bureau', 'informatique', 'table', '2021-05-24', '2021-05-25', '1', 2),
(5, '22/2021', 'zaza', 'sssss', 'en_marche', 'autrem.jpg', 'asus', 'informatique', 'ordinateur', '2021-05-24', '2021-05-25', '1', 4),
(6, '7/2021', NULL, 'lll', 'en_marche', 'tblb.jpg', 'hp', 'informatique', 'gggg', '2021-05-06', NULL, NULL, 7),
(7, '212', 'cc', 'rrr', 'en_marche', 'index.png', 'dell', 'informatique', 'gg', '2021-05-24', '0000-00-00', '2', 10),
(8, '8/2021', NULL, 'cccc', 'en_marche', 'index.png', 'ff', 'bureautique', 'rff', '2021-05-15', NULL, NULL, 10),
(9, '22/1', NULL, 'cc', 'en_marche', 'index.png', 'nbn', 'Autre', 'fff', '2021-05-15', NULL, NULL, 10),
(10, '55', NULL, 'gg', 'en_marche', 'index.png', 'ggv', 'informatique', 'ghg', '2021-05-30', NULL, NULL, 20),
(11, '22/2021', 'zizo', 'zizo', 'en_marche', 'pchp.jpg', 'hp', 'informatique', 'pc', '2021-05-24', '2021-05-25', '2', -2),
(12, '6', '', 'hhhh', 'A_reparie', 'pchp.jpg', 'fff', 'bureautique', 'fff', '2021-05-13', NULL, '0', 4),
(13, '1', '', 'ggg', 'en_marche', 'tblb.jpg', 'vvv', 'Autre', 'kkkk', '2021-05-15', NULL, '0', 11),
(40, '22/2021', 'zizi', 'zzz', 'en_marche', 'pchp.jpg', 'asus', 'informatique', 'ordinateur', '2021-05-24', '2021-05-25', '1', -1),
(41, '18/2021', 'zz', 'zed', 'A_reparie', 'cri.png', 'lenovo', 'Autre', 'pc', '2021-06-04', NULL, '1', 1);

-- --------------------------------------------------------

--
-- Structure de la table `parametre`
--

CREATE TABLE IF NOT EXISTS `parametre` (
  `NomLieu` varchar(254) DEFAULT NULL,
  `Adresse` varchar(254) DEFAULT NULL,
  `Telephone` varchar(254) DEFAULT NULL,
  `Email` varchar(254) DEFAULT NULL,
  `SiteWeb` varchar(254) DEFAULT NULL,
  `Description` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `parametre`
--

INSERT INTO `parametre` (`NomLieu`, `Adresse`, `Telephone`, `Email`, `SiteWeb`, `Description`) VALUES
('aa', 'aa', '123', 'aa@gmail.com', 'https:www.cri.com', '111');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
`iduser` int(4) NOT NULL,
  `login` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `etat` int(1) DEFAULT NULL,
  `pwd` varchar(255) DEFAULT NULL,
  `cin` varchar(10) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`iduser`, `login`, `email`, `role`, `etat`, `pwd`, `cin`) VALUES
(1, 'admin', 'admin@gmail.com', 'ADMIN', 1, '4a7d1ed414474e4033ac29ccb8653d9b', ''),
(2, 'user1', 'user1@gmail.com', 'VISITEUR', 1, '202cb962ac59075b964b07152d234b70', 'JC45845'),
(4, 'user2', 'user2@gmail.com', 'VISITEUR', 1, '202cb962ac59075b964b07152d234b70', 'AAA');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `affecter`
--
ALTER TABLE `affecter`
 ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `demande`
--
ALTER TABLE `demande`
 ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `materiel`
--
ALTER TABLE `materiel`
 ADD PRIMARY KEY (`IdMateriel`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
 ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `affecter`
--
ALTER TABLE `affecter`
MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT pour la table `demande`
--
ALTER TABLE `demande`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT pour la table `materiel`
--
ALTER TABLE `materiel`
MODIFY `IdMateriel` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
MODIFY `iduser` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
