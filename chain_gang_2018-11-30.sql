# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.22)
# Database: chain_gang
# Generation Time: 2018-11-30 07:49:47 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table admins
# ------------------------------------------------------------

DROP TABLE IF EXISTS `admins`;

CREATE TABLE `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `hashed_password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `index_username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;

INSERT INTO `admins` (`id`, `first_name`, `last_name`, `email`, `username`, `hashed_password`)
VALUES
	(1,'John\'s','Doe','jdoe@test.com','jdoe2234','$2y$10$YTGkVZqcZHhoyUawdTtHoeE3TZNAmJXa.MCFyEFZkdzdn349tpwGC'),
	(2,'Andrius','Butkys','abutkys@gmail.com','akokosas','$2y$10$MojQlhsFKbM9Zo0N1FP/XO1gZd1xWRqF18J/5To92WLnzfPUBw9IS'),
	(3,'John','Gurish','jGurish@test1.com','jgurish1234',''),
	(4,'Heath','Hensley','hHensley@test2.com','hhensley1234',''),
	(5,'Paloma','Webb','pwebb12345@test.eu','pwebbsdf324324',''),
	(6,'Noelle','Huffman','nHuffman@test.com','nfqHuffman1234',''),
	(7,'Aubrie','Greene','AubrieGreene@test3.com','aubriegreen345',''),
	(8,'Jared','Vargas','jarevargas234@test8.eu','JaredVargas1234',''),
	(9,'Shirley','Hull','asd@Hull.com','shirlHull234',''),
	(10,'Jaiden','Guzman','jaiden@Guzman123.com','jaidenGuzman123',''),
	(11,'Michael','Blackyard','mblackyard@test.com','mblackyard1234+','');

/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table bicycles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `bicycles`;

CREATE TABLE `bicycles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `brand` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `year` int(4) NOT NULL,
  `category` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `price` decimal(9,2) NOT NULL,
  `weight_kg` decimal(9,5) NOT NULL,
  `condition_id` tinyint(3) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `bicycles` WRITE;
/*!40000 ALTER TABLE `bicycles` DISABLE KEYS */;

INSERT INTO `bicycles` (`id`, `brand`, `model`, `year`, `category`, `gender`, `color`, `price`, `weight_kg`, `condition_id`, `description`)
VALUES
	(1,'Trek','Emonda',2017,'Hybrid','Unisex','black',1495.00,1.50000,5,''),
	(2,'Cannondale','Synapse',2016,'Road','Unisex','matte black',1999.00,1.00000,5,''),
	(3,'Schwinn','Cutter',2016,'City','Unisex','white',450.00,18.00000,4,''),
	(4,'Schwinn','All road 7 - SPEED',2002,'Mountain','Unisex','black',1990.00,19.00000,4,''),
	(5,'Schwinn','All road 7 - SPEED',2002,'Mountain','Unisex','black',1990.00,19.00000,4,''),
	(6,'Mongoose','Switchback Sport',2015,'Mountain','Mens','blue',398.00,24.00000,2,''),
	(7,'Schwinn','Blue Boy Gang',2010,'Mountain','Unisex','dark blue',2398.00,19.00000,2,''),
	(8,'Diamond','Bobuko Dviraciuka\'s Overdrive',1999,'Mountain','Womens','white',1990.00,19.00000,2,''),
	(12,'Schwinn','Cutter',1999,'Hybrid','Unisex','blue',1234.00,18.00000,5,''),
	(13,'Shwin','Ago',2010,'Hybrid','Womens','burgundy',299.00,20.00000,3,''),
	(18,'Panther\'s','one way',1999,'Mountain','Mens','burgundy',123.00,12.00000,3,''),
	(19,'Shwin\'s','Ago',1999,'Mountain','Womens','red',12.00,1.00000,3,''),
	(20,'Montague’s legendary','FIT',2016,'Hybrid','Womens','grey',1999.00,12.00000,3,'');

/*!40000 ALTER TABLE `bicycles` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
