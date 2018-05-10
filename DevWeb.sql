-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Jeu 10 Mai 2018 à 22:23
-- Version du serveur :  5.7.22-0ubuntu0.17.10.1
-- Version de PHP :  7.1.15-0ubuntu0.17.10.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `DevWeb`
--

-- --------------------------------------------------------

--
-- Structure de la table `Article`
--

CREATE TABLE `Article` (
  `id` int(10) UNSIGNED NOT NULL,
  `titre` varchar(50) NOT NULL,
  `description` mediumtext NOT NULL,
  `actif` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Article`
--

INSERT INTO `Article` (`id`, `titre`, `description`, `actif`) VALUES
(1, 'Super Mario Odyssey', 'Super Mario Odyssey est un jeu de plate-forme sur Switch où la princesse Peach a été enlevée par Bowser. Pour la sauver, Mario quitte le royaume Champignon à bord de l\'Odyssey. Accompagné de Chappy, son chapeau vivant, il doit parcourir différents royaumes et faire tout pour vaincre, une nouvelle fois, le terrible Bowser.', 1),
(2, 'The legend of Zelda: Breath of the wild', 'The Legend of Zelda : Breath of the Wild est un jeu d\'action/aventure. Link se réveille d\'un sommeil de 100 ans dans un royaume d\'Hyrule dévasté. Il lui faudra percer les mystères du passé et vaincre Ganon, le fléau. L\'aventure prend place dans un gigantesque monde ouvert et accorde ainsi une part importante à l\'exploration. Le titre a été pensé pour que le joueur puisse aller où il veut dès le début, s\'éloignant de la linéarité habituelle de la série.', 1),
(3, 'The evil within 2', 'Trois ans après les événements de Beacon Mental Hospital, Sebastian Castellanos a quitté le département de police de la ville de Krimson pour traquer la mystérieuse organisation Mobius, cependant il continue à être hanté par ce qu\'il a vécu à Beacon, la disparition de sa femme Myra et la mort de sa fille Lily lors d\'un incendie. Noyant ses peines dans un bar, Sebastian est alors approché son ancienne partenaire au sein de la police et qui s\'est révélée agent de Mobius, Juli Kidman, qui lui révèle que Lily est toujours en vie. C\'est à contrecoeur que Sebastian va devoir s\'associer à l\'organisation Mobius si il souhaite avoir une chance de retrouver sa fille saine et sauve et la libéré du système STEM.', 1),
(6, 'Batman Arkham knight', 'Se déroulant un an après les événements de Batman Arkham City, Batman Arkham Knight est un jeu d\'action dans lequel l’Épouvantail menace d\'utiliser des armes chimiques sur la ville. Batman est donc au rendez-vous, accompagnée de sa Batmobile qui prend une importance capitale.', 1),
(51, 'The last of us Remastered', 'The Last of Us se passe dans un monde post-apocalyptique, ravagé et devenu ruine, dans lequel les deux personnages principaux se battent pour récupérer munitions et vivres, ou luttent pour leur survie contre le reste de la population décimée par une infection incontrôlée. Le monologue final d’Ellie laisse à penser que cette situation chaotique dure depuis des années, l’adolescente n’ayant pas de souvenir de l’époque où la population pouvait vivre paisiblement et circuler librement dans les rues. Le comics The Last of Us: American Dreams apprend au lecteur que l’épidémie s’est déclenchée six ans avant sa naissance.', 1),
(58, 'Resident evil 7', 'Resident Evil VII est un survival-horror en vue à la première personne jouable en solo. Dans un style sombre et glauque revenant aux racines de la série, ce nouvel épisode vous conduit dans un manoir isolé où une nouvelle expérience virale a dégénéré. Vous commencez seul et désarmé et gagnez puissance et informations au fur et à mesure que vous explorez l\'univers cauchemardesque qui vous entoure.', 1),
(59, 'Metroid: Samus returns', 'Metroid : Samus Returns est un jeu d\'aventure plateforme sur Nintendo 3DS. Il s\'agit du remake de l\'épisode sorti en 1992. Cette édition se présente ainsi comme une version revisitée de ce grand classique avec des graphismes complètement refaits à neuf.', 1);

-- --------------------------------------------------------

--
-- Structure de la table `Categorie`
--

CREATE TABLE `Categorie` (
  `id` int(10) UNSIGNED NOT NULL,
  `categorie` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Categorie`
--

INSERT INTO `Categorie` (`id`, `categorie`) VALUES
(101, 'Xbox 360'),
(102, 'Xbox One'),
(201, 'PlayStation 3'),
(202, 'PlayStation 4'),
(203, 'PS Vita'),
(301, 'Wii U'),
(302, 'Switch'),
(303, '3DS');

-- --------------------------------------------------------

--
-- Structure de la table `CategorieArticle`
--

CREATE TABLE `CategorieArticle` (
  `idArticle` int(11) DEFAULT NULL,
  `idCategorie` int(11) DEFAULT NULL,
  `prix` double(5,2) NOT NULL,
  `image` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `CategorieArticle`
--

INSERT INTO `CategorieArticle` (`idArticle`, `idCategorie`, `prix`, `image`) VALUES
(1, 302, 59.99, '1.jpg'),
(2, 301, 29.99, '11.jpg'),
(2, 302, 39.99, '2.jpg'),
(3, 102, 59.99, '3.jpg'),
(3, 202, 59.99, '4.jpg'),
(6, 102, 59.99, '5.jpg'),
(6, 202, 59.99, '6.jpg'),
(51, 202, 39.99, '10.jpg'),
(58, 102, 39.99, 'xboxRE7'),
(58, 202, 39.99, 'ps4RE7'),
(59, 303, 19.99, '91-iFuH-Q8L._SX342_.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `Client`
--

CREATE TABLE `Client` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `cp` int(4) NOT NULL,
  `localite` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `idGrade` int(10) UNSIGNED NOT NULL DEFAULT '10',
  `motDePasse` varchar(100) NOT NULL,
  `actif` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Client`
--

INSERT INTO `Client` (`id`, `nom`, `prenom`, `adresse`, `cp`, `localite`, `email`, `idGrade`, `motDePasse`, `actif`) VALUES
(1, 'STIEVENARD', 'Michael', '4, rue des Hiercheurs', 7100, 'Saint-Vaast', 'stievenard@gmail.com', 20, 'dd308b32de1e9b294d28f76384898f2e7ceb67a8', 1),
(2, 'STIEVENARD', 'Mael', '4, rue des Hiercheurs', 7100, 'Saint-Vaast', 'stievenardmael1@gmail.com', 10, 'dd308b32de1e9b294d28f76384898f2e7ceb67a8', 1),
(4, 'STIEVENARD', 'Lola', '4, rue des Hiercheurs', 7100, 'Saint-Vaast', 'stievenardlola@gmail.com', 10, 'dd308b32de1e9b294d28f76384898f2e7ceb67a8', 1),
(5, 'STIEVENARD', 'Leila', '4, rue des Hiercheurs', 7100, 'Saint-Vaast', 'stievenardleila@gmail.com', 10, 'dd308b32de1e9b294d28f76384898f2e7ceb67a8', 1),
(7, 'STIEVENARD', 'Léana', '4, rue des Hiercheurs', 7100, 'Saint-Vaast', 'stievenardleana@gmail.com', 10, 'dd308b32de1e9b294d28f76384898f2e7ceb67a8', 1),
(8, 'TOUBEAU', 'Aurelie', '4, rue des Hiercheurs', 7100, 'Saint-Vaast', 'aurelie.toubeau@gmail.com', 10, 'dd308b32de1e9b294d28f76384898f2e7ceb67a8', 1),
(9, 'MARIO', 'Mario', '4, rue des Champignons', 8000, 'Mushroom Kingdom', 'supermario@nintendo.jap', 10, 'dd308b32de1e9b294d28f76384898f2e7ceb67a8', 1),
(11, 'WAYNE', 'Bruce', 'Manoir Wayne', 1200, 'Gotham City', 'brucewayne@gotham.com', 10, '10c4b89638b8f2cbb543c5e2401c5dff58eab917', 1),
(12, 'Stievenard', 'Michael', 'reafeaf', 4541, 'jfdsqfd', 'michael@ici.com', 10, 'dd308b32de1e9b294d28f76384898f2e7ceb67a8', 1),
(13, 'iZUEFH', 'QOIZUFH', 'opzuefh', 6578, 'iozuqehli', 'fZFFae@hotmail.fr', 10, '8cb2237d0679ca88db6464eac60da96345513964', 1);

-- --------------------------------------------------------

--
-- Structure de la table `Commande`
--

CREATE TABLE `Commande` (
  `id` int(10) UNSIGNED NOT NULL,
  `dateCommande` date NOT NULL,
  `idClient` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Commande`
--

INSERT INTO `Commande` (`id`, `dateCommande`, `idClient`) VALUES
(2, '2018-05-08', 1),
(3, '2018-05-08', 1),
(4, '2018-05-09', 4);

-- --------------------------------------------------------

--
-- Structure de la table `Grade`
--

CREATE TABLE `Grade` (
  `id` int(10) UNSIGNED NOT NULL,
  `grade` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Grade`
--

INSERT INTO `Grade` (`id`, `grade`) VALUES
(10, 'Client'),
(20, 'Administrateur');

-- --------------------------------------------------------

--
-- Structure de la table `LignesCommande`
--

CREATE TABLE `LignesCommande` (
  `idCommande` int(10) UNSIGNED NOT NULL,
  `idArticle` int(10) UNSIGNED NOT NULL,
  `idCategorie` int(11) NOT NULL,
  `quantite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `LignesCommande`
--

INSERT INTO `LignesCommande` (`idCommande`, `idArticle`, `idCategorie`, `quantite`) VALUES
(2, 6, 102, 1),
(3, 6, 102, 1),
(3, 6, 202, 1),
(3, 1, 302, 1),
(4, 6, 202, 1),
(4, 2, 301, 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `Article`
--
ALTER TABLE `Article`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UK_Article_titre` (`titre`);

--
-- Index pour la table `Categorie`
--
ALTER TABLE `Categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Client`
--
ALTER TABLE `Client`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UK_Client_nomPrenomEmail` (`nom`,`prenom`,`email`),
  ADD KEY `idGrade` (`idGrade`);

--
-- Index pour la table `Commande`
--
ALTER TABLE `Commande`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idClient` (`idClient`);

--
-- Index pour la table `Grade`
--
ALTER TABLE `Grade`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `LignesCommande`
--
ALTER TABLE `LignesCommande`
  ADD KEY `idCommande` (`idCommande`),
  ADD KEY `idArticle` (`idArticle`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `Article`
--
ALTER TABLE `Article`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
--
-- AUTO_INCREMENT pour la table `Client`
--
ALTER TABLE `Client`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `Commande`
--
ALTER TABLE `Commande`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `Client`
--
ALTER TABLE `Client`
  ADD CONSTRAINT `Client_ibfk_1` FOREIGN KEY (`idGrade`) REFERENCES `Grade` (`id`);

--
-- Contraintes pour la table `Commande`
--
ALTER TABLE `Commande`
  ADD CONSTRAINT `Commande_ibfk_1` FOREIGN KEY (`idClient`) REFERENCES `Client` (`id`);

--
-- Contraintes pour la table `LignesCommande`
--
ALTER TABLE `LignesCommande`
  ADD CONSTRAINT `LignesCommande_ibfk_1` FOREIGN KEY (`idCommande`) REFERENCES `Commande` (`id`),
  ADD CONSTRAINT `LignesCommande_ibfk_2` FOREIGN KEY (`idArticle`) REFERENCES `Article` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
