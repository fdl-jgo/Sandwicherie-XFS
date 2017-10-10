-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2017 at 02:23 PM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sandwicherie_xfs`
--

-- --------------------------------------------------------

--
-- Table structure for table `adresse`
--

CREATE TABLE `adresse` (
  `id` int(11) NOT NULL,
  `ville_id` int(11) DEFAULT NULL,
  `rue` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `numero` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `commentaire` longtext COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `adresse`
--

INSERT INTO `adresse` (`id`, `ville_id`, `rue`, `numero`, `role`, `commentaire`) VALUES
(1, 1, 'Rue de la poteresse', '5', NULL, NULL),
(2, 2, 'Avenue marie d\'Artois', '42', NULL, NULL),
(3, 3, 'rue Antoine Nelis', '14', NULL, NULL),
(4, 4, 'Ch. de WATERLOO', '2', NULL, NULL),
(5, 5, 'rue des Colonies', '50', NULL, NULL),
(6, 6, 'av Baudouin 1er', '17', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `carte_menu`
--

CREATE TABLE `carte_menu` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

CREATE TABLE `commande` (
  `id` int(11) NOT NULL,
  `panier_id` int(11) DEFAULT NULL,
  `adresse_livraison_id` int(11) DEFAULT NULL,
  `processed` tinyint(1) NOT NULL,
  `livree` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `commande`
--

INSERT INTO `commande` (`id`, `panier_id`, `adresse_livraison_id`, `processed`, `livree`) VALUES
(1, 1, NULL, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `garniture`
--

CREATE TABLE `garniture` (
  `id` int(11) NOT NULL,
  `type_garniture_id` int(11) DEFAULT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prix` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `garniture`
--

INSERT INTO `garniture` (`id`, `type_garniture_id`, `nom`, `prix`) VALUES
(1, 6, 'Tomate', 0.3),
(2, 6, 'Salade', 0.5),
(3, 1, 'Jambon', 0.5),
(4, 5, 'Fromage', 0.4),
(5, 2, 'Oeuf dur', 0.35),
(6, 5, 'Fromage de chèvre', 0.5),
(7, 6, 'Avocat', 0.4),
(8, 1, 'Rosbif', 0.75),
(9, 1, 'Dinde', 0.75),
(10, 1, 'Poulet curry', 0.5),
(11, 4, 'Saumon fumé', 1),
(12, 4, 'Thon', 0.5),
(13, 1, 'Poulet andalouse', 0.5),
(14, 3, 'Huile d\'olive', 0.2),
(15, 6, 'Carottes rapées', 0.3),
(16, 2, 'Mayonnaise', 0.4);

-- --------------------------------------------------------

--
-- Table structure for table `ligne_panier`
--

