-- phpMyAdmin SQL Dump
-- version OVH
-- https://www.phpmyadmin.net/
--
-- Hôte : aymecorprjbd.mysql.db
-- Généré le :  lun. 26 avr. 2021 à 11:49
-- Version du serveur :  5.6.50-log
-- Version de PHP :  7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `aymecorprjbd`
--

-- --------------------------------------------------------

--
-- Structure de la table `dataleague_equipe`
--

CREATE TABLE `dataleague_equipe` (
  `id_equipe` int(11) NOT NULL,
  `nom` varchar(60) DEFAULT NULL,
  `logo` varchar(60) DEFAULT NULL,
  `pays_id_pays` int(11) NOT NULL,
  `date_creation` varchar(20) DEFAULT NULL,
  `link_fb` varchar(80) DEFAULT NULL,
  `link_twitter` varchar(80) DEFAULT NULL,
  `link_insta` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `dataleague_equipe`
--

INSERT INTO `dataleague_equipe` (`id_equipe`, `nom`, `logo`, `pays_id_pays`, `date_creation`, `link_fb`, `link_twitter`, `link_insta`) VALUES
(1, 'Solary', 'logo-Solary.png', 1, '2017', 'https://www.facebook.com/SolaryTV/', 'https://twitter.com/SolaryTV', 'https://www.instagram.com/solarytv/'),
(2, 'Karmine Corp', 'logo-Karmine_Corp.png', 1, '2020', 'https://www.facebook.com/KarmineCorp', 'https://twitter.com/karminecorp', 'https://www.instagram.com/karminecorp/'),
(3, 'Misfits Premier', 'logo-Misfits.png', 1, '2019', 'https://www.facebook.com/MisfitsGG/', 'https://twitter.com/MisfitsGG', 'https://www.instagram.com/misfitsgg/'),
(4, 'LDLC OL', 'logo-LDLC.png', 1, '2010', 'https://www.facebook.com/teamLDLC/', 'https://twitter.com/LDLC_OL', 'https://www.instagram.com/ldlc_ol/'),
(5, 'GamersOrigin', 'logo-GamersOrigin.png', 1, '2017', 'https://www.facebook.com/GamersOrigin/', 'https://twitter.com/GamersOrigin', 'https://www.instagram.com/gamersorigin/'),
(6, 'G2 Esports', 'logo-G2_Esports.png', 2, '2015', 'https://www.facebook.com/G2esports', 'https://twitter.com/G2esports', 'https://www.instagram.com/g2esports/'),
(7, 'Fnatic', 'logo-Fnatic.png', 2, '2004', 'https://www.facebook.com/FnaticLoL', 'https://twitter.com/FNATIC', 'https://www.instagram.com/fnatic.lol/'),
(8, 'Team Liquid', 'logo-Team_Liquid.png', 4, '2000', 'https://fr-fr.facebook.com/teamliquid/', 'https://twitter.com/teamliquidlol', 'https://www.instagram.com/TeamLiquid/'),
(9, 'Rogue', 'logo-Rogue.png', 5, '2016', 'https://www.facebook.com/RogueGG', 'https://twitter.com/rogue', 'https://www.instagram.com/rogue.gg/'),
(10, 'TSM', 'logo-TSM.png', 5, '2009', 'https://www.facebook.com/TSM', 'https://twitter.com/TSM', 'https://instagram.com/tsm/'),
(11, 'Vitality', 'logo-Vitality.png', 1, '2015', 'https://www.facebook.com/teamvitality', 'https://twitter.com/TeamVitality', 'https://www.instagram.com/teamvitality/'),
(12, 'T1', 'logo-T1.png', 6, '2019', 'https://www.facebook.com/T1LoL', 'https://twitter.com/T1LoL', 'https://www.instagram.com/t1lol/'),
(13, 'Royal Never Give Up', 'logo-Royal_Never_Give_Up.png', 7, '2015', 'https://www.facebook.com/RNGRoyal/', 'https://twitter.com/RNGRoyal', 'https://www.instagram.com/rngroyal/'),
(14, 'FunPlus Phoenix', 'logo-FunPlus_Phoenix.png', 7, '2017', NULL, 'https://twitter.com/FPX_Esports', 'https://www.instagram.com/fpx.esports/'),
(15, 'EDward Gaming', 'logo-EDward_Gaming.png', 7, '2014', 'https://www.facebook.com/LPLEDWARD', 'https://twitter.com/EDG_Edward', 'https://www.instagram.com/edg_official/'),
(16, 'Astralis', 'logo-Astralis.png', 8, '2016', 'https://www.facebook.com/astralisgg', 'https://twitter.com/astralisgg', 'https://www.instagram.com/astralis/'),
(17, 'Dignitas', 'logo-Dignitas.png', 3, '2019', 'https://www.facebook.com/Dignitas', 'https://twitter.com/Dignitas', 'https://www.instagram.com/Dignitas/'),
(18, 'Damwon Gaming', 'logo-Damwon_Gaming.png', 6, '2017', 'https://www.facebook.com/dwgkia.lol', 'https://twitter.com/DWGKIA', 'https://www.instagram.com/dwgkia.lol/'),
(19, 'DRX', 'logo-DRX.png', 6, '2019', 'https://www.facebook.com/DRXGlobal', 'https://twitter.com/DRXGlobal', 'https://www.instagram.com/drxglobal/'),
(20, 'Gen.G', 'logo-Gen_G.png', 6, '2018', 'https://www.facebook.com/GenGLOL', 'https://twitter.com/GenG_KR', 'https://www.instagram.com/gengesports/'),
(21, 'SK Gaming', 'logo-SK_Gaming.png', 2, '2010', 'https://www.facebook.com/SKGaming', 'https://twitter.com/SKGaming', 'https://www.instagram.com/skgaming/'),
(22, '100 Thieves', 'logo-100_Thieves.png', 5, '2016', 'https://www.facebook.com/100Thieves', 'https://twitter.com/100Thieves', 'https://www.instagram.com/100thieves/'),
(23, 'Cloud9', 'logo-Cloud9.png', 5, '2012', 'https://www.facebook.com/cloud9', 'https://twitter.com/cloud9', 'https://www.instagram.com/cloud9gg/'),
(24, 'Invictus Gaming', 'logo-Invictus_Gaming.png', 7, '2011', 'https://www.facebook.com/InvictusGaming.Official', 'https://twitter.com/invgaming', 'https://www.instagram.com/iginvictusgaming/'),
(25, 'Immortals', 'logo-Immortals.png', 5, '2015', 'https://www.facebook.com/Immortalsgg', 'https://twitter.com/immortals', 'https://www.instagram.com/immortals_gg/');

-- --------------------------------------------------------

--
-- Structure de la table `dataleague_jeux`
--

CREATE TABLE `dataleague_jeux` (
  `id_jeux` int(11) NOT NULL,
  `nom` varchar(60) DEFAULT NULL,
  `accronyme` varchar(45) DEFAULT NULL,
  `logo` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `dataleague_jeux`
--

INSERT INTO `dataleague_jeux` (`id_jeux`, `nom`, `accronyme`, `logo`) VALUES
(1, 'League of Legend', 'LOL', 'lol.png'),
(2, 'Counter Strike: Global Offensive', 'CSGO', 'csgo.png');

-- --------------------------------------------------------

--
-- Structure de la table `dataleague_joueur`
--

CREATE TABLE `dataleague_joueur` (
  `id_joueur` int(11) NOT NULL,
  `nom` varchar(60) DEFAULT NULL,
  `prenom` varchar(60) DEFAULT NULL,
  `pseudo` varchar(60) DEFAULT NULL,
  `jeux_id_jeux` int(11) NOT NULL,
  `poste_id_poste` int(11) NOT NULL,
  `equipe_id_equipe` int(11) NOT NULL,
  `pays_id_pays` int(11) NOT NULL,
  `photo` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `dataleague_joueur`
--

INSERT INTO `dataleague_joueur` (`id_joueur`, `nom`, `prenom`, `pseudo`, `jeux_id_jeux`, `poste_id_poste`, `equipe_id_equipe`, `pays_id_pays`, `photo`) VALUES
(1, 'Robert', 'Cedric', 'Eyliph', 1, 1, 1, 1, '.png'),
(2, 'Charly', 'Guillard', 'Djoko', 1, 2, 1, 1, '.png'),
(3, 'Wiederhofer', 'Marcel', 'Scarlet', 1, 3, 1, 10, '.png'),
(4, 'Jacobs', 'Patrick', 'Asza', 1, 4, 1, 4, '.png'),
(5, 'Medjaldi', 'Pierre', 'Steeelback', 1, 5, 1, 1, '.png'),
(6, 'Kaikkonen', 'Aleksi', 'H1IVA', 1, 6, 1, 16, '.png');

-- --------------------------------------------------------

--
-- Structure de la table `dataleague_pays`
--

CREATE TABLE `dataleague_pays` (
  `id_pays` int(11) NOT NULL,
  `libelle` varchar(60) NOT NULL,
  `drapeau` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `dataleague_pays`
--

INSERT INTO `dataleague_pays` (`id_pays`, `libelle`, `drapeau`) VALUES
(1, 'France', 'France.png'),
(2, 'Allemagne', 'Germany.png'),
(3, 'Royaume-Uni', 'United-Kingdom.png'),
(4, 'Pays-Bas', 'Netherlands.png'),
(5, 'États-Unis', 'United-States.png'),
(6, 'Corée du Sud', 'Korea-Republic.png'),
(7, 'Chine', 'China-PR.png'),
(8, 'Danemark', 'Denmark.png'),
(9, 'Australie', 'Australia.png'),
(10, 'Autriche', 'Austria.png'),
(11, 'Belgique', 'Belgium.png'),
(12, 'Bulgarie', 'Bulgaria.png'),
(13, 'Canada', 'Canada.png'),
(14, 'Croatie', 'Croatia.png'),
(15, 'Estonie', 'Estonia.png'),
(16, 'Finlande', 'Finland.png'),
(17, 'Grèce', 'Greece.png'),
(18, 'Hong-Kong', 'Hong-Kong.png'),
(19, 'Italie', 'Italy.png'),
(20, 'Japon', 'Japan.png'),
(21, 'Nouvelle Zélande', 'New-Zealand.png'),
(22, 'Pologne', 'Poland.png'),
(23, 'Portugal', 'Portugal.png'),
(24, 'Roumanie', 'Romanie.png'),
(25, 'Russie', 'Russia.png'),
(26, 'Serbie', 'Serbia.png'),
(27, 'Slovanie', 'Slovania.png'),
(28, 'Espagne', 'Spain.png'),
(29, 'Suède', 'Sweden.png'),
(30, 'Taiwan', 'Taiwan.png'),
(31, 'Turquie', 'Turkey.png'),
(32, 'Ukraine', 'Ukraine.png');

-- --------------------------------------------------------

--
-- Structure de la table `dataleague_poste`
--

CREATE TABLE `dataleague_poste` (
  `id_poste` int(11) NOT NULL,
  `nom` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `dataleague_poste`
--

INSERT INTO `dataleague_poste` (`id_poste`, `nom`) VALUES
(1, 'Top'),
(2, 'Jungle'),
(3, 'Mid'),
(4, 'Adc'),
(5, 'Support'),
(6, 'Coach');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `dataleague_equipe`
--
ALTER TABLE `dataleague_equipe`
  ADD PRIMARY KEY (`id_equipe`),
  ADD UNIQUE KEY `id_equipe_UNIQUE` (`id_equipe`),
  ADD KEY `fk_equipe_pays_idx` (`pays_id_pays`);

--
-- Index pour la table `dataleague_jeux`
--
ALTER TABLE `dataleague_jeux`
  ADD PRIMARY KEY (`id_jeux`),
  ADD UNIQUE KEY `id_jeux_UNIQUE` (`id_jeux`);

--
-- Index pour la table `dataleague_joueur`
--
ALTER TABLE `dataleague_joueur`
  ADD PRIMARY KEY (`id_joueur`),
  ADD UNIQUE KEY `id_equipe_UNIQUE` (`id_joueur`),
  ADD KEY `fk_equipe_pays_idx` (`pays_id_pays`),
  ADD KEY `fk_joueur_equipe1_idx` (`equipe_id_equipe`),
  ADD KEY `fk_joueur_jeux1_idx` (`jeux_id_jeux`),
  ADD KEY `fk_joueur_poste1_idx` (`poste_id_poste`);

--
-- Index pour la table `dataleague_pays`
--
ALTER TABLE `dataleague_pays`
  ADD PRIMARY KEY (`id_pays`),
  ADD UNIQUE KEY `id_pays_UNIQUE` (`id_pays`);

--
-- Index pour la table `dataleague_poste`
--
ALTER TABLE `dataleague_poste`
  ADD PRIMARY KEY (`id_poste`),
  ADD UNIQUE KEY `id_jeux_UNIQUE` (`id_poste`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `dataleague_equipe`
--
ALTER TABLE `dataleague_equipe`
  MODIFY `id_equipe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `dataleague_jeux`
--
ALTER TABLE `dataleague_jeux`
  MODIFY `id_jeux` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `dataleague_joueur`
--
ALTER TABLE `dataleague_joueur`
  MODIFY `id_joueur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `dataleague_pays`
--
ALTER TABLE `dataleague_pays`
  MODIFY `id_pays` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT pour la table `dataleague_poste`
--
ALTER TABLE `dataleague_poste`
  MODIFY `id_poste` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `dataleague_equipe`
--
ALTER TABLE `dataleague_equipe`
  ADD CONSTRAINT `fk_equipe_pays` FOREIGN KEY (`pays_id_pays`) REFERENCES `dataleague_pays` (`id_pays`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `dataleague_joueur`
--
ALTER TABLE `dataleague_joueur`
  ADD CONSTRAINT `fk_equipe_pays0` FOREIGN KEY (`pays_id_pays`) REFERENCES `dataleague_pays` (`id_pays`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_joueur_equipe1` FOREIGN KEY (`equipe_id_equipe`) REFERENCES `dataleague_equipe` (`id_equipe`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_joueur_jeux1` FOREIGN KEY (`jeux_id_jeux`) REFERENCES `dataleague_jeux` (`id_jeux`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_joueur_poste1` FOREIGN KEY (`poste_id_poste`) REFERENCES `dataleague_poste` (`id_poste`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
