-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 01, 2019 at 08:51 AM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `path`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `currency_settings`
--

DROP TABLE IF EXISTS `currency_settings`;
CREATE TABLE IF NOT EXISTS `currency_settings` (
  `currency_settings_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `symbol` varchar(255) NOT NULL,
  `exchange_rate` varchar(255) NOT NULL,
  `status` varchar(10) NOT NULL,
  `code` varchar(20) DEFAULT NULL,
  `exchange_rate_def` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`currency_settings_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `currency_settings`
--

INSERT INTO `currency_settings` (`currency_settings_id`, `name`, `symbol`, `exchange_rate`, `status`, `code`, `exchange_rate_def`) VALUES
(1, 'U.S. Dollar', '$', '1', 'ok', 'USD', '1'),
(2, 'Australian Dollar', '$', '1.3163', 'ok', 'AUD', NULL),
(5, 'Brazilian Real', 'R$', '3.2953', 'ok', 'BRL', NULL),
(6, 'Canadian Dollar', '$', '1.3199', 'ok', 'CAD', NULL),
(7, 'Czech Koruna', 'Kč', '24.212', 'ok', 'CZK', NULL),
(8, 'Danish Krone', 'kr', '6.6675', 'ok', 'DKK', NULL),
(9, 'Euro', '€', '0.89079', 'ok', 'EUR', NULL),
(10, 'Hong Kong Dollar', '$', '7.7587', 'ok', 'HKD', NULL),
(11, 'Hungarian Forint', 'Ft', '275.38', 'ok', 'HUF', NULL),
(12, 'Israeli New Sheqel', '₪', '3.7896', 'ok', 'ILS', NULL),
(13, 'Japanese Yen', '¥', '101.86', 'ok', 'JPY', NULL),
(14, 'Malaysian Ringgit', 'RM', '4.1369', 'ok', 'MYR', NULL),
(15, 'Mexican Peso', '$', '19.389', 'ok', 'MXN', NULL),
(16, 'Norwegian Krone', 'kr', '8.2509', 'ok', 'NOK', NULL),
(17, 'New Zealand Dollar', '$', '1.3689', 'ok', 'NZD', NULL),
(18, 'Philippine Peso', '₱', '47.872', 'ok', 'PHP', NULL),
(19, 'Polish Zloty', 'zł', '3.8453', 'ok', 'PLN', NULL),
(20, 'Pound Sterling', '£', '0.75898', 'ok', 'GBP', NULL),
(21, 'Russian Ruble', 'руб', '64.936', 'ok', 'RUB', NULL),
(22, 'Singapore Dollar', '$', '1.3645', 'ok', 'SGD', NULL),
(23, 'Swedish Krona', 'kr', '8.5133', 'ok', 'SEK', NULL),
(24, 'Swiss Franc', 'CHF', '0.97461', 'ok', 'CHF', NULL),
(26, 'Thai Baht', '฿', '34.91', 'ok', 'THB', NULL),
(27, 'Your Currency', '?', '1', 'no', '??', '');

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

DROP TABLE IF EXISTS `language`;
CREATE TABLE IF NOT EXISTS `language` (
  `word_id` int(11) NOT NULL AUTO_INCREMENT,
  `word` longtext NOT NULL,
  `english` longtext CHARACTER SET utf8 COLLATE utf8_bin,
  `Spanish` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `French` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `hindi` longtext CHARACTER SET utf8 COLLATE utf8_bin,
  PRIMARY KEY (`word_id`)
) ENGINE=InnoDB AUTO_INCREMENT=853 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`word_id`, `word`, `english`, `Spanish`, `French`, `hindi`) VALUES
(1, 'Home', 'Home', 'Casa', 'Accueil', 'होम'),
(845, 'About Us', 'Aboutus', 'Sobre nosotros', 'À propos de nous', 'हमारे बारे में'),
(846, 'success', 'success', 'éxito', 'Succès', 'सफलता'),
(847, 'Enter Your Keywords...', 'Enter Your Keywords... ', ' Ingrese sus palabras clave ...', 'Entrez vos mots-clés ...', 'अपने कीवर्ड दर्ज करें ...'),
(848, 'Search', 'Search', 'Buscar', 'Chercher', 'खोज'),
(849, 'Welcome', 'Welcome', 'Bienvenido', 'Bienvenue', 'स्वागत हे'),
(850, 'Guest', 'Guest', 'Huésped', 'Client', 'अतिथि'),
(852, 'Contact Us ', 'Contact Us', 'Contáctenos', 'Contactez nous', 'संपर्क करें');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

DROP TABLE IF EXISTS `tbl_admin`;
CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_type` enum('1','2') NOT NULL DEFAULT '2' COMMENT '1= super admin , 2= other',
  `admin_key` varchar(15) NOT NULL,
  `admin_username` varchar(50) NOT NULL,
  `admin_password` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_cs DEFAULT NULL,
  `admin_email` varchar(255) NOT NULL DEFAULT '',
  `litigation_days` int(5) NOT NULL,
  `admin_last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `address` text NOT NULL,
  `city` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `phone` varchar(50) NOT NULL,
  `fax` varchar(50) NOT NULL,
  `contact_person` varchar(50) NOT NULL,
  `contact_phone` varchar(50) NOT NULL,
  `contact_email` varchar(50) NOT NULL,
  `post_date` date NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1',
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_type`, `admin_key`, `admin_username`, `admin_password`, `admin_email`, `litigation_days`, `admin_last_login`, `address`, `city`, `country`, `phone`, `fax`, `contact_person`, `contact_phone`, `contact_email`, `post_date`, `status`) VALUES
(1, '1', 'cnsgkMd4', 'admin', 'admin123', 'sushantroy111@gmail.com', 20, '0000-00-00 00:00:00', 'B405 New delhi', 'New Delhi', 'India', '564564564565', '', '', '', '', '0000-00-00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `oauth_provider` enum('','facebook','google','twitter') COLLATE utf8_unicode_ci NOT NULL,
  `oauth_uid` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `picture` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `oauth_provider`, `oauth_uid`, `first_name`, `last_name`, `email`, `gender`, `picture`, `link`, `created`, `modified`) VALUES
(1, 'facebook', '2201648443284003', 'Sushant', 'Roy', 'murli101092@gmail.com', '', 'https://platform-lookaside.fbsbx.com/platform/profilepic/?asid=2201648443284003&height=50&width=50&ext=1561970537&hash=AeTx07U6_jKGzVGS', '', '2019-06-01 08:26:38', '2019-06-01 08:42:14'),
(2, 'facebook', '', '', '', '', '', '', '', '2019-06-01 08:39:44', '2019-06-01 08:39:54');

-- --------------------------------------------------------

--
-- Table structure for table `wl_advertise`
--

DROP TABLE IF EXISTS `wl_advertise`;
CREATE TABLE IF NOT EXISTS `wl_advertise` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `posted_by` enum('user','admin') NOT NULL DEFAULT 'user',
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `phone_number` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `banner_type` enum('text','image') NOT NULL DEFAULT 'image',
  `website_url` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `banner_position` varchar(100) NOT NULL,
  `banner_start_date` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `banner_expire_date` varchar(100) DEFAULT NULL,
  `duration_time` varchar(100) DEFAULT NULL,
  `banner` varchar(255) CHARACTER SET utf8 DEFAULT '0,0',
  `inserted_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `banner_price` float(10,2) DEFAULT NULL,
  `payment_status` enum('Paid','Pending') DEFAULT 'Pending',
  `payment_mode` varchar(50) DEFAULT NULL,
  `order_status` enum('Canceled','Pending','Paid') NOT NULL DEFAULT 'Pending',
  `status` enum('0','1','2') NOT NULL DEFAULT '1' COMMENT '0=in-active,1=active,2=deleted',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wl_auto_respond_mails`
--

DROP TABLE IF EXISTS `wl_auto_respond_mails`;
CREATE TABLE IF NOT EXISTS `wl_auto_respond_mails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email_section` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email_subject` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email_content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('0','1','2') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `updated_on` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wl_auto_respond_mails`
--

INSERT INTO `wl_auto_respond_mails` (`id`, `email_section`, `email_subject`, `email_content`, `status`, `updated_on`) VALUES
(1, 'Registration ', 'Welcome to {site_name}', '<table border=\"0\" style=\"width:100%\">\r\n <tbody>\r\n  <tr>\r\n   <td colspan=\"2\"><strong>Hi {mem_name},</strong></td>\r\n  </tr>\r\n  <tr>\r\n   <td colspan=\"2\">We are happy to have you as the newest member of {site_name}!</td>\r\n  </tr>\r\n  <tr>\r\n   <td colspan=\"2\">This is a registration email as per the details submitted by you. You are now registered on {site_name} with the following details:</td>\r\n  </tr>\r\n  <tr>\r\n   <td colspan=\"2\">&nbsp;</td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>Email ID:</strong></td>\r\n   <td>{username}</td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>Password:</strong></td>\r\n   <td>{password}</td>\r\n  </tr>\r\n  <tr>\r\n   <td colspan=\"2\">&nbsp;</td>\r\n  </tr>\r\n  <tr>\r\n   <td colspan=\"2\">Thanks again. We hope you will visit us again soon and put these special services to work for you.<br />\r\n   Please feel free to contact us if you have any questions at all.</td>\r\n  </tr>\r\n  <tr>\r\n   <td colspan=\"2\">&nbsp;</td>\r\n  </tr>\r\n  <tr>\r\n   <td colspan=\"2\">Thank you.<br />\r\n   {site_name} Customer Service<br />\r\n   Email: {admin_email}</td>\r\n  </tr>\r\n  <tr>\r\n   <td colspan=\"2\" style=\"text-align:center\">&copy; 2013 {site_name}. All right reserved.</td>\r\n  </tr>\r\n </tbody>\r\n</table>', '1', '2013-05-09 06:38:27'),
(2, 'Forgot Password', 'Forgot Password', '<table border=\"0\" style=\"width:100%\">\r\n <tbody>\r\n  <tr>\r\n   <td colspan=\"2\"><strong>Hi {mem_name},</strong></td>\r\n  </tr>\r\n  <tr>\r\n   <td colspan=\"2\">Your login details are as follows:</td>\r\n  </tr>\r\n  <tr>\r\n   <td colspan=\"2\">&nbsp;</td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>Email ID:</strong></td>\r\n   <td>{username}</td>\r\n  </tr>\r\n  <tr>\r\n   <td><strong>password:</strong></td>\r\n   <td>{password}</td>\r\n  </tr>\r\n  <tr>\r\n   <td colspan=\"2\">&nbsp;</td>\r\n  </tr>\r\n  <tr>\r\n   <td colspan=\"2\">Click here to login {link}</td>\r\n  </tr>\r\n  <tr>\r\n   <td colspan=\"2\">&nbsp;</td>\r\n  </tr>\r\n  <tr>\r\n   <td colspan=\"2\">Thank you.<br />\r\n   {site_name} Customer Service<br />\r\n   Email: {admin_email}</td>\r\n  </tr>\r\n  <tr>\r\n   <td colspan=\"2\" style=\"text-align:center\">&copy; 2013 {site_name}. All right reserved.</td>\r\n  </tr>\r\n </tbody>\r\n</table>', '1', '2013-05-08 05:01:25'),
(3, 'Refer To Friends', 'Refer a Friend', '<table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border:2px solid #e9e9e9; margin-top:10px; width:600px\">\r\n <tbody>\r\n  <tr>\r\n   <td style=\"text-align:left\">Hi {friend_name},</td>\r\n  </tr>\r\n  <tr>\r\n   <td>\r\n   <p>{your_name} has recommended this {text}, as {your_name} thinks you would like it.<br />\r\n   <br />\r\n   To view the Deal details please click on the following link.<br />\r\n   <br />\r\n   {site_link}</p>\r\n\r\n   <p>Thanks and Regards,</p>\r\n\r\n   <p>{site_name} Team</p>\r\n   </td>\r\n  </tr>\r\n  <tr>\r\n   <td style=\"text-align:center\">&copy; 2013 {site_name}. All right reserved.</td>\r\n  </tr>\r\n </tbody>\r\n</table>', '1', '2013-05-08 05:03:53'),
(4, 'Enquiry ', 'Enquiry Received on', '<table border=\"0\" width=\"100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td colspan=\"2\">\r\n				<strong>Dear {mem_name}</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">\r\n				Enquiry&nbsp; has been submitted with following info :</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">\r\n				&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"26%\">\r\n				<strong>email:</strong></td>\r\n			<td>\r\n				<span style=\"margin-top: 15px;\">{email}</span></td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n				<strong>phone no.:</strong></td>\r\n			<td>\r\n				<span style=\"margin-top: 15px;\">{phone}</span></td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n				<strong>comments:</strong></td>\r\n			<td>\r\n				<span style=\"margin-top: 15px;\">{comments}</span></td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">\r\n				&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">\r\n				&nbsp;{link} to login</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<br />\r\n<span style=\"margin-top: 15px;\">Thank you.<br />\r\n{site_name} Customer Service<br />\r\nEmail: {admin_email} </span>', '2', '2012-05-09 16:46:26'),
(5, 'Contact Us', 'Enquiry Received on', '<table border=\"0\" width=\"100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td colspan=\"2\">\r\n				<strong>Dear {mem_name}</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">\r\n				Enquiry&nbsp; has been submitted with following info :</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">\r\n				&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"26%\">\r\n				<strong>email:</strong></td>\r\n			<td>\r\n				<span style=\"margin-top: 15px;\">{email}</span></td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n				<strong>phone no.:</strong></td>\r\n			<td>\r\n				<span style=\"margin-top: 15px;\">{phone}</span></td>\r\n		</tr>\r\n		<tr>\r\n			<td>\r\n				<strong>comments:</strong></td>\r\n			<td>\r\n				<span style=\"margin-top: 15px;\">{comments}</span></td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">\r\n				&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">\r\n				&nbsp;{link} to login</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<br />\r\n<span style=\"margin-top: 15px;\">Thank you.<br />\r\n{site_name} Customer Service<br />\r\nEmail: {admin_email} </span>', '2', '2011-12-17 10:51:08'),
(6, 'Accept  circle requests', 'Circle  requests accepted', '<table border=\"0\" width=\"100%\">\n	<tbody>\n		<tr>\n			<td colspan=\"2\">\n				<strong>Dear {mem_name}</strong></td>\n		</tr>\n		<tr>\n			<td align=\"center\">\n				{user_pic}</td>\n			<td>\n				{poster_name} has joined&nbsp; your circle on {site_name}</td>\n		</tr>\n		<tr>\n			<td>\n				&nbsp;</td>\n			<td>\n				&nbsp;</td>\n		</tr>\n		<tr>\n			<td width=\"10%\">\n				&nbsp;</td>\n			<td>\n				To view {poster_name} profile {link}</td>\n		</tr>\n	</tbody>\n</table>\n<br />\n<span style=\"margin-top: 15px;\">Thank you.<br />\n{site_name} Customer Service<br />\nEmail: {admin_email} </span>', '2', '2012-09-13 16:48:37'),
(7, 'New circle Request', 'New circle request received ', '<table border=\"0\" width=\"100%\">\n	<tbody>\n		<tr>\n			<td colspan=\"4\">\n				<strong>Dear {mem_name}</strong></td>\n		</tr>\n		<tr>\n			<td align=\"center\">\n				{user_pic}</td>\n			<td colspan=\"3\">\n				{poster_name} invited you to join a circle on {site_name}</td>\n		</tr>\n		<tr>\n			<td>\n				&nbsp;</td>\n			<td colspan=\"3\">\n				&nbsp;</td>\n		</tr>\n		<tr>\n			<td width=\"9%\">\n				&nbsp;</td>\n			<td align=\"right\" valign=\"top\" width=\"7%\">\n				{accept}</td>\n			<td align=\"center\" valign=\"top\" width=\"1%\">\n				<strong>||</strong></td>\n			<td align=\"left\" valign=\"top\" width=\"83%\">\n				{decline}</td>\n		</tr>\n	</tbody>\n</table>\n<br />\n<span style=\"margin-top: 15px;\">Thank you.<br />\n{site_name} Customer Service<br />\nEmail: {admin_email} </span>', '2', '2012-05-07 16:39:58'),
(8, 'Wall Comment', 'A comment  on your wall', '<table border=\"0\" width=\"100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td colspan=\"2\">\r\n				<strong>Dear {mem_name}</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">\r\n				{poster_name} has commented on your wall.</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">\r\n				Please {link} to view the comment&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"26%\">\r\n				&nbsp;</td>\r\n			<td>\r\n				&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<br />\r\n<span style=\"margin-top: 15px;\">Thank you.<br />\r\n{site_name} Customer Service<br />\r\nEmail: {admin_email} </span>', '2', '2012-01-25 12:20:23'),
(9, 'Post comment on circle', 'Received  a new comment on your topic in a circle', '<table border=\"0\" width=\"100%\">\n	<tbody>\n		<tr>\n			<td colspan=\"2\">\n				<strong>Dear {mem_name}</strong></td>\n		</tr>\n		<tr>\n			<td colspan=\"2\">\n				{poster_name} has commented on&nbsp;your topic in a circle.</td>\n		</tr>\n		<tr>\n			<td colspan=\"2\">\n				Please {link} to view the comment&nbsp;</td>\n		</tr>\n		<tr>\n			<td width=\"26%\">\n				&nbsp;</td>\n			<td>\n				&nbsp;</td>\n		</tr>\n	</tbody>\n</table>\n<br />\n<span style=\"margin-top: 15px;\">Thank you.<br />\n{site_name} Customer Service<br />\nEmail: {admin_email} </span>', '2', '2012-05-09 15:23:53'),
(10, 'Post topic on circle', 'Receive new topic on circle', '<table border=\"0\" width=\"100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td colspan=\"2\">\r\n				<strong>Dear {mem_name}</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">\r\n				{poster_name} has posted topic on your circle.</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">\r\n				Please {link} to view the comment&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"26%\">\r\n				&nbsp;</td>\r\n			<td>\r\n				&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<br />\r\n<span style=\"margin-top: 15px;\">Thank you.<br />\r\n{site_name} Customer Service<br />\r\nEmail: {admin_email} </span>', '2', '2012-04-23 15:09:39'),
(11, 'Wall Topic Post', 'New post  on your wall', '<table border=\"0\" width=\"100%\">\n	<tbody>\n		<tr>\n			<td colspan=\"2\">\n				<strong>Dear {mem_name}</strong></td>\n		</tr>\n		<tr>\n			<td colspan=\"2\">\n				{poster_name} has posted {txt_name} on your wall.</td>\n		</tr>\n		<tr>\n			<td colspan=\"2\">\n				Please click here {link} to view the comment&nbsp;</td>\n		</tr>\n		<tr>\n			<td width=\"26%\">\n				abc</td>\n			<td>\n				&nbsp;</td>\n		</tr>\n	</tbody>\n</table>\n<br />\n<span style=\"margin-top: 15px;\">Thank you.<br />\n{site_name} Customer Service<br />\nEmail: {admin_email} </span>', '2', '2012-05-28 11:15:41'),
(12, 'New Trooper Request', 'New Trooper request', '<table border=\"0\" width=\"100%\">\n	<tbody>\n		<tr>\n			<td colspan=\"4\">\n				<strong>Dear {mem_name}</strong></td>\n		</tr>\n		<tr>\n			<td align=\"middle\">\n				{user_pic}</td>\n			<td colspan=\"3\">\n				{poster_name} wants to add you as a trooper&nbsp;on {site_name}</td>\n		</tr>\n		<tr>\n			<td>\n				&nbsp;</td>\n			<td colspan=\"3\">\n				&nbsp;</td>\n		</tr>\n		<tr>\n			<td width=\"9%\">\n				&nbsp;</td>\n			<td align=\"right\" valign=\"top\" width=\"7%\">\n				{accept}</td>\n			<td align=\"middle\" valign=\"top\" width=\"1%\">\n				<strong>||</strong></td>\n			<td align=\"left\" valign=\"top\" width=\"83%\">\n				{decline}</td>\n		</tr>\n	</tbody>\n</table>\n<br />\n<span style=\"margin-top: 15px\">Thank you.<br />\n{site_name} Customer Service<br />\nEmail: {admin_email} </span>', '2', '2012-05-08 15:27:26'),
(13, 'Accepts Trooper Request', 'Trooper request accepted', '<table border=\"0\" width=\"100%\">\n	<tbody>\n		<tr>\n			<td colspan=\"2\">\n				<strong>Dear {mem_name}</strong></td>\n		</tr>\n		<tr>\n			<td align=\"middle\">\n				{user_pic}</td>\n			<td>\n				{poster_name} accepted your&nbsp;trooper request&nbsp;on {site_name}</td>\n		</tr>\n		<tr>\n			<td>\n				&nbsp;</td>\n			<td>\n				&nbsp;</td>\n		</tr>\n		<tr>\n			<td width=\"10%\">\n				&nbsp;</td>\n			<td>\n				To view {poster_name} profile {link}</td>\n		</tr>\n	</tbody>\n</table>\n<br />\n<span style=\"margin-top: 15px\">Thank you.<br />\n{site_name} Customer Service<br />\nEmail: {admin_email} </span>', '2', '2012-05-08 14:46:17'),
(14, 'Event  Invition', 'Event  Invitation from a trooper ', '<table border=\"0\" style=\"width: 615px; height: 88px;\">\n	<tbody>\n		<tr>\n			<td colspan=\"4\">\n				<strong>Dear {mem_name}</strong></td>\n		</tr>\n		<tr>\n			<td align=\"left\" colspan=\"4\">\n				{poster_name} invited you to attened an event on {site_name} . {click_here_link}&nbsp; to view the event.</td>\n		</tr>\n	</tbody>\n</table>\n<br />\n<br />\n<span style=\"margin-top: 15px;\">Thank you.<br />\n{site_name} Customer Service<br />\nEmail: {admin_email} </span>', '2', '2012-09-13 17:17:08'),
(15, 'comments on my collections', 'comments received  on collection', '<table border=\"0\" width=\"100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td colspan=\"2\">\r\n				<strong>Dear {mem_name}</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">\r\n				{poster_name} has commented on your collection.</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\">\r\n				Please {link} to view the comment&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td width=\"26%\">\r\n				&nbsp;</td>\r\n			<td>\r\n				&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<br />\r\n<span style=\"margin-top: 15px;\">Thank you.<br />\r\n{site_name} Customer Service<br />\r\nEmail: {admin_email} </span>', '2', '2012-05-07 13:10:21');

-- --------------------------------------------------------

--
-- Table structure for table `wl_banners`
--

DROP TABLE IF EXISTS `wl_banners`;
CREATE TABLE IF NOT EXISTS `wl_banners` (
  `banner_id` int(11) NOT NULL AUTO_INCREMENT,
  `banner_position` varchar(100) DEFAULT NULL,
  `banner_image` varchar(200) DEFAULT NULL,
  `banner_url` varchar(170) DEFAULT NULL,
  `banner_page` varchar(30) DEFAULT NULL COMMENT 'Like : home page,category page',
  `status` enum('1','0') DEFAULT '1' COMMENT '1=Actice,0=Inactive',
  `clicks` int(11) NOT NULL DEFAULT '0',
  `banner_added_date` datetime DEFAULT NULL,
  `banner_start_date` datetime DEFAULT NULL,
  `banner_end_date` datetime DEFAULT NULL,
  PRIMARY KEY (`banner_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wl_banners`
--

INSERT INTO `wl_banners` (`banner_id`, `banner_position`, `banner_image`, `banner_url`, `banner_page`, `status`, `clicks`, `banner_added_date`, `banner_start_date`, `banner_end_date`) VALUES
(9, 'Bottom1', 'Cp5BRf4W8AAQt4voFPw.jpg', 'http://localhost/bss/aboutus', '0', '1', 0, '2013-07-15 12:15:02', NULL, NULL),
(10, 'Bottom1', 'imagesVp6s.jpg', 'http://localhost/bss/aboutus', '0', '1', 0, '2013-07-15 12:16:12', NULL, NULL),
(11, 'Bottom1', 'Cp5BRf4W8AAQt4vf9tL.jpg', 'http://localhost/bss/aboutus', '0', '1', 0, '2013-07-15 12:16:32', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wl_blog`
--

DROP TABLE IF EXISTS `wl_blog`;
CREATE TABLE IF NOT EXISTS `wl_blog` (
  `blog_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `title` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `url` text,
  `detail` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `posted_by` varchar(255) DEFAULT '0',
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `status` enum('1','2','3') DEFAULT '1',
  `blog_date_added` varchar(255) DEFAULT NULL,
  `view` int(11) DEFAULT NULL,
  PRIMARY KEY (`blog_id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wl_blog`
--

INSERT INTO `wl_blog` (`blog_id`, `category_id`, `title`, `url`, `detail`, `posted_by`, `sort_order`, `status`, `blog_date_added`, `view`) VALUES
(18, 19, 'sfafasf', 'sfafasf', '<p>sdfsdfsa</p>', '4', 0, '1', '2013-07-16 07:25:55', 0),
(19, 0, 'sdffsfsa', '0', '<p>sdfsdffa</p>', '3', 0, '1', '2013-07-16 07:26:01', 0),
(20, 20, 'title', 'title', '<p>dsfsdfa</p>', '3', 0, '1', '2013-07-17 06:04:22', 0),
(21, 18, 'adfasdfsa', 'adfasdfsa', '<p>adfasdfsadf</p>', '0', 0, '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wl_blogcategory`
--

DROP TABLE IF EXISTS `wl_blogcategory`;
CREATE TABLE IF NOT EXISTS `wl_blogcategory` (
  `blogcategory_id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `url` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `posted_by` varchar(255) DEFAULT '0',
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `status` enum('1','2','3') DEFAULT '1',
  `blogcategory_date_added` varchar(255) DEFAULT NULL,
  `view` int(11) DEFAULT NULL,
  PRIMARY KEY (`blogcategory_id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wl_blogcategory`
--

INSERT INTO `wl_blogcategory` (`blogcategory_id`, `parent_id`, `name`, `url`, `posted_by`, `sort_order`, `status`, `blogcategory_date_added`, `view`) VALUES
(18, 0, 'sfafasf', '<p>sdfsdfsa</p>', '4', 1, '1', '2013-07-16 07:25:55', 0),
(19, 0, 'sdffsfsa', '<p>sdfsdffa</p>', '3', 0, '1', '2013-07-16 07:26:01', 0),
(20, 0, 'sdfss\"fsdf', 'dsfsdfa', '3', 0, '1', '2013-07-17 06:04:22', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wl_brands`
--

DROP TABLE IF EXISTS `wl_brands`;
CREATE TABLE IF NOT EXISTS `wl_brands` (
  `brand_id` int(11) NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `brand_url` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `brand_image` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `added_date` datetime DEFAULT NULL,
  `sort_order` int(3) DEFAULT NULL,
  `status` enum('1','2','3') COLLATE latin1_general_ci NOT NULL DEFAULT '1',
  PRIMARY KEY (`brand_id`),
  KEY `idx_mfg_name_zen` (`brand_name`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `wl_brands`
--

INSERT INTO `wl_brands` (`brand_id`, `brand_name`, `brand_url`, `brand_image`, `added_date`, `sort_order`, `status`) VALUES
(1, 'Nokia', NULL, NULL, '2013-06-10 10:20:59', NULL, '1'),
(2, 'Samsung', NULL, 'paypaljks6.gif', '2013-06-10 10:23:43', NULL, '1'),
(4, 'Motorola', NULL, 'logoGFnY.gif', '2013-06-10 10:43:32', NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `wl_categories`
--

DROP TABLE IF EXISTS `wl_categories`;
CREATE TABLE IF NOT EXISTS `wl_categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `friendly_url` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `category_image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `sort_order` int(3) DEFAULT NULL,
  `date_added` varchar(255) COLLATE utf8_bin DEFAULT '0000-00-00 00:00:00',
  `date_modified` varchar(255) COLLATE utf8_bin DEFAULT '0000-00-00 00:00:00',
  `status` enum('0','1','2') COLLATE utf8_bin NOT NULL DEFAULT '1' COMMENT '1=active,0=inactive,2=deleted',
  `meta_title` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `meta_keywords` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `meta_description` varchar(225) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `wl_categories`
--

INSERT INTO `wl_categories` (`category_id`, `category_name`, `friendly_url`, `category_image`, `category_description`, `parent_id`, `sort_order`, `date_added`, `date_modified`, `status`, `meta_title`, `meta_keywords`, `meta_description`) VALUES
(1, 'Lehnga', 'lehnga', '1ACUF.png', '', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '', ''),
(2, 'Printers & Scanners', 'printers_scanners', NULL, 'Printers & Scanners', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '', ''),
(3, 'Memory Devices', 'memory_devices', NULL, 'Memory DevicesMemory DevicesMemory Devices', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '', ''),
(4, 'Monitors', 'monitors', NULL, 'Monitors', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '', ''),
(5, 'LCD Monitors', 'lcd_monitors', NULL, '', 4, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '', ''),
(6, 'LED Monitors', 'led_monitors', NULL, '', 4, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '', ''),
(7, 'Sarees', 'home_appliances', 'Ariel2jm0P.jpg', '<span style=\"color: rgb(0, 0, 0); font-family: monospace; font-size: medium; white-space: pre-wrap;\">Sarees</span><span style=\"color: rgb(0, 0, 0); font-family: monospace; font-size: medium; white-space: pre-wrap;\">Sarees</span><span style=\"color: rgb(0, 0, 0); font-family: monospace; font-size: medium; white-space: pre-wrap;\">Sarees</span><span style=\"color: rgb(0, 0, 0); font-family: monospace; font-size: medium; white-space: pre-wrap;\">Sarees</span><span style=\"color: rgb(0, 0, 0); font-family: monospace; font-size: medium; white-space: pre-wrap;\">Sarees</span><span style=\"color: rgb(0, 0, 0); font-family: monospace; font-size: medium; white-space: pre-wrap;\">Sarees</span><span style=\"color: rgb(0, 0, 0); font-family: monospace; font-size: medium; white-space: pre-wrap;\">Sarees</span>', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '', ''),
(9, 'Small Appliances', 'small_appliances', NULL, 'Small Appliances', 7, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1', '', '', ''),
(12, 'Salwar Kameez', 'salwar-kameez', 'images_(1)LhgM.jpg', '<p><span style=\"color:rgb(0, 0, 0); font-family:monospace; font-size:medium\">Salwar Kameez</span><span style=\"color:rgb(0, 0, 0); font-family:monospace; font-size:medium\">Salwar Kameez</span><span style=\"color:rgb(0, 0, 0); font-family:monospace; font-size:medium\">Salwar Kameez</span><span style=\"color:rgb(0, 0, 0); font-family:monospace; font-size:medium\">Salwar Kameez</span><span style=\"color:rgb(0, 0, 0); font-family:monospace; font-size:medium\">Salwar Kameez</span><span style=\"color:rgb(0, 0, 0); font-family:monospace; font-size:medium\">Salwar Kameez</span><span style=\"color:rgb(0, 0, 0); font-family:monospace; font-size:medium\">Salwar Kameez</span></p>\r\n', 0, 3, '2013-04-04 09:07:54', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(13, 'Bath Accessories', 'category_name', '', '<p>Bath AccessoriesBath AccessoriesBath AccessoriesBath Accessories</p>\r\n', 12, 0, '2013-04-04 09:10:25', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(14, 'Holders & Dispensers', 'category_name', '', '<p>Holders &amp; DispensersHolders &amp; DispensersHolders &amp; DispensersHolders &amp; Dispensers</p>\r\n', 12, 0, '2013-04-04 09:11:12', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(15, 'Toilet Accessories', 'category_name', '', '<p>Toilet AccessoriesToilet AccessoriesToilet AccessoriesToilet Accessories</p>\r\n', 12, 0, '2013-04-04 09:11:38', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(16, 'Toilet Accessoriesass', 'toilet-accessoriesass', '', '<p>Bathroom SetsBathroom SetsBathroom Sets</p>\r\n', 12, 0, '2013-04-04 09:12:06', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(20, 'Kurtis', 'category_name', '', '<span style=\"color: rgb(0, 0, 0); font-family: monospace; font-size: medium; white-space: pre-wrap;\">Kurtis</span><span style=\"color: rgb(0, 0, 0); font-family: monospace; font-size: medium; white-space: pre-wrap;\">Kurtis</span><span style=\"color: rgb(0, 0, 0); font-family: monospace; font-size: medium; white-space: pre-wrap;\">Kurtis</span><span style=\"color: rgb(0, 0, 0); font-family: monospace; font-size: medium; white-space: pre-wrap;\">Kurtis</span><span style=\"color: rgb(0, 0, 0); font-family: monospace; font-size: medium; white-space: pre-wrap;\">Kurtis</span><span style=\"color: rgb(0, 0, 0); font-family: monospace; font-size: medium; white-space: pre-wrap;\">Kurtis</span><span style=\"color: rgb(0, 0, 0); font-family: monospace; font-size: medium; white-space: pre-wrap;\">Kurtis</span><span style=\"color: rgb(0, 0, 0); font-family: monospace; font-size: medium; white-space: pre-wrap;\">Kurtis</span>', 0, 0, '2013-04-18 05:22:50', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(21, 'Kids Wears', 'category_name', '', '<p><span style=\"color:rgb(0, 0, 0); font-family:monospace; font-size:medium\">Kids Wears</span><span style=\"color:rgb(0, 0, 0); font-family:monospace; font-size:medium\">Kids Wears</span><span style=\"color:rgb(0, 0, 0); font-family:monospace; font-size:medium\">Kids Wears</span><span style=\"color:rgb(0, 0, 0); font-family:monospace; font-size:medium\">Kids Wears</span><span style=\"color:rgb(0, 0, 0); font-family:monospace; font-size:medium\">Kids Wears</span><span style=\"color:rgb(0, 0, 0); font-family:monospace; font-size:medium\">Kids Wears</span><span style=\"color:rgb(0, 0, 0); font-family:monospace; font-size:medium\">Kids Wears</span><span style=\"color:rgb(0, 0, 0); font-family:monospace; font-size:medium\">Kids Wears</span><span style=\"color:rgb(0, 0, 0); font-family:monospace; font-size:medium\">Kids Wears</span><span style=\"color:rgb(0, 0, 0); font-family:monospace; font-size:medium\">Kids Wears</span><span style=\"color:rgb(0, 0, 0); font-family:monospace; font-size:medium\">Kids Wears</span></p>\r\n', 0, 5, '2013-04-18 05:23:10', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(22, 'Ladies Accessories', 'category_name', '', '<span style=\"color: rgb(0, 0, 0); font-family: monospace; font-size: medium; white-space: pre-wrap;\">Ladies Accessories</span><span style=\"color: rgb(0, 0, 0); font-family: monospace; font-size: medium; white-space: pre-wrap;\">Ladies Accessories</span><span style=\"color: rgb(0, 0, 0); font-family: monospace; font-size: medium; white-space: pre-wrap;\">Ladies Accessories</span><span style=\"color: rgb(0, 0, 0); font-family: monospace; font-size: medium; white-space: pre-wrap;\">Ladies Accessories</span><span style=\"color: rgb(0, 0, 0); font-family: monospace; font-size: medium; white-space: pre-wrap;\">Ladies Accessories</span><span style=\"color: rgb(0, 0, 0); font-family: monospace; font-size: medium; white-space: pre-wrap;\">Ladies Accessories</span><span style=\"color: rgb(0, 0, 0); font-family: monospace; font-size: medium; white-space: pre-wrap;\">Ladies Accessories</span><span style=\"color: rgb(0, 0, 0); font-family: monospace; font-size: medium; white-space: pre-wrap;\">Ladies Accessories</span><span style=\"color: rgb(0, 0, 0); font-family: monospace; font-size: medium; white-space: pre-wrap;\">Ladies Accessories</span><span style=\"color: rgb(0, 0, 0); font-family: monospace; font-size: medium; white-space: pre-wrap;\">Ladies Accessories</span>', 0, 0, '2013-04-18 05:23:22', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(23, 'Readymade Salwar Kameez', 'category_name', 'imagesrJ3T.jpg', '<p><span style=\"color:rgb(0, 0, 0); font-family:monospace; font-size:medium\">Readymade Salwar Kameez</span><span style=\"color:rgb(0, 0, 0); font-family:monospace; font-size:medium\">Readymade Salwar Kameez</span><span style=\"color:rgb(0, 0, 0); font-family:monospace; font-size:medium\">Readymade Salwar Kameez</span><span style=\"color:rgb(0, 0, 0); font-family:monospace; font-size:medium\">Readymade Salwar Kameez</span><span style=\"color:rgb(0, 0, 0); font-family:monospace; font-size:medium\">Readymade Salwar Kameez</span><span style=\"color:rgb(0, 0, 0); font-family:monospace; font-size:medium\">Readymade Salwar Kameez</span></p>\r\n', 0, 2, '2013-04-18 05:23:36', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(24, 'Grooms Wears', 'grooms-wears', 'LighthousetXmD.jpg', '<p><span style=\"color:rgb(0, 0, 0); font-family:monospace; font-size:medium\">Grooms Wears</span><span style=\"color:rgb(0, 0, 0); font-family:monospace; font-size:medium\">Grooms Wears</span><span style=\"color:rgb(0, 0, 0); font-family:monospace; font-size:medium\">Grooms Wears</span><span style=\"color:rgb(0, 0, 0); font-family:monospace; font-size:medium\">Grooms Wears</span><span style=\"color:rgb(0, 0, 0); font-family:monospace; font-size:medium\">Grooms Wears</span><span style=\"color:rgb(0, 0, 0); font-family:monospace; font-size:medium\">Grooms Wears</span><span style=\"color:rgb(0, 0, 0); font-family:monospace; font-size:medium\">Grooms Wears</span></p>\r\n', 0, 1, '2013-04-18 05:23:47', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(25, 'Kids Wears level 3', 'kids-wears-level-3', '', '<p>Kids Wears level 3Kids Wears level 3Kids Wears level 3Kids Wears level 3</p>\r\n', 16, NULL, '2013-04-18 07:01:51', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(26, 'Kids Wears level 4', 'category_name', '', 'Kids Wears level 4Kids Wears level 4Kids Wears level 4Kids Wears level 4Kids Wears level 4Kids Wears level 4Kids Wears level 4', 25, NULL, '2013-04-18 07:02:55', '0000-00-00 00:00:00', '1', NULL, NULL, NULL),
(28, 'aaaaaaaa', 'aaaaaaaa', '', '<p>sdfsdfsfsa</p>\r\n', 12, NULL, '2013-07-16 08:39:40', '0000-00-00 00:00:00', '1', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wl_cms_pages`
--

DROP TABLE IF EXISTS `wl_cms_pages`;
CREATE TABLE IF NOT EXISTS `wl_cms_pages` (
  `page_id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `page_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `friendly_url` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `page_description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `page_short_description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `image` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('0','1','2') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '1' COMMENT '0=Inactive,1=Active,2=Deleted',
  `page_updated_date` datetime DEFAULT NULL,
  PRIMARY KEY (`page_id`),
  KEY `friendly_url` (`friendly_url`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wl_cms_pages`
--

INSERT INTO `wl_cms_pages` (`page_id`, `parent_id`, `page_name`, `friendly_url`, `page_description`, `page_short_description`, `image`, `status`, `page_updated_date`) VALUES
(1, 0, 'About Us', 'aboutus', '<p>&lt;?php echo &quot;hi&quot;;?&gt;</p>\r\n\r\n<p>The path of truth is difficult. It is more difficult to walk on. That is why people resort to lies, wrong and fate and try to move forward in life. Sometimes they are successful too. But Satyarthi has difficulty but Because of their longevity and strong intelligence, they always look different from everyone. One such person is Mr. Sunil Kumar, who was born in a middle family of Mohameda Gaonan of Samastipur district, who was born in his childhood. From an early age, they used to take part in social work. He used to feel sadness and pain in his eyes. At the age of time children are about to play, they went to their father to Delhi. There n D. M. Started the job in C. Ever never blamed the officers dadagiri. Always co-workers were always ready to help. They were the Vice President of Delhi Transport Union. He worked a lot for the interests of the employee. In Civil Defense also worked for about fifteen years. They also hold that post holder. In Tilak Nagar, he carried out the responsibility of the Prime Minister with great respect and he had good access to all the communities.They make whatever they get from them. Due to being the master of this art, the number of his friends is above thousands. They are not happy about any introduction. People give their introduction by taking their name. High dignitaries of his work where he used to work great respect because he is sure of time and promise.He is no match for honoring all the communities in respect of all religions. They always help poor living in poor and poor life. He used to make a lot of humorous fun to the poor laborers who worked hard to extinguish the fire of their stomach in Delhi. Seeing all these difficulties and their live-in life, they used to think about doing something for them. In this sequence, he founded Bihar Swabhiman Sangh.The purpose of which is to serve them without discrimination and language discrimination.Improve their social, economic status. Education is such a light. By which people get rid of the pain of their life.Their aim is to make education accessible to all. All think for themselves. We are people in the world who think for humanity. Mr. Sunil Kumar is the wealthy personality of such a personality.</p>\r\n', '', '', '1', '2018-12-07 15:36:35'),
(12, 0, 'OUR AIMS AND OBJECTIVES', 'objectives', '<ol>\r\n <li>To work for Social, Moral, Mental and Physical Development of needed Boys/Girls by the Society.</li>\r\n <li>To open, establish, promote, set up and run, maintain School for Boys, Girls, Handicapped person from Primary to Higher Education for development of education free of charge by the Society.</li>\r\n <li>To open and set-up library and arrangement of free education in the language of Hindi, English, Sanskrit and Urdu.</li>\r\n <li>To arrange of free education of Stitching, Beautician Course, Fashion Designing Computer Education for Poor and helpless child of women.</li>\r\n <li>To protect child labour and to promote educational programme and assist the poor and needy of the SOCIETY.</li>\r\n <li>To create a since of brotherhood, peace and communal harmony, love and affection among the general public, to maintain the secular-fabric of our democratic country apart from religion, caste and creed etc.</li>\r\n <li>To establish, maintain or grant aid for the establishment development and maintenance of Temple, Road, Colony, Park, Sewer etc. for needed persons.</li>\r\n <li>To protect child labour and to promote educational programme and assist the poor and needy of the SOCIETY.</li>\r\n <li>To organized Marriage of Girls.</li>\r\n <li>To organized for Men & Women & Children for sports.</li>\r\n <li>To help and promote the Government&#39;s Scheme provide for widows,senior Citizens, disabled and weaker sections of the SOCIETY.</li>\r\n <li>To raise grievance from the Government or the authorities or provide religious, Cultural and burial ground etc. to the local residents of the area.</li>\r\n <li>To accept donations, grant, presents, gifts and other offerings in the shape of moveable or immovable properties for the attainment of the Aims and Objects of the Society.</li>\r\n <li>To take up effective, reasonable and lawful steps for the solutions of problems relating to members of the SOCIETY or relating to general public by the SOCIETY.</li>\r\n <li>To open, establish, promote, set up and run, maintain, assist, finance, support and help the various community developments.</li>\r\n <li>All the income, earnings, moveable or immovable properties of the SOCIETY shall be solely utilized and applied towards the promotion of its Aims and Objects only as set forth in the Memorandum of SOCIETY and no profit thereof shall be paid or transferred directly or indirectly by way of dividends, bonus, profits or in any manner whatsoever to claiming through any one or more of the SOCIETY or to any person claiming through any one or more of the present or the past members. No member of the more the present or the past on any movable or immovable properties of the SOCIETY or make any profits, whatsoever, by virtue of this membership.</li>\r\n <li> {base_url}</li>\r\n{image_url}\r\n</ol>\r\n', '', '', '1', '0000-00-00 00:00:00'),
(13, 0, 'After Banner', '', '<div class=\"choose-us section-padding-1\">\r\n  <div class=\"container-fluid\">\r\n<div class=\"row no-gutters choose-negative-mrg\">\r\n<div class=\"col-lg-3 col-md-6\">\r\n<div class=\"single-choose-us choose-bg-light-blue\">\r\n<div class=\"choose-img\"><img alt=\"\" class=\"animated\" src=\"{image_url}icon-img/service-1.png\"></div>\r\n\r\n<div class=\"choose-content\">\r\n<h3>Scholarship Facility</h3>\r\n\r\n<p>magna aliqua. Ut enim ad minim veniam conse ctetur adipisicing elit, sed do exercitation.</p>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-lg-3 col-md-6\">\r\n<div class=\"single-choose-us choose-bg-yellow\">\r\n<div class=\"choose-img\"><img alt=\"\" class=\"animated\" src=\"{image_url}icon-img/service-2.png\"></div>\r\n\r\n<div class=\"choose-content\">\r\n<h3>Scholarship Facility</h3>\r\n\r\n<p>magna aliqua. Ut enim ad minim veniam conse ctetur adipisicing elit, sed do exercitation.</p>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-lg-3 col-md-6\">\r\n<div class=\"single-choose-us choose-bg-blue\">\r\n<div class=\"choose-img\"><img alt=\"\" class=\"animated\" src=\"{image_url}icon-img/service-3.png\"></div>\r\n\r\n<div class=\"choose-content\">\r\n<h3>Scholarship Facility</h3>\r\n\r\n<p>magna aliqua. Ut enim ad minim veniam conse ctetur adipisicing elit, sed do exercitation.</p>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"col-lg-3 col-md-6\">\r\n<div class=\"single-choose-us choose-bg-green\">\r\n<div class=\"choose-img\"><img alt=\"\" class=\"animated\" src=\"{image_url}icon-img/service-4.png\"></div>\r\n\r\n<div class=\"choose-content\">\r\n<h3>Scholarship Facility</h3>\r\n\r\n<p>magna aliqua. Ut enim ad minim veniam conse ctetur adipisicing elit, sed do exercitation.</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n </div>\r\n</div>\r\n', NULL, '', '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wl_color`
--

DROP TABLE IF EXISTS `wl_color`;
CREATE TABLE IF NOT EXISTS `wl_color` (
  `color_id` int(11) NOT NULL AUTO_INCREMENT,
  `color_name` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `color_code` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `added_date` datetime DEFAULT NULL,
  `status` enum('1','2','3') COLLATE latin1_general_ci NOT NULL DEFAULT '1',
  PRIMARY KEY (`color_id`),
  KEY `idx_mfg_name_zen` (`color_name`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `wl_color`
--

INSERT INTO `wl_color` (`color_id`, `color_name`, `color_code`, `added_date`, `status`) VALUES
(1, 'Pink', 'FF7A91', '2013-06-10 11:58:45', '1'),
(2, 'Green\"sdfds\'', '75FF88', '2013-06-10 11:59:09', '1'),
(4, 'Gresssen\"sdfds\'', 'FFFFFF', '2013-11-12 04:16:00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `wl_countries`
--

DROP TABLE IF EXISTS `wl_countries`;
CREATE TABLE IF NOT EXISTS `wl_countries` (
  `country_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8_bin NOT NULL,
  `iso_code_2` varchar(2) COLLATE utf8_bin NOT NULL DEFAULT '',
  `iso_code_3` varchar(3) COLLATE utf8_bin NOT NULL DEFAULT '',
  `status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`country_id`)
) ENGINE=MyISAM AUTO_INCREMENT=240 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `wl_countries`
--

INSERT INTO `wl_countries` (`country_id`, `name`, `iso_code_2`, `iso_code_3`, `status`) VALUES
(1, 'Afghanistan', 'AF', 'AFG', 1),
(2, 'Albania', 'AL', 'ALB', 1),
(3, 'Algeria', 'DZ', 'DZA', 1),
(4, 'American Samoa', 'AS', 'ASM', 1),
(5, 'Andorra', 'AD', 'AND', 1),
(6, 'Angola', 'AO', 'AGO', 1),
(7, 'Anguilla', 'AI', 'AIA', 1),
(8, 'Antarctica', 'AQ', 'ATA', 1),
(9, 'Antigua and Barbuda', 'AG', 'ATG', 1),
(10, 'Argentina', 'AR', 'ARG', 1),
(11, 'Armenia', 'AM', 'ARM', 1),
(12, 'Aruba', 'AW', 'ABW', 1),
(13, 'Australia', 'AU', 'AUS', 1),
(14, 'Austria', 'AT', 'AUT', 1),
(15, 'Azerbaijan', 'AZ', 'AZE', 1),
(16, 'Bahamas', 'BS', 'BHS', 1),
(17, 'Bahrain', 'BH', 'BHR', 1),
(18, 'Bangladesh', 'BD', 'BGD', 1),
(19, 'Barbados', 'BB', 'BRB', 1),
(20, 'Belarus', 'BY', 'BLR', 1),
(21, 'Belgium', 'BE', 'BEL', 1),
(22, 'Belize', 'BZ', 'BLZ', 1),
(23, 'Benin', 'BJ', 'BEN', 1),
(24, 'Bermuda', 'BM', 'BMU', 1),
(25, 'Bhutan', 'BT', 'BTN', 1),
(26, 'Bolivia', 'BO', 'BOL', 1),
(27, 'Bosnia and Herzegowina', 'BA', 'BIH', 1),
(28, 'Botswana', 'BW', 'BWA', 1),
(29, 'Bouvet Island', 'BV', 'BVT', 1),
(30, 'Brazil', 'BR', 'BRA', 1),
(31, 'British Indian Ocean Territory', 'IO', 'IOT', 1),
(32, 'Brunei Darussalam', 'BN', 'BRN', 1),
(33, 'Bulgaria', 'BG', 'BGR', 1),
(34, 'Burkina Faso', 'BF', 'BFA', 1),
(35, 'Burundi', 'BI', 'BDI', 1),
(36, 'Cambodia', 'KH', 'KHM', 1),
(37, 'Cameroon', 'CM', 'CMR', 1),
(38, 'Canada', 'CA', 'CAN', 1),
(39, 'Cape Verde', 'CV', 'CPV', 1),
(40, 'Cayman Islands', 'KY', 'CYM', 1),
(41, 'Central African Republic', 'CF', 'CAF', 1),
(42, 'Chad', 'TD', 'TCD', 1),
(43, 'Chile', 'CL', 'CHL', 1),
(44, 'China', 'CN', 'CHN', 1),
(45, 'Christmas Island', 'CX', 'CXR', 1),
(46, 'Cocos (Keeling) Islands', 'CC', 'CCK', 1),
(47, 'Colombia', 'CO', 'COL', 1),
(48, 'Comoros', 'KM', 'COM', 1),
(49, 'Congo', 'CG', 'COG', 1),
(50, 'Cook Islands', 'CK', 'COK', 1),
(51, 'Costa Rica', 'CR', 'CRI', 1),
(52, 'Cote D\'Ivoire', 'CI', 'CIV', 1),
(53, 'Croatia', 'HR', 'HRV', 1),
(54, 'Cuba', 'CU', 'CUB', 1),
(55, 'Cyprus', 'CY', 'CYP', 1),
(56, 'Czech Republic', 'CZ', 'CZE', 1),
(57, 'Denmark', 'DK', 'DNK', 1),
(58, 'Djibouti', 'DJ', 'DJI', 1),
(59, 'Dominica', 'DM', 'DMA', 1),
(60, 'Dominican Republic', 'DO', 'DOM', 1),
(61, 'East Timor', 'TP', 'TMP', 1),
(62, 'Ecuador', 'EC', 'ECU', 1),
(63, 'Egypt', 'EG', 'EGY', 1),
(64, 'El Salvador', 'SV', 'SLV', 1),
(65, 'Equatorial Guinea', 'GQ', 'GNQ', 1),
(66, 'Eritrea', 'ER', 'ERI', 1),
(67, 'Estonia', 'EE', 'EST', 1),
(68, 'Ethiopia', 'ET', 'ETH', 1),
(69, 'Falkland Islands (Malvinas)', 'FK', 'FLK', 1),
(70, 'Faroe Islands', 'FO', 'FRO', 1),
(71, 'Fiji', 'FJ', 'FJI', 1),
(72, 'Finland', 'FI', 'FIN', 1),
(73, 'France', 'FR', 'FRA', 1),
(74, 'France, Metropolitan', 'FX', 'FXX', 1),
(75, 'French Guiana', 'GF', 'GUF', 1),
(76, 'French Polynesia', 'PF', 'PYF', 1),
(77, 'French Southern Territories', 'TF', 'ATF', 1),
(78, 'Gabon', 'GA', 'GAB', 1),
(79, 'Gambia', 'GM', 'GMB', 1),
(80, 'Georgia', 'GE', 'GEO', 1),
(81, 'Germany', 'DE', 'DEU', 1),
(82, 'Ghana', 'GH', 'GHA', 1),
(83, 'Gibraltar', 'GI', 'GIB', 1),
(84, 'Greece', 'GR', 'GRC', 1),
(85, 'Greenland', 'GL', 'GRL', 1),
(86, 'Grenada', 'GD', 'GRD', 1),
(87, 'Guadeloupe', 'GP', 'GLP', 1),
(88, 'Guam', 'GU', 'GUM', 1),
(89, 'Guatemala', 'GT', 'GTM', 1),
(90, 'Guinea', 'GN', 'GIN', 1),
(91, 'Guinea-bissau', 'GW', 'GNB', 1),
(92, 'Guyana', 'GY', 'GUY', 1),
(93, 'Haiti', 'HT', 'HTI', 1),
(94, 'Heard and Mc Donald Islands', 'HM', 'HMD', 1),
(95, 'Honduras', 'HN', 'HND', 1),
(96, 'Hong Kong', 'HK', 'HKG', 1),
(97, 'Hungary', 'HU', 'HUN', 1),
(98, 'Iceland', 'IS', 'ISL', 1),
(99, 'India', 'IN', 'IND', 1),
(100, 'Indonesia', 'ID', 'IDN', 1),
(101, 'Iran (Islamic Republic of)', 'IR', 'IRN', 1),
(102, 'Iraq', 'IQ', 'IRQ', 1),
(103, 'Ireland', 'IE', 'IRL', 1),
(104, 'Israel', 'IL', 'ISR', 1),
(105, 'Italy', 'IT', 'ITA', 1),
(106, 'Jamaica', 'JM', 'JAM', 1),
(107, 'Japan', 'JP', 'JPN', 1),
(108, 'Jordan', 'JO', 'JOR', 1),
(109, 'Kazakhstan', 'KZ', 'KAZ', 1),
(110, 'Kenya', 'KE', 'KEN', 1),
(111, 'Kiribati', 'KI', 'KIR', 1),
(112, 'North Korea', 'KP', 'PRK', 1),
(113, 'Korea, Republic of', 'KR', 'KOR', 1),
(114, 'Kuwait', 'KW', 'KWT', 1),
(115, 'Kyrgyzstan', 'KG', 'KGZ', 1),
(116, 'Lao People\'s Democratic Republic', 'LA', 'LAO', 1),
(117, 'Latvia', 'LV', 'LVA', 1),
(118, 'Lebanon', 'LB', 'LBN', 1),
(119, 'Lesotho', 'LS', 'LSO', 1),
(120, 'Liberia', 'LR', 'LBR', 1),
(121, 'Libyan Arab Jamahiriya', 'LY', 'LBY', 1),
(122, 'Liechtenstein', 'LI', 'LIE', 1),
(123, 'Lithuania', 'LT', 'LTU', 1),
(124, 'Luxembourg', 'LU', 'LUX', 1),
(125, 'Macau', 'MO', 'MAC', 1),
(126, 'Macedonia', 'MK', 'MKD', 1),
(127, 'Madagascar', 'MG', 'MDG', 1),
(128, 'Malawi', 'MW', 'MWI', 1),
(129, 'Malaysia', 'MY', 'MYS', 1),
(130, 'Maldives', 'MV', 'MDV', 1),
(131, 'Mali', 'ML', 'MLI', 1),
(132, 'Malta', 'MT', 'MLT', 1),
(133, 'Marshall Islands', 'MH', 'MHL', 1),
(134, 'Martinique', 'MQ', 'MTQ', 1),
(135, 'Mauritania', 'MR', 'MRT', 1),
(136, 'Mauritius', 'MU', 'MUS', 1),
(137, 'Mayotte', 'YT', 'MYT', 1),
(138, 'Mexico', 'MX', 'MEX', 1),
(139, 'Micronesia, Federated States of', 'FM', 'FSM', 1),
(140, 'Moldova, Republic of', 'MD', 'MDA', 1),
(141, 'Monaco', 'MC', 'MCO', 1),
(142, 'Mongolia', 'MN', 'MNG', 1),
(143, 'Montserrat', 'MS', 'MSR', 1),
(144, 'Morocco', 'MA', 'MAR', 1),
(145, 'Mozambique', 'MZ', 'MOZ', 1),
(146, 'Myanmar', 'MM', 'MMR', 1),
(147, 'Namibia', 'NA', 'NAM', 1),
(148, 'Nauru', 'NR', 'NRU', 1),
(149, 'Nepal', 'NP', 'NPL', 1),
(150, 'Netherlands', 'NL', 'NLD', 1),
(151, 'Netherlands Antilles', 'AN', 'ANT', 1),
(152, 'New Caledonia', 'NC', 'NCL', 1),
(153, 'New Zealand', 'NZ', 'NZL', 1),
(154, 'Nicaragua', 'NI', 'NIC', 1),
(155, 'Niger', 'NE', 'NER', 1),
(156, 'Nigeria', 'NG', 'NGA', 1),
(157, 'Niue', 'NU', 'NIU', 1),
(158, 'Norfolk Island', 'NF', 'NFK', 1),
(159, 'Northern Mariana Islands', 'MP', 'MNP', 1),
(160, 'Norway', 'NO', 'NOR', 1),
(161, 'Oman', 'OM', 'OMN', 1),
(162, 'Pakistan', 'PK', 'PAK', 1),
(163, 'Palau', 'PW', 'PLW', 1),
(164, 'Panama', 'PA', 'PAN', 1),
(165, 'Papua New Guinea', 'PG', 'PNG', 1),
(166, 'Paraguay', 'PY', 'PRY', 1),
(167, 'Peru', 'PE', 'PER', 1),
(168, 'Philippines', 'PH', 'PHL', 1),
(169, 'Pitcairn', 'PN', 'PCN', 1),
(170, 'Poland', 'PL', 'POL', 1),
(171, 'Portugal', 'PT', 'PRT', 1),
(172, 'Puerto Rico', 'PR', 'PRI', 1),
(173, 'Qatar', 'QA', 'QAT', 1),
(174, 'Reunion', 'RE', 'REU', 1),
(175, 'Romania', 'RO', 'ROM', 1),
(176, 'Russian Federation', 'RU', 'RUS', 1),
(177, 'Rwanda', 'RW', 'RWA', 1),
(178, 'Saint Kitts and Nevis', 'KN', 'KNA', 1),
(179, 'Saint Lucia', 'LC', 'LCA', 1),
(180, 'Saint Vincent and the Grenadines', 'VC', 'VCT', 1),
(181, 'Samoa', 'WS', 'WSM', 1),
(182, 'San Marino', 'SM', 'SMR', 1),
(183, 'Sao Tome and Principe', 'ST', 'STP', 1),
(184, 'Saudi Arabia', 'SA', 'SAU', 1),
(185, 'Senegal', 'SN', 'SEN', 1),
(186, 'Seychelles', 'SC', 'SYC', 1),
(187, 'Sierra Leone', 'SL', 'SLE', 1),
(188, 'Singapore', 'SG', 'SGP', 1),
(189, 'Slovak Republic', 'SK', 'SVK', 1),
(190, 'Slovenia', 'SI', 'SVN', 1),
(191, 'Solomon Islands', 'SB', 'SLB', 1),
(192, 'Somalia', 'SO', 'SOM', 1),
(193, 'South Africa', 'ZA', 'ZAF', 1),
(194, 'South Georgia &amp; South Sandwich Islands', 'GS', 'SGS', 1),
(195, 'Spain', 'ES', 'ESP', 1),
(196, 'Sri Lanka', 'LK', 'LKA', 1),
(197, 'St. Helena', 'SH', 'SHN', 1),
(198, 'St. Pierre and Miquelon', 'PM', 'SPM', 1),
(199, 'Sudan', 'SD', 'SDN', 1),
(200, 'Suriname', 'SR', 'SUR', 1),
(201, 'Svalbard and Jan Mayen Islands', 'SJ', 'SJM', 1),
(202, 'Swaziland', 'SZ', 'SWZ', 1),
(203, 'Sweden', 'SE', 'SWE', 1),
(204, 'Switzerland', 'CH', 'CHE', 1),
(205, 'Syrian Arab Republic', 'SY', 'SYR', 1),
(206, 'Taiwan', 'TW', 'TWN', 1),
(207, 'Tajikistan', 'TJ', 'TJK', 1),
(208, 'Tanzania, United Republic of', 'TZ', 'TZA', 1),
(209, 'Thailand', 'TH', 'THA', 1),
(210, 'Togo', 'TG', 'TGO', 1),
(211, 'Tokelau', 'TK', 'TKL', 1),
(212, 'Tonga', 'TO', 'TON', 1),
(213, 'Trinidad and Tobago', 'TT', 'TTO', 1),
(214, 'Tunisia', 'TN', 'TUN', 1),
(215, 'Turkey', 'TR', 'TUR', 1),
(216, 'Turkmenistan', 'TM', 'TKM', 1),
(217, 'Turks and Caicos Islands', 'TC', 'TCA', 1),
(218, 'Tuvalu', 'TV', 'TUV', 1),
(219, 'Uganda', 'UG', 'UGA', 1),
(220, 'Ukraine', 'UA', 'UKR', 1),
(221, 'United Arab Emirates', 'AE', 'ARE', 1),
(222, 'United Kingdom', 'GB', 'GBR', 1),
(223, 'United States', 'US', 'USA', 1),
(224, 'United States Minor Outlying Islands', 'UM', 'UMI', 1),
(225, 'Uruguay', 'UY', 'URY', 1),
(226, 'Uzbekistan', 'UZ', 'UZB', 1),
(227, 'Vanuatu', 'VU', 'VUT', 1),
(228, 'Vatican City State (Holy See)', 'VA', 'VAT', 1),
(229, 'Venezuela', 'VE', 'VEN', 1),
(230, 'Viet Nam', 'VN', 'VNM', 1),
(231, 'Virgin Islands (British)', 'VG', 'VGB', 1),
(232, 'Virgin Islands (U.S.)', 'VI', 'VIR', 1),
(233, 'Wallis and Futuna Islands', 'WF', 'WLF', 1),
(234, 'Western Sahara', 'EH', 'ESH', 1),
(235, 'Yemen', 'YE', 'YEM', 1),
(236, 'Yugoslavia', 'YU', 'YUG', 1),
(237, 'Democratic Republic of Congo', 'CD', 'COD', 1),
(238, 'Zambia', 'ZM', 'ZMB', 1),
(239, 'Zimbabwe', 'ZW', 'ZWE', 1);

-- --------------------------------------------------------

--
-- Table structure for table `wl_coupons`
--

DROP TABLE IF EXISTS `wl_coupons`;
CREATE TABLE IF NOT EXISTS `wl_coupons` (
  `coupon_id` int(11) NOT NULL AUTO_INCREMENT,
  `coupon_code` varchar(10) COLLATE utf8_bin NOT NULL,
  `coupon_type` enum('p','f','a') COLLATE utf8_bin NOT NULL DEFAULT 'p' COMMENT 'p=percentage , f=free shipping , a=amount',
  `coupon_discount` decimal(15,4) NOT NULL,
  `minimum_order_amount` decimal(15,4) NOT NULL DEFAULT '0.0000',
  `start_date` date NOT NULL DEFAULT '0000-00-00',
  `end_date` date NOT NULL DEFAULT '0000-00-00',
  `status` enum('0','1','2') COLLATE utf8_bin NOT NULL DEFAULT '1' COMMENT '0=Inactive,1=Active,2=Deleted',
  `date_added` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`coupon_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `wl_coupons`
--

INSERT INTO `wl_coupons` (`coupon_id`, `coupon_code`, `coupon_type`, `coupon_discount`, `minimum_order_amount`, `start_date`, `end_date`, `status`, `date_added`) VALUES
(1, 'CNU3lF4r', 'p', '20.0000', '50.0000', '2013-05-06', '2013-05-10', '1', '2013-04-17 07:19:18'),
(2, 'UMmR4n25', 'a', '20.0000', '0.0000', '2013-05-01', '2013-05-10', '1', '2013-05-01 12:43:15'),
(3, 'TMqpaNGl', 'p', '10.0000', '1000.0000', '2013-05-01', '2013-05-15', '1', '2013-05-01 12:43:32'),
(4, 'DPNVgXML', 'a', '55.0000', '65.0000', '2013-08-05', '2013-08-30', '1', '2013-05-15 09:59:23'),
(5, '5bhISM22', 'a', '343.0000', '3493.0000', '2013-05-15', '2013-05-16', '1', '2013-05-15 10:10:20'),
(6, 'uTfaEudm', 'p', '77.0000', '7.0000', '2013-05-15', '2013-05-22', '1', '2013-05-15 10:11:10'),
(7, 'CELAu6P1', 'p', '10.0000', '5000.0000', '2013-06-13', '2013-07-10', '1', '2013-06-10 09:35:05');

-- --------------------------------------------------------

--
-- Table structure for table `wl_coupon_customers`
--

DROP TABLE IF EXISTS `wl_coupon_customers`;
CREATE TABLE IF NOT EXISTS `wl_coupon_customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `name` varchar(150) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(80) COLLATE utf8_bin DEFAULT NULL,
  `description` text COLLATE utf8_bin,
  `coupon_id` int(11) NOT NULL,
  `status` enum('0','1','2') COLLATE utf8_bin NOT NULL DEFAULT '0' COMMENT '1=used , 0=unused,2=multiple use',
  `receive_on` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `wl_coupon_customers`
--

INSERT INTO `wl_coupon_customers` (`id`, `customer_id`, `name`, `email`, `description`, `coupon_id`, `status`, `receive_on`) VALUES
(1, 1, 'dk maurya', 'dkm@gmail.com', NULL, 1, '0', '2013-04-17 09:54:48'),
(2, 9, 'dkm maurya', 'weblink.dkm14@gmail.com', NULL, 3, '0', '2013-05-13 05:46:16');

-- --------------------------------------------------------

--
-- Table structure for table `wl_currencies`
--

DROP TABLE IF EXISTS `wl_currencies`;
CREATE TABLE IF NOT EXISTS `wl_currencies` (
  `currency_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(32) COLLATE utf8_bin NOT NULL DEFAULT '',
  `code` varchar(3) COLLATE utf8_bin NOT NULL DEFAULT '',
  `symbol_left` varchar(12) COLLATE utf8_bin NOT NULL,
  `symbol_right` varchar(12) COLLATE utf8_bin NOT NULL,
  `decimal_place` char(1) COLLATE utf8_bin NOT NULL,
  `value` float(15,8) NOT NULL,
  `is_default` enum('Y','N') COLLATE utf8_bin NOT NULL DEFAULT 'N',
  `status` int(1) NOT NULL,
  `date_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`currency_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `wl_currencies`
--

INSERT INTO `wl_currencies` (`currency_id`, `title`, `code`, `symbol_left`, `symbol_right`, `decimal_place`, `value`, `is_default`, `status`, `date_modified`) VALUES
(1, 'US Dollar', 'USD', '$', '', '2', 1.00000000, 'Y', 1, '2010-10-30 09:59:24'),
(2, 'Pound Sterling', 'GBP', '£', '', '2', 1.60399997, 'N', 1, '2010-10-30 09:59:24'),
(3, 'Euro', 'EUR', '', '€', '2', 1.15020001, 'N', 1, '2010-10-30 09:59:24'),
(4, 'INR', 'INR', 'RS', '', '2', 69.76000214, 'N', 1, '2010-10-30 09:59:24');

-- --------------------------------------------------------

--
-- Table structure for table `wl_customers`
--

DROP TABLE IF EXISTS `wl_customers`;
CREATE TABLE IF NOT EXISTS `wl_customers` (
  `customers_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(80) NOT NULL COMMENT 'customer  email  id used as username',
  `password` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(10) DEFAULT NULL,
  `first_name` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` enum('M','F') CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT 'M',
  `customer_photo` varchar(32) DEFAULT NULL,
  `phone_number` varchar(32) DEFAULT NULL,
  `mobile_number` varchar(255) DEFAULT NULL,
  `fax_number` varchar(32) DEFAULT NULL,
  `actkey` varchar(32) NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '0=Inactive,1=Active,2=Deleted ',
  `is_verified` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=unverfied,1=verfied',
  `login_type` enum('normal','facebook','twitter') NOT NULL DEFAULT 'normal',
  `account_created_date` varchar(255) DEFAULT NULL,
  `current_login` varchar(255) DEFAULT NULL,
  `last_login_date` varchar(255) DEFAULT NULL,
  `ip_address` varchar(25) NOT NULL,
  `is_blocked` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=unblocked,1=blocked',
  `block_time` varchar(255) DEFAULT NULL,
  `number_of_login_try` int(4) NOT NULL DEFAULT '0',
  `father_name` varchar(255) DEFAULT NULL,
  `caddress` text,
  `paddress` text,
  `nationality` varchar(255) DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `heducation` varchar(255) DEFAULT NULL,
  `occupation` varchar(255) DEFAULT NULL,
  `display` enum('0','1') NOT NULL DEFAULT '0',
  `designation` varchar(255) DEFAULT NULL,
  `fb` varchar(255) DEFAULT NULL,
  `gm` varchar(255) DEFAULT NULL,
  `tw` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`customers_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wl_customers`
--

INSERT INTO `wl_customers` (`customers_id`, `user_name`, `password`, `title`, `first_name`, `last_name`, `gender`, `customer_photo`, `phone_number`, `mobile_number`, `fax_number`, `actkey`, `status`, `is_verified`, `login_type`, `account_created_date`, `current_login`, `last_login_date`, `ip_address`, `is_blocked`, `block_time`, `number_of_login_try`, `father_name`, `caddress`, `paddress`, `nationality`, `dob`, `heducation`, `occupation`, `display`, `designation`, `fb`, `gm`, `tw`) VALUES
(6, 'admin@gmail.com', 'admin123', NULL, 'sushant kumar', '0', 'M', 'IMG_20140831_1638335401G0Q.jpg', '12345678', '1234567890', NULL, '75d23af433e0cea4c0e45a56dba18b30', '1', '1', 'normal', '2017-09-22 11:40:26', '2018-04-14 17:44:31', '2018-04-14 17:43:47', '::1', '0', NULL, 0, 'member_image', 'form_open_multipart', 'form_open_multipart', 'Iceland', '09/04/2017', 'rfdfdad', 'Executive Member', '1', 'test', 'https://www.facebook.com/', 'https://www.facebook.com/', 'https://www.facebook.com/'),
(7, 'admin1@gmail.com', 'admin123', NULL, 'sushant kumar', '0', 'M', 'imagesmbbb.jpg', '12345678', '1234567890', NULL, '75d23af433e0cea4c0e45a56dba18b30', '1', '1', 'normal', '2017-09-22 11:40:26', '2017-09-22 11:40:26', NULL, '::1', '0', NULL, 0, 'member_image', 'form_open_multipart', 'form_open_multipart', 'Iceland', '09/04/2017', 'rfdfdad', 'Executive Member', '1', 'test', 'https://www.facebook.com/', 'https://www.facebook.com/', 'https://www.facebook.com/'),
(8, '1@gmail.com', 'admin123', NULL, 'sushant', '0', 'M', 'Cp5BRf4W8AAQt4vspdL.jpg', '123456789', '123456789', NULL, '695ebed04dd1f67f67eb3f853f3be728', '1', '1', 'normal', '2017-11-16 09:39:28', '2017-11-16 09:39:28', NULL, '::1', '0', NULL, 0, 'test', 'test', 'test', 'India', '10/10/1992', 'mca', 'test', '0', 'test', '#', '#', '#'),
(9, 'sushantroy111@gmail.com', '', NULL, 'sushant kumar', '0', 'M', NULL, '7503066930', NULL, NULL, 'aa979292a59d014b413848477611ea96', '1', '1', 'normal', '2018-10-26 07:22:14', '2018-12-09 11:59:00', '2018-12-09 11:49:00', '::1', '0', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wl_customers_address_book`
--

DROP TABLE IF EXISTS `wl_customers_address_book`;
CREATE TABLE IF NOT EXISTS `wl_customers_address_book` (
  `address_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `name` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `zipcode` varchar(25) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `fax` varchar(50) DEFAULT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `country` varchar(80) NOT NULL,
  `reciv_date` datetime NOT NULL,
  `address_type` enum('Bill','Ship') NOT NULL,
  `default_status` enum('Y','N') NOT NULL DEFAULT 'N',
  PRIMARY KEY (`address_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wl_customers_address_book`
--

INSERT INTO `wl_customers_address_book` (`address_id`, `customer_id`, `name`, `address`, `zipcode`, `phone`, `fax`, `city`, `state`, `country`, `reciv_date`, `address_type`, `default_status`) VALUES
(1, 2, 'dkms', 's-62 shalimar  garden bill1', '2010051', '75675675671', NULL, 'New delhi1', 'Delhi1', 'India', '2013-04-18 11:58:50', 'Bill', 'Y'),
(2, 2, 'dkms', 's-62 shalimar  garden bill1', '2010051', '75675675671', NULL, 'New delhi1', 'Delhi1', 'India', '2013-04-18 11:58:50', 'Ship', 'Y'),
(3, 6, 'bill dkm', 's-62 shalimar  garden bill', '201005 bill', '7567567567 bill', NULL, 'New delhi  bill', 'Delhi bill', 'India', '2013-04-18 12:04:51', 'Bill', 'N'),
(4, 6, 'ship dkm', 's-62 shalimar  garden ship', 'ship dkm', 'ship dkm', NULL, 'New delhi  ship', 'delhi  ship', 'India', '2013-04-18 12:04:51', 'Ship', 'N'),
(5, 7, 'mk', 's-68 shalimar garden', '201005', '7567567567', NULL, 'Ghazibad', 'Uttar pradesh', 'India', '2013-05-08 07:27:29', 'Bill', 'Y'),
(6, 7, 'mk', 's-68 shalimar garden', '201005', '7567567567', NULL, 'Ghazibad', 'Uttar pradesh', 'India', '2013-05-08 07:27:29', 'Ship', 'Y'),
(7, 8, 'din', 's-62 shalimar', '201005', '7567567567', NULL, 'Ghazibad', 'Uttar pradesh', 'India', '2013-05-09 12:06:12', 'Bill', 'Y'),
(8, 8, 'din', 's-62 shalimar', '201005', '7567567567', NULL, 'Ghazibad', 'Uttar pradesh', 'India', '2013-05-09 12:06:12', 'Ship', 'Y'),
(9, 9, 'dkm', 's-62 shalimar', '201005', '7567567567', NULL, 'Ghazibad', 'Uttar pradesh', 'India', '2013-05-09 12:08:22', 'Bill', 'Y'),
(10, 9, 'dkm', 's-62 shalimar', '201005', '7567567567', NULL, 'Ghazibad', 'Uttar pradesh', 'India', '2013-05-09 12:08:22', 'Ship', 'Y'),
(11, 3, 'sdffs', 'sfsadfsda', '32432423', '324242', NULL, 'sdfsdafasd', 'sdffsd', 'Angola', '2013-07-05 11:14:17', 'Bill', 'Y'),
(12, 3, 'sdffsdsfsafsafsda', 'sfsadfsdadsfsfasdfas', '32432423', '32424234324234', NULL, 'sdfsdafasddfsdfsad', 'sdffsddsfsafsdfs', 'Angola', '2013-07-05 11:14:17', 'Ship', 'Y'),
(13, 4, 'dsfsad', 'fdsfas', '34234234234', 'dsfsafs', NULL, 'dsfsafs', 'sdfafs', 'Australia', '2013-07-17 07:34:15', 'Bill', 'Y'),
(14, 4, 'dsfsad', 'fdsfas', '34234234234', 'dsfsafs', NULL, 'dsfsafs', 'sdfafs', 'Australia', '2013-07-17 07:34:15', 'Ship', 'Y'),
(15, 5, 'ddddd', 'sssssss', '434423', 'gggggg', NULL, 'dsfsdfas', 'sdfsdfas', 'Andorra', '2013-07-22 12:28:31', 'Bill', 'Y'),
(16, 5, 'ddddddsffas', 'ssssssssdfsdafd', '434423343432', 'ggggggsdffsdf', NULL, 'dsfsdfasdsfsdfds', 'sdfsdfasdsfsad', 'Angola', '2013-07-22 12:28:31', 'Ship', 'Y'),
(17, 9, 'tesst', 'test', 'test', 'tezt', NULL, 'test', 'test', 'India', '2018-10-26 07:22:14', 'Bill', 'Y'),
(18, 9, 'tesst', 'test', 'test', 'tezt', NULL, 'test', 'test', 'India', '2018-10-26 07:22:14', 'Ship', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `wl_enquiry`
--

DROP TABLE IF EXISTS `wl_enquiry`;
CREATE TABLE IF NOT EXISTS `wl_enquiry` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` enum('1','2','3') NOT NULL DEFAULT '3' COMMENT '1=Enquiries,2=Suggestioin,3=Contact us',
  `product_service` varchar(220) DEFAULT NULL,
  `email` varchar(80) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `company_name` varchar(60) DEFAULT NULL,
  `country` varchar(200) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `mobile` varchar(100) DEFAULT NULL,
  `fax_number` varchar(30) DEFAULT NULL,
  `address` varchar(220) DEFAULT NULL,
  `zipcode` varchar(10) DEFAULT NULL,
  `message` text NOT NULL,
  `status` enum('1','2') NOT NULL,
  `reply_status` enum('Y','N') NOT NULL DEFAULT 'N',
  `receive_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wl_enquiry`
--

INSERT INTO `wl_enquiry` (`id`, `type`, `product_service`, `email`, `first_name`, `last_name`, `company_name`, `country`, `state`, `city`, `phone_number`, `mobile`, `fax_number`, `address`, `zipcode`, `message`, `status`, `reply_status`, `receive_date`) VALUES
(10, '3', NULL, 'test@gmail.com', 'Manosh', NULL, NULL, NULL, NULL, NULL, '342423', '42343242', NULL, NULL, NULL, 'testing', '1', 'N', '2013-07-23 08:32:24');

-- --------------------------------------------------------

--
-- Table structure for table `wl_events`
--

DROP TABLE IF EXISTS `wl_events`;
CREATE TABLE IF NOT EXISTS `wl_events` (
  `events_id` int(11) NOT NULL AUTO_INCREMENT,
  `events_title` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `start_time` varchar(255) DEFAULT NULL,
  `ampm` varchar(255) DEFAULT NULL,
  `end_time` varchar(255) DEFAULT NULL,
  `pmam` varchar(255) DEFAULT NULL,
  `events_url` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort_description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `events_description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `publisher` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort_order` int(11) DEFAULT NULL,
  `status` enum('1','0') DEFAULT '1',
  `recv_date` datetime DEFAULT NULL,
  `featured_events` enum('Y','N') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N',
  `up_date` datetime DEFAULT NULL,
  PRIMARY KEY (`events_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wl_events`
--

INSERT INTO `wl_events` (`events_id`, `events_title`, `location`, `start_time`, `ampm`, `end_time`, `pmam`, `events_url`, `sort_description`, `events_description`, `publisher`, `sort_order`, `status`, `recv_date`, `featured_events`, `up_date`) VALUES
(1, 'dddddddddddd', 'delhi', '3', 'AM', '6', 'AM', NULL, NULL, '<p>aaaaaaaaa</p>', NULL, NULL, '1', '2017-09-22 12:38:57', 'N', NULL),
(2, 'This Is Testing Email news', 'gurgaon', '3', 'AM', '4', 'AM', NULL, NULL, '<p>This Is Testing Email newsThis Is Testing Email newsThis Is Testing Email newsThis Is Testing Email newsThis Is Testing Email newsThis Is Testing Email newsThis Is Testing Email newsThis Is Testing Email newsThis Is Testing Email newsThis Is Testing Email newsThis Is Testing Email newsThis Is Testing Email newsThis Is Testing Email newsThis Is Testing Email newsThis Is Testing Email newsThis Is Testing Email newsThis Is Testing Email newsThis Is Testing Email newsThis Is Testing Email newsThis Is Testing Email newsThis Is Testing Email newsThis Is Testing Email newsThis Is Testing Email newsThis Is Testing Email newsThis Is Testing Email newsThis Is Testing Email newsThis Is Testing Email newsThis Is Testing Email newsThis Is Testing Email newsThis Is Testing Email newsThis Is Testing Email newsThis Is Testing Email news</p>', NULL, NULL, '1', '2017-09-22 12:33:07', 'N', NULL),
(3, 'test', 'test', '1', 'AM', '1', 'AM', NULL, NULL, '<p>test</p>', NULL, NULL, '1', '2017-09-22 12:40:34', 'N', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wl_event_media`
--

DROP TABLE IF EXISTS `wl_event_media`;
CREATE TABLE IF NOT EXISTS `wl_event_media` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `events_id` int(10) UNSIGNED NOT NULL,
  `color_id` int(11) DEFAULT NULL,
  `media_type` enum('photo','video','pdf') NOT NULL DEFAULT 'photo',
  `media` varchar(255) NOT NULL,
  `is_default` enum('Y','N') NOT NULL DEFAULT 'N',
  `sort_order` int(11) DEFAULT NULL,
  `media_date_added` datetime NOT NULL,
  `media_status` enum('0','1','2') DEFAULT '1' COMMENT '0=inactive,1=active,2=delete',
  PRIMARY KEY (`id`),
  KEY `idx_products_images_products_id` (`events_id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wl_event_media`
--

INSERT INTO `wl_event_media` (`id`, `events_id`, `color_id`, `media_type`, `media`, `is_default`, `sort_order`, `media_date_added`, `media_status`) VALUES
(30, 3, NULL, 'photo', 'Cp5BRf4W8AAQt4vjHAv.jpg', 'N', NULL, '2017-09-22 12:40:34', '1'),
(29, 3, NULL, 'photo', 'Cp5BRf4W8AAQt4vDGkI.jpg', 'Y', NULL, '2017-09-22 12:40:18', '1'),
(28, 1, NULL, 'photo', 'imagesk2QV.jpg', 'N', NULL, '2017-09-22 12:38:57', '1'),
(27, 1, NULL, 'photo', 'Cp5BRf4W8AAQt4vK2XP.jpg', 'N', NULL, '2017-09-22 12:38:02', '1');

-- --------------------------------------------------------

--
-- Table structure for table `wl_faq`
--

DROP TABLE IF EXISTS `wl_faq`;
CREATE TABLE IF NOT EXISTS `wl_faq` (
  `faq_id` int(11) NOT NULL AUTO_INCREMENT,
  `faq_parent_id` int(11) NOT NULL DEFAULT '0',
  `faq_question` varchar(225) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `faq_answer` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sort_order` int(11) DEFAULT '0',
  `status` enum('1','2','3') NOT NULL DEFAULT '1',
  `faq_date_added` datetime NOT NULL,
  PRIMARY KEY (`faq_id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wl_faq`
--

INSERT INTO `wl_faq` (`faq_id`, `faq_parent_id`, `faq_question`, `faq_answer`, `sort_order`, `status`, `faq_date_added`) VALUES
(8, 0, 'dkm', 'ds dsadasdas das', 2, '1', '2013-05-01 09:58:07'),
(13, 0, 'new faq', 'dsfs sf sa', 1, '1', '2013-06-10 09:10:16'),
(14, 0, 'sdfsda', '<p>sdfsfsa</p>', 4, '1', '2013-07-16 07:25:34'),
(15, 0, 'sdfsfsa', '<p>fsfsfa</p>', 5, '1', '2013-07-16 07:25:39'),
(16, 0, 'sdfsdfsda', '<p>fsdfsfasfsf</p>', 3, '1', '2013-07-16 07:25:45'),
(17, 0, 'sdffsdf', '<p>sdfsf</p>', 4, '1', '2013-07-16 07:25:50'),
(18, 0, 'sfafasf', '<p>sdfsdfsa</p>', 4, '', '2013-07-16 07:25:55'),
(19, 0, 'sdffsfsa', '<p>sdfsdffa</p>', 3, '1', '2013-07-16 07:26:01'),
(20, 0, 'sdfss\"fsdf', 'dsfsdfa', 3, '1', '2013-07-17 06:04:22');

-- --------------------------------------------------------

--
-- Table structure for table `wl_forum_category`
--

DROP TABLE IF EXISTS `wl_forum_category`;
CREATE TABLE IF NOT EXISTS `wl_forum_category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(100) NOT NULL,
  `cat_image` varchar(100) DEFAULT NULL,
  `cat_status` enum('0','1','2') NOT NULL DEFAULT '1' COMMENT '0=Inactive,1=Active,2=Deleted',
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wl_forum_category`
--

INSERT INTO `wl_forum_category` (`cat_id`, `cat_name`, `cat_image`, `cat_status`) VALUES
(1, 'Announcements', NULL, '1'),
(2, 'Competitions', NULL, '1'),
(3, 'Eye Health', NULL, '1'),
(4, 'Fashions', NULL, '1'),
(5, 'Getting involved in GD', NULL, '1'),
(6, 'Glasses Direct', NULL, '1'),
(7, 'How we help charitably', NULL, '1'),
(8, 'In The Press', NULL, '1'),
(9, 'Optical Industry', NULL, '1'),
(10, 'Products', NULL, '1'),
(11, 'Random', NULL, '1'),
(12, 'Research', NULL, '1'),
(13, 'Saving Money', NULL, '1'),
(14, 'Technology', NULL, '1'),
(15, 'Videos1', NULL, '2'),
(16, 'Announcement', 'double_glazingJQ7k.jpg', '1'),
(17, 'asdsa', '', '2'),
(18, 'sssss', '', '1'),
(19, 'ssdfsa', '', '1'),
(20, 'test', NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `wl_forum_topics`
--

DROP TABLE IF EXISTS `wl_forum_topics`;
CREATE TABLE IF NOT EXISTS `wl_forum_topics` (
  `topicID` int(11) NOT NULL AUTO_INCREMENT,
  `created_by` enum('A','U') NOT NULL DEFAULT 'A' COMMENT 'A=admin,U=user',
  `cat_id` int(11) DEFAULT '0',
  `topicTitle` text NOT NULL,
  `topicDesc` text NOT NULL,
  `blog_image` varchar(100) DEFAULT NULL,
  `views` int(11) NOT NULL DEFAULT '0',
  `memberID` int(11) NOT NULL DEFAULT '0',
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '0=Inactive,1=Active,2=Deleted',
  `recv_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`topicID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wl_forum_topics`
--

INSERT INTO `wl_forum_topics` (`topicID`, `created_by`, `cat_id`, `topicTitle`, `topicDesc`, `blog_image`, `views`, `memberID`, `name`, `email`, `status`, `recv_date`) VALUES
(1, 'A', 1, 'topic1', 'test<br />', 'c3vHjn.jpg', 0, 0, '', '', '1', '2013-06-19 11:53:50'),
(2, 'A', 1, 'aaaaa', 'ddsfdsaf<br />', NULL, 0, 0, '', '', '2', '2013-06-19 11:55:34'),
(3, 'A', 1, 'new topic', 'test<br />', 'dl-pro3vYIO.jpg', 0, 0, '', '', '1', '2013-06-19 12:04:07'),
(4, 'A', 1, 'sdfdsa', '<p>ountains to vast desert to relaxing beach resorts and hot springs. Float in the most buoyant body of water on the earth. Visit Bedouin camps and learn their customs. Splash through desert wadis. Wander through Roman ruins. Scuba dive with a turtle in the Red Sea. Eat mezze and learn to make it yourself. Gallountains to vast desert to relaxing beach resorts and hot springs. Float in the most buoyant body of water on the earth. Visit Bedouin camps and learn their customs. Splash through desert wadis. Wander through Roman ruins. Scuba dive with a turtle in the Red Sea. Eat mezze and learn to make it yourself. Gallountains to vast desert to relaxing beach resorts and hot springs. Float in the most buoyant body of water on the earth. Visit Bedouin camps and learn their customs. Splash through desert wadis. Wander through Roman ruins. Scuba dive with a turtle in the Red Sea. Eat mezze and learn to make it yourself. Gallountains to vast desert to relaxing beach resorts and hot springs. Float in the most buoyant body of water on the earth. Visit Bedouin camps and learn their customs. Splash through desert wadis. Wander through Roman ruins. Scuba dive with a turtle in the Red Sea. Eat mezze and learn to make it yourself. Gallountains to vast desert to relaxing beach resorts and hot springs. Float in the most buoyant body of water on the earth. Visit Bedouin camps and learn their customs. Splash through desert wadis. Wander through Roman ruins. Scuba dive with a turtle in the Red Sea. Eat mezze and learn to make it yourself. Gall</p>', '64vlt.gif', 0, 0, '', '', '1', '2013-06-19 12:13:14');

-- --------------------------------------------------------

--
-- Table structure for table `wl_forum_topic_responses`
--

DROP TABLE IF EXISTS `wl_forum_topic_responses`;
CREATE TABLE IF NOT EXISTS `wl_forum_topic_responses` (
  `replyID` int(11) NOT NULL AUTO_INCREMENT,
  `topicID` int(11) NOT NULL DEFAULT '0',
  `memberID` int(11) DEFAULT NULL,
  `name` varchar(100) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `comments` text NOT NULL,
  `recv_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '0=Inactive,1=Active,2=Deleted',
  PRIMARY KEY (`replyID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wl_forum_topic_responses`
--

INSERT INTO `wl_forum_topic_responses` (`replyID`, `topicID`, `memberID`, `name`, `email`, `comments`, `recv_date`, `status`) VALUES
(10, 4, NULL, 'sss', 'test@gmail.com', 'dsfs sdfsd', '0000-00-00 00:00:00', '1'),
(11, 4, NULL, 'sdfsfsd', 'testss@gmail.com', 'sd fsfsd af sa', '0000-00-00 00:00:00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `wl_gallery`
--

DROP TABLE IF EXISTS `wl_gallery`;
CREATE TABLE IF NOT EXISTS `wl_gallery` (
  `gallery_id` int(11) NOT NULL AUTO_INCREMENT,
  `gallery_title` varchar(100) DEFAULT NULL,
  `gallery_image` varchar(200) DEFAULT NULL,
  `status` enum('1','0') DEFAULT '1' COMMENT '1=Actice,0=Inactive',
  `post_date` datetime DEFAULT NULL,
  PRIMARY KEY (`gallery_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wl_gallery`
--

INSERT INTO `wl_gallery` (`gallery_id`, `gallery_title`, `gallery_image`, `status`, `post_date`) VALUES
(2, 'gallery2', 'Cp5BRf4W8AAQt4vOGa1.jpg', '1', '2013-08-21 05:52:24');

-- --------------------------------------------------------

--
-- Table structure for table `wl_invite_friends`
--

DROP TABLE IF EXISTS `wl_invite_friends`;
CREATE TABLE IF NOT EXISTS `wl_invite_friends` (
  `invite_id` int(11) NOT NULL AUTO_INCREMENT,
  `friend_name` varchar(100) NOT NULL,
  `friend_email` varchar(100) NOT NULL,
  `your_name` varchar(100) NOT NULL,
  `your_email` varchar(100) NOT NULL,
  `receive_date` datetime NOT NULL,
  PRIMARY KEY (`invite_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wl_invite_friends`
--

INSERT INTO `wl_invite_friends` (`invite_id`, `friend_name`, `friend_email`, `your_name`, `your_email`, `receive_date`) VALUES
(1, 'dk', 'dk@gmail.com', 'ss', 'ss@gmail.com', '2013-05-06 12:12:19'),
(2, 'dk', 'dkm@gmail.com', 'ss', 'ss@gmail.com', '2013-05-06 12:13:12'),
(3, 'sdfsa', 'test@gmail.com', 'sdfsa', 'test@gmail.com', '2013-07-03 12:48:31');

-- --------------------------------------------------------

--
-- Table structure for table `wl_length_class`
--

DROP TABLE IF EXISTS `wl_length_class`;
CREATE TABLE IF NOT EXISTS `wl_length_class` (
  `length_class_id` int(11) NOT NULL AUTO_INCREMENT,
  `length_title` varchar(32) COLLATE utf8_bin NOT NULL,
  `length_unit` varchar(4) COLLATE utf8_bin NOT NULL,
  `length_value` decimal(15,8) NOT NULL,
  PRIMARY KEY (`length_class_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `wl_meta_tags`
--

DROP TABLE IF EXISTS `wl_meta_tags`;
CREATE TABLE IF NOT EXISTS `wl_meta_tags` (
  `meta_id` int(11) NOT NULL AUTO_INCREMENT,
  `page_url` varchar(200) NOT NULL,
  `meta_title` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` varchar(160) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `meta_keyword` varchar(160) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `meta_date_added` datetime NOT NULL,
  PRIMARY KEY (`meta_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wl_meta_tags`
--

INSERT INTO `wl_meta_tags` (`meta_id`, `page_url`, `meta_title`, `meta_description`, `meta_keyword`, `meta_date_added`) VALUES
(3, 'pages/feedback', 'feedback', 'feedback', 'feedback', '2013-04-09 08:56:36'),
(13, 'cxx', 'xcxx', 'xcx', 'cxcx', '2014-02-07 16:43:34');

-- --------------------------------------------------------

--
-- Table structure for table `wl_news`
--

DROP TABLE IF EXISTS `wl_news`;
CREATE TABLE IF NOT EXISTS `wl_news` (
  `news_id` int(11) NOT NULL AUTO_INCREMENT,
  `news_title` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `news_image` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `news_url` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort_description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `news_description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `publisher` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort_order` int(11) DEFAULT NULL,
  `status` enum('1','0') DEFAULT '1',
  `recv_date` datetime DEFAULT NULL,
  `featured_news` enum('Y','N') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N',
  `up_date` datetime DEFAULT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wl_news`
--

INSERT INTO `wl_news` (`news_id`, `news_title`, `news_image`, `news_url`, `sort_description`, `news_description`, `publisher`, `sort_order`, `status`, `recv_date`, `featured_news`, `up_date`) VALUES
(1, 'dddddddddddd', 'Cp5BRf4W8AAQt4vAVm9.jpg', NULL, NULL, '<p>aaaaaaaaa</p>', NULL, NULL, '1', '2013-07-05 04:55:35', 'N', NULL),
(2, 'test', 'images2nnB.jpg', NULL, NULL, '<p>test</p>', NULL, NULL, '1', '2017-09-20 16:04:57', 'N', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wl_newsletters`
--

DROP TABLE IF EXISTS `wl_newsletters`;
CREATE TABLE IF NOT EXISTS `wl_newsletters` (
  `subscriber_id` int(11) NOT NULL AUTO_INCREMENT,
  `subscriber_name` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `subscriber_email` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('0','1','2') DEFAULT '1' COMMENT '1=Active,0=Deactive,2=Deleted',
  `mail_status` enum('1','0') DEFAULT '0' COMMENT '1=Yes,0=No',
  `subscribe_date` datetime DEFAULT NULL,
  `mail_sent_date` datetime DEFAULT NULL,
  PRIMARY KEY (`subscriber_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wl_newsletters`
--

INSERT INTO `wl_newsletters` (`subscriber_id`, `subscriber_name`, `subscriber_email`, `status`, `mail_status`, `subscribe_date`, `mail_sent_date`) VALUES
(6, 'amit', 'amit@gmail.com', '1', '0', '2014-02-02 12:28:08', NULL),
(7, 'sushntadf', 'afdsa@gddsf.com', '1', '0', '2017-10-31 06:26:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wl_newsletter_groups`
--

DROP TABLE IF EXISTS `wl_newsletter_groups`;
CREATE TABLE IF NOT EXISTS `wl_newsletter_groups` (
  `newsletter_groups_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('1','0') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '1' COMMENT '1=Actice,0=Inactive',
  `groups_created_date` datetime NOT NULL,
  PRIMARY KEY (`newsletter_groups_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wl_newsletter_groups`
--

INSERT INTO `wl_newsletter_groups` (`newsletter_groups_id`, `group_name`, `status`, `groups_created_date`) VALUES
(3, 'Whole sellers', '1', '2013-04-09 11:59:17'),
(4, 'indian', '1', '2013-04-10 07:40:08'),
(5, 'wlindia', '1', '2013-05-06 09:53:09');

-- --------------------------------------------------------

--
-- Table structure for table `wl_newsletter_group_subscriber`
--

DROP TABLE IF EXISTS `wl_newsletter_group_subscriber`;
CREATE TABLE IF NOT EXISTS `wl_newsletter_group_subscriber` (
  `group_subscriber_id` int(11) NOT NULL AUTO_INCREMENT,
  `newsletter_groups_id` int(11) NOT NULL,
  `subscriber_id` int(11) NOT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`group_subscriber_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wl_order`
--

DROP TABLE IF EXISTS `wl_order`;
CREATE TABLE IF NOT EXISTS `wl_order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `customers_id` int(11) NOT NULL DEFAULT '0',
  `invoice_number` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `phone` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'In case of user login  user_name  ',
  `billing_name` varchar(100) DEFAULT NULL,
  `billing_address` varchar(223) DEFAULT NULL,
  `billing_phone` varchar(50) DEFAULT NULL,
  `billing_fax` varchar(50) DEFAULT NULL,
  `billing_zipcode` varchar(50) DEFAULT NULL,
  `billing_country` varchar(100) DEFAULT NULL,
  `billing_state` varchar(50) DEFAULT NULL,
  `billing_city` varchar(50) DEFAULT NULL,
  `shipping_name` varchar(100) DEFAULT NULL,
  `shipping_address` varchar(223) DEFAULT NULL,
  `shipping_phone` varchar(50) DEFAULT NULL,
  `shipping_fax` varchar(50) DEFAULT NULL,
  `shipping_zipcode` varchar(50) DEFAULT NULL,
  `shipping_country` varchar(100) DEFAULT NULL,
  `shipping_state` varchar(50) DEFAULT NULL,
  `shipping_city` varchar(50) DEFAULT NULL,
  `shipping_method` varchar(100) NOT NULL,
  `discount_coupon_id` varchar(40) DEFAULT NULL,
  `coupon_discount_amount` float(10,2) DEFAULT NULL,
  `shipping_amount` float(10,2) DEFAULT NULL,
  `total_amount` decimal(15,4) NOT NULL,
  `vat_amount` decimal(15,4) DEFAULT NULL,
  `tax_amount` varchar(50) DEFAULT NULL,
  `tax_type` varchar(50) DEFAULT NULL,
  `currency_code` char(3) NOT NULL,
  `currency_value` decimal(14,6) NOT NULL,
  `order_status` enum('Pending','Closed','Canceled','Delivered','Ready For Dispatch','Rejected','Deleted') NOT NULL DEFAULT 'Pending' COMMENT '''Pending'',''Closed'',''Canceled'',''Delivered'',''Ready For Dispatch'',''Rejected'',''Deleted''',
  `order_received_date` datetime DEFAULT '0000-00-00 00:00:00',
  `order_delivery_date` datetime DEFAULT '0000-00-00 00:00:00',
  `payment_method` varchar(200) DEFAULT NULL,
  `payment_status` enum('Paid','Unpaid') NOT NULL DEFAULT 'Unpaid',
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wl_order`
--

INSERT INTO `wl_order` (`order_id`, `customers_id`, `invoice_number`, `first_name`, `last_name`, `phone`, `email`, `billing_name`, `billing_address`, `billing_phone`, `billing_fax`, `billing_zipcode`, `billing_country`, `billing_state`, `billing_city`, `shipping_name`, `shipping_address`, `shipping_phone`, `shipping_fax`, `shipping_zipcode`, `shipping_country`, `shipping_state`, `shipping_city`, `shipping_method`, `discount_coupon_id`, `coupon_discount_amount`, `shipping_amount`, `total_amount`, `vat_amount`, `tax_amount`, `tax_type`, `currency_code`, `currency_value`, `order_status`, `order_received_date`, `order_delivery_date`, `payment_method`, `payment_status`) VALUES
(1, 0, 'Wl_1', 'dsfsfsa', NULL, NULL, 'test@gmail.com', 'sfsdfsfs', 'fsdfsd', 'sdsdfsdfs', NULL, 'sdfdfsda', 'Australia', 'sdffsd', 'fdsffsa', 'sfsdfsfs', 'fsdfsd', 'sdsdfsdfs', NULL, 'sdfdfsda', 'Australia', 'sdffsd', 'fdsffsa', 'Next Day Delivery Uk', '0', 0.00, 6.00, '90.0000', NULL, '2.00', '%', 'USD', '1.000000', 'Delivered', '2013-07-18 06:10:26', '0000-00-00 00:00:00', 'paypal', 'Unpaid'),
(2, 3, 'Wl_2', 'manishss', NULL, NULL, 'weblink.manish84@gmail.com', 'sdffs', 'sfsadfsda', '324242', NULL, '32432423', 'Angola', 'sdffsd', 'sdfsdafasd', 'sdffsdfa', 'fsdfsda', 'dsfsafs', NULL, '32423423423', 'Anguilla', 'sdfsdf', 'dsfsdfsd', 'Next Day Delivery Uk', '0', 0.00, 6.00, '30000.0000', NULL, '2.00', '%', 'USD', '1.000000', 'Deleted', '2013-07-18 06:43:26', '0000-00-00 00:00:00', 'paypal', 'Unpaid'),
(3, 0, 'Wl_3', 'fsdfsa', NULL, NULL, 'test@gmail.com', 'sdfsdfsda', 'dsfafas', '34432', NULL, '34242423', 'Austria', 'sdfsafs', 'sdfsdfsa', 'sdfsdfsda', 'dsfafas', '34432', NULL, '34242423', 'Austria', 'sdfsafs', 'sdfsdfsa', 'Pak shipping', '0', 0.00, 20.00, '30058.0000', NULL, '2.00', '%', 'USD', '1.000000', 'Deleted', '2013-07-22 11:10:03', '0000-00-00 00:00:00', '', 'Unpaid'),
(4, 3, 'Wl_4', 'manishss', NULL, NULL, 'weblink.manish84@gmail.com', 'sdffs', 'sfsadfsda', '324242', NULL, '32432423', 'Angola', 'sdffsd', 'sdfsdafasd', 'sdffsdfa', 'fsdfsda', 'dsfsafs', NULL, '32423423423', 'Anguilla', 'sdfsdf', 'dsfsdfsd', 'Standard UK Delivery (allow 3-5 working days)', '0', 0.00, 15.50, '58.0000', NULL, '2.00', '%', 'USD', '1.000000', 'Deleted', '2013-07-22 11:48:50', '0000-00-00 00:00:00', '', 'Unpaid'),
(5, 5, 'Wl_5', 'sdfsfsda', NULL, NULL, 'ddddd@gmail.com', 'ddddd', 'sssssss', 'gggggg', NULL, '434423', 'Andorra', 'sdfsdfas', 'dsfsdfas', 'ddddddsfsdfasddsfssafd', 'sssssssfdsfsdfsdsfdsaf', 'ggggggdsfsdafsfsa', NULL, '342423423', 'Saint Kitts and Nevis', 'sdfsdfasdsffsda', 'dsfsdfasfsfsdfsdsdffsda', 'Pak shipping', '0', 0.00, 20.00, '30000.0000', NULL, '2.00', '%', 'USD', '1.000000', 'Deleted', '2013-07-22 12:35:04', '0000-00-00 00:00:00', '', 'Unpaid'),
(6, 5, 'Wl_6', 'sdfsfsda', NULL, NULL, 'ddddd@gmail.com', 'ddddd', 'sssssss', 'gggggg', NULL, '434423', 'Andorra', 'sdfsdfas', 'dsfsdfas', 'ddddddsffas', 'ssssssssdfsdafd', 'ggggggsdffsdf', NULL, '434423343432', 'Angola', 'sdfsdfasdsfsad', 'dsfsdfasdsfsdfds', 'India Sjhipping', '0', 0.00, 23.00, '50.0000', NULL, '2.00', '%', 'USD', '1.000000', 'Deleted', '2013-07-22 13:02:59', '0000-00-00 00:00:00', 'paypal', 'Unpaid'),
(7, 0, 'Wl_7', 'sdsffsad', NULL, NULL, 'test@gmail.com', 'dsfas', 'dsfsad', '343242', NULL, '42432', 'American Samoa', 'dsffsda', 'dsfsa', 'dsfas', 'dsfsad', '343242', NULL, '42432', 'American Samoa', 'dsffsda', 'dsfsa', 'Pak shipping', '0', 0.00, 20.00, '30000.0000', NULL, '2.00', '%', 'USD', '1.000000', 'Deleted', '2013-07-23 04:11:20', '0000-00-00 00:00:00', '', 'Unpaid'),
(8, 0, 'Wl_8', 'dsfdsfs', NULL, NULL, 'test@gmail.com', 'sdfsfsad', 'dsffdsa', '342432', NULL, '3432423', 'Azerbaijan', 'dsfsdafsda', 'dsfafsda', 'sdfsfsad', 'dsffdsa', '342432', NULL, '3432423', 'Azerbaijan', 'dsfsdafsda', 'dsfafsda', 'Next Day Delivery Uk', '0', 0.00, 6.00, '30090.0000', NULL, '2.00', '%', 'USD', '1.000000', 'Deleted', '2013-07-23 07:07:57', '0000-00-00 00:00:00', 'paypal', 'Unpaid'),
(9, 3, 'Wl_9', 'manishss', NULL, NULL, 'weblink.manish84@gmail.com', 'sdffs', 'sfsadfsda', '324242', NULL, '32432423', 'Angola', 'sdffsd', 'sdfsdafasd', 'sdffsdsfsafsafsda', 'sfsadfsdadsfsfasdfas', '32424234324234', NULL, '32432423', 'Angola', 'sdffsddsfsafsdfs', 'sdfsdafasddfsdfsad', 'India Sjhipping', '0', 0.00, 23.00, '30090.0000', NULL, '2.00', '%', 'USD', '1.000000', 'Deleted', '2013-07-23 09:05:07', '0000-00-00 00:00:00', '', 'Unpaid'),
(10, 0, 'Wl_10', 'saddsa', NULL, NULL, 'r.ravinder2012@gmail.com', 'asdAD', 'DSA', 'ASdasDAS', NULL, 'sadsadsa', 'Australia', 'saddA', 'DSADSA', 'asdAD', 'DSA', 'ASdasDAS', NULL, 'sadsadsa', 'Australia', 'saddA', 'DSADSA', 'India Sjhipping', '0', 0.00, 23.00, '30000.0000', NULL, '2.00', '%', 'USD', '1.000000', 'Deleted', '2013-07-24 05:25:36', '0000-00-00 00:00:00', 'paypal', 'Paid'),
(11, 9, 'Wl_11', 'sushant kumar', NULL, NULL, 'sushantroy111@gmail.com', 'dkm', 's-62 shalimar', '7567567567', NULL, '201005', 'India', 'Uttar pradesh', 'Ghazibad', 'dkm', 's-62 shalimar', '7567567567', NULL, '201005', 'India', 'Uttar pradesh', 'Ghazibad', 'Pak shipping', '0', 0.00, 20.00, '45.0000', NULL, '2.00', '%', 'USD', '1.000000', 'Pending', '2018-10-26 07:23:06', '0000-00-00 00:00:00', '', 'Unpaid');

-- --------------------------------------------------------

--
-- Table structure for table `wl_orders_products`
--

DROP TABLE IF EXISTS `wl_orders_products`;
CREATE TABLE IF NOT EXISTS `wl_orders_products` (
  `orders_products_id` int(11) NOT NULL AUTO_INCREMENT,
  `orders_id` int(11) NOT NULL,
  `products_id` int(11) DEFAULT NULL,
  `product_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_code` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_image` longblob NOT NULL,
  `product_price` float(10,4) DEFAULT NULL,
  `quantity` int(10) NOT NULL DEFAULT '0',
  `shipping_charge` decimal(11,2) DEFAULT NULL,
  PRIMARY KEY (`orders_products_id`),
  KEY `order_id` (`orders_products_id`),
  KEY `order_no` (`orders_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wl_orders_products`
--

INSERT INTO `wl_orders_products` (`orders_products_id`, `orders_id`, `products_id`, `product_name`, `product_code`, `product_image`, `product_price`, `quantity`, `shipping_charge`) VALUES
(1, 1, 6, 'Embroidered and Embellished', '014', 0xffd8ffe000104a46494600010100000100010000fffe003b43524541544f523a2067642d6a7065672076312e3020287573696e6720494a47204a50454720763632292c207175616c697479203d2039300affdb0043000302020302020303030304030304050805050404050a070706080c0a0c0c0b0a0b0b0d0e12100d0e110e0b0b1016101113141515150c0f171816141812141514ffdb00430103040405040509050509140d0b0d1414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414ffc00011080040003203012200021101031101ffc4001f0000010501010101010100000000000000000102030405060708090a0bffc400b5100002010303020403050504040000017d01020300041105122131410613516107227114328191a1082342b1c11552d1f02433627282090a161718191a25262728292a3435363738393a434445464748494a535455565758595a636465666768696a737475767778797a838485868788898a92939495969798999aa2a3a4a5a6a7a8a9aab2b3b4b5b6b7b8b9bac2c3c4c5c6c7c8c9cad2d3d4d5d6d7d8d9dae1e2e3e4e5e6e7e8e9eaf1f2f3f4f5f6f7f8f9faffc4001f0100030101010101010101010000000000000102030405060708090a0bffc400b51100020102040403040705040400010277000102031104052131061241510761711322328108144291a1b1c109233352f0156272d10a162434e125f11718191a262728292a35363738393a434445464748494a535455565758595a636465666768696a737475767778797a82838485868788898a92939495969798999aa2a3a4a5a6a7a8a9aab2b3b4b5b6b7b8b9bac2c3c4c5c6c7c8c9cad2d3d4d5d6d7d8d9dae2e3e4e5e6e7e8e9eaf2f3f4f5f6f7f8f9faffda000c03010002110311003f00f992fbe1f787cfc05fed4870da928592401f3f31185e3f3a9bf661f87926a5e37d32fae2dcb58c6ede6330f940da475fc6ba2f0e7c2d6d43c1f3c5248be4213288b60566c46769dd8c9e40e0f1c7ad77bf0334b9be780c8ab6d68008c6070ecf9efd780dc1ed9af3e75a718735badbe47dfe152582adcaf5eb7e899e8bf1dbc05a2dedce8f7364624b610bb3b33f0a309c927a0ebf957c8d7be27d7f51d17c53e2bf0759580f0cf86ae2dedee2eafc1924bb925982208d139033f364e381eb815f53fed0bf0f7c65f1274eb6f06f83747b9d6279a389b51d5a358e38ade040bf2646d0ee77361064903e95c5fc11f84b7b77f0c5bc357f0b68ba35a6a70c97f7570815de64987ce5770e705106ec60eecfdd00cc715ca939eefa1e4bad5e5868e1a8e896efe773c43c3fe1c93c6fe1f37b75611595d9fde1480e62746e55d33c853c8c1e462bcf3c5fe05934d77210ed15fa27e3efd9efc1ff000e753d19fc197130d32e74e717163744b3c4fb936952dc8070e76f418c8eb5c8afecc975e2a66bbbeb558b4e7b779622d26d2e7f84903e60bd4f6ce300f35d8f114d53e796dd8fa3c3627930719629eda7ad8fcf68b492224e3b0a2bed097f64386391d3e53b491c6a0a07e4528ae0fade1fb3fb8e1f6f82f328fc3df196b925a1ba69636b95ca994260b2f707d73fe79c11d7fc2bd1bc53aaf8999bc21636f08b3fdec9e7ca7cbde410092d9c9c6ec0e8327eb5c1f8136dae9f3293cf35f55fc109f41d1ec266d2313cb247109cac9b9a59994f07fba41278c700679a315354acedabfb8f7b154e8e169cb921f17ddf33a5d3345f15783fc15af6a31dfb49a85eeaca96865811c25aa90d346463014e1d411c8047a5637c2ed335df036afaaea1796f716b6a51ee24bd11b4bb77302ca5172cfd7a80482726be93d1fc38a3c23671c9fbd4b4b56959db9259ba93efc5729ac6aeba4dab4f15942d3adac98b5b991616f2d9914c8ccc3e5da70d83d4e3ea3cc8e1e756a44f938e263469cd2b3e87cabe1df8b3aafc5f9f50d5750d2df4db5b79dad34ff3a1d933dba1f95a5e065c96638c70303b73db7c3f975293c4fa4698b7d3cb66d2485d646ce5042d8527fbabb548f7504e48cd7a358f87d7c47f68d2cde177bab46ba9eda58245905ca6104918666f2d182b7c8b9072183724b33e0d7c34bfb9d2b57d66e41b4bc7b59a1b259a3e507f14983ea46c1ea0b57b15e3054acd5dadbd4ee75a2b04fdb46ceda5fadf668be3c368464c6ac4f53bd79a2aee81e2b86eb42d3669a3b7f3a4b68ddf10ff0011504feb457cf45d2693e73e6dc669db94fcd9f09ebb1496f200e075e6bdfbf660f11dac9e23b8d35a41e7cb22ba03df3c715f10784f5ebab977b2b59eded6690b01737b2148611fde73fa01dc915d0787b46f1349e2376f0df8df4ed5b51b6c38b4b8b996039e33e548e1075feeb0af771d569b5ecd3d773f54a94a58b83a749736db5bd76ea7eb2fc49fda2f4ff879e1e6d3f48b956d7ae2da78adae05a497304524685b6bece849ce32c3a75ae0be1be9b3e9fe3a9b5dd6aef52bab9b96be6822bc4922542d7458ba83349c32a4436e7181d06703e32f0f78e0dd6b1269da94115af8825b748aead2ead119ad0ed95646dcea4f2b206465232724935f58fc31f19ddea90427ce84c36d6e2de195a30a640142ee24e4e4803246326ba2955508c51e265dc2f5ab4658ead1fddde4acdb4eeb4bfdfa5bc99d92eaefff000b01ef6520adc27964f71c9ff3f8d7a7cbae5ab68b129464bd39437018fef1002307271c7cbf41e82bc3fc79e2cf0fe9d1e942c19db58965659612ebb82281fbc39c051927be30324d574f8c8eda959785eeac2ef4bd4f52495f4d86fc2817663cf9bb70498f94eac06ec71c104f0e3a329d0935d35ff807a59e52a5568527f0cd2d22f4768dd5eddb47aeda1de1bbb5b726245b7444f942f98a30076fbf45729278a2e9e466934b81e424966f53dcd15f2bceba7e5ff00fcff95ff5ff000e7e3cfc4bf194dac78bb538a2c5859c57642db42bb1599491e6301d5f8eb5b1e0af143cde20b7b9bb7472d1f94197e5f98e3939efdbf1aeb3e31fc03d42ff005ab9d67c3aa2f5a772d3d90215c37765ce320fa75af27b7f0cf89345bc4f3344d4a3b989ff00763ecec403f962bebaa50a75e8f2aded63bb24cf2b6558c8d6bfbaa49fad9fe8af63e97d43c4b69acd8e8ad7ae8750d2a5fb2c736edb2cb6eeacfe513fc41193e51d848c3d31e8ebf123c45a0ea3149107d16eecc6d581a3f96252a464a91c1e720f5ce3d2be4ff0c9f13681e2eb1bbd66da6b6ba44f3ed639a304923a1dbedee2bd8be1df88a3d77c536e97f2cb75be404c2ca65fb4ccc711ab720e0b95dc49031b8e4579d49d5a12861af7f35fe7e47f40e55c4f97d6c3e2b30c45351a3772e56b5d95f4dbde69fab67d69f08f51fecdb4bef18f88267d53c4379fbbf32f9d1e14b4650199d4b07249054a8cfde40460e6b9bf89fe34b2d4fc4fe18d66c6216d7ba45e0fb27923e60b2e5194fa82ce18fd2bc83e267c59b6d46c7476b21676d35e9596f2dec27668adf69204018e010b219012073b54f3d6b1f5ef1369a3c3fa76af6da9196ecba2dc69c2525b764ee20801940c0f5ea307b57a352aa7274efa477f33e330aa9e6387ab9be295ebe239a3056f76114ad08f9276dde96ed767b343fb4a2c90c6cda646ecca096f9b93eb457ced15e78724891df4dbcdeca0b6d9b233ec49c9fc79a2b9561a8ff323e3e50a577ff09b3fbe5fe67fffd9, 90.0000, 1, NULL),
(2, 2, 7, 'Footwear Fetish', 'LP306512', 0xffd8ffe000104a46494600010100000100010000fffe003b43524541544f523a2067642d6a7065672076312e3020287573696e6720494a47204a50454720763632292c207175616c697479203d2039300affdb0043000302020302020303030304030304050805050404050a070706080c0a0c0c0b0a0b0b0d0e12100d0e110e0b0b1016101113141515150c0f171816141812141514ffdb00430103040405040509050509140d0b0d1414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414ffc0001108002e005003012200021101031101ffc4001f0000010501010101010100000000000000000102030405060708090a0bffc400b5100002010303020403050504040000017d01020300041105122131410613516107227114328191a1082342b1c11552d1f02433627282090a161718191a25262728292a3435363738393a434445464748494a535455565758595a636465666768696a737475767778797a838485868788898a92939495969798999aa2a3a4a5a6a7a8a9aab2b3b4b5b6b7b8b9bac2c3c4c5c6c7c8c9cad2d3d4d5d6d7d8d9dae1e2e3e4e5e6e7e8e9eaf1f2f3f4f5f6f7f8f9faffc4001f0100030101010101010101010000000000000102030405060708090a0bffc400b51100020102040403040705040400010277000102031104052131061241510761711322328108144291a1b1c109233352f0156272d10a162434e125f11718191a262728292a35363738393a434445464748494a535455565758595a636465666768696a737475767778797a82838485868788898a92939495969798999aa2a3a4a5a6a7a8a9aab2b3b4b5b6b7b8b9bac2c3c4c5c6c7c8c9cad2d3d4d5d6d7d8d9dae2e3e4e5e6e7e8e9eaf2f3f4f5f6f7f8f9faffda000c03010002110311003f00fd51c715f067ed23f1c3c4fa2fc76bef05daf88a65d3ee9a08ad4da3156b49e4c04076104804e18039c1cf24015f51fc7ef1678afc2de1427c1d144fabcd1c9e5b5c43be305769c162c0292bbf05b8ce3f1fcc5b95d7dfc7f0413aa5f789f55479efef1239a49632ff007847bc72483b4b2820e70a40dc0fcce69cd89ab4f0f42a2528be67aeb65dd2fd7e46f4ed14dc91f5cf803f694f14f84f54d26df5698eb5a45fc70330bb7ccb079888e5964e4903730c367eef18afb1b49d4a2d5ac62ba8b215c743d41e8457c377fe0d16a9a0693243b75d7b0b58e6b50c1fecb042858863d3cd930d9c7455039ce4fbdcbf1bf4ff00873e31d03c37a998a0b0d4a22cd72e7062949fae303e5cfa673dab6963a54b3058772f7546efc9b765fadc74a8ceb690577fe47ba628c52232c8a194e41190477a762be80e70a4c56178c67d76db4b12787ede1b9bdcb831ce401cc4e10f240c090c65b9fba1b193815c9e9737c48b7bed21b536d2e5b57b681aff00c85016294ca7cd009604a88bb8072fb78da4e003d2a9314d574762158138ce01edda9d81401e55fb42623f0d584cea9e4fda4c5234891300ad1b13ccaca8b9dbb72deb81c915f9dade2bb6f02fed1d3eb57a1253a75adcbdac0b14b12cd2b00b1a85909201f34b123e5c0247bfde1fb5978953c35e1dd06e0411dc4f1ddc93c4930250110b21254119e25239e39e99c63f2ffc537b16a7e3cb9d52d42c69e6397425dbe763b98e5d989c927a9af9c8e0aa2cda58b4b4e4b74df4f3bf435e65c9ca7e97fc37f0225f78cad2e2fae16f350b486e23bb90a8569599d268e5c7a6c9593e8303a71e1bfb41f81f5cf1e35e44331ea9e1779af6446466792dceddee81412d8015f039da8d804e14facfec477ba96bfe1fd4b58d5a696eef6675885c4a7398511046a3e87cce9ebf5adff889a1ea906b1e23f1068f72d6979a75c9b58a645566459a056270c083b5e4240231f31cd43853ad3a9552de4d5d768ab7e0d3f99db83a92a33e68bd56bf8ffc12afec8df13754d53408bc21e233befecad927d3af376e1776840db83df682b83dd48f4afa338af89be06f8e63d6fe08f87fc4e7ca83c4be14ba96c2f12265568fca72a23755036ee84a023181db8c1afacfc3df123c37e26f0ee9dad596b166f61a815482469d46e90ffcb3ebf7c1e0af5aeec0569252c3d57ef47f14f637cc2929cbeb34a368cb7f27ff000773cf7f6bcd4f58b1f81baedbe8b677d7325fa1b5ba9ac22f31edadb633cd211d94aa1427b7999ed5e01e1c9a1f15fc5d8ec2e923b5bad4f4682da07bf92559eced97488a5632c21c235b348ae0823efb673915f5b7c51d5f5ad2bc3f6ada15845a8cd737d0db5c24f692dd225bb9c48e638c86381f873cf15e1f6ff10fe2dcfa6691a8ddf8074f7fb4adbdbea366be1eb913436ccf7a27405a7e404b7b721769ff008f81c1c807b2a507527cf7edf87fc39d382cda384c34a87b3d5f36a9d9ebcbf7db976d9fde765fb3e6b7226a37fa1dd5b96ba82c6d3cbbd77c3bdb24318814c4466305241260b1f9e49471819f6fe315f3627c56f8b92685e13be83e1f41a77887558ae23d52dae34ab89040d1c92ac24c89262340a236c393bfce3b4aed35ed1f0d753f13eafa15dcfe2cb4b5b2bf5d46ee1822b489e206d9266489c876624b2aeec82010c302ba611e48dae78f89acb1151d44ad7b1f28fedbde3c3fdbd3699f763d36d84680ff0013c803b1fcb60fc0d7cb3f03be056bff0017fc5021b3b790dab4a24b8b80bf246bea49e3b63debf49fe327ecdde19f8d33c373aa4971657912edf3ed026580e9bb729ce2a7f87df05ef7e1b69b169da478b275b1439f25b4cb45ddeecca8093ee4e6b9aa53a92e654df2b7d7b2f25dfd76f3d8e74d1d5fc3ef03d9fc3ff0d5b69366a02c6a37151c13803fa554b8d24dd697e2b496da488dd5c975f300fde058a30acb8278f971ce0f06baab48a78a30269c4edfded9b6a596159a374701918608238229d2c2d3a14a3469ab463b14a6d5fccf872f7c15e0ff000878b75bd4adb45d42d6f35790b5f5ac4ce209dc9c96283b92493ce393c5721a5fc35d7bc61e24d4ecedf4ad33c27e169a489966b7b786dd191411c2050c64c9cee391c755fe2fb1fc57f048788e6792dfc55abe9aa4fcb02c56d346bf8c91173f8bd735a2feccb3e95ab45772f8f355ba810e5ad7ec1651abfb16116e1f8115e73c0c9cdc9eb73d18e2da8f2a97e63bf676f13f897c7ff0c2e6c35982f3c2fafe8ba9cfa74d71b1596ee346cc7711065e2391195802323dc75f45baf086af2851078aefedfe60ee4471b6e20e78c8e07006071d7d6b7b47d16cf43b5fb3d940b0c64ee6c725db006e627927000c9f41e957b15ed4534926799269bba395b0f0b6b7697d14d3f8b2f2f2142a5a092da150f839392aa3a8e38aea78a5c51e95449fffd9, 30000.0000, 1, NULL),
(3, 3, 7, 'Footwear Fetish', 'LP306512', 0xffd8ffe000104a46494600010100000100010000fffe003b43524541544f523a2067642d6a7065672076312e3020287573696e6720494a47204a50454720763632292c207175616c697479203d2039300affdb0043000302020302020303030304030304050805050404050a070706080c0a0c0c0b0a0b0b0d0e12100d0e110e0b0b1016101113141515150c0f171816141812141514ffdb00430103040405040509050509140d0b0d1414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414ffc00011080040005003012200021101031101ffc4001f0000010501010101010100000000000000000102030405060708090a0bffc400b5100002010303020403050504040000017d01020300041105122131410613516107227114328191a1082342b1c11552d1f02433627282090a161718191a25262728292a3435363738393a434445464748494a535455565758595a636465666768696a737475767778797a838485868788898a92939495969798999aa2a3a4a5a6a7a8a9aab2b3b4b5b6b7b8b9bac2c3c4c5c6c7c8c9cad2d3d4d5d6d7d8d9dae1e2e3e4e5e6e7e8e9eaf1f2f3f4f5f6f7f8f9faffc4001f0100030101010101010101010000000000000102030405060708090a0bffc400b51100020102040403040705040400010277000102031104052131061241510761711322328108144291a1b1c109233352f0156272d10a162434e125f11718191a262728292a35363738393a434445464748494a535455565758595a636465666768696a737475767778797a82838485868788898a92939495969798999aa2a3a4a5a6a7a8a9aab2b3b4b5b6b7b8b9bac2c3c4c5c6c7c8c9cad2d3d4d5d6d7d8d9dae2e3e4e5e6e7e8e9eaf2f3f4f5f6f7f8f9faffda000c03010002110311003f00fd51ed5f147ed0df1e7c5fa27c59d5bc136f792d912892e986d26303cae46523dc08c9704819ce5b68e2bebef1578c745f0569726a1adea56da6daa296df71205ce081819ea72ca38ee47ad7e597c4bf1e1f8a3f1b351f1cdf3c76da5db5d2c9636e655679fc9c186200127aed67feea9f56507e5f3b9d7bd1861dbe6e6be9dbcfe6745249ddcb63eb8f84bfb50dfd9eb161a378a9df50b2bf488dadfaa8f36369151915fa6e52245e7a83d73dbeabb6b84ba85268d8346ebb9587715f9d13e877296ba1de6d685a0d3b4c9836deb348a1123f6388f77d16bef5f02deaff0064456d24a9e78dccb1eef9b667ae3d326bd158b9c71b1c34968e2dfcd3b7e29fe06295d5ce9bb51eb4668af5c90f4a4ed55b50d56cf49844b7b77059c47761e79022fcaacedc9f455663e8149e82b16c3e24f84b54bbb6b4b3f1468b777572aaf04106a113bcaac4852aa1b2c0956c11d769f4a00e93b9a4f4a28a00f14fda93c356fe2df0745a6dfddc56ba74e9324c593748080ae8e9dbe564190700e7af183f9d10f8012fbe2ef86fc29a5c36707d9a064b78d6f1ae37b02c5bcf7da0093219d955147cbd3e6c9fd31f8f7f681a26946da4bd591eeca797a7471b4f28f2ddca29930aa30849e4120103922bf3ae1f1647e0ff00da2b52d7ae6eac2fa6d32cef1e33656fe44724cdb638d0ae4f3ba5c1396e173938af9355ab54cede1e52f7142e97dcba7cf77e9d4dacbd9dfa9f4adf6851b6bfa0f83ecda4b8b6d3a032cf7720f9aeae84646efa2f96a800fbbc8ed57fe2c7c5b93e12fc55f05ea2fbbec1e5bdac813a38523cc53f84831ef8f4aef7e15f8202f8974b69e737771a7c3796b3c927de766963b9573ee7ce3ff7d57cf9fb40784752f18e9da8289160b8f0bdc497573e7f01602423b93d954b23b1ecaacddb073c4519bc6d5c427b5a2be5ef3fcd7dc7a396b87b44aa6cf47f3d0fbf348d56db5cd32d350b2996e2d2ea259a1950f0e8c01047e06ae7ad7ccdfb1678e6fe5f0dddf8275827ed7a401359b939125bb1e80f7018f07d1c7a57d33eb5f4d86af1c4d28d58f539317869612bca8cba7e5d0e4fe27e8fa3ea9e11bd9b5dd426d2b4cb18a5b9b8bc859418a2f29d25cee5618313c8a78ce1b2304023cd231f0b3c37ae695670789dedeff48d16dee974e8a412493d9c52fda15dd3cb2eced26d9085c3b1030304831fedb7af368ff01f52b402e562d5a78ec6796d62691a38b0d2be428380c22d84f41bebc5bc13707c63f1361b5b7834d169ae5bdb41657d796727db2cae1343824127de5fdd90854a6013b89045675710e153d9af2fc6e7bb81ca2188c1bc5d56d25cdb7f7797c9f77a6fa1f66e89e29d33c44fb74fba173fe8b05e6555b1e54c18c4d9231c84638ea0632064675abc33f672d71e39b50d05adc3c71c104d06a1e67cd7112410c709f2f1f20307d9dbef1f99a4e9dfdd3d2baa9cb9e373c2c5d0fabd674d6c78d7ed3577636fe19d15754bcfb3e97f6f2f7510338370820942afee54b70ec8dc8c7ca3be2bf2e3e23dec973f16a7b9b9d43fb5b79665ba103c5bd4905405701861703e619c015fa21fb6dea6a9a1e8964242adb679d8038e06c519fcdbf2afcd67ba92ff0057bb25d9dfce0abcfb0c0af3e38384b192af77771b74b7cb4bfaebf9239b9b4b1fa61fb2478c2ebe2336b1e23bb8d2176f2ec56146240f2a28c96f72dbc64ffb20740293e215e3786bc75ae6b474d4d5238e3b8b1bab391b64776af07991c6c7071b83ece87851c568fec69e059fc25f0efceb93892e5b7edc6304aaff0040bf8e6badf176809abe91e39678c330d4217527fd982107f4622b830f3788a4ebc3694e4d79a5749fcec9fa1d547962e4a5d97e68f19f82fa9d8c3e09f86fe3dd2408ade28174cbc8f7862224636f2027033b5a3ce703a7415f5ea90466bf38fe0c78aef7c21e14f1a7c22d4749963d4748d4ae1f4774424dcc121ca803b9fe2dddc38cf39af63f0f7ed4de2bf06781ed6cbc53e1ab75d7b497822bc11ea114cd340c09538463e5ca540386ebd4679da616b430b5aad27a4747f37b9ea62a8cf13461593d6ed6fadba1f47fc4ad6347d2bc2f2dbeb96d737961aab8d2dadad519a494cc0a6d1b4823209e4118af08b1f1e7c12d4fc45a77886cf44d55751d434f8745b5d663b2b85c5bcbe7c29839e0816b3a9931b808c8ce319f62f1145e1df8a5e09d32fafb525d3f4d8ef22bd8ae3ccb765596273b43798af19e7b60fb10466bcd8fc08f85aba269fa5dc789ef1e3d326816d27bcbd84cd1cd1bddbc52233c7cb2b5fca430ce084c1f94e7e81c633d5a3c5856ab4538c24d5f7b3352cfe33fc2bf0d49a5f8a34e5bc693c4968d1dacb69693babc76fba30857ee44c7cb6519da5fca032768c7aa7827c6d61e3cd2ee6ff4e86ea2820bc9ac9bed709898c913947c03d4060c33df06bc6f4efd9d3e177f66785fc3f69e24b8b8d3f486985b69cda941702ebcd9247db26f46670ad2cb8008e1c83bb031ecfe0ef05695e04d2e7d3f48b64b6b79ef2e2fa40a8aa5a59a5691c9da003cb6077daaa327154925b194a529bbc9dcf8aff6dff14cc3c63aa5abb6d5b6b686de107a60af98c7f373f90af1bfd973f67dbff8a5e2b8a79203fd956f2096e26957e5c7a7be7d3d33d38afb9bf681fd9a6dbe36cf6b770ded9e977f0a6d69ae2d1e6f331f741db2a703f13ee2a6f85ff0b7e207c33d220d26d759f07b69d19c95b7d0ee629243dcb31ba6c9f7ae0af4675a32a517caa5a37d6de5ebb5fa6e09db53d7347d260d134d82cad976c512e07bfa9fc6b15b4ebafecdf11a5d411442e677784a49bf7a796803370369c8231cf41cf3c6ed88bc110178d0b49dcc0081f9126a796159e378dc064604153dc574c68c29c234e0aca2ac97e03526afe67c91e2bf12eb3a56a2f07f64c924b9d82458f923ebe95e6be18f83171e26f1f5eeb7e2cbeb54d1e595678adee541ba2c320c40f688827239ebc63273f4ff008e7e0b78a75a9e47d0fc61636f031256db5ad20ddedf61247344d8f76dc7d49ae3bc37fb38fc45d3f5e82e6ffc6fe1e5d3d5b3243a6682f1cac3d03cb34807e55e53c1cf9eef547a11ac92d256fbcd4fd9474af115dfc33d5fc33e3d853501a26b7736da5cf348b33cba7e4496a6423f8c46e01079dbb739c9af63bcf01f87f505856e748b599621b515e30428ce718fa9cfd79abfa1e8769e1fb15b5b48c226773b1e5a46eecc7b9e07e407415a15ecc5351499e749a6ee8e76cbe1d786b4dbb4b9b4d16d2da74dbb5e28c291b5b72e31e8403f857454515649ffd9, 30000.0000, 1, NULL),
(4, 3, 5, 'Embellished petite Lehenga Choli', '013', 0xffd8ffe000104a46494600010100000100010000fffe003b43524541544f523a2067642d6a7065672076312e3020287573696e6720494a47204a50454720763632292c207175616c697479203d2039300affdb0043000302020302020303030304030304050805050404050a070706080c0a0c0c0b0a0b0b0d0e12100d0e110e0b0b1016101113141515150c0f171816141812141514ffdb00430103040405040509050509140d0b0d1414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414ffc00011080040005003012200021101031101ffc4001f0000010501010101010100000000000000000102030405060708090a0bffc400b5100002010303020403050504040000017d01020300041105122131410613516107227114328191a1082342b1c11552d1f02433627282090a161718191a25262728292a3435363738393a434445464748494a535455565758595a636465666768696a737475767778797a838485868788898a92939495969798999aa2a3a4a5a6a7a8a9aab2b3b4b5b6b7b8b9bac2c3c4c5c6c7c8c9cad2d3d4d5d6d7d8d9dae1e2e3e4e5e6e7e8e9eaf1f2f3f4f5f6f7f8f9faffc4001f0100030101010101010101010000000000000102030405060708090a0bffc400b51100020102040403040705040400010277000102031104052131061241510761711322328108144291a1b1c109233352f0156272d10a162434e125f11718191a262728292a35363738393a434445464748494a535455565758595a636465666768696a737475767778797a82838485868788898a92939495969798999aa2a3a4a5a6a7a8a9aab2b3b4b5b6b7b8b9bac2c3c4c5c6c7c8c9cad2d3d4d5d6d7d8d9dae2e3e4e5e6e7e8e9eaf2f3f4f5f6f7f8f9faffda000c03010002110311003f00fd2d491ee18b3103d08e83e9fe35304080647d17fa9a68952052c58123ab1e83e9546f2e9a68d95090a41c93d4d4dec75897f75f2b2a1e4f0587f215f98ffb73789b58f087edc1e00f114777f61b6d2b4d8120b896033c70c4ed379f2797c6eda1d988041213a8c71fa5ed97854faae6be50fdb7746f01f8bf4dd3ed6668dfe2769aa92e9006f5062661e6c370c1593c974de08604f2768e4e70aab9a0cb8ce34e49c9f5fc4f514bd5f19d859c4de28b39ed0c3b6ee1b6b25922b9ddca95cb6402a41eaca436702be2df8f7a47823f676f1ddc7c4df076856f0788ed5d6d6dac9176e97bd83195a78e364dc447926307693b491d6b37c11fb3f7c70d7acaead7c3bf14f47f87de11bc6dc9a168da8cb2fd97200654fddab20272d80c3ef77ea7b6d3ff00e09e9258782aff004ef15fc498b52867985cbea32d8b19ed87cbbc24b2cccaa182e092bc826bc4e549465ed3b68af7b7e5f8b3de735384a2a9efd5b5f81f49fec4ff00b462fed0ff0007935bbd1610f892cee64b1d4ad6c15a38d4a1cc6e8849211918639c64301d2bdfa3bc2e0fc9d3fda35f99da3fc0ff000cfece3abdaea7f0e7e2078ae0d4897378f0ddc6d6d22019f9e3588238c81c1ddc0fc6bea1fd9b7f685d6be2435e5b6bff00619cc3710db2dcd9c463e64562bbbe6209c851c05fbd9f6af621522e9b92d12b7e2ec78328b553d96edeba6bb2b9f47db6a067ddfbb0a5491c1cd58f3492dec507e78ae22fbc7ba4e83e26b4d0e6b857d52fae238a3b5190db5c81bfa6303233f5aed179121ebcc5fd2b58548ceea2ef6dc274e50b392b5f6229246931b8e7da9225cc63e958da3f8db46d621b464bb5b796e543476f740c329240f976b8073c8e319adc8882a71c804d0a49ecc1c5c7744710cdba83d862be2bfdb5358d0349d0279b53d4e0b0f104d7822d213766795cc8aa5554024a608c93c0e33ce2bbcfdafbf6d8d07f669d0e5d274e306b5e3eba56fb2e9a5b31da83c89ae3072072084e0b71d01cd7c39f073f661f8a5fb48f8d2cfe25f8eb50920b09275bf8e5d532d3de90dbd02c7d23873d3a71f754839a9af08d3846bd49f2a4eebbb7d97ea6d453a9cd49439b995b5d8f59f87969ac6a9085916494dba6e9a09c9e029e4b2f518efe98aef4ea665d39ac63d38c91fde484927040c7c9ed8ddebc29ec0d7aa693fb3f58c530927bd760102ec8c22af1cf0a5485e4b1e3d7f1adbbff0083fa11504cf77b634d919339dc8bc64038e33f3e71fde1e9cf055cc215927282d3faee62b29ad4e4fd94dabf9f4f23e3af8b965a8ddd9acd00849ba259e18180e540c9233f2f24f5ef9af5dfd93adf4dd3fe17b4da66c9752b6d75a3d47126f2b3c7385d9d78015571db9cf7cd765ff0cd90f8bfc47041a6decb6b676c55ee642149488b636ae548de5776320f439f43f9e375aaf8e7f621fda2fc4da2c97735f471de97bc8a4ca43abdab9df1cd8e81cab6430cec6dc391907a79ab6694b920ec96dd2ed74feba9d186a70cae7c9257befd6d73f483e24f886ffc3df1074d93c517fe1cb84d36e6d35596e63223b880c4cce6de08cb338ca13f3b1556de4704e2bdf3c25e3fd33c5ba10d5ad3cd8aca592386379d36f98c180240eb8ce464e3a1ed5e4d1587847f6b5f00daf8bb46d52e1e1d62c9a1b66930eba7c9b4ac91b4390370624364e78054e319e47e207c29bcf0778596cf4e967b0f0a59c50c9ad90be64fa8cea14936eb24b80a43b8daa3b3fde2145798de270952726bdcd77deffa79dff3d0edb50c44231bfbda6df8faf97f4ceafe1a68b75a65d69365e3378351d5b5477ba5b78d629a2b794866314842af206e0a420076f19233567f69bfda12ebe0ff00862d746f0668f3788fe236bd195d1746b684c8614c006e6551f762427be013c740c47a3685a16bba6d99919ed167906e9522999d73ec59071f957e687ed43fb7e5ed9f89f57d3fe1c9b167b98d7ed9e24d9be5765ca88d548c0d9838ce570781924d7a742328a51a706df9feace7ace3525cd526ade5fa2e879afc62f8129f0fb429fc4bf143c44fe24f8a1e2295a58f48b7b80d1db92774935c483972b9e11085dc464b806a1f08fed7ff00163c07a7c56963e2eb8bcb2890048b528a3b9040e36ee914bf1d386ed5e7dab6a5abf8a7e1bf843c4dacdfdc6a975777da8d9bdc5cca5d9a5530487249f49d7f202b987718de1cae79322f527dba7a8c8afa2a14233a4bdba526fbafc11c8ea59de97babfadcfb0b42ff008297f8bed62f235cf09e8fab4790a5ed6496cd88ec589320c9f6aeeec7fe0a65e1abc871a9f82b55b3900c95b4ba8a71d3b16f2ebf3ea5cee27e51807391954ebc64727a8c1fa5467cce773b7cf83b771e38e18fe078ac2a65583a9f62de8d9b47195e3f68fda0fd8cbe3d68df1f347f176a5a2dade5941677b0c6d0df88d65cb4590708cdc7ca4039ea0fa543fb63feca7a2fed17e15173b459789f4c858d9ea11c7b9c264928c072cb9e76fd71ce2be35ff824f78be7d27e3a78a3c3c666369ace8cd3f96e7ef4b04a855baff76596bf5498e2ee2c7f1065fe47fa5704a82c35a9d3d12d8c5d69549ba93d59f9f7ff0004e7bfd67e11f8dbc59f06fc590358ea0f226b9a5e4e62b85c08e6689ba32b2885971d964ce0822beffb8b282f6151730453aa2c6eab2a060ad9e1867a11eb5f9c9a4fc48f0dfc6abab85d6fc7563f0f3c6fe0ff00185f3685aa9b882191adccac5102bb0ca1460857183e58ebc8afba7c2df136d752d1d25bb0f27971c514b7b6d6f27d9d9f8cb8246021ea0e5873c13594ebc67271aaad2ebdbd7d19aba32f8e8eabf15e452fda0bc6b27c3ff835e35d5e085a16b2d325549fcde51d8796ac38ec587e55fcf9ea4ced6437e77b11b89fae4d7ee2ff00c140f57b9b1fd9abc476b24c1deec9b72411820412cddbde21f957e206a80796323be6bd9c2c538499e74afd4faabc13e0fb5d7ffe09dbaeeb6e552efc39e381342e0f2629e0b68644ebdc946ff8057cfa66c80c8b863829ce368f5ce07e7ec735f437817527f0dfec1bf167c3f780c571278a74d84467aa37de738ffb76615f358259492db41e5c8e40eb800fafe3e99e95bd17f17a949d9163cd008318661bb08081963f4c107b71ef4c13ed5c063b4f05d4753e9dbdaab990c847ddcb7d59517f53fd463de8126769da143708ac47af5278f5ebeded5b5c773ea5ff008268acf27ed79a118dc46aba7dfbcaa0fde4f21805ebfde2a7f0afd85d56e05940d72dc2c40b93ff000135f8e9ff0004d6d72cf48fdadf438ef25d8f7d63796d0333637cc622c01e7d15c0f527debf597e31ea12695f0afc617d14df6796d347bbb9597686da52167c8078cfcb5e362be32a1a9f803f15029f1eeaf23a6e637264e7fdac37f5afd52ff824deb0979fb3e789b4c60b8b0d65f683ce2392289b1f4dc1ebf2d7e2fd8dcc7e3ed58181f1b95871d5368da7f215f517ec4df1575ff03781bc7be17d120d979aa3d94e2f37ff00c7b04672c7038e40da493819efd0e98eab1a18795592dadfe43c35375aaaa6ba9fffd9, 58.0000, 1, NULL),
(5, 4, 5, 'Embellished petite Lehenga Choli', '013', 0xffd8ffe000104a46494600010100000100010000fffe003b43524541544f523a2067642d6a7065672076312e3020287573696e6720494a47204a50454720763632292c207175616c697479203d2039300affdb0043000302020302020303030304030304050805050404050a070706080c0a0c0c0b0a0b0b0d0e12100d0e110e0b0b1016101113141515150c0f171816141812141514ffdb00430103040405040509050509140d0b0d1414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414ffc00011080040005003012200021101031101ffc4001f0000010501010101010100000000000000000102030405060708090a0bffc400b5100002010303020403050504040000017d01020300041105122131410613516107227114328191a1082342b1c11552d1f02433627282090a161718191a25262728292a3435363738393a434445464748494a535455565758595a636465666768696a737475767778797a838485868788898a92939495969798999aa2a3a4a5a6a7a8a9aab2b3b4b5b6b7b8b9bac2c3c4c5c6c7c8c9cad2d3d4d5d6d7d8d9dae1e2e3e4e5e6e7e8e9eaf1f2f3f4f5f6f7f8f9faffc4001f0100030101010101010101010000000000000102030405060708090a0bffc400b51100020102040403040705040400010277000102031104052131061241510761711322328108144291a1b1c109233352f0156272d10a162434e125f11718191a262728292a35363738393a434445464748494a535455565758595a636465666768696a737475767778797a82838485868788898a92939495969798999aa2a3a4a5a6a7a8a9aab2b3b4b5b6b7b8b9bac2c3c4c5c6c7c8c9cad2d3d4d5d6d7d8d9dae2e3e4e5e6e7e8e9eaf2f3f4f5f6f7f8f9faffda000c03010002110311003f00fd2d491ee18b3103d08e83e9fe35304080647d17fa9a68952052c58123ab1e83e9546f2e9a68d95090a41c93d4d4dec75897f75f2b2a1e4f0587f215f98ffb73789b58f087edc1e00f114777f61b6d2b4d8120b896033c70c4ed379f2797c6eda1d988041213a8c71fa5ed97854faae6be50fdb7746f01f8bf4dd3ed6668dfe2769aa92e9006f5062661e6c370c1593c974de08604f2768e4e70aab9a0cb8ce34e49c9f5fc4f514bd5f19d859c4de28b39ed0c3b6ee1b6b25922b9ddca95cb6402a41eaca436702be2df8f7a47823f676f1ddc7c4df076856f0788ed5d6d6dac9176e97bd83195a78e364dc447926307693b491d6b37c11fb3f7c70d7acaead7c3bf14f47f87de11bc6dc9a168da8cb2fd97200654fddab20272d80c3ef77ea7b6d3ff00e09e9258782aff004ef15fc498b52867985cbea32d8b19ed87cbbc24b2cccaa182e092bc826bc4e549465ed3b68af7b7e5f8b3de735384a2a9efd5b5f81f49fec4ff00b462fed0ff0007935bbd1610f892cee64b1d4ad6c15a38d4a1cc6e8849211918639c64301d2bdfa3bc2e0fc9d3fda35f99da3fc0ff000cfece3abdaea7f0e7e2078ae0d4897378f0ddc6d6d22019f9e3588238c81c1ddc0fc6bea1fd9b7f685d6be2435e5b6bff00619cc3710db2dcd9c463e64562bbbe6209c851c05fbd9f6af621522e9b92d12b7e2ec78328b553d96edeba6bb2b9f47db6a067ddfbb0a5491c1cd58f3492dec507e78ae22fbc7ba4e83e26b4d0e6b857d52fae238a3b5190db5c81bfa6303233f5aed179121ebcc5fd2b58548ceea2ef6dc274e50b392b5f6229246931b8e7da9225cc63e958da3f8db46d621b464bb5b796e543476f740c329240f976b8073c8e319adc8882a71c804d0a49ecc1c5c7744710cdba83d862be2bfdb5358d0349d0279b53d4e0b0f104d7822d213766795cc8aa5554024a608c93c0e33ce2bbcfdafbf6d8d07f669d0e5d274e306b5e3eba56fb2e9a5b31da83c89ae3072072084e0b71d01cd7c39f073f661f8a5fb48f8d2cfe25f8eb50920b09275bf8e5d532d3de90dbd02c7d23873d3a71f754839a9af08d3846bd49f2a4eebbb7d97ea6d453a9cd49439b995b5d8f59f87969ac6a9085916494dba6e9a09c9e029e4b2f518efe98aef4ea665d39ac63d38c91fde484927040c7c9ed8ddebc29ec0d7aa693fb3f58c530927bd760102ec8c22af1cf0a5485e4b1e3d7f1adbbff0083fa11504cf77b634d919339dc8bc64038e33f3e71fde1e9cf055cc215927282d3faee62b29ad4e4fd94dabf9f4f23e3af8b965a8ddd9acd00849ba259e18180e540c9233f2f24f5ef9af5dfd93adf4dd3fe17b4da66c9752b6d75a3d47126f2b3c7385d9d78015571db9cf7cd765ff0cd90f8bfc47041a6decb6b676c55ee642149488b636ae548de5776320f439f43f9e375aaf8e7f621fda2fc4da2c97735f471de97bc8a4ca43abdab9df1cd8e81cab6430cec6dc391907a79ab6694b920ec96dd2ed74feba9d186a70cae7c9257befd6d73f483e24f886ffc3df1074d93c517fe1cb84d36e6d35596e63223b880c4cce6de08cb338ca13f3b1556de4704e2bdf3c25e3fd33c5ba10d5ad3cd8aca592386379d36f98c180240eb8ce464e3a1ed5e4d1587847f6b5f00daf8bb46d52e1e1d62c9a1b66930eba7c9b4ac91b4390370624364e78054e319e47e207c29bcf0778596cf4e967b0f0a59c50c9ad90be64fa8cea14936eb24b80a43b8daa3b3fde2145798de270952726bdcd77deffa79dff3d0edb50c44231bfbda6df8faf97f4ceafe1a68b75a65d69365e3378351d5b5477ba5b78d629a2b794866314842af206e0a420076f19233567f69bfda12ebe0ff00862d746f0668f3788fe236bd195d1746b684c8614c006e6551f762427be013c740c47a3685a16bba6d99919ed167906e9522999d73ec59071f957e687ed43fb7e5ed9f89f57d3fe1c9b167b98d7ed9e24d9be5765ca88d548c0d9838ce570781924d7a742328a51a706df9feace7ace3525cd526ade5fa2e879afc62f8129f0fb429fc4bf143c44fe24f8a1e2295a58f48b7b80d1db92774935c483972b9e11085dc464b806a1f08fed7ff00163c07a7c56963e2eb8bcb2890048b528a3b9040e36ee914bf1d386ed5e7dab6a5abf8a7e1bf843c4dacdfdc6a975777da8d9bdc5cca5d9a5530487249f49d7f202b987718de1cae79322f527dba7a8c8afa2a14233a4bdba526fbafc11c8ea59de97babfadcfb0b42ff008297f8bed62f235cf09e8fab4790a5ed6496cd88ec589320c9f6aeeec7fe0a65e1abc871a9f82b55b3900c95b4ba8a71d3b16f2ebf3ea5cee27e51807391954ebc64727a8c1fa5467cce773b7cf83b771e38e18fe078ac2a65583a9f62de8d9b47195e3f68fda0fd8cbe3d68df1f347f176a5a2dade5941677b0c6d0df88d65cb4590708cdc7ca4039ea0fa543fb63feca7a2fed17e15173b459789f4c858d9ea11c7b9c264928c072cb9e76fd71ce2be35ff824f78be7d27e3a78a3c3c666369ace8cd3f96e7ef4b04a855baff76596bf5498e2ee2c7f1065fe47fa5704a82c35a9d3d12d8c5d69549ba93d59f9f7ff0004e7bfd67e11f8dbc59f06fc590358ea0f226b9a5e4e62b85c08e6689ba32b2885971d964ce0822beffb8b282f6151730453aa2c6eab2a060ad9e1867a11eb5f9c9a4fc48f0dfc6abab85d6fc7563f0f3c6fe0ff00185f3685aa9b882191adccac5102bb0ca1460857183e58ebc8afba7c2df136d752d1d25bb0f27971c514b7b6d6f27d9d9f8cb8246021ea0e5873c13594ebc67271aaad2ebdbd7d19aba32f8e8eabf15e452fda0bc6b27c3ff835e35d5e085a16b2d325549fcde51d8796ac38ec587e55fcf9ea4ced6437e77b11b89fae4d7ee2ff00c140f57b9b1fd9abc476b24c1deec9b72411820412cddbde21f957e206a80796323be6bd9c2c538499e74afd4faabc13e0fb5d7ffe09dbaeeb6e552efc39e381342e0f2629e0b68644ebdc946ff8057cfa66c80c8b863829ce368f5ce07e7ec735f437817527f0dfec1bf167c3f780c571278a74d84467aa37de738ffb76615f358259492db41e5c8e40eb800fafe3e99e95bd17f17a949d9163cd008318661bb08081963f4c107b71ef4c13ed5c063b4f05d4753e9dbdaab990c847ddcb7d59517f53fd463de8126769da143708ac47af5278f5ebeded5b5c773ea5ff008268acf27ed79a118dc46aba7dfbcaa0fde4f21805ebfde2a7f0afd85d56e05940d72dc2c40b93ff000135f8e9ff0004d6d72cf48fdadf438ef25d8f7d63796d0333637cc622c01e7d15c0f527debf597e31ea12695f0afc617d14df6796d347bbb9597686da52167c8078cfcb5e362be32a1a9f803f15029f1eeaf23a6e637264e7fdac37f5afd52ff824deb0979fb3e789b4c60b8b0d65f683ce2392289b1f4dc1ebf2d7e2fd8dcc7e3ed58181f1b95871d5368da7f215f517ec4df1575ff03781bc7be17d120d979aa3d94e2f37ff00c7b04672c7038e40da493819efd0e98eab1a18795592dadfe43c35375aaaa6ba9fffd9, 58.0000, 1, NULL),
(6, 5, 7, 'Footwear Fetish', 'LP306512', 0xffd8ffe000104a46494600010100000100010000fffe003b43524541544f523a2067642d6a7065672076312e3020287573696e6720494a47204a50454720763632292c207175616c697479203d2039300affdb0043000302020302020303030304030304050805050404050a070706080c0a0c0c0b0a0b0b0d0e12100d0e110e0b0b1016101113141515150c0f171816141812141514ffdb00430103040405040509050509140d0b0d1414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414ffc00011080040005003012200021101031101ffc4001f0000010501010101010100000000000000000102030405060708090a0bffc400b5100002010303020403050504040000017d01020300041105122131410613516107227114328191a1082342b1c11552d1f02433627282090a161718191a25262728292a3435363738393a434445464748494a535455565758595a636465666768696a737475767778797a838485868788898a92939495969798999aa2a3a4a5a6a7a8a9aab2b3b4b5b6b7b8b9bac2c3c4c5c6c7c8c9cad2d3d4d5d6d7d8d9dae1e2e3e4e5e6e7e8e9eaf1f2f3f4f5f6f7f8f9faffc4001f0100030101010101010101010000000000000102030405060708090a0bffc400b51100020102040403040705040400010277000102031104052131061241510761711322328108144291a1b1c109233352f0156272d10a162434e125f11718191a262728292a35363738393a434445464748494a535455565758595a636465666768696a737475767778797a82838485868788898a92939495969798999aa2a3a4a5a6a7a8a9aab2b3b4b5b6b7b8b9bac2c3c4c5c6c7c8c9cad2d3d4d5d6d7d8d9dae2e3e4e5e6e7e8e9eaf2f3f4f5f6f7f8f9faffda000c03010002110311003f00fd51ed5f147ed0df1e7c5fa27c59d5bc136f792d912892e986d26303cae46523dc08c9704819ce5b68e2bebef1578c745f0569726a1adea56da6daa296df71205ce081819ea72ca38ee47ad7e597c4bf1e1f8a3f1b351f1cdf3c76da5db5d2c9636e655679fc9c186200127aed67feea9f56507e5f3b9d7bd1861dbe6e6be9dbcfe6745249ddcb63eb8f84bfb50dfd9eb161a378a9df50b2bf488dadfaa8f36369151915fa6e52245e7a83d73dbeabb6b84ba85268d8346ebb9587715f9d13e877296ba1de6d685a0d3b4c9836deb348a1123f6388f77d16bef5f02deaff0064456d24a9e78dccb1eef9b667ae3d326bd158b9c71b1c34968e2dfcd3b7e29fe06295d5ce9bb51eb4668af5c90f4a4ed55b50d56cf49844b7b77059c47761e79022fcaacedc9f455663e8149e82b16c3e24f84b54bbb6b4b3f1468b777572aaf04106a113bcaac4852aa1b2c0956c11d769f4a00e93b9a4f4a28a00f14fda93c356fe2df0745a6dfddc56ba74e9324c593748080ae8e9dbe564190700e7af183f9d10f8012fbe2ef86fc29a5c36707d9a064b78d6f1ae37b02c5bcf7da0093219d955147cbd3e6c9fd31f8f7f681a26946da4bd591eeca797a7471b4f28f2ddca29930aa30849e4120103922bf3ae1f1647e0ff00da2b52d7ae6eac2fa6d32cef1e33656fe44724cdb638d0ae4f3ba5c1396e173938af9355ab54cede1e52f7142e97dcba7cf77e9d4dacbd9dfa9f4adf6851b6bfa0f83ecda4b8b6d3a032cf7720f9aeae84646efa2f96a800fbbc8ed57fe2c7c5b93e12fc55f05ea2fbbec1e5bdac813a38523cc53f84831ef8f4aef7e15f8202f8974b69e737771a7c3796b3c927de766963b9573ee7ce3ff7d57cf9fb40784752f18e9da8289160b8f0bdc497573e7f01602423b93d954b23b1ecaacddb073c4519bc6d5c427b5a2be5ef3fcd7dc7a396b87b44aa6cf47f3d0fbf348d56db5cd32d350b2996e2d2ea259a1950f0e8c01047e06ae7ad7ccdfb1678e6fe5f0dddf8275827ed7a401359b939125bb1e80f7018f07d1c7a57d33eb5f4d86af1c4d28d58f539317869612bca8cba7e5d0e4fe27e8fa3ea9e11bd9b5dd426d2b4cb18a5b9b8bc859418a2f29d25cee5618313c8a78ce1b2304023cd231f0b3c37ae695670789dedeff48d16dee974e8a412493d9c52fda15dd3cb2eced26d9085c3b1030304831fedb7af368ff01f52b402e562d5a78ec6796d62691a38b0d2be428380c22d84f41bebc5bc13707c63f1361b5b7834d169ae5bdb41657d796727db2cae1343824127de5fdd90854a6013b89045675710e153d9af2fc6e7bb81ca2188c1bc5d56d25cdb7f7797c9f77a6fa1f66e89e29d33c44fb74fba173fe8b05e6555b1e54c18c4d9231c84638ea0632064675abc33f672d71e39b50d05adc3c71c104d06a1e67cd7112410c709f2f1f20307d9dbef1f99a4e9dfdd3d2baa9cb9e373c2c5d0fabd674d6c78d7ed3577636fe19d15754bcfb3e97f6f2f7510338370820942afee54b70ec8dc8c7ca3be2bf2e3e23dec973f16a7b9b9d43fb5b79665ba103c5bd4905405701861703e619c015fa21fb6dea6a9a1e8964242adb679d8038e06c519fcdbf2afcd67ba92ff0057bb25d9dfce0abcfb0c0af3e38384b192af77771b74b7cb4bfaebf9239b9b4b1fa61fb2478c2ebe2336b1e23bb8d2176f2ec56146240f2a28c96f72dbc64ffb20740293e215e3786bc75ae6b474d4d5238e3b8b1bab391b64776af07991c6c7071b83ece87851c568fec69e059fc25f0efceb93892e5b7edc6304aaff0040bf8e6badf176809abe91e39678c330d4217527fd982107f4622b830f3788a4ebc3694e4d79a5749fcec9fa1d547962e4a5d97e68f19f82fa9d8c3e09f86fe3dd2408ade28174cbc8f7862224636f2027033b5a3ce703a7415f5ea90466bf38fe0c78aef7c21e14f1a7c22d4749963d4748d4ae1f4774424dcc121ca803b9fe2dddc38cf39af63f0f7ed4de2bf06781ed6cbc53e1ab75d7b497822bc11ea114cd340c09538463e5ca540386ebd4679da616b430b5aad27a4747f37b9ea62a8cf13461593d6ed6fadba1f47fc4ad6347d2bc2f2dbeb96d737961aab8d2dadad519a494cc0a6d1b4823209e4118af08b1f1e7c12d4fc45a77886cf44d55751d434f8745b5d663b2b85c5bcbe7c29839e0816b3a9931b808c8ce319f62f1145e1df8a5e09d32fafb525d3f4d8ef22bd8ae3ccb765596273b43798af19e7b60fb10466bcd8fc08f85aba269fa5dc789ef1e3d326816d27bcbd84cd1cd1bddbc52233c7cb2b5fca430ce084c1f94e7e81c633d5a3c5856ab4538c24d5f7b3352cfe33fc2bf0d49a5f8a34e5bc693c4968d1dacb69693babc76fba30857ee44c7cb6519da5fca032768c7aa7827c6d61e3cd2ee6ff4e86ea2820bc9ac9bed709898c913947c03d4060c33df06bc6f4efd9d3e177f66785fc3f69e24b8b8d3f486985b69cda941702ebcd9247db26f46670ad2cb8008e1c83bb031ecfe0ef05695e04d2e7d3f48b64b6b79ef2e2fa40a8aa5a59a5691c9da003cb6077daaa327154925b194a529bbc9dcf8aff6dff14cc3c63aa5abb6d5b6b686de107a60af98c7f373f90af1bfd973f67dbff8a5e2b8a79203fd956f2096e26957e5c7a7be7d3d33d38afb9bf681fd9a6dbe36cf6b770ded9e977f0a6d69ae2d1e6f331f741db2a703f13ee2a6f85ff0b7e207c33d220d26d759f07b69d19c95b7d0ee629243dcb31ba6c9f7ae0af4675a32a517caa5a37d6de5ebb5fa6e09db53d7347d260d134d82cad976c512e07bfa9fc6b15b4ebafecdf11a5d411442e677784a49bf7a796803370369c8231cf41cf3c6ed88bc110178d0b49dcc0081f9126a796159e378dc064604153dc574c68c29c234e0aca2ac97e03526afe67c91e2bf12eb3a56a2f07f64c924b9d82458f923ebe95e6be18f83171e26f1f5eeb7e2cbeb54d1e595678adee541ba2c320c40f688827239ebc63273f4ff008e7e0b78a75a9e47d0fc61636f031256db5ad20ddedf61247344d8f76dc7d49ae3bc37fb38fc45d3f5e82e6ffc6fe1e5d3d5b3243a6682f1cac3d03cb34807e55e53c1cf9eef547a11ac92d256fbcd4fd9474af115dfc33d5fc33e3d853501a26b7736da5cf348b33cba7e4496a6423f8c46e01079dbb739c9af63bcf01f87f505856e748b599621b515e30428ce718fa9cfd79abfa1e8769e1fb15b5b48c226773b1e5a46eecc7b9e07e407415a15ecc5351499e749a6ee8e76cbe1d786b4dbb4b9b4d16d2da74dbb5e28c291b5b72e31e8403f857454515649ffd9, 30000.0000, 1, NULL),
(7, 6, 3, 'Embroidered and Embellished petite Lehenga Choli', '011', 0xffd8ffe000104a46494600010100000100010000fffe003b43524541544f523a2067642d6a7065672076312e3020287573696e6720494a47204a50454720763632292c207175616c697479203d2039300affdb0043000302020302020303030304030304050805050404050a070706080c0a0c0c0b0a0b0b0d0e12100d0e110e0b0b1016101113141515150c0f171816141812141514ffdb00430103040405040509050509140d0b0d1414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414ffc00011080040003203012200021101031101ffc4001f0000010501010101010100000000000000000102030405060708090a0bffc400b5100002010303020403050504040000017d01020300041105122131410613516107227114328191a1082342b1c11552d1f02433627282090a161718191a25262728292a3435363738393a434445464748494a535455565758595a636465666768696a737475767778797a838485868788898a92939495969798999aa2a3a4a5a6a7a8a9aab2b3b4b5b6b7b8b9bac2c3c4c5c6c7c8c9cad2d3d4d5d6d7d8d9dae1e2e3e4e5e6e7e8e9eaf1f2f3f4f5f6f7f8f9faffc4001f0100030101010101010101010000000000000102030405060708090a0bffc400b51100020102040403040705040400010277000102031104052131061241510761711322328108144291a1b1c109233352f0156272d10a162434e125f11718191a262728292a35363738393a434445464748494a535455565758595a636465666768696a737475767778797a82838485868788898a92939495969798999aa2a3a4a5a6a7a8a9aab2b3b4b5b6b7b8b9bac2c3c4c5c6c7c8c9cad2d3d4d5d6d7d8d9dae2e3e4e5e6e7e8e9eaf2f3f4f5f6f7f8f9faffda000c03010002110311003f00fd3088b4c77b1c13cfb7d6aa6a53e17cb5e338cfd2accb72b046154ee63fa9ff000aca7259589e4ee3cd4367623e13fd917c53a8af8c7e38e8379af41a65c4de2fbcbd48e5b50f2879a43b983160197111057a8c8e464572df197c71e1dfd93be39d9f8bbc35a5d9adeebb3c161acbcb01fb39b757469e448d1862e1b729dc41c03eae72ff008d5f0e353f18fed03ab5ff00c14f11e97e12bcb99ccda86bb73732432a5d90c9771428626de8f885cf38de848f5aaf73ff0004ff00b43e15cfc4af89b36b225bd7be92f618f6dd48ee8018c4d33c9953b77602649fa578938a8d5e694b67b6b73d6a73556872c637badeeac7e8ec1a8c73c71bc052585d0323c6f956523820f4231525bde19e3ddb36f38eb9ef8af8d3f666f89baa7847c5967f0f3fb6aebc41e1bb785c5a4dac9f32f618c48a883cce328148386071d0103007d59a0f89ac752d6b55d22de512dd69c6337017f80bb3614fbe173f8d7abed23749bdff00afd0f2941ca2e49688e93ce3e94546dc31fad15b99d88998bc809e4d473e56dee0af50091f9554d13c47a7ebf6e9259ce19f6ab3c0e0acb1ee1c6e4382bf88ec6be7afdba7f69d5f801f0ddb4cd164f37c75e2306d34a8231b9e05236bdc6dff00673851ddc8ea0115305ed1da268d38bb33e7af1d5dc17df1e755d3f40bc170563823be8e06f922bb62d94247f1140b9033c93df38eb2ea791f4efb12d9468d1929b9f3b5370dacc33d067bf638fa564feca7fb22ebbe14f085c5f78c6f447adeb570b7d71083be5841c611e420ee6eeddb713c9c035f406b9f06f424b02be7dc828a154b4838032718c631bb9c631ed5e5cb1b4e1154d5a4a1b3ef6ebbfdde46b572cab5aa3a91f779f75d35fd7b9f387ecd76696bf153c553dded7d556c4b5a7ef01df10953cc6033d33e5f3efef5f4ff00837c6a7c3ff1875bd3b5c9f4dbbd635010da46da501e63942eec655c928a9e6b280cc5b084e06541f86bf6aef04f89ff00659f889f0cbe24e9b7b2cf6b790cf6ef6d8daaa03ef685c803fd645263072418d883c0c7db773e0cd17e31d8e91f143c3771717d35fd97db6c558927cd9517c8ce19762c4c06f4ce0e1b3c83978986264d62e3adecfd12d1e9e876d19d15058792d935ebb5b53dce4d6ad59d8acaa549241f5a2be15d4f48d26cf52bb8352bad7ee7518a674b99ad2ce130c928243b2132f2a5b247b628af3de6b34fe18ffe05ff0000e8596c1abddffe027d35f0b67b7f07f87b50bcf14dc40ba9e9768b75a95fe11a3b78d95a5601d40e142b86e1795fbb822bf36bf6968f59f1b6ab79f1a3c6735e687abeb17b1c1e0df0ff009862b8b1b288ee4b9940e508500851825e40c78001fbeff697f896ff0000be05dfeb7adad95d076586dec7cc2c9737443489164a03826327a638e460d7e4ef8a3e26f89be32d8de78abc497ed77731eaed0840488add648414445cf0a3ca73dc9239c935f478284ef18a568addbddf97f9b3cfad28733949ddbdadb2f3ff00247b6f817fe0a09f13bc1ad1c1ab3d978b2d1004db7f079730033d248f69cf1d5958d7ac27fc14abc35a8689245aaf83b55d3ee4c6500b1b88ae1324601cbf9671f81af8266e570b9e7a275ebd3f3fa761eb552e77b44f976e791b49c7a719f5e3f2af46be5984ad7bc2de9a130c5d7a7b48fdcbfda47e0de9bfb437c10bcf0fdd6d134b0a5ed85ca8dc619d509475c75e09181d41c77af36ff8279dd6a1a5fc14bbf04eb119b6d6bc21aa5ce993c2c73f2b31b84753dd184c769e840c8e2bd73f66ed7e4f12fecf5f0cb5395fcc9e6d02c04af9fbce205463f9835f3bfecd5f13b48f10f8d1fc5b07892dbfb76eed24d1758f0b40c8f2cc60ba992daebcb4cb860a719231b5f9c601af327374af197c3faffc1ff233843daae55f11f5ecba269cb2b816164006200f2138fd28acc9bc79a279cfbaefca6dc731c885594fa107a11e94573da8797e06bc988ecff13e20ff0082bd788a48bc07e01d0d6331c536ab3dd38df9dde5c3b14e31ff004d5abe22f851a1c1a9fecb7f14b5094812e93e20d0ee50e7921d6fa265fa1de0ff00c0457d65ff00057abe9a4f107812d2593cc68ad6690e31d4b95cf1fee57ca1f0baf1b48fd98fe2b5bc8368d56fb4468327ef7973dd64fe608afa0a6ad4a2d77fd4f37a9e712c9838391c741faf6e3d3a7f2a824958a329e09cf6c0ddfa6315133950307248e07723b7d727f9530bfcade801031dc773dba9fd3e95d8d9773f70ff0063691ed7f648f86f2cadbca69424cfa2f98c40fc1703f0afc8af8117eba5fed8de10b965191e2d81189f46ba087f4635fab5fb316b714dfb0c7856faca6082dfc373af9a30db248bcd57fae1d1bf2afc7dd36f2e7c31f1f60d5bc8626c35d5bc009c6ed9701c0cfbf1f9d7974acdceebfad41fd93fa03b9109b9949442779eaa3d68afcf7d6fe277c4ad635abfbf8b587b18aeae249d6d55b88433160832c0f19c73e9457c53cee9df4a6cfa5594bb6b53f03fffd9, 50.0000, 1, NULL),
(8, 7, 7, 'Footwear Fetish', 'LP306512', 0xffd8ffe000104a46494600010100000100010000fffe003b43524541544f523a2067642d6a7065672076312e3020287573696e6720494a47204a50454720763632292c207175616c697479203d2039300affdb0043000302020302020303030304030304050805050404050a070706080c0a0c0c0b0a0b0b0d0e12100d0e110e0b0b1016101113141515150c0f171816141812141514ffdb00430103040405040509050509140d0b0d1414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414ffc00011080040005003012200021101031101ffc4001f0000010501010101010100000000000000000102030405060708090a0bffc400b5100002010303020403050504040000017d01020300041105122131410613516107227114328191a1082342b1c11552d1f02433627282090a161718191a25262728292a3435363738393a434445464748494a535455565758595a636465666768696a737475767778797a838485868788898a92939495969798999aa2a3a4a5a6a7a8a9aab2b3b4b5b6b7b8b9bac2c3c4c5c6c7c8c9cad2d3d4d5d6d7d8d9dae1e2e3e4e5e6e7e8e9eaf1f2f3f4f5f6f7f8f9faffc4001f0100030101010101010101010000000000000102030405060708090a0bffc400b51100020102040403040705040400010277000102031104052131061241510761711322328108144291a1b1c109233352f0156272d10a162434e125f11718191a262728292a35363738393a434445464748494a535455565758595a636465666768696a737475767778797a82838485868788898a92939495969798999aa2a3a4a5a6a7a8a9aab2b3b4b5b6b7b8b9bac2c3c4c5c6c7c8c9cad2d3d4d5d6d7d8d9dae2e3e4e5e6e7e8e9eaf2f3f4f5f6f7f8f9faffda000c03010002110311003f00fd51ed5f147ed0df1e7c5fa27c59d5bc136f792d912892e986d26303cae46523dc08c9704819ce5b68e2bebef1578c745f0569726a1adea56da6daa296df71205ce081819ea72ca38ee47ad7e597c4bf1e1f8a3f1b351f1cdf3c76da5db5d2c9636e655679fc9c186200127aed67feea9f56507e5f3b9d7bd1861dbe6e6be9dbcfe6745249ddcb63eb8f84bfb50dfd9eb161a378a9df50b2bf488dadfaa8f36369151915fa6e52245e7a83d73dbeabb6b84ba85268d8346ebb9587715f9d13e877296ba1de6d685a0d3b4c9836deb348a1123f6388f77d16bef5f02deaff0064456d24a9e78dccb1eef9b667ae3d326bd158b9c71b1c34968e2dfcd3b7e29fe06295d5ce9bb51eb4668af5c90f4a4ed55b50d56cf49844b7b77059c47761e79022fcaacedc9f455663e8149e82b16c3e24f84b54bbb6b4b3f1468b777572aaf04106a113bcaac4852aa1b2c0956c11d769f4a00e93b9a4f4a28a00f14fda93c356fe2df0745a6dfddc56ba74e9324c593748080ae8e9dbe564190700e7af183f9d10f8012fbe2ef86fc29a5c36707d9a064b78d6f1ae37b02c5bcf7da0093219d955147cbd3e6c9fd31f8f7f681a26946da4bd591eeca797a7471b4f28f2ddca29930aa30849e4120103922bf3ae1f1647e0ff00da2b52d7ae6eac2fa6d32cef1e33656fe44724cdb638d0ae4f3ba5c1396e173938af9355ab54cede1e52f7142e97dcba7cf77e9d4dacbd9dfa9f4adf6851b6bfa0f83ecda4b8b6d3a032cf7720f9aeae84646efa2f96a800fbbc8ed57fe2c7c5b93e12fc55f05ea2fbbec1e5bdac813a38523cc53f84831ef8f4aef7e15f8202f8974b69e737771a7c3796b3c927de766963b9573ee7ce3ff7d57cf9fb40784752f18e9da8289160b8f0bdc497573e7f01602423b93d954b23b1ecaacddb073c4519bc6d5c427b5a2be5ef3fcd7dc7a396b87b44aa6cf47f3d0fbf348d56db5cd32d350b2996e2d2ea259a1950f0e8c01047e06ae7ad7ccdfb1678e6fe5f0dddf8275827ed7a401359b939125bb1e80f7018f07d1c7a57d33eb5f4d86af1c4d28d58f539317869612bca8cba7e5d0e4fe27e8fa3ea9e11bd9b5dd426d2b4cb18a5b9b8bc859418a2f29d25cee5618313c8a78ce1b2304023cd231f0b3c37ae695670789dedeff48d16dee974e8a412493d9c52fda15dd3cb2eced26d9085c3b1030304831fedb7af368ff01f52b402e562d5a78ec6796d62691a38b0d2be428380c22d84f41bebc5bc13707c63f1361b5b7834d169ae5bdb41657d796727db2cae1343824127de5fdd90854a6013b89045675710e153d9af2fc6e7bb81ca2188c1bc5d56d25cdb7f7797c9f77a6fa1f66e89e29d33c44fb74fba173fe8b05e6555b1e54c18c4d9231c84638ea0632064675abc33f672d71e39b50d05adc3c71c104d06a1e67cd7112410c709f2f1f20307d9dbef1f99a4e9dfdd3d2baa9cb9e373c2c5d0fabd674d6c78d7ed3577636fe19d15754bcfb3e97f6f2f7510338370820942afee54b70ec8dc8c7ca3be2bf2e3e23dec973f16a7b9b9d43fb5b79665ba103c5bd4905405701861703e619c015fa21fb6dea6a9a1e8964242adb679d8038e06c519fcdbf2afcd67ba92ff0057bb25d9dfce0abcfb0c0af3e38384b192af77771b74b7cb4bfaebf9239b9b4b1fa61fb2478c2ebe2336b1e23bb8d2176f2ec56146240f2a28c96f72dbc64ffb20740293e215e3786bc75ae6b474d4d5238e3b8b1bab391b64776af07991c6c7071b83ece87851c568fec69e059fc25f0efceb93892e5b7edc6304aaff0040bf8e6badf176809abe91e39678c330d4217527fd982107f4622b830f3788a4ebc3694e4d79a5749fcec9fa1d547962e4a5d97e68f19f82fa9d8c3e09f86fe3dd2408ade28174cbc8f7862224636f2027033b5a3ce703a7415f5ea90466bf38fe0c78aef7c21e14f1a7c22d4749963d4748d4ae1f4774424dcc121ca803b9fe2dddc38cf39af63f0f7ed4de2bf06781ed6cbc53e1ab75d7b497822bc11ea114cd340c09538463e5ca540386ebd4679da616b430b5aad27a4747f37b9ea62a8cf13461593d6ed6fadba1f47fc4ad6347d2bc2f2dbeb96d737961aab8d2dadad519a494cc0a6d1b4823209e4118af08b1f1e7c12d4fc45a77886cf44d55751d434f8745b5d663b2b85c5bcbe7c29839e0816b3a9931b808c8ce319f62f1145e1df8a5e09d32fafb525d3f4d8ef22bd8ae3ccb765596273b43798af19e7b60fb10466bcd8fc08f85aba269fa5dc789ef1e3d326816d27bcbd84cd1cd1bddbc52233c7cb2b5fca430ce084c1f94e7e81c633d5a3c5856ab4538c24d5f7b3352cfe33fc2bf0d49a5f8a34e5bc693c4968d1dacb69693babc76fba30857ee44c7cb6519da5fca032768c7aa7827c6d61e3cd2ee6ff4e86ea2820bc9ac9bed709898c913947c03d4060c33df06bc6f4efd9d3e177f66785fc3f69e24b8b8d3f486985b69cda941702ebcd9247db26f46670ad2cb8008e1c83bb031ecfe0ef05695e04d2e7d3f48b64b6b79ef2e2fa40a8aa5a59a5691c9da003cb6077daaa327154925b194a529bbc9dcf8aff6dff14cc3c63aa5abb6d5b6b686de107a60af98c7f373f90af1bfd973f67dbff8a5e2b8a79203fd956f2096e26957e5c7a7be7d3d33d38afb9bf681fd9a6dbe36cf6b770ded9e977f0a6d69ae2d1e6f331f741db2a703f13ee2a6f85ff0b7e207c33d220d26d759f07b69d19c95b7d0ee629243dcb31ba6c9f7ae0af4675a32a517caa5a37d6de5ebb5fa6e09db53d7347d260d134d82cad976c512e07bfa9fc6b15b4ebafecdf11a5d411442e677784a49bf7a796803370369c8231cf41cf3c6ed88bc110178d0b49dcc0081f9126a796159e378dc064604153dc574c68c29c234e0aca2ac97e03526afe67c91e2bf12eb3a56a2f07f64c924b9d82458f923ebe95e6be18f83171e26f1f5eeb7e2cbeb54d1e595678adee541ba2c320c40f688827239ebc63273f4ff008e7e0b78a75a9e47d0fc61636f031256db5ad20ddedf61247344d8f76dc7d49ae3bc37fb38fc45d3f5e82e6ffc6fe1e5d3d5b3243a6682f1cac3d03cb34807e55e53c1cf9eef547a11ac92d256fbcd4fd9474af115dfc33d5fc33e3d853501a26b7736da5cf348b33cba7e4496a6423f8c46e01079dbb739c9af63bcf01f87f505856e748b599621b515e30428ce718fa9cfd79abfa1e8769e1fb15b5b48c226773b1e5a46eecc7b9e07e407415a15ecc5351499e749a6ee8e76cbe1d786b4dbb4b9b4d16d2da74dbb5e28c291b5b72e31e8403f857454515649ffd9, 30000.0000, 1, NULL);
INSERT INTO `wl_orders_products` (`orders_products_id`, `orders_id`, `products_id`, `product_name`, `product_code`, `product_image`, `product_price`, `quantity`, `shipping_charge`) VALUES
(9, 8, 6, 'Embroidered and Embellished', '014', 0xffd8ffe000104a46494600010100000100010000fffe003b43524541544f523a2067642d6a7065672076312e3020287573696e6720494a47204a50454720763632292c207175616c697479203d2039300affdb0043000302020302020303030304030304050805050404050a070706080c0a0c0c0b0a0b0b0d0e12100d0e110e0b0b1016101113141515150c0f171816141812141514ffdb00430103040405040509050509140d0b0d1414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414ffc00011080040005003012200021101031101ffc4001f0000010501010101010100000000000000000102030405060708090a0bffc400b5100002010303020403050504040000017d01020300041105122131410613516107227114328191a1082342b1c11552d1f02433627282090a161718191a25262728292a3435363738393a434445464748494a535455565758595a636465666768696a737475767778797a838485868788898a92939495969798999aa2a3a4a5a6a7a8a9aab2b3b4b5b6b7b8b9bac2c3c4c5c6c7c8c9cad2d3d4d5d6d7d8d9dae1e2e3e4e5e6e7e8e9eaf1f2f3f4f5f6f7f8f9faffc4001f0100030101010101010101010000000000000102030405060708090a0bffc400b51100020102040403040705040400010277000102031104052131061241510761711322328108144291a1b1c109233352f0156272d10a162434e125f11718191a262728292a35363738393a434445464748494a535455565758595a636465666768696a737475767778797a82838485868788898a92939495969798999aa2a3a4a5a6a7a8a9aab2b3b4b5b6b7b8b9bac2c3c4c5c6c7c8c9cad2d3d4d5d6d7d8d9dae2e3e4e5e6e7e8e9eaf2f3f4f5f6f7f8f9faffda000c03010002110311003f00f00f813f0e7c2fae787fed17cca3529209238b1205cb36410463debc77e22f84ad746f1bded95827ee2303a7af7af68f869f0f275b9c4532431cb6ca2367815fe67466d9961c6495c74393c114cf157c2c8b409ec6538926b88d8cb267219c373c1e9c62b921394a6e32d91f7795461f5b716debb2323e067c2abcb9f16e8b7b3da39b5494492164e02fa9f6c1afbb97c1be18b9f0a3dbc2b147710ef57cc9c0dc98cf3c7a7d2bc07e175a5d6b30dcddde4c3c989a2b78f6e10895dd4e57d4e14f5af6db8b54d33c1b3cd752bdfc5732891b4eb6b68de4702324ec555ddbb201001e73cf15c6b1351c9a6968edbf95cc3378caa62173bb35a69fd799f33eb5e0fd1fc2ba4deeabaadc4365616cad234b23637019e17d49c703be457997c396f167c72d775483e1e69763a75969366f7d75aa6b9203e5c61588fdda64e5b6918018fd2bb1f8b3fb3d7c5cf8c13ea1e2ed4bc277fe1df0bdbdbbcd696a76cb71b410103c2ac593e5c127185c1af42fd9c3c19ae9f01de681a468e74fb6b9b216da897611bdf5c794e598b2b1631e18a86c1607380074d9e29461efbf7bb7f5b8b158dc562e3cb455a1dffadbf53e54f0e7c45f1178da5b1b7bbd0b4fbf5b58da574b44782e44279de0b9d8475200ea73d2bd06fbe1a5bea5651dd5b2892199772b639fa1f423a11d8d7d91f053f646f855ae7872c8f882feeaf759b6b46823bfd3d9ada3b655072bf2b3600c1e24ebe95c69f8550784b56f116996b7a9a9e949a831b0b81184678bcb405980e012c1ba01ebdebae9e22355d923a328a989a73746a3bc77f47fa9f13f883e1cc96bb8aa1e2b85baf0fbdb5ec41908c38fe75fa0d71fb3f6b5e28b25bab2b0516f2b6c8e59a458c393fddc9cb7e19f6aa7e2efd8eac96dad8c417cc4489e6796e0a48ee5b6be3e5daa15811b48cf0093cf1956c5518692d7d0f57158bc2c7dda9abf2e87967833c61ad6a5314bd786e946d04bc637109c2f35dc6bdaf5eeafa6c569ab462feda16f32252ec85091cfcc3923afde27af5e98f3ef0644b6b76e49c0c9fe75e9da226917faf5941acdc1b7d359bf7ae0edec7009c1c027009ec28a8a2939bbe9daff00a1ebcb0786a6fdaa859aedbfcac3fe17f877c67e22d4e1b8f0cd8dba58e9ecde5a4d214856623ef92725d803df207b57bf699f0efc75e25f18f8345e6a0209bcbba3abda42a86ddd3e5f2d810325b708f9c0c05c77356be145fe87a268f349a4a245a78b86511c1279a2471c1d8d925b38ff00f557b9fc30d3e485f54d5dc309e72f2244efbbc953c8407d335e27b6f6c9282b27adbafcfccf95c7558d46e7ca95b67d7e7f99e43f15750f13c9e26b9d2345959fc329689611d9f9211cde8d8de7c72a80e3614e0670497ce4600e23e197827c47e16f135b4434bb89ad7cd66fb54256331b1c92a3a06cf3f28fc057d59e21f0e43a2e9704f240ced237dd8a32cecc7b003924d73d7d3c297ba2218e2b3bbfb5acf6f6f228692431fccc807f012818738eb58bc2cead55bab1cf4f170a345f2db53e70f8ff00fb536bff000e756d3349f0de9f37887c4979118a49af74f963b0b643950595d33248727e556dbd0b1ed597a6cf25c5944f2c26de5dbf32326dc1ef81e99af6cd43501e38d5af62d4ed4e9ba75e03035ae9b3bb9b33cbacb25d40c0c21a30480ca8320e247ce29d65e193f117c3da9f9d7f0ea53e9f3c90d8dd5bdb98dcc1d2259396dec029cbfc8189e477afa2a34bd8ab3dcd301889de55541f2689bd2cafb7f573c62c6fb51d16364b7bf9e48447e5450cedbd614ddbb681dc03d376ec74181c57adf8234cbcd4fe1e787aef519deeaeee23732cd3b0f327449a5585d89ea760009ea42027d6b94f87bf0b352f19ea4e75049b4dd1ade5d93cee843cc41e63887f131f5e8339af5af8976971e07f14f81da0fb3c7a35ecada73d888b72da858c794aa73dc06ea3a826bc9c6fb1846f05d55daf376febfe1c9cca74652546925cdab7f76c7e5c7877c4111ba7c30fbc7f9d75b79abc6d1e4483a57ce1a4f8a0d9de4dcb11bdb81927afa5766e350d6ad12eae3c4da67872cca6efb309ddaf63e3e5322a292a49e768c1c7515ecd7c452a31527a9f7b19c6a4a3186adff5f71f647ecede32b19a38f4e69545c42e70ae7a6e392457d8da5f8cf45f09590b6bfbc8e39a401cc39cc98c8c7039e4e00f5afc67f0af87fc49a9dec8fa178ef4ad5aee220886fe792094f3c15695548fa8615e95a8f8bfc49a5f86afacfc7b10d2ef1ca1b4d5662d756976e8e24d866cb724ae3ef6327243018af129b8bafcc9eeeffd6c7cde6997d674658870693f4fcd5d7f5dcfbf35ff00dacee3c6daaf87b49f094f2e996936af77617f05ce933b5cecb684bb8462d1ae58e141c91cf7c1c79f781bc1b73a7bfc3ed57c457bac4ab0497f7d269fa809114dddcb1c392d3c854c51b602863b492430248af04d0bc6563e2893ed568f1699a5c5a8cfa9a5cada4115d34d3e19d43222e13800af56006e24703e88f0af8fb50f14ea10cf722da282395a4063b70aaf271960ad9c7239c6057b32af6b3476e0b827134543138c8a7169b71bb56d34bf77e5f7f97aff008cb5ff0033498ec2d89584a6cdd23125801d598e493ee4935c5fc38d4bfb32596ca5002cac791dbaf15aedaf69f24fbf593e7072a10c6e1517aee2e40240e8381debcebc53e37d06d3c697167e1991af6ca16456b80e816366e3e6662a00dc768248c9238a2737292944fa6c150a74b0d5308e0e304b99cad68ab7f7be7f3e87d23a26bb61f6195753b63791c28424eaec1e24da7a1078ee38c7ad731e23be82fe28a69caccd6ec8f1b48ca0075c81272c0f71c8fef1f5af21d4be394de06d22eb52d5b41d5ac74380cd65a86a1288d6257014797b0b6e72c5c202a0aee0464115a7a7fc409bc4fa45af88b49fb3ea9a06af0652e0031f983715643110363065208e99527bd7cd6654dd3a8a7d1f4ecfcff43f36c6e1e9c64eb61e4a516ed75b5faaedaefa1f92ff0016be234f278defed74e893464b67785eeada311dc4a7bee71ce33e9dab87d03c4575a5dd1922b9da653b662f96539e84fbfbd7d13f15fe025bf8cb50b8d474dbc4b3d5790c920fddcbcf193d41f7e6bc3354f82fe34d14b19342b89d071e6db62553f4da49af769c694a9f23f99f3d4b1d88c35755a9c9dd3d1eb7f436fc23e2216dafa5e5d6c2251b06d21557247cc73f43dfbd7bbf857e229f0d25c433470ea3a2dfa7977ba45f2f996d7711ea190f43e8c3041e86be5c87c3fae59cb0bcba36a6258b206eb77207e047d722b7ee34cf1fdd69b35e36997915946bb9de48c4636fae0e09e3d2bcac4e5ee7514e9c946c7eb59271d50c1602ae0b1b49d58cdded64ef75adef6ff81d0f7ef09a59685e33b9d2f4657d6e3b7bf6834db512191d9300a0900e4b619471e86bbcd47c7bae4924d6b32cda75d42c516d621b7ca656c3aecc71ce7939e95f3afc35f13dff0086746bb96c679229e6dab73771afceb925b024eaa4e3b632063a715d4e87e266d42f62b71746d838f9e4396185c96623af0b9e0753c77a978aa91a8a959db6d16e7ea59066f87a7808cf1ee3cb18f9b696faebd169e7e4b43e8183e2278e7e24b49a30d71cc126d125b44c208138240ecb938e9c64e3ae2bdf3c337be1bf859a00b7d1e05b9b1d46287fb4eef58f2a40fc7ef2dda2460c642187c8ea548fbc40005780683e3cd1f421a468f05969da668fab5afdbf49d6f51df15f5fb8204b13c437328e3717063e0003a127cafc69f149351f13c16ba73ecd06cd9a0b24f34fcf83f3c8c49272c79dc7b62bd7a957eab04e5ac9fe07e6d5b32a7c6b987d4682f6181a6eed4524e4fa37e6fa5f6577b9f53fc42f1ee89e27f0fdf68d35841fd8f77b84b6c472f918c93d720602e3ee8000c002bcabc07f1527f865e0bb2d023325f69961aadcd98f381c3ee733c4463a7c92107dd0d71da46b7a1f89b428dee35c5d27530ccb30966ca050386dac3a1f663f4ae0878aaceea59ac2fa09af2017aa7cd8e5923deaa586e099009209c16e80f4ae3972d55fbd6b5ea756674304b0ff0057c061f9bd8bf7a0d357566ae9f577774d3bbdfa9fffd9, 90.0000, 1, NULL),
(10, 8, 7, 'Footwear Fetish', 'LP306512', 0xffd8ffe000104a46494600010100000100010000fffe003b43524541544f523a2067642d6a7065672076312e3020287573696e6720494a47204a50454720763632292c207175616c697479203d2039300affdb0043000302020302020303030304030304050805050404050a070706080c0a0c0c0b0a0b0b0d0e12100d0e110e0b0b1016101113141515150c0f171816141812141514ffdb00430103040405040509050509140d0b0d1414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414ffc00011080040005003012200021101031101ffc4001f0000010501010101010100000000000000000102030405060708090a0bffc400b5100002010303020403050504040000017d01020300041105122131410613516107227114328191a1082342b1c11552d1f02433627282090a161718191a25262728292a3435363738393a434445464748494a535455565758595a636465666768696a737475767778797a838485868788898a92939495969798999aa2a3a4a5a6a7a8a9aab2b3b4b5b6b7b8b9bac2c3c4c5c6c7c8c9cad2d3d4d5d6d7d8d9dae1e2e3e4e5e6e7e8e9eaf1f2f3f4f5f6f7f8f9faffc4001f0100030101010101010101010000000000000102030405060708090a0bffc400b51100020102040403040705040400010277000102031104052131061241510761711322328108144291a1b1c109233352f0156272d10a162434e125f11718191a262728292a35363738393a434445464748494a535455565758595a636465666768696a737475767778797a82838485868788898a92939495969798999aa2a3a4a5a6a7a8a9aab2b3b4b5b6b7b8b9bac2c3c4c5c6c7c8c9cad2d3d4d5d6d7d8d9dae2e3e4e5e6e7e8e9eaf2f3f4f5f6f7f8f9faffda000c03010002110311003f00fd51ed5f147ed0df1e7c5fa27c59d5bc136f792d912892e986d26303cae46523dc08c9704819ce5b68e2bebef1578c745f0569726a1adea56da6daa296df71205ce081819ea72ca38ee47ad7e597c4bf1e1f8a3f1b351f1cdf3c76da5db5d2c9636e655679fc9c186200127aed67feea9f56507e5f3b9d7bd1861dbe6e6be9dbcfe6745249ddcb63eb8f84bfb50dfd9eb161a378a9df50b2bf488dadfaa8f36369151915fa6e52245e7a83d73dbeabb6b84ba85268d8346ebb9587715f9d13e877296ba1de6d685a0d3b4c9836deb348a1123f6388f77d16bef5f02deaff0064456d24a9e78dccb1eef9b667ae3d326bd158b9c71b1c34968e2dfcd3b7e29fe06295d5ce9bb51eb4668af5c90f4a4ed55b50d56cf49844b7b77059c47761e79022fcaacedc9f455663e8149e82b16c3e24f84b54bbb6b4b3f1468b777572aaf04106a113bcaac4852aa1b2c0956c11d769f4a00e93b9a4f4a28a00f14fda93c356fe2df0745a6dfddc56ba74e9324c593748080ae8e9dbe564190700e7af183f9d10f8012fbe2ef86fc29a5c36707d9a064b78d6f1ae37b02c5bcf7da0093219d955147cbd3e6c9fd31f8f7f681a26946da4bd591eeca797a7471b4f28f2ddca29930aa30849e4120103922bf3ae1f1647e0ff00da2b52d7ae6eac2fa6d32cef1e33656fe44724cdb638d0ae4f3ba5c1396e173938af9355ab54cede1e52f7142e97dcba7cf77e9d4dacbd9dfa9f4adf6851b6bfa0f83ecda4b8b6d3a032cf7720f9aeae84646efa2f96a800fbbc8ed57fe2c7c5b93e12fc55f05ea2fbbec1e5bdac813a38523cc53f84831ef8f4aef7e15f8202f8974b69e737771a7c3796b3c927de766963b9573ee7ce3ff7d57cf9fb40784752f18e9da8289160b8f0bdc497573e7f01602423b93d954b23b1ecaacddb073c4519bc6d5c427b5a2be5ef3fcd7dc7a396b87b44aa6cf47f3d0fbf348d56db5cd32d350b2996e2d2ea259a1950f0e8c01047e06ae7ad7ccdfb1678e6fe5f0dddf8275827ed7a401359b939125bb1e80f7018f07d1c7a57d33eb5f4d86af1c4d28d58f539317869612bca8cba7e5d0e4fe27e8fa3ea9e11bd9b5dd426d2b4cb18a5b9b8bc859418a2f29d25cee5618313c8a78ce1b2304023cd231f0b3c37ae695670789dedeff48d16dee974e8a412493d9c52fda15dd3cb2eced26d9085c3b1030304831fedb7af368ff01f52b402e562d5a78ec6796d62691a38b0d2be428380c22d84f41bebc5bc13707c63f1361b5b7834d169ae5bdb41657d796727db2cae1343824127de5fdd90854a6013b89045675710e153d9af2fc6e7bb81ca2188c1bc5d56d25cdb7f7797c9f77a6fa1f66e89e29d33c44fb74fba173fe8b05e6555b1e54c18c4d9231c84638ea0632064675abc33f672d71e39b50d05adc3c71c104d06a1e67cd7112410c709f2f1f20307d9dbef1f99a4e9dfdd3d2baa9cb9e373c2c5d0fabd674d6c78d7ed3577636fe19d15754bcfb3e97f6f2f7510338370820942afee54b70ec8dc8c7ca3be2bf2e3e23dec973f16a7b9b9d43fb5b79665ba103c5bd4905405701861703e619c015fa21fb6dea6a9a1e8964242adb679d8038e06c519fcdbf2afcd67ba92ff0057bb25d9dfce0abcfb0c0af3e38384b192af77771b74b7cb4bfaebf9239b9b4b1fa61fb2478c2ebe2336b1e23bb8d2176f2ec56146240f2a28c96f72dbc64ffb20740293e215e3786bc75ae6b474d4d5238e3b8b1bab391b64776af07991c6c7071b83ece87851c568fec69e059fc25f0efceb93892e5b7edc6304aaff0040bf8e6badf176809abe91e39678c330d4217527fd982107f4622b830f3788a4ebc3694e4d79a5749fcec9fa1d547962e4a5d97e68f19f82fa9d8c3e09f86fe3dd2408ade28174cbc8f7862224636f2027033b5a3ce703a7415f5ea90466bf38fe0c78aef7c21e14f1a7c22d4749963d4748d4ae1f4774424dcc121ca803b9fe2dddc38cf39af63f0f7ed4de2bf06781ed6cbc53e1ab75d7b497822bc11ea114cd340c09538463e5ca540386ebd4679da616b430b5aad27a4747f37b9ea62a8cf13461593d6ed6fadba1f47fc4ad6347d2bc2f2dbeb96d737961aab8d2dadad519a494cc0a6d1b4823209e4118af08b1f1e7c12d4fc45a77886cf44d55751d434f8745b5d663b2b85c5bcbe7c29839e0816b3a9931b808c8ce319f62f1145e1df8a5e09d32fafb525d3f4d8ef22bd8ae3ccb765596273b43798af19e7b60fb10466bcd8fc08f85aba269fa5dc789ef1e3d326816d27bcbd84cd1cd1bddbc52233c7cb2b5fca430ce084c1f94e7e81c633d5a3c5856ab4538c24d5f7b3352cfe33fc2bf0d49a5f8a34e5bc693c4968d1dacb69693babc76fba30857ee44c7cb6519da5fca032768c7aa7827c6d61e3cd2ee6ff4e86ea2820bc9ac9bed709898c913947c03d4060c33df06bc6f4efd9d3e177f66785fc3f69e24b8b8d3f486985b69cda941702ebcd9247db26f46670ad2cb8008e1c83bb031ecfe0ef05695e04d2e7d3f48b64b6b79ef2e2fa40a8aa5a59a5691c9da003cb6077daaa327154925b194a529bbc9dcf8aff6dff14cc3c63aa5abb6d5b6b686de107a60af98c7f373f90af1bfd973f67dbff8a5e2b8a79203fd956f2096e26957e5c7a7be7d3d33d38afb9bf681fd9a6dbe36cf6b770ded9e977f0a6d69ae2d1e6f331f741db2a703f13ee2a6f85ff0b7e207c33d220d26d759f07b69d19c95b7d0ee629243dcb31ba6c9f7ae0af4675a32a517caa5a37d6de5ebb5fa6e09db53d7347d260d134d82cad976c512e07bfa9fc6b15b4ebafecdf11a5d411442e677784a49bf7a796803370369c8231cf41cf3c6ed88bc110178d0b49dcc0081f9126a796159e378dc064604153dc574c68c29c234e0aca2ac97e03526afe67c91e2bf12eb3a56a2f07f64c924b9d82458f923ebe95e6be18f83171e26f1f5eeb7e2cbeb54d1e595678adee541ba2c320c40f688827239ebc63273f4ff008e7e0b78a75a9e47d0fc61636f031256db5ad20ddedf61247344d8f76dc7d49ae3bc37fb38fc45d3f5e82e6ffc6fe1e5d3d5b3243a6682f1cac3d03cb34807e55e53c1cf9eef547a11ac92d256fbcd4fd9474af115dfc33d5fc33e3d853501a26b7736da5cf348b33cba7e4496a6423f8c46e01079dbb739c9af63bcf01f87f505856e748b599621b515e30428ce718fa9cfd79abfa1e8769e1fb15b5b48c226773b1e5a46eecc7b9e07e407415a15ecc5351499e749a6ee8e76cbe1d786b4dbb4b9b4d16d2da74dbb5e28c291b5b72e31e8403f857454515649ffd9, 30000.0000, 1, NULL),
(11, 9, 6, 'Embroidered and Embellished', '014', 0xffd8ffe000104a46494600010100000100010000fffe003b43524541544f523a2067642d6a7065672076312e3020287573696e6720494a47204a50454720763632292c207175616c697479203d2039300affdb0043000302020302020303030304030304050805050404050a070706080c0a0c0c0b0a0b0b0d0e12100d0e110e0b0b1016101113141515150c0f171816141812141514ffdb00430103040405040509050509140d0b0d1414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414ffc00011080040005003012200021101031101ffc4001f0000010501010101010100000000000000000102030405060708090a0bffc400b5100002010303020403050504040000017d01020300041105122131410613516107227114328191a1082342b1c11552d1f02433627282090a161718191a25262728292a3435363738393a434445464748494a535455565758595a636465666768696a737475767778797a838485868788898a92939495969798999aa2a3a4a5a6a7a8a9aab2b3b4b5b6b7b8b9bac2c3c4c5c6c7c8c9cad2d3d4d5d6d7d8d9dae1e2e3e4e5e6e7e8e9eaf1f2f3f4f5f6f7f8f9faffc4001f0100030101010101010101010000000000000102030405060708090a0bffc400b51100020102040403040705040400010277000102031104052131061241510761711322328108144291a1b1c109233352f0156272d10a162434e125f11718191a262728292a35363738393a434445464748494a535455565758595a636465666768696a737475767778797a82838485868788898a92939495969798999aa2a3a4a5a6a7a8a9aab2b3b4b5b6b7b8b9bac2c3c4c5c6c7c8c9cad2d3d4d5d6d7d8d9dae2e3e4e5e6e7e8e9eaf2f3f4f5f6f7f8f9faffda000c03010002110311003f00f00f813f0e7c2fae787fed17cca3529209238b1205cb36410463debc77e22f84ad746f1bded95827ee2303a7af7af68f869f0f275b9c4532431cb6ca2367815fe67466d9961c6495c74393c114cf157c2c8b409ec6538926b88d8cb267219c373c1e9c62b921394a6e32d91f7795461f5b716debb2323e067c2abcb9f16e8b7b3da39b5494492164e02fa9f6c1afbb97c1be18b9f0a3dbc2b147710ef57cc9c0dc98cf3c7a7d2bc07e175a5d6b30dcddde4c3c989a2b78f6e10895dd4e57d4e14f5af6db8b54d33c1b3cd752bdfc5732891b4eb6b68de4702324ec555ddbb201001e73cf15c6b1351c9a6968edbf95cc3378caa62173bb35a69fd799f33eb5e0fd1fc2ba4deeabaadc4365616cad234b23637019e17d49c703be457997c396f167c72d775483e1e69763a75969366f7d75aa6b9203e5c61588fdda64e5b6918018fd2bb1f8b3fb3d7c5cf8c13ea1e2ed4bc277fe1df0bdbdbbcd696a76cb71b410103c2ac593e5c127185c1af42fd9c3c19ae9f01de681a468e74fb6b9b216da897611bdf5c794e598b2b1631e18a86c1607380074d9e29461efbf7bb7f5b8b158dc562e3cb455a1dffadbf53e54f0e7c45f1178da5b1b7bbd0b4fbf5b58da574b44782e44279de0b9d8475200ea73d2bd06fbe1a5bea5651dd5b2892199772b639fa1f423a11d8d7d91f053f646f855ae7872c8f882feeaf759b6b46823bfd3d9ada3b655072bf2b3600c1e24ebe95c69f8550784b56f116996b7a9a9e949a831b0b81184678bcb405980e012c1ba01ebdebae9e22355d923a328a989a73746a3bc77f47fa9f13f883e1cc96bb8aa1e2b85baf0fbdb5ec41908c38fe75fa0d71fb3f6b5e28b25bab2b0516f2b6c8e59a458c393fddc9cb7e19f6aa7e2efd8eac96dad8c417cc4489e6796e0a48ee5b6be3e5daa15811b48cf0093cf1956c5518692d7d0f57158bc2c7dda9abf2e87967833c61ad6a5314bd786e946d04bc637109c2f35dc6bdaf5eeafa6c569ab462feda16f32252ec85091cfcc3923afde27af5e98f3ef0644b6b76e49c0c9fe75e9da226917faf5941acdc1b7d359bf7ae0edec7009c1c027009ec28a8a2939bbe9daff00a1ebcb0786a6fdaa859aedbfcac3fe17f877c67e22d4e1b8f0cd8dba58e9ecde5a4d214856623ef92725d803df207b57bf699f0efc75e25f18f8345e6a0209bcbba3abda42a86ddd3e5f2d810325b708f9c0c05c77356be145fe87a268f349a4a245a78b86511c1279a2471c1d8d925b38ff00f557b9fc30d3e485f54d5dc309e72f2244efbbc953c8407d335e27b6f6c9282b27adbafcfccf95c7558d46e7ca95b67d7e7f99e43f15750f13c9e26b9d2345959fc329689611d9f9211cde8d8de7c72a80e3614e0670497ce4600e23e197827c47e16f135b4434bb89ad7cd66fb54256331b1c92a3a06cf3f28fc057d59e21f0e43a2e9704f240ced237dd8a32cecc7b003924d73d7d3c297ba2218e2b3bbfb5acf6f6f228692431fccc807f012818738eb58bc2cead55bab1cf4f170a345f2db53e70f8ff00fb536bff000e756d3349f0de9f37887c4979118a49af74f963b0b643950595d33248727e556dbd0b1ed597a6cf25c5944f2c26de5dbf32326dc1ef81e99af6cd43501e38d5af62d4ed4e9ba75e03035ae9b3bb9b33cbacb25d40c0c21a30480ca8320e247ce29d65e193f117c3da9f9d7f0ea53e9f3c90d8dd5bdb98dcc1d2259396dec029cbfc8189e477afa2a34bd8ab3dcd301889de55541f2689bd2cafb7f573c62c6fb51d16364b7bf9e48447e5450cedbd614ddbb681dc03d376ec74181c57adf8234cbcd4fe1e787aef519deeaeee23732cd3b0f327449a5585d89ea760009ea42027d6b94f87bf0b352f19ea4e75049b4dd1ade5d93cee843cc41e63887f131f5e8339af5af8976971e07f14f81da0fb3c7a35ecada73d888b72da858c794aa73dc06ea3a826bc9c6fb1846f05d55daf376febfe1c9cca74652546925cdab7f76c7e5c7877c4111ba7c30fbc7f9d75b79abc6d1e4483a57ce1a4f8a0d9de4dcb11bdb81927afa5766e350d6ad12eae3c4da67872cca6efb309ddaf63e3e5322a292a49e768c1c7515ecd7c452a31527a9f7b19c6a4a3186adff5f71f647ecede32b19a38f4e69545c42e70ae7a6e392457d8da5f8cf45f09590b6bfbc8e39a401cc39cc98c8c7039e4e00f5afc67f0af87fc49a9dec8fa178ef4ad5aee220886fe792094f3c15695548fa8615e95a8f8bfc49a5f86afacfc7b10d2ef1ca1b4d5662d756976e8e24d866cb724ae3ef6327243018af129b8bafcc9eeeffd6c7cde6997d674658870693f4fcd5d7f5dcfbf35ff00dacee3c6daaf87b49f094f2e996936af77617f05ce933b5cecb684bb8462d1ae58e141c91cf7c1c79f781bc1b73a7bfc3ed57c457bac4ab0497f7d269fa809114dddcb1c392d3c854c51b602863b492430248af04d0bc6563e2893ed568f1699a5c5a8cfa9a5cada4115d34d3e19d43222e13800af56006e24703e88f0af8fb50f14ea10cf722da282395a4063b70aaf271960ad9c7239c6057b32af6b3476e0b827134543138c8a7169b71bb56d34bf77e5f7f97aff008cb5ff0033498ec2d89584a6cdd23125801d598e493ee4935c5fc38d4bfb32596ca5002cac791dbaf15aedaf69f24fbf593e7072a10c6e1517aee2e40240e8381debcebc53e37d06d3c697167e1991af6ca16456b80e816366e3e6662a00dc768248c9238a2737292944fa6c150a74b0d5308e0e304b99cad68ab7f7be7f3e87d23a26bb61f6195753b63791c28424eaec1e24da7a1078ee38c7ad731e23be82fe28a69caccd6ec8f1b48ca0075c81272c0f71c8fef1f5af21d4be394de06d22eb52d5b41d5ac74380cd65a86a1288d6257014797b0b6e72c5c202a0aee0464115a7a7fc409bc4fa45af88b49fb3ea9a06af0652e0031f983715643110363065208e99527bd7cd6654dd3a8a7d1f4ecfcff43f36c6e1e9c64eb61e4a516ed75b5faaedaefa1f92ff0016be234f278defed74e893464b67785eeada311dc4a7bee71ce33e9dab87d03c4575a5dd1922b9da653b662f96539e84fbfbd7d13f15fe025bf8cb50b8d474dbc4b3d5790c920fddcbcf193d41f7e6bc3354f82fe34d14b19342b89d071e6db62553f4da49af769c694a9f23f99f3d4b1d88c35755a9c9dd3d1eb7f436fc23e2216dafa5e5d6c2251b06d21557247cc73f43dfbd7bbf857e229f0d25c433470ea3a2dfa7977ba45f2f996d7711ea190f43e8c3041e86be5c87c3fae59cb0bcba36a6258b206eb77207e047d722b7ee34cf1fdd69b35e36997915946bb9de48c4636fae0e09e3d2bcac4e5ee7514e9c946c7eb59271d50c1602ae0b1b49d58cdded64ef75adef6ff81d0f7ef09a59685e33b9d2f4657d6e3b7bf6834db512191d9300a0900e4b619471e86bbcd47c7bae4924d6b32cda75d42c516d621b7ca656c3aecc71ce7939e95f3afc35f13dff0086746bb96c679229e6dab73771afceb925b024eaa4e3b632063a715d4e87e266d42f62b71746d838f9e4396185c96623af0b9e0753c77a978aa91a8a959db6d16e7ea59066f87a7808cf1ee3cb18f9b696faebd169e7e4b43e8183e2278e7e24b49a30d71cc126d125b44c208138240ecb938e9c64e3ae2bdf3c337be1bf859a00b7d1e05b9b1d46287fb4eef58f2a40fc7ef2dda2460c642187c8ea548fbc40005780683e3cd1f421a468f05969da668fab5afdbf49d6f51df15f5fb8204b13c437328e3717063e0003a127cafc69f149351f13c16ba73ecd06cd9a0b24f34fcf83f3c8c49272c79dc7b62bd7a957eab04e5ac9fe07e6d5b32a7c6b987d4682f6181a6eed4524e4fa37e6fa5f6577b9f53fc42f1ee89e27f0fdf68d35841fd8f77b84b6c472f918c93d720602e3ee8000c002bcabc07f1527f865e0bb2d023325f69961aadcd98f381c3ee733c4463a7c92107dd0d71da46b7a1f89b428dee35c5d27530ccb30966ca050386dac3a1f663f4ae0878aaceea59ac2fa09af2017aa7cd8e5923deaa586e099009209c16e80f4ae3972d55fbd6b5ea756674304b0ff0057c061f9bd8bf7a0d357566ae9f577774d3bbdfa9fffd9, 90.0000, 1, NULL),
(12, 9, 7, 'Footwear Fetish', 'LP306512', 0xffd8ffe000104a46494600010100000100010000fffe003b43524541544f523a2067642d6a7065672076312e3020287573696e6720494a47204a50454720763632292c207175616c697479203d2039300affdb0043000302020302020303030304030304050805050404050a070706080c0a0c0c0b0a0b0b0d0e12100d0e110e0b0b1016101113141515150c0f171816141812141514ffdb00430103040405040509050509140d0b0d1414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414ffc00011080040005003012200021101031101ffc4001f0000010501010101010100000000000000000102030405060708090a0bffc400b5100002010303020403050504040000017d01020300041105122131410613516107227114328191a1082342b1c11552d1f02433627282090a161718191a25262728292a3435363738393a434445464748494a535455565758595a636465666768696a737475767778797a838485868788898a92939495969798999aa2a3a4a5a6a7a8a9aab2b3b4b5b6b7b8b9bac2c3c4c5c6c7c8c9cad2d3d4d5d6d7d8d9dae1e2e3e4e5e6e7e8e9eaf1f2f3f4f5f6f7f8f9faffc4001f0100030101010101010101010000000000000102030405060708090a0bffc400b51100020102040403040705040400010277000102031104052131061241510761711322328108144291a1b1c109233352f0156272d10a162434e125f11718191a262728292a35363738393a434445464748494a535455565758595a636465666768696a737475767778797a82838485868788898a92939495969798999aa2a3a4a5a6a7a8a9aab2b3b4b5b6b7b8b9bac2c3c4c5c6c7c8c9cad2d3d4d5d6d7d8d9dae2e3e4e5e6e7e8e9eaf2f3f4f5f6f7f8f9faffda000c03010002110311003f00fd51ed5f147ed0df1e7c5fa27c59d5bc136f792d912892e986d26303cae46523dc08c9704819ce5b68e2bebef1578c745f0569726a1adea56da6daa296df71205ce081819ea72ca38ee47ad7e597c4bf1e1f8a3f1b351f1cdf3c76da5db5d2c9636e655679fc9c186200127aed67feea9f56507e5f3b9d7bd1861dbe6e6be9dbcfe6745249ddcb63eb8f84bfb50dfd9eb161a378a9df50b2bf488dadfaa8f36369151915fa6e52245e7a83d73dbeabb6b84ba85268d8346ebb9587715f9d13e877296ba1de6d685a0d3b4c9836deb348a1123f6388f77d16bef5f02deaff0064456d24a9e78dccb1eef9b667ae3d326bd158b9c71b1c34968e2dfcd3b7e29fe06295d5ce9bb51eb4668af5c90f4a4ed55b50d56cf49844b7b77059c47761e79022fcaacedc9f455663e8149e82b16c3e24f84b54bbb6b4b3f1468b777572aaf04106a113bcaac4852aa1b2c0956c11d769f4a00e93b9a4f4a28a00f14fda93c356fe2df0745a6dfddc56ba74e9324c593748080ae8e9dbe564190700e7af183f9d10f8012fbe2ef86fc29a5c36707d9a064b78d6f1ae37b02c5bcf7da0093219d955147cbd3e6c9fd31f8f7f681a26946da4bd591eeca797a7471b4f28f2ddca29930aa30849e4120103922bf3ae1f1647e0ff00da2b52d7ae6eac2fa6d32cef1e33656fe44724cdb638d0ae4f3ba5c1396e173938af9355ab54cede1e52f7142e97dcba7cf77e9d4dacbd9dfa9f4adf6851b6bfa0f83ecda4b8b6d3a032cf7720f9aeae84646efa2f96a800fbbc8ed57fe2c7c5b93e12fc55f05ea2fbbec1e5bdac813a38523cc53f84831ef8f4aef7e15f8202f8974b69e737771a7c3796b3c927de766963b9573ee7ce3ff7d57cf9fb40784752f18e9da8289160b8f0bdc497573e7f01602423b93d954b23b1ecaacddb073c4519bc6d5c427b5a2be5ef3fcd7dc7a396b87b44aa6cf47f3d0fbf348d56db5cd32d350b2996e2d2ea259a1950f0e8c01047e06ae7ad7ccdfb1678e6fe5f0dddf8275827ed7a401359b939125bb1e80f7018f07d1c7a57d33eb5f4d86af1c4d28d58f539317869612bca8cba7e5d0e4fe27e8fa3ea9e11bd9b5dd426d2b4cb18a5b9b8bc859418a2f29d25cee5618313c8a78ce1b2304023cd231f0b3c37ae695670789dedeff48d16dee974e8a412493d9c52fda15dd3cb2eced26d9085c3b1030304831fedb7af368ff01f52b402e562d5a78ec6796d62691a38b0d2be428380c22d84f41bebc5bc13707c63f1361b5b7834d169ae5bdb41657d796727db2cae1343824127de5fdd90854a6013b89045675710e153d9af2fc6e7bb81ca2188c1bc5d56d25cdb7f7797c9f77a6fa1f66e89e29d33c44fb74fba173fe8b05e6555b1e54c18c4d9231c84638ea0632064675abc33f672d71e39b50d05adc3c71c104d06a1e67cd7112410c709f2f1f20307d9dbef1f99a4e9dfdd3d2baa9cb9e373c2c5d0fabd674d6c78d7ed3577636fe19d15754bcfb3e97f6f2f7510338370820942afee54b70ec8dc8c7ca3be2bf2e3e23dec973f16a7b9b9d43fb5b79665ba103c5bd4905405701861703e619c015fa21fb6dea6a9a1e8964242adb679d8038e06c519fcdbf2afcd67ba92ff0057bb25d9dfce0abcfb0c0af3e38384b192af77771b74b7cb4bfaebf9239b9b4b1fa61fb2478c2ebe2336b1e23bb8d2176f2ec56146240f2a28c96f72dbc64ffb20740293e215e3786bc75ae6b474d4d5238e3b8b1bab391b64776af07991c6c7071b83ece87851c568fec69e059fc25f0efceb93892e5b7edc6304aaff0040bf8e6badf176809abe91e39678c330d4217527fd982107f4622b830f3788a4ebc3694e4d79a5749fcec9fa1d547962e4a5d97e68f19f82fa9d8c3e09f86fe3dd2408ade28174cbc8f7862224636f2027033b5a3ce703a7415f5ea90466bf38fe0c78aef7c21e14f1a7c22d4749963d4748d4ae1f4774424dcc121ca803b9fe2dddc38cf39af63f0f7ed4de2bf06781ed6cbc53e1ab75d7b497822bc11ea114cd340c09538463e5ca540386ebd4679da616b430b5aad27a4747f37b9ea62a8cf13461593d6ed6fadba1f47fc4ad6347d2bc2f2dbeb96d737961aab8d2dadad519a494cc0a6d1b4823209e4118af08b1f1e7c12d4fc45a77886cf44d55751d434f8745b5d663b2b85c5bcbe7c29839e0816b3a9931b808c8ce319f62f1145e1df8a5e09d32fafb525d3f4d8ef22bd8ae3ccb765596273b43798af19e7b60fb10466bcd8fc08f85aba269fa5dc789ef1e3d326816d27bcbd84cd1cd1bddbc52233c7cb2b5fca430ce084c1f94e7e81c633d5a3c5856ab4538c24d5f7b3352cfe33fc2bf0d49a5f8a34e5bc693c4968d1dacb69693babc76fba30857ee44c7cb6519da5fca032768c7aa7827c6d61e3cd2ee6ff4e86ea2820bc9ac9bed709898c913947c03d4060c33df06bc6f4efd9d3e177f66785fc3f69e24b8b8d3f486985b69cda941702ebcd9247db26f46670ad2cb8008e1c83bb031ecfe0ef05695e04d2e7d3f48b64b6b79ef2e2fa40a8aa5a59a5691c9da003cb6077daaa327154925b194a529bbc9dcf8aff6dff14cc3c63aa5abb6d5b6b686de107a60af98c7f373f90af1bfd973f67dbff8a5e2b8a79203fd956f2096e26957e5c7a7be7d3d33d38afb9bf681fd9a6dbe36cf6b770ded9e977f0a6d69ae2d1e6f331f741db2a703f13ee2a6f85ff0b7e207c33d220d26d759f07b69d19c95b7d0ee629243dcb31ba6c9f7ae0af4675a32a517caa5a37d6de5ebb5fa6e09db53d7347d260d134d82cad976c512e07bfa9fc6b15b4ebafecdf11a5d411442e677784a49bf7a796803370369c8231cf41cf3c6ed88bc110178d0b49dcc0081f9126a796159e378dc064604153dc574c68c29c234e0aca2ac97e03526afe67c91e2bf12eb3a56a2f07f64c924b9d82458f923ebe95e6be18f83171e26f1f5eeb7e2cbeb54d1e595678adee541ba2c320c40f688827239ebc63273f4ff008e7e0b78a75a9e47d0fc61636f031256db5ad20ddedf61247344d8f76dc7d49ae3bc37fb38fc45d3f5e82e6ffc6fe1e5d3d5b3243a6682f1cac3d03cb34807e55e53c1cf9eef547a11ac92d256fbcd4fd9474af115dfc33d5fc33e3d853501a26b7736da5cf348b33cba7e4496a6423f8c46e01079dbb739c9af63bcf01f87f505856e748b599621b515e30428ce718fa9cfd79abfa1e8769e1fb15b5b48c226773b1e5a46eecc7b9e07e407415a15ecc5351499e749a6ee8e76cbe1d786b4dbb4b9b4d16d2da74dbb5e28c291b5b72e31e8403f857454515649ffd9, 30000.0000, 1, NULL),
(13, 10, 7, 'Footwear Fetish', 'LP306512', 0xffd8ffe000104a46494600010100000100010000fffe003b43524541544f523a2067642d6a7065672076312e3020287573696e6720494a47204a50454720763632292c207175616c697479203d2039300affdb0043000302020302020303030304030304050805050404050a070706080c0a0c0c0b0a0b0b0d0e12100d0e110e0b0b1016101113141515150c0f171816141812141514ffdb00430103040405040509050509140d0b0d1414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414ffc00011080040005003012200021101031101ffc4001f0000010501010101010100000000000000000102030405060708090a0bffc400b5100002010303020403050504040000017d01020300041105122131410613516107227114328191a1082342b1c11552d1f02433627282090a161718191a25262728292a3435363738393a434445464748494a535455565758595a636465666768696a737475767778797a838485868788898a92939495969798999aa2a3a4a5a6a7a8a9aab2b3b4b5b6b7b8b9bac2c3c4c5c6c7c8c9cad2d3d4d5d6d7d8d9dae1e2e3e4e5e6e7e8e9eaf1f2f3f4f5f6f7f8f9faffc4001f0100030101010101010101010000000000000102030405060708090a0bffc400b51100020102040403040705040400010277000102031104052131061241510761711322328108144291a1b1c109233352f0156272d10a162434e125f11718191a262728292a35363738393a434445464748494a535455565758595a636465666768696a737475767778797a82838485868788898a92939495969798999aa2a3a4a5a6a7a8a9aab2b3b4b5b6b7b8b9bac2c3c4c5c6c7c8c9cad2d3d4d5d6d7d8d9dae2e3e4e5e6e7e8e9eaf2f3f4f5f6f7f8f9faffda000c03010002110311003f00fd51ed5f147ed0df1e7c5fa27c59d5bc136f792d912892e986d26303cae46523dc08c9704819ce5b68e2bebef1578c745f0569726a1adea56da6daa296df71205ce081819ea72ca38ee47ad7e597c4bf1e1f8a3f1b351f1cdf3c76da5db5d2c9636e655679fc9c186200127aed67feea9f56507e5f3b9d7bd1861dbe6e6be9dbcfe6745249ddcb63eb8f84bfb50dfd9eb161a378a9df50b2bf488dadfaa8f36369151915fa6e52245e7a83d73dbeabb6b84ba85268d8346ebb9587715f9d13e877296ba1de6d685a0d3b4c9836deb348a1123f6388f77d16bef5f02deaff0064456d24a9e78dccb1eef9b667ae3d326bd158b9c71b1c34968e2dfcd3b7e29fe06295d5ce9bb51eb4668af5c90f4a4ed55b50d56cf49844b7b77059c47761e79022fcaacedc9f455663e8149e82b16c3e24f84b54bbb6b4b3f1468b777572aaf04106a113bcaac4852aa1b2c0956c11d769f4a00e93b9a4f4a28a00f14fda93c356fe2df0745a6dfddc56ba74e9324c593748080ae8e9dbe564190700e7af183f9d10f8012fbe2ef86fc29a5c36707d9a064b78d6f1ae37b02c5bcf7da0093219d955147cbd3e6c9fd31f8f7f681a26946da4bd591eeca797a7471b4f28f2ddca29930aa30849e4120103922bf3ae1f1647e0ff00da2b52d7ae6eac2fa6d32cef1e33656fe44724cdb638d0ae4f3ba5c1396e173938af9355ab54cede1e52f7142e97dcba7cf77e9d4dacbd9dfa9f4adf6851b6bfa0f83ecda4b8b6d3a032cf7720f9aeae84646efa2f96a800fbbc8ed57fe2c7c5b93e12fc55f05ea2fbbec1e5bdac813a38523cc53f84831ef8f4aef7e15f8202f8974b69e737771a7c3796b3c927de766963b9573ee7ce3ff7d57cf9fb40784752f18e9da8289160b8f0bdc497573e7f01602423b93d954b23b1ecaacddb073c4519bc6d5c427b5a2be5ef3fcd7dc7a396b87b44aa6cf47f3d0fbf348d56db5cd32d350b2996e2d2ea259a1950f0e8c01047e06ae7ad7ccdfb1678e6fe5f0dddf8275827ed7a401359b939125bb1e80f7018f07d1c7a57d33eb5f4d86af1c4d28d58f539317869612bca8cba7e5d0e4fe27e8fa3ea9e11bd9b5dd426d2b4cb18a5b9b8bc859418a2f29d25cee5618313c8a78ce1b2304023cd231f0b3c37ae695670789dedeff48d16dee974e8a412493d9c52fda15dd3cb2eced26d9085c3b1030304831fedb7af368ff01f52b402e562d5a78ec6796d62691a38b0d2be428380c22d84f41bebc5bc13707c63f1361b5b7834d169ae5bdb41657d796727db2cae1343824127de5fdd90854a6013b89045675710e153d9af2fc6e7bb81ca2188c1bc5d56d25cdb7f7797c9f77a6fa1f66e89e29d33c44fb74fba173fe8b05e6555b1e54c18c4d9231c84638ea0632064675abc33f672d71e39b50d05adc3c71c104d06a1e67cd7112410c709f2f1f20307d9dbef1f99a4e9dfdd3d2baa9cb9e373c2c5d0fabd674d6c78d7ed3577636fe19d15754bcfb3e97f6f2f7510338370820942afee54b70ec8dc8c7ca3be2bf2e3e23dec973f16a7b9b9d43fb5b79665ba103c5bd4905405701861703e619c015fa21fb6dea6a9a1e8964242adb679d8038e06c519fcdbf2afcd67ba92ff0057bb25d9dfce0abcfb0c0af3e38384b192af77771b74b7cb4bfaebf9239b9b4b1fa61fb2478c2ebe2336b1e23bb8d2176f2ec56146240f2a28c96f72dbc64ffb20740293e215e3786bc75ae6b474d4d5238e3b8b1bab391b64776af07991c6c7071b83ece87851c568fec69e059fc25f0efceb93892e5b7edc6304aaff0040bf8e6badf176809abe91e39678c330d4217527fd982107f4622b830f3788a4ebc3694e4d79a5749fcec9fa1d547962e4a5d97e68f19f82fa9d8c3e09f86fe3dd2408ade28174cbc8f7862224636f2027033b5a3ce703a7415f5ea90466bf38fe0c78aef7c21e14f1a7c22d4749963d4748d4ae1f4774424dcc121ca803b9fe2dddc38cf39af63f0f7ed4de2bf06781ed6cbc53e1ab75d7b497822bc11ea114cd340c09538463e5ca540386ebd4679da616b430b5aad27a4747f37b9ea62a8cf13461593d6ed6fadba1f47fc4ad6347d2bc2f2dbeb96d737961aab8d2dadad519a494cc0a6d1b4823209e4118af08b1f1e7c12d4fc45a77886cf44d55751d434f8745b5d663b2b85c5bcbe7c29839e0816b3a9931b808c8ce319f62f1145e1df8a5e09d32fafb525d3f4d8ef22bd8ae3ccb765596273b43798af19e7b60fb10466bcd8fc08f85aba269fa5dc789ef1e3d326816d27bcbd84cd1cd1bddbc52233c7cb2b5fca430ce084c1f94e7e81c633d5a3c5856ab4538c24d5f7b3352cfe33fc2bf0d49a5f8a34e5bc693c4968d1dacb69693babc76fba30857ee44c7cb6519da5fca032768c7aa7827c6d61e3cd2ee6ff4e86ea2820bc9ac9bed709898c913947c03d4060c33df06bc6f4efd9d3e177f66785fc3f69e24b8b8d3f486985b69cda941702ebcd9247db26f46670ad2cb8008e1c83bb031ecfe0ef05695e04d2e7d3f48b64b6b79ef2e2fa40a8aa5a59a5691c9da003cb6077daaa327154925b194a529bbc9dcf8aff6dff14cc3c63aa5abb6d5b6b686de107a60af98c7f373f90af1bfd973f67dbff8a5e2b8a79203fd956f2096e26957e5c7a7be7d3d33d38afb9bf681fd9a6dbe36cf6b770ded9e977f0a6d69ae2d1e6f331f741db2a703f13ee2a6f85ff0b7e207c33d220d26d759f07b69d19c95b7d0ee629243dcb31ba6c9f7ae0af4675a32a517caa5a37d6de5ebb5fa6e09db53d7347d260d134d82cad976c512e07bfa9fc6b15b4ebafecdf11a5d411442e677784a49bf7a796803370369c8231cf41cf3c6ed88bc110178d0b49dcc0081f9126a796159e378dc064604153dc574c68c29c234e0aca2ac97e03526afe67c91e2bf12eb3a56a2f07f64c924b9d82458f923ebe95e6be18f83171e26f1f5eeb7e2cbeb54d1e595678adee541ba2c320c40f688827239ebc63273f4ff008e7e0b78a75a9e47d0fc61636f031256db5ad20ddedf61247344d8f76dc7d49ae3bc37fb38fc45d3f5e82e6ffc6fe1e5d3d5b3243a6682f1cac3d03cb34807e55e53c1cf9eef547a11ac92d256fbcd4fd9474af115dfc33d5fc33e3d853501a26b7736da5cf348b33cba7e4496a6423f8c46e01079dbb739c9af63bcf01f87f505856e748b599621b515e30428ce718fa9cfd79abfa1e8769e1fb15b5b48c226773b1e5a46eecc7b9e07e407415a15ecc5351499e749a6ee8e76cbe1d786b4dbb4b9b4d16d2da74dbb5e28c291b5b72e31e8403f857454515649ffd9, 30000.0000, 1, NULL),
(14, 11, 8, 'vbvrtrte', 'fdgd', '', 45.0000, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wl_pages`
--

DROP TABLE IF EXISTS `wl_pages`;
CREATE TABLE IF NOT EXISTS `wl_pages` (
  `pages_id` int(11) NOT NULL AUTO_INCREMENT,
  `pages_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `friendly_url` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pages_image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `sort_order` int(3) DEFAULT NULL,
  `date_added` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `date_modified` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `status` enum('0','1','2') COLLATE utf8_bin NOT NULL DEFAULT '1' COMMENT '1=active,0=inactive,2=deleted',
  `meta_title` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `meta_keywords` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `meta_description` varchar(225) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`pages_id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `wl_popular_search`
--

DROP TABLE IF EXISTS `wl_popular_search`;
CREATE TABLE IF NOT EXISTS `wl_popular_search` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `search_keyword` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `search_count` int(11) NOT NULL DEFAULT '1',
  `ip_address` varchar(100) NOT NULL,
  `receive_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wl_products`
--

DROP TABLE IF EXISTS `wl_products`;
CREATE TABLE IF NOT EXISTS `wl_products` (
  `products_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL COMMENT 'parent_id= last level of category ',
  `category_links` varchar(80) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `product_friendly_url` varchar(110) DEFAULT NULL,
  `product_code` varchar(64) NOT NULL,
  `products_description` text NOT NULL,
  `product_color` varchar(255) DEFAULT NULL,
  `product_size` varchar(255) DEFAULT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `used_quantity` int(11) NOT NULL DEFAULT '0',
  `products_model` varchar(64) DEFAULT NULL,
  `products_weight` decimal(5,2) DEFAULT NULL,
  `product_weight_class_id` int(11) DEFAULT '1' COMMENT '1=Weight in kilogram',
  `product_length` decimal(5,2) DEFAULT NULL,
  `product_width` decimal(5,2) DEFAULT NULL,
  `product_height` decimal(5,2) DEFAULT NULL,
  `product_length_class_id` int(11) NOT NULL DEFAULT '1' COMMENT '1= Length in centimeter',
  `stock_status_id` int(11) NOT NULL DEFAULT '1' COMMENT '1=In Stock',
  `brand_id` int(11) DEFAULT NULL,
  `product_price` decimal(15,0) NOT NULL DEFAULT '0',
  `product_discounted_price` decimal(15,0) NOT NULL DEFAULT '0',
  `hot_product` enum('1','0') NOT NULL DEFAULT '0' COMMENT '1=Yes,0=No',
  `featured_product` enum('1','0') NOT NULL DEFAULT '0' COMMENT '1=Yes,0=No',
  `new_arrival` enum('1','0') NOT NULL DEFAULT '0' COMMENT '1=Yes,0=No',
  `status` enum('0','1','2') NOT NULL DEFAULT '1' COMMENT '1=active,0=inactive,2=deleted',
  `product_added_date` datetime NOT NULL,
  `product_updated_date` datetime DEFAULT NULL,
  `products_viewed` int(10) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (`products_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wl_products`
--

INSERT INTO `wl_products` (`products_id`, `category_id`, `category_links`, `product_name`, `product_friendly_url`, `product_code`, `products_description`, `product_color`, `product_size`, `brand`, `quantity`, `used_quantity`, `products_model`, `products_weight`, `product_weight_class_id`, `product_length`, `product_width`, `product_height`, `product_length_class_id`, `stock_status_id`, `brand_id`, `product_price`, `product_discounted_price`, `hot_product`, `featured_product`, `new_arrival`, `status`, `product_added_date`, `product_updated_date`, `products_viewed`) VALUES
(1, 5, '', 'Apple Cinema 30', NULL, 'LP3065', 'Apple Cinema 30Apple Cinema 30Apple Cinema 30Apple Cinema 30Apple Cinema 30Apple Cinema 30Apple Cinema 30Apple Cinema 30Apple Cinema 30Apple Cinema 30Apple Cinema 30Apple Cinema 30Apple Cinema 30Apple Cinema 30Apple Cinema 30Apple Cinema 30Apple Cinema 30Apple Cinema 30Apple Cinema 30Apple Cinema 30Apple Cinema 30', NULL, NULL, NULL, 30, 6, NULL, NULL, 1, NULL, NULL, NULL, 1, 1, NULL, '999', '565', '1', '1', '0', '1', '2013-04-26 06:14:04', NULL, 0),
(2, 6, '6,4,1', 'HP LP3065', 'hp-lp3065', 'Cinema 30', '<p>P LP3065HP LP3065HP LP3065HP LP3065HP LP3065HP LP3065HP LP3065HP LP3065HP LP3065HP LP3065HP LP3065HP LP3065HP LP3065HP LP3065HP LP3065HP LP3065HP LP3065HP LP3065HP LP3065HP LP3065HP LP3065HP LP3065HP LP3065HP LP3065HP LP3065HP LP3065HP LP3065HP LP3065HP LP3065sssss</p>\r\n', NULL, NULL, NULL, 100, 0, NULL, NULL, 1, NULL, NULL, NULL, 1, 1, NULL, '900', '751', '1', '1', '0', '1', '2013-07-18 04:45:41', NULL, 0),
(3, 24, '', 'Embroidered and Embellished petite Lehenga Choli', NULL, '011', '<p><span style=\"color:rgb(0, 0, 0); font-family:arial,helvetica,sans-serif\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,&nbsp;</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:arial,helvetica,sans-serif\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</span><span style=\"color:rgb(0, 0, 0); font-family:arial,helvetica,sans-serif\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,&nbsp;</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:arial,helvetica,sans-serif\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</span><span style=\"color:rgb(0, 0, 0); font-family:arial,helvetica,sans-serif\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,&nbsp;</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:arial,helvetica,sans-serif\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</span></p>\r\n', NULL, NULL, NULL, 18, 0, NULL, NULL, 1, NULL, NULL, NULL, 1, 1, NULL, '100', '50', '1', '1', '0', '1', '2013-05-13 06:15:49', NULL, 0),
(4, 24, '', 'Lehenga Choli', NULL, '012', '<p><span style=\"color:rgb(0, 0, 0); font-family:arial,helvetica,sans-serif\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,&nbsp;</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:arial,helvetica,sans-serif\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</span><span style=\"color:rgb(0, 0, 0); font-family:arial,helvetica,sans-serif\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,&nbsp;</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:arial,helvetica,sans-serif\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</span><span style=\"color:rgb(0, 0, 0); font-family:arial,helvetica,sans-serif\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,&nbsp;</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:arial,helvetica,sans-serif\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</span><span style=\"color:rgb(0, 0, 0); font-family:arial,helvetica,sans-serif\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,&nbsp;</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:arial,helvetica,sans-serif\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</span></p>\r\n', NULL, NULL, NULL, 15, 0, NULL, NULL, 1, NULL, NULL, NULL, 1, 1, NULL, '55', '48', '1', '1', '0', '1', '2013-05-06 05:13:00', NULL, 0),
(5, 24, '', 'Embellished petite Lehenga Choli', NULL, '013', '<p><span style=\"color:rgb(0, 0, 0); font-family:arial,helvetica,sans-serif\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,&nbsp;</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:arial,helvetica,sans-serif\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</span><span style=\"color:rgb(0, 0, 0); font-family:arial,helvetica,sans-serif\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,&nbsp;</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:arial,helvetica,sans-serif\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</span><span style=\"color:rgb(0, 0, 0); font-family:arial,helvetica,sans-serif\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,&nbsp;</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:arial,helvetica,sans-serif\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</span><span style=\"color:rgb(0, 0, 0); font-family:arial,helvetica,sans-serif\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,&nbsp;</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:arial,helvetica,sans-serif\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</span></p>\r\n', NULL, NULL, NULL, 7, 3, NULL, NULL, 1, NULL, NULL, NULL, 1, 1, NULL, '58', '0', '1', '1', '0', '1', '2013-05-14 05:02:40', NULL, 0),
(6, 24, '', 'Embroidered and Embellished', NULL, '014', '<p><span style=\"color:rgb(0, 0, 0); font-family:arial,helvetica,sans-serif\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,&nbsp;</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:arial,helvetica,sans-serif\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</span><span style=\"color:rgb(0, 0, 0); font-family:arial,helvetica,sans-serif\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,&nbsp;</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:arial,helvetica,sans-serif\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</span><span style=\"color:rgb(0, 0, 0); font-family:arial,helvetica,sans-serif\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,&nbsp;</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:arial,helvetica,sans-serif\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</span><span style=\"color:rgb(0, 0, 0); font-family:arial,helvetica,sans-serif\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,&nbsp;</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:arial,helvetica,sans-serif\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</span><span style=\"color:rgb(0, 0, 0); font-family:arial,helvetica,sans-serif\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,&nbsp;</span><br />\r\n<br />\r\n<span style=\"color:rgb(0, 0, 0); font-family:arial,helvetica,sans-serif\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</span></p>\r\n', NULL, NULL, NULL, 9, 6, NULL, NULL, 1, NULL, NULL, NULL, 1, 1, NULL, '100', '90', '0', '1', '0', '1', '2013-05-09 11:07:54', NULL, 0),
(7, 24, '24', 'Footwear Fetish', 'footwear-fetish', 'LP306512', '<p><span style=\"font-family:tahoma,geneva,sans-serif\"><a href=\"http://freekaamaal.com/tag/indiatimes/\" target=\"_blank\">Indiatimes.com</a> in it&#39;s today Flash <a href=\"http://freekaamaal.com/tag/mid-night-sale/\" target=\"_blank\">Mid Night sale</a> has released an offer on Footwear where we can get </span>UP TO 46% OFF ( 25 % Extra on already Discounted ) on Footwear<span style=\"font-family:tahoma,geneva,sans-serif\">&nbsp; using indiatimes discount coupon.</span><span style=\"font-family:tahoma,geneva,sans-serif\"><a href=\"http://freekaamaal.com/tag/indiatimes/\" target=\"_blank\">Indiatimes.com</a> in it&#39;s today Flash <a href=\"http://freekaamaal.com/tag/mid-night-sale/\" target=\"_blank\">Mid Night sale</a> has released an offer on Footwear where we can get </span>UP TO 46% OFF ( 25 % Extra on already Discounted ) on Footwear<span style=\"font-family:tahoma,geneva,sans-serif\">&nbsp; using indiatimes discount coupon.</span><span style=\"font-family:tahoma,geneva,sans-serif\"><a href=\"http://freekaamaal.com/tag/indiatimes/\" target=\"_blank\">Indiatimes.com</a> in it&#39;s today Flash <a href=\"http://freekaamaal.com/tag/mid-night-sale/\" target=\"_blank\">Mid Night sale</a> has released an offer on Footwear where we can get </span>UP TO 46% OFF ( 25 % Extra on already Discounted ) on Footwear<span style=\"font-family:tahoma,geneva,sans-serif\">&nbsp; using indiatimes discount coupon.</span><span style=\"font-family:tahoma,geneva,sans-serif\"><a href=\"http://freekaamaal.com/tag/indiatimes/\" target=\"_blank\">Indiatimes.com</a> in it&#39;s today Flash <a href=\"http://freekaamaal.com/tag/mid-night-sale/\" target=\"_blank\">Mid Night sale</a> has released an offer on Footwear where we can get </span>UP TO 46% OFF ( 25 % Extra on already Discounted ) on Footwear<span style=\"font-family:tahoma,geneva,sans-serif\">&nbsp; using indiatimes discount coupon.</span><span style=\"font-family:tahoma,geneva,sans-serif\"><a href=\"http://freekaamaal.com/tag/indiatimes/\" target=\"_blank\">Indiatimes.com</a> in it&#39;s today Flash <a href=\"http://freekaamaal.com/tag/mid-night-sale/\" target=\"_blank\">Mid Night sale</a> has released an offer on Footwear where we can get </span>UP TO 46% OFF ( 25 % Extra on already Discounted ) on Footwear<span style=\"font-family:tahoma,geneva,sans-serif\">&nbsp; using indiatimes discount coupon.</span><span style=\"font-family:tahoma,geneva,sans-serif\"><a href=\"http://freekaamaal.com/tag/indiatimes/\" target=\"_blank\">Indiatimes.com</a> in it&#39;s today Flash <a href=\"http://freekaamaal.com/tag/mid-night-sale/\" target=\"_blank\">Mid Night sale</a> has released an offer on Footwear where we can get </span>UP TO 46% OFF ( 25 % Extra on already Discounted ) on Footwear<span style=\"font-family:tahoma,geneva,sans-serif\">&nbsp; using indiatimes discount coupon.</span><span style=\"font-family:tahoma,geneva,sans-serif\"><a href=\"http://freekaamaal.com/tag/indiatimes/\" target=\"_blank\">Indiatimes.com</a> in it&#39;s today Flash <a href=\"http://freekaamaal.com/tag/mid-night-sale/\" target=\"_blank\">Mid Night sale</a> has released an offer on Footwear where we can get </span>UP TO 46% OFF ( 25 % Extra on already Discounted ) on Footwear<span style=\"font-family:tahoma,geneva,sans-serif\">&nbsp; using indiatimes discount coupon.</span><span style=\"font-family:tahoma,geneva,sans-serif\"><a href=\"http://freekaamaal.com/tag/indiatimes/\" target=\"_blank\">Indiatimes.com</a> in it&#39;s today Flash <a href=\"http://freekaamaal.com/tag/mid-night-sale/\" target=\"_blank\">Mid Night sale</a> has released an offer on Footwear where we can get </span>UP TO 46% OFF ( 25 % Extra on already Discounted ) on Footwear<span style=\"font-family:tahoma,geneva,sans-serif\">&nbsp; using indiatimes discount coupon.</span><span style=\"font-family:tahoma,geneva,sans-serif\"><a href=\"http://freekaamaal.com/tag/indiatimes/\" target=\"_blank\">Indiatimes.com</a> in it&#39;s today Flash <a href=\"http://freekaamaal.com/tag/mid-night-sale/\" target=\"_blank\">Mid Night sale</a> has released an offer on Footwear where we can get </span>UP TO 46% OFF ( 25 % Extra on already Discounted ) on Footwear<span style=\"font-family:tahoma,geneva,sans-serif\">&nbsp; using indiatimes discount coupon.</span><span style=\"font-family:tahoma,geneva,sans-serif\"><a href=\"http://freekaamaal.com/tag/indiatimes/\" target=\"_blank\">Indiatimes.com</a> in it&#39;s today Flash <a href=\"http://freekaamaal.com/tag/mid-night-sale/\" target=\"_blank\">Mid Night sale</a> has released an offer on Footwear where we can get </span>UP TO 46% OFF ( 25 % Extra on already Discounted ) on Footwear<span style=\"font-family:tahoma,geneva,sans-serif\">&nbsp; using indiatimes discount coupon.</span></p>\r\n', '', '', '1', 100, 10, NULL, NULL, 1, NULL, NULL, NULL, 1, 1, NULL, '40', '0', '0', '1', '1', '1', '2017-10-10 14:22:54', NULL, 0),
(8, 2, '2,1', 'vbvrtrte', 'vbvrtrte', 'fdgd', '<p>fdgfgs</p>\r\n', NULL, NULL, NULL, 100, 0, NULL, NULL, 1, NULL, NULL, NULL, 1, 1, NULL, '454', '45', '0', '0', '0', '1', '2013-08-02 10:14:03', NULL, 0),
(9, 2, '2,1', 'new manish', 'new-manish', '4334342', '<p>sdfsfs sda</p>\r\n', '2', '2,4', '4', 100, 0, NULL, NULL, 1, NULL, NULL, NULL, 1, 1, NULL, '23233', '2222', '0', '0', '0', '1', '2013-08-02 12:00:09', NULL, 0),
(10, 21, '21', 'test', 'test', '342423', '<p>sdfsfsda</p>\r\n', '1,2', '1,4', '2', 100, 0, NULL, NULL, 1, NULL, NULL, NULL, 1, 1, NULL, '22222', '2222', '0', '0', '0', '1', '2013-08-06 06:29:28', NULL, 0),
(11, 2, '2,1', 'dsfdsfa', 'dsfdsfa', '34432', '<p>sdfsfs</p>\r\n', '', '', '2', 100, 0, NULL, NULL, 1, NULL, NULL, NULL, 1, 1, NULL, '3333', '333', '0', '0', '0', '1', '2013-08-06 05:28:43', NULL, 0),
(12, 2, '2,1', 'test product22', 'test-product22', 'dsfsfs', '<p>sdsfsfas</p>\r\n', '1,2', '1,2,4', '2', 100, 0, NULL, NULL, 1, NULL, NULL, NULL, 1, 1, NULL, '23232', '222', '0', '0', '0', '1', '2017-10-09 20:59:06', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `wl_products_media`
--

DROP TABLE IF EXISTS `wl_products_media`;
CREATE TABLE IF NOT EXISTS `wl_products_media` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `products_id` int(10) UNSIGNED NOT NULL,
  `color_id` int(11) DEFAULT NULL,
  `media_type` enum('photo','video','pdf') NOT NULL DEFAULT 'photo',
  `media` varchar(255) NOT NULL,
  `is_default` enum('Y','N') NOT NULL DEFAULT 'N',
  `sort_order` int(11) DEFAULT NULL,
  `media_date_added` datetime NOT NULL,
  `media_status` enum('0','1','2') DEFAULT '1' COMMENT '0=inactive,1=active,2=delete',
  PRIMARY KEY (`id`),
  KEY `idx_products_images_products_id` (`products_id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wl_products_media`
--

INSERT INTO `wl_products_media` (`id`, `products_id`, `color_id`, `media_type`, `media`, `is_default`, `sort_order`, `media_date_added`, `media_status`) VALUES
(4, 2, NULL, 'photo', '2450521069_ba28cdf975E2OmYBpW.jpg', 'N', NULL, '2013-04-16 11:12:17', '1'),
(7, 3, NULL, 'photo', 'product-img1oTUu.jpg', 'Y', NULL, '2013-04-19 04:05:47', '1'),
(6, 2, NULL, 'photo', 'a1_(2)kDTX.jpg', 'N', NULL, '2013-04-16 11:12:32', '1'),
(8, 3, NULL, 'photo', 'product-img1a5wr.jpg', 'N', NULL, '2013-04-19 04:05:47', '1'),
(9, 3, NULL, 'photo', 'product-img1fwQZ.jpg', 'N', NULL, '2013-04-19 04:05:47', '1'),
(10, 3, NULL, 'photo', 'product-img15B01.jpg', 'N', NULL, '2013-04-19 04:05:47', '1'),
(11, 4, NULL, 'photo', 'product-img1nPbQ.jpg', 'Y', NULL, '2013-04-19 04:06:32', '1'),
(12, 4, NULL, 'photo', 'product-img1BeA6.jpg', 'N', NULL, '2013-04-19 04:06:32', '1'),
(14, 5, NULL, 'photo', 'product-img1qgll.jpg', 'N', NULL, '2013-04-19 04:07:18', '1'),
(15, 5, NULL, 'photo', 'product-img1g1Lw.jpg', 'N', NULL, '2013-04-19 04:07:18', '1'),
(17, 6, NULL, 'photo', 'thmb_04k21h.jpg', 'N', NULL, '2013-04-19 05:50:26', '1'),
(20, 7, NULL, 'photo', 'indiatimes-midnight-sale-on-footwears15dkd.jpg', 'Y', NULL, '2013-04-26 06:16:07', '1'),
(21, 7, NULL, 'photo', 'slide2CVYM.jpg', 'N', NULL, '2013-07-17 08:54:38', '1'),
(22, 7, NULL, 'photo', 'i-bnr18ydz.jpg', 'N', NULL, '2013-07-17 08:54:38', '1'),
(26, 10, 1, 'photo', '6c0YY.gif', 'N', NULL, '2013-08-06 05:14:21', '1'),
(24, 10, 2, 'photo', '102_00480_1aRyP.jpg', 'N', NULL, '2013-08-05 05:40:48', '1'),
(25, 11, 1, 'photo', 'Handsome5_1hovX.jpg', 'N', NULL, '2013-08-05 06:03:39', '1');

-- --------------------------------------------------------

--
-- Table structure for table `wl_products_related`
--

DROP TABLE IF EXISTS `wl_products_related`;
CREATE TABLE IF NOT EXISTS `wl_products_related` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `related_id` int(11) NOT NULL,
  `status` enum('0','1','2') NOT NULL DEFAULT '1' COMMENT '1=active,0=inactive,2=deleted',
  `sort_order` int(11) DEFAULT NULL,
  `related_date_added` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wl_products_related`
--

INSERT INTO `wl_products_related` (`id`, `product_id`, `related_id`, `status`, `sort_order`, `related_date_added`) VALUES
(3, 2, 1, '1', NULL, '2013-04-16 09:59:43'),
(4, 6, 5, '1', NULL, '2013-04-19 06:25:23'),
(5, 6, 4, '1', NULL, '2013-04-19 06:25:23'),
(6, 6, 3, '1', NULL, '2013-04-19 06:25:23'),
(12, 7, 1, '1', NULL, '2013-07-17 09:38:57'),
(13, 7, 4, '1', NULL, '2013-07-17 09:54:31'),
(14, 7, 3, '1', NULL, '2013-07-17 09:54:31'),
(15, 7, 2, '1', NULL, '2013-07-17 09:54:31'),
(11, 7, 6, '1', NULL, '2013-06-10 06:13:19');

-- --------------------------------------------------------

--
-- Table structure for table `wl_product_option`
--

DROP TABLE IF EXISTS `wl_product_option`;
CREATE TABLE IF NOT EXISTS `wl_product_option` (
  `product_option_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `option_name` varchar(100) COLLATE utf8_bin NOT NULL,
  `sort_order` int(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`product_option_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `wl_product_option_value`
--

DROP TABLE IF EXISTS `wl_product_option_value`;
CREATE TABLE IF NOT EXISTS `wl_product_option_value` (
  `product_option_value_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_option_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_bin NOT NULL,
  `quantity` int(4) NOT NULL DEFAULT '0',
  `subtract` int(1) NOT NULL DEFAULT '0',
  `price` decimal(15,4) NOT NULL,
  `prefix` char(1) COLLATE utf8_bin NOT NULL,
  `sort_order` int(3) NOT NULL,
  PRIMARY KEY (`product_option_value_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `wl_product_stock`
--

DROP TABLE IF EXISTS `wl_product_stock`;
CREATE TABLE IF NOT EXISTS `wl_product_stock` (
  `stock_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `product_type` int(11) NOT NULL,
  `product_color` int(11) NOT NULL,
  `product_size` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL DEFAULT '0',
  `inventory` int(11) DEFAULT '0',
  `select_status` char(1) NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`stock_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wl_product_stock`
--

INSERT INTO `wl_product_stock` (`stock_id`, `product_id`, `product_type`, `product_color`, `product_size`, `product_quantity`, `inventory`, `select_status`) VALUES
(1, 10, 0, 1, 1, 3, 2, 'Y'),
(2, 10, 0, 2, 1, 4, 0, 'Y'),
(3, 10, 0, 1, 4, 0, 0, 'Y'),
(4, 10, 0, 2, 4, 0, 3, 'Y'),
(11, 11, 0, 0, 0, 0, 0, 'Y'),
(12, 12, 0, 2, 2, 4, 0, 'Y'),
(13, 12, 0, 1, 1, 2, 0, 'Y'),
(14, 12, 0, 2, 1, 0, 0, 'Y'),
(15, 12, 0, 1, 2, 0, 0, 'Y'),
(16, 12, 0, 1, 4, 0, 0, 'Y'),
(17, 12, 0, 2, 4, 0, 0, 'Y'),
(18, 7, 0, 0, 0, 0, 0, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `wl_rating`
--

DROP TABLE IF EXISTS `wl_rating`;
CREATE TABLE IF NOT EXISTS `wl_rating` (
  `rate_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `entity` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `entity_id` int(11) NOT NULL,
  `rate_value` int(11) NOT NULL,
  `ip_address` varchar(80) NOT NULL,
  `rating_date` datetime NOT NULL,
  PRIMARY KEY (`rate_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='This table is used for storing whole site pictures';

-- --------------------------------------------------------

--
-- Table structure for table `wl_review`
--

DROP TABLE IF EXISTS `wl_review`;
CREATE TABLE IF NOT EXISTS `wl_review` (
  `review_id` int(11) NOT NULL AUTO_INCREMENT,
  `entity_id` int(11) NOT NULL,
  `entity_type` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `customer_id` int(11) NOT NULL,
  `author` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `text` text COLLATE utf8_bin NOT NULL,
  `status` enum('1','2','3') COLLATE utf8_bin NOT NULL DEFAULT '1',
  `review_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`review_id`),
  KEY `product_id` (`entity_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `wl_shipping`
--

DROP TABLE IF EXISTS `wl_shipping`;
CREATE TABLE IF NOT EXISTS `wl_shipping` (
  `shipping_id` int(11) NOT NULL AUTO_INCREMENT,
  `is_default` enum('0','1') NOT NULL DEFAULT '0',
  `shipping_type` varchar(50) NOT NULL,
  `shipment_rate` decimal(10,2) NOT NULL DEFAULT '0.00',
  `status` enum('1','0','2') NOT NULL DEFAULT '1' COMMENT '1=active,2=inactive,3=deleted',
  `added_date` datetime NOT NULL,
  PRIMARY KEY (`shipping_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wl_shipping`
--

INSERT INTO `wl_shipping` (`shipping_id`, `is_default`, `shipping_type`, `shipment_rate`, `status`, `added_date`) VALUES
(5, '0', 'Next Day Delivery Uk', '6.00', '1', '2013-05-06 05:50:17'),
(4, '0', 'Standard UK Delivery (allow 3-5 working days)', '15.50', '1', '2013-04-17 04:54:51'),
(3, '0', 'Next Day Delivery (orders placed before 3pm)', '9.50', '1', '2013-04-17 04:51:03'),
(6, '0', 'India Sjhipping', '23.00', '1', '2013-05-15 09:40:32'),
(7, '0', 'Pak shipping', '20.00', '1', '2013-06-10 09:21:55');

-- --------------------------------------------------------

--
-- Table structure for table `wl_size`
--

DROP TABLE IF EXISTS `wl_size`;
CREATE TABLE IF NOT EXISTS `wl_size` (
  `size_id` int(11) NOT NULL AUTO_INCREMENT,
  `size_name` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `added_date` datetime DEFAULT NULL,
  `status` enum('1','2','3') COLLATE latin1_general_ci NOT NULL DEFAULT '1',
  PRIMARY KEY (`size_id`),
  KEY `idx_mfg_name_zen` (`size_name`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `wl_size`
--

INSERT INTO `wl_size` (`size_id`, `size_name`, `added_date`, `status`) VALUES
(1, '42', '2013-06-10 11:33:35', '1'),
(2, 'L', '2013-06-10 11:33:51', '1'),
(4, 'X', '2013-07-29 11:33:03', '1');

-- --------------------------------------------------------

--
-- Table structure for table `wl_slide_banners`
--

DROP TABLE IF EXISTS `wl_slide_banners`;
CREATE TABLE IF NOT EXISTS `wl_slide_banners` (
  `banner_id` int(11) NOT NULL AUTO_INCREMENT,
  `banner_title` text,
  `banner_image` varchar(200) DEFAULT NULL,
  `banner_url` varchar(170) DEFAULT NULL,
  `detail` text,
  `status` enum('1','0') DEFAULT '1' COMMENT '1=Actice,0=Inactive',
  `clicks` int(11) NOT NULL DEFAULT '0',
  `banner_added_date` datetime DEFAULT NULL,
  PRIMARY KEY (`banner_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wl_slide_banners`
--

INSERT INTO `wl_slide_banners` (`banner_id`, `banner_title`, `banner_image`, `banner_url`, `detail`, `status`, `clicks`, `banner_added_date`) VALUES
(7, '<h1>AWESOME FURNITUR 1</h1>              <p><span>50%</span> OFF <br/>                TRENDY <span>DESIGNS</span> </p>', 'bg-2_(1)uFf3.jpg', NULL, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation', '1', 0, '2017-09-10 19:21:29'),
(8, '<h1>AWESOME FURNITUR 1</h1>              <p><span>50%</span> OFF <br/>                TRENDY <span>DESIGNS</span> </p>', 'bg-40FE5.jpg', NULL, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation', '1', 0, '2017-09-10 21:26:38');

-- --------------------------------------------------------

--
-- Table structure for table `wl_tax`
--

DROP TABLE IF EXISTS `wl_tax`;
CREATE TABLE IF NOT EXISTS `wl_tax` (
  `tax_id` int(11) NOT NULL AUTO_INCREMENT,
  `is_default` enum('0','1') NOT NULL DEFAULT '0',
  `tax_type` varchar(100) NOT NULL DEFAULT '',
  `tax_rate` decimal(10,2) NOT NULL DEFAULT '0.00',
  `status` enum('1','0','2') NOT NULL DEFAULT '1' COMMENT '1=active,2=inactive,3=deleted',
  PRIMARY KEY (`tax_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wl_tax`
--

INSERT INTO `wl_tax` (`tax_id`, `is_default`, `tax_type`, `tax_rate`, `status`) VALUES
(1, '0', '%', '2.00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `wl_testimonial`
--

DROP TABLE IF EXISTS `wl_testimonial`;
CREATE TABLE IF NOT EXISTS `wl_testimonial` (
  `testimonial_id` int(11) NOT NULL AUTO_INCREMENT,
  `testimonial_title` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `poster_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `testimonial_description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `photo` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `posted_date` datetime DEFAULT NULL,
  `featured` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'Y=Yes,N=No',
  `status` enum('1','0') NOT NULL DEFAULT '0' COMMENT '1=Actice,0=Inactive',
  PRIMARY KEY (`testimonial_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wl_testimonial`
--

INSERT INTO `wl_testimonial` (`testimonial_id`, `testimonial_title`, `poster_name`, `email`, `testimonial_description`, `photo`, `posted_date`, `featured`, `status`) VALUES
(11, 'Admin', 'sdffsda', '', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,</p>', NULL, '2013-07-17 06:15:13', 'Y', '1');

-- --------------------------------------------------------

--
-- Table structure for table `wl_video`
--

DROP TABLE IF EXISTS `wl_video`;
CREATE TABLE IF NOT EXISTS `wl_video` (
  `video_id` int(11) NOT NULL AUTO_INCREMENT,
  `video_title` varchar(100) DEFAULT NULL,
  `video_file` varchar(200) DEFAULT NULL,
  `status` enum('1','0') DEFAULT '1' COMMENT '1=Actice,0=Inactive',
  `post_date` datetime DEFAULT NULL,
  PRIMARY KEY (`video_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wl_video`
--

INSERT INTO `wl_video` (`video_id`, `video_title`, `video_file`, `status`, `post_date`) VALUES
(1, 'video1', 'dkflv1Dfvv8gTG.flv', '1', '2013-08-21 06:45:01'),
(2, 'video2', 'animation_videoXMW0.mp4', '1', '2013-08-21 07:02:09');

-- --------------------------------------------------------

--
-- Table structure for table `wl_weight_class`
--

DROP TABLE IF EXISTS `wl_weight_class`;
CREATE TABLE IF NOT EXISTS `wl_weight_class` (
  `weight_class_id` int(11) NOT NULL AUTO_INCREMENT,
  `weight_title` varchar(32) COLLATE utf8_bin NOT NULL,
  `weight_unit` varchar(4) COLLATE utf8_bin NOT NULL,
  `weight_value` decimal(15,8) NOT NULL,
  PRIMARY KEY (`weight_class_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `wl_wishlists`
--

DROP TABLE IF EXISTS `wl_wishlists`;
CREATE TABLE IF NOT EXISTS `wl_wishlists` (
  `wishlists_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `wishlists_date_added` datetime NOT NULL,
  PRIMARY KEY (`wishlists_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wl_wishlists`
--

INSERT INTO `wl_wishlists` (`wishlists_id`, `customer_id`, `product_id`, `wishlists_date_added`) VALUES
(1, 2, 6, '2013-04-23 06:20:51'),
(3, 2, 3, '2013-04-23 06:36:35'),
(4, 2, 2, '2013-04-23 06:36:47');

-- --------------------------------------------------------

--
-- Table structure for table `wl_zip_location`
--

DROP TABLE IF EXISTS `wl_zip_location`;
CREATE TABLE IF NOT EXISTS `wl_zip_location` (
  `zip_location_id` int(11) NOT NULL AUTO_INCREMENT,
  `location_name` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `zip_code` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `added_date` datetime DEFAULT NULL,
  `status` enum('1','2','3') COLLATE latin1_general_ci NOT NULL DEFAULT '1',
  `xls_type` enum('Y','N') COLLATE latin1_general_ci DEFAULT 'N' COMMENT 'Y=Yes,N=No',
  PRIMARY KEY (`zip_location_id`),
  KEY `idx_mfg_name_zen` (`location_name`)
) ENGINE=MyISAM AUTO_INCREMENT=703 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `wl_zip_location`
--

INSERT INTO `wl_zip_location` (`zip_location_id`, `location_name`, `zip_code`, `added_date`, `status`, `xls_type`) VALUES
(1, 'Delhi East', '110092', '2013-06-10 12:34:07', '1', 'N'),
(2, 'Agra', '215487', '2013-06-10 12:34:49', '1', 'N'),
(4, 'Australia Square', '1215', '2013-08-06 07:35:15', '1', 'Y'),
(5, 'Grosvenor Place', '1220', '2013-08-06 07:35:15', '1', 'Y'),
(6, 'Royal Exchange', '1225', '2013-08-06 07:35:15', '1', 'Y'),
(7, 'Queen Victoria Building', '1230', '2013-08-06 07:35:15', '1', 'Y'),
(8, 'Eastern Suburbs', '1235', '2013-08-06 07:35:15', '1', 'Y'),
(9, 'Haymarket', '1240', '2013-08-06 07:35:15', '1', 'Y'),
(10, 'Darlinghurst', '1300', '2013-08-06 07:35:15', '1', 'Y'),
(11, 'Potts Point', '1335', '2013-08-06 07:35:15', '1', 'Y'),
(12, 'East Suburbs', '1340', '2013-08-06 07:35:15', '1', 'Y'),
(13, 'Woollahra', '1350', '2013-08-06 07:35:15', '1', 'Y'),
(14, 'East Suburbs', '1355', '2013-08-06 07:35:15', '1', 'Y'),
(15, 'East Suburbs', '1360', '2013-08-06 07:35:15', '1', 'Y'),
(16, 'Waterloo', '1363', '2013-08-06 07:35:15', '1', 'Y'),
(17, 'Alexandria', '1435', '2013-08-06 07:35:15', '1', 'Y'),
(18, 'South Suburbs', '1445', '2013-08-06 07:35:15', '1', 'Y'),
(19, 'Camperdown', '1450', '2013-08-06 07:35:15', '1', 'Y'),
(20, 'Botany', '1455', '2013-08-06 07:35:15', '1', 'Y'),
(21, 'Mascot', '1460', '2013-08-06 07:35:15', '1', 'Y'),
(22, 'South Suburbs', '1465', '2013-08-06 07:35:15', '1', 'Y'),
(23, 'University Of Nsw', '1466', '2013-08-06 07:35:15', '1', 'Y'),
(24, 'South Suburbs', '1470', '2013-08-06 07:35:15', '1', 'Y'),
(25, 'South Suburbs', '1475', '2013-08-06 07:35:15', '1', 'Y'),
(26, 'South Suburbs', '1480', '2013-08-06 07:35:15', '1', 'Y'),
(27, 'South Suburbs', '1481', '2013-08-06 07:35:15', '1', 'Y'),
(28, 'Rockdale', '1485', '2013-08-06 07:35:15', '1', 'Y'),
(29, 'South Suburbs', '1490', '2013-08-06 07:35:15', '1', 'Y'),
(30, 'South Suburbs', '1495', '2013-08-06 07:35:15', '1', 'Y'),
(31, 'South Suburbs', '1499', '2013-08-06 07:35:15', '1', 'Y'),
(32, 'West Chatswood', '1515', '2013-08-06 07:35:15', '1', 'Y'),
(33, 'North Suburbs', '1560', '2013-08-06 07:35:15', '1', 'Y'),
(34, 'North Suburbs', '1565', '2013-08-06 07:35:15', '1', 'Y'),
(35, 'North Suburbs', '1570', '2013-08-06 07:35:15', '1', 'Y'),
(36, 'North Suburbs', '1585', '2013-08-06 07:35:15', '1', 'Y'),
(37, 'North Suburbs', '1590', '2013-08-06 07:35:15', '1', 'Y'),
(38, 'North Suburbs', '1595', '2013-08-06 07:35:15', '1', 'Y'),
(39, 'North Suburbs', '1630', '2013-08-06 07:35:15', '1', 'Y'),
(40, 'North Suburbs', '1635', '2013-08-06 07:35:15', '1', 'Y'),
(41, 'Frenchs Forest', '1639', '2013-08-06 07:35:15', '1', 'Y'),
(42, 'North Suburbs', '1640', '2013-08-06 07:35:15', '1', 'Y'),
(43, 'North Suburbs', '1655', '2013-08-06 07:35:15', '1', 'Y'),
(44, 'North Suburbs', '1660', '2013-08-06 07:35:15', '1', 'Y'),
(45, 'North Ryde', '1670', '2013-08-06 07:35:15', '1', 'Y'),
(46, 'North Suburbs', '1675', '2013-08-06 07:35:15', '1', 'Y'),
(47, 'North Suburbs', '1680', '2013-08-06 07:35:15', '1', 'Y'),
(48, 'North Suburbs', '1685', '2013-08-06 07:35:15', '1', 'Y'),
(49, 'North West Suburbs', '1700', '2013-08-06 07:35:15', '1', 'Y'),
(50, 'Rydalmere', '1701', '2013-08-06 07:35:15', '1', 'Y'),
(51, 'North West Suburbs', '1710', '2013-08-06 07:35:15', '1', 'Y'),
(52, 'North West Suburbs', '1715', '2013-08-06 07:35:15', '1', 'Y'),
(53, 'North West Suburbs', '1730', '2013-08-06 07:35:15', '1', 'Y'),
(54, 'Sydney', '1750', '2013-08-06 07:35:15', '1', 'Y'),
(55, 'North West Suburbs', '1755', '2013-08-06 07:35:15', '1', 'Y'),
(56, 'North West Suburbs', '1765', '2013-08-06 07:35:15', '1', 'Y'),
(57, 'Penrith', '1790', '2013-08-06 07:35:15', '1', 'Y'),
(58, 'South West Suburbs', '1800', '2013-08-06 07:35:15', '1', 'Y'),
(59, 'South West Suburbs', '1805', '2013-08-06 07:35:15', '1', 'Y'),
(60, 'Silverwater', '1811', '2013-08-06 07:35:15', '1', 'Y'),
(61, 'South West Suburbs', '1825', '2013-08-06 07:35:15', '1', 'Y'),
(62, 'South West Suburbs', '1835', '2013-08-06 07:35:15', '1', 'Y'),
(63, 'Wetherill Park', '1851', '2013-08-06 07:35:15', '1', 'Y'),
(64, 'South West Suburbs', '1860', '2013-08-06 07:35:15', '1', 'Y'),
(65, 'Prestons', '1871', '2013-08-06 07:35:15', '1', 'Y'),
(66, 'South West Suburbs', '1875', '2013-08-06 07:35:15', '1', 'Y'),
(67, 'South West Suburbs', '1885', '2013-08-06 07:35:15', '1', 'Y'),
(68, 'South West Suburbs', '1890', '2013-08-06 07:35:15', '1', 'Y'),
(69, 'Milperra', '1891', '2013-08-06 07:35:15', '1', 'Y'),
(70, 'Dawes Point', '2000', '2013-08-06 07:35:15', '1', 'Y'),
(71, 'Haymarket', '2000', '2013-08-06 07:35:15', '1', 'Y'),
(72, 'Millers Point', '2000', '2013-08-06 07:35:15', '1', 'Y'),
(73, 'Sydney', '2000', '2013-08-06 07:35:15', '1', 'Y'),
(74, 'The Rocks', '2000', '2013-08-06 07:35:15', '1', 'Y'),
(75, 'Sydney', '2001', '2013-08-06 07:35:15', '1', 'Y'),
(76, 'World Square', '2002', '2013-08-06 07:35:15', '1', 'Y'),
(77, 'Eastern Suburbs', '2004', '2013-08-06 07:35:15', '1', 'Y'),
(78, 'University Of Sydney', '2006', '2013-08-06 07:35:15', '1', 'Y'),
(79, 'Ultimo', '2007', '2013-08-06 07:35:15', '1', 'Y'),
(80, 'Chippendale', '2008', '2013-08-06 07:35:15', '1', 'Y'),
(81, 'Darlington', '2008', '2013-08-06 07:35:15', '1', 'Y'),
(82, 'Pyrmont', '2009', '2013-08-06 07:35:15', '1', 'Y'),
(83, 'Surry Hills', '2010', '2013-08-06 07:35:15', '1', 'Y'),
(84, 'Darlinghurst', '2010', '2013-08-06 07:35:15', '1', 'Y'),
(85, 'Woolloomooloo', '2011', '2013-08-06 07:35:15', '1', 'Y'),
(86, 'Elizabeth Bay', '2011', '2013-08-06 07:35:15', '1', 'Y'),
(87, 'Potts Point', '2011', '2013-08-06 07:35:15', '1', 'Y'),
(88, 'Rushcutters Bay', '2011', '2013-08-06 07:35:15', '1', 'Y'),
(89, 'Strawberry Hills', '2012', '2013-08-06 07:35:15', '1', 'Y'),
(90, 'Alexandria', '2015', '2013-08-06 07:35:15', '1', 'Y'),
(91, 'Beaconsfield', '2015', '2013-08-06 07:35:15', '1', 'Y'),
(92, 'Eveleigh', '2015', '2013-08-06 07:35:15', '1', 'Y'),
(93, 'Redfern', '2016', '2013-08-06 07:35:15', '1', 'Y'),
(94, 'Waterloo', '2017', '2013-08-06 07:35:15', '1', 'Y'),
(95, 'Zetland', '2017', '2013-08-06 07:35:15', '1', 'Y'),
(96, 'Eastlakes', '2018', '2013-08-06 07:35:15', '1', 'Y'),
(97, 'Rosebery', '2018', '2013-08-06 07:35:15', '1', 'Y'),
(98, 'Banksmeadow', '2019', '2013-08-06 07:35:15', '1', 'Y'),
(99, 'Botany', '2019', '2013-08-06 07:35:15', '1', 'Y'),
(100, 'Mascot', '2020', '2013-08-06 07:35:15', '1', 'Y'),
(101, 'Moore Park', '2021', '2013-08-06 07:35:15', '1', 'Y'),
(102, 'Paddington', '2021', '2013-08-06 07:35:15', '1', 'Y'),
(103, 'Centennial Park', '2021', '2013-08-06 07:35:15', '1', 'Y'),
(104, 'Queens Park', '2022', '2013-08-06 07:35:15', '1', 'Y'),
(105, 'Bondi Junction', '2022', '2013-08-06 07:35:15', '1', 'Y'),
(106, 'Bellevue Hill', '2023', '2013-08-06 07:35:15', '1', 'Y'),
(107, 'Bronte', '2024', '2013-08-06 07:35:15', '1', 'Y'),
(108, 'Waverley', '2024', '2013-08-06 07:35:15', '1', 'Y'),
(109, 'Woollahra', '2025', '2013-08-06 07:35:15', '1', 'Y'),
(110, 'Bondi', '2026', '2013-08-06 07:35:15', '1', 'Y'),
(111, 'Darling Point', '2027', '2013-08-06 07:35:15', '1', 'Y'),
(112, 'Edgecliff', '2027', '2013-08-06 07:35:15', '1', 'Y'),
(113, 'Point Piper', '2027', '2013-08-06 07:35:15', '1', 'Y'),
(114, 'Double Bay', '2028', '2013-08-06 07:35:15', '1', 'Y'),
(115, 'Rose Bay', '2029', '2013-08-06 07:35:15', '1', 'Y'),
(116, 'Vaucluse', '2030', '2013-08-06 07:35:15', '1', 'Y'),
(117, 'Watsons Bay', '2030', '2013-08-06 07:35:15', '1', 'Y'),
(118, 'Dover Heights', '2030', '2013-08-06 07:35:15', '1', 'Y'),
(119, 'Clovelly', '2031', '2013-08-06 07:35:15', '1', 'Y'),
(120, 'Randwick', '2031', '2013-08-06 07:35:15', '1', 'Y'),
(121, 'Daceyville', '2032', '2013-08-06 07:35:15', '1', 'Y'),
(122, 'Kingsford', '2032', '2013-08-06 07:35:15', '1', 'Y'),
(123, 'Kensington', '2033', '2013-08-06 07:35:15', '1', 'Y'),
(124, 'Coogee', '2034', '2013-08-06 07:35:15', '1', 'Y'),
(125, 'South Coogee', '2034', '2013-08-06 07:35:15', '1', 'Y'),
(126, 'Maroubra', '2035', '2013-08-06 07:35:15', '1', 'Y'),
(127, 'Pagewood', '2035', '2013-08-06 07:35:15', '1', 'Y'),
(128, 'Chifley', '2036', '2013-08-06 07:35:15', '1', 'Y'),
(129, 'Eastgardens', '2036', '2013-08-06 07:35:15', '1', 'Y'),
(130, 'Hillsdale', '2036', '2013-08-06 07:35:15', '1', 'Y'),
(131, 'La Perouse', '2036', '2013-08-06 07:35:15', '1', 'Y'),
(132, 'Little Bay', '2036', '2013-08-06 07:35:15', '1', 'Y'),
(133, 'Malabar', '2036', '2013-08-06 07:35:15', '1', 'Y'),
(134, 'Matraville', '2036', '2013-08-06 07:35:15', '1', 'Y'),
(135, 'Phillip Bay', '2036', '2013-08-06 07:35:15', '1', 'Y'),
(136, 'Port Botany', '2036', '2013-08-06 07:35:15', '1', 'Y'),
(137, 'Forest Lodge', '2037', '2013-08-06 07:35:15', '1', 'Y'),
(138, 'Glebe', '2037', '2013-08-06 07:35:15', '1', 'Y'),
(139, 'Annandale', '2038', '2013-08-06 07:35:15', '1', 'Y'),
(140, 'Rozelle', '2039', '2013-08-06 07:35:15', '1', 'Y'),
(141, 'Leichhardt', '2040', '2013-08-06 07:35:15', '1', 'Y'),
(142, 'Lilyfield', '2040', '2013-08-06 07:35:15', '1', 'Y'),
(143, 'Birchgrove', '2040', '2013-08-06 07:35:15', '1', 'Y'),
(144, 'Balmain', '2041', '2013-08-06 07:35:15', '1', 'Y'),
(145, 'Balmain East', '2041', '2013-08-06 07:35:15', '1', 'Y'),
(146, 'Newtown', '2042', '2013-08-06 07:35:15', '1', 'Y'),
(147, 'Enmore', '2042', '2013-08-06 07:35:15', '1', 'Y'),
(148, 'Erskineville', '2043', '2013-08-06 07:35:15', '1', 'Y'),
(149, 'St Peters', '2044', '2013-08-06 07:35:15', '1', 'Y'),
(150, 'Haberfield', '2045', '2013-08-06 07:35:15', '1', 'Y'),
(151, 'Abbotsford', '2046', '2013-08-06 07:35:15', '1', 'Y'),
(152, 'Drummoyne', '2047', '2013-08-06 07:35:15', '1', 'Y'),
(153, 'Stanmore', '2048', '2013-08-06 07:35:15', '1', 'Y'),
(154, 'Lewisham', '2049', '2013-08-06 07:35:15', '1', 'Y'),
(155, 'Camperdown', '2050', '2013-08-06 07:35:15', '1', 'Y'),
(156, 'University Of New South Wales', '2052', '2013-08-06 07:35:15', '1', 'Y'),
(157, 'Chatswood', '2057', '2013-08-06 07:35:15', '1', 'Y'),
(158, 'North Sydney', '2059', '2013-08-06 07:35:15', '1', 'Y'),
(159, 'Waverton', '2060', '2013-08-06 07:35:15', '1', 'Y'),
(160, 'Kirribilli', '2061', '2013-08-06 07:35:15', '1', 'Y'),
(161, 'Cammeray', '2062', '2013-08-06 07:35:15', '1', 'Y'),
(162, 'Northbridge', '2063', '2013-08-06 07:35:15', '1', 'Y'),
(163, 'Artarmon', '2064', '2013-08-06 07:35:15', '1', 'Y'),
(164, 'Crows Nest', '2065', '2013-08-06 07:35:15', '1', 'Y'),
(165, 'Lane Cove', '2066', '2013-08-06 07:35:15', '1', 'Y'),
(166, 'Chatswood', '2067', '2013-08-06 07:35:15', '1', 'Y'),
(167, 'Middle Cove', '2068', '2013-08-06 07:35:15', '1', 'Y'),
(168, 'Roseville', '2069', '2013-08-06 07:35:15', '1', 'Y'),
(169, 'East Lindfield', '2070', '2013-08-06 07:35:15', '1', 'Y'),
(170, 'Killara', '2071', '2013-08-06 07:35:15', '1', 'Y'),
(171, 'Gordon', '2072', '2013-08-06 07:35:15', '1', 'Y'),
(172, 'Pymble', '2073', '2013-08-06 07:35:15', '1', 'Y'),
(173, 'Turramurra', '2074', '2013-08-06 07:35:15', '1', 'Y'),
(174, 'St Ives', '2075', '2013-08-06 07:35:15', '1', 'Y'),
(175, 'Normanhurst', '2076', '2013-08-06 07:35:15', '1', 'Y'),
(176, 'Waitara', '2077', '2013-08-06 07:35:15', '1', 'Y'),
(177, 'Mount Colah', '2079', '2013-08-06 07:35:15', '1', 'Y'),
(178, 'Mount Kuring-gai', '2080', '2013-08-06 07:35:15', '1', 'Y'),
(179, 'Berowra', '2081', '2013-08-06 07:35:15', '1', 'Y'),
(180, 'Berowra Heights', '2082', '2013-08-06 07:35:15', '1', 'Y'),
(181, 'Brooklyn', '2083', '2013-08-06 07:35:15', '1', 'Y'),
(182, 'Duffys Forest', '2084', '2013-08-06 07:35:15', '1', 'Y'),
(183, 'Belrose', '2085', '2013-08-06 07:35:15', '1', 'Y'),
(184, 'Frenchs Forest', '2086', '2013-08-06 07:35:15', '1', 'Y'),
(185, 'Forestville', '2087', '2013-08-06 07:35:15', '1', 'Y'),
(186, 'Mosman', '2088', '2013-08-06 07:35:15', '1', 'Y'),
(187, 'Neutral Bay', '2089', '2013-08-06 07:35:15', '1', 'Y'),
(188, 'Cremorne', '2090', '2013-08-06 07:35:15', '1', 'Y'),
(189, 'Seaforth', '2092', '2013-08-06 07:35:15', '1', 'Y'),
(190, 'Balgowlah', '2093', '2013-08-06 07:35:15', '1', 'Y'),
(191, 'Fairlight', '2094', '2013-08-06 07:35:15', '1', 'Y'),
(192, 'Manly', '2095', '2013-08-06 07:35:15', '1', 'Y'),
(193, 'Queenscliff', '2096', '2013-08-06 07:35:15', '1', 'Y'),
(194, 'Collaroy', '2097', '2013-08-06 07:35:15', '1', 'Y'),
(195, 'Cromer', '2099', '2013-08-06 07:35:15', '1', 'Y'),
(196, 'Beacon Hill', '2100', '2013-08-06 07:35:15', '1', 'Y'),
(197, 'Narrabeen', '2101', '2013-08-06 07:35:15', '1', 'Y'),
(198, 'Warriewood', '2102', '2013-08-06 07:35:15', '1', 'Y'),
(199, 'Mona Vale', '2103', '2013-08-06 07:35:15', '1', 'Y'),
(200, 'Bayview', '2104', '2013-08-06 07:35:15', '1', 'Y'),
(201, 'Church Point', '2105', '2013-08-06 07:35:15', '1', 'Y'),
(202, 'Newport', '2106', '2013-08-06 07:35:15', '1', 'Y'),
(203, 'Whale Beach', '2107', '2013-08-06 07:35:15', '1', 'Y'),
(204, 'Palm Beach', '2108', '2013-08-06 07:35:15', '1', 'Y'),
(205, 'Macquarie University', '2109', '2013-08-06 07:35:15', '1', 'Y'),
(206, 'Woolwich', '2110', '2013-08-06 07:35:15', '1', 'Y'),
(207, 'Gladesville', '2111', '2013-08-06 07:35:15', '1', 'Y'),
(208, 'Putney', '2112', '2013-08-06 07:35:15', '1', 'Y'),
(209, 'Denistone East', '2113', '2013-08-06 07:35:15', '1', 'Y'),
(210, 'Denistone', '2114', '2013-08-06 07:35:15', '1', 'Y'),
(211, 'Ermington', '2115', '2013-08-06 07:35:15', '1', 'Y'),
(212, 'Rydalmere', '2116', '2013-08-06 07:35:15', '1', 'Y'),
(213, 'Telopea', '2117', '2013-08-06 07:35:15', '1', 'Y'),
(214, 'Carlingford', '2118', '2013-08-06 07:35:15', '1', 'Y'),
(215, 'Cheltenham', '2119', '2013-08-06 07:35:15', '1', 'Y'),
(216, 'Pennant Hills', '2120', '2013-08-06 07:35:15', '1', 'Y'),
(217, 'Epping', '2121', '2013-08-06 07:35:15', '1', 'Y'),
(218, 'Marsfield', '2122', '2013-08-06 07:35:15', '1', 'Y'),
(219, 'Parramatta', '2123', '2013-08-06 07:35:15', '1', 'Y'),
(220, 'Parramatta', '2124', '2013-08-06 07:35:15', '1', 'Y'),
(221, 'West Pennant Hills', '2125', '2013-08-06 07:35:15', '1', 'Y'),
(222, 'Cherrybrook', '2126', '2013-08-06 07:35:15', '1', 'Y'),
(223, 'Homebush Bay', '2127', '2013-08-06 07:35:15', '1', 'Y'),
(224, 'Silverwater', '2128', '2013-08-06 07:35:15', '1', 'Y'),
(225, 'Sydney Markets', '2129', '2013-08-06 07:35:15', '1', 'Y'),
(226, 'Summer Hill', '2130', '2013-08-06 07:35:15', '1', 'Y'),
(227, 'Ashfield', '2131', '2013-08-06 07:35:15', '1', 'Y'),
(228, 'Croydon', '2132', '2013-08-06 07:35:15', '1', 'Y'),
(229, 'Croydon Park', '2133', '2013-08-06 07:35:15', '1', 'Y'),
(230, 'Burwood', '2134', '2013-08-06 07:35:15', '1', 'Y'),
(231, 'Strathfield', '2135', '2013-08-06 07:35:15', '1', 'Y'),
(232, 'Strathfield South', '2136', '2013-08-06 07:35:15', '1', 'Y'),
(233, 'Breakfast Point', '2137', '2013-08-06 07:35:15', '1', 'Y'),
(234, 'Concord West', '2138', '2013-08-06 07:35:15', '1', 'Y'),
(235, 'Concord Repatriation Hospital', '2139', '2013-08-06 07:35:15', '1', 'Y'),
(236, 'Homebush', '2140', '2013-08-06 07:35:15', '1', 'Y'),
(237, 'Lidcombe', '2141', '2013-08-06 07:35:15', '1', 'Y'),
(238, 'Rosehill', '2142', '2013-08-06 07:35:15', '1', 'Y'),
(239, 'Birrong', '2143', '2013-08-06 07:35:15', '1', 'Y'),
(240, 'Auburn', '2144', '2013-08-06 07:35:15', '1', 'Y'),
(241, 'Constitution Hill', '2145', '2013-08-06 07:35:15', '1', 'Y'),
(242, 'Toongabbie', '2146', '2013-08-06 07:35:15', '1', 'Y'),
(243, 'Seven Hills', '2147', '2013-08-06 07:35:15', '1', 'Y'),
(244, 'Arndell Park', '2148', '2013-08-06 07:35:15', '1', 'Y'),
(245, 'Harris Park', '2150', '2013-08-06 07:35:15', '1', 'Y'),
(246, 'North Parramatta', '2151', '2013-08-06 07:35:15', '1', 'Y'),
(247, 'Northmead', '2152', '2013-08-06 07:35:15', '1', 'Y'),
(248, 'Winston Hills', '2153', '2013-08-06 07:35:15', '1', 'Y'),
(249, 'Castle Hill', '2154', '2013-08-06 07:35:15', '1', 'Y'),
(250, 'Beaumont Hills', '2155', '2013-08-06 07:35:15', '1', 'Y'),
(251, 'Kenthurst', '2156', '2013-08-06 07:35:15', '1', 'Y'),
(252, 'Glenorie', '2157', '2013-08-06 07:35:15', '1', 'Y'),
(253, 'Dural', '2158', '2013-08-06 07:35:15', '1', 'Y'),
(254, 'Arcadia', '2159', '2013-08-06 07:35:15', '1', 'Y'),
(255, 'Merrylands', '2160', '2013-08-06 07:35:15', '1', 'Y'),
(256, 'Guildford', '2161', '2013-08-06 07:35:15', '1', 'Y'),
(257, 'Sefton', '2162', '2013-08-06 07:35:15', '1', 'Y'),
(258, 'Carramar', '2163', '2013-08-06 07:35:15', '1', 'Y'),
(259, 'Smithfield', '2164', '2013-08-06 07:35:15', '1', 'Y'),
(260, 'Fairfield', '2165', '2013-08-06 07:35:15', '1', 'Y'),
(261, 'Cabramatta', '2166', '2013-08-06 07:35:15', '1', 'Y'),
(262, 'Glenfield', '2167', '2013-08-06 07:35:15', '1', 'Y'),
(263, 'Ashcroft', '2168', '2013-08-06 07:35:15', '1', 'Y'),
(264, 'Casula', '2170', '2013-08-06 07:35:15', '1', 'Y'),
(265, 'Cecil Hills', '2171', '2013-08-06 07:35:15', '1', 'Y'),
(266, 'Pleasure Point', '2172', '2013-08-06 07:35:15', '1', 'Y'),
(267, 'Holsworthy', '2173', '2013-08-06 07:35:15', '1', 'Y'),
(268, 'Edmondson Park', '2174', '2013-08-06 07:35:15', '1', 'Y'),
(269, 'Horsley Park', '2175', '2013-08-06 07:35:15', '1', 'Y'),
(270, 'Abbotsbury', '2176', '2013-08-06 07:35:15', '1', 'Y'),
(271, 'Bonnyrigg', '2177', '2013-08-06 07:35:15', '1', 'Y'),
(272, 'Cecil Park', '2178', '2013-08-06 07:35:15', '1', 'Y'),
(273, 'Austral', '2179', '2013-08-06 07:35:15', '1', 'Y'),
(274, 'Chullora', '2190', '2013-08-06 07:35:15', '1', 'Y'),
(275, 'Belfield', '2191', '2013-08-06 07:35:15', '1', 'Y'),
(276, 'Belmore', '2192', '2013-08-06 07:35:15', '1', 'Y'),
(277, 'Ashbury', '2193', '2013-08-06 07:35:15', '1', 'Y'),
(278, 'Campsie', '2194', '2013-08-06 07:35:15', '1', 'Y'),
(279, 'Lakemba', '2195', '2013-08-06 07:35:15', '1', 'Y'),
(280, 'Punchbowl', '2196', '2013-08-06 07:35:15', '1', 'Y'),
(281, 'Bass Hill', '2197', '2013-08-06 07:35:15', '1', 'Y'),
(282, 'Georges Hall', '2198', '2013-08-06 07:35:15', '1', 'Y'),
(283, 'Yagoona', '2199', '2013-08-06 07:35:15', '1', 'Y'),
(284, 'Bankstown', '2200', '2013-08-06 07:35:15', '1', 'Y'),
(285, 'Dulwich Hill', '2203', '2013-08-06 07:35:15', '1', 'Y'),
(286, 'Marrickville', '2204', '2013-08-06 07:35:15', '1', 'Y'),
(287, 'Arncliffe', '2205', '2013-08-06 07:35:15', '1', 'Y'),
(288, 'Clemton Park', '2206', '2013-08-06 07:35:15', '1', 'Y'),
(289, 'Bardwell Park', '2207', '2013-08-06 07:35:15', '1', 'Y'),
(290, 'Kingsgrove', '2208', '2013-08-06 07:35:15', '1', 'Y'),
(291, 'Beverly Hills', '2209', '2013-08-06 07:35:15', '1', 'Y'),
(292, 'Peakhurst', '2210', '2013-08-06 07:35:15', '1', 'Y'),
(293, 'Padstow', '2211', '2013-08-06 07:35:15', '1', 'Y'),
(294, 'Revesby', '2212', '2013-08-06 07:35:15', '1', 'Y'),
(295, 'East Hills', '2213', '2013-08-06 07:35:15', '1', 'Y'),
(296, 'Milperra', '2214', '2013-08-06 07:35:15', '1', 'Y'),
(297, 'Banksia', '2216', '2013-08-06 07:35:15', '1', 'Y'),
(298, 'Beverley Park', '2217', '2013-08-06 07:35:15', '1', 'Y'),
(299, 'Allawah', '2218', '2013-08-06 07:35:15', '1', 'Y'),
(300, 'Dolls Point', '2219', '2013-08-06 07:35:15', '1', 'Y'),
(301, 'Hurstville', '2220', '2013-08-06 07:35:15', '1', 'Y'),
(302, 'Kyle Bay', '2221', '2013-08-06 07:35:15', '1', 'Y'),
(303, 'Penshurst', '2222', '2013-08-06 07:35:15', '1', 'Y'),
(304, 'Mortdale', '2223', '2013-08-06 07:35:15', '1', 'Y'),
(305, 'Kangaroo Point', '2224', '2013-08-06 07:35:15', '1', 'Y'),
(306, 'Oyster Bay', '2225', '2013-08-06 07:35:15', '1', 'Y'),
(307, 'Bonnet Bay', '2226', '2013-08-06 07:35:15', '1', 'Y'),
(308, 'Gymea', '2227', '2013-08-06 07:35:15', '1', 'Y'),
(309, 'Miranda', '2228', '2013-08-06 07:35:15', '1', 'Y'),
(310, 'Caringbah', '2229', '2013-08-06 07:35:15', '1', 'Y'),
(311, 'Bundeena', '2230', '2013-08-06 07:35:15', '1', 'Y'),
(312, 'Kurnell', '2231', '2013-08-06 07:35:15', '1', 'Y'),
(313, 'Audley', '2232', '2013-08-06 07:35:15', '1', 'Y'),
(314, 'Engadine', '2233', '2013-08-06 07:35:15', '1', 'Y'),
(315, 'Alfords Point', '2234', '2013-08-06 07:35:15', '1', 'Y'),
(316, 'Calga', '2250', '2013-08-06 07:35:15', '1', 'Y'),
(317, 'Avoca Beach', '2251', '2013-08-06 07:35:15', '1', 'Y'),
(318, 'Blackwall', '2256', '2013-08-06 07:35:15', '1', 'Y'),
(319, 'Booker Bay', '2257', '2013-08-06 07:35:15', '1', 'Y'),
(320, 'Kangy Angy', '2258', '2013-08-06 07:35:15', '1', 'Y'),
(321, 'Chain Valley Bay', '2259', '2013-08-06 07:35:15', '1', 'Y'),
(322, 'Erina Heights', '2260', '2013-08-06 07:35:15', '1', 'Y'),
(323, 'Bateau Bay', '2261', '2013-08-06 07:35:15', '1', 'Y'),
(324, 'Blue Haven', '2262', '2013-08-06 07:35:15', '1', 'Y'),
(325, 'Canton Beach', '2263', '2013-08-06 07:35:15', '1', 'Y'),
(326, 'Bonnells Bay', '2264', '2013-08-06 07:35:15', '1', 'Y'),
(327, 'Cooranbong', '2265', '2013-08-06 07:35:15', '1', 'Y'),
(328, 'Wangi Wangi', '2267', '2013-08-06 07:35:16', '1', 'Y'),
(329, 'Barnsley', '2278', '2013-08-06 07:35:16', '1', 'Y'),
(330, 'Belmont', '2280', '2013-08-06 07:35:16', '1', 'Y'),
(331, 'Blacksmiths', '2281', '2013-08-06 07:35:16', '1', 'Y'),
(332, 'Eleebana', '2282', '2013-08-06 07:35:16', '1', 'Y'),
(333, 'Arcadia Vale', '2283', '2013-08-06 07:35:16', '1', 'Y'),
(334, 'Argenton', '2284', '2013-08-06 07:35:16', '1', 'Y'),
(335, 'Cameron Park', '2285', '2013-08-06 07:35:16', '1', 'Y'),
(336, 'Holmesville', '2286', '2013-08-06 07:35:16', '1', 'Y'),
(337, 'Birmingham Gardens', '2287', '2013-08-06 07:35:16', '1', 'Y'),
(338, 'Adamstown', '2289', '2013-08-06 07:35:16', '1', 'Y'),
(339, 'Bennetts Green', '2290', '2013-08-06 07:35:16', '1', 'Y'),
(340, 'Merewether', '2291', '2013-08-06 07:35:16', '1', 'Y'),
(341, 'Broadmeadow', '2292', '2013-08-06 07:35:16', '1', 'Y'),
(342, 'Maryville', '2293', '2013-08-06 07:35:16', '1', 'Y'),
(343, 'Carrington', '2294', '2013-08-06 07:35:16', '1', 'Y'),
(344, 'Fern Bay', '2295', '2013-08-06 07:35:16', '1', 'Y'),
(345, 'Islington', '2296', '2013-08-06 07:35:16', '1', 'Y'),
(346, 'Tighes Hill', '2297', '2013-08-06 07:35:16', '1', 'Y'),
(347, 'Georgetown', '2298', '2013-08-06 07:35:16', '1', 'Y'),
(348, 'Jesmond', '2299', '2013-08-06 07:35:16', '1', 'Y'),
(349, 'Bar Beach', '2300', '2013-08-06 07:35:16', '1', 'Y'),
(350, 'Newcastle West', '2302', '2013-08-06 07:35:16', '1', 'Y'),
(351, 'Hamilton', '2303', '2013-08-06 07:35:16', '1', 'Y'),
(352, 'Kooragang', '2304', '2013-08-06 07:35:16', '1', 'Y'),
(353, 'New Lambton', '2305', '2013-08-06 07:35:16', '1', 'Y'),
(354, 'Windale', '2306', '2013-08-06 07:35:16', '1', 'Y'),
(355, 'Shortland', '2307', '2013-08-06 07:35:16', '1', 'Y'),
(356, 'Callaghan', '2308', '2013-08-06 07:35:16', '1', 'Y'),
(357, 'Hamilton', '2309', '2013-08-06 07:35:16', '1', 'Y'),
(358, 'Hunter Region', '2310', '2013-08-06 07:35:16', '1', 'Y'),
(359, 'Allynbrook', '2311', '2013-08-06 07:35:16', '1', 'Y'),
(360, 'Nabiac', '2312', '2013-08-06 07:35:16', '1', 'Y'),
(361, 'Williamtown Raaf', '2314', '2013-08-06 07:35:16', '1', 'Y'),
(362, 'Corlette', '2315', '2013-08-06 07:35:16', '1', 'Y'),
(363, 'Anna Bay', '2316', '2013-08-06 07:35:16', '1', 'Y'),
(364, 'Salamander Bay', '2317', '2013-08-06 07:35:16', '1', 'Y'),
(365, 'Campvale', '2318', '2013-08-06 07:35:16', '1', 'Y'),
(366, 'Tanilba Bay', '2319', '2013-08-06 07:35:16', '1', 'Y'),
(367, 'Aberglasslyn', '2320', '2013-08-06 07:35:16', '1', 'Y'),
(368, 'Clarence Town', '2321', '2013-08-06 07:35:16', '1', 'Y'),
(369, 'Beresfield', '2322', '2013-08-06 07:35:16', '1', 'Y'),
(370, 'Ashtonfield', '2323', '2013-08-06 07:35:16', '1', 'Y'),
(371, 'Balickera', '2324', '2013-08-06 07:35:16', '1', 'Y'),
(372, 'Aberdare', '2325', '2013-08-06 07:35:16', '1', 'Y'),
(373, 'Abermain', '2326', '2013-08-06 07:35:16', '1', 'Y'),
(374, 'Kurri Kurri', '2327', '2013-08-06 07:35:16', '1', 'Y'),
(375, 'Denman', '2328', '2013-08-06 07:35:16', '1', 'Y'),
(376, 'Borambil', '2329', '2013-08-06 07:35:16', '1', 'Y'),
(377, 'Broke', '2330', '2013-08-06 07:35:16', '1', 'Y'),
(378, 'Singleton Milpo', '2331', '2013-08-06 07:35:16', '1', 'Y'),
(379, 'Baerami Creek', '2333', '2013-08-06 07:35:16', '1', 'Y'),
(380, 'Greta', '2334', '2013-08-06 07:35:16', '1', 'Y'),
(381, 'Belford', '2335', '2013-08-06 07:35:16', '1', 'Y'),
(382, 'Aberdeen', '2336', '2013-08-06 07:35:16', '1', 'Y'),
(383, 'Bunnan', '2337', '2013-08-06 07:35:16', '1', 'Y'),
(384, 'Ardglen', '2338', '2013-08-06 07:35:16', '1', 'Y'),
(385, 'Warrah Creek', '2339', '2013-08-06 07:35:16', '1', 'Y'),
(386, 'Bowling Alley Point', '2340', '2013-08-06 07:35:16', '1', 'Y'),
(387, 'Werris Creek', '2341', '2013-08-06 07:35:16', '1', 'Y'),
(388, 'Currabubula', '2342', '2013-08-06 07:35:16', '1', 'Y'),
(389, 'Blackville', '2343', '2013-08-06 07:35:16', '1', 'Y'),
(390, 'Duri', '2344', '2013-08-06 07:35:16', '1', 'Y'),
(391, 'Attunga', '2345', '2013-08-06 07:35:16', '1', 'Y'),
(392, 'Manilla', '2346', '2013-08-06 07:35:16', '1', 'Y'),
(393, 'Barraba', '2347', '2013-08-06 07:35:16', '1', 'Y'),
(394, 'Tamworth', '2348', '2013-08-06 07:35:16', '1', 'Y'),
(395, 'Armidale', '2350', '2013-08-06 07:35:16', '1', 'Y'),
(396, 'University Of New England', '2351', '2013-08-06 07:35:16', '1', 'Y'),
(397, 'Kootingal', '2352', '2013-08-06 07:35:16', '1', 'Y'),
(398, 'Moonbi', '2353', '2013-08-06 07:35:16', '1', 'Y'),
(399, 'Kentucky', '2354', '2013-08-06 07:35:16', '1', 'Y'),
(400, 'Bendemeer', '2355', '2013-08-06 07:35:16', '1', 'Y'),
(401, 'Gwabegar', '2356', '2013-08-06 07:35:16', '1', 'Y'),
(402, 'Bugaldie', '2357', '2013-08-06 07:35:16', '1', 'Y'),
(403, 'Enmore', '2358', '2013-08-06 07:35:16', '1', 'Y'),
(404, 'Bundarra', '2359', '2013-08-06 07:35:16', '1', 'Y'),
(405, 'Bukkulla', '2360', '2013-08-06 07:35:16', '1', 'Y'),
(406, 'Ashford', '2361', '2013-08-06 07:35:16', '1', 'Y'),
(407, 'Ben Lomond', '2365', '2013-08-06 07:35:16', '1', 'Y'),
(408, 'Stannifer', '2369', '2013-08-06 07:35:16', '1', 'Y'),
(409, 'Dundee', '2370', '2013-08-06 07:35:16', '1', 'Y'),
(410, 'Deepwater', '2371', '2013-08-06 07:35:16', '1', 'Y'),
(411, 'Black Swamp', '2372', '2013-08-06 07:35:16', '1', 'Y'),
(412, 'Mullaley', '2379', '2013-08-06 07:35:16', '1', 'Y'),
(413, 'Gunnedah', '2380', '2013-08-06 07:35:16', '1', 'Y'),
(414, 'Breeza', '2381', '2013-08-06 07:35:16', '1', 'Y'),
(415, 'Boggabri', '2382', '2013-08-06 07:35:16', '1', 'Y'),
(416, 'Burren Junction', '2386', '2013-08-06 07:35:16', '1', 'Y'),
(417, 'Rowena', '2387', '2013-08-06 07:35:16', '1', 'Y'),
(418, 'Cuttabri', '2388', '2013-08-06 07:35:16', '1', 'Y'),
(419, 'Baan Baa', '2390', '2013-08-06 07:35:16', '1', 'Y'),
(420, 'Binnaway', '2395', '2013-08-06 07:35:16', '1', 'Y'),
(421, 'Baradine', '2396', '2013-08-06 07:35:16', '1', 'Y'),
(422, 'Bellata', '2397', '2013-08-06 07:35:16', '1', 'Y'),
(423, 'Gurley', '2398', '2013-08-06 07:35:16', '1', 'Y'),
(424, 'Pallamallawa', '2399', '2013-08-06 07:35:16', '1', 'Y'),
(425, 'Ashley', '2400', '2013-08-06 07:35:16', '1', 'Y'),
(426, 'Gravesend', '2401', '2013-08-06 07:35:16', '1', 'Y'),
(427, 'Coolatai', '2402', '2013-08-06 07:35:16', '1', 'Y'),
(428, 'Delungra', '2403', '2013-08-06 07:35:16', '1', 'Y'),
(429, 'Bingara', '2404', '2013-08-06 07:35:16', '1', 'Y'),
(430, 'Boomi', '2405', '2013-08-06 07:35:16', '1', 'Y'),
(431, 'Mungindi', '2406', '2013-08-06 07:35:16', '1', 'Y'),
(432, 'North Star', '2408', '2013-08-06 07:35:16', '1', 'Y'),
(433, 'Boggabilla', '2409', '2013-08-06 07:35:16', '1', 'Y'),
(434, 'Yetman', '2410', '2013-08-06 07:35:16', '1', 'Y'),
(435, 'Croppa Creek', '2411', '2013-08-06 07:35:16', '1', 'Y'),
(436, 'Monkerai', '2415', '2013-08-06 07:35:16', '1', 'Y'),
(437, 'Bandon Grove', '2420', '2013-08-06 07:35:16', '1', 'Y'),
(438, 'Paterson', '2421', '2013-08-06 07:35:16', '1', 'Y'),
(439, 'Barrington', '2422', '2013-08-06 07:35:16', '1', 'Y'),
(440, 'Boolambayte', '2423', '2013-08-06 07:35:16', '1', 'Y'),
(441, 'Cundle Flat', '2424', '2013-08-06 07:35:16', '1', 'Y'),
(442, 'Allworth', '2425', '2013-08-06 07:35:16', '1', 'Y'),
(443, 'Coopernook', '2426', '2013-08-06 07:35:16', '1', 'Y'),
(444, 'Crowdy Head', '2427', '2013-08-06 07:35:16', '1', 'Y'),
(445, 'Charlotte Bay', '2428', '2013-08-06 07:35:16', '1', 'Y'),
(446, 'Bobin', '2429', '2013-08-06 07:35:16', '1', 'Y'),
(447, 'Bohnock', '2430', '2013-08-06 07:35:16', '1', 'Y'),
(448, 'Jerseyville', '2431', '2013-08-06 07:35:16', '1', 'Y'),
(449, 'Kendall', '2439', '2013-08-06 07:35:16', '1', 'Y'),
(450, 'Bellbrook', '2440', '2013-08-06 07:35:16', '1', 'Y'),
(451, 'Ballengarra', '2441', '2013-08-06 07:35:16', '1', 'Y'),
(452, 'Kempsey', '2442', '2013-08-06 07:35:16', '1', 'Y'),
(453, 'Camden Head', '2443', '2013-08-06 07:35:16', '1', 'Y'),
(454, 'Blackmans Point', '2444', '2013-08-06 07:35:16', '1', 'Y'),
(455, 'Bonny Hills', '2445', '2013-08-06 07:35:16', '1', 'Y'),
(456, 'Bagnoo', '2446', '2013-08-06 07:35:16', '1', 'Y'),
(457, 'Macksville', '2447', '2013-08-06 07:35:16', '1', 'Y'),
(458, 'Nambucca Heads', '2448', '2013-08-06 07:35:16', '1', 'Y'),
(459, 'Argents Hill', '2449', '2013-08-06 07:35:16', '1', 'Y'),
(460, 'Boambee', '2450', '2013-08-06 07:35:16', '1', 'Y'),
(461, 'Boambee East', '2452', '2013-08-06 07:35:16', '1', 'Y'),
(462, 'Bostobrick', '2453', '2013-08-06 07:35:16', '1', 'Y'),
(463, 'Bellingen', '2454', '2013-08-06 07:35:16', '1', 'Y'),
(464, 'Arrawarra Headland', '2455', '2013-08-06 07:35:16', '1', 'Y'),
(465, 'Arrawarra Headland', '2456', '2013-08-06 07:35:16', '1', 'Y'),
(466, 'Baryulgil', '2460', '2013-08-06 07:35:16', '1', 'Y'),
(467, 'Pillar Valley', '2462', '2013-08-06 07:35:16', '1', 'Y'),
(468, 'Brooms Head', '2463', '2013-08-06 07:35:16', '1', 'Y'),
(469, 'Yamba', '2464', '2013-08-06 07:35:16', '1', 'Y'),
(470, 'Harwood', '2465', '2013-08-06 07:35:16', '1', 'Y'),
(471, 'Iluka', '2466', '2013-08-06 07:35:16', '1', 'Y'),
(472, 'Bonalbo', '2469', '2013-08-06 07:35:16', '1', 'Y'),
(473, 'Backmede', '2470', '2013-08-06 07:35:16', '1', 'Y'),
(474, 'Coraki', '2471', '2013-08-06 07:35:16', '1', 'Y'),
(475, 'Broadwater', '2472', '2013-08-06 07:35:16', '1', 'Y'),
(476, 'Evans Head', '2473', '2013-08-06 07:35:16', '1', 'Y'),
(477, 'Cawongla', '2474', '2013-08-06 07:35:16', '1', 'Y'),
(478, 'Urbenville', '2475', '2013-08-06 07:35:16', '1', 'Y'),
(479, 'Acacia Plateau', '2476', '2013-08-06 07:35:16', '1', 'Y'),
(480, 'Alstonville', '2477', '2013-08-06 07:35:16', '1', 'Y'),
(481, 'Ballina', '2478', '2013-08-06 07:35:16', '1', 'Y'),
(482, 'Bangalow', '2479', '2013-08-06 07:35:16', '1', 'Y'),
(483, 'Bentley', '2480', '2013-08-06 07:35:16', '1', 'Y'),
(484, 'Broken Head', '2481', '2013-08-06 07:35:16', '1', 'Y'),
(485, 'Goonengerry', '2482', '2013-08-06 07:35:16', '1', 'Y'),
(486, 'Billinudgel', '2483', '2013-08-06 07:35:16', '1', 'Y'),
(487, 'Back Creek', '2484', '2013-08-06 07:35:16', '1', 'Y'),
(488, 'Tweed Heads', '2485', '2013-08-06 07:35:16', '1', 'Y'),
(489, 'Banora Point', '2486', '2013-08-06 07:35:16', '1', 'Y'),
(490, 'Chinderah', '2487', '2013-08-06 07:35:16', '1', 'Y'),
(491, 'Bogangar', '2488', '2013-08-06 07:35:16', '1', 'Y'),
(492, 'Hastings Point', '2489', '2013-08-06 07:35:16', '1', 'Y'),
(493, 'Tumbulgum', '2490', '2013-08-06 07:35:16', '1', 'Y'),
(494, 'Coniston', '2500', '2013-08-06 07:35:16', '1', 'Y'),
(495, 'Cringila', '2502', '2013-08-06 07:35:16', '1', 'Y'),
(496, 'Kemblawarra', '2505', '2013-08-06 07:35:16', '1', 'Y'),
(497, 'Berkeley', '2506', '2013-08-06 07:35:16', '1', 'Y'),
(498, 'Coalcliff', '2508', '2013-08-06 07:35:16', '1', 'Y'),
(499, 'Austinmer', '2515', '2013-08-06 07:35:16', '1', 'Y'),
(500, 'Bulli', '2516', '2013-08-06 07:35:16', '1', 'Y'),
(501, 'Russell Vale', '2517', '2013-08-06 07:35:16', '1', 'Y'),
(502, 'Bellambi', '2518', '2013-08-06 07:35:16', '1', 'Y'),
(503, 'Balgownie', '2519', '2013-08-06 07:35:16', '1', 'Y'),
(504, 'Wollongong', '2520', '2013-08-06 07:35:16', '1', 'Y'),
(505, 'South Coast', '2521', '2013-08-06 07:35:16', '1', 'Y'),
(506, 'University Of Wollongong', '2522', '2013-08-06 07:35:16', '1', 'Y'),
(507, 'Figtree', '2525', '2013-08-06 07:35:16', '1', 'Y'),
(508, 'Cordeaux Heights', '2526', '2013-08-06 07:35:16', '1', 'Y'),
(509, 'Albion Park', '2527', '2013-08-06 07:35:16', '1', 'Y'),
(510, 'Barrack Heights', '2528', '2013-08-06 07:35:16', '1', 'Y'),
(511, 'Blackbutt', '2529', '2013-08-06 07:35:16', '1', 'Y'),
(512, 'Brownsville', '2530', '2013-08-06 07:35:16', '1', 'Y'),
(513, 'Bombo', '2533', '2013-08-06 07:35:16', '1', 'Y'),
(514, 'Foxground', '2534', '2013-08-06 07:35:16', '1', 'Y'),
(515, 'Bellawongarah', '2535', '2013-08-06 07:35:16', '1', 'Y'),
(516, 'Batehaven', '2536', '2013-08-06 07:35:16', '1', 'Y'),
(517, 'Bergalia', '2537', '2013-08-06 07:35:16', '1', 'Y'),
(518, 'Milton', '2538', '2013-08-06 07:35:16', '1', 'Y'),
(519, 'Bawley Point', '2539', '2013-08-06 07:35:16', '1', 'Y'),
(520, 'Bamarang', '2540', '2013-08-06 07:35:16', '1', 'Y'),
(521, 'Bangalee', '2541', '2013-08-06 07:35:16', '1', 'Y'),
(522, 'Bodalla', '2545', '2013-08-06 07:35:16', '1', 'Y'),
(523, 'Barragga Bay', '2546', '2013-08-06 07:35:16', '1', 'Y'),
(524, 'Berrambool', '2548', '2013-08-06 07:35:16', '1', 'Y'),
(525, 'Broadwater', '2549', '2013-08-06 07:35:16', '1', 'Y'),
(526, 'Bega', '2550', '2013-08-06 07:35:16', '1', 'Y'),
(527, 'Eden', '2551', '2013-08-06 07:35:16', '1', 'Y'),
(528, 'Badgerys Creek', '2555', '2013-08-06 07:35:16', '1', 'Y'),
(529, 'Bringelly', '2556', '2013-08-06 07:35:16', '1', 'Y'),
(530, 'Catherine Field', '2557', '2013-08-06 07:35:16', '1', 'Y'),
(531, 'Eagle Vale', '2558', '2013-08-06 07:35:16', '1', 'Y'),
(532, 'Blairmount', '2559', '2013-08-06 07:35:16', '1', 'Y'),
(533, 'Airds', '2560', '2013-08-06 07:35:16', '1', 'Y'),
(534, 'Menangle Park', '2563', '2013-08-06 07:35:16', '1', 'Y'),
(535, 'Long Point', '2564', '2013-08-06 07:35:16', '1', 'Y'),
(536, 'Macquarie Links', '2565', '2013-08-06 07:35:16', '1', 'Y'),
(537, 'Bow Bowing', '2566', '2013-08-06 07:35:16', '1', 'Y'),
(538, 'Currans Hill', '2567', '2013-08-06 07:35:16', '1', 'Y'),
(539, 'Menangle', '2568', '2013-08-06 07:35:16', '1', 'Y'),
(540, 'Douglas Park', '2569', '2013-08-06 07:35:16', '1', 'Y'),
(541, 'Camden', '2570', '2013-08-06 07:35:16', '1', 'Y'),
(542, 'Balmoral Village', '2571', '2013-08-06 07:35:16', '1', 'Y'),
(543, 'Lakesland', '2572', '2013-08-06 07:35:16', '1', 'Y'),
(544, 'Tahmoor', '2573', '2013-08-06 07:35:16', '1', 'Y'),
(545, 'Bargo', '2574', '2013-08-06 07:35:16', '1', 'Y'),
(546, 'Aylmerton', '2575', '2013-08-06 07:35:16', '1', 'Y'),
(547, 'Bowral', '2576', '2013-08-06 07:35:16', '1', 'Y'),
(548, 'Avoca', '2577', '2013-08-06 07:35:16', '1', 'Y'),
(549, 'Bundanoon', '2578', '2013-08-06 07:35:16', '1', 'Y'),
(550, 'Exeter', '2579', '2013-08-06 07:35:16', '1', 'Y'),
(551, 'Bannister', '2580', '2013-08-06 07:35:16', '1', 'Y'),
(552, 'Breadalbane', '2581', '2013-08-06 07:35:16', '1', 'Y'),
(553, 'Bookham', '2582', '2013-08-06 07:35:16', '1', 'Y'),
(554, 'Bigga', '2583', '2013-08-06 07:35:16', '1', 'Y'),
(555, 'Binalong', '2584', '2013-08-06 07:35:16', '1', 'Y'),
(556, 'Galong', '2585', '2013-08-06 07:35:16', '1', 'Y'),
(557, 'Boorowa', '2586', '2013-08-06 07:35:16', '1', 'Y'),
(558, 'Harden', '2587', '2013-08-06 07:35:16', '1', 'Y'),
(559, 'Wallendbeen', '2588', '2013-08-06 07:35:16', '1', 'Y'),
(560, 'Bethungra', '2590', '2013-08-06 07:35:16', '1', 'Y'),
(561, 'Bribbaree', '2594', '2013-08-06 07:35:16', '1', 'Y'),
(562, 'Brindabella', '2611', '2013-08-06 07:35:16', '1', 'Y'),
(563, 'Jerrabomberra', '2619', '2013-08-06 07:35:16', '1', 'Y'),
(564, 'Burra', '2620', '2013-08-06 07:35:16', '1', 'Y'),
(565, 'Bungendore', '2621', '2013-08-06 07:35:16', '1', 'Y'),
(566, 'Araluen', '2622', '2013-08-06 07:35:16', '1', 'Y'),
(567, 'Captains Flat', '2623', '2013-08-06 07:35:16', '1', 'Y'),
(568, 'Perisher Valley', '2624', '2013-08-06 07:35:16', '1', 'Y'),
(569, 'Thredbo Village', '2625', '2013-08-06 07:35:16', '1', 'Y'),
(570, 'Bredbo', '2626', '2013-08-06 07:35:16', '1', 'Y'),
(571, 'Jindabyne', '2627', '2013-08-06 07:35:16', '1', 'Y'),
(572, 'Berridale', '2628', '2013-08-06 07:35:16', '1', 'Y'),
(573, 'Adaminaby', '2629', '2013-08-06 07:35:16', '1', 'Y'),
(574, 'Bungarby', '2630', '2013-08-06 07:35:16', '1', 'Y'),
(575, 'Ando', '2631', '2013-08-06 07:35:16', '1', 'Y'),
(576, 'Bibbenluke', '2632', '2013-08-06 07:35:16', '1', 'Y'),
(577, 'Delegate', '2633', '2013-08-06 07:35:16', '1', 'Y'),
(578, 'Albury', '2640', '2013-08-06 07:35:16', '1', 'Y'),
(579, 'Lavington', '2641', '2013-08-06 07:35:16', '1', 'Y'),
(580, 'Brocklesby', '2642', '2013-08-06 07:35:16', '1', 'Y'),
(581, 'Howlong', '2643', '2013-08-06 07:35:16', '1', 'Y'),
(582, 'Bowna', '2644', '2013-08-06 07:35:16', '1', 'Y'),
(583, 'Urana', '2645', '2013-08-06 07:35:16', '1', 'Y'),
(584, 'Balldale', '2646', '2013-08-06 07:35:16', '1', 'Y'),
(585, 'Mulwala', '2647', '2013-08-06 07:35:16', '1', 'Y'),
(586, 'Cal Lal', '2648', '2013-08-06 07:35:16', '1', 'Y'),
(587, 'Laurel Hill', '2649', '2013-08-06 07:35:16', '1', 'Y'),
(588, 'Ashmont', '2650', '2013-08-06 07:35:16', '1', 'Y'),
(589, 'Forest Hill', '2651', '2013-08-06 07:35:16', '1', 'Y'),
(590, 'Boree Creek', '2652', '2013-08-06 07:35:16', '1', 'Y'),
(591, 'Mannus', '2653', '2013-08-06 07:35:16', '1', 'Y'),
(592, 'French Park', '2655', '2013-08-06 07:35:16', '1', 'Y'),
(593, 'Lockhart', '2656', '2013-08-06 07:35:16', '1', 'Y'),
(594, 'Henty', '2658', '2013-08-06 07:35:16', '1', 'Y'),
(595, 'Walla Walla', '2659', '2013-08-06 07:35:16', '1', 'Y'),
(596, 'Culcairn', '2660', '2013-08-06 07:35:16', '1', 'Y'),
(597, 'Kapooka', '2661', '2013-08-06 07:35:16', '1', 'Y'),
(598, 'Junee', '2663', '2013-08-06 07:35:16', '1', 'Y'),
(599, 'Ardlethan', '2665', '2013-08-06 07:35:16', '1', 'Y'),
(600, 'Grogan', '2666', '2013-08-06 07:35:16', '1', 'Y'),
(601, 'Barmedman', '2668', '2013-08-06 07:35:16', '1', 'Y'),
(602, 'Bygalorie', '2669', '2013-08-06 07:35:16', '1', 'Y'),
(603, 'Burcher', '2671', '2013-08-06 07:35:16', '1', 'Y'),
(604, 'Burgooney', '2672', '2013-08-06 07:35:16', '1', 'Y'),
(605, 'Hillston', '2675', '2013-08-06 07:35:16', '1', 'Y'),
(606, 'Riverina', '2678', '2013-08-06 07:35:16', '1', 'Y'),
(607, 'Beelbangera', '2680', '2013-08-06 07:35:16', '1', 'Y'),
(608, 'Yenda', '2681', '2013-08-06 07:35:16', '1', 'Y'),
(609, 'Corobimilla', '2700', '2013-08-06 07:35:16', '1', 'Y'),
(610, 'Coolamon', '2701', '2013-08-06 07:35:16', '1', 'Y'),
(611, 'Ganmain', '2702', '2013-08-06 07:35:16', '1', 'Y'),
(612, 'Yanco', '2703', '2013-08-06 07:35:16', '1', 'Y'),
(613, 'Corbie Hill', '2705', '2013-08-06 07:35:16', '1', 'Y'),
(614, 'Darlington Point', '2706', '2013-08-06 07:35:16', '1', 'Y'),
(615, 'Argoon', '2707', '2013-08-06 07:35:16', '1', 'Y'),
(616, 'Lavington', '2708', '2013-08-06 07:35:16', '1', 'Y'),
(617, 'Caldwell', '2710', '2013-08-06 07:35:16', '1', 'Y'),
(618, 'Booligal', '2711', '2013-08-06 07:35:16', '1', 'Y'),
(619, 'Berrigan', '2712', '2013-08-06 07:35:16', '1', 'Y'),
(620, 'Blighty', '2713', '2013-08-06 07:35:16', '1', 'Y'),
(621, 'Tocumwal', '2714', '2013-08-06 07:35:16', '1', 'Y'),
(622, 'Balranald', '2715', '2013-08-06 07:35:16', '1', 'Y'),
(623, 'Jerilderie', '2716', '2013-08-06 07:35:16', '1', 'Y'),
(624, 'Dareton', '2717', '2013-08-06 07:35:16', '1', 'Y'),
(625, 'Gilmore', '2720', '2013-08-06 07:35:16', '1', 'Y'),
(626, 'Quandialla', '2721', '2013-08-06 07:35:16', '1', 'Y'),
(627, 'Brungle', '2722', '2013-08-06 07:35:16', '1', 'Y'),
(628, 'Stockinbingal', '2725', '2013-08-06 07:35:16', '1', 'Y'),
(629, 'Jugiong', '2726', '2013-08-06 07:35:16', '1', 'Y'),
(630, 'Adjungbilly', '2727', '2013-08-06 07:35:16', '1', 'Y'),
(631, 'Adelong', '2729', '2013-08-06 07:35:16', '1', 'Y'),
(632, 'Batlow', '2730', '2013-08-06 07:35:16', '1', 'Y'),
(633, 'Bunnaloo', '2731', '2013-08-06 07:35:16', '1', 'Y'),
(634, 'Barham', '2732', '2013-08-06 07:35:16', '1', 'Y'),
(635, 'Moulamein', '2733', '2013-08-06 07:35:16', '1', 'Y'),
(636, 'Kyalite', '2734', '2013-08-06 07:35:16', '1', 'Y'),
(637, 'Koraleigh', '2735', '2013-08-06 07:35:16', '1', 'Y'),
(638, 'Tooleybuc', '2736', '2013-08-06 07:35:16', '1', 'Y'),
(639, 'Euston', '2737', '2013-08-06 07:35:16', '1', 'Y'),
(640, 'Gol Gol', '2738', '2013-08-06 07:35:16', '1', 'Y'),
(641, 'Buronga', '2739', '2013-08-06 07:35:16', '1', 'Y'),
(642, 'Glenmore Park', '2745', '2013-08-06 07:35:16', '1', 'Y'),
(643, 'Cambridge Park', '2747', '2013-08-06 07:35:16', '1', 'Y'),
(644, 'Orchard Hills', '2748', '2013-08-06 07:35:16', '1', 'Y'),
(645, 'Castlereagh', '2749', '2013-08-06 07:35:16', '1', 'Y'),
(646, 'Emu Plains', '2750', '2013-08-06 07:35:16', '1', 'Y'),
(647, 'Penrith', '2751', '2013-08-06 07:35:16', '1', 'Y'),
(648, 'Silverdale', '2752', '2013-08-06 07:35:16', '1', 'Y'),
(649, 'Bowen Mountain', '2753', '2013-08-06 07:35:16', '1', 'Y'),
(650, 'North Richmond', '2754', '2013-08-06 07:35:16', '1', 'Y'),
(651, 'Richmond Raaf', '2755', '2013-08-06 07:35:16', '1', 'Y'),
(652, 'Bligh Park', '2756', '2013-08-06 07:35:16', '1', 'Y'),
(653, 'Kurmond', '2757', '2013-08-06 07:35:16', '1', 'Y'),
(654, 'Bilpin', '2758', '2013-08-06 07:35:16', '1', 'Y'),
(655, 'St Clair', '2759', '2013-08-06 07:35:16', '1', 'Y'),
(656, 'Colyton', '2760', '2013-08-06 07:35:16', '1', 'Y'),
(657, 'Dean Park', '2761', '2013-08-06 07:35:16', '1', 'Y'),
(658, 'Schofields', '2762', '2013-08-06 07:35:16', '1', 'Y'),
(659, 'Acacia Gardens', '2763', '2013-08-06 07:35:16', '1', 'Y'),
(660, 'Berkshire Park', '2765', '2013-08-06 07:35:16', '1', 'Y'),
(661, 'Eastern Creek', '2766', '2013-08-06 07:35:16', '1', 'Y'),
(662, 'Doonside', '2767', '2013-08-06 07:35:16', '1', 'Y'),
(663, 'Glenwood', '2768', '2013-08-06 07:35:16', '1', 'Y'),
(664, 'Bidwill', '2770', '2013-08-06 07:35:16', '1', 'Y'),
(665, 'Glenbrook', '2773', '2013-08-06 07:35:16', '1', 'Y'),
(666, 'Mount Riverview', '2774', '2013-08-06 07:35:16', '1', 'Y'),
(667, 'Central Macdonald', '2775', '2013-08-06 07:35:16', '1', 'Y'),
(668, 'Faulconbridge', '2776', '2013-08-06 07:35:16', '1', 'Y'),
(669, 'Hawkesbury Heights', '2777', '2013-08-06 07:35:16', '1', 'Y'),
(670, 'Linden', '2778', '2013-08-06 07:35:16', '1', 'Y'),
(671, 'Hazelbrook', '2779', '2013-08-06 07:35:16', '1', 'Y'),
(672, 'Katoomba', '2780', '2013-08-06 07:35:16', '1', 'Y'),
(673, 'Wentworth Falls', '2782', '2013-08-06 07:35:16', '1', 'Y'),
(674, 'Lawson', '2783', '2013-08-06 07:35:16', '1', 'Y'),
(675, 'Bullaburra', '2784', '2013-08-06 07:35:16', '1', 'Y'),
(676, 'Blackheath', '2785', '2013-08-06 07:35:16', '1', 'Y'),
(677, 'Bell', '2786', '2013-08-06 07:35:16', '1', 'Y'),
(678, 'Black Springs', '2787', '2013-08-06 07:35:16', '1', 'Y'),
(679, 'Bowenfels', '2790', '2013-08-06 07:35:16', '1', 'Y'),
(680, 'Carcoar', '2791', '2013-08-06 07:35:16', '1', 'Y'),
(681, 'Mandurama', '2792', '2013-08-06 07:35:16', '1', 'Y'),
(682, 'Darbys Falls', '2793', '2013-08-06 07:35:16', '1', 'Y'),
(683, 'Bumbaldry', '2794', '2013-08-06 07:35:16', '1', 'Y'),
(684, 'Bald Ridge', '2795', '2013-08-06 07:35:16', '1', 'Y'),
(685, 'Garland', '2797', '2013-08-06 07:35:16', '1', 'Y'),
(686, 'Forest Reefs', '2798', '2013-08-06 07:35:16', '1', 'Y'),
(687, 'Barry', '2799', '2013-08-06 07:35:16', '1', 'Y'),
(688, 'Borenore', '2800', '2013-08-06 07:35:16', '1', 'Y'),
(689, 'Bendick Murrell', '2803', '2013-08-06 07:35:16', '1', 'Y'),
(690, 'Canowindra', '2804', '2013-08-06 07:35:16', '1', 'Y'),
(691, 'Gooloogong', '2805', '2013-08-06 07:35:16', '1', 'Y'),
(692, 'Eugowra', '2806', '2013-08-06 07:35:16', '1', 'Y'),
(693, 'Koorawatha', '2807', '2013-08-06 07:35:16', '1', 'Y'),
(694, 'Greenethorpe', '2809', '2013-08-06 07:35:16', '1', 'Y'),
(695, 'Bimbi', '2810', '2013-08-06 07:35:16', '1', 'Y'),
(696, 'Arthurville', '2820', '2013-08-06 07:35:16', '1', 'Y'),
(697, 'Narromine', '2821', '2013-08-06 07:35:16', '1', 'Y'),
(698, 'Trangie', '2823', '2013-08-06 07:35:16', '1', 'Y'),
(699, 'Warren', '2824', '2013-08-06 07:35:16', '1', 'Y'),
(700, 'Bogan', '2825', '2013-08-06 07:35:16', '1', 'Y'),
(702, 'noida', '112201', '2017-11-18 01:05:39', '1', 'Y');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
