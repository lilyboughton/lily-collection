# ************************************************************
# Sequel Pro SQL dump
# Version 5446
#
# https://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.35)
# Database: lily-collection
# Generation Time: 2021-09-30 12:56:56 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table lego-sets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `lego-sets`;

CREATE TABLE `lego-sets` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `item-name` varchar(255) NOT NULL DEFAULT '',
  `image-URL` varchar(255) DEFAULT 'placeHolder.jpeg',
  `number-of-pieces` smallint(6) NOT NULL,
  `age-category` varchar(10) NOT NULL DEFAULT '',
  `star-rating` enum('5','4','3','2','1') NOT NULL DEFAULT '5',
  `buy-URL` varchar(255) DEFAULT 'https://www.lego.com/en-gb/themes/harry-potter',
  `retired` tinyint(1) DEFAULT '0',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `lego-sets` WRITE;
/*!40000 ALTER TABLE `lego-sets` DISABLE KEYS */;

INSERT INTO `lego-sets` (`id`, `item-name`, `image-URL`, `number-of-pieces`, `age-category`, `star-rating`, `buy-URL`, `retired`, `deleted`)
VALUES
	(1,'Hogwarts Castle','hogwartsCastle.png',6020,'16+','5','https://www.lego.com/en-gb/product/hogwarts-castle-71043',0,0),
	(2,'Diagon Alley','diagonAlley1.png',5544,'16+','4','https://www.lego.com/en-gb/product/diagon-alley-75978',0,0),
	(3,'Hogwarts Express','hogwartsExpress.png',801,'8-14','4','https://www.lego.com/en-gb/product/hogwarts-express-75955',0,0),
	(4,'The Knight Bus','knightBus.png',403,'8+','4','https://www.lego.com/en-gb/product/the-knight-bus-75957',0,0),
	(5,'Quidditch Match','quidditchMatch.png',500,'7-14','4','https://www.lego.com/en-gb/product/quidditch-match-75956',1,0),
	(6,'Attack on the Burrow','theBurrow.png',1047,'9+','4','https://www.lego.com/en-gb/product/attack-on-the-burrow-75980',0,0);

/*!40000 ALTER TABLE `lego-sets` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
