/*
SQLyog Enterprise - MySQL GUI v6.13
MySQL - 5.5.5-10.4.14-MariaDB : Database - fire_house
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

create database if not exists `taugscsf_vbcidunamis`;

USE `taugscsf_vbcidunamis`;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `account_items` */

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `assoc_houses` */

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
  `reason` text DEFAULT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `bill_item` */

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
  `membership_id` int(225) NOT NULL,
  `name_of_program` varchar(128) DEFAULT NULL,
  `slogan` varchar(128) DEFAULT NULL,
  `venue` varchar(255) DEFAULT NULL,
  `attendance` varchar(225) DEFAULT NULL,
  `taken_by` varchar(125) DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `date_recorded` date DEFAULT NULL,
  `date_created` date DEFAULT NULL,
  `deleted` varchar(4) DEFAULT 'NO',
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC;

/*Data for the table `events_calendar` */

/*Table structure for table `fee_payments` */

DROP TABLE IF EXISTS `fee_payments`;

CREATE TABLE `fee_payments` (
  `id` int(255) unsigned NOT NULL AUTO_INCREMENT,
  `member_id` varchar(255) NOT NULL,
  `membership_id` varchar(255) NOT NULL,
  `u_id` varchar(255) DEFAULT NULL,
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
  `user_id` varchar(164) DEFAULT NULL,
  `deleted` varchar(4) DEFAULT 'NO',
  PRIMARY KEY (`id`,`receipt_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `fee_payments` */

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `income_exp` */

/*Table structure for table `institution_details` */

DROP TABLE IF EXISTS `institution_details`;

CREATE TABLE `institution_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `church_number` varchar(20) DEFAULT NULL,
  `church_name` varchar(254) DEFAULT NULL,
  `sms_tag_name` varchar(11) DEFAULT NULL,
  `church_id_initials` varchar(11) DEFAULT NULL,
  `church_motor` varchar(254) DEFAULT NULL,
  `church_cycle` varchar(20) DEFAULT NULL,
  `telephone_1` varchar(25) DEFAULT NULL,
  `telephone_2` varchar(25) DEFAULT NULL,
  `telephone_3` varchar(25) DEFAULT NULL,
  `postal_address` varchar(255) DEFAULT NULL,
  `bank_1` varchar(255) DEFAULT NULL,
  `bank_1_branch` varchar(255) DEFAULT NULL,
  `bank_1_account_number` varchar(255) DEFAULT NULL,
  `bank_2` varchar(255) DEFAULT NULL,
  `bank_2_branch` varchar(255) DEFAULT NULL,
  `bank_2_account_number` varchar(255) DEFAULT NULL,
  `bank_3` varchar(255) DEFAULT NULL,
  `bank_3_branch` varchar(255) DEFAULT NULL,
  `bank_3_account_number` varchar(255) DEFAULT NULL,
  `date_of_installation` date DEFAULT NULL,
  `logo_url` varchar(124) DEFAULT NULL,
  `deleted` varchar(3) DEFAULT 'NO',
  `membership_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `institution_details` */

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `member_appraisal` */

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `member_bill` */

/*Table structure for table `member_bill_acc` */

DROP TABLE IF EXISTS `member_bill_acc`;

CREATE TABLE `member_bill_acc` (
  `member_bill_id` int(11) NOT NULL DEFAULT 0,
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `member_ledger` */

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
  `u_id` varchar(255) NOT NULL,
  `userid` varchar(255) DEFAULT NULL,
  `last_name` varchar(64) DEFAULT NULL,
  `first_name` varchar(64) DEFAULT NULL,
  `other_name` varchar(64) DEFAULT NULL,
  `tittles` varchar(32) DEFAULT NULL,
  `gender` varchar(128) DEFAULT NULL,
  `dob` varchar(64) DEFAULT NULL,
  `birth_day` varchar(64) DEFAULT NULL,
  `place_of_birth` varchar(8) DEFAULT NULL,
  `region_of_birth` varchar(64) DEFAULT NULL,
  `country_of_birth` varchar(64) DEFAULT NULL,
  `residence` varchar(255) DEFAULT NULL,
  `profession` varchar(64) DEFAULT NULL,
  `email_id` varchar(64) DEFAULT NULL,
  `phone_number` varchar(64) DEFAULT NULL,
  `secondary_number` varchar(64) DEFAULT NULL,
  `sms_format_1` varchar(64) DEFAULT NULL,
  `picture_url` varchar(128) DEFAULT NULL,
  `membership_id` varchar(256) NOT NULL,
  `tithe_id` varchar(64) DEFAULT NULL,
  `welfare_id` varchar(64) DEFAULT NULL,
  `date_of_registration` date DEFAULT NULL,
  `created_by` varchar(64) DEFAULT NULL,
  `deleted` varchar(8) DEFAULT 'NO',
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `members` */

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `members_children` */

/*Table structure for table `offering_payments` */

DROP TABLE IF EXISTS `offering_payments`;

CREATE TABLE `offering_payments` (
  `id` int(255) unsigned NOT NULL AUTO_INCREMENT,
  `member_id` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `membership_id` varchar(255) CHARACTER SET latin1 NOT NULL,
  `u_id` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `amount` varchar(164) CHARACTER SET latin1 NOT NULL,
  `bill_item` varchar(128) CHARACTER SET latin1 DEFAULT NULL,
  `credit_balance` varchar(164) CHARACTER SET latin1 DEFAULT NULL,
  `receipt_no` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `account_type` varchar(120) CHARACTER SET latin1 DEFAULT NULL,
  `mode_of_payment` varchar(164) CHARACTER SET latin1 DEFAULT NULL,
  `mode_of_payment_number` varchar(164) CHARACTER SET latin1 DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `time_` datetime DEFAULT NULL,
  `paid_by` varchar(164) CHARACTER SET latin1 DEFAULT NULL,
  `received_by` varchar(164) CHARACTER SET latin1 DEFAULT NULL,
  `user_id` varchar(164) CHARACTER SET latin1 DEFAULT NULL,
  `deleted` varchar(4) CHARACTER SET latin1 DEFAULT 'NO',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `offering_payments` */

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `id` int(255) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `token` text DEFAULT NULL,
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
  `comments` text DEFAULT NULL,
  `created_by` varchar(64) DEFAULT NULL,
  `date_created` date DEFAULT NULL,
  `deleted` varchar(4) DEFAULT 'NO',
  PRIMARY KEY (`roll_call_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `roll_call` */

/*Table structure for table `sms_templates` */

DROP TABLE IF EXISTS `sms_templates`;

CREATE TABLE `sms_templates` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `membership_id` int(11) DEFAULT NULL,
  `sms_message_visitor` text DEFAULT NULL,
  `sms_message_tithe` text DEFAULT NULL,
  `sms_message_pledge` text DEFAULT NULL,
  `sms_message_memmber` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `sms_templates` */

/*Table structure for table `sms_tracking` */

DROP TABLE IF EXISTS `sms_tracking`;

CREATE TABLE `sms_tracking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sms_message` tinytext DEFAULT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `task_timeliness` */

/*Table structure for table `tbl_login` */

DROP TABLE IF EXISTS `tbl_login`;

CREATE TABLE `tbl_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `user_type` varchar(64) NOT NULL,
  `online` tinyint(2) DEFAULT 0,
  `state` int(100) NOT NULL,
  `membership_id` int(11) NOT NULL,
  `deleted` varchar(64) NOT NULL DEFAULT 'NO',
  `active` varchar(64) NOT NULL DEFAULT 'NO',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_login` */

/*Table structure for table `tbl_membership` */

DROP TABLE IF EXISTS `tbl_membership`;

CREATE TABLE `tbl_membership` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_code` varchar(225) NOT NULL,
  `active` varchar(8) NOT NULL DEFAULT '0',
  `date_time_created` datetime NOT NULL,
  `created_by` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_membership` */

/*Table structure for table `tbl_staff` */

DROP TABLE IF EXISTS `tbl_staff`;

CREATE TABLE `tbl_staff` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_id` varchar(20) NOT NULL,
  `firstName` varchar(64) NOT NULL,
  `otherNames` varchar(64) NOT NULL,
  `dob` varchar(16) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(64) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `occupation` varchar(64) DEFAULT NULL,
  `specialty` varchar(30) DEFAULT NULL,
  `membership_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_staff` */

/*Table structure for table `visitors` */

DROP TABLE IF EXISTS `visitors`;

CREATE TABLE `visitors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `membership_id` varchar(255) NOT NULL,
  `name_of_visitor` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `sms_contact` varchar(255) DEFAULT NULL,
  `previous_church` varchar(255) DEFAULT NULL,
  `residence` varchar(255) DEFAULT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `date_of_visit` date DEFAULT NULL,
  `taken_by` varchar(125) DEFAULT NULL,
  `commentsTaken` text DEFAULT NULL,
  `deleted` varchar(23) DEFAULT 'NO',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `visitors` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
