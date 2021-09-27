# ************************************************************
# Sequel Pro SQL dump
# Version 5446
#
# https://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.35)
# Database: lily-collection
# Generation Time: 2021-09-27 11:13:44 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table collection-items
# ------------------------------------------------------------

DROP TABLE IF EXISTS `collection-items`;

CREATE TABLE `collection-items` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `itemName` varchar(255) NOT NULL DEFAULT '',
  `imageURL` varchar(255) DEFAULT NULL,
  `numberOfPieces` smallint(6) NOT NULL,
  `ageCategory` varchar(10) NOT NULL DEFAULT '',
  `starRating` float(2,1) NOT NULL,
  `buyURL` varchar(255) DEFAULT NULL,
  `retired` enum('yes','no') NOT NULL DEFAULT 'no',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `collection-items` WRITE;
/*!40000 ALTER TABLE `collection-items` DISABLE KEYS */;

INSERT INTO `collection-items` (`id`, `itemName`, `imageURL`, `numberOfPieces`, `ageCategory`, `starRating`, `buyURL`, `retired`)
VALUES
	(1,'Hogwarts Castle','hogwartsCastle.jpeg',6020,'16+',5.0,'https://www.lego.com/en-gb/product/hogwarts-castle-71043','no'),
	(2,'Diagon Alley','diagonAlley.jpg',5544,'16+',4.5,'https://www.lego.com/en-gb/product/diagon-alley-75978','no'),
	(3,'Hogwarts Express','hogwartsExpress.jpeg',801,'8-14',4.5,'https://www.lego.com/en-gb/product/hogwarts-express-75955','no'),
	(4,'The Knight Bus','knightBus.jpeg',403,'8+',4.5,'https://www.lego.com/en-gb/product/the-knight-bus-75957','no'),
	(5,'Quidditch Match','quidditchMatch.jpeg',500,'7-14',4.5,'https://www.lego.com/en-gb/product/quidditch-match-75956','yes'),
	(6,'Attack on the Burrow','theBurrow.jpeg',1047,'9+',4.5,'https://www.lego.com/en-gb/product/attack-on-the-burrow-75980','no');

/*!40000 ALTER TABLE `collection-items` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
