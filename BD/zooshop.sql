-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 20 avr. 2023 à 12:32
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `zooshop`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin_users`
--

DROP TABLE IF EXISTS `admin_users`;
CREATE TABLE IF NOT EXISTS `admin_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `password`) VALUES
(1, 'alaeieb', '123');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categories` varchar(255) NOT NULL,
  `statuts` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `categories`, `statuts`) VALUES
(6, 'sourie', 1),
(4, 'Chien', 1),
(5, 'Chat', 1);

-- --------------------------------------------------------

--
-- Structure de la table `contact_us`
--

DROP TABLE IF EXISTS `contact_us`;
CREATE TABLE IF NOT EXISTS `contact_us` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(80) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `added_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `mobile`, `comment`, `added_on`) VALUES
(1, 'Alae IEBOUBEN', 'iebouben.alae@hotmail.com', '212675270883', 'ceci est un test d\'envoi de message', '2023-04-20 08:37:58');

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categories_id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `mrp` float NOT NULL,
  `prix` float NOT NULL,
  `quantite` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `petiteDescription` varchar(2000) NOT NULL,
  `description` text NOT NULL,
  `metaTitre` varchar(2000) NOT NULL,
  `metaDescription` varchar(2000) NOT NULL,
  `metaKeyword` varchar(2000) NOT NULL,
  `statuts` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `categories_id`, `nom`, `mrp`, `prix`, `quantite`, `image`, `petiteDescription`, `description`, `metaTitre`, `metaDescription`, `metaKeyword`, `statuts`) VALUES
