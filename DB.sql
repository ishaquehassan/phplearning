/*
SQLyog Ultimate v10.00 Beta1
MySQL - 5.5.5-10.1.9-MariaDB : Database - php_learning_sess8
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`php_learning_sess8` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `php_learning_sess8`;

/*Table structure for table `contact_lists` */

DROP TABLE IF EXISTS `contact_lists`;

CREATE TABLE `contact_lists` (
  `list_id` int(11) NOT NULL AUTO_INCREMENT,
  `list_name` varchar(250) NOT NULL,
  PRIMARY KEY (`list_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `contact_lists` */

insert  into `contact_lists`(`list_id`,`list_name`) values (1,'Friends');
insert  into `contact_lists`(`list_id`,`list_name`) values (2,'Family');
insert  into `contact_lists`(`list_id`,`list_name`) values (3,'Office');
insert  into `contact_lists`(`list_id`,`list_name`) values (4,'General');
insert  into `contact_lists`(`list_id`,`list_name`) values (5,'Others');
insert  into `contact_lists`(`list_id`,`list_name`) values (6,'Test');

/*Table structure for table `contacts` */

DROP TABLE IF EXISTS `contacts`;

CREATE TABLE `contacts` (
  `cnt_id` int(11) NOT NULL AUTO_INCREMENT,
  `cnt_name` varchar(250) DEFAULT 'Contact Default Name',
  `cnt_number` varchar(250) NOT NULL,
  PRIMARY KEY (`cnt_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

/*Data for the table `contacts` */

insert  into `contacts`(`cnt_id`,`cnt_name`,`cnt_number`) values (7,'Hello save','665 save');
insert  into `contacts`(`cnt_id`,`cnt_name`,`cnt_number`) values (8,'dfdf','dffd');
insert  into `contacts`(`cnt_id`,`cnt_name`,`cnt_number`) values (9,'dfdf','dffd5656');
insert  into `contacts`(`cnt_id`,`cnt_name`,`cnt_number`) values (12,'Hello save As','665 save As');
insert  into `contacts`(`cnt_id`,`cnt_name`,`cnt_number`) values (19,'Hello ','World');
insert  into `contacts`(`cnt_id`,`cnt_name`,`cnt_number`) values (20,'dfsdf','sdgfsdgs');
insert  into `contacts`(`cnt_id`,`cnt_name`,`cnt_number`) values (21,'ssfsdf','sdfgdgdf');
insert  into `contacts`(`cnt_id`,`cnt_name`,`cnt_number`) values (22,'Hello ','Test');
insert  into `contacts`(`cnt_id`,`cnt_name`,`cnt_number`) values (23,'Hello ','Test');

/*Table structure for table `contacts_list_assigned` */

DROP TABLE IF EXISTS `contacts_list_assigned`;

CREATE TABLE `contacts_list_assigned` (
  `clist_id` int(11) NOT NULL AUTO_INCREMENT,
  `cnt_id` int(11) NOT NULL,
  `list_id` int(11) NOT NULL,
  PRIMARY KEY (`clist_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `contacts_list_assigned` */

insert  into `contacts_list_assigned`(`clist_id`,`cnt_id`,`list_id`) values (1,19,1);
insert  into `contacts_list_assigned`(`clist_id`,`cnt_id`,`list_id`) values (2,19,2);
insert  into `contacts_list_assigned`(`clist_id`,`cnt_id`,`list_id`) values (3,19,3);
insert  into `contacts_list_assigned`(`clist_id`,`cnt_id`,`list_id`) values (4,19,4);
insert  into `contacts_list_assigned`(`clist_id`,`cnt_id`,`list_id`) values (5,20,1);
insert  into `contacts_list_assigned`(`clist_id`,`cnt_id`,`list_id`) values (6,20,2);
insert  into `contacts_list_assigned`(`clist_id`,`cnt_id`,`list_id`) values (7,20,3);
insert  into `contacts_list_assigned`(`clist_id`,`cnt_id`,`list_id`) values (8,20,4);
insert  into `contacts_list_assigned`(`clist_id`,`cnt_id`,`list_id`) values (9,21,1);
insert  into `contacts_list_assigned`(`clist_id`,`cnt_id`,`list_id`) values (10,21,3);

/*Table structure for table `contacts_simple` */

DROP TABLE IF EXISTS `contacts_simple`;

CREATE TABLE `contacts_simple` (
  `cnt_id` int(11) NOT NULL AUTO_INCREMENT,
  `cnt_name` varchar(250) DEFAULT 'Contact Default Name',
  `cnt_number` varchar(250) NOT NULL,
  `cnt_lists` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`cnt_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `contacts_simple` */

insert  into `contacts_simple`(`cnt_id`,`cnt_name`,`cnt_number`,`cnt_lists`) values (1,'Hello World','31656565','0,1,2');

/*Table structure for table `test` */

DROP TABLE IF EXISTS `test`;

CREATE TABLE `test` (
  `test_id` int(11) NOT NULL AUTO_INCREMENT,
  `test_name` varchar(250) NOT NULL,
  PRIMARY KEY (`test_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `test` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
