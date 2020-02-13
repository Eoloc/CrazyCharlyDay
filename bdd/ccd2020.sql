-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Ven 07 Février 2020 à 09:31
-- Version du serveur :  5.7.29-0ubuntu0.18.04.1
-- Version de PHP :  7.2.24-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  'coboard'
--

-- --------------------------------------------------------

--
-- Structure de la table 'role'
--

CREATE TABLE role (
idrole int(11) NOT NULL AUTO_INCREMENT,
label varchar(128) NOT NULL,
PRIMARY KEY (idrole)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table 'role'
--

INSERT INTO role (label) VALUES
('Caissier titulaire'),
('Caissier assistant'),
('Gestionnaire de vrac titulaire'),
('Gestionnaire de vrac assistant'),
('Chargé d\'accueil titulaire'),
('Chargé d\'accueil assistant');

-- --------------------------------------------------------

--
-- Structure de la table 'user'
--

CREATE TABLE user (
iduser int(11) NOT NULL AUTO_INCREMENT,
nom varchar(30) CHARACTER SET utf8 NOT NULL,
prenom varchar(30) CHARACTER SET utf8 NOT NULL,
mail varchar(40) CHARACTER SET utf8 NOT NULL,
tel int(10),
photo varchar(30),
login varchar(30) CHARACTER SET utf8 NOT NULL,
mdp varchar(30) CHARACTER SET utf8 NOT NULL,
nombreAbs int(5),
permanence int(3),
statut varchar(30) CHARACTER SET utf8 NOT NULL,
PRIMARY KEY (iduser)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table 'user'
--

INSERT INTO user (nom, prenom, mail, tel, photo, login, mdp, nombreAbs, permanence, statut) VALUES
('nom1', 'Cassandre', 'mail1', 000000001, '', 'login1', 'mdp1', '0', '3', 'membre'),
('nom2', 'Achille',  'mail2', 000000002, '', 'login2', 'mdp2', '0', '3', 'membre'),
('nom3', 'Calypso', 'mail3', 000000003, '', 'login3', 'mdp3', '0', '3', 'membre'),
('nom4', 'Bacchus',  'mail4', 000000004, '', 'login4', 'mdp4', '0', '3', 'membre'),
('nom5', 'Diane', 'mail5', 000000005, '', 'login5', 'mdp5', '0', '3', 'membre'),
('nom6', 'Clark', 'mail6', 000000006, '', 'login6', 'mdp6', '0', '3', 'membre'),
('nom7', 'Helene',  'mail7', 000000007, '', 'login7', 'mdp7', '0', '3', 'membre'),
('nom8', 'Jason', 'mail8', 000000008, '', 'login8', 'mdp8', '0', '3', 'membre'),
('nom9', 'Bruce', 'mail9', 000000009, '', 'login9', 'mdp9', '0', '3', 'membre'),
('nom10', 'Pénélope', 'mail10', 000000010, '', 'login10', 'mdp10', '0', '3', 'membre'),
('nom11', 'Ariane', 'mail11', 000000011, '', 'login11', 'mdp11', '0', '3', 'membre'),
('nom12', 'Lois', 'mail12', 000000012, '', 'login12', 'mdp12', '0', '3', 'membre');

CREATE TABLE creneau (
idcreneau int(4) NOT NULL AUTO_INCREMENT,
jour int(2) NOT NULL,
semaine char(2),
cycle int(2) NOT NULL,
heuredeb int(1) NOT NULL,
heurefin int(1) NOT NULL,
activation varchar(30),
PRIMARY KEY(idcreneau)
);

INSERT INTO `creneau` (`jour`, `semaine`, `cycle`, `heuredeb`, `heurefin`, `activation`) VALUES
(1, 'A', 0, 18, 20, 'désactivé'),
(3, 'A', 0, 10, 12, 'désactivé'),
(3, 'A', 0, 18, 20, 'désactivé'),
(5, 'A', 0, 18, 20, 'désactivé'),
(6, 'A', 0, 10, 17, 'désactivé'),
(7, 'A', 0, 10, 12, 'désactivé'),
(1, 'B', 0, 18, 20, 'désactivé'),
(3, 'B', 0, 10, 12, 'désactivé'),
(3, 'B', 0, 18, 20, 'désactivé'),
(5, 'B', 0, 18, 20, 'désactivé'),
(6, 'B', 0, 10, 17, 'désactivé'),
(7, 'B', 0, 10, 12, 'désactivé'),
(1, 'C', 0, 18, 20, 'désactivé'),
(3, 'C', 0, 10, 12, 'désactivé'),
(3, 'C', 0, 18, 20, 'désactivé'),
(5, 'C', 0, 18, 20, 'désactivé'),
(6, 'C', 0, 10, 17, 'désactivé'),
(7, 'C', 0, 10, 12, 'désactivé'),
(1, 'D', 0, 18, 20, 'désactivé'),
(3, 'D', 0, 10, 12, 'désactivé'),
(3, 'D', 0, 18, 20, 'désactivé'),
(5, 'D', 0, 18, 20, 'désactivé'),
(6, 'D', 0, 10, 17, 'désactivé'),
(7, 'D', 0, 10, 12, 'désactivé');



CREATE TABLE `besoin` (
`idbesoin` int(11) NOT NULL AUTO_INCREMENT,
`idcreneau` int(11) NOT NULL,
`idrole` int(11) NOT NULL,
PRIMARY KEY (`idbesoin`),
FOREIGN KEY (idcreneau) REFERENCES creneau(idcreneau),
FOREIGN KEY (idrole) REFERENCES role(idrole)
);


INSERT INTO `besoin` (`idcreneau`, `idrole`) VALUES
(1, 1),
(2, 1),
(1, 1);




CREATE TABLE `inscription` (
`idinscription` int(11) NOT NULL AUTO_INCREMENT,
`idbesoin` int(11) NOT NULL,
`iduser` int(11) NOT NULL,
PRIMARY KEY(`idinscription`),
FOREIGN KEY (idbesoin) REFERENCES besoin(idbesoin),
FOREIGN KEY (iduser) REFERENCES user(iduser)

);

INSERT INTO `inscription` (`iduser`) VALUES
(5),
(1),
(8);


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;