(7, 4, 'Accessoire chien', 55, 45, 1, '894549384_acc6_290X385.png', 'test', 'test', 'test', 'test', 'test', 1),
(6, 5, 'chat1', 110, 90, 11, '890990183_1200_1200.png', 'aaa', 'aaa', 'aa', 'aa', 'aaa', 1),
(8, 4, 'Jouets Ã  mÃ¢cher pour chiens', 50, 25, 100, '769834022_acc3_290X385.png', 'pc morsure rÃ©sistant chien Ã  mÃ¢cher jouets pour petits chiens nettoyage dents chiot chien carotte coton corde animal de compagnie jouer jouet animaux', 'CaractÃ©ristique:\r\n\r\n \r\n100% tout neuf et de haute qualitÃ©\r\n\r\n \r\nType: Chiens\r\n\r\nJouets Type: Cordes\r\nMatÃ©riel: coton\r\nTaille: 22*3cm\r\nTotal longueur 22 cm, racine Hauteur 16 cm DiamÃ¨tre 3 cm\r\nIl y a une erreur de 1 ~ 3cm parce que la mesure munual affichÃ©e par horizontal.', 'Carotte Jouet', 'Carotte Jouet', 'Carotte Jouet', 1),
(9, 4, 'balle chien', 35, 15, 100, '505268929_acc4_290X385.png', 'Chien de compagnie jouets Ã©tirement caoutchouc fuite balle chien drÃ´le interactif jouet dents nettoyage balles morsure rÃ©sistant jouets Ã  mÃ¢cher 5cm/6cm/7cm', 'SpÃ©cification:<br>\r\n1. Aidez Ã  nettoyer les dents et Ã  prÃ©venir l\'accumulation de Plaque et de tartre.\r\n<br>\r\n2. Ces balles de chien rÃ©sistantes et durables sont faites de caoutchouc naturel Non toxique:\r\n<br>\r\nPlus durable, sain et rÃ©sistant Ã  la perforation par rapport au PVC et au TPR.\r\n<br>\r\n3. Conception spÃ©ciale pour les boules de jouet de puzzle de chien: qui peuvent Ãªtre bourrÃ©es de casse-croÃ»te d\'animal familier.\r\n<br>\r\nVos animaux de compagnie accepteront ce jouet facilement et auront plus de surprise en jouant. Meilleurs jouets pour chiens pour l\'ennui.\r\n<br>\r\n4. Un jouets d\'entraÃ®nement IQ plus intelligent pour les chats chiot chiens: qui peut Ãªtre utilisÃ© comme chien aller chercher des balles de jeu pour les jeux en plein air.\r\n<br>\r\nEmpÃªchez les chiens de mÃ¢cher les autres.\r\n<br>\r\n5. Jouets de nettoyage de dentition de chien en caoutchouc idÃ©aux pour le chat, le chiot, les petits chiens, les chiens moyens,\r\n<br>\r\nMÃªme les chiens de grande taille mÃ¢chent agressivement (diamÃ¨tre de balle: 5/7cm).', 'balle chien', 'balle chien', 'balle chien', 1),
(10, 4, 'Traqueur GPS', 40, 20, 100, '423320071_acc7_290X385.png', 'Traqueur GPS sans fil portable pour animaux de compagnie, Ã©tiquette de suivi pour chat et chien, anti-perte, prÃ©vention, accessoire Rastreador, Airtag', 'ã€Position prÃ©ciseã€‘Ce traqueur GPS pour animaux de compagnie vous permet de connaÃ®tre exactement l\'emplacement prÃ©cis de vos animaux de compagnie par 24 heures de surveillance continue en temps rÃ©el. VÃ©rifiez la position de l\'animal Ã  tout moment, connaissez clairement la direction de dÃ©placement de l\'animal, Ã©vitez que votre animal ne soit perdu et volÃ©, et rÃ©cupÃ©rez votre animal la prochaine fois.\r\nã€Ã‰coute Ã  distanceã€‘ Positionnement en temps rÃ©el, Fonction Ã©tanche, EnquÃªte mobile, ClÃ´ture Ã©lectronique, RequÃªte de suivi, Alarme de faible puissance, Temps de veille, Entretien silencieux, Avec le traceur GPS pour animaux de compagnie, vous pouvez dÃ©finir le numÃ©ro de tÃ©lÃ©phone portable du tuteur pour rester en contact avec votre animal de compagnie au loin.\r\nã€Fonction d\'appelã€‘ DÃ©finissez le numÃ©ro de rappel. Et cliquez sur le bouton \"Bien sÃ»r\", le traceur pour animaux de compagnie appellera automatiquement le numÃ©ro de tÃ©lÃ©phone que vous avez dÃ©fini.\r\nã€ClÃ´ture de sÃ©curitÃ©ã€‘Le traceur GPS pour animaux de compagnie est rÃ©sistant Ã  l\'eau et convient Ã  une utilisation dans une variÃ©tÃ© d\'environnements. Vous pouvez configurer une zone autour du localisateur, ce qui constitue une alarme immÃ©diate lorsque l\'animal entre ou sort de la zone.\r\nã€Super longue durÃ©e de veille et alarme de faible puissanceã€‘ Ce traceur GPS pour animaux de compagnie a 150 heures d\'autonomie en veille, et alarme en cas de pÃ©nurie d\'Ã©lectricitÃ©, vous rappelant de charger Ã  temps.\r\n\r\n1. Protocole de communication: BT V4.0 + EDR\r\n2. Distance de travail: < 25M\r\n3. Logiciel APP: le systÃ¨me Android peut Ãªtre tÃ©lÃ©chargÃ© Ã  partir du tÃ©lÃ©phone mobile Baidu Assistant, Apple peut Ãªtre tÃ©lÃ©chargÃ© Ã  partir de l\'Apple Store\r\n4. EfficacitÃ© de la batterie: pile bouton CR2032.\r\n5. Voix APP: prise en charge de l\'anglais, du chinois, de l\'espagnol,\r\n6. SystÃ¨me compatible: IOS 11 ci-dessus/Android 6 ci-dessus avec BT 4.0', 'Traqueur GPS sans fil portable pour animaux de compagnie', 'Traqueur GPS sans fil portable pour animaux de compagnie', 'Traqueur GPS sans fil portable pour animaux de compagnie', 1),
(11, 5, 'Boule murale d\'herbe Ã  chat', 25, 12, 100, '881612402_acc1_290X385.png', 'Boule murale d\'herbe Ã  chat', 'Boule murale d\'herbe Ã  chat pour chat, jouets d\'herbe Ã  chat rotatifs comestibles, lÃ©chage Iksain, friandises de collation, jouet de jeu pour chaton, avocat, 1 piÃ¨ce, 2 piÃ¨ces, 3/4 piÃ¨ces', 'Boule murale d\'herbe Ã  chat', 'Boule murale d\'herbe Ã  chat', 'Boule murale d\'herbe Ã  chat', 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `added_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`, `mobile`, `added_on`) VALUES
(1, 'Alae IEBOUBEN', '123', 'alae@gmail.com', '5147709488', '2023-04-11 23:31:22'),
(2, 'test', '123', 'alae1@gmail.com', '212675270883', '2023-04-20 09:42:34');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