CREATE TABLE `ligne_panier` (
  `id` int(11) NOT NULL,
  `sandwich_id` int(11) DEFAULT NULL,
  `panier_id` int(11) DEFAULT NULL,
  `quantite` smallint(6) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ligne_panier`
--

INSERT INTO `ligne_panier` (`id`, `sandwich_id`, `panier_id`, `quantite`) VALUES
(1, 1, 1, 3),
(2, 2, 1, 1),
(3, 3, 2, 2),
(4, 2, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pain`
--

CREATE TABLE `pain` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prix` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pain`
--

INSERT INTO `pain` (`id`, `nom`, `prix`) VALUES
(1, 'pain1', 1.05),
(2, 'pain2', 1.5),
(3, 'pain3', 2.05);

-- --------------------------------------------------------

--
-- Table structure for table `panier`
--

CREATE TABLE `panier` (
  `id` int(11) NOT NULL,
  `utilisateur_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `panier`
--

INSERT INTO `panier` (`id`, `utilisateur_id`) VALUES
(1, 2),
(2, 3),
(3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `sandwich`
--

CREATE TABLE `sandwich` (
  `id` int(11) NOT NULL,
  `carte_menu_id` int(11) DEFAULT NULL,
  `utilisateur_concepteur_id` int(11) DEFAULT NULL,
  `pain_id` int(11) DEFAULT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sandwich`
--

INSERT INTO `sandwich` (`id`, `carte_menu_id`, `utilisateur_concepteur_id`, `pain_id`, `nom`) VALUES
(1, NULL, NULL, 1, 'Un sandwich au Jambon fromage'),
(2, NULL, NULL, 2, 'Un sandwich Poulet andalouse'),
(3, NULL, NULL, 1, 'Un sandwich au Thom Mayo');

-- --------------------------------------------------------

--
-- Table structure for table `sandwich_garniture`
--

CREATE TABLE `sandwich_garniture` (
  `sandwich_id` int(11) NOT NULL,
  `garniture_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sandwich_garniture`
--

INSERT INTO `sandwich_garniture` (`sandwich_id`, `garniture_id`) VALUES
(1, 2),
(1, 3),
(1, 4),
(2, 1),
(2, 5),
(2, 13),
(3, 2),
(3, 12),
(3, 16);

-- --------------------------------------------------------

--
-- Table structure for table `type_garniture`
--

CREATE TABLE `type_garniture` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `type_garniture`
--

INSERT INTO `type_garniture` (`id`, `nom`) VALUES
(6, 'Autres'),
(1, 'Crudité'),
(4, 'Fromage'),
(5, 'Huiles et Sauces'),
(3, 'Poisson'),
(2, 'Viande');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `adresse_id` int(11) DEFAULT NULL,
  `username` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `confirmation_token` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `nom` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `prenom` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `connected` tinyint(1) DEFAULT '1',
  `locked` tinyint(1) DEFAULT '0',
  `point_fidelite` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `adresse_id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `confirmation_token`, `password_requested_at`, `roles`, `nom`, `prenom`, `connected`, `locked`, `point_fidelite`) VALUES
(1, 2, 'fjacques', 'fjacques', 'fjacques@mail.be', 'fjacques@mail.be', 1, NULL, '$2y$13$AqKPgq3lJHU/znjEYTdor.HST2BZLhXXc.4CQ6/Qeh8C/yToPPMYa', NULL, NULL, NULL, 'a:0:{}', NULL, NULL, NULL, NULL, NULL),
(2, 3, 'stan.parmentier', 'stan.parmentier', 'stan.parmentier@mail.be', 'stan.parmentier@mail.be', 1, NULL, '$2y$13$ZWcf0DpqgkbDNBQ5giEDJ.TMw1k9p4FYPKhGPnwKmMYNRSEITX0Si', NULL, NULL, NULL, 'a:0:{}', NULL, NULL, NULL, NULL, NULL),
(3, 4, 'janssens.robbe', 'janssens.robbe', 'janssens.robbe@mail.be', 'janssens.robbe@mail.be', 1, NULL, '$2y$13$v7Tp9C0LCsaT91elyx7hzOF8hPYr8tq.LXiEDb/JNElPE4UsS295G', NULL, NULL, NULL, 'a:0:{}', NULL, NULL, NULL, NULL, NULL),
(4, 5, 'ferre.mertens', 'ferre.mertens', 'ferre.mertens@mail.be', 'ferre.mertens@mail.be', 1, NULL, '$2y$13$nsPdN.ChnBUrrkLXQ4goEeA1b7Jow62iJxSJbHrmd3krdkAq8FLti', NULL, NULL, NULL, 'a:0:{}', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ville`
--

CREATE TABLE `ville` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `codePostal` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ville`
--

INSERT INTO `ville` (`id`, `nom`, `codePostal`) VALUES
(1, 'Beez', '5000'),
(2, 'NAMUR', '5000'),
(3, 'Belgrade', '5001'),
(4, 'Saint-Servais', '5002'),
(5, 'Saint-Marc', '5003'),
(6, 'Bouge', '5004');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adresse`
--
ALTER TABLE `adresse`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_C35F0816A73F0036` (`ville_id`);

--
-- Indexes for table `carte_menu`
--
ALTER TABLE `carte_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_6EEAA67DF77D927C` (`panier_id`),
  ADD KEY `IDX_6EEAA67DBE2F0A35` (`adresse_livraison_id`);

--
-- Indexes for table `garniture`
--
ALTER TABLE `garniture`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_89D7F121CD9DC4E0` (`type_garniture_id`);

--
-- Indexes for table `ligne_panier`
--
ALTER TABLE `ligne_panier`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_21691B44D566043` (`sandwich_id`),
  ADD KEY `IDX_21691B4F77D927C` (`panier_id`);

--
-- Indexes for table `pain`
--
ALTER TABLE `pain`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_24CC0DF2FB88E14F` (`utilisateur_id`);

--
-- Indexes for table `sandwich`
--
ALTER TABLE `sandwich`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_882708689D1F0D48` (`carte_menu_id`),
  ADD KEY `IDX_88270868699A7484` (`utilisateur_concepteur_id`),
  ADD KEY `IDX_8827086864775A84` (`pain_id`);

--
-- Indexes for table `sandwich_garniture`
--
ALTER TABLE `sandwich_garniture`
  ADD PRIMARY KEY (`sandwich_id`,`garniture_id`),
  ADD KEY `IDX_F5E9797A4D566043` (`sandwich_id`),
  ADD KEY `IDX_F5E9797A4ADE7EE5` (`garniture_id`);

--
-- Indexes for table `type_garniture`
--
ALTER TABLE `type_garniture`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_3D11B0316C6E55B5` (`nom`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_1D1C63B392FC23A8` (`username_canonical`),
  ADD UNIQUE KEY `UNIQ_1D1C63B3A0D96FBF` (`email_canonical`),
  ADD UNIQUE KEY `UNIQ_1D1C63B3C05FB297` (`confirmation_token`),
  ADD KEY `IDX_1D1C63B34DE7DC5C` (`adresse_id`);

--
-- Indexes for table `ville`
--
ALTER TABLE `ville`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adresse`
--
ALTER TABLE `adresse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `carte_menu`
--
ALTER TABLE `carte_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `commande`
--
ALTER TABLE `commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `garniture`
--
ALTER TABLE `garniture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `ligne_panier`
--
ALTER TABLE `ligne_panier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pain`
--
ALTER TABLE `pain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `panier`
--
ALTER TABLE `panier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sandwich`
--
ALTER TABLE `sandwich`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `type_garniture`
--
ALTER TABLE `type_garniture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ville`
--
ALTER TABLE `ville`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `adresse`
--
ALTER TABLE `adresse`
  ADD CONSTRAINT `FK_C35F0816A73F0036` FOREIGN KEY (`ville_id`) REFERENCES `ville` (`id`);

--
-- Constraints for table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `FK_6EEAA67DBE2F0A35` FOREIGN KEY (`adresse_livraison_id`) REFERENCES `adresse` (`id`),
  ADD CONSTRAINT `FK_6EEAA67DF77D927C` FOREIGN KEY (`panier_id`) REFERENCES `panier` (`id`);

--
-- Constraints for table `garniture`
--
ALTER TABLE `garniture`
  ADD CONSTRAINT `FK_89D7F121CD9DC4E0` FOREIGN KEY (`type_garniture_id`) REFERENCES `type_garniture` (`id`);

--
-- Constraints for table `ligne_panier`
--
ALTER TABLE `ligne_panier`
  ADD CONSTRAINT `FK_21691B44D566043` FOREIGN KEY (`sandwich_id`) REFERENCES `sandwich` (`id`),
  ADD CONSTRAINT `FK_21691B4F77D927C` FOREIGN KEY (`panier_id`) REFERENCES `panier` (`id`);

--
-- Constraints for table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `FK_24CC0DF2FB88E14F` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateur` (`id`);

--
-- Constraints for table `sandwich`
--
ALTER TABLE `sandwich`
  ADD CONSTRAINT `FK_8827086864775A84` FOREIGN KEY (`pain_id`) REFERENCES `pain` (`id`),
  ADD CONSTRAINT `FK_88270868699A7484` FOREIGN KEY (`utilisateur_concepteur_id`) REFERENCES `utilisateur` (`id`),
  ADD CONSTRAINT `FK_882708689D1F0D48` FOREIGN KEY (`carte_menu_id`) REFERENCES `carte_menu` (`id`);

--
-- Constraints for table `sandwich_garniture`
--
ALTER TABLE `sandwich_garniture`
  ADD CONSTRAINT `FK_F5E9797A4ADE7EE5` FOREIGN KEY (`garniture_id`) REFERENCES `garniture` (`id`),
  ADD CONSTRAINT `FK_F5E9797A4D566043` FOREIGN KEY (`sandwich_id`) REFERENCES `sandwich` (`id`);

--
-- Constraints for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `FK_1D1C63B34DE7DC5C` FOREIGN KEY (`adresse_id`) REFERENCES `adresse` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
