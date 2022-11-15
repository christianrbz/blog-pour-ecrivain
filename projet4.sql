-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 18 juin 2020 à 22:49
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet4jf`
--

-- --------------------------------------------------------

--
-- Structure de la table `chapters`
--

DROP TABLE IF EXISTS `chapters`;
CREATE TABLE IF NOT EXISTS `chapters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `chapters`
--

INSERT INTO `chapters` (`id`, `title`, `content`) VALUES
(69, 'Chapitre 1 : Un nouveau départ', '<p>Publicam igitur se publicam ut neque rem loco ceteris contra in tum spatio futuros aliquantum tum nos cum publicae curriculoque ut cum consuetudo sumus turpes in tum contra in oporteat de et causa fateatur accipienda curriculoque peccatis rem peccatis casus prospicere maiorum longe nec in lex casus Deflexit rsqqsfsqsqfq ogemus nec causa minime amicitia prospicere loco Etenim nos et spatio et oporteat de accipienda rogemus sumus et est iam res Deflexit excusatio ut prospicere si ut si est rei peccatis loco nos minime rei rem Etenim maiorum rogemus in rei fateatur causa oporteat faciamus tum fateatur quis accipienda longe nos peccatis. <p>'),
(70, 'Chapitre 2 : Une rencontre inattendue', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor. Cras elementum ultrices diam. Maecenas ligula massa, varius a, semper congue, euismod non, mi. Proin porttitor, orci nec nonummy molestie, enim est eleifend mi, non fermentum diam nisl sit amet erat. Duis semper. Duis arcu massa, scelerisque vitae, consequat in, pretium a, enim. Pellentesque congue. Ut in risus volutpat libero pharetra tempor. Cras vestibulum bibendum augue. Praesent egestas leo in pede. Praesent blandit odio eu enim. Pellentesque sed dui ut augue blandit sodales. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aliquam nibh. Mauris ac mauris sed pede pellentesque fermentum. Maecenas adipiscing ante non diam sodales hendrerit.</p>\r\n<p>Ut velit mauris, egestas sed, gravida nec, ornare ut, mi. Aenean ut orci vel massa suscipit pulvinar. Nulla sollicitudin. Fusce varius, ligula non tempus aliquam, nunc turpis ullamcorper nibh, in tempus sapien eros vitae ligula. Pellentesque rhoncus nunc et augue. Integer id felis. Curabitur aliquet pellentesque diam. Integer quis metus vitae elit lobortis egestas. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Morbi vel erat non mauris convallis vehicula. Nulla et sapien. Integer tortor tellus, aliquam faucibus, convallis id, congue eu, quam. Mauris ullamcorper felis vitae erat. Proin feugiat, augue non elementum posuere, metus purus iaculis lectus, et tristique ligula justo vitae magna.</p>\r\n<p>&nbsp;</p>\r\n<p>Aliquam convallis sollicitudin purus. Praesent aliquam, enim at fermentum mollis, ligula massa adipiscing nisl, ac euismod nibh nisl eu lectus. Fusce vulputate sem at sapien. Vivamus leo. Aliquam euismod libero eu enim. Nulla nec felis sed leo placerat imperdiet. Aenean suscipit nulla in justo. Suspendisse cursus rutrum augue. Nulla tincidunt tincidunt mi. Curabitur iaculis, lorem vel rhoncus faucibus, felis magna fermentum augue, et ultricies lacus lorem varius purus. Curabitur eu amet.</p>'),
(71, 'Chapitre 3 : Renaissance', '<p>His consuetudine ut virosque contenta contenta interpretemur magnificentia est contenta metiamur virosque bonos docti verborum interpretemur docti ex qui Philos docti Galos contenta contenta vitae vita his omittamus eos omittamus docti communis eos bonos numeremus contenta vitae omittamus Galos verborum Philos magnificentia qui eam consuetudine reperiuntur bonos omittamus vitae vita vitae his vita habentur nostri nec virtutem Philos omittamus eos nostri qui omittamus Catones omnino Catones reperiuntur Philos quidam communis Paulos his virtutem his communis communis his contenta magnificentia virosque quidam numeremus Galos nostri sermonisque verborum virosque ut Scipiones ex consuetudine vita quidam vitae omnino reperiuntur eos virtutem bonos virtutem.</p>');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_chapter` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `date_comment` datetime NOT NULL DEFAULT current_timestamp(),
  `signaled` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_chapter` (`id_chapter`)
) ENGINE=InnoDB AUTO_INCREMENT=128 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `id_chapter`, `pseudo`, `comment`, `date_comment`, `signaled`) VALUES
(125, 69, 'Christian', 'Commentaire', '2020-06-19 00:47:22', 0),
(126, 69, 'Philippe', 'Lorem ipsum dolor sit amet', '2020-06-19 00:47:58', 2),
(127, 70, 'Jean-Baptiste', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '2020-06-19 00:48:34', 0);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `identifiant` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `identifiant`, `email`, `password`) VALUES
(1, 'Jean', 'christian.reubrez@gmail.com', '$2y$10$aC3fU2XiMZ0dwq3L/kMhVejmcTw7b9zqdVAwSlqUk1Chg5URes3l2');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`id_chapter`) REFERENCES `chapters` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
