/*
SQLyog Ultimate v11.33 (64 bit)
MySQL - 8.0.31 : Database - usedcar
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
-- /*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
-- CREATE DATABASE /*!32312 IF NOT EXISTS*/`usedcar` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `usedcar`;

/*Table structure for table `book` */

DROP TABLE IF EXISTS `book`;

CREATE TABLE `book` (
  `bid` int NOT NULL AUTO_INCREMENT,
  `uid` varchar(100) NOT NULL,
  `cid` varchar(100) NOT NULL,
  `bdate` varchar(100) NOT NULL,
  `deliverydate` varchar(100) NOT NULL,
  `usertype` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'Requested',
  PRIMARY KEY (`bid`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

/*Data for the table `book` */

insert  into `book`(`bid`,`uid`,`cid`,`bdate`,`deliverydate`,`usertype`,`status`) values (33,'4','4','2023-09-29','2023-10-06','USER','Paid');

/*Table structure for table `car` */

DROP TABLE IF EXISTS `car`;

CREATE TABLE `car` (
  `cid` int NOT NULL AUTO_INCREMENT,
  `cphoto` varchar(100) NOT NULL,
  `cname` varchar(100) NOT NULL,
  `cmodel` varchar(100) NOT NULL,
  `cfuel` varchar(100) NOT NULL,
  `cprice` varchar(100) NOT NULL,
  `cdesc` varchar(100) NOT NULL,
  `cstatus` varchar(100) NOT NULL DEFAULT 'free',
  `scount` varchar(100) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `car` */

insert  into `car`(`cid`,`cphoto`,`cname`,`cmodel`,`cfuel`,`cprice`,`cdesc`,`cstatus`,`scount`) values (2,'car-8.jpg','Jeep','2020','Petrol','600000','Good Condition\r\n','free','12'),(4,'car-2.jpg','Range Rover','2019','Diesel','690000','Good','sold','6'),(6,'car-5.jpg','BMW','2019','Diesel','4500000','Good','free','3');

/*Table structure for table `chat` */

DROP TABLE IF EXISTS `chat`;

CREATE TABLE `chat` (
  `chid` int NOT NULL AUTO_INCREMENT,
  `uid` varchar(100) NOT NULL,
  `message` varchar(100) NOT NULL DEFAULT 'nomsg',
  `time` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`chid`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=latin1;

/*Data for the table `chat` */

insert  into `chat`(`chid`,`uid`,`message`,`time`,`type`) values (98,'3','Hello','06:55 PM','USER'),(99,'3','hi','07:08 PM','USER'),(100,'3','hi','07:09 PM','USER');

/*Table structure for table `feedback` */

DROP TABLE IF EXISTS `feedback`;

CREATE TABLE `feedback` (
  `fid` int NOT NULL AUTO_INCREMENT,
  `uid` varchar(100) NOT NULL,
  `sid` varchar(100) NOT NULL,
  `feedback` varchar(100) NOT NULL,
  PRIMARY KEY (`fid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `feedback` */

/*Table structure for table `login` */

DROP TABLE IF EXISTS `login`;

CREATE TABLE `login` (
  `l_id` int NOT NULL AUTO_INCREMENT,
  `reg_id` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `usertype` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'pending',
  PRIMARY KEY (`l_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `login` */

insert  into `login`(`l_id`,`reg_id`,`email`,`password`,`usertype`,`status`) values (1,'0','admin@gmail.com','admin','ADMIN','approved'),(4,'3','th@gmail.com','123','USER','approved'),(5,'4','ram@gmail.com','123','USER','approved');

/*Table structure for table `test_drive` */

DROP TABLE IF EXISTS `test_drive`;

CREATE TABLE `test_drive` (
  `tid` int NOT NULL AUTO_INCREMENT,
  `uid` varchar(100) NOT NULL,
  `cid` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `time` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'Requested',
  PRIMARY KEY (`tid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `test_drive` */

insert  into `test_drive`(`tid`,`uid`,`cid`,`date`,`time`,`status`) values (4,'4','2','2023-09-29','09:00','Accepted');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `uid` int NOT NULL AUTO_INCREMENT,
  `uname` varchar(100) NOT NULL,
  `uemail` varchar(100) NOT NULL,
  `uaddress` varchar(100) NOT NULL,
  `uphone` varchar(100) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`uid`,`uname`,`uemail`,`uaddress`,`uphone`) values (3,'Thomas','th@gmail.com','Kollam','7984612312'),(4,'Ram','ram@gmail.com','Kochi','7441529863');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
