/*
SQLyog Enterprise - MySQL GUI v6.13
MySQL - 5.5.5-10.1.38-MariaDB : Database - knusbows_gmt
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

create database if not exists `knusbows_gmt`;

USE `knusbows_gmt`;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

/*Table structure for table `account_items` */

DROP TABLE IF EXISTS `account_items`;

CREATE TABLE `account_items` (
  `id` int(255) unsigned NOT NULL AUTO_INCREMENT,
  `u_id` int(255) NOT NULL,
  `account_type` varchar(64) DEFAULT NULL,
  `acc_name` varchar(64) DEFAULT NULL,
  `date_reg` date DEFAULT NULL,
  `created_by` varchar(64) DEFAULT NULL,
  `deleted` varchar(4) DEFAULT 'NO',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `account_items` */

insert  into `account_items`(`id`,`u_id`,`account_type`,`acc_name`,`date_reg`,`created_by`,`deleted`) values (1,3,'Income','Cash Received','2019-12-21','osei@gmail.com','NO'),(2,3,'Expense','Labour','2019-12-21','osei@gmail.com','NO');

/*Table structure for table `assoc_houses` */

DROP TABLE IF EXISTS `assoc_houses`;

CREATE TABLE `assoc_houses` (
  `id` int(255) unsigned NOT NULL AUTO_INCREMENT,
  `u_id` int(255) NOT NULL,
  `house_name` varchar(128) DEFAULT NULL,
  `date_reg` date DEFAULT NULL,
  `created_by` varchar(128) DEFAULT NULL,
  `deleted` varchar(8) DEFAULT 'NO',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `assoc_houses` */

insert  into `assoc_houses`(`id`,`u_id`,`house_name`,`date_reg`,`created_by`,`deleted`) values (1,3,'House A','2019-12-21','mike@gmail.com','NO');

/*Table structure for table `bank_deposits` */

DROP TABLE IF EXISTS `bank_deposits`;

CREATE TABLE `bank_deposits` (
  `id` int(255) unsigned NOT NULL AUTO_INCREMENT,
  `u_id` int(255) NOT NULL,
  `bank_name` varchar(128) NOT NULL,
  `amount_deposited` varchar(128) NOT NULL,
  `depositor` varchar(128) DEFAULT NULL,
  `date_time` date DEFAULT NULL,
  `month_deposit` varchar(64) DEFAULT NULL,
  `year_deposit` year(4) DEFAULT NULL,
  `created_by` varchar(128) DEFAULT NULL,
  `deleted` varchar(4) DEFAULT 'NO',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `bank_deposits` */

/*Table structure for table `bank_details` */

DROP TABLE IF EXISTS `bank_details`;

CREATE TABLE `bank_details` (
  `id` int(128) unsigned NOT NULL AUTO_INCREMENT,
  `u_id` int(128) NOT NULL,
  `bank_name` varchar(128) NOT NULL,
  `acc_number` varchar(128) NOT NULL,
  `branch` varchar(128) NOT NULL,
  `date_registered` date DEFAULT NULL,
  `created_by` varchar(128) NOT NULL,
  `deleted` varchar(4) DEFAULT 'NO',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `bank_details` */

/*Table structure for table `bank_withdrawals` */

DROP TABLE IF EXISTS `bank_withdrawals`;

CREATE TABLE `bank_withdrawals` (
  `id` int(255) unsigned NOT NULL AUTO_INCREMENT,
  `u_id` int(255) NOT NULL,
  `bank_name` varchar(128) NOT NULL,
  `amount_withdrawn` varchar(128) NOT NULL,
  `withdrawn_by` varchar(128) DEFAULT NULL,
  `date_time` date DEFAULT NULL,
  `month_withdrawn` varchar(64) DEFAULT NULL,
  `year_withdrawn` year(4) DEFAULT NULL,
  `reason` text,
  `created_by` varchar(128) DEFAULT NULL,
  `deleted` varchar(4) DEFAULT 'NO',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `bank_withdrawals` */

/*Table structure for table `bill_item` */

DROP TABLE IF EXISTS `bill_item`;

CREATE TABLE `bill_item` (
  `id` int(255) unsigned NOT NULL AUTO_INCREMENT,
  `u_id` int(11) NOT NULL,
  `bill_name` varchar(128) NOT NULL,
  `created_by` varchar(128) DEFAULT NULL,
  `date_registered` date DEFAULT NULL,
  `deleted` varchar(4) DEFAULT 'NO',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `bill_item` */

insert  into `bill_item`(`id`,`u_id`,`bill_name`,`created_by`,`date_registered`,`deleted`) values (1,3,'Holy-Mary-Dues','osei@gmail.com','2019-12-21','NO'),(2,3,'Bill-For-Mholy-Mary','osei@gmail.com','2019-12-21','NO');

/*Table structure for table `church_expenditure` */

DROP TABLE IF EXISTS `church_expenditure`;

CREATE TABLE `church_expenditure` (
  `id` int(225) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(225) DEFAULT NULL,
  `amount` varchar(225) DEFAULT NULL,
  `date_recorded` date DEFAULT NULL,
  `deleted` varchar(5) DEFAULT 'NO',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `church_expenditure` */

/*Table structure for table `church_income` */

DROP TABLE IF EXISTS `church_income`;

CREATE TABLE `church_income` (
  `id` int(225) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(225) DEFAULT NULL,
  `amount` varchar(225) DEFAULT NULL,
  `date_recorded` date DEFAULT NULL,
  `deleted` varchar(3) DEFAULT 'NO',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `church_income` */

/*Table structure for table `events_calendar` */

DROP TABLE IF EXISTS `events_calendar`;

CREATE TABLE `events_calendar` (
  `event_id` int(255) unsigned NOT NULL AUTO_INCREMENT,
  `u_id` int(255) NOT NULL,
  `name_of_program` varchar(128) DEFAULT NULL,
  `slogan` varchar(128) DEFAULT NULL,
  `venue` varchar(255) DEFAULT NULL,
  `comments` text,
  `date_created` date DEFAULT NULL,
  `deleted` varchar(4) DEFAULT 'NO',
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `events_calendar` */

insert  into `events_calendar`(`event_id`,`u_id`,`name_of_program`,`slogan`,`venue`,`comments`,`date_created`,`deleted`) values (1,3,'KNIGHTS OF THE KING','LET MEET THE KING','HOUSE FATIH - ADENTA','','2019-12-02','NO');

/*Table structure for table `fee_payments` */

DROP TABLE IF EXISTS `fee_payments`;

CREATE TABLE `fee_payments` (
  `id` int(255) unsigned NOT NULL AUTO_INCREMENT,
  `member_id` varchar(255) NOT NULL,
  `u_id` varchar(255) NOT NULL,
  `amount` varchar(164) NOT NULL,
  `bill_item` varchar(128) DEFAULT NULL,
  `credit_balance` varchar(164) DEFAULT NULL,
  `receipt_no` varchar(255) NOT NULL,
  `account_type` varchar(120) DEFAULT NULL,
  `mode_of_payment` varchar(164) DEFAULT NULL,
  `mode_of_payment_number` varchar(164) DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `time_` datetime DEFAULT NULL,
  `paid_by` varchar(164) DEFAULT NULL,
  `received_by` varchar(164) DEFAULT NULL,
  `deleted` varchar(4) DEFAULT 'NO',
  PRIMARY KEY (`id`,`receipt_no`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `fee_payments` */

insert  into `fee_payments`(`id`,`member_id`,`u_id`,`amount`,`bill_item`,`credit_balance`,`receipt_no`,`account_type`,`mode_of_payment`,`mode_of_payment_number`,`payment_date`,`time_`,`paid_by`,`received_by`,`deleted`) values (1,'1','3','1.00','Pledge',NULL,'1007681IND',NULL,'CASH',NULL,'2019-12-22','2019-12-22 19:10:24',NULL,'osei@gmail.com','NO'),(2,'1','3','10.00','Pledge',NULL,'3837121IND',NULL,'CASH',NULL,'2019-12-22','2019-12-22 19:10:24',NULL,'osei@gmail.com','NO'),(3,'1','3','10.00','Pledge',NULL,'1763151IND',NULL,'CASH',NULL,'2019-12-22','2019-12-22 19:10:24',NULL,'osei@gmail.com','NO'),(4,'1','3','10.00','Pledge',NULL,'9725861IND',NULL,'CASH',NULL,'2019-12-22','2019-12-22 19:10:24',NULL,'osei@gmail.com','NO'),(5,'1','3','1.00','Pledge',NULL,'7797011IND',NULL,'CASH',NULL,'2019-12-22','2019-12-22 19:11:59','PATRICK OFOSU AGYEMANG','osei@gmail.com','NO'),(6,'1','3','10.00','Pledge',NULL,'9432801IND',NULL,'CASH',NULL,'2019-12-22','2019-12-22 19:11:59','PATRICK OFOSU AGYEMANG','osei@gmail.com','NO'),(7,'1','3','10.00','Pledge',NULL,'1382801IND',NULL,'CASH',NULL,'2019-12-22','2019-12-22 19:11:59','PATRICK OFOSU AGYEMANG','osei@gmail.com','NO'),(8,'1','3','10.00','Pledge',NULL,'6398141IND',NULL,'CASH',NULL,'2019-12-22','2019-12-22 19:11:59','PATRICK OFOSU AGYEMANG','osei@gmail.com','NO'),(9,'2','3','20.00','Holy-Mary-Dues',NULL,'12002019638274212',NULL,'CASH','','2019-12-22','2019-12-22 19:25:42','Emmanuel Agyei','osei@gmail.com','NO'),(10,'2','3','20.00','Pledge',NULL,'12002019638274212',NULL,'CASH','','2019-12-22','2019-12-22 19:25:43','Emmanuel Agyei','osei@gmail.com','NO'),(11,'2','3','20.00','Over Pay',NULL,'12002019638274212',NULL,'CASH','','2019-12-22','2019-12-22 19:25:43','Emmanuel Agyei','osei@gmail.com','NO'),(12,'2','3','20.00','Payment',NULL,'12002019638274212',NULL,'CASH','','2019-12-22','2019-12-22 19:25:43','Emmanuel Agyei','osei@gmail.com','NO'),(13,'2','3','20.00','Holy-Mary-Dues',NULL,'12002019187236212',NULL,'CASH','','2019-12-22','2019-12-22 19:35:30','Emmanuel Agyei','osei@gmail.com','NO');

/*Table structure for table `income_exp` */

DROP TABLE IF EXISTS `income_exp`;

CREATE TABLE `income_exp` (
  `id` int(255) unsigned NOT NULL AUTO_INCREMENT,
  `u_id` int(255) NOT NULL,
  `acc_name` varchar(128) DEFAULT NULL,
  `acc_type` varchar(128) DEFAULT NULL,
  `acc_amt` varchar(128) DEFAULT NULL,
  `datetime_added` datetime DEFAULT NULL,
  `date_reg` date DEFAULT NULL,
  `created_by` varchar(128) DEFAULT NULL,
  `month_created` varchar(64) DEFAULT NULL,
  `year_created` year(4) DEFAULT NULL,
  `deleted` varchar(4) DEFAULT 'NO',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `income_exp` */

insert  into `income_exp`(`id`,`u_id`,`acc_name`,`acc_type`,`acc_amt`,`datetime_added`,`date_reg`,`created_by`,`month_created`,`year_created`,`deleted`) values (1,3,'Cash Received','Income','500',NULL,'2019-12-11','osei@gmail.com','Dec',2019,'NO'),(2,3,'Labour','Expense','100',NULL,'2019-12-02','osei@gmail.com','Dec',2019,'NO'),(3,3,'Labour','Expense','666',NULL,'2019-12-13','osei@gmail.com','Dec',2019,'NO');

/*Table structure for table `member_appraisal` */

DROP TABLE IF EXISTS `member_appraisal`;

CREATE TABLE `member_appraisal` (
  `id` int(255) unsigned NOT NULL AUTO_INCREMENT,
  `u_id` int(255) NOT NULL,
  `member_id` int(255) NOT NULL,
  `appraisal` text NOT NULL,
  `date_recorded` date DEFAULT NULL,
  `created_by` varchar(128) DEFAULT NULL,
  `deleted` varchar(4) DEFAULT 'NO',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `member_appraisal` */

insert  into `member_appraisal`(`id`,`u_id`,`member_id`,`appraisal`,`date_recorded`,`created_by`,`deleted`) values (1,3,1,'jhbjh                                    ','2019-12-21','mike@gmail.com','NO');

/*Table structure for table `member_bill` */

DROP TABLE IF EXISTS `member_bill`;

CREATE TABLE `member_bill` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `u_id` int(255) NOT NULL,
  `url_string` varchar(64) DEFAULT NULL,
  `bill_type` varchar(128) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `bill_item` varchar(128) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `house_name` varchar(128) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `amount_involved` varchar(128) DEFAULT NULL,
  `date_recorded` date DEFAULT NULL,
  `entered_by` varchar(128) DEFAULT NULL,
  `deleted` varchar(3) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT 'NO',
  `updated` varchar(3) DEFAULT 'NO',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `member_bill` */

insert  into `member_bill`(`id`,`u_id`,`url_string`,`bill_type`,`bill_item`,`house_name`,`amount_involved`,`date_recorded`,`entered_by`,`deleted`,`updated`) values (2,3,NULL,NULL,'Holy-Mary-Dues','ALL-MEMBERS','600','2019-12-21','osei@gmail.com','NO','NO'),(3,3,NULL,NULL,'Bill-For-Mholy-Mary','ALL-MEMBERS','100','2019-12-21','osei@gmail.com','NO','NO');

/*Table structure for table `member_bill_acc` */

DROP TABLE IF EXISTS `member_bill_acc`;

CREATE TABLE `member_bill_acc` (
  `member_bill_id` int(11) NOT NULL DEFAULT '0',
  `url_string` varchar(70) DEFAULT NULL,
  `bill_type` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `bill_item` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `group_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `amount_involved` double DEFAULT NULL,
  `date_recorded` date DEFAULT NULL,
  `entered_by` varchar(255) DEFAULT 'ACCOUNTANT',
  `deleted` varchar(3) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT 'NO',
  `updated` varchar(3) DEFAULT 'NO'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `member_bill_acc` */

/*Table structure for table `member_ledger` */

DROP TABLE IF EXISTS `member_ledger`;

CREATE TABLE `member_ledger` (
  `ledger_id` int(255) unsigned NOT NULL AUTO_INCREMENT,
  `u_id` int(255) NOT NULL,
  `bill_id` int(128) DEFAULT NULL,
  `bill_item` varchar(128) DEFAULT NULL,
  `member_id` varchar(255) NOT NULL,
  `date_recorded` date DEFAULT NULL,
  `date_of_billing` datetime DEFAULT NULL,
  `fee_amount` double DEFAULT NULL,
  `house_name` varchar(128) DEFAULT NULL,
  `category` varchar(64) DEFAULT 'GENERAL',
  `deleted` varchar(3) DEFAULT 'NO',
  PRIMARY KEY (`ledger_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

/*Data for the table `member_ledger` */

insert  into `member_ledger`(`ledger_id`,`u_id`,`bill_id`,`bill_item`,`member_id`,`date_recorded`,`date_of_billing`,`fee_amount`,`house_name`,`category`,`deleted`) values (1,3,NULL,'Pledge','1','2019-12-22','2019-12-22 19:05:16',1,NULL,'INDIVIDUAL','NO'),(2,3,NULL,'Pledge','1','2019-12-22','2019-12-22 19:05:16',1,NULL,'INDIVIDUAL','NO'),(3,3,NULL,'Pledge','1','2019-12-22','2019-12-22 19:05:16',1,NULL,'INDIVIDUAL','NO'),(4,3,NULL,'Pledge','1','2019-12-22','2019-12-22 19:05:53',1,NULL,'INDIVIDUAL','NO'),(5,3,NULL,'Pledge','1','2019-12-22','2019-12-22 19:05:53',1,NULL,'INDIVIDUAL','NO'),(6,3,NULL,'Pledge','1','2019-12-22','2019-12-22 19:05:53',1,NULL,'INDIVIDUAL','NO'),(7,3,NULL,'Pledge','1','2019-12-22','2019-12-22 19:05:53',1,NULL,'INDIVIDUAL','NO'),(8,3,NULL,'Pledge','1','2019-12-22','2019-12-22 19:05:53',1,NULL,'INDIVIDUAL','NO'),(9,3,NULL,'Pledge','1','2019-12-22','2019-12-22 19:05:53',10,NULL,'INDIVIDUAL','NO'),(10,3,NULL,'Over Pay','1','2019-12-22','2019-12-22 19:06:27',1,NULL,'INDIVIDUAL','NO'),(11,3,NULL,'Payment','1','2019-12-22','2019-12-22 19:06:27',10,NULL,'INDIVIDUAL','NO'),(12,3,NULL,'Pledge','1','2019-12-22','2019-12-22 19:08:04',1,NULL,'INDIVIDUAL','NO'),(13,3,NULL,'Pledge','1','2019-12-22','2019-12-22 19:08:04',1,NULL,'INDIVIDUAL','NO'),(14,3,NULL,'Pledge','1','2019-12-22','2019-12-22 19:08:05',1,NULL,'INDIVIDUAL','NO'),(15,3,NULL,'Pledge','1','2019-12-22','2019-12-22 19:08:05',1,NULL,'INDIVIDUAL','NO'),(16,3,NULL,'Pledge','1','2019-12-22','2019-12-22 19:08:47',1,NULL,'INDIVIDUAL','NO'),(17,3,NULL,'Pledge','1','2019-12-22','2019-12-22 19:08:49',1,NULL,'INDIVIDUAL','NO'),(18,3,NULL,'Pledge','1','2019-12-22','2019-12-22 19:08:49',1,NULL,'INDIVIDUAL','NO'),(19,3,NULL,'Pledge','1','2019-12-22','2019-12-22 19:08:49',1,NULL,'INDIVIDUAL','NO'),(20,3,NULL,'Pledge','1','2019-12-22','2019-12-22 19:09:20',1,NULL,'INDIVIDUAL','NO'),(21,3,NULL,'Pledge','1','2019-12-22','2019-12-22 19:09:20',1,NULL,'INDIVIDUAL','NO'),(22,3,NULL,'Pledge','1','2019-12-22','2019-12-22 19:09:20',1,NULL,'INDIVIDUAL','NO'),(23,3,NULL,'Holy-Mary-Dues','1','2019-12-22','2019-12-22 19:12:31',600,'ALL-MEMBERS','GENERAL','NO'),(24,3,NULL,'Holy-Mary-Dues','2','2019-12-22','2019-12-22 19:12:31',600,'ALL-MEMBERS','GENERAL','NO'),(25,3,NULL,'Pledge','1','2019-12-22','2019-12-22 19:42:55',1,NULL,'INDIVIDUAL','NO'),(26,3,NULL,'Over Pay','1','2019-12-22','2019-12-22 19:42:55',1,NULL,'INDIVIDUAL','NO'),(27,3,NULL,'Pledge','1','2019-12-22','2019-12-22 19:42:55',1,NULL,'INDIVIDUAL','NO'),(28,3,NULL,'Pledge','1','2019-12-22','2019-12-22 19:42:55',10,NULL,'INDIVIDUAL','NO'),(29,3,NULL,'Over Pay','1','2019-12-22','2019-12-22 19:42:55',10,NULL,'INDIVIDUAL','NO');

/*Table structure for table `member_ledger_acc_type` */

DROP TABLE IF EXISTS `member_ledger_acc_type`;

CREATE TABLE `member_ledger_acc_type` (
  `ledger_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `member_id` varchar(20) DEFAULT NULL,
  `date_recorded` date DEFAULT NULL,
  `date_of_billing` datetime DEFAULT NULL,
  `bill_amount` double DEFAULT NULL,
  `bill_acc_category` varchar(22) DEFAULT NULL,
  `bill_type` varchar(22) DEFAULT NULL,
  `chr_grp` varchar(45) DEFAULT NULL,
  `deleted` varchar(3) DEFAULT 'NO',
  PRIMARY KEY (`ledger_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `member_ledger_acc_type` */

/*Table structure for table `members` */

DROP TABLE IF EXISTS `members`;

CREATE TABLE `members` (
  `member_id` int(255) unsigned NOT NULL AUTO_INCREMENT,
  `u_id` int(255) NOT NULL,
  `last_name` varchar(64) DEFAULT NULL,
  `first_name` varchar(64) DEFAULT NULL,
  `other_name` varchar(64) DEFAULT NULL,
  `tittles` varchar(32) DEFAULT NULL,
  `dob` varchar(64) DEFAULT NULL,
  `birth_day` varchar(64) DEFAULT NULL,
  `place_of_birth` varchar(8) DEFAULT NULL,
  `region_of_birth` varchar(64) DEFAULT NULL,
  `country_of_birth` varchar(64) DEFAULT NULL,
  `profession` varchar(64) DEFAULT NULL,
  `email_id` varchar(64) DEFAULT NULL,
  `phone_number` varchar(64) DEFAULT NULL,
  `secondary_number` varchar(64) DEFAULT NULL,
  `sms_format_1` varchar(64) DEFAULT NULL,
  `street_name_house_address` varchar(64) DEFAULT NULL,
  `city_house_address` varchar(64) DEFAULT NULL,
  `region_of_house_address` varchar(64) DEFAULT NULL,
  `long_lived_house` varchar(64) DEFAULT NULL,
  `house_less_than_3` varchar(64) DEFAULT NULL,
  `postal_address` varchar(64) DEFAULT NULL,
  `city_postal_address` varchar(64) DEFAULT NULL,
  `region_postal_address` varchar(64) DEFAULT NULL,
  `married` varchar(64) DEFAULT NULL,
  `married_type` varchar(64) DEFAULT NULL,
  `welfare_pin` varchar(64) DEFAULT NULL,
  `date_of_initiation` date DEFAULT NULL,
  `court_initiation` varchar(64) DEFAULT NULL,
  `house_name` varchar(64) DEFAULT NULL,
  `ranks` varchar(64) DEFAULT NULL,
  `lde_status` varchar(64) DEFAULT NULL,
  `prospers_names` text,
  `name_of_parish` varchar(64) DEFAULT NULL,
  `place_of_baptism` varchar(64) DEFAULT NULL,
  `fathers_name` varchar(64) DEFAULT NULL,
  `fathers_contact` varchar(64) DEFAULT NULL,
  `fathers_address` varchar(64) DEFAULT NULL,
  `fathers_city_address` varchar(64) DEFAULT NULL,
  `fathers_region` varchar(64) DEFAULT NULL,
  `mothers_name` varchar(64) DEFAULT NULL,
  `mothers_address` varchar(64) DEFAULT NULL,
  `mothers_contact` varchar(64) DEFAULT NULL,
  `mothers_city_address` varchar(64) DEFAULT NULL,
  `mothers_region` varchar(64) DEFAULT NULL,
  `name_of_spouse` varchar(64) DEFAULT NULL,
  `spouse_number` varchar(64) DEFAULT NULL,
  `spouse_address` varchar(64) DEFAULT NULL,
  `spouse_city_address` varchar(64) DEFAULT NULL,
  `spouse_region` varchar(64) DEFAULT NULL,
  `number_of_children` varchar(64) DEFAULT NULL,
  `names_of_children` text,
  `picture_url` varchar(128) DEFAULT NULL,
  `date_of_registration` date DEFAULT NULL,
  `created_by` varchar(64) DEFAULT NULL,
  `deleted` varchar(8) DEFAULT 'NO',
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `members` */

insert  into `members`(`member_id`,`u_id`,`last_name`,`first_name`,`other_name`,`tittles`,`dob`,`birth_day`,`place_of_birth`,`region_of_birth`,`country_of_birth`,`profession`,`email_id`,`phone_number`,`secondary_number`,`sms_format_1`,`street_name_house_address`,`city_house_address`,`region_of_house_address`,`long_lived_house`,`house_less_than_3`,`postal_address`,`city_postal_address`,`region_postal_address`,`married`,`married_type`,`welfare_pin`,`date_of_initiation`,`court_initiation`,`house_name`,`ranks`,`lde_status`,`prospers_names`,`name_of_parish`,`place_of_baptism`,`fathers_name`,`fathers_contact`,`fathers_address`,`fathers_city_address`,`fathers_region`,`mothers_name`,`mothers_address`,`mothers_contact`,`mothers_city_address`,`mothers_region`,`name_of_spouse`,`spouse_number`,`spouse_address`,`spouse_city_address`,`spouse_region`,`number_of_children`,`names_of_children`,`picture_url`,`date_of_registration`,`created_by`,`deleted`) values (1,3,'OFOSU AGYEMANG','PATRICK','OTU','Rev. Fr.','2019-12-03','03','Kumasi','Ashanti Region','233','Computer Scientist','pathills2018@gmail.com','0267642898','0267642898','233267642898','NO 19 BANANA AVENUE','ACCRA','ACCRA','33','666','NO 19 BANANA AVENUE','ACCRA','Eastern Region','NO',NULL,'443333','2019-12-03','Cult','House A','Sir Kt. Bro.','YES','                                                kl    \r\n                                                \r\n                                                ','Otu Mens','fwefwe','nrntr','23232323','geregerg','geregerg','113232323','frverere','rgregegreg','323232323','sfsfsf','sdsdsd','ehrehrehe','32323233','egregrge g ege','rerer rg er','rererer','3',NULL,NULL,'2019-12-21','mike@gmail.com','NO'),(2,3,'OFOSU AGYEMANG','PATRICK','OTU','Rev. Fr.','2019-12-03','03','Kumasi','Ashanti Region','233','Computer Scientist','pathills2018@gmail.com','0267642898','0267642898','233267642898','NO 19 BANANA AVENUE','ACCRA','ACCRA','33','666','NO 19 BANANA AVENUE','ACCRA','Eastern Region','NO',NULL,'443333','2019-12-03','Cult','House A','Sir Kt. Bro.','YES','                                                                                                kl    \r\n                                                \r\n                                                    \r\n                                                \r\n                                                ','Otu Mens','fwefwe','nrntr','23232323','geregerg','geregerg','113232323','frverere','rgregegreg','323232323','sfsfsf','sdsdsd','ehrehrehe','32323233','egregrge g ege','rerer rg er','rererer',NULL,NULL,NULL,'2019-12-21','mike@gmail.com','NO'),(3,3,'OFOSU AGYEMANG','PATRICK','OTU','Rev. Fr.','2019-12-03','03','Kumasi','Ashanti Region','233','Computer Scientist','pathills2018@gmail.com','0267642898','0267642898','233267642898','NO 19 BANANA AVENUE','ACCRA','ACCRA','33','666','NO 19 BANANA AVENUE','ACCRA','Eastern Region','NO',NULL,'443333','2019-12-03','Cult','House A','Sir Kt. Bro.','YES','                                                kl    \r\n                                                \r\n                                                ','Otu Mens','fwefwe','nrntr','23232323','geregerg','geregerg','113232323','frverere','rgregegreg','323232323','sfsfsf','sdsdsd','ehrehrehe','32323233','egregrge g ege','rerer rg er','rererer',NULL,NULL,NULL,'2019-12-21','mike@gmail.com','YES');

/*Table structure for table `members_children` */

DROP TABLE IF EXISTS `members_children`;

CREATE TABLE `members_children` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `u_id` int(11) DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL,
  `fullname` varchar(64) DEFAULT NULL,
  `sex` varchar(32) DEFAULT NULL,
  `deleted` varchar(8) DEFAULT 'NO',
  `date_created` date DEFAULT NULL,
  `date_time_created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `members_children` */

insert  into `members_children`(`id`,`u_id`,`member_id`,`fullname`,`sex`,`deleted`,`date_created`,`date_time_created`) values (1,3,1,'Moses','Male','NO','2019-12-20',NULL),(2,3,1,'Moses','Male','NO','2019-12-21',NULL),(3,3,1,'efewfe','Female','NO','2019-12-21',NULL),(4,3,1,'Moses 343','Female','NO','2019-12-21',NULL),(5,3,1,'Moses','Male','NO','2019-12-21',NULL),(6,3,1,'efewfe','Female','NO','2019-12-21',NULL);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `id` int(255) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `token` text,
  `date_created` date DEFAULT NULL,
  `token_expiry` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `password_resets` */

/*Table structure for table `roll_call` */

DROP TABLE IF EXISTS `roll_call`;

CREATE TABLE `roll_call` (
  `roll_call_id` int(255) unsigned NOT NULL AUTO_INCREMENT,
  `u_id` int(255) NOT NULL,
  `member_id` int(255) NOT NULL,
  `name_of_program` varchar(128) DEFAULT NULL,
  `show_up` varchar(16) DEFAULT NULL,
  `comments` text,
  `created_by` varchar(64) DEFAULT NULL,
  `date_created` date DEFAULT NULL,
  `deleted` varchar(4) DEFAULT 'NO',
  PRIMARY KEY (`roll_call_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `roll_call` */

insert  into `roll_call`(`roll_call_id`,`u_id`,`member_id`,`name_of_program`,`show_up`,`comments`,`created_by`,`date_created`,`deleted`) values (1,3,1,'KNIGHTS OF THE KING','Present','hhh','mike@gmail.com','2019-12-21','NO'),(2,3,2,'KNIGHTS OF THE KING','Distance','hhh','mike@gmail.com','2019-12-21','NO');

/*Table structure for table `sms_tracking` */

DROP TABLE IF EXISTS `sms_tracking`;

CREATE TABLE `sms_tracking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sms_message` tinytext,
  `delivery_type` varchar(255) DEFAULT NULL,
  `sms_status` varchar(255) DEFAULT NULL,
  `datetime_sms` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `sms_tracking` */

/*Table structure for table `task_timeliness` */

DROP TABLE IF EXISTS `task_timeliness`;

CREATE TABLE `task_timeliness` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `u_id` int(255) NOT NULL,
  `task` varchar(64) NOT NULL,
  `summary` longtext NOT NULL,
  `date_of_task` date NOT NULL,
  `datetime_of_task` datetime NOT NULL,
  `created_by` varchar(64) NOT NULL,
  `deleted` varchar(8) DEFAULT 'NO',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

/*Data for the table `task_timeliness` */

insert  into `task_timeliness`(`id`,`u_id`,`task`,`summary`,`date_of_task`,`datetime_of_task`,`created_by`,`deleted`) values (1,3,'Logged In','Login Activity Recorded From Device And IP','2019-12-21','2019-12-21 08:31:05','mike@gmail.com','NO'),(2,3,'Houses Registration','House Registration Activity Recorded From Device And IP','2019-12-21','2019-12-21 08:33:10','mike@gmail.com','NO'),(3,3,'Member Registration','Member Registration Activity Recorded From Device And IP','2019-12-21','2019-12-21 08:34:46','mike@gmail.com','NO'),(4,3,'Organizational Edit Details','Organizational Edit Details Device And IP','2019-12-21','2019-12-21 08:36:24','mike@gmail.com','NO'),(5,3,'Member Appraisal Registration','Member Appraisal Registration Activity Recorded From Device And IP','2019-12-21','2019-12-21 08:36:46','mike@gmail.com','NO'),(6,3,'Member Registration','Member Registration Activity Recorded From Device And IP','2019-12-21','2019-12-21 12:04:05','mike@gmail.com','NO'),(7,3,'Member Registration','Member Registration Activity Recorded From Device And IP','2019-12-21','2019-12-21 12:05:33','mike@gmail.com','NO'),(8,3,'Members Edit','Members Edit Activity Recorded From Device And IP','2019-12-21','2019-12-21 12:43:22','mike@gmail.com','NO'),(9,3,'Members Edit','Members Edit Activity Recorded From Device And IP','2019-12-21','2019-12-21 12:45:23','mike@gmail.com','NO'),(10,3,'Members Edit','Members Edit Activity Recorded From Device And IP','2019-12-21','2019-12-21 13:00:49','mike@gmail.com','NO'),(11,3,'Members Edit','Members Edit Activity Recorded From Device And IP','2019-12-21','2019-12-21 13:08:29','mike@gmail.com','NO'),(12,3,'Members Delete','Members Delete Activity Recorded From Device And IP','2019-12-21','2019-12-21 13:08:42','mike@gmail.com','NO'),(13,3,'Members Edit','Members Edit Activity Recorded From Device And IP','2019-12-21','2019-12-21 13:09:05','mike@gmail.com','NO'),(14,3,'Logged In','Login Activity Recorded From Device And IP','2019-12-21','2019-12-21 21:50:57','mike@gmail.com','NO'),(15,3,'Logged In','Login Activity Recorded From Device And IP','2019-12-21','2019-12-21 21:53:13','osei@gmail.com','NO'),(16,3,'Bill Item Registration','Bill Item Registration Activity Recorded From Device And IP','2019-12-21','2019-12-21 21:53:43','osei@gmail.com','NO'),(17,3,'Bill Item Registration','Bill Item Registration Activity Recorded From Device And IP','2019-12-21','2019-12-21 21:53:51','osei@gmail.com','NO'),(18,3,'Bill Item Edit','Bill Item Edit Activity Recorded From Device And IP','2019-12-21','2019-12-21 22:06:05','osei@gmail.com','NO'),(19,3,'Bill Item Edit','Bill Item Edit Activity Recorded From Device And IP','2019-12-21','2019-12-21 22:09:22','osei@gmail.com','NO'),(20,3,'Bill Preparation Registration','Bill Preparation Registration Activity Recorded From Device And IP','2019-12-21','2019-12-21 22:09:42','osei@gmail.com','NO'),(21,3,'Bill Preparation Registration','Bill Preparation Registration Activity Recorded From Device And IP','2019-12-21','2019-12-21 22:09:59','osei@gmail.com','NO'),(22,3,'Member Payment Registration','Member Payment Registration Activity Recorded From Device And IP','2019-12-21','2019-12-21 22:12:21','osei@gmail.com','NO'),(23,3,'Income Expenditure Registration','Bill Item Registration Activity Recorded From Device And IP','2019-12-21','2019-12-21 22:22:26','osei@gmail.com','NO'),(24,3,'Income Expenditure Registration','Bill Item Registration Activity Recorded From Device And IP','2019-12-21','2019-12-21 22:22:44','osei@gmail.com','NO'),(25,3,'Income Expenditure Registration','Income & Expense Amount Registration Activity Recorded From Device And IP','2019-12-21','2019-12-21 22:22:55','osei@gmail.com','NO'),(26,3,'Income Expenditure Registration','Income & Expense Amount Registration Activity Recorded From Device And IP','2019-12-21','2019-12-21 22:23:04','osei@gmail.com','NO'),(27,3,'Income Expenditure Registration','Income & Expense Amount Registration Activity Recorded From Device And IP','2019-12-21','2019-12-21 22:23:16','osei@gmail.com','NO'),(28,3,'Income & Expense Amount Item Edit','Income & Expense Amount Activity Recorded From Device And IP','2019-12-21','2019-12-21 22:23:43','osei@gmail.com','NO'),(29,3,'Logged In','Login Activity Recorded From Device And IP','2019-12-21','2019-12-21 22:57:28','mike@gmail.com','NO'),(30,3,'Organizational Edit Details','Organizational Edit Details Device And IP','2019-12-21','2019-12-21 22:57:54','mike@gmail.com','NO'),(31,3,'Logged In','Login Activity Recorded From Device And IP','2019-12-22','2019-12-22 01:56:04','mike@gmail.com','NO'),(32,3,'Logged In','Login Activity Recorded From Device And IP','2019-12-22','2019-12-22 02:08:07','mike@gmail.com','NO'),(33,3,'Logged In','Login Activity Recorded From Device And IP','2019-12-23','2019-12-23 03:50:46','mike@gmail.com','NO'),(34,3,'Logged In','Login Activity Recorded From Device And IP','2019-12-23','2019-12-23 03:51:44','osei@gmail.com','NO'),(35,3,'Member Payment Registration','Member Payment Registration Activity Recorded From Device And IP','2019-12-23','2019-12-23 08:25:42','osei@gmail.com','NO'),(36,3,'Member Payment Registration','Member Payment Registration Activity Recorded From Device And IP','2019-12-23','2019-12-23 08:25:42','osei@gmail.com','NO'),(37,3,'Member Payment Registration','Member Payment Registration Activity Recorded From Device And IP','2019-12-23','2019-12-23 08:25:42','osei@gmail.com','NO'),(38,3,'Member Payment Registration','Member Payment Registration Activity Recorded From Device And IP','2019-12-23','2019-12-23 08:25:42','osei@gmail.com','NO'),(39,3,'Member Payment Registration','Member Payment Registration Activity Recorded From Device And IP','2019-12-23','2019-12-23 08:35:30','osei@gmail.com','NO');

/*Table structure for table `tbl_organization` */

DROP TABLE IF EXISTS `tbl_organization`;

CREATE TABLE `tbl_organization` (
  `org_id` int(255) NOT NULL AUTO_INCREMENT,
  `org_name` varchar(128) DEFAULT NULL,
  `cult_council` varchar(128) DEFAULT NULL,
  `location` varchar(128) DEFAULT NULL,
  `contact_1` varchar(128) DEFAULT NULL,
  `contact_2` varchar(128) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `website` varchar(64) DEFAULT NULL,
  `sector` varchar(128) DEFAULT NULL,
  `member_population` varchar(128) DEFAULT NULL,
  `mission` varchar(128) DEFAULT NULL,
  `vision` varchar(128) DEFAULT NULL,
  `slogan` varchar(128) DEFAULT NULL,
  `upload_logo_url` varchar(64) DEFAULT NULL,
  `date_reg` date DEFAULT NULL,
  `deleted` varchar(16) DEFAULT 'NO',
  `u_id` int(11) NOT NULL,
  PRIMARY KEY (`org_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `tbl_organization` */

insert  into `tbl_organization`(`org_id`,`org_name`,`cult_council`,`location`,`contact_1`,`contact_2`,`email`,`website`,`sector`,`member_population`,`mission`,`vision`,`slogan`,`upload_logo_url`,`date_reg`,`deleted`,`u_id`) values (1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-12-21','NO',1),(2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-12-21','NO',2),(3,'   Knight Marshalls ',' NO 19 BANANA AVENUE ',NULL,'   06789999999 ','   0209988765 ','   theknight@gmail.com ','   www.knights.com ',NULL,NULL,NULL,NULL,'   The knight marhsalls live by grace ','0050705.png','2019-12-21','NO',3);

/*Table structure for table `tbl_sub_user` */

DROP TABLE IF EXISTS `tbl_sub_user`;

CREATE TABLE `tbl_sub_user` (
  `sub_id` int(255) NOT NULL AUTO_INCREMENT,
  `u_id` int(255) NOT NULL,
  `full_name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `pass` varchar(128) NOT NULL,
  `contact` varchar(128) NOT NULL,
  `country` varchar(128) DEFAULT NULL,
  `date_reg` date NOT NULL,
  `user_type` varchar(16) NOT NULL,
  `created_by` varchar(128) NOT NULL,
  `change_pass_1st_time` varchar(16) DEFAULT 'YES',
  `deleted` varchar(16) DEFAULT 'NO',
  PRIMARY KEY (`sub_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_sub_user` */

insert  into `tbl_sub_user`(`sub_id`,`u_id`,`full_name`,`email`,`pass`,`contact`,`country`,`date_reg`,`user_type`,`created_by`,`change_pass_1st_time`,`deleted`) values (1,3,'Pathills','mike@gmail.com','$2y$10$ODE5OTI0NGZhMWZiODNmMuPuiQGq3/cbJCFjDid9rHxF/Yn9pXMF2','1111111111',NULL,'2019-12-21','Secretary','desmond@complete.com','YES','NO'),(2,3,'Osei Hills','osei@gmail.com','$2y$10$ZTc0YjFkMGExM2JkNjM4Me84sfsWktHrPx1d.5l9pb9WaZlss024.','1111111111',NULL,'2019-12-21','Accountant','desmond@complete.com','YES','NO');

/*Table structure for table `tbl_user` */

DROP TABLE IF EXISTS `tbl_user`;

CREATE TABLE `tbl_user` (
  `u_id` int(255) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `pass` varchar(128) NOT NULL,
  `contact` varchar(128) NOT NULL,
  `country` varchar(128) NOT NULL,
  `date_reg` date NOT NULL,
  `user_type` varchar(16) NOT NULL,
  `deleted` varchar(16) DEFAULT 'NO',
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_user` */

insert  into `tbl_user`(`u_id`,`full_name`,`email`,`pass`,`contact`,`country`,`date_reg`,`user_type`,`deleted`) values (1,'rg5g5','nativee@gmail.comww','$2y$10$MDY0ZTY3NTFkOTYzOTljYOU1Z/7IGHiqjKEzttWqBditGMkZBKtUa','1111111111','Ghana','2019-12-21','Administrator','NO'),(2,'jnknknkjn','nativee@gmail.comww','$2y$10$ODBjNTA3NDI3MTM1ZTU2ZelReea8ovcHxApZwqjQeQOeh/mmJOSFm','1111111111','Ghana','2019-12-21','Administrator','NO'),(3,'Desmond Kooney','desmond@complete.com','$2y$10$ZmZmMzk5NmE5YmNmMTgwM.yR6Avs4kaBMz7MMj.5X1TL/z.Ln..dy','1234567890','Ghana','2019-12-21','Administrator','NO');

/*Table structure for table `visitors` */

DROP TABLE IF EXISTS `visitors`;

CREATE TABLE `visitors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(23) DEFAULT NULL,
  `contact` varchar(23) DEFAULT NULL,
  `sms_contact` varchar(34) DEFAULT NULL,
  `previous_church` varchar(23) DEFAULT NULL,
  `residence` varchar(23) DEFAULT NULL,
  `reason` varchar(23) DEFAULT NULL,
  `date_of_visit` date DEFAULT NULL,
  `deleted` varchar(23) DEFAULT 'NO',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `visitors` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
