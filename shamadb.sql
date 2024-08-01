-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 10 Mai 2020 à 20:32
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `shamadb`
--

-- --------------------------------------------------------

--
-- Structure de la table `application`
--

CREATE TABLE IF NOT EXISTS `application` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `version` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `assurance`
--

CREATE TABLE IF NOT EXISTS `assurance` (
  `idassurance` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(10) DEFAULT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `type` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`idassurance`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Contenu de la table `assurance`
--

INSERT INTO `assurance` (`idassurance`, `code`, `nom`, `type`) VALUES
(26, 'ass.00', 'CASH', 0);

-- --------------------------------------------------------

--
-- Structure de la table `caisses`
--

CREATE TABLE IF NOT EXISTS `caisses` (
  `idcaisses` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) DEFAULT NULL,
  `idusers` varchar(45) DEFAULT NULL,
  `code` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`idcaisses`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `categorie_assurance`
--

CREATE TABLE IF NOT EXISTS `categorie_assurance` (
  `idcategorie_assurance` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(10) DEFAULT NULL,
  `nom` varchar(45) DEFAULT NULL,
  `percent` varchar(45) DEFAULT NULL,
  `type` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`idcategorie_assurance`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `categorie_assurance`
--

INSERT INTO `categorie_assurance` (`idcategorie_assurance`, `code`, `nom`, `percent`, `type`) VALUES
(1, 'tar.00', '0%', '0', 0);

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

CREATE TABLE IF NOT EXISTS `commandes` (
  `idcommandes` int(11) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `fournisseur_idfournisseur` int(11) NOT NULL,
  `statut` varchar(5) DEFAULT NULL,
  `idusers` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idcommandes`),
  KEY `fk_commandes_fournisseur_idx` (`fournisseur_idfournisseur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `commande_drugs`
--

CREATE TABLE IF NOT EXISTS `commande_drugs` (
  `idcommande_drugs` int(11) NOT NULL AUTO_INCREMENT,
  `quantite` varchar(45) DEFAULT NULL,
  `paTotal` varchar(20) DEFAULT NULL,
  `iddrugs` varchar(45) DEFAULT NULL,
  `idcommandes` varchar(45) DEFAULT NULL,
  `statut` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`idcommande_drugs`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `depenses`
--

CREATE TABLE IF NOT EXISTS `depenses` (
  `iddepenses` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(20) DEFAULT NULL,
  `description` text,
  `montant` varchar(5) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `iduser` varchar(10) DEFAULT NULL,
  `lastuser` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`iddepenses`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `drugs`
--

CREATE TABLE IF NOT EXISTS `drugs` (
  `iddrugs` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) DEFAULT NULL,
  `pa` varchar(45) DEFAULT NULL,
  `prixmfp` varchar(45) DEFAULT NULL,
  `percentmfp` varchar(10) DEFAULT NULL,
  `pv` varchar(45) DEFAULT NULL,
  `unity` varchar(45) DEFAULT NULL,
  `qty` varchar(10) DEFAULT NULL,
  `alertQuantity` varchar(10) DEFAULT NULL,
  `drugs_category_iddrugs_category` int(11) NOT NULL,
  `code` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`iddrugs`),
  KEY `fk_drugs_drugs_category1_idx` (`drugs_category_iddrugs_category`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=370 ;

--
-- Contenu de la table `drugs`
--

INSERT INTO `drugs` (`iddrugs`, `nom`, `pa`, `prixmfp`, `percentmfp`, `pv`, `unity`, `qty`, `alertQuantity`, `drugs_category_iddrugs_category`, `code`) VALUES
(1, 'A&P', '', '', '', '', '0', '1', '0', 1, 'med.01'),
(2, 'Ab tone tonic sp', '', '', '', '', '0', '1', '0', 1, 'med.02'),
(3, 'abnal sp', '', '', '', '', '0', '1', '0', 1, 'med.03'),
(4, 'acefenac plus', '', '', '', '', '0', '1', '0', 1, 'med.04'),
(5, 'Aceforce cp', '', '', '', '', '0', '1', '0', 1, 'med.05'),
(6, 'acide folique', '', '', '', '', '0', '1', '0', 1, 'med.06'),
(7, 'actalpulgite sachet ad', '', '', '', '', '0', '1', '0', 1, 'med.07'),
(8, 'Action cp', '', '', '', '', '0', '1', '0', 1, 'med.08'),
(9, 'acyclovir cp 200mg', '', '', '', '', '0', '1', '0', 1, 'med.09'),
(10, 'akerol cp 5mg', '', '', '', '', '0', '1', '0', 1, 'med.10'),
(11, 'akerol cp 5mg', '', '', '', '', '0', '1', '0', 1, 'med.11'),
(12, 'Albendazole cp 400mg', '', '', '', '', '0', '1', '0', 1, 'med.12'),
(13, 'Albendazole cp 400mg', '', '', '', '', '0', '1', '0', 1, 'med.13'),
(14, 'Albendazole sp 200mg', '', '', '', '', '0', '1', '0', 1, 'med.14'),
(15, 'alcool', '', '', '', '', '0', '1', '0', 1, 'med.15'),
(16, 'aldactone', '', '', '', '', '0', '1', '0', 1, 'med.16'),
(17, 'Aldomet cp 250mg', '', '', '', '', '0', '1', '0', 1, 'med.17'),
(18, 'aminophiline cp 100mg', '', '', '', '', '0', '1', '0', 1, 'med.18'),
(19, 'amitryptyline cp 25mg', '', '', '', '', '0', '1', '0', 1, 'med.19'),
(20, 'amlodipine ', '', '', '', '', '0', '1', '0', 1, 'med.20'),
(21, 'amoxicilline  gel 500mg', '', '', '', '', '0', '1', '0', 1, 'med.21'),
(22, 'Amoxicilline gel 250mg', '', '', '', '', '0', '1', '0', 1, 'med.22'),
(23, 'amoxicilline sp 125mg', '', '', '', '', '0', '1', '0', 1, 'med.23'),
(24, 'amoxicilline sp 125mg', '', '', '', '', '0', '1', '0', 1, 'med.24'),
(25, 'amoxicilline sp 250mg', '', '', '', '', '0', '1', '0', 1, 'med.25'),
(26, 'ampi+cloxa gellule 250mg', '', '', '', '', '0', '1', '0', 1, 'med.26'),
(27, 'ampicilline gel 500mg', '', '', '', '', '0', '1', '0', 1, 'med.27'),
(28, 'ampicloxacilline sp ', '', '', '', '', '0', '1', '0', 1, 'med.28'),
(29, 'anafranil 10mg', '', '', '', '', '0', '1', '0', 1, 'med.29'),
(30, 'anginovag spray', '', '', '', '', '0', '1', '0', 1, 'med.30'),
(31, 'antalgex T gel', '', '', '', '', '0', '1', '0', 1, 'med.31'),
(32, 'ANTO GEL SP', '', '', '', '', '0', '1', '0', 1, 'med.32'),
(33, 'ascard', '', '', '', '', '0', '1', '0', 1, 'med.33'),
(34, 'ascoril sp 100ml', '', '', '', '', '0', '1', '0', 1, 'med.34'),
(35, 'astaph 500mg gel', '', '', '', '', '0', '1', '0', 1, 'med.35'),
(36, 'astaph sp', '', '', '', '', '0', '1', '0', 1, 'med.36'),
(37, 'ataktan cp 100mg', '', '', '', '', '0', '1', '0', 1, 'med.37'),
(38, 'atarax cp 25mg', '', '', '', '', '0', '1', '0', 1, 'med.38'),
(39, 'atenolol cp 100 mg', '', '', '', '', '0', '1', '0', 1, 'med.39'),
(40, 'atenolol denk 50', '', '', '', '', '0', '1', '0', 1, 'med.40'),
(41, 'atorvin cp 20mg', '', '', '', '', '0', '1', '0', 1, 'med.41'),
(42, 'atrop collyre 5ml', '', '', '', '', '0', '1', '0', 1, 'med.42'),
(43, 'Augmin 625mg', '', '', '', '', '0', '1', '0', 1, 'med.43'),
(44, 'azithromil  cp 500mg', '', '', '', '', '0', '1', '0', 1, 'med.44'),
(45, 'azithromil sp', '', '', '', '', '0', '1', '0', 1, 'med.45'),
(46, 'azithromycine cp 500mg', '', '', '', '', '0', '1', '0', 1, 'med.46'),
(47, 'azithromycine sp', '', '', '', '', '0', '1', '0', 1, 'med.47'),
(48, 'Bande adhesive  ', '', '', '', '', '0', '1', '0', 1, 'med.48'),
(49, 'bande de crepe 10cm', '', '', '', '', '0', '1', '0', 1, 'med.49'),
(50, 'bande de crepe 7.5cm', '', '', '', '', '0', '1', '0', 1, 'med.50'),
(51, 'bandelette test de grossesse', '', '', '', '', '0', '1', '0', 1, 'med.51'),
(52, 'Beefresh foam wash', '', '', '', '', '0', '1', '0', 1, 'med.52'),
(53, 'bekracine cp  200 mg', '', '', '', '', '0', '1', '0', 1, 'med.53'),
(54, 'bekrazole 400mg', '', '', '', '', '0', '1', '0', 1, 'med.54'),
(55, 'benzathene penicilline inj', '', '', '', '', '0', '1', '0', 1, 'med.55'),
(56, 'benzyl benzoate', '', '', '', '', '0', '1', '0', 1, 'med.56'),
(57, 'betadine  soln dermique 125ml', '', '', '', '', '0', '1', '0', 1, 'med.57'),
(58, 'betadrop N Eye drop', '', '', '', '', '0', '1', '0', 1, 'med.58'),
(59, 'betamethasone creme', '', '', '', '', '0', '1', '0', 1, 'med.59'),
(60, 'betasalic pde', '', '', '', '', '0', '1', '0', 1, 'med.60'),
(61, 'BG-cold', '', '', '', '', '0', '1', '0', 1, 'med.61'),
(62, 'Biopar sp ', '', '', '', '', '0', '1', '0', 1, 'med.62'),
(63, 'bisacodyl cp', '', '', '', '', '0', '1', '0', 1, 'med.63'),
(64, 'borini-k', '', '', '', '', '0', '1', '0', 1, 'med.64'),
(65, 'bromhexime cp', '', '', '', '', '0', '1', '0', 1, 'med.65'),
(66, 'broncalene sp ad', '', '', '', '', '0', '1', '0', 1, 'med.66'),
(67, 'broncalene sp enf', '', '', '', '', '0', '1', '0', 1, 'med.67'),
(68, 'bronchathiol sp ad', '', '', '', '', '0', '1', '0', 1, 'med.68'),
(69, 'bronchathiol sp enf', '', '', '', '', '0', '1', '0', 1, 'med.69'),
(70, 'C&C', '', '', '', '', '0', '1', '0', 1, 'med.70'),
(71, 'cac plus', '', '', '', '', '0', '1', '0', 1, 'med.71'),
(72, 'camvit plus', '', '', '', '', '0', '1', '0', 1, 'med.72'),
(73, 'captopril cp 25mg', '', '', '', '', '0', '1', '0', 1, 'med.73'),
(74, 'carbamazepine cp 200mg', '', '', '', '', '0', '1', '0', 1, 'med.74'),
(75, 'cardiurine cp', '', '', '', '', '0', '1', '0', 1, 'med.75'),
(76, 'carvedilol cp 6,25mg', '', '', '', '', '0', '1', '0', 1, 'med.76'),
(77, 'cefixime 200mg', '', '', '', '', '0', '1', '0', 1, 'med.77'),
(78, 'celestene cp 2mg', '', '', '', '', '0', '1', '0', 1, 'med.78'),
(79, 'cetirizine cp 10mg', '', '', '', '', '0', '1', '0', 1, 'med.79'),
(80, 'chibrocardon collyre', '', '', '', '', '0', '1', '0', 1, 'med.80'),
(81, 'chibroxine collyre', '', '', '', '', '0', '1', '0', 1, 'med.81'),
(82, 'chloramphenicol collyre', '', '', '', '', '0', '1', '0', 1, 'med.82'),
(83, 'chloramphenicol gel 250mg', '', '', '', '', '0', '1', '0', 1, 'med.83'),
(84, 'chloramphenicol sp', '', '', '', '', '0', '1', '0', 1, 'med.84'),
(85, 'chlorampheniramine cp 4mg', '', '', '', '', '0', '1', '0', 1, 'med.85'),
(86, 'ciprofloxacin cp 500mg', '', '', '', '', '0', '1', '0', 1, 'med.86'),
(87, 'ciprofloxacine 500mg+tinidazole', '', '', '', '', '0', '1', '0', 1, 'med.87'),
(88, 'ciprofloxacine collyre', '', '', '', '', '0', '1', '0', 1, 'med.88'),
(89, 'cipronat 500 mg cp', '', '', '', '', '0', '1', '0', 1, 'med.89'),
(90, 'ciptoxen D collyre', '', '', '', '', '0', '1', '0', 1, 'med.90'),
(91, 'class prudence', '', '', '', '', '0', '1', '0', 1, 'med.91'),
(92, 'clavox cp', '', '', '', '', '0', '1', '0', 1, 'med.92'),
(93, 'clavox sp', '', '', '', '', '0', '1', '0', 1, 'med.93'),
(94, 'clofains', '', '', '', '', '0', '1', '0', 1, 'med.94'),
(95, 'clomid cp 50mg', '', '', '', '', '0', '1', '0', 1, 'med.95'),
(96, 'cloxacilline 500mg gel', '', '', '', '', '0', '1', '0', 1, 'med.96'),
(97, 'cloxacilline sp 125mg', '', '', '', '', '0', '1', '0', 1, 'med.97'),
(98, 'cloxacilline sp 250mg', '', '', '', '', '0', '1', '0', 1, 'med.98'),
(99, 'clozox vaginal', '', '', '', '', '0', '1', '0', 1, 'med.99'),
(100, 'coartem cp', '', '', '', '', '0', '1', '0', 1, 'med.100'),
(101, 'colchicine cp 1mg', '', '', '', '', '0', '1', '0', 1, 'med.101'),
(102, 'cold cap gel', '', '', '', '', '0', '1', '0', 1, 'med.102'),
(103, 'coldrill gel', '', '', '', '', '0', '1', '0', 1, 'med.103'),
(104, 'compresse sterile 7,5cm', '', '', '', '', '0', '1', '0', 1, 'med.104'),
(105, 'constigo sp', '', '', '', '', '0', '1', '0', 1, 'med.105'),
(106, 'cotrimoxazole cp 480mg', '', '', '', '', '0', '1', '0', 1, 'med.106'),
(107, 'cotrimoxazole sp 240mg', '', '', '', '', '0', '1', '0', 1, 'med.107'),
(108, 'cotton absorbent 100mg', '', '', '', '', '0', '1', '0', 1, 'med.108'),
(109, 'cromsol collyre 5ml', '', '', '', '', '0', '1', '0', 1, 'med.109'),
(110, 'Daflon 500mg cp', '', '', '', '', '0', '1', '0', 1, 'med.110'),
(111, 'daktarin oral gel 20g', '', '', '', '', '0', '1', '0', 1, 'med.111'),
(112, 'daktarin poudre 20g', '', '', '', '', '0', '1', '0', 1, 'med.112'),
(113, 'daonil  gemerique 5mg', '', '', '', '', '0', '1', '0', 1, 'med.113'),
(114, 'daonil cp 5mg special', '', '', '', '', '0', '1', '0', 1, 'med.114'),
(115, 'debrida cp 200mg', '', '', '', '', '0', '1', '0', 1, 'med.115'),
(116, 'debrida sp', '', '', '', '', '0', '1', '0', 1, 'med.116'),
(117, 'defal cp', '', '', '', '', '0', '1', '0', 1, 'med.117'),
(118, 'depakine  cp 200mg', '', '', '', '', '0', '1', '0', 1, 'med.118'),
(119, 'depakine sp 150ml', '', '', '', '', '0', '1', '0', 1, 'med.119'),
(120, 'dermofix creme', '', '', '', '', '0', '1', '0', 1, 'med.120'),
(121, 'Desinfectant Muganga ', '', '', '', '', '0', '1', '0', 1, 'med.121'),
(122, 'deslor cp', '', '', '', '', '0', '1', '0', 1, 'med.122'),
(123, 'dettol solution', '', '', '', '', '0', '1', '0', 1, 'med.123'),
(124, 'diazepam cp 5mg', '', '', '', '', '0', '1', '0', 1, 'med.124'),
(125, 'diclofenac  cp 100mg', '', '', '', '', '0', '1', '0', 1, 'med.125'),
(126, 'diclofenac  pommade ', '', '', '', '', '0', '1', '0', 1, 'med.126'),
(127, 'diclofenac  suppo 100mg spec', '', '', '', '', '0', '1', '0', 1, 'med.127'),
(128, 'diclopar cp', '', '', '', '', '0', '1', '0', 1, 'med.128'),
(129, 'diclopar plus cp', '', '', '', '', '0', '1', '0', 1, 'med.129'),
(130, 'Dicynone 500mg', '', '', '', '', '0', '1', '0', 1, 'med.130'),
(131, 'difenasol collyre 5ml', '', '', '', '', '0', '1', '0', 1, 'med.131'),
(132, 'digoxin cp', '', '', '', '', '0', '1', '0', 1, 'med.132'),
(133, 'dipyrone cp 500mg', '', '', '', '', '0', '1', '0', 1, 'med.133'),
(134, 'distem cp', '', '', '', '', '0', '1', '0', 1, 'med.134'),
(135, 'Diuza', '', '', '', '', '0', '1', '0', 1, 'med.135'),
(136, 'dizopare', '', '', '', '', '0', '1', '0', 1, 'med.136'),
(137, 'doliprane cp eff', '', '', '', '', '0', '1', '0', 1, 'med.137'),
(138, 'domperidone cp 10mg', '', '', '', '', '0', '1', '0', 1, 'med.138'),
(139, 'doxy gel 100mg', '', '', '', '', '0', '1', '0', 1, 'med.139'),
(140, 'Dr maison', '', '', '', '', '0', '1', '0', 1, 'med.140'),
(141, 'Dragon ', '', '', '', '', '0', '1', '0', 1, 'med.141'),
(142, 'duotrol cp 500/5mg', '', '', '', '', '0', '1', '0', 1, 'med.142'),
(143, 'duphalac sp 100ml', '', '', '', '', '0', '1', '0', 1, 'med.143'),
(144, 'duphalac sp 200ml', '', '', '', '', '0', '1', '0', 1, 'med.144'),
(145, 'duphaston cp', '', '', '', '', '0', '1', '0', 1, 'med.145'),
(146, 'dynamogen amp buv', '', '', '', '', '0', '1', '0', 1, 'med.146'),
(147, 'efferalgan codeine cp eff', '', '', '', '', '0', '1', '0', 1, 'med.147'),
(148, 'efferalgan sp', '', '', '', '', '0', '1', '0', 1, 'med.148'),
(149, 'Efferalgan suppo', '', '', '', '', '0', '1', '0', 1, 'med.149'),
(150, 'efferalgan vit c 330mg', '', '', '', '', '0', '1', '0', 1, 'med.150'),
(151, 'Eneas 10/20mg', '', '', '', '', '0', '1', '0', 1, 'med.151'),
(152, 'Eno sachet', '', '', '', '', '0', '1', '0', 1, 'med.152'),
(153, 'entamizole  sp', '', '', '', '', '0', '1', '0', 1, 'med.153'),
(154, 'entamizole ds cp', '', '', '', '', '0', '1', '0', 1, 'med.154'),
(155, 'erythromicine  sp 125mg', '', '', '', '', '0', '1', '0', 1, 'med.155'),
(156, 'erythromicine cp 500mg', '', '', '', '', '0', '1', '0', 1, 'med.156'),
(157, 'esoz cp 40mg', '', '', '', '', '0', '1', '0', 1, 'med.157'),
(158, 'exonol collyre 10ml', '', '', '', '', '0', '1', '0', 1, 'med.158'),
(159, 'Ezomaz asr', '', '', '', '', '0', '1', '0', 1, 'med.159'),
(160, 'febrilex cp', '', '', '', '', '0', '1', '0', 1, 'med.160'),
(161, 'febrilex sp', '', '', '', '', '0', '1', '0', 1, 'med.161'),
(162, 'femifer sp 200ml', '', '', '', '', '0', '1', '0', 1, 'med.162'),
(163, 'fercefol cp', '', '', '', '', '0', '1', '0', 1, 'med.163'),
(164, 'fercefol sp 150ml', '', '', '', '', '0', '1', '0', 1, 'med.164'),
(165, 'fevarol cp', '', '', '', '', '0', '1', '0', 1, 'med.165'),
(166, 'Fevarol sp ', '', '', '', '', '0', '1', '0', 1, 'med.166'),
(167, 'flammazine creme 50gm', '', '', '', '', '0', '1', '0', 1, 'med.167'),
(168, 'flexmol cp', '', '', '', '', '0', '1', '0', 1, 'med.168'),
(169, 'floxsol collyre 5ml', '', '', '', '', '0', '1', '0', 1, 'med.169'),
(170, 'flucazol  cp 100mg', '', '', '', '', '0', '1', '0', 1, 'med.170'),
(171, 'flucazol  sp 50mg', '', '', '', '', '0', '1', '0', 1, 'med.171'),
(172, 'fluconazole 200 mg cp', '', '', '', '', '0', '1', '0', 1, 'med.172'),
(173, 'fluditec sp ad', '', '', '', '', '0', '1', '0', 1, 'med.173'),
(174, 'fluditec sp enf', '', '', '', '', '0', '1', '0', 1, 'med.174'),
(175, 'fluoxine cp 500mg', '', '', '', '', '0', '1', '0', 1, 'med.175'),
(176, 'FML collyre', '', '', '', '', '0', '1', '0', 1, 'med.176'),
(177, 'fucanol caps', '', '', '', '', '0', '1', '0', 1, 'med.177'),
(178, 'fucanol suspension', '', '', '', '', '0', '1', '0', 1, 'med.178'),
(179, 'fucidine cp 250mg', '', '', '', '', '0', '1', '0', 1, 'med.179'),
(180, 'fucidine creme 15g', '', '', '', '', '0', '1', '0', 1, 'med.180'),
(181, 'Funbact a cream', '', '', '', '', '0', '1', '0', 1, 'med.181'),
(182, 'furosemide cp 40mg', '', '', '', '', '0', '1', '0', 1, 'med.182'),
(183, 'gamalate B6 cp', '', '', '', '', '0', '1', '0', 1, 'med.183'),
(184, 'gamalate sp', '', '', '', '', '0', '1', '0', 1, 'med.184'),
(185, 'Gant propre', '', '', '', '', '0', '1', '0', 1, 'med.185'),
(186, 'gelusil cp', '', '', '', '', '0', '1', '0', 1, 'med.186'),
(187, 'gentamycine collyre', '', '', '', '', '0', '1', '0', 1, 'med.187'),
(188, 'Glibenclamide cp 5mg', '', '', '', '', '0', '1', '0', 1, 'med.188'),
(189, 'glucophage 850mg B100', '', '', '', '', '0', '1', '0', 1, 'med.189'),
(190, 'glucophage 850mg B30', '', '', '', '', '0', '1', '0', 1, 'med.190'),
(191, 'glycerine suppo b/10', '', '', '', '', '0', '1', '0', 1, 'med.191'),
(192, 'Grip water sp', '', '', '', '', '0', '1', '0', 1, 'med.192'),
(193, 'Grip water sp', '', '', '', '', '0', '1', '0', 1, 'med.193'),
(194, 'griseofulvin cp 250mg', '', '', '', '', '0', '1', '0', 1, 'med.194'),
(195, 'griseofulvin cp 500mg', '', '', '', '', '0', '1', '0', 1, 'med.195'),
(196, 'gynodaktarin 400mg ovule', '', '', '', '', '0', '1', '0', 1, 'med.196'),
(197, 'gynodaktarin cream', '', '', '', '', '0', '1', '0', 1, 'med.197'),
(198, 'haemoforte sp', '', '', '', '', '0', '1', '0', 1, 'med.198'),
(199, 'hedon gel', '', '', '', '', '0', '1', '0', 1, 'med.199'),
(200, 'Hextril', '', '', '', '', '0', '1', '0', 1, 'med.200'),
(201, 'hydrocortisone creme', '', '', '', '', '0', '1', '0', 1, 'med.201'),
(202, 'hyosine cp 100mg', '', '', '', '', '0', '1', '0', 1, 'med.202'),
(203, 'Ibupar cp', '', '', '', '', '0', '1', '0', 1, 'med.203'),
(204, 'ibuprofen cp 200mg', '', '', '', '', '0', '1', '0', 1, 'med.204'),
(205, 'ibuprofen cp 400mg', '', '', '', '', '0', '1', '0', 1, 'med.205'),
(206, 'inderal cp 40mg', '', '', '', '', '0', '1', '0', 1, 'med.206'),
(207, 'indocid', '', '', '', '', '0', '1', '0', 1, 'med.207'),
(208, 'intamine cream', '', '', '', '', '0', '1', '0', 1, 'med.208'),
(209, 'itraconazole', '', '', '', '', '0', '1', '0', 1, 'med.209'),
(210, 'joyclav cp', '', '', '', '', '0', '1', '0', 1, 'med.210'),
(211, 'kama sutra preservatif B/24', '', '', '', '', '0', '1', '0', 1, 'med.211'),
(212, 'ketaconazol cream', '', '', '', '', '0', '1', '0', 1, 'med.212'),
(213, 'ketoconazole 200mg B10/10cp', '', '', '', '', '0', '1', '0', 1, 'med.213'),
(214, 'knac-75', '', '', '', '', '0', '1', '0', 1, 'med.214'),
(215, 'KSPT promethazine 25mg', '', '', '', '', '0', '1', '0', 1, 'med.215'),
(216, 'leptil cp 200mg', '', '', '', '', '0', '1', '0', 1, 'med.216'),
(217, 'levoday cp 500mg', '', '', '', '', '0', '1', '0', 1, 'med.217'),
(218, 'libido lady', '', '', '', '', '0', '1', '0', 1, 'med.218'),
(219, 'loaktan H cp50/12,5mg', '', '', '', '', '0', '1', '0', 1, 'med.219'),
(220, 'lofnac cp 100mg', '', '', '', '', '0', '1', '0', 1, 'med.220'),
(221, 'loperamide gel 2mg', '', '', '', '', '0', '1', '0', 1, 'med.221'),
(222, 'loperamide gel 2mg', '', '', '', '', '0', '1', '0', 1, 'med.222'),
(223, 'lorhistina cp 10mg', '', '', '', '', '0', '1', '0', 1, 'med.223'),
(224, 'losartan 50mg', '', '', '', '', '0', '1', '0', 1, 'med.224'),
(225, 'maalox susp', '', '', '', '', '0', '1', '0', 1, 'med.225'),
(226, 'marimer hypertonic spray', '', '', '', '', '0', '1', '0', 1, 'med.226'),
(227, 'marimer isotonic spray', '', '', '', '', '0', '1', '0', 1, 'med.227'),
(228, 'maxidex eye drop', '', '', '', '', '0', '1', '0', 1, 'med.228'),
(229, 'mebendazole cp 100mg', '', '', '', '', '0', '1', '0', 1, 'med.229'),
(230, 'mebendazole sp 100mg', '', '', '', '', '0', '1', '0', 1, 'med.230'),
(231, 'mediven creme', '', '', '', '', '0', '1', '0', 1, 'med.231'),
(232, 'metformine cp 500mg', '', '', '', '', '0', '1', '0', 1, 'med.232'),
(233, 'metformine cp 850mg', '', '', '', '', '0', '1', '0', 1, 'med.233'),
(234, 'methaclor Eye Ointment', '', '', '', '', '0', '1', '0', 1, 'med.234'),
(235, 'metnor sp', '', '', '', '', '0', '1', '0', 1, 'med.235'),
(236, 'metronidazol gel', '', '', '', '', '0', '1', '0', 1, 'med.236'),
(237, 'metronidazole cp 250mg', '', '', '', '', '0', '1', '0', 1, 'med.237'),
(238, 'metronidazole sp', '', '', '', '', '0', '1', '0', 1, 'med.238'),
(239, 'miconazole cream', '', '', '', '', '0', '1', '0', 1, 'med.239'),
(240, 'misoquick', '', '', '', '', '0', '1', '0', 1, 'med.240'),
(241, 'mucolyn sp ad', '', '', '', '', '0', '1', '0', 1, 'med.241'),
(242, 'mucolyn sp enf', '', '', '', '', '0', '1', '0', 1, 'med.242'),
(243, 'multivitamin cp', '', '', '', '', '0', '1', '0', 1, 'med.243'),
(244, 'multivitamin sp', '', '', '', '', '0', '1', '0', 1, 'med.244'),
(245, 'narisol ad nasal drop', '', '', '', '', '0', '1', '0', 1, 'med.245'),
(246, 'narisol pediatric', '', '', '', '', '0', '1', '0', 1, 'med.246'),
(247, 'natacin drop', '', '', '', '', '0', '1', '0', 1, 'med.247'),
(248, 'nazonex spray', '', '', '', '', '0', '1', '0', 1, 'med.248'),
(249, 'neomdexsol collyre 5ml', '', '', '', '', '0', '1', '0', 1, 'med.249'),
(250, 'neuroba cp 300mg', '', '', '', '', '0', '1', '0', 1, 'med.250'),
(251, 'neurogil 75mg', '', '', '', '', '0', '1', '0', 1, 'med.251'),
(252, 'nevrine codeine cp', '', '', '', '', '0', '1', '0', 1, 'med.252'),
(253, 'nizoral shampooing', '', '', '', '', '0', '1', '0', 1, 'med.253'),
(254, 'nocaris cp 150mg', '', '', '', '', '0', '1', '0', 1, 'med.254'),
(255, 'nospa 40mg B/20ces', '', '', '', '', '0', '1', '0', 1, 'med.255'),
(256, 'nospa 40mg ces/100ces', '', '', '', '', '0', '1', '0', 1, 'med.256'),
(257, 'nucleo forte cmp', '', '', '', '', '0', '1', '0', 1, 'med.257'),
(258, 'nystastin ovule', '', '', '', '', '0', '1', '0', 1, 'med.258'),
(259, 'nystatin forte 500 cp', '', '', '', '', '0', '1', '0', 1, 'med.259'),
(260, 'nystatine sp', '', '', '', '', '0', '1', '0', 1, 'med.260'),
(261, 'ocufer sp', '', '', '', '', '0', '1', '0', 1, 'med.261'),
(262, 'ocumox cv 625', '', '', '', '', '0', '1', '0', 1, 'med.262'),
(263, 'ofloxacin ottique', '', '', '', '', '0', '1', '0', 1, 'med.263'),
(264, 'omeprazole gel 20mg', '', '', '', '', '0', '1', '0', 1, 'med.264'),
(265, 'ondaz', '', '', '', '', '0', '1', '0', 1, 'med.265'),
(266, 'oracefal gel 500mg', '', '', '', '', '0', '1', '0', 1, 'med.266'),
(267, 'otical gtes', '', '', '', '', '0', '1', '0', 1, 'med.267'),
(268, 'otipax gtte aur', '', '', '', '', '0', '1', '0', 1, 'med.268'),
(269, 'otrivin paediatric', '', '', '', '', '0', '1', '0', 1, 'med.269'),
(270, 'otrivin spray 10ml ad', '', '', '', '', '0', '1', '0', 1, 'med.270'),
(271, 'paidoterain sp', '', '', '', '', '0', '1', '0', 1, 'med.271'),
(272, 'painex gel', '', '', '', '', '0', '1', '0', 1, 'med.272'),
(273, 'painout', '', '', '', '', '0', '1', '0', 1, 'med.273'),
(274, 'palumil adulte 80mg/480mg', '', '', '', '', '0', '1', '0', 1, 'med.274'),
(275, 'palumil junior 20mg /120mg', '', '', '', '', '0', '1', '0', 1, 'med.275'),
(276, 'panatol extra', '', '', '', '', '0', '1', '0', 1, 'med.276'),
(277, 'panto denk', '', '', '', '', '0', '1', '0', 1, 'med.277'),
(278, 'paracetamol cp 500mg', '', '', '', '', '0', '1', '0', 1, 'med.278'),
(279, 'patarest -AH Collyre', '', '', '', '', '0', '1', '0', 1, 'med.279'),
(280, 'peniv cp 250mg', '', '', '', '', '0', '1', '0', 1, 'med.280'),
(281, 'peniv sp', '', '', '', '', '0', '1', '0', 1, 'med.281'),
(282, 'pevagine creme T/30G', '', '', '', '', '0', '1', '0', 1, 'med.282'),
(283, 'pevagine ovule 150mg', '', '', '', '', '0', '1', '0', 1, 'med.283'),
(284, 'phenobarbital 30mg', '', '', '', '', '0', '1', '0', 1, 'med.284'),
(285, 'phenobarbital cp 100mg', '', '', '', '', '0', '1', '0', 1, 'med.285'),
(286, 'phosphalugel sachet', '', '', '', '', '0', '1', '0', 1, 'med.286'),
(287, 'physionil 15ml', '', '', '', '', '0', '1', '0', 1, 'med.287'),
(288, 'piroxicam gel 20mg', '', '', '', '', '0', '1', '0', 1, 'med.288'),
(289, 'positon cream', '', '', '', '', '0', '1', '0', 1, 'med.289'),
(290, 'positon pde', '', '', '', '', '0', '1', '0', 1, 'med.290'),
(291, 'povidon iodine solution', '', '', '', '', '0', '1', '0', 1, 'med.291'),
(292, 'povidone creme', '', '', '', '', '0', '1', '0', 1, 'med.292'),
(293, 'pred forte collyre', '', '', '', '', '0', '1', '0', 1, 'med.293'),
(294, 'prednisolon cp 5mg', '', '', '', '', '0', '1', '0', 1, 'med.294'),
(295, 'profenid 100mg', '', '', '', '', '0', '1', '0', 1, 'med.295'),
(296, 'propranolol 40mg', '', '', '', '', '0', '1', '0', 1, 'med.296'),
(297, 'prostinor cp 1,5g', '', '', '', '', '0', '1', '0', 1, 'med.297'),
(298, 'quinine  cp 100mg', '', '', '', '', '0', '1', '0', 1, 'med.298'),
(299, 'quinine  cp 500mg', '', '', '', '', '0', '1', '0', 1, 'med.299'),
(300, 'quinine cp  300mg', '', '', '', '', '0', '1', '0', 1, 'med.300'),
(301, 'redomex cp 25mg', '', '', '', '', '0', '1', '0', 1, 'med.301'),
(302, 'relcer gel', '', '', '', '', '0', '1', '0', 1, 'med.302'),
(303, 'Relief  cp', '', '', '', '', '0', '1', '0', 1, 'med.303'),
(304, 'relief bombon', '', '', '', '', '0', '1', '0', 1, 'med.304'),
(305, 'renerve plus gel', '', '', '', '', '0', '1', '0', 1, 'med.305'),
(306, 'respimax sp 100ml', '', '', '', '', '0', '1', '0', 1, 'med.306'),
(307, 'rexe-dine', '', '', '', '', '0', '1', '0', 1, 'med.307'),
(308, 'Roz -dsr', '', '', '', '', '0', '1', '0', 1, 'med.308'),
(309, 'ruwin 100mg/5ml sp', '', '', '', '', '0', '1', '0', 1, 'med.309'),
(310, 'salbutamol cp 2mg', '', '', '', '', '0', '1', '0', 1, 'med.310'),
(311, 'salbutamol cp 4mg', '', '', '', '', '0', '1', '0', 1, 'med.311'),
(312, 'salbutamol inhaler', '', '', '', '', '0', '1', '0', 1, 'med.312'),
(313, 'savo effer cp eff', '', '', '', '', '0', '1', '0', 1, 'med.313'),
(314, 'savo effer sp eff', '', '', '', '', '0', '1', '0', 1, 'med.314'),
(315, 'secnidazole cp 500mg', '', '', '', '', '0', '1', '0', 1, 'med.315'),
(316, 'sekisan sol buv', '', '', '', '', '0', '1', '0', 1, 'med.316'),
(317, 'sekrol adult muco 30mg', '', '', '', '', '0', '1', '0', 1, 'med.317'),
(318, 'sekrol ped muco 15mg', '', '', '', '', '0', '1', '0', 1, 'med.318'),
(319, 'selexid cp 200mg', '', '', '', '', '0', '1', '0', 1, 'med.319'),
(320, 'sensodyne original', '', '', '', '', '0', '1', '0', 1, 'med.320'),
(321, 'sera halperidol 5mg', '', '', '', '', '0', '1', '0', 1, 'med.321'),
(322, 'seretide inhaler', '', '', '', '', '0', '1', '0', 1, 'med.322'),
(323, 'seringue 10cc', '', '', '', '', '0', '1', '0', 1, 'med.323'),
(324, 'seringue 5cc', '', '', '', '', '0', '1', '0', 1, 'med.324'),
(325, 'sildenafil cp', '', '', '', '', '0', '1', '0', 1, 'med.325'),
(326, 'Sildenafil sachet ', '', '', '', '', '0', '1', '0', 1, 'med.326'),
(327, 'sinarest forte cp', '', '', '', '', '0', '1', '0', 1, 'med.327'),
(328, 'skilax gttes', '', '', '', '', '0', '1', '0', 1, 'med.328'),
(329, 'smecta sachet', '', '', '', '', '0', '1', '0', 1, 'med.329'),
(330, 'sonatec sol', '', '', '', '', '0', '1', '0', 1, 'med.330'),
(331, 'sparadrap 2,5cm', '', '', '', '', '0', '1', '0', 1, 'med.331'),
(332, 'spardrap 10cm', '', '', '', '', '0', '1', '0', 1, 'med.332'),
(333, 'spardrap 7,5cm', '', '', '', '', '0', '1', '0', 1, 'med.333'),
(334, 'spascol 80mg/500mg', '', '', '', '', '0', '1', '0', 1, 'med.334'),
(335, 'spasmodic cp b/30', '', '', '', '', '0', '1', '0', 1, 'med.335'),
(336, 'SRO sachet', '', '', '', '', '0', '1', '0', 1, 'med.336'),
(337, 'Sterdex pde', '', '', '', '', '0', '1', '0', 1, 'med.337'),
(338, 'surmenalit 200mg', '', '', '', '', '0', '1', '0', 1, 'med.338'),
(339, 'T mic', '', '', '', '', '0', '1', '0', 1, 'med.339'),
(340, 'tambalgic', '', '', '', '', '0', '1', '0', 1, 'med.340'),
(341, 'tanganil cp 500mg', '', '', '', '', '0', '1', '0', 1, 'med.341'),
(342, 'terpon sp ad', '', '', '', '', '0', '1', '0', 1, 'med.342'),
(343, 'terpon sp enf', '', '', '', '', '0', '1', '0', 1, 'med.343'),
(344, 'tetracyline pde', '', '', '', '', '0', '1', '0', 1, 'med.344'),
(345, 'tinidazole cp 500mg', '', '', '', '', '0', '1', '0', 1, 'med.345'),
(346, 'tramadol cp 50mg', '', '', '', '', '0', '1', '0', 1, 'med.346'),
(347, 'trialgic caps', '', '', '', '', '0', '1', '0', 1, 'med.347'),
(348, 'Tribees forte', '', '', '', '', '0', '1', '0', 1, 'med.348'),
(349, 'unibrol  cp 250mg', '', '', '', '', '0', '1', '0', 1, 'med.349'),
(350, 'unibrol cp 12', '', '', '', '', '0', '1', '0', 1, 'med.350'),
(351, 'unibrol sp ', '', '', '', '', '0', '1', '0', 1, 'med.351'),
(352, 'unigentyl 500mg', '', '', '', '', '0', '1', '0', 1, 'med.352'),
(353, 'unistem cream', '', '', '', '', '0', '1', '0', 1, 'med.353'),
(354, 'utrogestan 100mg', '', '', '', '', '0', '1', '0', 1, 'med.354'),
(355, 'vagimilt caps', '', '', '', '', '0', '1', '0', 1, 'med.355'),
(356, 'valpin cp 500mg', '', '', '', '', '0', '1', '0', 1, 'med.356'),
(357, 'vaseline 1/2kg', '', '', '', '', '0', '1', '0', 1, 'med.357'),
(358, 'venosmil 200mg', '', '', '', '', '0', '1', '0', 1, 'med.358'),
(359, 'ventolin inhalor', '', '', '', '', '0', '1', '0', 1, 'med.359'),
(360, 'vitamin B complex cp', '', '', '', '', '0', '1', '0', 1, 'med.360'),
(361, 'vivagest gel', '', '', '', '', '0', '1', '0', 1, 'med.361'),
(362, 'voltalene suppo', '', '', '', '', '0', '1', '0', 1, 'med.362'),
(363, 'vomi 6', '', '', '', '', '0', '1', '0', 1, 'med.363'),
(364, 'Waftimalf cp', '', '', '', '', '0', '1', '0', 1, 'med.364'),
(365, 'X-Piles', '', '', '', '', '0', '1', '0', 1, 'med.365'),
(366, 'zalain ovule', '', '', '', '', '0', '1', '0', 1, 'med.366'),
(367, 'zinc ', '', '', '', '', '0', '1', '0', 1, 'med.367'),
(368, 'zyloric 100mg 5x10', '', '', '', '', '0', '1', '0', 1, 'med.368'),
(369, 'zyloric 300mg', '', '', '', '', '0', '1', '0', 1, 'med.369');

-- --------------------------------------------------------

--
-- Structure de la table `drugs_category`
--

CREATE TABLE IF NOT EXISTS `drugs_category` (
  `iddrugs_category` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(10) DEFAULT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `place` varchar(10) DEFAULT NULL,
  `type` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`iddrugs_category`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `drugs_category`
--

INSERT INTO `drugs_category` (`iddrugs_category`, `code`, `nom`, `place`, `type`) VALUES
(1, 'cat.00', 'Default', 'ET0', 0);

-- --------------------------------------------------------

--
-- Structure de la table `encaissement`
--

CREATE TABLE IF NOT EXISTS `encaissement` (
  `idencaissement` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(10) DEFAULT NULL,
  `montant` varchar(45) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `idfacture_client` varchar(45) DEFAULT NULL,
  `idcaisses` varchar(45) DEFAULT NULL,
  `idusers` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idencaissement`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `encaissement_assurance`
--

CREATE TABLE IF NOT EXISTS `encaissement_assurance` (
  `idencaissement_assurance` int(11) NOT NULL AUTO_INCREMENT,
  `montant` varchar(45) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `idfacture_assurance` varchar(45) DEFAULT NULL,
  `idusers` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idencaissement_assurance`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `facture_assurance`
--

CREATE TABLE IF NOT EXISTS `facture_assurance` (
  `idfacture_assurance` int(11) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `assurance_idassurance` int(11) NOT NULL,
  `montant` varchar(10) DEFAULT NULL,
  `statut` varchar(10) DEFAULT NULL,
  `dateRecouvrement` date DEFAULT NULL,
  `idusers` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idfacture_assurance`),
  KEY `fk_facture_assurance_assurance1_idx` (`assurance_idassurance`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `facture_assuranceclient`
--

CREATE TABLE IF NOT EXISTS `facture_assuranceclient` (
  `idfacture_assuranceClient` int(11) NOT NULL AUTO_INCREMENT,
  `idfacture_clientdrugs` varchar(45) DEFAULT NULL,
  `idfacture_assurance` varchar(10) NOT NULL,
  `idassurance` varchar(10) NOT NULL,
  PRIMARY KEY (`idfacture_assuranceClient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `facture_client`
--

CREATE TABLE IF NOT EXISTS `facture_client` (
  `idfacture_client` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  `bon` varchar(255) DEFAULT NULL,
  `statut` varchar(10) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `idusers` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idfacture_client`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `facture_clientdrugs`
--

CREATE TABLE IF NOT EXISTS `facture_clientdrugs` (
  `idfacture_clientDrugs` int(11) NOT NULL AUTO_INCREMENT,
  `quantite` varchar(45) DEFAULT NULL,
  `pa` varchar(45) DEFAULT NULL,
  `pv` varchar(45) DEFAULT NULL,
  `iddrugs` varchar(45) DEFAULT NULL,
  `idfacture_client` varchar(45) DEFAULT NULL,
  `idassurance` varchar(45) DEFAULT NULL,
  `idcategorie_assurance` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idfacture_clientDrugs`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--

CREATE TABLE IF NOT EXISTS `fournisseur` (
  `idfournisseur` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `code` varchar(10) DEFAULT NULL,
  `type` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`idfournisseur`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `fournisseur`
--

INSERT INTO `fournisseur` (`idfournisseur`, `nom`, `phone`, `adresse`, `code`, `type`) VALUES
(11, 'Default', '000000', '000000', 'four.00', 0);

-- --------------------------------------------------------

--
-- Structure de la table `historiques`
--

CREATE TABLE IF NOT EXISTS `historiques` (
  `idhistoriques` int(11) NOT NULL AUTO_INCREMENT,
  `table` varchar(45) DEFAULT NULL,
  `id` varchar(45) DEFAULT NULL,
  `creationDate` date DEFAULT NULL,
  `updateDate` date DEFAULT NULL,
  `idusers` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idhistoriques`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `historique_stock`
--

CREATE TABLE IF NOT EXISTS `historique_stock` (
  `idhistorique_stock` int(11) NOT NULL AUTO_INCREMENT,
  `quantite` varchar(45) DEFAULT NULL,
  `pa` varchar(20) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `dateExpiration` date DEFAULT NULL,
  `type` tinyint(1) DEFAULT NULL,
  `iddrugs` varchar(45) DEFAULT NULL,
  `idusers` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idhistorique_stock`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=370 ;

--
-- Contenu de la table `historique_stock`
--

INSERT INTO `historique_stock` (`idhistorique_stock`, `quantite`, `pa`, `date`, `dateExpiration`, `type`, `iddrugs`, `idusers`) VALUES
(1, '50', '', '2020-05-09', '0000-00-00', 1, '1', '1'),
(2, '9', '', '2020-05-09', '0000-00-00', 1, '2', '1'),
(3, '6', '', '2020-05-09', '0000-00-00', 1, '3', '1'),
(4, '120', '', '2020-05-09', '0000-00-00', 1, '4', '1'),
(5, '40', '', '2020-05-09', '0000-00-00', 1, '5', '1'),
(6, '30', '', '2020-05-09', '0000-00-00', 1, '6', '1'),
(7, '53', '', '2020-05-09', '0000-00-00', 1, '7', '1'),
(8, '118', '', '2020-05-09', '0000-00-00', 1, '8', '1'),
(9, '70', '', '2020-05-09', '0000-00-00', 1, '9', '1'),
(10, '10', '', '2020-05-09', '0000-00-00', 1, '10', '1'),
(11, '10', '', '2020-05-09', '0000-00-00', 1, '11', '1'),
(12, '4', '', '2020-05-09', '0000-00-00', 1, '12', '1'),
(13, '33', '', '2020-05-09', '0000-00-00', 1, '13', '1'),
(14, '40', '', '2020-05-09', '0000-00-00', 1, '14', '1'),
(15, '9', '', '2020-05-09', '0000-00-00', 1, '15', '1'),
(16, '60', '', '2020-05-09', '0000-00-00', 1, '16', '1'),
(17, '320', '', '2020-05-09', '0000-00-00', 1, '17', '1'),
(18, '310', '', '2020-05-09', '0000-00-00', 1, '18', '1'),
(19, '180', '', '2020-05-09', '0000-00-00', 1, '19', '1'),
(20, '190', '', '2020-05-09', '0000-00-00', 1, '20', '1'),
(21, '560', '', '2020-05-09', '0000-00-00', 1, '21', '1'),
(22, '140', '', '2020-05-09', '0000-00-00', 1, '22', '1'),
(23, '29', '', '2020-05-09', '0000-00-00', 1, '23', '1'),
(24, '19', '', '2020-05-09', '0000-00-00', 1, '24', '1'),
(25, '30', '', '2020-05-09', '0000-00-00', 1, '25', '1'),
(26, '160', '', '2020-05-09', '0000-00-00', 1, '26', '1'),
(27, '330', '', '2020-05-09', '0000-00-00', 1, '27', '1'),
(28, '10', '', '2020-05-09', '0000-00-00', 1, '28', '1'),
(29, '30', '', '2020-05-09', '0000-00-00', 1, '29', '1'),
(30, '2', '', '2020-05-09', '0000-00-00', 1, '30', '1'),
(31, '20', '', '2020-05-09', '0000-00-00', 1, '31', '1'),
(32, '2', '', '2020-05-09', '0000-00-00', 1, '32', '1'),
(33, '3', '', '2020-05-09', '0000-00-00', 1, '33', '1'),
(34, '2', '', '2020-05-09', '0000-00-00', 1, '34', '1'),
(35, '4', '', '2020-05-09', '0000-00-00', 1, '35', '1'),
(36, '4', '', '2020-05-09', '0000-00-00', 1, '36', '1'),
(37, '70', '', '2020-05-09', '0000-00-00', 1, '37', '1'),
(38, '150', '', '2020-05-09', '0000-00-00', 1, '38', '1'),
(39, '160', '', '2020-05-09', '0000-00-00', 1, '39', '1'),
(40, '200', '', '2020-05-09', '0000-00-00', 1, '40', '1'),
(41, '90', '', '2020-05-09', '0000-00-00', 1, '41', '1'),
(42, '2', '', '2020-05-09', '0000-00-00', 1, '42', '1'),
(43, '40', '', '2020-05-09', '0000-00-00', 1, '43', '1'),
(44, '15', '', '2020-05-09', '0000-00-00', 1, '44', '1'),
(45, '2', '', '2020-05-09', '0000-00-00', 1, '45', '1'),
(46, '6', '', '2020-05-09', '0000-00-00', 1, '46', '1'),
(47, '6', '', '2020-05-09', '0000-00-00', 1, '47', '1'),
(48, '0', '', '2020-05-09', '0000-00-00', 1, '48', '1'),
(49, '4', '', '2020-05-09', '0000-00-00', 1, '49', '1'),
(50, '1', '', '2020-05-09', '0000-00-00', 1, '50', '1'),
(51, '76', '', '2020-05-09', '0000-00-00', 1, '51', '1'),
(52, '4', '', '2020-05-09', '0000-00-00', 1, '52', '1'),
(53, '20', '', '2020-05-09', '0000-00-00', 1, '53', '1'),
(54, '6', '', '2020-05-09', '0000-00-00', 1, '54', '1'),
(55, '9', '', '2020-05-09', '0000-00-00', 1, '55', '1'),
(56, '1', '', '2020-05-09', '0000-00-00', 1, '56', '1'),
(57, '1', '', '2020-05-09', '0000-00-00', 1, '57', '1'),
(58, '3', '', '2020-05-09', '0000-00-00', 1, '58', '1'),
(59, '5', '', '2020-05-09', '0000-00-00', 1, '59', '1'),
(60, '2', '', '2020-05-09', '0000-00-00', 1, '60', '1'),
(61, '184', '', '2020-05-09', '0000-00-00', 1, '61', '1'),
(62, '0', '', '2020-05-09', '0000-00-00', 1, '62', '1'),
(63, '90', '', '2020-05-09', '0000-00-00', 1, '63', '1'),
(64, '6', '', '2020-05-09', '0000-00-00', 1, '64', '1'),
(65, '370', '', '2020-05-09', '0000-00-00', 1, '65', '1'),
(66, '1', '', '2020-05-09', '0000-00-00', 1, '66', '1'),
(67, '2', '', '2020-05-09', '0000-00-00', 1, '67', '1'),
(68, '4', '', '2020-05-09', '0000-00-00', 1, '68', '1'),
(69, '2', '', '2020-05-09', '0000-00-00', 1, '69', '1'),
(70, '2', '', '2020-05-09', '0000-00-00', 1, '70', '1'),
(71, '10', '', '2020-05-09', '0000-00-00', 1, '71', '1'),
(72, '60', '', '2020-05-09', '0000-00-00', 1, '72', '1'),
(73, '260', '', '2020-05-09', '0000-00-00', 1, '73', '1'),
(74, '150', '', '2020-05-09', '0000-00-00', 1, '74', '1'),
(75, '150', '', '2020-05-09', '0000-00-00', 1, '75', '1'),
(76, '200', '', '2020-05-09', '0000-00-00', 1, '76', '1'),
(77, '140', '', '2020-05-09', '0000-00-00', 1, '77', '1'),
(78, '20', '', '2020-05-09', '0000-00-00', 1, '78', '1'),
(79, '10', '', '2020-05-09', '0000-00-00', 1, '79', '1'),
(80, '1', '', '2020-05-09', '0000-00-00', 1, '80', '1'),
(81, '4', '', '2020-05-09', '0000-00-00', 1, '81', '1'),
(82, '8', '', '2020-05-09', '0000-00-00', 1, '82', '1'),
(83, '1100', '', '2020-05-09', '0000-00-00', 1, '83', '1'),
(84, '0', '', '2020-05-09', '0000-00-00', 1, '84', '1'),
(85, '190', '', '2020-05-09', '0000-00-00', 1, '85', '1'),
(86, '1100', '', '2020-05-09', '0000-00-00', 1, '86', '1'),
(87, '120', '', '2020-05-09', '0000-00-00', 1, '87', '1'),
(88, '3', '', '2020-05-09', '0000-00-00', 1, '88', '1'),
(89, '14', '', '2020-05-09', '0000-00-00', 1, '89', '1'),
(90, '1', '', '2020-05-09', '0000-00-00', 1, '90', '1'),
(91, '25', '', '2020-05-09', '0000-00-00', 1, '91', '1'),
(92, '96', '', '2020-05-09', '0000-00-00', 1, '92', '1'),
(93, '3', '', '2020-05-09', '0000-00-00', 1, '93', '1'),
(94, '40', '', '2020-05-09', '0000-00-00', 1, '94', '1'),
(95, '30', '', '2020-05-09', '0000-00-00', 1, '95', '1'),
(96, '200', '', '2020-05-09', '0000-00-00', 1, '96', '1'),
(97, '6', '', '2020-05-09', '0000-00-00', 1, '97', '1'),
(98, '8', '', '2020-05-09', '0000-00-00', 1, '98', '1'),
(99, '30', '', '2020-05-09', '0000-00-00', 1, '99', '1'),
(100, '180', '', '2020-05-09', '0000-00-00', 1, '100', '1'),
(101, '40', '', '2020-05-09', '0000-00-00', 1, '101', '1'),
(102, '24', '', '2020-05-09', '0000-00-00', 1, '102', '1'),
(103, '10', '', '2020-05-09', '0000-00-00', 1, '103', '1'),
(104, '8192', '', '2020-05-09', '0000-00-00', 1, '104', '1'),
(105, '4', '', '2020-05-09', '0000-00-00', 1, '105', '1'),
(106, '460', '', '2020-05-09', '0000-00-00', 1, '106', '1'),
(107, '8', '', '2020-05-09', '0000-00-00', 1, '107', '1'),
(108, '6', '', '2020-05-09', '0000-00-00', 1, '108', '1'),
(109, '3', '', '2020-05-09', '0000-00-00', 1, '109', '1'),
(110, '0', '', '2020-05-09', '0000-00-00', 1, '110', '1'),
(111, '3', '', '2020-05-09', '0000-00-00', 1, '111', '1'),
(112, '3', '', '2020-05-09', '0000-00-00', 1, '112', '1'),
(113, '240', '', '2020-05-09', '0000-00-00', 1, '113', '1'),
(114, '20', '', '2020-05-09', '0000-00-00', 1, '114', '1'),
(115, '40', '', '2020-05-09', '0000-00-00', 1, '115', '1'),
(116, '1', '', '2020-05-09', '0000-00-00', 1, '116', '1'),
(117, '20', '', '2020-05-09', '0000-00-00', 1, '117', '1'),
(118, '0', '', '2020-05-09', '0000-00-00', 1, '118', '1'),
(119, '2', '', '2020-05-09', '0000-00-00', 1, '119', '1'),
(120, '1', '', '2020-05-09', '0000-00-00', 1, '120', '1'),
(121, '0', '', '2020-05-09', '0000-00-00', 1, '121', '1'),
(122, '15', '', '2020-05-09', '0000-00-00', 1, '122', '1'),
(123, '10', '', '2020-05-09', '0000-00-00', 1, '123', '1'),
(124, '1526', '', '2020-05-09', '0000-00-00', 1, '124', '1'),
(125, '330', '', '2020-05-09', '0000-00-00', 1, '125', '1'),
(126, '0', '', '2020-05-09', '0000-00-00', 1, '126', '1'),
(127, '85', '', '2020-05-09', '0000-00-00', 1, '127', '1'),
(128, '120', '', '2020-05-09', '0000-00-00', 1, '128', '1'),
(129, '30', '', '2020-05-09', '0000-00-00', 1, '129', '1'),
(130, '40', '', '2020-05-09', '0000-00-00', 1, '130', '1'),
(131, '2', '', '2020-05-09', '0000-00-00', 1, '131', '1'),
(132, '200', '', '2020-05-09', '0000-00-00', 1, '132', '1'),
(133, '600', '', '2020-05-09', '0000-00-00', 1, '133', '1'),
(134, '150', '', '2020-05-09', '0000-00-00', 1, '134', '1'),
(135, '180', '', '2020-05-09', '0000-00-00', 1, '135', '1'),
(136, '90', '', '2020-05-09', '0000-00-00', 1, '136', '1'),
(137, '32', '', '2020-05-09', '0000-00-00', 1, '137', '1'),
(138, '60', '', '2020-05-09', '0000-00-00', 1, '138', '1'),
(139, '320', '', '2020-05-09', '0000-00-00', 1, '139', '1'),
(140, '580', '', '2020-05-09', '0000-00-00', 1, '140', '1'),
(141, '0', '', '2020-05-09', '0000-00-00', 1, '141', '1'),
(142, '160', '', '2020-05-09', '0000-00-00', 1, '142', '1'),
(143, '1', '', '2020-05-09', '0000-00-00', 1, '143', '1'),
(144, '3', '', '2020-05-09', '0000-00-00', 1, '144', '1'),
(145, '30', '', '2020-05-09', '0000-00-00', 1, '145', '1'),
(146, '225', '', '2020-05-09', '0000-00-00', 1, '146', '1'),
(147, '48', '', '2020-05-09', '0000-00-00', 1, '147', '1'),
(148, '3', '', '2020-05-09', '0000-00-00', 1, '148', '1'),
(149, '20', '', '2020-05-09', '0000-00-00', 1, '149', '1'),
(150, '30', '', '2020-05-09', '0000-00-00', 1, '150', '1'),
(151, '60', '', '2020-05-09', '0000-00-00', 1, '151', '1'),
(152, '129', '', '2020-05-09', '0000-00-00', 1, '152', '1'),
(153, '3', '', '2020-05-09', '0000-00-00', 1, '153', '1'),
(154, '30', '', '2020-05-09', '0000-00-00', 1, '154', '1'),
(155, '10', '', '2020-05-09', '0000-00-00', 1, '155', '1'),
(156, '280', '', '2020-05-09', '0000-00-00', 1, '156', '1'),
(157, '20', '', '2020-05-09', '0000-00-00', 1, '157', '1'),
(158, '4', '', '2020-05-09', '0000-00-00', 1, '158', '1'),
(159, '40', '', '2020-05-09', '0000-00-00', 1, '159', '1'),
(160, '156', '', '2020-05-09', '0000-00-00', 1, '160', '1'),
(161, '7', '', '2020-05-09', '0000-00-00', 1, '161', '1'),
(162, '10', '', '2020-05-09', '0000-00-00', 1, '162', '1'),
(163, '100', '', '2020-05-09', '0000-00-00', 1, '163', '1'),
(164, '2', '', '2020-05-09', '0000-00-00', 1, '164', '1'),
(165, '40', '', '2020-05-09', '0000-00-00', 1, '165', '1'),
(166, '0', '', '2020-05-09', '0000-00-00', 1, '166', '1'),
(167, '2', '', '2020-05-09', '0000-00-00', 1, '167', '1'),
(168, '40', '', '2020-05-09', '0000-00-00', 1, '168', '1'),
(169, '2', '', '2020-05-09', '0000-00-00', 1, '169', '1'),
(170, '50', '', '2020-05-09', '0000-00-00', 1, '170', '1'),
(171, '3', '', '2020-05-09', '0000-00-00', 1, '171', '1'),
(172, '24', '', '2020-05-09', '0000-00-00', 1, '172', '1'),
(173, '5', '', '2020-05-09', '0000-00-00', 1, '173', '1'),
(174, '6', '', '2020-05-09', '0000-00-00', 1, '174', '1'),
(175, '90', '', '2020-05-09', '0000-00-00', 1, '175', '1'),
(176, '4', '', '2020-05-09', '0000-00-00', 1, '176', '1'),
(177, '24', '', '2020-05-09', '0000-00-00', 1, '177', '1'),
(178, '3', '', '2020-05-09', '0000-00-00', 1, '178', '1'),
(179, '40', '', '2020-05-09', '0000-00-00', 1, '179', '1'),
(180, '1', '', '2020-05-09', '0000-00-00', 1, '180', '1'),
(181, '5', '', '2020-05-09', '0000-00-00', 1, '181', '1'),
(182, '10', '', '2020-05-09', '0000-00-00', 1, '182', '1'),
(183, '40', '', '2020-05-09', '0000-00-00', 1, '183', '1'),
(184, '5', '', '2020-05-09', '0000-00-00', 1, '184', '1'),
(185, '32', '', '2020-05-09', '0000-00-00', 1, '185', '1'),
(186, '510', '', '2020-05-09', '0000-00-00', 1, '186', '1'),
(187, '9', '', '2020-05-09', '0000-00-00', 1, '187', '1'),
(188, '30', '', '2020-05-09', '0000-00-00', 1, '188', '1'),
(189, '100', '', '2020-05-09', '0000-00-00', 1, '189', '1'),
(190, '60', '', '2020-05-09', '0000-00-00', 1, '190', '1'),
(191, '1', '', '2020-05-09', '0000-00-00', 1, '191', '1'),
(192, '6', '', '2020-05-09', '0000-00-00', 1, '192', '1'),
(193, '3', '', '2020-05-09', '0000-00-00', 1, '193', '1'),
(194, '460', '', '2020-05-09', '0000-00-00', 1, '194', '1'),
(195, '380', '', '2020-05-09', '0000-00-00', 1, '195', '1'),
(196, '6', '', '2020-05-09', '0000-00-00', 1, '196', '1'),
(197, '3', '', '2020-05-09', '0000-00-00', 1, '197', '1'),
(198, '3', '', '2020-05-09', '0000-00-00', 1, '198', '1'),
(199, '22', '', '2020-05-09', '0000-00-00', 1, '199', '1'),
(200, '2', '', '2020-05-09', '0000-00-00', 1, '200', '1'),
(201, '4', '', '2020-05-09', '0000-00-00', 1, '201', '1'),
(202, '110', '', '2020-05-09', '0000-00-00', 1, '202', '1'),
(203, '260', '', '2020-05-09', '0000-00-00', 1, '203', '1'),
(204, '290', '', '2020-05-09', '0000-00-00', 1, '204', '1'),
(205, '1410', '', '2020-05-09', '0000-00-00', 1, '205', '1'),
(206, '450', '', '2020-05-09', '0000-00-00', 1, '206', '1'),
(207, '1180', '', '2020-05-09', '0000-00-00', 1, '207', '1'),
(208, '3', '', '2020-05-09', '0000-00-00', 1, '208', '1'),
(209, '3', '', '2020-05-09', '0000-00-00', 1, '209', '1'),
(210, '30', '', '2020-05-09', '0000-00-00', 1, '210', '1'),
(211, '28', '', '2020-05-09', '0000-00-00', 1, '211', '1'),
(212, '9', '', '2020-05-09', '0000-00-00', 1, '212', '1'),
(213, '350', '', '2020-05-09', '0000-00-00', 1, '213', '1'),
(214, '30', '', '2020-05-09', '0000-00-00', 1, '214', '1'),
(215, '300', '', '2020-05-09', '0000-00-00', 1, '215', '1'),
(216, '200', '', '2020-05-09', '0000-00-00', 1, '216', '1'),
(217, '50', '', '2020-05-09', '0000-00-00', 1, '217', '1'),
(218, '30', '', '2020-05-09', '0000-00-00', 1, '218', '1'),
(219, '90', '', '2020-05-09', '0000-00-00', 1, '219', '1'),
(220, '230', '', '2020-05-09', '0000-00-00', 1, '220', '1'),
(221, '100', '', '2020-05-09', '0000-00-00', 1, '221', '1'),
(222, '90', '', '2020-05-09', '0000-00-00', 1, '222', '1'),
(223, '30', '', '2020-05-09', '0000-00-00', 1, '223', '1'),
(224, '40', '', '2020-05-09', '0000-00-00', 1, '224', '1'),
(225, '4', '', '2020-05-09', '0000-00-00', 1, '225', '1'),
(226, '2', '', '2020-05-09', '0000-00-00', 1, '226', '1'),
(227, '2', '', '2020-05-09', '0000-00-00', 1, '227', '1'),
(228, '6', '', '2020-05-09', '0000-00-00', 1, '228', '1'),
(229, '1560', '', '2020-05-09', '0000-00-00', 1, '229', '1'),
(230, '14', '', '2020-05-09', '0000-00-00', 1, '230', '1'),
(231, '6', '', '2020-05-09', '0000-00-00', 1, '231', '1'),
(232, '230', '', '2020-05-09', '0000-00-00', 1, '232', '1'),
(233, '290', '', '2020-05-09', '0000-00-00', 1, '233', '1'),
(234, '18', '', '2020-05-09', '0000-00-00', 1, '234', '1'),
(235, '11', '', '2020-05-09', '0000-00-00', 1, '235', '1'),
(236, '3', '', '2020-05-09', '0000-00-00', 1, '236', '1'),
(237, '300', '', '2020-05-09', '0000-00-00', 1, '237', '1'),
(238, '24', '', '2020-05-09', '0000-00-00', 1, '238', '1'),
(239, '5', '', '2020-05-09', '0000-00-00', 1, '239', '1'),
(240, '88', '', '2020-05-09', '0000-00-00', 1, '240', '1'),
(241, '5', '', '2020-05-09', '0000-00-00', 1, '241', '1'),
(242, '5', '', '2020-05-09', '0000-00-00', 1, '242', '1'),
(243, '340', '', '2020-05-09', '0000-00-00', 1, '243', '1'),
(244, '15', '', '2020-05-09', '0000-00-00', 1, '244', '1'),
(245, '5', '', '2020-05-09', '0000-00-00', 1, '245', '1'),
(246, '2', '', '2020-05-09', '0000-00-00', 1, '246', '1'),
(247, '2', '', '2020-05-09', '0000-00-00', 1, '247', '1'),
(248, '2', '', '2020-05-09', '0000-00-00', 1, '248', '1'),
(249, '5', '', '2020-05-09', '0000-00-00', 1, '249', '1'),
(250, '90', '', '2020-05-09', '0000-00-00', 1, '250', '1'),
(251, '30', '', '2020-05-09', '0000-00-00', 1, '251', '1'),
(252, '10', '', '2020-05-09', '0000-00-00', 1, '252', '1'),
(253, '2', '', '2020-05-09', '0000-00-00', 1, '253', '1'),
(254, '160', '', '2020-05-09', '0000-00-00', 1, '254', '1'),
(255, '40', '', '2020-05-09', '0000-00-00', 1, '255', '1'),
(256, '200', '', '2020-05-09', '0000-00-00', 1, '256', '1'),
(257, '120', '', '2020-05-09', '0000-00-00', 1, '257', '1'),
(258, '231', '', '2020-05-09', '0000-00-00', 1, '258', '1'),
(259, '280', '', '2020-05-09', '0000-00-00', 1, '259', '1'),
(260, '10', '', '2020-05-09', '0000-00-00', 1, '260', '1'),
(261, '13', '', '2020-05-09', '0000-00-00', 1, '261', '1'),
(262, '20', '', '2020-05-09', '0000-00-00', 1, '262', '1'),
(263, '1', '', '2020-05-09', '0000-00-00', 1, '263', '1'),
(264, '310', '', '2020-05-09', '0000-00-00', 1, '264', '1'),
(265, '130', '', '2020-05-09', '0000-00-00', 1, '265', '1'),
(266, '24', '', '2020-05-09', '0000-00-00', 1, '266', '1'),
(267, '4', '', '2020-05-09', '0000-00-00', 1, '267', '1'),
(268, '3', '', '2020-05-09', '0000-00-00', 1, '268', '1'),
(269, '2', '', '2020-05-09', '0000-00-00', 1, '269', '1'),
(270, '2', '', '2020-05-09', '0000-00-00', 1, '270', '1'),
(271, '1', '', '2020-05-09', '0000-00-00', 1, '271', '1'),
(272, '380', '', '2020-05-09', '0000-00-00', 1, '272', '1'),
(273, '20', '', '2020-05-09', '0000-00-00', 1, '273', '1'),
(274, '12', '', '2020-05-09', '0000-00-00', 1, '274', '1'),
(275, '66', '', '2020-05-09', '0000-00-00', 1, '275', '1'),
(276, '970', '', '2020-05-09', '0000-00-00', 1, '276', '1'),
(277, '28', '', '2020-05-09', '0000-00-00', 1, '277', '1'),
(278, '930', '', '2020-05-09', '0000-00-00', 1, '278', '1'),
(279, '2', '', '2020-05-09', '0000-00-00', 1, '279', '1'),
(280, '100', '', '2020-05-09', '0000-00-00', 1, '280', '1'),
(281, '4', '', '2020-05-09', '0000-00-00', 1, '281', '1'),
(282, '1', '', '2020-05-09', '0000-00-00', 1, '282', '1'),
(283, '15', '', '2020-05-09', '0000-00-00', 1, '283', '1'),
(284, '200', '', '2020-05-09', '0000-00-00', 1, '284', '1'),
(285, '0', '', '2020-05-09', '0000-00-00', 1, '285', '1'),
(286, '87', '', '2020-05-09', '0000-00-00', 1, '286', '1'),
(287, '16', '', '2020-05-09', '0000-00-00', 1, '287', '1'),
(288, '390', '', '2020-05-09', '0000-00-00', 1, '288', '1'),
(289, '5', '', '2020-05-09', '0000-00-00', 1, '289', '1'),
(290, '2', '', '2020-05-09', '0000-00-00', 1, '290', '1'),
(291, '2', '', '2020-05-09', '0000-00-00', 1, '291', '1'),
(292, '1', '', '2020-05-09', '0000-00-00', 1, '292', '1'),
(293, '2', '', '2020-05-09', '0000-00-00', 1, '293', '1'),
(294, '600', '', '2020-05-09', '0000-00-00', 1, '294', '1'),
(295, '60', '', '2020-05-09', '0000-00-00', 1, '295', '1'),
(296, '100', '', '2020-05-09', '0000-00-00', 1, '296', '1'),
(297, '2', '', '2020-05-09', '0000-00-00', 1, '297', '1'),
(298, '290', '', '2020-05-09', '0000-00-00', 1, '298', '1'),
(299, '170', '', '2020-05-09', '0000-00-00', 1, '299', '1'),
(300, '168', '', '2020-05-09', '0000-00-00', 1, '300', '1'),
(301, '200', '', '2020-05-09', '0000-00-00', 1, '301', '1'),
(302, '1', '', '2020-05-09', '0000-00-00', 1, '302', '1'),
(303, '120', '', '2020-05-09', '0000-00-00', 1, '303', '1'),
(304, '26995', '', '2020-05-09', '0000-00-00', 1, '304', '1'),
(305, '60', '', '2020-05-09', '0000-00-00', 1, '305', '1'),
(306, '17', '', '2020-05-09', '0000-00-00', 1, '306', '1'),
(307, '6', '', '2020-05-09', '0000-00-00', 1, '307', '1'),
(308, '30', '', '2020-05-09', '0000-00-00', 1, '308', '1'),
(309, '2', '', '2020-05-09', '0000-00-00', 1, '309', '1'),
(310, '600', '', '2020-05-09', '0000-00-00', 1, '310', '1'),
(311, '90', '', '2020-05-09', '0000-00-00', 1, '311', '1'),
(312, '3', '', '2020-05-09', '0000-00-00', 1, '312', '1'),
(313, '72', '', '2020-05-09', '0000-00-00', 1, '313', '1'),
(314, '2', '', '2020-05-09', '0000-00-00', 1, '314', '1'),
(315, '44', '', '2020-05-09', '0000-00-00', 1, '315', '1'),
(316, '2', '', '2020-05-09', '0000-00-00', 1, '316', '1'),
(317, '5', '', '2020-05-09', '0000-00-00', 1, '317', '1'),
(318, '4', '', '2020-05-09', '0000-00-00', 1, '318', '1'),
(319, '12', '', '2020-05-09', '0000-00-00', 1, '319', '1'),
(320, '1', '', '2020-05-09', '0000-00-00', 1, '320', '1'),
(321, '40', '', '2020-05-09', '0000-00-00', 1, '321', '1'),
(322, '3', '', '2020-05-09', '0000-00-00', 1, '322', '1'),
(323, '85', '', '2020-05-09', '0000-00-00', 1, '323', '1'),
(324, '95', '', '2020-05-09', '0000-00-00', 1, '324', '1'),
(325, '220', '', '2020-05-09', '0000-00-00', 1, '325', '1'),
(326, '0', '', '2020-05-09', '0000-00-00', 1, '326', '1'),
(327, '136', '', '2020-05-09', '0000-00-00', 1, '327', '1'),
(328, '2', '', '2020-05-09', '0000-00-00', 1, '328', '1'),
(329, '45', '', '2020-05-09', '0000-00-00', 1, '329', '1'),
(330, '2', '', '2020-05-09', '0000-00-00', 1, '330', '1'),
(331, '2', '', '2020-05-09', '0000-00-00', 1, '331', '1'),
(332, '4', '', '2020-05-09', '0000-00-00', 1, '332', '1'),
(333, '4', '', '2020-05-09', '0000-00-00', 1, '333', '1'),
(334, '20', '', '2020-05-09', '0000-00-00', 1, '334', '1'),
(335, '150', '', '2020-05-09', '0000-00-00', 1, '335', '1'),
(336, '23', '', '2020-05-09', '0000-00-00', 1, '336', '1'),
(337, '24', '', '2020-05-09', '0000-00-00', 1, '337', '1'),
(338, '60', '', '2020-05-09', '0000-00-00', 1, '338', '1'),
(339, '4', '', '2020-05-09', '0000-00-00', 1, '339', '1'),
(340, '80', '', '2020-05-09', '0000-00-00', 1, '340', '1'),
(341, '90', '', '2020-05-09', '0000-00-00', 1, '341', '1'),
(342, '1', '', '2020-05-09', '0000-00-00', 1, '342', '1'),
(343, '2', '', '2020-05-09', '0000-00-00', 1, '343', '1'),
(344, '25', '', '2020-05-09', '0000-00-00', 1, '344', '1'),
(345, '465', '', '2020-05-09', '0000-00-00', 1, '345', '1'),
(346, '90', '', '2020-05-09', '0000-00-00', 1, '346', '1'),
(347, '60', '', '2020-05-09', '0000-00-00', 1, '347', '1'),
(348, '40', '', '2020-05-09', '0000-00-00', 1, '348', '1'),
(349, '72', '', '2020-05-09', '0000-00-00', 1, '349', '1'),
(350, '36', '', '2020-05-09', '0000-00-00', 1, '350', '1'),
(351, '4', '', '2020-05-09', '0000-00-00', 1, '351', '1'),
(352, '28', '', '2020-05-09', '0000-00-00', 1, '352', '1'),
(353, '2', '', '2020-05-09', '0000-00-00', 1, '353', '1'),
(354, '30', '', '2020-05-09', '0000-00-00', 1, '354', ''),
(355, '14', '', '2020-05-09', '0000-00-00', 1, '355', ''),
(356, '80', '', '2020-05-09', '0000-00-00', 1, '356', ''),
(357, '1', '', '2020-05-09', '0000-00-00', 1, '357', ''),
(358, '60', '', '2020-05-09', '0000-00-00', 1, '358', ''),
(359, '2', '', '2020-05-09', '0000-00-00', 1, '359', ''),
(360, '480', '', '2020-05-09', '0000-00-00', 1, '360', ''),
(361, '60', '', '2020-05-09', '0000-00-00', 1, '361', ''),
(362, '30', '', '2020-05-09', '0000-00-00', 1, '362', ''),
(363, '30', '', '2020-05-09', '0000-00-00', 1, '363', ''),
(364, '114', '', '2020-05-09', '0000-00-00', 1, '364', ''),
(365, '3', '', '2020-05-09', '0000-00-00', 1, '365', ''),
(366, '1', '', '2020-05-09', '0000-00-00', 1, '366', ''),
(367, '240', '', '2020-05-09', '0000-00-00', 1, '367', ''),
(368, '150', '', '2020-05-09', '0000-00-00', 1, '368', ''),
(369, '60', '', '2020-05-09', '0000-00-00', 1, '369', '');

-- --------------------------------------------------------

--
-- Structure de la table `libelle`
--

CREATE TABLE IF NOT EXISTS `libelle` (
  `idlibelle` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(10) NOT NULL,
  `libelle` varchar(255) DEFAULT NULL,
  `valeur` varchar(255) DEFAULT NULL,
  `type` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`idlibelle`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `places`
--

CREATE TABLE IF NOT EXISTS `places` (
  `idplaces` int(11) NOT NULL AUTO_INCREMENT,
  `numero` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idplaces`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `profiles`
--

CREATE TABLE IF NOT EXISTS `profiles` (
  `idprofiles` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(10) NOT NULL,
  `nom` varchar(200) NOT NULL,
  `type` smallint(6) NOT NULL,
  PRIMARY KEY (`idprofiles`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `profiles`
--

INSERT INTO `profiles` (`idprofiles`, `code`, `nom`, `type`) VALUES
(1, 'prof.01', 'System admin', 1),
(2, 'prof.02', 'Admin et finance', 2),
(3, 'prof.03', 'Facturation et caisse', 3),
(4, 'prof.04', 'identification et designation', 4),
(5, 'prof.05', 'Desactivé', 5);

-- --------------------------------------------------------

--
-- Structure de la table `sorties_perime`
--

CREATE TABLE IF NOT EXISTS `sorties_perime` (
  `idsorties_perime` int(11) NOT NULL AUTO_INCREMENT,
  `iddrugs` varchar(50) DEFAULT NULL,
  `pa` varchar(5) DEFAULT NULL,
  `pv` varchar(5) DEFAULT NULL,
  `quantite` varchar(5) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `dateExpiration` date DEFAULT NULL,
  `idusers` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`idsorties_perime`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `stock`
--

CREATE TABLE IF NOT EXISTS `stock` (
  `idstock` int(11) NOT NULL AUTO_INCREMENT,
  `Quantite1` varchar(45) DEFAULT NULL,
  `dateExpiration1` date DEFAULT NULL,
  `Quantite2` varchar(45) DEFAULT NULL,
  `paTotal` varchar(20) DEFAULT NULL,
  `dateExpiration2` date DEFAULT NULL,
  `statut` varchar(5) DEFAULT NULL,
  `drugs_iddrugs` int(11) DEFAULT NULL,
  PRIMARY KEY (`idstock`),
  KEY `fk_stock_drugs1_idx` (`drugs_iddrugs`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=370 ;

--
-- Contenu de la table `stock`
--

INSERT INTO `stock` (`idstock`, `Quantite1`, `dateExpiration1`, `Quantite2`, `paTotal`, `dateExpiration2`, `statut`, `drugs_iddrugs`) VALUES
(1, '50', '2021-12-31', '', '', '0000-00-00', '0', 1),
(2, '9', '2021-12-31', '', '', '0000-00-00', '0', 2),
(3, '6', '2021-12-31', '', '', '0000-00-00', '0', 3),
(4, '120', '2021-12-31', '', '', '0000-00-00', '0', 4),
(5, '40', '2021-12-31', '', '', '0000-00-00', '0', 5),
(6, '30', '2021-12-31', '', '', '0000-00-00', '0', 6),
(7, '53', '2021-12-31', '', '', '0000-00-00', '0', 7),
(8, '118', '2021-12-31', '', '', '0000-00-00', '0', 8),
(9, '70', '2021-12-31', '', '', '0000-00-00', '0', 9),
(10, '10', '2021-12-31', '', '', '0000-00-00', '0', 10),
(11, '10', '2021-12-31', '', '', '0000-00-00', '0', 11),
(12, '4', '2021-12-31', '', '', '0000-00-00', '0', 12),
(13, '33', '2021-12-31', '', '', '0000-00-00', '0', 13),
(14, '40', '2021-12-31', '', '', '0000-00-00', '0', 14),
(15, '9', '2021-12-31', '', '', '0000-00-00', '0', 15),
(16, '60', '2021-12-31', '', '', '0000-00-00', '0', 16),
(17, '320', '2021-12-31', '', '', '0000-00-00', '0', 17),
(18, '310', '2021-12-31', '', '', '0000-00-00', '0', 18),
(19, '180', '2021-12-31', '', '', '0000-00-00', '0', 19),
(20, '190', '2021-12-31', '', '', '0000-00-00', '0', 20),
(21, '560', '2021-12-31', '', '', '0000-00-00', '0', 21),
(22, '140', '2021-12-31', '', '', '0000-00-00', '0', 22),
(23, '29', '2021-12-31', '', '', '0000-00-00', '0', 23),
(24, '19', '2021-12-31', '', '', '0000-00-00', '0', 24),
(25, '30', '2021-12-31', '', '', '0000-00-00', '0', 25),
(26, '160', '2021-12-31', '', '', '0000-00-00', '0', 26),
(27, '330', '2021-12-31', '', '', '0000-00-00', '0', 27),
(28, '10', '2021-12-31', '', '', '0000-00-00', '0', 28),
(29, '30', '2021-12-31', '', '', '0000-00-00', '0', 29),
(30, '2', '2021-12-31', '', '', '0000-00-00', '0', 30),
(31, '20', '2021-12-31', '', '', '0000-00-00', '0', 31),
(32, '2', '2021-12-31', '', '', '0000-00-00', '0', 32),
(33, '3', '2021-12-31', '', '', '0000-00-00', '0', 33),
(34, '2', '2021-12-31', '', '', '0000-00-00', '0', 34),
(35, '4', '2021-12-31', '', '', '0000-00-00', '0', 35),
(36, '4', '2021-12-31', '', '', '0000-00-00', '0', 36),
(37, '70', '2021-12-31', '', '', '0000-00-00', '0', 37),
(38, '150', '2021-12-31', '', '', '0000-00-00', '0', 38),
(39, '160', '2021-12-31', '', '', '0000-00-00', '0', 39),
(40, '200', '2021-12-31', '', '', '0000-00-00', '0', 40),
(41, '90', '2021-12-31', '', '', '0000-00-00', '0', 41),
(42, '2', '2021-12-31', '', '', '0000-00-00', '0', 42),
(43, '40', '2021-12-31', '', '', '0000-00-00', '0', 43),
(44, '15', '2021-12-31', '', '', '0000-00-00', '0', 44),
(45, '2', '2021-12-31', '', '', '0000-00-00', '0', 45),
(46, '6', '2021-12-31', '', '', '0000-00-00', '0', 46),
(47, '6', '2021-12-31', '', '', '0000-00-00', '0', 47),
(48, '0', '2021-12-31', '', '', '0000-00-00', '0', 48),
(49, '4', '2021-12-31', '', '', '0000-00-00', '0', 49),
(50, '1', '2021-12-31', '', '', '0000-00-00', '0', 50),
(51, '76', '2021-12-31', '', '', '0000-00-00', '0', 51),
(52, '4', '2021-12-31', '', '', '0000-00-00', '0', 52),
(53, '20', '2021-12-31', '', '', '0000-00-00', '0', 53),
(54, '6', '2021-12-31', '', '', '0000-00-00', '0', 54),
(55, '9', '2021-12-31', '', '', '0000-00-00', '0', 55),
(56, '1', '2021-12-31', '', '', '0000-00-00', '0', 56),
(57, '1', '2021-12-31', '', '', '0000-00-00', '0', 57),
(58, '3', '2021-12-31', '', '', '0000-00-00', '0', 58),
(59, '5', '2021-12-31', '', '', '0000-00-00', '0', 59),
(60, '2', '2021-12-31', '', '', '0000-00-00', '0', 60),
(61, '184', '2021-12-31', '', '', '0000-00-00', '0', 61),
(62, '0', '2021-12-31', '', '', '0000-00-00', '0', 62),
(63, '90', '2021-12-31', '', '', '0000-00-00', '0', 63),
(64, '6', '2021-12-31', '', '', '0000-00-00', '0', 64),
(65, '370', '2021-12-31', '', '', '0000-00-00', '0', 65),
(66, '1', '2021-12-31', '', '', '0000-00-00', '0', 66),
(67, '2', '2021-12-31', '', '', '0000-00-00', '0', 67),
(68, '4', '2021-12-31', '', '', '0000-00-00', '0', 68),
(69, '2', '2021-12-31', '', '', '0000-00-00', '0', 69),
(70, '2', '2021-12-31', '', '', '0000-00-00', '0', 70),
(71, '10', '2021-12-31', '', '', '0000-00-00', '0', 71),
(72, '60', '2021-12-31', '', '', '0000-00-00', '0', 72),
(73, '260', '2021-12-31', '', '', '0000-00-00', '0', 73),
(74, '150', '2021-12-31', '', '', '0000-00-00', '0', 74),
(75, '150', '2021-12-31', '', '', '0000-00-00', '0', 75),
(76, '200', '2021-12-31', '', '', '0000-00-00', '0', 76),
(77, '140', '2021-12-31', '', '', '0000-00-00', '0', 77),
(78, '20', '2021-12-31', '', '', '0000-00-00', '0', 78),
(79, '10', '2021-12-31', '', '', '0000-00-00', '0', 79),
(80, '1', '2021-12-31', '', '', '0000-00-00', '0', 80),
(81, '4', '2021-12-31', '', '', '0000-00-00', '0', 81),
(82, '8', '2021-12-31', '', '', '0000-00-00', '0', 82),
(83, '1100', '2021-12-31', '', '', '0000-00-00', '0', 83),
(84, '0', '2021-12-31', '', '', '0000-00-00', '0', 84),
(85, '190', '2021-12-31', '', '', '0000-00-00', '0', 85),
(86, '1100', '2021-12-31', '', '', '0000-00-00', '0', 86),
(87, '120', '2021-12-31', '', '', '0000-00-00', '0', 87),
(88, '3', '2021-12-31', '', '', '0000-00-00', '0', 88),
(89, '14', '2021-12-31', '', '', '0000-00-00', '0', 89),
(90, '1', '2021-12-31', '', '', '0000-00-00', '0', 90),
(91, '25', '2021-12-31', '', '', '0000-00-00', '0', 91),
(92, '96', '2021-12-31', '', '', '0000-00-00', '0', 92),
(93, '3', '2021-12-31', '', '', '0000-00-00', '0', 93),
(94, '40', '2021-12-31', '', '', '0000-00-00', '0', 94),
(95, '30', '2021-12-31', '', '', '0000-00-00', '0', 95),
(96, '200', '2021-12-31', '', '', '0000-00-00', '0', 96),
(97, '6', '2021-12-31', '', '', '0000-00-00', '0', 97),
(98, '8', '2021-12-31', '', '', '0000-00-00', '0', 98),
(99, '30', '2021-12-31', '', '', '0000-00-00', '0', 99),
(100, '180', '2021-12-31', '', '', '0000-00-00', '0', 100),
(101, '40', '2021-12-31', '', '', '0000-00-00', '0', 101),
(102, '24', '2021-12-31', '', '', '0000-00-00', '0', 102),
(103, '10', '2021-12-31', '', '', '0000-00-00', '0', 103),
(104, '8192', '2021-12-31', '', '', '0000-00-00', '0', 104),
(105, '4', '2021-12-31', '', '', '0000-00-00', '0', 105),
(106, '460', '2021-12-31', '', '', '0000-00-00', '0', 106),
(107, '8', '2021-12-31', '', '', '0000-00-00', '0', 107),
(108, '6', '2021-12-31', '', '', '0000-00-00', '0', 108),
(109, '3', '2021-12-31', '', '', '0000-00-00', '0', 109),
(110, '0', '2021-12-31', '', '', '0000-00-00', '0', 110),
(111, '3', '2021-12-31', '', '', '0000-00-00', '0', 111),
(112, '3', '2021-12-31', '', '', '0000-00-00', '0', 112),
(113, '240', '2021-12-31', '', '', '0000-00-00', '0', 113),
(114, '20', '2021-12-31', '', '', '0000-00-00', '0', 114),
(115, '40', '2021-12-31', '', '', '0000-00-00', '0', 115),
(116, '1', '2021-12-31', '', '', '0000-00-00', '0', 116),
(117, '20', '2021-12-31', '', '', '0000-00-00', '0', 117),
(118, '0', '2021-12-31', '', '', '0000-00-00', '0', 118),
(119, '2', '2021-12-31', '', '', '0000-00-00', '0', 119),
(120, '1', '2021-12-31', '', '', '0000-00-00', '0', 120),
(121, '0', '2021-12-31', '', '', '0000-00-00', '0', 121),
(122, '15', '2021-12-31', '', '', '0000-00-00', '0', 122),
(123, '10', '2021-12-31', '', '', '0000-00-00', '0', 123),
(124, '1526', '2021-12-31', '', '', '0000-00-00', '0', 124),
(125, '330', '2021-12-31', '', '', '0000-00-00', '0', 125),
(126, '0', '2021-12-31', '', '', '0000-00-00', '0', 126),
(127, '85', '2021-12-31', '', '', '0000-00-00', '0', 127),
(128, '120', '2021-12-31', '', '', '0000-00-00', '0', 128),
(129, '30', '2021-12-31', '', '', '0000-00-00', '0', 129),
(130, '40', '2021-12-31', '', '', '0000-00-00', '0', 130),
(131, '2', '2021-12-31', '', '', '0000-00-00', '0', 131),
(132, '200', '2021-12-31', '', '', '0000-00-00', '0', 132),
(133, '600', '2021-12-31', '', '', '0000-00-00', '0', 133),
(134, '150', '2021-12-31', '', '', '0000-00-00', '0', 134),
(135, '180', '2021-12-31', '', '', '0000-00-00', '0', 135),
(136, '90', '2021-12-31', '', '', '0000-00-00', '0', 136),
(137, '32', '2021-12-31', '', '', '0000-00-00', '0', 137),
(138, '60', '2021-12-31', '', '', '0000-00-00', '0', 138),
(139, '320', '2021-12-31', '', '', '0000-00-00', '0', 139),
(140, '580', '2021-12-31', '', '', '0000-00-00', '0', 140),
(141, '0', '2021-12-31', '', '', '0000-00-00', '0', 141),
(142, '160', '2021-12-31', '', '', '0000-00-00', '0', 142),
(143, '1', '2021-12-31', '', '', '0000-00-00', '0', 143),
(144, '3', '2021-12-31', '', '', '0000-00-00', '0', 144),
(145, '30', '2021-12-31', '', '', '0000-00-00', '0', 145),
(146, '225', '2021-12-31', '', '', '0000-00-00', '0', 146),
(147, '48', '2021-12-31', '', '', '0000-00-00', '0', 147),
(148, '3', '2021-12-31', '', '', '0000-00-00', '0', 148),
(149, '20', '2021-12-31', '', '', '0000-00-00', '0', 149),
(150, '30', '2021-12-31', '', '', '0000-00-00', '0', 150),
(151, '60', '2021-12-31', '', '', '0000-00-00', '0', 151),
(152, '129', '2021-12-31', '', '', '0000-00-00', '0', 152),
(153, '3', '2021-12-31', '', '', '0000-00-00', '0', 153),
(154, '30', '2021-12-31', '', '', '0000-00-00', '0', 154),
(155, '10', '2021-12-31', '', '', '0000-00-00', '0', 155),
(156, '280', '2021-12-31', '', '', '0000-00-00', '0', 156),
(157, '20', '2021-12-31', '', '', '0000-00-00', '0', 157),
(158, '4', '2021-12-31', '', '', '0000-00-00', '0', 158),
(159, '40', '2021-12-31', '', '', '0000-00-00', '0', 159),
(160, '156', '2021-12-31', '', '', '0000-00-00', '0', 160),
(161, '7', '2021-12-31', '', '', '0000-00-00', '0', 161),
(162, '10', '2021-12-31', '', '', '0000-00-00', '0', 162),
(163, '100', '2021-12-31', '', '', '0000-00-00', '0', 163),
(164, '2', '2021-12-31', '', '', '0000-00-00', '0', 164),
(165, '40', '2021-12-31', '', '', '0000-00-00', '0', 165),
(166, '0', '2021-12-31', '', '', '0000-00-00', '0', 166),
(167, '2', '2021-12-31', '', '', '0000-00-00', '0', 167),
(168, '40', '2021-12-31', '', '', '0000-00-00', '0', 168),
(169, '2', '2021-12-31', '', '', '0000-00-00', '0', 169),
(170, '50', '2021-12-31', '', '', '0000-00-00', '0', 170),
(171, '3', '2021-12-31', '', '', '0000-00-00', '0', 171),
(172, '24', '2021-12-31', '', '', '0000-00-00', '0', 172),
(173, '5', '2021-12-31', '', '', '0000-00-00', '0', 173),
(174, '6', '2021-12-31', '', '', '0000-00-00', '0', 174),
(175, '90', '2021-12-31', '', '', '0000-00-00', '0', 175),
(176, '4', '2021-12-31', '', '', '0000-00-00', '0', 176),
(177, '24', '2021-12-31', '', '', '0000-00-00', '0', 177),
(178, '3', '2021-12-31', '', '', '0000-00-00', '0', 178),
(179, '40', '2021-12-31', '', '', '0000-00-00', '0', 179),
(180, '1', '2021-12-31', '', '', '0000-00-00', '0', 180),
(181, '5', '2021-12-31', '', '', '0000-00-00', '0', 181),
(182, '10', '2021-12-31', '', '', '0000-00-00', '0', 182),
(183, '40', '2021-12-31', '', '', '0000-00-00', '0', 183),
(184, '5', '2021-12-31', '', '', '0000-00-00', '0', 184),
(185, '32', '2021-12-31', '', '', '0000-00-00', '0', 185),
(186, '510', '2021-12-31', '', '', '0000-00-00', '0', 186),
(187, '9', '2021-12-31', '', '', '0000-00-00', '0', 187),
(188, '30', '2021-12-31', '', '', '0000-00-00', '0', 188),
(189, '100', '2021-12-31', '', '', '0000-00-00', '0', 189),
(190, '60', '2021-12-31', '', '', '0000-00-00', '0', 190),
(191, '1', '2021-12-31', '', '', '0000-00-00', '0', 191),
(192, '6', '2021-12-31', '', '', '0000-00-00', '0', 192),
(193, '3', '2021-12-31', '', '', '0000-00-00', '0', 193),
(194, '460', '2021-12-31', '', '', '0000-00-00', '0', 194),
(195, '380', '2021-12-31', '', '', '0000-00-00', '0', 195),
(196, '6', '2021-12-31', '', '', '0000-00-00', '0', 196),
(197, '3', '2021-12-31', '', '', '0000-00-00', '0', 197),
(198, '3', '2021-12-31', '', '', '0000-00-00', '0', 198),
(199, '22', '2021-12-31', '', '', '0000-00-00', '0', 199),
(200, '2', '2021-12-31', '', '', '0000-00-00', '0', 200),
(201, '4', '2021-12-31', '', '', '0000-00-00', '0', 201),
(202, '110', '2021-12-31', '', '', '0000-00-00', '0', 202),
(203, '260', '2021-12-31', '', '', '0000-00-00', '0', 203),
(204, '290', '2021-12-31', '', '', '0000-00-00', '0', 204),
(205, '1410', '2021-12-31', '', '', '0000-00-00', '0', 205),
(206, '450', '2021-12-31', '', '', '0000-00-00', '0', 206),
(207, '1180', '2021-12-31', '', '', '0000-00-00', '0', 207),
(208, '3', '2021-12-31', '', '', '0000-00-00', '0', 208),
(209, '3', '2021-12-31', '', '', '0000-00-00', '0', 209),
(210, '30', '2021-12-31', '', '', '0000-00-00', '0', 210),
(211, '28', '2021-12-31', '', '', '0000-00-00', '0', 211),
(212, '9', '2021-12-31', '', '', '0000-00-00', '0', 212),
(213, '350', '2021-12-31', '', '', '0000-00-00', '0', 213),
(214, '30', '2021-12-31', '', '', '0000-00-00', '0', 214),
(215, '300', '2021-12-31', '', '', '0000-00-00', '0', 215),
(216, '200', '2021-12-31', '', '', '0000-00-00', '0', 216),
(217, '50', '2021-12-31', '', '', '0000-00-00', '0', 217),
(218, '30', '2021-12-31', '', '', '0000-00-00', '0', 218),
(219, '90', '2021-12-31', '', '', '0000-00-00', '0', 219),
(220, '230', '2021-12-31', '', '', '0000-00-00', '0', 220),
(221, '100', '2021-12-31', '', '', '0000-00-00', '0', 221),
(222, '90', '2021-12-31', '', '', '0000-00-00', '0', 222),
(223, '30', '2021-12-31', '', '', '0000-00-00', '0', 223),
(224, '40', '2021-12-31', '', '', '0000-00-00', '0', 224),
(225, '4', '2021-12-31', '', '', '0000-00-00', '0', 225),
(226, '2', '2021-12-31', '', '', '0000-00-00', '0', 226),
(227, '2', '2021-12-31', '', '', '0000-00-00', '0', 227),
(228, '6', '2021-12-31', '', '', '0000-00-00', '0', 228),
(229, '1560', '2021-12-31', '', '', '0000-00-00', '0', 229),
(230, '14', '2021-12-31', '', '', '0000-00-00', '0', 230),
(231, '6', '2021-12-31', '', '', '0000-00-00', '0', 231),
(232, '230', '2021-12-31', '', '', '0000-00-00', '0', 232),
(233, '290', '2021-12-31', '', '', '0000-00-00', '0', 233),
(234, '18', '2021-12-31', '', '', '0000-00-00', '0', 234),
(235, '11', '2021-12-31', '', '', '0000-00-00', '0', 235),
(236, '3', '2021-12-31', '', '', '0000-00-00', '0', 236),
(237, '300', '2021-12-31', '', '', '0000-00-00', '0', 237),
(238, '24', '2021-12-31', '', '', '0000-00-00', '0', 238),
(239, '5', '2021-12-31', '', '', '0000-00-00', '0', 239),
(240, '88', '2021-12-31', '', '', '0000-00-00', '0', 240),
(241, '5', '2021-12-31', '', '', '0000-00-00', '0', 241),
(242, '5', '2021-12-31', '', '', '0000-00-00', '0', 242),
(243, '340', '2021-12-31', '', '', '0000-00-00', '0', 243),
(244, '15', '2021-12-31', '', '', '0000-00-00', '0', 244),
(245, '5', '2021-12-31', '', '', '0000-00-00', '0', 245),
(246, '2', '2021-12-31', '', '', '0000-00-00', '0', 246),
(247, '2', '2021-12-31', '', '', '0000-00-00', '0', 247),
(248, '2', '2021-12-31', '', '', '0000-00-00', '0', 248),
(249, '5', '2021-12-31', '', '', '0000-00-00', '0', 249),
(250, '90', '2021-12-31', '', '', '0000-00-00', '0', 250),
(251, '30', '2021-12-31', '', '', '0000-00-00', '0', 251),
(252, '10', '2021-12-31', '', '', '0000-00-00', '0', 252),
(253, '2', '2021-12-31', '', '', '0000-00-00', '0', 253),
(254, '160', '2021-12-31', '', '', '0000-00-00', '0', 254),
(255, '40', '2021-12-31', '', '', '0000-00-00', '0', 255),
(256, '200', '2021-12-31', '', '', '0000-00-00', '0', 256),
(257, '120', '2021-12-31', '', '', '0000-00-00', '0', 257),
(258, '231', '2021-12-31', '', '', '0000-00-00', '0', 258),
(259, '280', '2021-12-31', '', '', '0000-00-00', '0', 259),
(260, '10', '2021-12-31', '', '', '0000-00-00', '0', 260),
(261, '13', '2021-12-31', '', '', '0000-00-00', '0', 261),
(262, '20', '2021-12-31', '', '', '0000-00-00', '0', 262),
(263, '1', '2021-12-31', '', '', '0000-00-00', '0', 263),
(264, '310', '2021-12-31', '', '', '0000-00-00', '0', 264),
(265, '130', '2021-12-31', '', '', '0000-00-00', '0', 265),
(266, '24', '2021-12-31', '', '', '0000-00-00', '0', 266),
(267, '4', '2021-12-31', '', '', '0000-00-00', '0', 267),
(268, '3', '2021-12-31', '', '', '0000-00-00', '0', 268),
(269, '2', '2021-12-31', '', '', '0000-00-00', '0', 269),
(270, '2', '2021-12-31', '', '', '0000-00-00', '0', 270),
(271, '1', '2021-12-31', '', '', '0000-00-00', '0', 271),
(272, '380', '2021-12-31', '', '', '0000-00-00', '0', 272),
(273, '20', '2021-12-31', '', '', '0000-00-00', '0', 273),
(274, '12', '2021-12-31', '', '', '0000-00-00', '0', 274),
(275, '66', '2021-12-31', '', '', '0000-00-00', '0', 275),
(276, '970', '2021-12-31', '', '', '0000-00-00', '0', 276),
(277, '28', '2021-12-31', '', '', '0000-00-00', '0', 277),
(278, '930', '2021-12-31', '', '', '0000-00-00', '0', 278),
(279, '2', '2021-12-31', '', '', '0000-00-00', '0', 279),
(280, '100', '2021-12-31', '', '', '0000-00-00', '0', 280),
(281, '4', '2021-12-31', '', '', '0000-00-00', '0', 281),
(282, '1', '2021-12-31', '', '', '0000-00-00', '0', 282),
(283, '15', '2021-12-31', '', '', '0000-00-00', '0', 283),
(284, '200', '2021-12-31', '', '', '0000-00-00', '0', 284),
(285, '0', '2021-12-31', '', '', '0000-00-00', '0', 285),
(286, '87', '2021-12-31', '', '', '0000-00-00', '0', 286),
(287, '16', '2021-12-31', '', '', '0000-00-00', '0', 287),
(288, '390', '2021-12-31', '', '', '0000-00-00', '0', 288),
(289, '5', '2021-12-31', '', '', '0000-00-00', '0', 289),
(290, '2', '2021-12-31', '', '', '0000-00-00', '0', 290),
(291, '2', '2021-12-31', '', '', '0000-00-00', '0', 291),
(292, '1', '2021-12-31', '', '', '0000-00-00', '0', 292),
(293, '2', '2021-12-31', '', '', '0000-00-00', '0', 293),
(294, '600', '2021-12-31', '', '', '0000-00-00', '0', 294),
(295, '60', '2021-12-31', '', '', '0000-00-00', '0', 295),
(296, '100', '2021-12-31', '', '', '0000-00-00', '0', 296),
(297, '2', '2021-12-31', '', '', '0000-00-00', '0', 297),
(298, '290', '2021-12-31', '', '', '0000-00-00', '0', 298),
(299, '170', '2021-12-31', '', '', '0000-00-00', '0', 299),
(300, '168', '2021-12-31', '', '', '0000-00-00', '0', 300),
(301, '200', '2021-12-31', '', '', '0000-00-00', '0', 301),
(302, '1', '2021-12-31', '', '', '0000-00-00', '0', 302),
(303, '120', '2021-12-31', '', '', '0000-00-00', '0', 303),
(304, '26995', '2021-12-31', '', '', '0000-00-00', '0', 304),
(305, '60', '2021-12-31', '', '', '0000-00-00', '0', 305),
(306, '17', '2021-12-31', '', '', '0000-00-00', '0', 306),
(307, '6', '2021-12-31', '', '', '0000-00-00', '0', 307),
(308, '30', '2021-12-31', '', '', '0000-00-00', '0', 308),
(309, '2', '2021-12-31', '', '', '0000-00-00', '0', 309),
(310, '600', '2021-12-31', '', '', '0000-00-00', '0', 310),
(311, '90', '2021-12-31', '', '', '0000-00-00', '0', 311),
(312, '3', '2021-12-31', '', '', '0000-00-00', '0', 312),
(313, '72', '2021-12-31', '', '', '0000-00-00', '0', 313),
(314, '2', '2021-12-31', '', '', '0000-00-00', '0', 314),
(315, '44', '2021-12-31', '', '', '0000-00-00', '0', 315),
(316, '2', '2021-12-31', '', '', '0000-00-00', '0', 316),
(317, '5', '2021-12-31', '', '', '0000-00-00', '0', 317),
(318, '4', '2021-12-31', '', '', '0000-00-00', '0', 318),
(319, '12', '2021-12-31', '', '', '0000-00-00', '0', 319),
(320, '1', '2021-12-31', '', '', '0000-00-00', '0', 320),
(321, '40', '2021-12-31', '', '', '0000-00-00', '0', 321),
(322, '3', '2021-12-31', '', '', '0000-00-00', '0', 322),
(323, '85', '2021-12-31', '', '', '0000-00-00', '0', 323),
(324, '95', '2021-12-31', '', '', '0000-00-00', '0', 324),
(325, '220', '2021-12-31', '', '', '0000-00-00', '0', 325),
(326, '0', '2021-12-31', '', '', '0000-00-00', '0', 326),
(327, '136', '2021-12-31', '', '', '0000-00-00', '0', 327),
(328, '2', '2021-12-31', '', '', '0000-00-00', '0', 328),
(329, '45', '2021-12-31', '', '', '0000-00-00', '0', 329),
(330, '2', '2021-12-31', '', '', '0000-00-00', '0', 330),
(331, '2', '2021-12-31', '', '', '0000-00-00', '0', 331),
(332, '4', '2021-12-31', '', '', '0000-00-00', '0', 332),
(333, '4', '2021-12-31', '', '', '0000-00-00', '0', 333),
(334, '20', '2021-12-31', '', '', '0000-00-00', '0', 334),
(335, '150', '2021-12-31', '', '', '0000-00-00', '0', 335),
(336, '23', '2021-12-31', '', '', '0000-00-00', '0', 336),
(337, '24', '2021-12-31', '', '', '0000-00-00', '0', 337),
(338, '60', '2021-12-31', '', '', '0000-00-00', '0', 338),
(339, '4', '2021-12-31', '', '', '0000-00-00', '0', 339),
(340, '80', '2021-12-31', '', '', '0000-00-00', '0', 340),
(341, '90', '2021-12-31', '', '', '0000-00-00', '0', 341),
(342, '1', '2021-12-31', '', '', '0000-00-00', '0', 342),
(343, '2', '2021-12-31', '', '', '0000-00-00', '0', 343),
(344, '25', '2021-12-31', '', '', '0000-00-00', '0', 344),
(345, '465', '2021-12-31', '', '', '0000-00-00', '0', 345),
(346, '90', '2021-12-31', '', '', '0000-00-00', '0', 346),
(347, '60', '2021-12-31', '', '', '0000-00-00', '0', 347),
(348, '40', '2021-12-31', '', '', '0000-00-00', '0', 348),
(349, '72', '2021-12-31', '', '', '0000-00-00', '0', 349),
(350, '36', '2021-12-31', '', '', '0000-00-00', '0', 350),
(351, '4', '2021-12-31', '', '', '0000-00-00', '0', 351),
(352, '28', '2021-12-31', '', '', '0000-00-00', '0', 352),
(353, '2', '2021-12-31', '', '', '0000-00-00', '0', 353),
(354, '30', '2021-12-31', '', '', '0000-00-00', '0', 354),
(355, '14', '2021-12-31', '', '', '0000-00-00', '0', 355),
(356, '80', '2021-12-31', '', '', '0000-00-00', '0', 356),
(357, '1', '2021-12-31', '', '', '0000-00-00', '0', 357),
(358, '60', '2021-12-31', '', '', '0000-00-00', '0', 358),
(359, '2', '2021-12-31', '', '', '0000-00-00', '0', 359),
(360, '480', '2021-12-31', '', '', '0000-00-00', '0', 360),
(361, '60', '2021-12-31', '', '', '0000-00-00', '0', 361),
(362, '30', '2021-12-31', '', '', '0000-00-00', '0', 362),
(363, '30', '2021-12-31', '', '', '0000-00-00', '0', 363),
(364, '114', '2021-12-31', '', '', '0000-00-00', '0', 364),
(365, '3', '2021-12-31', '', '', '0000-00-00', '0', 365),
(366, '1', '2021-12-31', '', '', '0000-00-00', '0', 366),
(367, '240', '2021-12-31', '', '', '0000-00-00', '0', 367),
(368, '150', '2021-12-31', '', '', '0000-00-00', '0', 368),
(369, '60', '2021-12-31', '', '', '0000-00-00', '0', 369);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `idusers` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(10) NOT NULL,
  `nom` varchar(150) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `droit` varchar(45) DEFAULT NULL,
  `super` tinyint(4) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idusers`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`idusers`, `code`, `nom`, `username`, `password`, `droit`, `super`, `phone`) VALUES
(1, 'user.00', 'Fernand', '2020', '1ea65274bd0c79d529d002cad6cd2161', '1', 1, '79253808');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `fk_commandes_fournisseur` FOREIGN KEY (`fournisseur_idfournisseur`) REFERENCES `fournisseur` (`idfournisseur`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `drugs`
--
ALTER TABLE `drugs`
  ADD CONSTRAINT `fk_drugs_drugs_category1` FOREIGN KEY (`drugs_category_iddrugs_category`) REFERENCES `drugs_category` (`iddrugs_category`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `facture_assurance`
--
ALTER TABLE `facture_assurance`
  ADD CONSTRAINT `fk_facture_assurance_assurance1` FOREIGN KEY (`assurance_idassurance`) REFERENCES `assurance` (`idassurance`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `fk_stock_drugs1` FOREIGN KEY (`drugs_iddrugs`) REFERENCES `drugs` (`iddrugs`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
