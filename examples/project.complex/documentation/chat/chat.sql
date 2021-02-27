/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`chat` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `chat`;

/*Table structure for table `demon` */

DROP TABLE IF EXISTS `demon`;

CREATE TABLE `demon` (
  `name` varchar(20) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `stop` smallint(6) NOT NULL DEFAULT 0,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Table structure for table `socket` */

DROP TABLE IF EXISTS `socket`;

CREATE TABLE `socket` (
  `demon` varchar(20) NOT NULL,
  `socket_id` varchar(70) NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`demon`,`socket_id`),
  KEY `FK_User` (`user_id`),
  CONSTRAINT `FK_User` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `EmailIndex` (`email`),
  UNIQUE KEY `LoginIndex` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
